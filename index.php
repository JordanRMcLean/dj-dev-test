<?php
/* for personal debug.
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/

require 'includes/db.php';
require 'includes/constants.php';
require 'includes/form.php';

$submitted = empty($_POST['submit']) ? false : true;
$form_error_msg = '';
$template = 'templates/form.php'; //the template to display.


//check if form has been submitted
if($submitted) {

    //first lets get our values.
    foreach($contact_form as $key => $input) {
        //setting the values so they are displayed within the form still on failure.
        $contact_form[$key]['value'] = $_POST[$key];
    }

    //we will validate in a moment, check the recaptcha


    $invalid_fields = [];

    //validate all the form pieces.
    foreach($contact_form as $key => $input) {
        if(!$input['validate']($input['value'])) {
            $invalid_fields[] = $input['label'];
        }
    }

    //set an error message. This will display above the form.
    $form_error_msg = 'Please revise the following parts: ' . implode(', ', $invalid_fields);

    //all fields were valid so we can insert into DB.
    if(empty($invalid_fields)) {
        $db = new Models\Model();
        $db->set_table('contact_submissions');

        $submission = [
            'name'      => $contact_form['name']['value'],
            'email'     => $contact_form['email']['value'],
            'telephone' => $contact_form['telephone']['value'],
            'message'   => $contact_form['message']['value'],
            'priority'  => PRIORITY_DEFAULT,
            'status'    => STATUS_DEFAULT,
            'browser'   => $_SERVER['HTTP_USER_AGENT'],
            'ip'        => $_SERVER['REMOTE_ADDR']
        ];

        //still need to modify the priority and status.

        $now = new DateTime; //assumes the server is running on same timezone as the working hours.
        $start_of_day = new DateTime("09:00");
        $end_of_day = new DateTime("17:30");
        $same_day = new DateTime("16:30");
        $submission['time'] = $now;

        //if its past 9am...
        if($now > $start_of_day) {

            //if its before 17:30
            if($now < $end_of_day) {

                //change the priority to morning reply if before 17:30
                $submission['priority'] = PRIORITY_MORNING_REPLY;

                //however, if before 16:30 then change to same day.
                if($now < $same_day) {
                    $submission['priority'] = PRIORITY_SAME_DAY;
                }
            }
        }

        //now change the status based on the words and if contains URL.
        $message_words = str_word_count($submission['message']);
        $contains_url = strpos($submission['message'], 'www.') !== false || preg_match('/http(s?):/', $submission['message']);

        if($contains_url) {
            $submission['status'] = ($message_words > 20) ? STATUS_SPAM : STATUS_POSSBILE_SPAM;
        }
        elseif ($message_words > 50) {
            $submission['status'] = STATUS_POSSIBLE_TEXT_SPAM;
        }

        //all good to insert into DB.
        //the mysql class prevents injection via prepared statements.
        //an exception will be thrown if the insert fails - no time to create error handler.
        $db->insert([
            'submission_status'     => $submission['status'],
            'submission_priority'   => $submission['priority'],
            'submission_ip'         => $submission['ip'],
            'submission_browser'    => $submission['browser'],
            'submission_name'       => $submission['name'],
            'submission_email'      => $submission['email'],
            'submission_telephone'  => $submission['telephone'],
            'submission_message'    => $submission['message']
        ]);

        $template = 'templates/success.php';

    }

}

?>

<html>
<head>
    <script type="text/javascript" src="test.js"></script>
    <link rel="stylesheet" href="test.css" />
</head>
<body>

    <h1>Hello Design Junkie</h1>
    <h2>Contact Form</h2>

    <?php include($template); ?>


</body>
</html>

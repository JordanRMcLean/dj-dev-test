<?php
/* for personal debug 
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/


require 'includes/db.php';
require 'includes/constants.php';
require 'includes/form.php';

$template = 'templates/view.php'; //the template to display.

$db = new Models\Model();
$db->set_table('contact_submissions');

$forms = $db->get();

?>

<html>
<head>
    <script type="text/javascript" src="test.js"></script>
    <link rel="stylesheet" href="test.css" />
</head>
<body>

    <h1>Hello Design Junkie</h1>
    <h2>Contact Form View</h2>

    <?php include($template); ?>


</body>
</html>

<?php
//definition of fields in contact form.
$contact_form = [

    'name' => [
        'label'         => 'Name',
        'placeholder'   => 'Enter your name',
        'id'            => 'name',
        'type'          => 'text',
        'value'         => '',
        'validate'      => function($value) {
            //only allow spaces and alpha characters. (although would need adjustment for foreign names)
            return preg_match('/^[a-zA-Z\s]+$/', $value) ? true : false;
        }
    ],

    'email' => [
        'label'         => 'Email',
        'placeholder'   => 'Enter your email address',
        'id'            => 'email',
        'type'          => 'email',
        'value'         => '',
        'validate'      => function($value) {
            return filter_var($value, FILTER_VALIDATE_EMAIL) ? true : false;
        }
    ],

    'telephone' => [
        'label'         => 'Telephone',
        'placeholder'   => 'Enter your telephone number',
        'id'            => 'telephone',
        'type'          => 'number',
        'value'         => '',
        'validate'      => function($value) {
            //allow spaces and '+'
            return preg_match('/^\+?[0-9\s]+$/', $value) ? true : false;
        }
    ],

    'message' => [
        'label'         => 'Message',
        'placeholder'   => 'Enter your message',
        'id'            => 'message',
        'type'          => 'textbox',
        'value'         => '',
        'validate'      => function($value) {
            //max characters of 300 for our db.
            return strlen($value) < 301 && strlen($value) > 5 ? true : false;
         }
    ],

];

function recaptcha_validate($token) {
    if(empty($token)) {
        return false;
    }

    try {

        //use cURL for POST request as is fairly standard.
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "response=$token&secret=" . RC_SECRET_KEY);

        $response = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($response);

        return $json->success;
    }
    catch(Exception $e) {
        throw new Exception('ReCaptcha Request failed.' . ' ' . $e->getMessage());
        return false;
    }

    return false;
}

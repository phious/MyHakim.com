<?php

require_once '../vendor/autoload.php';
require_once '../config/constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function  sendApprovalEmail($email, $token){

global $mailer;

$body = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Verify email</title>
</head>
<body>
<div class="wrapper">
    <p>
    Your request has been approved. Thank you for using
        our online booking platform.
    </p>
</div>
</body>
</html>';
    // Create a message
$message = (new Swift_Message('Approval message from MyHakim.com'))
->setFrom(EMAIL)
->setTo($email)
->setBody($body, 'text/html')
;

// Send the message
$result = $mailer->send($message);
}

function  sendDenialEmail($email, $token){

    global $mailer;
    
    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Verify email</title>
    </head>
    <body>
    <div class="wrapper">
        <p>
        Your request has been denied. Sorry try 
            another time.
        </p>
    </div>
    </body>
    </html>';
        // Create a message
    $message = (new Swift_Message('Denial message from MyHakim.com'))
    ->setFrom(EMAIL)
    ->setTo($email)
    ->setBody($body, 'text/html')
    ;
    
    // Send the message
    $result = $mailer->send($message);
    }
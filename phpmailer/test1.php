<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@example.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    /* Sender (name is optional) */
    $mail->setFrom('lithanm6@gmail.com', 'Admin');
    
    /* Recipient (name is optional) */
    $mail->addAddress('kerenteo@gmail.com', 'User1');
    
    /* Subject */
    $mail->Subject = 'Test Email';
    

    /* Send message as HTML */ 
    $mail->isHTML(true);         
    
    
    /* Message body */
    $mail->Body = '<html>There is a great disturbance in the <strong>Force</strong>.</html>';
    
    /* Plain text alternative */
    $mail->AltBody = 'There is a great disturbance in the Force.';
    
    /* Use a custom SMTP server */
    $mail->isSMTP();
    
    /* SMTP host */
    $mail->Host = 'smtp.gmail.com';
    
    /* SMTP TCP port */
    $mail->Port = 465;
    
    /* Use TSL secure connection */
    $mail->SMTPSecure = 'ssl';
    
    /* Enable authentication */
    $mail->SMTPAuth = TRUE;
    
    /* SMTP username */
    $mail->Username = 'lithanm6@gmail.com';
    
    /* SMTP password */
    $mail->Password = 'H245hyt12';
    
    /* Send the message */
    if (!$mail->send())
    {
        echo "Error: " . $mail->ErrorInfo;
    }
    else
    {
        echo "Message sent.";
    }
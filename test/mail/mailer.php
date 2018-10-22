<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

 
require '../../vendor/autoload.php';

function sendemail($email) {

    $mail = new PHPMailer();                              // Passing `true` enables exceptions
    try {
        //server settings
        $mail->SMTPDebug = 2;                                
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com';    
        $mail->SMTPAuth = true;                            
        $mail->Username = 'lithanm6@gmail.com';              
        $mail->Password = 'H245hyt12';                           
        $mail->SMTPSecure = 'ssl';                             
        $mail->Port = 465;   

        //Recipients
        $mail->setFrom('kerenteo@gmail.com', 'Mailer');
        $mail->addAddress($email);       
     //   $mail->addAddress('ellen@example.com');                
     //   $mail->addReplyTo('info@example.com', 'Information');
     //   $mail->addCC('cc@example.com');
     //   $mail->addBCC('bcc@example.com');$mail->setFrom('username', 'username');

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
    
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $email = $_POST["email"]; 
        sendemail($email);
    } 
?>
<form method="POST" action="">
    <input type="text" name="email">
    <input type="submit">                                
</form>
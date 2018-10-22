<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader




require '../vendor/autoload.php';

function sendemail($email, $subject, $mailmessage) {

    $mail = new PHPMailer();                              // Passing `true` enables exceptions
    try {
        //server settings
        $mail->SMTPDebug = 0;                                
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
        $mail->Subject = $subject;
        $mail->Body    = $mailmessage; 
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
    
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        //4. convert string of emails to array(use explode(" ", $string))
//5. loop through array of emails to send bulk email use foreach
        $email = $_POST["email"];
        $subject = $_POST['subject'];
        $mailmessage = $_POST['mailmessage'];
        sendemail($email, $subject, $mailmessage);
    } 
?>
<link rel="stylesheet" href =".\css\bootstrap.min.css">

<?php
//1.retrieve emails from database
//2.loop through the emails using foreach(list out emails)
//3. integrate program to email input




?>

<form method="POST" action="">
<div class="container">
    <div class="col-lg-5">
        <div class="form-group">
            <label>Email</label>
            <textarea type="text" class="form-control" rows="4" cols="50" name="email"></textarea>
        </div>
        <div class="form-group">
            <label>Subject</label>
            <input type="text" class="form-control" name="subject">
        </div>
        <div class="form-group">
            <label>Message: </label>
            <textarea class="form-control" rows="4" cols="50" type="text" name="mailmessage"></textarea>
        </div>
        <div>
            <input type="submit">
        </div>  
    </div>  
   </div>
</div>
                   
</form>
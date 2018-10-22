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
        $addr = explode(', ', $email);
          //4. convert string of emails to array(use explode(" ", $string))
        //Recipients
        $mail->setFrom('kerenteo@gmail.com', 'Admin');
        $mail->addAddress($email);       
     //   $mail->addAddress('ellen@example.com');                
     //   $mail->addReplyTo('info@example.com', 'Information');
     //   $mail->addCC('cc@example.com');
     //   $mail->addBCC('bcc@example.com');$mail->setFrom('username', 'username');

        //Content
        //5. loop through array of emails to send bulk email use foreach

        foreach ($addr as $ad) {
            $id = $UM->getUserByEmail($ad)->id;
            $subscribe = $UM->getAllSubscribe($ad)->subscribe;
            $link=rootlink."public/unsubscribe.php?id={$id}&subscribe={$subscribe} ";
            $mail->isHTML(true); 
            $mail->Subject = $subject;
            $mail->Body = $mailmessage . "<br>" . "To stop receiving newsletters and updates click <a href=" . $link . ">Unsubscribe</a>" . "<br>";
            $mail->AltBody = "This is the plain text version of the email content";
        }

        $mail->send();
        echo 'Message has been sent successfully to'.$email;
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
    
    if ($_SERVER['REQUEST_METHOD']=='POST'){
      

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
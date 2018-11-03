<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

require '../../../vendor/autoload.php';

function sendemail($email, $subject, $mailmessage) {

    $mail = new PHPMailer();                              // Passing `true` enables exceptions
    try {
        //server settings
        $mail->SMTPDebug = 0;                                
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com';    
        $mail->SMTPAuth = true;                            
        $mail->Username = 'abcportal11@gmail.com';
        $mail->Password = 'capstone32644';
        $mail->SMTPSecure = 'ssl';                             
        $mail->Port = 465;   
        $addr = explode(',', $email);
        array_pop($addr);

        $rootlink = "http://localhost/students/SG0318A21/m5/CommunityPortal/";
    //   $mail->addAddress('ellen@example.com');                
    //   $mail->addReplyTo('info@example.com', 'Information');
    //   $mail->addCC('cc@example.com');
    //   $mail->addBCC('bcc@example.com');$mail->setFrom('username', 'username');
    //Content
    //5. loop through array of emails to send bulk email use foreach
        var_dump($addr); 
        foreach ($addr as $ad) {    
           // $id = $UM->getAllSubscribe->id;
           // $subscribe = $UM->getAllSubscribe->subscribe;
            //$link=$rootlink."public/modules/user/updateprofile.php";
            $ad = trim($ad);
            echo $ad .'<br>';
            $link=$rootlink."public/modules/user/unsubscribe1.php?email=$ad";
           echo $link.'<br>';
            $mail->isHTML(true); 
            $mail->Subject = $subject;
            $mail->Body = $mailmessage . "<br>" . "To stop receiving newsletters and updates click <a href=" . $link . ">Unsubscribe</a>" . "<br>";
            $mail->AltBody = "This is the plain text version of the email content";
            $mail->setFrom('kerenteo@gmail.com', 'Admin');
           $mail->addBCC($ad); 
           $mail->addAddress($ad);  
           $mail->send(); 
        }

      
        echo 'Message has been sent successfully to '.$email;
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
<html>
<head>
<link rel="stylesheet" href ="..\..\css\bootstrap.min.css">
</head>
<body>
<form name="bulkmail.php" method="POST" action="">
<div class="container">
	<div class="row">
		<div class="col-lg-2"> </div>
		<div class="center-block col-lg-8">
<div class="jumbotron bg-light" >
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
 
<div class="form-group">
    <label>Email</label>
    <textarea type="text" class="form-control" rows="4" cols="50" name="email"><?php
    $UM=new UserManager();
   // $users=$UM->getAllUsers();
    //var_dump($users);
    $users=$UM->getAllSubscribe();
   // var_dump($users);
    if(isset($users)){
        foreach ($users as $user) {
            if($user!=null){
    
    echo "$user->email, ";      
            }
        }
    }    
?>
    </textarea>
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
		</div>
	</div>
</div>                 
</form>
</body>
</html>

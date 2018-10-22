<?php
use classes\business\UserManager;
use classes\business\Validation;
require_once '../phpmailer/PHPMailerAutoload.php';
require_once 'includes/autoload.php';


$formerror="";

$email="";
$password="";
$error_auth="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation();


if(isset($_POST["submitted"])){
    $email=$_POST["email"];
	$UM=new UserManager();
	$existuser=$UM->getUserByEmail($email);
	if(isset($existuser)){
            $name=$existuser -> firstName;  
	    
			//generate new password
			$newpassword=$UM->randomPassword(8,1,"lower_case,upper_case,numbers");
			//update database with new hashpassword - add'md5'
			$UM->updatePassword($email,md5($newpassword[0]));      
			//$formerror="Valid email user. password: ".$newpassword[0];
			
            //coding for sending email
			/* PHPMailer object */
			$mail = new PHPMailer();
			
			/* Sender (name is optional) */
			$mail->setFrom('lithanm6@gmail.com', 'Admin');
			
			/* Recipient (name is optional) */
			$mail->addAddress($email, 'User1');
			
			/* Subject */
			$mail->Subject = 'Forget Password';
			
			/* Reply-to address */
			//$mail->addReplyTo('vader@empire.com', 'Lord Vader');
			
			/* CC */
			//$mail->addCC('admiral@empire.com', 'Fleet Admiral');
			
			/* BCC */
			//$mail->addBCC('luke@rebels.com', 'Luke Skywalker');
			
			/* Send message as HTML */
			$mail->isHTML(TRUE);
			
			/* Message body */
			$mail->Body = "Dear ".$name.",<br>Here is your new password: ".$newpassword[0];
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
			// do work here
			
			$formerror="New password have been sent to ".$email;
			header("Location:passwordconfirm.php");
			//header("Location:home.php");
	}else{
			$formerror="Invalid email user";
	}
}

?>
<html>
<link rel="stylesheet" href =".\css\bootstrap.css">
<link rel="stylesheet" href=".\css\pure-release-1.0.0\pure-min.css">
<header>
<?php  include 'includes/header.php'; ?>  
</header>
<!-- !PAGE CONTENT! -->
<body>

<form name="forgetpassword.php" method="post" class="pure-form pure-form-stacked">
<h1 class="ml-5">Forget Password</h1>

<?php echo $formerror?>

<p class="ml-5">
	Please enter your registered email address. <br>
	 <br> A new generated password will send to you via email. 
</p>

<div class="form-group p-5 col-md-6">
 
	<input type="email" name="email" value="<?=$email?>" class="form-control"   pattern="^[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]{2,3}$" required title="Cannot be empty field" placeholder="Enter Email">
	<p class="text-danger" <?php echo $error_name?>></p>
 
</div> 
<div class="form-group p-5">
	<input type="submit" name="submitted" value="Submit" class="btn btn-success" style="width:20% "  >
</div>


</form>

<?php
include 'includes/footer.php';
?>
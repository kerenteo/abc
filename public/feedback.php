<?php
/**
 * File Must use only <?php and <?= tags
 */
session_start();

use classes\entity\Feedback;
use classes\business\FeedbackManager;
use classes\business\Validation;
use classes\business\UserManager; //

require_once 'includes/autoload.php';
$formerror = "";

$firstName = "";
$lastName = "";
$email = "";
$comments = "";

$error_firstname = "";
$error_lastname = "";
$error_passwd = "";
$error_email = "";
$error_comments = "";
$validate = new Validation();

if (isset($_POST["submitted"])) {
    $email = strip_tags($_POST["email"]);
    $lastName = strip_tags($_POST["lastname"]);
    $firstName = strip_tags($_POST["firstname"]);
    $comments = strip_tags($_POST["comments"]);
    
    $validate->check_name($firstName, $error_firstname);
    $validate->check_name($lastName, $error_lastname);
    
    // $validate->check_email($email, $error_email);
    
    if (empty($error_firstname) && empty($error_lastname) && empty($error_email) && empty($error_comments)) {
        $feedback = new Feedback();
        $feedback->firstname = $firstName;
        $feedback->lastname = $lastName;
        $feedback->email = $email;
        $feedback->comments = $comments;
        $FM = new FeedbackManager();
        $FM->insertFeedback($feedback);
        
        $existuser = $FM->getFeedbackByEmail($email); //
        if (isset($existuser)) {
            $_SESSION['firstname'] = $existuser->firstName;
            $_SESSION['lastname'] = $existuser->lastName;
            echo '<meta http-equiv="Refresh" content="1; url=feedbackthankyou.php">';
        } else {
            $formerror = "Your feedback submission is unsuccessfully!";
        }
    }
}
?>
 
<link rel="stylesheet" href =".\css\bootstrap.min.css">

<form name="feedback" method="post" class="pure-form pure-form-stacked">

<div><?=$formerror?></div>


<div class="container">
	<div class="row">
		<div class="col-md-0"></div>
		<div class="center-block col-md-6">
		<h1>Feedback Form</h1>
<div class="jumbotron text- bg-light radius-2">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
		
		 <div class="form-group"> 
		 	<label>First Name</label>	
		 	<input type="text" name="firstname" class="form-control" value="<?=$firstName?>" pattern="[ A-Za-z]{3,50}" title="First Name should be betweeen 3-50 characters" required placeholder="Enter first name">
			<?=$error_firstname?>
		</div>
		
		<div>
			<label>Last Name</label>
			<input type="text" name="lastname" class="form-control" value="<?=$lastName?>" pattern="[ A-Za-z]{3,50}" title="Last Name should be betweeen 3-50 characters" required placeholder="Enter last name">
			<?=$error_lastname?>
		</div>
		
		<div>
			<label>Email</label>
			<input type="text" name="email" class="form-control" value="<?=$email?>" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$" title="Please enter a valid email" required placeholder="example@domain.com" >
			<?=$error_email?>
		</div>
		
		<div>
			<label>Comments</label>
			<textarea name="comments" rows = "7" cols = "50" name="comments" class="form-control" value="<?=$comments?> pattern="[ A-Za-z]{3,256}" title="First Name should be betweeen 3-50 characters" required placeholder="Enter comments"  ></textarea>
			<?=$error_comments?>
		</div>
		
		<div>
            <input type="submit" name="submitted" value="Submit" class="btn btn-info" style= "width:40%">
            <input type="reset" name="reset" value="Reset" class="btn btn-secondary" style= "width:40%">
		</div>
		</div>
	</div>
</div>
		</div>
	</div>
</div>

</form>
 
<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\FeedbackManager;
use classes\entity\Feedback;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php

$formerror="";
$firstName="";
$lastName="";
$email="";
$comments='';

$deleteflag=false;

if(isset($_POST["submitted"])){
  if(isset($_GET["email"])){
       $FM=new FeedbackManager();
       $existuser=$FM->deleteAccount($_GET["email"]);
        $formerror="Feedback deleted successfully.";
		$deleteflag=true;
	}
}else if(isset($_POST["cancelled"])){
	header("Location:../../home.php");
}else{
	if(isset($_GET["email"]))
	{
	  $FM=new FeedbackManager();
	  $existuser=$FM->getFeedbackByEmail($_GET["email"]);
	  $firstName=$existuser->firstName;
	  $lastName=$existuser->lastName;
	  $email=$existuser->email; 
	}
}
?>
<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
<link rel="stylesheet" href ="..\..\css\bootstrap.min.css">
<form name="deletefeedback" method="post" class="pure-form pure-form-stacked">
<h1>Delete Feedback</h1>
<div><?=$formerror?></div>
<?php
if (!$deleteflag)
{
?>
<table>
  <tr>
    <td>Are you sure that you want to <b>delete</b> the following record?<br></td>
  </tr>
   <tr>
    <td><?=$email?></td>
  </tr>
  <tr> 
    <td><br><input type="submit" name="submitted" value="Delete" class="pure-button pure-button-primary">
    <input type="submit" name="cancelled" value="Cancel" class="pure-button pure-button-primary"></td>
    
  </tr>
</table>
<?php
}
?>
</form>


<?php
include '../../includes/footer.php';
?>
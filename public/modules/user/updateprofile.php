<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php

$formerror="";
$firstName="";
$lastName="";
$email="";
$password="";
$subscribe="";

if(!isset($_POST["submitted"])){
  $UM=new UserManager();
  $existuser=$UM->getUserByEmail($_SESSION["email"]);
  $firstName=$existuser->firstName;
  $lastName=$existuser->lastName;
  $email=$existuser->email;
  $password=$existuser->password;
  $subscribe=$exituser->subscribe;
}else{
  $firstName=$_POST["firstName"];
  $lastName=$_POST["lastName"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $subscribe=$_POST["subCheckbox"];

  if($firstName!='' && $lastName!='' && $email!='' && $password!=''){
       $update=true;
       $UM=new UserManager();
       if($email!=$_SESSION["email"]){
           $existuser=$UM->getUserByEmail($email);
           if(is_null($existuser)==false){
               $formerror="User Email already in use, unable to update email";
               $update=false;
           }
       }
       if($update){
           $existuser=$UM->getUserByEmail($_SESSION["email"]);
           $existuser->firstName=$firstName;
           $existuser->lastName=$lastName;
           $existuser->email=$email;
           $existuser->password=$password;
           $existuser->subscribe = $subscribe;
           $UM->saveUser($existuser);
           $_SESSION["email"]=$email;
           //header("Location:../../home.php");
           //header("Location:../modules/admin/userlistadmin.php");
       }
  }else{
      $formerror="Please provide required values";
  }
}
?>
<link rel="stylesheet" href ="..\..\css\bootstrap.min.css">
<form name="updateprofile.php" method="post" class="pure-form pure-form-stacked">
<div><?=$formerror?></div>

<div class="container-fluid p-3">
	<div class="row"> 
		<div class="col-md-12">	
			<h1 style="text-align:center">Update Profile</h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-2"> </div>
		<div class="center-block col-md-8">
<div class="jumbotron text- bg-info radius-2">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
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

    <div class="form-group"> 
      <label>Password</label>
      <input type="password" class="form-control" name="password" value="<?=$password?>"    title="Password must consist of at least 6 characters with at least one uppercase letter, one lowercase letter and one digit." required placeholder="Password (Min 6 Characters)">
    </div>

    <div class="form-group"> 
      <label>Confirm Password</label>
      <input type="password" class="form-control" name="cpassword" value="<?=$password?>"  title="Password must consist of at least 8 characters with at least one uppercase letter, one lowercase letter and one digit"required placeholder="Confirm Password ( Min 6 Characters)" > 
    </div>  

    <div class="form-group">
		<div class="custom-control custom-checkbox">
			<input type="checkbox" name="subCheckbox" <?php if($subscribe==1){echo "checked";}?> class="custom-control-input" id="customCheck"> 
      <label class="custom-control-label" for="customCheck">Subscribe to newsletter</label>
		</div>
	  </div>
  
    <div class="form-group">
    <input type="submit" name="submitted" value="Submit" style="background:#94c120; color:white; width:49%;">
    <input type="reset" name="reset" value="Reset" style="width:49%;">
    </div>

    </div>
  </div>
</div>
      </div>
    </div>
  </div>

</form>

<?php
include '../../includes/footer.php';
?>























 
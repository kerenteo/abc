<?php
session_start();

use classes\business\UserManager;
use classes\entity\User;
require_once '../../includes/autoload.php';
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
  $subscribe=$existuser->subscribe;


}else{
  $firstName=$_POST["firstName"];
  $lastName=$_POST["lastName"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $subscribe=$_POST["subscribe"];
  

  if(!isset($_POST["subscribe"])){
    $subscribe=0;
  }else{
  if (isset($_POST["subscribe"])){
    $subscribe=$_POST["subscribe"];
    }
  }

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
           header("Location:../../home.php");
           echo '<meta http-equiv="Refresh" content="1; url=./updateprofilethankyou.php">';

       }
  }else{
      $formerror="Please provide required values";
  }
}
?>
<link rel="stylesheet" href ="..\..\css\bootstrap.min.css">

<form name="updateprofile.php" method="post" >

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
    <input type="text" name="firstName" class="form-control" value="<?=$firstName?>" size="50">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" name="lastName" class="form-control" value="<?=$lastName?>" size="50">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" value="<?=$email?>" size="50">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" value="<?=$password?>" size="20">
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" class="form-control"  name="cpassword" value="<?=$password?>" size="20">
  </div>
  <div class="form-group">
  <!--    <input type="checkbox" name="subscribe" checked="checked" value="1"> 

      <label>Subscribe to newsletter</label> -->
      <div class="custom-control custom-checkbox">
			<input type="checkbox" name="subscribe" value=1
				<?php if($subscribe) echo "checked";?> class="custom-control-input"
				id="customCheck1"> 
        <label class="custom-control-label"
				for="customCheck1">Subscribe to newsletter</label>
		</div>
  </div> 

  <div class="form-group">
    <input type="submit" name="submitted" value="Submit" style="background:#94c120; color:white; width:49%;">
    <input type="reset" name="reset" value="Reset"  style="width:49%;" >
  </div>
 
</div>
 
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
</form>

<div id="section-offset"></div>

<?php
include '../../includes/footer.php';
?>


 
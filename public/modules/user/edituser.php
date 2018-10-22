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
$exituser="";

if(isset($_POST["submitted"])){
    if(isset($_GET["id"])){
        $UM=new UserManager();
        $formerror="User edited sucessfully";
        $existuser=$UM->getUserById($_GET["id"]);
        $existuser->firstName=$_POST["firstname"];
        $existuser->lastName=$_POST["lastname"];
        $existuser->email=$_POST["email"];
        $existuser->password=$_POST["password"];
        $UM->saveUser($existuser);
    }
}else if (isset($_POST["cancelled"])){
    header("Location:../../home.php");
}else{
    if(isset($_GET["id"])){
        $UM=new UserManager();
        $existuser=$UM->getUserById($_GET["id"]);
        $firstName=$existuser->firstName;
        $lastName=$existuser->lastName;
        $email=$existuser->email;
        $password=$existuser->password;
    }
}

?>
<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">

<form name="editUser" method="post" class="pure-form pure-form-stacked">
<div><?=$formerror?></div>
<div class="row"> 
		<div class="col-md-12">	
			<h1 style="text-align:center">Edit User</h1>
		</div>
</div>

<?php 

?>
<div class="container">
	<div class="row">
		<div class="col-md-3"> </div>
		<div class="center-block col-md-6">
<div class="jumbotron bg-light" >
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
        
            <div class="form-group">
            	<label>First Name</label> 
            	<input class="form-control" type="text" name="firstname" value="<?php echo $existuser->firstName;?>" pattern="[ A-Za-z]{3,50}" title="First Name should be betweeen 3-50 characters">
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" type="text" name="lastname" value="<?php echo $existuser->lastName;?>" pattern="[ A-Za-z]{3,50}" title="Last Name should be betweeen 3-50 characters"> 
            </div>
            
            <div class="form-group">    
                <label>Email</label>
                <input class="form-control" type="text" name="email" value="<?php echo $existuser->email;?>" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$" title="Please enter a valid email" required placeholder="example@domain.com" >
            </div>
            
            <div class="form-group"> 
                <label>Password</label>
                <input class="form-control" type="password" name="password" value="<?php echo $existuser->password;?>" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$"  title="Password must consist of at least 6 characters with at least one uppercase letter, one lowercase letter and one digit." >
            </div>
            
            <div class="form-group"> 
                <label>Confirm Password</label>
                <input class="form-control" type="password" name="password" value="<?php echo $existuser->password;?>" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$"  title="Password must consist of at least 6 characters with at least one uppercase letter, one lowercase letter and one digit."> 
            </div>
            
            <div class="form-group">
            	<input type="submit" name="submitted" value="Edit"  class="btn bg-info"  style="color:white; width:49%;">
                <input type="reset" name="cancelled" value="Cancel" class="btn bg-secondary"  style="color:white; width:49%;">
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
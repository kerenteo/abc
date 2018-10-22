<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
$formerror="";
?>
<?php
$formerror = "";
$email="";
$password="";

$error_auth="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation();

if(isset($_POST["submitted"])){
    $email=$_POST["email"];
    $password=md5($_POST["password"]);  // add 'md5' to make has password
  
  //RECAPTCHA  
    $response = $_POST["g-recaptcha-response"];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LfqQnAUAAAAANVxjMl6Qikebt5WTlMfXTG_cxJ9', //secret key , get from https://www.google.com/recaptcha/admin#site/342901482
        'response' => $_POST["g-recaptcha-response"]
    );
    $options = array(
        'http' => array (
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success=json_decode($verify);
    if ($captcha_success->success==false) {
        echo "<p>Recapture Unsuccessful!</p>";
    } else if ($captcha_success->success==true) {
        $UM=new UserManager();
        $existuser=$UM->getUserByEmailPassword($email,$password);
        if(isset($existuser))
        {
            $_SESSION['email']=$email;
            $_SESSION['id']=$existuser->id;
            $_SESSION['role']=$existuser->role;      //added for role
            $_SESSION['firstName'] = $existuser->firstName;   //add for firstname
            echo '<meta http-equiv="Refresh" content="1; url=home.php">';//content=1 sec refresh
        }else{
            $formerror="Invalid User Name or Password";
        }
    }
}

?>
<link rel="stylesheet" href =".\css\bootstrap.min.css">
<link rel="stylesheet" href=".\css\pure-release-1.0.0\pure-min.css">
<script src='https://www.google.com/recaptcha/api.js'></script>   <!-- add RECAPTCHA -->
<div class="container-fluid p-3">
	<div class="row"> 
		<div class="col-md-12">	
			<h1 style="text-align:center">Login</h1>
		</div>
	</div>
</div>

<form name="login.php" method="post" class="pure-form pure-form-stacked">

<div class="container">
	<div class="row">
		<div class="col-md-3"> </div>
		<div class="center-block col-md-6">
<div class="jumbotron text- bg-info radius-2" >
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

        <div class="form-group">    
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?=$email?>" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$" title="Please enter a valid email" required placeholder="example@domain.com"  >
        <?php echo $error_name?>
        </div>  	
        		  
        <div class="form-group"> 
            <label>Password</label>
           <input type="password" class="form-control" name="password" value="<?=$password?>"  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$"  title="Password must consist of at least 6 characters with at least one uppercase letter, one lowercase letter and one digit." required placeholder="Password (Min 6 Characters)">
         <?php echo $error_passwd?>
        </div>
        
        <div class="g-recaptcha" data-sitekey="6LfqQnAUAAAAAMxCCnJs1Ei-RIvCiihQCdW67W0A"></div>
         
        <div class="form-group">
           <br><input type="submit" name="submitted" value="Submit" class="btn btn-success" style="width:48%">
            <input type="reset" name="reset" value="Reset"  class="btn text-secondary" style="color=darkgray; width: 48%">
        </div>
        
        <div>
         
        	<a class="text-danger text-md-center" href="modules/user/register.php">Click here to Register</a> 
        	<span>
        	<a class="text-secondary text-md-center p-3 " href="./forgetpassword.php">Forget Password</a></span>
		</div>
		</div>
	</div>
</div>
		</div>
	</div>
</div>
</form>
</body>
<?php
include 'includes/footer.php';
?>
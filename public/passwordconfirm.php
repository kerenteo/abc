<?php
session_start();
include 'includes/security.php';
include 'includes/header.php';
?>
<link rel="stylesheet" href =".\css\bootstrap.min.css">
<link rel="stylesheet" href=".\css\pure-release-1.0.0\pure-min.css">
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>	
<body>
<br><br>

<h1>Title : Forget Password</h1>
<!-- !PAGE CONTENT! -->
<div id="section-offset"></div>

	<form name="myForm" method="post" class="pure-form pure-form-stacked">
		<p>
			<!-- <img src="images/mail.png" class="img-responsive center-block"> -->
		</p>
		</div>
		<div class="col-lg-4"></div>

		<p>Your password has been sent to your email</p>
		<br>
		<p>Please check your email for the new password</p>
		<br>
		<!--<p><a href="/abcportal/public/login.php">Click here to login</p></a>-->
		<!--<a href="<?=$path;?>public/index.php">Click here to login</a>-->
	</form>


<?php 

//echo "<br>","Thank you ".$_SESSION['firstname'];

?>
</body>
</html>
<?php
include 'includes/footer.php';
?>

<?php
session_start();
include 'includes/security.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href =".\css\bootstrap.min.css">
	<title>ABC Community Portal</title>
</head>

<header> 
 <?php  include 'includes/header.php'; ?>  
</header>
<!-- !PAGE CONTENT! -->

<body>
<div class="container-fluid" style="background:#63e0d8;">
	<div row="row" style="color:	#696969" >	
		<?php echo "Welcome ".$_SESSION['firstName'];?> 
		<img class="img-fluid" src="http://localhost/students/SG0318A21/m5/CommunityPortal/public/images/hero.jpg" alt="Network" style="width:100%;">
           
	</div>
</div>
<!--Section Portlets-->
	
<div class="container-fluid" style="background:#63e0d8;">
	<div class="card-group">
		<section class="card" style="background-color:#fff568;" id="aboutus">
			<div class="card-body">
				<h4 class="card-title" style="text-align:center"><a href="aboutus.php">ABOUT US</a></h4>
				 
				<img class="card-img img-fluid" src="http://localhost/students/SG0318A21/m5/CommunityPortal/public/images/hands.jpg" alt="hand-in-hand">
			</div>	
		</section>
			
		<section class="card" style="background-color:#f7941e" id="contactus" >
			<div class="card-body">
				<h4 class="card-title" style="text-align:center"><a href="/students/SG0318A21/m5/CommunityPortal/public/contactus.php">CONTACT US</a></h4>
				<img class="card-img img-fluid" src="http://localhost/students/SG0318A21/m5/CommunityPortal/public/images/headset.jpg" alt="headset" > 
			</div>
		</section>
			
		<section class="card" style="background-color:#00a14b;" id="profile">
			<div class="card-body">
				<h4 class="card-title" style="text-align:center">PUBLIC PROFILE</h4>
				<img class="card-img img-fluid" src="http://localhost/students/SG0318A21/m5/CommunityPortal/public/images/Grace.jpg" alt="Profile" >
			</div>
		</section>
	</div>
</div>


</div>
</body>
</html>
<?php
include 'includes/footer.php';
?>

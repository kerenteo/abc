<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href =".\css\bootstrap.min.css">
	<title>ABC Community Portal</title>
</head>	
<body> 
<div>  
   <?php include "includes/header.php" ?>
</div>  
    
<div class="container-fluid" style="background:#63e0d8;">
	<div row="row" >	
			<img class="img-fluid" src="http://localhost/students/SG0318A21/m5/CommunityPortal/public/images/hero.jpg" alt="Network" style="width:100%;">
	</div>
</div>    
    
<!--
<div class="container-fluid" >
	<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background:#63e0d8"> 	
    <ol class="carousel-indicators">    
        <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators1" data-slide-to="1" class="active"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active"><a href="http://localhost/students/SG0318A21/m5/CommunityPortal/public/login.php"></a>
        </div>
 
        <div class="carousel-item">
        <img src="http://localhost/students/SG0318A21/m5/CommunityPortal/public/images/hero.jpg"  
			  class="img-fluid" alt="second slide" style="width:100%;">
	   </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a>
        <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>
</div>
-->
<!--Section Portlets-->
	
<div class="container-fluid" style="background:#63e0d8;">
	<div class="card-group">
		<section class="card" style="background-color:#fff568;" id="aboutus">
			<div class="card-body">
				<h4 class="card-title" style="text-align:center">ABOUT US</h4>
				<img class="card-img img-fluid" src="http://localhost/students/SG0318A21/m5/CommunityPortal/public/images/hands.jpg" alt="hand-in-hand">
			</div>	
		</section>
			
		<section class="card" style="background-color:#f7941e" id="contactus" >
			<div class="card-body">
				<h4 class="card-title" style="text-align:center">CONTACT US</h4>
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
 
 
 
</body>
</html>
<?php
include 'includes/footer.php';
?>

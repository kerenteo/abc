<!-- Navigation Bar -->
<?php 
include_once 'autoload.php';


   if(isset($_SESSION["email"]))
   {
?>
<link rel="stylesheet" href ="http://localhost/students/SG0318A21/m5/CommunityPortal/public/css/bootstrap.min.css">
<link rel="stylesheet" href ="http://localhost/students/SG0318A21/m5/CommunityPortal/public/css/bootstrap.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://localhost/students/SG0318A21/m5/CommunityPortal/public/js/bootstrap.min.js"></script>

<nav class= "navbar navbar-expand-lg   bg-info navbar-dark" role="navigation">
<!--Logo-->
	<div class="container-fluid"  >
			<a class="navbar-brand">
			<img src="http://localhost/students/SG0318A21/m5/CommunityPortal/public/images/logo.png" align="left" style="width:55px; height:35px">		
			</a>
<!--Vavbar-->
			<button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#myTogglerNav">		
				<span class="navbar-toggler-icon"></span>
			</button>
            
        <div class="collapse navbar-collapse" id="myTogglerNav">
        	<ul class="navbar-nav mr-auto" style="font-size: 18px;" >
        		<li class="nav-item"><a class="nav-link"
        			href="/students/SG0318A21/m5/CommunityPortal/public/home.php">Home</a></li>
        		<li class="nav-item"><a class="nav-link"
        			href="/students/SG0318A21/m5/CommunityPortal/public/modules/user/updateprofile.php">Update Profile</a></li>
                			
<?php
		if($_SESSION["role"]=="admin") //add role
		{
?>
				<li class="nav-item"><a class="nav-link"
					href="/students/SG0318A21/m5/CommunityPortal/public/modules/user/userlist.php">View Users</a></li> 
				<li class="nav-item"><a class="nav-link"
					href="/students/SG0318A21/m5/CommunityPortal/public/modules/feedback/feedbacklist.php">View Feedbacks</a></li> 
                				
 <?php
		}
?>              					
				<li class="nav-item"><a class="nav-link"
					href="/students/SG0318A21/m5/CommunityPortal/public/contactus.php">Contact</a></li> 
			</ul>
       							         					           			
			<ul class=" navbar-nav navbar-right">
				<li class="nav-item"><a class="nav-link"
				href="/students/SG0318A21/m5/CommunityPortal/public/logout.php">Logout</a></li> <!--Link to the Login Page-->
			</ul>
		</div>
	</div>				
</nav>
	
<?php 
   } else
   {
?>
<nav class= "navbar navbar-expand-lg   bg-info navbar-dark" role="navigation">

<!--Logo-->
	<div class="container-fluid"  >
			<a class="navbar-brand">
			<img src="http://localhost/students/SG0318A21/m5/CommunityPortal/public/images/logo.png" align="left" style="width:55px; height:35px">		
			</a>
<!--Vavbar-->
			<button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#myTogglerNav">		
				<span class="navbar-toggler-icon"></span>
			</button>
            
        <div class="collapse navbar-collapse" id="myTogglerNav">
        	<ul class="navbar-nav mr-auto" style="font-size: 18px;" >
        		<li class="nav-item"><a class="nav-link"
        			href="/students/SG0318A21/m5/CommunityPortal/public/home.php">Home</a></li>
        		<li class="nav-item"><a class="nav-link"
        			href="/students/SG0318A21/m5/CommunityPortal/public/modules/user/updateprofile.php">Update Profile</a></li>
	      					
		 		<li class="nav-item"><a class="nav-link"
					href="/students/SG0318A21/m5/CommunityPortal/public/contactus.php">Contact</a></li>  
			</ul>
				         					           			
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item"><a class="nav-link"
				href="/students/SG0318A21/m5/CommunityPortal/public/logout.php">Logout</a></li> <!--Link to the Login Page-->
			</ul>
		</div>
	</div>
</nav>

<?php 
   } 
?>
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

<h1>Title : Thank you</h1>
<!-- !PAGE CONTENT! -->
<?php 

echo "<br>","Thank you ".$_SESSION['firstname'];

?>
</body>
</html>
<?php
include 'includes/footer.php';
?>

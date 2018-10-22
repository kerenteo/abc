<?php
session_start();
include 'includes/security.php';
include 'includes/header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>	
<body>
<br><br>
<h1>Title: Thank You</h1>

<?php
echo "<br>","Thank you ".$_SESSION['firstname']."  ".$_SESSION['lastname']. " for submitting your feedback. We are reviewing your feedback";
?>

 
</body>
</html>
<?php
include 'includes/footer.php';
?>
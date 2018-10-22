<?php
session_start();
use classes\business\UserManager;
require_once 'includes/autoload.php';
include 'includes/header.php';

?>

<?php

$id = $_GET['id'];
$subscribe = $_GET['subscribe'];
$UM = new UserManager();
$id = $UM->UnSubscribe($id, $subscribe);
$user = $UM->getUserByID($id);
$fullname = $user->firstName." ".$user->lastName;
?>

<link rel="stylesheet" href =".\css\bootstrap.min.css">
<form name="myForm" method="post" class="ml-5">
	<p><br><b><?=$fullname.", "?></b><br> You have unsubscribe to our newsletter mailing. If you wish to
		continue to receive news and updates, go to your Profile page and
		check the box under subscription.	
	<p>
		<a href="/students/SG0318A21/m5/CommunityPortal/public/modules/user/updateprofile.php">Profile
			Page</a>
</form> 

<?php
include 'includes/footer.php';
?>

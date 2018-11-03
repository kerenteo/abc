<?php
session_start();
require_once '../../includes/autoload.php';
require '../../../vendor/autoload.php';
use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;
?>

<?php

$email = $_GET['email'];
//$subscribe = $_GET['subscribe'];
echo $email;

UserManager::UnSubscribe($email);
// $user = $UM->searchByEmail($email);
// $fullname = $user->firstName . " " . $user->lastName;
?>

<link rel="stylesheet" href =".\css\bootstrap.min.css">
<form name="myForm" method="post" class="ml-5">
	<p><br><b><?=$fullname.", "?></b><br> You have unsubscribe to our newsletter mailing. If you wish to
		continue to receive news and updates, go to your Profile page and
		check the box under subscription.	
	<p>
		<a href="/students/SG0318A21/m5/CommunityPortal/public/login.php">Login
			Page</a>
</form> 



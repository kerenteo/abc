<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\FeedbackManager;
use classes\entity\Feedback;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php

$formerror = "";
$firstName = "";
$lastName = "";
$email = "";
$password = "";
$exituser = "";
$comments = "";

if (isset($_POST["submitted"])) {
    if (isset($_GET["email"])) {
        $FM = new FeedbackManager();
        $formerror = "Feedback edited sucessfully";
        $existuser = $FM->getFeedbackByEmail($_GET["email"]);
        $existuser->firstName = $_POST["firstname"];
    }
} else if (isset($_POST["cancelled"])) {
    header("Location:../../home.php");
} else {
    if (isset($_GET["id"])) {
        $FM = new FeedbackManager();
        $existuser = $FM->getFeedbackByEmail($_GET["email"]);
        $firstName = $existuser->firstName;
        $lastName = $existuser->lastName;
        $email = $existuser->email;
        $password = $existuser->password;
    }
}

?>
<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">

<form name="editUser" method="post" class="pure-form pure-form-stacked">
	<div><?=$formerror?></div>
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">Edit User</h1>
		</div>
	</div>

<?php

?>
<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="center-block col-md-6">
				<div class="jumbotron bg-light">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">

							<div class="form-group">
								<label>First Name</label> <input class="form-control"
									type="text" name="firstname" value="<?= $firstName?>"
									pattern="[ A-Za-z]{3,50}"
									title="First Name should be betweeen 3-50 characters">
							</div>

							<div class="form-group">
								<label>Last Name</label> <input class="form-control" type="text"
									name="lastname" value="<?= $lastName?>"
									pattern="[ A-Za-z]{3,50}"
									title="Last Name should be betweeen 3-50 characters">
							</div>

							<div class="form-group">
								<label>Email</label> <input class="form-control" type="text"
									name="email" value="<?= $email?>"
									pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$"
									title="Please enter a valid email" required
									placeholder="example@domain.com">
							</div>

							<div class="form-group">
								<label>Password</label> <input class="form-control"
									type="password" name="password" value="<?= $password?>"
									pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$"
									title="Password must consist of at least 6 characters with at least one uppercase letter, one lowercase letter and one digit.">
							</div>

							<div class="form-group">
								<label>Confirm Password</label> <input class="form-control"
									type="password" name="password" value="<?=$password?>"
									pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$"
									title="Password must consist of at least 6 characters with at least one uppercase letter, one lowercase letter and one digit.">
							</div>

							<div class="form-group">
								<input type="submit" name="submitted" value="Edit"
									class="btn bg-info" style="color: white; width: 49%;"> <input
									type="reset" name="cancelled" value="Cancel"
									class="btn bg-secondary" style="color: white; width: 49%;">
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
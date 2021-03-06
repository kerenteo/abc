<?php
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
?>
<link rel="stylesheet" href=".\css\bootstrap.min.css">


<div class="container-fluid p-3">
	<br>
	<h2>Job Portal</h2>
	<p>
		Tired searching for a job? Feeling helpless? Tired of waiting for a
		response after applying on those job portals? We are there to help you
		out.<br> Brand You has come up with an amazing job portal where
		candidates can apply for desired jobs and even employers can post
		their requirements.<br> With two separate registrations, this portal
		allows both candidates and the employers, an ease in searching for the
		suitable match for each other. <br>It allows the employers to send an
		email or sms to the candidates they feel are fit for the vacancy they
		have.
	</p>

	<p>
		<b>Features for Candidates:</b><br> Candidates can search for a job
		according to their preferred city.<br> Candidates can send their
		resumes to the companies which are located in their preferred cities.<br>
		Candidates can fill the bio data form which is designed for them in
		the portal with an attachment of their resume.<br> Candidates shall
		receive an email or sms if they are being short listed for the
		interview by an employer.<br>
		<br>
	</p>
	<p>
		<b>Features for Employers:</b><br> Employers can find suitable
		candidates by searching with the desired key words for the vacancy.<br>
		Employers can post the vacancies by filling up a form designed for the
		same. They can mention the job description and salary offered in that.<br>
		Employers will be allowed to send out an email or sms to those
		candidates directly who found to fit the criteria of the job opening.
	</p>
</div>
<?php
include 'includes/footer.php';
?>
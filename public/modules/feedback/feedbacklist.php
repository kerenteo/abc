<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\FeedbackManager;
use classes\business\UserManager;
use classes\entity\Feedback;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

$formerror="";
$id='';
$firstName='';
$lastName='';
$email='';
$comments='';
$user='';

?>
<br>
<!--Search User  -->

<link rel="stylesheet" href ="..\..\css\bootstrap.min.css">

<form action="feedbacklist.php" method="POST" class="form-inline ml-2">
	<div class="input-group">
    	<input class="form-control mr-sm-2" name="firstName" type="text" placeholder="Search first name" >
    	<input class="form-control mr-sm-2" name="lastName" type="text" placeholder="Search last name" >
    	<input class="form-control mr-sm-2" name="email" type="text" placeholder="Search email" >
    	<div class="input-group-append">
        	<button class="btn mr-sm-2" style="background:grey ; color:white;" name="search" type="submit">SEARCH</button>
        	<button class="btn mr-sm-2" style="background:grey ; color:white;" name="reset" type="reset">CLEAR SEARCH</button>
     	</div>
	</div>
</form>

<?php 
if(isset($_POST['search'])){
?>
    <link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
    <br/><br/><b>SEARCH FEEDBACK</b><br/><br/>
     <table class="table table-hover">        
		<tr style="background:grey ; color:white; " >   
    	<thread>
    		<th><b>Id</b></th>
    		<th><b>First Name</b></th>
    		<th><b>Last Name</b></th>
    		<th><b>Email</b></th>
    		<th><b>Comments</b></th>
    		<th><b>Operation</b></th>
    	</thread>
	</tr>	

<?php  

	
		$FM=new FeedbackManager();
	//	$results=$FM->searchByCriteria($_POST["firstname"],$_POST["lastname"],$_POST["email"]);
		$results=$FM->searchByEmail($_POST["email"]);

	
foreach ($results as $result) 
{
    if ($result!=null){
    ?>
    <tr>
    	<td><?=$result->id?></td>
   		<td data-label="First Name"><?=$result->firstName?></td>
   		<td data-label="Last Name"><?=$result->lastName?></td>
   		<td data-label="Email"><?=$result->email?></td>
   		<td data-label="Comments"><?=$result->comments?></td>
		<td>
			<a href='deletefeedback.php?id=<?php echo $comment->id ?>' class="btn btn-md btn-secondary mr-sm-2">Delete</a>
        	<a href='editfeedback.php?id=<?php echo $comment->id ?>' class="btn btn-md btn-secondary mr-sm-2">Edit</a>
		</td>
 	</tr>
 	
    <?php 
    }
}

?>
	</table><br/><br/>
<?php 
		}
	

?>



<?php 

//Feedback List
$FM=new FeedbackManager();
$feedbacks=$FM->getFeedbackByEmail($email);
$comments=$FM->getAllFeedback();
if(isset($feedbacks)){
    ?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
	<link rel="stylesheet" href ="..\..\css\bootstrap.min.css">
    <br/><br/>Below is the list of feedbacks received in this Community Portal <br/><br/>
    <table class="table table-hover">        
		<tr style="background:grey ; color:white; " >
			 <thread>	 
				<th><b>Id</b></th>
                <th><b>First Name</b></th>
                <th><b>Last Name</b></th>
                <th><b>Email</b></th>  
                <th><b>Comments</b></th>
                <th><b>Operation</b></th>
            </thread>  
		</tr>  
    <?php 
    foreach ($comments as $comment) {
        if($comment!=null){
            ?>
            <tr>
               <td><?=$comment->id?></td>
               <td><?=$comment->firstName?></td>
               <td><?=$comment->lastName?></td>
               <td><?=$comment->email?></td> 
               <td><?=$comment->comments?></td>   
			   <td>
        			<a href='deletefeedback.php?id=<?php echo $comment->id ?>' class="btn btn-md btn-secondary mr-sm-2">Delete</a>
        			<a href='editfeedback.php?id=<?php echo $comment->id ?>' class="btn btn-md btn-secondary mr-sm-2">Edit</a>
			   </td>
            </tr>
            <?php 
        }
    }
    ?>
    </table><br/><br/>
    
    <?php 
}
?>

<br>

<?php
include '../../includes/footer.php';
?>
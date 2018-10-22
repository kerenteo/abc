<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

?>
<br>
<!--Search User  -->

<link rel="stylesheet" href ="..\..\css\bootstrap.min.css">



<?php 
if(isset($_POST['search'])){
?>
    <link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
    <br/><br/><b>SEARCH RESULTS</b><br/><br/>
     <table class="table table-hover">        
		<tr style="background:grey ; color:white; " >   
    	<thread>
    		<th><b>Id</b></th>
    		<th><b>First Name</b></th>
    		<th><b>Last Name</b></th>
    		<th><b>Email</b></th>
    	</thread>
	</tr>	

<?php  

	
		$UM=new UserManager();
		$results=$UM->searchByCriteria($_POST["firstname"],$_POST["lastname"],$_POST["email"]);
		//$results=$UM->searchByEmail($_POST["email"]);

	
foreach ($results as $result) 
{
    if ($result!=null){
    ?>
    <tr>
    	<td><?=$result->id?></td>
   		<td data-label="First Name"><?=$result->firstName?></td>
   		<td data-label="Last Name"><?=$result->lastName?></td>
   		<td data-label="Email"><?=$result->email?></td>
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
//Users List
$UM=new UserManager();
$users=$UM->getAllUsers();
if(isset($users)){
    ?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
	<link rel="stylesheet" href ="..\..\css\bootstrap.min.css">
    <br/><br/>Below is the list of Developers registered in community portal <br/><br/>
    <table class="table table-hover">        
		<tr style="background:grey ; color:white; " >
			 <thread>	 
				<th><b>Id</b></th>
                <th><b>First Name</b></th>
                <th><b>Last Name</b></th>
                <th><b>Email</b></th>  
                <th><b>Operation</b></th>
            </thread>  
		</tr>  
    <?php 
    foreach ($users as $user) {
        if($user!=null){
            ?>
            <tr>
               <td><?=$user->id?></td>
               <td><?=$user->firstName?></td>
               <td><?=$user->lastName?></td>
               <td><?=$user->email?></td>            
			   <td>
			<a href='deleteuser.php?id=<?php echo $user->id ?>' class="btn btn-md btn-secondary mr-sm-2">Delete</a>
			<a href='edituser.php?id=<?php echo $user->id ?>' class="btn btn-md btn-secondary mr-sm-2">Edit</a>
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
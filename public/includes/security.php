<?php
if(!isset($_SESSION['email'])){
   // header("Location:/phpcrudsample/public/login.php");  // localhost
    header("Location:/students/SG0318A21/m5/CommunityPortal/public/login.php"); //server
}

if($_SERVER['PHP_SELF'] =="/students/SG0318A21/m5/CommunityPortal/public/modules/user/userlist.php")	
{
    if($_SESSION['role']=="user")
    {
        //header("Location:/students/SG0318A21/m5/CommunityPortal/public/login.php"); 
        echo '<meta http-equiv="Refresh" content="0; url=/students/SG0318A21/m5/CommunityPortal/public/login.php">';//content=1 sec refresh
        
    }
}
?>
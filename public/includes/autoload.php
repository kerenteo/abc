
<!-- Lithan Server -->
<?php
spl_autoload_register(function ($class_name) {
    //include $_SERVER['DOCUMENT_ROOT'] . "/phpcrudsample/" .$class_name . '.php'; // localhost
    include $_SERVER['DOCUMENT_ROOT'] . "/students/SG0318A21/m5/CommunityPortal/" .$class_name . '.php'; //server base URL
});
?>


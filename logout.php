<?php 
//destroy session
session_start();
session_destroy();
//log user out to main page
header("Location:./login.php");
?>
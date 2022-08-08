<?php 
    session_start();
    $userName = $_SESSION['userName'] ;
    $userType = $_SESSION['userType'] ;
	session_unset($userName,$userType);
	session_destroy();
	header("Location:index.php");
 ?>
<?php
ob_start();
session_start();
require('database/dbconfig.php');

if($dbconfig)
{
	//echo "database connected";
}else{
	header('Location: database/dbconfig.php');
}

if (!$_SESSION['email']) {
	header('Location:login.php');
}
else{
 			$firstname = $_SESSION["firstname"];
 			$lastname = $_SESSION["lastname"];
            $userID = $_SESSION["id"];
            $email = $_SESSION["email"];
}
?>
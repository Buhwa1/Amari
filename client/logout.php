<?php
session_start();

if (isset($_GET['l'])) 
{
	echo $_GET["l"];
	session_destroy();
	unset($_SESSION['Phone_Number']);
	header('Location: login.php');
}

?>
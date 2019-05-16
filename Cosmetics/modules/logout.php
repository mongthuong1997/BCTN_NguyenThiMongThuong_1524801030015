<?php 
	session_start();
	unset($_SESSION['user_name']);
	unset($_SESSION['name_id']);

	header("location: index.php");
?>
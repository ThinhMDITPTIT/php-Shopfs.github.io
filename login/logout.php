<?php  
	session_start();
	unset($_SESSION['admin_name']);
	unset($_SESSION['admin_id']);

	header("location: /webphp/login/index.php")
?>
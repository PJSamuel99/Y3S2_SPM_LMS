<?php
	require "db_connect.php";
	require "header.php";
	session_start();
	
	if(empty($_SESSION['type']))
		header("Location: librarian/index.php");
	else if(strcmp($_SESSION['type'], "librarian") == 0)
		header("Location: librarian/home.php");
?>

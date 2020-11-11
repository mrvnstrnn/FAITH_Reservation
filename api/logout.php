<?php
	session_start();
	include '../database/database.php';
	session_destroy();
	header("Location:" .getBaseUrl()."pages/login.php");
	die();
?>
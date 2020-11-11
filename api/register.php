<?php
	session_start();
	require('../database/database.php');
	include '../database/conncetion.php';

	$fname = $_POST['firstName'];
	$lname = $_POST['lastName'];
	$password = $_POST['password'];
	$cPassword = $_POST['cPassword'];
	$department = $_POST['department'];
	$role = $_POST['role'];

	if (!isset($fname) || $_POST['firstName'] === "") {
		$_SESSION['errorsMsg'] = 'Enter Firstname.';
		header("Location:" .getBaseUrl(). "pages/register.php");
		
	}
	if (!isset($lname) || $_POST['lastName'] === "") {
		$_SESSION['errorsMsg'] = 'Enter Lastname.';
		header("Location:" .getBaseUrl(). "pages/register.php");
		
	}
	if (!isset($password) || $_POST['password'] === "") {
		$_SESSION['errorsMsg'] = 'Enter Password.';
		header("Location:" .getBaseUrl(). "pages/register.php");
		
	}
	if (!isset($cPassword) || $_POST['cPassword'] === "") {
		$_SESSION['errorsMsg'] = 'Enter Password.';
		header("Location:" .getBaseUrl(). "pages/register.php");
		
	}
	if (!isset($department) || $_POST['department'] === "") {
		$_SESSION['errorsMsg'] = 'Enter Department.';
		header("Location:" .getBaseUrl(). "pages/register.php");
		
	}

	if (isset($_SESSION['errors']) || count($_SESSION['errors']) > 0) {
		print_r($_SESSION['errors']);
		header("Location:" .getBaseUrl(). "pages/register.php");
		die();
	}

	$query = "INSERT INTO users_tb() VALUES()";

?>
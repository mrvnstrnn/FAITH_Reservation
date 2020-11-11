<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$employeeNo = $_GET['id'];

	// print_r($employeeNo);
	// die();

	$query = "UPDATE users_tb SET status = 2 WHERE employeeNo = '$employeeNo'";
	$result = mysqli_query($con, $query);
	$stmt = mysqli_fetch_assoc($result);

	$_SESSION['msgDelete'] = "Successfully deleted user";
	header("Location: ".getBaseUrl()."pages/users.php");
	die();

?>
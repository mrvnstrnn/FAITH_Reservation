<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$message = $_POST['message'];
	$reserveId = $_POST['id'];
	$sender = $_POST['sender'];
	$employeeNo = $_POST['employeeNo'];

	// print_r($_POST);
	// die();

	$upSql = "UPDATE reserve_tb SET status = 0 WHERE reserve_id = '$reserveId' AND employeeNo = '$employeeNo'";
	$result = mysqli_query($con, $upSql);
	$upStmt = mysqli_fetch_assoc($result);

	$sql = "INSERT INTO message_tb(message, reservation_id, sender) VALUES('$message', '$reserveId', '$sender')";
	$stmt = mysqli_query($con, $sql);

	$_SESSION['message'] = 'Message sent';
	header("Location: ".getBaseUrl()."pages/requestDean.php");
	die();
?>
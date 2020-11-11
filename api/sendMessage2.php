<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$message = $_POST['message'];
	$reserveId = $_POST['id'];
	$sender = $_POST['sender'];

	// print_r($reserveId);
	// die();

	$upSql = "UPDATE reserve_tb SET status = 0 WHERE reserve_id = '$reserveId'";
	print_r($upSql);
	// die();
	$result = mysqli_query($con, $upSql);
	$upStmt = mysqli_fetch_assoc($result);

	$sql = "INSERT INTO message_tb(message, reservation_id, sender) VALUES('$message', '$reserveId', '$sender')";
	$stmt = mysqli_query($con, $sql);

	$_SESSION['message'] = 'Message sent';
	header("Location: ".getBaseUrl()."pages/request.php");
	die();
?>
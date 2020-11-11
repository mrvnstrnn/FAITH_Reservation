<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$id = $_POST['id'];

	$venueName = $_POST['venueName'];
	$venueNames = implode($venueName, ", ");

	$sql = "UPDATE reserve_tb SET venue = '$venueNames' WHERE reserve_id = '$id'";
	$stmt = mysqli_query($con, $sql);

	$_SESSION['msgRelocate'] = "Successfully relocate venue!";
	header("Location:" .getBaseUrl(). "pages/request.php");
	exit();

?>
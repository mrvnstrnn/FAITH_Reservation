<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$id = $_POST['id'];
	$status = 1;

	$sql = "UPDATE reserve_tb SET status = '$status' WHERE reserve_id = '$id'";
	$stmt = $con->prepare($sql);
    
	if($stmt->execute()){
		$_SESSION['msgApprove'] = 'Successfully approve request!';
		header('Location:' .getBaseUrl(). 'pages/requestDean.php');
		die();
	}

?>
<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$id = $_GET['id'];
	// print_r($id);

	if(isset($id)){
		$query = "UPDATE venue_tb SET status = 0 WHERE ID = '$id'";
		// $stmt = mysqli_query($con, $id);
		$stmt = $con->prepare($query);
    
		if($stmt->execute()){
			$_SESSION['msgEnable'] = 'Facility has been disabled!';
			header('Location:' .getBaseUrl(). 'pages/venue.php');
			die();
		}
	}
?>
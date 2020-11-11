<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$id = $_GET['id'];
	// print_r($id);

	if(isset($id)){
		$query = "UPDATE courses_tb SET status = 1 WHERE ID = '$id'";
		// $stmt = mysqli_query($con, $id);
		$stmt = $con->prepare($query);


    
		if($stmt->execute()){
			$_SESSION['msgEnable'] = 'Course has been enabled!';
			header('Location:' .getBaseUrl(). 'pages/course.php');
			die();
		}
	}
?>
<?php
	session_start();
	include '../database/database.php';
	require('../database/connection.php');
	
	$id = $_POST['id'];
	// $course = $_POST['course'];
	$courseDesc = $_POST['courseDesc'];
	$courseDept = $_POST['courseDept'];
	$status = $_POST['status'];


	// if (!isset($_POST['course']) || $_POST['course'] === "") {

	// 	$_SESSION['errors']['msgNotEquip'] = "Enter course Name.";

	// 	header("Location:" .getBaseUrl(). "pages/course.php");

	// 	die();

	// }

	if (!isset($_POST['courseDesc']) || $_POST['courseDesc'] === "") {

		$_SESSION['errors']['msgNotEquip'] = "Enter course description Name.";

		header("Location:" .getBaseUrl(). "pages/course.php");

		die();

	}

	if (!isset($_POST['status']) || $_POST['status'] === "") {

		$_SESSION['errors']['msgNotStatus'] = "Choose status.";

		header("Location:" .getBaseUrl(). "pages/course.php");

		die();

	}

	$queryUser = "UPDATE courses_tb SET courseDesc = '$courseDesc', courseDept = '$courseDept', status = '$status' WHERE ID = '$id'";
	$stmtUser = mysqli_query($con, $queryUser);

	$_SESSION['msgUpdate'] = $courseDesc. " successfully updated!";
	header("Location:" .getBaseUrl(). "pages/course.php");
	exit();
?>
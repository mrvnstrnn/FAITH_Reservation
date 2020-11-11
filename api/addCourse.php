<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	// $course = $_POST['course'];
	$courseDesc = $_POST['courseDesc'];
	$courseDept = $_POST['courseDept'];
	$status = $_POST['status'];
	// print_r($_POST);
	// die();

	// if (!isset($_POST['course']) || $_POST['course'] === "") {
	// 	$_SESSION['errors']['msgNotEquip'] = "Enter course name.";
	// 	header("Location:" .getBaseUrl(). "pages/course.php");
	// 	die();
	// }

	if (!isset($_POST['courseDesc']) || $_POST['courseDesc'] === "") {
		$_SESSION['errors']['msgNotEquip'] = "Enter course description.";
		header("Location:" .getBaseUrl(). "pages/course.php");
		die();
	}

	if (!isset($_POST['status']) || $_POST['status'] === "") {
		$_SESSION['errors']['msgNotStatus'] = "Enter status.";
		header("Location:" .getBaseUrl(). "pages/course.php");
		die();
	}

	$query = "INSERT INTO courses_tb(courseDesc, courseDept, status) VALUES('$courseDesc', '$courseDept', '$status')";
	$stmt = mysqli_query($con, $query);

	$_SESSION['msgAdd'] = $courseDesc. " successfully added";

	header("Location:" .getBaseUrl(). "pages/course.php");

	die();

?>
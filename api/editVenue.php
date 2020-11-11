<?php
	session_start();
	include '../database/database.php';
	require('../database/connection.php');
	
	$id = $_POST['id'];
	$venue = $_POST['venue'];
	$capacity = $_POST['capacity'];
	$status = $_POST['status'];


	if (!isset($_POST['venue']) || $_POST['venue'] === "") {

		$_SESSION['errors']['msgNotVenue'] = "Enter Venue Name.";

		header("Location:" .getBaseUrl(). "pages/venue.php");

		die();

	}

	if (!isset($_POST['capacity']) || $_POST['capacity'] === "") {

		$_SESSION['errors']['msgNotCapacity'] = "Enter capacity.";

		header("Location:" .getBaseUrl(). "pages/venue.php");

		die();

	}

	if (!isset($_POST['status']) || $_POST['status'] === "") {

		$_SESSION['errors']['msgNotStatus'] = "Choose status.";

		header("Location:" .getBaseUrl(). "pages/venue.php");

		die();

	}

	$queryUser = "UPDATE venue_tb SET nameVenue = '$venue', status = '$status', capacity = '$capacity' WHERE ID = '$id'";
	$stmtUser = mysqli_query($con, $queryUser);

	$_SESSION['msgUpdate'] = $venue. " successfully updated!";
	header("Location:" .getBaseUrl(). "pages/venue.php");
	exit();
?>
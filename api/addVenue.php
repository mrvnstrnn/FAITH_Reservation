<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$venue = $_POST['venue'];
	$capacity = $_POST['capacity'];
	$status = $_POST['status'];

	if (!isset($_POST['venue']) || $_POST['venue'] === "") {
		$_SESSION['errors']['msgNotVenue'] = "Enter venue name.";
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

	$query = "INSERT INTO venue_tb(nameVenue, capacity, status) VALUES('$venue', '$capacity', '$status')";
	$stmt = mysqli_query($con, $query);

	$_SESSION['msgAdd'] = $venue. " successfully added";

	header("Location:" .getBaseUrl(). "pages/venue.php");

	die();

?>
<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$equip = $_POST['equip'];
	$status = $_POST['status'];

	if (!isset($_POST['equip']) || $_POST['equip'] === "") {
		$_SESSION['errors']['msgNotEquip'] = "Enter equipment name.";
		header("Location:" .getBaseUrl(). "pages/equipment.php");
		die();
	}

	if (!isset($_POST['status']) || $_POST['status'] === "") {
		$_SESSION['errors']['msgNotStatus'] = "Enter status.";
		header("Location:" .getBaseUrl(). "pages/equipment.php");
		die();
	}

	$query = "INSERT INTO equipment_tb(equipmentName, status) VALUES('$equip', '$status')";
	$stmt = mysqli_query($con, $query);

	$_SESSION['msgAdd'] = $equip. " successfully added";

	header("Location:" .getBaseUrl(). "pages/equipment.php");

	die();

?>
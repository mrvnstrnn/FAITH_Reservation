<?php
	session_start();
	include '../database/database.php';
	require('../database/connection.php');
	
	$id = $_POST['id'];
	$equipName = $_POST['equipName'];
	$capacity = $_POST['capacity'];
	$addCapacity = $_POST['addCapacity'];
	$addedCap = $capacity + $addCapacity;
	$status = $_POST['status'];
	// print_r($addedCap);
	// die();


	if (!isset($_POST['equipName']) || $_POST['equipName'] === "") {

		$_SESSION['errors']['msgNotEquip'] = "Enter Equipment Name.";

		header("Location:" .getBaseUrl(). "pages/equipment.php");

		die();

	}

	if (!isset($_POST['capacity']) || $_POST['capacity'] === "") {

		$_SESSION['errors']['msgNotEquip'] = "Enter Equipment capacity.";

		header("Location:" .getBaseUrl(). "pages/equipment.php");

		die();

	}

	if (!isset($_POST['status']) || $_POST['status'] === "") {

		$_SESSION['errors']['msgNotStatus'] = "Choose status.";

		header("Location:" .getBaseUrl(). "pages/equipment.php");

		die();

	}

	$queryUser = "UPDATE equipment_tb SET equipmentName = '$equipName', capacity = '$addedCap', status = '$status' WHERE ID = '$id'";
	$stmtUser = mysqli_query($con, $queryUser);

	$_SESSION['msgUpdate'] = $equipName. " successfully updated!";
	header("Location:" .getBaseUrl(). "pages/equipment.php");
	exit();
?>
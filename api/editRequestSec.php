<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';
	
	$id = $_POST['id'];
	$purpose = $_POST['purpose'];
	$noOfParticipant = $_POST['noOfParticipant'];
	$details = $_POST['details'];

	$dateNeeded = $_POST['dateNeeded'];
	$dateNeededs = implode($dateNeeded, ", ");

	$startTime = $_POST['startTime'];
	$startTimes = implode($startTime, ", ");

	$endTime = $_POST['endTime'];
	$endTimes = implode($endTime, ", ");
 
	$venueName = $_POST['venueName'];
	$venueNames = implode($venueName, ", ");

	$equipName = $_POST['equipName'];
	$equipNames = implode($equipName, ", ");

	$capacityEquip = $_POST['capacityEquip'];
	$capacityEquips = implode(array_filter($capacityEquip, 'strlen'), ',');
	$strippedCapacitycapacityEquips = str_replace(', ', '', $capacityEquips);

	$status = 0;

	// print_r($id);
	// die();

	if (!isset($_POST['purpose']) || $_POST['purpose'] === "") {
		$_SESSION['errors']['msgNotPurpose'] = "Enter purpose.";
		header("Location:" .getBaseUrl(). "pages/editRequestSec.php?id=$id");
		die();
	}

	if (!isset($_POST['noOfParticipant']) || $_POST['noOfParticipant'] === "") {
		$_SESSION['errors']['msgNotNoOfParticipant'] = "Enter number of participants.";
		header("Location:" .getBaseUrl(). "pages/editRequestSec.php?id=$id");
		die();
	}

	if (!isset($_POST['details']) || $_POST['details'] === "") {
		$_SESSION['errors']['msgNotDetails'] = "Enter details of request(s).";
		header("Location:" .getBaseUrl(). "pages/editRequestSec.php?id=$id");
		die();
	}

	if (!isset($_POST['dateNeeded']) || $_POST['dateNeeded'] === "") {
		$_SESSION['errors']['msgNotDateNeeded'] = "Enter date needed.";
		header("Location:" .getBaseUrl(). "pages/editRequestSec.php?id=$id");
		die();
	}

	if (!isset($_POST['startTime']) || $_POST['startTime'] === "") {
		$_SESSION['errors']['msgNotStartTime'] = "Enter start time.";
		header("Location:" .getBaseUrl(). "pages/editRequestSec.php?id=$id");
		die();
	}

	if (!isset($_POST['endTime']) || $_POST['endTime'] === "") {
		$_SESSION['errors']['msgNotEndTime'] = "Enter end time.";
		header("Location:" .getBaseUrl(). "pages/editRequestSec.php?id=$id");
		die();
	}

	if (!isset($_POST['venueName']) || $_POST['venueName'] === "") {
		$_SESSION['errors']['msgNotVenueName'] = "Choose venue.";
		header("Location:" .getBaseUrl(). "pages/editRequestSec.php?id=$id");
		die();
	}

	if (!isset($_POST['equipName']) || $_POST['equipName'] === "") {
		$_SESSION['errors']['msgNotEquipName'] = "Choose equipment.";
		header("Location:" .getBaseUrl(). "pages/editRequestSec.php?id=$id");
		die();
	}

	if (!isset($_POST['capacityEquip']) || $_POST['capacityEquip'] === "") {
		$_SESSION['errors']['msgNotCapacityEquip'] = "Enter capacity.";
		header("Location:" .getBaseUrl(). "pages/editRequestSec.php?id=$id");
		die();
	}

	$sql = "UPDATE reserve_tb SET purpose = '$purpose', venue = '$venueNames', dateEvent = '$dateNeededs', startTime = '$startTimes', endTime = '$startTimes', participant = '$noOfParticipant', item = '$equipNames', itemCapacity = '$capacityEquips', detailRequest = '$details' WHERE ID = '$id'";

	// print_r($sql);
	// die();

	$stmt = $con->prepare($sql);
    
	if($stmt->execute()){
		$_SESSION['msgUpdate'] = "Successfull updating request.";
		header("Location:" .getBaseUrl(). "pages/requestSec.php");
		die();
	}
?>
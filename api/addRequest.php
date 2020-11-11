<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	date_default_timezone_set('Asia/Manila');
	$dateFile = date("Y-m-d");
	$timeFile = date("h:i:s");
	$dtFile = $dateFile. " " .$timeFile;

	$employeeNo = $_POST['employeeNo'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$purpose = $_POST['purpose'];
	$department = $_POST['department'];
	$noOfParticipant = $_POST['noOfParticipant'];
	$details = $_POST['details'];

	// $dateNeeded = array($dateNeeded);
	$dateNeeded = $_POST['dateNeeded'];
	$dateNeededss = implode($dateNeeded, ", ");
	$dateNeededs = str_replace('/', '-', $dateNeededss);
	// print_r($dateNeededss);
	// die();

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

	if (!isset($_POST['employeeNo']) || $_POST['employeeNo'] === "") {
		$_SESSION['errors']['msgNotEmployee'] = "Enter employee number.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['fname']) || $_POST['fname'] === "") {
		$_SESSION['errors']['msgNotFname'] = "Enter Firstname.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['lname']) || $_POST['lname'] === "") {
		$_SESSION['errors']['msgNotLname'] = "Enter Lastname.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['purpose']) || $_POST['purpose'] === "") {
		$_SESSION['errors']['msgNotPurpose'] = "Enter purpose.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['department']) || $_POST['department'] === "") {
		$_SESSION['errors']['msgNotDepartment'] = "Choose department.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['noOfParticipant']) || $_POST['noOfParticipant'] === "") {
		$_SESSION['errors']['msgNotNoOfParticipant'] = "Enter number of participants.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['details']) || $_POST['details'] === "") {
		$_SESSION['errors']['msgNotDetails'] = "Enter details of request(s).";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['dateNeeded']) || $_POST['dateNeeded'] === "") {
		$_SESSION['errors']['msgNotDateNeeded'] = "Enter date needed.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['startTime']) || $_POST['startTime'] === "") {
		$_SESSION['errors']['msgNotStartTime'] = "Enter start time.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['endTime']) || $_POST['endTime'] === "") {
		$_SESSION['errors']['msgNotEndTime'] = "Enter end time.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['venueName']) || $_POST['venueName'] === "") {
		$_SESSION['errors']['msgNotVenueName'] = "Choose venue.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['equipName']) || $_POST['equipName'] === "") {
		$_SESSION['errors']['msgNotEquipName'] = "Choose equipment.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	if (!isset($_POST['capacityEquip']) || $_POST['capacityEquip'] === "") {
		$_SESSION['errors']['msgNotCapacityEquip'] = "Enter capacity.";
		header("Location:" .getBaseUrl(). "pages/addRequest.php");
		die();
	}

	$sqlLast = "SELECT * FROM `reserve_tb` ORDER BY ID DESC LIMIT 1";
	$stmtLast = mysqli_query($con, $sqlLast);
	$rowLast = mysqli_fetch_assoc($stmtLast);

	$ID = $rowLast['ID']+1;

	$sql = "INSERT INTO
	reserve_tb(employeeNo, reserve_id, firstName, lastName, purpose, department, venue, participant, item, itemCapacity, detailRequest, status, dateTimeFile)

	VALUES('$employeeNo', '$ID', '$fname', '$lname', '$purpose', '$department', '$venueNames', '$noOfParticipant', '$equipNames', '$strippedCapacitycapacityEquips', '$details', '$status', '$dtFile')";
	$res = mysqli_query($con, $sql);

	$dateArray = explode(", ", $dateNeededs);
	$startTimeArray = explode(", ", $startTimes);
	$endTimeArray = explode(", ", $endTimes);
	// print_r($endTimeArray);
	// die();

	foreach($dateArray as $k => $dateInput){
		$sqls = "INSERT INTO reservedate_tb(reservation_id, dateEvent, startTime, endTime) VALUES('$ID', '$dateInput', '$startTimeArray[$k]', '$endTimeArray[$k]')";
		$ress = mysqli_query($con, $sqls);
	}

	$_SESSION['msgAdd'] = "Successfull adding request.";
	header("Location:" .getBaseUrl(). "pages/request.php");
	die();
?>
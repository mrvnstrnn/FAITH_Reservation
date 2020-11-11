<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	date_default_timezone_set('Asia/Manila');
	$dateFile = date("Y-m-d");
	$timeFile = date("h:i:s");
	$dtFile = $dateFile. " " .$timeFile;

if (isset($_POST)){
  	unset($_SESSION['errors']);
	$employeeNo = $_POST['employeeNo'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$purpose = $_POST['purpose'];
	$department = $_POST['department'];
	$noOfParticipant = $_POST['noOfParticipant'];
	$details = $_POST['details'];

	$dateNeeded = $_POST['dateNeeded'];
	$dateNeededss = implode($dateNeeded, ", ");
	$dateNeededs = str_replace('/', '-', $dateNeededss);

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

	$equipNameArray = explode(", ", $equipNames);
	$equipCapArray = explode(",", $strippedCapacitycapacityEquips);
	$venueNameArray = explode(", ", $venueNames);
	
	foreach($equipNameArray as $a => $equipNamesss){
		$capSql = "SELECT * FROM equipment_tb WHERE equipmentName = '$equipNamesss'";
		$capStmt = mysqli_query($con, $capSql);
		$capRow = mysqli_fetch_assoc($capStmt);

		if($capRow['capacity'] < $equipCapArray[$a]){
			$_SESSION['errors']['msgCapacityError'] = "Quantity reach the maximum capacity.";
		}
	}

	foreach ($venueNameArray as $k => $venueNamess) {
		$capvSql = "SELECT * FROM venue_tb WHERE nameVenue = '$venueNamess'";
		$capvStmt = mysqli_query($con, $capvSql);
		$capvRow = mysqli_fetch_assoc($capvStmt);

		if($capvRow['capacity'] < $noOfParticipant){
			$_SESSION['errors']['msgCapacityvError'] = "No. of capacity exceeds.";
		}
	}

	if (isset($_SESSION['errors']) || count($_SESSION['errors']) > 0) {
	  print_r($_SESSION['errors']);
	  header("Location:" .getBaseUrl(). "pages/addRequestSec.php");
	  die();
	}

	$sqlLast = "SELECT * FROM `reserve_tb` ORDER BY ID DESC LIMIT 1";
	$stmtLast = mysqli_query($con, $sqlLast);
	$rowLast = mysqli_fetch_assoc($stmtLast);

	$ID = $rowLast['ID'] + 1;

	$sql = "INSERT INTO
	reserve_tb(employeeNo, reserve_id,firstName, lastName, purpose, department, venue, participant, item, itemCapacity, detailRequest, status, dateTimeFile)

	VALUES('$employeeNo', '$ID','$fname', '$lname', '$purpose', '$department', '$venueNames', '$noOfParticipant', '$equipNames', '$strippedCapacitycapacityEquips', '$details', '$status', '$dtFile')";
	$res = mysqli_query($con, $sql);

	$dateArray = explode(", ", $dateNeededs);
	$startTimeArray = explode(", ", $startTimes);
	$endTimeArray = explode(", ", $endTimes);

	foreach($dateArray as $k => $dateInput){
		$sqls = "INSERT INTO reservedate_tb(reservation_id, dateEvent, startTime, endTime) VALUES('$ID', '$dateInput', '$startTime[$k]', '$endTime[$k]')";
		$ress = mysqli_query($con, $sqls);
	}

	// print_r($dateInput);
	// die();

	$_SESSION['msgAdd'] = "Successful adding request.";
	header("Location:" .getBaseUrl(). "pages/requestSec.php");
	die();
}



	// if (!isset($_POST['employeeNo']) || $_POST['employeeNo'] === "") {
	// 	$_SESSION['errors']['msgNotEmployee'] = "Enter employee number.";
	// }

	// if (!isset($_POST['fname']) || $_POST['fname'] === "") {
	// 	$_SESSION['errors']['msgNotFname'] = "Enter Firstname.";
	// }

	// if (!isset($_POST['lname']) || $_POST['lname'] === "") {
	// 	$_SESSION['errors']['msgNotLname'] = "Enter Lastname.";
	// }

	// if (!isset($_POST['purpose']) || $_POST['purpose'] === "") {
	// 	$_SESSION['errors']['msgNotPurpose'] = "Enter purpose.";
	// }

	// if (!isset($_POST['department']) || $_POST['department'] === "") {
	// 	$_SESSION['errors']['msgNotDepartment'] = "Choose department.";
	// }

	// if (!isset($_POST['noOfParticipant']) || $_POST['noOfParticipant'] === "") {
	// 	$_SESSION['errors']['msgNotNoOfParticipant'] = "Enter number of participants.";
	// }

	// if (!isset($_POST['details']) || $_POST['details'] === "") {
	// 	$_SESSION['errors']['msgNotDetails'] = "Enter details of request(s).";
	// }

	// if (!isset($_POST['dateNeeded']) || $_POST['dateNeeded'] === "") {
	// 	$_SESSION['errors']['msgNotDateNeeded'] = "Enter date needed.";
	// }

	// if (!isset($_POST['startTime']) || $_POST['startTime'] === "") {
	// 	$_SESSION['errors']['msgNotStartTime'] = "Enter start time.";
	// }

	// if (!isset($_POST['endTime']) || $_POST['endTime'] === "") {
	// 	$_SESSION['errors']['msgNotEndTime'] = "Enter end time.";
	// }

	// if (!isset($_POST['venueName']) || $_POST['venueName'] === "") {
	// 	$_SESSION['errors']['msgNotVenueName'] = "Choose venue.";
	// }

	// if (!isset($equipNames) || $equipNames === "") {
	// 	$_SESSION['errors']['msgNotEquipName'] = "Choose equipment.";
	// }

	// if (!isset($strippedCapacitycapacityEquips) || $strippedCapacitycapacityEquips === "") {
	// 	$_SESSION['errors']['msgNotCapacityEquip'] = "Enter capacity.";
	// }

?>
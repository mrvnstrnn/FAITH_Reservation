<?php
	session_start();
	include '../database/database.php';
	require('../database/connection.php');
	
	$employeeNos = $_POST['employeeNos'];
	$employeeNo = $_POST['employeeNo'];
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$department = $_POST['department'];
	$role = $_POST['role'];
	$password = $department."1234";
	$status = $_POST['status'];

	if (!isset($_POST['fname']) || $_POST['fname'] === "") {

		$_SESSION['errors']['msgNotFname'] = "Enter firsname.";

		header("Location:" .getBaseUrl(). "pages/users.php");

		die();

	}

	if (!isset($_POST['lname']) || $_POST['lname'] === "") {

		$_SESSION['errors']['msgNotLname'] = "Enter employee.";

		header("Location:" .getBaseUrl(). "pages/users.php");

		die();

	}

	if (!isset($_POST['department']) || $_POST['department'] === "") {

		$_SESSION['errors']['msgNotDepartment'] = "Choose department.";

		header("Location:" .getBaseUrl(). "pages/users.php");

		die();

	}

	if (!isset($_POST['role']) || $_POST['role'] === "") {

		$_SESSION['errors']['msgNotRole'] = "Choose role.";

		header("Location:" .getBaseUrl(). "pages/users.php");

		die();

	}

	$queryUser = "UPDATE users_tb SET employeeNo = '$employeeNo', role = '$role', status = '$status' WHERE employeeNo = '$employeeNos'";
	$stmtUser = mysqli_query($con, $queryUser);

	$queryInfo = "UPDATE user_info_tb SET employeeNo = '$employeeNo', firstName = '$firstname', lastName = '$lastname', department = '$department' WHERE employeeNo = '$employeeNos'";
	$stmtInfo = mysqli_query($con, $queryInfo);

	$_SESSION['msgUpdate'] = $employeeNo. " successfully updated!";
	header("Location:" .getBaseUrl(). "pages/users.php");
	exit();
?>
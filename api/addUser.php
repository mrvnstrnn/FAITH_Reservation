<?php
	session_start();
	include '../database/database.php';
	require('../database/connection.php');

	$employeeNo = $_POST['employeeNo'];
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$department = $_POST['department'];
	$role = $_POST['role'];
	$password = $department."1234";
	$status = 1;

	$queryCount = "SELECT * FROM users_tb WHERE employeeNo = '$employeeNo'";
	$resCount = mysqli_query($con, $queryCount);

	if(mysqli_num_rows($resCount) >= 1){
		$_SESSION['errors']['msgAlready'] = $employeeNo." number already taken.";
		header("Location:" .getBaseUrl(). "pages/users.php");
		die();
	}

	if(isset($_FILES['file'])){
	  $name_file = $_FILES['file']['name'];
	  $tmp_name = $_FILES['file']['tmp_name'];
	  $local_image = getPublicPath() . "\profile";
	  if (!file_exists($local_image)) {
	    mkdir($local_image, 0777, true);
	  }
	  
	  $upload = move_uploaded_file($tmp_name, $local_image."/".$name_file);
	  if(!$upload) {
	    $_SESSION['errors']['images'] = 'Insert image.';
	    header("Location:" .getBaseUrl(). "pages/users.php");
	    die();
	  }
	}

	// if (!isset($_POST['employeeNo']) || $_POST['employeeNo'] === "") {
	// 	$_SESSION['errors']['msgNotEmployee'] = "Enter employee number.";
	// 	header("Location:" .getBaseUrl(). "pages/users.php");
	// 	die();
	// }

	// if (!isset($_POST['fname']) || $_POST['fname'] === "") {
	// 	$_SESSION['errors']['msgNotFname'] = "Enter firsname.";
	// 	header("Location:" .getBaseUrl(). "pages/users.php");
	// 	die();
	// }

	// if (!isset($_POST['lname']) || $_POST['lname'] === "") {
	// 	$_SESSION['errors']['msgNotLname'] = "Enter employee.";
	// 	header("Location:" .getBaseUrl(). "pages/users.php");
	// 	die();
	// }

	// if (!isset($_POST['department']) || $_POST['department'] === "") {
	// 	$_SESSION['errors']['msgNotDepartment'] = "Choose department.";
	// 	header("Location:" .getBaseUrl(). "pages/users.php");
	// 	die();
	// }

	// if (!isset($_POST['role']) || $_POST['role'] === "") {
	// 	$_SESSION['errors']['msgNotRole'] = "Choose role.";
	// 	header("Location:" .getBaseUrl(). "pages/users.php");
	// 	die();
	// }
	
	$queryUser = "INSERT INTO users_tb(employeeNo, password, role, status) VALUES('$employeeNo', '$password', '$role', '$status')";
	$resUser = mysqli_query($con, $queryUser);

	$queryInfo = "INSERT INTO user_info_tb(firstName, lastName, employeeNo, department, profilePic) VALUES('$firstname', '$lastname', '$employeeNo', '$department', '$name_file')";
	$resInfo = mysqli_query($con, $queryInfo);	

	$_SESSION['msgAdd'] = $lastname. ", ".$firstname." successfully added user with a employee number of " .$employeeNo;

	header("Location:" .getBaseUrl(). "pages/users.php");

	die();
?>
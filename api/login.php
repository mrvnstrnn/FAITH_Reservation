<?php
session_start();
require('../database/database.php');
include '../database/connection.php';

$employeeNo = $_POST['username'];
$password = $_POST['password'];

if (!isset($employeeNo) || $employeeNo === "") {
  $_SESSION['errors']['employeeNo'] = 'Enter Username.';
  header("Location:" .getBaseUrl(). "pages/login.php");
}

if (!isset($password) || $password === "") {
  $_SESSION['errors']['password'] = 'Enter Password.';
  header("Location:" .getBaseUrl(). "pages/login.php");
}

$query = "SELECT * FROM users_tb WHERE employeeNo = '$employeeNo'";
$res = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($res);

if ($user) {
	if ($user['password'] == $password) {
		if($user['status'] == 1){
			$role = $user['role'];
			$_SESSION['user'] = $user;
			$_SESSION['errors'] = null;
				switch ($role) {
					case 'Dean':
						header("Location:" .getBaseUrl(). "pages/dashboard.php");
						break;
					case 'Secretary':
						header("Location:" .getBaseUrl(). "pages/dashboard.php");
						break;
					case 'Secretary of OP':
						header("Location:" .getBaseUrl(). "pages/dashboard.php");
						break;
					default:
						header("Location:" .getBaseUrl(). "admin/login.php");
						break;
				}
		} else if($user['status'] == 0) {
			$_SESSION['errors']['disableMsg'] = "Your account has been disabled! Contact Secretary of Office of the president.";
			header("Location:" .getBaseUrl(). "pages/login.php");
		} else {
			$_SESSION['errors']['notFound'] = "Username not found!";
			header("Location:" .getBaseUrl(). "pages/login.php");
		}
		
		
	} else {
		$_SESSION['errors']['wrongMsg'] = "Incorrect Username or Password!";
		header("Location:" .getBaseUrl(). "pages/login.php");
	}
	
} else {
	$_SESSION['errors']['notFound'] = "Username not found!";
	header("Location:" .getBaseUrl(). "pages/login.php");
}

?>
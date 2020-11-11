<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$employeeNo = $_POST['employeeNo'];
	$department = $_POST['department'];
	$pass = $department."1234";
	$login = 0;
	// $queryGetPass = "SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE users_tb.employeeNo = '$employeeNo'";
	// $res = mysqli_query($con, $queryGetPass);

	$queryUser = "UPDATE users_tb SET password = '$pass', loginStatus = '$login' WHERE employeeNo = '$employeeNo'";
	$stmtUser = mysqli_query($con, $queryUser);

	$_SESSION['msgReset'] = $employeeNo. " successfully reset password!";
	header("Location:" .getBaseUrl(). "pages/users.php");
	exit();

?>
<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	// print_r($_POST);
	// die();

	$employeeNo = $_POST['employeeNo'];
	$newPass = $_POST['newPass'];
	$cPass = $_POST['cPass'];
	$login = 1;

	if ($_POST['newPass'] != $_POST['cPass']) {
		$_SESSION['errors']['msgWrong'] = "Password not match.";
		header("Location:" .getBaseUrl(). "pages/dashboard.php");
		die();
	}

	if (strlen($_POST['newPass']) < 6 || strlen($_POST['cPass']) < 6 ) {
		$_SESSION['errors']['msgLack'] = "Password must contain 6 characters and above.";
		header("Location:" .getBaseUrl(). "pages/dashboard.php");
		die();
	}

	$sql = "UPDATE users_tb SET password = '$newPass', loginStatus = '$login' WHERE employeeNo = '$employeeNo'";
	$stmt = $con->prepare($sql);
    
	if($stmt->execute()){
		$_SESSION['msgSuccess'] = 'Password successfully changed. Please relogin your account!';
		header('Location:' .getBaseUrl(). 'pages/dashboard.php');
		die();
	}
?>
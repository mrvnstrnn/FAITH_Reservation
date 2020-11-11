<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	// print_r($_POST);
	// die();

	$employeeNo = $_POST['employeeNo'];
	$oPass = $_POST['oPass'];
	$newPass = $_POST['newPass'];
	$cPass = $_POST['cPass'];
	$login = 1;

	if ($_POST['newPass'] != $_POST['cPass']) {
		$_SESSION['errors']['msgWrong'] = "Password not match.";
		header("Location:" .getBaseUrl(). "pages/changePassword.php");
		die();
	}

	if (strlen($_POST['newPass']) < 6 || strlen($_POST['cPass']) < 6 ) {
		$_SESSION['errors']['msgLack'] = "Password must contain 6 characters and above.";
		header("Location:" .getBaseUrl(). "pages/changePassword.php");
		die();
	}

	$old = "SELECT * FROM users_tb WHERE employeeNo = '$employeeNo'";
	$oldStmt = mysqli_query($con, $old);
	$oldRes = mysqli_fetch_assoc($oldStmt);

	if($_POST['oPass'] != $oldRes['password']){
		$_SESSION['errors']['msgOldEr'] = "Old password not match.";
		header("Location:" .getBaseUrl(). "pages/changePassword.php");
		die();
	}

	if($_POST['newPass'] == $oldRes['password']){
		$_SESSION['errors']['msgOldEr'] = "Password must differ from old password.";
		header("Location:" .getBaseUrl(). "pages/changePassword.php");
		die();
	}

	$sql = "UPDATE users_tb SET password = '$newPass', loginStatus = '$login' WHERE employeeNo = '$employeeNo'";
	// print_r($sql);
	// die();
	$stmt = $con->prepare($sql);
    
	if($stmt->execute()){
		$_SESSION['msgSuccess'] = 'Password successfully changed.';
		header('Location:' .getBaseUrl(). 'pages/changePassword.php');
		die();
	}
?>
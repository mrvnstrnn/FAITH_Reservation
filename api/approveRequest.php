<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

	$id = $_POST['id'];
	$status = 2;

	date_default_timezone_set('Asia/Manila');
	$dateApprove = date("Y-m-d");
	$timeApprove = date("h:i:s A");

	$sqls = "SELECT * FROM reserve_tb WHERE reserve_id = '$id'";
	$stmts = mysqli_query($con, $sqls);
	$rows = mysqli_fetch_assoc($stmts);

	$itemm = explode(", ", $rows['item']);
	$itemCapacityy = explode(",", $rows['itemCapacity']);



	foreach ($itemm as $c => $items) {
		$sqlss = "SELECT * FROM equipment_tb WHERE equipmentName = '$items'";
		$stmtss = mysqli_query($con, $sqlss);
		$rowss = mysqli_fetch_assoc($stmtss);

		$sql3 = "SELECT * FROM reserve_tb WHERE reserve_id = '$id'";
		$stmt3 = mysqli_query($con, $sql3);
		$row3 = mysqli_fetch_assoc($stmt3);

		$itemCapacity3 = explode(",", $row3['itemCapacity']);
		
		// print_r($itemCapacity3[$c]. ">". $rowss['capacity']);
		// die();
		if($rowss['capacity'] < $itemCapacity3[$c]){
			$_SESSION['msgCapacityError'] = "You need to rent a equipment. Please check the equipment";
			// header('Location:' .getBaseUrl(). 'pages/request.php');
			// die();
		}
		$upDate[$c] = $rowss['capacity'] - $itemCapacity3[$c];

		// print_r($upDate);
		// die();
	}

// print_r($upDate[$c]." ");
// die();
	foreach ($itemm as $c => $items) {
		// $upDate[$c] = $rowss['capacity'] - $itemCapacity3[$c];

		// print_r($upDate[$c]);
		// die();
		$sql2 = "UPDATE equipment_tb SET capacity = '$upDate[$c]' WHERE equipmentName = '$items'";
		$stmt2 = mysqli_query($con, $sql2);
	}	

	// print_r($sql2);
	// die();

	$sql = "UPDATE reserve_tb SET status = '$status', dateApprove = '$dateApprove', timeApprove = '$timeApprove' WHERE reserve_id = '$id'";
	$stmt = $con->prepare($sql);
    
	if($stmt->execute()){
		$_SESSION['msgApprove'] = 'Successfully approve request!';
		header('Location:' .getBaseUrl(). 'pages/request.php');
		die();
	}

?>
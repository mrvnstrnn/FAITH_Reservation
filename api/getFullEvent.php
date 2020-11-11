<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

// $sql = "SELECT * FROM reserve_tb WHERE status = 2";
$sql = "SELECT * FROM reserve_tb LEFT JOIN reservedate_tb ON reserve_tb.reserve_id = reservedate_tb.reservation_id WHERE status = 2";
$result = mysqli_query($con, $sql);
// echo json_encode($row = mysqli_fetch_assoc($result))
while($row = mysqli_fetch_assoc($result)){
	$dateEvent = explode(", ",$row['dateEvent']);
	$startTime = explode(", ",$row['startTime']);
	$endTime = explode(", ",$row['endTime']);
	foreach ($dateEvent as $key => $date) {
		$items[] = [
			"title" => $row['purpose']. " " .$row['department'],
			"start" => $date. " " .$startTime[$key],
			"end" => $date. " ".$endTime[$key],
		];
	}		
}
echo json_encode($items);
?>
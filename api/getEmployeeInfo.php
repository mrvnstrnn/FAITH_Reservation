<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

$q=$_POST['employeeNo'];

$sql="SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE users_tb.employeeNo = '$q'";
$result = mysqli_query($con, $sql);

echo json_encode($row = mysqli_fetch_assoc($result))
?>
<?php
	session_start();
	require '../database/database.php';
	include '../database/connection.php';

$q=$_GET['q'];
// print_r($q);
// die();

$sql="SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE users_tb.employeeNo = '$q'";
$result = mysqli_query($con, $sql);
// print_r($sql);
// die();
while($row = mysqli_fetch_array($result)){
	$firstname = $row['firstName'];
	$lastname = $row['lastName'];
}
?>
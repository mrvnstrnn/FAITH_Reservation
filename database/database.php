<?php
	$projectName = "FAITH_Reservation/";
    $servername = "localhost";
    $dbname = "faithreservation";
    $username = "root";
    $password = "";

    // $projectName = "FAITH_Reservation/";
    // $servername = "localhost";
    // $dbname = "id9477233_faithreservation";
    // $username = "id9477233_faithreservation";
    // $password = "faithreservation";

    date_default_timezone_set('Asia/Manila');

    function getPublicPath() {
        return dirname(__DIR__);  
    }

	function getBaseUrl() {
        // output: /myproject/index.php
        $currentPath = $_SERVER['PHP_SELF'];

        // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
        $pathInfo = pathinfo($currentPath);

        // output: localhost
        $hostName = $_SERVER['HTTP_HOST'];

        // output: http://
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';

        // return: http://localhost/myproject/
        return $protocol.$hostName."/".$GLOBALS['projectName'];
    }
    function userInfo(){
        include 'connection.php';
        $user = $_SESSION['user']['employeeNo'];
        return $row = mysqli_query($con,"SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE users_tb.employeeNo = '$user'");
    }

    function getUserList(){
        include 'connection.php';
        return $row = mysqli_query($con, "SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE users_tb.role != 'Secretary of OP' AND status != 2");
    }

    function userData(){
        include 'connection.php';
        $user = $_POST['id'];
        return $row = mysqli_query($con,"SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE users_tb.employeeNo = '$user'");
    }

    function getRequestDean(){
        include 'connection.php';
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb LEFT JOIN reservedate_tb ON reserve_tb.reserve_id = reservedate_tb.reservation_id WHERE status = 1");
    }

    function getRequestSec(){
        include 'connection.php';
        $sessionDept = $_SESSION['user']['employeeNo'];
        $sessionSql = "SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE users_tb.employeeNo = '$sessionDept'";
        $stmtSql = mysqli_query($con, $sessionSql);
        $resSql = mysqli_fetch_assoc($stmtSql);
        $dept = $resSql['department'];
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb WHERE status = 0 AND department = '$dept'");
    }

    function getRequestSec2(){
        include 'connection.php';
        $sessionDept = $_SESSION['user']['employeeNo'];
        $sessionSql = "SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE users_tb.employeeNo = '$sessionDept'";
        $stmtSql = mysqli_query($con, $sessionSql);
        $resSql = mysqli_fetch_assoc($stmtSql);
        $dept = $resSql['department'];
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb WHERE status = 1 AND department = '$dept'");
    }

    function getRequestName(){
        include 'connection.php';
        $user = $_POST['id'];
        // print_r($user);
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb LEFT JOIN reservedate_tb ON reserve_tb.reserve_id = reservedate_tb.reservation_id WHERE reserve_tb.reserve_id = '$user'");
    }

    function transferLocation(){
        include 'connection.php';
        $id = $_POST['id'];
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb LEFT JOIN reservedate_tb ON reserve_tb.reserve_id = reservedate_tb.reservation_id WHERE reserve_tb.reserve_id  = '$id' AND reservedate_tb.reservation_id = '$id'");
    }

    function getMessage(){
        include 'connection.php';
        $user = $_POST['id'];
        return $row = mysqli_query($con, "SELECT * FROM message_tb WHERE reservation_id = '$user'");
    }

    function getMessage2(){
        include 'connection.php';
        $user = $_POST['id'];
        return $row = mysqli_query($con, "SELECT * FROM message2_tb WHERE reservation_id = '$user'");
    }

    function getRequestHistorySOP(){
        include 'connection.php';
        // return $row = mysqli_query($con,"SELECT * FROM reserve_tb WHERE status = 2");
        $dateToday = date('Y-m-d');
        $start = date("h:i A");
        $end = date("h: i A");
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb LEFT JOIN reservedate_tb ON reserve_tb.reserve_id = reservedate_tb.reservation_id WHERE status = 2 AND reservedate_tb.dateEvent <= '$dateToday'");
    }

    function getRequestHistoryHSOP(){
        include 'connection.php';
        $dateToday = date('Y-m-d');
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb LEFT JOIN reservedate_tb ON reserve_tb.reserve_id = reservedate_tb.reservation_id WHERE status = 2 AND reservedate_tb.dateEvent = '$dateToday'");
    }

    function getRequestHistoryHUSOP(){
        include 'connection.php';
        $dateToday = date('Y-m-d');
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb LEFT JOIN reservedate_tb ON reserve_tb.reserve_id = reservedate_tb.reservation_id WHERE status = 2 AND reservedate_tb.dateEvent > '$dateToday'");
    }

    function getRequestHistoryS(){
        include 'connection.php';
        $employeeNo = $_SESSION['user']['employeeNo'];
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb WHERE status = 2 AND employeeNo = '$employeeNo'");
    }

    function getRequestHistoryD(){
        include 'connection.php';
        $employeeNo = $_SESSION['user']['employeeNo'];
        $sessionSql = "SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE users_tb.employeeNo = '$employeeNo'";
        $stmtSql = mysqli_query($con, $sessionSql);
        $resSql = mysqli_fetch_assoc($stmtSql);
        $dept = $resSql['department'];
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb WHERE status = 2 AND department = '$dept'");
    }

    function getVenueList(){
        include 'connection.php';
        return $row = mysqli_query($con, "SELECT * FROM venue_tb");
    }

    function getCourseList(){
        include 'connection.php';
        return $row = mysqli_query($con, "SELECT * FROM courses_tb");
    }

    function getCourseListE(){
        include 'connection.php';
        return $row = mysqli_query($con, "SELECT * FROM courses_tb WHERE status != 0");
    }

    function getEquipList(){
        include 'connection.php';
        return $row = mysqli_query($con, "SELECT * FROM equipment_tb");
    }

    function getVenueListAll(){
        include 'connection.php';
        return $row = mysqli_query($con, "SELECT * FROM venue_tb WHERE status = 1");
    }

    function getEquipListAll(){
        include 'connection.php';
        return $row = mysqli_query($con, "SELECT * FROM equipment_tb WHERE status = 1");
    }

    function venueData(){
        include 'connection.php';
        $id = $_POST['id'];
        return $row = mysqli_query($con,"SELECT * FROM venue_tb WHERE ID = '$id'");
    }

    function equipData(){
        include 'connection.php';
        $id = $_POST['id'];
        return $row = mysqli_query($con,"SELECT * FROM equipment_tb WHERE ID = '$id'");
    }

    function courseData(){
        include 'connection.php';
        $id = $_POST['id'];
        return $row = mysqli_query($con,"SELECT * FROM courses_tb WHERE ID = '$id'");
    }

    function countVenue() {
        include 'connection.php';
        return $row = mysqli_query($con,"SELECT COUNT(*) AS countVenue FROM venue_tb WHERE status = 1");
    }

    function countEquip() {
        include 'connection.php';
        return $row = mysqli_query($con,"SELECT COUNT(*) AS countEquip FROM equipment_tb WHERE status = 1");
    }

    function countCourse() {
        include 'connection.php';
        return $row = mysqli_query($con,"SELECT COUNT(*) AS countCourse FROM courses_tb WHERE status = 1");
    }

    function countRequest() {
        include 'connection.php';
        return $row = mysqli_query($con,"SELECT COUNT(*) AS countRequest FROM reserve_tb WHERE status = 1");
    }

    function countRequestSec() {
        include 'connection.php';
        $employeeNo = $_SESSION['user']['employeeNo'];
        return $row = mysqli_query($con,"SELECT COUNT(*) AS countRequest FROM reserve_tb WHERE status = 0 AND employeeNo = '$employeeNo'");
    }

    function countRequestDean() {
        include 'connection.php';
        $employeeNo = $_SESSION['user']['employeeNo'];
        $sessionSql = "SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE users_tb.employeeNo = '$employeeNo'";
        $stmtSql = mysqli_query($con, $sessionSql);
        $resSql = mysqli_fetch_assoc($stmtSql);
        $dept = $resSql['department'];
        return $row = mysqli_query($con,"SELECT COUNT(*) AS countRequest FROM reserve_tb WHERE status = 0 AND department = '$dept'");
    }

    function countUser() {
        include 'connection.php';
        return $row = mysqli_query($con,"SELECT COUNT(*) AS countUser FROM users_tb WHERE status = 1 AND role != 'Secretary of OP'");
    }

    function countHistory() {
        include 'connection.php';
        return $row = mysqli_query($con,"SELECT COUNT(*) AS countHistory FROM reserve_tb WHERE status = 2");
    }

    function getInfoRequest() {
        include 'connection.php';
        $id = $_GET['id'];
        return $row = mysqli_query($con,"SELECT * FROM reserve_tb WHERE reserve_id = '$id'");
    }

    function getInfoRequest2() {
        include 'connection.php';
        $id = $_GET['id'];
        // print_r($id);
        return $row = mysqli_query($con,"SELECT * FROM reservedate_tb WHERE reservation_id = '$id'");
    }

    // function getMessage(){
    //     include 'connection.php';
    //     // print_r($ID);
    //     return $row = mysqli_query($con,"SELECT * FROM message_tb WHERE reservation_id = '$ID'");
    // }
?>
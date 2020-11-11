<?php
session_start();
require '../database/database.php';
include '../database/connection.php';
require '../fpdf/fpdf.php';
	
	$InterLigne = 7;
	$dateToday = date("M d, Y");

	$user = $_SESSION['user']['employeeNo'];

	$dept = $_POST['department'];
	$start = $_POST['startDate'];
	$end = $_POST['endDate'];

	$oldStart = date($start);
	$oldStartStamp = strtotime($oldStart);
	$newStartStamp = date('M d, Y', $oldStartStamp);

	$oldEnd = date($end);
	$oldEndStamp = strtotime($oldEnd);
	$newEndStamp = date('M d, Y', $oldEndStamp);

	$pdf = new FPDF();
	$pdf->AddPage("L");
	$pdf->SetFont('Arial','B',16);

	$pdf->SetFont('Arial','B',6);
	date_default_timezone_set('Asia/Manila');
	$dateToday = date('F d, Y');
	$pdf->ln(1);
	$txt = "date printed:   ".$dateToday;
	$pdf->MultiCell(0,$InterLigne,$txt,0,'R',0);

	$pdf->Image('../img/FAITHLogo.png',70,10,150,40,'PNG');
	$pdf->SetFont('Arial','B',10);

	$pdf->SetFont('Arial','B',10);
	$pdf->ln(40);
	$txt = "FACILITY REPORT AS OF ".$newStartStamp." - ".$newEndStamp;
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',6);
	$pdf->ln(10);
	// $txt = "Date printed: ".$dateToday;
	// $pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$width_cell=array(25,150,25,25,50);
	$pdf->SetFont('Arial','B',9);

	$pdf->SetFillColor(193,229,252); // Background color of header 
	$fill = false;
	// Header starts /// 
	// $pdf->Cell($width_cell[0],10,'Full name',1,0,'C',true); // First header column 
	$pdf->Cell($width_cell[0],10,'Department',0,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Facility',0,0,'C',true);
	// $pdf->Cell($width_cell[3],10,'Item',1,0,'C',true);
	// $pdf->Cell($width_cell[4],10,'Item Capacity',1,0,'C',true);
	// $pdf->Cell($width_cell[5],10,'Purpose',1,0,'C',true);
	// $pdf->Cell($width_cell[6],10,'Detail Request',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Date',0,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Time',0,0,'C',true);
	$pdf->Cell($width_cell[4],10,'Date & Time Approve',0,1,'C',true);

	$pdf->SetFont('Arial','',6);
	$pdf->SetFillColor(235,236,236); // Background color of header 
	$fill = false;

$sqls = "SELECT * FROM reserve_tb LEFT JOIN reservedate_tb ON reserve_tb.reserve_id = reservedate_tb.reservation_id WHERE status = 2 AND reservedate_tb.dateEvent BETWEEN '$start' AND '$end' AND reserve_tb.department = '$dept'";
$result = mysqli_query($con, $sqls);
while($rows = mysqli_fetch_assoc($result)){
	extract($rows);
	$dateEvent = explode(", ",$dateEvent);
	$startTime = explode(", ",$startTime);
	$endTime = explode(", ",$endTime);

	$oldDate = date($dateApprove. " ".$timeApprove);
	$oldDateTimeStamp = strtotime($oldDate);
	$newDateTimeFile = date('M d, Y h:i:s A', $oldDateTimeStamp);

	foreach ($dateEvent as $key => $date) {

		$oldDates = date($date);
		$oldDateStamp = strtotime($oldDates);
		$newDate = date('M d, Y', $oldDateStamp);

		$oldStartTime = date($startTime[$key]);
		$oldStartTimes = strtotime($oldStartTime);
		$newStartTimes = date('h:i A', $oldStartTimes);

		$oldEndTime = date($endTime[$key]);
		$oldEndTimes = strtotime($oldEndTime);
		$newEndTimes = date('h:i A', $oldEndTimes);

		$pdf->Cell($width_cell[0],10, $department,0,0,'C',true);
		$pdf->Cell($width_cell[1],10, $venue,0,0,'C',true);
		$pdf->Cell($width_cell[2],10, $newDate,0,0,'C',true);
		$pdf->Cell($width_cell[3],10, $newStartTimes. " - ".$newEndTimes,0,0,'C',true);
		$pdf->Cell($width_cell[4],10, $newDateTimeFile,0,1,'C',true);
	}
}

$pdf->SetFont('Arial','B',6);
$pdf->ln(5);
$txt = "printed by:   ".$user;
$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->output();

?>
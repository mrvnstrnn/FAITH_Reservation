<?php
session_start();
require '../database/database.php';
include '../database/connection.php';
require '../fpdf/fpdf.php';

	$id = $_GET['ID'];

	$user = $_SESSION['user']['employeeNo'];
	
	$sql = "SELECT * FROM reserve_tb WHERE reserve_id = '$id'";
	$stmt = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($stmt);
	extract($row);

	$sqls = "SELECT * FROM user_info_tb LEFT JOIN users_tb ON user_info_tb.employeeNo = users_tb.employeeNo WHERE user_info_tb.department = '$department' AND role = 'Dean'";
	$stmts = mysqli_query($conn, $sqls);
	$rows = mysqli_fetch_assoc($stmts);

	$sqlss = "SELECT * FROM equipment_tb WHERE status = 1";
	$stmtss = mysqli_query($conn, $sqlss);
	$rowss = mysqli_fetch_assoc($stmtss);
	extract($rowss);

	$InterLigne = 7;
	$dateToday = date("M d, Y");

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);

	$pdf->Image('../img/FAITHLogo.png',25,10,150,40,'PNG');
	$pdf->SetFont('Arial','B',10);

	$pdf->SetFont('Arial','B',6);
	$pdf->ln(-7);
	$txt = "Date printed: ". $dateToday;
	$pdf->MultiCell(0,$InterLigne,$txt,0,'R',0);

	$pdf->SetFont('Arial','B',10);
	$pdf->ln(37);
	$txt = "REQUEST FOR FACILITIES";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(5);
	$txt = "Department:   ".$department;
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                      __________________";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);


	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$oldDate = date($dateTimeFile);
	$oldDateTimeStamp = strtotime($oldDate);
	$newDateTimeFile = date('M d, Y h:i:s A', $oldDateTimeStamp);
	$txt = "                                                                                       Date Filed:   ".$newDateTimeFile;
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                                                                           ________________________";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(1);
	$txt = "Purpose:   ".$purpose;
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                 ________________________________________";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                         Number of Participants:  ".$participant;
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                                                                                        ______________";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	// $dateEvents = array();
	// $dateEventss = explode(",", $dateEvent);

	// $startTimes = array();
	// $startTimes = explode(",", $startTime);

	// $endTimes = array();
	// $endTimess = explode(",", $endTime);

	$sql2 = "SELECT * FROM reservedate_tb WHERE reservation_id = '$id'";
	$stmt2 = mysqli_query($conn, $sql2);
	// while($row2 = mysqli_fetch_assoc($stmt2)){
		for ($i=0; $i < $row2 = mysqli_fetch_assoc($stmt2) ; $i++) { 
		// }

	// foreach ($dateEventss as $i => $date) {
		$pdf->SetFont('Arial','B',8);
		$pdf->ln(1);
		$oldDateNeed = date($row2['dateEvent']);
		$oldDateNeeded = strtotime($oldDateNeed);
		$newDateNeeded = date('M d, Y', $oldDateNeeded);
		$txt = "Date Needed [Day ".($i+1). "]:  ".$newDateNeeded;
		$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

		$pdf->SetFont('Arial','B',8);
		$pdf->ln(-7);
		$oldStartTimes = date($row2['startTime']);
		$oldStartTimess = strtotime($oldStartTimes);
		$newStartTimess = date('h:i A', $oldStartTimess);

		$oldEndTimes = date($row2['endTime']);
		$oldEndTimess = strtotime($oldEndTimes);
		$newEndTimess = date('h:i A', $oldEndTimess);
		$txt = "                                     ___________________";
		$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

		$pdf->SetFont('Arial','B',8);
		$pdf->ln(-7);
		$txt = "                                                               Time Needed [Day ".($i+1). "]: ".$newStartTimess."   TO   ".$newEndTimess;
		$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

		$pdf->SetFont('Arial','B',8);
		$pdf->ln(-7);
		$txt = "                                                                                                      _______________________";
		$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);
	}
	$pdf->SetFont('Arial','B',8);
	$pdf->ln(1);
	$txt = "Details of Request(s):   ".$detailRequest;
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                      _______________________________________________________________";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',6);
	$pdf->ln(-3);
	$txt = "_______________________________________________________________________________________________________________________________________________________________";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-1);
	$txt = "VENUE: (Pls Check)";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                    EQUIPMENT: ";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-1);
	$txt = "          Description:";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	// $pdf->SetFont('Arial','B',8);
	// $pdf->ln(-7);
	// $txt = "                                                                          Maximum Capacity:";
	// $pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-8);
	$txt = "Description:                     Qty / Unit:                                                              ";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'R',0);

	// $pdf->SetFont('Arial','B',8);
	// $pdf->ln(-7);
	// $txt = "                                                                                                                 Qty / Unit:";
	// $pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(1);
	$venueArray = array();
	$venues = explode(", ", $venue);
	$itemArray = array();
	$items = explode(", ", $item);
	$itemCapacityEquip = array();
	$itemCapacitys = explode(",", $itemCapacity);

	foreach ($venues as $i => $venueNames) {
		$txt = "      ".$venueNames;
		$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);
	}

	$pdf->SetFont('Arial','B',8);
	$line = $i+1;
	$pdf->ln(-($line*7));
	foreach ($items as $a => $itemss) {
		$txt = $itemss."                                   ".$itemCapacitys[$a]."                                                                    ";
		$pdf->MultiCell(0,$InterLigne,$txt,0,'R',0);
	}
	$pdf->SetFont('Arial','I',8);
	$pdf->ln(1);
	$txt = "      To borrow a Computer & LCD Projector:";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','I',8);
	$pdf->ln(-2);
	$txt = "                                                         Proceed to the Assist and Property Office and fill-up a Borrower's Form.";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',6);
	$pdf->ln(-1);
	$txt = "_______________________________________________________________________________________________________________________________________________________________";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	// $pdf->SetFont('Arial','B',8);
	// $pdf->ln(-($count*7));
	// $sqls = "SELECT * FROM venue_tb WHERE status = 1";
	// $stmts = mysqli_query($conn, $sqls);
	// while($rows = mysqli_fetch_assoc($stmts)){
	// 	extract($rows);
	// 	$txt = "___".$capacity;
	// 	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);
	// }

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(1);
	$txt = "Requested by:";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','U',8);
	$pdf->ln(1);
	$txtSS = "Requested by:";
	// $pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                                Noted by:";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                                                            Approved by:";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(3);
	$txt = "               ".$lastName.", ".$firstName."     ";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "     _________________________     ";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                                       ".$rows['firstName']." ".$rows['lastName']."     ";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                               _______________________";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                                             _________________";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                                             ____________________            ";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'R',0);

	$pdf->SetFont('Arial','I',8);
	$pdf->ln(-3);
	$txt = "                                                                    Adviser/Dept. Head/Dean";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                                           Joven Flores";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','B',8);
	$pdf->ln(-7);
	$txt = "                                                                                   Danny B. Malabonga               ";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'R',0);

	$pdf->SetFont('Arial','I',7);
	$pdf->ln(-3);
	$txt = "                                                                           Facilities & Housekeeping Supervisor";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'C',0);

	$pdf->SetFont('Arial','I',7);
	$pdf->ln(-7);
	$txt = "                                                                                   VP - Physical Plant & Facilities            ";
	$pdf->MultiCell(0,$InterLigne,$txt,0,'R',0);

	$pdf->SetFont('Arial','B',6);
	$pdf->ln(5);
	$txt = "printed by: ".$user;
	$pdf->MultiCell(0,$InterLigne,$txt,0,'L',0);

	$fill = false;


	$pdf->output();

?>
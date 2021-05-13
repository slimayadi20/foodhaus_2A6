<?php
//include connection file
include_once("./connection.php");;
include_once("../libs/fpdf.php");
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',5,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Users List',1,0,'C');
    // Line break
    $this->Ln(40);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,20,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$db = new dbObj();
$connString =  $db->getconnString();
// $display_heading = array('user_id'=>'user_id', 'user_name'=>'user_name', 'user_email'=>'user_email', 'user_role'=>'user_role');

$result = mysqli_query($connString, "SELECT user_id, user_name,user_role, user_email  FROM users") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM users");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
 // $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(46,10,$column,1);
}
$pdf->Output();

<?php

$no=$_POST['flat'];
$area=$_POST['area'];
$city=$_POST['city'];
$state=$_POST['state'];
$pin=$_POST['pin'];
$phone=$_POST['phnno'];
$mail=$_POST['mailid'];
$password=$_POST['password'];





require("fpdf17/fpdf.php");
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",16);

$pdf->Cell(0,10,"Welcome",0,1,"C");

$pdf->Cell(0,0,"",0,1);

$pdf->Cell(0,0,"",0,1);

$pdf->Cell(80,10,"Flat no:",1,0);
$pdf->Cell(80,10,$no,1,1);

$pdf->Cell(80,10,"Area:",1,0);
$pdf->Cell(80,10,$area,1,1);

$pdf->Cell(80,10,"City:",1,0);
$pdf->Cell(80,10,$city,1,1);

$pdf->Cell(80,10,"State:",1,0);
$pdf->Cell(80,10,$state,1,1);

$pdf->Cell(80,10,"Pin code:",1,0);
$pdf->Cell(80,10,$pin,1,1);

$pdf->Cell(80,10,"Mail id:",1,0);
$pdf->Cell(80,10,$mail,1,1);


$pdf->output();
?>
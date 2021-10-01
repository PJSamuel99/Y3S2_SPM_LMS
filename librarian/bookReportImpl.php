<?php
require('fpdf/fpdf.php');
$con = mysqli_connect('localhost', 'root', '', 'library_db');

$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'Books Reports ',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,7,'',0,1);	
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'ISBN',1,0);
$pdf->Cell(50,6,'Title',1,0);
$pdf->Cell(50,6,'Author',1,0);
$pdf->Cell(25,6,'Category',1,0);
$pdf->Cell(20,6,'Price',1,0);
$pdf->Cell(20,6,'Copies',1,1);
$pdf->SetFont('Arial','',10);
$sql = "SELECT * FROM book";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()){
    $pdf->Cell(30,6,$row['isbn'],1,0);
    $pdf->Cell(50,6,$row['title'],1,0);
    $pdf->Cell(50,6,$row['author'],1,0);
    $pdf->Cell(25,6,$row['category'],1,0); 
    $pdf->Cell(20,6,$row['price'],1,0); 
    $pdf->Cell(20,6,$row['copies'],1,1); 
}$pdf->Output(); 
?>
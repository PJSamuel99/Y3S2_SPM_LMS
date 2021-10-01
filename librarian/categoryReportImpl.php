<?php
require('fpdf/fpdf.php');
$con = mysqli_connect('localhost', 'root', '', 'library_db');

$pdf = new FPDF('l','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'Category Report ',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,7,'',0,1);	
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,6,'Category',1,1);
$pdf->SetFont('Arial','',10);
$sql = "SELECT * FROM categories";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()){
    $pdf->Cell(60,6,$row['category_name'],1,1); 
}$pdf->Output(); 
?>
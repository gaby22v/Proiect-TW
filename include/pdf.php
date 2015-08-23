<?php 
require 'fpdf.php';
require 'config.php';
$query = "SELECT * from client";
$rezultat = mysqli_query($conectare,$query);
while ($list = mysqli_fetch_assoc($rezultat))
 {  
  // Stocheaza datele returnate de MySQL in variabile array pt. fiecare coloana
  $id[] = $list['cod_client'];
  $nume[] = $list['nume_client'];
  $prenume[] = $list['prenume_client'];
  $tip[] = $list['tip_client'];
  $adresa[] = $list['adresa_client'];
  $telefon[] = $list['telefon_client'];
  
}
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(50,10,"Lista clientilor");
$pdf->Ln(20);
for($i=0; $i<count($id); $i++)
{
echo $pdf->Cell(37,10,$nume[$i],1);
echo $pdf->Cell(30,10,$prenume[$i],1);
echo $pdf->Cell(30,10,$tip[$i],1);
echo $pdf->Cell(70,10,$adresa[$i],1);
echo $pdf->MultiCell(50,10,$telefon[$i],1);
}
$pdf->Output();
?>
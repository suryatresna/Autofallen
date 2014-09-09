<?php
include "../../config/modul/db.class.php";
include "engine.php";
$db = new db();
$db->opendb();
$pdf = new PDF();

$pdf->set_title('Auto Fallen');
$pdf->AliasNbPages();
$pdf->AddPage();


$pages = array(
'custumer'=>'custumer.php',
'kendaraan'=>'kendaraan.php',
'user'=>'user.php',
'transaksi'=>'transaksi.php'
);

if(isset($_GET['tb'])){
	include $pages[$_GET['tb']];
}
else {
	print "<script>alert('Error Create Report.!')</script>";	
}

$pdf->Ln();
$pdf->SetX(150);
$pdf->Cell(40,6,'Padang Panjang, '.date("d M Y"));$pdf->Ln();
$pdf->SetX(150);
$pdf->Cell(40,6,'Operator');$pdf->Ln();
$pdf->Output();
?>
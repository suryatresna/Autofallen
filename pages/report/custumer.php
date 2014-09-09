<?php
$pdf->TitleLaporan('Daftar Laporan Pelanggan');
$sql=mysql_query("SELECT * FROM pelanggan");

$w= array(20,40,40,30);
$headtb = array(
'ID'=>'8',
'Nama'=>'57',
'Alamat'=>'50',
'Telepon'=>'40',
'Date In'=>'40',
);
$tbh = array('nama','alamat','telp','timestamp','id');

$s = $db->selectTb('custumer',$tbh);
$tb = $db->qry($s);
$count = mysql_num_rows($tb);

$pdf->SetFont('Arial','B',10);

$pdf->headerTable($headtb);
$i=1;
$pdf->SetFont('Arial','',10);
while($data=mysql_fetch_array($tb)){
	 $pdf->Cell(8,6,$data['id'],1,'','C');
	 $pdf->Cell(57,6,$data['nama'],1);
	 $pdf->Cell(50,6,$data['alamat'],1);
	 $pdf->Cell(40,6,$data['telp'],1);
	 $pdf->Cell(40,6,$data['timestamp'],1);
	 $pdf->Ln();
	 $i++;	
}
$count = mysql_num_rows($tb);
$pdf->Cell(30,6,'Count',1,'','C');$pdf->Cell(165,6,$count,1,'','R');
$pdf->Ln();
/*$pdf->Cell(30,6,'Sum',1,'','C');$pdf->Cell(165,6,'Rp. '.number_format($dataSum[0]),1,'','R');
$pdf->Ln();
$pdf->Cell(30,6,'Max',1,'','C');$pdf->Cell(165,6,'Rp. '.number_format(match('MAX','biaya','pendaftaran')),1,'','R');
$pdf->Ln();
$pdf->Cell(30,6,'Min',1,'','C');$pdf->Cell(165,6,'Rp. '.number_format(match('MIN','biaya','pendaftaran')),1,'','R');
$pdf->Ln();
$pdf->Cell(30,6,'Average',1,'','C');$pdf->Cell(165,6,'Rp. '.number_format(match('AVG','biaya','pendaftaran')),1,'','R');*/
?>
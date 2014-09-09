<?php
$pdf->TitleLaporan('Daftar Laporan User');
$sql=mysql_query("SELECT * FROM pelanggan");

$w= array(20,40,40,30);
$headtb = array(
'No'=>'8',
'User'=>'20',
'Name'=>'42',
'Address'=>'28',
'Email'=>'40',
'Handphone'=>'30',
'Type'=>'27',
);
$tbh = array('user','pass','name','email','hp','address','type','id','status');

$s = $db->selectTb('access_user',$tbh);
$tb = $db->qry($s);
$count = mysql_num_rows($tb);

$pdf->SetFont('Arial','B',10);

$pdf->headerTable($headtb);
$i=1;
$pdf->SetFont('Arial','',10);
while($data=mysql_fetch_array($tb)){
	 $pdf->Cell(8,6,$i,1,'','C');
	 $pdf->Cell(20,6,$data['user'],1);
	 $pdf->Cell(42,6,$data['name'],1);
	 $pdf->Cell(28,6,$data['address'],1);
	 $pdf->Cell(40,6,$data['email'],1);
	 $pdf->Cell(30,6,$data['hp'],1);
	 $pdf->Cell(27,6,$db->searchId('access_type','type','id',$data['type']),1);
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
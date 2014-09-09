<?php
$pdf->TitleLaporan('Daftar Laporan Transaksi');
$sql=mysql_query("SELECT * FROM pelanggan");

$w= array(20,40,40,30);
$headtb = array(
'No'=>'8',
'Tanggal Beli'=>'25',
'Payment'=>'23',
'Custumer'=>'35',
'Leasing'=>'35',
'Nomor Polisi'=>'25',
'User'=>'26',
'Status'=>'18'
);
$tbh = array('id',"DATE_FORMAT(tglBayar,'%d %b, %Y') as tgl",'payment','leasingId','custumerId','kendaraanId','userId');

$s = $db->selectTb('transaksi',$tbh);
$tb = $db->qry($s);
$count = mysql_num_rows($tb);

$pdf->SetFont('Arial','B',10);

$pdf->headerTable($headtb);
$i=1;
$pdf->SetFont('Arial','',10);
while($data=mysql_fetch_array($tb)){
	$hargaJual = $db->searchId('kendaraan','hargaJual','id',$data['kendaraanId']);
					if($db->cari_bayar($data['id']) >= $hargaJual){
						$st='Lunas';
						$pdf->SetTextColor(0);
					}
					else{
						$pdf->SetTextColor(200,49,50);
						$st='Credit';
					}
	 $pdf->Cell(8,6,$i,1,'','C');
	 $pdf->Cell(25,6,$data[1],1);
	 $pdf->Cell(23,6,$db->searchId('transaksi_payment','payment','id',$data['payment']),1);
	 $pdf->Cell(35,6,$db->searchId('custumer','nama','id',$data['custumerId']),1);
	 $pdf->Cell(35,6,substr($db->searchId('leasing','nama','id',$data['leasingId']),0,15).'...',1);
	 $pdf->Cell(25,6,$db->searchId('kendaraan','no_pol','id',$data['kendaraanId']),1);
	 $pdf->Cell(26,6,$db->searchId('access_user','user','id',$data['userId']),1);
	 $pdf->Cell(18,6,$st,1,0);
	 $pdf->Ln();
	 $i++;	
}
$count = mysql_num_rows($tb);
$pdf->SetTextColor(0);
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
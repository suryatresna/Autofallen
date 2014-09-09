<?php
$pdf->TitleLaporan('Daftar Laporan Kendaraan');
$sql=mysql_query("SELECT * FROM pelanggan");

$w= array(20,40,40,30);
$headtb = array(
'ID'=>'8',
'No Polisi'=>'27',
'Warna'=>'18',
'Tipe'=>'31',
'Harga Jual'=>'32',
'Harga Pokok'=>'32',
'Tahun'=>'20',
'Pemilik'=>'27',
);
$tbh = array('no_pol','warna','type','hargaJual','hargaPokok','th','pemilik','id','status');

$s = $db->selectTb('kendaraan',$tbh);
$tb = $db->qry($s);
$count = mysql_num_rows($tb);

$pdf->SetFont('Arial','B',10);

$pdf->headerTable($headtb);
$i=1;
$pdf->SetFont('Arial','',10);
while($data=mysql_fetch_array($tb)){
	 $pdf->Cell(8,6,$i,1,'','C');
	 $pdf->Cell(27,6,$data['no_pol'],1);
	 $pdf->Cell(18,6,$db->searchId('kendaraan_warna','warna','id',$data['warna']),1);
	 $pdf->Cell(31,6,$db->searchId('kendaraan_type','type','id',$data['type']),1);
	 $pdf->Cell(32,6,"Rp. ".number_format($data['hargaJual']),1);
	 $pdf->Cell(32,6,"Rp. ".number_format($data['hargaPokok']),1);
	 $pdf->Cell(20,6,$data['th'],1);
	 $pdf->Cell(27,6,$data['pemilik'],1);
	 $pdf->Ln();
	 $i++;	
}
$count = mysql_num_rows($tb);
$pdf->Cell(30,6,'Count',1,'','C');$pdf->Cell(165,6,$count,1,'','R');
$pdf->Ln();

$pdf->Cell(30,6,'Max',1,'','C');$pdf->Cell(165,6,'Rp. '.number_format($pdf->match('MAX','hargaJual','kendaraan')),1,'','R');
$pdf->Ln();
$pdf->Cell(30,6,'Min',1,'','C');$pdf->Cell(165,6,'Rp. '.number_format($pdf->match('MIN','hargaJual','kendaraan')),1,'','R');
$pdf->Ln();
$pdf->Cell(30,6,'Average',1,'','C');$pdf->Cell(165,6,'Rp. '.number_format($pdf->match('AVG','hargaJual','kendaraan')),1,'','R');
?>
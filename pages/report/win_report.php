<?php
include "../../config/modul/db.class.php";
$db = new db();
$db->opendb();

//print_r($_GET);


?>
<table width="100%">
<tr>
<td width="20%"></td>
<td width="60%" align="center" valign="middle"><h1>AUTO FALLEN</h1></td>
<td width="20%"></td>
</tr>
</table>
<HR />
<table width="100%">
<tr><td width="100%" align="right"><a onclick="print()" style="display:block; padding:3px; border:1px solid #eee;float:right;cursor:pointer">Cetak Dokumen</a></td></tr>
</table>
<?php

$detail = array(
	'Transaksi ID'=>$_GET['id'],
	'Pelanggan'=>$db->searchId('custumer','nama','id',$db->searchId('transaksi','custumerId','id',$_GET['id'])),
	'Leasing'=>$db->searchId('leasing','nama','id',$db->searchId('transaksi','leasingId','id',$_GET['id'])),
	'No Polisi'=>$db->searchId('kendaraan','no_pol','id',$db->searchId('transaksi','kendaraanId','id',$_GET['id'])),
	'Payment'=>$db->searchId('transaksi_payment','payment','id',$db->searchId('transaksi','payment','id',$_GET['id'])),
	'Harga Jual'=>'Rp. '.number_format($db->total_bayar_bunga($db->searchId('kendaraan','hargaJual','id',$db->searchId('transaksi',			'kendaraanId','id',$_GET['id'])),$db->bunga_leasing($db->searchId('transaksi_payment','bunga','id',$db->searchId('transaksi','payment','id',$_GET['id']))))),
	'Total Bayar'=>'Rp. '.number_format($db->sqlAnalist('SUM','transaksi_detail','bayar','transaksiId',$_GET['id'])),
);

if($_GET['pay'] != 1){
	$form = array(
	'DP'=>'Rp. '.number_format($db->dp_cari($_GET['id'])),
	'Bayar Per Bulan'=>'Rp. '.number_format($db->bayar_per_bulan($_GET['id'])),
	);	
	
	$temp = "";
	$temp .="<tr>";
	$temp .='<th width="6%">No</th><th width="20%">Tanggal</th><th width="20%">Tanggal Bayar</th><th width="5%">Pinalty</th><th width="30%">Bayar</th><th width="5%">Status</th>';
	$temp .="</tr>";
	
	$s = $db->searchId('transaksi_payment','lama','id',$db->searchId('transaksi','payment','id',$_GET['id']));
  $tgl_awl = $db->searchId('transaksi','tglBayar','id',$_GET['id']);
	$days = array(); 
  for($i=1;$i<=$s;$i++){
	  
	  if($db->set_status_sama($db->bayar_per_bulan($_GET['id']),$db->get_bayar_store($_GET['id'],$i)) == 1){
		$status = 'Lunas';  
	  }
	  else {
		$status = "Belum Lunas";	  
	  }
	  
	  $days[$i]=$db->tambah_hari($tgl_awl,($i*30),'m');
	  $temp .= "<tr>";
	$temp .= "<td>".$i."</td>";
	$temp .= "<td>".$db->tambah_hari($tgl_awl,($i*30),'d M, Y')."</td>";
	$temp .= "<td>".$db->get_tgl_store($_GET['id'],$i,'d M, Y')."</td>";
	$temp .= "<td>".$db->pinalty($db->tambah_hari($tgl_awl,($i*30),'d M, Y'),$db->get_tgl_store($_GET['id'],$i,'d M, Y'))."</td>";
	$temp .= "<td>Rp.".number_format($db->get_bayar_store($_GET['id'],$i))." </td>";
	$temp .= "<td>".$status."</td>";
	$temp .= "</tr>";
  } 
}
else {
	$form = array(
	'Bayar'=>'Rp. '.number_format($db->dp_cari($_GET['id'])),
	);
	$temp = '';
}

print "<table cellpadding='5' width='100%' border='1'>";

foreach($detail as $f => $v)
{
	print"<tr>";
	print "<td><b>".$f."</b></td><td>".$v."</td>";
	print "</tr>";	
}
foreach($form as $f => $v)
{
	print"<tr>";
	print "<td><b>".$f."</b></td><td>".$v."</td>";
	print "</tr>";
}


print "</table>";
print "</hr>";

print "<table cellpadding='5' width='100%' border='1'>";
print $temp;
print "</table>";

print "<table width='100%'>";
print "<tr><td align='right'>".date('d F Y')."</td></tr>";
print "</table>";

print "<table width='100%'>";
print "<tr>";
print "<td width='30%'></td>";
print "<td width='30%'></td>";
print "<td width='30%' height='90' align='center' valign='top'>Operator</td>";
print "</tr>";
print "<tr>";
print "<td width='30%'></td>";
print "<td width='30%'></td>";
print "<td width='30%' align='center' valign='top'>".$db->searchId('access_user','name','user',$_GET['user'])."</td>";
print "</tr>";
print "</table>";


?>
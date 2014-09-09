<?php
include_once "../../config/modul/db.class.php";
$db= new db();
$db->opendb();

header("Content-type: text/xml");
print"<?phpxml version='1.0' encoding='utf-8' standalone='no' ?>";

print "<transaksis>";
 
	 
 	$date1 = date('Y-m-d',strtotime($_GET['date1']));
	$date2 = date('Y-m-d',strtotime($_GET['date2']));
	
	$i = $db->long_day($date1,$date2);
	
	$c = 2015-2012;
	
	$hari = 1;
	$bulan = 31;
	$tahun = 360 * $c;
	
	for($x=1;$x<=$i;$x+=$bulan){
		
		$qry=$db->qry('SELECT (AVG(bayar)/100000) FROM transaksi_detail WHERE MONTH(tglBayar) ="'.$db->tambah_hari($date1,$x,'m').'"  ');
		$data = mysql_fetch_array($qry);
		
	print "<transaksi>";
	print "<tanggal>".$db->tambah_hari($date1,$x,'Y-m-d')."</tanggal>";
	print "<value>".ceil($data[0])."</value>";
 	print "</transaksi>";
	
	}
	
 	/*$qry=mysql_query("SELECT tglBayar,bayar FROM transaksi_detail");
	while($data=mysql_fetch_row($qry)){
 	print "<transaksi>";
	print "<bulan>".$data[0]."</bulan>";
	print "<value>".$data[1]."</value>";
 	print "</transaksi>";
	}*/
 
print "</transaksis>";

?>
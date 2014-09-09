<?php
include "../../config/modul/db.class.php";
$db = new db();
$db->opendb();

/*$q = strtolower($_GET["term"]);
if (!$q) return;*/

$qry =$db->qry("SELECT * FROM kendaraan WHERE status = 1");

header("Content-type: text/xml");
print "<?phpxml version='1.0' encoding='utf-8'  standalone='no' ?>";

print "<cari>";
	
	while($data = mysql_fetch_array($qry)){
		print "<kendaraan id='".$data['no_pol']."'>";
			print "<id>".$data['id']."</id>";
			print "<no_pol>".$data['no_pol']."</no_pol>";
			print "<pemilik>".$data['pemilik']."</pemilik>";
			print "<hargaPokok>Rp. ".number_format($data['hargaPokok'])."</hargaPokok>";
			print "<hargaJual>Rp. ".number_format($data['hargaJual'])."</hargaJual>";
			print "<type>".$db->searchId('kendaraan_type','type','id',$data['type'])."</type>";
		
		print "</kendaraan>";	
	}

print "</cari>";

?>
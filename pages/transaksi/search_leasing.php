<?php
include "../../config/modul/db.class.php";
$db = new db();
$db->opendb();

/*$q = strtolower($_GET["term"]);
if (!$q) return;*/

$qry =$db->qry("SELECT * FROM leasing WHERE status = 1");

header("Content-type: text/xml");
print "<?phpxml version='1.0' encoding='utf-8'  standalone='no' ?>";

print "<cari>";
	
	while($data = mysql_fetch_array($qry)){
		print "<leasing id='".$data['id']."'>";
			print "<id>".$data['id']."</id>";
			print "<nama>".$data['nama']."</nama>";
			print "<telp>".$data['telp']."</telp>";
		
		print "</leasing>";	
	}

print "</cari>";

?>
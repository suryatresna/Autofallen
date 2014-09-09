<?php
include "../../config/modul/db.class.php";
$db = new db();
$db->opendb();
header("Content-type: text/xml");
print "<?phpxml version='1.0' encoding='utf-8' ?>";
print"<table>";

$qry=$db->qry("SELECT * FROM custumer");
	while($data=mysql_fetch_array($qry)){
	print"<custumer id='".$data['id']."'>";
		print"<nama>".$data['nama']."</nama>";
		print"<alamat>".$data['alamat']."</alamat>";	
		print"<telp>".$data['telp']."</telp>";	
		print"<type>".$data['type']."</type>";
		print"<status>".$data['status']."</status>";			
	print"</custumer>";
	}

print"</table>";


?>
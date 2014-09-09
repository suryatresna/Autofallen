<?php
include_once "../../config/modul/db.class.php";
$db= new db();
$db->opendb();


	if($_GET['id']=='sales'){
	$query = "SELECT tglBayar, COUNT(bayar) FROM  `transaksi_detail` GROUP BY MONTH(tglBayar)";
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());

	// get data and store in a json array
	$i = 1;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'id'=>$i,
			'tglBayar' => $row['tglBayar'],
			'value' => $row['COUNT(bayar)'],
		  );
		  $i++;
	}

	
	}
	elseif($_GET['id']=='vicile'){
		
	$query = "SELECT kendaraan_type.type, COUNT(kendaraan.id) FROM kendaraan INNER JOIN kendaraan_type ON kendaraan.type = kendaraan_type.id GROUP BY kendaraan.type ";	
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());

	// get data and store in a json array
	$i = 1;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'id'=>$i,
			'tipe' => $row['type'],
			'value' => $row['COUNT(kendaraan.id)'],
		  );
		  $i++;
	}
	

	
	
	}
	elseif($_GET['id']=='sell'){
		
	$query = "SELECT (kendaraan_type.type), COUNT(custumer.id)  \n"
    . "FROM transaksi,custumer, kendaraan INNER JOIN kendaraan_type ON kendaraan.type = kendaraan_type.id\n"
    . "WHERE transaksi.custumerId = custumer.id\n"
    . "AND transaksi.kendaraanId = kendaraan.id\n"
    . "GROUP BY kendaraan_type.type\n";
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());

	// get data and store in a json array
	$i = 1;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'id'=>$i,
			'tipe' => $row['type'],
			'value' => $row['COUNT(custumer.id)'],
		  );
		  $i++;
	}
	

	
	
	}
	
	
	echo json_encode($orders);

?>
<?php
include_once "../../config/modul/db.class.php";
$db= new db();
$db->opendb();

$query = "SELECT tglBayar, CEILING(SUM(bayar)/10000000) FROM  `transaksi_detail` GROUP BY MONTH(tglBayar) LIMIT 0 , 100";
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());

	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'tglBayar' => $row['tglBayar'],
			'value' => $row['CEILING(SUM(bayar)/10000000)'],
		  );
	}

	echo json_encode($orders);

?>
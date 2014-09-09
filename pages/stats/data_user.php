<?php
include_once "../../config/modul/db.class.php";
$db= new db();
$db->opendb();


	$sql = "SELECT access_type.type, COUNT(access.cview) \n"
    . "FROM access, access_type\n"
    . "WHERE access.idType = access_type.id\n"
    . "GROUP BY access_type.type";
	$result = mysql_query($sql) or die("SQL Error 1: " . mysql_error());

	// get data and store in a json array
	$i = 1;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'id'=>$i,
			'type' => $row['type'],
			'value' => $row['COUNT(access.cview)'],
		  );
		  $i++;
	}

	

	
	
	echo json_encode($orders);

?>
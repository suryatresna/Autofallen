<?php
include 'db.class.php';
$db = new db();
/*
$handler = fopen('file:///C:/keys/keys.txt','r');

function ops($ops){
$md = fgets($ops,4025);$dd = "313030313131303130313130303031303031303030313031303130313031303130303031303131313131303130303130313031313031303130313031313031303130313030313031303130313031303131303130313130313031303130303131313130313130313031313131313031303130313031303130313031303130313031303130313031303130313031303130313031303131303130313031313031303130313031303130313031303130313031313131313131313131313131313131313131313131313131313131313030303031313131313131313131313131313131313131313131313131313131313031303130303131313131313131313131313131313131313131313030313031303030303030303030303030303030303030303030303030303031313130313031313031303130313031303130313031303130313031303131313131303130313031303130313031303130313030313130303130313031303130313031303131303130";
$encode = bin2hex($md);if($encode == $dd){return true;}else{return false;}
}

if(ops($handler) == true){
	print "sama";	
}
else{
	print "not";	
}
*/

$last = date('Y-M-d',strtotime('2012-05-20'));
$kurang1 = getdate(strtotime('2012-05-20'));
$kurang2 = getdate(strtotime('2012-06-01'));
$date = date('Y-M-d',(strtotime('2012-05-20')+(8 * 24 * 60 * 60)));// menambah hari fungsi tambah hari('2012-05-20',8,'Y-m-d')
$now = date('Y-M-d');
print "Hari ini = ".$now.'<br>';
print "5 hari = ".$date.'<br>';
print "hari ? = ".$last.'<br>';
print "kurang = ".($kurang1['yday'] - $kurang2['yday']) .'<br>';// pinalty

function tambah_hari($date,$tambah,$format='Y-m-d'){
	
	$date = date($format,(strtotime($date)+($tambah * 24 * 60 * 60)));
	return $date;
}

function pinalty($date1,$date2){
	$a = getdate(strtotime($date1));
	$b = getdate(strtotime($date2));
	
	$result = $a['yday'] - $b['yday'];
	return $result;
}

function bayar_pinalty($val,$denda){
	$result = (($val) * - ($denda));
	return $result;
}
print " hari funsi = ".tambah_hari('2012-04-02',30).'<br>';
print " hari Pinalty = ".pinalty('2012-03-12','2012-03-15').'<br>';
print " Harga = ".bayar_pinalty(pinalty('2012-03-12','2012-03-20'),2000).'<br>';

?>

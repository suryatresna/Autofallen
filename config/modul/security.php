<?php include "../modul/db.class.php";
$db = new db();
$db->opendb();
$user = $_REQUEST['user'];
$pass = $_REQUEST['password'];
$qry = $db->qry("SELECT * FROM access_user WHERE user = '".$user."' AND pass = '".$pass."'");
$count = mysql_num_rows($qry);
$data = mysql_fetch_array($qry);
/*$handler = fopen('file:///C:/Windows/encode.txt','r');
*/if($count == 1 ){$user = array();
$user['user']=$data['user'];
$user['pass']=$data['pass'];
session_start();
$_SESSION['user'] = $user['user'];
	header('Location: ../../index.php');
}else{header('Location: ../../login.php?err');
} ?>
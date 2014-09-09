<?php
require_once "../../config/modul/db.class.php";
$db = new db();
$db->opendb('localhost','root','','autofallen');

$id = addslashes($_REQUEST['id']);
echo $db->get_store('store','image','id',$id);

/*$id = addslashes($_REQUEST['id']);

$image = mysql_query("SELECT * FROM store WHERE id=$id");
$image = mysql_fetch_assoc($image);
$image = $image['image'];

//header("Content-type: image/jpeg");

echo $image;*/

?>
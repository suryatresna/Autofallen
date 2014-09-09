 <!-- MAIN SET --><div id='highlight'></div><div id="main" class="ui-widget-content ui-corner-all "><h3 class="ui-widget-header ui-corner-all" ><?php
  if($_GET['mod'] != 0){
  echo $db->searchId('access_menu_category','category','id',$_GET['mod']);
  }
  else {
	echo "Dashboard";	  
  }
  ?></h3>

<div id="form-box"></div>

 <div class="box" style="display:none">
 <?php
 $mod = $_GET['mod'];
 $temp = $_GET['temp'];
 if($_GET['temp'] == null || $_GET['temp'] == ' '){
 $mn = $db->qry("SELECT * FROM access_menu WHERE category = '".$_GET['mod']."' AND status=1 OR id = '".$_GET['temp']."'");
 }
 else{
$mn = $db->qry("SELECT * FROM access_menu WHERE category = '".$_GET['mod']."' AND status=1 AND id = '".$_GET['temp']."'");	 
	 }
 $c = mysql_num_rows($mn);

 if($_GET['mod'] != 0){
 while($data=mysql_fetch_array($mn)){
	if($c == 1){	 
		 include $data['url'];
		 //$db->set_menu($data['id']); 
		  //print $db->get_temp($_GET['mod']); 
	}
	else {
		print"<script>alert('maaf, link yang anda klik tidak aktif.')</script>";	
	}
	
 }
 }
 else {
	include "home.php"; 
 }
 ?>
 </div>
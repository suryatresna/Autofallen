<?php
 $typeUser = $db->searchId('access_user','type','user',$_SESSION['user']);
$nav = $db->qry("SELECT access_menu_category.id, access_menu_category.category 
				FROM access_menu_category
				WHERE access_menu_category.status = 1");
?>
<div class="header-logo"></div>
<a href="?mode=logout" class="power" title="Logout from this program."><span class="ui-icon ui-icon-power"></span></a>
 <div class="header-akses"><b>Welcome, </b><?php print $db->searchId('access_user','name','user',$_SESSION['user']) ?>
 </div> 

<div id="header-menu">
  <ul class='dropdown'>
  
  <?php
  while($data=mysql_fetch_row($nav)){
	  if($_GET['mod']==$data[0]){
		$class='active';  
	  }
	  else{
		$class=null;  
	  }
	  
	  
	 
	  
	 $r = "SELECT access_menu.menu, access_menu.id , access_menu.category
	  		FROM access_menu, access, access_type
			WHERE access_menu.id = access.idMenu
			AND access_type.id = access.idType
			AND access.idType = ".$typeUser."
			AND access_menu.category = ".$data[0]."
			AND access_menu.status = 1
			AND access_type.status = 1";
	$subm = $db->qry($r);
		$co = mysql_num_rows($subm);
		if($co > 1){
	print "<li><a class='".$class."' name='".$data[0]."'>".$data[1]."</a>";
		}
		else {
		print "<li><a href='?mod=".$data[0]."' name='".$data[0]."' class='".$class."'>".$data[1]."</a>";	
		}
		if($co > 1){
		print "<ul>";
		while($dt = mysql_fetch_row($subm)){
		 print "<li><a href='?mod=".$dt[2]."&temp=".$dt[1]."'>".$dt[0]."</a></li>";
		}
		print "</ul>";
		}
	print "</li>";  
  }
  ?>
    </ul>
  </div>

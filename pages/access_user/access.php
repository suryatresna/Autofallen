
<div id="set">
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="access" w="400" h="270" title="Tambah Access Baru"><span class="ui-icon ui-icon-plus"></span></button>
</div>
<div id="users-contain" class="ui-widget">
<?php
//Create Header Table and field table

$tbh = array('*');

$s = $db->selectTb('access',$tbh,'idType');
$tb = $db->qry($s);
$count = mysql_num_rows($tb);
?>
	<h1><?php print $db->searchId('access_menu','menu','id',$_GET['temp']) ?></h1>
	<table id="tables" class="ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header ">
            	<th width="1%" rowspan="2">No</th>
                <th width="20%" rowspan="2">Menu</th>
                <th width="20%" rowspan="2">Type</th>
                <th width="" colspan="4">Access</th>
                <th width="10%" rowspan="2">Status</th>
                <th width="10%" rowspan="2">Action</th>
			</tr>
            <tr>
            	<th>View</th>
                <th>Delete</th>
                <th>Insert</th>
                <th>Update</th>
            </tr>
		</thead>
		<tbody>
			
				<?php $i=1;
				while($data=mysql_fetch_array($tb))
				{
					print "<tr>";
				print"<td>".$i."</td>";
				print"<td>".$db->searchId('access_menu','menu','id',$data['idMenu'])."</td>";
				print"<td>".$db->searchId('access_type','type','id',$data['idType'])."</td>";
				print"<td><span class='status' name='".$data['cview']."'></span></td>";
				print"<td><span class='status' name='".$data['cdelete']."'></span></td>";
				print"<td><span class='status' name='".$data['cinsert']."'></span></td>";
				print"<td><span class='status' name='".$data['cupdate']."'></span></td>";
				print"<td><span class='status' name='".$data['status']."'></span></td>";
				print"<td>
				<a class='edit' valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=400 w=400 title='Edit Data ".$data['id']."' tb='access' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete' valid='".$db->checkUser('cdelete',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$data['id']."' tb='access' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
					print "</tr>";
					$i++;
				}
				?>
		</tbody>
        <tr>
	</table>
    
</div>

<div id="info">
<hr>

	<table width="100%">
    <tr>
  
  <td valign="top" width="50%">
  <h1>Menu Category</h1>
  <div id="tbSmall" class="ui-widget">
  <table width="95%" class="smallTb">
  <tHead>
  <tr class="ui-widget-header ">
  <th width="60%">Tipe</th><th width="10%">Status</th><th width="15%">Action</th>
  </tr>
  </tHead>
  
  <tBody>
  <?php
  $tipe_access = $db->qry("SELECT * FROM access_menu_category");
  while($data=mysql_fetch_array($tipe_access)){
	print "<tr>";
	print "<td>".$data['category']."</td>";
	print"<td><span class='status' name='".$data['status']."'></span></td>";
	print"<td>
				<a class='edit' valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=200 w=400 title='Edit Data ".$db->searchId('access_menu_category','category','id',$data['id'])."' tb='access_menu_category' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete' valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$db->searchId('access_type','type','id',$data['id'])."' tb='access_type' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
	print "</tr>";  
  }
  ?>
  </tBody>
  <tfoot>
  <tr class="ui-widget-header ">
  <th width="60%" colspan="100%">Count : <?php print $db->countTb('access_type') ?></th>
  </tr>
  </tfoot>
  </table>
  </div>
  </td>
  
  
  <td valign="top" width="50%">
  
  <h1>Log Pengguna</h1>
  <div id="tbSmall" class="ui-widget">
  <table width="95%" class="smallTb">
  <tHead>
  <tr class="ui-widget-header ">
  <th width="60%">Date And Time</th><th width="10%">Type</th><th width="15%">User</th>
  </tr>
  </tHead>
  
  <tBody>
  <?php
/*  $tipe_access = $db->qry("SELECT * FROM access_type");
  while($data=mysql_fetch_array($tipe_access)){*/
	print "<tr>";
	print "<td></td>";
	print"<td></td>";
	print"<td>				</td>";	
	print "</tr>";  
  /*}*/
  ?>
  </tBody>
  <tfoot>
  <tr class="ui-widget-header ">
  <th width="60%" colspan="100%">Count : <?php /*print $db->countTb('access_type')*/ ?></th>
  </tr>
  </tfoot>
  </table>
  </div>
  
  </td>
  
    </tr>  
    </table>
</div>
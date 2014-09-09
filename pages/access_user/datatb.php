<?php
//Create Header Table and field table
$headtb = array(
'User'=>'8%',
//'Password'=>'8%',
'Name'=>'7%',
'Email'=>'7%',
'Handphone'=>'5%',
'Address'=>'10%',
'Type'=>'3%',
'Status'=>'2%'
);
$tbh = array('user','pass','name','email','hp','address','type','id','status');

$s = $db->selectTb('access_user',$tbh);
$tb = $db->qry($s);
$count = mysql_num_rows($tb);
?>
<div id="set">
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="access_user" w="400" h="400" title="Tambah Data Baru"><span class="ui-icon ui-icon-plus"></span></button>
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="access_type" w="400" h="200" title="Tambah Tipe Baru"><span class="ui-icon ui-icon-newwin"></span></button>
<button class="report-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="user" w="400" h="200" title="Cetak Laporan"><span class="ui-icon ui-icon-print"></span></button>
</div>
<div id="users-contain" class="ui-widget">
	<h1><?php print $db->searchId('access_menu','menu','id',$_GET['temp']) ?></h1>
	<table id="tables" class="ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header ">
            	<th width="1%">No</th>
				<?php
				
				foreach($headtb as $head => $w){
				print "<th width='".$w."'>".$head."</th>";	
				}
				?>
                <th width="8%">Action</th>
			</tr>
		</thead>
		<tbody>
			
				<?php $i=1;
				while($data=mysql_fetch_row($tb))
				{
					print "<tr>";
				print"<td>".$i."</td>";
				print"<td>".$data[0]."</td>";
				//print"<td>".$data[1]."</td>";
				print"<td>".$data[2]."</td>";
				print"<td>".$data[3]."</td>";
				print"<td>".$data[4]."</td>";
				print"<td>".$data[5]."</td>";
				print"<td>".$db->searchId('access_type','type','id',$data[6])."</td>";
				print"<td><span class='status' name='".$data[8]."'></span></td>";
				print"<td>
				<a class='edit' valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=400 w=400 title='Edit Data ".$data[7]."' tb='access_user' f='id' id='".$data[7]."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete' valid='".$db->checkUser('cdelete',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$data[7]."' tb='access_user' f='id' id='".$data[7]."'><span class='ui-icon ui-icon-trash'></span></a>
				
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
  <h1>Tipe Pengguna</h1>
  <div id="tbSmall" class="ui-widget">
  <table width="95%" class="smallTb">
  <tHead>
  <tr class="ui-widget-header ">
  <th width="60%">Tipe</th><th width="10%">Status</th><th width="15%">Action</th>
  </tr>
  </tHead>
  
  <tBody>
  <?php
  $tipe_access = $db->qry("SELECT * FROM access_type");
  while($data=mysql_fetch_array($tipe_access)){
	print "<tr>";
	print "<td>".$data['type']."</td>";
	print"<td><span class='status' name='".$data['status']."'></span></td>";
	print"<td>
				<a class='edit' valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=200 w=400 title='Edit Data ".$db->searchId('access_type','type','id',$data['id'])."' tb='access_type' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='access' valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' title='Access User ".$db->searchId('access_type','type','id',$data['id'])."' tb='access' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-star'>
				<a class='delete' valid='".$db->checkUser('cdelete',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$db->searchId('access_type','type','id',$data['id'])."' tb='access_type' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-trash'></span></a>
				
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
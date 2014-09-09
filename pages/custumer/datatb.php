<?php
//Create Header Table and field table
$headtb = array(
'ID'=>'2%',
'Nama'=>'10%',
'Alamat'=>'15%',
'Telepon'=>'7%',
'Type'=>'3%',
'Status'=>'2%'
);
$tbh = array('nama','alamat','telp','type','status','id');

$s = $db->selectTb('custumer',$tbh);
$tb = $db->qry($s);
$count = mysql_num_rows($tb);
?>
<script type="text/javascript">
$(document).ready(function(){
	
	})
</script>
<div id="set">
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="custumer" w="400" h="400" title="Tambah Data Baru"><span class="ui-icon ui-icon-plus"></span></button>
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="custumer_type" w="400" h="200" title="Tambah Tipe Baru"><span class="ui-icon ui-icon-newwin"></span></button>
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="leasing" w="400" h="250" title="Tambah leasing baru"><span class="ui-icon ui-icon-person"></span></button>
<button class="report-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="custumer" w="400" h="250" title="Cetak Laporan"><span class="ui-icon ui-icon-print"></span></button>
</div>

<div id="users-contain" class="ui-widget">
	<h1><?php print $db->searchId('access_menu','menu','id',$_GET['temp']); ?></h1>
	
    <table id="tables" class="ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header ">
   
				<?php
				
				foreach($headtb as $head => $w){
				print "<th width='".$w."'>".$head."</th>";	
				}
				?>
                <th width="2%">Action</th>
			</tr>
		</thead>
		<tbody>
			
				<?php $i=1;
				while($data=mysql_fetch_row($tb))
				{
					print "<tr>";

				print"<td>".$data[5]."</td>";
				print"<td>".$data[0]."</td>";
				print"<td>".$data[1]."</td>";
				print"<td>".$data[2]."</td>";
				print"<td>".$db->searchId('custumer_type','type','id',$data[3])."</td>";
				print"<td><span class='status' name='".$data[4]."'></span></td>";
				print"<td>
				<a class='edit' valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=400 w=400 title='Edit Data ".$data[5]."' tb='custumer' f='id' id='".$data[5]."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete' valid='".$db->checkUser('cdelete',$_SESSION['user'],$_GET['mod'])."'  title='Trash Data ".$data[5]."' tb='custumer' f='id' id='".$data[5]."'><span class='ui-icon ui-icon-trash'></span></a>
				
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
  <h1>Tipe Pelanggan</h1>
  <div id="tbSmall" class="ui-widget">
  <table width="95%" class="smallTb">
  <tHead>
  <tr>
  <th width="60%">Tipe</th><th width="10%">Status</th><th width="15%">Action</th>
  </tr>
  </tHead>
  
  <tBody>
  <?php
  $tipe_access = $db->qry("SELECT * FROM custumer_type");
  while($data=mysql_fetch_array($tipe_access)){
	print "<tr>";
	print "<td>".$data['type']."</td>";
	print"<td><span class='status' name='".$data['status']."'></span></td>";
	print"<td>
				<a class='edit'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=200 w=400 title='Edit Data ".$db->searchId('custumer_type','type','id',$data['id'])."' tb='custumer_type' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$db->searchId('custumer_type','type','id',$data['id'])."' tb='custumer_type' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
	print "</tr>";  
  }
  ?>
  </tBody>
  <tfoot>
  <tr>
  <th colspan="100%">Count : <?php print $db->countTb('access_type') ?></th>
  </tr>
  </tfoot>
  </table>
  </div>
  </td>
  
  
  <td valign="top" width="50%">
  
  <h1>Daftar Leasing</h1>
  <div id="tbSmall" class="ui-widget">
  <table width="95%" class="smallTb">
  <tHead>
  <tr>
  <th width="1%">ID</th><th width="50%">Leasing</th><th width="20%">Telepon</th><th width="10%">Status</th><th width="15%">Action</th>
  </tr>
  </tHead>
  
  <tBody>
 <?php
  $tipe_access = $db->qry("SELECT * FROM leasing");
  while($data=mysql_fetch_array($tipe_access)){
	print "<tr>";
	print "<td>".$data['id']."</td>";
	print "<td>".$data['nama']."</td>";
	print "<td>".$data['telp']."</td>";
	print"<td><span class='status' name='".$data['status']."'></span></td>";
	print"<td>
				<a class='edit'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=200 w=400 title='Edit Data ".$db->searchId('leasing','nama','id',$data['id'])."' tb='leasing' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$db->searchId('leasing','nama','id',$data['id'])."' tb='leasing' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
	print "</tr>";  
  }
  ?>
  </tBody>
  <tfoot>
  <tr >
  <th colspan="100%">Count : <?php /*print $db->countTb('access_type')*/ ?></th>
  </tr>
  </tfoot>
  </table>
  </div>
  
  </td>
  
    </tr>  
    </table>
</div>
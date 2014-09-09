<?php
//Create Header Table and field table
$headtb = array(
'No Polisi'=>'8%',
'Warna'=>'6%',
'Tipe'=>'10%',
'Harga Pokok'=>'7%',
'Harga Jual'=>'7%',
'Tahun'=>'3%',
'Pemilik'=>'3%',
'Status'=>'2%'
);
$tbh = array('no_pol','warna','type','hargaJual','hargaPokok','th','pemilik','id','status');

$s = $db->selectTb('kendaraan',$tbh);
$tb = $db->qry($s);
$count = mysql_num_rows($tb);
?>

<script>
$(document).ready(function(){
	

});
</script>

<div id="set">
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="kendaraan" w="400" h="400" title="Tambah Data Baru"><span class="ui-icon ui-icon-plus"></span></button>
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="kendaraan_warna" w="500" h="400" title="Tambah Warna Baru"><span class="ui-icon ui-icon-image"></span></button>
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="kendaraan_type" w="400" h="200" title="Tambah Tipe Baru"><span class="ui-icon ui-icon-newwin"></span></button>
<button class="report-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="kendaraan" w="400" h="200" title="Cetak Laporan"><span class="ui-icon ui-icon-document"></span></button>
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
                <th width="2%">Action</th>
			</tr>
		</thead>
		<tbody>
			
				<?php $i=1;
				while($data=mysql_fetch_row($tb))
				{
					print "<tr>";
				print"<td>".$i."</td>";
				print"<td>".$data[0]."</td>";
				print"<td>".$db->searchId('kendaraan_warna','warna','id',$data[1])."<div class='colors' style='background-color:".$db->searchId('kendaraan_warna','code','id',$data[1]).";'></div></td>";
				print"<td>".$db->searchId('kendaraan_type','type','id',$data[2])."</td>";
				print"<td align='right'><span style='float:left'>Rp.</span>".number_format($data[4])."</td>";
				print"<td align='right'><span style='float:left'>Rp.</span>".number_format($data[3])."</td>";
				print"<td>".$data[5]."</td>";
				print"<td>".$data[6]."</td>";
				print"<td><span class='status' name='".$data[8]."'></span></td>";
				print"<td>
				<a class='edit' valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=400 w=400 title='Edit Data ".$data[7]."' tb='kendaraan' f='id' id='".$data[7]."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete' valid='".$db->checkUser('cdelete',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$data[7]."' tb='kendaraan' f='id' id='".$data[7]."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
					print "</tr>";
					$i++;
				}
				?>
		</tbody>
        <tr>
	</table>
    
</div>

<hr>

	<table width="100%">
    <tr>
  
  <td valign="top" width="50%">
  <h1>Tipe Warna</h1>
  <div id="tbSmall" class="ui-widget">
  <table width="95%" class="smallTb">
  <tHead>
  <tr class="ui-widget-header ">
  <th width="60%">Nama</th><th width="10%">Code</th><th width="10%">Status</th><th width="15%">Action</th>
  </tr>
  </tHead>
  
  <tBody>
  <?php
  $tipe_access = $db->qry("SELECT * FROM kendaraan_warna");
  while($data=mysql_fetch_array($tipe_access)){
	print "<tr>";
	print "<td>".$data['warna']."<div class='colors' style='background-color:".$data['code'].";'></div></td>";
	print "<td>".$data['code']."</td>";
	print"<td><span class='status' name='".$data['status']."'></span></td>";
	print"<td>
				<a class='edit' h=400 w=500  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' title='Edit Data ".$db->searchId('kendaraan_warna','warna','id',$data['id'])."' tb='kendaraan_warna' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$db->searchId('kendaraan_warna','warna','id',$data['id'])."' tb='kendaraan_warna' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
	print "</tr>";  
  }
  ?>
  </tBody>
  <tfoot>
  <tr class="ui-widget-header ">
  <th width="60%" colspan="100%">Count : <?php print $db->countTb('kendaraan_warna') ?></th>
  </tr>
  </tfoot>
  </table>
  </div>
  </td>
  
  
  <td valign="top" width="50%">
  
  <h1>Tipe Kendaraan</h1>
  <div id="tbSmall" class="ui-widget">
  <table width="95%" class="smallTb" >
  <tHead>
  <tr class="ui-widget-header ">
  <th width="60%">Nama</th><th width="10%">Status</th><th width="15%">Action</th>
  </tr>
  </tHead>
  
  <tBody>
   <?php
  $tipe_access = $db->qry("SELECT * FROM kendaraan_type");
  while($data=mysql_fetch_array($tipe_access)){
	print "<tr>";
	print "<td>".$data['type']."</td>";
	print"<td><span class='status' name='".$data['status']."'></span></td>";
	print"<td>
				<a class='edit'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=200 w=400 title='Edit Data ".$db->searchId('kendaraan_type','type','id',$data['id'])."' tb='kendaraan_type' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$db->searchId('kendaraan_type','type','id',$data['id'])."' tb='kendaraan_type' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
	print "</tr>";  
  }
  ?>
  </tBody>
  <tfoot>
  <tr class="ui-widget-header ">
  <th width="60%" colspan="100%">Count : <?php print $db->countTb('kendaraan_type') ?></th>
  </tr>
  </tfoot>
  </table>
  </div>
  
  </td>
  
    </tr>  
    </table>
</div>

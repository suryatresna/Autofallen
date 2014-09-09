<?php
//Create Header Table and field table
$headtb = array(
'Tanggal Beli'=>'5%',
'Custumer'=>'8%',
'Leasing'=>'8%',
'Nomor Polisi'=>'8%',
'Payment'=>'8%',
'Bayar'=>'8%',
'Status'=>'2%'
);
$tbh = array('id',"DATE_FORMAT(tglBayar,'%d %b, %Y') as tgl",'payment','leasingId','custumerId','kendaraanId','userId');

$s = $db->selectTb('transaksi',$tbh);
$tb = $db->qry($s);
$count = mysql_num_rows($tb);
?>
<script type="text/javascript">
$(document).ready(function(){
	
	})
</script>
<div id="set">
<button title="Tambah Data Transaksi" onClick="document.location='?mod=<?php print $_GET['mod'] ?>&temp=10'"><span class="ui-icon ui-icon-plus"></span></button>
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="transaksi_payment" w="400" h="250" title="Tambah Data Payment"><span class="ui-icon ui-icon-tag"></span></button>

<button class="report-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="transaksi" w="400" h="250" title="Cetak Laporan"><span class="ui-icon ui-icon-print"></span></button>

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
                <th width="5%">Action</th>
			</tr>
		</thead>
		<tbody>
			
				<?php $i=1;
				while($data=mysql_fetch_array($tb))
				{
					$hargaJual = $db->searchId('kendaraan','hargaJual','id',$data['kendaraanId']);
					if($db->cari_bayar($data['id']) >= $hargaJual){
						$st=1;
					}
					else{
						$st=0;
					}
					print "<tr>";
				print"<td>".$i."</td>";
				print"<td>".$data[1]."</td>";
				print"<td><a>".$db->searchId('custumer','nama','id',$data['custumerId'])."</a></td>";
				print"<td><a>".$db->searchId('leasing','nama','id',$data['leasingId'])."</a></td>";
				print"<td><a>".$db->searchId('kendaraan','no_pol','id',$data['kendaraanId'])."</a></td>";
				print"<td>".$db->searchId('transaksi_payment','payment','id',$data['payment'])."</td>";
				print"<td>Rp. ".number_format($db->dp_cari($data['id']))."</td>";
				print"<td><span class='status' name='".$st."'></span></td>";
				print"<td>";
				
				if($st != 1){
				print "<a class='payment-edit' valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."'  h='auto' w=900 title='Edit Data ".$data['id']."' tb='transaksi_detail' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-pencil'></span></a>";
				}
				else {
				print "";	
				}
				print "<a class='print'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."'  h='auto' w=900 title='Print Data ".$data['id']."' user='".$_SESSION['user']."' pay=".$data['payment']." tb='transaksi_detail' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-print'></span></a>
				<a class='delete_transaksi'  valid='".$db->checkUser('cdelete',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$data['id']."' tb='transaksi' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-trash'></span></a>
				
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
  <h1>Tipe Payment</h1>
  <div id="tbSmall" class="ui-widget">
  <table width="95%" class="smallTb">
  <tHead>
  <tr class="ui-widget-header ">
  <th width="5%">Payment</th><th width="18%">Lama</th><th width="5%">Bunga</th><th width="10%">Denda</th><th width="2%">Status</th><th width="15%">Action</th>
  </tr>
  </tHead>
  
  <tBody>
  <?php
  $tipe_access = $db->qry("SELECT * FROM transaksi_payment");
  while($data=mysql_fetch_array($tipe_access)){
	print "<tr>";
	print "<td>".$data['payment']."</td>";
	print "<td>".$data['lama']." (Bulan)</td>";
	print "<td>".$data['bunga']." (%)</td>";
	print "<td>Rp. ".number_format($data['denda'])."</td>";
	print"<td><span class='status' name='".$data['status']."'></span></td>";
	print"<td>
				<a class='edit'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=250 w=400 title='Edit Data ".$db->searchId('transaksi_payment','payment','id',$data['id'])."' tb='transaksi_payment' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$db->searchId('transaksi_payment','payment','id',$data['id'])."' tb='transaksi_payment' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
	print "</tr>";  
  }
  ?>
  </tBody>
  <tfoot>
  <tr class="ui-widget-header ">
  <th width="60%" colspan="100%">Count : <?php print $db->countTb('transaksi_payment') ?></th>
  </tr>
  </tfoot>
  </table>
  </div>
  
  
  <!--<h1>Statistik Transaksi</h1>
  <div id="tbSmall" class="ui-widget">
  <table width="95%" class="smallTb" >
  <tHead>
  <tr class="ui-widget-header ">
  <th width="20%">Leasing</th><th width="20%">Payment</th><th width="5%">Bunga</th><th width="5%">Status</th><th width="15%">Action</th>
  </tr>
  </tHead>
  
  <tBody>
   <?php
 /* $tipe_access = $db->qry("SELECT * FROM leasing_access WHERE status=1");
  while($data=mysql_fetch_array($tipe_access)){
	print "<tr>";
	print "<td><small>".$db->searchId('leasing','nama','id',$data['leasingId'])."</small></td>";
	print "<td>".$db->searchId('transaksi_payment','payment','id',$data['paymentId'])."</td>";
	print "<td>".$data['bunga']."(%)</td>";
	print"<td><span class='status' name='".$data['status']."'></span></td>";
	print"<td>
				<a class='edit'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' h=200 w=400 title='Edit Data ".$db->searchId('leasing_access','id','id',$data['id'])."' tb='leasing_access' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete'  valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."' title='Trash Data ".$db->searchId('leasing_access','id','id',$data['id'])."' tb='leasing_access' f='id' id='".$data['id']."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
	print "</tr>";  
  }*/
  ?>
  </tBody>
  <tfoot>
  <tr class="ui-widget-header ">
  <th colspan="100%">Count : <?php /*print $db->countTb('kendaraan_type')*/ ?></th>
  </tr>
  </tfoot>
  </table>
  </div>-->
  
  </td>
  
    </tr>  
    </table>
</div>

<?php
include "../../config/modul/db.class.php";
$db = new db();
$db->opendb();
 ?>

<script>

		
		
	$(function() {	
		
		
		$( "#tabs" ).tabs();
		$("#tglBayar").datepicker({
		dateFormat : "yy-mm-dd",	
		changeMonth: true,
			changeYear: true
		});
		$(".tglBayar").datepicker({
		dateFormat : "yy-mm-dd",	
		changeMonth: true,
			changeYear: true
		});
			$("#pay_credit").dataTable({
		"sScrollY": "auto",
		"bPaginate": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": false,
        "bAutoWidth": false,
		"sPaginationType":"full_numbers",	
		"bJQueryUI": true,
		});
	
		function setData(id1,id2){
			var sc = $('#'+id1).attr('value');
			var nm = $('#'+id1).attr('name');
			$('#'+id2).attr(nm,sc);	
		}
		
		$(".delete").click(function(){
			var conf = confirm("Yakin data ini di hapus.?");
			var id = $(this).attr('id');
			var tb = $(this).attr('tb');
			var f = $(this).attr('f');
			var valid = $(this).attr('valid');
			if(valid == 1){
			if(conf == true){
				$.post('pages/store.php?tb='+tb+'&f='+f+'&ac=delete&id='+id,function(data){
					document.location='';
					});	
			}
			else{
				return false;	
			}
			}
			else {
				alert ("Maaf, anda tidak dapat mengakses aksi ini.");	
			}
			});
			
			$('#tglBayar').change(function(){
				var date1 = $('#date1').attr('value');
				var date2 = $('#tglBayar').attr('value');
				var pinalty = payment.getLongDate(date1,date2);
				var bayar = $('#date1').attr('bayar');
				var denda = $('#date1').attr('denda');
				if(pinalty < 0){
				var kena = (Math.floor(denda) * (Math.floor(-pinalty))) + Math.floor(bayar);
				}
				else {
				var kena = 	bayar;
				}
				/*var oNumber = payment.moneyConvert(kena);*/
				$('#pinalty').text(pinalty);
				$('#bayar').attr('value',kena);
				$('#bayarLb').text('Rp. '+ payment.convertToRupiah(kena));	
			});
	});
	</script>
    <table width="100%">
    <tr><td width="30%">Transaksi ID</td><td>: <?php print $_GET['id'] ?> </td></tr>
    <tr><td >Pelanggan</td><td>: <?php print $db->searchId('custumer','nama','id',$db->searchId('transaksi','custumerId','id',$_GET['id'])) ?></td></tr>
    <tr><td >Harga Jual</td><td>: Rp. <?php  print number_format($db->total_bayar_bunga($db->searchId('kendaraan','hargaJual','id',$db->searchId('transaksi','kendaraanId','id',$_GET['id'])),$db->bunga_leasing($db->searchId('transaksi_payment','bunga','id',$db->searchId('transaksi','payment','id',$_GET['id'])))))?></td></tr>
     <tr><td width="10%">Total Bayar</td><td colspan="90%">: Rp. <?php print number_format($db->sqlAnalist('SUM','transaksi_detail','bayar','transaksiId',$_GET['id']))  ?></td></tr>
    <tr><td >DP</td><td>: Rp. <?php  print number_format($db->dp_cari($_GET['id']))?></td></tr>
    <tr><td >Bayar Per Bulan</td><td>: Rp. <?php  print number_format($db->bayar_per_bulan($_GET['id']))?></td></tr>
     <tr><td >Denda</td><td>: Rp. <?php  print number_format($db->denda_pinalty($_GET['id']))?></td></tr>
   </table>
  
    <div id="tabs">
	<ul>
		<li><a href="#tabs-1">Daftar Credit</a></li>
		<li><a href="#tabs-2">Form Credit</a></li>
	</ul>
	<div id="tabs-1">
    
    
		<div class="ui-widget" style="width:100%;display:block;">
  <table id="pay_credit">
  <thead>
  <tr class="ui-widget-header ">
  <th width="6%">No</th><th width="20%">Tanggal</th><th width="20%">Tanggal Bayar</th><th width="5%">Pinalty</th><th width="30%">Bayar</th><th width="5%">Status</th><th width="10%">Action</th>
  </tr>
  </thead>
  
  <tBody>
  <?php  
  
  /*$qry = $db->qry("SELECT id, DATE_FORMAT(tglBayar,'%d %b, %Y'), bayar, pinalty FROM transaksi_detail WHERE transaksiId=".$_GET['id']." ");
  while($data=mysql_fetch_array($qry)){
	print "<tr>";
	print "<td>".$data[1]."</td>";
	print "<td>".$data['pinalty']."</td>";
	print "<td>Rp. ".number_format($data[2])."</td>";
	print"<td>
				<a class='delete'  valid='1' title='Trash Data ".$db->searchId('transaksi_detail','id','id',$data[0])."' tb='transaksi_detail' f='id' id='".$data[0]."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
	print "</tr>";  
  }*/
  
  
  $s = $db->searchId('transaksi_payment','lama','id',$db->searchId('transaksi','payment','id',$_GET['id']));
  $tgl_awl = $db->searchId('transaksi','tglBayar','id',$_GET['id']);
	$days = array(); 
  for($i=1;$i<=$s;$i++){
	  
	  $days[$i]=$db->tambah_hari($tgl_awl,($i*30),'m');
	  print "<tr>";
	print "<td>".$i."</td>";
	print "<td>".$db->tambah_hari($tgl_awl,($i*30),'d M, Y')."</td>";
	print "<td>".$db->get_tgl_store($_GET['id'],$i,'d M, Y')."</td>";
	print "<td>".$db->pinalty($db->tambah_hari($tgl_awl,($i*30),'d M, Y'),$db->get_tgl_store($_GET['id'],$i,'d M, Y'))."</td>";
	print "<td>Rp.".number_format($db->get_bayar_store($_GET['id'],$i))." </td>";
	print "<td><span class='status' name='".$db->set_status_sama($db->bayar_per_bulan($_GET['id']),$db->get_bayar_store($_GET['id'],$i))."'></span></td>";
	print"<td>
				<a class='delete'  valid='1' title='Trash Data ' tb='transaksi_detail' f='id' id=''><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
	print "</tr>";
  }
  ?>
  </tBody>
  
  <tfoot>
  <tr><td></td><td width="10%">Total</td><td colspan="90%">: Rp. <?php print number_format($db->sqlAnalist('SUM','transaksi_detail','bayar','transaksiId',$_GET['id']))  ?></td></tr>
  <tr>
  <td></td>
  <td width="10%">Sisa</td><td colspan="90%">: Rp. <?php 
  print number_format(($db->searchId('kendaraan','hargaJual','id',$db->searchId('transaksi','kendaraanId','id',$_GET['id'])) - ($db->sqlAnalist('SUM','transaksi_detail','bayar','transaksiId',$_GET['id']))))   ?></td>
  </tr>
   
  </tfoot>
  
  </table>
 
  </div>
	</div>
    
    
	<div id="tabs-2">
		<form id="form">
        <table width="100%">
        <tr><td>Tanggal Bayar</td><td><span id="date1" denda='<?php print $db->denda_pinalty($_GET['id']) ?>' bayar='<?php print $db->bayar_per_bulan($_GET['id']) ?>' value='<?php print $db->get_tgl_bayar($_GET['id'],'Y-m-d') ?>'><b><?php print $db->get_tgl_bayar($_GET['id'],'d M, Y') ?></b></span></td></tr>
        <tr><td>Pinalty</td><td><span id="pinalty"></span></td></tr>
        <tr><td>Tanggal</td><td><input type="hidden" value="<?php print $_GET['id'] ?>" name="transaksiId" id="transaksiId">
        <input type="hidden" value="<?php print $db->get_id_store($_GET['id']) ?>" name="store" id="store">
        <input type="text" value="" name="tglBayar" id="tglBayar"></td></tr>
        <tr><td>Bayar</td><td>Rp. <input type="text" name="bayar" id="bayar" value=""></td></tr>
        <tr><td></td><td><h1 style="color:#444;" id="bayarLb"></h1></td></tr>
        </table>
        </form>
	</div>
	
</div>
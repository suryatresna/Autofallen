<?php
/*print_r($_GET);
*/
include "../../config/modul/db.class.php";
$db = new db();
$db->opendb();

?>
<script>
	$(function() {
		$("#tglBayar").datepicker({
		dateFormat : "yy-mm-dd"	
		});
		
		$('.setManual').click(function(){
			var on = $(this).attr('on');
			var off = $(this).attr('off');
			$('#'+on).removeAttr('disabled');
			$('#'+off).attr('disabled','disabled');
			
			$('#'+off).attr('value',$('#'+on).attr('value'));
			$('#'+off).attr('name','auto');
				
		});
	});
	</script>

<?php

if($_GET['payment']==1){
	$q = "Bayar";
	$i = 'Rp. '.$db->dbInput('text','bayar',$db->total_bayar_bunga($db->searchId('kendaraan','hargaJual','id',$_GET['kendaraan']),$db->bunga_leasing($_GET['payment'])),'','bayarmuka','ui-widget-content ui-corner-all','','true').$db->dbInput('hidden','bayar',$db->total_bayar_bunga($db->searchId('kendaraan','hargaJual','id',$_GET['kendaraan']),$db->bunga_leasing($_GET['payment'])),'','bayar','ui-widget-content ui-corner-all').'<a class="setManual" title="Set pembayaran secara manual" on="bayarmuka" off="bayar"><span class="ui-icon ui-icon-unlocked"></span></a><a class="setManual" title="Set pembayaran secara otomatis" on="bayar" off="bayarmuka"><span class="ui-icon ui-icon-locked"></span></a>';	
	$bayar_per_bln = '0';
}
else{
	$q = "Dp";
	$i = 'Rp. '.$db->dbInput('text','bayar',ceil($db->total_bayar_bunga($db->searchId('kendaraan','hargaJual','id',$_GET['kendaraan']),$db->bunga_leasing($_GET['payment']))/ $db->lama_payment($_GET['payment'])*2),'','bayarmuka','ui-widget-content ui-corner-all','','true').$db->dbInput('hidden','bayar',ceil($db->total_bayar_bunga($db->searchId('kendaraan','hargaJual','id',$_GET['kendaraan']),$db->bunga_leasing($_GET['payment']))/ $db->lama_payment($_GET['payment'])*2),'','bayar','ui-widget-content ui-corner-all').'<a class="setManual" title="Set pembayaran secara manual" on="bayarmuka" off="bayar"><span class="ui-icon ui-icon-unlocked"></span></a><a class="setManual" title="Set pembayaran secara otomatis" on="bayar" off="bayarmuka"><span class="ui-icon ui-icon-locked"></span></a>';
	$bayar_per_bln=$db->total_bayar_bunga($db->searchId('kendaraan','hargaJual','id',$_GET['kendaraan']),$db->bunga_leasing($_GET['payment']))/ $db->lama_payment($_GET['payment']);
}



$cash = array(
	'Pelanggan'=>$db->searchId('custumer','nama','id',$_GET['pelanggan']),
	'Leasing'=>$db->searchId('leasing','nama','id',$_GET['leasing']),
	'No Polisi'=>$db->searchId('kendaraan','no_pol','id',$_GET['kendaraan']),
	'Jenis Kendaraan'=>$db->searchId('kendaraan_type','type','id',$db->searchId('kendaraan','type','id',$_GET['kendaraan'])),
	'Warna Kendaraan'=>$db->searchId('kendaraan_warna','warna','id',$db->searchId('kendaraan','warna','id',$_GET['kendaraan'])),
	'Lama Angsuran'=>$db->lama_payment($_GET['payment'])." (bulan)",
	'Harga Jual'=>'Rp. '.number_format($db->searchId('kendaraan','hargaJual','id',$_GET['kendaraan'])),
	'Bunga'=>$db->bunga_leasing($_GET['payment']).' (%)',
	'Total(*bunga)'=>'Rp. '.number_format($db->total_bayar_bunga($db->searchId('kendaraan','hargaJual','id',$_GET['kendaraan']),$db->bunga_leasing($_GET['payment']))),
	'Bayar Per Bulan'=>'Rp. '.number_format($bayar_per_bln),
);

?>
<form id="form">
<table width="100%" class="ui-widget-content ui-corner-all">
<tr><td width="35%">Tanggal </td><td>: <input type="text" name="tglBayar" id="tglBayar" class="ui-widget-content ui-corner-all" /></td></tr>
</table>
<br />
<table width="100%" class="ui-widget-content ui-corner-all">
<?php
	print $db->dbInput('hidden','leasingId',$_GET['leasing'],'','leasingId','ui-widget-content ui-corner-all').
		  $db->dbInput('hidden','custumerId',$_GET['pelanggan'],'','custumerId','ui-widget-content ui-corner-all').
		  $db->dbInput('hidden','kendaraanId',$_GET['kendaraan'],'','kendaraanId','ui-widget-content ui-corner-all').
		  $db->dbInput('hidden','userId',$_GET['user'],'','userId','ui-widget-content ui-corner-all').
		  $db->dbInput('hidden','md','1','','md','ui-widget-content ui-corner-all').
		  $db->dbInput('hidden','payment',$_GET['payment'],'','payment','ui-widget-content ui-corner-all');
	foreach($cash as $field => $val){
		print "<tr>";
		
		print "<td width='35%'>".$field."</td><td>: ".$val."</td>";
		
		print "</tr>";
	}
	print "<tr>";
		
		print "<td width='35%'>".$q."</td><td>: ".$i."</td>";
		
		print "</tr>";
?>
</table>
<small> * Sebelum anda menekan tombol Submit, jangan lupa mengisi inputan tanggal, bayaran atau DP.</small>
</form>
<br />


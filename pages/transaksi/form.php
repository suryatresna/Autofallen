<script>
$(function() {
		

		$.ajax({
			url: "pages/transaksi/search.php",
			dataType: "xml",
			success: function( xmlResponse ) {
				var data = $( "pelanggan", xmlResponse ).map(function() {
					return {
						value: $( "id", this ).text()+", "+$( "nama", this ).text(),
						nama: $( "nama", this ).text(),
						id: $( "id", this ).text(),
						alamat: $( "alamat", this ).text(),
						telp: $( "telp", this ).text()
					};
				}).get();
				$( "#pelanggan" ).autocomplete({
					source: data,
					minLength: 0,
					select: function( event, ui ) {
						$("#nama").attr('value',ui.item.nama);
						$("#alamat").attr('value',ui.item.alamat);
						$("#telp").attr('value',ui.item.telp);						
						$("#submit").attr('pelanggan',ui.item.id);					}
				});
			}
		});
		$.ajax({
			url: "pages/transaksi/search_kendaraan.php",
			dataType: "xml",
			success: function( xmlResponse ) {
				var data = $( "kendaraan", xmlResponse ).map(function() {
					return {
						value: $( "no_pol", this ).text(),
						pemilik: $( "pemilik", this ).text(),
						hargaPokok: $( "hargaPokok", this ).text(),
						hargaJual: $( "hargaJual", this ).text(),
						type: $( "type", this ).text(),
						id: $( "id", this ).text(),
					};
				}).get();
				$( "#kendaraan" ).autocomplete({
					source: data,
					minLength: 0,
					select: function( event, ui ) {
						$("#pemilik").attr('value',ui.item.pemilik);
						$("#hargaPokok").attr('value',ui.item.hargaPokok);
						$("#hargaJual").attr('value',ui.item.hargaJual);
						$("#type").attr('value',ui.item.type);
						$("#submit").attr('kendaraan',ui.item.id);		
					}
				});
			}
		});
		
		$.ajax({
			url: "pages/transaksi/search_leasing.php",
			dataType: "xml",
			success: function( xmlResponse ) {
				var data = $( "leasing", xmlResponse ).map(function() {
					return {
						value: $( "nama", this ).text() +" , ID : "+$( "id", this ).text(),
						id: $( "id", this ).text(),
						nama: $( "nama", this ).text(),
						telp: $( "telp", this ).text(),
					};
				}).get();
				$( "#leasing" ).autocomplete({
					source: data,
					minLength: 0,
					select: function( event, ui ) {
						$("#namaLeasing").attr('value',ui.item.nama);
						$("#telpLeasing").attr('value',ui.item.telp);
						$("#submit").attr('leasing',ui.item.id);	
						
					}
				});
			}
		});
		
		$("#payment").change(function(){
			var data = $(this).attr('value');
			
			$("#submit").attr('payment',data);	
		});
	
		$("#submit").button().click(function(){
			var tb = $(this).attr('tb');
			var h = $(this).attr('h');
			var w = $(this).attr('w');
			var title = $(this).attr('title');
			var payment = $(this).attr('payment');
			var pelanggan = $(this).attr('pelanggan');
			var kendaraan = $(this).attr('kendaraan');
			var leasing = $(this).attr('leasing');
			var user = $(this).attr('user');
		$("#form-transaksi").load('pages/transaksi/payment.php?pelanggan='+pelanggan+'&leasing='+leasing+'&kendaraan='+kendaraan+'&payment='+payment+'&user='+user);
		$("#form-transaksi").dialog({
				width: w,
				height: h,
				modal: true,
				title: title,
				buttons:{
				"Print and Submit":function(){
					
					},
					Submit:function(){
						$.post('pages/store_payment.php?&ac=insert',$("#form").serialize(),function(data){
							
								alert(data);document.location='';
							})
							$(this).dialog("close");
						},
					Close:function(){
						$(this).dialog("close");
						}	
				}
				
			});		
		});	
			
		
		
		
		
		
		
	});
</script>
<div id="transaksi">
<table>
	<thead>
    <tr class="ui-widget-header">
    <td>ID Pelanggan : <input type="text" id="pelanggan" class="ui-widget-content ui-corner-all" value="<?php print $_GET['id'] ?>"></td>
    </tr>
    </thead>
</table>

<table>
    <tr>
    <td width="2%">Nama</td><td width="10%"><input type="text" value="" id="nama" class="text ui-widget-content ui-corner-all" disabled></td>
    <td width="2%">Telepon</td><td width="10%"><input type="text" value="" id="telp" class="text ui-widget-content ui-corner-all" disabled></td>
    </tr>
    <tr>
    <td width="2%">Alamat</td><td width="10%" colspan="80%"><textarea id="alamat" disabled class="text ui-widget-content ui-corner-all"></textarea></td>
    </tr>
    
</table>

<table>
	<thead>
    <tr class="ui-widget-header">
    <td>ID Leasing : <input type="text" id="leasing" class="ui-widget-content ui-corner-all" value="<?php print $_GET['id'] ?>"></td>
    </tr>
    </thead>
</table>

<table>
    <tr>
    <td width="2%">Nama</td><td width="10%"><input type="text" value="" id="namaLeasing" class="text ui-widget-content ui-corner-all" disabled></td>
    <td width="2%">Telepon</td><td width="10%"><input type="text" value="" id="telpLeasing" class="text ui-widget-content ui-corner-all" disabled></td>
    </tr>
    
</table>

<table>

    <tr class="ui-widget-header">
    <td>No Polisi : <input type="text" id="kendaraan" class="ui-widget-content ui-corner-all" value="<?php print $_GET['id'] ?>"></td>
    </tr>
    
</table>

<table>
    <tr>
    <td width="2%">Pemilik</td><td width="10%"><input type="text" value="" id="pemilik" class="text ui-widget-content ui-corner-all" disabled></td>
    <td width="2%">Tipe Kendaraan</td><td width="10%"><input type="text" value="" id="type" class="text ui-widget-content ui-corner-all" disabled></td>
    </tr>
    <tr>
    <td width="2%">Harga Pokok</td><td width="10%"><input type="text" value="" id="hargaPokok" class="text ui-widget-content ui-corner-all" disabled></td>
    <td width="2%">Harga Jual</td><td width="10%"><input type="text" value="" id="hargaJual" class="text ui-widget-content ui-corner-all" disabled></td>
    </tr>
    
</table>

<table>
	<thead>
    <tr class="ui-widget-header">
    <td>Metode Pembayaran :
    <?php
		print $db->dbSelect('payment','transaksi_payment','payment','ui-widget-content ui-corner-all');
	?>
    		<!--<input type="button" edit='0' title='Cash Payment' h='400' w='400' tb='transaksi' pay='1' class="payment" id="cash" name="cash"  value="Cash"/>
		<input type="button" edit='0' title='Credit Payment'  h='400' w='400' tb='transaksi' pay='2' class="payment" id="credit" name="credit" value="Credit" />-->
	</td>
    </tr>
    </thead>
</table>

<table>
    <tr>
    <td align="right"><input type="button" user='<?php print $db->searchId('access_user','id','user',$_SESSION['user']) ?>'title='Transaksi' h='450' w='400' name="submit" id="submit" value="submit"/></td>
    </tr>
    
</table>

</div>

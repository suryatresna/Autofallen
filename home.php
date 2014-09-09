<?php

?>
<script>
$(document).ready(function () {
var parentsLength = $("#jqxWidget").parents().length;
var source =
			{
			datatype: "json",
			datafields: [
			{ name: 'tglBayar', type: 'date'},
			{ name: 'value'},
			],
			id : 'id',
			url: 'pages/stats/data.php?id=sales'
			
			};	
/*var dataAdapter = new $.jqx.dataAdapter(source);*/
var dataAdapter = new $.jqx.dataAdapter(source,
				{
				autoBind: true,
				async: false,
				downloadComplete: function () { },
				loadComplete: function () { },
				loadError: function () { }
				});


// prepare jqxChart settings
var settings = {
		title: "Statistik Penjualan",
		showLegend: true,
		source: dataAdapter,
		enableAnimations: true,
		categoryAxis:{
			dataField: 'tglBayar',
			formatFunction: function (value) {
				/* var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
				return months[new Date(value).getMonth()];*/
				return $.jqx.dataFormat.formatdate(value, 'd');
				},
			
				showTickMarks: true,
				axisSize: 'auto'
		},
		colorScheme: 'scheme05',
		seriesGroups:[{
		type: 'area',
		valueAxis:{
		unitInterval:5,
		
		
		displayValueAxis: true,
		axisSize: 'auto',
		tickMarksColor: '#888888'
		},
		series: [{ dataField: 'value', displayText: 'value' }]
		}]
};
// setup the chart
$('#jqxStatistik').jqxChart(settings);
$( "#sortable1" ).sortable();
$( "#sortable1" ).disableSelection();
$( ".column" ).sortable({
connectWith: ".column"
});

$( ".portlet" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
.find( ".portlet-header" )
.addClass( "ui-widget-header ui-corner-all" )
.prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
.end()
.find( ".portlet-content" );

$( ".portlet-header .ui-icon" ).click(function() {
$( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
$( this ).parents( ".portlet:first" ).find( ".portlet-content" ).toggle('slideDown');
});

$( ".column" ).disableSelection();

var theme = "";

$("#jqxVerticalScrollBar").jqxScrollBar({ width: 18, height: 280, min: 0, max: 1000, vertical: true, theme: theme });

});
</script>
<div id="quickmn">
<ul id="sortable1">
<li>
<h3>statistik</h3>
<a href="?mod=5"><span name='statistik'></span></a>
<p>Dapatkan Pengalaman terbaik dalam mengelolaan data anda.!</p>

</li>

<li>
<h3>transaksi</h3>
<a href="?mod=3&temp=10"><span name='transaksi'></span></a>
<p>Dapatkan Pengalaman terbaik dalam mengolah data anda.!</p>

</li>

<li>
<h3>stock</h3>
<a href="?mod=1"><span name='stock'></span></a>
<p>Dapatkan Pengalaman terbaik dalam mengolah data anda.!</p>

</li>

<li>
<h3>security</h3>
<a href="?mod=6&temp=7"><span name='security'></span></a>
<p>Dapatkan Pengalaman terbaik dalam mengolah data anda.!</p>

</li>

<li>
<h3>custumer</h3>
<a href="?mod=2"><span name='custumer'></span></a>
<p>Dapatkan Pengalaman terbaik dalam mengolah data anda.!</p>

</li>

</ul>
</div>

<div id="inform">
<div class="colL ui-corner-all">
<ul class="column">

<li class="portlet">
<h3 class="portlet-header">Info Site</h3>
<div class="portlet-content">
<table width="100%" id="info-site">
<tr><td><span>Transaksi</span></td><td><b><?php print $db->func_stats('transaksi','*','COUNT') ?> (Data)</b></td></tr>
<tr><td><span>Custumer</span></td><td><b><?php print $db->func_stats('custumer','*','COUNT') ?> (Data)</b></td></tr>
<tr><td><span>Stok Kendaraan</span></td><td><b><?php print $db->func_stats('kendaraan','*','COUNT') ?> (Data)</b></td></tr>
<tr><td><span>User</span></td><td><b><?php print $db->func_stats('access_user','*','COUNT') ?> (Data)</b></td></tr>
<tr><td><span>Total Penjualan</span></td><td><b>Rp. <?php print number_format($db->func_stats('transaksi_detail','bayar','SUM')) ?></b></td></tr>
</table>
</div>
</li>

<li class="portlet">
<h3 class="portlet-header">Statistik</h3>
<div class="portlet-content">
<div id='jqxStatistik' style="width:98%px; height:200px"></div>
</div>
</li>

</ul>
</div>

<div class="colR ui-corner-all" >
<ul>

<li>
<h3 class="ui-widget-header ui-corner-all">News</h3>
<ul>
<?php
//$kend = $db->qry('SELECT type');
$tbh = array('no_pol','warna','type','hargaJual','hargaPokok','th','pemilik','id','status');

$s = $db->selectTb('kendaraan',$tbh,'id DESC LIMIT 0, 5');
$tb = $db->qry($s);
while($data=mysql_fetch_row($tb))
{

print "<li>"
."<h3 style='color:#bebe'>".$data[0]."</h3>"
."Tipe : <b>".$db->searchId('kendaraan_type','type','id',$data[2])."</b> <br />"
."Harga Pokok : <b>Rp. ".number_format($data[4])."</b> <br />"
."Harga Jual :<b>Rp. ".number_format($data[3])."</b>"
."</li>";

}
?>
</ul>
</li>


</ul>
</div>

</div>
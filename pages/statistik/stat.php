<script>
$(function() {
	
	$('.calendar').datepicker({
		changeMonth : true,
		changeYear : true,
		showAnim : 'slideDown'	
		
	});
	
	$('#btn_save').button().click(function(){
		var date1 = $('#from').attr('value');
		var date2 = $('#to').attr('value');
		var longDays = $('#longDays').attr('value',payment.getLongDate(date2,date1));
		
			
	});
	
	$( "#selectable" ).selectable({
			stop: function() {
				var result = $( "#select-result" ).empty();
				$( ".ui-selected", this ).each(function() {
					var index = $( "#selectable li" ).index( this );
					result.append( " #"+ ( index + 1 ) );
				});
			}
		});
	$("#selectable > li").click(function(){
		var tb = $(this).attr('tb');
		alert('Hello '+tb);	
	});


});
</script> 
<script type="text/javascript">
            $(document).ready(function () {
						
    // prepare the data
    /*var source = { datafields: [{ name: 'tanggal' },{ name: 'value' }],
        root: "transaksis",
        record: "transaksi",
        datatype: "xml",
        url: 'pages/statistik/transaksi.xml.php?date1='+date1+'&date2='+date2+''
    }*/
	
	var source =
		{
			 datatype: "json",
			 datafields: [
				 { name: 'tglBayar', type: 'date'},
				 { name: 'value'},
			],
			url: 'pages/statistik/pelanggan.xml.php'
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
				return $.jqx.dataFormat.formatdate(value, 'M');
            },
     
					showTickMarks: true,
					tickMarksInterval: Math.round(dataAdapter.records.length / 6),
					tickMarksColor: '#888888',
					unitInterval: Math.round(dataAdapter.records.length / 6),
					showGridLines: true,
					gridLinesInterval: Math.round(dataAdapter.records.length / 3),
					gridLinesColor: '#888888',
					axisSize: 'auto'
        },
        colorScheme: 'scheme04',
        seriesGroups:[{
            type: 'line',
            valueAxis:{
                displayValueAxis: true,
                axisSize: 'auto',
                tickMarksColor: '#888888'
            },
            series: [{ dataField: 'value', displayText: 'value' }]
        }]
    };
    // setup the chart
    $('#jqxChart').jqxChart(settings);
});
    </script>

<div id="stat_col_left" style="">

<div style="width:100%; display:block;" class="col ui-widget-content ui-corner-all">
<h3 class="ui-widget-header">Kalender</h3>
<!--<p id="feedback">
<span>You've selected:</span> <span id="select-result">none</span>.
</p>-->
<table width="100%">
<tr><td><span>from</span> </td><td><input type="text" class="calendar ui-widget-content ui-corner-all" id="from" /></td></tr>
<tr><td><span>to</span></td><td> <input type="text" class="calendar ui-widget-content ui-corner-all" id="to" /></td></tr>
<tr><td><span>long Days</span></td><td> <input type="text" class="ui-widget-content ui-corner-all" id="longDays" /></td></tr>
<tr><td><input type="button" id="btn_save" value="save"/></td><td> </td></tr>
</table>
</div>


<div style="width:100%; display:block;" class="ui-widget-content ui-corner-all">
<h3 class="ui-widget-header">Pilihan</h3>
<!--<p id="feedback">
<span>You've selected:</span> <span id="select-result">none</span>.
</p>-->
<ul id='selectable' class="group">
<li tb='custumer'><span class="ui-icon ui-icon-person"></span>Custumer</li>
<li tb='kendaraan'><span class="ui-icon ui-icon-gear"></span>Kendaraan</li>
<li tb='leasing'><span class="ui-icon ui-icon-tag"></span>Leasing</li>
<li tb='access_user'><span class="ui-icon ui-icon-star"></span>Favorite</li>
<li tb='transaksi'><span class="ui-icon ui-icon-cart"></span>Sales and Order</li>
</ul>
</div>




</div>

<div style="float:right; width:67%; display:block" class="ui-widget-content ui-corner-all">
<h3 class="ui-widget-header">Data Statistik</h3>
<div id='jqxChart' style="width:98%px; height:400px">
    </div>
</div>
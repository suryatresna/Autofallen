<script type="application/javascript">
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
        colorScheme: 'scheme06',
        seriesGroups:[{
            type: 'line',
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
    $('#jqxChart').jqxChart(settings);
	
	var dataGrid = new $.jqx.dataAdapter(source);
	
	 $("#jqxgrid").jqxGrid(
            {
                width: 670,
				height: 200,
                source: dataGrid,
                theme: '',
                columnsresize: false,
                columns: [
                  { text: 'tglBayar', datafield: 'tglBayar', width: 550 },
                  { text: 'value', datafield: 'value', width: 100 },
              ]
            });
	  // trigger the column resized event.
           
	});
</script>
<div id='jqxChart' style="width:98%px; height:400px"></div>
<hr>
<h2>Data Table</h2>
<div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
        <div id="jqxgrid"></div>
    </div>
<script type="application/javascript">
$(document).ready(function () {
		var parentsLength = $("#jqxWidget").parents().length;
		var source =
		{
			 datatype: "json",
			 datafields: [
				 { name: 'tipe'},
				 { name: 'value'},
			],
			id : 'id',
			url: 'pages/stats/data.php?id=vicile'
			
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
        title: "Stok Kendaraan",
        showLegend: true,
        source: dataAdapter,
		enableAnimations: true,
        categoryAxis:{
            text: 'Category Axis',
                       textRotationAngle: 0,
                        dataField: 'tipe',
                        showTickMarks: true,
                        tickMarksInterval: 1,
                        tickMarksColor: '#888888',
                        unitInterval: 1,
                        showGridLines: false,
                        gridLinesInterval: 1,
                        gridLinesColor: '#888888',
                        axisSize: 'auto'

        },
        colorScheme: 'scheme06',
        seriesGroups:[{
            type: 'stackedcolumn',
           					valueAxis:
                            {
                                unitInterval: 1,
                                
                                displayValueAxis: true,
                                description: 'Banyak Stock',
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
                  { text: 'tipe', datafield: 'tipe', width: 550 },
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
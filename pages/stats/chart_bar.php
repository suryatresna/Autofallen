<script type="application/javascript">
$(document).ready(function () {
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
<div id='jqxChart' style="width:98%px; height:400px"></div>
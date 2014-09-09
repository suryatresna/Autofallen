<?php
	#Include the connect.php file
	include('connect.php');
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}

	$query = "SELECT * FROM  `invoices` ORDER BY OrderDate LIMIT 0 , 100";
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());

	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'OrderDate' => $row['OrderDate'],
			'ProductName' => $row['ProductName'],
			'Quantity' => $row['Quantity']
		  );
	}

	echo json_encode($orders);
?>
<SCRIPT LANGUAGE="javascript">
<!--
window.open ('titlepage.html', 'newwindow');
-->
</SCRIPT>

<SCRIPT LANGUAGE="javascript">
<!--
window.open ('page.html')
-->
</SCRIPT>
<SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=400,height=200,scrollbars=yes');
return false;
}
//-->
</SCRIPT>
<A 
   HREF="popupbasic.html" 
   onClick="return popup(this, 'notes')">my popup</A>
   <A HREF="popupbasic.html" onClick="return popup(this, 'stevie')">my popup</A>
<SCRIPT LANGUAGE="JavaScript">

function openindex()
      {
OpenWindow=window.open("", "newwin", "height=250, width=250,toolbar=no,scrollbars="+scroll+",menubar=no");
OpenWindow.document.write("<TITLE>Title Goes Here</TITLE>")
OpenWindow.document.write("<BODY BGCOLOR=pink>")
OpenWindow.document.write("<h1>Hello!</h1>")
OpenWindow.document.write("This text will appear in the window!")
OpenWindow.document.write("</BODY>")
OpenWindow.document.write("</HTML>")

OpenWindow.document.close()
self.name="main"
     }
</SCRIPT>

<script type="text/javascript">
	$(document).ready(function () {
		var source =
		{
			 datatype: "json",
			 datafields: [
				 { name: 'OrderDate', type: 'date'},
				 { name: 'Quantity'},
				 { name: 'ProductName'}
			],
			url: 'data.php'
		};

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
			title: "Orders by Date",
			showLegend: true,
			padding: { left: 5, top: 5, right: 5, bottom: 5 },
			titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
			source: dataAdapter,
			categoryAxis:
				{
					text: 'Category Axis',
					textRotationAngle: 0,
					dataField: 'OrderDate',
					formatFunction: function (value) {
						return $.jqx.dataFormat.formatdate(value, 'dd/MM/yyyy');
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
			colorScheme: 'scheme05',
			seriesGroups:
				[
					{
						type: 'line',
						valueAxis:
						{
							displayValueAxis: true,
							description: 'Quantity',
							//descriptionClass: 'css-class-name',
							axisSize: 'auto',
							tickMarksColor: '#888888',
							unitInterval: 20,
							minValue: 0,
							maxValue: 100
						},
						series: [
								{ dataField: 'Quantity', displayText: 'Quantity' }
						  ]
					}
				]
		};

		// setup the chart
		$('#jqxChart').jqxChart(settings);
	});
</script>
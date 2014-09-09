
<div id="stat_col_left" style="">

<!--<div style="width:100%; display:block;" class="col ui-widget-content ui-corner-all">
<h3 class="ui-widget-header">Kalender</h3>
<!--<p id="feedback">
<span>You've selected:</span> <span id="select-result">none</span>.
</p>
<table width="100%">
<tr><td><span>from</span> </td><td><input type="text" class="calendar ui-widget-content ui-corner-all" id="from" /></td></tr>
<tr><td><span>to</span></td><td> <input type="text" class="calendar ui-widget-content ui-corner-all" id="to" /></td></tr>
<tr><td><span>long Days</span></td><td> <input type="text" class="ui-widget-content ui-corner-all" id="longDays" /></td></tr>
<tr><td><input type="button" id="btn_save" value="save"/></td><td> </td></tr>
</table>
</div>-->


<div style="width:100%; display:block;" class="ui-widget-content ui-corner-all">
<h3 class="ui-widget-header">Pilihan</h3>
<!--<p id="feedback">
<span>You've selected:</span> <span id="select-result">none</span>.
</p>-->
<ul class="group">
<li ><a href="?mod=<?php print $_GET['mod'] ?>&mode=dashboard"><span class="ui-icon ui-icon-home"></span>Dashboard</a></li>
<li ><a href="?mod=<?php print $_GET['mod'] ?>&mode=vicile"><span class="ui-icon ui-icon-gear"></span>Stok Vecile</a></li>
<li ><a href="?mod=<?php print $_GET['mod'] ?>&mode=sales"><span class="ui-icon ui-icon-tag"></span>Sales & order</a></li>
<li ><a href="?mod=<?php print $_GET['mod'] ?>&mode=sell"><span class="ui-icon ui-icon-cart"></span>Custumer Sell</a></li>
<!--<li ><a href="?mod=<?php print $_GET['mod'] ?>&mode=user"><span class="ui-icon ui-icon-key"></span>User Access</a></li>
--></ul>
</div>




</div>

<div style="float:right; width:67%; display:block" class="ui-widget-content ui-corner-all">
<h3 class="ui-widget-header">Data Statistik</h3>
<?php
if(!isset($_GET['mode']) || $_GET['mode']==null ){
	include "dashboard.php";	
}
else {
	switch($_GET['mode'])
	{
		default:
		include "dashboard.php";
		break;
		
		case'dashboard':
		include "dashboard.php";
		break;
		
		case'sales':
		include "sales.php";
		break;
		
		case'vicile':
		include "vicile.php";
		break;
		
		case'sell':
		include "sell.php";
		break;
	}
}
?>
</div>
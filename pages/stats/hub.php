<?php
include_once "../../config/modul/db.class.php";
$db= new db();
$db->opendb();
?>
<script>
$(document).ready(function(){
$("#tables").dataTable({
		"sPaginationType":"full_numbers",	
		"bJQueryUI": true,
		"bPaginate": false,
       	"bFilter": true,
        "bSort": false,
		"fnDrawCallback": function ( oSettings ) {
            if ( oSettings.aiDisplay.length == 0 )
            {
                return;
            }
             
            var nTrs = $('#tables tbody tr');
            var iColspan = nTrs[0].getElementsByTagName('td').length;
            var sLastGroup = "";
            for ( var i=0 ; i<nTrs.length ; i++ )
            {
                var iDisplayIndex = oSettings._iDisplayStart + i;
                var sGroup = oSettings.aoData[ oSettings.aiDisplay[iDisplayIndex] ]._aData[0];
                if ( sGroup != sLastGroup )
                {
                    var nGroup = document.createElement( 'tr' );
                    var nCell = document.createElement( 'td' );
                    nCell.colSpan = iColspan;
                    nCell.className = "group";
                    nCell.innerHTML = sGroup;
                    nGroup.appendChild( nCell );
                    nTrs[i].parentNode.insertBefore( nGroup, nTrs[i] );
                    sLastGroup = sGroup;
                }
            }
        },
        "aoColumnDefs": [
            { "bVisible": false, "aTargets": [ 0 ] }
        ],
        "aaSortingFixed": [[ 0, 'asc' ]],
        "aaSorting": [[ 1, 'asc' ]],
        //"sDom": 'lfr<"giveHeight"t>ip',
		
		});
		var source =
		{
			 datatype: "json",
			 datafields: [
				 { name: 'tglBayar', type: 'date'},
				 { name: 'value'},
			],
			url: 'data.php'
		};

		
});
</script>

<h3 class="ui-widget-header">Data Statistik <?php ?></h3>
<!--<div id='jqxChart' style="width:98%px; height:400px">
    </div>-->
<?php

if(!isset($_GET['tb']))
{
	include 'dashboard.php';	
}
else
{
	switch($_GET['tb']){
		case'home':
		include 'dashboard.php';
		break;
		case'transaksi':
		include 'chart_bar.php';
		break;
	}
	
}

?>
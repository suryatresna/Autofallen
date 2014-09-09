<script>
$(document).ready(function(){
$("#tables_stats").dataTable({
		"sPaginationType":"full_numbers",	
		"bJQueryUI": true,
		"bPaginate": true,
       	"bFilter": true,
        "bSort": false,
		"fnDrawCallback": function ( oSettings ) {
            if ( oSettings.aiDisplay.length == 0 )
            {
                return;
            }
             
            var nTrs = $('#tables_stats tbody tr');
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

		
});
</script>
<h2>Stats Transaksi</h2>
<table id="tables_stats" width="100%" cellpadding="2">
<thead>
<tr>
<th>Date</th><th>Tangal</th><th>Sum</th><th>Avg</th><th>Max</th><th>Min</th><th>Count</th>
</tr>
</thead>

<tbody>

<?php
	$qry = $db->qry("SELECT DATE_FORMAT(tglBayar,'%M, %Y'), SUM(bayar), AVG(bayar),MAX(bayar),MIN(bayar),COUNT(*), DATE_FORMAT(tglBayar, '%a %e') FROM transaksi_detail GROUP BY tglBayar DESC");
	
	while($data=mysql_fetch_array($qry)){
	
print "<tr>";
print "<td>".$data[0]."</td><td align='center'>".$data[6]."</td><td>Rp. ".number_format(($data[1]))."</td><td>Rp. ".number_format(ceil($data[2]))."</td><td>Rp. ".number_format($data[3])."</td><td>Rp. ".number_format($data[4])."</td><td align='center'><a title='".$data[6]."'>".$data[5]."</a></td>";
print "</tr>";
	
	
	}
?>
</tbody>

<tfoot>
<tr>
<th>Date</th><th colspan="10%">Sum</th><th colspan="5">Rp. <?php print number_format($db->func_stats('transaksi_detail','bayar','SUM')) ?></th>
</tr>
<tr>
<th>Date</th><th colspan="10%">Average</th><th colspan="5">Rp. <?php print number_format($db->func_stats('transaksi_detail','bayar','AVG')) ?></th>
</tr>
<tr>
<th>Date</th><th colspan="10%">Max</th><th colspan="5">Rp. <?php print number_format($db->func_stats('transaksi_detail','bayar','MAX')) ?></th>
</tr>
<tr>
<th>Date</th><th colspan="10%">Min</th><th colspan="5">Rp. <?php print number_format($db->func_stats('transaksi_detail','bayar','MIN')) ?></th>
</tr>


</tfoot>


</table>

<div style="display:block;">


</div>
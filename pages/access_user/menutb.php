<script>
	$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			}
		});
	});
	</script>
    <div id="set">
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="access_menu" w="400" h="270" title="Tambah Menu Data Baru"><span class="ui-icon ui-icon-plus"></span></button>
<button class="create-form" valid='<?php print $db->checkUser('cinsert',$_SESSION['user'],$_GET['mod']) ?>' tb="access_menu_category" w="400" h="200" title="Tambah Category Data Baru"><span class="ui-icon ui-icon-bookmark"></span></button>
</div>


<div id="users-contain" class="ui-widget">
	<h1><?php print $db->searchId('access_menu','menu','id',$_GET['temp']) ?></h1>
	<table id="tables" class="ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header ">
            	<th width="1%">No</th>
				<?php
				$headtb = array('Menu'=>'30%','Category'=>'20%','URL'=>'20%','Status'=>'10%');
				foreach($headtb as $head => $w){
				print "<th width='".$w."'>".$head."</th>";	
				}
				?>
                <th width="2%">Action</th>
			</tr>
		</thead>
		<tbody>
			
				<?php 
				$tbh = array('menu','category','url','status','id');
				$s = $db->selectTb('access_menu',$tbh);
				$tb = $db->qry($s);
				$i=1;
				while($data=mysql_fetch_row($tb))
				{
					print "<tr>";
				print"<td>".$i."</td>";
				print"<td>".$data[0]."</td>";
				print"<td>".$db->searchId('access_menu_category','category','id',$data[1])."</td>";
				print"<td>".$data[2]."</td>";
				print"<td><span class='status' name='".$data[3]."'></span></td>";
				print"<td>
				<a class='edit' valid='".$db->checkUser('cupdate',$_SESSION['user'],$_GET['mod'])."'  h=270 w=400 title='Edit Data ".$data[4]."' tb='access_menu' f='id' id='".$data[4]."'><span class='ui-icon ui-icon-pencil'></span></a>
				<a class='delete' valid='".$db->checkUser('cdelete',$_SESSION['user'],$_GET['mod'])."'  title='Trash Data ".$data[4]."' tb='access_menu' f='id' id='".$data[4]."'><span class='ui-icon ui-icon-trash'></span></a>
				
				</td>";	
					print "</tr>";
					$i++;
				}
				?>
		</tbody>
        <tr>
	</table>
    
</div>
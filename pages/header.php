
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE_PROJECT ?></title>
<link href="config/theme/default.css" rel="stylesheet" type="text/css" />
<link href="config/jquery/css/custom-theme/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css"  />
<link href="config/jquery/styles/jqx.base.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="config/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="config/jquery/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="config/jquery/jquery.dataTables.js"></script>
<script type="text/javascript" src="config/jquery/jqx-all.js"></script>

<link rel="stylesheet" media="screen" type="text/css" href="config/jquery/css/colorpicker.css" />
<script type="text/javascript" src="config/jquery/colorpicker.js"></script>
<script type="text/javascript" src="config/jquery/ajax.js"></script>

<script type="text/javascript">



function init_dropdown(){
	$("li.dropdown_trigger").mouseover(function(){
		$("li.dropdown_trigger > ul").fadeIn();	
	})
}

	$(document).ready(function(){
		init_dropdown();
		$(".box").fadeIn('slow');
		$(".right-bar").fadeIn('slow');
		$("#set").buttonset();
		
		
		$('.report-form').click(function(){
			var tb = $(this).attr('tb');
			
			document.location='pages/report/index.php?tb='+tb;
		})	
		
		
		$('.print').click(function(){
			var tb = $(this).attr('tb');
			var h = $(this).attr('h');
			var w = $(this).attr('w');
			var title = $(this).attr('title');
			var f = $(this).attr('f');
			var id = $(this).attr('id');
			var user = $(this).attr('user');
			var pay = $(this).attr('pay');
			window.open('pages/report/win_report.php?tb='+tb+'&f='+f+'&id='+id+'&user='+user+'&pay='+pay,title,'width='+w+',height='+h+',scrollbars=yes');		
		})

		
		$(".payment-edit").click(function(){
			var tb = $(this).attr('tb');
			var h = $(this).attr('h');
			var w = $(this).attr('w');
			var id = $(this).attr('id');
			var title = $(this).attr('title');
			var pay = $(this).attr('pay');
			var pelanggan = $(this).attr('pelanggan');
			var kendaraan = $(this).attr('kendaraan');
			var leasing = $(this).attr('leasing');
		$("#form-payment").load('pages/transaksi/credit.php?id='+id);		
			
		$("#form-payment").dialog({
				width: w,
				height: h,
				modal: true,
				title: title,
				buttons:{
					Submit:function(){
						$.post('pages/store.php?tb='+tb+'&ac=insert',$("#form").serialize(),function(data){
								alert(data);document.location='';
							})
							$(this).dialog("close");
						},
					Close:function(){
						$(this).dialog("close");
						}	
				}
				
			});		
		});
		
		
		
		
		
		
		 $('#color').ColorPicker({
		 onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
		$('#color').attr('value','#'+hex);
		$('#colorSelector div').css('backgroundColor', '#' + hex);
		},
		onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
		},
	})
	.bind('keyup', function(hex){
	$(this).ColorPickerSetColor(this.value);
	});
		
		
		$(".delete").click(function(){
			var conf = confirm("Yakin data ini di hapus.?");
			var id = $(this).attr('id');
			var tb = $(this).attr('tb');
			var f = $(this).attr('f');
			var valid = $(this).attr('valid');
			if(valid == 1){
			if(conf == true){
				$.post('pages/store.php?tb='+tb+'&f='+f+'&ac=delete&id='+id,function(data){
					document.location='';
					});	
			}
			else{
				return false;	
			}
			}
			else {
				alert ("Maaf, anda tidak dapat mengakses aksi ini.");	
			}
			});
		
		$(".delete_transaksi").click(function(){
			var conf = confirm("Yakin transaksi ini di hapus.?");
			var id = $(this).attr('id');
			var tb = $(this).attr('tb');
			var f = $(this).attr('f');
			var valid = $(this).attr('valid');
			if(valid == 1){
			if(conf == true){
				$.post('pages/store_payment.php?tb='+tb+'&f='+f+'&ac=delete&id='+id,function(data){
					document.location='';
					});	
			}
			else{
				return false;	
			}
			}
			else {
				alert ("Maaf, anda tidak dapat mengakses aksi ini.");	
			}
			});
		
		
		$(".create-form").click(function(){
			var tb = $(this).attr('tb');
			var h = $(this).attr('h');
			var w = $(this).attr('w');
			var title = $(this).attr('title');
			var valid = $(this).attr('valid');
			if(valid == 1){
			$("#form-box").load('pages/form.php?form='+tb+'&ac=insert');
			$("#form-box").dialog({
				width: w,
				height: h,
				modal: true,
				title: title,
				buttons:{
					Submit:function(){
						$.post('pages/store.php?tb='+tb+'&ac=insert',$("#form").serialize(),function(data){
								alert(data);document.location='';
							})
							$(this).dialog("close");
						},
					Close:function(){
						$(this).dialog("close");
						}	
				}
				
			});	
			}
			else {
				alert ("Maaf, anda tidak dapat mengakses aksi ini.");	
			}
		});
		
		$(".edit").click(function(){

			var tb = $(this).attr('tb');
			var title = $(this).attr('title');
			var h = $(this).attr('h');
			var w = $(this).attr('w');
			var id = $(this).attr('id');
			var f = $(this).attr('f');
			var valid = $(this).attr('valid');
			if(valid == 1){
			$("#form-box").load('pages/form.php?form='+tb+'&id='+id+'&ac=update');
			$("#form-box").dialog({
				width: w,
				height: h,
				modal: true,
				title: title,
				buttons:{
					Submit:function(){
						$.post('pages/store.php?tb='+tb+'&id='+id+'&f='+f+'&ac=update',$("#form").serialize(),function(data){
								alert(data);document.location='';
							})
							$(this).dialog("close");
						},
					Close:function(){
						$(this).dialog("close");
						}
					}
					
			});	
			}
			else {
				alert ("Maaf, anda tidak dapat mengakses aksi ini.");	
			}
		});
		
		$("#tables").dataTable({
		"sPaginationType":"full_numbers",	
		"bJQueryUI": true,
		});
		
		$(".smallTb").dataTable({
			 "sScrollY": "150px",
		"bPaginate": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": false,
        "bAutoWidth": false,
		"sPaginationType":"full_numbers",	
		"bJQueryUI": true,
		});
		
		
		
	});	
	function fade(id,subid){
		var i = $("."+id);
		if(i.attr('class')== id+' ui-icon ui-icon-circle-triangle-n'){
		$('.'+id).attr('class',id+' ui-icon ui-icon-circle-triangle-s')	
		$('#'+subid).fadeOut('fast');
		}
		else{
		$('.'+id).attr('class',id+' ui-icon ui-icon-circle-triangle-n')	
		$('#'+subid).fadeIn('fast');	
		}
	}


</script>
</head>

<body>
<div id="uploadDialog" style="display:none" title="Basic Dialog">

</div>

<div id="form-transaksi">

</div>
<div id="form-payment">

</div>
<div id="container">

<!-- HEADER SET -->
 <div id="header">
  <!-- HEADER MENU -->
  <?php
  include_once "pages/navigation.php";
  ?>  
     </div>
 </div>
<?php include_once "../config/modul/db.class.php";$db= new db();$db->opendb();$transaksi =array('tglBayar'=>$_POST['tglBayar'],'payment'=>$_POST['payment'],'leasingId'=>$_POST['leasingId'],'custumerId'=>$_POST['custumerId'],'kendaraanId'=>$_POST['kendaraanId'],'userId'=>$_POST['userId'],);$transaksi_detail =array('transaksiId'=>mysql_insert_id(),'bayar'=>$_POST['bayar'],'tglBayar'=>$_POST['tglBayar'],);if($_GET['ac']=='insert'){if($db->insert('transaksi',$transaksi)==true) {$transaksi_detail =array('transaksiId'=>mysql_insert_id(),'bayar'=>$_POST['bayar'],'md'=>$_POST['md'],'tglBayar'=>$_POST['tglBayar'],);if($db->insert('transaksi_detail',$transaksi_detail)==true){$status = true;	}else{$status= false;	}}else{$status = false;}}elseif($_GET['ac'] == 'delete'){$id = $_GET['id'];if($db->delete('transaksi','id',$id)==true &&$db->delete('transaksi_detail','transaksiId',$id)==true){$status = true;	}else{$status= false;	}}else{$status = false;	}if($status == true){print "Action success excecute.";}else {print 'Alert: '.mysql_error().'.';	}?>
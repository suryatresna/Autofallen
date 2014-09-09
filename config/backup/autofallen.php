<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 0.2b
 */

//
// Database "autofallen"
//

// autofallen.access
$access = array(
  array('id'=>'1','idMenu'=>'1','idType'=>'1','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'2','idMenu'=>'2','idType'=>'1','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'3','idMenu'=>'3','idType'=>'1','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'4','idMenu'=>'6','idType'=>'1','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'6','idMenu'=>'9','idType'=>'1','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'7','idMenu'=>'7','idType'=>'1','cview'=>'1','cdelete'=>'0','cinsert'=>'0','cupdate'=>'0','status'=>'1'),
  array('id'=>'8','idMenu'=>'1','idType'=>'5','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'9','idMenu'=>'2','idType'=>'5','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'10','idMenu'=>'3','idType'=>'5','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'11','idMenu'=>'6','idType'=>'5','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'12','idMenu'=>'7','idType'=>'5','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'13','idMenu'=>'9','idType'=>'5','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'14','idMenu'=>'10','idType'=>'5','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'15','idMenu'=>'11','idType'=>'5','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'16','idMenu'=>'10','idType'=>'1','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'17','idMenu'=>'11','idType'=>'1','cview'=>'1','cdelete'=>'1','cinsert'=>'1','cupdate'=>'1','status'=>'1'),
  array('id'=>'18','idMenu'=>'1','idType'=>'2','cview'=>'1','cdelete'=>'0','cinsert'=>'1','cupdate'=>'0','status'=>'1'),
  array('id'=>'20','idMenu'=>'11','idType'=>'1','cview'=>'1','cdelete'=>'0','cinsert'=>'1','cupdate'=>'0','status'=>'1'),
  array('id'=>'21','idMenu'=>'3','idType'=>'2','cview'=>'1','cdelete'=>'0','cinsert'=>'1','cupdate'=>'0','status'=>'1'),
  array('id'=>'22','idMenu'=>'6','idType'=>'2','cview'=>'1','cdelete'=>'0','cinsert'=>'1','cupdate'=>'0','status'=>'1'),
  array('id'=>'23','idMenu'=>'11','idType'=>'2','cview'=>'1','cdelete'=>'0','cinsert'=>'0','cupdate'=>'0','status'=>'1'),
  array('id'=>'24','idMenu'=>'9','idType'=>'2','cview'=>'1','cdelete'=>'0','cinsert'=>'0','cupdate'=>'0','status'=>'1'),
  array('id'=>'25','idMenu'=>'2','idType'=>'2','cview'=>'0','cdelete'=>'0','cinsert'=>'0','cupdate'=>'0','status'=>'1')
);

// autofallen.access_menu
$access_menu = array(
  array('id'=>'1','menu'=>'daftar custumer','category'=>'2','url'=>'pages/custumer/datatb.php','status'=>'1'),
  array('id'=>'2','menu'=>'daftar Pengguna','category'=>'4','url'=>'pages/access_user/datatb.php','status'=>'1'),
  array('id'=>'3','menu'=>'Daftar Kendaraan','category'=>'1','url'=>'pages/kendaraan/datatb.php','status'=>'1'),
  array('id'=>'6','menu'=>'Daftar Menu','category'=>'6','url'=>'pages/access_user/menutb.php','status'=>'1'),
  array('id'=>'7','menu'=>'access menu','category'=>'6','url'=>'pages/access_user/access.php','status'=>'1'),
  array('id'=>'9','menu'=>'Back to Home','category'=>'6','url'=>'home.php','status'=>'1'),
  array('id'=>'10','menu'=>'form transaksi','category'=>'3','url'=>'pages/transaksi/form.php','status'=>'1'),
  array('id'=>'11','menu'=>'Daftar Transaksi','category'=>'3','url'=>'pages/transaksi/datatb.php','status'=>'1'),
  array('id'=>'12','menu'=>'stats','category'=>'5','url'=>'pages/stats/home.php','status'=>'1')
);

// autofallen.access_menu_category
$access_menu_category = array(
  array('id'=>'1','category'=>'stock barang','status'=>'1'),
  array('id'=>'2','category'=>'pelanggan','status'=>'1'),
  array('id'=>'3','category'=>'transaksi','status'=>'1'),
  array('id'=>'4','category'=>'pengguna akses','status'=>'1'),
  array('id'=>'5','category'=>'statistik','status'=>'1'),
  array('id'=>'6','category'=>'alat bantu','status'=>'1')
);

// autofallen.access_type
$access_type = array(
  array('id'=>'1','type'=>'admin','status'=>'1'),
  array('id'=>'2','type'=>'user 1','status'=>'1'),
  array('id'=>'3','type'=>'user 2','status'=>'1'),
  array('id'=>'4','type'=>'user 3','status'=>'1'),
  array('id'=>'5','type'=>'Super Admin','status'=>'1')
);

// autofallen.access_user
$access_user = array(
  array('id'=>'2','user'=>'surya','pass'=>'admin','name'=>'Surya Tresna Agung','email'=>'admin@admin','address'=>'Balai-balai','type'=>'5','hp'=>'081993672667','timestamp'=>'2012-05-03 17:28:40','status'=>'1'),
  array('id'=>'6','user'=>'ihsanul','pass'=>'b9df6c','name'=>'ihsanul Fajri','email'=>'ihsanul@ihsanulcom','address'=>'ekor lubuk','type'=>'1','hp'=>'-','timestamp'=>'2012-04-26 12:17:12','status'=>'1'),
  array('id'=>'9','user'=>'aris','pass'=>'395761','name'=>'Ahmad ridwan','email'=>'aris@aris.com','address'=>'tanah hitam','type'=>'2','hp'=>'-','timestamp'=>'2012-04-26 12:23:05','status'=>'1'),
  array('id'=>'10','user'=>'joni16','pass'=>'e123ew','name'=>'Joni Satria','email'=>'jon@jon.com','address'=>'singgalang','type'=>'4','hp'=>'-','timestamp'=>'2012-05-02 16:06:31','status'=>'1')
);

// autofallen.custumer
$custumer = array(
  array('id'=>'1','nama'=>'Surya Tresna Agung','alamat'=>'Balai-balai','telp'=>'0892827381','type'=>'2','status'=>'1','timestamp'=>'2012-05-05 18:39:31'),
  array('id'=>'2','nama'=>'Ihsanul Fajri','alamat'=>'ekor lubuk','telp'=>'08992839182','type'=>'2','status'=>'1','timestamp'=>'2012-05-05 18:39:41'),
  array('id'=>'3','nama'=>'Ahamd Ridwan','alamat'=>'Tanah Hitam','telp'=>'0928373712','type'=>'1','status'=>'1','timestamp'=>'2012-04-30 14:31:21'),
  array('id'=>'4','nama'=>'Joni Satria','alamat'=>'Singgalang','telp'=>'0829381283','type'=>'1','status'=>'1','timestamp'=>'2012-04-30 14:31:21'),
  array('id'=>'5','nama'=>'Nilam Sari','alamat'=>'Singgalang','telp'=>'-','type'=>'1','status'=>'1','timestamp'=>'2012-04-30 14:31:21'),
  array('id'=>'6','nama'=>'Widya Oktaviola','alamat'=>'tanah paklambik','telp'=>'08293172763','type'=>'1','status'=>'1','timestamp'=>'2012-04-30 14:31:21'),
  array('id'=>'7','nama'=>'Mardhiyah','alamat'=>'Silaing','telp'=>'0819838283','type'=>'1','status'=>'1','timestamp'=>'2012-05-01 19:14:20'),
  array('id'=>'8','nama'=>'Lilla Ilham','alamat'=>'Panjalayan','telp'=>'0829383818','type'=>'1','status'=>'1','timestamp'=>'2012-04-30 14:31:21'),
  array('id'=>'9','nama'=>'Annisa Husna','alamat'=>'Batam','telp'=>'0829293848','type'=>'1','status'=>'2','timestamp'=>'2012-05-01 19:14:29'),
  array('id'=>'16','nama'=>'Nurminglish','alamat'=>'Balai-balai','telp'=>'0752-484869','type'=>'1','status'=>'1','timestamp'=>'2012-05-01 14:31:30'),
  array('id'=>'17','nama'=>'Tomi Sasmita','alamat'=>'Batusangkar','telp'=>'-','type'=>'1','status'=>'1','timestamp'=>'2012-05-01 14:32:41'),
  array('id'=>'18','nama'=>'Adityawarman','alamat'=>'Paninjauan','telp'=>'-','type'=>'1','status'=>'1','timestamp'=>'2012-05-01 14:33:25'),
  array('id'=>'20','nama'=>'Gusti Triandi Winata','alamat'=>'Balai-balai','telp'=>'-','type'=>'1','status'=>'1','timestamp'=>'2012-05-01 15:00:23'),
  array('id'=>'21','nama'=>'Rehan Resya Sasmita','alamat'=>'Balai-balai','telp'=>'0892983831','type'=>'1','status'=>'1','timestamp'=>'2012-05-01 15:00:49'),
  array('id'=>'22','nama'=>'Muhammad Iqbal','alamat'=>'Kampung Gobi','telp'=>'-','type'=>'1','status'=>'1','timestamp'=>'2012-05-07 15:34:11')
);

// autofallen.custumer_type
$custumer_type = array(
  array('id'=>'1','type'=>'custumer','status'=>'1'),
  array('id'=>'2','type'=>'owner','status'=>'1')
);

// autofallen.kendaraan
$kendaraan = array(
  array('id'=>'2','no_pol'=>'BA 123 Z','warna'=>'10','type'=>'1','hargaJual'=>'21300000','hargaPokok'=>'13440000','th'=>'1940','pemilik'=>'Sudirman','status'=>'1','timestamp'=>'2012-05-04 22:22:39'),
  array('id'=>'3','no_pol'=>'BM 3029 FE','warna'=>'5','type'=>'2','hargaJual'=>'23300000','hargaPokok'=>'20000000','th'=>'1940','pemilik'=>'Sudirman','status'=>'1','timestamp'=>'2012-05-03 15:15:36'),
  array('id'=>'7','no_pol'=>'B 1359 NN','warna'=>'1','type'=>'1','hargaJual'=>'23200000','hargaPokok'=>'21300000','th'=>'1940','pemilik'=>'Jhon','status'=>'1','timestamp'=>'2012-05-06 15:53:59'),
  array('id'=>'8','no_pol'=>'B 1 RI','warna'=>'2','type'=>'4','hargaJual'=>'2000000000','hargaPokok'=>'1000000000','th'=>'2012','pemilik'=>'SBY','status'=>'1','timestamp'=>'2012-05-03 15:29:12'),
  array('id'=>'9','no_pol'=>'BB 120 AN','warna'=>'5','type'=>'5','hargaJual'=>'200000000','hargaPokok'=>'100000000','th'=>'2011','pemilik'=>'Januar','status'=>'1','timestamp'=>'2012-05-19 08:13:30')
);

// autofallen.kendaraan_type
$kendaraan_type = array(
  array('id'=>'1','type'=>'Honda Jazz 125','status'=>'1'),
  array('id'=>'2','type'=>'Toyota Kijang 32','status'=>'1'),
  array('id'=>'3','type'=>'Mitsubisi','status'=>'1'),
  array('id'=>'4','type'=>'Toyota Yaris','status'=>'1'),
  array('id'=>'5','type'=>'Toyota DAKAR','status'=>'1')
);

// autofallen.kendaraan_warna
$kendaraan_warna = array(
  array('id'=>'1','warna'=>'red','code'=>'#ff0000','status'=>'1'),
  array('id'=>'2','warna'=>'blue','code'=>'#0009ff','status'=>'1'),
  array('id'=>'5','warna'=>'green','code'=>'#2fff00','status'=>'1'),
  array('id'=>'6','warna'=>'brown','code'=>'#614208','status'=>'1'),
  array('id'=>'8','warna'=>'yellow','code'=>'#ffee00','status'=>'1'),
  array('id'=>'10','warna'=>'blue sky','code'=>'#00c4ff','status'=>'1')
);

// autofallen.leasing
$leasing = array(
  array('id'=>'1','nama'=>'PT. BRI Cab.Padang Panjang','telp'=>'083762346','status'=>'1','timestamp'=>'2012-05-05 12:51:26'),
  array('id'=>'2','nama'=>'Bank BNI Cab. Padang Panjang','telp'=>'08293847183','status'=>'1','timestamp'=>'2012-05-05 12:52:38'),
  array('id'=>'3','nama'=>'default','telp'=>'default','status'=>'1','timestamp'=>'2012-05-08 11:28:35')
);

// autofallen.transaksi
$transaksi = array(
  array('id'=>'1','tglBayar'=>'2012-05-08','payment'=>'1','leasingId'=>'1','custumerId'=>'6','kendaraanId'=>'3','userId'=>'2','timestamp'=>'2012-05-13 08:16:02'),
  array('id'=>'2','tglBayar'=>'2012-05-09','payment'=>'4','leasingId'=>'2','custumerId'=>'4','kendaraanId'=>'8','userId'=>'2','timestamp'=>'2012-05-13 08:16:02'),
  array('id'=>'3','tglBayar'=>'2012-05-09','payment'=>'1','leasingId'=>'1','custumerId'=>'7','kendaraanId'=>'3','userId'=>'2','timestamp'=>'2012-05-13 08:16:02'),
  array('id'=>'4','tglBayar'=>'2012-05-09','payment'=>'5','leasingId'=>'3','custumerId'=>'8','kendaraanId'=>'7','userId'=>'2','timestamp'=>'2012-05-13 08:16:02'),
  array('id'=>'9','tglBayar'=>'2012-05-11','payment'=>'4','leasingId'=>'3','custumerId'=>'20','kendaraanId'=>'2','userId'=>'2','timestamp'=>'2012-05-13 08:16:02'),
  array('id'=>'10','tglBayar'=>'2012-05-19','payment'=>'4','leasingId'=>'2','custumerId'=>'22','kendaraanId'=>'9','userId'=>'2','timestamp'=>'2012-05-19 12:42:04')
);

// autofallen.transaksi_detail
$transaksi_detail = array(
  array('id'=>'1','transaksiId'=>'1','bayar'=>'23300000','store'=>'0','md'=>'1','tglBayar'=>'2012-05-08','timestamp'=>'2012-05-09 18:23:56'),
  array('id'=>'2','transaksiId'=>'2','bayar'=>'5000000','store'=>'0','md'=>'1','tglBayar'=>'2012-05-09','timestamp'=>'2012-05-09 18:23:56'),
  array('id'=>'3','transaksiId'=>'3','bayar'=>'23300000','store'=>'0','md'=>'1','tglBayar'=>'2012-05-09','timestamp'=>'2012-05-09 18:24:22'),
  array('id'=>'4','transaksiId'=>'4','bayar'=>'7000000','store'=>'0','md'=>'1','tglBayar'=>'2012-05-09','timestamp'=>'2012-05-09 18:23:56'),
  array('id'=>'5','transaksiId'=>'2','bayar'=>'184000000','store'=>'1','md'=>'0','tglBayar'=>'2012-05-10','timestamp'=>'2012-05-12 10:30:59'),
  array('id'=>'6','transaksiId'=>'2','bayar'=>'184000000','store'=>'2','md'=>'0','tglBayar'=>'2012-07-12','timestamp'=>'2012-05-12 10:30:59'),
  array('id'=>'11','transaksiId'=>'9','bayar'=>'3905000','store'=>'0','md'=>'1','tglBayar'=>'2012-05-11','timestamp'=>'2012-05-12 09:20:36'),
  array('id'=>'12','transaksiId'=>'2','bayar'=>'184000000','store'=>'3','md'=>'0','tglBayar'=>'2012-08-07','timestamp'=>'2012-05-12 14:38:38'),
  array('id'=>'13','transaksiId'=>'2','bayar'=>'200000000','store'=>'4','md'=>'0','tglBayar'=>'2012-09-05','timestamp'=>'2012-05-12 14:54:12'),
  array('id'=>'14','transaksiId'=>'4','bayar'=>'1200000','store'=>'1','md'=>'0','tglBayar'=>'2012-06-07','timestamp'=>'2012-05-12 14:55:39'),
  array('id'=>'15','transaksiId'=>'9','bayar'=>'2000000','store'=>'1','md'=>'0','tglBayar'=>'2012-06-08','timestamp'=>'2012-05-12 16:15:47'),
  array('id'=>'16','transaksiId'=>'2','bayar'=>'190000000','store'=>'5','md'=>'0','tglBayar'=>'2012-10-13','timestamp'=>'2012-05-12 17:01:58'),
  array('id'=>'17','transaksiId'=>'9','bayar'=>'2016500','store'=>'2','md'=>'0','tglBayar'=>'2012-07-26','timestamp'=>'2012-05-14 20:17:52'),
  array('id'=>'18','transaksiId'=>'9','bayar'=>'1952500','store'=>'3','md'=>'0','tglBayar'=>'2012-08-08','timestamp'=>'2012-05-16 10:56:23'),
  array('id'=>'19','transaksiId'=>'4','bayar'=>'1140667','store'=>'2','md'=>'0','tglBayar'=>'2012-05-08','timestamp'=>'2012-05-16 10:57:01'),
  array('id'=>'20','transaksiId'=>'4','bayar'=>'1140667','store'=>'3','md'=>'0','tglBayar'=>'2012-08-06','timestamp'=>'2012-05-16 10:57:27'),
  array('id'=>'21','transaksiId'=>'2','bayar'=>'183341333','store'=>'6','md'=>'0','tglBayar'=>'2012-11-06','timestamp'=>'2012-05-16 10:57:56'),
  array('id'=>'22','transaksiId'=>'4','bayar'=>'1146666','store'=>'4','md'=>'0','tglBayar'=>'2012-09-07','timestamp'=>'2012-05-17 13:27:23'),
  array('id'=>'23','transaksiId'=>'9','bayar'=>'1952500','store'=>'4','md'=>'0','tglBayar'=>'2012-09-08','timestamp'=>'2012-05-17 13:28:17'),
  array('id'=>'24','transaksiId'=>'4','bayar'=>'1140667','store'=>'5','md'=>'0','tglBayar'=>'2012-10-05','timestamp'=>'2012-05-19 12:34:48'),
  array('id'=>'25','transaksiId'=>'9','bayar'=>'1952500','store'=>'5','md'=>'0','tglBayar'=>'2012-10-08','timestamp'=>'2012-05-19 12:35:27'),
  array('id'=>'26','transaksiId'=>'9','bayar'=>'1960500','store'=>'6','md'=>'0','tglBayar'=>'2012-11-08','timestamp'=>'2012-05-19 12:35:59'),
  array('id'=>'27','transaksiId'=>'9','bayar'=>'1956500','store'=>'7','md'=>'0','tglBayar'=>'2012-12-07','timestamp'=>'2012-05-19 12:36:53'),
  array('id'=>'28','transaksiId'=>'9','bayar'=>'1968500','store'=>'8','md'=>'0','tglBayar'=>'2013-01-09','timestamp'=>'2012-05-19 12:37:39'),
  array('id'=>'29','transaksiId'=>'9','bayar'=>'1956500','store'=>'9','md'=>'0','tglBayar'=>'2013-02-05','timestamp'=>'2012-05-19 12:40:38'),
  array('id'=>'30','transaksiId'=>'10','bayar'=>'36666667','store'=>'0','md'=>'1','tglBayar'=>'2012-05-19','timestamp'=>'2012-05-19 12:42:04')
);

// autofallen.transaksi_payment
$transaksi_payment = array(
  array('id'=>'1','payment'=>'Cash','lama'=>'0','bunga'=>'0','denda'=>NULL,'status'=>'1'),
  array('id'=>'4','payment'=>'Credit 12 Bln','lama'=>'12','bunga'=>'10','denda'=>'4000','status'=>'1'),
  array('id'=>'5','payment'=>'Credit 24 Bln','lama'=>'24','bunga'=>'18','denda'=>'6000','status'=>'1')
);

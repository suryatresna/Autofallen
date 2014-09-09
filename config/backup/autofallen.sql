-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2012 at 04:32 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autofallen`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `cview` tinyint(1) DEFAULT NULL,
  `cdelete` tinyint(1) DEFAULT NULL,
  `cinsert` tinyint(1) DEFAULT NULL,
  `cupdate` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `idMenu`, `idType`, `cview`, `cdelete`, `cinsert`, `cupdate`, `status`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1, 1, 1),
(4, 6, 1, 1, 1, 1, 1, 1),
(6, 9, 1, 1, 1, 1, 1, 1),
(7, 7, 1, 1, 0, 0, 0, 1),
(8, 1, 5, 1, 1, 1, 1, 1),
(9, 2, 5, 1, 1, 1, 1, 1),
(10, 3, 5, 1, 1, 1, 1, 1),
(11, 6, 5, 1, 1, 1, 1, 1),
(12, 7, 5, 1, 1, 1, 1, 1),
(13, 9, 5, 1, 1, 1, 1, 1),
(14, 10, 5, 1, 1, 1, 1, 1),
(15, 11, 5, 1, 1, 1, 1, 1),
(16, 10, 1, 1, 1, 1, 1, 1),
(17, 11, 1, 1, 1, 1, 1, 1),
(18, 1, 2, 1, 0, 1, 0, 1),
(20, 11, 1, 1, 0, 1, 0, 1),
(21, 3, 2, 1, 0, 1, 0, 1),
(22, 6, 2, 1, 0, 1, 0, 1),
(23, 11, 2, 1, 0, 0, 0, 1),
(24, 9, 2, 1, 0, 0, 0, 1),
(25, 2, 2, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE IF NOT EXISTS `access_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu` varchar(80) NOT NULL,
  `category` int(11) NOT NULL,
  `url` varchar(80) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`id`, `menu`, `category`, `url`, `status`) VALUES
(1, 'daftar custumer', 2, 'pages/custumer/datatb.php', 1),
(2, 'daftar Pengguna', 4, 'pages/access_user/datatb.php', 1),
(3, 'Daftar Kendaraan', 1, 'pages/kendaraan/datatb.php', 1),
(6, 'Daftar Menu', 6, 'pages/access_user/menutb.php', 1),
(7, 'access menu', 6, 'pages/access_user/access.php', 1),
(9, 'Back to Home', 6, 'home.php', 1),
(10, 'form transaksi', 3, 'pages/transaksi/form.php', 1),
(11, 'Daftar Transaksi', 3, 'pages/transaksi/datatb.php', 1),
(12, 'stats', 5, 'pages/stats/home.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `access_menu_category`
--

CREATE TABLE IF NOT EXISTS `access_menu_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(80) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `access_menu_category`
--

INSERT INTO `access_menu_category` (`id`, `category`, `status`) VALUES
(1, 'stock barang', 1),
(2, 'pelanggan', 1),
(3, 'transaksi', 1),
(4, 'pengguna akses', 1),
(5, 'statistik', 1),
(6, 'alat bantu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `access_type`
--

CREATE TABLE IF NOT EXISTS `access_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `access_type`
--

INSERT INTO `access_type` (`id`, `type`, `status`) VALUES
(1, 'admin', 1),
(2, 'user 1', 1),
(3, 'user 2', 1),
(4, 'user 3', 1),
(5, 'Super Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `access_user`
--

CREATE TABLE IF NOT EXISTS `access_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(40) NOT NULL,
  `pass` varchar(125) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(125) NOT NULL,
  `address` varchar(125) NOT NULL,
  `type` int(11) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `access_user`
--

INSERT INTO `access_user` (`id`, `user`, `pass`, `name`, `email`, `address`, `type`, `hp`, `timestamp`, `status`) VALUES
(2, 'surya', 'admin', 'Surya Tresna Agung', 'admin@admin', 'Balai-balai', 5, '081993672667', '2012-05-03 10:28:40', 1),
(6, 'ihsanul', 'b9df6c', 'ihsanul Fajri', 'ihsanul@ihsanulcom', 'ekor lubuk', 1, '-', '2012-04-26 05:17:12', 1),
(9, 'aris', '395761', 'Ahmad ridwan', 'aris@aris.com', 'tanah hitam', 2, '-', '2012-04-26 05:23:05', 1),
(10, 'joni16', 'e123ew', 'Joni Satria', 'jon@jon.com', 'singgalang', 4, '-', '2012-05-02 09:06:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custumer`
--

CREATE TABLE IF NOT EXISTS `custumer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(80) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `custumer`
--

INSERT INTO `custumer` (`id`, `nama`, `alamat`, `telp`, `type`, `status`, `timestamp`) VALUES
(1, 'Surya Tresna Agung', 'Balai-balai', '0892827381', 2, 1, '2012-05-05 11:39:31'),
(2, 'Ihsanul Fajri', 'ekor lubuk', '08992839182', 2, 1, '2012-05-05 11:39:41'),
(3, 'Ahamd Ridwan', 'Tanah Hitam', '0928373712', 1, 1, '2012-04-30 07:31:21'),
(4, 'Joni Satria', 'Singgalang', '0829381283', 1, 1, '2012-04-30 07:31:21'),
(5, 'Nilam Sari', 'Singgalang', '-', 1, 1, '2012-04-30 07:31:21'),
(6, 'Widya Oktaviola', 'tanah paklambik', '08293172763', 1, 1, '2012-04-30 07:31:21'),
(7, 'Mardhiyah', 'Silaing', '0819838283', 1, 1, '2012-05-01 12:14:20'),
(8, 'Lilla Ilham', 'Panjalayan', '0829383818', 1, 1, '2012-04-30 07:31:21'),
(9, 'Annisa Husna', 'Batam', '0829293848', 1, 2, '2012-05-01 12:14:29'),
(16, 'Nurminglish', 'Balai-balai', '0752-484869', 1, 1, '2012-05-01 07:31:30'),
(17, 'Tomi Sasmita', 'Batusangkar', '-', 1, 1, '2012-05-01 07:32:41'),
(18, 'Adityawarman', 'Paninjauan', '-', 1, 1, '2012-05-01 07:33:25'),
(20, 'Gusti Triandi Winata', 'Balai-balai', '-', 1, 1, '2012-05-01 08:00:23'),
(21, 'Rehan Resya Sasmita', 'Balai-balai', '0892983831', 1, 1, '2012-05-01 08:00:49'),
(22, 'Muhammad Iqbal', 'Kampung Gobi', '-', 1, 1, '2012-05-07 08:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `custumer_type`
--

CREATE TABLE IF NOT EXISTS `custumer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `custumer_type`
--

INSERT INTO `custumer_type` (`id`, `type`, `status`) VALUES
(1, 'custumer', 1),
(2, 'owner', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pol` varchar(11) NOT NULL,
  `warna` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `hargaJual` bigint(20) NOT NULL,
  `hargaPokok` bigint(20) NOT NULL,
  `th` year(4) NOT NULL,
  `pemilik` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_pol` (`no_pol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `no_pol`, `warna`, `type`, `hargaJual`, `hargaPokok`, `th`, `pemilik`, `status`, `timestamp`) VALUES
(2, 'BA 123 Z', 10, 1, 21300000, 13440000, 1940, 'Sudirman', 1, '2012-05-04 15:22:39'),
(3, 'BM 3029 FE', 5, 2, 23300000, 20000000, 1940, 'Sudirman', 1, '2012-05-03 08:15:36'),
(7, 'B 1359 NN', 1, 1, 23200000, 21300000, 1940, 'Jhon', 1, '2012-05-06 08:53:59'),
(8, 'B 1 RI', 2, 4, 2000000000, 1000000000, 2012, 'SBY', 1, '2012-05-03 08:29:12'),
(9, 'BB 120 AN', 5, 5, 200000000, 100000000, 2011, 'Januar', 1, '2012-05-19 01:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan_type`
--

CREATE TABLE IF NOT EXISTS `kendaraan_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kendaraan_type`
--

INSERT INTO `kendaraan_type` (`id`, `type`, `status`) VALUES
(1, 'Honda Jazz 125', 1),
(2, 'Toyota Kijang 32', 1),
(3, 'Mitsubisi', 1),
(4, 'Toyota Yaris', 1),
(5, 'Toyota DAKAR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan_warna`
--

CREATE TABLE IF NOT EXISTS `kendaraan_warna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warna` varchar(40) NOT NULL,
  `code` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `warna` (`warna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kendaraan_warna`
--

INSERT INTO `kendaraan_warna` (`id`, `warna`, `code`, `status`) VALUES
(1, 'red', '#ff0000', 1),
(2, 'blue', '#0009ff', 1),
(5, 'green', '#2fff00', 1),
(6, 'brown', '#614208', 1),
(8, 'yellow', '#ffee00', 1),
(10, 'blue sky', '#00c4ff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leasing`
--

CREATE TABLE IF NOT EXISTS `leasing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(80) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `leasing`
--

INSERT INTO `leasing` (`id`, `nama`, `telp`, `status`, `timestamp`) VALUES
(1, 'PT. BRI Cab.Padang Panjang', '083762346', 1, '2012-05-05 05:51:26'),
(2, 'Bank BNI Cab. Padang Panjang', '08293847183', 1, '2012-05-05 05:52:38'),
(3, 'default', 'default', 1, '2012-05-08 04:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tglBayar` date NOT NULL,
  `payment` int(11) NOT NULL,
  `leasingId` int(11) NOT NULL,
  `custumerId` int(11) NOT NULL,
  `kendaraanId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tglBayar`, `payment`, `leasingId`, `custumerId`, `kendaraanId`, `userId`, `timestamp`) VALUES
(1, '2012-05-08', 1, 1, 6, 3, 2, '2012-05-13 01:16:02'),
(2, '2012-05-09', 4, 2, 4, 8, 2, '2012-05-13 01:16:02'),
(3, '2012-05-09', 1, 1, 7, 3, 2, '2012-05-13 01:16:02'),
(4, '2012-05-09', 5, 3, 8, 7, 2, '2012-05-13 01:16:02'),
(9, '2012-05-11', 4, 3, 20, 2, 2, '2012-05-13 01:16:02'),
(10, '2012-05-19', 4, 2, 22, 9, 2, '2012-05-19 05:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksiId` int(11) NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `store` int(11) DEFAULT '0',
  `md` tinyint(1) DEFAULT '0',
  `tglBayar` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `transaksiId`, `bayar`, `store`, `md`, `tglBayar`, `timestamp`) VALUES
(1, 1, 23300000, 0, 1, '2012-05-08', '2012-05-09 11:23:56'),
(2, 2, 5000000, 0, 1, '2012-05-09', '2012-05-09 11:23:56'),
(3, 3, 23300000, 0, 1, '2012-05-09', '2012-05-09 11:24:22'),
(4, 4, 7000000, 0, 1, '2012-05-09', '2012-05-09 11:23:56'),
(5, 2, 184000000, 1, 0, '2012-05-10', '2012-05-12 03:30:59'),
(6, 2, 184000000, 2, 0, '2012-07-12', '2012-05-12 03:30:59'),
(11, 9, 3905000, 0, 1, '2012-05-11', '2012-05-12 02:20:36'),
(12, 2, 184000000, 3, 0, '2012-08-07', '2012-05-12 07:38:38'),
(13, 2, 200000000, 4, 0, '2012-09-05', '2012-05-12 07:54:12'),
(14, 4, 1200000, 1, 0, '2012-06-07', '2012-05-12 07:55:39'),
(15, 9, 2000000, 1, 0, '2012-06-08', '2012-05-12 09:15:47'),
(16, 2, 190000000, 5, 0, '2012-10-13', '2012-05-12 10:01:58'),
(17, 9, 2016500, 2, 0, '2012-07-26', '2012-05-14 13:17:52'),
(18, 9, 1952500, 3, 0, '2012-08-08', '2012-05-16 03:56:23'),
(19, 4, 1140667, 2, 0, '2012-05-08', '2012-05-16 03:57:01'),
(20, 4, 1140667, 3, 0, '2012-08-06', '2012-05-16 03:57:27'),
(21, 2, 183341333, 6, 0, '2012-11-06', '2012-05-16 03:57:56'),
(22, 4, 1146666, 4, 0, '2012-09-07', '2012-05-17 06:27:23'),
(23, 9, 1952500, 4, 0, '2012-09-08', '2012-05-17 06:28:17'),
(24, 4, 1140667, 5, 0, '2012-10-05', '2012-05-19 05:34:48'),
(25, 9, 1952500, 5, 0, '2012-10-08', '2012-05-19 05:35:27'),
(26, 9, 1960500, 6, 0, '2012-11-08', '2012-05-19 05:35:59'),
(27, 9, 1956500, 7, 0, '2012-12-07', '2012-05-19 05:36:53'),
(28, 9, 1968500, 8, 0, '2013-01-09', '2012-05-19 05:37:39'),
(29, 9, 1956500, 9, 0, '2013-02-05', '2012-05-19 05:40:38'),
(30, 10, 36666667, 0, 1, '2012-05-19', '2012-05-19 05:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_payment`
--

CREATE TABLE IF NOT EXISTS `transaksi_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment` varchar(40) NOT NULL,
  `lama` int(11) NOT NULL,
  `bunga` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payment` (`payment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `transaksi_payment`
--

INSERT INTO `transaksi_payment` (`id`, `payment`, `lama`, `bunga`, `denda`, `status`) VALUES
(1, 'Cash', 0, 0, NULL, 1),
(4, 'Credit 12 Bln', 12, 10, 4000, 1),
(5, 'Credit 24 Bln', 24, 18, 6000, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

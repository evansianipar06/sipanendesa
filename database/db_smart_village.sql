-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 12:23 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smart_village`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beli`
--

CREATE TABLE `tbl_beli` (
  `beli_nofak` varchar(15) DEFAULT NULL,
  `beli_tanggal` date DEFAULT NULL,
  `beli_suplier_id` int(11) DEFAULT NULL,
  `beli_user_id` int(11) DEFAULT NULL,
  `beli_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_beli`
--

INSERT INTO `tbl_beli` (`beli_nofak`, `beli_tanggal`, `beli_suplier_id`, `beli_user_id`, `beli_kode`) VALUES
('060320000001', '2020-03-06', 1, 1, 'BL060320000001'),
('lkhiuh', '2020-03-06', 1, 1, 'BL060320000002'),
('jkgjhgj', '2020-03-07', 1, 1, 'BL070320000001'),
('P07032020', '2020-03-07', 1, 1, 'BL070320000002'),
('lknlknlk', '2020-03-07', 1, 1, 'BL070320000003'),
('lknlknlkmlk', '2020-03-07', 1, 1, 'BL070320000004'),
('09', '2020-03-12', 1, 7, 'BL120320000001'),
('1212312', '2020-03-12', 1, 7, 'BL120320000002'),
('66', '2020-03-12', 1, 7, 'BL120320000003'),
('1', '2020-03-12', 1, 7, 'BL120320000004'),
('mjkjhk', '2020-03-14', 1, 7, 'BL140320000001'),
('jkhkjhkj', '2020-02-20', 1, 1, 'BL200220000001'),
('210220000001', '2020-02-21', 1, 1, 'BL210220000001'),
('dfdfdf', '2020-02-21', 1, 1, 'BL210220000002'),
('fk001', '2020-02-22', 1, 1, 'BL220220000001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_beli`
--

CREATE TABLE `tbl_detail_beli` (
  `d_beli_id` int(11) NOT NULL,
  `d_beli_nofak` varchar(15) DEFAULT NULL,
  `d_beli_panen_id` varchar(15) DEFAULT NULL,
  `d_beli_harga` double DEFAULT NULL,
  `d_beli_jumlah` int(11) DEFAULT NULL,
  `d_beli_total` double DEFAULT NULL,
  `d_beli_kode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_beli`
--

INSERT INTO `tbl_detail_beli` (`d_beli_id`, `d_beli_nofak`, `d_beli_panen_id`, `d_beli_harga`, `d_beli_jumlah`, `d_beli_total`, `d_beli_kode`) VALUES
(1, 'jkhkjhkj', 'BR000043', 4500, 10, 45000, 'BL200220000001'),
(2, '210220000001', 'BR000045', 5700, 10, 57000, 'BL210220000001'),
(3, 'dfdfdf', 'BR000045', 5700, 10, 57000, 'BL210220000002'),
(4, 'fk001', 'BR000045', 5700, 20, 114000, 'BL220220000001'),
(5, '060320000001', 'BR000045', 5700, 10, 57000, 'BL060320000001'),
(6, 'lkhiuh', 'BR000045', 5700, 20, 114000, 'BL060320000002'),
(7, 'jkgjhgj', 'BR000045', 5700, 5, 28500, 'BL070320000001'),
(8, 'P07032020', 'BR000045', 5700, 13, 74100, 'BL070320000002'),
(9, 'lknlknlk', 'BR000045', 5700, 10, 57000, 'BL070320000003'),
(10, 'lknlknlkmlk', 'BR000045', 15000, 10, 150000, 'BL070320000004'),
(11, '09', 'BR000043', 4500, 1, 4500, 'BL120320000001'),
(12, '09', 'BR000044', 5700, 1, 5700, 'BL120320000001'),
(13, '09', 'BR000045', 15000, 77, 1155000, 'BL120320000001'),
(14, '1212312', 'BR000040', 13500, 1, 13500, 'BL120320000002'),
(15, '1212312', 'BR000043', 4500, 1, 4500, 'BL120320000002'),
(16, '1212312', 'BR000045', 15000, 12, 180000, 'BL120320000002'),
(17, '66', 'BR000044', 5700, 1, 5700, 'BL120320000003'),
(18, '66', 'BR000043', 4500, 1, 4500, 'BL120320000003'),
(19, '66', 'BR000045', 15000, 3, 45000, 'BL120320000003'),
(20, '1', 'BR000044', 5700, 1, 5700, 'BL120320000004'),
(21, '1', 'BR000043', 4500, 30, 135000, 'BL120320000004'),
(22, '1', 'BR000045', 15000, 3, 45000, 'BL120320000004'),
(23, 'mjkjhk', 'BR000043', 4500, 1, 4500, 'BL140320000001'),
(24, 'mjkjhk', 'BR000045', 15000, 2, 30000, 'BL140320000001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual`
--

CREATE TABLE `tbl_detail_jual` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_panen_id` varchar(15) DEFAULT NULL,
  `d_jual_panen_nama` varchar(150) DEFAULT NULL,
  `d_jual_panen_satuan` varchar(30) DEFAULT NULL,
  `d_jual_panen_harpok` double DEFAULT NULL,
  `d_jual_panen_harjul` double DEFAULT NULL,
  `d_jual_qty` int(11) DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jual`
--

INSERT INTO `tbl_detail_jual` (`d_jual_id`, `d_jual_nofak`, `d_jual_panen_id`, `d_jual_panen_nama`, `d_jual_panen_satuan`, `d_jual_panen_harpok`, `d_jual_panen_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(61, '020520000001', 'BR000024', 'Cendana', 'Ton', 16000, 20000, 1, 5, 19995),
(62, '020520000002', 'BR000004', 'Susu ABC', 'Liter', 17000, 24000, 1, 0, 24000),
(63, '020520000002', 'BR000011', 'Tomat', 'Kilogram', 3400, 7000, 1, 0, 7000),
(64, '020520000003', 'BR000002', 'Padi', 'Liter', 16000, 20000, 1, 0, 20000),
(65, '020520000004', 'BR000008', 'Ubi Jalar', 'Kilogram', 4500, 8000, 1, 0, 8000),
(66, '120520000001', 'BR000020', 'Apel', 'Kilogram', 8750, 12000, 1, 0, 12000),
(67, '120520000002', 'BR000020', 'Apel', 'Kilogram', 8750, 12000, 1, 0, 12000),
(68, '120520000005', 'BR000017', 'Salak', 'Kilogram', 9500, 15000, 1, 0, 15000),
(69, '130520000001', 'BR000030', 'Mahoni', 'Kilogram', 47500, 70000, 1, 0, 70000),
(70, '270520000001', 'BR000002', 'Padi', 'Liter', 16000, 20000, 1, 0, 20000),
(71, '270520000007', 'BR000058', 'Jagung Bakar', 'Kilogram', 2000, 90000, 1, 0, 90000),
(72, '280520000001', 'BR000057', 'Merica', 'Ons', 30000, 50000, 1, 0, 50000),
(73, '300520000001', 'BR000008', 'Ubi Jalar', 'Kilogram', 4500, 8000, 1, 0, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jual_total` double DEFAULT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_user_id`, `jual_keterangan`) VALUES
('020520000001', '2020-05-02 02:26:18', 239995, 900000, 660005, 1, 'eceran'),
('020520000002', '2020-05-02 02:39:39', 31000, 900000, 869000, 1, 'eceran'),
('020520000003', '2020-05-02 02:46:26', 20000, 50000, 30000, 1, 'eceran'),
('020520000004', '2020-05-02 05:39:26', 8000, 900000, 892000, 1, 'eceran'),
('050320000001', '2020-03-05 14:13:43', 10000, 50000, 40000, 1, 'eceran'),
('120520000001', '2020-05-12 02:44:09', 12000, 30000, 18000, 1, 'eceran'),
('120520000002', '2020-05-12 13:05:46', 12000, 2222220, 2210220, 1, 'eceran'),
('120520000003', '2020-05-12 13:06:07', 12000, 2222220, 2210220, 1, 'eceran'),
('120520000004', '2020-05-12 13:07:01', 12000, 2222220, 2210220, 1, 'eceran'),
('120520000005', '2020-05-12 13:07:17', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000006', '2020-05-12 13:07:45', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000007', '2020-05-12 13:07:53', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000008', '2020-05-12 13:08:03', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000009', '2020-05-12 13:08:59', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000010', '2020-05-12 13:09:54', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000011', '2020-05-12 13:10:32', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000012', '2020-05-12 13:10:52', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000013', '2020-05-12 13:11:46', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000014', '2020-05-12 13:12:06', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000015', '2020-05-12 13:13:40', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000016', '2020-05-12 13:13:58', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000017', '2020-05-12 13:14:04', 15000, 11111110, 11096110, 1, 'eceran'),
('120520000018', '2020-05-12 13:14:17', 15000, 11111110, 11096110, 1, 'eceran'),
('130520000001', '2020-05-13 14:07:52', 70000, 88808, 18808, 1, 'eceran'),
('240117000001', '2017-01-24 15:07:07', 10000, 20000, 10000, 1, 'eceran'),
('240117000002', '2017-01-24 15:07:26', 10000, 20000, 10000, 1, 'eceran'),
('241116000001', '2016-11-24 17:42:06', 20000, 20000, 0, 1, 'eceran'),
('241116000002', '2016-11-24 17:49:58', 20000, 20000, 0, 1, 'eceran'),
('241116000003', '2016-11-24 17:55:48', 22000, 22000, 0, 1, 'eceran'),
('241116000004', '2016-11-24 17:59:38', 10000, 10000, 0, 1, 'eceran'),
('241116000005', '2016-11-24 18:21:24', 5000, 20000, 15000, 1, 'eceran'),
('241116000006', '2016-11-24 18:27:01', 6000, 7000, 1000, 1, 'eceran'),
('241116000007', '2016-11-24 18:29:43', 8000, 10000, 2000, 1, 'eceran'),
('241116000008', '2016-11-24 18:32:01', 13000, 15000, 2000, 1, 'eceran'),
('241116000009', '2016-11-24 19:47:50', 6000, 7000, 1000, 1, 'grosir'),
('251116000001', '2016-11-25 22:07:15', 19000, 60000, 41000, 1, 'eceran'),
('270520000001', '2020-05-27 06:05:16', 20000, 900000, 880000, 1, 'eceran'),
('270520000002', '2020-05-27 06:14:09', 20000, 900000, 880000, 1, 'eceran'),
('270520000003', '2020-05-27 06:14:13', 20000, 900000, 880000, 1, 'eceran'),
('270520000004', '2020-05-27 06:14:35', 20000, 900000, 880000, 1, 'eceran'),
('270520000005', '2020-05-27 06:14:49', 20000, 900000, 880000, 1, 'eceran'),
('270520000006', '2020-05-27 06:19:14', 20000, 900000, 880000, 1, 'eceran'),
('270520000007', '2020-05-27 06:20:06', 90000, 500000, 410000, 1, 'eceran'),
('280520000001', '2020-05-28 05:55:34', 50000, 900000, 850000, 1, 'eceran'),
('290317000001', '2017-03-29 13:35:49', 22000, 56000, 34000, 1, 'eceran'),
('291116000001', '2016-11-29 19:11:48', 105000, 120000, 15000, 1, 'eceran'),
('291116000002', '2016-11-29 19:49:20', 68000, 70000, 2000, 1, 'eceran'),
('291116000003', '2016-11-29 19:57:17', 8000, 10000, 2000, 1, 'eceran'),
('291116000004', '2016-11-29 19:58:35', 10000, 12000, 2000, 1, 'eceran'),
('291116000005', '2016-11-29 22:10:10', 10000, 10000, 0, 1, 'eceran'),
('291116000006', '2016-11-29 22:23:40', 29000, 30000, 1000, 1, 'eceran'),
('291116000007', '2016-11-29 22:41:08', 9000, 10000, 1000, 2, 'eceran'),
('300520000001', '2020-05-30 01:02:33', 8000, 99909, 91909, 1, 'eceran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(6, 'Gandum'),
(7, 'Teh'),
(8, 'Susu'),
(9, 'Kelapa'),
(10, 'Kacang Kedelai'),
(11, 'Kayu'),
(12, 'Nabati'),
(13, 'Buah-buahan'),
(14, 'Sayur-sayuran'),
(40, 'Padi'),
(42, 'Umbi-umbian'),
(44, 'Rempah-rempah'),
(45, 'BIji-bijian'),
(46, 'Bumbu'),
(47, 'Obatt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluhan`
--

CREATE TABLE `tbl_keluhan` (
  `keluhan_id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `keluhan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_keluhan`
--

INSERT INTO `tbl_keluhan` (`keluhan_id`, `nama`, `email`, `keluhan`) VALUES
(1, 'Kepala Desa', 'evan@gmail.com', 'jkdhkj'),
(2, 'Kepala Desa', 'joseph@gmail.com', 'Selamat siang pak, saya Joseph.\nSaya memiliki beberapa Keluhan yaitu saya mengalami kendala dalam menambah data panen,sehingga saya tidak dapat melakukan transaksi penjualan panen sampai saat ini.\nDengan itu, agar kiranya bapak menindak lanjuti. Terimakasih.'),
(3, 'Masyarakat', 'riko@gmail.com', 'Eh,Hallo'),
(4, 'Masyarakat', 'jeni@gmail.com', 'Oiyaa ??'),
(5, 'Masyarakat', 'ehh@gmail.com', 'Yess'),
(6, 'Masyarakat', 'jiko@gmail.com', 'Noooo'),
(7, 'Masyarakat', 'monica@gmail.com', 'Selamat siang pak, saya Joseph.\r\nSaya memiliki beberapa Keluhan yaitu saya mengalami kendala dalam menambah data panen,sehingga saya tidak dapat melakukan transaksi penjualan panen sampai saat ini.\r\nDengan itu, agar kiranya bapak menindak lanjuti. Terimakasih.'),
(8, 'Kepala Desa', 'kepalaDesa@gmail.com', 'Min, saya tidak bisa melihat data laporan panen min..\r\nkasih solusi'),
(9, 'Masyarakat', 'masyarakat@gmail.com', 'Selamat malam admin, saya ada masalah dalam penghapusan data panen yang saya buat. Mohon dengan itu, segera ditindak lanjut.\r\n\r\nRegards'),
(10, 'Kepala Desa', 'kepalaDesa@gmail.com', 'Selamat malam..'),
(11, 'Masyarakat', 'masyarakat@gmal.com', 'Selamat Siang admin, saya mendapat masalah dalam menambah data panen, agar kiranya bapak membantu, terimakasih.'),
(12, 'Masyarakat', 'masyarakat@gmail.com', 'Hallo, admin..');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komen`
--

CREATE TABLE `tbl_komen` (
  `komen_id` int(11) NOT NULL,
  `komen_status` int(11) DEFAULT NULL,
  `komen_nama` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `komen_email` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `komen_isi` text CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_komen`
--

INSERT INTO `tbl_komen` (`komen_id`, `komen_status`, `komen_nama`, `komen_email`, `komen_isi`) VALUES
(1, 0, 'xcmnm', 'mnm@gmail.com', 'mnsm\r\n\r\n'),
(7, 0, 'Evan', 'evan06@gmail.com', 'Hallo'),
(8, 0, 'mdnm', 'nsbdnm@gmail.com', 'jkshdjms'),
(9, 1, 'sdmnsbm', 'mnbm@gmail.com', 'dbmd'),
(10, 1, 'snmdbs', 'jnbdm@gmail.com', 'jnsdm'),
(11, 7, 'kiko', 'kiko@gmail.com', 'haii');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panen`
--

CREATE TABLE `tbl_panen` (
  `panen_id` varchar(15) NOT NULL,
  `panen_nama` varchar(150) DEFAULT NULL,
  `panen_satuan` varchar(30) DEFAULT NULL,
  `panen_harpok` double DEFAULT NULL,
  `panen_harjul` double DEFAULT NULL,
  `panen_harjul_grosir` double DEFAULT NULL,
  `panen_stok` int(11) DEFAULT '0',
  `panen_min_stok` int(11) DEFAULT '0',
  `panen_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `panen_tgl_last_update` datetime DEFAULT NULL,
  `panen_kategori_id` int(11) DEFAULT NULL,
  `panen_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_panen`
--

INSERT INTO `tbl_panen` (`panen_id`, `panen_nama`, `panen_satuan`, `panen_harpok`, `panen_harjul`, `panen_harjul_grosir`, `panen_stok`, `panen_min_stok`, `panen_tgl_input`, `panen_tgl_last_update`, `panen_kategori_id`, `panen_user_id`) VALUES
('BR000002', 'Padi', 'Liter', 16000, 20000, 18000, 20, 1, '2016-11-22 23:32:02', '2020-05-30 17:14:49', 44, 1),
('BR000004', 'Susu ABC', 'Liter', 1700, 24000, 19000, 50, 1, '2016-11-22 23:34:19', '2020-05-29 16:05:09', 8, 1),
('BR000005', 'Bawang Bombai', 'Buah', 3000, 5000, 4000, 2, 1, '2016-11-22 23:35:23', '2020-05-02 09:04:31', 44, 1),
('BR000008', 'Ubi Jalar', 'Kilogram', 4500, 8000, 5500, 32, 1, '2016-11-22 23:38:36', '2020-05-29 16:05:16', 10, 1),
('BR000011', 'Tomat', 'Kilogram', 34000, 7000, 4500, 1, 1, '2016-11-22 23:41:43', '2020-05-27 12:14:23', 14, 1),
('BR000012', 'Cabe Rawit', 'Kilogram', 4200, 8000, 5500, 2, 1, '2016-11-22 23:42:42', '2020-05-02 09:03:36', 14, 1),
('BR000016', 'Strawberry', 'Kilogram', 8750, 12000, 9500, 20, 1, '2016-11-22 23:47:14', '2020-05-29 16:05:22', 13, 1),
('BR000017', 'Salak', 'Kilogram', 9500, 15000, 11500, 1, 1, '2016-11-22 23:48:03', '2020-05-02 08:59:02', 13, 1),
('BR000018', 'Beras', 'Ton', 6750, 10000, 7250, 2, 1, '2016-11-22 23:48:47', '2020-05-02 08:59:31', 40, 1),
('BR000020', 'Apel', 'Kilogram', 8750, 12000, 9500, 0, 1, '2016-11-22 23:51:02', '2020-05-02 09:01:06', 13, 1),
('BR000021', 'Jeruk Nipis', 'Kilogram', 8750, 12000, 9500, 2, 1, '2016-11-22 23:52:11', '2020-05-02 09:01:34', 14, 1),
('BR000022', 'Kol', 'Kilogram', 14000, 18000, 15000, 2, 1, '2016-11-23 00:04:07', '2020-05-02 08:56:00', 14, 1),
('BR000024', 'Cendanaa', 'Ton', 16000, 20000, 17000, 0, 1, '2016-11-23 00:18:24', '2020-05-12 09:41:37', 11, 1),
('BR000030', 'Mahoni', 'Kilogram', 47500, 70000, 55000, 1, 1, '2016-11-23 00:22:39', '2020-05-27 11:56:11', 11, 1),
('BR000032', 'Cabe', 'Kilogram', 7250, 10000, 7750, 1, 1, '2016-11-23 00:33:27', '2020-05-02 08:50:13', 44, 1),
('BR000039', 'Kol', 'Kilogram', 10500, 15000, 11500, 2, 1, '2016-11-23 00:39:07', '2020-05-02 08:54:44', 14, 1),
('BR000040', 'Brokoli', 'Kilogram', 13500, 18000, 14000, 3, 1, '2016-11-23 00:39:51', '2020-05-02 08:55:13', 14, 1),
('BR000041', 'Buncis', 'Gross', 15500, 22000, 18000, 2, 1, '2016-11-23 00:40:34', '2020-05-02 08:55:31', 14, 1),
('BR000043', 'Dauh Teh Enak Sekali', 'Gross', 45000, 100000, 6000, 30, 1, '2016-11-23 00:52:21', '2020-05-29 16:04:46', 7, 1),
('BR000044', 'Cengkeh', 'Bungkus', 5700, 10000, 6500, 3, 1, '2016-11-23 00:53:37', '2020-05-02 08:49:16', 44, 1),
('BR000045', 'Bawang', 'Kilogram', 15000, 10000, 6500, 45, 1, '2016-11-23 00:54:31', '2020-05-02 08:49:48', 44, 1),
('BR000057', 'Merica', 'Ons', 30000, 50000, 35000, 1, 1, '2016-11-23 16:54:09', '2020-05-02 09:08:09', 44, 1),
('BR000058', 'Jagung Bakar', 'Kilogram', 2000, 90000, 9900, 1, 1, '2020-05-02 01:19:33', '2020-05-02 08:19:58', 42, 1),
('BR000059', 'Jahe Merah', 'Gross', 20000, 5000, 4000, 20, 3, '2020-05-29 04:40:53', NULL, 47, 7),
('BR000060', 'Kacang Mete', 'Biji', 30000, 3000, 2000, 23, 5, '2020-05-29 04:42:52', NULL, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `penduduk_id` int(11) NOT NULL,
  `penduduk_nik` varchar(20) DEFAULT NULL,
  `penduduk_nama` varchar(35) DEFAULT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `penduduk_tgl_lahir` varchar(20) DEFAULT NULL,
  `penduduk_golda` varchar(5) DEFAULT NULL,
  `penduduk_alamat` varchar(60) DEFAULT NULL,
  `penduduk_notelp` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`penduduk_id`, `penduduk_nik`, `penduduk_nama`, `jenis_kelamin`, `penduduk_tgl_lahir`, `penduduk_golda`, `penduduk_alamat`, `penduduk_notelp`, `user_id`) VALUES
(1, '11111600005002', 'Evan ', 'Laki-laki', '06-November-2000', 'B', 'Jl Mangga 40 ', '08229439261', 7),
(2, '1111918989890', 'Vicktor', 'Laki-laki', '09-Oct-2000', 'AB', 'Tanah Jawa', '0823293829', NULL),
(3, '111198291829', 'Gladys', 'Perempuan', '02-March-2000', 'B', 'Jl. Medan', '08293829382', NULL),
(4, '111298329839', 'Andre Siregar', 'Laki-laki', '09-March-2000', 'AB', 'Sitoluama', '082392389230', NULL),
(5, '1928193829308290', 'Butet', 'Perempuan', '09-March-2006', 'O', 'Jl. Mawar', '08239283293', NULL),
(6, '182718219820', 'Yosua', 'Laki-laki', '21-March-2002', 'O', 'Tanah Jawa', '08232324242', NULL),
(11, '111212813820', 'Joseph', 'Laki-laki', '11-April-2000', 'B', 'Tanah Jawa', '0182983923', NULL),
(12, '12193829382938', 'Enjelina', 'Perempuan', '27-June-2003', 'A', 'Jl. Jingga', '0823928329329', NULL),
(13, '12131323232', 'Albino', 'Laki-laki', '02-March-2001', 'AB', 'Jl. Melanthon Siregar', '082323232', NULL),
(18, '1213333333333', 'Ledys', 'Perempuan', '18-May-2020', 'O', 'Dusun III', '08292898998', NULL),
(19, '11190912910292', 'Leonardo Siagian', 'Laki-laki', '12-May-2000', 'B', 'Balige', '082298293829', NULL),
(20, '121213131313', 'Putri', 'Perempuan', '22-May-2020', 'O', 'Pematangsiantar', '0823232324232', NULL),
(22, '12131324131', 'Bebi', 'Perempuan', '01-June-2000', 'O', 'Medan', '082323284789', NULL),
(23, '121313221313', 'Afrin', 'Laki-laki', '07-May-2000', 'A', 'Jakarta', '08232938293829', NULL),
(24, '129121929198398', 'Mark Zuckerberg', 'Laki-laki', '09-August-1985', 'O', 'Belanda', '082938293829', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_res_kades`
--

CREATE TABLE `tbl_res_kades` (
  `respon_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `respon` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_res_kades`
--

INSERT INTO `tbl_res_kades` (`respon_id`, `nama`, `email`, `respon`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Iyaa ?'),
(2, 'Admin', 'admin@gmail.com', 'Oke, sudah saya perbaiki !'),
(3, 'Admin', 'admin@gmail.com', 'Oke, akan saya tindak lanjuti yaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_res_masyarakat`
--

CREATE TABLE `tbl_res_masyarakat` (
  `respon_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `respon` varchar(300) NOT NULL,
  `respon_id_kades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_res_masyarakat`
--

INSERT INTO `tbl_res_masyarakat` (`respon_id`, `nama`, `email`, `respon`, `respon_id_kades`) VALUES
(3, 'Admin', 'admin@gmail.com', 'Apa yang Noo yakk ??', 1),
(5, 'Admin', 'admin@gmail.com', 'Baik, akan saya perbaiki', 2),
(6, 'Admin', 'admin@gmail.com', 'Iya Halloo', 0),
(7, 'Admin', 'admin@gmail.com', 'Apanya iya ??', 0),
(8, 'Admin', 'admin@gmail.com', 'Baik, sudah saya atasi. \r\nSalam.', 0),
(9, 'Admin', 'admin@gmail.com', 'Tunggu sebentar yakk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_retur`
--

CREATE TABLE `tbl_retur` (
  `retur_id` int(11) NOT NULL,
  `retur_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `retur_panen_id` varchar(15) DEFAULT NULL,
  `retur_panen_nama` varchar(150) DEFAULT NULL,
  `retur_panen_satuan` varchar(30) DEFAULT NULL,
  `retur_harjul` double DEFAULT NULL,
  `retur_qty` int(11) DEFAULT NULL,
  `retur_subtotal` double DEFAULT NULL,
  `retur_keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_retur`
--

INSERT INTO `tbl_retur` (`retur_id`, `retur_tanggal`, `retur_panen_id`, `retur_panen_nama`, `retur_panen_satuan`, `retur_harjul`, `retur_qty`, `retur_subtotal`, `retur_keterangan`) VALUES
(1, '2020-02-20 16:04:31', 'br000045', 'Stok Kontak Omi KK', 'PCS', 6500, 1, NULL, 'hghgh'),
(2, '2020-02-20 16:04:57', 'BR000044', 'Saklar Seri Omi KK', 'PCS', 6500, 1, NULL, 'Rusak'),
(3, '2020-02-20 16:05:26', 'BR000044', 'Saklar Seri Omi KK', 'PCS', 6500, 1, NULL, 'Rusak'),
(4, '2020-02-20 16:58:24', 'BR000043', 'Saklar Engkel Omi KK', 'PCS', 6000, 1, NULL, 'Rusak'),
(5, '2020-02-20 16:58:30', 'BR000043', 'Saklar Engkel Omi KK', 'PCS', 6000, 1, NULL, 'Rusak'),
(6, '2020-02-20 16:58:33', 'BR000043', 'Saklar Engkel Omi KK', 'PCS', 6000, 1, NULL, 'Rusak'),
(7, '2020-02-20 16:59:03', 'BR000034', 'Stop Kontak Visalux B', 'PCS', 0, 1, NULL, 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL,
  `user_status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`, `user_status`) VALUES
(1, 'Admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', '1'),
(2, 'Kepala Desa', 'kepalaDesa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2', '1'),
(7, 'Masyarakat', 'masyarakat@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD PRIMARY KEY (`beli_kode`),
  ADD KEY `beli_user_id` (`beli_user_id`),
  ADD KEY `beli_suplier_id` (`beli_suplier_id`),
  ADD KEY `beli_id` (`beli_kode`);

--
-- Indexes for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD PRIMARY KEY (`d_beli_id`),
  ADD KEY `d_beli_barang_id` (`d_beli_panen_id`),
  ADD KEY `d_beli_nofak` (`d_beli_nofak`),
  ADD KEY `d_beli_kode` (`d_beli_kode`);

--
-- Indexes for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `d_jual_barang_id` (`d_jual_panen_id`),
  ADD KEY `d_jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`jual_nofak`),
  ADD KEY `jual_user_id` (`jual_user_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_keluhan`
--
ALTER TABLE `tbl_keluhan`
  ADD PRIMARY KEY (`keluhan_id`);

--
-- Indexes for table `tbl_komen`
--
ALTER TABLE `tbl_komen`
  ADD PRIMARY KEY (`komen_id`);

--
-- Indexes for table `tbl_panen`
--
ALTER TABLE `tbl_panen`
  ADD PRIMARY KEY (`panen_id`),
  ADD KEY `barang_user_id` (`panen_user_id`),
  ADD KEY `barang_kategori_id` (`panen_kategori_id`);

--
-- Indexes for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`penduduk_id`);

--
-- Indexes for table `tbl_res_kades`
--
ALTER TABLE `tbl_res_kades`
  ADD PRIMARY KEY (`respon_id`);

--
-- Indexes for table `tbl_res_masyarakat`
--
ALTER TABLE `tbl_res_masyarakat`
  ADD PRIMARY KEY (`respon_id`);

--
-- Indexes for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  ADD PRIMARY KEY (`retur_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tbl_keluhan`
--
ALTER TABLE `tbl_keluhan`
  MODIFY `keluhan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_komen`
--
ALTER TABLE `tbl_komen`
  MODIFY `komen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  MODIFY `penduduk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_res_kades`
--
ALTER TABLE `tbl_res_kades`
  MODIFY `respon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_res_masyarakat`
--
ALTER TABLE `tbl_res_masyarakat`
  MODIFY `respon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  MODIFY `retur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD CONSTRAINT `tbl_beli_ibfk_1` FOREIGN KEY (`beli_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_beli_ibfk_2` FOREIGN KEY (`beli_suplier_id`) REFERENCES `tbl_penduduk` (`penduduk_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD CONSTRAINT `tbl_detail_beli_ibfk_1` FOREIGN KEY (`d_beli_panen_id`) REFERENCES `tbl_panen` (`panen_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_beli_ibfk_2` FOREIGN KEY (`d_beli_kode`) REFERENCES `tbl_beli` (`beli_kode`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD CONSTRAINT `tbl_detail_jual_ibfk_1` FOREIGN KEY (`d_jual_panen_id`) REFERENCES `tbl_panen` (`panen_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_jual_ibfk_2` FOREIGN KEY (`d_jual_nofak`) REFERENCES `tbl_jual` (`jual_nofak`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD CONSTRAINT `tbl_jual_ibfk_1` FOREIGN KEY (`jual_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_panen`
--
ALTER TABLE `tbl_panen`
  ADD CONSTRAINT `tbl_panen_ibfk_1` FOREIGN KEY (`panen_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_panen_ibfk_2` FOREIGN KEY (`panen_kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

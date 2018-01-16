-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2018 at 07:46 PM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `jabatan`, `img`, `created_at`, `updated_at`) VALUES
('A01', 'admin', 'admin', '$2y$10$V6opFPR94UX68m381hzEz.jGKQ9Ixtg.tGtcZzT.6GZHEOgB6Zn/u', 'admin', '', '2018-01-11 11:54:25', '2018-01-11 11:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(10) UNSIGNED NOT NULL,
  `id_faq` int(11) NOT NULL,
  `id_user` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `id_faq`, `id_user`, `jabatan`, `answer`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'P002', 'belum', 'sdsd', '2018-01-01', '2018-01-14 04:59:22', '2018-01-14 04:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `kode_bahan` int(10) UNSIGNED NOT NULL,
  `kode_produk` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bahan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`kode_bahan`, `kode_produk`, `nama_bahan`, `caption`, `created_at`, `updated_at`) VALUES
(2, 'KP0001', 'asdasdasd', '<h1>asdasd</h1>', '2018-01-08 00:23:04', '2018-01-08 00:23:04'),
(3, 'KP0001', 'asdasdd', '<h1>dasdasdasd</h1>', '2018-01-08 00:23:29', '2018-01-08 00:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(10) UNSIGNED NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '1515906057.png', '<p>kjcsdfjsdfhsdjh</p>', '2018-01-14 05:00:57', '2018-01-14 05:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `kode_detail` int(10) UNSIGNED NOT NULL,
  `kode_invoice` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_produk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`kode_detail`, `kode_invoice`, `nama_produk`, `gambar_produk`, `biaya_kirim`, `subtotal`, `caption`, `created_at`, `updated_at`) VALUES
(1, 'INV000001', 'Produk 0', 'https://lorempixel.com/640/480/?72913', 100000, 100000, 'Ut error placeat et aperiam ad nesciunt.', '2018-01-11 11:54:25', '2018-01-11 11:54:25'),
(2, 'INV000002', 'Produk 1', 'https://lorempixel.com/640/480/?58169', 100000, 100000, 'Sit veritatis quas id sint.', '2018-01-11 11:54:25', '2018-01-11 11:54:25'),
(3, 'INV000003', 'Produk 2', 'https://lorempixel.com/640/480/?55264', 100000, 100000, 'Dolores ad commodi mollitia numquam explicabo magnam porro.', '2018-01-11 11:54:26', '2018-01-11 11:54:26'),
(4, 'INV000004', 'Produk 3', 'https://lorempixel.com/640/480/?22296', 100000, 100000, 'Dolor quod et quis voluptatem reiciendis.', '2018-01-11 11:54:26', '2018-01-11 11:54:26'),
(5, 'INV000005', 'Produk 4', 'https://lorempixel.com/640/480/?89916', 100000, 100000, 'Adipisci dolorem rerum dolores culpa qui.', '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
(6, 'INV000006', 'Produk 5', 'https://lorempixel.com/640/480/?81904', 100000, 100000, 'Et dolor quisquam doloremque.', '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
(7, 'INV000007', 'Produk 6', 'https://lorempixel.com/640/480/?48269', 100000, 100000, 'Eligendi animi temporibus culpa fugit enim.', '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
(8, 'INV000008', 'Produk 7', 'https://lorempixel.com/640/480/?71398', 100000, 100000, 'Vel atque qui sint quam.', '2018-01-11 11:54:28', '2018-01-11 11:54:28'),
(9, 'INV000009', 'Produk 8', 'https://lorempixel.com/640/480/?31792', 100000, 100000, 'Dolor quia dignissimos ut minus veritatis.', '2018-01-11 11:54:28', '2018-01-11 11:54:28'),
(10, 'INV000010', 'Produk 9', 'https://lorempixel.com/640/480/?19730', 100000, 100000, 'Harum magnam cupiditate sed placeat quo.', '2018-01-11 11:54:28', '2018-01-11 11:54:28'),
(11, 'INV000001', 'Produk 11', 'https://lorempixel.com/640/480/?72913', 100000, 100000, 'Ut error placeat et aperiam ad nesciunt.', '2018-01-11 11:54:25', '2018-01-11 11:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `dialog_proses`
--

CREATE TABLE `dialog_proses` (
  `id_dialog` int(10) UNSIGNED NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dialog_proses`
--

INSERT INTO `dialog_proses` (`id_dialog`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '1515905843.png', '<p>lodsfds fnhfnifnguegfi hief e gefguwe y fewy fyuwgfuygdfhb we ig i</p>', '2018-01-14 04:57:25', '2018-01-14 04:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `id_user`, `question`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'P002', 'oke', '2018-02-09', '2018-01-09 00:01:08', '2018-01-09 00:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `kode_gambar` int(10) UNSIGNED NOT NULL,
  `kode_produk` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_tampilan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambar_produk`
--

INSERT INTO `gambar_produk` (`kode_gambar`, `kode_produk`, `gambar_tampilan`, `caption`, `created_at`, `updated_at`) VALUES
(1, 'KP0001', '1515394768.png', '<h1>asdasdas</h1>', '2018-01-07 23:59:28', '2018-01-07 23:59:28'),
(2, 'KP0001', '1515420876.png', '<p>asdasd</p>', '2018-01-08 07:14:36', '2018-01-08 07:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_template`
--

CREATE TABLE `gambar_template` (
  `kode_template` int(10) UNSIGNED NOT NULL,
  `kode_gambar` int(11) NOT NULL,
  `gambar_template` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sold_out` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambar_template`
--

INSERT INTO `gambar_template` (`kode_template`, `kode_gambar`, `gambar_template`, `caption`, `sold_out`, `created_at`, `updated_at`) VALUES
(3, 1, '1515470892.png', '<h1>asdasdsad</h1>', 1, '2018-01-08 21:08:13', '2018-01-08 21:08:13'),
(4, 1, '1515470928.png', '<h1>asdasdasdasdasd</h1>', 0, '2018-01-08 21:08:33', '2018-01-08 21:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_warna`
--

CREATE TABLE `gambar_warna` (
  `kode_warna` int(10) UNSIGNED NOT NULL,
  `kode_gambar` int(8) NOT NULL,
  `gambar_warna` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambar_warna`
--

INSERT INTO `gambar_warna` (`kode_warna`, `kode_gambar`, `gambar_warna`, `caption`, `created_at`, `updated_at`) VALUES
(4, 1, '1515467749.png', '<h2>adadadad</h2>', '2018-01-08 20:15:49', '2018-01-08 20:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(2, 'induk kategori', '2018-01-05 00:49:24', '2018-01-05 00:49:24'),
(3, 'induk kategori 2', '2018-01-05 01:11:53', '2018-01-05 01:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(10) UNSIGNED NOT NULL,
  `jenis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `jenis`, `kontak`, `created_at`, `updated_at`) VALUES
(1, 'no hp', '0854588345734', '2018-01-14 04:58:30', '2018-01-14 04:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `lihat_pasar`
--

CREATE TABLE `lihat_pasar` (
  `id_pasar` int(10) UNSIGNED NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lihat_pasar`
--

INSERT INTO `lihat_pasar` (`id_pasar`, `link`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'sadad', '1515485840.png', '<h1>dasdas</h1>', '2018-01-09 01:17:20', '2018-01-09 01:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metbayar` int(10) UNSIGNED NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `norek` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metode_pengiriman`
--

CREATE TABLE `metode_pengiriman` (
  `id_metkirim` int(10) UNSIGNED NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_12_31_074717_Admin', 1),
(2, '2017_12_31_074736_Pengguna', 1),
(3, '2017_12_31_074757_Satuan', 1),
(4, '2017_12_31_074815_Kategori', 1),
(5, '2017_12_31_074840_SubKategori', 1),
(6, '2017_12_31_074902_Produk', 1),
(7, '2017_12_31_074924_GambarProduk', 1),
(8, '2017_12_31_074949_GambarWarna', 1),
(9, '2017_12_31_075008_GambarTemplate', 1),
(10, '2017_12_31_075030_BahanBaku', 1),
(11, '2017_12_31_075109_SubHargaBahanBaku', 1),
(12, '2017_12_31_075158_Transaksi', 1),
(13, '2017_12_31_075232_DetailTransaksi', 1),
(14, '2017_12_31_075316_SubDetailTransaksi', 1),
(15, '2017_12_31_075414_tracking', 1),
(16, '2017_12_31_075433_tentang', 1),
(17, '2017_12_31_075515_Faq', 1),
(18, '2017_12_31_075530_Kontak', 1),
(19, '2017_12_31_075616_Answer', 1),
(20, '2017_12_31_075651_Testimonial', 1),
(21, '2017_12_31_075711_LihatPasar', 1),
(22, '2017_12_31_075725_Banner', 1),
(23, '2017_12_31_075743_DialogProses', 1),
(24, '2017_12_31_075807_MetodePembayaran', 1),
(25, '2017_12_31_075945_MetodePengiriman', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `username`, `password`, `email`, `whatsapp`, `jabatan`, `img`, `created_at`, `updated_at`) VALUES
('P001', 'Pierre Daugherty', 'brakus.cassandre', '$2y$10$QlPPaVW1Iieunq/C0EWuFeyoPKRkzpd2bPFc.gTNklsHLEY6lb3R.', 'hauck.gennaro@hotmail.com', '985.990.4203', 'Jabatan 1', 'https://lorempixel.com/640/480/?48064', '2018-01-11 11:54:25', '2018-01-11 11:54:25'),
('P002', 'Carmella Eichmann', 'lehner.oscar', '$2y$10$Er1w3rNXzYBf/WwUtg6qT.pCcfCxhv1dFPYxgg4Xk.vdNE9MGeYJe', 'hunter00@schinner.biz', '+13832673999', 'Jabatan 2', 'https://lorempixel.com/640/480/?92718', '2018-01-11 11:54:25', '2018-01-11 11:54:25'),
('P003', 'Tito Nitzsche III', 'marion.sipes', '$2y$10$sevOt/v8Ja5i.81q4Um0aO4dDEZQGTsBABk4WozfVEg/REWUwpDyS', 'aubree.gottlieb@hotmail.com', '394.595.9323', 'Jabatan 3', 'https://lorempixel.com/640/480/?97851', '2018-01-11 11:54:26', '2018-01-11 11:54:26'),
('P004', 'Prof. Nicholas Ankunding', 'guillermo73', '$2y$10$wrXVhL5x.h7cZpr/N2.ie.dmr4drO/BHEseBHWizeJwV.DGGYA1VS', 'ulises.kulas@hotmail.com', '(870) 714-0826 x99177', 'Jabatan 4', 'https://lorempixel.com/640/480/?33361', '2018-01-11 11:54:26', '2018-01-11 11:54:26'),
('P005', 'Max Hermann', 'ruby74', '$2y$10$7p.prpbHPYrQpw/1qJxaeePqD4eXPVkOAFqIRp9YqmLJdwlprTI8O', 'lang.van@gmail.com', '539.387.8129 x5165', 'Jabatan 5', 'https://lorempixel.com/640/480/?60860', '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
('P006', 'Bobbie Hodkiewicz', 'mafalda85', '$2y$10$TRereqtFJAw411Vq6t1O7OyF2pCW.2Lhg52vUI8l6kXA5ABdR8QA6', 'mhills@yahoo.com', '481-971-3234 x8189', 'Jabatan 6', 'https://lorempixel.com/640/480/?16020', '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
('P007', 'Devyn Graham DDS', 'kirstin40', '$2y$10$vd/3uMKZ36FSM01KujmM7ON5rjKjOM2PcI0SKpZayzXtkN0z2wCxG', 'connelly.jordy@yahoo.com', '1-352-252-5560', 'Jabatan 7', 'https://lorempixel.com/640/480/?39098', '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
('P008', 'Aaron Carroll Sr.', 'flangosh', '$2y$10$eprQ8kl2JSNIjCJ4Qf.QmehNv3xo8AqUUR4/.k1zAyV6InFuIC4sq', 'henderson26@reichert.info', '1-702-324-1804 x9540', 'Jabatan 8', 'https://lorempixel.com/640/480/?92609', '2018-01-11 11:54:28', '2018-01-11 11:54:28'),
('P009', 'Amya Kassulke', 'janessa97', '$2y$10$AFhZWZ51VsG3.gCZxu7w/uggET04m9wSrbuiHe6m33.GvD5ZmanmS', 'jeffrey43@yahoo.com', '795-849-0092', 'Jabatan 9', 'https://lorempixel.com/640/480/?34759', '2018-01-11 11:54:28', '2018-01-11 11:54:28'),
('P010', 'Akeem Trantow DVM', 'vschuster', '$2y$10$mNr8wAHq9Gx4X64ImD8wrOxAKPa6tvYq97w8j3a5rAxTlHbpOGmAe', 'lakin.heidi@yahoo.com', '+1.939.802.9800', 'Jabatan 10', 'https://lorempixel.com/640/480/?42633', '2018-01-11 11:54:28', '2018-01-11 11:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_operasional` int(11) NOT NULL,
  `sold_out` tinyint(1) NOT NULL DEFAULT '0',
  `perbesar` tinyint(1) NOT NULL DEFAULT '0',
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `id_kategori`, `nama_produk`, `biaya_operasional`, `sold_out`, `perbesar`, `caption`, `created_at`, `updated_at`) VALUES
('KP0001', 2, 'ssfdfsdf', 32132, 1, 0, '<h1>saddasd</h1>', '2018-01-05 17:42:38', '2018-01-05 17:42:38'),
('KP0002', 3, 'asdasd', 23123, 1, 0, '<h4>asdasdasasd</h4><p><u>dasdasdasd</u><br></p><p><u><i>adsasdasd﻿</i><i></i></u></p><p><u></u></p>', '2018-01-05 19:02:39', '2018-01-05 19:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(10) UNSIGNED NOT NULL,
  `nama_satuan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `berat`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 32, '2018-01-08 00:52:10', '2018-01-08 00:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `sub_detail_transaksi`
--

CREATE TABLE `sub_detail_transaksi` (
  `kode_sub` int(10) UNSIGNED NOT NULL,
  `kode_detail` int(11) NOT NULL,
  `nama_bahan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_detail_transaksi`
--

INSERT INTO `sub_detail_transaksi` (`kode_sub`, `kode_detail`, `nama_bahan`, `jumlah`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bahan 1', 2, 50000, '2018-01-11 11:54:25', '2018-01-11 11:54:25'),
(2, 2, 'Bahan 2', 3, 50000, '2018-01-11 11:54:26', '2018-01-11 11:54:26'),
(3, 3, 'Bahan 3', 4, 50000, '2018-01-11 11:54:26', '2018-01-11 11:54:26'),
(4, 4, 'Bahan 4', 5, 50000, '2018-01-11 11:54:26', '2018-01-11 11:54:26'),
(5, 5, 'Bahan 5', 6, 50000, '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
(6, 6, 'Bahan 6', 7, 50000, '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
(7, 7, 'Bahan 7', 8, 50000, '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
(8, 8, 'Bahan 8', 9, 50000, '2018-01-11 11:54:28', '2018-01-11 11:54:28'),
(9, 9, 'Bahan 9', 10, 50000, '2018-01-11 11:54:28', '2018-01-11 11:54:28'),
(10, 10, 'Bahan 10', 11, 50000, '2018-01-11 11:54:28', '2018-01-11 11:54:28'),
(11, 1, 'Bahan 11', 2, 50000, '2018-01-11 11:54:25', '2018-01-11 11:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `sub_harga_bahan_baku`
--

CREATE TABLE `sub_harga_bahan_baku` (
  `kode_harga` int(10) UNSIGNED NOT NULL,
  `kode_bahan` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `nama_supplier` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_harga_bahan_baku`
--

INSERT INTO `sub_harga_bahan_baku` (`kode_harga`, `kode_bahan`, `id_satuan`, `nama_supplier`, `harga`, `created_at`, `updated_at`) VALUES
(2, '2', 1, 'adamss', 21312, '2018-01-08 02:10:36', '2018-01-12 03:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_subkategori` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_subkategori` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_subkategori`, `id_kategori`, `nama_subkategori`, `created_at`, `updated_at`) VALUES
(1, 3, 'safsdf', '2018-01-10 01:33:24', '2018-01-10 01:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int(10) UNSIGNED NOT NULL,
  `tentang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `tentang`, `created_at`, `updated_at`) VALUES
(3, '<h2>sdad</h2>', '2018-01-09 08:13:59', '2018-01-09 08:13:59'),
(4, '<h2>sdj hg duyg u f dyafs ytfasvyf</h2>', '2018-01-14 04:58:01', '2018-01-14 04:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id_testi` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id_testi`, `id_user`, `testimonial`, `created_at`, `updated_at`) VALUES
(1, 'P002', '<p>oke</p><p><br></p>', '2018-01-14 04:59:56', '2018-01-14 04:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `kode_invoice` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembelian_bahan_baku` tinyint(1) NOT NULL DEFAULT '0',
  `cetak_kemasan` tinyint(1) NOT NULL DEFAULT '0',
  `produksi` tinyint(1) NOT NULL DEFAULT '0',
  `qc` tinyint(1) NOT NULL DEFAULT '0',
  `finishing` tinyint(1) NOT NULL DEFAULT '0',
  `pengiriman` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`kode_invoice`, `pembelian_bahan_baku`, `cetak_kemasan`, `produksi`, `qc`, `finishing`, `pengiriman`, `created_at`, `updated_at`) VALUES
('INV000001', 1, 0, 0, 0, 0, 0, '2018-01-11 11:54:25', '2018-01-11 11:54:25'),
('INV000002', 1, 0, 0, 0, 0, 0, '2018-01-11 11:54:25', '2018-01-11 11:54:25'),
('INV000003', 1, 1, 1, 1, 1, 1, '2018-01-11 11:54:26', '2018-01-12 03:35:07'),
('INV000004', 1, 0, 0, 0, 0, 0, '2018-01-11 11:54:26', '2018-01-11 11:54:26'),
('INV000005', 1, 0, 0, 0, 0, 0, '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
('INV000006', 1, 0, 0, 0, 0, 0, '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
('INV000007', 1, 0, 0, 0, 0, 0, '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
('INV000008', 1, 0, 0, 0, 0, 0, '2018-01-11 11:54:28', '2018-01-11 11:54:28'),
('INV000009', 1, 1, 1, 1, 1, 1, '2018-01-11 11:54:28', '2018-01-12 03:34:39'),
('INV000010', 1, 0, 0, 0, 0, 0, '2018-01-11 11:54:28', '2018-01-11 11:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_invoice` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `gambar_bukti` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_invoice`, `id_user`, `total`, `status`, `gambar_bukti`, `tanggal`, `created_at`, `updated_at`) VALUES
('INV000001', 'P001', 100000, 1, 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb', '2018-01-11', '2018-01-11 11:54:25', '2018-01-11 13:33:36'),
('INV000002', 'P002', 100000, 1, 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb', '2018-01-11', '2018-01-11 11:54:26', '2018-01-11 21:56:35'),
('INV000003', 'P003', 100000, 1, 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb', '2018-01-11', '2018-01-11 11:54:26', '2018-01-12 03:35:02'),
('INV000004', 'P004', 100000, 0, 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb', '2018-01-11', '2018-01-11 11:54:26', '2018-01-11 11:54:26'),
('INV000005', 'P005', 100000, 0, 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb', '2018-01-11', '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
('INV000006', 'P006', 100000, 0, 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb', '2018-01-11', '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
('INV000007', 'P007', 100000, 0, 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb', '2018-01-11', '2018-01-11 11:54:27', '2018-01-11 11:54:27'),
('INV000008', 'P008', 100000, 0, 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb', '2018-01-11', '2018-01-11 11:54:28', '2018-01-11 11:54:28'),
('INV000009', 'P009', 100000, 1, 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb', '2018-01-11', '2018-01-11 11:54:28', '2018-01-12 03:34:33'),
('INV000010', 'P010', 100000, 0, 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb', '2018-01-11', '2018-01-11 11:54:28', '2018-01-11 11:54:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`kode_bahan`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`kode_detail`);

--
-- Indexes for table `dialog_proses`
--
ALTER TABLE `dialog_proses`
  ADD PRIMARY KEY (`id_dialog`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`kode_gambar`);

--
-- Indexes for table `gambar_template`
--
ALTER TABLE `gambar_template`
  ADD PRIMARY KEY (`kode_template`);

--
-- Indexes for table `gambar_warna`
--
ALTER TABLE `gambar_warna`
  ADD PRIMARY KEY (`kode_warna`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `lihat_pasar`
--
ALTER TABLE `lihat_pasar`
  ADD PRIMARY KEY (`id_pasar`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metbayar`);

--
-- Indexes for table `metode_pengiriman`
--
ALTER TABLE `metode_pengiriman`
  ADD PRIMARY KEY (`id_metkirim`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `sub_detail_transaksi`
--
ALTER TABLE `sub_detail_transaksi`
  ADD PRIMARY KEY (`kode_sub`);

--
-- Indexes for table `sub_harga_bahan_baku`
--
ALTER TABLE `sub_harga_bahan_baku`
  ADD PRIMARY KEY (`kode_harga`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_subkategori`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`kode_invoice`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_invoice`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `kode_bahan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `kode_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dialog_proses`
--
ALTER TABLE `dialog_proses`
  MODIFY `id_dialog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `kode_gambar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gambar_template`
--
ALTER TABLE `gambar_template`
  MODIFY `kode_template` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gambar_warna`
--
ALTER TABLE `gambar_warna`
  MODIFY `kode_warna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lihat_pasar`
--
ALTER TABLE `lihat_pasar`
  MODIFY `id_pasar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_metbayar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `metode_pengiriman`
--
ALTER TABLE `metode_pengiriman`
  MODIFY `id_metkirim` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_detail_transaksi`
--
ALTER TABLE `sub_detail_transaksi`
  MODIFY `kode_sub` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sub_harga_bahan_baku`
--
ALTER TABLE `sub_harga_bahan_baku`
  MODIFY `kode_harga` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_subkategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id_testi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

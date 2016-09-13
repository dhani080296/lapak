-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2016 at 10:32 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lapak_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`id_barang` int(5) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL,
  `kontak` varchar(12) DEFAULT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_penjual` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `gambar`, `deskripsi`, `kontak`, `date`, `status`, `id_penjual`) VALUES
(1, 'xperia z3', 1, 'Harga-Xperia-Z3-Di-Indonesia.jpg', 'LIMITED STOCK...\r\n\r\nSONY XPERIA Z3 new, packing, garansi personal 1 minggu (tidak berlaku untuk human error spt jatuh, masuk air, dsb)\r\n\r\nSpesifikasi Sony Xperia Z3\r\n* OS Android 4.4 Kitkat (upgradeable to 5.0 Lollipop)\r\n* 3G, HSDPA 42Mbps HSUPA 5.6 Mbps\r\n* 4G LTE [LTE, Cat4, 50 Mbps UL, 150 Mbps DL]\r\n* RAM 3 GB\r\n* Layar 5.2 IPS LCD Triluminous Dysplay\r\n* Resolusi 1080 x 1920 Pixel, 16jt Warna\r\n* CPU Qualcomm Snapdragon 801 2.3Ghz &amp; GPU Adreno 330\r\n* Kamera 20.7 MP, Autofokus\r\n* Kamera Depan: Ada 2,2 Mp HD\r\n* Memori Internal: 16 GB\r\n* Memori Eksternal: Micro SD upto 128 GB\r\n* Baterai 3200 mAh\r\n\r\nHub.\r\nCrown ponsel\r\nPlaza milenium lt.1/51\r\nDekat tangga darurat', '089675456767', '2016-06-26', 'Active', 1012),
(3, 'samsung galaxy s7', 2, 'samsung-galaxy-s6-edge-plus-9658.0_.0_1.jpg', 'Samsung Galaxy S7 HDC\r\n\r\n_Ada Warna Hitam dan Putih\r\n\r\n_Harga 1.950 nett bos.\r\n\r\n_Garansi 1 Bulan\r\n\r\n_Cod Jl.Tukad Pakerisan - Panjer (DENPASAR)\r\n_Ada juga tipe Hdc Lainnya seperti : iPhone 6s dan iPhone 6s Plus\r\n\r\nSpesifikasi Galaxy S7 Hdc :\r\n-13mp + 5mp Kamera mantap Jernih Dan Detail\r\n-Lampu Flash Kamera putih\r\n-Ram Show 4gb real 3gb siap tempur\r\n-Layar 5.1inch Amoled 320 Gorilla Glass tahan api &amp; goresan\r\n-Show Marsmelow Real Android Lolipop\r\n-Quadcore Processor (game hd dilahap, Testing Real Reacing 3)\r\n-internet Show Lte real 3G\r\n-Internal Memory Real 16Gb\r\n-Real bisa multiwindow Centre\r\n-Bodi mntap real Metal kokoh\r\n-Model Font bisa di ganti ganti\r\n-Led Notifikasi kalo ada bbm/sms/ batre lemah lampu akan berkedip seperti bawaanhpnya\r\n-Power saving  (hemat batrai)\r\n-Batre Real 3000 Mantap super duper awet\r\n-Hp tidak cepat panas di pake seharian\r\n-heart rate, smart scrool, Air Gestur 4 Way\r\n-Room kernel sama dengan originalnya\r\n-enginering *#0*# tembus\r\n-Cek keaslian *#0*# tembus membuat anda lebih percaya diri\r\n-Booting logo samsung Versi T-Mobile seperti model samsung S7 yang di amerika.\r\n-Yg lebih gila lagi dari Hdc T-Mobile ini adalah IMEI tmbus Galaxy S7 (silahkan cek di internet)\r\n-Logo Samsung tidak hilang direset berapa kalipun, aman gak was was brooo.\r\n\r\nBarang yang kita jual Jaminan 100% baru, Lengkap, Fullset\r\n\r\nFoto gambar diatas adalah gambar asli\r\nBukan foto Nyomot/Copas dari internet.\r\n\r\nHDC(HIGHT DEVINITION COPY) adalah Replika tingkat dewa, karena beberapa Componen didalamnya menggunakan componen sparepart asli samsung.\r\n\r\nIni Sudah sangat sangat Percis dengan Originalnnya\r\nMantp pokoknyaa.\r\n\r\nUntuk Lebih Jelasnya Silahkan Cari Informasi Samsung Galaxy S7 HDC di internet,\r\nLiat aja di youtube.', '085747657821', '2016-06-07', 'Active', 1012),
(4, 'asdasdasd', 1, '2367992_201405090802552.jpg', 'asdsa', '123456789102', '2016-05-03', 'Nonactive', 1012),
(5, 'asdad', 1, '500px-Xperia_Logo.svg_5.png', 'asdasdsads', '213457893874', '2016-06-06', 'Nonactive', 1011),
(7, 'Oppo neo 7', 3, 'oppo.jpg', 'Mau jualin hp temen.. Jual opo neo 7 kondisi masih bagus mulus 100% no baret like new deh.. Bekas pemakaian cewek.kondisi fuset sprti baru kelengkapan ada semua.. Termasuk nota dan kartu grs. Masih garansi 8 bulanan. Jual murah 1800 net dulu beli 2399. \r\nMinat sms', '089618206481', '2016-06-11', 'Active', 1017);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(3) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'xperia'),
(2, 'Samsung'),
(3, 'Opo'),
(4, 'Iphone');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE IF NOT EXISTS `penjual` (
`id_penjual` int(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `id_pertanyaan` int(5) NOT NULL,
  `jawaban` varchar(225) NOT NULL,
  `status` varchar(15) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1018 ;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `nama`, `alamat`, `username`, `password`, `id_pertanyaan`, `jawaban`, `status`, `foto`) VALUES
(1002, 'rudy', 'jln kircon', 'rood', 'rood', 2, 'bandung', 'penjual', ''),
(1003, 'ali', 'jln cibiru', 'acil', 'acil', 2, 'bandung', 'penjual', ''),
(1004, 'david', 'jln rancamanyar', 'david', 'david', 1, 'rancamanyar', 'penjual', ''),
(1005, 'fikrie', 'jln cibangkong', 'fikrie', 'fikrie', 1, 'bandung', 'penjual', 'Koala.jpg'),
(1006, 'eka', 'jln permata biru', 'arlan', 'arlan', 1, 'cibiru', 'penjual', ''),
(1007, 'boby', 'jln kircon', 'boby', 'boby', 1, 'jln kircon', 'penjual', ''),
(1008, 'naufal', 'jln buah batu', 'opay', 'opay', 2, 'bandung', 'penjual', ''),
(1009, 'mogi', 'jln leuwi panjang', 'mogi', 'mogi', 1, 'margahayu raya', 'penjual', ''),
(1010, 'sidik', 'jln pindad', 'sidik', 'sidik', 2, 'bandung', 'penjual', ''),
(1011, 'agung', 'jln maleer utara', 'agung', 'agung', 1, 'maleer utara', 'penjual', 'Lighthouse.jpg'),
(1012, 'Ahmad', 'jln maleer', 'admin', 'admin', 2, 'bandung', 'admin', ''),
(1013, 'bully', 'asdasddsa', 'bully', 'bully', 3, 'sd suka maju', 'penjual', 'Penguins.jpg'),
(1017, 'dhani', 'maleer 5', 'dhani', 'dhani', 1, 'maleer 5', 'penjual', '');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
`id_pertanyaan` int(5) NOT NULL,
  `nama_pertanyaan` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `nama_pertanyaan`) VALUES
(1, 'Dimanakah anda tinggal?'),
(2, 'Di mana kah tempat lahir anda?'),
(3, 'Dimanakah sekolah dasar anda?'),
(4, 'dimana asal kamu?');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`id_pesan` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `date` date NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_barang`, `date`, `komentar`) VALUES
(1, 5, '2016-06-07', 'sasdsadads'),
(2, 5, '2016-06-07', 'apa kabar'),
(3, 5, '2016-06-07', 'bob'),
(4, 7, '2016-06-24', 'asdasdasda'),
(5, 1, '2016-06-26', 'job');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
 ADD PRIMARY KEY (`id_penjual`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
 ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
MODIFY `id_penjual` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1018;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
MODIFY `id_pertanyaan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `id_pesan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 05:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sparepart_211149`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_211149`
--

CREATE TABLE `tbl_barang_211149` (
  `211149_idbarang` int(11) NOT NULL,
  `211149_namabarang` varchar(50) NOT NULL,
  `211149_jenisbarang` text NOT NULL,
  `211149_harga` int(11) NOT NULL,
  `211149_stok` int(11) NOT NULL,
  `211149_idsupplier` int(11) NOT NULL,
  `211149_foto` varchar(150) NOT NULL DEFAULT 'default.png',
  `211149_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_barang_211149`
--

INSERT INTO `tbl_barang_211149` (`211149_idbarang`, `211149_namabarang`, `211149_jenisbarang`, `211149_harga`, `211149_stok`, `211149_idsupplier`, `211149_foto`, `211149_ket`) VALUES
(13, 'Knalpot Racing 165', '', 165000, 9, 7, 'default.png', 'Knalpot gahar harga murah'),
(33, 'Oli Federal Racing', '', 65000, 18, 7, 'cbf4f35c42584699dcf5ea8f1af64881.jpg', ''),
(34, 'Spidometer Yamaha Byson Karbu', '', 350000, 44, 3, '5b794f275fbfc998cf76cbf315bb41c9.jpg', ''),
(36, 'Master Rem Mio Z', '', 45000, 16, 3, 'default.png', ''),
(38, 'Busi Motor Satria', '', 30000, 11, 3, 'e74cbceca25f16979d3f32ed718ddb45.jpg', ''),
(44, 'KAMPAS GANDA VARIO 125 150 PCX 125 150 KWN 4632 CA', '', 182160, 126, 13, 'd43d98e745705943d20b7b4abc2dfdf0.jpg', 'KAMPAS GANDA VARIO 125 150 PCX 125 150 KWN 4632 CARBON KEVLAR DAYTONA\r<br>\r<br>100% ORIGINAL DAYTONA\r<br>BAHAN FULL CARBON KEVLAR\r<br>COCOK BUAT\r<br>VARIO 125 150\r<br>AEROX 155\r<br>NMAX 155\r<br>PCX 125 150\r<br>LEXI\r<br>VARIO KARBURATOR\r<br>\r<br>MIO M3'),
(45, 'Kampas Rem Depan Yamaha NMax Aerox Lexi Mio M3 Z G', 'Kampas Rem', 35900, 4, 13, '73a435bc3fa8bd655d3a294d108eb534.jpg', '1 set Kampas rem depan DAYTONA Superstock Brake Pad 4069 New Original.\r<br>\r<br>Aplikasi roda depan\r<br>1. Yamaha NMax 155, New NMax 155\r<br>2. Mio M3, Mioz Z, Mio GT 125\r<br>3. MX150 MX King\r<br>4. Aerox 125 155\r<br>5. Lexi\r<br>\r<br>1. Meningkatkan respon pengereman\r<br>2. Lebih pakem sehingga jarak pengereman lebih pendek\r<br>3. Menambah surabilitas masa pakai\r<br>4. Material tidak mengandung asbes (non asbestos)\r<br>5. Mengurangi kerusakan pada disc (tidak makan cakram)'),
(46, 'Kampas Rem Belakang Mio M3 J S Z New Soul GT X-Rid', 'Kampas Rem', 44900, 3, 13, '7b8f28f22d618d2efbd1b92d0d5984ac.jpg', '1 set Kampas rem belakang Brake Shoe non asbes with spring Tromol DAYTONA UltraForce New Original 5061.\r<br>\r<br>Aplikasi kampas belakang\r<br>Mio All Series Karbu J Z S GT M3 125\r<br>Soul GT 115 125\r<br>X-Ride\r<br>Fazzio\r<br>Fino\r<br>Gear \r<br>Nouvo\r<br>Xeon Karbu FI GT RC 125\r<br>\r<br>PN 5MXF530K00 1LB\r<br>\r<br>Key Features:\r<br>1. Meningkatkan kontrol pengereman\r<br>2. Jarak pengereman lebih pendek\r<br>3. Mempercepat respon pengereman\r<br>4. Material tidak mengandung asbes (non asbestos)\r<br>5. ADC12 Base material');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_211149`
--

CREATE TABLE `tbl_supplier_211149` (
  `211149_idsupplier` int(11) NOT NULL,
  `211149_namasupplier` varchar(50) NOT NULL,
  `211149_notelp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supplier_211149`
--

INSERT INTO `tbl_supplier_211149` (`211149_idsupplier`, `211149_namasupplier`, `211149_notelp`) VALUES
(2, 'PT. Astra Honda Motor tbk.', '087946758327'),
(3, 'PT. Yamaha Indonesia Motor', '087943674342'),
(4, 'PT. Swallow Tbk.', '089786465783'),
(7, 'PT. Mandiri Motor', '087865557687'),
(13, 'Daytona Racing', '084593420452');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_211149`
--

CREATE TABLE `tbl_transaksi_211149` (
  `211149_idtransaksi` int(11) NOT NULL,
  `211149_iduser` int(11) NOT NULL,
  `211149_idbarang` int(11) NOT NULL,
  `211149_jumlah` int(11) NOT NULL,
  `211149_tgltransaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `211149_total` int(11) NOT NULL,
  `211149_dibayar` int(11) NOT NULL,
  `211149_kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi_211149`
--

INSERT INTO `tbl_transaksi_211149` (`211149_idtransaksi`, `211149_iduser`, `211149_idbarang`, `211149_jumlah`, `211149_tgltransaksi`, `211149_total`, `211149_dibayar`, `211149_kembalian`) VALUES
(8, 12, 13, 1, '2023-11-08 07:52:42', 165000, 200000, 35000),
(11, 12, 33, 2, '2023-11-12 20:42:59', 130000, 150000, 20000),
(12, 12, 34, 3, '2023-11-12 20:50:19', 1050000, 1100000, 50000),
(13, 12, 13, 3, '2023-11-13 06:43:22', 495000, 500000, 5000),
(14, 12, 33, 2, '2023-11-14 08:50:22', 130000, 150000, 20000),
(15, 12, 34, 23, '2023-11-14 08:50:56', 8050000, 10000000, 1950000),
(17, 12, 33, 20, '2023-11-14 10:06:03', 1300000, 1500000, 200000),
(19, 12, 36, 2, '2023-11-14 10:20:00', 90000, 100000, 10000),
(20, 12, 36, 3, '2023-11-18 12:07:32', 135000, 150000, 15000),
(21, 12, 36, 2, '2023-11-19 21:02:39', 90000, 100000, 10000),
(22, 12, 33, 1, '2023-11-23 14:24:57', 65000, 100000, 35000),
(23, 13, 33, 2, '2023-11-23 23:49:54', 130000, 150000, 20000),
(24, 13, 34, 1, '2023-11-23 23:50:57', 350000, 500000, 150000),
(25, 13, 36, 1, '2023-11-23 23:51:06', 45000, 500000, 455000),
(26, 13, 34, 3, '2023-11-24 00:57:57', 1050000, 1100000, 50000),
(27, 12, 38, 1, '2023-12-03 23:05:47', 30000, 50000, 20000),
(28, 12, 13, 1, '2023-12-03 23:05:56', 165000, 200000, 35000),
(29, 12, 34, 2, '2023-12-03 23:06:07', 700000, 1000000, 300000),
(30, 12, 36, 2, '2023-12-03 23:06:27', 90000, 100000, 10000),
(31, 12, 33, 4, '2023-12-03 23:06:38', 260000, 300000, 40000),
(32, 12, 38, 3, '2023-12-03 23:07:08', 90000, 100000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_211149`
--

CREATE TABLE `tbl_user_211149` (
  `211149_iduser` int(11) NOT NULL,
  `211149_nama` varchar(50) NOT NULL,
  `211149_notelp` char(13) NOT NULL,
  `211149_email` varchar(50) NOT NULL,
  `211149_username` varchar(30) NOT NULL,
  `211149_password` varchar(30) NOT NULL,
  `211149_level` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_211149`
--

INSERT INTO `tbl_user_211149` (`211149_iduser`, `211149_nama`, `211149_notelp`, `211149_email`, `211149_username`, `211149_password`, `211149_level`) VALUES
(1, 'Muhammad Sumbul', '089753745283', 'sumbul@gmail.com', 'karyawan123', 'karyawan123', 'Karyawan'),
(12, 'Khidir Karawiti', '089786756435', 'karawiti@gmail.com', 'owner123', 'owner123', 'Owner'),
(13, 'Achmad Kanabawi', '089786283743', 'kanabawi@gmail.com', 'karyawan2', 'karyawan2', 'Karyawan'),
(14, 'Hasyim Al Sisha S.', '087689253675', 'hasyim@gmail.com', 'karyawan4', 'karyawan4', 'Karyawan'),
(21, 'Akbar Ikram', '087678569457', 'ikram.akbar@gmail.com', 'akbar123', 'akbar123', 'Karyawan'),
(29, 'Mubarak Ali', '0887766554', 'ali.mubarak@gmail.com', 'aliganteng', 'aliganteng', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang_211149`
--
ALTER TABLE `tbl_barang_211149`
  ADD PRIMARY KEY (`211149_idbarang`),
  ADD KEY `211149_idsupplier` (`211149_idsupplier`);

--
-- Indexes for table `tbl_supplier_211149`
--
ALTER TABLE `tbl_supplier_211149`
  ADD PRIMARY KEY (`211149_idsupplier`);

--
-- Indexes for table `tbl_transaksi_211149`
--
ALTER TABLE `tbl_transaksi_211149`
  ADD PRIMARY KEY (`211149_idtransaksi`),
  ADD KEY `211149_iduser` (`211149_iduser`),
  ADD KEY `211149_idbarang` (`211149_idbarang`);

--
-- Indexes for table `tbl_user_211149`
--
ALTER TABLE `tbl_user_211149`
  ADD PRIMARY KEY (`211149_iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang_211149`
--
ALTER TABLE `tbl_barang_211149`
  MODIFY `211149_idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_supplier_211149`
--
ALTER TABLE `tbl_supplier_211149`
  MODIFY `211149_idsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_transaksi_211149`
--
ALTER TABLE `tbl_transaksi_211149`
  MODIFY `211149_idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_user_211149`
--
ALTER TABLE `tbl_user_211149`
  MODIFY `211149_iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang_211149`
--
ALTER TABLE `tbl_barang_211149`
  ADD CONSTRAINT `tbl_barang_211149_ibfk_1` FOREIGN KEY (`211149_idsupplier`) REFERENCES `tbl_supplier_211149` (`211149_idsupplier`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transaksi_211149`
--
ALTER TABLE `tbl_transaksi_211149`
  ADD CONSTRAINT `tbl_transaksi_211149_ibfk_1` FOREIGN KEY (`211149_idbarang`) REFERENCES `tbl_barang_211149` (`211149_idbarang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_transaksi_211149_ibfk_2` FOREIGN KEY (`211149_iduser`) REFERENCES `tbl_user_211149` (`211149_iduser`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

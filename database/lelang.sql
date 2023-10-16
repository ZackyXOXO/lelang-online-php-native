-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 01:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` blob NOT NULL,
  `status` enum('CLOSE','OPEN','SOLD') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `tgl_daftar`, `harga_awal`, `deskripsi`, `foto`, `status`) VALUES
(7, 'Apple Watch', '2022-10-05', 1500000, 'Apple Watch terbaru keren banget deh pokoknya', 0x6170706c652d77617463682e6a7067, 'SOLD'),
(8, 'Sepatu', '2022-10-05', 500000, 'Sepatu merah abu abu', 0x73686f652e6a706567, 'SOLD'),
(9, 'Bola Basket', '2022-10-05', 250000, 'Bola basket bulat orange', 0x62616c6c2e6a706567, 'SOLD'),
(11, 'Tas', '2022-10-07', 200000, 'Tas warna biru', 0x6261662e6a706567, 'SOLD'),
(13, 'Iphone', '2022-10-24', 5000000, 'Iphone X yang sangat keren OMG', 0x6970686f6e652e706e67, 'SOLD'),
(14, 'Topi ', '2022-11-01', 15000, 'Topi Coklat keren ', 0x746f70692e6a7067, 'SOLD'),
(15, 'Headphone', '2022-11-09', 200000, 'Headphone warna biru', 0x6865616470686f6e652e6a706567, 'SOLD'),
(16, 'Topi lagi', '2022-11-18', 20000, 'Topi coklat', 0x6973746f636b70686f746f2d313133383431353439382d3130323478313032342e6a7067, 'SOLD'),
(17, 'Topi Cinnabon', '2022-11-18', 50000, 'Topi keren browh', 0x746f70695f63696e6e61626f6e2e706e67, 'SOLD');

-- --------------------------------------------------------

--
-- Table structure for table `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_lelang2`
--

CREATE TABLE `history_lelang2` (
  `id` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_lelang2`
--

INSERT INTO `history_lelang2` (`id`, `id_lelang`, `id_barang`, `id_masyarakat`, `penawaran_harga`) VALUES
(1, 0, 8, 5, 550000),
(7, 0, 13, 5, 1000),
(8, 0, 13, 4, 2000),
(9, 0, 8, 8, 600000),
(10, 0, 8, 8, 10000),
(11, 0, 8, 8, 610000),
(12, 0, 13, 5, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `penawaran_harga` int(20) NOT NULL,
  `status` enum('','WINNER') NOT NULL,
  `id_masyarakat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`id`, `id_barang`, `tgl_lelang`, `penawaran_harga`, `status`, `id_masyarakat`) VALUES
(17, 8, '2022-11-02', 600000, '', 8),
(20, 8, '2022-11-02', 550000, '', 5),
(21, 8, '2022-11-02', 750000, 'WINNER', 4),
(22, 13, '2022-11-03', 6000000, '', 4),
(23, 13, '2022-11-03', 5550000, '', 8),
(24, 13, '2022-11-03', 7750000, 'WINNER', 5),
(25, 8, '2022-11-03', 510000, '', 5),
(26, 14, '2022-11-04', 20000, '', 5),
(27, 14, '2022-11-04', 30000, '', 4),
(28, 14, '2022-11-04', 35000, '', 8),
(29, 14, '2022-11-04', 45000, 'WINNER', 5),
(30, 7, '2022-11-04', 1600000, '', 5),
(31, 7, '2022-11-04', 1750000, 'WINNER', 8),
(32, 9, '2022-11-08', 300000, '', 5),
(33, 9, '2022-11-08', 350000, 'WINNER', 5),
(34, 11, '2022-11-08', 250000, '', 5),
(35, 11, '2022-11-08', 300000, '', 8),
(36, 15, '2022-11-09', 250000, '', 5),
(37, 15, '2022-11-09', 300000, '', 8),
(38, 15, '2022-11-09', 325000, 'WINNER', 5),
(39, 11, '2022-11-10', 350000, 'WINNER', 5),
(40, 16, '2022-11-18', 30000, 'WINNER', 5),
(41, 16, '2022-11-18', 50000, '', 8),
(42, 17, '2022-11-18', 60000, '', 5),
(43, 17, '2022-11-18', 60100, 'WINNER', 8),
(44, 17, '2022-11-18', 60101, '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tlp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nama`, `username`, `password`, `tlp`) VALUES
(4, 'Lois', 'lois', '202cb962ac59075b964b07152d234b70', '081234567890'),
(5, 'Rial', 'rial', '202cb962ac59075b964b07152d234b70', '081543280987'),
(6, 'Abbas', 'abbas30', '202cb962ac59075b964b07152d234b70', '081209876754'),
(8, 'Jimmy', 'jim', '202cb962ac59075b964b07152d234b70', '081299998888');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `username`, `password`, `level`) VALUES
(6, 'Athailla', 'atha', '202cb962ac59075b964b07152d234b70', 'admin'),
(8, 'Admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(9, 'Staff', 'staff', '202cb962ac59075b964b07152d234b70', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lelang` (`id_lelang`,`id_barang`,`id_masyarakat`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_masyarakat` (`id_masyarakat`),
  ADD KEY `id_lelang_2` (`id_lelang`);

--
-- Indexes for table `history_lelang2`
--
ALTER TABLE `history_lelang2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`,`id_masyarakat`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `history_lelang2`
--
ALTER TABLE `history_lelang2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_lelang`) REFERENCES `lelang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lelang_ibfk_2` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

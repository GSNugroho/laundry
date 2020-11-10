-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2020 at 05:40 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `laundry_kategori`
--

CREATE TABLE `laundry_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_kategori`
--

INSERT INTO `laundry_kategori` (`id`, `kategori`) VALUES
(1, 'Baju');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_login`
--

CREATE TABLE `laundry_login` (
  `id` int(11) NOT NULL,
  `kode_user` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_login`
--

INSERT INTO `laundry_login` (`id`, `kode_user`, `username`, `password`, `dt_create`) VALUES
(1, 'Usr000001', 'owner01', '0bd60a241f617a57580722d31dbcfa98', '2020-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_pakaian`
--

CREATE TABLE `laundry_pakaian` (
  `id` int(11) NOT NULL,
  `kd_pakaian` varchar(20) NOT NULL,
  `nm_pakaian` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL,
  `foto_pakaian` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `dt_create` date NOT NULL,
  `kode_user` varchar(20) NOT NULL,
  `dt_last_trans` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_pakaian`
--

INSERT INTO `laundry_pakaian` (`id`, `kd_pakaian`, `nm_pakaian`, `kategori`, `foto_pakaian`, `keterangan`, `dt_create`, `kode_user`, `dt_last_trans`) VALUES
(1, 'Pak000001', 'Baju Merah Cewek', 1, '16025732450928075530466388053877.jpg', 'Baju Merah Cewek', '2020-11-07', 'Usr000001', '2020-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_tmp`
--

CREATE TABLE `laundry_tmp` (
  `id` int(11) NOT NULL,
  `kd_tmp_transaksi` varchar(20) NOT NULL,
  `kd_pakaian` varchar(20) NOT NULL,
  `kode_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laundry_transaksi`
--

CREATE TABLE `laundry_transaksi` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `laundry` varchar(50) NOT NULL,
  `almt_laundry` varchar(255) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `kode_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_transaksi`
--

INSERT INTO `laundry_transaksi` (`id`, `kd_transaksi`, `tgl_transaksi`, `laundry`, `almt_laundry`, `pic`, `kode_user`) VALUES
(1, 'TRS000001', '2020-11-07', 'LaundryKu', 'Jalan Kenanga 14 Surakarta', 'Aku', 'Usr000001');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_transaksi_detail`
--

CREATE TABLE `laundry_transaksi_detail` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(20) NOT NULL,
  `kd_pakaian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_transaksi_detail`
--

INSERT INTO `laundry_transaksi_detail` (`id`, `kd_transaksi`, `kd_pakaian`) VALUES
(1, 'TRS000001', 'Pak000001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laundry_kategori`
--
ALTER TABLE `laundry_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_login`
--
ALTER TABLE `laundry_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_pakaian`
--
ALTER TABLE `laundry_pakaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_tmp`
--
ALTER TABLE `laundry_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_transaksi`
--
ALTER TABLE `laundry_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_transaksi_detail`
--
ALTER TABLE `laundry_transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laundry_kategori`
--
ALTER TABLE `laundry_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laundry_login`
--
ALTER TABLE `laundry_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laundry_pakaian`
--
ALTER TABLE `laundry_pakaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laundry_tmp`
--
ALTER TABLE `laundry_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laundry_transaksi`
--
ALTER TABLE `laundry_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laundry_transaksi_detail`
--
ALTER TABLE `laundry_transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

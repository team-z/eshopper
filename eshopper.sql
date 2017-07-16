-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 03:04 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(9) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `no_hp` int(14) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `nama_user`, `password`, `tempat_lahir`, `tanggal_lahir`, `alamat_lengkap`, `no_hp`, `no_telepon`, `email`, `image`) VALUES
(2, 'admin', 'admin', 'admin', 'admin', '2017-06-13', 'admin', 812345678, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(9) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_barang` varchar(25) NOT NULL,
  `discount` int(4) NOT NULL,
  `spesifikasi` text NOT NULL,
  `suplier` varchar(20) NOT NULL,
  `alamat_suplier` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori`, `qty`, `harga_barang`, `discount`, `spesifikasi`, `suplier`, `alamat_suplier`, `image`) VALUES
(11, 'karma adi Wacther Arlogi', 'jam tangan', 10, '100', 50, 'keren', 'arpadiaga', 'Bandung', 'f1.jpg'),
(13, 'Blue velvet arlogi watch', 'jam tangan', 20, '150', 50, 'unik banget', 'bisma armada', 'jakarta', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(9) NOT NULL,
  `nama_pembeli` varchar(80) NOT NULL,
  `barang_pembeli` varchar(50) NOT NULL,
  `qty_pembeli` int(50) NOT NULL,
  `total_harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nama_pembeli`, `barang_pembeli`, `qty_pembeli`, `total_harga`) VALUES
(1, 'yofandi', 'Blue velvet arlogi watch', 1, 150),
(2, 'kornelius', 'Blue velvet arlogi watch', 1, 150),
(3, 'sabdari', 'Blue velvet arlogi watch', 2, 300);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_transaksi` int(9) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kabupaten_kota` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kodepos` int(7) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_transaksi`, `provinsi`, `kabupaten_kota`, `kecamatan`, `kodepos`, `alamat_lengkap`, `tanggal`) VALUES
(12, 'Jawa Timur', 'Lumajang', 'Yosowilangun', 67382, 'tunjungrejo RT03 RW05', '2017-01-24'),
(13, 'Jawa Timur', 'Lumajang', 'Yosowilangun', 67382, 'tunjungrejo RT01 RW03', '2017-02-14'),
(14, 'Jawa Timur', 'Lumajang', 'Yosowilangun', 67382, 'tunjungrejo RT01 RW02', '2017-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(9) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `barang_beli` varchar(100) NOT NULL,
  `total_beli` varchar(200) NOT NULL,
  `qty_beli` int(100) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `kode_vertifikasi` varchar(9) NOT NULL,
  `status` varchar(8) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_pelanggan`, `email_pelanggan`, `no_hp`, `barang_beli`, `total_beli`, `qty_beli`, `no_rekening`, `kode_vertifikasi`, `status`, `tanggal_transaksi`) VALUES
(12, 'yofandi', 'yofandi@example.com', '37294290202', 'Blue velvet arlogi watch', '150', 1, '73593759375377335353', 'yswl00001', 'DONE', '2017-01-24'),
(13, 'kornelius', 'kornelius@example.com', '1014989438', 'Blue velvet arlogi watch', '100', 1, '394104848482040247', 'yswl00002', 'PENDING', '2017-02-14'),
(14, 'sabdari', 'sabdari@example.com', '494395278486', 'Blue velvet arlogi watch', '300', 2, '42492', 'yswl00003', 'DONE', '2017-03-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_transaksi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

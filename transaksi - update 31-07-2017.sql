-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jul 2017 pada 09.45
-- Versi Server: 10.1.19-MariaDB
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
-- Struktur dari tabel `transaksi`
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
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_pelanggan`, `email_pelanggan`, `no_hp`, `barang_beli`, `total_beli`, `qty_beli`, `no_rekening`, `kode_vertifikasi`, `status`, `tanggal_transaksi`) VALUES
(12, 'yofandi', 'yofandi@example.com', '37294290202', 'Blue velvet arlogi watch', '150', 1, '73593759375377335353', 'yswl00001', 'DONE', '2017-01-24'),
(13, 'kornelius', 'kornelius@example.com', '1014989438', 'Blue velvet arlogi watch', '100', 1, '394104848482040247', 'yswl00002', 'PENDING', '2017-02-14'),
(14, 'sabdari', 'sabdari@example.com', '494395278486', 'Blue velvet arlogi watch', '300', 2, '42492', 'yswl00003', 'DONE', '2017-03-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

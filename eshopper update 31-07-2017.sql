-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 08:00 AM
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
(13, 'Blue velvet arlogi watch', 'jam tangan', 20, '150', 50, 'unik banget', 'bisma armada aka', 'jakarta', '21.jpg'),
(14, 'celana sobek sobek', 'Celana', 20, '1000000', 0, 'kainnya sobek', 'sobek.co', 'gatau', 'ckey-celana-panjang-wanita-boyfriend-ripped-jeans-710-sobek-tidaktembus-kulit-1490055755-09790851-ccee71c940340c608b3a395c3bdcc288-catalog_233.jpg'),
(15, 'Baju Biru', 'Baju', 15, '500000', 0, 'kain biru', 'baju.co', 'gatau', '107403502.jpg'),
(16, 'baju biru tua', 'Baju', 12, '100000', 0, '', 'baju.co', 'gatau', '1473012160372349548.jpg'),
(17, 'Topeng Badut', 'Topeng', 77, '50000', 0, 'topeng badut lucu', 'topeng.co', 'unknown', '10pc-lot-Clown-Hip-hop-Party-Simle-Face-Mask-Lovely-Clown-Mask.jpg'),
(18, 'Topeng Starwars', 'Topeng', 13, '50000', 0, 'topeng asli', 'topeng.co', 'unknown', '18047317_B.png'),
(19, 'Tas Antik', 'Tas', 12, '100000', 0, '', 'tas.co', 'yoso', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Celana'),
(2, 'Baju'),
(3, 'Topeng'),
(4, 'Tas');

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
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(9) NOT NULL,
  `id_transaksi` int(9) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `qty_pesanan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_transaksi`, `nama_barang`, `qty_pesanan`, `total_harga`, `sub_total`, `tanggal_transaksi`) VALUES
(1, 12, 'Blue velvet arlogi watch', 1, 150, 150, '2017-01-24'),
(2, 13, 'Blue velvet arlogi watch', 1, 100, 100, '2017-02-09'),
(3, 14, 'Blue velvet arlogi watch', 2, 300, 300, '2017-03-31'),
(4, 12, 'dhjadya', 2, 200, 200, '2017-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(9) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `bank` varchar(80) NOT NULL,
  `kode_vertifikasi` varchar(9) NOT NULL,
  `status` varchar(8) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_pelanggan`, `email_pelanggan`, `no_hp`, `no_rekening`, `bank`, `kode_vertifikasi`, `status`, `tanggal_transaksi`) VALUES
(12, 'yofandi', 'yofandi@example.com', '37294290202', '73593759375377335353', 'BRI', 'yswl00001', 'DONE', '2017-01-23 17:00:00'),
(13, 'kornelius', 'kornelius@example.com', '1014989438', '394104848482040247', 'BCA', 'yswl00002', 'PENDING', '2017-02-13 17:00:00'),
(14, 'sabdari', 'sabdari@example.com', '494395278486', '42492', 'DANAMON', 'yswl00003', 'DONE', '2017-03-08 17:00:00');

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
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

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
  MODIFY `id_barang` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_transaksi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 03:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_petsqu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `total_harga` int(6) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_pengguna`, `total_harga`, `tanggal_pemesanan`) VALUES
(1, 6, 125000, '2022-06-30 21:41:30'),
(2, 6, 95000, '2022-06-30 21:52:15'),
(3, 7, 45000, '2022-07-01 09:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `alamat`, `no_hp`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'Tangerang', 81234567, 'admin@gmail.com', '123', 'admin'),
(2, 'Trian', 'Tangerang', 81223344, 'trian@gmail.com', '123', 'user'),
(3, 'Diwandanu', 'Depok', 813452312, 'diwandanu@gmail.com', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(3) NOT NULL,
  `nama_produk` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_produk` int(6) NOT NULL,
  `foto_produk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga_produk`, `foto_produk`) VALUES
(1, 'Whiskas', 'Whiskas adalah salah satu merek makanan kucing. Whiskas dimiliki oleh perusahaan besar bernama Mars, Inc . Ciri khas dari merek ini adalah kemasannya yang selalu berwarna ungu dengan gambar kucing bulu pendek britania. Whiskas diproduksi menggunakan bahan - bahan pilihan seperti daging sapi, daging unggas, ikan, sayuran, sereal (beras, dll ), jeroan, vitamin, dan mineral', 50000, 'whiskas.jpg'),
(3, 'Excel', 'Excel Excellent Cat Food untuk kucing dewasa/adult. Untuk pertumbuhan dan berat badan,kekebalan tubuh (immune system), kesehatan pencernaan, nutrisi lengkap dan seimbang, mengandung vitamin & mineral seimbang', 40000, 'excel.jpg'),
(4, 'Felibite', 'Hi-Calcium; diperkaya dengan susu tinggi kalsium untuk mendukung pertumbuhan tulang serta mendukung proses laktasi pada induk.\r\nImmune Support; diperkaya vit. C dan Beta Glucan untuk meningkatkan kekebalan tubuh\r\nHi-Protein; untuk pertumbuhan dan kesehatan reproduksi Yucca Extract; untuk mengurangi bau kotoran', 45000, 'felibite.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_pemesanan`
--

CREATE TABLE `tb_sub_pemesanan` (
  `id_sub` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_produk` int(3) NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_pemesanan`
--

INSERT INTO `tb_sub_pemesanan` (`id_sub`, `id_pemesanan`, `id_produk`, `jumlah`) VALUES
(1, 1, 4, 1),
(2, 1, 3, 2),
(3, 2, 4, 1),
(4, 2, 1, 1),
(5, 3, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_sub_pemesanan`
--
ALTER TABLE `tb_sub_pemesanan`
  ADD PRIMARY KEY (`id_sub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_sub_pemesanan`
--
ALTER TABLE `tb_sub_pemesanan`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

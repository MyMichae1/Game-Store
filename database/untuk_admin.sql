-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 03:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `untuk_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id`, `nama_depan`, `nama_belakang`, `username`, `email`, `password`) VALUES
(1, 'danil', 'elsa', 'danilmaroy', 'danilmaroon201@gmail.com', 'gwadminnya');

-- --------------------------------------------------------

--
-- Table structure for table `akun_user`
--

CREATE TABLE `akun_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `membership` tinyint(1) NOT NULL DEFAULT 0,
  `waktu_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_user`
--

INSERT INTO `akun_user` (`id`, `username`, `membership`, `waktu_dibuat`) VALUES
(1, 'danilmarontt', 0, '2024-11-28 19:55:11'),
(3, 'minalsannnn', 1, '2024-11-28 20:50:46'),
(5, 'ajamasihh', 0, '2024-12-01 03:50:38'),
(6, 'scyllaGV', 0, '2024-12-01 18:26:10'),
(7, 'pakharyadi1', 1, '2024-12-03 01:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_verifikasi`
--

CREATE TABLE `pembayaran_verifikasi` (
  `id` int(11) NOT NULL,
  `nomor_transaksi` varchar(50) DEFAULT NULL,
  `nama_game` varchar(100) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `tanggal_beli` datetime DEFAULT NULL,
  `diskon` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran_verifikasi`
--

INSERT INTO `pembayaran_verifikasi` (`id`, `nomor_transaksi`, `nama_game`, `harga`, `total_harga`, `tanggal_beli`, `diskon`) VALUES
(1, 'TRX-674e62264c684', 'Angry Bird', 64000.00, 69000.00, '2024-12-03 08:43:42', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tambah_game`
--

CREATE TABLE `tambah_game` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL CHECK (`rating` >= 0 and `rating` <= 10),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tambah_game`
--

INSERT INTO `tambah_game` (`id`, `nama`, `harga`, `genre`, `rating`, `image`) VALUES
(1, 'Angry Bird', 51200.00, 'Action', 3.9, 'img/new7.png'),
(2, 'Minecrafto', 97376.00, 'Action', 4.2, 'img/new5.png'),
(5, 'Nguwawor', 5000000.00, 'Action', 4.4, 'img/img16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_user`
--

CREATE TABLE `transaksi_user` (
  `id` int(11) NOT NULL,
  `nomor_transaksi` varchar(50) NOT NULL,
  `nama_game` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `tanggal_beli` timestamp NOT NULL DEFAULT current_timestamp(),
  `diskon` decimal(10,2) DEFAULT 0.00,
  `status` enum('pending','success','canceled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_user`
--

INSERT INTO `transaksi_user` (`id`, `nomor_transaksi`, `nama_game`, `harga`, `total_harga`, `tanggal_beli`, `diskon`, `status`) VALUES
(1, 'TRX-674e62264c684', 'Angry Bird', 64000.00, 69000.00, '2024-12-03 01:43:42', 0.00, 'success');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pembayaran_verifikasi`
--
ALTER TABLE `pembayaran_verifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tambah_game`
--
ALTER TABLE `tambah_game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_user`
--
ALTER TABLE `transaksi_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akun_user`
--
ALTER TABLE `akun_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran_verifikasi`
--
ALTER TABLE `pembayaran_verifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tambah_game`
--
ALTER TABLE `tambah_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi_user`
--
ALTER TABLE `transaksi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

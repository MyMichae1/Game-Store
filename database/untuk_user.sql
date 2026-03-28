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
-- Database: `untuk_user`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_riwayat_transaksi` (IN `p_nomor_transaksi` VARCHAR(50), IN `p_pembelian` TEXT, IN `p_total_pembelian` DECIMAL(10,2))   BEGIN
    DECLARE game_name VARCHAR(100);
    DECLARE game_price DECIMAL(10, 2);
    
    -- Insert ke tabel riwayat_transaksi
    INSERT INTO riwayat_transaksi (nomor_transaksi, pembelian, total_pembelian)
    VALUES (p_nomor_transaksi, p_pembelian, p_total_pembelian);
    
    -- Ambil data dari JSON
    SET game_name = JSON_UNQUOTE(JSON_EXTRACT(p_pembelian, '$.nama_game'));
    SET game_price = JSON_UNQUOTE(JSON_EXTRACT(p_pembelian, '$.harga'));

    -- Insert ke tabel transaksi_user di database untuk_admin
    INSERT INTO untuk_admin.transaksi_user (nomor_transaksi, nama_game, harga, total_harga)
    VALUES (p_nomor_transaksi, game_name, game_price, p_total_pembelian);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `informasi_user`
--

CREATE TABLE `informasi_user` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `membership` tinyint(1) NOT NULL DEFAULT 0,
  `waktu_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi_user`
--

INSERT INTO `informasi_user` (`id`, `nama_depan`, `nama_belakang`, `username`, `email`, `password`, `membership`, `waktu_dibuat`) VALUES
(1, 'danil', 'maronn', 'danilmarontt', 'danilmaroon21@gmail.com', 'makanayam', 1, '2024-11-28 19:55:11'),
(5, 'mina', 'elsa', 'minalsannnn', 'minaelsase23@gmail.com', 'makantahu1', 1, '2024-11-28 20:50:46'),
(7, 'ajaa', 'masih', 'ajamasihh', 'ajamasihh45@gmail.com', 'nyobasih', 1, '2024-12-01 03:50:38'),
(8, 'gavriel', 'christian', 'scyllaGV', 'yubu@gmail.com', '112233', 0, '2024-12-01 18:26:10'),
(9, 'Pak', 'Haryadi', 'pakharyadi1', 'pakharyadi12@gmail.com', 'tespw', 1, '2024-12-03 01:37:59');

--
-- Triggers `informasi_user`
--
DELIMITER $$
CREATE TRIGGER `after_insert_informasi_user` AFTER INSERT ON `informasi_user` FOR EACH ROW BEGIN
    INSERT INTO untuk_admin.akun_user (username, waktu_dibuat)
    VALUES (NEW.username, NEW.waktu_dibuat);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_membership_in_akun_user` AFTER UPDATE ON `informasi_user` FOR EACH ROW BEGIN
    IF NEW.membership <> OLD.membership THEN
        UPDATE untuk_admin.akun_user
        SET membership = NEW.membership
        WHERE username = NEW.username;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id` int(11) NOT NULL,
  `nomor_transaksi` varchar(50) NOT NULL,
  `pembelian` text NOT NULL,
  `total_pembelian` decimal(10,2) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_pembayaran` enum('pending','success','canceled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_transaksi`
--

INSERT INTO `riwayat_transaksi` (`id`, `nomor_transaksi`, `pembelian`, `total_pembelian`, `tanggal`, `status_pembayaran`) VALUES
(1, 'TRX-674e62264c684', '{\"nama_game\":\"Angry Bird\",\"harga_game\":64000,\"nama_membership\":null,\"harga_membership\":null,\"diskon\":0,\"biaya_admin_game\":5000,\"biaya_admin_membership\":0}', 69000.00, '2024-12-03 01:43:42', 'success'),
(2, 'TRX-674e65d2984a8', '{\"nama_game\":null,\"harga_game\":null,\"nama_membership\":\"Premium\",\"harga_membership\":2399000,\"diskon\":0,\"biaya_admin_game\":0,\"biaya_admin_membership\":0}', 2399000.00, '2024-12-03 01:58:56', 'pending');

--
-- Triggers `riwayat_transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_total_harga` AFTER UPDATE ON `riwayat_transaksi` FOR EACH ROW BEGIN
    IF NEW.total_pembelian IS NOT NULL AND NEW.total_pembelian > 0 THEN
        UPDATE untuk_admin.transaksi_user
        SET total_harga = NEW.total_pembelian
        WHERE nomor_transaksi = NEW.nomor_transaksi;
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informasi_user`
--
ALTER TABLE `informasi_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi_user`
--
ALTER TABLE `informasi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

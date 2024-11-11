-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 06:57 PM
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
-- Database: `cico_zahir`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `kodeAkun` char(11) NOT NULL,
  `codeUser` char(6) NOT NULL,
  `namaAkun` varchar(30) NOT NULL,
  `tipeAkun` varchar(15) NOT NULL,
  `saldoAkun` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`kodeAkun`, `codeUser`, `namaAkun`, `tipeAkun`, `saldoAkun`, `created_at`) VALUES
('CA01-US0001', 'US0001', 'Hilman Ramdoni', 'BCA', 199400, '2024-10-24 01:15:01'),
('CA01-US0002', 'US0002', 'Hilman', 'BCA', 2050000, '2024-10-24 01:14:13'),
('CA01-US0003', 'US0003', 'Ramdoni', 'BNI', 0, '2024-10-24 01:30:00'),
('CA02-US0001', 'US0001', 'Hilman Ramdoni', 'Mandiri', 20175600, '2024-11-10 15:49:11'),
('CA02-US0002', 'US0002', 'Hilman', 'BNI', 1700000, '2024-10-24 01:14:41'),
('CA02-US0003', 'US0003', 'Ramdoni', 'Mandiri', 0, '2024-10-24 01:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `codeKat` char(11) NOT NULL,
  `codeUser` char(6) NOT NULL,
  `namaKat` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`codeKat`, `codeUser`, `namaKat`, `created_at`) VALUES
('KA01-US0001', 'US0001', 'Konsumsi', '2024-10-24 01:21:45'),
('KA01-US0002', 'US0002', 'Alat Tulis Kantor', '2024-10-24 01:22:05'),
('KA01-US0003', 'US0003', 'Usaha', '2024-10-24 01:31:35'),
('KA02-US0001', 'US0001', 'Transportasi', '2024-10-24 01:21:48'),
('KA02-US0002', 'US0002', 'Konsumsi', '2024-10-24 01:22:09'),
('KA03-US0001', 'US0001', 'Transfer', '2024-11-12 00:52:16'),
('KA03-US0002', 'US0002', 'Kebutuhan Primer', '2024-10-24 01:22:46'),
('KA04-US0002', 'US0002', 'Gaji Bulanan', '2024-10-24 01:22:50'),
('KA05-US0002', 'US0002', 'Transfer', '2024-11-12 00:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `nomorTransaksi` char(13) NOT NULL,
  `codeUser` char(6) NOT NULL,
  `tglTransaksi` datetime NOT NULL,
  `kodeAkun` char(11) NOT NULL,
  `codeKat` char(11) NOT NULL,
  `tipeTransaksi` varchar(15) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `idTransfer` char(13) NOT NULL,
  `codeUser` char(6) NOT NULL,
  `sumberAkun` char(11) NOT NULL,
  `tujuanAkun` char(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `tglTransfer` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `codeUser` char(6) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`codeUser`, `nama`, `email`, `username`, `password`, `image`, `created_at`) VALUES
('US0001', 'Hilman Ramdoni', 'hilmandoni@gmail.com', 'hilmandoni', '$2y$10$lf2tryOnvv3OIly/fRIkFePtKpIC5CsKOlx1.N6Eiuw6oL0lbSwsi', 'default.jpg', '2024-10-24 00:14:02'),
('US0002', 'Hilmansss', 'doni21@gmail.com', 'hilman', '$2y$10$EjCk3AZ2TabCqEdA4dL6p./bD/Zd05DR5jPblFlV7SoUevhqlHeyq', 'default.jpg', '2024-10-24 00:35:52'),
('US0003', 'Ramdoni', 'doni@gmail.com', 'ramdoni', '$2y$10$mOJrdBDctm.4.unsCaiHdeC4w8YMYGVwwQj6te2AmJ9a82Jv6DP1m', 'default.jpg', '2024-10-24 01:29:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kodeAkun`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`codeKat`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`nomorTransaksi`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`idTransfer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`codeUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

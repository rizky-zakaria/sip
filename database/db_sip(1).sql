-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2021 at 11:54 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_arsip`
--

CREATE TABLE `tb_arsip` (
  `id` int NOT NULL,
  `arsip` varchar(255) NOT NULL,
  `nomor_arsip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_pemilik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_arsip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_arsip`
--

INSERT INTO `tb_arsip` (`id`, `arsip`, `nomor_arsip`, `nama_pemilik`, `jenis_arsip`, `keterangan`) VALUES
(8, 'ikic6a848d5-4059-4950-8b1b-87877dd9aaf9.pdf', 'c444a0bc-d583-409b-b445-bb27c2439811', 'iki', 'iki', 'iki');

-- --------------------------------------------------------

--
-- Table structure for table `tb_biodata`
--

CREATE TABLE `tb_biodata` (
  `id_biodata` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempta_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `pekerjan` varchar(255) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_biodata`
--

INSERT INTO `tb_biodata` (`id_biodata`, `nama`, `tempta_lahir`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `pekerjan`, `no_hp`, `email`, `id_user`) VALUES
(1, 'iki', '2000-02-09', 'iki', 'k', 'k', 'k', '098', 'lk', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_peminjaman` int NOT NULL,
  `id_peminjam` int NOT NULL,
  `id_arsip` int NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_peminjaman`, `id_peminjam`, `id_arsip`, `status`) VALUES
(1, 5, 8, 'disetujui'),
(2, 5, 8, 'diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 2),
(4, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 3),
(5, 'iki', '71fd94a0d995244544c153158bbbefc5', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_arsip`
--
ALTER TABLE `tb_arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_biodata`
--
ALTER TABLE `tb_biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `tb_user` (`id_user`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `tb_peminjam` (`id_peminjam`),
  ADD KEY `tb_arsip` (`id_arsip`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_arsip`
--
ALTER TABLE `tb_arsip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_biodata`
--
ALTER TABLE `tb_biodata`
  MODIFY `id_biodata` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_biodata`
--
ALTER TABLE `tb_biodata`
  ADD CONSTRAINT `tb_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD CONSTRAINT `tb_arsip` FOREIGN KEY (`id_arsip`) REFERENCES `tb_arsip` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tb_peminjam` FOREIGN KEY (`id_peminjam`) REFERENCES `tb_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

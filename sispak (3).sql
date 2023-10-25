-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2022 at 01:00 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot`
--

CREATE TABLE `tb_bobot` (
  `id_bobot` int(5) NOT NULL,
  `nilai_bobot` double DEFAULT NULL,
  `status_bobot` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tb_bobot`
--

INSERT INTO `tb_bobot` (`id_bobot`, `nilai_bobot`, `status_bobot`) VALUES
(1, 1, 'Tidak Sesuai'),
(2, 2, 'Sesuai'),
(3, 3, 'Sangat Sesuai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diagnosis`
--

CREATE TABLE `tb_diagnosis` (
  `id_diagnosis` int(5) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_kategori` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tb_diagnosis`
--

INSERT INTO `tb_diagnosis` (`id_diagnosis`, `nama`, `email`, `id_kategori`) VALUES
(1, 'bambang', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(5) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Property'),
(2, 'Reksadana'),
(3, 'Saham'),
(4, 'Emas'),
(5, 'Pasar Uang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `kriteria` varchar(255) DEFAULT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `kriteria`, `pertanyaan`) VALUES
(1, 'Usia', 'Berapakah Usia Kamu Saat Ini ?'),
(2, 'Pendidikan', 'Apakah Pendidikan Terakhir Anda ?'),
(3, 'Penghasilan Tiap Bulan', 'Berapakan Penghasilan Anda Setiap Bulan ?'),
(4, 'Bisa Invenstasi Tiap Bulan', 'Berapa Banyak Anda Bisa Investasi Setiap Bulan ?'),
(5, 'Dana Darurat', 'Berapakah Dana Darurat Yang Anda Miliki Saat Ini?'),
(6, 'Investasi Yang Penting', 'Apakah Pentingnya Investasi Bagi Anda ?'),
(7, 'Lama Investasi', 'Berapa Lama Jangka Waktu Yang Anda Inginkan Untuk Berinvestasi ?'),
(8, 'Cemas Jika Dalam 1 Th Mengalami Kerugian', 'Anda Cemas Jika Dalam 1 Tahun Mengalami Kerugian Sebesar ?'),
(9, 'Jika Memilih', 'Kemungkinan Yang Terjadi Pada Saat Berinvestasi ?'),
(10, 'Jika 6 Bulan Rugi 20% Saya Akan', 'Apa Yang Anda Lakukan Jika Dalam Waktu 6 Bulan Terdapat Kerugian Sebesar 20% ?');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengetahuan`
--

CREATE TABLE `tb_pengetahuan` (
  `id_pengetahuan` int(5) NOT NULL,
  `gejala_1` int(5) DEFAULT NULL,
  `gejala_2` int(5) DEFAULT NULL,
  `gejala_3` int(5) DEFAULT NULL,
  `gejala_4` int(5) DEFAULT NULL,
  `gejala_5` int(5) DEFAULT NULL,
  `gejala_6` int(5) DEFAULT NULL,
  `gejala_7` int(5) DEFAULT NULL,
  `gejala_8` int(5) DEFAULT NULL,
  `gejala_9` int(5) DEFAULT NULL,
  `gejala_10` int(5) DEFAULT NULL,
  `hasil` double DEFAULT NULL,
  `id_kategori` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tb_pengetahuan`
--

INSERT INTO `tb_pengetahuan` (`id_pengetahuan`, `gejala_1`, `gejala_2`, `gejala_3`, `gejala_4`, `gejala_5`, `gejala_6`, `gejala_7`, `gejala_8`, `gejala_9`, `gejala_10`, `hasil`, `id_kategori`) VALUES
(63, 4, 10, 14, 21, 25, 28, 32, 36, 38, 40, 7.2801098892805, 3),
(64, 2, 11, 15, 21, 23, 27, 31, 35, 38, 41, 7.1414284285429, 3),
(65, 4, 10, 16, 19, 24, 28, 32, 36, 38, 40, 6.9282032302755, 3),
(66, 4, 10, 14, 20, 25, 28, 33, 35, 38, 41, 7.5498344352707, 3),
(67, 4, 8, 15, 19, 22, 27, 31, 34, 37, 40, 4.8989794855664, 2),
(68, 6, 9, 13, 18, 23, 27, 30, 35, 37, 39, 4.4721359549996, 2),
(69, 5, 8, 13, 18, 23, 28, 31, 34, 38, 40, 4.2426406871193, 2),
(70, 2, 7, 13, 17, 24, 27, 32, 34, 38, 39, 4.2426406871193, 2),
(71, 3, 8, 14, 19, 23, 26, 33, 35, 37, 40, 6.4807406984079, 4),
(72, 4, 9, 15, 19, 23, 27, 32, 34, 37, 40, 5.744562646538, 4),
(73, 5, 8, 13, 17, 22, 27, 33, 36, 37, 41, 6.7082039324994, 4),
(74, 4, 8, 14, 18, 25, 26, 31, 35, 37, 40, 5.9160797830996, 4),
(75, 5, 10, 15, 20, 24, 28, 32, 34, 37, 40, 6.2449979983984, 1),
(76, 4, 10, 14, 19, 23, 28, 31, 35, 37, 41, 5.56776436283, 1),
(77, 4, 10, 15, 19, 23, 27, 32, 35, 38, 40, 5.2915026221292, 1),
(78, 4, 11, 14, 18, 25, 27, 32, 34, 38, 40, 5.8309518948453, 1),
(79, 3, 9, 13, 17, 22, 27, 29, 34, 37, 39, 5.1961524227066, 5),
(80, 4, 8, 13, 18, 23, 26, 30, 34, 37, 39, 5.2915026221292, 5),
(81, 3, 7, 13, 18, 22, 26, 29, 35, 37, 40, 5.9160797830996, 5),
(82, 4, 8, 14, 19, 22, 27, 29, 34, 37, 39, 4.5825756949558, 5),
(87, 3, 9, 13, 19, 22, 27, 30, 35, 37, 40, 2, 2),
(88, 3, 8, 13, 17, 22, 27, 33, 36, 37, 40, 1.4142135623731, 4),
(89, 3, 9, 14, 19, 25, 26, 31, 36, 37, 40, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rule`
--

CREATE TABLE `tb_rule` (
  `id_rule` int(5) NOT NULL,
  `kode_rule` varchar(255) NOT NULL,
  `id_kategori` int(5) DEFAULT NULL,
  `n_gejala_1` double DEFAULT NULL,
  `n_gejala_2` double DEFAULT NULL,
  `n_gejala_3` double DEFAULT NULL,
  `n_gejala_4` double DEFAULT NULL,
  `n_gejala_5` double DEFAULT NULL,
  `n_gejala_6` double DEFAULT NULL,
  `n_gejala_7` double DEFAULT NULL,
  `n_gejala_8` double DEFAULT NULL,
  `n_gejala_9` double DEFAULT NULL,
  `n_gejala_10` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tb_rule`
--

INSERT INTO `tb_rule` (`id_rule`, `kode_rule`, `id_kategori`, `n_gejala_1`, `n_gejala_2`, `n_gejala_3`, `n_gejala_4`, `n_gejala_5`, `n_gejala_6`, `n_gejala_7`, `n_gejala_8`, `n_gejala_9`, `n_gejala_10`) VALUES
(5, 'R05', 4, 2, 8, 12, 18, 22, 26, 30, 35, 38, 40),
(10, 'R02', 3, 3, 8, 13, 18, 24, 26, 30, 35, 37, 41),
(11, 'R01', 2, 6, 8, 12, 17, 22, 28, 30, 34, 37, 39),
(12, 'R03', 1, 4, 8, 12, 18, 23, 27, 31, 35, 38, 40),
(13, 'R04', 5, 4, 9, 14, 17, 24, 28, 30, 35, 38, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tb_skala`
--

CREATE TABLE `tb_skala` (
  `id_skala` int(5) NOT NULL,
  `nilai_skala` double DEFAULT NULL,
  `status_skala` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tb_skala`
--

INSERT INTO `tb_skala` (`id_skala`, `nilai_skala`, `status_skala`) VALUES
(1, 1, 'Tidak Tahu'),
(2, 2, 'Sedikit Yakin'),
(3, 3, 'Cukup'),
(4, 4, 'Yakin'),
(5, 5, 'Sangat Yakin'),
(6, 0, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kriteria`
--

CREATE TABLE `tb_sub_kriteria` (
  `id_sub_kriteria` int(5) NOT NULL,
  `id_kriteria` int(5) DEFAULT NULL,
  `sub_kriteria` varchar(255) DEFAULT NULL,
  `id_skala` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tb_sub_kriteria`
--

INSERT INTO `tb_sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `sub_kriteria`, `id_skala`) VALUES
(2, 1, '18 Tahun', 3),
(3, 1, '19 Tahun - 21 Tahun', 3),
(4, 1, '22 Tahun - 24 Tahun', 2),
(5, 1, '25 Tahun - 27 Tahun', 2),
(6, 1, '27 Tahun Ke Atas', 2),
(7, 2, 'SD', 1),
(8, 2, 'SMP', 2),
(9, 2, 'SMA', 3),
(10, 2, 'S1/Diploma', 4),
(11, 2, 'S1/S2', 5),
(12, 3, '1,5 Juta', 1),
(13, 3, '1,5 Juta - 2,5 Juta', 2),
(14, 3, '2,5 Juta - 3,5 Juta', 3),
(15, 3, '3,5 Juta - 4,5 Juta', 4),
(16, 3, '4,5 Juta Lebih', 5),
(17, 4, 'Kurang Dari 500 Ribu', 1),
(18, 4, '500 Ribu - 1 Juta', 2),
(19, 4, '1 Juta - 1,5 Juta', 3),
(20, 4, '1,5 Juta - 2 Juta', 4),
(21, 4, '2 Juta Atau Lebih', 5),
(22, 5, 'Kurang Dari 1 Bulan Biaya Hidup', 2),
(23, 5, '1-2 Bulan Biaya Hidup', 3),
(24, 5, '2-3 Bulan Biaya Hidup', 4),
(25, 5, 'Lebih Dari 3 Bulan Biaya Hidup', 5),
(26, 6, 'Menghindari Kerugian', 1),
(27, 6, 'Menyeimbangkan Resiko', 2),
(28, 6, 'Maksimalkan Keuntungan', 3),
(29, 7, 'Kurang Dari 1 Bulan', 1),
(30, 7, '1 Bulan - 12 Bulan', 2),
(31, 7, '1 Tahun - 3 Tahun', 3),
(32, 7, '3 Bulan - 5 Bulan', 4),
(33, 7, '5 Tahun Atau Lebih', 5),
(34, 8, '(-5%)', 3),
(35, 8, '(-5%) - (-25%)', 4),
(36, 8, 'lebih (-25%)', 5),
(37, 9, 'Pasti Dapat 1 Juta', 1),
(38, 9, 'Kemungkinan 50% Dapat 5 Juta', 2),
(39, 10, 'Tarik Semua ', 3),
(40, 10, 'Tahan Dulu', 4),
(41, 10, 'Investasi Lagi', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_temp`
--

CREATE TABLE `tb_temp` (
  `id_temp` int(5) NOT NULL,
  `n_temp_1` double DEFAULT NULL,
  `n_temp_2` double DEFAULT NULL,
  `n_temp_3` double DEFAULT NULL,
  `n_temp_4` double DEFAULT NULL,
  `n_temp_5` double DEFAULT NULL,
  `n_temp_6` double DEFAULT NULL,
  `n_temp_7` double DEFAULT NULL,
  `n_temp_8` double DEFAULT NULL,
  `n_temp_9` double DEFAULT NULL,
  `n_temp_10` double DEFAULT NULL,
  `total_temp` double DEFAULT NULL,
  `id_kategori` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `level` enum('Admin','User') DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level`, `nama`, `email`, `username`, `password`, `hash`, `active`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', 'admin', '$2y$10$r.0rR5eYbP7CEY5nBA.lWu3HUT8GnGoUM1ZdKQ5dgR2wHehaBI4Mi', '303ed4c69846ab36c2904d3ba8573050', '1'),
(3, 'Admin', 'sadewo', 'user@gmal.com', 'user', '$2y$10$MyxP4bP5QDMBAEK6WyCYN.fRrZOTcoUl7ShNtnUmV6Osksz6fFfeW', '10a5ab2db37feedfdeaab192ead4ac0e', '1'),
(4, NULL, 'Bambang', 'bambang@gmail.com', 'bambang', '$2y$10$uYTC0Lht0JJ7k4MrtfUkS.YCjSPuUzPGFJ2RpMZqr8I5MdxdJY7Va', '4c27cea8526af8cfee3be5e183ac9605', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `tb_diagnosis`
--
ALTER TABLE `tb_diagnosis`
  ADD PRIMARY KEY (`id_diagnosis`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_pengetahuan`
--
ALTER TABLE `tb_pengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`);

--
-- Indexes for table `tb_rule`
--
ALTER TABLE `tb_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `tb_skala`
--
ALTER TABLE `tb_skala`
  ADD PRIMARY KEY (`id_skala`);

--
-- Indexes for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `tb_temp`
--
ALTER TABLE `tb_temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  MODIFY `id_bobot` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_diagnosis`
--
ALTER TABLE `tb_diagnosis`
  MODIFY `id_diagnosis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pengetahuan`
--
ALTER TABLE `tb_pengetahuan`
  MODIFY `id_pengetahuan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tb_rule`
--
ALTER TABLE `tb_rule`
  MODIFY `id_rule` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_skala`
--
ALTER TABLE `tb_skala`
  MODIFY `id_skala` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  MODIFY `id_sub_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_temp`
--
ALTER TABLE `tb_temp`
  MODIFY `id_temp` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

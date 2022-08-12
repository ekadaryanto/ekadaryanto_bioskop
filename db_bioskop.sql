-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 03:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `kd_admin` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`kd_admin`, `username`, `password`) VALUES
(1, 'eka_daryanto', '1f32aa4c9a1d2ea010adcf2348166a04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bioskop`
--

CREATE TABLE `tb_bioskop` (
  `id` int(5) NOT NULL,
  `kd_bioskop` varchar(5) NOT NULL,
  `nama_bioskop` varchar(50) NOT NULL,
  `alamat_bioskop` text NOT NULL,
  `kota` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bioskop`
--

INSERT INTO `tb_bioskop` (`id`, `kd_bioskop`, `nama_bioskop`, `alamat_bioskop`, `kota`) VALUES
(1, 'CNM', 'CINEMAXX', 'Jl. Veteran No.2, Penanggungan, Klojen, Malang City, East Java 65111', 'Malang'),
(2, 'NSC', 'New Star Cineplex', 'Jl. Tangkuban Perahu No.7, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119', 'Malang'),
(6, 'PIM', 'Palembang Indah Mall', 'Jl. Madyopuro 27/VII RT 4 RW 2 Kec. Kedungkandang Palembang', 'Palembang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_film`
--

CREATE TABLE `tb_film` (
  `id` int(5) NOT NULL,
  `kd_film` varchar(5) NOT NULL,
  `judul_film` varchar(50) NOT NULL,
  `tgl_launch` date NOT NULL,
  `synopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_film`
--

INSERT INTO `tb_film` (`id`, `kd_film`, `judul_film`, `tgl_launch`, `synopsis`) VALUES
(19, 'RW001', 'Run Winner', '2022-07-31', 'Tes'),
(23, 'WY002', 'Away', '2022-07-31', 'Test 1'),
(24, 'KD003', 'Aku Suka Kamu Apa Adanya', '2022-04-26', 'Test 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tayang`
--

CREATE TABLE `tb_tayang` (
  `id` int(5) NOT NULL,
  `kd_tayang` varchar(30) NOT NULL,
  `judul_film` varchar(50) NOT NULL,
  `kd_bioskop` varchar(5) NOT NULL,
  `tgl_waktu_tayang` datetime NOT NULL,
  `jml_kursi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tayang`
--

INSERT INTO `tb_tayang` (`id`, `kd_tayang`, `judul_film`, `kd_bioskop`, `tgl_waktu_tayang`, `jml_kursi`) VALUES
(13, 'PIM120820220805WY00200001', 'WY002', 'PIM', '2022-08-12 08:05:00', 15),
(15, 'NSC120820220807KD00300002', 'KD003', 'NSC', '2022-08-12 08:07:00', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tb_bioskop`
--
ALTER TABLE `tb_bioskop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_film`
--
ALTER TABLE `tb_film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tayang`
--
ALTER TABLE `tb_tayang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `kd_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bioskop`
--
ALTER TABLE `tb_bioskop`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_film`
--
ALTER TABLE `tb_film`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_tayang`
--
ALTER TABLE `tb_tayang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

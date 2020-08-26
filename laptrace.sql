-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 09:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptrace`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id` int(10) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id`, `id_user`, `tanggal`, `nama_user`) VALUES
(1, '1', '2020-05-18 06:58:32', 'aziz'),
(2, '1', '2020-05-18 06:58:32', 'aziz'),
(3, '2', '2020-05-18 06:58:32', 'sin'),
(4, '1', '2020-05-18 06:58:32', 'aziz'),
(5, '1', '2020-05-21 06:59:00', 'aziz'),
(6, '1', '2020-05-21 07:00:01', 'aziz'),
(7, '1', '2020-05-21 07:00:04', 'aziz'),
(8, '1', '2020-05-21 07:00:07', 'aziz'),
(9, '1', '2020-05-21 07:00:09', 'aziz'),
(10, '1', '2020-05-21 07:00:10', 'aziz'),
(11, '1', '2020-05-21 07:00:12', 'aziz'),
(12, '1', '2020-05-21 07:00:14', 'aziz'),
(13, '1', '2020-05-21 07:51:31', 'wedus'),
(14, '1', '2020-05-21 08:14:15', 'sinwedus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil_1`
--

CREATE TABLE `tb_mobil_1` (
  `id` int(11) NOT NULL,
  `lap` int(2) NOT NULL,
  `waktu` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mobil_1`
--

INSERT INTO `tb_mobil_1` (`id`, `lap`, `waktu`) VALUES
(1, 1, 9),
(2, 2, 12),
(3, 1, 3),
(4, 1, 5),
(5, 2, 5),
(6, 3, 10),
(7, 4, 8),
(8, 5, 12),
(9, 1, 3),
(10, 2, 16),
(11, 3, 18),
(12, 4, 2),
(13, 5, 2),
(14, 6, 8),
(15, 1, 7),
(16, 1, 29),
(17, 2, 22),
(18, 3, 46),
(19, 4, 41),
(20, 5, 7),
(21, 1, 13),
(22, 2, 12),
(23, 3, 4),
(24, 4, 43),
(25, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil_2`
--

CREATE TABLE `tb_mobil_2` (
  `id` int(11) NOT NULL,
  `lap` int(2) NOT NULL,
  `waktu` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mobil_2`
--

INSERT INTO `tb_mobil_2` (`id`, `lap`, `waktu`) VALUES
(3, 1, 12),
(4, 2, 12),
(5, 3, 11),
(9, 1, 29),
(10, 2, 18),
(11, 3, 6),
(12, 4, 7),
(13, 5, 5),
(14, 6, 5),
(15, 1, 37),
(16, 2, 7),
(17, 3, 53),
(18, 4, 56),
(19, 5, 16),
(20, 1, 17),
(21, 2, 1),
(22, 3, 9),
(23, 4, 26),
(24, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `Id_user` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto_user` text NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`Id_user`, `username`, `password`, `nama`, `no_hp`, `foto_user`, `alamat`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '082314941337', '', 'Tegal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `Id_user` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nilai_x` varchar(10) NOT NULL,
  `nilai_y` varchar(10) NOT NULL,
  `nilai_w` varchar(10) NOT NULL,
  `nilai_h` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`Id_user`, `nama`, `password`, `nilai_x`, `nilai_y`, `nilai_w`, `nilai_h`) VALUES
(1, 'aziz', 'aziz', '150', '200', '135', '195'),
(4, 'sintia', 'sintia', '132', '165', '182', '146'),
(6, 'abdil', 'abdil', '132', '165', '182', '146');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mobil_1`
--
ALTER TABLE `tb_mobil_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mobil_2`
--
ALTER TABLE `tb_mobil_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`Id_user`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_mobil_1`
--
ALTER TABLE `tb_mobil_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_mobil_2`
--
ALTER TABLE `tb_mobil_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `Id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `Id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

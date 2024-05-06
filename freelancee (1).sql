-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 03:25 AM
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
-- Database: `freelancee`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(11) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_penggalang_dana` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `judul`, `penerima`, `deskripsi`, `gambar`, `id_penggalang_dana`, `waktu`) VALUES
(52, 'sad', 'sad', 'sa', 'anekdot.png', 0, '2024-05-03 21:30:12'),
(68, 'asdasd', 'asd', 'asda', '', 0, '2024-05-03 21:30:12'),
(69, 'sada', 'sdas', 'dasdasd', '', 0, '2024-05-03 21:30:12'),
(75, 'donasi kambing', 'mushola al fadhil', 'butuh kambing 3', '', 34, '2024-05-03 21:30:12'),
(76, 'asd', 'das', 'asda', '', 34, '2024-05-03 21:30:12'),
(77, 'asd', 'sda', 'asd', '', 34, '2024-05-03 21:30:12'),
(79, 'sada', 'asda', 'sdas', '', 34, '2024-05-03 17:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` mediumtext NOT NULL,
  `img` mediumtext NOT NULL,
  `deskripsi` longtext NOT NULL,
  `penulis` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `id_donasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `nama_donatur` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `atm` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `waktu_pembayaran` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `id_donasi`, `id_user`, `no_telp`, `nama_donatur`, `alamat`, `atm`, `nominal`, `waktu_pembayaran`) VALUES
(10, 77, 34, 12132, '1312', '1231', 1231, 23123, '2024-05-03 21:48:14'),
(12, 79, 34, 988, 'kukukaki dan teman', 'kalipecabean', 222, 222, '2024-05-03 17:23:25'),
(13, 79, 34, 1212, '212', '121', 121, 1212, '2024-05-03 18:30:31'),
(14, 79, 37, 12, '12', '121', 2312, 12, '2024-05-05 05:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `telephone` int(11) NOT NULL,
  `level` varchar(5) NOT NULL,
  `address` varchar(200) NOT NULL,
  `photo_profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `telephone`, `level`, `address`, `photo_profile`) VALUES
(34, 'nabil', 'nabil@g.c', '222', 8453122, 'user', 'pecabean', 'asuransi.png'),
(37, 'rokibredet', 'bredetedet@g.c', '111', 2121, 'user', '121', '9088779.jpg'),
(38, 'arga', 'jawa@g.c', 'rajindra', 2147483647, 'user', 'gedangan', 'arga spuber.png'),
(51, 'user', 'ssd@g.c', 'lebihkenceng', 224, 'user', '', ''),
(53, 'admin', 'admin@g.c', '777', 666, 'admin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `whislist`
--

CREATE TABLE `whislist` (
  `id` int(11) NOT NULL,
  `id_donasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `fk_user_donasi` (`id_penggalang_dana`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `iduser_news_user` (`id_user`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_user_payment` (`id_user`),
  ADD KEY `id_donasi_payment` (`id_donasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `whislist`
--
ALTER TABLE `whislist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_donation` (`id_donasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `whislist`
--
ALTER TABLE `whislist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `fk_user_donasi` FOREIGN KEY (`id_penggalang_dana`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `iduser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `iduser_news_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `id_donasi_payment` FOREIGN KEY (`id_donasi`) REFERENCES `donasi` (`id_donasi`),
  ADD CONSTRAINT `id_user_payment` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `whislist`
--
ALTER TABLE `whislist`
  ADD CONSTRAINT `whislist_ibfk_1` FOREIGN KEY (`id_donasi`) REFERENCES `donasi` (`id_donasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

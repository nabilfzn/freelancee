-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 02:14 PM
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
(83, 'Bantu Pak Hasan Bangun Rumah Baru', 'Pak hasan', 'Pak Hasan, seorang pensiunan guru, kehilangan rumahnya karena kebakaran. Saat ini, ia tinggal di tenda darurat. Donasi Anda akan membantu membangun rumah baru yang aman dan layak untuknya.', 'jawa.jpg', 34, '2024-05-16 15:20:25'),
(84, 'Dukung Pendidikan Anak-Anak Desa Lembah', 'Anak-Anak desa Lembah', 'Anak-anak di Desa Lembah sangat bersemangat belajar meski dengan fasilitas yang minim. Donasi Anda akan digunakan untuk membangun perpustakaan dan menyediakan buku serta alat tulis untuk mereka.', 'WhatsApp Image 2024-02-05 at 11.12.22_6f85b316.jpg', 34, '2024-05-16 15:21:36'),
(85, 'Bantu Dik Rulmi Melawan Kanker', 'Dik Rulmi', 'Ibu Sari, seorang ibu tunggal dari dua anak, didiagnosis menderita kanker payudara. Biaya pengobatan yang tinggi membuatnya kesulitan. Mari kita bantu meringankan bebannya dengan berdonasi untuk biaya pengobatannya.', 'p1.jpg', 34, '2024-05-16 15:23:09'),
(86, 'Selamatkan Hutan Mangrove di Pesisir Barat', 'Pengurus Hutan Terkait', 'Hutan mangrove di Pesisir Barat terancam punah akibat penebangan liar. Donasi Anda akan digunakan untuk program rehabilitasi dan penanaman kembali mangrove, demi menjaga ekosistem pesisir yang vital.', 'forest-6765636_1280.jpg', 34, '2024-05-16 15:25:06'),
(87, 'Bantu Korban Banjir di Desa Sejahtera', 'Warga desa Sejahtera', 'Banjir besar melanda Desa Sejahtera, menyebabkan banyak keluarga kehilangan tempat tinggal dan harta benda. Donasi Anda akan membantu menyediakan kebutuhan dasar seperti makanan, pakaian, dan tempat tinggal sementara.', 'children-5833719_1280.jpg', 34, '2024-05-16 15:27:51'),
(88, 'Dukung Klinik Gratis Ruyonambe untuk Kaum Dhuafa Desa Linggorake', 'Klinik Ruyonambe', 'Klinik kecil di Kampung Harmoni memberikan layanan kesehatan gratis bagi kaum dhuafa. Dengan donasi Anda, klinik ini bisa terus beroperasi dan menyediakan obat-obatan serta peralatan medis yang diperlukan.', 'nurse-1822460_1280.jpg', 34, '2024-05-16 15:29:51'),
(89, 'Bantu Renovasi Panti Asuhan Pelita Harapan', 'Panti Asuhan Pelita Harapan', 'Panti Asuhan Pelita Harapan membutuhkan renovasi untuk memperbaiki bangunan yang sudah tua dan tidak aman. Donasi Anda akan membantu menyediakan tempat yang nyaman dan aman bagi anak-anak yatim.', 'afghan-857794_1280.jpg', 34, '2024-05-16 15:33:22'),
(90, 'Bantu Keluarga Pak Joko Pulih dari Gempa', 'Keluarga Pak Joko ', 'Keluarga Pak Joko kehilangan rumah dan mata pencaharian mereka akibat gempa bumi. Donasi Anda akan membantu mereka membangun kembali rumah dan memulai usaha kecil agar bisa mandiri kembali.', 'earthquake-1665878_1280.jpg', 34, '2024-05-16 15:34:54'),
(91, 'Dukung Pemberdayaan Perempuan di Desa Maju', 'Warga perempuan di Desa Maju', 'Perempuan di Desa Maju membutuhkan dukungan untuk program pelatihan keterampilan dan pemberdayaan ekonomi. Donasi Anda akan membantu mereka mendapatkan pelatihan menjahit, memasak, dan kerajinan tangan untuk meningkatkan taraf hidup mereka.', 'women-8503001_1280.jpg', 34, '2024-05-16 15:36:22'),
(92, 'Selamatkan Satwa Liar di Hutan Lindung Jokirunda', 'Pengurus Hutan Lindung Jokirunda', 'Banyak satwa liar di Hutan Lindung Teratai terancam akibat perburuan ilegal. Donasi Anda akan digunakan untuk patroli hutan, penyediaan makanan, dan pengobatan bagi satwa yang terluka, serta program edukasi bagi masyarakat sekitar tentang pentingnya konservasi.', 'red-panda-4033074_1280.jpg', 34, '2024-05-16 15:38:42');

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
(50, 86, 34, 11111, '123123', '1231', 23123, 120120, '2024-05-19 16:02:05'),
(51, 86, 34, 111, 'nabil', 'cabean', 333, 1000, '2024-05-17 18:24:27'),
(57, 83, 34, 123123, 'fff', 'ffff', 1, 1, '2024-05-18 17:49:16'),
(58, 84, 34, 123, 'ahmad nabil', 'mbs', 123, 1000, '2024-05-19 17:35:50'),
(59, 84, 34, 2147483647, 'Arga ganteng', 'Pecantingan rono titik', 1199887722, 1000000000, '2024-05-20 03:07:32'),
(60, 92, 34, 2147483647, 'FAUZAAAAAAAAANNNNNNNNNN', 'IAIAIAAIA', 2147483647, 8000000, '2024-05-20 03:14:17');

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
(34, 'nabil', 'nabil@g.c', '222', 8453122, 'user', 'pecabeann', 'asuransi.png'),
(37, 'rokibredet', 'bredetedet@g.c', '111', 2121, 'user', '121', '9088779.jpg'),
(38, 'arga', 'jawa@g.c', 'rajindra', 2147483647, 'user', 'gedangan', 'arga spuber.png'),
(51, 'user', 'ssd@g.c', 'lebihkenceng', 224, 'user', 'masangan', 'jawa kodok.jpg'),
(53, 'admin', 'admin@g.c', '777', 666, 'admin', 'lumbung', 'Screenshot (1).png'),
(68, 'fauzan', 'fzn@g.c', 'fzn', 123, 'user', 'ljuh', 'Screenshot (2).png'),
(78, 'iiii', 'i@g.c', '000', 989, 'user', 'jjj', 'Screenshot (4).png'),
(79, 'wwwq', 'wwwww@g.c', 'www', 999, 'user', 'www', 'Screenshot (1) - Copy.png');

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_donasi_payment` (`id_donasi`),
  ADD KEY `id_user_payment` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `fk_user_donasi` FOREIGN KEY (`id_penggalang_dana`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `id_donasi_payment` FOREIGN KEY (`id_donasi`) REFERENCES `donasi` (`id_donasi`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_user_payment` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

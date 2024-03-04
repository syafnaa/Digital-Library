-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 02:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `bukuID` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `penulis` varchar(30) DEFAULT NULL,
  `penerbit` varchar(30) DEFAULT NULL,
  `tahunTerbit` int(11) DEFAULT NULL,
  `jml_buku` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`bukuID`, `judul`, `penulis`, `penerbit`, `tahunTerbit`, `jml_buku`) VALUES
(2, 'Beware Worn Down By Time', 'ADDIN JAUHARUDIN', 'Penerbit Buku Kompas', 2023, 3),
(3, 'The Guardians', 'John Grisham', 'Gramedia Pustaka Utama', 2020, 19),
(4, 'Putri Salju', 'Syafna', 'haloSyafna', 2005, 16),
(5, 'Hex Hall', 'Rachel Hawkins', 'Ufuk Fiction', 2013, 12),
(10, 'Hilmy Milan ', 'Nadia Ristivani', 'Kawah Media Pustaka', 2021, 19);

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `kategoriID` int(11) NOT NULL,
  `namaKategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`kategoriID`, `namaKategori`) VALUES
(1, 'Misteri'),
(3, 'Fantasi'),
(4, 'Horor'),
(5, 'Sastra'),
(6, 'Humor'),
(7, 'Romantis');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `kategoriBukuID` int(11) NOT NULL,
  `bukuID` int(11) DEFAULT NULL,
  `kategoriID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`kategoriBukuID`, `bukuID`, `kategoriID`) VALUES
(20, 2, 5),
(21, 3, 1),
(22, 5, 3),
(23, 10, 7),
(24, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `koleksiID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `bukuID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koleksipribadi`
--

INSERT INTO `koleksipribadi` (`koleksiID`, `userID`, `bukuID`) VALUES
(5, 1, 2),
(10, 2, 2),
(14, 2, 5),
(15, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `log_pinjam`
--

CREATE TABLE `log_pinjam` (
  `Keterangan` varchar(50) DEFAULT NULL,
  `Waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_pinjam`
--

INSERT INTO `log_pinjam` (`Keterangan`, `Waktu`) VALUES
('Members Borrow Book', '2024-01-23 08:49:05'),
('Member Replaces Loan Book', '2024-01-23 08:58:06'),
('Member Replaces Loan Book', '2024-01-23 08:58:06'),
('Members Return Books', '2024-01-23 09:04:31'),
('Members Borrow Book', '2024-01-23 09:15:25'),
('Members Borrow Book', '2024-01-23 09:34:42'),
('Members Return Books', '2024-01-23 09:42:31'),
('Members Return Books', '2024-01-23 09:42:36'),
('Members Borrow Book', '2024-01-23 09:43:14'),
('Members Borrow Book', '2024-01-23 10:14:25'),
('Members Borrow Book', '2024-01-30 14:01:38'),
('Member Replaces Loan Book', '2024-01-30 14:58:07'),
('Member Replaces Loan Book', '2024-01-30 14:58:07'),
('Members Borrow Book', '2024-01-30 14:58:57'),
('Member Replaces Loan Book', '2024-01-30 14:59:13'),
('Member Replaces Loan Book', '2024-01-30 14:59:13'),
('Members Borrow Book', '2024-01-30 15:01:12'),
('Member Replaces Loan Book', '2024-01-30 15:01:20'),
('Member Replaces Loan Book', '2024-01-30 15:01:20'),
('Members Borrow Book', '2024-01-30 15:10:50'),
('Member Replaces Loan Book', '2024-01-30 15:11:46'),
('Member Replaces Loan Book', '2024-01-30 15:11:46'),
('Members Borrow Book', '2024-01-31 07:58:14'),
('Members Borrow Book', '2024-01-31 08:33:55'),
('Members Borrow Book', '2024-01-31 09:01:17'),
('Members Borrow Book', '2024-01-31 09:08:29'),
('Members Borrow Book', '2024-01-31 09:36:49'),
('Members Borrow Book', '2024-01-31 09:40:23'),
('Members Borrow Book', '2024-01-31 09:40:51'),
('Members Borrow Book', '2024-01-31 09:42:11'),
('Members Return Books', '2024-01-31 09:49:35'),
('Members Return Books', '2024-01-31 09:49:42'),
('Members Return Books', '2024-01-31 09:49:47'),
('Members Return Books', '2024-01-31 09:49:52'),
('Member Replaces Loan Book', '2024-01-31 10:15:10'),
('Member Replaces Loan Book', '2024-01-31 10:15:10'),
('Members Return Books', '2024-01-31 10:30:18'),
('Members Borrow Book', '2024-02-07 13:58:21'),
('Members Borrow Book', '2024-02-07 13:59:14'),
('Member Replaces Loan Book', '2024-02-07 14:00:19'),
('Member Replaces Loan Book', '2024-02-07 14:00:19'),
('Member Replaces Loan Book', '2024-02-07 14:00:26'),
('Member Replaces Loan Book', '2024-02-07 14:00:26'),
('Members Return Books', '2024-02-07 14:01:12'),
('Members Return Books', '2024-02-07 14:01:19'),
('Members Return Books', '2024-02-13 15:18:50'),
('Members Borrow Book', '2024-02-13 15:19:05'),
('Member Replaces Loan Book', '2024-02-13 15:19:43'),
('Member Replaces Loan Book', '2024-02-13 15:19:43'),
('Members Borrow Book', '2024-02-13 15:22:15'),
('Members Return Books', '2024-02-19 11:51:24'),
('Members Return Books', '2024-02-19 11:51:30'),
('Members Return Books', '2024-02-19 11:51:34'),
('Members Borrow Book', '2024-02-19 11:51:58'),
('Members Borrow Book', '2024-02-19 11:52:39'),
('Members Borrow Book', '2024-02-19 11:52:54'),
('Member Replaces Loan Book', '2024-02-19 13:37:09'),
('Member Replaces Loan Book', '2024-02-19 13:37:09'),
('Member Replaces Loan Book', '2024-02-20 14:39:18'),
('Member Replaces Loan Book', '2024-02-20 14:39:18'),
('Members Borrow Book', '2024-02-21 08:16:14'),
('Member Replaces Loan Book', '2024-02-21 08:17:37'),
('Member Replaces Loan Book', '2024-02-21 08:17:37'),
('Members Borrow Book', '2024-02-25 18:51:22'),
('Members Return Books', '2024-02-25 18:51:42'),
('Members Borrow Book', '2024-02-25 18:52:20'),
('Member Replaces Loan Book', '2024-02-25 18:54:59'),
('Member Replaces Loan Book', '2024-02-25 18:54:59'),
('Members Borrow Book', '2024-02-26 16:25:12'),
('Member Replaces Loan Book', '2024-02-26 16:28:39'),
('Member Replaces Loan Book', '2024-02-26 16:28:39'),
('Members Borrow Book', '2024-02-26 16:51:16'),
('Member Replaces Loan Book', '2024-02-26 16:55:42'),
('Member Replaces Loan Book', '2024-02-26 16:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjamanID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `bukuID` int(11) DEFAULT NULL,
  `tanggalPeminjaman` date DEFAULT NULL,
  `tanggalPengembalian` date DEFAULT NULL,
  `statusPeminjaman` enum('dipinjam','dikembalikan') DEFAULT NULL,
  `jml_pinjam` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjamanID`, `userID`, `bukuID`, `tanggalPeminjaman`, `tanggalPengembalian`, `statusPeminjaman`, `jml_pinjam`) VALUES
(6, 2, 3, '2024-01-01', '2024-01-04', 'dikembalikan', 1),
(9, 2, 4, '2024-01-08', '2024-01-16', 'dikembalikan', 1),
(22, 1, 5, '2024-02-14', '2024-02-17', 'dikembalikan', 1),
(23, 1, 10, '2024-02-10', '2024-02-13', 'dikembalikan', 1),
(24, 1, 2, '2024-02-24', '2024-02-28', 'dikembalikan', 1),
(27, 16, 4, '2024-02-19', '2024-02-13', 'dikembalikan', 1),
(29, 18, 5, '2024-02-14', '2024-02-16', 'dikembalikan', 1);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `del_peminjaman` AFTER DELETE ON `peminjaman` FOR EACH ROW INSERT INTO log_pinjam VALUES ('Members Return Books', now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ins_peminjaman` AFTER INSERT ON `peminjaman` FOR EACH ROW INSERT INTO log_pinjam VALUES ('Members Borrow Book', now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `peminjaman` FOR EACH ROW UPDATE buku SET jml_buku=jml_buku-new.jml_pinjam WHERE bukuID=new.bukuID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upd_peminjaman` AFTER UPDATE ON `peminjaman` FOR EACH ROW INSERT INTO log_pinjam VALUES ('Member Replaces Loan Book', now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updt_peminjaman` AFTER UPDATE ON `peminjaman` FOR EACH ROW INSERT INTO log_pinjam VALUES ('Member Replaces Loan Book', now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `petugasID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('admin','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`petugasID`, `name`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'petugas', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `ulasanID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `bukuID` int(11) DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasanbuku`
--

INSERT INTO `ulasanbuku` (`ulasanID`, `userID`, `bukuID`, `ulasan`, `rating`) VALUES
(23, 1, 10, 'bagusss banget', 7),
(25, 2, 10, 'baper', 7),
(30, 18, 5, 'keren', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `namaLengkap` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `namaLengkap`, `username`, `password`, `email`, `alamat`, `profile_img`, `bio`) VALUES
(1, 'Syafna Marwa', 'syafna', '9cdfdc6fc77ab35d2072cc55e60ee629', 'syafna@gmail.com', 'Metro', NULL, NULL),
(2, 'Lee Haechan', 'ecan', '1e22680224cc6b2ef0bd2a34bc251134', 'ecan@gmail.com', 'Metro', NULL, NULL),
(16, 'lucas', 'lucas', 'dc53fc4f621c80bdc2fa0329a6123708', 'lucas@gmail.com', NULL, NULL, NULL),
(18, 'jay', 'jay', 'baba327d241746ee0829e7e88117d4d5', 'jay@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vdetailpinjam`
-- (See below for the actual view)
--
CREATE TABLE `vdetailpinjam` (
`namaLengkap` varchar(50)
,`bukuID` int(11)
,`tanggalPeminjaman` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vkoleksi`
-- (See below for the actual view)
--
CREATE TABLE `vkoleksi` (
`username` varchar(30)
,`bukuID` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpeminjaman`
-- (See below for the actual view)
--
CREATE TABLE `vpeminjaman` (
`username` varchar(30)
,`judul` varchar(50)
,`tanggalPeminjaman` date
,`statusPeminjaman` enum('dipinjam','dikembalikan')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vulasan`
-- (See below for the actual view)
--
CREATE TABLE `vulasan` (
`username` varchar(30)
,`judul` varchar(50)
,`ulasan` text
,`rating` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vdetailpinjam`
--
DROP TABLE IF EXISTS `vdetailpinjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdetailpinjam`  AS SELECT `u`.`namaLengkap` AS `namaLengkap`, `p`.`bukuID` AS `bukuID`, `p`.`tanggalPeminjaman` AS `tanggalPeminjaman` FROM (`user` `u` join `peminjaman` `p`) WHERE `u`.`userID` = `p`.`userID``userID`  ;

-- --------------------------------------------------------

--
-- Structure for view `vkoleksi`
--
DROP TABLE IF EXISTS `vkoleksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vkoleksi`  AS SELECT `u`.`username` AS `username`, `k`.`bukuID` AS `bukuID` FROM (`user` `u` join `koleksipribadi` `k`) WHERE `u`.`userID` = `k`.`userID``userID`  ;

-- --------------------------------------------------------

--
-- Structure for view `vpeminjaman`
--
DROP TABLE IF EXISTS `vpeminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpeminjaman`  AS SELECT `u`.`username` AS `username`, `b`.`judul` AS `judul`, `p`.`tanggalPeminjaman` AS `tanggalPeminjaman`, `p`.`statusPeminjaman` AS `statusPeminjaman` FROM ((`user` `u` join `peminjaman` `p` on(`u`.`userID` = `p`.`userID`)) join `buku` `b` on(`p`.`bukuID` = `b`.`bukuID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vulasan`
--
DROP TABLE IF EXISTS `vulasan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vulasan`  AS SELECT `u`.`username` AS `username`, `b`.`judul` AS `judul`, `ub`.`ulasan` AS `ulasan`, `ub`.`rating` AS `rating` FROM ((`user` `u` join `ulasanbuku` `ub` on(`u`.`userID` = `ub`.`userID`)) join `buku` `b` on(`ub`.`bukuID` = `b`.`bukuID`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`bukuID`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`kategoriBukuID`),
  ADD KEY `bukuID` (`bukuID`),
  ADD KEY `kategoriID` (`kategoriID`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`koleksiID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjamanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugasID`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`ulasanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `bukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `kategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `kategoriBukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `koleksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjamanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `ulasanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_1` FOREIGN KEY (`bukuID`) REFERENCES `buku` (`bukuID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_2` FOREIGN KEY (`kategoriID`) REFERENCES `kategoribuku` (`kategoriID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`bukuID`) REFERENCES `buku` (`bukuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`bukuID`) REFERENCES `buku` (`bukuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD CONSTRAINT `ulasanbuku_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasanbuku_ibfk_2` FOREIGN KEY (`bukuID`) REFERENCES `buku` (`bukuID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

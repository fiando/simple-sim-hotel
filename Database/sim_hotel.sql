-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2018 at 03:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE `check_in` (
  `idcheck_in` int(11) NOT NULL,
  `jumlah` tinyint(4) NOT NULL,
  `biaya` int(11) NOT NULL,
  `tgl_check_in` date NOT NULL,
  `idpelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `check_in`
--

INSERT INTO `check_in` (`idcheck_in`, `jumlah`, `biaya`, `tgl_check_in`, `idpelanggan`) VALUES
(1, 5, 2500000, '2018-11-11', 24),
(2, 3, 750000, '2018-08-20', 12),
(3, 3, 3000000, '2018-07-07', 9);

-- --------------------------------------------------------

--
-- Table structure for table `check_in_kamar`
--

CREATE TABLE `check_in_kamar` (
  `idcheck_in` int(11) NOT NULL,
  `idruang_kamar` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `check_in_kamar`
--

INSERT INTO `check_in_kamar` (`idcheck_in`, `idruang_kamar`, `created_at`) VALUES
(1, 6, '2018-05-01 15:34:09'),
(1, 7, '2018-05-01 15:34:09'),
(1, 8, '2018-05-01 15:34:09'),
(1, 9, '2018-05-01 15:34:09'),
(1, 10, '2018-05-01 15:34:09'),
(2, 1, '2018-05-01 15:36:37'),
(2, 2, '2018-05-01 15:36:37'),
(2, 3, '2018-05-01 15:36:37'),
(3, 18, '2018-05-01 15:42:42'),
(3, 19, '2018-05-01 15:42:42'),
(3, 20, '2018-05-01 15:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `check_out`
--

CREATE TABLE `check_out` (
  `idcheck_out` int(11) NOT NULL,
  `tgl_check_out` date NOT NULL,
  `biaya_lain` int(11) DEFAULT '0',
  `idcheck_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `check_out`
--

INSERT INTO `check_out` (`idcheck_out`, `tgl_check_out`, `biaya_lain`, `idcheck_in`) VALUES
(1, '2018-12-11', 0, 1),
(2, '2018-08-18', 0, 2),
(3, '2018-07-12', 0, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `histori_order`
-- (See below for the actual view)
--
CREATE TABLE `histori_order` (
`status_order` enum('baru','lunas','selesai','batal')
,`idorder` int(11)
,`nama` varchar(45)
,`no_ktp` varchar(18)
,`tgl_check_in` date
,`tgl_check_out` date
,`biaya` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lihat_bayar`
-- (See below for the actual view)
--
CREATE TABLE `lihat_bayar` (
`idorder` int(11)
,`nama` varchar(45)
,`no_ktp` varchar(18)
,`tgl_check_in` date
,`tgl_check_out` date
,`biaya` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `idorder` int(11) NOT NULL,
  `status_order` enum('baru','lunas','selesai','batal') NOT NULL,
  `idcheck_in` int(11) NOT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`idorder`, `status_order`, `idcheck_in`, `tgl_order`) VALUES
(1, 'selesai', 1, '2018-05-01 08:34:09'),
(2, 'selesai', 2, '2018-05-01 08:36:37'),
(3, 'baru', 3, '2018-05-01 08:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `no_ktp` varchar(18) NOT NULL,
  `telepon` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `nama`, `alamat`, `no_ktp`, `telepon`) VALUES
(1, 'Bobby', 'Jogja', '332500912978707140', '085743411430'),
(3, 'Karimah', 'Dk. Pacuan Kuda No. 586', '972500912978707140', '081531075435'),
(4, 'Kamidin', 'Ds. Eka No. 230', '488369637491841416', '080232618448'),
(5, 'Endah', 'Kpg. Yap Tjwan Bing No. 558', '800673141160540094', '083360109406'),
(6, 'Mutia', 'Ki. Ters. Pasir Koja No. 511', '546803849624387311', '080825596482'),
(7, 'Safina', 'Ds. Yap Tjwan Bing No. 681', '481949182056359234', '081228168463'),
(8, 'Aswani', 'Gg. Pattimura No. 828', '677766733598611948', '082774672410'),
(9, 'Ega', 'Kpg. M.T. Haryono No. 823', '074096221694508498', '088497160440'),
(10, 'Restu', 'Jln. Bakit  No. 538', '932293024691620975', '083918096455'),
(11, 'Azalea', 'Dk. Urip Sumoharjo No. 206', '678791094798813301', '086148224466'),
(12, 'Oni', 'Jln. Suprapto No. 727', '704680373747099244', '089077961464'),
(13, 'Prasetya', 'Ki. Basuki No. 919', '212317160486031284', '086925795467'),
(14, 'Zelda', 'Gg. Babadan No. 510', '911163535155446622', '084743670446'),
(15, 'Cinta', 'Gg. Krakatau No. 93', '884413098330314248', '087991308406'),
(16, 'Daliman', 'Jln. Bah Jaya No. 306', '781335778174348194', '089593419485'),
(17, 'Saadat', 'Jln. Raya Ujungberung No. 409', '807410608416712633', '082890798442'),
(18, 'Kasiyah', 'Psr. Yos No. 363', '525831514635341926', '087974115466'),
(19, 'Puput', 'Ds. Moch. Toha No. 38', '539753488191953001', '088691538413'),
(20, 'Puspa', 'Ds. Yogyakarta No. 119', '535710867445009716', '088265671479'),
(21, 'Farah', 'Kpg. Untung Suropati No. 714', '233255427261338900', '087298094437'),
(22, 'Oni', 'Gg. Madrasah No. 697', '154965460356228373', '087780049496'),
(23, 'Mustofa', 'Kpg. Dipatiukur No. 476', '028414608002468212', '085231463464'),
(24, 'Satya', 'Jln. Baan No. 987', '862670698655440768', '085368162451'),
(25, 'Mala', 'Ds. Daan No. 491', '667863709650865638', '084326103494'),
(26, 'Asirwanda', 'Ki. Tambak No. 535', '009078655628092605', '084191347441'),
(27, 'Limar', 'Jr. Kusmanto No. 754', '450762834083252581', '0584744321');

-- --------------------------------------------------------

--
-- Table structure for table `ruang_kamar`
--

CREATE TABLE `ruang_kamar` (
  `idruang_kamar` int(11) NOT NULL,
  `id_tipe_kamar` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ruang_kamar`
--

INSERT INTO `ruang_kamar` (`idruang_kamar`, `id_tipe_kamar`, `status`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 2, 1),
(7, 2, 1),
(8, 2, 1),
(9, 2, 1),
(10, 2, 1),
(11, 3, 1),
(12, 3, 1),
(13, 3, 1),
(14, 3, 1),
(15, 3, 1),
(16, 4, 1),
(17, 4, 1),
(18, 4, 0),
(19, 4, 0),
(20, 4, 0),
(21, 1, 1),
(22, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `idtipe_kamar` tinyint(4) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `singkatan` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`idtipe_kamar`, `nama`, `singkatan`, `harga`) VALUES
(1, 'Basic', 'Bas', 250000),
(2, 'Premium', 'Prem', 500000),
(3, 'Grand', 'Grd', 750000),
(4, 'Royal', 'Roy', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure for view `histori_order`
--
DROP TABLE IF EXISTS `histori_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `histori_order`  AS  select `o`.`status_order` AS `status_order`,`o`.`idorder` AS `idorder`,`p`.`nama` AS `nama`,`p`.`no_ktp` AS `no_ktp`,`ci`.`tgl_check_in` AS `tgl_check_in`,`co`.`tgl_check_out` AS `tgl_check_out`,`ci`.`biaya` AS `biaya` from (((`order` `o` join `pelanggan` `p`) join `check_in` `ci`) join `check_out` `co`) where ((`o`.`idcheck_in` = `ci`.`idcheck_in`) and (`ci`.`idpelanggan` = `p`.`idpelanggan`) and (`co`.`idcheck_in` = `ci`.`idcheck_in`)) ;

-- --------------------------------------------------------

--
-- Structure for view `lihat_bayar`
--
DROP TABLE IF EXISTS `lihat_bayar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lihat_bayar`  AS  select `o`.`idorder` AS `idorder`,`p`.`nama` AS `nama`,`p`.`no_ktp` AS `no_ktp`,`ci`.`tgl_check_in` AS `tgl_check_in`,`co`.`tgl_check_out` AS `tgl_check_out`,`ci`.`biaya` AS `biaya` from (((`order` `o` join `pelanggan` `p`) join `check_in` `ci`) join `check_out` `co`) where ((`o`.`idcheck_in` = `ci`.`idcheck_in`) and (`ci`.`idpelanggan` = `p`.`idpelanggan`) and (`co`.`idcheck_in` = `ci`.`idcheck_in`) and (`o`.`status_order` = 'baru')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`idcheck_in`),
  ADD KEY `fk_check_in_pelanggan_idx` (`idpelanggan`);

--
-- Indexes for table `check_in_kamar`
--
ALTER TABLE `check_in_kamar`
  ADD KEY `fk_check_in_kamar_ruang_kamar_idx` (`idruang_kamar`),
  ADD KEY `fk_check_in_kamar_check_in` (`idcheck_in`);

--
-- Indexes for table `check_out`
--
ALTER TABLE `check_out`
  ADD PRIMARY KEY (`idcheck_out`),
  ADD KEY `fk_check_out_check_in_idx` (`idcheck_in`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `fk_order_check_in_idx` (`idcheck_in`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `ruang_kamar`
--
ALTER TABLE `ruang_kamar`
  ADD PRIMARY KEY (`idruang_kamar`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`idtipe_kamar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_in`
--
ALTER TABLE `check_in`
  MODIFY `idcheck_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `check_out`
--
ALTER TABLE `check_out`
  MODIFY `idcheck_out` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `ruang_kamar`
--
ALTER TABLE `ruang_kamar`
  MODIFY `idruang_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `idtipe_kamar` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `check_in`
--
ALTER TABLE `check_in`
  ADD CONSTRAINT `fk_check_in_pelanggan` FOREIGN KEY (`idpelanggan`) REFERENCES `pelanggan` (`idpelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `check_in_kamar`
--
ALTER TABLE `check_in_kamar`
  ADD CONSTRAINT `fk_check_in_kamar_check_in` FOREIGN KEY (`idcheck_in`) REFERENCES `check_in` (`idcheck_in`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_check_in_kamar_ruang_kamar` FOREIGN KEY (`idruang_kamar`) REFERENCES `ruang_kamar` (`idruang_kamar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `check_out`
--
ALTER TABLE `check_out`
  ADD CONSTRAINT `fk_check_out_check_in` FOREIGN KEY (`idcheck_in`) REFERENCES `check_in` (`idcheck_in`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_check_in` FOREIGN KEY (`idcheck_in`) REFERENCES `check_in` (`idcheck_in`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

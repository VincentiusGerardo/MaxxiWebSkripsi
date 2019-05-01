-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 11:33 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminmaxxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_karyawan`
--

CREATE TABLE `ms_karyawan` (
  `ID_Karyawan` varchar(6) NOT NULL,
  `NamaKaryawan` text NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ID_Role` int(11) NOT NULL,
  `Foto` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_karyawan`
--

INSERT INTO `ms_karyawan` (`ID_Karyawan`, `NamaKaryawan`, `Password`, `ID_Role`, `Foto`, `FlagActive`) VALUES
('0000', 'Administrator', '$2y$10$Y.gcBhuR96RFEC8ExxyZQOg3MtQWtIhCVK1qse5Knfu9L7e8FU/SW', 1, '0000.jpg', 'Y'),
('0001', 'Director', '$2y$10$VM6op8KxC/3lMdPcxQ87audLLl3SZPDXdaQOgMuwfcxmmE0vBuIcK', 2, '0001.jpg', 'Y'),
('0002', 'HRD', '$2y$10$etjxn0cpNewzeDDRG07Jeer9KAE7LyaoQ/5zl4jj1kKKR/.GE12EC', 3, NULL, 'Y'),
('0003', 'Employee', '$2y$10$pPnhu/QEsD7xwN8V5qBg0OhP/YF.pL0UGyN1MPgAVKKqpNzDGI0BS', 4, NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_menu`
--

CREATE TABLE `ms_menu` (
  `ID_Menu` int(11) NOT NULL,
  `NamaMenu` text NOT NULL,
  `URL` text NOT NULL,
  `Logo` text NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_menu`
--

INSERT INTO `ms_menu` (`ID_Menu`, `NamaMenu`, `URL`, `Logo`, `FlagActive`) VALUES
(1, 'Karyawan', '#', 'fa-user', 'N'),
(2, 'Testing', 'Testing', 'fa-rocket', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_role`
--

CREATE TABLE `ms_role` (
  `ID_Role` int(11) NOT NULL,
  `NamaRole` text NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_role`
--

INSERT INTO `ms_role` (`ID_Role`, `NamaRole`, `FlagActive`) VALUES
(1, 'Administrator', 'Y'),
(2, 'Director', 'Y'),
(3, 'HRD', 'Y'),
(4, 'Employee', 'Y'),
(5, 'Reciever', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_submenu`
--

CREATE TABLE `ms_submenu` (
  `ID_SubMenu` int(11) NOT NULL,
  `ID_Menu` int(11) NOT NULL,
  `NamaSubMenu` text NOT NULL,
  `URL` text NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_submenu`
--

INSERT INTO `ms_submenu` (`ID_SubMenu`, `ID_Menu`, `NamaSubMenu`, `URL`, `FlagActive`) VALUES
(1, 1, 'Add Karyawan', 'AddKaryawan', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tr_absensi`
--

CREATE TABLE `tr_absensi` (
  `ID_Absensi` int(11) NOT NULL,
  `ID_Karyawan` varchar(6) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `ClockIn` time DEFAULT NULL,
  `ClockOut` time DEFAULT NULL,
  `LamaKerja` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_absensi`
--

INSERT INTO `tr_absensi` (`ID_Absensi`, `ID_Karyawan`, `Tanggal`, `ClockIn`, `ClockOut`, `LamaKerja`) VALUES
(1, '0000', '2018-08-01', '11:26:00', '23:33:15', '00:00:00'),
(2, '0000', '2018-08-26', '23:10:21', '23:33:15', '00:00:00'),
(3, '0000', '2018-08-22', '23:12:15', '23:33:15', '00:00:00'),
(4, '0000', '2018-08-27', '23:14:15', '23:59:30', '00:45:15'),
(5, '0001', '2018-08-27', '23:39:54', '23:40:13', '00:00:19'),
(14, '0000', '2018-08-27', '23:52:42', '23:59:30', '00:45:15'),
(15, '0000', '2018-08-27', '23:52:49', '23:59:30', '00:45:15'),
(16, '0000', '2018-08-28', '00:02:31', '00:15:38', '00:13:07'),
(17, '0000', '2018-08-28', '00:02:53', '00:15:38', '00:13:07'),
(18, '0001', '2018-08-28', '00:03:19', '00:14:42', '00:11:23'),
(21, '0000', '2018-08-28', '00:11:37', '00:15:38', '00:13:07'),
(22, '0000', '2018-08-28', '00:12:28', '00:15:38', '00:13:07'),
(23, '0000', '2018-08-28', '00:13:32', '00:15:38', '00:13:07'),
(24, '0001', '2018-08-28', '00:14:29', '00:14:42', '00:11:23'),
(25, '0000', '2018-08-28', '00:14:52', NULL, NULL),
(26, '0000', '2019-04-30', '14:04:40', '14:09:42', '00:05:02'),
(27, '0000', '2019-04-30', '14:05:34', '14:09:42', '00:05:02'),
(28, '0000', '2019-04-30', '14:06:59', '14:09:42', '00:05:02'),
(29, '0001', '2019-04-30', '14:11:16', NULL, NULL),
(30, '0000', '2019-04-30', '15:20:52', '15:44:15', '01:39:35'),
(31, '0000', '2019-04-30', '15:45:32', '15:51:43', '00:06:11'),
(32, '0000', '2019-05-01', '11:20:16', '11:22:36', '00:04:20'),
(33, '0000', '2019-05-01', '11:21:44', '11:25:26', '00:03:42'),
(34, '0000', '2019-05-01', '11:25:42', '11:27:16', '00:01:34'),
(35, '0003', '2019-05-01', '11:05:09', '12:05:46', '01:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `tr_authorizemenu`
--

CREATE TABLE `tr_authorizemenu` (
  `ID_AuthorizeMenu` int(11) NOT NULL,
  `ID_Menu` int(11) NOT NULL,
  `ID_Karyawan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_authorizemenu`
--

INSERT INTO `tr_authorizemenu` (`ID_AuthorizeMenu`, `ID_Menu`, `ID_Karyawan`) VALUES
(1, 1, '0000'),
(2, 1, '0003'),
(3, 2, '0003');

-- --------------------------------------------------------

--
-- Table structure for table `tr_authorizesubmenu`
--

CREATE TABLE `tr_authorizesubmenu` (
  `ID_AuthorizeSubMenu` int(11) NOT NULL,
  `ID_SubMenu` int(11) NOT NULL,
  `ID_Karyawan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_authorizesubmenu`
--

INSERT INTO `tr_authorizesubmenu` (`ID_AuthorizeSubMenu`, `ID_SubMenu`, `ID_Karyawan`) VALUES
(1, 1, '0000');

-- --------------------------------------------------------

--
-- Table structure for table `tr_cuti`
--

CREATE TABLE `tr_cuti` (
  `ID_Cuti` int(11) NOT NULL,
  `ID_Karyawan` varchar(6) NOT NULL,
  `TanggalCuti` date NOT NULL,
  `TanggalKembali` date NOT NULL,
  `Keterangan` text NOT NULL,
  `StatusAcceptHRD` char(1) DEFAULT NULL,
  `StatusAcceptDirektur` char(1) DEFAULT NULL,
  `StatusCuti` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_cuti`
--

INSERT INTO `tr_cuti` (`ID_Cuti`, `ID_Karyawan`, `TanggalCuti`, `TanggalKembali`, `Keterangan`, `StatusAcceptHRD`, `StatusAcceptDirektur`, `StatusCuti`) VALUES
(1, '0003', '2019-05-06', '2019-05-10', 'Testing', 'Y', 'Y', 'Y'),
(2, '0003', '2019-05-13', '2019-05-24', '<p>asdasdasd<br></p>', 'Y', 'Y', 'Y'),
(3, '0003', '2019-05-06', '2019-05-07', '<p>urusan keluarga<br></p>', 'Y', 'Y', 'Y'),
(4, '0003', '2019-05-20', '2019-05-24', 'coba ya<br>', 'Y', 'N', 'N'),
(5, '0001', '2019-05-20', '2019-05-24', '<p>asdasd<br></p>', 'Y', 'Y', 'Y'),
(6, '0002', '2019-05-20', '2019-05-24', '<p>tes<br></p>', 'Y', 'N', 'N'),
(7, '0000', '2019-05-20', '2019-05-24', '<p>asdasd<br></p>', 'Y', 'Y', 'Y'),
(8, '0003', '2019-05-26', '2019-05-31', '<p>coba ya<br></p>', 'Y', 'Y', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_karyawan`
--
ALTER TABLE `ms_karyawan`
  ADD PRIMARY KEY (`ID_Karyawan`),
  ADD KEY `FK_Role` (`ID_Role`);

--
-- Indexes for table `ms_menu`
--
ALTER TABLE `ms_menu`
  ADD PRIMARY KEY (`ID_Menu`);

--
-- Indexes for table `ms_role`
--
ALTER TABLE `ms_role`
  ADD PRIMARY KEY (`ID_Role`);

--
-- Indexes for table `ms_submenu`
--
ALTER TABLE `ms_submenu`
  ADD PRIMARY KEY (`ID_SubMenu`);

--
-- Indexes for table `tr_absensi`
--
ALTER TABLE `tr_absensi`
  ADD PRIMARY KEY (`ID_Absensi`),
  ADD KEY `FK_KaryawanAbsensi` (`ID_Karyawan`);

--
-- Indexes for table `tr_authorizemenu`
--
ALTER TABLE `tr_authorizemenu`
  ADD PRIMARY KEY (`ID_AuthorizeMenu`),
  ADD KEY `FK_Menu` (`ID_Menu`),
  ADD KEY `FK_KaryawanAuthMenu` (`ID_Karyawan`);

--
-- Indexes for table `tr_authorizesubmenu`
--
ALTER TABLE `tr_authorizesubmenu`
  ADD PRIMARY KEY (`ID_AuthorizeSubMenu`),
  ADD KEY `FK_SubMenu` (`ID_SubMenu`),
  ADD KEY `FK_KaryawanAuthSubMenu` (`ID_Karyawan`);

--
-- Indexes for table `tr_cuti`
--
ALTER TABLE `tr_cuti`
  ADD PRIMARY KEY (`ID_Cuti`),
  ADD KEY `FK_Karyawan` (`ID_Karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_menu`
--
ALTER TABLE `ms_menu`
  MODIFY `ID_Menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ms_role`
--
ALTER TABLE `ms_role`
  MODIFY `ID_Role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ms_submenu`
--
ALTER TABLE `ms_submenu`
  MODIFY `ID_SubMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tr_absensi`
--
ALTER TABLE `tr_absensi`
  MODIFY `ID_Absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tr_authorizemenu`
--
ALTER TABLE `tr_authorizemenu`
  MODIFY `ID_AuthorizeMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_authorizesubmenu`
--
ALTER TABLE `tr_authorizesubmenu`
  MODIFY `ID_AuthorizeSubMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tr_cuti`
--
ALTER TABLE `tr_cuti`
  MODIFY `ID_Cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ms_karyawan`
--
ALTER TABLE `ms_karyawan`
  ADD CONSTRAINT `FK_Role` FOREIGN KEY (`ID_Role`) REFERENCES `ms_role` (`ID_Role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tr_absensi`
--
ALTER TABLE `tr_absensi`
  ADD CONSTRAINT `FK_KaryawanAbsensi` FOREIGN KEY (`ID_Karyawan`) REFERENCES `ms_karyawan` (`ID_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tr_authorizemenu`
--
ALTER TABLE `tr_authorizemenu`
  ADD CONSTRAINT `FK_KaryawanAuthMenu` FOREIGN KEY (`ID_Karyawan`) REFERENCES `ms_karyawan` (`ID_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Menu` FOREIGN KEY (`ID_Menu`) REFERENCES `ms_menu` (`ID_Menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tr_authorizesubmenu`
--
ALTER TABLE `tr_authorizesubmenu`
  ADD CONSTRAINT `FK_KaryawanAuthSubMenu` FOREIGN KEY (`ID_Karyawan`) REFERENCES `ms_karyawan` (`ID_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SubMenu` FOREIGN KEY (`ID_SubMenu`) REFERENCES `ms_submenu` (`ID_SubMenu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tr_cuti`
--
ALTER TABLE `tr_cuti`
  ADD CONSTRAINT `FK_Karyawan` FOREIGN KEY (`ID_Karyawan`) REFERENCES `ms_karyawan` (`ID_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

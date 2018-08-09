-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 07:55 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
-- Table structure for table `ms_harga`
--

CREATE TABLE `ms_harga` (
  `ID_Harga` int(11) NOT NULL,
  `ID_Pelanggan` int(11) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_karyawan`
--

CREATE TABLE `ms_karyawan` (
  `KodeKaryawan` varchar(6) NOT NULL,
  `NamaKaryawan` text NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ID_Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_karyawan`
--

INSERT INTO `ms_karyawan` (`KodeKaryawan`, `NamaKaryawan`, `Password`, `ID_Role`) VALUES
('0000', 'Administrator', '$2y$10$bcKaDK32mqQ.9I5o31sYSeMF6NADP1RP653JSlFPGdBkbtAN9ufhi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ms_pelanggan`
--

CREATE TABLE `ms_pelanggan` (
  `ID_Pelanggan` int(11) NOT NULL,
  `NamaPelanggan` text NOT NULL,
  `DateAdded` datetime NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_pelanggan`
--

INSERT INTO `ms_pelanggan` (`ID_Pelanggan`, `NamaPelanggan`, `DateAdded`, `FlagActive`) VALUES
(1, 'PT. Ford Indonesia', '2018-08-09 23:38:02', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_harga`
--
ALTER TABLE `ms_harga`
  ADD PRIMARY KEY (`ID_Harga`),
  ADD KEY `ms_harga_ibfk_1` (`ID_Pelanggan`);

--
-- Indexes for table `ms_karyawan`
--
ALTER TABLE `ms_karyawan`
  ADD PRIMARY KEY (`KodeKaryawan`);

--
-- Indexes for table `ms_pelanggan`
--
ALTER TABLE `ms_pelanggan`
  ADD PRIMARY KEY (`ID_Pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_harga`
--
ALTER TABLE `ms_harga`
  MODIFY `ID_Harga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_pelanggan`
--
ALTER TABLE `ms_pelanggan`
  MODIFY `ID_Pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ms_harga`
--
ALTER TABLE `ms_harga`
  ADD CONSTRAINT `ms_harga_ibfk_1` FOREIGN KEY (`ID_Pelanggan`) REFERENCES `ms_pelanggan` (`ID_Pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

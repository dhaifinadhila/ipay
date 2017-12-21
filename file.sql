-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2017 at 09:10 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `txt`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `no` int(11) NOT NULL,
  `no_dokumen` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `no_rekening` char(20) NOT NULL,
  `jumlah_idr` char(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`no`, `no_dokumen`, `nama`, `bank`, `no_rekening`, `jumlah_idr`, `keterangan`, `email`) VALUES
(1, 900008235, 'MITRA COPIERINDO MANDIRI, PT                      ', 'BANK CENTRAL ASIA SUNTER CABANG PEMBANTU GRAHA KIR', '5710998819', '648.000', '5483; 0065.PJ/MUM.01.01/A.BLG/17 MEI 17           ', '\r\n'),
(2, 900008236, 'MITRA COPIERINDO MANDIRI, PT                      ', 'BANK CENTRAL ASIA SUNTER CABANG PEMBANTU GRAHA KIR', '5710998819', '648.000', '5483; 0065.PJ/MUM.01.01/A.BLG/17 AGT 17           ', '\r\n'),
(3, 900008237, 'MITRA COPIERINDO MANDIRI, PT                      ', 'BANK CENTRAL ASIA SUNTER CABANG PEMBANTU GRAHA KIR', '5710998819', '648.000', '5483; 0065.PJ/MUM.01.01/A.BLG/17 JUL 17           ', '\r\n'),
(4, 900008267, 'MITRA COPIERINDO MANDIRI, PT                      ', 'BANK CENTRAL ASIA SUNTER CABANG PEMBANTU GRAHA KIR', '5710998819', '648.000', '5483; 0065.PJ/MUM.01.01/A.BLG/17 JUN17            ', '\r\n'),
(5, 900008242, 'PT.TOTAL TOLERANSI JAYA                           ', 'Bank Negara Indonesia Harmoni Jakarta - Harmoni Ja', '0114856350', '55.722.168', '5483; 0015.PJ/DAN.02.03/A.BLG/17 JUL 17 P2TL      ', '\r\n'),
(6, 900008241, 'PT HAFIZ ENERGI TAMA                              ', 'Bank Mandiri Cibubur Indah Blok. A No. 22-23 Jakar', '1290010093835', '48.183.350', '5483; 0050.PJ/DAN.02.03/A.BLG/17 JUN 17 AMR TR    ', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

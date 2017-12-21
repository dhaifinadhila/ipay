-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 08:19 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pembayaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE IF NOT EXISTS `tb_data` (
  `id` int(11) NOT NULL,
  `no_dokumen` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `no_rekening` char(20) NOT NULL,
  `jumlah_idr` char(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `mail_al` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id`, `no_dokumen`, `nama`, `bank`, `no_rekening`, `jumlah_idr`, `keterangan`, `mail_al`, `status`) VALUES
(1, 900008235, 'MITRA COPIERINDO MANDIRI, PT                                ', 'BANK CENTRAL ASIA SUNTER CABANG PEMBANTU GRAHA KIRANA JAKARTA                                       ', '5710998819', '648.000', '5483; 0065.PJ/MUM.01.01/A.BLG/17 MEI 17           ', 'putriarchita@gmail.com', 0),
(2, 900008236, 'MITRA COPIERINDO MANDIRI, PT                                ', 'BANK CENTRAL ASIA SUNTER CABANG PEMBANTU GRAHA KIRANA JAKARTA                                       ', '5710998819', '648.000', '5483; 0065.PJ/MUM.01.01/A.BLG/17 AGT 17           ', 'kustan@gmail.com', 1),
(3, 900008237, 'MITRA COPIERINDO MANDIRI, PT                                ', 'BANK CENTRAL ASIA SUNTER CABANG PEMBANTU GRAHA KIRANA JAKARTA                                       ', '5710998819', '648.000', '5483; 0065.PJ/MUM.01.01/A.BLG/17 JUL 17           ', '', 0),
(4, 900008267, 'MITRA COPIERINDO MANDIRI, PT                                ', 'BANK CENTRAL ASIA SUNTER CABANG PEMBANTU GRAHA KIRANA JAKARTA                                       ', '5710998819', '648.000', '5483; 0065.PJ/MUM.01.01/A.BLG/17 JUN17            ', '', 0),
(5, 900008242, 'PT.TOTAL TOLERANSI JAYA                                     ', 'Bank Negara Indonesia Harmoni Jakarta - Harmoni Jakarta                                             ', '0114856350', '55.722.168', '5483; 0015.PJ/DAN.02.03/A.BLG/17 JUL 17 P2TL      ', '', 0),
(6, 900008241, 'PT HAFIZ ENERGI TAMA                                        ', 'Bank Mandiri Cibubur Indah Blok. A No. 22-23 Jakarta - Cibubur Jakarta                              ', '1290010093835', '48.183.350', '5483; 0050.PJ/DAN.02.03/A.BLG/17 JUN 17 AMR TR    ', '', 0),
(7, 900008239, 'PT.Pratomo Krasak Sejati                                    ', 'BCA JLN. BUARAN RAYA BLOK A NO. 100 DAN KCP BUARAN RAYA 6330 JAKARTA                                ', '4123003708', '10.953.283', '5481 Jasa tusbung 07-17 038.PJ/DAN203/APDG/2017   ', '\r\n', 0),
(8, 900008238, 'PT. XL AXIATA Tbk                                           ', 'Bank Mandiri Jl. Denpasar Kav. D III, Gedung RNI Jakarta - Mega Kuningan Jakarta                    ', '1240004170818', '33.980.000', '5481 GSM XL AXIATA JUL 17                         ', 'bsugiharto@xl.co.id\r\n', 0),
(9, 900008240, 'PT. XL AXIATA Tbk                                           ', 'Bank Mandiri Jl. Denpasar Kav. D III, Gedung RNI Jakarta - Mega Kuningan Jakarta                    ', '1240004170818', '33.980.000', '5481 GSM XL AXIATA JUL 17                         ', 'bsugiharto@xl.co.id\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `created_at`) VALUES
(1, 'archita', 'archita', 'e10adc3949ba59abbe56e057f20f883e', '2017-10-02 14:52:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `no_dokumen` (`no_dokumen`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

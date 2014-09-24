-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2014 at 04:19 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `notary`
--

-- --------------------------------------------------------

--
-- Table structure for table `akta`
--

CREATE TABLE IF NOT EXISTS `akta` (
  `AKTAID` int(11) NOT NULL AUTO_INCREMENT,
  `AKTADESC` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`AKTAID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `akta`
--

INSERT INTO `akta` (`AKTAID`, `AKTADESC`, `deleted`) VALUES
(1, 'AKTA PERJANJIAN MEMBUKA FASILITAS KREDIT MODAL KERJA (KMK)', 0),
(2, 'AKTA PERJANJIAN KREDIT INVESTASI (KI)', 0),
(3, 'SKMHT', 0),
(4, 'AKTA JUAL BELI', 0),
(5, 'APHT', 0),
(6, 'AKTA AKAD PEMBIAYAAN AL MURABAHAH BIL WAKALAH', 0),
(7, 'AKTA PERJANJIAN KREDIT ( PINJAMAN REKENING KORAN (PRK) )', 0),
(8, 'AKTA PENGAKUAN HUTANG ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `aktasertifikat`
--

CREATE TABLE IF NOT EXISTS `aktasertifikat` (
  `AKTATRANID` int(11) NOT NULL DEFAULT '0',
  `SERTIFIKATID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`AKTATRANID`,`SERTIFIKATID`),
  KEY `SERTIFIKATID` (`SERTIFIKATID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktasertifikat`
--

INSERT INTO `aktasertifikat` (`AKTATRANID`, `SERTIFIKATID`) VALUES
(8, 1),
(10, 2),
(12, 3),
(13, 4),
(15, 5),
(18, 6),
(19, 7);

-- --------------------------------------------------------

--
-- Table structure for table `aktatran`
--

CREATE TABLE IF NOT EXISTS `aktatran` (
  `AKTATRANID` int(11) NOT NULL AUTO_INCREMENT,
  `AKTAID` int(11) NOT NULL,
  `TRANSAKSIPRAID` int(11) NOT NULL,
  `CURRENTPROSES` int(11) NOT NULL,
  `STATUSAKTAID` int(11) DEFAULT NULL,
  `NOAKTA` varchar(100) DEFAULT NULL,
  `TGLMULAI` date NOT NULL,
  `TGLSELESAI` date NOT NULL,
  `NOTARISAKTA` varchar(100) NOT NULL,
  PRIMARY KEY (`AKTATRANID`),
  KEY `AKTAID` (`AKTAID`,`TRANSAKSIPRAID`),
  KEY `TRANSAKSIPRAID` (`TRANSAKSIPRAID`),
  KEY `STATUSAKTAID` (`STATUSAKTAID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `aktatran`
--

INSERT INTO `aktatran` (`AKTATRANID`, `AKTAID`, `TRANSAKSIPRAID`, `CURRENTPROSES`, `STATUSAKTAID`, `NOAKTA`, `TGLMULAI`, `TGLSELESAI`, `NOTARISAKTA`) VALUES
(2, 1, 6, 1, 1, '05', '2014-09-01', '0000-00-00', 'Dr. RANTI FAUZA MAYANA, SH.'),
(4, 1, 7, 1, 1, '05', '2014-09-01', '0000-00-00', 'Dr. RANTI FAUZA MAYANA, SH.'),
(5, 1, 8, 3, 1, '05', '2014-09-01', '2014-10-16', 'Dr. RANTI FAUZA MAYANA, SH.'),
(6, 1, 9, 1, 1, '02', '2014-09-01', '0000-00-00', 'Dr. RANTI FAUZA MAYANA, SH.'),
(7, 2, 9, 1, 1, '03', '2014-09-01', '0000-00-00', 'Dr. RANTI FAUZA MAYANA, SH.'),
(8, 3, 9, 5, 1, '04', '2014-09-01', '1970-02-16', ''),
(9, 6, 10, 1, 1, '09', '2014-09-02', '0000-00-00', 'Dr. RANTI FAUZA MAYANA, SH.'),
(10, 3, 10, 6, 1, '10', '2014-09-02', '1970-02-16', 'Dr. RANTI FAUZA MAYANA, SH.'),
(11, 1, 11, 1, 1, '14', '2014-09-02', '0000-00-00', 'Dr. RANTI FAUZA MAYANA, SH.'),
(12, 5, 11, 8, 1, '2384/2014', '2014-09-02', '1970-02-16', 'Dr. RANTI FAUZA MAYANA, SH.'),
(13, 3, 12, 9, 1, '12', '2014-09-02', '1970-02-16', 'Dr. RANTI FAUZA MAYANA, SH.'),
(14, 1, 13, 1, 1, '17', '2014-09-03', '0000-00-00', 'Dr. RANTI FAUZA MAYANA, SH.'),
(15, 3, 13, 11, 1, '2395/2014', '2014-09-03', '1970-02-16', 'Dr. RANTI FAUZA MAYANA, SH.'),
(16, 3, 14, 14, 1, '16', '2014-09-03', '2014-10-03', 'Dr. RANTI FAUZA MAYANA, SH.'),
(18, 5, 16, 15, 1, '2394/2014', '2014-09-03', '2014-10-03', 'Dr. RANTI FAUZA MAYANA, SH.'),
(19, 3, 17, 18, 1, '16', '2014-09-03', '1970-02-16', 'Dr. RANTI FAUZA MAYANA, SH.'),
(20, 8, 18, 1, 1, '23', '2014-09-04', '0000-00-00', 'Ranti'),
(21, 3, 18, 1, 1, '2397/2014', '2014-09-04', '0000-00-00', 'Dr. RANTI FAUZA MAYANA, SH.');

-- --------------------------------------------------------

--
-- Table structure for table `aktivitasnotaris`
--

CREATE TABLE IF NOT EXISTS `aktivitasnotaris` (
  `AKTIVITASNOTID` int(11) NOT NULL AUTO_INCREMENT,
  `EMPLOYEEID` int(11) DEFAULT NULL,
  `AWALAKTIFITAS` datetime NOT NULL,
  `AKHIRAKTIFITAS` datetime NOT NULL,
  `TOTALJAM` varchar(5) NOT NULL,
  `AKTIFITASDESC` varchar(75) NOT NULL,
  PRIMARY KEY (`AKTIVITASNOTID`),
  KEY `FK_RELATIONSHIP_31` (`EMPLOYEEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `aktivitasnotaris`
--


-- --------------------------------------------------------

--
-- Table structure for table `bankrekening`
--

CREATE TABLE IF NOT EXISTS `bankrekening` (
  `BANKREKID` int(11) NOT NULL AUTO_INCREMENT,
  `BANKUTAMAID` int(11) DEFAULT NULL,
  `BANKREKDESC` varchar(100) NOT NULL,
  `ALAMATBANKREK` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`BANKREKID`),
  KEY `FK_RELATIONSHIP_39` (`BANKUTAMAID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bankrekening`
--

INSERT INTO `bankrekening` (`BANKREKID`, `BANKUTAMAID`, `BANKREKDESC`, `ALAMATBANKREK`) VALUES
(1, 4, 'BANK RAKYAT INDONESIA', 'DEWI SARTIKA'),
(2, 5, 'BANK PEMBANGUNAN JAWA BARAT DAN BANTEN', 'JAMIKA'),
(3, 3, 'BRI-AA', 'ASIA AFRIKA'),
(4, 9, 'BANK TABUNGAN NEGARA ', 'JAWA'),
(5, 10, 'BRI-OTISTA', 'OTO ISKANDARDINATA'),
(6, 7, 'BANK TABUNGAN NEGARA', 'ANTAPANI'),
(7, 11, 'BANK MANDIRI-SYARIAH', 'AHMAD YANI'),
(8, 12, 'NIAGA-HR', 'GATSU'),
(9, 13, 'MANDIRI-BATUNUNGGAL', 'BATUNUNGGAL'),
(10, 14, 'PANIN', 'ASIA AFRIKA');

-- --------------------------------------------------------

--
-- Table structure for table `bankutama`
--

CREATE TABLE IF NOT EXISTS `bankutama` (
  `BANKUTAMAID` int(11) NOT NULL AUTO_INCREMENT,
  `BANKUTAMADESC` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`BANKUTAMAID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `bankutama`
--

INSERT INTO `bankutama` (`BANKUTAMAID`, `BANKUTAMADESC`) VALUES
(1, 'BNI PERINTIS'),
(3, 'BRI-AA'),
(4, 'BRI-DS'),
(5, 'BJB-SYARIAH BRAGA'),
(6, 'BJB SUKAJADI'),
(7, 'BTN-ANTAPANI'),
(8, 'BTN-CIJERAH'),
(9, 'BTN-JAWA'),
(10, 'BRI-OTISTA'),
(11, 'SYARIAH-MANDIRI'),
(12, 'NIAGA-HR'),
(13, 'MANDIRI-BATUNUNGGAL'),
(14, 'PANIN');

-- --------------------------------------------------------

--
-- Table structure for table `biayadefault`
--

CREATE TABLE IF NOT EXISTS `biayadefault` (
  `BIAYADEFAULT` varchar(13) DEFAULT NULL,
  `IDBIAYADEFAULT` int(11) NOT NULL AUTO_INCREMENT,
  `PROSESID` int(11) DEFAULT NULL,
  `STATUSPROSESID` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDBIAYADEFAULT`),
  KEY `FK_RELATIONSHIP_43` (`PROSESID`),
  KEY `FK_RELATIONSHIP_44` (`STATUSPROSESID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `biayadefault`
--


-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chat`
--


-- --------------------------------------------------------

--
-- Table structure for table `contactditail`
--

CREATE TABLE IF NOT EXISTS `contactditail` (
  `CONTACTID` int(11) NOT NULL AUTO_INCREMENT,
  `EMPLOYEEID` int(11) DEFAULT NULL,
  `GEDUNG` varchar(60) DEFAULT NULL,
  `LANTAIGEDUNG` varchar(4) DEFAULT NULL,
  `JALAN` varchar(120) DEFAULT NULL,
  `RT` varchar(5) DEFAULT NULL,
  `RW` varchar(5) DEFAULT NULL,
  `KELURAHANDESA` varchar(60) DEFAULT NULL,
  `KECAMATAN` varchar(60) DEFAULT NULL,
  `DATI2` varchar(60) DEFAULT NULL,
  `DATI1` varchar(60) DEFAULT NULL,
  `NEGARA` varchar(60) DEFAULT NULL,
  `KODEPOS` varchar(10) DEFAULT NULL,
  `NOTELP` varchar(16) DEFAULT NULL,
  `NOHP` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CONTACTID`),
  KEY `FK_RELATIONSHIP_4` (`EMPLOYEEID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `contactditail`
--

INSERT INTO `contactditail` (`CONTACTID`, `EMPLOYEEID`, `GEDUNG`, `LANTAIGEDUNG`, `JALAN`, `RT`, `RW`, `KELURAHANDESA`, `KECAMATAN`, `DATI2`, `DATI1`, `NEGARA`, `KODEPOS`, `NOTELP`, `NOHP`, `EMAIL`) VALUES
(1, 2, '', '', 'DR. CIPTO 23', '', '', '', '', 'JAWA BARAT', 'BANDUNG', 'INDONESIA', '', '', '', ''),
(2, 3, '', '', 'DR. CIPTO 23', '', '', '', '', 'JAWA BARAT', 'BANDUNG', 'INDONESIA', '', '', '', ''),
(3, 4, '', '', 'DR. CIPTO 23', '', '', '', '', 'JAWA BARAT', 'BANDUNG', 'INDONESIA', '', '', '', ''),
(4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactditailcustomer`
--

CREATE TABLE IF NOT EXISTS `contactditailcustomer` (
  `CONTACTIDCUST` int(11) NOT NULL AUTO_INCREMENT,
  `CUSTOMERID` int(11) DEFAULT NULL,
  `GEDUNGCUST` varchar(60) DEFAULT NULL,
  `LANTAICUST` varchar(4) DEFAULT NULL,
  `JALANCUST` varchar(120) DEFAULT NULL,
  `RTCUST` varchar(5) DEFAULT NULL,
  `RWCUST` varchar(5) DEFAULT NULL,
  `KELURAHANCUST` varchar(60) DEFAULT NULL,
  `KECAMATANCUST` varchar(60) DEFAULT NULL,
  `DATI2CUST` varchar(60) DEFAULT NULL,
  `DATI1CUST` varchar(60) DEFAULT NULL,
  `NEGARACUST` varchar(60) DEFAULT NULL,
  `KODEPOSCUST` varchar(10) DEFAULT NULL,
  `NOTELPCUST` varchar(16) DEFAULT NULL,
  `NOHPCUST` varchar(100) DEFAULT NULL,
  `NOFAXCUST` varchar(12) DEFAULT NULL,
  `NAMAPERUSAHAAN` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CONTACTIDCUST`),
  KEY `FK_RELATIONSHIP_13` (`CUSTOMERID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `contactditailcustomer`
--

INSERT INTO `contactditailcustomer` (`CONTACTIDCUST`, `CUSTOMERID`, `GEDUNGCUST`, `LANTAICUST`, `JALANCUST`, `RTCUST`, `RWCUST`, `KELURAHANCUST`, `KECAMATANCUST`, `DATI2CUST`, `DATI1CUST`, `NEGARACUST`, `KODEPOSCUST`, `NOTELPCUST`, `NOHPCUST`, `NOFAXCUST`, `NAMAPERUSAHAAN`, `EMAIL`) VALUES
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `covernote`
--

CREATE TABLE IF NOT EXISTS `covernote` (
  `COVERNOTEID` int(11) NOT NULL AUTO_INCREMENT,
  `TIPEWILAYAHID` int(11) DEFAULT NULL,
  `KEL_DESA` varchar(100) NOT NULL,
  `NOCOVERNOTE` varchar(100) DEFAULT NULL,
  `TGLAKAD` date DEFAULT NULL,
  `NOSERTIFIKAT` varchar(20) DEFAULT NULL,
  `NMPEMILIKSERTF` varchar(60) DEFAULT NULL,
  `CNSCANNEDFILE` varchar(40) DEFAULT NULL,
  `TRANSAKSIPRAID` int(11) NOT NULL,
  `TANGGALINPUT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `TGLSELESAI` date DEFAULT NULL,
  PRIMARY KEY (`COVERNOTEID`),
  KEY `FK_RELATIONSHIP_40` (`TIPEWILAYAHID`),
  KEY `TRANSAKSIPRAID` (`TRANSAKSIPRAID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `covernote`
--

INSERT INTO `covernote` (`COVERNOTEID`, `TIPEWILAYAHID`, `KEL_DESA`, `NOCOVERNOTE`, `TGLAKAD`, `NOSERTIFIKAT`, `NMPEMILIKSERTF`, `CNSCANNEDFILE`, `TRANSAKSIPRAID`, `TANGGALINPUT`, `TGLSELESAI`) VALUES
(2, NULL, '', '1654', '2014-09-01', NULL, NULL, NULL, 6, '2014-09-02 17:32:20', '2015-03-01'),
(3, NULL, '', '1654', '2014-09-01', NULL, NULL, NULL, 7, '2014-09-02 17:32:59', '2015-03-01'),
(4, NULL, '', '1654', '2014-09-01', NULL, NULL, NULL, 8, '2014-09-02 17:33:34', '2015-03-01'),
(5, NULL, '', '1653', '2014-09-01', NULL, NULL, NULL, 9, '2014-09-02 19:13:06', '2015-03-01'),
(6, NULL, '', '1656', '2014-09-02', NULL, NULL, NULL, 10, '2014-09-02 19:18:43', '2015-03-02'),
(7, NULL, '', '1658', '2014-09-02', NULL, NULL, NULL, 11, '2014-09-02 19:25:39', '2015-03-01'),
(8, NULL, '', '1657', '2014-09-02', NULL, NULL, NULL, 12, '2014-09-02 19:31:52', '2015-03-02'),
(9, NULL, '', '1662', '2014-09-03', NULL, NULL, NULL, 13, '2014-09-03 14:00:40', '2015-03-03'),
(10, NULL, '', '1659', '2014-09-03', NULL, NULL, NULL, 14, '2014-09-03 14:32:52', '2015-03-03'),
(12, NULL, '', '1661', '2014-09-03', NULL, NULL, NULL, 16, '2014-09-03 15:33:21', '2015-02-03'),
(13, NULL, '', '1660', '2014-09-03', NULL, NULL, NULL, 17, '2014-09-03 19:10:08', '2015-03-03'),
(14, NULL, '', '1664', '2014-09-04', NULL, NULL, NULL, 18, '2014-09-04 14:16:27', '2015-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CUSTOMERID` int(11) NOT NULL AUTO_INCREMENT,
  `PEKERJAANID` int(11) DEFAULT NULL,
  `GENDER` int(11) DEFAULT NULL,
  `IDENTITASPERSONALID` int(11) DEFAULT NULL,
  `TIPECUSTID` int(11) DEFAULT NULL,
  `NAMACUST` varchar(100) NOT NULL,
  `TANGGALLAHIRCUST` date DEFAULT NULL,
  `NOIDPERSONALCUST` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`CUSTOMERID`),
  KEY `FK_RELATIONSHIP_12` (`PEKERJAANID`),
  KEY `FK_RELATIONSHIP_14` (`GENDER`),
  KEY `FK_RELATIONSHIP_15` (`IDENTITASPERSONALID`),
  KEY `FK_RELATIONSHIP_16` (`TIPECUSTID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTOMERID`, `PEKERJAANID`, `GENDER`, `IDENTITASPERSONALID`, `TIPECUSTID`, `NAMACUST`, `TANGGALLAHIRCUST`, `NOIDPERSONALCUST`) VALUES
(1, NULL, NULL, NULL, 1, 'ALBERT KARTAWIJAYA DAN FANIA ALODIA', NULL, ''),
(2, NULL, NULL, NULL, 1, 'TETI HENDRAWATI Hj', NULL, ''),
(3, NULL, NULL, NULL, 1, 'SITI ROHANAH', NULL, ''),
(4, NULL, NULL, NULL, 1, 'TAOFIQ ZULKARNAEN ALKAF DAN ELI YULIANTI', NULL, ''),
(5, NULL, NULL, NULL, 1, 'ADENG MARYANA', NULL, ''),
(6, NULL, NULL, NULL, 1, 'NENENG TINI', NULL, ''),
(7, NULL, NULL, NULL, 1, 'ALIT ARIEF YUNIARDI', NULL, ''),
(8, NULL, NULL, NULL, 1, 'ANDRIAN NORMAN', NULL, ''),
(9, NULL, NULL, NULL, 1, 'IWAN TEDY SETIAWAN', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `customertrans`
--

CREATE TABLE IF NOT EXISTS `customertrans` (
  `CUSTOMERID` int(11) NOT NULL,
  `TRANSAKSIPRAID` int(11) NOT NULL,
  PRIMARY KEY (`CUSTOMERID`,`TRANSAKSIPRAID`),
  KEY `TRANSAKSIPRAID` (`TRANSAKSIPRAID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customertrans`
--

INSERT INTO `customertrans` (`CUSTOMERID`, `TRANSAKSIPRAID`) VALUES
(1, 6),
(1, 7),
(1, 8),
(2, 9),
(3, 10),
(4, 11),
(5, 12),
(6, 13),
(7, 14),
(8, 16),
(7, 17),
(9, 18);

-- --------------------------------------------------------

--
-- Table structure for table `daftarrekening`
--

CREATE TABLE IF NOT EXISTS `daftarrekening` (
  `REKENINGID` int(11) NOT NULL AUTO_INCREMENT,
  `BANKREKID` int(11) DEFAULT NULL,
  `NOREKENING` varchar(20) NOT NULL,
  `NMREKENING` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`REKENINGID`),
  KEY `FK_RELATIONSHIP_41` (`BANKREKID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `daftarrekening`
--

INSERT INTO `daftarrekening` (`REKENINGID`, `BANKREKID`, `NOREKENING`, `NMREKENING`) VALUES
(1, 1, '02199120102', 'Danang');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE IF NOT EXISTS `developer` (
  `DEVELOPERID` int(11) NOT NULL AUTO_INCREMENT,
  `DEVELOPERDESC` varchar(120) NOT NULL,
  PRIMARY KEY (`DEVELOPERID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`DEVELOPERID`, `DEVELOPERDESC`) VALUES
(1, 'PT. Adhi Karya'),
(2, 'PT. Podomoro Land'),
(3, 'PT. Honda');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
  `DOKUMENID` int(11) NOT NULL AUTO_INCREMENT,
  `TRANSAKSIPRAID` int(11) DEFAULT NULL,
  `TIPEDOKUMENID` int(11) DEFAULT NULL,
  `IDSTATUSDOC` int(11) DEFAULT NULL,
  `SCANNEDDOKFILE` text,
  `asli` int(10) NOT NULL COMMENT '0=tidak asli 1=asli',
  PRIMARY KEY (`DOKUMENID`),
  KEY `FK_RELATIONSHIP_35` (`TIPEDOKUMENID`),
  KEY `FK_RELATIONSHIP_42` (`IDSTATUSDOC`),
  KEY `TRANSAKSIPRAID` (`TRANSAKSIPRAID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dokumen`
--


-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `EMPLOYEEID` int(11) NOT NULL AUTO_INCREMENT,
  `GENDER` int(11) DEFAULT NULL,
  `IDENTITASPERSONALID` int(11) DEFAULT NULL,
  `TITLEID` int(11) DEFAULT NULL,
  `JABATANID` int(11) DEFAULT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `NAMALENGKAP` varchar(100) NOT NULL,
  `TANGGALLAHIR` date NOT NULL,
  `NOIDENTITASPERSONAL` varchar(40) DEFAULT NULL,
  `IS_PJ` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=tidak,1=ya',
  PRIMARY KEY (`EMPLOYEEID`),
  KEY `FK_RELATIONSHIP_1` (`GENDER`),
  KEY `FK_RELATIONSHIP_11` (`JABATANID`),
  KEY `FK_RELATIONSHIP_2` (`IDENTITASPERSONALID`),
  KEY `FK_RELATIONSHIP_3` (`TITLEID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEEID`, `GENDER`, `IDENTITASPERSONALID`, `TITLEID`, `JABATANID`, `NIP`, `NAMALENGKAP`, `TANGGALLAHIR`, `NOIDENTITASPERSONAL`, `IS_PJ`) VALUES
(1, 1, 1, 1, 8, '000000000', 'Administrator', '2014-03-06', '000000000', '0'),
(2, 2, 1, NULL, 6, '123', 'ICHA', '1970-01-01', '', '1'),
(3, 2, 1, NULL, 1, '123', 'Dr. RANTI FAUZA MAYANA, SH.', '1970-01-01', '', '0'),
(4, 1, 1, NULL, 7, '123', 'CHA CHA', '1970-01-01', '', '0'),
(5, 2, 1, NULL, 6, '123', 'SUSAN', '1970-01-01', '', '1'),
(6, 2, 1, NULL, 6, '123', 'SANTI', '1970-01-01', '', '1'),
(7, 2, 1, NULL, 6, '123', 'AISYAH', '1970-01-01', '', '1'),
(8, 1, 1, NULL, 6, '123', 'DUDI', '1970-01-01', '', '1'),
(9, 1, 1, NULL, 6, '123', 'SAE', '1970-01-01', '', '1'),
(10, 1, 1, NULL, 6, '123', 'SAE', '1970-01-01', '', '1'),
(11, 1, 1, NULL, 6, '123', 'ROHMAN', '1970-01-01', '', '1'),
(12, 2, 1, NULL, 6, '123', 'ACIE', '1970-01-01', '', '1'),
(13, 2, 1, NULL, 6, '123', 'PUTRI', '1970-01-01', '', '1'),
(14, 2, 1, NULL, 6, '123', 'ACIE', '1970-01-01', '', '1'),
(15, 2, 1, NULL, 6, '123', 'RANI', '1970-01-01', '', '1'),
(16, 2, 1, NULL, 6, '123', 'UPI', '1970-01-01', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `eskalasi`
--

CREATE TABLE IF NOT EXISTS `eskalasi` (
  `EKSKAID` int(11) NOT NULL AUTO_INCREMENT,
  `EMPLOYEEID` int(11) DEFAULT NULL,
  `TARGET` int(11) DEFAULT NULL,
  `ALASAN` text,
  `TIMESTAMP` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `APPROVAL` int(11) DEFAULT '0' COMMENT '0=belum, 1=diterima, 2=ditolak',
  `AKTATRANID` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `CURRENTPROSES` int(11) DEFAULT NULL,
  PRIMARY KEY (`EKSKAID`),
  KEY `TARGET` (`TARGET`),
  KEY `EMPLOYEEID` (`EMPLOYEEID`),
  KEY `AKTATRANID` (`AKTATRANID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `eskalasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `FOTOID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUSDISPLAYID` int(11) DEFAULT NULL,
  `EMPLOYEEID` int(11) DEFAULT NULL,
  `IMAGE` longblob,
  `NAMAFILEIMAGE` varchar(40) DEFAULT NULL,
  `UKURANFILE` varchar(20) DEFAULT NULL,
  `TIPEFILE` varchar(20) DEFAULT NULL,
  `PANJANGIMAGE` varchar(5) DEFAULT NULL,
  `LEBARIMAGE` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`FOTOID`),
  KEY `FK_RELATIONSHIP_5` (`STATUSDISPLAYID`),
  KEY `FK_RELATIONSHIP_6` (`EMPLOYEEID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`FOTOID`, `STATUSDISPLAYID`, `EMPLOYEEID`, `IMAGE`, `NAMAFILEIMAGE`, `UKURANFILE`, `TIPEFILE`, `PANJANGIMAGE`, `LEBARIMAGE`) VALUES
(1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, 16, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `GENDER` int(11) NOT NULL AUTO_INCREMENT,
  `GENDERDESC` varchar(20) NOT NULL,
  PRIMARY KEY (`GENDER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`GENDER`, `GENDERDESC`) VALUES
(1, 'Pria'),
(2, 'Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `identitaspersonal`
--

CREATE TABLE IF NOT EXISTS `identitaspersonal` (
  `IDENTITASPERSONALID` int(11) NOT NULL AUTO_INCREMENT,
  `IDENTITASPERSONALDESC` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IDENTITASPERSONALID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `identitaspersonal`
--

INSERT INTO `identitaspersonal` (`IDENTITASPERSONALID`, `IDENTITASPERSONALDESC`) VALUES
(1, 'KTP'),
(2, 'SIM'),
(3, 'PASPORT');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `JABATANID` int(11) NOT NULL AUTO_INCREMENT,
  `JABATANDESC` varchar(40) DEFAULT NULL,
  `GRUP` int(2) NOT NULL,
  PRIMARY KEY (`JABATANID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`JABATANID`, `JABATANDESC`, `GRUP`) VALUES
(1, 'Notaris', 1),
(2, 'Wakil Notaris', 1),
(3, 'Kepala Bidang', 2),
(4, 'Kepala Seksi', 2),
(5, 'Staff', 3),
(6, 'PIC', 3),
(7, 'Supervisor', 2),
(8, 'admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jadwallibur`
--

CREATE TABLE IF NOT EXISTS `jadwallibur` (
  `JDWLLIBURID` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` int(11) DEFAULT NULL,
  `EMPLOYEEID` int(11) DEFAULT NULL,
  `TGGLLIBUR` date NOT NULL,
  PRIMARY KEY (`JDWLLIBURID`),
  KEY `FK_RELATIONSHIP_32` (`USERID`),
  KEY `FK_RELATIONSHIP_33` (`EMPLOYEEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `jadwallibur`
--


-- --------------------------------------------------------

--
-- Table structure for table `kantorproses`
--

CREATE TABLE IF NOT EXISTS `kantorproses` (
  `KANTORPROSESID` int(11) NOT NULL AUTO_INCREMENT,
  `KANTORPROSES` varchar(100) NOT NULL,
  PRIMARY KEY (`KANTORPROSESID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kantorproses`
--

INSERT INTO `kantorproses` (`KANTORPROSESID`, `KANTORPROSES`) VALUES
(1, 'BPN-KOTA'),
(3, 'PAJAK'),
(4, 'BANK'),
(5, 'BPN-KABUPATEN'),
(6, 'BPN-CIMAHI'),
(7, 'BPN-KBB'),
(8, 'DEBITUR'),
(9, 'DEVELOPER');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `MENUID` int(11) NOT NULL AUTO_INCREMENT,
  `MENUDESC` varchar(60) NOT NULL,
  `PARENT` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MENUID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MENUID`, `MENUDESC`, `PARENT`) VALUES
(1, 'Notifikasi', 0),
(2, 'Proses', 0),
(3, 'Pra-Realisasi', 1),
(4, 'Realisasi', 1),
(5, 'Pasca-Realisasi', 1),
(6, 'Pembayaran', 1),
(7, 'Master Data', 0),
(8, 'Common Master', 1),
(9, 'Proses Master', 1),
(10, 'Financial Master', 1),
(11, 'Setup', 1),
(12, 'Form Master', 1),
(13, 'Kinerja', 0),
(14, 'Laporan', 0),
(15, 'Chat', 0),
(16, 'Help', 0),
(17, 'Daftar Transaksi', 0),
(18, 'Transaksi Baru', 0),
(19, 'Input Semua', 0),
(20, 'Validasi Dokumen', 0),
(21, 'Monitoring Dokumen', 0),
(22, 'Drop Pra-Realisasi', 0),
(23, 'Penjadwalan', 0),
(24, 'Penyerahan Dokumen', 0),
(25, 'Covernote', 0),
(26, 'Monitoring', 0),
(27, 'Ekskalasi', 0),
(28, 'Approval', 0),
(29, 'Update Proses', 0),
(30, 'Customer', 0),
(31, 'Employee', 0),
(32, 'Admin', 0),
(33, 'Data Customer', 0),
(34, 'Entry Customer', 0),
(35, 'Data Employee', 0),
(36, 'Entry Employee', 0),
(37, 'Akun', 0),
(38, 'Otorisasi', 0),
(39, 'Data Customer', 0),
(40, 'Data Employee', 0),
(41, 'Konfigurasi Menu', 0),
(42, 'Set-Up Proses', 0),
(43, 'Set-Up Timeline', 0),
(44, 'Set-Up Akta', 0),
(45, 'Tipe Sertifikat', 0),
(46, 'Data Proses', 0),
(47, 'Masukan Proses Baru', 0),
(48, 'Setup Akta Dokumen', 0),
(49, 'User-defined Alert', 0),
(50, 'Set Default', 0),
(51, 'Approval/Escalation', 0),
(52, 'PROSES', 0),
(53, 'ALERT', 0),
(54, 'Setup Akta', 0),
(55, 'Kantor Proses', 0),
(56, 'Input Data', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `NOTIFIKASIID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS` int(11) NOT NULL DEFAULT '0' COMMENT '0=new, 1= unnew',
  `TIPE` int(11) NOT NULL COMMENT '0=approval 1=accepted 2=alert',
  `MESSAGE1` varchar(60) NOT NULL,
  `MESSAGE2` varchar(60) NOT NULL,
  `EMPLOYEEID` int(11) DEFAULT NULL,
  `LINK` varchar(60) NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PROSESTRANID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`NOTIFIKASIID`),
  KEY `EMPLOYEEID` (`EMPLOYEEID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `notifikasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `otoritas`
--

CREATE TABLE IF NOT EXISTS `otoritas` (
  `OTORITASID` int(11) NOT NULL AUTO_INCREMENT,
  `OTORITASDESC` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`OTORITASID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `otoritas`
--

INSERT INTO `otoritas` (`OTORITASID`, `OTORITASDESC`) VALUES
(1, 'Operator'),
(2, 'Supervisor'),
(3, 'Admin'),
(4, 'Notaris');

-- --------------------------------------------------------

--
-- Table structure for table `otoritasmenu`
--

CREATE TABLE IF NOT EXISTS `otoritasmenu` (
  `MENUID` int(11) NOT NULL,
  `OTORITASID` int(11) NOT NULL,
  `allow` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MENUID`,`OTORITASID`),
  KEY `FK_OTORITASMENU2` (`OTORITASID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otoritasmenu`
--

INSERT INTO `otoritasmenu` (`MENUID`, `OTORITASID`, `allow`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(2, 4, 0),
(3, 1, 0),
(3, 2, 0),
(3, 3, 0),
(3, 4, 0),
(4, 1, 0),
(4, 2, 0),
(4, 3, 0),
(4, 4, 0),
(5, 1, 0),
(5, 2, 0),
(5, 3, 0),
(5, 4, 0),
(6, 1, 0),
(6, 2, 0),
(6, 3, 0),
(6, 4, 0),
(7, 1, 0),
(7, 2, 0),
(7, 3, 0),
(7, 4, 0),
(8, 1, 0),
(8, 2, 0),
(8, 3, 0),
(8, 4, 0),
(9, 1, 0),
(9, 2, 0),
(9, 3, 0),
(9, 4, 0),
(10, 1, 0),
(10, 2, 0),
(10, 3, 0),
(10, 4, 0),
(11, 1, 0),
(11, 2, 0),
(11, 3, 0),
(11, 4, 0),
(12, 1, 0),
(12, 2, 0),
(12, 3, 0),
(12, 4, 0),
(13, 1, 0),
(13, 2, 0),
(13, 3, 0),
(13, 4, 0),
(14, 1, 0),
(14, 2, 0),
(14, 3, 0),
(14, 4, 0),
(15, 1, 0),
(15, 2, 0),
(15, 3, 0),
(15, 4, 0),
(16, 1, 0),
(16, 2, 0),
(16, 3, 0),
(16, 4, 0),
(17, 1, 0),
(17, 2, 0),
(17, 3, 0),
(17, 4, 0),
(18, 1, 1),
(18, 2, 1),
(18, 3, 1),
(18, 4, 1),
(19, 1, 1),
(19, 2, 1),
(19, 3, 1),
(19, 4, 1),
(20, 1, 0),
(20, 2, 0),
(20, 3, 0),
(20, 4, 0),
(21, 1, 0),
(21, 2, 0),
(21, 3, 0),
(21, 4, 0),
(22, 1, 0),
(22, 2, 0),
(22, 3, 0),
(22, 4, 0),
(23, 1, 0),
(23, 2, 0),
(23, 3, 0),
(23, 4, 0),
(24, 1, 0),
(24, 2, 0),
(24, 3, 0),
(24, 4, 0),
(25, 1, 0),
(25, 2, 0),
(25, 3, 0),
(25, 4, 0),
(26, 1, 0),
(26, 2, 0),
(26, 3, 0),
(26, 4, 0),
(27, 1, 0),
(27, 2, 0),
(27, 3, 0),
(27, 4, 0),
(28, 1, 0),
(28, 2, 0),
(28, 3, 0),
(28, 4, 0),
(29, 1, 0),
(29, 2, 0),
(29, 3, 0),
(29, 4, 0),
(30, 1, 0),
(30, 2, 0),
(30, 3, 0),
(30, 4, 0),
(31, 1, 0),
(31, 2, 0),
(31, 3, 0),
(31, 4, 0),
(32, 1, 0),
(32, 2, 0),
(32, 3, 0),
(32, 4, 0),
(33, 1, 0),
(33, 2, 0),
(33, 3, 0),
(33, 4, 0),
(34, 1, 0),
(34, 2, 0),
(34, 3, 0),
(34, 4, 0),
(35, 1, 0),
(35, 2, 0),
(35, 3, 0),
(35, 4, 0),
(36, 1, 0),
(36, 2, 0),
(36, 3, 0),
(36, 4, 0),
(37, 1, 0),
(37, 2, 0),
(37, 3, 0),
(37, 4, 0),
(38, 1, 0),
(38, 2, 0),
(38, 3, 0),
(38, 4, 0),
(39, 1, 0),
(39, 2, 0),
(39, 3, 0),
(39, 4, 0),
(40, 1, 0),
(40, 2, 0),
(40, 3, 0),
(40, 4, 0),
(41, 1, 0),
(41, 2, 0),
(41, 3, 0),
(41, 4, 0),
(42, 1, 0),
(42, 2, 0),
(42, 3, 0),
(42, 4, 0),
(43, 1, 1),
(43, 2, 1),
(43, 3, 1),
(43, 4, 1),
(44, 1, 0),
(44, 2, 0),
(44, 3, 0),
(44, 4, 0),
(45, 1, 0),
(45, 2, 0),
(45, 3, 0),
(45, 4, 0),
(46, 1, 0),
(46, 2, 0),
(46, 3, 0),
(46, 4, 0),
(47, 1, 0),
(47, 2, 0),
(47, 3, 0),
(47, 4, 0),
(48, 1, 0),
(48, 2, 0),
(48, 3, 0),
(48, 4, 0),
(49, 1, 0),
(49, 2, 0),
(49, 3, 0),
(49, 4, 0),
(50, 1, 0),
(50, 2, 0),
(50, 3, 0),
(50, 4, 0),
(51, 1, 0),
(51, 2, 0),
(51, 3, 0),
(51, 4, 0),
(52, 1, 0),
(52, 2, 0),
(52, 3, 0),
(52, 4, 0),
(53, 1, 0),
(53, 2, 0),
(53, 3, 0),
(53, 4, 0),
(54, 1, 0),
(54, 2, 0),
(54, 3, 0),
(54, 4, 0),
(55, 1, 0),
(55, 2, 0),
(55, 3, 0),
(55, 4, 0),
(56, 1, 0),
(56, 2, 0),
(56, 3, 0),
(56, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `PEKERJAANID` int(11) NOT NULL AUTO_INCREMENT,
  `PEKERJAANDESC` varchar(40) NOT NULL,
  PRIMARY KEY (`PEKERJAANID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`PEKERJAANID`, `PEKERJAANDESC`) VALUES
(1, 'PNS'),
(2, 'PEGAWAI SWASTA'),
(3, 'Nelayan');

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE IF NOT EXISTS `proses` (
  `PROSESID` int(11) NOT NULL AUTO_INCREMENT,
  `SATWAKTUSTDID` int(11) DEFAULT NULL,
  `PROSESPARENT` varchar(2) NOT NULL,
  `PROSESDESC` varchar(100) NOT NULL,
  `DEFWAKTUSTD` varchar(3) DEFAULT NULL,
  `DEFPICALERT` varchar(3) DEFAULT NULL,
  `DEFSPVALERT` varchar(3) DEFAULT NULL,
  `DEFBIAYAPROSES` varchar(13) DEFAULT NULL,
  `DEFBIAYADROP` varchar(13) DEFAULT NULL,
  `DEFSATALERT` int(11) DEFAULT NULL,
  `AKTAID` int(11) DEFAULT NULL,
  `KANTORPROSESID` int(11) DEFAULT NULL,
  `NOMORURUT` int(11) DEFAULT NULL,
  PRIMARY KEY (`PROSESID`),
  KEY `FK_RELATIONSHIP_24` (`SATWAKTUSTDID`),
  KEY `DEFSATALERT` (`DEFSATALERT`),
  KEY `AKTAID` (`AKTAID`),
  KEY `KANTORPROSESID` (`KANTORPROSESID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`PROSESID`, `SATWAKTUSTDID`, `PROSESPARENT`, `PROSESDESC`, `DEFWAKTUSTD`, `DEFPICALERT`, `DEFSPVALERT`, `DEFBIAYAPROSES`, `DEFBIAYADROP`, `DEFSATALERT`, `AKTAID`, `KANTORPROSESID`, `NOMORURUT`) VALUES
(3, 1, '0', 'PEMEKARAN BIASA', '30', '3', '5', '', '', 1, 2, 1, 1),
(4, 1, '0', 'ROYA', '45', '3', '5', '', '', 1, 2, 1, 2),
(7, 3, '0', 'BALIK NAMA', '1', '3', '5', '', '', 1, 3, 1, 1),
(11, 1, '', 'SALINAN AKTA', '30', '3', '5', '', '', 1, NULL, 4, NULL),
(13, 1, '', 'HT', '45', '3', '5', '', '', 1, NULL, 1, NULL),
(15, 1, '', 'HT', '45', '3', '5', '', '', 1, NULL, 5, NULL),
(16, 1, '', 'PEMEKARAN KILAT', '3', '1', '2', '', '', 1, NULL, 1, NULL),
(17, 1, '', 'BN', '45', '3', '5', '', '', 1, NULL, 1, NULL),
(18, 1, '', 'BN WARIS', '45', '3', '5', '', '', 1, NULL, 1, NULL),
(19, 1, '', 'GANTI BLANGKO', '90', '3', '5', '', '', 1, NULL, 1, NULL),
(20, 1, '', 'SPLITZING', '90', '3', '5', '', '', 1, NULL, 1, NULL),
(21, 1, '', 'PENGGABUNGAN SERTIFIKAT', '90', '3', '5', '', '', 1, NULL, 1, NULL),
(22, 1, '', 'PENINGKATAN', '30', '3', '5', '', '', 1, NULL, 1, NULL),
(23, 1, '', 'PERPANJANGAN HGB', '90', '3', '5', '', '', 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prosesakta`
--

CREATE TABLE IF NOT EXISTS `prosesakta` (
  `PROSESID` int(11) NOT NULL,
  `AKTAID` int(11) NOT NULL,
  `NOMORURUT` int(11) NOT NULL,
  PRIMARY KEY (`PROSESID`,`AKTAID`),
  KEY `AKTAID` (`AKTAID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prosesakta`
--


-- --------------------------------------------------------

--
-- Table structure for table `prosesdoc`
--

CREATE TABLE IF NOT EXISTS `prosesdoc` (
  `AKTAID` int(11) NOT NULL,
  `TIPEDOKUMENID` int(11) NOT NULL,
  PRIMARY KEY (`AKTAID`,`TIPEDOKUMENID`),
  KEY `FK_PROSESDOC2` (`TIPEDOKUMENID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prosesdoc`
--


-- --------------------------------------------------------

--
-- Table structure for table `prosestran`
--

CREATE TABLE IF NOT EXISTS `prosestran` (
  `PROSESTRANID` int(11) NOT NULL AUTO_INCREMENT,
  `AKTATRANID` int(11) DEFAULT NULL,
  `PROSESID` int(11) DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `WAKTUPROSTRAN` varchar(3) DEFAULT NULL,
  `PICALERTPROSTRAN` varchar(3) DEFAULT NULL,
  `SPVALERTPROSTRAN` varchar(3) DEFAULT NULL,
  `BIAYAPROSTRAN` varchar(13) DEFAULT NULL,
  `BIAYADROPTRAN` varchar(13) DEFAULT NULL,
  `SATPROSES` int(11) DEFAULT NULL,
  `SATALERT` int(11) DEFAULT NULL,
  `TGLMASUK` date NOT NULL,
  `TGLSELESAI` date DEFAULT NULL,
  `TGLDEADLINE` date DEFAULT NULL,
  `TGLPENYERAHAN` date DEFAULT NULL,
  `ALERTSPV` tinyint(1) NOT NULL DEFAULT '0',
  `ALERTPIC` tinyint(1) NOT NULL DEFAULT '0',
  `STATUSPROSES` int(11) DEFAULT NULL,
  `EMPLOYEEID` int(11) DEFAULT NULL,
  `NOMORURUT` int(11) NOT NULL,
  PRIMARY KEY (`PROSESTRANID`),
  KEY `FK_RELATIONSHIP_22` (`PROSESID`),
  KEY `FK_RELATIONSHIP_25` (`USERID`),
  KEY `SATPROSES` (`SATPROSES`),
  KEY `SATALERT` (`SATALERT`),
  KEY `AKTATRANID` (`AKTATRANID`),
  KEY `STATUSPROSES` (`STATUSPROSES`),
  KEY `EMPLOYEEID` (`EMPLOYEEID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `prosestran`
--

INSERT INTO `prosestran` (`PROSESTRANID`, `AKTATRANID`, `PROSESID`, `USERID`, `WAKTUPROSTRAN`, `PICALERTPROSTRAN`, `SPVALERTPROSTRAN`, `BIAYAPROSTRAN`, `BIAYADROPTRAN`, `SATPROSES`, `SATALERT`, `TGLMASUK`, `TGLSELESAI`, `TGLDEADLINE`, `TGLPENYERAHAN`, `ALERTSPV`, `ALERTPIC`, `STATUSPROSES`, `EMPLOYEEID`, `NOMORURUT`) VALUES
(3, 5, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-09-01', NULL, '2014-10-16', NULL, 0, 0, 1, 2, 6),
(5, 8, 13, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 4),
(6, 10, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 10),
(7, 10, 13, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 10),
(8, 12, 13, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 0),
(9, 13, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 0),
(10, 13, 13, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 0),
(11, 15, 11, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-01', NULL, 0, 0, 1, 6, 0),
(12, 15, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 0),
(13, 15, 13, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 0),
(14, 16, 11, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-09-03', '2014-10-03', '2014-10-03', NULL, 0, 0, 1, 11, 0),
(15, 18, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 0),
(16, 18, 15, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 0),
(17, 18, 11, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-09-03', NULL, '2014-10-03', NULL, 0, 0, 1, 12, 0),
(18, 19, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 0),
(19, 19, 13, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-16', NULL, 0, 0, 1, 5, 0),
(20, 19, 11, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '1970-02-01', NULL, 0, 0, 1, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratepajak`
--

CREATE TABLE IF NOT EXISTS `ratepajak` (
  `RATEPJKID` int(11) NOT NULL AUTO_INCREMENT,
  `TGGLAWALBERLAKU` date DEFAULT NULL,
  `TGGLAKHIRBERLAKU` date DEFAULT NULL,
  `NILRATEPJK` varchar(2) NOT NULL,
  PRIMARY KEY (`RATEPJKID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ratepajak`
--


-- --------------------------------------------------------

--
-- Table structure for table `satuanwaktustd`
--

CREATE TABLE IF NOT EXISTS `satuanwaktustd` (
  `SATWAKTUSTDID` int(11) NOT NULL AUTO_INCREMENT,
  `SATWAKTUDESC` varchar(20) NOT NULL,
  `KONVERSI` int(11) NOT NULL,
  PRIMARY KEY (`SATWAKTUSTDID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `satuanwaktustd`
--

INSERT INTO `satuanwaktustd` (`SATWAKTUSTDID`, `SATWAKTUDESC`, `KONVERSI`) VALUES
(1, 'Hari', 1),
(2, 'Minggu', 7),
(3, 'Bulan', 30);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE IF NOT EXISTS `sertifikat` (
  `SERTIFIKATID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPESERTIFIKATID` int(11) NOT NULL,
  `NAMAPENJUAL` varchar(60) NOT NULL,
  `NAMAPEMILIK` varchar(60) NOT NULL,
  `NAMAPEMBELI` varchar(60) NOT NULL,
  `NOMOR` varchar(30) NOT NULL,
  `AKTATRANID` int(11) DEFAULT NULL COMMENT 'udah gak kepake',
  `KOTA_KAB` varchar(100) NOT NULL,
  `KEL_DESA` varchar(100) NOT NULL,
  PRIMARY KEY (`SERTIFIKATID`),
  KEY `TYPESERTIFIKATID` (`TYPESERTIFIKATID`),
  KEY `AKTATRANID` (`AKTATRANID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`SERTIFIKATID`, `TYPESERTIFIKATID`, `NAMAPENJUAL`, `NAMAPEMILIK`, `NAMAPEMBELI`, `NOMOR`, `AKTATRANID`, `KOTA_KAB`, `KEL_DESA`) VALUES
(1, 2, '', 'TETI HENDRAWATI Hj', '', '301', 8, 'BANDUNG', 'PANGAUBAN'),
(2, 1, '', 'AKHMAD SYAEFUDIN', '', '1886', 10, 'CIMAHI', 'CIBEUREUM'),
(3, 1, '', 'YULIA ERLINDA', '', '1903', 12, 'BANDUNG', 'SUKA ASIH'),
(4, 1, '', 'ADENG MARYANA', '', '5964', 13, 'BANDUNG BARAT', 'TANIMULYA'),
(5, 1, '', 'NENENG TINI', '', '5145', 15, 'BANDUNG', 'BABAKAN'),
(6, 1, '', 'ANDRIAN NORMAN', '', '5203', 18, 'BANDUNG', 'SUKAMISKIN'),
(7, 1, '', 'ALIT ARIEF YUNIARDI', '', '1976', 19, 'BANDUNG', 'CIPAGALO');

-- --------------------------------------------------------

--
-- Table structure for table `statusakta`
--

CREATE TABLE IF NOT EXISTS `statusakta` (
  `STATUSAKTAID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUSAKTADESC` varchar(40) NOT NULL,
  PRIMARY KEY (`STATUSAKTAID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `statusakta`
--

INSERT INTO `statusakta` (`STATUSAKTAID`, `STATUSAKTADESC`) VALUES
(1, 'In Progress'),
(2, 'Done'),
(3, 'Drop');

-- --------------------------------------------------------

--
-- Table structure for table `statusbayar`
--

CREATE TABLE IF NOT EXISTS `statusbayar` (
  `STATUSBYR` int(11) NOT NULL AUTO_INCREMENT,
  `STATUSBYRDESC` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`STATUSBYR`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statusbayar`
--

INSERT INTO `statusbayar` (`STATUSBYR`, `STATUSBYRDESC`) VALUES
(1, 'Berbayar'),
(2, 'Tidak Berpajakbayar');

-- --------------------------------------------------------

--
-- Table structure for table `statusdisplay`
--

CREATE TABLE IF NOT EXISTS `statusdisplay` (
  `STATUSDISPLAYID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUSDISPLAYDESC` varchar(20) NOT NULL,
  PRIMARY KEY (`STATUSDISPLAYID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statusdisplay`
--

INSERT INTO `statusdisplay` (`STATUSDISPLAYID`, `STATUSDISPLAYDESC`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `statusdokumen`
--

CREATE TABLE IF NOT EXISTS `statusdokumen` (
  `IDSTATUSDOC` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS` varchar(100) NOT NULL,
  PRIMARY KEY (`IDSTATUSDOC`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `statusdokumen`
--

INSERT INTO `statusdokumen` (`IDSTATUSDOC`, `STATUS`) VALUES
(1, 'In Progress'),
(2, 'Valid'),
(3, 'Not Valid');

-- --------------------------------------------------------

--
-- Table structure for table `statuspajak`
--

CREATE TABLE IF NOT EXISTS `statuspajak` (
  `STATUSPJKID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUSPJKDESC` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`STATUSPJKID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statuspajak`
--

INSERT INTO `statuspajak` (`STATUSPJKID`, `STATUSPJKDESC`) VALUES
(1, 'Berpajak'),
(2, 'Tidak Berpajak');

-- --------------------------------------------------------

--
-- Table structure for table `statusproses`
--

CREATE TABLE IF NOT EXISTS `statusproses` (
  `STATUSPROSESID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUSDESC` varchar(40) NOT NULL,
  PRIMARY KEY (`STATUSPROSESID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `statusproses`
--

INSERT INTO `statusproses` (`STATUSPROSESID`, `STATUSDESC`) VALUES
(1, 'In Progress'),
(2, 'Done'),
(3, 'Warning');

-- --------------------------------------------------------

--
-- Table structure for table `statususer`
--

CREATE TABLE IF NOT EXISTS `statususer` (
  `STATUSUSERID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUSUSERDESC` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`STATUSUSERID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statususer`
--

INSERT INTO `statususer` (`STATUSUSERID`, `STATUSUSERDESC`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tipecustomer`
--

CREATE TABLE IF NOT EXISTS `tipecustomer` (
  `TIPECUSTID` int(11) NOT NULL AUTO_INCREMENT,
  `TIPECUSTDESC` varchar(30) NOT NULL,
  `INISIALTIPECUST` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`TIPECUSTID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tipecustomer`
--

INSERT INTO `tipecustomer` (`TIPECUSTID`, `TIPECUSTDESC`, `INISIALTIPECUST`) VALUES
(1, 'Pribadi', 'Pri'),
(2, 'Badan', 'Bdn');

-- --------------------------------------------------------

--
-- Table structure for table `tipedokumen`
--

CREATE TABLE IF NOT EXISTS `tipedokumen` (
  `TIPEDOKUMENID` int(11) NOT NULL AUTO_INCREMENT,
  `TIPEDOKDESC` varchar(50) NOT NULL,
  PRIMARY KEY (`TIPEDOKUMENID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tipedokumen`
--

INSERT INTO `tipedokumen` (`TIPEDOKUMENID`, `TIPEDOKDESC`) VALUES
(1, 'KTP'),
(2, 'NPWP'),
(3, 'SIM'),
(4, 'NPWP');

-- --------------------------------------------------------

--
-- Table structure for table `tipepembayaran`
--

CREATE TABLE IF NOT EXISTS `tipepembayaran` (
  `TIPEBYRID` int(11) NOT NULL AUTO_INCREMENT,
  `TIPEBYRIDDESC` varchar(20) NOT NULL,
  PRIMARY KEY (`TIPEBYRID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tipepembayaran`
--

INSERT INTO `tipepembayaran` (`TIPEBYRID`, `TIPEBYRIDDESC`) VALUES
(1, 'Kontan');

-- --------------------------------------------------------

--
-- Table structure for table `tipewilayah`
--

CREATE TABLE IF NOT EXISTS `tipewilayah` (
  `TIPEWILAYAHID` int(11) NOT NULL AUTO_INCREMENT,
  `TIPEWILAYAHDESC` varchar(50) NOT NULL,
  PRIMARY KEY (`TIPEWILAYAHID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tipewilayah`
--

INSERT INTO `tipewilayah` (`TIPEWILAYAHID`, `TIPEWILAYAHDESC`) VALUES
(1, 'Kota'),
(2, 'Kabupaten');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `TITLEID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLEDESC` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`TITLEID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`TITLEID`, `TITLEDESC`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA/SMK'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'S1/D4'),
(8, 'S2'),
(9, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `tranbayarditail`
--

CREATE TABLE IF NOT EXISTS `tranbayarditail` (
  `TRANBYRDITAILID` int(11) NOT NULL AUTO_INCREMENT,
  `TRANSAKSIPRAID` int(11) DEFAULT NULL,
  `TIPEBYRID` int(11) DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `TANGGALBYR` date NOT NULL,
  `DITAILTIPEBYR` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TRANBYRDITAILID`),
  KEY `FK_RELATIONSHIP_26` (`TRANSAKSIPRAID`),
  KEY `FK_RELATIONSHIP_27` (`TIPEBYRID`),
  KEY `FK_RELATIONSHIP_30` (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tranbayarditail`
--


-- --------------------------------------------------------

--
-- Table structure for table `transaksipra`
--

CREATE TABLE IF NOT EXISTS `transaksipra` (
  `TRANSAKSIPRAID` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` int(11) DEFAULT NULL,
  `EMPLOYEEID` int(11) DEFAULT NULL,
  `STATUSPJKID` int(11) DEFAULT NULL,
  `STATUSBYR` int(11) DEFAULT NULL,
  `TANGGALPRA` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DEVELOPERID` int(11) DEFAULT NULL,
  `SUPERVISOR` int(11) DEFAULT NULL,
  `NOTARIS` int(11) DEFAULT NULL,
  `NOTRANSAKSI` varchar(100) NOT NULL,
  `BANKREKID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TRANSAKSIPRAID`),
  KEY `FK_RELATIONSHIP_19` (`USERID`),
  KEY `FK_RELATIONSHIP_20` (`EMPLOYEEID`),
  KEY `FK_RELATIONSHIP_28` (`STATUSPJKID`),
  KEY `FK_RELATIONSHIP_29` (`STATUSBYR`),
  KEY `DEVELOPERID` (`DEVELOPERID`),
  KEY `SUPERVISOR` (`SUPERVISOR`),
  KEY `BANKID` (`BANKREKID`),
  KEY `NOTARIS` (`NOTARIS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `transaksipra`
--

INSERT INTO `transaksipra` (`TRANSAKSIPRAID`, `USERID`, `EMPLOYEEID`, `STATUSPJKID`, `STATUSBYR`, `TANGGALPRA`, `DEVELOPERID`, `SUPERVISOR`, `NOTARIS`, `NOTRANSAKSI`, `BANKREKID`) VALUES
(1, 1, 2, 1, NULL, '2014-09-02 16:35:32', NULL, 4, 3, '', 1),
(2, 1, 2, 1, NULL, '2014-09-02 16:35:47', NULL, 4, 3, '', 1),
(3, 1, 2, 1, NULL, '2014-09-02 16:42:08', NULL, 4, 3, '', 1),
(4, 1, 2, 1, NULL, '2014-09-02 16:42:27', NULL, 4, 3, '', 1),
(6, 1, 2, 2, NULL, '2014-09-02 17:32:20', NULL, 4, 3, '', 1),
(7, 1, 2, 2, NULL, '2014-09-02 17:32:59', NULL, 4, 3, '', 1),
(8, 1, 2, 2, NULL, '2014-09-02 17:33:34', NULL, 4, 3, '', 1),
(9, 1, 6, 2, NULL, '2014-09-02 19:13:06', NULL, 4, 3, '', 1),
(10, 1, 7, 2, NULL, '2014-09-02 19:18:43', NULL, 4, 3, '', 1),
(11, 1, 8, 2, NULL, '2014-09-02 19:25:39', NULL, 4, 3, '', 1),
(12, 1, 11, 2, NULL, '2014-09-02 19:31:52', NULL, 4, 3, '', 1),
(13, 1, 6, 2, NULL, '2014-09-03 14:00:39', NULL, 4, 3, '', 5),
(14, 1, 11, 2, NULL, '2014-09-03 14:32:52', NULL, 4, 3, '', 8),
(16, 1, 14, 2, NULL, '2014-09-03 15:33:21', NULL, 4, 3, '', 9),
(17, 1, 11, 2, NULL, '2014-09-03 19:10:08', NULL, 4, 3, '', 8),
(18, 1, 2, 1, NULL, '2014-09-04 14:16:27', NULL, 4, 3, '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `typesertifikat`
--

CREATE TABLE IF NOT EXISTS `typesertifikat` (
  `TYPESERTIFIKATID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPESERTIFIKATDESC` varchar(30) NOT NULL,
  PRIMARY KEY (`TYPESERTIFIKATID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `typesertifikat`
--

INSERT INTO `typesertifikat` (`TYPESERTIFIKATID`, `TYPESERTIFIKATDESC`) VALUES
(1, 'SHM'),
(2, 'SHGB');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USERID` int(11) NOT NULL AUTO_INCREMENT,
  `EMPLOYEEID` int(11) DEFAULT NULL,
  `STATUSUSERID` int(11) DEFAULT NULL,
  `OTORITASID` int(11) DEFAULT NULL,
  `USERNAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(40) NOT NULL,
  `WAKTUDAFTAR` datetime NOT NULL,
  `PEMBUATUSER` varchar(40) NOT NULL,
  `online` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`USERID`),
  KEY `FK_RELATIONSHIP_7` (`EMPLOYEEID`),
  KEY `FK_RELATIONSHIP_8` (`STATUSUSERID`),
  KEY `FK_RELATIONSHIP_9` (`OTORITASID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERID`, `EMPLOYEEID`, `STATUSUSERID`, `OTORITASID`, `USERNAME`, `PASSWORD`, `WAKTUDAFTAR`, `PEMBUATUSER`, `online`) VALUES
(1, 1, 1, 3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2014-03-06 00:00:00', '', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktasertifikat`
--
ALTER TABLE `aktasertifikat`
  ADD CONSTRAINT `aktasertifikat_ibfk_1` FOREIGN KEY (`AKTATRANID`) REFERENCES `aktatran` (`AKTATRANID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aktasertifikat_ibfk_2` FOREIGN KEY (`SERTIFIKATID`) REFERENCES `sertifikat` (`SERTIFIKATID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `aktatran`
--
ALTER TABLE `aktatran`
  ADD CONSTRAINT `aktatran_ibfk_10` FOREIGN KEY (`STATUSAKTAID`) REFERENCES `statusakta` (`STATUSAKTAID`) ON DELETE CASCADE,
  ADD CONSTRAINT `aktatran_ibfk_8` FOREIGN KEY (`AKTAID`) REFERENCES `akta` (`AKTAID`) ON DELETE CASCADE,
  ADD CONSTRAINT `aktatran_ibfk_9` FOREIGN KEY (`TRANSAKSIPRAID`) REFERENCES `transaksipra` (`TRANSAKSIPRAID`) ON DELETE CASCADE;

--
-- Constraints for table `aktivitasnotaris`
--
ALTER TABLE `aktivitasnotaris`
  ADD CONSTRAINT `aktivitasnotaris_ibfk_1` FOREIGN KEY (`EMPLOYEEID`) REFERENCES `employee` (`EMPLOYEEID`);

--
-- Constraints for table `bankrekening`
--
ALTER TABLE `bankrekening`
  ADD CONSTRAINT `bankrekening_ibfk_1` FOREIGN KEY (`BANKUTAMAID`) REFERENCES `bankutama` (`BANKUTAMAID`) ON DELETE CASCADE;

--
-- Constraints for table `biayadefault`
--
ALTER TABLE `biayadefault`
  ADD CONSTRAINT `FK_RELATIONSHIP_43` FOREIGN KEY (`PROSESID`) REFERENCES `proses` (`PROSESID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_44` FOREIGN KEY (`STATUSPROSESID`) REFERENCES `statusproses` (`STATUSPROSESID`);

--
-- Constraints for table `contactditail`
--
ALTER TABLE `contactditail`
  ADD CONSTRAINT `contactditail_ibfk_1` FOREIGN KEY (`EMPLOYEEID`) REFERENCES `employee` (`EMPLOYEEID`) ON DELETE CASCADE;

--
-- Constraints for table `contactditailcustomer`
--
ALTER TABLE `contactditailcustomer`
  ADD CONSTRAINT `contactditailcustomer_ibfk_1` FOREIGN KEY (`CUSTOMERID`) REFERENCES `customer` (`CUSTOMERID`) ON DELETE CASCADE;

--
-- Constraints for table `covernote`
--
ALTER TABLE `covernote`
  ADD CONSTRAINT `covernote_ibfk_2` FOREIGN KEY (`TIPEWILAYAHID`) REFERENCES `tipewilayah` (`TIPEWILAYAHID`) ON DELETE CASCADE,
  ADD CONSTRAINT `covernote_ibfk_3` FOREIGN KEY (`TRANSAKSIPRAID`) REFERENCES `transaksipra` (`TRANSAKSIPRAID`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_5` FOREIGN KEY (`PEKERJAANID`) REFERENCES `pekerjaan` (`PEKERJAANID`) ON DELETE SET NULL,
  ADD CONSTRAINT `customer_ibfk_6` FOREIGN KEY (`GENDER`) REFERENCES `gender` (`GENDER`) ON DELETE SET NULL,
  ADD CONSTRAINT `customer_ibfk_7` FOREIGN KEY (`IDENTITASPERSONALID`) REFERENCES `identitaspersonal` (`IDENTITASPERSONALID`) ON DELETE SET NULL,
  ADD CONSTRAINT `customer_ibfk_8` FOREIGN KEY (`TIPECUSTID`) REFERENCES `tipecustomer` (`TIPECUSTID`) ON DELETE SET NULL;

--
-- Constraints for table `customertrans`
--
ALTER TABLE `customertrans`
  ADD CONSTRAINT `customertrans_ibfk_4` FOREIGN KEY (`CUSTOMERID`) REFERENCES `customer` (`CUSTOMERID`) ON DELETE CASCADE,
  ADD CONSTRAINT `customertrans_ibfk_5` FOREIGN KEY (`TRANSAKSIPRAID`) REFERENCES `transaksipra` (`TRANSAKSIPRAID`) ON DELETE CASCADE;

--
-- Constraints for table `daftarrekening`
--
ALTER TABLE `daftarrekening`
  ADD CONSTRAINT `daftarrekening_ibfk_1` FOREIGN KEY (`BANKREKID`) REFERENCES `bankrekening` (`BANKREKID`) ON DELETE CASCADE;

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`TRANSAKSIPRAID`) REFERENCES `transaksipra` (`TRANSAKSIPRAID`) ON DELETE CASCADE,
  ADD CONSTRAINT `dokumen_ibfk_2` FOREIGN KEY (`TIPEDOKUMENID`) REFERENCES `tipedokumen` (`TIPEDOKUMENID`) ON DELETE CASCADE,
  ADD CONSTRAINT `dokumen_ibfk_3` FOREIGN KEY (`IDSTATUSDOC`) REFERENCES `statusdokumen` (`IDSTATUSDOC`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`GENDER`) REFERENCES `gender` (`GENDER`) ON DELETE SET NULL,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`IDENTITASPERSONALID`) REFERENCES `identitaspersonal` (`IDENTITASPERSONALID`) ON DELETE SET NULL,
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`TITLEID`) REFERENCES `title` (`TITLEID`) ON DELETE SET NULL,
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`JABATANID`) REFERENCES `jabatan` (`JABATANID`) ON DELETE SET NULL;

--
-- Constraints for table `eskalasi`
--
ALTER TABLE `eskalasi`
  ADD CONSTRAINT `eskalasi_ibfk_6` FOREIGN KEY (`EMPLOYEEID`) REFERENCES `employee` (`EMPLOYEEID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eskalasi_ibfk_7` FOREIGN KEY (`TARGET`) REFERENCES `employee` (`EMPLOYEEID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eskalasi_ibfk_8` FOREIGN KEY (`AKTATRANID`) REFERENCES `aktatran` (`AKTATRANID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_3` FOREIGN KEY (`STATUSDISPLAYID`) REFERENCES `statusdisplay` (`STATUSDISPLAYID`) ON DELETE SET NULL,
  ADD CONSTRAINT `foto_ibfk_4` FOREIGN KEY (`EMPLOYEEID`) REFERENCES `employee` (`EMPLOYEEID`) ON DELETE CASCADE;

--
-- Constraints for table `jadwallibur`
--
ALTER TABLE `jadwallibur`
  ADD CONSTRAINT `jadwallibur_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `user` (`USERID`),
  ADD CONSTRAINT `jadwallibur_ibfk_2` FOREIGN KEY (`EMPLOYEEID`) REFERENCES `employee` (`EMPLOYEEID`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`EMPLOYEEID`) REFERENCES `employee` (`EMPLOYEEID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `otoritasmenu`
--
ALTER TABLE `otoritasmenu`
  ADD CONSTRAINT `FK_OTORITASMENU` FOREIGN KEY (`MENUID`) REFERENCES `menu` (`MENUID`),
  ADD CONSTRAINT `FK_OTORITASMENU2` FOREIGN KEY (`OTORITASID`) REFERENCES `otoritas` (`OTORITASID`);

--
-- Constraints for table `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `proses_ibfk_35` FOREIGN KEY (`SATWAKTUSTDID`) REFERENCES `satuanwaktustd` (`SATWAKTUSTDID`) ON DELETE CASCADE,
  ADD CONSTRAINT `proses_ibfk_36` FOREIGN KEY (`DEFSATALERT`) REFERENCES `satuanwaktustd` (`SATWAKTUSTDID`) ON DELETE CASCADE,
  ADD CONSTRAINT `proses_ibfk_37` FOREIGN KEY (`KANTORPROSESID`) REFERENCES `kantorproses` (`KANTORPROSESID`) ON DELETE CASCADE;

--
-- Constraints for table `prosesakta`
--
ALTER TABLE `prosesakta`
  ADD CONSTRAINT `prosesakta_ibfk_1` FOREIGN KEY (`PROSESID`) REFERENCES `proses` (`PROSESID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prosesakta_ibfk_2` FOREIGN KEY (`AKTAID`) REFERENCES `akta` (`AKTAID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prosesdoc`
--
ALTER TABLE `prosesdoc`
  ADD CONSTRAINT `prosesdoc_ibfk_1` FOREIGN KEY (`AKTAID`) REFERENCES `akta` (`AKTAID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prosesdoc_ibfk_2` FOREIGN KEY (`TIPEDOKUMENID`) REFERENCES `tipedokumen` (`TIPEDOKUMENID`) ON DELETE CASCADE;

--
-- Constraints for table `prosestran`
--
ALTER TABLE `prosestran`
  ADD CONSTRAINT `prosestran_ibfk_25` FOREIGN KEY (`AKTATRANID`) REFERENCES `aktatran` (`AKTATRANID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prosestran_ibfk_26` FOREIGN KEY (`PROSESID`) REFERENCES `proses` (`PROSESID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prosestran_ibfk_27` FOREIGN KEY (`USERID`) REFERENCES `user` (`USERID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prosestran_ibfk_28` FOREIGN KEY (`SATPROSES`) REFERENCES `satuanwaktustd` (`SATWAKTUSTDID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prosestran_ibfk_29` FOREIGN KEY (`SATALERT`) REFERENCES `satuanwaktustd` (`SATWAKTUSTDID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prosestran_ibfk_30` FOREIGN KEY (`STATUSPROSES`) REFERENCES `statusproses` (`STATUSPROSESID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prosestran_ibfk_31` FOREIGN KEY (`EMPLOYEEID`) REFERENCES `employee` (`EMPLOYEEID`) ON DELETE CASCADE;

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_7` FOREIGN KEY (`TYPESERTIFIKATID`) REFERENCES `typesertifikat` (`TYPESERTIFIKATID`) ON DELETE CASCADE;

--
-- Constraints for table `tranbayarditail`
--
ALTER TABLE `tranbayarditail`
  ADD CONSTRAINT `FK_RELATIONSHIP_27` FOREIGN KEY (`TIPEBYRID`) REFERENCES `tipepembayaran` (`TIPEBYRID`),
  ADD CONSTRAINT `tranbayarditail_ibfk_1` FOREIGN KEY (`TRANSAKSIPRAID`) REFERENCES `transaksipra` (`TRANSAKSIPRAID`),
  ADD CONSTRAINT `tranbayarditail_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `user` (`USERID`);

--
-- Constraints for table `transaksipra`
--
ALTER TABLE `transaksipra`
  ADD CONSTRAINT `transaksipra_ibfk_13` FOREIGN KEY (`USERID`) REFERENCES `user` (`USERID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksipra_ibfk_14` FOREIGN KEY (`EMPLOYEEID`) REFERENCES `employee` (`EMPLOYEEID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksipra_ibfk_15` FOREIGN KEY (`STATUSPJKID`) REFERENCES `statuspajak` (`STATUSPJKID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksipra_ibfk_16` FOREIGN KEY (`STATUSBYR`) REFERENCES `statusbayar` (`STATUSBYR`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksipra_ibfk_17` FOREIGN KEY (`DEVELOPERID`) REFERENCES `developer` (`DEVELOPERID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksipra_ibfk_18` FOREIGN KEY (`SUPERVISOR`) REFERENCES `employee` (`EMPLOYEEID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksipra_ibfk_19` FOREIGN KEY (`NOTARIS`) REFERENCES `employee` (`EMPLOYEEID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksipra_ibfk_20` FOREIGN KEY (`BANKREKID`) REFERENCES `bankrekening` (`BANKREKID`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`EMPLOYEEID`) REFERENCES `employee` (`EMPLOYEEID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`STATUSUSERID`) REFERENCES `statususer` (`STATUSUSERID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`OTORITASID`) REFERENCES `otoritas` (`OTORITASID`) ON DELETE CASCADE;

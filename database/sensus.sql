-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2021 at 03:52 AM
-- Server version: 10.1.46-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jepara_sipp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(12) NOT NULL,
  `id_kwaran` varchar(12) DEFAULT NULL,
  `id_gudep` varchar(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `gol_darah` varchar(15) DEFAULT NULL,
  `golongan` varchar(50) DEFAULT NULL COMMENT 'siaga,penggalang, penegak, pandega, dewasa',
  `tingkat` varchar(20) DEFAULT NULL,
  `kta` varchar(60) DEFAULT NULL,
  `angkatan` int(4) DEFAULT NULL COMMENT 'isikan tahun',
  `active` enum('1','2') DEFAULT NULL COMMENT 'masih aktif atau sudah tidak 1=active; 2 = non',
  `tempat_kmd` varchar(60) DEFAULT NULL,
  `tahun_kmd` int(4) DEFAULT '0',
  `golongan_kmd` varchar(60) DEFAULT NULL,
  `tempat_kml` varchar(60) DEFAULT NULL,
  `tahun_kml` int(4) DEFAULT '0',
  `golongan_kml` varchar(60) DEFAULT NULL,
  `tempat_kpd` varchar(60) DEFAULT NULL,
  `tahun_kpd` int(4) DEFAULT '0',
  `golongan_kpd` varchar(60) DEFAULT NULL,
  `tempat_kpl` varchar(60) DEFAULT NULL,
  `tahun_kpl` int(4) DEFAULT '0',
  `golongan_kpl` varchar(60) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) DEFAULT NULL,
  `rt` varchar(3) DEFAULT NULL,
  `rw` varchar(3) DEFAULT NULL,
  `desa` varchar(25) DEFAULT NULL,
  `kecamatan` varchar(25) DEFAULT NULL,
  `no_kmd` varchar(25) DEFAULT NULL,
  `pel_kmd` varchar(25) DEFAULT NULL,
  `no_kml` varchar(25) DEFAULT NULL,
  `pel_kml` varchar(25) DEFAULT NULL,
  `no_kpd` varchar(25) DEFAULT NULL,
  `pel_kpd` varchar(25) DEFAULT NULL,
  `no_kpl` varchar(25) DEFAULT NULL,
  `pel_kpl` varchar(25) DEFAULT NULL,
  `ta` int(4) DEFAULT NULL,
  `petugas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_kwaran`, `id_gudep`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `gol_darah`, `golongan`, `tingkat`, `kta`, `angkatan`, `active`, `tempat_kmd`, `tahun_kmd`, `golongan_kmd`, `tempat_kml`, `tahun_kml`, `golongan_kml`, `tempat_kpd`, `tahun_kpd`, `golongan_kpd`, `tempat_kpl`, `tahun_kpl`, `golongan_kpl`, `created_date`, `password`, `rt`, `rw`, `desa`, `kecamatan`, `no_kmd`, `pel_kmd`, `no_kml`, `pel_kml`, `no_kpd`, `pel_kpd`, `no_kpl`, `pel_kpl`, `ta`, `petugas`) VALUES
(424, '10', '32', 'Zaenal  Arifin, M.Pd', 'Jepara', '1983-11-05', 'SENDANG , RT : 1 / RW : 2 , KECAMATAN KALINYAMATAN', 'B', 'dewasa', 'kml', '', NULL, NULL, 'Kwartir Cabang Jepara', 2004, NULL, 'Kwartir Cabang Jepara', 2005, 'SIAGA', '', 0, NULL, '', 0, NULL, '2021-09-25 11:34:34', NULL, '1', '2', '38', '3320003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2021, '119'),
(427, '3', '31', 'wahyu', 'jepara', '1970-01-01', 'banjaragung', 'Tidak Tahu', 'penegak', 'bantara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-25 11:34:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2021, '110'),
(436, '8', '47', 'KARSONO', 'KULON PROGO', '1962-01-21', 'BAWU , RT : 32 / RW : 07 , KECAMATAN BATEALIT', 'Tidak Tahu', 'dewasa', 'NK', '', NULL, NULL, '', 0, NULL, '', 0, '', '', 0, NULL, '', 0, NULL, '2021-09-27 10:43:23', '827ccb0eea8a706c4c34a16891f84e7b', '32', '07', '100', '3320007', '', NULL, '', NULL, '', NULL, '', NULL, 2021, NULL),
(437, '8', '48', 'ENDANG SULISTYOWATI', 'JEPARA', '1963-06-21', 'MINDAHAN , RT : 1 / RW : 2 , KECAMATAN BATEALIT', 'Tidak Tahu', 'dewasa', 'NK', '', NULL, NULL, '', 0, NULL, '', 0, '', '', 0, NULL, '', 0, NULL, '2021-09-28 12:44:03', '827ccb0eea8a706c4c34a16891f84e7b', '1', '2', '95', '3320007', '', NULL, '', NULL, '', NULL, '', NULL, 2021, NULL),
(438, '8', '48', 'TALKHIS KUMALASARI', 'JEPARA', '1978-04-02', 'MINDAHAN , RT : 2 / RW : 3 , KECAMATAN BATEALIT', 'B', 'dewasa', 'kml', '', NULL, NULL, 'BAWU', 2013, NULL, 'JEPARA', 2020, 'PENGGALANG', '', 0, NULL, '', 0, NULL, '2021-09-28 21:17:02', '827ccb0eea8a706c4c34a16891f84e7b', '2', '3', '95', '3320007', '180/1120-C', NULL, '', NULL, '', NULL, '', NULL, 2021, NULL),
(439, '8', '47', 'FERY NOER AHMAD', 'JEPARA', '1993-03-22', 'BAWU , RT : 42 / RW : 08 , KECAMATAN BATEALIT', 'Tidak Tahu', 'dewasa', 'NK', '', NULL, NULL, '', 0, NULL, '', 0, '', '', 0, NULL, '', 0, NULL, '2021-09-28 21:20:27', '827ccb0eea8a706c4c34a16891f84e7b', '42', '08', '100', '3320007', '', NULL, '', NULL, '', NULL, '', NULL, 2021, NULL),
(440, '8', '47', 'ABDUL LATIF', 'JEPARA', '1967-06-18', 'PECANGAAN WETAN , RT : 1 / RW : 1 , KECAMATAN PECANGAAN', 'Tidak Tahu', 'dewasa', 'NK', '', NULL, NULL, '', 0, NULL, '', 0, '', '', 0, NULL, '', 0, NULL, '2021-09-28 21:22:38', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '26', '3320002', '', NULL, '', NULL, '', NULL, '', NULL, 2021, NULL),
(441, '8', '48', 'JUMIYATI', 'JEPARA', '1975-05-09', 'BANTRUNG , RT : 12 / RW : 04 , KECAMATAN BATEALIT', 'Tidak Tahu', 'dewasa', 'kmd', '', NULL, NULL, 'BAWU', 2013, NULL, '', 0, '', '', 0, NULL, '', 0, NULL, '2021-09-28 21:24:53', '827ccb0eea8a706c4c34a16891f84e7b', '12', '04', '99', '3320007', '', NULL, '', NULL, '', NULL, '', NULL, 2021, NULL),
(442, '8', '48', 'ANIK RUFIAH', 'JEPARA', '1985-02-03', 'MINDAHAN , RT : 03 / RW : 02 , KECAMATAN BATEALIT', 'Tidak Tahu', 'dewasa', 'NK', '', NULL, NULL, '', 0, NULL, '', 0, '', '', 0, NULL, '', 0, NULL, '2021-09-28 21:26:31', '827ccb0eea8a706c4c34a16891f84e7b', '03', '02', '95', '3320007', '', NULL, '', NULL, '', NULL, '', NULL, 2021, NULL),
(443, '8', '48', 'ENDANG PUJI RAHAYU', 'JEPARA', '1993-03-19', 'BANTRUNG , RT : 03 / RW : 01 , KECAMATAN BATEALIT', 'Tidak Tahu', 'dewasa', 'NK', '', NULL, NULL, '', 0, NULL, '', 0, '', '', 0, NULL, '', 0, NULL, '2021-09-28 21:28:04', '827ccb0eea8a706c4c34a16891f84e7b', '03', '01', '99', '3320007', '', NULL, '', NULL, '', NULL, '', NULL, 2021, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota_sementara`
--

CREATE TABLE `tb_anggota_sementara` (
  `id_anggota` int(12) NOT NULL,
  `id_kwaran` varchar(12) DEFAULT NULL,
  `id_gudep` varchar(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `gol_darah` varchar(15) DEFAULT NULL,
  `golongan` varchar(50) DEFAULT NULL COMMENT 'siaga,penggalang, penegak, pandega, dewasa',
  `tingkat` varchar(20) DEFAULT NULL,
  `kta` varchar(60) DEFAULT NULL,
  `angkatan` int(4) DEFAULT NULL COMMENT 'isikan tahun',
  `active` enum('1','2') DEFAULT NULL COMMENT 'masih aktif atau sudah tidak 1=active; 2 = non',
  `tempat_kmd` varchar(60) DEFAULT NULL,
  `tahun_kmd` int(4) DEFAULT '0',
  `golongan_kmd` varchar(60) DEFAULT NULL,
  `tempat_kml` varchar(60) DEFAULT NULL,
  `tahun_kml` int(4) DEFAULT '0',
  `golongan_kml` varchar(60) DEFAULT NULL,
  `tempat_kpd` varchar(60) DEFAULT NULL,
  `tahun_kpd` int(4) DEFAULT '0',
  `golongan_kpd` varchar(60) DEFAULT NULL,
  `tempat_kpl` varchar(60) DEFAULT NULL,
  `tahun_kpl` int(4) DEFAULT '0',
  `golongan_kpl` varchar(60) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) DEFAULT NULL,
  `rt` varchar(3) DEFAULT NULL,
  `rw` varchar(3) DEFAULT NULL,
  `desa` varchar(25) DEFAULT NULL,
  `kecamatan` varchar(25) DEFAULT NULL,
  `no_kmd` varchar(25) DEFAULT NULL,
  `pel_kmd` varchar(25) DEFAULT NULL,
  `no_kml` varchar(25) DEFAULT NULL,
  `pel_kml` varchar(25) DEFAULT NULL,
  `no_kpd` varchar(25) DEFAULT NULL,
  `pel_kpd` varchar(25) DEFAULT NULL,
  `no_kpl` varchar(25) DEFAULT NULL,
  `pel_kpl` varchar(25) DEFAULT NULL,
  `ta` int(4) DEFAULT NULL,
  `petugas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_darah`
--

CREATE TABLE `tb_darah` (
  `id_darah` int(2) NOT NULL,
  `darah` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_darah`
--

INSERT INTO `tb_darah` (`id_darah`, `darah`, `created_date`) VALUES
(1, 'A', '2020-12-06 12:14:23'),
(2, 'AB', '2020-12-06 12:14:25'),
(3, 'B', '2020-12-06 12:14:27'),
(4, 'O', '2020-12-06 12:14:30'),
(5, 'Tidak Tahu', '2021-06-11 16:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id_desa` int(10) NOT NULL,
  `id_kecamatan` varchar(25) DEFAULT NULL,
  `nama_desa` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_desa`
--

INSERT INTO `tb_desa` (`id_desa`, `id_kecamatan`, `nama_desa`) VALUES
(1, '3320001', 'KEDUNGMALANG'),
(2, '3320001', 'KALIANYAR'),
(3, '3320001', 'KARANGAJI'),
(4, '3320001', 'TEDUNAN'),
(5, '3320001', 'SOWAN LOR'),
(6, '3320001', 'JONDANG'),
(7, '3320001', 'WANUSOBO'),
(8, '3320001', 'SOWAN KIDUL'),
(9, '3320001', 'SURODADI'),
(10, '3320001', 'PANGGUNG'),
(11, '3320001', 'BULAK BARU'),
(12, '3320001', 'BUGEL'),
(13, '3320001', 'DONGOS'),
(14, '3320001', 'MENGANTI'),
(15, '3320001', 'KERSO'),
(16, '3320001', 'TANGGUL TLARE'),
(17, '3320001', 'RAU'),
(18, '3320001', 'SUKOSONO'),
(19, '3320002', 'GERDU'),
(20, '3320002', 'KRASAK'),
(21, '3320002', 'KARANGRANDU'),
(22, '3320002', 'KALIOMBO'),
(23, '3320002', 'NGELING'),
(24, '3320002', 'TROSO'),
(25, '3320002', 'PECANGAAN KULON'),
(26, '3320002', 'PECANGAAN WETAN'),
(27, '3320002', 'LEBUAWU'),
(28, '3320002', 'PULODARAT'),
(29, '3320002', 'GEMULUNG'),
(30, '3320002', 'RENGGING'),
(31, '3320003', 'BATUKALI'),
(32, '3320003', 'BANDUNGREJO'),
(33, '3320003', 'MANYARGADING'),
(34, '3320003', 'ROBAYAN'),
(35, '3320003', 'BAKALAN'),
(36, '3320003', 'KRIYAN'),
(37, '3320003', 'PURWOGONDO'),
(38, '3320003', 'SENDANG'),
(39, '3320003', 'MARGOYOSO'),
(40, '3320003', 'BANYUPUTIH'),
(41, '3320003', 'PENDOSAWALAN'),
(42, '3320003', 'DAMARJATI'),
(43, '3320004', 'UJUNG PANDAN'),
(44, '3320004', 'KARANGANYAR'),
(45, '3320004', 'GUWOSOBOKERTO'),
(46, '3320004', 'KEDUNGSARIMULYO'),
(47, '3320004', 'BUGO'),
(48, '3320004', 'WELAHAN'),
(49, '3320004', 'GEDANGAN'),
(50, '3320004', 'KETILENGSINGOLELO'),
(51, '3320004', 'KALIPUCANG WETAN'),
(52, '3320004', 'KALIPUCANG KULON'),
(53, '3320004', 'GIDANGELO'),
(54, '3320004', 'KENDENGSIDIALIT'),
(55, '3320004', 'SIDIGEDE'),
(56, '3320004', 'TELUK WETAN'),
(57, '3320004', 'BRANTAK SEKARJATI'),
(58, '3320005', 'MAYONG KIDUL'),
(59, '3320005', 'MAYONG LOR'),
(60, '3320005', 'TIGOJURU'),
(61, '3320005', 'PAREN'),
(62, '3320005', 'KUANYAR'),
(63, '3320005', 'PELANG'),
(64, '3320005', 'SENGONBUGEL'),
(65, '3320005', 'PELEMKEREP'),
(66, '3320005', 'SINGOROJO'),
(67, '3320005', 'JEBOL'),
(68, '3320005', 'BUARAN'),
(69, '3320005', 'NGROTO'),
(70, '3320005', 'RAJEKWESI'),
(71, '3320005', 'DATAR'),
(72, '3320005', 'PULE'),
(73, '3320005', 'BANDUNG'),
(74, '3320005', 'BUNGU'),
(75, '3320005', 'PANCUR'),
(76, '3320006', 'DORANG'),
(77, '3320006', 'BLIMBINGREJO'),
(78, '3320006', 'TUNGGULPANDEAN'),
(79, '3320006', 'PRINGTULIS'),
(80, '3320006', 'JATISARI'),
(81, '3320006', 'GEMIRING KIDUL'),
(82, '3320006', 'GEMIRING LOR'),
(83, '3320006', 'NALUMSARI'),
(84, '3320006', 'TRITIS'),
(85, '3320006', 'DAREN'),
(86, '3320006', 'KARANGNONGKO'),
(87, '3320006', 'NGETUK'),
(88, '3320006', 'BENDANPETE'),
(89, '3320006', 'MURYOLOBO'),
(90, '3320006', 'BATEGEDE'),
(91, '3320007', 'NGASEM'),
(92, '3320007', 'GENENG'),
(93, '3320007', 'RAGUKLAMPITAN'),
(94, '3320007', 'MINDAHAN KIDUL'),
(95, '3320007', 'MINDAHAN'),
(96, '3320007', 'SOMOSARI'),
(97, '3320007', 'BATEALIT'),
(98, '3320007', 'BRINGIN'),
(99, '3320007', 'BANTRUNG'),
(100, '3320007', 'BAWU'),
(101, '3320007', 'PEKALONGAN'),
(102, '3320008', 'TELUKAWUR'),
(103, '3320008', 'SEMAT'),
(104, '3320008', 'PLATAR'),
(105, '3320008', 'MANGUNAN'),
(106, '3320008', 'PETEKEYAN'),
(107, '3320008', 'SUKODONO'),
(108, '3320008', 'LANGON'),
(109, '3320008', 'NGABUL'),
(110, '3320008', 'TAHUNAN'),
(111, '3320008', 'MANTINGAN'),
(112, '3320008', 'DEMANGAN'),
(113, '3320008', 'TEGALSAMBI'),
(114, '3320008', 'KRAPYAK'),
(115, '3320008', 'SENENAN'),
(116, '3320008', 'KECAPI'),
(117, '3320009', 'KARANGKEBAGUSAN'),
(118, '3320009', 'DEMAAN'),
(119, '3320009', 'BULU'),
(120, '3320009', 'KAUMAN'),
(121, '3320009', 'PANGGANG'),
(122, '3320009', 'POTROYUDAN'),
(123, '3320009', 'BAPANGAN'),
(124, '3320009', 'SARIPAN'),
(125, '3320009', 'JOBOKUTO'),
(126, '3320009', 'UJUNGBATU'),
(127, '3320009', 'PENGKOL'),
(128, '3320009', 'MULYOHARJO'),
(129, '3320009', 'KUWASEN'),
(130, '3320009', 'BANDENGAN'),
(131, '3320009', 'WONOREJO'),
(132, '3320009', 'KEDUNGCINO'),
(133, '3320010', 'MOROREJO'),
(134, '3320016', 'MAMBAK'),
(135, '3320016', 'BULUNGAN'),
(136, '3320016', 'LEBAK'),
(137, '3320016', 'TANJUNG'),
(138, '3320016', 'PLAJAN'),
(139, '3320016', 'SUWAWAL TIMUR'),
(140, '3320016', 'KAWAK'),
(141, '3320016', 'SLAGI'),
(142, '3320010', 'SUWAWAL'),
(143, '3320010', 'SINANGGUL'),
(144, '3320010', 'JAMBU TIMUR'),
(145, '3320010', 'JAMBU'),
(146, '3320010', 'SEKURO'),
(147, '3320010', 'SROBYONG'),
(148, '3320010', 'KARANGGONDANG'),
(149, '3320011', 'GUYANGAN'),
(150, '3320011', 'KEPUK'),
(151, '3320011', 'PAPASAN'),
(152, '3320011', 'SRIKANDANG'),
(153, '3320011', 'TENGGULI'),
(154, '3320011', 'BANGSRI'),
(155, '3320011', 'BANJARAN'),
(156, '3320011', 'WEDELAN'),
(157, '3320011', 'JERUKWANGI'),
(158, '3320011', 'KEDUNGLEPER'),
(159, '3320011', 'BONDO'),
(160, '3320011', 'BANJAR AGUNG'),
(161, '3320013', 'KARIMUNJAWA'),
(162, '3320013', 'KEMOJAN'),
(163, '3320013', 'PARANG'),
(164, '3320014', 'DUDAKAWU'),
(165, '3320014', 'SUMANDING'),
(166, '3320014', 'BUCU'),
(167, '3320014', 'CEPOGO'),
(168, '3320014', 'PENDEM'),
(169, '3320014', 'JINGGOTAN'),
(170, '3320014', 'KANCILAN'),
(171, '3320014', 'DERMOLO'),
(172, '3320014', 'BALONG'),
(173, '3320014', 'TUBANAN'),
(174, '3320014', 'KALIAMAN'),
(175, '3320015', 'SUMBER REJO'),
(176, '3320015', 'CLERING'),
(177, '3320015', 'UJUNGWATU'),
(178, '3320015', 'BANYUMANIS'),
(179, '3320015', 'TULAKAN '),
(180, '3320015', 'BANDUNGHARJO'),
(181, '3320015', 'BLINGOH'),
(182, '3320015', 'JUGO'),
(183, '3320012', 'TEMPUR'),
(184, '3320012', 'DAMARWULAN'),
(185, '3320012', 'WATUAJI'),
(186, '3320012', 'KELET'),
(187, '3320012', 'KLEPU'),
(188, '3320012', 'JLEGONG'),
(189, '3320012', 'KELING'),
(190, '3320012', 'GELANG'),
(191, '3320012', 'KUNIR'),
(192, '3320012', 'TUNAHAN'),
(193, '3320012', 'BUMIHARJO'),
(194, '3320012', 'KALIGARANG'),
(195, '3320013', 'NYAMUK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_golongan` int(15) NOT NULL,
  `golongan` varchar(255) DEFAULT NULL COMMENT 'tingkatan golongan',
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_golongan`, `golongan`, `created_date`) VALUES
(1, 'siaga', '2020-12-06 07:24:55'),
(2, 'penggalang', '2020-12-06 07:24:59'),
(3, 'penegak', '2020-12-06 07:25:02'),
(4, 'pandega', '2020-12-06 07:25:06'),
(5, 'dewasa', '2020-12-06 07:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan_sertifikat`
--

CREATE TABLE `tb_golongan_sertifikat` (
  `id` int(11) NOT NULL,
  `golongan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_golongan_sertifikat`
--

INSERT INTO `tb_golongan_sertifikat` (`id`, `golongan`) VALUES
(1, 'SIAGA'),
(2, 'PENGGALANG'),
(3, 'PENEGAK'),
(4, 'PANDEGA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudep`
--

CREATE TABLE `tb_gudep` (
  `id_gudep` int(12) NOT NULL,
  `no_gudep` varchar(100) DEFAULT NULL,
  `ambalan` varchar(60) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_pangkalan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_gudep`
--

INSERT INTO `tb_gudep` (`id_gudep`, `no_gudep`, `ambalan`, `created_date`, `id_pangkalan`) VALUES
(18, '17.146', 'Putri', '2021-06-09 13:01:49', '94'),
(25, '16.023', 'Putra', '2021-09-25 11:03:08', '103'),
(28, '16.024', 'Putri', '2021-09-25 11:03:30', '103'),
(31, '03.149', 'Putra', '2021-09-25 11:03:44', '101'),
(32, '10.031', 'Putra', '2021-09-25 11:03:51', '105'),
(33, '03.150', 'Putri', '2021-09-25 11:04:12', '101'),
(34, '10.030', 'Putri', '2021-09-25 11:04:12', '105'),
(35, '06.074', 'Putri', '2021-09-25 11:06:19', '106'),
(36, '12.234', 'Putra', '2021-09-25 11:12:09', '111'),
(37, '01.01', 'Putra', '2021-09-25 11:12:32', '108'),
(38, '01.02', 'Putri', '2021-09-25 11:14:16', '108'),
(39, '058', 'Putra', '2021-09-25 11:32:45', '107'),
(41, '06.073', 'Putra', '2021-09-25 11:49:04', '106'),
(43, '20.01.09', 'Putra', '2021-09-25 11:51:47', '114'),
(44, '20.01.10', 'Putri', '2021-09-25 11:52:13', '114'),
(45, '07.001', 'Putra', '2021-09-26 08:06:52', '181'),
(46, '07.002', 'Putri', '2021-09-26 08:08:18', '181'),
(47, '20.08', 'Putra', '2021-09-27 08:23:11', '270'),
(48, '20.08 ', 'Putri', '2021-09-27 08:23:28', '270');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `nama_kecamatan` varchar(25) DEFAULT NULL,
  `id_kecamatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`nama_kecamatan`, `id_kecamatan`) VALUES
('KEDUNG', '3320001'),
('PECANGAAN', '3320002'),
('KALINYAMATAN', '3320003'),
('WELAHAN', '3320004'),
('MAYONG', '3320005'),
('NALUMSARI', '3320006'),
('BATEALIT', '3320007'),
('TAHUNAN', '3320008'),
('JEPARA', '3320009'),
('MLONGGO', '3320010'),
('BANGSRI', '3320011'),
('KELING', '3320012'),
('KARIMUNJAWA', '3320013'),
('KEMBANG', '3320014'),
('DONOROJO', '3320015'),
('PAKISAJI', '3320016');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kwaran`
--

CREATE TABLE `tb_kwaran` (
  `id_kwaran` int(12) NOT NULL,
  `nama_kwaran` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `nomor_kwaran` varchar(50) DEFAULT NULL,
  `kamabiran` varchar(60) DEFAULT NULL,
  `kakwaran` varchar(255) DEFAULT NULL,
  `alamat_kwaran` text,
  `status_kepemilikan` varchar(2) DEFAULT NULL,
  `sifat_kepemilikan` varchar(2) DEFAULT NULL,
  `nomor_sk` varchar(255) DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `awal_bakti` date DEFAULT NULL,
  `akhir_bakti` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_kwaran`
--

INSERT INTO `tb_kwaran` (`id_kwaran`, `nama_kwaran`, `created_date`, `nomor_kwaran`, `kamabiran`, `kakwaran`, `alamat_kwaran`, `status_kepemilikan`, `sifat_kepemilikan`, `nomor_sk`, `tgl_sk`, `awal_bakti`, `akhir_bakti`) VALUES
(1, 'Keling', '2021-01-17 19:58:09', '01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Kembang', '2021-01-17 19:58:37', '02', '', '', '', '', '', NULL, NULL, NULL, NULL),
(3, 'Bangsri', '2021-01-17 19:58:53', '03', '', '', '', '', '', NULL, NULL, NULL, NULL),
(4, 'Mlonggo', '2021-01-17 19:59:24', '04', '', '', '', '', '', NULL, NULL, NULL, NULL),
(5, 'Jepara', '2021-01-17 19:59:48', '05', 'Muhammad Syafi\'i, S.H.', 'Edy Supriyono, S.Pd', 'Jepara', '2', '', '15 Tahun 2020', '2020-10-26', '2020-10-26', '2023-10-26'),
(6, 'Tahunan', '2020-12-18 13:49:03', '06', '', '', '', '', '', NULL, NULL, NULL, NULL),
(7, 'Kedung', '2021-01-17 20:00:24', '07', '', '', '', '', '', NULL, NULL, NULL, NULL),
(8, 'Batealit', '2021-01-17 20:00:46', '08', 'SULISTIYO, SE.MM', 'KOMSIN, S.Pd', 'Jl. Mindahan - Tahunan Km.0 Batealit Jepara', '2', '2', '008 / 2020', '2020-12-31', '2021-12-31', '2023-12-31'),
(9, 'Pecangaan', '2021-01-17 20:01:12', '09', '', '', '', '', '', NULL, NULL, NULL, NULL),
(10, 'Kalinyamatan', '2021-01-17 20:01:46', '10', '', '', '', '', '', NULL, NULL, NULL, NULL),
(11, 'Mayong', '2021-01-17 20:02:22', '11', '', '', '', '', '', NULL, NULL, NULL, NULL),
(12, 'Welahan', '2021-01-17 20:02:57', '12', '', '', '', '', '', NULL, NULL, NULL, NULL),
(13, 'Nalumsari', '2021-01-17 20:03:33', '13', '', '', '', '', '', NULL, NULL, NULL, NULL),
(14, 'Karimunjawa', '2021-01-17 20:04:10', '14', '', '', '', '', '', NULL, NULL, NULL, NULL),
(15, 'Donorojo', '2021-01-17 20:05:44', '15', '', '', '', '', '', NULL, NULL, NULL, NULL),
(16, 'Pakis Aji', '2021-01-17 20:04:43', '16', 'ARIF BUDIYANTO, SH', 'HAMBALI, S.Pd.', 'Jl. Mambak - Pakis Adhi, Suwawal Timur, Pakis Aji, Jepara', '2', '2', '13 TAHUN 2020', '2020-10-26', '2020-10-26', '2023-10-26'),
(17, 'CAKRA BASWARA', '2021-05-18 09:12:59', '17', 'Pandu Eka Karsa', 'Pandu Satya Darma', 'Jl. HOS Cokroaminoto Nomor 3 Kauman Jepara', '1', '1', '1120/H/2021', '2021-05-19', '2021-05-28', '2021-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pangkalan`
--

CREATE TABLE `tb_pangkalan` (
  `id_pangkalan` int(12) NOT NULL,
  `nama_pangkalan` varchar(255) DEFAULT NULL,
  `alamat_pangkalan` text,
  `kwaran` varchar(10) DEFAULT NULL,
  `desa` varchar(10) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `kamabigus` varchar(100) DEFAULT NULL,
  `kagudep` varchar(100) DEFAULT NULL,
  `jumlah_pembina` int(10) DEFAULT NULL,
  `petugas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_pangkalan`
--

INSERT INTO `tb_pangkalan` (`id_pangkalan`, `nama_pangkalan`, `alamat_pangkalan`, `kwaran`, `desa`, `created_date`, `kamabigus`, `kagudep`, `jumlah_pembina`, `petugas`) VALUES
(94, 'SMA 3 HOS COKROAMINOTO', 'Jl HOS Cokroaminoto No. 3', '17', NULL, '2021-06-09 12:56:47', 'Pandu Nusantara', 'Cakra Buana', 10, NULL),
(100, 'sma 2 cakra', 'hhhh', '17', NULL, '2021-09-25 11:00:05', 'hhh', 'hhh', 3, NULL),
(101, 'MA MATHOLIUL ULUM BANJARAGUNG', 'BANJARAGUNG RT 002 RW 005 BANJAR AGUNG BANGSRI', '3', NULL, '2021-09-25 11:01:08', 'Drs. ALI MURTADLO', 'ABDUL GHONI, S.Pd.I.', 2, NULL),
(103, 'SD NEGERI 1 LEBAK', 'JL. Jepara-Lebak KM. 11 Desa Lebak ', '16', NULL, '2021-09-25 11:02:03', 'SUDIHARTO, S.Pd', 'UBAIDILLAH, S.Pd.SD', 10, NULL),
(105, 'SD NEGERI 2 SENDANG', 'Ds. Sendang RT 01 RW 02 Kecamatan Kalinyamatan Kabupaten Jepara', '10', NULL, '2021-09-25 11:02:38', 'Muhammad Mujiyono, S.Pd., M.Pd', 'Zaenal Arifin, M.Pd', 7, NULL),
(106, 'SDN 3 MANTINGAN', 'Jl. Jepaten Mantingan', '6', NULL, '2021-09-25 11:05:16', 'M. Yazid, S.Pd.SD', 'Zarohman', 5, NULL),
(107, 'SDN 3 PECANGAAN WETAN', 'Jalan Flamboyan No 03 Pulodarat Pecangaan', '9', NULL, '2021-09-25 11:07:52', 'ZAINUDIN, S.Pd., M.Pd', 'ZAINUDIN, S.Pd., M.Pd', 7, NULL),
(108, 'SDN 1 KELING', 'Jl. Jepara-Pati Km 10', '1', NULL, '2021-09-25 11:09:20', 'NGATINAH, S.Pd.SD.', 'GANDUNG WAHYU RISMAWAN, S.Pd.', 2, NULL),
(109, 'SDN 2 KELING', 'Jl. Jepara_Pati Km 10', '1', NULL, '2021-09-25 11:10:18', 'BUDARTI, S.Pd.SD.', 'AGUNG T.H., S.Pd', 2, NULL),
(110, 'SDN 3 KELING', 'Jl. Jepara_pati Km 10', '1', NULL, '2021-09-25 11:11:05', 'BUDARTI, S.Pd.SD.', 'RIZAL WIRAYANA, S.Pd', 2, NULL),
(111, 'sdn4bandungharjo', 'Jl. Kh Mathori Bandungharjo', '15', NULL, '2021-09-25 11:11:29', 'Ridwan, S.Pd', 'Achmad Nurhuda, S.Pd', 2, NULL),
(112, 'SDN 4 KELING', 'Dukuh Bono Desa Keling', '1', NULL, '2021-09-25 11:41:26', 'SUTINI, S.Pd.SD.', 'UNTIYANI, S.Pd.', 2, NULL),
(114, 'SDN 5 KELING', 'Jl. Abiyoso No. 54 Desa Keling Kecamatan Keling (59454)', '1', NULL, '2021-09-25 11:50:55', 'NGATINAH, S.Pd.SD.', 'ACHMAD RAHANDIANTO, S.Pd.', 2, NULL),
(181, 'SD N 1 BUGEL ', 'BUGEL', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(182, 'SD N 2 BUGEL', 'BUGEL', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(183, 'SD N 3 BUGEL ', 'BUGEL', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(184, 'SD N 1 MENGANTI ', 'MENGANTI', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(185, 'SD N 3 MENGANTI ', 'MENGANTI', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(186, 'SD N 1 KERSO ', 'KERSO', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(187, 'SD N 2 KERSO ', 'KERSO', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(188, 'SD N BULAKBARU', 'BULAKBARU', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(189, 'SD N TANGGULTLARE', 'TANGGUL TLARE', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(190, 'SD N RAU', 'RAU', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(191, 'SD N 1 SUKOSONO ', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(192, 'SD N 2 SUKOSONO', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(193, 'SD N 3 SUKOSONO', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(194, 'SD N 5 SUKOSONO ', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(195, 'SD N 1 DONGOS ', 'DONGOS', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(196, 'SD N 2 DONGOS ', 'DONGOS', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(197, 'SD N 4 DONGOS ', 'DONGOS', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(198, 'SD N 1 SOWAN LOR ', 'SOWAN LOR', '7', NULL, '2021-09-26 08:04:16', 'ada', 'ada', 2, '116'),
(199, 'SD N 2 SOWAN LOR ', 'SOWAN LOR', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(200, 'SD N 3 SOWAN LOR ', 'SOWAN LOR', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(201, 'SD N SOWAN KIDUL', 'SOWAN KIDUL', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(202, 'SD N WANUSOBO', 'WANUSOBO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(203, 'SD N JONDANG', 'JONDANG', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(204, 'SD N 1 SURODADI ', 'SURODADI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(205, 'SD N 2 SURODADI ', 'SURODADI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(206, 'SD N PANGGUNG', 'PANGGUNG', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(207, 'SD N KALIANYAR', 'KALIANYAR', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(208, 'SD N 1 TEDUNAN ', 'TEDUNAN', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(209, 'SD N 2 TEDUNAN ', 'TEDUNAN', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(210, 'SD N 1 KARANGAJI ', 'KARANGAJI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(211, 'SD N 3 KARANGAJI ', 'KARANGAJI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(212, 'SD N 1 KEDUNG', 'KEDUNG', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(213, 'SD N 2 KEDUNG ', 'KEDUNG', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(214, 'SD N 3 KEDUNG ', 'KEDUNG', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(215, 'MI MATHOLI\'UL HUDA', 'BUGEL', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(216, 'MI DARUL HIKMAH', 'MENGANTI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(217, 'MI DATUK SINGARAJA', 'KERSO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(218, 'MI MAFATIHUL HUDA', 'RAU', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(219, 'MI SULTAN FATTAH', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(220, 'MI MIFTAHUL HUDA', 'DONGOS', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(221, 'MI TAMRINUTH THULLAB', 'SOWAN LOR', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(222, 'MI AL-FAUZIYAH', 'SURODADI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(223, 'MI HIDAYATUL MUBTADI', 'SURODADI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(224, 'MI SAFINATUL HUDA', 'SOWAN KIDUL', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(225, 'MI ROUDHOTUSSIBYAN', 'SOWAN KIDUL', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(226, 'MI SALAFIYAH', 'WANUSOBO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(227, 'MI SHOFA MARWAH', 'SOWAN LOR', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(228, 'SMPN 1 KEDUNG', 'SOWAN LOR', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(229, 'SMPN 2 KEDUNG', 'SOWAN LOR', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(230, 'SMP ISLAM DATUK SINGARAJA', 'KERSO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(231, 'SMP ISLAM KEDUNG', 'SOWAN LOR', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(232, 'SMP ISLAM DARURROHMAN', 'JONDANG', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(233, 'MTS MATHOLI\'UL HUDA', 'BUGEL', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(234, 'MTS DARUL HIKMAH', 'MENGANTI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(235, 'MTS MAFATIHUL HUDA ', 'RAU', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(236, 'MTS SULTAN FATAH', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(237, 'MTS MIFTAHUL HUDA', 'DONGOS', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(238, 'MTS SAFINATUL HUDA', 'SOWAN KIDUL', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(239, 'MTS TASMIRUSY SUBYAN', 'TEDUNAN', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(240, 'MTS MABDAUL HUDA', 'KARANGAJI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(241, 'MTS MAFATIHUT THULLAB', 'SURODADI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(242, 'MTS ITTIHADUL MUSLIMIN', 'KERSO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(243, 'MTS SOFA MARWA', 'SOWAN LOR', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(244, 'MA.MATHOLI\'UL HUDA', 'BUGEL', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(245, 'MA.DARUL HIKMAH', 'MENGANTI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(246, 'MA.TASMIRUSY SUBYAN', 'TEDUNAN', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(247, 'MA. KI AJI TUNGGAL', 'KARANGAJI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(248, 'MA.MAFATIHUT THULLAB', 'SURODADI', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(249, 'MA.ITTIHADUL MUSLIMIN', 'KERSO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(250, 'SMA NU KEDUNG', 'BUGEL', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(251, 'MA.SOFA MARWA', 'SOWAN LOR', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(252, 'MTS SALAFIYAH', 'WANUSOBO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(253, 'SMPN 3 KEDUNG', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(254, 'MTS MIFTAHUL ULUM', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:17', 'ada', 'ada', 2, '116'),
(255, 'SMKN KEDUNG', 'DONGOS', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(256, 'MA.MIFTAHUL HUDA', 'DONGOS', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(257, 'SMP ISLAM AL-AZHAR', 'KEDUNG MALANG', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(258, 'SMP ISLAM SUNAN MURIA', 'DONGOS', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(259, 'SMK DATUK SINGARAJA', 'KERSO', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(260, 'MI MIFTAHUL ULUM', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(261, 'MI ITTIHADUL MUSLIMIN', 'KERSO', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(262, 'MA. SAFINATUL HUDA ', 'SOWAN KIDUL', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(263, 'MA. MIFTAHUL ULUM', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(264, 'MI AL HUDA', 'JONDANG', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(265, 'MI KI AJI TUNGGAL', 'KARANGAJI', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(266, 'MA. SULTAN FATTAH ', 'SUKOSONO', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(267, 'MTS NU AL MUSTAQIM', 'BUGEL', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(268, 'MA. NU AL MUSTAQIM', 'BUGEL', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(269, 'SMP TAHFIDZ AL HUDA KEDUNG', 'JONDANG', '7', NULL, '2021-09-26 08:04:18', 'ada', 'ada', 2, '116'),
(270, 'SD NEGERI 2 PEKALONGAN', 'Jl. Bantengan RT.04 RW.02 Desa Pekalongan Kecamatan Batealit Kabupaten Jepara', '8', NULL, '2021-09-26 18:42:39', 'KARSONO, S.Pd.SD', 'TALKHIS KUMALASARI, S.Pd.SD', 8, NULL),
(271, 'SD NEGERI 1 BRINGIN', 'Jl. Batealit - Tanjung Km.04 Bringin RT.12 RW.05 Batealit Jepara', '8', NULL, '2021-09-28 08:38:46', 'JAETUN, S.Pd', 'M. ERWIN SAPUTRA, S.Pd.SD', 8, NULL),
(272, 'SD NEGERI 1 MINDAHAN', 'MINDAHAN', '8', NULL, '2021-09-28 21:30:31', 'HARTI SURATMI, S.Pd', 'M. SYAIFUDIN', 10, '115'),
(273, 'SDN 1 PANGGANG', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(274, 'SDN 2 PANGGANG', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(275, 'SDN 4 PANGGANG', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(276, 'SDN 5 PANGGANG', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(277, 'SDN 6 PANGGANG', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(278, 'SDN 9 PANGGANG', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(279, 'SDN BAPANGAN', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(280, 'SDN POTROYUDAN', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(281, 'SDN SARIPAN', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(282, 'SDIT AMAL INSANI', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(283, 'SDS AL ISLAH BAPANGAN', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(284, 'SDN 1 JOBOKUTO', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(285, 'SDN 2 JOBOKUTO', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(286, 'SDN 1 BULU', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(287, 'SDN 2 BULU', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(288, 'SDN KAUMAN', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(289, 'SDN DEMAAN', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(290, 'SDN KARANGKEBAGUSAN', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(291, 'SDS MUHAMMADIYAH', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(292, 'SDS MASEHI', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(293, 'SDS KANISIUS', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(294, 'SDN 1 MULYOHARJO', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(295, 'SDN 2 MULYOHARJO', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(296, 'SDN 4 MULYOHARJO', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(297, 'SDN 5 MULYOHARJO', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(298, 'SDN 6 MULYOHARJO', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(299, 'SDN 1 KUWASEN', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(300, 'SDN 2 KUWASEN', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(301, 'SDN 3 KUWASEN', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(302, 'SDN 1 WONOREJO', NULL, '5', NULL, '2021-09-29 12:58:26', NULL, NULL, NULL, '113'),
(303, 'SDN 2 WONOREJO', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(304, 'SDUT BUMI KARTINI', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(305, 'SDN 1 KEDUNGCINO', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(306, 'SDN 2 KEDUNGCINO', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(307, 'SDN 4 KEDUNGCINO', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(308, 'SDN 1 BANDENGAN', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(309, 'SDN 2 BANDENGAN', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(310, 'SDN 3 BANDENGAN', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(311, 'SDN 2 UJUNGBATU', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(312, 'SDN 3 UJUNGBATU', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(313, 'SDN 1 PENGKOL', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(314, 'SDN 2 PENGKOL', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(315, 'SDS AL ISLAM', NULL, '5', NULL, '2021-09-29 12:58:27', NULL, NULL, NULL, '113'),
(316, 'SD NEGERI TRITIS', 'Jln Dukuh Krajan Desa Tritis RT 01 RW 03 Nalumsari Jepara', '13', NULL, '2021-09-29 18:43:00', 'SITI HINDUN,S.Pd.SD', 'ABDUL BAKAR,S.Pd.', 7, NULL),
(317, 'SDN 2 PRINGTULIS', 'Desa Pringtulis Kec. Nalumsari Kab. Jepara', '13', NULL, '2021-09-29 18:47:52', 'SITI ALFIAH,S.Pd.', 'MARGOYOSO,S.Pd.', 9, NULL),
(318, 'SDN JATISARI', 'Desa Jatisari RT 02 RW 02 Nalumsari', '13', NULL, '2021-09-29 18:49:46', 'SEGER,S.Pd.SD', 'NOOR AVNI ANISTIQOMAH,S.Pd.', 7, NULL),
(319, 'SDN 2 GEMIRINGKIDUL', 'Jln. Sri Podang Desa Gemiringkidul', '13', NULL, '2021-09-29 18:51:45', 'SEGER,S.Pd.SD', 'NANANG BUDIANTO', 8, NULL),
(320, 'SDN 5 BATEGEDE', 'Bategede RT 03 RW 05 Nalumsari Jepara', '13', NULL, '2021-09-29 18:53:38', 'PURNOMO,S.Pd.SD', 'GALUH SWANDANI,S.Pd.SD', 8, NULL),
(321, 'SDN 2 TUNGGUL', 'Jl. Tunggul-Nalumsari Desa Tunggul Pandean RT 02 RW 03', '13', NULL, '2021-09-29 18:55:44', 'TUKIMIN,S.Pd.SD', 'ISTIFAIYAH,S.Pd.I', 8, NULL),
(322, 'SDN 4 BATEGEDE', 'Jl. Sreni Indah Km 1 Bategede Nalumsari', '13', NULL, '2021-09-29 18:57:21', 'SUTADI,S.Pd.SD', 'IRVAN HENDRO SUKOCO,S.Pd.SD', 8, NULL),
(323, 'SDN 2 BENDANPETE', 'Bendanpete RT 006 RW 001 Nalumsari Jepara', '13', NULL, '2021-09-29 18:59:14', 'SRI NOOR HAYATI,S.Pd.', 'SUNOTO,S.Pd.', 9, NULL),
(324, 'SDN 3 BLIMBINGREJO', 'Desa Blimbingrejo RT 06 RW 03 Nalumsari', '13', NULL, '2021-09-29 19:01:19', 'KASDONO,S.Pd.SD', 'WINDHI PUJIASTUTI,S.Pd.SD', 7, NULL),
(325, 'SDN 4 MURYOLOBO', 'Desa Muryolobo RT 01 RW 02 Nalumsari ', '13', NULL, '2021-09-29 19:03:12', 'SUTARJO,S.Pd.', 'ENDAH SULISTYANINGSIH,S.Pd.', 7, NULL),
(326, 'SDN 3 NALUMSARI', 'Dukuh Gerjen Desa Nalumsari Jepara', '13', NULL, '2021-09-29 19:05:21', 'SUPARTI,S.Pd.', 'SUKIRMAN,S.Pd.', 7, NULL),
(327, 'SD MUHAMMADIYAH BLIMBINGREJO', 'Komplek Perguruan Muhammadiyah Blimbingrejo RT 02/03 Kec. Nalumsari', '13', NULL, '2021-09-29 19:07:46', 'MUH. FATKHUR RIJAL,S.Ag.', 'NUR SOFIATUN,S.Pd.', 14, NULL),
(328, 'SDN 1 BATEGEDE', 'Jl. Sreni Indah Bategede', '13', NULL, '2021-09-29 19:09:17', 'RUSTIAH,S.Pd.SD', 'SRI ARWATI,S.Pd.SD', 10, NULL),
(329, 'SDN 1 TUNGGUL ', 'Jl. KUDUS-JEPARA KM 11 RT 06 RW 01 DESA TUNGGUL PANDEAN NALUMSARI', '13', NULL, '2021-09-29 19:14:14', 'SUPAR,S.Pd.', 'MILA SHOLIKHATI,S.Pd.', 8, NULL),
(330, 'SDN 1 DORANG', 'Jln. DORANG-NALUMSARI JEPARA', '13', NULL, '2021-09-29 19:16:10', 'DARWAN,S.Pd.', 'DARWAN,S.Pd.', 9, NULL),
(331, 'SDN 3 NGETUK', 'DUKUH GLATIKWATU NGETUK', '13', NULL, '2021-09-29 19:18:18', 'ZULAEKHAN,S.Pd.', 'SUDIHARTO,S.Pd.SD', 9, NULL),
(332, 'SDN 3 KARANGNONGKO', 'DESA KARANGNONGKO NALUMSARI', '13', NULL, '2021-09-29 19:20:03', 'KUSNANTO,S.Pd.SD', 'ALI MAHMUDI,S.Pd.', 8, NULL),
(333, 'SDN 2 DAREN', 'Jl.SETIA KAWAN N0. 56 DAREN KEC.  NALUMSARI', '13', NULL, '2021-09-29 19:22:12', 'SARWONO,S.Pd.', 'SITI MAESAROH,S.Pd.', 8, NULL),
(334, 'SDN 1 KARANGNONGKO', 'DESA KARANGNONGKO RT 01 RW 01 NALUMSARI JEPARA', '13', NULL, '2021-09-29 19:24:19', 'ALI MUSTHOFA,S.Pd.I.', 'SRI NOOR FANDILAH,S.Pd.SD', 9, NULL),
(335, 'SDN 3 DORANG', 'Jln. DORANG-NALUMSARI', '13', NULL, '2021-09-29 19:25:59', 'SUCIPTO,S.Pd.', 'NOOR SALIM,S.Pd.', 8, NULL),
(336, 'SDN 1 GEMIRINGKIDUL', 'DESA GEMIRINGKIDUL NALUMSARI JEPARA', '13', NULL, '2021-09-29 19:28:10', 'SRI HARININGSIH,S.Pd.SD', 'ANIK SULISTYOWATI,S,Pd.', 8, NULL),
(337, 'SDN 2 GEMIRINGLOR', 'Jl. DS. GEMIRINGLOR RT 03 RW 05 KEC. NALUMSARI KAB. JEPARA', '13', NULL, '2021-09-29 19:30:33', 'SRI HARININGSIH,S.Pd.SD', 'ERIK WAHYUDI,S.Pd.', 8, NULL),
(338, 'SDN 1 MURYOLOBO', 'DESA MURYOLOBO KEC, NALUMSARI KAB. JEPARA', '13', NULL, '2021-09-29 19:32:43', 'SUPRATNO,S.Pd.', 'ALI MUSAFAK,S.Pd.SD', 8, NULL),
(339, 'SDN 1 BENDANPETE', 'BENDANPETE RT 05 RW 02 NALUMSARI JEPARA', '13', NULL, '2021-09-29 19:36:28', 'HARTONO,S.Pd.', 'SRI WINARTI,S.Pd.SD', 5, NULL),
(340, 'SDN 2 BATEGEDE', 'Jl.SRENI INDAH KEC, NALUMSARI KAB. JEPARA', '13', NULL, '2021-09-29 19:39:16', 'YUSUF AFANDI,S.Pd.SD', 'URIP HARTOYO,S.Pd.SD', 8, NULL),
(341, 'SDN 2 DORANG ', 'DESA DORANG RT 06 RW 01 ', '13', NULL, '2021-09-29 19:41:12', 'TRI MULYAWATI,S.Pd.', 'SOFIATUN,S.Pd.SD', 7, NULL),
(342, 'SDN 3 MURYOLOBO', 'DESA MURYOLOBO KEC. NALUMSARI KAB. JEPARA', '13', NULL, '2021-09-29 19:43:21', 'SUPARMAN,S.Pd.SD', 'PARYONO,S.Pd.SD', 8, NULL),
(343, 'SDN 1 PRINGTULIS', 'DESA PRINGTULIS RT 04 RW O5', '13', NULL, '2021-09-29 19:45:27', 'PUJIANTO,S.Pd.', 'TIPON JULI CHASANOVA FITRI,S.Pd.SD', 4, NULL),
(344, 'SDN 1 BLIMBINGREJO', 'Jl. KARANGMALANG NO. 1 DESA BLIMBINGREJO 08/02', '13', NULL, '2021-09-29 19:48:08', 'NOOR YASIN,S.Pd.', 'SRI DWI WINARNI,S.Pd.SD', 11, NULL),
(345, 'SDN 2 BLIMBINGREJO', 'Jl. TANJUNG RT 02 RW 05 BLIMBINGREJO NALUMSARI', '13', NULL, '2021-09-29 19:49:51', 'NOOR YASIN,S.Pd.', 'KUSNIN,S.Pd.', 6, NULL),
(346, 'SDN 1 GEMIRINGLOR', 'DUKUH KRAJAN RT 03 RW 05 GEMIRINGLOR  KEC. NALUMSARI KAB. JEPARA', '13', NULL, '2021-09-29 19:52:22', 'ABDUL AZIS,S.Pd.', 'JOKO SUSILO,S.Pd.SD', 8, NULL),
(347, 'SDN 3 BENDANPETE', 'Jl. SRENI INDAH DESA BENDAPETE', '13', NULL, '2021-09-29 19:54:14', 'ARIF SETIYADI,S.Pd.', 'SAKILAH,S.Pd', 7, NULL),
(348, 'SDN 1 NGETUK', 'Jl. YUDISTIRA NO. 1', '13', NULL, '2021-09-29 19:56:01', 'ARIF SETIYADI,S.Pd.', 'BINTORO,S.Pd.', 7, NULL),
(349, 'SDN 2 NALUMSARI', 'NALUMSARI RT 01RW 02', '13', NULL, '2021-09-29 19:57:51', 'PAIMIN,S.Pd.SD', 'SRI HAYATI,S.Pd.sd', 9, NULL),
(350, 'SDN 2 KARANGNONGKO', 'DESA KARANGNONGKO KEC. NALUMSARI KAB. JEPARA', '13', NULL, '2021-09-29 20:00:07', 'HIDAYATUN JUMADI,S.Pd.', 'DWIE FIERMANSYAH', 8, NULL),
(351, 'SDN 1 DAREN', 'Jln. DAREN-NALUMSARI JEPARA', '13', NULL, '2021-09-29 20:01:23', 'SARWONO,S.Pd.', 'SUDI,S.Pd.', 8, NULL),
(352, 'SDN 3 TUNGGUL', 'DS. TUNGGUL PANDEAN RT 02 RW 02 KEC. NALUMSARI KAB. JEPARA', '13', NULL, '2021-09-29 20:03:32', 'MASNUATUN NADLIFAH,S.Pd.', 'SULIKAN,S.Pd.', 10, NULL),
(353, 'SDIT HIDAYATULLAH', 'DS. DAREN RT01 RW 01 NALUMSARI JEPARA', '13', NULL, '2021-09-29 20:06:17', 'MOH. DHANI AL HAQ,S.Pd.M.Pd.', 'CHANDRI VIDYA SARI,S.Pd.', 9, NULL),
(354, 'SDN 2 MURYOLOBO', 'DESA MURYOLOBO KEC. NALUMSARI KAB. JEPARA', '13', NULL, '2021-09-29 20:08:08', 'SUPRATNO,S.Pd.', 'SUSILOWATI,S.Pd.SD', 8, NULL),
(355, 'SDN 2 NGETUK', 'Jln. SRENI INDAH RT 1 RW 1 NGETUK NALUMSARI ', '13', NULL, '2021-09-29 20:10:16', 'HARTONO,S.Pd.', 'HERY IRIANI,S.Pd.', 7, NULL),
(356, 'SDN 1 NALUMSARI', 'DESA NALUMSARI RT 01 RW 01', '13', NULL, '2021-09-29 20:11:48', 'PAIMIN,S.Pd.SD', 'SRI MULYANI,S.Pd.', 9, NULL),
(358, 'SMP 2 CAKRA', 'jepara', '17', NULL, '2021-09-29 22:44:56', 'agus', 'wawan', 0, NULL),
(359, 'MI SABILUL HUDA NALUMSARI', 'Jln. RAYA NALUMSARI RT 01 RW 01', '13', NULL, '2021-09-30 06:43:45', 'NURYATI,S.Pd.I', 'MUHLIS,S.Pd.I', 4, NULL),
(360, 'MIS NURUL HUDA GEMIRING KIDUL', 'DESA GEMIRING KIDUL', '13', NULL, '2021-09-30 06:46:59', 'SUBKHAN,S.Pd.i', 'ZAKIYAH,S.Pd.I', 10, NULL),
(361, 'MI NURUL HUDA NALUMSARI', 'Jln. MASJID ATTAQWA RT 04 RW 06', '13', NULL, '2021-09-30 06:50:56', 'SUGITO,S.Pd.I', 'SUTI\'AH,S.Pd.I', 2, NULL),
(362, 'MI ANNUR', 'DAREN', '13', NULL, '2021-09-30 06:53:48', 'ULIN NUHA,S.Pd.I', 'M.SHOLEH,S.Pd.I', 2, NULL),
(363, 'MI NURUL HUDA MURYOLOBO', 'DESA MURYOLOBO', '13', NULL, '2021-09-30 06:58:01', 'MUSLIMIN,S.Sos.I', 'MUSLIMIN,S.Sos.I', 2, NULL),
(364, 'MI NU AL  MA\'ARIF BLIMBINGREJO', 'Jln. LEBE 06/04 BLIMBINGREJO  NALUMSARI ', '13', NULL, '2021-09-30 07:01:40', 'SANDIMAN,S.Pd.I', 'ROMI HARYANTO,S.Pd.I', 2, NULL),
(365, 'MIS MIFTAHUL FALAH ', 'Dk. KRAJAN TIMUR RT 001 RW 002 KARANGNONGKO NALUMSARI', '13', NULL, '2021-09-30 07:08:00', 'DIAN QISMIYATUN,S.Ag.', 'MARIA ULFA,S.Pd.i', 3, NULL),
(366, 'MI MAZRO\'ATUL ULUM PRINGTULIS', 'DESA PRINGTULIS RT 02 RW 03 NALUMSARI', '13', NULL, '2021-09-30 07:11:52', 'MAHMUDAH,S.Ag.M.Pd.I', 'UMI KHOIRIYAH,S.Pd.', 2, NULL),
(367, 'MI NURUL ILMI BATEGEDE', 'BATEGEDE', '13', NULL, '2021-09-30 07:15:07', 'SUNTORO,M.Pd.', 'SLAMET,S.Pd.SD', 4, NULL),
(368, 'MI AL HUDA GEMIRING LOR', 'GEMIRING LOR RT 02 RW 07', '13', NULL, '2021-09-30 07:20:44', 'KHUMAEROH,S.Ag.', 'SITI ASRIPAH,S.Pd.I', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pangkalan_sementara`
--

CREATE TABLE `tb_pangkalan_sementara` (
  `id_pangkalan` int(12) NOT NULL,
  `nama_pangkalan` varchar(255) DEFAULT NULL,
  `alamat_pangkalan` text,
  `kwaran` varchar(10) DEFAULT NULL,
  `desa` varchar(10) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `kamabigus` varchar(100) DEFAULT NULL,
  `kagudep` varchar(100) DEFAULT NULL,
  `jumlah_pembina` int(10) DEFAULT NULL,
  `petugas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sifat_kepemilikan`
--

CREATE TABLE `tb_sifat_kepemilikan` (
  `id_sifat` int(10) NOT NULL,
  `sifat_kepemilikan` varchar(20) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_sifat_kepemilikan`
--

INSERT INTO `tb_sifat_kepemilikan` (`id_sifat`, `sifat_kepemilikan`, `created_date`) VALUES
(1, 'Tetap', '2020-12-08 08:59:02'),
(2, 'Kondisional', '2020-12-08 08:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_kepemilikan`
--

CREATE TABLE `tb_status_kepemilikan` (
  `id` int(10) NOT NULL,
  `status_kepemilikan` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_status_kepemilikan`
--

INSERT INTO `tb_status_kepemilikan` (`id`, `status_kepemilikan`, `created_date`) VALUES
(1, 'Milik Sendiri', '2020-12-08 08:55:51'),
(2, 'Menumpang', '2020-12-08 08:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tingkatan`
--

CREATE TABLE `tb_tingkatan` (
  `id_tingkatan` int(12) NOT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `sub_tingkat` varchar(20) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_tingkatan`
--

INSERT INTO `tb_tingkatan` (`id_tingkatan`, `tingkat`, `sub_tingkat`, `created_date`) VALUES
(1, 'siaga', 'mula', '2020-12-12 09:03:15'),
(2, 'siaga', 'bantu', '2020-12-12 09:03:21'),
(3, 'siaga', 'tata', '2020-12-12 09:03:25'),
(4, 'siaga', 'garuda', '2020-12-12 09:03:30'),
(5, 'penggalang', 'ramu', '2020-12-12 09:03:38'),
(6, 'penggalang', 'rakit', '2020-12-12 09:03:44'),
(7, 'penggalang', 'terap', '2020-12-12 09:03:57'),
(8, 'penggalang', 'garuda', '2020-12-12 09:04:01'),
(9, 'penegak', 'bantara', '2020-12-12 09:04:07'),
(10, 'penegak', 'laksana', '2020-12-12 09:04:13'),
(11, 'penegak', 'garuda', '2020-12-12 09:04:19'),
(12, 'pandega', 'pandega', '2020-12-12 09:04:28'),
(13, 'pandega', 'garuda', '2020-12-12 09:04:36'),
(14, 'dewasa', 'NK', '2020-12-12 10:19:29'),
(15, 'dewasa', 'kmd', '2020-12-12 10:19:39'),
(16, 'dewasa', 'kml', '2020-12-12 10:19:43'),
(17, 'dewasa', 'kpd', '2020-12-12 10:19:47'),
(18, 'dewasa', 'kpl', '2020-12-12 10:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(15) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `level` enum('1','2','3','4') DEFAULT '4',
  `id_kwaran` varchar(20) DEFAULT NULL,
  `id_pangkalan` varchar(20) DEFAULT NULL,
  `img_user` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `email`, `display_name`, `level`, `id_kwaran`, `id_pangkalan`, `img_user`, `created_date`) VALUES
(1, 'admin', 'd7ed2401ea053d68895ababc33bf9463', 'kwarcabjepara1120@gmail.com', 'kwarcab jepara', '1', 'admin', 'admin', NULL, '2020-12-02 09:40:20'),
(107, 'donorojo', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Kwarran Donorojo', '2', '15', NULL, NULL, '2021-01-18 15:55:02'),
(108, 'keling', '827ccb0eea8a706c4c34a16891f84e7b', '1234', 'Kwaran Keling', '2', '1', NULL, NULL, '2021-01-18 16:02:14'),
(109, 'kembang', '827ccb0eea8a706c4c34a16891f84e7b', '123', 'Kwarran Kembang', '2', '2', NULL, NULL, '2021-01-18 16:03:52'),
(110, 'bangsri', '827ccb0eea8a706c4c34a16891f84e7b', '111', 'Kwarran Bangsri', '2', '3', NULL, NULL, '2021-01-18 16:05:17'),
(111, 'mlonggo', '827ccb0eea8a706c4c34a16891f84e7b', '121', 'Kwarran Mlonggo', '2', '4', NULL, NULL, '2021-01-18 16:07:21'),
(112, 'pakisaji', '827ccb0eea8a706c4c34a16891f84e7b', '12123', 'Kwarran Pakis Aji', '2', '16', NULL, NULL, '2021-01-18 16:08:57'),
(113, 'jepara', '827ccb0eea8a706c4c34a16891f84e7b', '131', 'Kwarran Jepara', '2', '5', NULL, NULL, '2021-01-18 16:14:24'),
(114, 'tahunan', '827ccb0eea8a706c4c34a16891f84e7b', '-', 'Kwarran Tahunan', '2', '6', NULL, NULL, '2021-01-18 16:15:48'),
(115, 'batealit', '827ccb0eea8a706c4c34a16891f84e7b', 'qw1', 'Kwarran Batealit', '2', '8', NULL, NULL, '2021-01-18 16:17:19'),
(116, 'kedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada', 'Kwarran Kedung', '2', '7', NULL, NULL, '2021-01-18 16:18:42'),
(117, 'pecangaan', '827ccb0eea8a706c4c34a16891f84e7b', 'shhk', 'Kwarran Pecangaan', '2', '9', NULL, NULL, '2021-01-18 16:21:27'),
(118, 'welahan', '827ccb0eea8a706c4c34a16891f84e7b', 'khklhl', 'Kwarran Welahan', '2', '12', NULL, NULL, '2021-01-18 16:23:28'),
(119, 'kalinyamatan', '827ccb0eea8a706c4c34a16891f84e7b', 'khiugig', 'Kwarran Kalinyamatan', '2', '10', NULL, NULL, '2021-01-18 16:29:48'),
(120, 'nalumsari', '827ccb0eea8a706c4c34a16891f84e7b', 'ihoih', 'Kwarran Nalumsari', '2', '13', NULL, NULL, '2021-01-18 16:30:28'),
(121, 'mayong', '827ccb0eea8a706c4c34a16891f84e7b', 'klhlpl', 'Kwarran Mayong', '2', '11', NULL, NULL, '2021-01-18 16:31:11'),
(122, 'karimunjawa', '827ccb0eea8a706c4c34a16891f84e7b', 'lkhhpj', 'Kwarran Karimunjawa', '2', '14', NULL, NULL, '2021-01-18 16:31:38'),
(124, 'super', 'b0dd7a17018a68d06f933d1b9768bf8a', NULL, 'PengenNgoding', '1', 'admin', 'admin', NULL, '2021-06-02 12:54:22'),
(128, 'cakra', '2a7d24a81b94a7d9d998d25994128c93', 'cakra@gmail.com', 'CAKRABASWARA', '2', '17', NULL, NULL, '2021-06-14 19:13:04'),
(131, 'sd1lebak', '827ccb0eea8a706c4c34a16891f84e7b', 'sdnlebak01@gmail.com', 'SD NEGERI 1 LEBAK', '3', NULL, '103', NULL, '2021-09-25 11:07:49'),
(132, 'mamatholiululum', '827ccb0eea8a706c4c34a16891f84e7b', 'mamubajepara@gmailcom', 'MA MATHOLIUL ULUM BANJARAGUNG', '3', NULL, '101', NULL, '2021-09-25 11:08:28'),
(134, 'mamiftahulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'mamifda@gmail.com', 'MA Miftahul Huda Dongos', '3', NULL, '102', NULL, '2021-09-25 11:09:52'),
(135, 'contoh', '827ccb0eea8a706c4c34a16891f84e7b', 'contoh@gmail.com', 'contoh', '3', NULL, '104', NULL, '2021-09-25 11:11:31'),
(136, 'sdn4bandungharjo', '827ccb0eea8a706c4c34a16891f84e7b', 'bandung@gmail.com', 'sdn4bandungharjo', '3', NULL, '111', NULL, '2021-09-25 11:12:47'),
(137, 'sdn2sendang', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2sendang@gmail.com', 'SD NEGERI 2 SENDANG', '3', NULL, '105', NULL, '2021-09-25 11:14:42'),
(138, 'sdn3mantingan', '827ccb0eea8a706c4c34a16891f84e7b', 'taufiqoye@gmail.com', 'sdn 3 mantingan', '3', NULL, '106', NULL, '2021-09-25 11:39:14'),
(139, 'sdn5keling', '827ccb0eea8a706c4c34a16891f84e7b', 'rahand.jepara@gmail.com', 'sdn5keling', '3', NULL, '114', NULL, '2021-09-25 11:52:53'),
(140, 'sdn2kedungcino', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2kedungcino@gmail.com', 'SDN 2 KEDUNGCINO', '3', NULL, '113', NULL, '2021-09-25 11:56:46'),
(142, 'sdn2bugel', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 2 BUGEL', '3', NULL, '182', NULL, '2021-09-27 07:16:18'),
(143, 'sdn1bugel', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 1 BUGEL ', '3', NULL, '181', NULL, '2021-09-27 07:17:35'),
(144, 'sdn3bugel ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 3 BUGEL ', '3', NULL, '183', NULL, '2021-09-27 07:32:18'),
(145, 'sdn1menganti ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 1 MENGANTI ', '3', NULL, '184', NULL, '2021-09-27 07:43:29'),
(146, 'sdn3menganti ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 3 MENGANTI ', '3', NULL, '185', NULL, '2021-09-27 07:44:03'),
(147, 'sdn1kerso ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 1 KERSO ', '3', NULL, '186', NULL, '2021-09-27 07:44:30'),
(148, 'sdn2kerso ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 2 KERSO ', '3', NULL, '187', NULL, '2021-09-27 07:46:01'),
(149, 'sdnbulakbaru', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N BULAKBARU', '3', NULL, '188', NULL, '2021-09-27 07:47:25'),
(150, 'sdntanggultlare', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N TANGGULTLARE', '3', NULL, '189', NULL, '2021-09-27 07:48:35'),
(151, 'sdnrau', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N RAU', '3', NULL, '190', NULL, '2021-09-27 07:52:11'),
(152, 'sdn1sukosono ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 1 SUKOSONO ', '3', NULL, '191', NULL, '2021-09-27 07:52:35'),
(153, 'sdn2sukosono', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 2 SUKOSONO', '3', NULL, '192', NULL, '2021-09-27 07:52:58'),
(154, 'sdn3sukosono', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 3 SUKOSONO', '3', NULL, '193', NULL, '2021-09-27 07:53:24'),
(155, 'sdn5sukosono ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 5 SUKOSONO ', '3', NULL, '194', NULL, '2021-09-27 07:53:45'),
(156, 'sdn1dongos ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 1 DONGOS ', '3', NULL, '195', NULL, '2021-09-27 07:54:10'),
(157, 'sdn2dongos ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 2 DONGOS ', '3', NULL, '196', NULL, '2021-09-27 07:54:34'),
(158, 'sdn4dongos ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 4 DONGOS ', '3', NULL, '197', NULL, '2021-09-27 07:54:55'),
(159, 'sdn1sowanlor ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 1 SOWAN LOR ', '3', NULL, '198', NULL, '2021-09-27 07:55:25'),
(160, 'sdn2sowanlor ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 2 SOWAN LOR ', '3', NULL, '199', NULL, '2021-09-27 07:56:19'),
(161, 'sdn3sowanlor ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 3 SOWAN LOR ', '3', NULL, '200', NULL, '2021-09-27 07:56:38'),
(162, 'sdnsowankidul', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N SOWAN KIDUL', '3', NULL, '201', NULL, '2021-09-27 07:57:00'),
(163, 'sdnwanusobo', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N WANUSOBO', '3', NULL, '202', NULL, '2021-09-27 08:16:57'),
(164, 'sdnjondang', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N JONDANG', '3', NULL, '203', NULL, '2021-09-27 08:17:22'),
(165, 'sdn1surodadi ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 1 SURODADI ', '3', NULL, '204', NULL, '2021-09-27 08:17:42'),
(166, 'sdn2surodadi ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 2 SURODADI ', '3', NULL, '205', NULL, '2021-09-27 08:18:02'),
(167, 'sdnpanggung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N PANGGUNG', '3', NULL, '206', NULL, '2021-09-27 08:18:28'),
(168, 'sdnkalianyar', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N KALIANYAR', '3', NULL, '207', NULL, '2021-09-27 08:18:49'),
(169, 'sdn1tedunan ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 1 TEDUNAN ', '3', NULL, '208', NULL, '2021-09-27 08:19:11'),
(170, 'sdn2tedunan ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 2 TEDUNAN ', '3', NULL, '209', NULL, '2021-09-27 08:19:28'),
(171, 'sdn1karangaji ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 1 KARANGAJI ', '3', NULL, '210', NULL, '2021-09-27 08:20:02'),
(172, 'sdn3karangaji ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 3 KARANGAJI ', '3', NULL, '211', NULL, '2021-09-27 08:20:24'),
(173, 'sdn1kedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 1 KEDUNG', '3', NULL, '212', NULL, '2021-09-27 08:20:45'),
(174, 'sdn2kedung ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 2 KEDUNG ', '3', NULL, '213', NULL, '2021-09-27 08:21:07'),
(175, 'sdn3kedung ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SD N 3 KEDUNG ', '3', NULL, '214', NULL, '2021-09-27 08:21:32'),
(176, 'mimatholi\'ulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI MATHOLI\'UL HUDA', '3', NULL, '215', NULL, '2021-09-27 08:21:48'),
(177, 'midarulhikmah', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI DARUL HIKMAH', '3', NULL, '216', NULL, '2021-09-27 08:23:10'),
(178, 'midatuksingaraja', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI DATUK SINGARAJA', '3', NULL, '217', NULL, '2021-09-27 08:23:34'),
(179, 'mimafatihulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI MAFATIHUL HUDA', '3', NULL, '218', NULL, '2021-09-27 08:24:01'),
(180, 'misultanfattah', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI SULTAN FATTAH', '3', NULL, '219', NULL, '2021-09-27 08:24:33'),
(181, 'mimiftahulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI MIFTAHUL HUDA', '3', NULL, '220', NULL, '2021-09-27 08:24:54'),
(182, 'mitamrinuththullab', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI TAMRINUTH THULLAB', '3', NULL, '221', NULL, '2021-09-27 08:25:21'),
(183, 'mialfauziyah', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI AL-FAUZIYAH', '3', NULL, '222', NULL, '2021-09-27 08:34:16'),
(184, 'mihidayatulmubtadi', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI HIDAYATUL MUBTADI', '3', NULL, '223', NULL, '2021-09-27 08:35:46'),
(185, 'misafinatulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI SAFINATUL HUDA', '3', NULL, '224', NULL, '2021-09-27 08:36:05'),
(186, 'miroudhotussibyan', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI ROUDHOTUSSIBYAN', '3', NULL, '225', NULL, '2021-09-27 08:42:48'),
(187, 'misalafiyah', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI SALAFIYAH', '3', NULL, '226', NULL, '2021-09-27 08:43:07'),
(188, 'mishofamarwah', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI SHOFA MARWAH', '3', NULL, '227', NULL, '2021-09-27 08:43:25'),
(189, 'smpn1kedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMPN 1 KEDUNG', '3', NULL, '228', NULL, '2021-09-27 08:48:00'),
(190, 'smpn2kedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMPN 2 KEDUNG', '3', NULL, '229', NULL, '2021-09-27 08:48:43'),
(191, 'smpislamdatuksingaraja', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMP ISLAM DATUK SINGARAJA', '3', NULL, '230', NULL, '2021-09-27 08:49:23'),
(192, 'smpislamkedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMP ISLAM KEDUNG', '3', NULL, '231', NULL, '2021-09-27 08:49:49'),
(193, 'smpislamdarurrohman', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMP ISLAM DARURROHMAN', '3', NULL, '232', NULL, '2021-09-27 08:50:12'),
(194, 'mtsmatholi\'ulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS MATHOLI\'UL HUDA', '3', NULL, '233', NULL, '2021-09-27 08:50:33'),
(195, 'mtsdarulhikmah', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS DARUL HIKMAH', '3', NULL, '234', NULL, '2021-09-27 08:50:54'),
(196, 'mtsmafatihulhuda ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS MAFATIHUL HUDA ', '3', NULL, '235', NULL, '2021-09-27 08:51:15'),
(197, 'mtssultanfatah', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS SULTAN FATAH', '3', NULL, '236', NULL, '2021-09-27 08:51:35'),
(198, 'mtsmiftahulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS MIFTAHUL HUDA', '3', NULL, '237', NULL, '2021-09-27 08:51:52'),
(199, 'mtssafinatulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS SAFINATUL HUDA', '3', NULL, '238', NULL, '2021-09-27 08:52:17'),
(200, 'mtstasmirusysubyan', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS TASMIRUSY SUBYAN', '3', NULL, '239', NULL, '2021-09-27 08:52:57'),
(201, 'mtsmabdaulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS MABDAUL HUDA', '3', NULL, '240', NULL, '2021-09-27 08:53:19'),
(202, 'mtsmafatihutthullab', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS MAFATIHUT THULLAB', '3', NULL, '241', NULL, '2021-09-27 08:53:40'),
(203, 'mtsittihadulmuslimin', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS ITTIHADUL MUSLIMIN', '3', NULL, '242', NULL, '2021-09-27 08:54:00'),
(204, 'mtssofamarwa', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS SOFA MARWA', '3', NULL, '243', NULL, '2021-09-27 08:54:19'),
(205, 'mamatholi\'ulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA.MATHOLI\'UL HUDA', '3', NULL, '244', NULL, '2021-09-27 08:54:43'),
(206, 'madarulhikmah', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA.DARUL HIKMAH', '3', NULL, '245', NULL, '2021-09-27 08:55:18'),
(207, 'matasmirusysubyan', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA.TASMIRUSY SUBYAN', '3', NULL, '246', NULL, '2021-09-27 08:56:19'),
(208, 'makiajitunggal', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA. KI AJI TUNGGAL', '3', NULL, '247', NULL, '2021-09-27 08:56:37'),
(209, 'mamafatihutthullab', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA.MAFATIHUT THULLAB', '3', NULL, '248', NULL, '2021-09-27 08:57:13'),
(210, 'maittihadulmuslimin', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA.ITTIHADUL MUSLIMIN', '3', NULL, '249', NULL, '2021-09-27 08:57:32'),
(211, 'smanukedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMA NU KEDUNG', '3', NULL, '250', NULL, '2021-09-27 08:57:53'),
(212, 'masofamarwa', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA.SOFA MARWA', '3', NULL, '251', NULL, '2021-09-27 08:58:10'),
(213, 'mtssalafiyah', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS SALAFIYAH', '3', NULL, '252', NULL, '2021-09-27 08:58:26'),
(214, 'smpn3kedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMPN 3 KEDUNG', '3', NULL, '253', NULL, '2021-09-27 08:59:08'),
(215, 'mtsmiftahululum', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS MIFTAHUL ULUM', '3', NULL, '254', NULL, '2021-09-27 08:59:28'),
(216, 'smknkedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMKN KEDUNG', '3', NULL, '255', NULL, '2021-09-27 08:59:57'),
(217, 'smpislamalazhar', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMP ISLAM AL-AZHAR', '3', NULL, '257', NULL, '2021-09-27 09:01:29'),
(218, 'smpislamsunanmuria', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMP ISLAM SUNAN MURIA', '3', NULL, '258', NULL, '2021-09-27 09:01:49'),
(219, 'smkdatuksingaraja', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMK DATUK SINGARAJA', '3', NULL, '259', NULL, '2021-09-27 09:02:12'),
(220, 'mimiftahululum', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI MIFTAHUL ULUM', '3', NULL, '260', NULL, '2021-09-27 09:02:29'),
(221, 'miittihadulmuslimin', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI ITTIHADUL MUSLIMIN', '3', NULL, '261', NULL, '2021-09-27 09:02:46'),
(222, 'masafinatulhuda ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA. SAFINATUL HUDA ', '3', NULL, '262', NULL, '2021-09-27 09:03:03'),
(223, 'mamiftahululum', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA. MIFTAHUL ULUM', '3', NULL, '', NULL, '2021-09-27 09:03:19'),
(224, 'mialhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI AL HUDA', '3', NULL, '264', NULL, '2021-09-27 09:07:22'),
(225, 'mamiftahululum', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA. MIFTAHUL ULUM', '3', NULL, '263', NULL, '2021-09-27 09:10:01'),
(226, 'mamiftahulhuda', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA.MIFTAHUL HUDA', '3', NULL, '256', NULL, '2021-09-27 09:11:17'),
(227, 'mikiajitunggal', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MI KI AJI TUNGGAL', '3', NULL, '265', NULL, '2021-09-27 09:12:32'),
(228, 'masultanfattah ', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA. SULTAN FATTAH ', '3', NULL, '266', NULL, '2021-09-27 09:13:02'),
(229, 'mtsnualmustaqim', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MTS NU AL MUSTAQIM', '3', NULL, '267', NULL, '2021-09-27 09:13:24'),
(230, 'manualmustaqim', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'MA. NU AL MUSTAQIM', '3', NULL, '268', NULL, '2021-09-27 09:13:42'),
(231, 'smptahfidzalhudakedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada@gmail.com', 'SMP TAHFIDZ AL HUDA KEDUNG', '3', NULL, '269', NULL, '2021-09-27 09:13:58'),
(232, 'sdn02pekalongan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn02pekalongan@gmail.com', '12345', '3', NULL, '270', NULL, '2021-09-27 09:53:38'),
(233, 'sdn1sendang', '827ccb0eea8a706c4c34a16891f84e7b', 'ardhires@gmail.com', 'SD NEGERI 1 SENDANG', '3', NULL, '', NULL, '2021-09-28 09:14:13'),
(234, 'sdn1robayan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1robayan@gmail.com', 'SD  NEGERI 1 ROBAYAN', '3', NULL, '', NULL, '2021-09-29 10:02:55'),
(235, 'sdn2robayan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2robayan@gmail.com', 'SD NEGERI 2 ROBAYAN', '3', NULL, '', NULL, '2021-09-29 10:06:01'),
(236, 'sdn3robayan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn3robayan@gmail.com', 'SD NEGERI 3 ROBAYAN', '3', NULL, '', NULL, '2021-09-29 10:07:42'),
(237, 'sdn4robayan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn4robayan@gmail.com', 'SD NEGERI 4 ROBAYAN', '3', NULL, '', NULL, '2021-09-29 10:08:29'),
(238, 'sdn1purwogondo', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1purwogondo@gmail.com', 'SD NEGERI 1 PURWOGONDO', '3', NULL, '', NULL, '2021-09-29 10:09:21'),
(239, 'sdn2purwogondo', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2purwogondo@gmail.com', 'SD NEGERI 2 PURWOGONDO', '3', NULL, '', NULL, '2021-09-29 10:18:48'),
(240, 'sdn3purwogondo', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn3purwogondo@gmail.com', 'SD NEGERI 3 PURWOGONDO ', '3', NULL, '', NULL, '2021-09-29 10:19:39'),
(241, 'sdn1kriyan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1kriyan@gmail.com', 'SD NEGERI 1 KRIYAN', '3', NULL, '', NULL, '2021-09-29 10:20:27'),
(242, 'sdn2kriyan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2kriyan@gmail.com', 'SD NEGERI 2 KRIYAN', '3', NULL, '', NULL, '2021-09-29 10:21:22'),
(243, 'sdn3kriyan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn3kriyan@gmail.com', 'SD NEGERI 3 KRIYAN', '3', NULL, '', NULL, '2021-09-29 10:22:58'),
(244, 'sdn4kriyan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn4kriyan@gmail.com', 'SD NEGERI 4 KRIYAN', '3', NULL, '', NULL, '2021-09-29 10:23:43'),
(245, 'sdn1manyargading', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1manyargading@gmail.com', 'SD NEGERI 1 MANYARGADING', '3', NULL, '', NULL, '2021-09-29 10:24:24'),
(246, 'sdn2manyargading', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2manyargading@gmail.com', 'SD NEGERI 2 MANYARGADING', '3', NULL, '', NULL, '2021-09-29 10:25:23'),
(247, 'sdn1bandungrejo', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1bandungrejo@gmail.com', 'SD NEGERI 1 BANDUNGREJO', '3', NULL, '', NULL, '2021-09-29 10:27:04'),
(248, 'sdn2bandungrejo', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2bandungrejo@gmail.com', 'SD NEGERI 2 BANDUNGREJO', '3', NULL, '', NULL, '2021-09-29 10:44:37'),
(249, 'sdntelukkulon', '827ccb0eea8a706c4c34a16891f84e7b', 'sdntelukkulon@gmail.com', 'SD NEGERI TELUK KULON', '3', NULL, '', NULL, '2021-09-29 10:45:48'),
(250, 'sdn1margoyoso', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1margoyoso@gmail.com', 'SD NEGERI 1 MARGOYOSO', '3', NULL, '', NULL, '2021-09-29 10:47:55'),
(251, 'sdn2margoyoso', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2margoyoso@gmail.com', 'SD NEGERI 2 MARGOYOSO', '3', NULL, '', NULL, '2021-09-29 11:15:21'),
(252, 'sdn3margoyoso', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn3margoyoso@gmail.com', 'SD NEGERI 3 MARGOYOSO', '3', NULL, '', NULL, '2021-09-29 11:29:43'),
(253, 'sdn4margoyoso', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn4margoyoso@gmail.com', 'SD NEGERI 4 MARGOYOSO', '3', NULL, '', NULL, '2021-09-29 11:30:16'),
(254, 'sdn1banyuputih', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1banyuputih@gmai.com', 'SD NEGERI 1 BANYUPUTIH', '3', NULL, '', NULL, '2021-09-29 11:31:14'),
(255, 'sdn2banyuputih', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2banyuputih@gmail.com', 'SD NEGERI 2 BANYUPUTIH', '3', NULL, '', NULL, '2021-09-29 11:31:52'),
(256, 'sdn3banyuputih', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn3banyuputih@gmai.com', 'SD NEGERI 3 BANYUPUTIH', '3', NULL, '', NULL, '2021-09-29 11:33:03'),
(257, 'sdn4banyuputih', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn4banyuputih@gmail.com', 'SD NEGERI 4 BANYUPUTIH', '3', NULL, '', NULL, '2021-09-29 11:33:33'),
(258, 'sdnbatukali', '827ccb0eea8a706c4c34a16891f84e7b', 'sdnbatukali@gmail.com', 'SD NEGERI BATUKALI', '3', NULL, '', NULL, '2021-09-29 11:34:56'),
(259, 'sdn1kedungcino', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1kedungcino@gmail.com', 'SDN 1 KEDUNGCINO', '3', NULL, '305', NULL, '2021-09-29 15:35:02'),
(260, 'smp2cakra', '827ccb0eea8a706c4c34a16891f84e7b', 'ggg@gmail.com', 'SMP 2 CAKRA', '3', NULL, '358', NULL, '2021-09-29 23:02:22'),
(261, 'sdn1damarjati', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1damarjati@gmai.com', 'SD NEGERI 1 DAMARJATI', '3', NULL, '', NULL, '2021-09-30 08:03:36'),
(262, 'sdn2damarjati', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2damarjati@gmail.com', 'SD NEGERI 2 DAMARJATI', '3', NULL, '', NULL, '2021-09-30 08:04:22'),
(263, 'sdn3damarjati', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn3damarjati@gmail.com', 'SD NEGERI 3 DAMARJATI', '3', NULL, '', NULL, '2021-09-30 08:05:16'),
(264, 'sdn4damarjati', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn4damarjati@gmail.com', 'SD NEGERI 4 DAMARJATI', '3', NULL, '', NULL, '2021-09-30 08:05:49'),
(265, 'sdn1pendosawalan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1pendosawalan@gmail.com', 'SD NEGERI 1 PENDOSAWALAN', '3', NULL, '', NULL, '2021-09-30 08:07:32'),
(266, 'sdn2pendosawalan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn2pendosawalan@gmail.com', 'SD NEGERI 2 PENDOSAWALAN', '3', NULL, '', NULL, '2021-09-30 08:08:22'),
(267, 'sdn1bakalan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1bakalan@gmail.com', 'SD NEGERI 1 BAKALAN', '3', NULL, '', NULL, '2021-09-30 08:08:56'),
(268, 'sdn3bakalan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn3bakalan@gmail.com', 'SD NEGERI 3 BAKALAN', '3', NULL, '', NULL, '2021-09-30 08:09:48'),
(269, 'sdn1panggang', '827ccb0eea8a706c4c34a16891f84e7b', 'sdn1panggang@gmail.com', 'SDN 1 Panggang', '3', NULL, '273', NULL, '2021-09-30 10:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`) USING BTREE;

--
-- Indexes for table `tb_anggota_sementara`
--
ALTER TABLE `tb_anggota_sementara`
  ADD PRIMARY KEY (`id_anggota`) USING BTREE;

--
-- Indexes for table `tb_darah`
--
ALTER TABLE `tb_darah`
  ADD PRIMARY KEY (`id_darah`) USING BTREE;

--
-- Indexes for table `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id_desa`) USING BTREE;

--
-- Indexes for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`) USING BTREE;

--
-- Indexes for table `tb_golongan_sertifikat`
--
ALTER TABLE `tb_golongan_sertifikat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_gudep`
--
ALTER TABLE `tb_gudep`
  ADD PRIMARY KEY (`id_gudep`) USING BTREE;

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`) USING BTREE;

--
-- Indexes for table `tb_kwaran`
--
ALTER TABLE `tb_kwaran`
  ADD PRIMARY KEY (`id_kwaran`) USING BTREE;

--
-- Indexes for table `tb_pangkalan`
--
ALTER TABLE `tb_pangkalan`
  ADD PRIMARY KEY (`id_pangkalan`) USING BTREE;

--
-- Indexes for table `tb_pangkalan_sementara`
--
ALTER TABLE `tb_pangkalan_sementara`
  ADD PRIMARY KEY (`id_pangkalan`) USING BTREE;

--
-- Indexes for table `tb_sifat_kepemilikan`
--
ALTER TABLE `tb_sifat_kepemilikan`
  ADD PRIMARY KEY (`id_sifat`) USING BTREE;

--
-- Indexes for table `tb_status_kepemilikan`
--
ALTER TABLE `tb_status_kepemilikan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_tingkatan`
--
ALTER TABLE `tb_tingkatan`
  ADD PRIMARY KEY (`id_tingkatan`) USING BTREE;

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=478;

--
-- AUTO_INCREMENT for table `tb_anggota_sementara`
--
ALTER TABLE `tb_anggota_sementara`
  MODIFY `id_anggota` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=478;

--
-- AUTO_INCREMENT for table `tb_darah`
--
ALTER TABLE `tb_darah`
  MODIFY `id_darah` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_desa`
--
ALTER TABLE `tb_desa`
  MODIFY `id_desa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_golongan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_golongan_sertifikat`
--
ALTER TABLE `tb_golongan_sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_gudep`
--
ALTER TABLE `tb_gudep`
  MODIFY `id_gudep` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_kwaran`
--
ALTER TABLE `tb_kwaran`
  MODIFY `id_kwaran` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_pangkalan`
--
ALTER TABLE `tb_pangkalan`
  MODIFY `id_pangkalan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `tb_pangkalan_sementara`
--
ALTER TABLE `tb_pangkalan_sementara`
  MODIFY `id_pangkalan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `tb_sifat_kepemilikan`
--
ALTER TABLE `tb_sifat_kepemilikan`
  MODIFY `id_sifat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_status_kepemilikan`
--
ALTER TABLE `tb_status_kepemilikan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tingkatan`
--
ALTER TABLE `tb_tingkatan`
  MODIFY `id_tingkatan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Feb 2021 pada 11.29
-- Versi server: 10.3.27-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codingin_sensus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(12) NOT NULL,
  `id_kwaran` varchar(12) DEFAULT NULL,
  `id_gudep` varchar(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `gol_darah` varchar(2) DEFAULT NULL,
  `golongan` varchar(50) DEFAULT NULL COMMENT 'siaga,penggalang, penegak, pandega, dewasa',
  `tingkat` varchar(20) DEFAULT NULL,
  `kta` varchar(60) DEFAULT NULL,
  `angkatan` int(4) DEFAULT NULL COMMENT 'isikan tahun',
  `active` enum('1','2') DEFAULT NULL COMMENT 'masih aktif atau sudah tidak 1=active; 2 = non',
  `tempat_kmd` varchar(60) DEFAULT NULL,
  `tahun_kmd` int(4) DEFAULT 0,
  `golongan_kmd` varchar(60) DEFAULT NULL,
  `tempat_kml` varchar(60) DEFAULT NULL,
  `tahun_kml` int(4) DEFAULT 0,
  `golongan_kml` varchar(60) DEFAULT NULL,
  `tempat_kpd` varchar(60) DEFAULT NULL,
  `tahun_kpd` int(4) DEFAULT 0,
  `golongan_kpd` varchar(60) DEFAULT NULL,
  `tempat_kpl` varchar(60) DEFAULT NULL,
  `tahun_kpl` int(4) DEFAULT 0,
  `golongan_kpl` varchar(60) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
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
  `pel_kpl` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_kwaran`, `id_gudep`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `gol_darah`, `golongan`, `tingkat`, `kta`, `angkatan`, `active`, `tempat_kmd`, `tahun_kmd`, `golongan_kmd`, `tempat_kml`, `tahun_kml`, `golongan_kml`, `tempat_kpd`, `tahun_kpd`, `golongan_kpd`, `tempat_kpl`, `tahun_kpl`, `golongan_kpl`, `created_date`, `password`, `rt`, `rw`, `desa`, `kecamatan`, `no_kmd`, `pel_kmd`, `no_kml`, `pel_kml`, `no_kpd`, `pel_kpd`, `no_kpl`, `pel_kpl`) VALUES
(35, '15', '27', 'Agus Setiawan', 'Jepara', '1970-01-01', NULL, 'O', 'dewasa', 'NK', '', NULL, NULL, '', 0, '', NULL, 0, '', '', 0, '', '', 0, '', '2021-01-01 23:41:35', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '22', '3320002', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_darah`
--

CREATE TABLE `tb_darah` (
  `id_darah` int(2) NOT NULL,
  `darah` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_darah`
--

INSERT INTO `tb_darah` (`id_darah`, `darah`, `created_date`) VALUES
(1, 'A', '2020-12-06 12:14:23'),
(2, 'AB', '2020-12-06 12:14:25'),
(3, 'B', '2020-12-06 12:14:27'),
(4, 'O', '2020-12-06 12:14:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id_desa` int(10) NOT NULL,
  `id_kecamatan` varchar(25) DEFAULT NULL,
  `nama_desa` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_desa`
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
-- Struktur dari tabel `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_golongan` int(15) NOT NULL,
  `golongan` varchar(255) DEFAULT NULL COMMENT 'tingkatan golongan',
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_golongan`, `golongan`, `created_date`) VALUES
(1, 'siaga', '2020-12-06 07:24:55'),
(2, 'penggalang', '2020-12-06 07:24:59'),
(3, 'penegak', '2020-12-06 07:25:02'),
(4, 'pandega', '2020-12-06 07:25:06'),
(5, 'dewasa', '2020-12-06 07:25:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gudep`
--

CREATE TABLE `tb_gudep` (
  `id_gudep` int(12) NOT NULL,
  `no_gudep` varchar(100) DEFAULT NULL,
  `ambalan` varchar(60) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `id_pangkalan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_gudep`
--

INSERT INTO `tb_gudep` (`id_gudep`, `no_gudep`, `ambalan`, `created_date`, `id_pangkalan`) VALUES
(27, '06.133', 'Putra', '2020-12-18 13:55:24', '56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `nama_kecamatan` varchar(25) DEFAULT NULL,
  `id_kecamatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_kecamatan`
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
-- Struktur dari tabel `tb_kwaran`
--

CREATE TABLE `tb_kwaran` (
  `id_kwaran` int(12) NOT NULL,
  `nama_kwaran` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `nomor_kwaran` varchar(50) DEFAULT NULL,
  `kamabiran` varchar(60) DEFAULT NULL,
  `kakwaran` varchar(255) DEFAULT NULL,
  `alamat_kwaran` text DEFAULT NULL,
  `status_kepemilikan` varchar(2) DEFAULT NULL,
  `sifat_kepemilikan` varchar(2) DEFAULT NULL,
  `nomor_sk` varchar(255) NOT NULL,
  `tgl_sk` date NOT NULL,
  `awal_bakti` date NOT NULL,
  `akhir_bakti` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_kwaran`
--

INSERT INTO `tb_kwaran` (`id_kwaran`, `nama_kwaran`, `created_date`, `nomor_kwaran`, `kamabiran`, `kakwaran`, `alamat_kwaran`, `status_kepemilikan`, `sifat_kepemilikan`, `nomor_sk`, `tgl_sk`, `awal_bakti`, `akhir_bakti`) VALUES
(15, 'Tahunan', '2020-12-18 13:49:03', '06', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(16, 'Keling', '2021-01-17 19:58:09', '01', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(17, 'Kembang', '2021-01-17 19:58:37', '02', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(18, 'Bangsri', '2021-01-17 19:58:53', '03', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(19, 'Mlonggo', '2021-01-17 19:59:24', '04', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(20, 'Jepara', '2021-01-17 19:59:48', '05', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(21, 'Kedung', '2021-01-17 20:00:24', '07', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(22, 'Batealit', '2021-01-17 20:00:46', '08', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(23, 'Pecangaan', '2021-01-17 20:01:12', '09', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(24, 'Kalinyamatan', '2021-01-17 20:01:46', '10', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(25, 'Mayong', '2021-01-17 20:02:22', '11', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(26, 'Welahan', '2021-01-17 20:02:57', '12', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(27, 'Nalumsari', '2021-01-17 20:03:33', '13', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(28, 'Karimunjawa', '2021-01-17 20:04:10', '14', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(29, 'Pakis Aji', '2021-01-17 20:04:43', '15', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(30, 'Donorojo', '2021-01-17 20:05:44', '16', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pangkalan`
--

CREATE TABLE `tb_pangkalan` (
  `id_pangkalan` int(12) NOT NULL,
  `nama_pangkalan` varchar(255) DEFAULT NULL,
  `alamat_pangkalan` text DEFAULT NULL,
  `kwaran` varchar(10) DEFAULT NULL,
  `desa` varchar(10) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `kamabigus` varchar(100) DEFAULT NULL,
  `kagudep` varchar(100) DEFAULT NULL,
  `jumlah_pembina` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_pangkalan`
--

INSERT INTO `tb_pangkalan` (`id_pangkalan`, `nama_pangkalan`, `alamat_pangkalan`, `kwaran`, `desa`, `created_date`, `kamabigus`, `kagudep`, `jumlah_pembina`) VALUES
(56, 'SMA Negeri 1 Tahunan', 'ttufyfyugy', '15', NULL, '2020-12-18 13:52:05', 'iugiugiuiu', 'kiugigi', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sifat_kepemilikan`
--

CREATE TABLE `tb_sifat_kepemilikan` (
  `id_sifat` int(10) NOT NULL,
  `sifat_kepemilikan` varchar(20) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_sifat_kepemilikan`
--

INSERT INTO `tb_sifat_kepemilikan` (`id_sifat`, `sifat_kepemilikan`, `created_date`) VALUES
(1, 'Tetap', '2020-12-08 08:59:02'),
(2, 'Kondisional', '2020-12-08 08:59:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_kepemilikan`
--

CREATE TABLE `tb_status_kepemilikan` (
  `id` int(10) NOT NULL,
  `status_kepemilikan` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_status_kepemilikan`
--

INSERT INTO `tb_status_kepemilikan` (`id`, `status_kepemilikan`, `created_date`) VALUES
(1, 'Milik Sendiri', '2020-12-08 08:55:51'),
(2, 'Menumpang', '2020-12-08 08:56:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tingkatan`
--

CREATE TABLE `tb_tingkatan` (
  `id_tingkatan` int(12) NOT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `sub_tingkat` varchar(20) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_tingkatan`
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
-- Struktur dari tabel `tb_user`
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
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `email`, `display_name`, `level`, `id_kwaran`, `id_pangkalan`, `img_user`, `created_date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'kwarcabjepara1120@gmail.com', 'kwarcab jepara', '1', NULL, NULL, NULL, '2020-12-02 09:40:20'),
(107, 'donorojo', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Kwarran Donorojo', '2', '30', NULL, NULL, '2021-01-18 15:55:02'),
(108, 'keling', '827ccb0eea8a706c4c34a16891f84e7b', '1234', 'Kwaran Keling', '2', '16', NULL, NULL, '2021-01-18 16:02:14'),
(109, 'kembang', '827ccb0eea8a706c4c34a16891f84e7b', '123', 'Kwarran Kembang', '2', '17', NULL, NULL, '2021-01-18 16:03:52'),
(110, 'bangsri', '827ccb0eea8a706c4c34a16891f84e7b', '111', 'Kwarran Bangsri', '2', '18', NULL, NULL, '2021-01-18 16:05:17'),
(111, 'mlonggo', '827ccb0eea8a706c4c34a16891f84e7b', '121', 'Kwarran Mlonggo', '2', '19', NULL, NULL, '2021-01-18 16:07:21'),
(112, 'pakisaji', '827ccb0eea8a706c4c34a16891f84e7b', '12123', 'Kwarran Pakis Aji', '2', '29', NULL, NULL, '2021-01-18 16:08:57'),
(113, 'jepara', '827ccb0eea8a706c4c34a16891f84e7b', '131', 'Kwarran Jepara', '2', '20', NULL, NULL, '2021-01-18 16:14:24'),
(114, 'tahunan', '827ccb0eea8a706c4c34a16891f84e7b', '141', 'Kwarran Tahunan', '2', '15', NULL, NULL, '2021-01-18 16:15:48'),
(115, 'batealit', '827ccb0eea8a706c4c34a16891f84e7b', 'qw1', 'Kwarran Batealit', '2', '22', NULL, NULL, '2021-01-18 16:17:19'),
(116, 'kedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada', 'Kwarran Kedung', '2', '21', NULL, NULL, '2021-01-18 16:18:42'),
(117, 'pecangaan', '827ccb0eea8a706c4c34a16891f84e7b', 'shhk', 'Kwarran Pecangaan', '2', '23', NULL, NULL, '2021-01-18 16:21:27'),
(118, 'welahan', '827ccb0eea8a706c4c34a16891f84e7b', 'khklhl', 'Kwarran Welahan', '2', '26', NULL, NULL, '2021-01-18 16:23:28'),
(119, 'kalinyamatan', '827ccb0eea8a706c4c34a16891f84e7b', 'khiugig', 'Kwarran Kalinyamatan', '2', '24', NULL, NULL, '2021-01-18 16:29:48'),
(120, 'nalumsari', '827ccb0eea8a706c4c34a16891f84e7b', 'ihoih', 'Kwarran Nalumsari', '2', '27', NULL, NULL, '2021-01-18 16:30:28'),
(121, 'mayong', '827ccb0eea8a706c4c34a16891f84e7b', 'klhlpl', 'Kwarran Mayong', '2', '25', NULL, NULL, '2021-01-18 16:31:11'),
(122, 'karimunjawa', '827ccb0eea8a706c4c34a16891f84e7b', 'lkhhpj', 'Kwarran Karimunjawa', '2', '28', NULL, NULL, '2021-01-18 16:31:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`) USING BTREE;

--
-- Indeks untuk tabel `tb_darah`
--
ALTER TABLE `tb_darah`
  ADD PRIMARY KEY (`id_darah`) USING BTREE;

--
-- Indeks untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id_desa`) USING BTREE;

--
-- Indeks untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`) USING BTREE;

--
-- Indeks untuk tabel `tb_gudep`
--
ALTER TABLE `tb_gudep`
  ADD PRIMARY KEY (`id_gudep`) USING BTREE;

--
-- Indeks untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`) USING BTREE;

--
-- Indeks untuk tabel `tb_kwaran`
--
ALTER TABLE `tb_kwaran`
  ADD PRIMARY KEY (`id_kwaran`) USING BTREE;

--
-- Indeks untuk tabel `tb_pangkalan`
--
ALTER TABLE `tb_pangkalan`
  ADD PRIMARY KEY (`id_pangkalan`) USING BTREE;

--
-- Indeks untuk tabel `tb_sifat_kepemilikan`
--
ALTER TABLE `tb_sifat_kepemilikan`
  ADD PRIMARY KEY (`id_sifat`) USING BTREE;

--
-- Indeks untuk tabel `tb_status_kepemilikan`
--
ALTER TABLE `tb_status_kepemilikan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tb_tingkatan`
--
ALTER TABLE `tb_tingkatan`
  ADD PRIMARY KEY (`id_tingkatan`) USING BTREE;

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_darah`
--
ALTER TABLE `tb_darah`
  MODIFY `id_darah` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  MODIFY `id_desa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_golongan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_gudep`
--
ALTER TABLE `tb_gudep`
  MODIFY `id_gudep` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_kwaran`
--
ALTER TABLE `tb_kwaran`
  MODIFY `id_kwaran` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_pangkalan`
--
ALTER TABLE `tb_pangkalan`
  MODIFY `id_pangkalan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tb_sifat_kepemilikan`
--
ALTER TABLE `tb_sifat_kepemilikan`
  MODIFY `id_sifat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_status_kepemilikan`
--
ALTER TABLE `tb_status_kepemilikan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_tingkatan`
--
ALTER TABLE `tb_tingkatan`
  MODIFY `id_tingkatan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

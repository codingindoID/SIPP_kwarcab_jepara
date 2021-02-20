/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : sensus

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 20/02/2021 16:06:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_anggota
-- ----------------------------
DROP TABLE IF EXISTS `tb_anggota`;
CREATE TABLE `tb_anggota`  (
  `id_anggota` int(12) NOT NULL AUTO_INCREMENT,
  `id_kwaran` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_gudep` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gol_darah` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `golongan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'siaga,penggalang, penegak, pandega, dewasa',
  `tingkat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kta` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `angkatan` int(4) NULL DEFAULT NULL COMMENT 'isikan tahun',
  `active` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'masih aktif atau sudah tidak 1=active; 2 = non',
  `tempat_kmd` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_kmd` int(4) NULL DEFAULT 0,
  `golongan_kmd` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_kml` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_kml` int(4) NULL DEFAULT 0,
  `golongan_kml` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_kpd` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_kpd` int(4) NULL DEFAULT 0,
  `golongan_kpd` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_kpl` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_kpl` int(4) NULL DEFAULT 0,
  `golongan_kpl` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rt` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rw` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desa` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kecamatan` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_kmd` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pel_kmd` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_kml` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pel_kml` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_kpd` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pel_kpd` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_kpl` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pel_kpl` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_darah
-- ----------------------------
DROP TABLE IF EXISTS `tb_darah`;
CREATE TABLE `tb_darah`  (
  `id_darah` int(2) NOT NULL AUTO_INCREMENT,
  `darah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id_darah`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_darah
-- ----------------------------
INSERT INTO `tb_darah` VALUES (1, 'A', '2020-12-06 12:14:23');
INSERT INTO `tb_darah` VALUES (2, 'AB', '2020-12-06 12:14:25');
INSERT INTO `tb_darah` VALUES (3, 'B', '2020-12-06 12:14:27');
INSERT INTO `tb_darah` VALUES (4, 'O', '2020-12-06 12:14:30');

-- ----------------------------
-- Table structure for tb_desa
-- ----------------------------
DROP TABLE IF EXISTS `tb_desa`;
CREATE TABLE `tb_desa`  (
  `id_desa` int(10) NOT NULL AUTO_INCREMENT,
  `id_kecamatan` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_desa` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_desa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 196 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_desa
-- ----------------------------
INSERT INTO `tb_desa` VALUES (1, '3320001', 'KEDUNGMALANG');
INSERT INTO `tb_desa` VALUES (2, '3320001', 'KALIANYAR');
INSERT INTO `tb_desa` VALUES (3, '3320001', 'KARANGAJI');
INSERT INTO `tb_desa` VALUES (4, '3320001', 'TEDUNAN');
INSERT INTO `tb_desa` VALUES (5, '3320001', 'SOWAN LOR');
INSERT INTO `tb_desa` VALUES (6, '3320001', 'JONDANG');
INSERT INTO `tb_desa` VALUES (7, '3320001', 'WANUSOBO');
INSERT INTO `tb_desa` VALUES (8, '3320001', 'SOWAN KIDUL');
INSERT INTO `tb_desa` VALUES (9, '3320001', 'SURODADI');
INSERT INTO `tb_desa` VALUES (10, '3320001', 'PANGGUNG');
INSERT INTO `tb_desa` VALUES (11, '3320001', 'BULAK BARU');
INSERT INTO `tb_desa` VALUES (12, '3320001', 'BUGEL');
INSERT INTO `tb_desa` VALUES (13, '3320001', 'DONGOS');
INSERT INTO `tb_desa` VALUES (14, '3320001', 'MENGANTI');
INSERT INTO `tb_desa` VALUES (15, '3320001', 'KERSO');
INSERT INTO `tb_desa` VALUES (16, '3320001', 'TANGGUL TLARE');
INSERT INTO `tb_desa` VALUES (17, '3320001', 'RAU');
INSERT INTO `tb_desa` VALUES (18, '3320001', 'SUKOSONO');
INSERT INTO `tb_desa` VALUES (19, '3320002', 'GERDU');
INSERT INTO `tb_desa` VALUES (20, '3320002', 'KRASAK');
INSERT INTO `tb_desa` VALUES (21, '3320002', 'KARANGRANDU');
INSERT INTO `tb_desa` VALUES (22, '3320002', 'KALIOMBO');
INSERT INTO `tb_desa` VALUES (23, '3320002', 'NGELING');
INSERT INTO `tb_desa` VALUES (24, '3320002', 'TROSO');
INSERT INTO `tb_desa` VALUES (25, '3320002', 'PECANGAAN KULON');
INSERT INTO `tb_desa` VALUES (26, '3320002', 'PECANGAAN WETAN');
INSERT INTO `tb_desa` VALUES (27, '3320002', 'LEBUAWU');
INSERT INTO `tb_desa` VALUES (28, '3320002', 'PULODARAT');
INSERT INTO `tb_desa` VALUES (29, '3320002', 'GEMULUNG');
INSERT INTO `tb_desa` VALUES (30, '3320002', 'RENGGING');
INSERT INTO `tb_desa` VALUES (31, '3320003', 'BATUKALI');
INSERT INTO `tb_desa` VALUES (32, '3320003', 'BANDUNGREJO');
INSERT INTO `tb_desa` VALUES (33, '3320003', 'MANYARGADING');
INSERT INTO `tb_desa` VALUES (34, '3320003', 'ROBAYAN');
INSERT INTO `tb_desa` VALUES (35, '3320003', 'BAKALAN');
INSERT INTO `tb_desa` VALUES (36, '3320003', 'KRIYAN');
INSERT INTO `tb_desa` VALUES (37, '3320003', 'PURWOGONDO');
INSERT INTO `tb_desa` VALUES (38, '3320003', 'SENDANG');
INSERT INTO `tb_desa` VALUES (39, '3320003', 'MARGOYOSO');
INSERT INTO `tb_desa` VALUES (40, '3320003', 'BANYUPUTIH');
INSERT INTO `tb_desa` VALUES (41, '3320003', 'PENDOSAWALAN');
INSERT INTO `tb_desa` VALUES (42, '3320003', 'DAMARJATI');
INSERT INTO `tb_desa` VALUES (43, '3320004', 'UJUNG PANDAN');
INSERT INTO `tb_desa` VALUES (44, '3320004', 'KARANGANYAR');
INSERT INTO `tb_desa` VALUES (45, '3320004', 'GUWOSOBOKERTO');
INSERT INTO `tb_desa` VALUES (46, '3320004', 'KEDUNGSARIMULYO');
INSERT INTO `tb_desa` VALUES (47, '3320004', 'BUGO');
INSERT INTO `tb_desa` VALUES (48, '3320004', 'WELAHAN');
INSERT INTO `tb_desa` VALUES (49, '3320004', 'GEDANGAN');
INSERT INTO `tb_desa` VALUES (50, '3320004', 'KETILENGSINGOLELO');
INSERT INTO `tb_desa` VALUES (51, '3320004', 'KALIPUCANG WETAN');
INSERT INTO `tb_desa` VALUES (52, '3320004', 'KALIPUCANG KULON');
INSERT INTO `tb_desa` VALUES (53, '3320004', 'GIDANGELO');
INSERT INTO `tb_desa` VALUES (54, '3320004', 'KENDENGSIDIALIT');
INSERT INTO `tb_desa` VALUES (55, '3320004', 'SIDIGEDE');
INSERT INTO `tb_desa` VALUES (56, '3320004', 'TELUK WETAN');
INSERT INTO `tb_desa` VALUES (57, '3320004', 'BRANTAK SEKARJATI');
INSERT INTO `tb_desa` VALUES (58, '3320005', 'MAYONG KIDUL');
INSERT INTO `tb_desa` VALUES (59, '3320005', 'MAYONG LOR');
INSERT INTO `tb_desa` VALUES (60, '3320005', 'TIGOJURU');
INSERT INTO `tb_desa` VALUES (61, '3320005', 'PAREN');
INSERT INTO `tb_desa` VALUES (62, '3320005', 'KUANYAR');
INSERT INTO `tb_desa` VALUES (63, '3320005', 'PELANG');
INSERT INTO `tb_desa` VALUES (64, '3320005', 'SENGONBUGEL');
INSERT INTO `tb_desa` VALUES (65, '3320005', 'PELEMKEREP');
INSERT INTO `tb_desa` VALUES (66, '3320005', 'SINGOROJO');
INSERT INTO `tb_desa` VALUES (67, '3320005', 'JEBOL');
INSERT INTO `tb_desa` VALUES (68, '3320005', 'BUARAN');
INSERT INTO `tb_desa` VALUES (69, '3320005', 'NGROTO');
INSERT INTO `tb_desa` VALUES (70, '3320005', 'RAJEKWESI');
INSERT INTO `tb_desa` VALUES (71, '3320005', 'DATAR');
INSERT INTO `tb_desa` VALUES (72, '3320005', 'PULE');
INSERT INTO `tb_desa` VALUES (73, '3320005', 'BANDUNG');
INSERT INTO `tb_desa` VALUES (74, '3320005', 'BUNGU');
INSERT INTO `tb_desa` VALUES (75, '3320005', 'PANCUR');
INSERT INTO `tb_desa` VALUES (76, '3320006', 'DORANG');
INSERT INTO `tb_desa` VALUES (77, '3320006', 'BLIMBINGREJO');
INSERT INTO `tb_desa` VALUES (78, '3320006', 'TUNGGULPANDEAN');
INSERT INTO `tb_desa` VALUES (79, '3320006', 'PRINGTULIS');
INSERT INTO `tb_desa` VALUES (80, '3320006', 'JATISARI');
INSERT INTO `tb_desa` VALUES (81, '3320006', 'GEMIRING KIDUL');
INSERT INTO `tb_desa` VALUES (82, '3320006', 'GEMIRING LOR');
INSERT INTO `tb_desa` VALUES (83, '3320006', 'NALUMSARI');
INSERT INTO `tb_desa` VALUES (84, '3320006', 'TRITIS');
INSERT INTO `tb_desa` VALUES (85, '3320006', 'DAREN');
INSERT INTO `tb_desa` VALUES (86, '3320006', 'KARANGNONGKO');
INSERT INTO `tb_desa` VALUES (87, '3320006', 'NGETUK');
INSERT INTO `tb_desa` VALUES (88, '3320006', 'BENDANPETE');
INSERT INTO `tb_desa` VALUES (89, '3320006', 'MURYOLOBO');
INSERT INTO `tb_desa` VALUES (90, '3320006', 'BATEGEDE');
INSERT INTO `tb_desa` VALUES (91, '3320007', 'NGASEM');
INSERT INTO `tb_desa` VALUES (92, '3320007', 'GENENG');
INSERT INTO `tb_desa` VALUES (93, '3320007', 'RAGUKLAMPITAN');
INSERT INTO `tb_desa` VALUES (94, '3320007', 'MINDAHAN KIDUL');
INSERT INTO `tb_desa` VALUES (95, '3320007', 'MINDAHAN');
INSERT INTO `tb_desa` VALUES (96, '3320007', 'SOMOSARI');
INSERT INTO `tb_desa` VALUES (97, '3320007', 'BATEALIT');
INSERT INTO `tb_desa` VALUES (98, '3320007', 'BRINGIN');
INSERT INTO `tb_desa` VALUES (99, '3320007', 'BANTRUNG');
INSERT INTO `tb_desa` VALUES (100, '3320007', 'BAWU');
INSERT INTO `tb_desa` VALUES (101, '3320007', 'PEKALONGAN');
INSERT INTO `tb_desa` VALUES (102, '3320008', 'TELUKAWUR');
INSERT INTO `tb_desa` VALUES (103, '3320008', 'SEMAT');
INSERT INTO `tb_desa` VALUES (104, '3320008', 'PLATAR');
INSERT INTO `tb_desa` VALUES (105, '3320008', 'MANGUNAN');
INSERT INTO `tb_desa` VALUES (106, '3320008', 'PETEKEYAN');
INSERT INTO `tb_desa` VALUES (107, '3320008', 'SUKODONO');
INSERT INTO `tb_desa` VALUES (108, '3320008', 'LANGON');
INSERT INTO `tb_desa` VALUES (109, '3320008', 'NGABUL');
INSERT INTO `tb_desa` VALUES (110, '3320008', 'TAHUNAN');
INSERT INTO `tb_desa` VALUES (111, '3320008', 'MANTINGAN');
INSERT INTO `tb_desa` VALUES (112, '3320008', 'DEMANGAN');
INSERT INTO `tb_desa` VALUES (113, '3320008', 'TEGALSAMBI');
INSERT INTO `tb_desa` VALUES (114, '3320008', 'KRAPYAK');
INSERT INTO `tb_desa` VALUES (115, '3320008', 'SENENAN');
INSERT INTO `tb_desa` VALUES (116, '3320008', 'KECAPI');
INSERT INTO `tb_desa` VALUES (117, '3320009', 'KARANGKEBAGUSAN');
INSERT INTO `tb_desa` VALUES (118, '3320009', 'DEMAAN');
INSERT INTO `tb_desa` VALUES (119, '3320009', 'BULU');
INSERT INTO `tb_desa` VALUES (120, '3320009', 'KAUMAN');
INSERT INTO `tb_desa` VALUES (121, '3320009', 'PANGGANG');
INSERT INTO `tb_desa` VALUES (122, '3320009', 'POTROYUDAN');
INSERT INTO `tb_desa` VALUES (123, '3320009', 'BAPANGAN');
INSERT INTO `tb_desa` VALUES (124, '3320009', 'SARIPAN');
INSERT INTO `tb_desa` VALUES (125, '3320009', 'JOBOKUTO');
INSERT INTO `tb_desa` VALUES (126, '3320009', 'UJUNGBATU');
INSERT INTO `tb_desa` VALUES (127, '3320009', 'PENGKOL');
INSERT INTO `tb_desa` VALUES (128, '3320009', 'MULYOHARJO');
INSERT INTO `tb_desa` VALUES (129, '3320009', 'KUWASEN');
INSERT INTO `tb_desa` VALUES (130, '3320009', 'BANDENGAN');
INSERT INTO `tb_desa` VALUES (131, '3320009', 'WONOREJO');
INSERT INTO `tb_desa` VALUES (132, '3320009', 'KEDUNGCINO');
INSERT INTO `tb_desa` VALUES (133, '3320010', 'MOROREJO');
INSERT INTO `tb_desa` VALUES (134, '3320016', 'MAMBAK');
INSERT INTO `tb_desa` VALUES (135, '3320016', 'BULUNGAN');
INSERT INTO `tb_desa` VALUES (136, '3320016', 'LEBAK');
INSERT INTO `tb_desa` VALUES (137, '3320016', 'TANJUNG');
INSERT INTO `tb_desa` VALUES (138, '3320016', 'PLAJAN');
INSERT INTO `tb_desa` VALUES (139, '3320016', 'SUWAWAL TIMUR');
INSERT INTO `tb_desa` VALUES (140, '3320016', 'KAWAK');
INSERT INTO `tb_desa` VALUES (141, '3320016', 'SLAGI');
INSERT INTO `tb_desa` VALUES (142, '3320010', 'SUWAWAL');
INSERT INTO `tb_desa` VALUES (143, '3320010', 'SINANGGUL');
INSERT INTO `tb_desa` VALUES (144, '3320010', 'JAMBU TIMUR');
INSERT INTO `tb_desa` VALUES (145, '3320010', 'JAMBU');
INSERT INTO `tb_desa` VALUES (146, '3320010', 'SEKURO');
INSERT INTO `tb_desa` VALUES (147, '3320010', 'SROBYONG');
INSERT INTO `tb_desa` VALUES (148, '3320010', 'KARANGGONDANG');
INSERT INTO `tb_desa` VALUES (149, '3320011', 'GUYANGAN');
INSERT INTO `tb_desa` VALUES (150, '3320011', 'KEPUK');
INSERT INTO `tb_desa` VALUES (151, '3320011', 'PAPASAN');
INSERT INTO `tb_desa` VALUES (152, '3320011', 'SRIKANDANG');
INSERT INTO `tb_desa` VALUES (153, '3320011', 'TENGGULI');
INSERT INTO `tb_desa` VALUES (154, '3320011', 'BANGSRI');
INSERT INTO `tb_desa` VALUES (155, '3320011', 'BANJARAN');
INSERT INTO `tb_desa` VALUES (156, '3320011', 'WEDELAN');
INSERT INTO `tb_desa` VALUES (157, '3320011', 'JERUKWANGI');
INSERT INTO `tb_desa` VALUES (158, '3320011', 'KEDUNGLEPER');
INSERT INTO `tb_desa` VALUES (159, '3320011', 'BONDO');
INSERT INTO `tb_desa` VALUES (160, '3320011', 'BANJAR AGUNG');
INSERT INTO `tb_desa` VALUES (161, '3320013', 'KARIMUNJAWA');
INSERT INTO `tb_desa` VALUES (162, '3320013', 'KEMOJAN');
INSERT INTO `tb_desa` VALUES (163, '3320013', 'PARANG');
INSERT INTO `tb_desa` VALUES (164, '3320014', 'DUDAKAWU');
INSERT INTO `tb_desa` VALUES (165, '3320014', 'SUMANDING');
INSERT INTO `tb_desa` VALUES (166, '3320014', 'BUCU');
INSERT INTO `tb_desa` VALUES (167, '3320014', 'CEPOGO');
INSERT INTO `tb_desa` VALUES (168, '3320014', 'PENDEM');
INSERT INTO `tb_desa` VALUES (169, '3320014', 'JINGGOTAN');
INSERT INTO `tb_desa` VALUES (170, '3320014', 'KANCILAN');
INSERT INTO `tb_desa` VALUES (171, '3320014', 'DERMOLO');
INSERT INTO `tb_desa` VALUES (172, '3320014', 'BALONG');
INSERT INTO `tb_desa` VALUES (173, '3320014', 'TUBANAN');
INSERT INTO `tb_desa` VALUES (174, '3320014', 'KALIAMAN');
INSERT INTO `tb_desa` VALUES (175, '3320015', 'SUMBER REJO');
INSERT INTO `tb_desa` VALUES (176, '3320015', 'CLERING');
INSERT INTO `tb_desa` VALUES (177, '3320015', 'UJUNGWATU');
INSERT INTO `tb_desa` VALUES (178, '3320015', 'BANYUMANIS');
INSERT INTO `tb_desa` VALUES (179, '3320015', 'TULAKAN ');
INSERT INTO `tb_desa` VALUES (180, '3320015', 'BANDUNGHARJO');
INSERT INTO `tb_desa` VALUES (181, '3320015', 'BLINGOH');
INSERT INTO `tb_desa` VALUES (182, '3320015', 'JUGO');
INSERT INTO `tb_desa` VALUES (183, '3320012', 'TEMPUR');
INSERT INTO `tb_desa` VALUES (184, '3320012', 'DAMARWULAN');
INSERT INTO `tb_desa` VALUES (185, '3320012', 'WATUAJI');
INSERT INTO `tb_desa` VALUES (186, '3320012', 'KELET');
INSERT INTO `tb_desa` VALUES (187, '3320012', 'KLEPU');
INSERT INTO `tb_desa` VALUES (188, '3320012', 'JLEGONG');
INSERT INTO `tb_desa` VALUES (189, '3320012', 'KELING');
INSERT INTO `tb_desa` VALUES (190, '3320012', 'GELANG');
INSERT INTO `tb_desa` VALUES (191, '3320012', 'KUNIR');
INSERT INTO `tb_desa` VALUES (192, '3320012', 'TUNAHAN');
INSERT INTO `tb_desa` VALUES (193, '3320012', 'BUMIHARJO');
INSERT INTO `tb_desa` VALUES (194, '3320012', 'KALIGARANG');
INSERT INTO `tb_desa` VALUES (195, '3320013', 'NYAMUK');

-- ----------------------------
-- Table structure for tb_golongan
-- ----------------------------
DROP TABLE IF EXISTS `tb_golongan`;
CREATE TABLE `tb_golongan`  (
  `id_golongan` int(15) NOT NULL AUTO_INCREMENT,
  `golongan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'tingkatan golongan',
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id_golongan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_golongan
-- ----------------------------
INSERT INTO `tb_golongan` VALUES (1, 'siaga', '2020-12-06 07:24:55');
INSERT INTO `tb_golongan` VALUES (2, 'penggalang', '2020-12-06 07:24:59');
INSERT INTO `tb_golongan` VALUES (3, 'penegak', '2020-12-06 07:25:02');
INSERT INTO `tb_golongan` VALUES (4, 'pandega', '2020-12-06 07:25:06');
INSERT INTO `tb_golongan` VALUES (5, 'dewasa', '2020-12-06 07:25:10');

-- ----------------------------
-- Table structure for tb_gudep
-- ----------------------------
DROP TABLE IF EXISTS `tb_gudep`;
CREATE TABLE `tb_gudep`  (
  `id_gudep` int(12) NOT NULL AUTO_INCREMENT,
  `no_gudep` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ambalan` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  `id_pangkalan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_gudep`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_kecamatan`;
CREATE TABLE `tb_kecamatan`  (
  `nama_kecamatan` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_kecamatan` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kecamatan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kecamatan
-- ----------------------------
INSERT INTO `tb_kecamatan` VALUES ('KEDUNG', '3320001');
INSERT INTO `tb_kecamatan` VALUES ('PECANGAAN', '3320002');
INSERT INTO `tb_kecamatan` VALUES ('KALINYAMATAN', '3320003');
INSERT INTO `tb_kecamatan` VALUES ('WELAHAN', '3320004');
INSERT INTO `tb_kecamatan` VALUES ('MAYONG', '3320005');
INSERT INTO `tb_kecamatan` VALUES ('NALUMSARI', '3320006');
INSERT INTO `tb_kecamatan` VALUES ('BATEALIT', '3320007');
INSERT INTO `tb_kecamatan` VALUES ('TAHUNAN', '3320008');
INSERT INTO `tb_kecamatan` VALUES ('JEPARA', '3320009');
INSERT INTO `tb_kecamatan` VALUES ('MLONGGO', '3320010');
INSERT INTO `tb_kecamatan` VALUES ('BANGSRI', '3320011');
INSERT INTO `tb_kecamatan` VALUES ('KELING', '3320012');
INSERT INTO `tb_kecamatan` VALUES ('KARIMUNJAWA', '3320013');
INSERT INTO `tb_kecamatan` VALUES ('KEMBANG', '3320014');
INSERT INTO `tb_kecamatan` VALUES ('DONOROJO', '3320015');
INSERT INTO `tb_kecamatan` VALUES ('PAKISAJI', '3320016');

-- ----------------------------
-- Table structure for tb_kwaran
-- ----------------------------
DROP TABLE IF EXISTS `tb_kwaran`;
CREATE TABLE `tb_kwaran`  (
  `id_kwaran` int(12) NOT NULL AUTO_INCREMENT,
  `nama_kwaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  `nomor_kwaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kamabiran` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kakwaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_kwaran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status_kepemilikan` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sifat_kepemilikan` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomor_sk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_sk` date NULL DEFAULT NULL,
  `awal_bakti` date NULL DEFAULT NULL,
  `akhir_bakti` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_kwaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kwaran
-- ----------------------------
INSERT INTO `tb_kwaran` VALUES (15, 'Tahunan', '2020-12-18 13:49:03', '06', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (16, 'Keling', '2021-01-17 19:58:09', '01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (17, 'Kembang', '2021-01-17 19:58:37', '02', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (18, 'Bangsri', '2021-01-17 19:58:53', '03', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (19, 'Mlonggo', '2021-01-17 19:59:24', '04', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (20, 'Jepara', '2021-01-17 19:59:48', '05', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (21, 'Kedung', '2021-01-17 20:00:24', '07', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (22, 'Batealit', '2021-01-17 20:00:46', '08', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (23, 'Pecangaan', '2021-01-17 20:01:12', '09', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (24, 'Kalinyamatan', '2021-01-17 20:01:46', '10', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (25, 'Mayong', '2021-01-17 20:02:22', '11', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (26, 'Welahan', '2021-01-17 20:02:57', '12', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (27, 'Nalumsari', '2021-01-17 20:03:33', '13', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (28, 'Karimunjawa', '2021-01-17 20:04:10', '14', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (29, 'Pakis Aji', '2021-01-17 20:04:43', '15', '', '', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (30, 'Donorojo', '2021-01-17 20:05:44', '16', '', '', '', '', '', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tb_pangkalan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pangkalan`;
CREATE TABLE `tb_pangkalan`  (
  `id_pangkalan` int(12) NOT NULL AUTO_INCREMENT,
  `nama_pangkalan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_pangkalan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `kwaran` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desa` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  `kamabigus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kagudep` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_pembina` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pangkalan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_sifat_kepemilikan
-- ----------------------------
DROP TABLE IF EXISTS `tb_sifat_kepemilikan`;
CREATE TABLE `tb_sifat_kepemilikan`  (
  `id_sifat` int(10) NOT NULL AUTO_INCREMENT,
  `sifat_kepemilikan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id_sifat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_sifat_kepemilikan
-- ----------------------------
INSERT INTO `tb_sifat_kepemilikan` VALUES (1, 'Tetap', '2020-12-08 08:59:02');
INSERT INTO `tb_sifat_kepemilikan` VALUES (2, 'Kondisional', '2020-12-08 08:59:06');

-- ----------------------------
-- Table structure for tb_status_kepemilikan
-- ----------------------------
DROP TABLE IF EXISTS `tb_status_kepemilikan`;
CREATE TABLE `tb_status_kepemilikan`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `status_kepemilikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_status_kepemilikan
-- ----------------------------
INSERT INTO `tb_status_kepemilikan` VALUES (1, 'Milik Sendiri', '2020-12-08 08:55:51');
INSERT INTO `tb_status_kepemilikan` VALUES (2, 'Menumpang', '2020-12-08 08:56:29');

-- ----------------------------
-- Table structure for tb_tingkatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_tingkatan`;
CREATE TABLE `tb_tingkatan`  (
  `id_tingkatan` int(12) NOT NULL AUTO_INCREMENT,
  `tingkat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sub_tingkat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id_tingkatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tingkatan
-- ----------------------------
INSERT INTO `tb_tingkatan` VALUES (1, 'siaga', 'mula', '2020-12-12 09:03:15');
INSERT INTO `tb_tingkatan` VALUES (2, 'siaga', 'bantu', '2020-12-12 09:03:21');
INSERT INTO `tb_tingkatan` VALUES (3, 'siaga', 'tata', '2020-12-12 09:03:25');
INSERT INTO `tb_tingkatan` VALUES (4, 'siaga', 'garuda', '2020-12-12 09:03:30');
INSERT INTO `tb_tingkatan` VALUES (5, 'penggalang', 'ramu', '2020-12-12 09:03:38');
INSERT INTO `tb_tingkatan` VALUES (6, 'penggalang', 'rakit', '2020-12-12 09:03:44');
INSERT INTO `tb_tingkatan` VALUES (7, 'penggalang', 'terap', '2020-12-12 09:03:57');
INSERT INTO `tb_tingkatan` VALUES (8, 'penggalang', 'garuda', '2020-12-12 09:04:01');
INSERT INTO `tb_tingkatan` VALUES (9, 'penegak', 'bantara', '2020-12-12 09:04:07');
INSERT INTO `tb_tingkatan` VALUES (10, 'penegak', 'laksana', '2020-12-12 09:04:13');
INSERT INTO `tb_tingkatan` VALUES (11, 'penegak', 'garuda', '2020-12-12 09:04:19');
INSERT INTO `tb_tingkatan` VALUES (12, 'pandega', 'pandega', '2020-12-12 09:04:28');
INSERT INTO `tb_tingkatan` VALUES (13, 'pandega', 'garuda', '2020-12-12 09:04:36');
INSERT INTO `tb_tingkatan` VALUES (14, 'dewasa', 'NK', '2020-12-12 10:19:29');
INSERT INTO `tb_tingkatan` VALUES (15, 'dewasa', 'kmd', '2020-12-12 10:19:39');
INSERT INTO `tb_tingkatan` VALUES (16, 'dewasa', 'kml', '2020-12-12 10:19:43');
INSERT INTO `tb_tingkatan` VALUES (17, 'dewasa', 'kpd', '2020-12-12 10:19:47');
INSERT INTO `tb_tingkatan` VALUES (18, 'dewasa', 'kpl', '2020-12-12 10:19:52');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `display_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` enum('1','2','3','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '4',
  `id_kwaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pangkalan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 134 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'kwarcabjepara1120@gmail.com', 'kwarcab jepara', '1', 'admin', 'admin', NULL, '2020-12-02 09:40:20');
INSERT INTO `tb_user` VALUES (107, 'donorojo', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Kwarran Donorojo', '2', '30', NULL, NULL, '2021-01-18 15:55:02');
INSERT INTO `tb_user` VALUES (108, 'keling', '827ccb0eea8a706c4c34a16891f84e7b', '1234', 'Kwaran Keling', '2', '16', NULL, NULL, '2021-01-18 16:02:14');
INSERT INTO `tb_user` VALUES (109, 'kembang', '827ccb0eea8a706c4c34a16891f84e7b', '123', 'Kwarran Kembang', '2', '17', NULL, NULL, '2021-01-18 16:03:52');
INSERT INTO `tb_user` VALUES (110, 'bangsri', '827ccb0eea8a706c4c34a16891f84e7b', '111', 'Kwarran Bangsri', '2', '18', NULL, NULL, '2021-01-18 16:05:17');
INSERT INTO `tb_user` VALUES (111, 'mlonggo', '827ccb0eea8a706c4c34a16891f84e7b', '121', 'Kwarran Mlonggo', '2', '19', NULL, NULL, '2021-01-18 16:07:21');
INSERT INTO `tb_user` VALUES (112, 'pakisaji', '827ccb0eea8a706c4c34a16891f84e7b', '12123', 'Kwarran Pakis Aji', '2', '29', NULL, NULL, '2021-01-18 16:08:57');
INSERT INTO `tb_user` VALUES (113, 'jepara', '827ccb0eea8a706c4c34a16891f84e7b', '131', 'Kwarran Jepara', '2', '20', NULL, NULL, '2021-01-18 16:14:24');
INSERT INTO `tb_user` VALUES (114, 'tahunan', '827ccb0eea8a706c4c34a16891f84e7b', '141', 'Kwarran Tahunan', '2', '15', NULL, NULL, '2021-01-18 16:15:48');
INSERT INTO `tb_user` VALUES (115, 'batealit', '827ccb0eea8a706c4c34a16891f84e7b', 'qw1', 'Kwarran Batealit', '2', '22', NULL, NULL, '2021-01-18 16:17:19');
INSERT INTO `tb_user` VALUES (116, 'kedung', '827ccb0eea8a706c4c34a16891f84e7b', 'ada', 'Kwarran Kedung', '2', '21', NULL, NULL, '2021-01-18 16:18:42');
INSERT INTO `tb_user` VALUES (117, 'pecangaan', '827ccb0eea8a706c4c34a16891f84e7b', 'shhk', 'Kwarran Pecangaan', '2', '23', NULL, NULL, '2021-01-18 16:21:27');
INSERT INTO `tb_user` VALUES (118, 'welahan', '827ccb0eea8a706c4c34a16891f84e7b', 'khklhl', 'Kwarran Welahan', '2', '26', NULL, NULL, '2021-01-18 16:23:28');
INSERT INTO `tb_user` VALUES (119, 'kalinyamatan', '827ccb0eea8a706c4c34a16891f84e7b', 'khiugig', 'Kwarran Kalinyamatan', '2', '24', NULL, NULL, '2021-01-18 16:29:48');
INSERT INTO `tb_user` VALUES (120, 'nalumsari', '827ccb0eea8a706c4c34a16891f84e7b', 'ihoih', 'Kwarran Nalumsari', '2', '27', NULL, NULL, '2021-01-18 16:30:28');
INSERT INTO `tb_user` VALUES (121, 'mayong', '827ccb0eea8a706c4c34a16891f84e7b', 'klhlpl', 'Kwarran Mayong', '2', '25', NULL, NULL, '2021-01-18 16:31:11');
INSERT INTO `tb_user` VALUES (122, 'karimunjawa', '827ccb0eea8a706c4c34a16891f84e7b', 'lkhhpj', 'Kwarran Karimunjawa', '2', '28', NULL, NULL, '2021-01-18 16:31:38');
INSERT INTO `tb_user` VALUES (132, 'caraka', '827ccb0eea8a706c4c34a16891f84e7b', 'caraka@gmail.com', 'CARAKA', '3', NULL, '60', NULL, '2021-02-18 14:48:36');
INSERT INTO `tb_user` VALUES (133, 'smp_tahunan', '827ccb0eea8a706c4c34a16891f84e7b', 'sdas@asda.gasd', 'smp Tahunan', '3', NULL, '63', NULL, '2021-02-18 14:50:10');

-- ----------------------------
-- Table structure for user_token
-- ----------------------------
DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;

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

 Date: 12/12/2020 18:27:08
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
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_anggota
-- ----------------------------
INSERT INTO `tb_anggota` VALUES (26, '1', '23', 'Agus Setiawan', 'Jepara', '1991-01-20', ' Pecangaan', 'O', 'dewasa', 'NK', '', NULL, NULL, '', 0, '', '', 0, '', '', 0, '', '', 0, '', '2020-12-12 12:08:55', '827ccb0eea8a706c4c34a16891f84e7b');
INSERT INTO `tb_anggota` VALUES (27, '1', '23', 'Dede', 'Jepara', '2002-01-01', 'Kecapi ', 'O', 'penegak', 'laksana', '', NULL, NULL, '', 0, '', '', 0, '', '', 0, '', '', 0, '', '2020-12-12 12:10:48', '827ccb0eea8a706c4c34a16891f84e7b');
INSERT INTO `tb_anggota` VALUES (28, '1', '23', 'Ririn', 'jepara', '2002-01-20', 'Tahunan ', 'AB', 'penegak', 'bantara', '', NULL, NULL, '', 0, '', '', 0, '', '', 0, '', '', 0, '', '2020-12-12 13:45:29', '827ccb0eea8a706c4c34a16891f84e7b');
INSERT INTO `tb_anggota` VALUES (29, '1', '24', 'Ayu', 'Jepara', '2002-01-01', 'asdasd ', 'AB', 'penegak', 'laksana', '', NULL, NULL, '', 0, '', '', 0, '', '', 0, '', '', 0, '', '2020-12-12 13:45:55', '827ccb0eea8a706c4c34a16891f84e7b');

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
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_gudep
-- ----------------------------
INSERT INTO `tb_gudep` VALUES (23, '06.133', 'Putra', '2020-12-12 12:07:59', '54');
INSERT INTO `tb_gudep` VALUES (24, '06.134', 'Putri', '2020-12-12 12:08:09', '54');
INSERT INTO `tb_gudep` VALUES (25, '1234', 'Putra', '2020-12-12 12:08:17', '55');
INSERT INTO `tb_gudep` VALUES (26, '234', 'Putri', '2020-12-12 12:08:25', '55');

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
  PRIMARY KEY (`id_kwaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kwaran
-- ----------------------------
INSERT INTO `tb_kwaran` VALUES (1, 'Tahunan', '2020-12-05 22:28:42', '', '', '', '', '', '');
INSERT INTO `tb_kwaran` VALUES (2, 'Batealit', '2020-12-05 22:31:28', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (3, 'Kalinyamatan', '2020-12-07 21:50:08', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (6, 'Kedung', '2020-12-07 22:12:21', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kwaran` VALUES (8, 'Bangsri', '2020-12-07 22:34:48', '', '', '', '', '', '');

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
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pangkalan
-- ----------------------------
INSERT INTO `tb_pangkalan` VALUES (54, 'SMA N  1 Tahunan', 'Jl. Amarta 3 Tahunan Jepara', '1', NULL, '2020-12-12 12:07:12', 'Pak Bambang', 'Endang Sartu', 10);
INSERT INTO `tb_pangkalan` VALUES (55, 'SMA N 1 Bangsri', 'Jl. Jepara Bangsri', '8', NULL, '2020-12-12 12:07:45', 'Ka Bangsri', 'KSgudep Bangsri', 3);

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
) ENGINE = InnoDB AUTO_INCREMENT = 107 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'kwarcabjepara1120@gmail.com', 'kwarcab jepara', '1', NULL, NULL, NULL, '2020-12-02 09:40:20');
INSERT INTO `tb_user` VALUES (102, 'tahunan', '827ccb0eea8a706c4c34a16891f84e7b', 'Tahunan@gmail.com', 'KWARAN TAHUNAN', '2', '1', NULL, NULL, '2020-12-12 12:04:21');
INSERT INTO `tb_user` VALUES (103, 'kedung', '827ccb0eea8a706c4c34a16891f84e7b', 'Kedung@gmail.com', 'MA Kedung', '2', '6', NULL, NULL, '2020-12-12 12:04:48');
INSERT INTO `tb_user` VALUES (104, 'bangsri', '827ccb0eea8a706c4c34a16891f84e7b', 'Bangsri@gmail.com', 'KWARAN BANGSRI', '2', '8', NULL, NULL, '2020-12-12 12:05:17');
INSERT INTO `tb_user` VALUES (105, 'caraka', '827ccb0eea8a706c4c34a16891f84e7b', 'caraka@gmail.com', 'Caraka', '3', NULL, '54', NULL, '2020-12-12 12:17:00');
INSERT INTO `tb_user` VALUES (106, 'sma_bangsri', '827ccb0eea8a706c4c34a16891f84e7b', 'SMANSABA@gmail.com', 'SMA N 1 BANGSRI', '3', NULL, '55', NULL, '2020-12-12 13:09:35');

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

-- ----------------------------
-- Records of user_token
-- ----------------------------
INSERT INTO `user_token` VALUES (53, 'agussetiawan691@gmail.com', '2u2n1w7MmwTT9gW/OAPwGudZH8q3OB6i2j8ygfcmBAc=', '2020-12-11 13:18:56');
INSERT INTO `user_token` VALUES (54, 'agussetiawan691@gmail.com', 'qGKkCYx0beeFr0/0kQYxx7alaw06332wy50jTDCpnOA=', '2020-12-11 13:31:07');
INSERT INTO `user_token` VALUES (55, 'agussetiawan691@gmail.com', 'O6OpCZXJ+atTza1gkQsyP/mMLUjZqzVVlxlgOcsJ5HM=', '2020-12-11 16:01:05');

SET FOREIGN_KEY_CHECKS = 1;

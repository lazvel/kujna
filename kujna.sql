/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : kujna

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 17/06/2019 17:14:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dostavljac
-- ----------------------------
DROP TABLE IF EXISTS `dostavljac`;
CREATE TABLE `dostavljac`  (
  `dostavljac_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kuvar_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`dostavljac_id`) USING BTREE,
  INDEX `fk_dostavljac_kuvar_id`(`kuvar_id`) USING BTREE,
  CONSTRAINT `fk_dostavljac_kuvar_id` FOREIGN KEY (`kuvar_id`) REFERENCES `kuvar` (`kuvar_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dostavljac
-- ----------------------------
INSERT INTO `dostavljac` VALUES (3, 'Zoran', 1);
INSERT INTO `dostavljac` VALUES (5, 'Petar', 2);
INSERT INTO `dostavljac` VALUES (6, 'Ivan', 1);
INSERT INTO `dostavljac` VALUES (7, 'Jovan', 3);
INSERT INTO `dostavljac` VALUES (8, 'Igor', 1);

-- ----------------------------
-- Table structure for kuvar
-- ----------------------------
DROP TABLE IF EXISTS `kuvar`;
CREATE TABLE `kuvar`  (
  `kuvar_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kuvar_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kuvar
-- ----------------------------
INSERT INTO `kuvar` VALUES (1, 'Petar Nj.');
INSERT INTO `kuvar` VALUES (2, 'Ivan B.');
INSERT INTO `kuvar` VALUES (3, 'Jovan Dj.');

-- ----------------------------
-- Table structure for kuvar_narudzbina
-- ----------------------------
DROP TABLE IF EXISTS `kuvar_narudzbina`;
CREATE TABLE `kuvar_narudzbina`  (
  `kuvar_narudzbina_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kuvar_id` int(10) UNSIGNED NOT NULL,
  `narudzbina_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`kuvar_narudzbina_id`) USING BTREE,
  INDEX `fk_kuvar_narudzbina_kuvar_id`(`kuvar_id`) USING BTREE,
  INDEX `fk_kuvar_narudzbina_narudzbina_id`(`narudzbina_id`) USING BTREE,
  CONSTRAINT `fk_kuvar_narudzbina_kuvar_id` FOREIGN KEY (`kuvar_id`) REFERENCES `kuvar` (`kuvar_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_kuvar_narudzbina_narudzbina_id` FOREIGN KEY (`narudzbina_id`) REFERENCES `narudzbina` (`narudzbina_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kuvar_narudzbina
-- ----------------------------
INSERT INTO `kuvar_narudzbina` VALUES (1, 1, 2);
INSERT INTO `kuvar_narudzbina` VALUES (2, 2, 3);
INSERT INTO `kuvar_narudzbina` VALUES (3, 3, 1);
INSERT INTO `kuvar_narudzbina` VALUES (4, 3, 2);
INSERT INTO `kuvar_narudzbina` VALUES (5, 1, 4);

-- ----------------------------
-- Table structure for narucilac
-- ----------------------------
DROP TABLE IF EXISTS `narucilac`;
CREATE TABLE `narucilac`  (
  `narucilac_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`narucilac_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of narucilac
-- ----------------------------
INSERT INTO `narucilac` VALUES (1, 'Stefan Jovic', 'Njeguska 213', '064313323');
INSERT INTO `narucilac` VALUES (2, 'Nemanja Petrovic', 'Nezvana 13', '065555333');
INSERT INTO `narucilac` VALUES (3, 'Radisa Trajkovic', 'Djanijeva 1010', '060000000');
INSERT INTO `narucilac` VALUES (4, 'Mali Pauk', 'Velikamreza 99', '066969696');

-- ----------------------------
-- Table structure for narudzbina
-- ----------------------------
DROP TABLE IF EXISTS `narudzbina`;
CREATE TABLE `narudzbina`  (
  `narudzbina_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jelo` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prilozi` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cena_jela` double(10, 0) NOT NULL,
  `napomena` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `narucilac_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`narudzbina_id`) USING BTREE,
  INDEX `fk_narudzbina_narucilac_id`(`narucilac_id`) USING BTREE,
  CONSTRAINT `fk_narudzbina_narucilac_id` FOREIGN KEY (`narucilac_id`) REFERENCES `narucilac` (`narucilac_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of narudzbina
-- ----------------------------
INSERT INTO `narudzbina` VALUES (1, 'Karadjordjeva snicla', 'kecap, pavlaka', 540, NULL, '2019-06-17 15:27:43', 1);
INSERT INTO `narudzbina` VALUES (2, 'Pica kapricoza', 'kecap', 720, 'stan 2', '2019-06-17 15:27:48', 3);
INSERT INTO `narudzbina` VALUES (3, 'Riba skusa', 'limun', 1050, NULL, '2019-06-17 15:28:03', 2);
INSERT INTO `narudzbina` VALUES (4, 'Slatka palacinka', 'krem, plazma', 150, 'sprat 2', '2019-06-17 15:28:08', 3);

SET FOREIGN_KEY_CHECKS = 1;

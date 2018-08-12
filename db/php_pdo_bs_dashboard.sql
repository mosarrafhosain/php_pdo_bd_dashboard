/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : php_pdo_bs_dashboard

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2018-08-13 02:36:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for USERS
-- ----------------------------
DROP TABLE IF EXISTS `USERS`;
CREATE TABLE `USERS` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `USERNAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PASSWORD` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hash by sha1',
  `REMEMBER_TOKEN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CREATED_BY` int(10) DEFAULT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `UPDATED_BY` int(10) DEFAULT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT '1' COMMENT '0 = Inactive, 1 = Active',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of USERS
-- ----------------------------
INSERT INTO `USERS` VALUES ('1', 'Mosarraf Hosain', 'mosarraf@gmail.com', 'mosarraf', '7c4a8d09ca3762af61e59520943dc26494f8941b', null, '1', '2018-08-13 02:08:30', null, null, '1');

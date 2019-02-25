/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : php_pdo_bs_dashboard

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-02-25 18:55:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `USERNAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IP` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ATTEMPTS` tinyint(1) DEFAULT NULL,
  `LAST_LOGIN` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `STATUS_ID` int(10) NOT NULL,
  `STATUS_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CREATED_BY` bigint(20) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_BY` bigint(20) DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`STATUS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('0', 'Inactive', null, null, null, null, null, null);
INSERT INTO `status` VALUES ('1', 'Active', null, null, null, null, null, null);
INSERT INTO `status` VALUES ('13', 'Delete', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `USERS_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `FULL_NAME` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(40) NOT NULL,
  `STATUS_ID` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'STATUS table STATUS_ID',
  `CREATED_BY` bigint(20) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_BY` bigint(20) DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`USERS_ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Mosarraf Hosain', 'mosarraf@gmail.com', 'mosarraf', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', '1', '2018-07-19 11:05:43', null, '0000-00-00 00:00:00', null, '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('2', 'Delowar Hossain', 'delowar@gmail.com', 'delowar', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', '1', '2018-08-16 14:59:32', null, '0000-00-00 00:00:00', '1', '0000-00-00 00:00:00');

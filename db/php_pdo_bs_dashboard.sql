/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : php_pdo_bs_dashboard

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-08-16 15:24:15
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
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
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
  `USER_TOKEN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PASSWORD_RESET_TOKEN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PASSWORD_RESET_DATE` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Mosarraf Hosain', 'mosarraf@gmail.com', 'mosarraf', '7c4a8d09ca3762af61e59520943dc26494f8941b', null, '1', '2018-08-13 02:08:30', null, null, '1', null, null, null);
INSERT INTO `users` VALUES ('2', 'Delowar Hossain', 'delowar@gmail.com', 'delowar', '7c4a8d09ca3762af61e59520943dc26494f8941b', null, '1', '2018-08-16 14:59:32', null, null, '1', null, null, null);

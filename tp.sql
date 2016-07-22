/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : tp

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2016-07-22 17:04:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 3000_users
-- ----------------------------
DROP TABLE IF EXISTS `3000_users`;
CREATE TABLE `3000_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 3000_users
-- ----------------------------
INSERT INTO `3000_users` VALUES ('1', 'tongkun', '123');

-- ----------------------------
-- Table structure for 5000_navbar
-- ----------------------------
DROP TABLE IF EXISTS `5000_navbar`;
CREATE TABLE `5000_navbar` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_title` varchar(50) DEFAULT NULL,
  `nav_href` varchar(200) DEFAULT NULL,
  `nav_index` tinyint(4) DEFAULT '1',
  `nav_isshow` bit(1) DEFAULT b'1',
  PRIMARY KEY (`nav_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 5000_navbar
-- ----------------------------
INSERT INTO `5000_navbar` VALUES ('1', '新闻', '', '1', '');
INSERT INTO `5000_navbar` VALUES ('2', '观点', null, '2', '');
INSERT INTO `5000_navbar` VALUES ('3', '文章', null, '3', '');
INSERT INTO `5000_navbar` VALUES ('4', 'test', null, '4', '\0');

-- ----------------------------
-- Table structure for 5000_users
-- ----------------------------
DROP TABLE IF EXISTS `5000_users`;
CREATE TABLE `5000_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) DEFAULT NULL,
  `user_pwd` varchar(50) DEFAULT NULL,
  `user_regdate` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 5000_users
-- ----------------------------
INSERT INTO `5000_users` VALUES ('3', 'tongkun', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-21 14:54:08');

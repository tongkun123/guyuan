/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : tp

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2016-07-29 15:19:48
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
-- Table structure for 5000_info
-- ----------------------------
DROP TABLE IF EXISTS `5000_info`;
CREATE TABLE `5000_info` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `info_title` varchar(50) DEFAULT NULL,
  `info_user` int(11) DEFAULT NULL,
  `info_des` varchar(2000) DEFAULT NULL,
  `info_content` text,
  `info_date` datetime DEFAULT NULL,
  `info_type` tinyint(4) DEFAULT NULL COMMENT '1代表新闻2 代表商品 3代表后台某数据',
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 5000_info
-- ----------------------------
INSERT INTO `5000_info` VALUES ('4', '测试新闻标题1', null, '测试新闻简介1', '测试新闻内容1', '2016-03-15 12:40:10', '1');
INSERT INTO `5000_info` VALUES ('5', '测试新闻标题2', null, '测试新闻简介2', '测试新闻内容2', '2016-03-15 12:41:25', '1');
INSERT INTO `5000_info` VALUES ('6', '测试新闻标题3', null, '测试新闻简介3', '测试新闻内容3', '2016-03-15 12:42:14', '1');
INSERT INTO `5000_info` VALUES ('8', '测试新闻标题4', null, '测试新闻简介4', '测试新闻内容4', '2016-07-28 14:16:49', '1');
INSERT INTO `5000_info` VALUES ('11', '测试新闻标题5', null, '测试新闻简介5', '测试新闻内容5', '2016-07-28 14:27:53', '1');
INSERT INTO `5000_info` VALUES ('36', '测试新闻标题6', null, '测试新闻简介6', '测试新闻内容6', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('37', '测试新闻标题7', null, '测试新闻简介7', '测试新闻内容7', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('38', '测试新闻标题8', null, '测试新闻简介8', '测试新闻内容8', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('39', '测试新闻标题9', null, '测试新闻简介9', '测试新闻内容9', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('40', '测试新闻标题10', null, '测试新闻简介10', '测试新闻内容10', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('41', '测试新闻标题11', null, '测试新闻简介11', '测试新闻内容11', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('42', '测试新闻标题12', null, '测试新闻简介12', '测试新闻内容12', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('43', '测试新闻标题13', null, '测试新闻简介13', '测试新闻内容13', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('44', '测试新闻标题14', null, '测试新闻简介14', '测试新闻内容14', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('45', '测试新闻标题15', null, '测试新闻简介15', '测试新闻内容15', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('46', '测试新闻标题16', null, '测试新闻简介16', '测试新闻内容16', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('47', '测试新闻标题17', null, '测试新闻简介17', '测试新闻内容17', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('48', '测试新闻标题18', null, '测试新闻简介18', '测试新闻内容18', '2016-07-28 14:46:49', '1');
INSERT INTO `5000_info` VALUES ('49', '测试新闻标题19', null, '测试新闻简介19', '测试新闻内容19', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('50', '测试新闻标题20', null, '测试新闻简介20', '测试新闻内容20', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('51', '测试新闻标题21', null, '测试新闻简介21', '测试新闻内容21', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('52', '测试新闻标题22', null, '测试新闻简介22', '测试新闻内容22', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('53', '测试新闻标题23', null, '测试新闻简介23', '测试新闻内容23', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('54', '测试新闻标题24', null, '测试新闻简介24', '测试新闻内容24', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('55', '测试新闻标题25', null, '测试新闻简介25', '测试新闻内容25', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('56', '测试新闻标题26', null, '测试新闻简介26', '测试新闻内容26', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('57', '测试新闻标题27', null, '测试新闻简介27', '测试新闻内容27', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('58', '测试新闻标题28', null, '测试新闻简介28', '测试新闻内容28', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('59', '测试新闻标题29', null, '测试新闻简介29', '测试新闻内容29', '2016-07-28 14:46:50', '1');

-- ----------------------------
-- Table structure for 5000_info_meta
-- ----------------------------
DROP TABLE IF EXISTS `5000_info_meta`;
CREATE TABLE `5000_info_meta` (
  `im_id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) DEFAULT NULL,
  `im_key` varchar(200) DEFAULT NULL,
  `im_value` text,
  PRIMARY KEY (`im_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 5000_info_meta
-- ----------------------------
INSERT INTO `5000_info_meta` VALUES ('5', '4', 'review', '1');
INSERT INTO `5000_info_meta` VALUES ('6', '4', 'views', '20');
INSERT INTO `5000_info_meta` VALUES ('7', '4', 'sourcelink', 'www.jtthink.com');
INSERT INTO `5000_info_meta` VALUES ('8', '5', 'views', '1');

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
INSERT INTO `5000_navbar` VALUES ('2', '商品', null, '2', '');
INSERT INTO `5000_navbar` VALUES ('3', '论坛', null, '3', '');
INSERT INTO `5000_navbar` VALUES ('4', 'test', null, '4', '\0');

-- ----------------------------
-- Table structure for 5000_user
-- ----------------------------
DROP TABLE IF EXISTS `5000_user`;
CREATE TABLE `5000_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pwd` varchar(200) NOT NULL,
  `user_regdate` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 5000_user
-- ----------------------------
INSERT INTO `5000_user` VALUES ('17', '张三', '123456', '2016-07-27 11:07:46');
INSERT INTO `5000_user` VALUES ('19', 'aaa', '123456', '2016-07-27 11:14:21');
INSERT INTO `5000_user` VALUES ('20', 'lisi001', '$2a$08$Natp4Rt3CashEnlUUjDJTOMtG66R1DMP8cbo/SEJWf2RpIJZorI4i', null);
INSERT INTO `5000_user` VALUES ('21', 'lisi002', '$2a$08$q0.KgEyn5IKSBwKdvhpQXuS8vAy9pfrtYJVqz6qJGruyRXDlDxbna', null);
INSERT INTO `5000_user` VALUES ('22', 'lisi003', '$2a$08$j13i2Dq/8ULzzUz87FJYJOFATGOp2.T0epoR0FSOnStNnjQrtqyXy', null);
INSERT INTO `5000_user` VALUES ('23', 'lisi004', '$2a$08$Fe7Rrb8CnG5PqKsNLo6/DOf266wVshXxy/QxqlQu8hL4qx6r1Bj4G', null);
INSERT INTO `5000_user` VALUES ('25', 'tongkun', '$2a$08$AA4ucRwX8AXjo4LK/jHvUegws3nHPGnA54dhB.B0JPfEinJ2C27DG', null);

-- ----------------------------
-- Table structure for 5000_user_meta
-- ----------------------------
DROP TABLE IF EXISTS `5000_user_meta`;
CREATE TABLE `5000_user_meta` (
  `umeta_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `umeta_key` varchar(200) DEFAULT NULL,
  `umeta_value` text,
  PRIMARY KEY (`umeta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 5000_user_meta
-- ----------------------------
INSERT INTO `5000_user_meta` VALUES ('1', '2', 'qq', '1234');
INSERT INTO `5000_user_meta` VALUES ('2', '2', 'phone', '12345678');
INSERT INTO `5000_user_meta` VALUES ('3', '3', 'city', '江苏');
INSERT INTO `5000_user_meta` VALUES ('4', '21', 'reg_dae', null);
INSERT INTO `5000_user_meta` VALUES ('5', '22', 'reg_dae', '2016-07-27 02:07:17');
INSERT INTO `5000_user_meta` VALUES ('6', '23', 'reg_dae', '2016-07-27 14:08:26');
INSERT INTO `5000_user_meta` VALUES ('7', '25', 'reg_dae', '2016-07-27 16:36:34');

-- ----------------------------
-- Procedure structure for initdb
-- ----------------------------
DROP PROCEDURE IF EXISTS `initdb`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `initdb`()
BEGIN
	#Routine body goes here...
set @num=6;
while @num<30 DO
INSERT INTO `5000_info` (info_title,info_user,info_des,info_content,
info_date,info_type) VALUES ( CONCAT('测试新闻标题',@num), null,
 CONCAT('测试新闻简介',@num), CONCAT('测试新闻内容',@num), NOW(), '1');
set @num=@num+1;
end while;

END
;;
DELIMITER ;

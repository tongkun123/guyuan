/*
Navicat MySQL Data Transfer

Source Server         : myDB
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : tp

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2016-11-21 17:14:21
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

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
INSERT INTO `5000_info` VALUES ('55', '用过小米的苹果用户对两个手机有什么感觉？', null, '感觉苹果真是大道至简，只关注手机这个产品本身，让产品本身尽可能完美；\n小米聚焦的不是产品本身，更多的是产品以外的东西，比如说它会给你提供更多方便的生活服务（小米生活、黄页…），MIUI不仅是为小米手机这个产品本身服务的，更是一种生活方式。\nApple至简，小米给的却很多。哪怕哪一天你不用iPhone了，你也会感叹iPhone本身的出色；哪怕哪一天你不用小米手机了，也会去使用小米提供的互联网服务（比如多看阅读、小米智能家庭等）。\n两个产品都非常棒！现在还在同时使用两个品牌.', '测试新闻内容25', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('56', '历史上有没有超越时代的人？', null, '我的科技界的偶像特斯拉已经被人列举出来了，我就说说中国的吧。我要说的是李淳风，他可以说是我国最牛逼的预言家——他的职业就是超越时代（从这一点来说，楼上的各位都太业余了）！一般的算命的也就是算算今年好运歹运，李淳风是把这个职业发展到了极致，不但要为人算命，还要算一国之命运。不但把大唐的命运算了，把中华往后五千年都算了，超越的时代跨度那可不是楼上说的那些西方科技文艺怪咖能比的。那么，我们就来看看他的神作推背图，做了哪些超越时代的预言！\n推背图除去第一像引言和最后一象结言并非预言外，共有58像预言，从大唐气数（第2像）一直预言到世界大同（第59像），且每像相接，决无次序错乱。其中，关于唐朝的预言到第九象黄巢之乱就结束了，接下来第十象到十四象是五代；第十五到二十象讲北宋，二十一到二十四象讲南宋，而元朝只有二十五、二十六两象。', '测试新闻内容26', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('57', '共产主义昔日的辉煌，尽皆隐藏在东欧这五座宛若外星基地的建筑中', null, '自二战结束到冷战结束，在社会主义阵营一批建筑物拔地而起。有的异常宏伟似虫洞穿越而来，有的却毫无美感不如不建。有哪些建筑专程去一趟都值了？', '测试新闻内容27', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('58', '第一次去日本旅行是一种怎样的体验？', null, '我就想问~难道就没有人对去日本旅游无感吗？！\n\n去了3次，每次都是单位组织，或者陪领导去。\n\n你说日本购物还行，那你是没去过欧洲血拼。\n\n你说日本吃得好，那我还是喜欢火锅多一点。\n\n你说日本干净日本安全日本小清新，不好意思我是直男我不是很在意。\n\n不管你们把日本夸得天花乱坠，我就一句话：\n\n没！风！景！\n', '测试新闻内容28', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('59', '中国现在有哪些值得骄傲的方面？', null, '可能是因为我见少不识广，我觉得中国的！食物！food！真的是！碾压！全球各地！全球各地！\n\n\n去俄罗斯旅游的时候，深知俄餐的黑暗，自己带了火锅料，我还在这儿巴巴的美呢，妈蛋去了俄国的超市，放眼望去，只有/土豆，进阶版土豆，十只装土豆，二十只装土豆，白菜，捆装白菜，胡萝卜，没有汁的西红柿，蔫茄子，黄瓜，菇/句号感叹号。妈蛋 这就句号了！！！没了！！！！\n', '测试新闻内容29', '2016-07-28 14:46:50', '1');
INSERT INTO `5000_info` VALUES ('61', '冰鲜三文鱼300g/盒', null, '当日分割 肉质肥腴 沁凉口感', null, null, '2');
INSERT INTO `5000_info` VALUES ('62', '冻龙虾(加拿大生龙虾) 500g/只', null, '进口海鲜，新鲜美味', null, null, '2');
INSERT INTO `5000_info` VALUES ('63', '冻银鳕鱼块 300g/片', null, '进口海鲜，新鲜美味', null, null, '2');
INSERT INTO `5000_info` VALUES ('64', '法式七肋羊排770g/袋', null, '安全，新鲜 科尔沁大草原 温和的气温 好牧场自然好羊肉', null, null, '2');
INSERT INTO `5000_info` VALUES ('65', '澳洲M9级 谷饲眼肉牛排', null, '原味牛排 丝丝营养 天然口感', '这是澳洲和牛的牛肉分类等级\r\n澳洲和牛有别于日本牛肉分A1至A5的分类法（最高级为A5），\r\n以肉色深浅和脂肪分布来划分成M1至M12级（主要为M4至M12级），\r\n越高级的和牛，脂肪和肉的比率越高，而且分布更平均，M12的肉与脂肪比例高达50%，\r\n只有少于5%的和牛可达到此级数；\r\n市面多数的澳洲和牛都属M8至10级（相等于日本的 A3级），脂肪比率约达30-35%。 \r\n澳洲牛的肉味较淡，M9级也只能到日本的A3级水平。\r\n十多年前，澳洲农民将日本的母牛带到澳洲来繁殖，并且引入美国的安格斯牛来配种，(也有100%纯种血统的和牛)，并以日本的饲养技术来养殖，培养出「澳洲和牛」，其美味远超M9级牛肉，所以在M9以上又加多了M10、M11和M12级，而M12级牛肉相等于日本的A5级牛肉。', null, '2');

-- ----------------------------
-- Table structure for 5000_info_meta
-- ----------------------------
DROP TABLE IF EXISTS `5000_info_meta`;
CREATE TABLE `5000_info_meta` (
  `im_id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) DEFAULT NULL,
  `im_key` varchar(200) DEFAULT NULL,
  `im_value` text,
  `im_pid` int(11) DEFAULT '0',
  PRIMARY KEY (`im_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 5000_info_meta
-- ----------------------------
INSERT INTO `5000_info_meta` VALUES ('5', '4', 'review', '1', '0');
INSERT INTO `5000_info_meta` VALUES ('6', '4', 'views', '20', '0');
INSERT INTO `5000_info_meta` VALUES ('7', '4', 'sourcelink', 'www.jtthink.com', '0');
INSERT INTO `5000_info_meta` VALUES ('8', '5', 'views', '1', '0');
INSERT INTO `5000_info_meta` VALUES ('9', '61', 'pimg', '/Public/prod/1.jpg', '0');
INSERT INTO `5000_info_meta` VALUES ('10', '62', 'pimg', '/Public/prod/2.jpg', '0');
INSERT INTO `5000_info_meta` VALUES ('11', '63', 'pimg', '/Public/prod/3.jpg', '0');
INSERT INTO `5000_info_meta` VALUES ('12', '64', 'pimg', '/Public/prod/4.gif', '0');
INSERT INTO `5000_info_meta` VALUES ('13', '65', 'pimg', '/Public/prod/5.jpg', '0');
INSERT INTO `5000_info_meta` VALUES ('14', '65', 'price1', '420', '0');
INSERT INTO `5000_info_meta` VALUES ('15', '65', 'views', '1200', '0');
INSERT INTO `5000_info_meta` VALUES ('16', '65', 'price2', '360', '0');
INSERT INTO `5000_info_meta` VALUES ('17', '65', 'ptype', '250g', '0');
INSERT INTO `5000_info_meta` VALUES ('18', '65', 'ptype', '500g', '0');
INSERT INTO `5000_info_meta` VALUES ('23', '65', 'price2', '500', '18');
INSERT INTO `5000_info_meta` VALUES ('24', '65', 'price1', '600', '18');
INSERT INTO `5000_info_meta` VALUES ('25', '65', 'ptype-addr', '安徽', '0');
INSERT INTO `5000_info_meta` VALUES ('26', '65', 'ptype-addr', '青海', '0');
INSERT INTO `5000_info_meta` VALUES ('27', '65', 'price1', '800', '26');
INSERT INTO `5000_info_meta` VALUES ('28', '65', 'price2', '600', '26');
INSERT INTO `5000_info_meta` VALUES ('29', '65', '27', '18', '0');
INSERT INTO `5000_info_meta` VALUES ('30', '65', '28', '18', '0');
INSERT INTO `5000_info_meta` VALUES ('32', '65', 'price1', '600', '25');
INSERT INTO `5000_info_meta` VALUES ('33', '65', 'price2', '500', '25');
INSERT INTO `5000_info_meta` VALUES ('34', '65', '32', '18', '0');
INSERT INTO `5000_info_meta` VALUES ('35', '65', '33', '18', '0');

-- ----------------------------
-- Table structure for 5000_info_widget
-- ----------------------------
DROP TABLE IF EXISTS `5000_info_widget`;
CREATE TABLE `5000_info_widget` (
  `wig_id` int(11) NOT NULL AUTO_INCREMENT,
  `wig_title` varchar(50) DEFAULT NULL,
  `wig_tpl` varchar(50) DEFAULT NULL,
  `wig_model` text,
  PRIMARY KEY (`wig_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 5000_info_widget
-- ----------------------------
INSERT INTO `5000_info_widget` VALUES ('1', '最新发布', 'W:list', 'table(\'5000_info\')->where(\'info_type=1\')->order(\'info_id desc\')->limit(5)->select()');
INSERT INTO `5000_info_widget` VALUES ('2', '最新商品', 'W:list', 'table(\'5000_info\')->where(\'info_type=2\')->order(\'info_id desc\')->limit(5)->select()');

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
INSERT INTO `5000_navbar` VALUES ('1', '新闻', '/index.php/Home/Info/?type=1', '1', '');
INSERT INTO `5000_navbar` VALUES ('2', '商品', '/index.php/Home/Info/?type=2', '2', '');
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

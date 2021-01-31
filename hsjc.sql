# Host: localhost  (Version: 5.7.26)
# Date: 2021-02-01 00:45:43
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `place` varchar(255) DEFAULT NULL COMMENT '检测地点',
  `create_time` int(11) DEFAULT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `login_count` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "admin"
#

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e','安徽省宿州市萧县大屯镇核酸检测点',NULL,1612089415,'127.0.0.1',8,1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `idcard` varchar(18) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `model` int(1) DEFAULT '0' COMMENT '0为个检1为混检',
  `result` int(1) DEFAULT '0' COMMENT '0为无结果1为阴性2为阳性',
  `adminid` int(11) DEFAULT NULL COMMENT '管理员根据管理员来判断所属地区',
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'张三','341322199609012542','17366666666','233',0,1,1,1111),(6,'去q','dfg','1121','123455',1,1,NULL,1612100779),(7,'去q','dfg','1121',NULL,0,1,NULL,1612100783),(8,'去q','dfg','1121',NULL,0,1,NULL,1612103373),(9,'去q','dfg','1121',NULL,0,1,NULL,1612103377),(10,'去q','dfg','1121',NULL,0,1,NULL,1612104120),(11,'111','111','11',NULL,0,1,NULL,1612104199),(12,'111','111','11',NULL,0,1,NULL,1612105166),(13,'111','111','11',NULL,0,0,NULL,1612107033),(14,'111','111','11',NULL,0,0,NULL,1612107086),(15,'111','1','11',NULL,0,0,NULL,1612107115),(16,'2','4','444',NULL,0,0,NULL,1612107216),(17,'123','333','333',NULL,0,0,NULL,1612107279);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mydoc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-06-24 19:40:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mydoc_user`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_user`;
CREATE TABLE `mydoc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(2) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(6) NOT NULL DEFAULT 'abcdef',
  `avatar` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sex` int(2) NOT NULL DEFAULT '0',
  `reg_time` int(11) NOT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  `reg_ip` varchar(15) DEFAULT NULL,
  `last_login_ip` varchar(15) DEFAULT NULL,
  `login_error_count` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mydoc_user
-- ----------------------------
INSERT INTO `mydoc_user` VALUES ('22', '0', 'virgil', '', '26c81c7dabea93c67100efe34129acb1', 'HFwOtr', '', null, '0', '1466767174', '1466767574', '0.0.0.0', '0.0.0.0', '0');

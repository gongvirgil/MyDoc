/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mydoc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-11-24 18:21:21
*/
DROP DATABASE IF EXISTS `mydoc`;
CREATE DATABASE IF NOT EXISTS `mydoc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mydoc`;

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mydoc_catalog`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_catalog`;
CREATE TABLE `mydoc_catalog` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '目录id',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '目录名',
  `order` int(10) NOT NULL DEFAULT '99' COMMENT '顺序号。数字越小越靠前。若此值全部相等时则按id排序',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0' COMMENT '所在的项目id',
  PRIMARY KEY (`id`),
  KEY `order` (`order`),
  KEY `addtime` (`create_time`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='目录表';

-- ----------------------------
-- Records of mydoc_catalog
-- ----------------------------
INSERT INTO `mydoc_catalog` VALUES ('1', '目录A', '99', '1467356973', '0', '1');

-- ----------------------------
-- Table structure for `mydoc_image`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_image`;
CREATE TABLE `mydoc_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `is_remote` tinyint(2) NOT NULL DEFAULT '0',
  `owner_uid` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  `modify_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mydoc_image
-- ----------------------------

-- ----------------------------
-- Table structure for `mydoc_item`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_item`;
CREATE TABLE `mydoc_item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(225) NOT NULL DEFAULT '' COMMENT '项目描述',
  `uid` int(10) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  KEY `addtime` (`create_time`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='项目表';

-- ----------------------------
-- Records of mydoc_item
-- ----------------------------

-- ----------------------------
-- Table structure for `mydoc_item_member`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_item_member`;
CREATE TABLE `mydoc_item_member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(10) NOT NULL DEFAULT '0',
  `uid` int(10) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='项目成员表';

-- ----------------------------
-- Records of mydoc_item_member
-- ----------------------------

-- ----------------------------
-- Table structure for `mydoc_node`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_node`;
CREATE TABLE `mydoc_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mydoc_node
-- ----------------------------

-- ----------------------------
-- Table structure for `mydoc_page`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_page`;
CREATE TABLE `mydoc_page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `order` int(10) NOT NULL DEFAULT '99' COMMENT '顺序号。数字越小越靠前。若此值全部相等时则按id排序',
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `author_uid` int(10) NOT NULL DEFAULT '0' COMMENT '页面作者uid',
  `author_username` varchar(50) NOT NULL DEFAULT '' COMMENT '页面作者名字',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `cat_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order` (`order`),
  KEY `addtime` (`create_time`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='文章页面表';

-- ----------------------------
-- Records of mydoc_page
-- ----------------------------

-- ----------------------------
-- Table structure for `mydoc_project`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_project`;
CREATE TABLE `mydoc_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(2048) DEFAULT '',
  `owner_uid` int(11) NOT NULL DEFAULT '0',
  `manager_uids` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mydoc_project
-- ----------------------------

-- ----------------------------
-- Table structure for `mydoc_role`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_role`;
CREATE TABLE `mydoc_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `level` int(11) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `color` varchar(25) NOT NULL DEFAULT '#000000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mydoc_role
-- ----------------------------
INSERT INTO `mydoc_role` VALUES ('1', '游客', '0', null, '#000000');
INSERT INTO `mydoc_role` VALUES ('2', '普通用户', '1', null, '#000000');
INSERT INTO `mydoc_role` VALUES ('3', 'VIP用户', '1', null, '#000000');
INSERT INTO `mydoc_role` VALUES ('4', '管理员', '2', null, '#000000');
INSERT INTO `mydoc_role` VALUES ('5', '超级管理员', '3', null, '#000000');
INSERT INTO `mydoc_role` VALUES ('6', '系统管理员', '100', null, '#000000');

-- ----------------------------
-- Table structure for `mydoc_user`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_user`;
CREATE TABLE `mydoc_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `username` varchar(50) DEFAULT NULL COMMENT '账号',
  `realname` varchar(50) DEFAULT NULL COMMENT '真实名称',
  `password` varchar(50) NOT NULL,
  `salt` varchar(6) NOT NULL DEFAULT 'abcdef',
  `avatar` varchar(255) NOT NULL,
  `sex` int(2) NOT NULL DEFAULT '0' COMMENT '0: male; 1: female;',
  `reg_time` int(11) NOT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  `reg_ip` varchar(15) DEFAULT NULL,
  `last_login_ip` varchar(15) DEFAULT NULL,
  `login_error_count` int(2) NOT NULL DEFAULT '0',
  `group_id` int(2) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL DEFAULT '0',
  `reset_pwd_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `email` (`email`) USING BTREE,
  KEY `username` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mydoc_user
-- ----------------------------
INSERT INTO `mydoc_user` VALUES ('1', 'ppmoli@qq.com', 'admin', 'admin', '6554bb7556f1e2257d88f0afc100a3af', 'XjneAk', '', '0', '1467356901', '1471852227', '0.0.0.0', '127.0.0.1', '0', '0', '0','');

-- ----------------------------
-- Table structure for `mydoc_article`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_article`;
CREATE TABLE `mydoc_article` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `short_title` varchar(255) DEFAULT NULL COMMENT '简略标题',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键字',
  `weight` int(6) NOT NULL DEFAULT '0' COMMENT '权重',
  `comment_open` int(2) NOT NULL COMMENT '(1-允许评论,0-不允许评论)',
  `titlecolor` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `article_img` varchar(200) DEFAULT NULL COMMENT '图片',
  `attributes` set('a','b','c','d','e','f','g','h','i') NOT NULL,
  `content` longtext NOT NULL,
  `hits` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `ischeck` int(2) NOT NULL DEFAULT '0',
  `owner_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner_uid` (`owner_uid`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mydoc_article
-- ----------------------------

-- ----------------------------
-- Table structure for `mydoc_category`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_category`;
CREATE TABLE `mydoc_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `is_showdesc` int(2) NOT NULL DEFAULT '0',
  `html_file` varchar(255) DEFAULT NULL,
  `ismenu` tinyint(1) NOT NULL DEFAULT '1',
  `islink` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `father_id` int(11) NOT NULL DEFAULT '0',
  `isshow` int(2) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `owner_uid` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner_uid` (`owner_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mydoc_category
-- ----------------------------
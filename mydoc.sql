/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mydoc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-07-01 18:31:32
*/

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='目录表';

-- ----------------------------
-- Records of mydoc_catalog
-- ----------------------------
INSERT INTO `mydoc_catalog` VALUES ('1', '目录A', '99', '1467356973', '0', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='项目表';

-- ----------------------------
-- Records of mydoc_item
-- ----------------------------
INSERT INTO `mydoc_item` VALUES ('1', '项目A', '1111', '1', 'admin', '', '1467356953', '1467358641');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='项目成员表';

-- ----------------------------
-- Records of mydoc_item_member
-- ----------------------------
INSERT INTO `mydoc_item_member` VALUES ('1', '5', '1', 'showdoc', '1451456827');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='文章页面表';

-- ----------------------------
-- Records of mydoc_page
-- ----------------------------
INSERT INTO `mydoc_page` VALUES ('1', 'aa', '99', '\n    \n**简要描述：** \n\n- 用户注册接口\n\n**请求URL：** \n- ` http://xx.com/api/user/register `\n  \n**请求方式：**\n- POST \n\n**参数：** \n\n|参数名|必选|类型|说明|\n|:----    |:---|:----- |-----   |\n|username |是  |string |用户名   |\n|password |是  |string | 密码    |\n|name     |否  |string | 昵称    |\n\n **返回示例**\n\n``` \n  {\n    &quot;error_code&quot;: 0,\n    &quot;data&quot;: {\n      &quot;uid&quot;: &quot;1&quot;,\n      &quot;username&quot;: &quot;12154545&quot;,\n      &quot;name&quot;: &quot;吴系挂&quot;,\n      &quot;groupid&quot;: 2 ,\n      &quot;reg_time&quot;: &quot;1436864169&quot;,\n      &quot;last_login_time&quot;: &quot;0&quot;,\n    }\n  }\n```\n\n **返回参数说明** \n\n|参数名|类型|说明|\n|:-----  |:-----|-----                           |\n|groupid |int   |用户组id，1：超级管理员；2：普通用户  |\n\n **备注** \n\n- 更多返回错误代码请看首页的错误代码描述\n\n\n', '1467357342', '0', '1', 'admin', '1', '1');
INSERT INTO `mydoc_page` VALUES ('2', 'page1', '99', '\n    \n**简要描述：** \n\n- 用户注册接口\n\n**请求URL：** \n- ` http://xx.com/api/user/register `\n  \n**请求方式：**\n- POST \n\n**参数：** \n\n|参数名|必选|类型|说明|\n|:----    |:---|:----- |-----   |\n|username |是  |string |用户名   |\n|password |是  |string | 密码    |\n|name     |否  |string | 昵称    |\n\n **返回示例**\n\n``` \n  {\n    &quot;error_code&quot;: 0,\n    &quot;data&quot;: {\n      &quot;uid&quot;: &quot;1&quot;,\n      &quot;username&quot;: &quot;12154545&quot;,\n      &quot;name&quot;: &quot;吴系挂&quot;,\n      &quot;groupid&quot;: 2 ,\n      &quot;reg_time&quot;: &quot;1436864169&quot;,\n      &quot;last_login_time&quot;: &quot;0&quot;,\n    }\n  }\n```\n\n **返回参数说明** \n\n|参数名|类型|说明|\n|:-----  |:-----|-----                           |\n|groupid |int   |用户组id，1：超级管理员；2：普通用户  |\n\n **备注** \n\n- 更多返回错误代码请看首页的错误代码描述\n\n\n', '1467358114', '0', '1', 'admin', '1', '0');
INSERT INTO `mydoc_page` VALUES ('3', 'page2', '99', '###nihao\n* &amp;*&amp;*', '1467358641', '0', '1', 'admin', '1', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mydoc_user
-- ----------------------------
INSERT INTO `mydoc_user` VALUES ('1', '0', 'admin', '', '6554bb7556f1e2257d88f0afc100a3af', 'XjneAk', '', null, '0', '1467356901', '1467356935', '0.0.0.0', '0.0.0.0', '0');

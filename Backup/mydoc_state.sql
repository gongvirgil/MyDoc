/*
Navicat MySQL Data Transfer

Source Server         : 25
Source Server Version : 50554
Source Host           : 10.0.0.25:3306
Source Database       : mydoc

Target Server Type    : MYSQL
Target Server Version : 50554
File Encoding         : 65001

Date: 2017-07-27 13:58:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mydoc_state`
-- ----------------------------
DROP TABLE IF EXISTS `mydoc_state`;
CREATE TABLE `mydoc_state` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` int(10) NOT NULL DEFAULT '0' COMMENT '0-国家 1-地区',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '国家或地区名称',
  `en_name` varchar(50) DEFAULT NULL COMMENT 'Countries and Regions',
  `abbreviation` varchar(50) DEFAULT NULL COMMENT '国际域名缩写',
  `code` int(5) DEFAULT NULL COMMENT '国际代码',
  `time_offset` varchar(50) DEFAULT NULL COMMENT '时差',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 COMMENT='国家或地区数据表';

-- ----------------------------
-- Records of mydoc_state
-- ----------------------------
INSERT INTO `mydoc_state` VALUES ('1', '0', '安哥拉', 'Angola', 'AO', '244', '-7');
INSERT INTO `mydoc_state` VALUES ('2', '0', '阿富汗', 'Afghanistan', 'AF', '93', '0');
INSERT INTO `mydoc_state` VALUES ('3', '0', '阿尔巴尼亚', 'Albania', 'AL', '355', '-7');
INSERT INTO `mydoc_state` VALUES ('4', '0', '阿尔及利亚', 'Algeria', 'DZ', '213', '-8');
INSERT INTO `mydoc_state` VALUES ('5', '0', '安道尔共和国', 'Andorra', 'AD', '376', '-8');
INSERT INTO `mydoc_state` VALUES ('6', '0', '安圭拉岛', 'Anguilla', 'AI', '1264', '-12');
INSERT INTO `mydoc_state` VALUES ('7', '0', '安提瓜和巴布达', 'Antigua and Barbuda', 'AG', '1268', '-12');
INSERT INTO `mydoc_state` VALUES ('8', '0', '阿根廷', 'Argentina', 'AR', '54', '-11');
INSERT INTO `mydoc_state` VALUES ('9', '0', '亚美尼亚', 'Armenia', 'AM', '374', '-6');
INSERT INTO `mydoc_state` VALUES ('10', '0', '阿森松', 'Ascension', null, '247', '-8');
INSERT INTO `mydoc_state` VALUES ('11', '0', '澳大利亚', 'Australia', 'AU', '61', '+2');
INSERT INTO `mydoc_state` VALUES ('12', '0', '奥地利', 'Austria', 'AT', '43', '-7');
INSERT INTO `mydoc_state` VALUES ('13', '0', '阿塞拜疆', 'Azerbaijan', 'AZ', '994', '-5');
INSERT INTO `mydoc_state` VALUES ('14', '0', '巴哈马', 'Bahamas', 'BS', '1242', '-13');
INSERT INTO `mydoc_state` VALUES ('15', '0', '巴林', 'Bahrain', 'BH', '973', '-5');
INSERT INTO `mydoc_state` VALUES ('16', '0', '孟加拉国', 'Bangladesh', 'BD', '880', '-2');
INSERT INTO `mydoc_state` VALUES ('17', '0', '巴巴多斯', 'Barbados', 'BB', '1246', '-12');
INSERT INTO `mydoc_state` VALUES ('18', '0', '白俄罗斯', 'Belarus', 'BY', '375', '-6');
INSERT INTO `mydoc_state` VALUES ('19', '0', '比利时', 'Belgium', 'BE', '32', '-7');
INSERT INTO `mydoc_state` VALUES ('20', '0', '伯利兹', 'Belize', 'BZ', '501', '-14');
INSERT INTO `mydoc_state` VALUES ('21', '0', '贝宁', 'Benin', 'BJ', '229', '-7');
INSERT INTO `mydoc_state` VALUES ('22', '0', '百慕大群岛', 'BermudaIs.', 'BM', '1441', '-12');
INSERT INTO `mydoc_state` VALUES ('23', '0', '玻利维亚', 'Bolivia', 'BO', '591', '-12');
INSERT INTO `mydoc_state` VALUES ('24', '0', '博茨瓦纳', 'Botswana', 'BW', '267', '-6');
INSERT INTO `mydoc_state` VALUES ('25', '0', '巴西', 'Brazil', 'BR', '55', '-11');
INSERT INTO `mydoc_state` VALUES ('26', '0', '文莱', 'Brunei', 'BN', '673', '0');
INSERT INTO `mydoc_state` VALUES ('27', '0', '保加利亚', 'Bulgaria', 'BG', '359', '-6');
INSERT INTO `mydoc_state` VALUES ('28', '0', '布基纳法索', 'Burkina-faso', 'BF', '226', '-8');
INSERT INTO `mydoc_state` VALUES ('29', '0', '缅甸', 'Burma', 'MM', '95', '-1.3');
INSERT INTO `mydoc_state` VALUES ('30', '0', '布隆迪', 'Burundi', 'BI', '257', '-6');
INSERT INTO `mydoc_state` VALUES ('31', '0', '喀麦隆', 'Cameroon', 'CM', '237', '-7');
INSERT INTO `mydoc_state` VALUES ('32', '0', '加拿大', 'Canada', 'CA', '1', '-13');
INSERT INTO `mydoc_state` VALUES ('33', '0', '开曼群岛', 'Cayman Is.', null, '1345', '-13');
INSERT INTO `mydoc_state` VALUES ('34', '0', '中非共和国', 'Central African Republic', 'CF', '236', '-7');
INSERT INTO `mydoc_state` VALUES ('35', '0', '乍得', 'Chad', 'TD', '235', '-7');
INSERT INTO `mydoc_state` VALUES ('36', '0', '智利', 'Chile', 'CL', '56', '-13');
INSERT INTO `mydoc_state` VALUES ('37', '0', '中国', 'China', 'CN', '86', '0');
INSERT INTO `mydoc_state` VALUES ('38', '0', '哥伦比亚', 'Colombia', 'CO', '57', '0');
INSERT INTO `mydoc_state` VALUES ('39', '0', '刚果', 'Congo', 'CG', '242', '-7');
INSERT INTO `mydoc_state` VALUES ('40', '0', '库克群岛', 'Cook Is.', 'CK', '682', '-18.3');
INSERT INTO `mydoc_state` VALUES ('41', '0', '哥斯达黎加', 'Costa Rica', 'CR', '506', '-14');
INSERT INTO `mydoc_state` VALUES ('42', '0', '古巴', 'Cuba', 'CU', '53', '-13');
INSERT INTO `mydoc_state` VALUES ('43', '0', '塞浦路斯', 'Cyprus', 'CY', '357', '-6');
INSERT INTO `mydoc_state` VALUES ('44', '0', '捷克', 'Czech Republic', 'CZ', '420', '-7');
INSERT INTO `mydoc_state` VALUES ('45', '0', '丹麦', 'Denmark', 'DK', '45', '-7');
INSERT INTO `mydoc_state` VALUES ('46', '0', '吉布提', 'Djibouti', 'DJ', '253', '-5');
INSERT INTO `mydoc_state` VALUES ('47', '0', '多米尼加共和国', 'Dominica Rep.', 'DO', '1890', '-13');
INSERT INTO `mydoc_state` VALUES ('48', '0', '厄瓜多尔', 'Ecuador', 'EC', '593', '-13');
INSERT INTO `mydoc_state` VALUES ('49', '0', '埃及', 'Egypt', 'EG', '20', '-6');
INSERT INTO `mydoc_state` VALUES ('50', '0', '萨尔瓦多', 'EISalvador', 'SV', '503', '-14');
INSERT INTO `mydoc_state` VALUES ('51', '0', '爱沙尼亚', 'Estonia', 'EE', '372', '-5');
INSERT INTO `mydoc_state` VALUES ('52', '0', '埃塞俄比亚', 'Ethiopia', 'ET', '251', '-5');
INSERT INTO `mydoc_state` VALUES ('53', '0', '斐济', 'Fiji', 'FJ', '679', '+4');
INSERT INTO `mydoc_state` VALUES ('54', '0', '芬兰', 'Finland', 'FI', '358', '-6');
INSERT INTO `mydoc_state` VALUES ('55', '0', '法国', 'France', 'FR', '33', '-8');
INSERT INTO `mydoc_state` VALUES ('56', '0', '法属圭亚那', 'French Guiana', 'GF', '594', '-12');
INSERT INTO `mydoc_state` VALUES ('57', '0', '加蓬', 'Gabon', 'GA', '241', '-7');
INSERT INTO `mydoc_state` VALUES ('58', '0', '冈比亚', 'Gambia', 'GM', '220', '-8');
INSERT INTO `mydoc_state` VALUES ('59', '0', '格鲁吉亚', 'Georgia', 'GE', '995', '0');
INSERT INTO `mydoc_state` VALUES ('60', '0', '德国', 'Germany', 'DE', '49', '-7');
INSERT INTO `mydoc_state` VALUES ('61', '0', '加纳', 'Ghana', 'GH', '233', '-8');
INSERT INTO `mydoc_state` VALUES ('62', '0', '直布罗陀', 'Gibraltar', 'GI', '350', '-8');
INSERT INTO `mydoc_state` VALUES ('63', '0', '希腊', 'Greece', 'GR', '30', '-6');
INSERT INTO `mydoc_state` VALUES ('64', '0', '格林纳达', 'Grenada', 'GD', '1809', '-14');
INSERT INTO `mydoc_state` VALUES ('65', '0', '关岛', 'Guam', 'GU', '1671', '+2');
INSERT INTO `mydoc_state` VALUES ('66', '0', '危地马拉', 'Guatemala', 'GT', '502', '-14');
INSERT INTO `mydoc_state` VALUES ('67', '0', '几内亚', 'Guinea', 'GN', '224', '-8');
INSERT INTO `mydoc_state` VALUES ('68', '0', '圭亚那', 'Guyana', 'GY', '592', '-11');
INSERT INTO `mydoc_state` VALUES ('69', '0', '海地', 'Haiti', 'HT', '509', '-13');
INSERT INTO `mydoc_state` VALUES ('70', '0', '洪都拉斯', 'Honduras', 'HN', '504', '-14');
INSERT INTO `mydoc_state` VALUES ('71', '0', '香港', 'Hongkong', 'HK', '852', '0');
INSERT INTO `mydoc_state` VALUES ('72', '0', '匈牙利', 'Hungary', 'HU', '36', '-7');
INSERT INTO `mydoc_state` VALUES ('73', '0', '冰岛', 'Iceland', 'IS', '354', '-9');
INSERT INTO `mydoc_state` VALUES ('74', '0', '印度', 'India', 'IN', '91', '-2.3');
INSERT INTO `mydoc_state` VALUES ('75', '0', '印度尼西亚', 'Indonesia', 'ID', '62', '-0.3');
INSERT INTO `mydoc_state` VALUES ('76', '0', '伊朗', 'Iran', 'IR', '98', '-4.3');
INSERT INTO `mydoc_state` VALUES ('77', '0', '伊拉克', 'Iraq', 'IQ', '964', '-5');
INSERT INTO `mydoc_state` VALUES ('78', '0', '爱尔兰', 'Ireland', 'IE', '353', '-4.3');
INSERT INTO `mydoc_state` VALUES ('79', '0', '以色列', 'Israel', 'IL', '972', '-6');
INSERT INTO `mydoc_state` VALUES ('80', '0', '意大利', 'Italy', 'IT', '39', '-7');
INSERT INTO `mydoc_state` VALUES ('81', '0', '科特迪瓦', 'IvoryCoast', null, '225', '-6');
INSERT INTO `mydoc_state` VALUES ('82', '0', '牙买加', 'Jamaica', 'JM', '1876', '-12');
INSERT INTO `mydoc_state` VALUES ('83', '0', '日本', 'Japan', 'JP', '81', '+1');
INSERT INTO `mydoc_state` VALUES ('84', '0', '约旦', 'Jordan', 'JO', '962', '-6');
INSERT INTO `mydoc_state` VALUES ('85', '0', '柬埔寨', 'Kampuchea (Cambodia )', 'KH', '855', '-1');
INSERT INTO `mydoc_state` VALUES ('86', '0', '哈萨克斯坦', 'Kazakstan', 'KZ', '327', '-5');
INSERT INTO `mydoc_state` VALUES ('87', '0', '肯尼亚', 'Kenya', 'KE', '254', '-5');
INSERT INTO `mydoc_state` VALUES ('88', '0', '韩国', 'Korea', 'KR', '82', '+1');
INSERT INTO `mydoc_state` VALUES ('89', '0', '科威特', 'Kuwait', 'KW', '965', '-5');
INSERT INTO `mydoc_state` VALUES ('90', '0', '吉尔吉斯坦', 'Kyrgyzstan', 'KG', '331', '-5');
INSERT INTO `mydoc_state` VALUES ('91', '0', '老挝', 'Laos', 'LA', '856', '-1');
INSERT INTO `mydoc_state` VALUES ('92', '0', '拉脱维亚', 'Latvia', 'LV', '371', '-5');
INSERT INTO `mydoc_state` VALUES ('93', '0', '黎巴嫩', 'Lebanon', 'LB', '961', '-6');
INSERT INTO `mydoc_state` VALUES ('94', '0', '莱索托', 'Lesotho', 'LS', '266', '-6');
INSERT INTO `mydoc_state` VALUES ('95', '0', '利比里亚', 'Liberia', 'LR', '231', '-8');
INSERT INTO `mydoc_state` VALUES ('96', '0', '利比亚', 'Libya', 'LY', '218', '-6');
INSERT INTO `mydoc_state` VALUES ('97', '0', '列支敦士登', 'Liechtenstein', 'LI', '423', '-7');
INSERT INTO `mydoc_state` VALUES ('98', '0', '立陶宛', 'Lithuania', 'LT', '370', '-5');
INSERT INTO `mydoc_state` VALUES ('99', '0', '卢森堡', 'Luxembourg', 'LU', '352', '-7');
INSERT INTO `mydoc_state` VALUES ('100', '0', '澳门', 'Macao', 'MO', '853', '0');
INSERT INTO `mydoc_state` VALUES ('101', '0', '马达加斯加', 'Madagascar', 'MG', '261', '-5');
INSERT INTO `mydoc_state` VALUES ('102', '0', '马拉维', 'Malawi', 'MW', '265', '-6');
INSERT INTO `mydoc_state` VALUES ('103', '0', '马来西亚', 'Malaysia', 'MY', '60', '-0.5');
INSERT INTO `mydoc_state` VALUES ('104', '0', '马尔代夫', 'Maldives', 'MV', '960', '-7');
INSERT INTO `mydoc_state` VALUES ('105', '0', '马里', 'Mali', 'ML', '223', '-8');
INSERT INTO `mydoc_state` VALUES ('106', '0', '马耳他', 'Malta', 'MT', '356', '-7');
INSERT INTO `mydoc_state` VALUES ('107', '0', '马里亚那群岛', 'Mariana Is', null, '1670', '+1');
INSERT INTO `mydoc_state` VALUES ('108', '0', '马提尼克', 'Martinique', null, '596', '-12');
INSERT INTO `mydoc_state` VALUES ('109', '0', '毛里求斯', 'Mauritius', 'MU', '230', '-4');
INSERT INTO `mydoc_state` VALUES ('110', '0', '墨西哥', 'Mexico', 'MX', '52', '-15');
INSERT INTO `mydoc_state` VALUES ('111', '0', '摩尔多瓦', 'Moldova, Republic of', 'MD', '373', '-5');
INSERT INTO `mydoc_state` VALUES ('112', '0', '摩纳哥', 'Monaco', 'MC', '377', '-7');
INSERT INTO `mydoc_state` VALUES ('113', '0', '蒙古', 'Mongolia', 'MN', '976', '0');
INSERT INTO `mydoc_state` VALUES ('114', '0', '蒙特塞拉特岛', 'Montserrat Is', 'MS', '1664', '-12');
INSERT INTO `mydoc_state` VALUES ('115', '0', '摩洛哥', 'Morocco', 'MA', '212', '-6');
INSERT INTO `mydoc_state` VALUES ('116', '0', '莫桑比克', 'Mozambique', 'MZ', '258', '-6');
INSERT INTO `mydoc_state` VALUES ('117', '0', '纳米比亚', 'Namibia', 'NA', '264', '-7');
INSERT INTO `mydoc_state` VALUES ('118', '0', '瑙鲁', 'Nauru', 'NR', '674', '+4');
INSERT INTO `mydoc_state` VALUES ('119', '0', '尼泊尔', 'Nepal', 'NP', '977', '-2.3');
INSERT INTO `mydoc_state` VALUES ('120', '0', '荷属安的列斯', 'Netheriands Antilles', null, '599', '-12');
INSERT INTO `mydoc_state` VALUES ('121', '0', '荷兰', 'Netherlands', 'NL', '31', '-7');
INSERT INTO `mydoc_state` VALUES ('122', '0', '新西兰', 'NewZealand', 'NZ', '64', '+4');
INSERT INTO `mydoc_state` VALUES ('123', '0', '尼加拉瓜', 'Nicaragua', 'NI', '505', '-14');
INSERT INTO `mydoc_state` VALUES ('124', '0', '尼日尔', 'Niger', 'NE', '227', '-8');
INSERT INTO `mydoc_state` VALUES ('125', '0', '尼日利亚', 'Nigeria', 'NG', '234', '-7');
INSERT INTO `mydoc_state` VALUES ('126', '0', '朝鲜', 'North Korea', 'KP', '850', '+1');
INSERT INTO `mydoc_state` VALUES ('127', '0', '挪威', 'Norway', 'NO', '47', '-7');
INSERT INTO `mydoc_state` VALUES ('128', '0', '阿曼', 'Oman', 'OM', '968', '-4');
INSERT INTO `mydoc_state` VALUES ('129', '0', '巴基斯坦', 'Pakistan', 'PK', '92', '-2.3');
INSERT INTO `mydoc_state` VALUES ('130', '0', '巴拿马', 'Panama', 'PA', '507', '-13');
INSERT INTO `mydoc_state` VALUES ('131', '0', '巴布亚新几内亚', 'Papua New Cuinea', 'PG', '675', '+2');
INSERT INTO `mydoc_state` VALUES ('132', '0', '巴拉圭', 'Paraguay', 'PY', '595', '-12');
INSERT INTO `mydoc_state` VALUES ('133', '0', '秘鲁', 'Peru', 'PE', '51', '-13');
INSERT INTO `mydoc_state` VALUES ('134', '0', '菲律宾', 'Philippines', 'PH', '63', '0');
INSERT INTO `mydoc_state` VALUES ('135', '0', '波兰', 'Poland', 'PL', '48', '-7');
INSERT INTO `mydoc_state` VALUES ('136', '0', '法属玻利尼西亚', 'French Polynesia', 'PF', '689', '+3');
INSERT INTO `mydoc_state` VALUES ('137', '0', '葡萄牙', 'Portugal', 'PT', '351', '-8');
INSERT INTO `mydoc_state` VALUES ('138', '0', '波多黎各', 'PuertoRico', 'PR', '1787', '-12');
INSERT INTO `mydoc_state` VALUES ('139', '0', '卡塔尔', 'Qatar', 'QA', '974', '-5');
INSERT INTO `mydoc_state` VALUES ('140', '0', '留尼旺', 'Reunion', null, '262', '-4');
INSERT INTO `mydoc_state` VALUES ('141', '0', '罗马尼亚', 'Romania', 'RO', '40', '-6');
INSERT INTO `mydoc_state` VALUES ('142', '0', '俄罗斯', 'Russia', 'RU', '7', '-5');
INSERT INTO `mydoc_state` VALUES ('143', '0', '圣卢西亚', 'Saint Lueia', 'LC', '1758', '-12');
INSERT INTO `mydoc_state` VALUES ('144', '0', '圣文森特岛', 'Saint Vincent', 'VC', '1784', '-12');
INSERT INTO `mydoc_state` VALUES ('145', '0', '东萨摩亚(美)', 'Samoa Eastern', null, '684', '-19');
INSERT INTO `mydoc_state` VALUES ('146', '0', '西萨摩亚', 'Samoa Western', null, '685', '-19');
INSERT INTO `mydoc_state` VALUES ('147', '0', '圣马力诺', 'San Marino', 'SM', '378', '-7');
INSERT INTO `mydoc_state` VALUES ('148', '0', '圣多美和普林西比', 'Sao Tome and Principe', 'ST', '239', '-8');
INSERT INTO `mydoc_state` VALUES ('149', '0', '沙特阿拉伯', 'Saudi Arabia', 'SA', '966', '-5');
INSERT INTO `mydoc_state` VALUES ('150', '0', '塞内加尔', 'Senegal', 'SN', '221', '-8');
INSERT INTO `mydoc_state` VALUES ('151', '0', '塞舌尔', 'Seychelles', 'SC', '248', '-4');
INSERT INTO `mydoc_state` VALUES ('152', '0', '塞拉利昂', 'Sierra Leone', 'SL', '232', '-8');
INSERT INTO `mydoc_state` VALUES ('153', '0', '新加坡', 'Singapore', 'SG', '65', '+0.3');
INSERT INTO `mydoc_state` VALUES ('154', '0', '斯洛伐克', 'Slovakia', 'SK', '421', '-7');
INSERT INTO `mydoc_state` VALUES ('155', '0', '斯洛文尼亚', 'Slovenia', 'SI', '386', '-7');
INSERT INTO `mydoc_state` VALUES ('156', '0', '所罗门群岛', 'Solomon Is', 'SB', '677', '+3');
INSERT INTO `mydoc_state` VALUES ('157', '0', '索马里', 'Somali', 'SO', '252', '-5');
INSERT INTO `mydoc_state` VALUES ('158', '0', '南非', 'South Africa', 'ZA', '27', '-6');
INSERT INTO `mydoc_state` VALUES ('159', '0', '西班牙', 'Spain', 'ES', '34', '-8');
INSERT INTO `mydoc_state` VALUES ('160', '0', '斯里兰卡', 'Sri Lanka', 'LK', '94', '0');
INSERT INTO `mydoc_state` VALUES ('161', '0', '圣卢西亚', 'St.Lucia', 'LC', '1758', '-12');
INSERT INTO `mydoc_state` VALUES ('162', '0', '圣文森特', 'St.Vincent', 'VC', '1784', '-12');
INSERT INTO `mydoc_state` VALUES ('163', '0', '苏丹', 'Sudan', 'SD', '249', '-6');
INSERT INTO `mydoc_state` VALUES ('164', '0', '苏里南', 'Suriname', 'SR', '597', '-11.3');
INSERT INTO `mydoc_state` VALUES ('165', '0', '斯威士兰', 'Swaziland', 'SZ', '268', '-6');
INSERT INTO `mydoc_state` VALUES ('166', '0', '瑞典', 'Sweden', 'SE', '46', '-7');
INSERT INTO `mydoc_state` VALUES ('167', '0', '瑞士', 'Switzerland', 'CH', '41', '-7');
INSERT INTO `mydoc_state` VALUES ('168', '0', '叙利亚', 'Syria', 'SY', '963', '-6');
INSERT INTO `mydoc_state` VALUES ('169', '0', '台湾省', 'Taiwan', 'TW', '886', '0');
INSERT INTO `mydoc_state` VALUES ('170', '0', '塔吉克斯坦', 'Tajikstan', 'TJ', '992', '-5');
INSERT INTO `mydoc_state` VALUES ('171', '0', '坦桑尼亚', 'Tanzania', 'TZ', '255', '-5');
INSERT INTO `mydoc_state` VALUES ('172', '0', '泰国', 'Thailand', 'TH', '66', '-1');
INSERT INTO `mydoc_state` VALUES ('173', '0', '多哥', 'Togo', 'TG', '228', '-8');
INSERT INTO `mydoc_state` VALUES ('174', '0', '汤加', 'Tonga', 'TO', '676', '+4');
INSERT INTO `mydoc_state` VALUES ('175', '0', '特立尼达和多巴哥', 'Trinidad and Tobago', 'TT', '1809', '-12');
INSERT INTO `mydoc_state` VALUES ('176', '0', '突尼斯', 'Tunisia', 'TN', '216', '-7');
INSERT INTO `mydoc_state` VALUES ('177', '0', '土耳其', 'Turkey', 'TR', '90', '-6');
INSERT INTO `mydoc_state` VALUES ('178', '0', '土库曼斯坦', 'Turkmenistan', 'TM', '993', '-5');
INSERT INTO `mydoc_state` VALUES ('179', '0', '乌干达', 'Uganda', 'UG', '256', '-5');
INSERT INTO `mydoc_state` VALUES ('180', '0', '乌克兰', 'Ukraine', 'UA', '380', '-5');
INSERT INTO `mydoc_state` VALUES ('181', '0', '阿拉伯联合酋长国', 'United Arab Emirates', 'AE', '971', '-4');
INSERT INTO `mydoc_state` VALUES ('182', '0', '英国', 'United Kiongdom', 'GB', '44', '-8');
INSERT INTO `mydoc_state` VALUES ('183', '0', '美国', 'United States of America', 'US', '1', '-13');
INSERT INTO `mydoc_state` VALUES ('184', '0', '乌拉圭', 'Uruguay', 'UY', '598', '-10.3');
INSERT INTO `mydoc_state` VALUES ('185', '0', '乌兹别克斯坦', 'Uzbekistan', 'UZ', '233', '-5');
INSERT INTO `mydoc_state` VALUES ('186', '0', '委内瑞拉', 'Venezuela', 'VE', '58', '-12.3');
INSERT INTO `mydoc_state` VALUES ('187', '0', '越南', 'Vietnam', 'VN', '84', '-1');
INSERT INTO `mydoc_state` VALUES ('188', '0', '也门', 'Yemen', 'YE', '967', '-5');
INSERT INTO `mydoc_state` VALUES ('189', '0', '南斯拉夫', 'Yugoslavia', 'YU', '381', '-7');
INSERT INTO `mydoc_state` VALUES ('190', '0', '南非', 'South Africa', 'ZA', '27', '+2');
INSERT INTO `mydoc_state` VALUES ('191', '0', '津巴布韦', 'Zimbabwe', 'ZW', '263', '-6');
INSERT INTO `mydoc_state` VALUES ('192', '0', '扎伊尔', 'Zaire', 'ZR', '243', '-7');
INSERT INTO `mydoc_state` VALUES ('193', '0', '赞比亚', 'Zambia', 'ZM', '260', '-6');

/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : dev

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-10 13:45:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '用户uid',
  `province` int(6) NOT NULL COMMENT '收货人所在的省',
  `city` int(6) NOT NULL COMMENT '收货人所在的城市',
  `name` varchar(30) NOT NULL COMMENT '收货人姓名',
  `phone` varchar(11) NOT NULL COMMENT '收货人手机号',
  `address` varchar(255) NOT NULL COMMENT '收货人地址',
  `code` varchar(10) NOT NULL COMMENT '邮政编码',
  `flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '地址标识：0非常用地址，1常用地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('1', '2', '140000', '140100', '张三', '1381232456', 'XX街道55小区，7懂，702室', '36520', '0');
INSERT INTO `address` VALUES ('3', '2', '210000', '210200', '张五一', '15812324565', 'XX街道55小区，7懂，802室', '56520', '1');

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '管理员密码',
  `truename` varchar(20) NOT NULL COMMENT '管理员真实姓名',
  `gid` int(10) NOT NULL COMMENT '角色id',
  `status` tinyint(1) NOT NULL COMMENT '状态：0正常，1禁用',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'admin', 'a66abb5684c45962d887564f08346e8d', '', '1', '0', '0');
INSERT INTO `admins` VALUES ('3', 'test2', '78a9be750430920f822280d3523682a4', '历史', '1', '0', '1531816013');

-- ----------------------------
-- Table structure for admin_groups
-- ----------------------------
DROP TABLE IF EXISTS `admin_groups`;
CREATE TABLE `admin_groups` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '角色名称',
  `rights` text NOT NULL COMMENT '菜单的mid，已json方式存储',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_groups
-- ----------------------------
INSERT INTO `admin_groups` VALUES ('1', '系统管理员', '[1,3,6,7,8,9,10,11,13,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39]');

-- ----------------------------
-- Table structure for admin_menus
-- ----------------------------
DROP TABLE IF EXISTS `admin_menus`;
CREATE TABLE `admin_menus` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL COMMENT '上级菜单',
  `ord` int(10) NOT NULL DEFAULT '0',
  `title` varchar(30) NOT NULL COMMENT '菜单名称',
  `controller` varchar(30) NOT NULL COMMENT '控制器',
  `method` varchar(30) NOT NULL COMMENT '控制器方法',
  `ishidden` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否隐藏：0正常，1隐藏',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，1禁用',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_menus
-- ----------------------------
INSERT INTO `admin_menus` VALUES ('1', '0', '0', 'Home页面', 'home', 'index', '1', '0');
INSERT INTO `admin_menus` VALUES ('3', '1', '0', '欢迎页面', 'home', 'welcome', '1', '0');
INSERT INTO `admin_menus` VALUES ('6', '0', '0', '管理员管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('7', '6', '0', '管理员列表', 'admin', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('8', '6', '0', '管理员添加', 'admin', 'add', '1', '0');
INSERT INTO `admin_menus` VALUES ('9', '6', '0', '管理员保存', 'admin', 'save', '1', '0');
INSERT INTO `admin_menus` VALUES ('10', '0', '0', '权限管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('11', '10', '0', '菜单列表', 'menu', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('13', '10', '0', '菜单添加', 'menu', 'add', '1', '0');
INSERT INTO `admin_menus` VALUES ('14', '10', '0', '菜单保存', 'menu', 'save', '1', '0');
INSERT INTO `admin_menus` VALUES ('15', '10', '0', '角色列表', 'roles', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('16', '10', '0', '角色添加', 'roles', 'add', '1', '0');
INSERT INTO `admin_menus` VALUES ('17', '10', '0', '角色保存', 'roles', 'save', '1', '0');
INSERT INTO `admin_menus` VALUES ('18', '7', '0', '测试菜单', 'admin', 'test', '0', '0');
INSERT INTO `admin_menus` VALUES ('19', '0', '0', '系统设置', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('20', '19', '0', '网站设置', 'setting', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('21', '19', '0', '保存设置', 'setting', 'save', '1', '0');
INSERT INTO `admin_menus` VALUES ('22', '0', '0', '商品分类', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('23', '22', '0', '分类列表', 'Cates', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('24', '22', '0', '保存分类', 'cates', 'save', '0', '0');
INSERT INTO `admin_menus` VALUES ('25', '0', '0', '商品管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('26', '25', '0', '商品发布', 'product', 'add', '0', '0');
INSERT INTO `admin_menus` VALUES ('27', '25', '0', '图片上传', 'product', 'upload_img', '1', '0');
INSERT INTO `admin_menus` VALUES ('28', '25', '0', '商品编码', 'product', 'auto_create_no', '1', '0');
INSERT INTO `admin_menus` VALUES ('29', '25', '0', '商品保存', 'product', 'save', '1', '0');
INSERT INTO `admin_menus` VALUES ('30', '25', '0', '商品列表', 'product', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('31', '25', '0', '删除商品', 'product', 'delete', '1', '0');
INSERT INTO `admin_menus` VALUES ('32', '0', '0', '订单管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('33', '32', '0', '订单列表', 'order', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('34', '32', '0', '订单编辑', 'order', 'add', '1', '0');
INSERT INTO `admin_menus` VALUES ('35', '32', '0', '保存订单', 'order', 'save', '1', '0');
INSERT INTO `admin_menus` VALUES ('36', '32', '0', '删除订单', 'order', 'delete', '1', '0');
INSERT INTO `admin_menus` VALUES ('37', '0', '0', '用户管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('38', '37', '0', '用户列表', 'member', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('39', '37', '0', '禁用用户', 'member', 'disables', '1', '0');

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '用户uid',
  `pro_id` int(10) NOT NULL COMMENT '商品id',
  `count` int(10) NOT NULL COMMENT '购买数量',
  `add_time` int(10) NOT NULL COMMENT '加入购物车时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES ('3', '2', '2', '1', '1533192236');
INSERT INTO `cart` VALUES ('4', '2', '2', '1', '1533266416');

-- ----------------------------
-- Table structure for citys
-- ----------------------------
DROP TABLE IF EXISTS `citys`;
CREATE TABLE `citys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `code` int(11) NOT NULL COMMENT '行政区编码',
  `name` varchar(32) NOT NULL,
  `first_name` char(5) NOT NULL COMMENT '名称首字母',
  PRIMARY KEY (`id`),
  KEY `province` (`province`) USING BTREE,
  KEY `city` (`city`) USING BTREE,
  KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3514 DEFAULT CHARSET=utf8 COMMENT='行政区划代码';

-- ----------------------------
-- Records of citys
-- ----------------------------
INSERT INTO `citys` VALUES ('1', '110000', '0', '110000', '北京市', 'B');
INSERT INTO `citys` VALUES ('20', '120000', '0', '120000', '天津市', 'T');
INSERT INTO `citys` VALUES ('39', '130000', '0', '130000', '河北省', 'H');
INSERT INTO `citys` VALUES ('40', '130000', '130100', '130100', '石家庄市', 'S');
INSERT INTO `citys` VALUES ('63', '130000', '130200', '130200', '唐山市', 'T');
INSERT INTO `citys` VALUES ('79', '130000', '130300', '130300', '秦皇岛市', 'Q');
INSERT INTO `citys` VALUES ('88', '130000', '130400', '130400', '邯郸市', 'H');
INSERT INTO `citys` VALUES ('109', '130000', '130500', '130500', '邢台市', 'X');
INSERT INTO `citys` VALUES ('130', '130000', '130600', '130600', '保定市', 'B');
INSERT INTO `citys` VALUES ('156', '130000', '130700', '130700', '张家口市', 'Z');
INSERT INTO `citys` VALUES ('175', '130000', '130800', '130800', '承德市', 'C');
INSERT INTO `citys` VALUES ('188', '130000', '130900', '130900', '沧州市', 'C');
INSERT INTO `citys` VALUES ('206', '130000', '131000', '131000', '廊坊市', 'L');
INSERT INTO `citys` VALUES ('218', '130000', '131100', '131100', '衡水市', 'H');
INSERT INTO `citys` VALUES ('231', '130000', '139000', '139000', '省直辖县级行政区划', 'S');
INSERT INTO `citys` VALUES ('234', '140000', '0', '140000', '山西省', 'S');
INSERT INTO `citys` VALUES ('235', '140000', '140100', '140100', '太原市', 'T');
INSERT INTO `citys` VALUES ('247', '140000', '140200', '140200', '大同市', 'D');
INSERT INTO `citys` VALUES ('260', '140000', '140300', '140300', '阳泉市', 'Y');
INSERT INTO `citys` VALUES ('267', '140000', '140400', '140400', '长治市', 'C');
INSERT INTO `citys` VALUES ('282', '140000', '140500', '140500', '晋城市', 'J');
INSERT INTO `citys` VALUES ('290', '140000', '140600', '140600', '朔州市', 'S');
INSERT INTO `citys` VALUES ('298', '140000', '140700', '140700', '晋中市', 'J');
INSERT INTO `citys` VALUES ('311', '140000', '140800', '140800', '运城市', 'Y');
INSERT INTO `citys` VALUES ('326', '140000', '140900', '140900', '忻州市', 'X');
INSERT INTO `citys` VALUES ('342', '140000', '141000', '141000', '临汾市', 'L');
INSERT INTO `citys` VALUES ('361', '140000', '141100', '141100', '吕梁市', 'L');
INSERT INTO `citys` VALUES ('376', '150000', '0', '150000', '内蒙古自治区', 'N');
INSERT INTO `citys` VALUES ('377', '150000', '150100', '150100', '呼和浩特市', 'H');
INSERT INTO `citys` VALUES ('388', '150000', '150200', '150200', '包头市', 'B');
INSERT INTO `citys` VALUES ('399', '150000', '150300', '150300', '乌海市', 'W');
INSERT INTO `citys` VALUES ('404', '150000', '150400', '150400', '赤峰市', 'C');
INSERT INTO `citys` VALUES ('418', '150000', '150500', '150500', '通辽市', 'T');
INSERT INTO `citys` VALUES ('428', '150000', '150600', '150600', '鄂尔多斯市', 'E');
INSERT INTO `citys` VALUES ('438', '150000', '150700', '150700', '呼伦贝尔市', 'H');
INSERT INTO `citys` VALUES ('454', '150000', '150800', '150800', '巴彦淖尔市', 'B');
INSERT INTO `citys` VALUES ('463', '150000', '150900', '150900', '乌兰察布市', 'W');
INSERT INTO `citys` VALUES ('476', '150000', '152200', '152200', '兴安盟', 'X');
INSERT INTO `citys` VALUES ('483', '150000', '152500', '152500', '锡林郭勒盟', 'X');
INSERT INTO `citys` VALUES ('496', '150000', '152900', '152900', '阿拉善盟', 'A');
INSERT INTO `citys` VALUES ('500', '210000', '0', '210000', '辽宁省', 'L');
INSERT INTO `citys` VALUES ('501', '210000', '210100', '210100', '沈阳市', 'S');
INSERT INTO `citys` VALUES ('516', '210000', '210200', '210200', '大连市', 'D');
INSERT INTO `citys` VALUES ('528', '210000', '210300', '210300', '鞍山市', 'A');
INSERT INTO `citys` VALUES ('537', '210000', '210400', '210400', '抚顺市', 'F');
INSERT INTO `citys` VALUES ('546', '210000', '210500', '210500', '本溪市', 'B');
INSERT INTO `citys` VALUES ('554', '210000', '210600', '210600', '丹东市', 'D');
INSERT INTO `citys` VALUES ('562', '210000', '210700', '210700', '锦州市', 'J');
INSERT INTO `citys` VALUES ('571', '210000', '210800', '210800', '营口市', 'Y');
INSERT INTO `citys` VALUES ('579', '210000', '210900', '210900', '阜新市', 'F');
INSERT INTO `citys` VALUES ('588', '210000', '211000', '211000', '辽阳市', 'L');
INSERT INTO `citys` VALUES ('597', '210000', '211100', '211100', '盘锦市', 'P');
INSERT INTO `citys` VALUES ('603', '210000', '211200', '211200', '铁岭市', 'T');
INSERT INTO `citys` VALUES ('612', '210000', '211300', '211300', '朝阳市', 'Z');
INSERT INTO `citys` VALUES ('621', '210000', '211400', '211400', '葫芦岛市', 'H');
INSERT INTO `citys` VALUES ('629', '220000', '0', '220000', '吉林省', 'J');
INSERT INTO `citys` VALUES ('630', '220000', '220100', '220100', '长春市', 'C');
INSERT INTO `citys` VALUES ('642', '220000', '220200', '220200', '吉林市', 'J');
INSERT INTO `citys` VALUES ('653', '220000', '220300', '220300', '四平市', 'S');
INSERT INTO `citys` VALUES ('661', '220000', '220400', '220400', '辽源市', 'L');
INSERT INTO `citys` VALUES ('667', '220000', '220500', '220500', '通化市', 'T');
INSERT INTO `citys` VALUES ('676', '220000', '220600', '220600', '白山市', 'B');
INSERT INTO `citys` VALUES ('684', '220000', '220700', '220700', '松原市', 'S');
INSERT INTO `citys` VALUES ('691', '220000', '220800', '220800', '白城市', 'B');
INSERT INTO `citys` VALUES ('698', '220000', '222400', '222400', '延边朝鲜族自治州', 'Y');
INSERT INTO `citys` VALUES ('707', '230000', '0', '230000', '黑龙江省', 'H');
INSERT INTO `citys` VALUES ('708', '230000', '230100', '230100', '哈尔滨市', 'H');
INSERT INTO `citys` VALUES ('728', '230000', '230200', '230200', '齐齐哈尔市', 'Q');
INSERT INTO `citys` VALUES ('746', '230000', '230300', '230300', '鸡西市', 'J');
INSERT INTO `citys` VALUES ('757', '230000', '230400', '230400', '鹤岗市', 'H');
INSERT INTO `citys` VALUES ('767', '230000', '230500', '230500', '双鸭山市', 'S');
INSERT INTO `citys` VALUES ('777', '230000', '230600', '230600', '大庆市', 'D');
INSERT INTO `citys` VALUES ('788', '230000', '230700', '230700', '伊春市', 'Y');
INSERT INTO `citys` VALUES ('807', '230000', '230800', '230800', '佳木斯市', 'J');
INSERT INTO `citys` VALUES ('819', '230000', '230900', '230900', '七台河市', 'Q');
INSERT INTO `citys` VALUES ('825', '230000', '231000', '231000', '牡丹江市', 'M');
INSERT INTO `citys` VALUES ('837', '230000', '231100', '231100', '黑河市', 'H');
INSERT INTO `citys` VALUES ('845', '230000', '231200', '231200', '绥化市', 'S');
INSERT INTO `citys` VALUES ('857', '230000', '232700', '232700', '大兴安岭地区', 'D');
INSERT INTO `citys` VALUES ('861', '310000', '0', '310000', '上海市', 'S');
INSERT INTO `citys` VALUES ('881', '320000', '0', '320000', '江苏省', 'J');
INSERT INTO `citys` VALUES ('882', '320000', '320100', '320100', '南京市', 'N');
INSERT INTO `citys` VALUES ('895', '320000', '320200', '320200', '无锡市', 'W');
INSERT INTO `citys` VALUES ('905', '320000', '320300', '320300', '徐州市', 'X');
INSERT INTO `citys` VALUES ('917', '320000', '320400', '320400', '常州市', 'C');
INSERT INTO `citys` VALUES ('926', '320000', '320500', '320500', '苏州市', 'S');
INSERT INTO `citys` VALUES ('937', '320000', '320600', '320600', '南通市', 'N');
INSERT INTO `citys` VALUES ('947', '320000', '320700', '320700', '连云港市', 'L');
INSERT INTO `citys` VALUES ('955', '320000', '320800', '320800', '淮安市', 'H');
INSERT INTO `citys` VALUES ('965', '320000', '320900', '320900', '盐城市', 'Y');
INSERT INTO `citys` VALUES ('976', '320000', '321000', '321000', '扬州市', 'Y');
INSERT INTO `citys` VALUES ('984', '320000', '321100', '321100', '镇江市', 'Z');
INSERT INTO `citys` VALUES ('992', '320000', '321200', '321200', '泰州市', 'T');
INSERT INTO `citys` VALUES ('1000', '320000', '321300', '321300', '宿迁市', 'S');
INSERT INTO `citys` VALUES ('1007', '330000', '0', '330000', '浙江省', 'Z');
INSERT INTO `citys` VALUES ('1008', '330000', '330100', '330100', '杭州市', 'H');
INSERT INTO `citys` VALUES ('1023', '330000', '330200', '330200', '宁波市', 'N');
INSERT INTO `citys` VALUES ('1036', '330000', '330300', '330300', '温州市', 'W');
INSERT INTO `citys` VALUES ('1049', '330000', '330400', '330400', '嘉兴市', 'J');
INSERT INTO `citys` VALUES ('1058', '330000', '330500', '330500', '湖州市', 'H');
INSERT INTO `citys` VALUES ('1065', '330000', '330600', '330600', '绍兴市', 'S');
INSERT INTO `citys` VALUES ('1073', '330000', '330700', '330700', '金华市', 'J');
INSERT INTO `citys` VALUES ('1084', '330000', '330800', '330800', '衢州市', 'Q');
INSERT INTO `citys` VALUES ('1092', '330000', '330900', '330900', '舟山市', 'Z');
INSERT INTO `citys` VALUES ('1098', '330000', '331000', '331000', '台州市', 'T');
INSERT INTO `citys` VALUES ('1109', '330000', '331100', '331100', '丽水市', 'L');
INSERT INTO `citys` VALUES ('1120', '340000', '0', '340000', '安徽省', 'A');
INSERT INTO `citys` VALUES ('1121', '340000', '340100', '340100', '合肥市', 'H');
INSERT INTO `citys` VALUES ('1132', '340000', '340200', '340200', '芜湖市', 'W');
INSERT INTO `citys` VALUES ('1142', '340000', '340300', '340300', '蚌埠市', 'B');
INSERT INTO `citys` VALUES ('1151', '340000', '340400', '340400', '淮南市', 'H');
INSERT INTO `citys` VALUES ('1159', '340000', '340500', '340500', '马鞍山市', 'M');
INSERT INTO `citys` VALUES ('1167', '340000', '340600', '340600', '淮北市', 'H');
INSERT INTO `citys` VALUES ('1173', '340000', '340700', '340700', '铜陵市', 'T');
INSERT INTO `citys` VALUES ('1179', '340000', '340800', '340800', '安庆市', 'A');
INSERT INTO `citys` VALUES ('1192', '340000', '341000', '341000', '黄山市', 'H');
INSERT INTO `citys` VALUES ('1201', '340000', '341100', '341100', '滁州市', 'C');
INSERT INTO `citys` VALUES ('1211', '340000', '341200', '341200', '阜阳市', 'F');
INSERT INTO `citys` VALUES ('1221', '340000', '341300', '341300', '宿州市', 'S');
INSERT INTO `citys` VALUES ('1228', '340000', '341500', '341500', '六安市', 'L');
INSERT INTO `citys` VALUES ('1237', '340000', '341600', '341600', '亳州市', 'B');
INSERT INTO `citys` VALUES ('1243', '340000', '341700', '341700', '池州市', 'C');
INSERT INTO `citys` VALUES ('1249', '340000', '341800', '341800', '宣城市', 'X');
INSERT INTO `citys` VALUES ('1258', '350000', '0', '350000', '福建省', 'F');
INSERT INTO `citys` VALUES ('1259', '350000', '350100', '350100', '福州市', 'F');
INSERT INTO `citys` VALUES ('1274', '350000', '350200', '350200', '厦门市', 'X');
INSERT INTO `citys` VALUES ('1282', '350000', '350300', '350300', '莆田市', 'P');
INSERT INTO `citys` VALUES ('1289', '350000', '350400', '350400', '三明市', 'S');
INSERT INTO `citys` VALUES ('1303', '350000', '350500', '350500', '泉州市', 'Q');
INSERT INTO `citys` VALUES ('1317', '350000', '350600', '350600', '漳州市', 'Z');
INSERT INTO `citys` VALUES ('1330', '350000', '350700', '350700', '南平市', 'N');
INSERT INTO `citys` VALUES ('1342', '350000', '350800', '350800', '龙岩市', 'L');
INSERT INTO `citys` VALUES ('1351', '350000', '350900', '350900', '宁德市', 'N');
INSERT INTO `citys` VALUES ('1362', '360000', '0', '360000', '江西省', 'J');
INSERT INTO `citys` VALUES ('1363', '360000', '360100', '360100', '南昌市', 'N');
INSERT INTO `citys` VALUES ('1374', '360000', '360200', '360200', '景德镇市', 'J');
INSERT INTO `citys` VALUES ('1380', '360000', '360300', '360300', '萍乡市', 'P');
INSERT INTO `citys` VALUES ('1387', '360000', '360400', '360400', '九江市', 'J');
INSERT INTO `citys` VALUES ('1402', '360000', '360500', '360500', '新余市', 'X');
INSERT INTO `citys` VALUES ('1406', '360000', '360600', '360600', '鹰潭市', 'Y');
INSERT INTO `citys` VALUES ('1411', '360000', '360700', '360700', '赣州市', 'G');
INSERT INTO `citys` VALUES ('1431', '360000', '360800', '360800', '吉安市', 'J');
INSERT INTO `citys` VALUES ('1446', '360000', '360900', '360900', '宜春市', 'Y');
INSERT INTO `citys` VALUES ('1458', '360000', '361000', '361000', '抚州市', 'F');
INSERT INTO `citys` VALUES ('1471', '360000', '361100', '361100', '上饶市', 'S');
INSERT INTO `citys` VALUES ('1485', '370000', '0', '370000', '山东省', 'S');
INSERT INTO `citys` VALUES ('1486', '370000', '370100', '370100', '济南市', 'J');
INSERT INTO `citys` VALUES ('1498', '370000', '370200', '370200', '青岛市', 'Q');
INSERT INTO `citys` VALUES ('1510', '370000', '370300', '370300', '淄博市', 'Z');
INSERT INTO `citys` VALUES ('1520', '370000', '370400', '370400', '枣庄市', 'Z');
INSERT INTO `citys` VALUES ('1528', '370000', '370500', '370500', '东营市', 'D');
INSERT INTO `citys` VALUES ('1535', '370000', '370600', '370600', '烟台市', 'Y');
INSERT INTO `citys` VALUES ('1549', '370000', '370700', '370700', '潍坊市', 'W');
INSERT INTO `citys` VALUES ('1563', '370000', '370800', '370800', '济宁市', 'J');
INSERT INTO `citys` VALUES ('1576', '370000', '370900', '370900', '泰安市', 'T');
INSERT INTO `citys` VALUES ('1584', '370000', '371000', '371000', '威海市', 'W');
INSERT INTO `citys` VALUES ('1590', '370000', '371100', '371100', '日照市', 'R');
INSERT INTO `citys` VALUES ('1596', '370000', '371200', '371200', '莱芜市', 'L');
INSERT INTO `citys` VALUES ('1600', '370000', '371300', '371300', '临沂市', 'L');
INSERT INTO `citys` VALUES ('1614', '370000', '371400', '371400', '德州市', 'D');
INSERT INTO `citys` VALUES ('1627', '370000', '371500', '371500', '聊城市', 'L');
INSERT INTO `citys` VALUES ('1637', '370000', '371600', '371600', '滨州市', 'B');
INSERT INTO `citys` VALUES ('1646', '370000', '371700', '371700', '菏泽市', 'H');
INSERT INTO `citys` VALUES ('1657', '410000', '0', '410000', '河南省', 'H');
INSERT INTO `citys` VALUES ('1658', '410000', '410100', '410100', '郑州市', 'Z');
INSERT INTO `citys` VALUES ('1672', '410000', '410200', '410200', '开封市', 'K');
INSERT INTO `citys` VALUES ('1684', '410000', '410300', '410300', '洛阳市', 'L');
INSERT INTO `citys` VALUES ('1701', '410000', '410400', '410400', '平顶山市', 'P');
INSERT INTO `citys` VALUES ('1713', '410000', '410500', '410500', '安阳市', 'A');
INSERT INTO `citys` VALUES ('1724', '410000', '410600', '410600', '鹤壁市', 'H');
INSERT INTO `citys` VALUES ('1731', '410000', '410700', '410700', '新乡市', 'X');
INSERT INTO `citys` VALUES ('1745', '410000', '410800', '410800', '焦作市', 'J');
INSERT INTO `citys` VALUES ('1757', '410000', '410900', '410900', '濮阳市', 'P');
INSERT INTO `citys` VALUES ('1765', '410000', '411000', '411000', '许昌市', 'X');
INSERT INTO `citys` VALUES ('1773', '410000', '411100', '411100', '漯河市', 'T');
INSERT INTO `citys` VALUES ('1780', '410000', '411200', '411200', '三门峡市', 'S');
INSERT INTO `citys` VALUES ('1788', '410000', '411300', '411300', '南阳市', 'N');
INSERT INTO `citys` VALUES ('1803', '410000', '411400', '411400', '商丘市', 'S');
INSERT INTO `citys` VALUES ('1814', '410000', '411500', '411500', '信阳市', 'X');
INSERT INTO `citys` VALUES ('1826', '410000', '411600', '411600', '周口市', 'Z');
INSERT INTO `citys` VALUES ('1838', '410000', '411700', '411700', '驻马店市', 'Z');
INSERT INTO `citys` VALUES ('1850', '410000', '419000', '419000', '省直辖县级行政区划', 'S');
INSERT INTO `citys` VALUES ('1852', '420000', '0', '420000', '湖北省', 'H');
INSERT INTO `citys` VALUES ('1853', '420000', '420100', '420100', '武汉市', 'W');
INSERT INTO `citys` VALUES ('1868', '420000', '420200', '420200', '黄石市', 'H');
INSERT INTO `citys` VALUES ('1876', '420000', '420300', '420300', '十堰市', 'S');
INSERT INTO `citys` VALUES ('1886', '420000', '420500', '420500', '宜昌市', 'Y');
INSERT INTO `citys` VALUES ('1901', '420000', '420600', '420600', '襄阳市', 'X');
INSERT INTO `citys` VALUES ('1912', '420000', '420700', '420700', '鄂州市', 'E');
INSERT INTO `citys` VALUES ('1917', '420000', '420800', '420800', '荆门市', 'J');
INSERT INTO `citys` VALUES ('1924', '420000', '420900', '420900', '孝感市', 'X');
INSERT INTO `citys` VALUES ('1933', '420000', '421000', '421000', '荆州市', 'J');
INSERT INTO `citys` VALUES ('1943', '420000', '421100', '421100', '黄冈市', 'H');
INSERT INTO `citys` VALUES ('1955', '420000', '421200', '421200', '咸宁市', 'X');
INSERT INTO `citys` VALUES ('1963', '420000', '421300', '421300', '随州市', 'S');
INSERT INTO `citys` VALUES ('1968', '420000', '422800', '422800', '恩施土家族苗族自治州', 'E');
INSERT INTO `citys` VALUES ('1977', '420000', '429000', '429000', '省直辖县级行政区划', 'S');
INSERT INTO `citys` VALUES ('1982', '430000', '0', '430000', '湖南省', 'H');
INSERT INTO `citys` VALUES ('1983', '430000', '430100', '430100', '长沙市', 'C');
INSERT INTO `citys` VALUES ('1994', '430000', '430200', '430200', '株洲市', 'Z');
INSERT INTO `citys` VALUES ('2005', '430000', '430300', '430300', '湘潭市', 'X');
INSERT INTO `citys` VALUES ('2012', '430000', '430400', '430400', '衡阳市', 'H');
INSERT INTO `citys` VALUES ('2026', '430000', '430500', '430500', '邵阳市', 'S');
INSERT INTO `citys` VALUES ('2040', '430000', '430600', '430600', '岳阳市', 'Y');
INSERT INTO `citys` VALUES ('2051', '430000', '430700', '430700', '常德市', 'C');
INSERT INTO `citys` VALUES ('2062', '430000', '430800', '430800', '张家界市', 'Z');
INSERT INTO `citys` VALUES ('2068', '430000', '430900', '430900', '益阳市', 'Y');
INSERT INTO `citys` VALUES ('2076', '430000', '431000', '431000', '郴州市', 'C');
INSERT INTO `citys` VALUES ('2089', '430000', '431100', '431100', '永州市', 'Y');
INSERT INTO `citys` VALUES ('2102', '430000', '431200', '431200', '怀化市', 'H');
INSERT INTO `citys` VALUES ('2116', '430000', '431300', '431300', '娄底市', 'L');
INSERT INTO `citys` VALUES ('2123', '430000', '433100', '433100', '湘西土家族苗族自治州', 'X');
INSERT INTO `citys` VALUES ('2132', '440000', '0', '440000', '广东省', 'G');
INSERT INTO `citys` VALUES ('2133', '440000', '440100', '440100', '广州市', 'G');
INSERT INTO `citys` VALUES ('2147', '440000', '440200', '440200', '韶关市', 'S');
INSERT INTO `citys` VALUES ('2159', '440000', '440300', '440300', '深圳市', 'S');
INSERT INTO `citys` VALUES ('2167', '440000', '440400', '440400', '珠海市', 'Z');
INSERT INTO `citys` VALUES ('2172', '440000', '440500', '440500', '汕头市', 'S');
INSERT INTO `citys` VALUES ('2181', '440000', '440600', '440600', '佛山市', 'F');
INSERT INTO `citys` VALUES ('2188', '440000', '440700', '440700', '江门市', 'J');
INSERT INTO `citys` VALUES ('2197', '440000', '440800', '440800', '湛江市', 'Z');
INSERT INTO `citys` VALUES ('2208', '440000', '440900', '440900', '茂名市', 'M');
INSERT INTO `citys` VALUES ('2215', '440000', '441200', '441200', '肇庆市', 'Z');
INSERT INTO `citys` VALUES ('2225', '440000', '441300', '441300', '惠州市', 'H');
INSERT INTO `citys` VALUES ('2232', '440000', '441400', '441400', '梅州市', 'M');
INSERT INTO `citys` VALUES ('2242', '440000', '441500', '441500', '汕尾市', 'S');
INSERT INTO `citys` VALUES ('2248', '440000', '441600', '441600', '河源市', 'H');
INSERT INTO `citys` VALUES ('2256', '440000', '441700', '441700', '阳江市', 'Y');
INSERT INTO `citys` VALUES ('2262', '440000', '441800', '441800', '清远市', 'Q');
INSERT INTO `citys` VALUES ('2272', '440000', '441900', '441900', '东莞市', 'D');
INSERT INTO `citys` VALUES ('2273', '440000', '442000', '442000', '中山市', 'Z');
INSERT INTO `citys` VALUES ('2274', '440000', '445100', '445100', '潮州市', 'C');
INSERT INTO `citys` VALUES ('2279', '440000', '445200', '445200', '揭阳市', 'J');
INSERT INTO `citys` VALUES ('2286', '440000', '445300', '445300', '云浮市', 'Y');
INSERT INTO `citys` VALUES ('2293', '450000', '0', '450000', '广西壮族自治区', 'G');
INSERT INTO `citys` VALUES ('2294', '450000', '450100', '450100', '南宁市', 'N');
INSERT INTO `citys` VALUES ('2308', '450000', '450200', '450200', '柳州市', 'L');
INSERT INTO `citys` VALUES ('2320', '450000', '450300', '450300', '桂林市', 'G');
INSERT INTO `citys` VALUES ('2339', '450000', '450400', '450400', '梧州市', 'W');
INSERT INTO `citys` VALUES ('2348', '450000', '450500', '450500', '北海市', 'B');
INSERT INTO `citys` VALUES ('2354', '450000', '450600', '450600', '防城港市', 'F');
INSERT INTO `citys` VALUES ('2360', '450000', '450700', '450700', '钦州市', 'Q');
INSERT INTO `citys` VALUES ('2366', '450000', '450800', '450800', '贵港市', 'G');
INSERT INTO `citys` VALUES ('2373', '450000', '450900', '450900', '玉林市', 'Y');
INSERT INTO `citys` VALUES ('2382', '450000', '451000', '451000', '百色市', 'B');
INSERT INTO `citys` VALUES ('2396', '450000', '451100', '451100', '贺州市', 'H');
INSERT INTO `citys` VALUES ('2402', '450000', '451200', '451200', '河池市', 'H');
INSERT INTO `citys` VALUES ('2415', '450000', '451300', '451300', '来宾市', 'L');
INSERT INTO `citys` VALUES ('2423', '450000', '451400', '451400', '崇左市', 'C');
INSERT INTO `citys` VALUES ('2432', '460000', '0', '460000', '海南省', 'H');
INSERT INTO `citys` VALUES ('2433', '460000', '460100', '460100', '海口市', 'H');
INSERT INTO `citys` VALUES ('2439', '460000', '460200', '460200', '三亚市', 'S');
INSERT INTO `citys` VALUES ('2445', '460000', '460300', '460300', '三沙市', 'S');
INSERT INTO `citys` VALUES ('2446', '460000', '469000', '469000', '省直辖县级行政区划', 'S');
INSERT INTO `citys` VALUES ('2463', '500000', '0', '500000', '重庆市', 'C');
INSERT INTO `citys` VALUES ('2504', '510000', '0', '510000', '四川省', 'S');
INSERT INTO `citys` VALUES ('2505', '510000', '510100', '510100', '成都市', 'C');
INSERT INTO `citys` VALUES ('2526', '510000', '510300', '510300', '自贡市', 'Z');
INSERT INTO `citys` VALUES ('2534', '510000', '510400', '510400', '攀枝花市', 'P');
INSERT INTO `citys` VALUES ('2541', '510000', '510500', '510500', '泸州市', 'L');
INSERT INTO `citys` VALUES ('2550', '510000', '510600', '510600', '德阳市', 'D');
INSERT INTO `citys` VALUES ('2558', '510000', '510700', '510700', '绵阳市', 'M');
INSERT INTO `citys` VALUES ('2569', '510000', '510800', '510800', '广元市', 'G');
INSERT INTO `citys` VALUES ('2578', '510000', '510900', '510900', '遂宁市', 'S');
INSERT INTO `citys` VALUES ('2585', '510000', '511000', '511000', '内江市', 'N');
INSERT INTO `citys` VALUES ('2592', '510000', '511100', '511100', '乐山市', 'L');
INSERT INTO `citys` VALUES ('2605', '510000', '511300', '511300', '南充市', 'N');
INSERT INTO `citys` VALUES ('2616', '510000', '511400', '511400', '眉山市', 'M');
INSERT INTO `citys` VALUES ('2624', '510000', '511500', '511500', '宜宾市', 'Y');
INSERT INTO `citys` VALUES ('2636', '510000', '511600', '511600', '广安市', 'G');
INSERT INTO `citys` VALUES ('2644', '510000', '511700', '511700', '达州市', 'D');
INSERT INTO `citys` VALUES ('2653', '510000', '511800', '511800', '雅安市', 'Y');
INSERT INTO `citys` VALUES ('2663', '510000', '511900', '511900', '巴中市', 'B');
INSERT INTO `citys` VALUES ('2670', '510000', '512000', '512000', '资阳市', 'Z');
INSERT INTO `citys` VALUES ('2676', '510000', '513200', '513200', '阿坝藏族羌族自治州', 'A');
INSERT INTO `citys` VALUES ('2690', '510000', '513300', '513300', '甘孜藏族自治州', 'G');
INSERT INTO `citys` VALUES ('2709', '510000', '513400', '513400', '凉山彝族自治州', 'L');
INSERT INTO `citys` VALUES ('2727', '520000', '0', '520000', '贵州省', 'G');
INSERT INTO `citys` VALUES ('2728', '520000', '520100', '520100', '贵阳市', 'G');
INSERT INTO `citys` VALUES ('2740', '520000', '520200', '520200', '六盘水市', 'L');
INSERT INTO `citys` VALUES ('2745', '520000', '520300', '520300', '遵义市', 'Z');
INSERT INTO `citys` VALUES ('2761', '520000', '520400', '520400', '安顺市', 'A');
INSERT INTO `citys` VALUES ('2769', '520000', '520500', '520500', '毕节市', 'B');
INSERT INTO `citys` VALUES ('2779', '520000', '520600', '520600', '铜仁市', 'T');
INSERT INTO `citys` VALUES ('2791', '520000', '522300', '522300', '黔西南布依族苗族自治州', 'Q');
INSERT INTO `citys` VALUES ('2800', '520000', '522600', '522600', '黔东南苗族侗族自治州', 'Q');
INSERT INTO `citys` VALUES ('2817', '520000', '522700', '522700', '黔南布依族苗族自治州', 'Q');
INSERT INTO `citys` VALUES ('2830', '530000', '0', '530000', '云南省', 'Y');
INSERT INTO `citys` VALUES ('2831', '530000', '530100', '530100', '昆明市', 'K');
INSERT INTO `citys` VALUES ('2847', '530000', '530300', '530300', '曲靖市', 'Q');
INSERT INTO `citys` VALUES ('2858', '530000', '530400', '530400', '玉溪市', 'Y');
INSERT INTO `citys` VALUES ('2869', '530000', '530500', '530500', '保山市', 'B');
INSERT INTO `citys` VALUES ('2876', '530000', '530600', '530600', '昭通市', 'Z');
INSERT INTO `citys` VALUES ('2889', '530000', '530700', '530700', '丽江市', 'L');
INSERT INTO `citys` VALUES ('2896', '530000', '530800', '530800', '普洱市', 'P');
INSERT INTO `citys` VALUES ('2908', '530000', '530900', '530900', '临沧市', 'L');
INSERT INTO `citys` VALUES ('2918', '530000', '532300', '532300', '楚雄彝族自治州', 'C');
INSERT INTO `citys` VALUES ('2929', '530000', '532500', '532500', '红河哈尼族彝族自治州', 'H');
INSERT INTO `citys` VALUES ('2943', '530000', '532600', '532600', '文山壮族苗族自治州', 'W');
INSERT INTO `citys` VALUES ('2952', '530000', '532800', '532800', '西双版纳傣族自治州', 'X');
INSERT INTO `citys` VALUES ('2956', '530000', '532900', '532900', '大理白族自治州', 'D');
INSERT INTO `citys` VALUES ('2969', '530000', '533100', '533100', '德宏傣族景颇族自治州', 'D');
INSERT INTO `citys` VALUES ('2975', '530000', '533300', '533300', '怒江傈僳族自治州', 'N');
INSERT INTO `citys` VALUES ('2980', '530000', '533400', '533400', '迪庆藏族自治州', 'D');
INSERT INTO `citys` VALUES ('2984', '540000', '0', '540000', '西藏自治区', 'X');
INSERT INTO `citys` VALUES ('2985', '540000', '540100', '540100', '拉萨市', 'L');
INSERT INTO `citys` VALUES ('2995', '540000', '540200', '540200', '日喀则市', 'R');
INSERT INTO `citys` VALUES ('3014', '540000', '542100', '542100', '昌都地区', 'C');
INSERT INTO `citys` VALUES ('3026', '540000', '542200', '542200', '山南地区', 'S');
INSERT INTO `citys` VALUES ('3039', '540000', '542400', '542400', '那曲地区', 'N');
INSERT INTO `citys` VALUES ('3051', '540000', '542500', '542500', '阿里地区', 'A');
INSERT INTO `citys` VALUES ('3059', '540000', '542600', '542600', '林芝地区', 'L');
INSERT INTO `citys` VALUES ('3067', '610000', '0', '610000', '陕西省', 'S');
INSERT INTO `citys` VALUES ('3068', '610000', '610100', '610100', '西安市', 'X');
INSERT INTO `citys` VALUES ('3083', '610000', '610200', '610200', '铜川市', 'T');
INSERT INTO `citys` VALUES ('3089', '610000', '610300', '610300', '宝鸡市', 'B');
INSERT INTO `citys` VALUES ('3103', '610000', '610400', '610400', '咸阳市', 'X');
INSERT INTO `citys` VALUES ('3119', '610000', '610500', '610500', '渭南市', 'W');
INSERT INTO `citys` VALUES ('3132', '610000', '610600', '610600', '延安市', 'Y');
INSERT INTO `citys` VALUES ('3147', '610000', '610700', '610700', '汉中市', 'H');
INSERT INTO `citys` VALUES ('3160', '610000', '610800', '610800', '榆林市', 'Y');
INSERT INTO `citys` VALUES ('3174', '610000', '610900', '610900', '安康市', 'A');
INSERT INTO `citys` VALUES ('3186', '610000', '611000', '611000', '商洛市', 'S');
INSERT INTO `citys` VALUES ('3195', '620000', '0', '620000', '甘肃省', 'G');
INSERT INTO `citys` VALUES ('3196', '620000', '620100', '620100', '兰州市', 'L');
INSERT INTO `citys` VALUES ('3206', '620000', '620200', '620200', '嘉峪关市', 'J');
INSERT INTO `citys` VALUES ('3208', '620000', '620300', '620300', '金昌市', 'J');
INSERT INTO `citys` VALUES ('3212', '620000', '620400', '620400', '白银市', 'B');
INSERT INTO `citys` VALUES ('3219', '620000', '620500', '620500', '天水市', 'T');
INSERT INTO `citys` VALUES ('3228', '620000', '620600', '620600', '武威市', 'W');
INSERT INTO `citys` VALUES ('3234', '620000', '620700', '620700', '张掖市', 'Z');
INSERT INTO `citys` VALUES ('3242', '620000', '620800', '620800', '平凉市', 'P');
INSERT INTO `citys` VALUES ('3251', '620000', '620900', '620900', '酒泉市', 'J');
INSERT INTO `citys` VALUES ('3260', '620000', '621000', '621000', '庆阳市', 'Q');
INSERT INTO `citys` VALUES ('3270', '620000', '621100', '621100', '定西市', 'D');
INSERT INTO `citys` VALUES ('3279', '620000', '621200', '621200', '陇南市', 'L');
INSERT INTO `citys` VALUES ('3290', '620000', '622900', '622900', '临夏回族自治州', 'L');
INSERT INTO `citys` VALUES ('3299', '620000', '623000', '623000', '甘南藏族自治州', 'G');
INSERT INTO `citys` VALUES ('3308', '630000', '0', '630000', '青海省', 'Q');
INSERT INTO `citys` VALUES ('3309', '630000', '630100', '630100', '西宁市', 'X');
INSERT INTO `citys` VALUES ('3318', '630000', '630200', '630200', '海东市', 'H');
INSERT INTO `citys` VALUES ('3325', '630000', '632200', '632200', '海北藏族自治州', 'H');
INSERT INTO `citys` VALUES ('3330', '630000', '632300', '632300', '黄南藏族自治州', 'H');
INSERT INTO `citys` VALUES ('3335', '630000', '632500', '632500', '海南藏族自治州', 'H');
INSERT INTO `citys` VALUES ('3341', '630000', '632600', '632600', '果洛藏族自治州', 'G');
INSERT INTO `citys` VALUES ('3348', '630000', '632700', '632700', '玉树藏族自治州', 'Y');
INSERT INTO `citys` VALUES ('3355', '630000', '632800', '632800', '海西蒙古族藏族自治州', 'H');
INSERT INTO `citys` VALUES ('3361', '640000', '0', '640000', '宁夏回族自治区', 'N');
INSERT INTO `citys` VALUES ('3362', '640000', '640100', '640100', '银川市', 'Y');
INSERT INTO `citys` VALUES ('3370', '640000', '640200', '640200', '石嘴山市', 'S');
INSERT INTO `citys` VALUES ('3375', '640000', '640300', '640300', '吴忠市', 'W');
INSERT INTO `citys` VALUES ('3382', '640000', '640400', '640400', '固原市', 'G');
INSERT INTO `citys` VALUES ('3389', '640000', '640500', '640500', '中卫市', 'Z');
INSERT INTO `citys` VALUES ('3394', '650000', '0', '650000', '新疆维吾尔自治区', 'X');
INSERT INTO `citys` VALUES ('3395', '650000', '650100', '650100', '乌鲁木齐市', 'W');
INSERT INTO `citys` VALUES ('3405', '650000', '650200', '650200', '克拉玛依市', 'K');
INSERT INTO `citys` VALUES ('3411', '650000', '652100', '652100', '吐鲁番地区', 'T');
INSERT INTO `citys` VALUES ('3415', '650000', '652200', '652200', '哈密地区', 'H');
INSERT INTO `citys` VALUES ('3419', '650000', '652300', '652300', '昌吉回族自治州', 'C');
INSERT INTO `citys` VALUES ('3427', '650000', '652700', '652700', '博尔塔拉蒙古自治州', 'B');
INSERT INTO `citys` VALUES ('3432', '650000', '652800', '652800', '巴音郭楞蒙古自治州', 'B');
INSERT INTO `citys` VALUES ('3442', '650000', '652900', '652900', '阿克苏地区', 'A');
INSERT INTO `citys` VALUES ('3452', '650000', '653000', '653000', '克孜勒苏柯尔克孜自治州', 'K');
INSERT INTO `citys` VALUES ('3457', '650000', '653100', '653100', '喀什地区', 'K');
INSERT INTO `citys` VALUES ('3470', '650000', '653200', '653200', '和田地区', 'H');
INSERT INTO `citys` VALUES ('3479', '650000', '654000', '654000', '伊犁哈萨克自治州', 'Y');
INSERT INTO `citys` VALUES ('3490', '650000', '654200', '654200', '塔城地区', 'T');
INSERT INTO `citys` VALUES ('3498', '650000', '654300', '654300', '阿勒泰地区', 'A');
INSERT INTO `citys` VALUES ('3506', '650000', '659000', '659000', '自治区直辖县级行政区划', 'Z');
INSERT INTO `citys` VALUES ('3511', '710000', '0', '710000', '台湾省', 'T');
INSERT INTO `citys` VALUES ('3512', '810000', '0', '810000', '香港特别行政区', 'X');
INSERT INTO `citys` VALUES ('3513', '820000', '0', '820000', '澳门特别行政区', 'A');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `pwd` varchar(32) NOT NULL COMMENT '用户密码',
  `phone` varchar(11) NOT NULL COMMENT '手机号',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，1禁用',
  `add_time` int(10) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'abc@sina.com', '1a6a8b9cc78fae185cfc1843c7ca676b', '', '1', '1532936847');
INSERT INTO `member` VALUES ('2', 'abcd@sina.com', '39760597ccbb0214f09b4d58419076b4', '', '0', '1532936918');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL COMMENT '订单号',
  `uid` int(10) NOT NULL COMMENT '用户uid',
  `money` decimal(10,2) NOT NULL COMMENT '订单金额',
  `pay_money` decimal(10,2) NOT NULL COMMENT '实际支付金额',
  `ship_no` varchar(30) NOT NULL COMMENT '快递单号',
  `ship_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '快递状态：0未发货，1已发货，2已完成',
  `status` tinyint(1) NOT NULL COMMENT '订单状态：-1未付款已关闭，0未付款，1已付款，2已完成',
  `add_time` int(10) NOT NULL COMMENT '下单时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('7', '15332682350002202668', '2', '11200.00', '11200.00', '', '0', '0', '1533268235');
INSERT INTO `orders` VALUES ('8', '15332682350003202662', '2', '5600.00', '5600.00', '2689656', '0', '-1', '1533279235');

-- ----------------------------
-- Table structure for order_product
-- ----------------------------
DROP TABLE IF EXISTS `order_product`;
CREATE TABLE `order_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL COMMENT '订单号',
  `pro_id` int(10) NOT NULL COMMENT '商品id',
  `price` decimal(10,2) NOT NULL COMMENT '购买时价格',
  `count` int(10) NOT NULL COMMENT '购买数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_product
-- ----------------------------
INSERT INTO `order_product` VALUES ('1', '15331983920002143856', '2', '5600.00', '1');
INSERT INTO `order_product` VALUES ('2', '15331984410002174914', '2', '5600.00', '1');
INSERT INTO `order_product` VALUES ('3', '15331985270002404818', '2', '5600.00', '1');
INSERT INTO `order_product` VALUES ('4', '15332010500002106854', '2', '5600.00', '1');
INSERT INTO `order_product` VALUES ('5', '15332664240002232985', '2', '5600.00', '1');
INSERT INTO `order_product` VALUES ('6', '15332664240002232985', '2', '5600.00', '1');
INSERT INTO `order_product` VALUES ('7', '15332673030002102707', '2', '5600.00', '1');
INSERT INTO `order_product` VALUES ('8', '15332673030002102707', '2', '5600.00', '1');
INSERT INTO `order_product` VALUES ('9', '15332682350002202668', '2', '5600.00', '1');
INSERT INTO `order_product` VALUES ('10', '15332682350002202668', '2', '5600.00', '1');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) NOT NULL COMMENT '商品分类id',
  `title` varchar(255) NOT NULL COMMENT '商品名称',
  `pro_no` varchar(20) NOT NULL COMMENT '商品编码',
  `keywords` varchar(255) NOT NULL COMMENT '商品关键字',
  `desc` varchar(255) NOT NULL COMMENT '商品描述',
  `img` varchar(255) NOT NULL COMMENT '商品主图',
  `price` decimal(10,2) NOT NULL COMMENT '当前价格',
  `orignal_price` decimal(10,2) NOT NULL COMMENT '原价',
  `cost` decimal(10,2) NOT NULL COMMENT '成本',
  `stock` int(10) NOT NULL DEFAULT '0' COMMENT '库存',
  `pv` int(10) NOT NULL COMMENT '点击量',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：-1已删除，0正常，1已下架',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('2', '1', '小米88', '20200153291891869776', '小米8', '小米8', '/uploads/20180730\\0235561e0e6f40b38c8db314ae043474.jpg', '5600.00', '6000.00', '5000.00', '10', '0', '0', '1532919087');
INSERT INTO `product` VALUES ('3', '1', '小米MIX 2 全陶瓷尊享版', '13448153310405179060', '全面屏2.0，Unibody 全陶瓷', '全面屏2.0，Unibody 全陶瓷', '/uploads/20180801\\656336d6a07c07562aab4e1d9ddcbdc1.jpg', '3699.00', '4699.00', '3000.00', '0', '0', '0', '1532920642');
INSERT INTO `product` VALUES ('4', '1', '小米5X 4GB+64GB', '47647153310374786293', '光学变焦双摄，拍人更美', '光学变焦双摄，拍人更美', '/uploads/20180801\\a4ce8efc6cea2da30e27af97c757d3e6.jpg', '1499.00', '1599.00', '1200.00', '0', '0', '0', '1533104003');
INSERT INTO `product` VALUES ('5', '1', '红米5A 2GB内存', '10217153310414850900', '8天超长待机，137g轻巧机身', '8天超长待机，137g轻巧机身', '/uploads/20180801\\64a2d93a434a3ca78ca6b0c4d595af0b.jpg', '599.00', '0.00', '399.00', '0', '0', '0', '1533104189');
INSERT INTO `product` VALUES ('6', '1', '红米5 Plus 3GB+32GB', '18020153310420573728', '全面屏手机，4000mAh大电量', '全面屏手机，4000mAh大电量', '/uploads/20180801\\fb686ff2a9ece90212c5c61d4eeaefba.jpg', '999.00', '0.00', '800.00', '0', '0', '0', '1533104236');
INSERT INTO `product` VALUES ('7', '1', '红米S2 3GB+32GB', '26882153310424763697', '前置1600万超大像素智能美拍', '前置1600万超大像素智能美拍', '/uploads/20180801\\3b1f0a49d48132a1fda1856b8f51c200.jpg', '999.00', '0.00', '0.00', '0', '0', '0', '1533104278');
INSERT INTO `product` VALUES ('8', '1', '小米Note 3 4GB+64GB', '37090153310428853558', '1600万美颜自拍，2倍变焦双摄', '1600万美颜自拍，2倍变焦双摄', '/uploads/20180801\\0bedd3352855e6de04b0dca1986218f5.jpg', '1799.00', '1999.00', '0.00', '0', '0', '0', '1533104325');
INSERT INTO `product` VALUES ('9', '1', '红米5 2GB+16GB', '45495153310433380323', '5.7英寸全面屏，前置柔光自拍', '5.7英寸全面屏，前置柔光自拍', '/uploads/20180801\\1c900e53af40afae78a643969c46ec0b.jpg', '799.00', '0.00', '0.00', '0', '0', '0', '1533104364');
INSERT INTO `product` VALUES ('10', '1', '小米Max 2 4GB+64GB', '15000153310436769117', '6.44\'\'大屏，5300mAh 充电宝级的大电量', '6.44\'\'大屏，5300mAh 充电宝级的大电量', '/uploads/20180801\\c4a34f4e7bacbd0b99ada31b6c75dd15.jpg', '1499.00', '1699.00', '0.00', '0', '0', '0', '1533104428');
INSERT INTO `product` VALUES ('11', '2', '小米电视4A 43英寸青春版', '15886153310444159393', '全高清屏 / 人工智能语音', '全高清屏 / 人工智能语音', '/uploads/20180801\\ae47731d127f974b5133a74844a7d94c.jpg', '1599.00', '1699.00', '0.00', '0', '0', '0', '1533104498');
INSERT INTO `product` VALUES ('12', '2', '小米电视4A 43英寸青春版', '42688153310452169946', '全高清屏 / 人工智能语音', '全高清屏 / 人工智能语音', '/uploads/20180801\\a3960e326d49691ee5ac51553d028d4f.jpg', '1599.00', '1699.00', '0.00', '0', '0', '0', '1533104544');
INSERT INTO `product` VALUES ('13', '2', '小米笔记本', '32883153310457890737', '全高清屏 / 人工智能语音', '全高清屏 / 人工智能语音', '/uploads/20180801\\58bee82c5c46c95e61acd7ce8fb5e438.jpg', '3599.00', '5699.00', '0.00', '0', '0', '0', '1533104604');
INSERT INTO `product` VALUES ('14', '2', '小米笔记本pro', '39955153310467080696', '全高清屏 / 人工智能语音', '全高清屏 / 人工智能语音', '/uploads/20180801\\810e3d9c355ea64b2e0de8ee709e4fe0.jpg', '7999.00', '8999.00', '0.00', '0', '0', '0', '1533104693');
INSERT INTO `product` VALUES ('15', '2', '小米空气净化器', '34844153310475196116', '全高清屏 / 人工智能语音', '全高清屏 / 人工智能语音', '/uploads/20180801\\c1a33abde8c34f82dc0771019ae02875.jpg', '2599.00', '2699.00', '0.00', '0', '0', '0', '1533104785');
INSERT INTO `product` VALUES ('16', '2', '小米电水壶', '30538153310481050253', '全高清屏 / 人工智能语音', '全高清屏 / 人工智能语音', '/uploads/20180801\\ec105347934417d8fe1acd6515ad61e0.jpg', '399.00', '499.00', '0.00', '0', '0', '0', '1533104856');
INSERT INTO `product` VALUES ('17', '2', '小米吸顶灯', '49476153310487970864', '全高清屏 / 人工智能语音', '全高清屏 / 人工智能语音', '/uploads/20180801\\9d85508487ae83b65a2b4c3f943c74c4.jpg', '599.00', '0.00', '0.00', '0', '0', '0', '1533104929');

-- ----------------------------
-- Table structure for product_cates
-- ----------------------------
DROP TABLE IF EXISTS `product_cates`;
CREATE TABLE `product_cates` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL COMMENT '上级分类',
  `title` varchar(20) NOT NULL COMMENT '分类名称',
  `ord` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，1禁用',
  `add_time` int(10) NOT NULL COMMENT '分类添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_cates
-- ----------------------------
INSERT INTO `product_cates` VALUES ('1', '0', '手机', '0', '0', '0');
INSERT INTO `product_cates` VALUES ('2', '0', '家电', '0', '0', '0');
INSERT INTO `product_cates` VALUES ('3', '0', '智能', '0', '0', '0');

-- ----------------------------
-- Table structure for product_detail
-- ----------------------------
DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE `product_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL COMMENT '商品id',
  `detail` text NOT NULL COMMENT '商品详情（图片数据）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_detail
-- ----------------------------
INSERT INTO `product_detail` VALUES ('1', '2', '<p><img src=\"/uploads/20180730\\ca0ea9e6d12e6aeffeee6fc0c3bed832.jpg\" style=\"max-width:100%;\"><br></p><p><br></p><p><img src=\"/uploads/20180730\\7c0daf1038fc858163cdf2bc227c109e.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>');
INSERT INTO `product_detail` VALUES ('2', '3', '<p>asdffasdfasfsadfsadffdf</p><p><br></p>');
INSERT INTO `product_detail` VALUES ('3', '4', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('4', '5', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('5', '6', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('6', '7', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('7', '8', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('8', '9', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('9', '10', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('10', '11', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('11', '12', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('12', '13', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('13', '14', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('14', '15', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('15', '16', '<p><br></p>');
INSERT INTO `product_detail` VALUES ('16', '17', '<p><br></p>');

-- ----------------------------
-- Table structure for product_img
-- ----------------------------
DROP TABLE IF EXISTS `product_img`;
CREATE TABLE `product_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL COMMENT '商品id',
  `url` varchar(255) NOT NULL COMMENT '图片的url',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_img
-- ----------------------------
INSERT INTO `product_img` VALUES ('110', '2', '/uploads/20180730\\802d3176fae18832870d5d9af4802a98.jpg');
INSERT INTO `product_img` VALUES ('109', '2', '/uploads/20180730\\4adab59dd24dda4df1e564d887042a37.jpg');
INSERT INTO `product_img` VALUES ('108', '2', '/uploads/20180730\\8832e09f69bdaf1aee58e1245e258f64.jpg');
INSERT INTO `product_img` VALUES ('107', '2', '/uploads/20180730\\0235561e0e6f40b38c8db314ae043474.jpg');
INSERT INTO `product_img` VALUES ('99', '3', '/uploads/20180730\\947bedb8148c2fc4d17ac6e7145351f2.jpg');
INSERT INTO `product_img` VALUES ('98', '3', '/uploads/20180730\\7e4781a4d16fb1e53003b38759debc37.jpg');
INSERT INTO `product_img` VALUES ('106', '4', '/uploads/20180801\\1bc5de703720bfaea197b3ccb88e3d2c.jpg');
INSERT INTO `product_img` VALUES ('105', '4', '/uploads/20180801\\e1f598c91f21901c50b470f86528b867.jpg');
INSERT INTO `product_img` VALUES ('104', '4', '/uploads/20180801\\a4ce8efc6cea2da30e27af97c757d3e6.jpg');
INSERT INTO `product_img` VALUES ('97', '3', '/uploads/20180801\\7e2838002d834da0b21b84078e681c03.jpg');
INSERT INTO `product_img` VALUES ('96', '3', '/uploads/20180801\\656336d6a07c07562aab4e1d9ddcbdc1.jpg');
INSERT INTO `product_img` VALUES ('95', '5', '/uploads/20180801\\3c910e86d20a3ea2a327c2464c96b4ff.jpg');
INSERT INTO `product_img` VALUES ('94', '5', '/uploads/20180801\\64a2d93a434a3ca78ca6b0c4d595af0b.jpg');
INSERT INTO `product_img` VALUES ('93', '6', '/uploads/20180801\\437a817dad87a4c114c0acbddb1e0a76.jpg');
INSERT INTO `product_img` VALUES ('92', '6', '/uploads/20180801\\fb686ff2a9ece90212c5c61d4eeaefba.jpg');
INSERT INTO `product_img` VALUES ('91', '7', '/uploads/20180801\\bee3a5c74efadd055555f83c61a1f2ed.jpg');
INSERT INTO `product_img` VALUES ('90', '7', '/uploads/20180801\\3b1f0a49d48132a1fda1856b8f51c200.jpg');
INSERT INTO `product_img` VALUES ('89', '8', '/uploads/20180801\\11f414cdaf3d534573162895a27c90c6.jpg');
INSERT INTO `product_img` VALUES ('88', '8', '/uploads/20180801\\c53e6e115180b9cce2d44d50e2c6456c.jpg');
INSERT INTO `product_img` VALUES ('87', '8', '/uploads/20180801\\0bedd3352855e6de04b0dca1986218f5.jpg');
INSERT INTO `product_img` VALUES ('86', '9', '/uploads/20180801\\c54084aaf15177e7298e2e6b1e1e4fe6.jpg');
INSERT INTO `product_img` VALUES ('85', '9', '/uploads/20180801\\1c900e53af40afae78a643969c46ec0b.jpg');
INSERT INTO `product_img` VALUES ('84', '10', '/uploads/20180801\\b7f79dd454b72acb980acecd38b7a9b7.jpg');
INSERT INTO `product_img` VALUES ('83', '10', '/uploads/20180801\\8c5d8abd7cae76be3186224c2a6cdd77.jpg');
INSERT INTO `product_img` VALUES ('82', '10', '/uploads/20180801\\c4a34f4e7bacbd0b99ada31b6c75dd15.jpg');
INSERT INTO `product_img` VALUES ('81', '11', '/uploads/20180801\\0bfe2b10f5b84a3743817d9259f60b5b.jpg');
INSERT INTO `product_img` VALUES ('80', '11', '/uploads/20180801\\ae47731d127f974b5133a74844a7d94c.jpg');
INSERT INTO `product_img` VALUES ('79', '12', '/uploads/20180801\\53843c3f02be4e7582bb4c207ac96a4d.jpg');
INSERT INTO `product_img` VALUES ('78', '12', '/uploads/20180801\\a3960e326d49691ee5ac51553d028d4f.jpg');
INSERT INTO `product_img` VALUES ('77', '13', '/uploads/20180801\\17d87c6802b19da10cc76339692be385.jpg');
INSERT INTO `product_img` VALUES ('76', '13', '/uploads/20180801\\58bee82c5c46c95e61acd7ce8fb5e438.jpg');
INSERT INTO `product_img` VALUES ('75', '14', '/uploads/20180801\\47ee59129bb04b108bc5e242824bb21b.jpg');
INSERT INTO `product_img` VALUES ('74', '14', '/uploads/20180801\\810e3d9c355ea64b2e0de8ee709e4fe0.jpg');
INSERT INTO `product_img` VALUES ('73', '15', '/uploads/20180801\\87d2290ffc581d1ef8b8738f9b819301.png');
INSERT INTO `product_img` VALUES ('72', '15', '/uploads/20180801\\c1a33abde8c34f82dc0771019ae02875.jpg');
INSERT INTO `product_img` VALUES ('71', '16', '/uploads/20180801\\240ef4551d2983d8f19f8e29248bbffb.jpg');
INSERT INTO `product_img` VALUES ('70', '16', '/uploads/20180801\\dc6bb21a1c9666fa1aa2624d0c44d82d.jpg');
INSERT INTO `product_img` VALUES ('69', '16', '/uploads/20180801\\ec105347934417d8fe1acd6515ad61e0.jpg');
INSERT INTO `product_img` VALUES ('68', '17', '/uploads/20180801\\f9ef0c66d79e6834e8213cb59ec85d41.jpg');
INSERT INTO `product_img` VALUES ('67', '17', '/uploads/20180801\\dd379650edd09631b1b1952c8fcef178.jpg');
INSERT INTO `product_img` VALUES ('66', '17', '/uploads/20180801\\9d85508487ae83b65a2b4c3f943c74c4.jpg');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `names` varchar(255) NOT NULL COMMENT '设置的名称',
  `values` text COMMENT '设置的值',
  PRIMARY KEY (`names`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('site_setting', '{\"title\":\"PHP\\u4e2d\\u6587\\u7f51\",\"key\":\"php\",\"desc\":\"php\\u89c6\\u9891\\u8bfe\\u7a0b\"}');

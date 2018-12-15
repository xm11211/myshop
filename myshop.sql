/*
 Navicat Premium Data Transfer

 Source Server         : xm11211
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : localhost:3306
 Source Schema         : myshop

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 15/12/2018 06:24:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for php_address
-- ----------------------------
DROP TABLE IF EXISTS `php_address`;
CREATE TABLE `php_address`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `userId` mediumint(9) NOT NULL COMMENT '用户id',
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收货人姓名',
  `province` char(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '省份',
  `city` char(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '市',
  `county` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '区',
  `address` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '具体地址',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `tel` char(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '固定电话',
  `zipcode` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮政编码',
  `signBuilding` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '地址别名',
  `bestTime` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '最佳发货时间',
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮箱',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `userId`(`userId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户收货地址表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_address
-- ----------------------------
INSERT INTO `php_address` VALUES (2, 6, 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '88361834', '', '', '', 'xiaoming6351@gmail.com');
INSERT INTO `php_address` VALUES (3, 8, 'ming xiao', '山西省', '朔州市', '平鲁区', '北京', '15161699059', '88361834', '', '', '', 'xiaoming6351@gmail.com');

-- ----------------------------
-- Table structure for php_admin
-- ----------------------------
DROP TABLE IF EXISTS `php_admin`;
CREATE TABLE `php_admin`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `adminName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '管理员名字',
  `password` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '管理员密码',
  `pic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '管理员头像',
  `randString` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码盐值',
  `isRoot` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否超管0不是1是',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `adminName`(`adminName`) USING BTREE,
  INDEX `pic`(`pic`) USING BTREE,
  INDEX `randString`(`randString`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '管理员' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_admin
-- ----------------------------
INSERT INTO `php_admin` VALUES (5, 'root', 'e4f9390658e86c54b9bdb22c548ed0de2eac20a2', 'adminPic\\20180109\\5113e9a6c1e38e94c0cdab3bade37618.jpg', 'DWuRYimYjVLMOFq', 1);
INSERT INTO `php_admin` VALUES (12, 'xiaopang', '05fa91940f4a7e13aa0b859a1e6506cf1c2942de', 'adminPic\\20180113\\bd1bb74f29ca6b349c706a29081179ce.jpg', 'ZDetMlcYxLYgOGy', 0);

-- ----------------------------
-- Table structure for php_article
-- ----------------------------
DROP TABLE IF EXISTS `php_article`;
CREATE TABLE `php_article`  (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章标题',
  `keywords` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '关键词',
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '描述',
  `author` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '作者',
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'email',
  `url` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '外链地址',
  `thumb` varchar(160) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
  `showTop` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否置顶',
  `showStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '显示状态1：显示0：不显示',
  `time` int(10) NOT NULL COMMENT '发布时间',
  `cateId` mediumint(9) NOT NULL COMMENT '所属栏目',
  `upTime` int(10) NOT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_article
-- ----------------------------
INSERT INTO `php_article` VALUES (4, '售后流程', '售后流程', '', '', '', '', 'artPic\\20180215\\7238b5a5d8b944e70f41c2071abab4f8.jpg', '<p><img src=\"/ueimage/20180216/1518744995447530.jpg\" title=\"1518744995447530.jpg\" alt=\"571.jpg\"/><img src=\"/ueimage/20180216/1518744997893942.jpg\" title=\"1518744997893942.jpg\" alt=\"693.jpg\"/></p>', 1, 1, 1518675926, 11, 1519944961);
INSERT INTO `php_article` VALUES (3, '购物流程', '购物流程', '', '', '', '', 'artPic\\20180215\\20510cd3b5d12f002c5b1e3023f4cf37.jpg', '', 1, 1, 1518675874, 11, 1519853186);
INSERT INTO `php_article` VALUES (18, '配送支付智能查询', '配送支付智能查询', '', '', '', '', '', '', 1, 1, 1519853257, 12, 1519853257);
INSERT INTO `php_article` VALUES (9, '订购方式', '订购方式', '', '', '', '', 'artPic\\20180216\\cec26b8896fae08c2cef98f5e00c7155.jpg', '', 1, 1, 1518745994, 11, 1519853205);
INSERT INTO `php_article` VALUES (19, '支付方式说明', '支付方式说明', '', '', '', '', '', '', 1, 1, 1519853314, 12, 1519853314);
INSERT INTO `php_article` VALUES (17, '货到付款区域', '货到付款区域', '', '', '', '', '', '', 1, 1, 1519003708, 12, 1519853229);
INSERT INTO `php_article` VALUES (20, '资金管理', '资金管理', '', '', '', '', '', '', 1, 1, 1519853334, 21, 1519853334);
INSERT INTO `php_article` VALUES (21, '我的收藏', '我的收藏', '', '', '', '', '', '', 1, 1, 1519853350, 21, 1519853350);
INSERT INTO `php_article` VALUES (22, '我的订单', '我的订单', '', '', '', '', '', '', 1, 1, 1519853370, 21, 1519853370);
INSERT INTO `php_article` VALUES (23, '退换货原则', '退换货原则', '', '', '', '', '', '', 1, 1, 1519853388, 22, 1519853388);
INSERT INTO `php_article` VALUES (24, '售后服务保证', '售后服务保证', '', '', '', '', '', '', 1, 1, 1519853410, 22, 1519853410);
INSERT INTO `php_article` VALUES (25, '产品质量保证', '产品质量保证', '', '', '', '', '', '', 1, 1, 1519853424, 22, 1519853424);
INSERT INTO `php_article` VALUES (26, '网站故障报告', '网站故障报告', '', '', '', '', '', '', 1, 1, 1519853437, 23, 1519853437);
INSERT INTO `php_article` VALUES (27, '选机咨询', '选机咨询', '', '', '', '', '', '', 1, 1, 1519853448, 23, 1519853448);
INSERT INTO `php_article` VALUES (28, '投诉与建议', '投诉与建议', '', '', '', '', '', '', 1, 1, 1519853459, 23, 1519853459);
INSERT INTO `php_article` VALUES (29, '普通1', '普通1', '', '', '', '', '', '', 1, 1, 1519871779, 18, 1519871779);
INSERT INTO `php_article` VALUES (30, '普通2', '普通2', '', '', '', '', '', '', 1, 1, 1519871801, 31, 1519871801);
INSERT INTO `php_article` VALUES (31, '普通3', '普通3', '', '', '', '', '', '', 1, 1, 1519871822, 26, 1519871822);
INSERT INTO `php_article` VALUES (32, '隐私保护', '隐私保护', '12343', '', '', '', '', '', 1, 1, 1520031100, 8, 1520031100);
INSERT INTO `php_article` VALUES (33, ' 联系我们 ', ' 联系我们 ', '', '', '', '', '', '', 1, 1, 1520031113, 8, 1520031113);
INSERT INTO `php_article` VALUES (34, ' 免责条款 ', ' 免责条款 ', '', '', '', '', '', '', 1, 1, 1520031123, 8, 1520031123);
INSERT INTO `php_article` VALUES (35, ' 公司简介 ', ' 公司简介 ', '', '', '', '', '', '', 1, 1, 1520031134, 8, 1520031134);
INSERT INTO `php_article` VALUES (36, ' 意见反馈', ' 意见反馈', '', '', '', '', '', '', 1, 1, 1520031151, 8, 1520031151);
INSERT INTO `php_article` VALUES (37, '服务店突破2000多家', '12121', '', '', '', '', '', '<p>44332232</p>', 1, 1, 1520634844, 33, 1520634844);
INSERT INTO `php_article` VALUES (38, '我们成为中国最大家电零售B2B2C系统', '1233', '', '', '', '', '', '<p>dfdsfa asdfsd</p>', 1, 1, 1520634878, 33, 1520634878);
INSERT INTO `php_article` VALUES (39, '三大国际腕表品牌签约', 'dff', '', '', '', '', '', '<p>sfdfasfsdsdfs</p>', 1, 1, 1520634898, 33, 1520634898);
INSERT INTO `php_article` VALUES (40, '春季家装季，家电买一送一', 'bbc', '', '', '', '', '', '<p>gfdsgdfsgdfg</p>', 1, 1, 1520634940, 34, 1520634940);
INSERT INTO `php_article` VALUES (41, '抢百元优惠券，享4.22%活期', 'hhjj', '', '', '', '', '', '<p>dsfsfbbbdsds</p>', 1, 1, 1520634957, 34, 1520634957);
INSERT INTO `php_article` VALUES (42, 'Macbook最高返50000消费豆！', 'ssad', '', '', '', '', '', '<p>sdsdsdccc</p>', 1, 1, 1520634984, 34, 1520634984);

-- ----------------------------
-- Table structure for php_attr
-- ----------------------------
DROP TABLE IF EXISTS `php_attr`;
CREATE TABLE `php_attr`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `attrName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '属性名称',
  `attrType` tinyint(1) NOT NULL DEFAULT 1 COMMENT '属性类型 1:单选 2:唯一',
  `attrValues` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '属性值',
  `typeId` smallint(6) NOT NULL COMMENT '所属类型',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `typeId`(`typeId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品属性表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_attr
-- ----------------------------
INSERT INTO `php_attr` VALUES (2, '厂家', 2, '', 3);
INSERT INTO `php_attr` VALUES (4, 'CPU', 1, '酷睿i7,酷睿i5,酷睿i3', 3);
INSERT INTO `php_attr` VALUES (7, '内存', 1, '4GB,8GB,16GB,32GB', 3);
INSERT INTO `php_attr` VALUES (8, '颜色', 1, '红色,黄色,蓝色,黑色,白色,紫色', 5);
INSERT INTO `php_attr` VALUES (9, '尺码', 1, 'XL,XXL,L,M,XXXL', 5);
INSERT INTO `php_attr` VALUES (10, '材质成分', 2, '', 5);
INSERT INTO `php_attr` VALUES (11, '销售渠道', 2, '', 5);
INSERT INTO `php_attr` VALUES (12, '货号', 2, '', 5);
INSERT INTO `php_attr` VALUES (13, '服装版型', 2, '', 5);
INSERT INTO `php_attr` VALUES (14, '品牌', 2, '', 5);
INSERT INTO `php_attr` VALUES (15, '图案', 2, '', 5);
INSERT INTO `php_attr` VALUES (23, '颜色', 1, '红色,黄色,蓝色,黑色,白色,紫色', 3);
INSERT INTO `php_attr` VALUES (17, '领型', 2, '', 5);
INSERT INTO `php_attr` VALUES (18, '袖型', 2, '', 5);
INSERT INTO `php_attr` VALUES (19, '袖长', 2, '', 5);
INSERT INTO `php_attr` VALUES (22, '显卡', 1, 'GTX660,GTX680,GTX760,GTX780,GTX1080', 3);
INSERT INTO `php_attr` VALUES (24, '硬盘容量', 1, '500GB,1TB,2TB,4TB', 3);
INSERT INTO `php_attr` VALUES (25, '尺寸', 1, '28寸,32寸,38寸,45寸,50寸', 6);
INSERT INTO `php_attr` VALUES (26, '类型', 1, '等离子,液晶', 6);
INSERT INTO `php_attr` VALUES (27, '分辨率', 1, '1080P,2K,4K', 6);

-- ----------------------------
-- Table structure for php_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `php_auth_group`;
CREATE TABLE `php_auth_group`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `rules` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `title`(`title`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_auth_group
-- ----------------------------
INSERT INTO `php_auth_group` VALUES (1, '超级管理员', 1, '1,2,3,4,5,6,7,8,9,46,10,11,12,13,14,15,16,17,18,45,19,20,21,22,23,43,24,25,26,27,28,29,30,31,32,33,44,34,36,37,47,48,49,50');
INSERT INTO `php_auth_group` VALUES (4, '权限管理员', 1, '1,2,3,4,5,6,7,8,9,52,46,10,11,12,13,51,36,37');
INSERT INTO `php_auth_group` VALUES (7, '系统配置管理员', 1, '29,30,31,32,33,44,34,36,37');

-- ----------------------------
-- Table structure for php_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `php_auth_group_access`;
CREATE TABLE `php_auth_group_access`  (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  UNIQUE INDEX `uid_group_id`(`uid`, `group_id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of php_auth_group_access
-- ----------------------------
INSERT INTO `php_auth_group_access` VALUES (5, 1);
INSERT INTO `php_auth_group_access` VALUES (12, 4);

-- ----------------------------
-- Table structure for php_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `php_auth_rule`;
CREATE TABLE `php_auth_rule`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `condition` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `pid` mediumint(9) NOT NULL DEFAULT 0,
  `sort` int(5) NOT NULL DEFAULT 50,
  `iconName` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '图标名称',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `title`(`title`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 136 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of php_auth_rule
-- ----------------------------
INSERT INTO `php_auth_rule` VALUES (1, '', '管理员', 1, 1, '', 0, 50, 'fa fa-user');
INSERT INTO `php_auth_rule` VALUES (2, 'admin/lst', '管理员列表', 1, 1, '', 1, 50, '');
INSERT INTO `php_auth_rule` VALUES (3, 'admin/add', '添加管理员', 1, 1, '', 2, 50, '');
INSERT INTO `php_auth_rule` VALUES (4, 'admin/edit', '修改管理员', 1, 1, '', 2, 50, '');
INSERT INTO `php_auth_rule` VALUES (5, 'admin/del', '删除管理员', 1, 1, '', 2, 50, '');
INSERT INTO `php_auth_rule` VALUES (6, 'auth_rule/lst', '权限列表', 1, 1, '', 1, 50, '');
INSERT INTO `php_auth_rule` VALUES (7, 'auth_rule/add', '添加权限', 1, 1, '', 6, 50, '');
INSERT INTO `php_auth_rule` VALUES (8, 'auth_rule/edit', '修改权限', 1, 1, '', 6, 50, '');
INSERT INTO `php_auth_rule` VALUES (9, 'auth_role/del', '删除权限', 1, 1, '', 6, 50, '');
INSERT INTO `php_auth_rule` VALUES (10, 'auth_group/lst', '用户组', 1, 1, '', 1, 50, '');
INSERT INTO `php_auth_rule` VALUES (11, 'auth_group/add', '添加用户组', 1, 1, '', 10, 50, '');
INSERT INTO `php_auth_rule` VALUES (12, 'auth_group/edit', '修改用户组', 1, 1, '', 10, 50, '');
INSERT INTO `php_auth_rule` VALUES (13, 'auth_group/del', '删除用户组', 1, 1, '', 10, 50, '');
INSERT INTO `php_auth_rule` VALUES (57, 'brand/del', '删除品牌', 1, 1, '', 54, 50, '');
INSERT INTO `php_auth_rule` VALUES (58, '', '文章管理', 1, 1, '', 0, 50, '');
INSERT INTO `php_auth_rule` VALUES (59, 'cate/lst', '文章栏目', 1, 1, '', 58, 50, '');
INSERT INTO `php_auth_rule` VALUES (60, 'cate/add', '添加栏目', 1, 1, '', 59, 50, '');
INSERT INTO `php_auth_rule` VALUES (61, 'cate/edit', '修改栏目', 1, 1, '', 59, 50, '');
INSERT INTO `php_auth_rule` VALUES (51, 'auth_group/status', '用户组状态', 1, 1, '', 10, 50, '');
INSERT INTO `php_auth_rule` VALUES (52, 'auth_rule/status', '权限状态', 1, 1, '', 6, 50, '');
INSERT INTO `php_auth_rule` VALUES (53, '', '商品管理', 1, 1, '', 0, 50, '');
INSERT INTO `php_auth_rule` VALUES (54, 'brand/lst', '商品品牌', 1, 1, '', 53, 50, '');
INSERT INTO `php_auth_rule` VALUES (55, 'brand/add', '添加品牌', 1, 1, '', 54, 50, '');
INSERT INTO `php_auth_rule` VALUES (63, 'article/lst', '文章列表', 1, 1, '', 58, 50, '');
INSERT INTO `php_auth_rule` VALUES (64, 'article/add', '添加文章', 1, 1, '', 63, 50, '');
INSERT INTO `php_auth_rule` VALUES (65, 'article/edit', '修改文章', 1, 1, '', 63, 50, '');
INSERT INTO `php_auth_rule` VALUES (66, 'article/del', '删除文章', 1, 1, '', 63, 50, '');
INSERT INTO `php_auth_rule` VALUES (70, '', '图片管理', 1, 1, '', 0, 50, '');
INSERT INTO `php_auth_rule` VALUES (29, '', '系统配置', 1, 1, '', 0, 50, 'fa fa-gear');
INSERT INTO `php_auth_rule` VALUES (30, 'conf/lst', '配置列表', 1, 1, '', 29, 50, '');
INSERT INTO `php_auth_rule` VALUES (31, 'conf/add', '添加配置', 1, 1, '', 30, 50, '');
INSERT INTO `php_auth_rule` VALUES (32, 'conf/edit', '修改配置', 1, 1, '', 30, 50, '');
INSERT INTO `php_auth_rule` VALUES (33, 'conf/del', '删除配置', 1, 1, '', 30, 50, '');
INSERT INTO `php_auth_rule` VALUES (34, 'conf/conf', '配置', 1, 1, '', 29, 50, '');
INSERT INTO `php_auth_rule` VALUES (44, 'conf/sort', '配置排序', 1, 1, '', 30, 50, '');
INSERT INTO `php_auth_rule` VALUES (36, 'index/index', '后台首页', 1, 1, '', 0, 50, 'fa fa-dashboard');
INSERT INTO `php_auth_rule` VALUES (37, 'admin/logout', '登出', 1, 1, '', 36, 50, '');
INSERT INTO `php_auth_rule` VALUES (56, 'brand/edit', '修改品牌', 1, 1, '', 54, 50, '');
INSERT INTO `php_auth_rule` VALUES (62, 'cate/del', '删除栏目', 1, 1, '', 59, 50, '');
INSERT INTO `php_auth_rule` VALUES (46, 'auth_rule/sort', '权限排序', 1, 1, '', 6, 50, '');
INSERT INTO `php_auth_rule` VALUES (71, 'picture/lst', '图片列表', 1, 1, '', 70, 50, '');
INSERT INTO `php_auth_rule` VALUES (72, '', '友情链接管理', 1, 1, '', 0, 50, '');
INSERT INTO `php_auth_rule` VALUES (73, 'frlink/lst', '链接列表', 1, 1, '', 72, 50, '');
INSERT INTO `php_auth_rule` VALUES (74, 'frlink/add', '添加链接', 1, 1, '', 73, 50, '');
INSERT INTO `php_auth_rule` VALUES (75, 'frlink/edit', '修改链接', 1, 1, '', 73, 50, '');
INSERT INTO `php_auth_rule` VALUES (76, 'frlink/del', '删除链接', 1, 1, '', 73, 50, '');
INSERT INTO `php_auth_rule` VALUES (77, 'type/lst', '商品类型', 1, 1, '', 53, 50, '');
INSERT INTO `php_auth_rule` VALUES (78, 'category/lst', '商品分类', 1, 1, '', 53, 50, '');
INSERT INTO `php_auth_rule` VALUES (79, 'category/add', '添加分类', 1, 1, '', 78, 50, '');
INSERT INTO `php_auth_rule` VALUES (80, 'category/edit', '修改分类', 1, 1, '', 78, 50, '');
INSERT INTO `php_auth_rule` VALUES (81, 'category/del', '删除分类', 1, 1, '', 78, 50, '');
INSERT INTO `php_auth_rule` VALUES (82, 'type/add', '添加类型', 1, 1, '', 77, 50, '');
INSERT INTO `php_auth_rule` VALUES (83, 'type/edit', '修改类型', 1, 1, '', 77, 50, '');
INSERT INTO `php_auth_rule` VALUES (84, 'type/del', '删除类型', 1, 1, '', 77, 50, '');
INSERT INTO `php_auth_rule` VALUES (85, 'goods/lst', '商品列表', 1, 1, '', 53, 50, '');
INSERT INTO `php_auth_rule` VALUES (86, 'goods/add', '添加商品', 1, 1, '', 85, 50, '');
INSERT INTO `php_auth_rule` VALUES (87, 'goods/edit', '修改商品', 1, 1, '', 85, 50, '');
INSERT INTO `php_auth_rule` VALUES (88, 'goods/del', '删除商品', 1, 1, '', 85, 50, '');
INSERT INTO `php_auth_rule` VALUES (89, '', '会员管理', 1, 1, '', 0, 50, '');
INSERT INTO `php_auth_rule` VALUES (90, 'member_level/lst', '会员级别', 1, 1, '', 89, 50, '');
INSERT INTO `php_auth_rule` VALUES (91, 'member_level/add', '添加级别', 1, 1, '', 90, 50, '');
INSERT INTO `php_auth_rule` VALUES (92, 'member_level/edit', '修改级别', 1, 1, '', 90, 50, '');
INSERT INTO `php_auth_rule` VALUES (93, 'member_level/del', '删除级别', 1, 1, '', 90, 50, '');
INSERT INTO `php_auth_rule` VALUES (94, 'goods/photos', '商品相册', 1, 1, '', 85, 50, '');
INSERT INTO `php_auth_rule` VALUES (95, 'goodsNum/lst', '商品库存', 1, 1, '', 85, 50, '');
INSERT INTO `php_auth_rule` VALUES (96, 'article/status', '文章状态', 1, 1, '', 63, 50, '');
INSERT INTO `php_auth_rule` VALUES (97, 'cate/status', '栏目状态', 1, 1, '', 59, 50, '');
INSERT INTO `php_auth_rule` VALUES (98, 'cate/search', '查看文章', 1, 1, '', 59, 50, '');
INSERT INTO `php_auth_rule` VALUES (99, 'brand/status', '品牌状态', 1, 1, '', 54, 50, '');
INSERT INTO `php_auth_rule` VALUES (100, 'category/status', '分类状态', 1, 1, '', 78, 50, '');
INSERT INTO `php_auth_rule` VALUES (101, 'attr/lst', '属性列表', 1, 1, '', 53, 50, '');
INSERT INTO `php_auth_rule` VALUES (102, 'attr/add', '添加属性', 1, 1, '', 101, 50, '');
INSERT INTO `php_auth_rule` VALUES (103, 'attr/edit', '修改属性', 1, 1, '', 101, 50, '');
INSERT INTO `php_auth_rule` VALUES (104, 'attr/del', '删除属性', 1, 1, '', 101, 50, '');
INSERT INTO `php_auth_rule` VALUES (105, '', '导航管理', 1, 1, '', 0, 50, '');
INSERT INTO `php_auth_rule` VALUES (106, 'nav/lst', '导航列表', 1, 1, '', 105, 50, '');
INSERT INTO `php_auth_rule` VALUES (107, 'nav/add', '添加导航', 1, 1, '', 106, 50, '');
INSERT INTO `php_auth_rule` VALUES (108, 'nav/edit', '修改导航', 1, 1, '', 106, 50, '');
INSERT INTO `php_auth_rule` VALUES (109, 'nav/del', '删除导航', 1, 1, '', 106, 50, '');
INSERT INTO `php_auth_rule` VALUES (110, 'nav/sort', '导航排序', 1, 1, '', 106, 50, '');
INSERT INTO `php_auth_rule` VALUES (111, '', '推荐位管理', 1, 1, '', 0, 50, '');
INSERT INTO `php_auth_rule` VALUES (112, 'rec_pos/lst', '推荐位列表', 1, 1, '', 111, 50, '');
INSERT INTO `php_auth_rule` VALUES (113, 'rec_pos/add', '添加推荐位', 1, 1, '', 112, 50, '');
INSERT INTO `php_auth_rule` VALUES (114, 'rec_pos/edit', '修改推荐位', 1, 1, '', 112, 50, '');
INSERT INTO `php_auth_rule` VALUES (115, 'rec_pos/del', '删除推荐位', 1, 1, '', 112, 50, '');
INSERT INTO `php_auth_rule` VALUES (116, '', '栏目关联', 1, 1, '', 0, 50, '');
INSERT INTO `php_auth_rule` VALUES (117, 'category_words/lst', '推荐词关联', 1, 1, '', 116, 50, '');
INSERT INTO `php_auth_rule` VALUES (118, 'category_words/add', '添加推荐词', 1, 1, '', 117, 50, '');
INSERT INTO `php_auth_rule` VALUES (119, 'category_words/edit', '修改推荐词', 1, 1, '', 117, 50, '');
INSERT INTO `php_auth_rule` VALUES (120, 'category_words/del', '删除推荐词', 1, 1, '', 117, 50, '');
INSERT INTO `php_auth_rule` VALUES (121, 'category_brands/lst', '品牌关联', 1, 1, '', 116, 50, '');
INSERT INTO `php_auth_rule` VALUES (122, 'category_brands/add', '添加品牌推荐', 1, 1, '', 121, 50, '');
INSERT INTO `php_auth_rule` VALUES (123, 'category_brands/edit', '修改推荐品牌', 1, 1, '', 121, 50, '');
INSERT INTO `php_auth_rule` VALUES (124, 'category_brands/del', '删除推荐品牌', 1, 1, '', 121, 50, '');
INSERT INTO `php_auth_rule` VALUES (125, 'category_ad/lst', '楼层广告', 1, 1, '', 116, 50, '');
INSERT INTO `php_auth_rule` VALUES (126, 'category_ad/add', '添加广告', 1, 1, '', 125, 50, '');
INSERT INTO `php_auth_rule` VALUES (127, 'category_ad/edit', '修改广告', 1, 1, '', 125, 50, '');
INSERT INTO `php_auth_rule` VALUES (128, 'category_ad/del', '删除广告', 1, 1, '', 125, 50, '');
INSERT INTO `php_auth_rule` VALUES (129, 'slider/lst', '轮播图', 1, 1, '', 70, 50, '');
INSERT INTO `php_auth_rule` VALUES (130, 'slider/add', '添加轮播图', 1, 1, '', 129, 50, '');
INSERT INTO `php_auth_rule` VALUES (131, 'slider/edit', '修改轮播图', 1, 1, '', 129, 50, '');
INSERT INTO `php_auth_rule` VALUES (132, 'slider/del', '删除轮播图', 1, 1, '', 129, 50, '');
INSERT INTO `php_auth_rule` VALUES (133, 'slider/status', '轮播图状态', 1, 1, '', 129, 50, '');
INSERT INTO `php_auth_rule` VALUES (134, 'slider/sort', '轮播图排序', 1, 1, '', 129, 50, '');

-- ----------------------------
-- Table structure for php_brand
-- ----------------------------
DROP TABLE IF EXISTS `php_brand`;
CREATE TABLE `php_brand`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `brandName` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '名称',
  `url` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '网址',
  `pic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'logo',
  `desc` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '描述',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态',
  `sort` smallint(6) NOT NULL DEFAULT 50 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `brandName`(`brandName`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 52 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '品牌表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_brand
-- ----------------------------
INSERT INTO `php_brand` VALUES (1, 'elle', 'www.baidu.com', 'brandPic\\20180307\\0d0ecb1fc7830b815e7a2363795c5dc1.jpg', 'dddd3', 1, 50);
INSERT INTO `php_brand` VALUES (8, 'kingston', '', 'brandPic\\20180307\\3690975db079554a5c71be985b4adaad.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (7, '三星', '5566448', 'brandPic\\20180307\\13cb817963131e809dbea9db908ceee1.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (9, 'sprit', '2332412', 'brandPic\\20180307\\4095cfb59e8433c1920f6c2d3d59e978.jpg', 'sdfassd', 1, 50);
INSERT INTO `php_brand` VALUES (10, 'tata', '6565656ds', 'brandPic\\20180307\\33af22843eca51d5a246c7e5f6fca7dd.jpg', 'fasdf', 1, 50);
INSERT INTO `php_brand` VALUES (11, 'justyle', 'afssdfasdsf', 'brandPic\\20180307\\a170bffb3f92661e6b0d651049b87dd2.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (12, 'ports', 'afsdafsdfsa', 'brandPic\\20180307\\6155b8e0e68c003d9a9f564491a47611.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (13, 'lining', '', 'brandPic\\20180307\\32d71ec73f6167e1da2a7736fadebbdf.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (14, '养生堂', '2244332', 'brandPic\\20180307\\550a9570821e6c167770289dc1992240.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (15, '喜瑞', '123233232', 'brandPic\\20180307\\1c72b52e9c6bc8c86191abcc5385a13f.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (16, 'gnc', '', 'brandPic\\20180307\\9bedb07b7f0b07270539dda3c7d68032.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (17, '乐力', '', 'brandPic\\20180307\\9a6eed4328c2cd03fce3bfae791fa5f3.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (18, 'apple', '', 'brandPic\\20180307\\c8fcfb166795369e065949f4540c7251.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (19, 'huawei', '', 'brandPic\\20180307\\53f9cf13d5d5cf05e658823a2faad079.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (20, 'zippo', '', 'brandPic\\20180307\\2af35344ba67d16a4461f439dd1e2d00.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (21, 'spalding', '', 'brandPic\\20180309\\1314b86048c761c2ab58fa79e769fd4b.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (22, '皮尔瑜伽', '13232344', 'brandPic\\20180309\\12f5333d1df0da6b6ed28db9da02c96d.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (23, 'johnson', 'dffdsf', 'brandPic\\20180309\\d503f274f3beb1d4d0d6dcc89de05202.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (24, 'picobong', '32343444', 'brandPic\\20180309\\7b741fdc297e039f17997a7fca47bdda.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (25, 'kpt', '5566775', 'brandPic\\20180309\\0b0891b6838c968df4f8b9c2b9bbe837.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (26, '白兰是', 'fasddfsad', 'brandPic\\20180311\\831b0713a3ca85133768452ec9002ef7.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (27, 'cpt', '', 'brandPic\\20180311\\d1f2e14fe3ad486d5f9a4ca8fd6cb29a.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (28, 'bh', '', 'brandPic\\20180311\\ca5dd3932f75a3b6459854cf689ccf41.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (29, 'electrolux', '', 'brandPic\\20180311\\1fab555184952907acc993ae3cb1d19f.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (30, 'alcqtel', '', 'brandPic\\20180311\\88b948ebba530d30f7789d0cf235b202.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (31, '七匹狼', '', 'brandPic\\20180311\\1e23bbb244a9dd4080be617d3de2a1f9.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (32, 'meizu', '', 'brandPic\\20180311\\643b1b6335650b5e898a5e2fa5fb7266.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (33, 'jackwolfskin', '', 'brandPic\\20180311\\7f33a4b15e6f1f969fc27e36cc61b6eb.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (34, 'lancome', '', 'brandPic\\20180311\\cc5fb9b4d34803cdefe20fc5e567064d.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (35, 'converse', '', 'brandPic\\20180311\\9912167e8cecf6f8e7eebfde04ef4ea0.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (36, '康恩贝', '', 'brandPic\\20180311\\7b3d5f0dd8e3fd5ec0226ac5b47022f2.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (37, 'za', '', 'brandPic\\20180311\\9079bc59d7f4d466e51bdbc63f687094.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (38, '华帝', '', 'brandPic\\20180311\\d1cec9e4526c811519c7e9333376450b.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (39, 'erke', '', 'brandPic\\20180311\\f8683a54a35704ae5489ddfd707f396e.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (40, 'acer', '', 'brandPic\\20180311\\5f7a0b8b99467eee85242cb666a1aec1.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (41, '合生元', '', 'brandPic\\20180311\\2db951de5d0c913ce14171ab4be7ee7b.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (42, '海飞丝', '', 'brandPic\\20180311\\29d52fb893a9fe3a10631716d233da4b.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (43, 'girdear', '', 'brandPic\\20180311\\507dd3c8ca764eaea387c35bf3f17b41.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (44, '飞科', '', 'brandPic\\20180311\\974b3ddac8f2d733d0a50b86e8be71b7.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (45, 'disney', '', 'brandPic\\20180311\\4b675a74c989e685d5f6ad85ee516a8d.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (46, '达利园', '', 'brandPic\\20180311\\82147723b0c06197aaa1390be2e29f08.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (47, '黑鹰', '', 'brandPic\\20180311\\cc5ef1df155c95e5cb5031d09412ac9f.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (48, 'dell', '', 'brandPic\\20180311\\c3f10725373b6993d4477ce356a810ee.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (49, '亿健', '', 'brandPic\\20180311\\914cea67a894716b6f33d56f9f94a12d.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (50, 'five plus', '', 'brandPic\\20180311\\ac449c1032e55be80d3cc8b5adcb3b70.jpg', '', 1, 50);
INSERT INTO `php_brand` VALUES (51, 'siemens', '', 'brandPic\\20180311\\b89c9a92e7431c1c5e90b0b28ca7c026.jpg', '', 1, 50);

-- ----------------------------
-- Table structure for php_cate
-- ----------------------------
DROP TABLE IF EXISTS `php_cate`;
CREATE TABLE `php_cate`  (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `cateName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '栏目名称',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '栏目类型：1:系统分类 2:帮助分类 3：网点帮助 4：网店信息 5：普通分类',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '栏目关键词',
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '栏目描述',
  `showNav` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否显示到导航',
  `pid` mediumint(9) NOT NULL DEFAULT 0 COMMENT '上级栏目id',
  `sort` mediumint(9) NOT NULL DEFAULT 50 COMMENT '排序',
  `allowSon` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否允许添加子栏目',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `cateName`(`cateName`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '栏目' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_cate
-- ----------------------------
INSERT INTO `php_cate` VALUES (5, '系统', 1, '', '', 0, 0, 50, 0);
INSERT INTO `php_cate` VALUES (8, '网店信息', 4, '', '', 0, 5, 50, 0);
INSERT INTO `php_cate` VALUES (11, '新手上路', 3, '新手上路', '新手上路', 1, 4, 50, 0);
INSERT INTO `php_cate` VALUES (4, '网店帮助分类', 2, '', '', 0, 5, 51, 1);
INSERT INTO `php_cate` VALUES (12, '配送与支付', 3, '配送与支付', '配送与支付', 1, 4, 50, 0);
INSERT INTO `php_cate` VALUES (22, '服务保证', 3, '', '', 1, 4, 50, 0);
INSERT INTO `php_cate` VALUES (18, '3G资讯', 5, '', '', 1, 0, 50, 1);
INSERT INTO `php_cate` VALUES (21, '会员中心', 3, '', '', 1, 4, 50, 0);
INSERT INTO `php_cate` VALUES (23, '联系我们', 3, '', '', 1, 4, 50, 0);
INSERT INTO `php_cate` VALUES (26, '站内快讯', 5, '', '', 1, 0, 50, 1);
INSERT INTO `php_cate` VALUES (27, '商城公告', 5, '', '', 1, 0, 50, 1);
INSERT INTO `php_cate` VALUES (28, '商家入驻流程说明', 5, '', '', 1, 0, 50, 1);
INSERT INTO `php_cate` VALUES (29, '商家入驻商家说明', 5, '', '', 1, 0, 50, 1);
INSERT INTO `php_cate` VALUES (30, 'App', 5, '', '', 1, 0, 50, 1);
INSERT INTO `php_cate` VALUES (31, 'ios', 5, '', '', 1, 30, 50, 1);
INSERT INTO `php_cate` VALUES (32, '发票问题', 5, '', '', 1, 0, 50, 1);
INSERT INTO `php_cate` VALUES (33, '公告', 5, '', '', 1, 0, 50, 1);
INSERT INTO `php_cate` VALUES (34, '促销', 5, '', '', 1, 0, 50, 1);
INSERT INTO `php_cate` VALUES (35, '微分销', 5, '', '', 1, 0, 50, 1);

-- ----------------------------
-- Table structure for php_category
-- ----------------------------
DROP TABLE IF EXISTS `php_category`;
CREATE TABLE `php_category`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cateName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品分类名称',
  `cateImg` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '栏目banner',
  `keywords` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '关键词',
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '描述',
  `sort` smallint(6) NOT NULL DEFAULT 50 COMMENT '排序',
  `pid` smallint(6) NOT NULL DEFAULT 0 COMMENT '上级栏目id',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:显示 0:隐藏',
  `iconName` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '图标名称',
  `attrId` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '筛选属性id',
  `psNum` tinyint(2) UNSIGNED NOT NULL DEFAULT 5 COMMENT '价格区间数量',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `cateName`(`cateName`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品分类表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_category
-- ----------------------------
INSERT INTO `php_category` VALUES (1, '家用电器', 'goodsCatePic\\20180217\\2d71c0177f3084c0fc52963fdbe2bc19.jpg', 'ewewe', 'fsssfsd', 50, 0, 1, 'icon-ele', '', 6);
INSERT INTO `php_category` VALUES (2, '大家电', 'goodsCatePic\\20180217\\1ccaa5b526aa620217c8652143294218.jpg', 'dgsfg,废掉', '的说法是否', 50, 1, 1, '', '', 5);
INSERT INTO `php_category` VALUES (4, '手机、数码、通信', '', '', '', 50, 0, 1, 'icon-digital', '', 5);
INSERT INTO `php_category` VALUES (7, '数码配件', '', '', '', 50, 4, 1, '', '', 5);
INSERT INTO `php_category` VALUES (24, '存储卡', '', '', '', 50, 7, 1, '', '', 5);
INSERT INTO `php_category` VALUES (10, '生活电器', '', '', '', 50, 1, 1, '', '', 5);
INSERT INTO `php_category` VALUES (11, '厨房电器', '', '', '', 50, 1, 1, '', '', 5);
INSERT INTO `php_category` VALUES (12, '平板电视', '', '', '', 50, 2, 1, '', '25,27,26', 5);
INSERT INTO `php_category` VALUES (13, '空调', '', '', '', 50, 2, 1, '', '', 5);
INSERT INTO `php_category` VALUES (14, '冰箱', '', '', '', 50, 2, 1, '', '', 5);
INSERT INTO `php_category` VALUES (15, '洗衣机', '', '', '', 50, 2, 1, '', '', 5);
INSERT INTO `php_category` VALUES (16, '电风扇', '', '', '', 50, 10, 1, '', '', 5);
INSERT INTO `php_category` VALUES (17, '冷风扇', '', '', '', 50, 10, 1, '', '', 5);
INSERT INTO `php_category` VALUES (18, '净化器', '', '', '', 50, 10, 1, '', '', 5);
INSERT INTO `php_category` VALUES (19, '电饭煲', '', '', '', 50, 11, 1, '', '', 5);
INSERT INTO `php_category` VALUES (20, '电压力锅', '', '', '', 50, 11, 1, '', '', 5);
INSERT INTO `php_category` VALUES (21, '豆浆机', '', '', '', 50, 11, 1, '', '', 5);
INSERT INTO `php_category` VALUES (25, '读卡器', '', '', '', 50, 7, 1, '', '', 5);
INSERT INTO `php_category` VALUES (26, '滤镜', '', '', '', 50, 7, 1, '', '', 5);
INSERT INTO `php_category` VALUES (27, '男装、女装、内衣', '', '', '', 50, 0, 1, 'icon-clothes', '', 5);
INSERT INTO `php_category` VALUES (28, '女装', '', '', '', 50, 27, 1, '', '', 5);
INSERT INTO `php_category` VALUES (29, '衬衫', '', '', '', 50, 28, 1, '', '8,9', 5);
INSERT INTO `php_category` VALUES (33, '电脑、办公', '', '', '8888', 50, 0, 1, 'icon-computer', '', 5);
INSERT INTO `php_category` VALUES (34, '电脑整机', '', '', '', 50, 33, 1, '', '', 5);
INSERT INTO `php_category` VALUES (35, '笔记本', '', '', '', 50, 34, 1, '', '4,22,24,23,7', 5);
INSERT INTO `php_category` VALUES (36, '男装', '', '', '', 50, 27, 1, '', '', 5);

-- ----------------------------
-- Table structure for php_category_ad
-- ----------------------------
DROP TABLE IF EXISTS `php_category_ad`;
CREATE TABLE `php_category_ad`  (
  `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品Id',
  `pic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图',
  `position` tinyint(1) NOT NULL DEFAULT 1 COMMENT '位置 1：轮播 2：右上 3：右下',
  `url` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '链接地址',
  `cateId` smallint(6) NOT NULL COMMENT '所属分类',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `position`(`position`) USING BTREE,
  INDEX `cateId`(`cateId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '广告图' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_category_ad
-- ----------------------------
INSERT INTO `php_category_ad` VALUES (2, 'cateAdPic\\20180309\\d5cc93daedaad1f691326e637953b854.jpg', 1, '555', 1);
INSERT INTO `php_category_ad` VALUES (3, 'cateAdPic\\20180309\\bb77625a563ae897d3c54d3574d0dabc.png', 1, '999ss', 1);
INSERT INTO `php_category_ad` VALUES (4, 'cateAdPic\\20180309\\37c2716aa05ebea19df29cfe16f3ccc2.png', 1, 'fffdd', 1);
INSERT INTO `php_category_ad` VALUES (5, 'cateAdPic\\20180309\\0351ac4cfa7e71f8162a946a0cee805a.jpg', 2, '6556', 1);
INSERT INTO `php_category_ad` VALUES (6, 'cateAdPic\\20180309\\44bab7fedf38af8018f014c28be171af.jpg', 3, 'fggf', 1);
INSERT INTO `php_category_ad` VALUES (7, 'cateAdPic\\20180309\\b1705909eed404ab522d6950c3114ac0.jpg', 1, 'hhg', 4);
INSERT INTO `php_category_ad` VALUES (8, 'cateAdPic\\20180309\\5db0e8e232c9ca095cd62eda18414557.jpg', 1, 'jjjj', 4);
INSERT INTO `php_category_ad` VALUES (9, 'cateAdPic\\20180309\\cb2b37541df592fe12933c89704df77f.jpg', 1, 'jjgg', 4);
INSERT INTO `php_category_ad` VALUES (10, 'cateAdPic\\20180309\\627c0c28e9e7d4c7333b733eedd479be.jpg', 2, 'kkhg', 4);
INSERT INTO `php_category_ad` VALUES (11, 'cateAdPic\\20180309\\085b698da2fca8a1f5974302d532f60d.jpg', 3, 'hgh', 4);
INSERT INTO `php_category_ad` VALUES (12, 'cateAdPic\\20180309\\3e6f51553aad5a3dc6131f04699b558d.png', 1, 'dddss', 1);
INSERT INTO `php_category_ad` VALUES (13, 'cateAdPic\\20181010\\4149e38dc766ffa39347baf1d664f3f4.jpg', 1, 'www.baidu.com', 33);
INSERT INTO `php_category_ad` VALUES (14, 'cateAdPic\\20181010\\dfbfd98022c70db14eb58d3a25631af5.png', 1, 'www.baidu.com', 33);
INSERT INTO `php_category_ad` VALUES (15, 'cateAdPic\\20181010\\ab5fad01b5dce1d47060da56e253bd49.jpg', 2, 'www.baidu.com', 33);
INSERT INTO `php_category_ad` VALUES (16, 'cateAdPic\\20181010\\6c385d83bc7d459a71aece4e7a77da2c.jpg', 3, 'www.baidu.com', 33);

-- ----------------------------
-- Table structure for php_category_brands
-- ----------------------------
DROP TABLE IF EXISTS `php_category_brands`;
CREATE TABLE `php_category_brands`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brandId` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '关联的品牌id列表',
  `pic` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '推广图',
  `url` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '链接',
  `cateId` mediumint(9) NOT NULL COMMENT '对应主栏目id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '首页导航关联品牌表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_category_brands
-- ----------------------------
INSERT INTO `php_category_brands` VALUES (1, '1,8,7,9,10,11,12,13,14,15', 'cateBrandPic\\20180305\\23b736a05f4c1ded92627b0fbf7f8fed.jpg', '555222', 4);
INSERT INTO `php_category_brands` VALUES (2, '16,17,18,19,20,21,22,23,24,25', 'cateBrandPic\\20180305\\4f560f8c8b4fb17d457b1233b0863ba5.jpg', 'ddssh', 1);
INSERT INTO `php_category_brands` VALUES (3, '43,44,50', 'cateBrandPic\\20180721\\d9967c37194fb70aa3ee19af58427c65.jpg', 'www.baidu.com', 27);
INSERT INTO `php_category_brands` VALUES (4, '8,7,18,19', 'cateBrandPic\\20181010\\6f4dd811bf1a4c288c6e5e3f840e61ea.jpg', 'www.baidu.com', 33);

-- ----------------------------
-- Table structure for php_category_words
-- ----------------------------
DROP TABLE IF EXISTS `php_category_words`;
CREATE TABLE `php_category_words`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cateId` mediumint(9) NOT NULL COMMENT '对应主栏目id',
  `word` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '词汇',
  `url` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '链接',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '首页导航关联词汇表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_category_words
-- ----------------------------
INSERT INTO `php_category_words` VALUES (2, 1, '品牌日', '5566');
INSERT INTO `php_category_words` VALUES (3, 1, '家电城', 'sfsaf');
INSERT INTO `php_category_words` VALUES (4, 4, '手机频道', '5');
INSERT INTO `php_category_words` VALUES (5, 4, '网上影业厅', '6');

-- ----------------------------
-- Table structure for php_comment
-- ----------------------------
DROP TABLE IF EXISTS `php_comment`;
CREATE TABLE `php_comment`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '评论内容',
  `star` tinyint(4) NOT NULL DEFAULT 5 COMMENT '评论星级',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `addTime` int(10) NOT NULL COMMENT '添加时间',
  `goodsId` mediumint(8) UNSIGNED NOT NULL COMMENT '商品id',
  `used` mediumint(9) NULL DEFAULT 0 COMMENT '有用数',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `addTime`(`addTime`) USING BTREE,
  INDEX `goodsId`(`goodsId`) USING BTREE,
  INDEX `star`(`star`) USING BTREE,
  INDEX `used`(`used`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品评论表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_comment
-- ----------------------------
INSERT INTO `php_comment` VALUES (1, '很棒', 5, 8, 1536211836, 49, 5);

-- ----------------------------
-- Table structure for php_conf
-- ----------------------------
DROP TABLE IF EXISTS `php_conf`;
CREATE TABLE `php_conf`  (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '配置项id',
  `cnName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置中文名称',
  `enName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '英文名称',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '配置类型 1：单行文本框 2：多行文本 3：单选按钮 4：复选按钮 5：下拉菜单',
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置值',
  `values` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置可选值',
  `sort` smallint(6) NOT NULL DEFAULT 50 COMMENT '配置项排序',
  `confType` tinyint(1) NOT NULL DEFAULT 1 COMMENT '配置属性 1：网店基本信息 2：商品基本信息',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '配置' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_conf
-- ----------------------------
INSERT INTO `php_conf` VALUES (6, '站点关键词', 'keywords', 2, '111w', '', 50, 1);
INSERT INTO `php_conf` VALUES (7, '站点名称', 'siteName', 1, '2224', '', 60, 1);
INSERT INTO `php_conf` VALUES (8, '站点描述', 'desc', 2, 'ff3', '', 65, 1);
INSERT INTO `php_conf` VALUES (9, '是否关闭网站', 'close', 3, '否', '是,否', 70, 1);
INSERT INTO `php_conf` VALUES (10, '开启缓存', 'cache', 3, '否', '是,否', 75, 1);
INSERT INTO `php_conf` VALUES (16, '会员注册', 'reg', 3, '开启', '开启,关闭', 69, 1);
INSERT INTO `php_conf` VALUES (15, '图片', 'pic', 6, 'configPic\\20180217\\256158e8addafa16a427d9201253a27f.jpg', '', 50, 1);
INSERT INTO `php_conf` VALUES (20, '搜索关键词', 'seaKey', 2, '周大福,内衣,Five Plus,手机', '', 50, 1);
INSERT INTO `php_conf` VALUES (21, '搜索框默认值', 'seaVal', 1, '小米', '', 50, 1);
INSERT INTO `php_conf` VALUES (22, '底部版权信息', 'copyright', 2, '© 2015-2018 xm11211.com 版权所有,ICP备案证书号:xm11211号-1,POWERED by xm11211', '', 50, 1);
INSERT INTO `php_conf` VALUES (23, '缓存有效期', 'cacheTime', 1, '86400', '', 50, 1);

-- ----------------------------
-- Table structure for php_frlink
-- ----------------------------
DROP TABLE IF EXISTS `php_frlink`;
CREATE TABLE `php_frlink`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `title` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '链接标题',
  `url` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '网址',
  `pic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'logo',
  `desc` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '描述',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '链接类型：1:图片 2:文字',
  `sort` smallint(6) NOT NULL DEFAULT 50 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `title`(`title`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '友情链接表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_frlink
-- ----------------------------
INSERT INTO `php_frlink` VALUES (1, '33', '3333333', 'frlinkPic\\20180216\\5d6c27381071cde7a746f1ac922ecf47.jpg', '333', 1, 1, 50);
INSERT INTO `php_frlink` VALUES (3, '666', 'errerrer', 'frlinkPic\\20180216\\99ec6ce6126e5b19f3e64825c3691fca.jpg', 'fsafaffsd', 1, 1, 50);

-- ----------------------------
-- Table structure for php_goods
-- ----------------------------
DROP TABLE IF EXISTS `php_goods`;
CREATE TABLE `php_goods`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `goodsName` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品名称',
  `num` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品编码',
  `marketPrice` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '市场价格',
  `shopPrice` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '本店价格',
  `weight` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '商品重量',
  `unit` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'kg' COMMENT '单位',
  `brandId` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品所属品牌',
  `cateId` smallint(6) UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品所属分类',
  `typeId` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品所属类型',
  `desc` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '商品描述',
  `pic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '展示图',
  `smPic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '展示图小图',
  `mdPic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '展示图中图',
  `bigPic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '展示图大图',
  `onSale` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:上架  0:下架',
  `time` int(10) NOT NULL COMMENT '添加时间',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否开启会员价格1:开启0:关闭',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `goodsName`(`goodsName`) USING BTREE,
  INDEX `shopPrice`(`shopPrice`) USING BTREE,
  INDEX `time`(`time`) USING BTREE,
  INDEX `brandId`(`brandId`) USING BTREE,
  INDEX `cateId`(`cateId`) USING BTREE,
  INDEX `typeId`(`typeId`) USING BTREE,
  INDEX `status`(`status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_goods
-- ----------------------------
INSERT INTO `php_goods` VALUES (49, '笔记本1', '5bbd862056e14', 5000.00, 4988.00, 2.00, 'kg', 7, 35, 3, '', 'goodsPic\\20181010\\a9360bf7e495fe4b7a10d3dddf6913f7.jpg', 'goodsPic\\20181010\\thumb_0_a9360bf7e495fe4b7a10d3dddf6913f7.jpg', 'goodsPic\\20181010\\thumb_1_a9360bf7e495fe4b7a10d3dddf6913f7.jpg', 'goodsPic\\20181010\\thumb_2_a9360bf7e495fe4b7a10d3dddf6913f7.jpg', 1, 1539147377, 1);
INSERT INTO `php_goods` VALUES (50, '平板电视1', '5bbd8f5e7c5fb', 4500.00, 4360.00, 15.00, 'kg', 7, 12, 6, '', 'goodsPic\\20181010\\6648cfbe503f740e4da3777f70bfef71.jpg', 'goodsPic\\20181010\\thumb_0_6648cfbe503f740e4da3777f70bfef71.jpg', 'goodsPic\\20181010\\thumb_1_6648cfbe503f740e4da3777f70bfef71.jpg', 'goodsPic\\20181010\\thumb_2_6648cfbe503f740e4da3777f70bfef71.jpg', 1, 1539154565, 1);
INSERT INTO `php_goods` VALUES (51, '平板电视2', '5bbd91ef64d4a', 6000.00, 5700.00, 18.00, 'kg', 7, 12, 6, '', 'goodsPic\\20181010\\434a4a9547d1a34fb53437b9ab2c87cb.jpg', 'goodsPic\\20181010\\thumb_0_434a4a9547d1a34fb53437b9ab2c87cb.jpg', 'goodsPic\\20181010\\thumb_1_434a4a9547d1a34fb53437b9ab2c87cb.jpg', 'goodsPic\\20181010\\thumb_2_434a4a9547d1a34fb53437b9ab2c87cb.jpg', 1, 1539150484, 1);
INSERT INTO `php_goods` VALUES (52, '笔记本2', '5bbd9271a69f5', 7000.00, 7000.00, 2.00, 'kg', 18, 35, 3, '', 'goodsPic\\20181010\\8e30a09e7f96e944a547e7580b1e7eab.jpg', 'goodsPic\\20181010\\thumb_0_8e30a09e7f96e944a547e7580b1e7eab.jpg', 'goodsPic\\20181010\\thumb_1_8e30a09e7f96e944a547e7580b1e7eab.jpg', 'goodsPic\\20181010\\thumb_2_8e30a09e7f96e944a547e7580b1e7eab.jpg', 1, 1539319043, 1);
INSERT INTO `php_goods` VALUES (53, '衬衫1', '5bbd95462a802', 200.00, 188.00, 600.00, 'g', 50, 29, 5, '', 'goodsPic\\20181010\\48a89a9ef2af525631f1b8039b9f9980.jpg', 'goodsPic\\20181010\\thumb_0_48a89a9ef2af525631f1b8039b9f9980.jpg', 'goodsPic\\20181010\\thumb_1_48a89a9ef2af525631f1b8039b9f9980.jpg', 'goodsPic\\20181010\\thumb_2_48a89a9ef2af525631f1b8039b9f9980.jpg', 1, 1539151174, 1);
INSERT INTO `php_goods` VALUES (54, '衬衫2', '5bbd961baab01', 300.00, 288.00, 600.00, 'g', 50, 29, 5, '', 'goodsPic\\20181010\\6a8f212a5bd34e9f5513dd77678c8bc2.jpg', 'goodsPic\\20181010\\thumb_0_6a8f212a5bd34e9f5513dd77678c8bc2.jpg', 'goodsPic\\20181010\\thumb_1_6a8f212a5bd34e9f5513dd77678c8bc2.jpg', 'goodsPic\\20181010\\thumb_2_6a8f212a5bd34e9f5513dd77678c8bc2.jpg', 1, 1540362103, 1);
INSERT INTO `php_goods` VALUES (55, '测试22', '5bd909c556237', 0.01, 0.01, 100.00, 'g', 7, 35, 3, '<p>吞吞吐吐</p>', 'goodsPic/20181031/cf3e338e5e301bbc6c8a7d0001886ff2.jpg', 'goodsPic/20181031/thumb_0_cf3e338e5e301bbc6c8a7d0001886ff2.jpg', 'goodsPic/20181031/thumb_1_cf3e338e5e301bbc6c8a7d0001886ff2.jpg', 'goodsPic/20181031/thumb_2_cf3e338e5e301bbc6c8a7d0001886ff2.jpg', 1, 1540950469, 0);

-- ----------------------------
-- Table structure for php_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `php_goods_attr`;
CREATE TABLE `php_goods_attr`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `attrId` mediumint(8) UNSIGNED NOT NULL COMMENT '属性Id',
  `attrVal` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '属性值',
  `goodsId` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  `attrPrice` decimal(10, 2) NULL DEFAULT NULL COMMENT '不同属性价格',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `goodsId`(`goodsId`) USING BTREE,
  INDEX `attrId`(`attrId`) USING BTREE,
  INDEX `attrVal`(`attrVal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 158 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品属性' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_goods_attr
-- ----------------------------
INSERT INTO `php_goods_attr` VALUES (86, 24, '500GB', 49, 0.00);
INSERT INTO `php_goods_attr` VALUES (87, 24, '1TB', 49, 300.00);
INSERT INTO `php_goods_attr` VALUES (88, 22, 'GTX660', 49, 0.00);
INSERT INTO `php_goods_attr` VALUES (89, 22, 'GTX680', 49, 1000.00);
INSERT INTO `php_goods_attr` VALUES (90, 23, '黄色', 49, 0.00);
INSERT INTO `php_goods_attr` VALUES (91, 7, '8GB', 49, 0.00);
INSERT INTO `php_goods_attr` VALUES (92, 7, '16GB', 49, 1000.00);
INSERT INTO `php_goods_attr` VALUES (93, 4, '酷睿i5', 49, 0.00);
INSERT INTO `php_goods_attr` VALUES (94, 2, '测试厂家', 49, 0.00);
INSERT INTO `php_goods_attr` VALUES (95, 27, '1080P', 50, 0.00);
INSERT INTO `php_goods_attr` VALUES (96, 27, '2K', 50, 1000.00);
INSERT INTO `php_goods_attr` VALUES (97, 27, '4K', 50, 2000.00);
INSERT INTO `php_goods_attr` VALUES (98, 26, '等离子', 50, 0.00);
INSERT INTO `php_goods_attr` VALUES (99, 26, '液晶', 50, 1000.00);
INSERT INTO `php_goods_attr` VALUES (100, 25, '28寸', 50, 0.00);
INSERT INTO `php_goods_attr` VALUES (101, 25, '32寸', 50, 500.00);
INSERT INTO `php_goods_attr` VALUES (102, 25, '38寸', 50, 1000.00);
INSERT INTO `php_goods_attr` VALUES (103, 27, '4K', 51, 0.00);
INSERT INTO `php_goods_attr` VALUES (104, 26, '液晶', 51, 0.00);
INSERT INTO `php_goods_attr` VALUES (105, 25, '45寸', 51, 0.00);
INSERT INTO `php_goods_attr` VALUES (106, 24, '1TB', 52, 0.00);
INSERT INTO `php_goods_attr` VALUES (107, 24, '2TB', 52, 500.00);
INSERT INTO `php_goods_attr` VALUES (108, 22, 'GTX760', 52, 0.00);
INSERT INTO `php_goods_attr` VALUES (109, 22, 'GTX1080', 52, 2000.00);
INSERT INTO `php_goods_attr` VALUES (110, 23, '白色', 52, 0.00);
INSERT INTO `php_goods_attr` VALUES (111, 7, '8GB', 52, 0.00);
INSERT INTO `php_goods_attr` VALUES (112, 7, '16GB', 52, 1000.00);
INSERT INTO `php_goods_attr` VALUES (113, 4, '酷睿i5', 52, 0.00);
INSERT INTO `php_goods_attr` VALUES (114, 4, '酷睿i7', 52, 1000.00);
INSERT INTO `php_goods_attr` VALUES (115, 2, '测试厂家2', 52, 0.00);
INSERT INTO `php_goods_attr` VALUES (116, 19, '', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (117, 18, '', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (118, 17, '', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (119, 15, '', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (120, 14, '', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (121, 13, '', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (122, 12, '', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (123, 11, '', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (124, 10, '', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (125, 9, 'M', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (126, 9, 'XXXL', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (127, 9, 'XXL', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (128, 9, 'L', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (129, 9, 'XL', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (130, 8, '白色', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (131, 8, '黑色', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (132, 8, '紫色', 53, 0.00);
INSERT INTO `php_goods_attr` VALUES (133, 19, '', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (134, 18, '', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (135, 17, '', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (136, 15, '', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (137, 14, '', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (138, 13, '', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (139, 12, '', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (140, 11, '', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (141, 10, '', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (142, 9, 'L', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (143, 9, 'XL', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (144, 9, 'XXL', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (145, 9, 'M', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (146, 9, 'XXXL', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (147, 8, '红色', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (148, 8, '黄色', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (149, 8, '蓝色', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (150, 8, '黑色', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (151, 8, '白色', 54, 0.00);
INSERT INTO `php_goods_attr` VALUES (152, 24, '1TB', 55, 0.00);
INSERT INTO `php_goods_attr` VALUES (153, 22, 'GTX660', 55, 0.00);
INSERT INTO `php_goods_attr` VALUES (154, 23, '蓝色', 55, 0.00);
INSERT INTO `php_goods_attr` VALUES (155, 7, '16GB', 55, 0.00);
INSERT INTO `php_goods_attr` VALUES (156, 4, '酷睿i5', 55, 0.00);
INSERT INTO `php_goods_attr` VALUES (157, 2, '', 55, 0.00);

-- ----------------------------
-- Table structure for php_goods_cat
-- ----------------------------
DROP TABLE IF EXISTS `php_goods_cat`;
CREATE TABLE `php_goods_cat`  (
  `catId` smallint(6) UNSIGNED NOT NULL COMMENT '分类id',
  `goodsId` mediumint(8) UNSIGNED NOT NULL COMMENT '商品id',
  INDEX `catId`(`catId`) USING BTREE,
  INDEX `goodsId`(`goodsId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品扩展分类' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_goods_cat
-- ----------------------------
INSERT INTO `php_goods_cat` VALUES (1, 49);
INSERT INTO `php_goods_cat` VALUES (1, 52);

-- ----------------------------
-- Table structure for php_goods_num
-- ----------------------------
DROP TABLE IF EXISTS `php_goods_num`;
CREATE TABLE `php_goods_num`  (
  `goodsId` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  `num` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '库存量',
  `attrs` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品属性表Id',
  INDEX `goodsId`(`goodsId`) USING BTREE,
  INDEX `attrs`(`attrs`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '库存量' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_goods_num
-- ----------------------------
INSERT INTO `php_goods_num` VALUES (49, 12, '86,88,90,91,93');
INSERT INTO `php_goods_num` VALUES (49, 23, '87,89,90,92,93');
INSERT INTO `php_goods_num` VALUES (50, 50, '95,98,101');
INSERT INTO `php_goods_num` VALUES (50, 60, '96,99,102');
INSERT INTO `php_goods_num` VALUES (50, 23, '97,99,100');
INSERT INTO `php_goods_num` VALUES (51, 80, '103,104,105');
INSERT INTO `php_goods_num` VALUES (53, 50, '125,130');
INSERT INTO `php_goods_num` VALUES (53, 70, '128,130');
INSERT INTO `php_goods_num` VALUES (53, 15, '125,132');
INSERT INTO `php_goods_num` VALUES (52, 25, '106,108,110,111,113');
INSERT INTO `php_goods_num` VALUES (52, 30, '107,109,110,112,114');
INSERT INTO `php_goods_num` VALUES (54, 60, '142,151');
INSERT INTO `php_goods_num` VALUES (54, 30, '143,147');
INSERT INTO `php_goods_num` VALUES (54, 23, '145,150');
INSERT INTO `php_goods_num` VALUES (55, 100, '152,153,154,155,156');

-- ----------------------------
-- Table structure for php_goods_photos
-- ----------------------------
DROP TABLE IF EXISTS `php_goods_photos`;
CREATE TABLE `php_goods_photos`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `goodsId` mediumint(8) UNSIGNED NOT NULL DEFAULT 1 COMMENT '商品Id',
  `photo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '原图',
  `smPhoto` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '小图',
  `mdPhoto` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '中图',
  `bigPhoto` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '大图',
  `randString` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图片对应随机码',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `goodsId`(`goodsId`) USING BTREE,
  INDEX `randString`(`randString`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品相册' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_goods_photos
-- ----------------------------
INSERT INTO `php_goods_photos` VALUES (47, 53, 'goodsPhotos\\20181010\\7e8a70fd46d17182559cd1c12255f446.jpg', 'goodsPhotos\\20181010\\thumb_0_7e8a70fd46d17182559cd1c12255f446.jpg', 'goodsPhotos\\20181010\\thumb_1_7e8a70fd46d17182559cd1c12255f446.jpg', 'goodsPhotos\\20181010\\thumb_2_7e8a70fd46d17182559cd1c12255f446.jpg', 'pYAYQMwlCemjMyq');
INSERT INTO `php_goods_photos` VALUES (43, 49, 'goodsPhotos\\20181010\\d9b862607f162835c89772ac44e9c847.jpg', 'goodsPhotos\\20181010\\thumb_0_d9b862607f162835c89772ac44e9c847.jpg', 'goodsPhotos\\20181010\\thumb_1_d9b862607f162835c89772ac44e9c847.jpg', 'goodsPhotos\\20181010\\thumb_2_d9b862607f162835c89772ac44e9c847.jpg', 'wQxGnoYIhlJzMes');
INSERT INTO `php_goods_photos` VALUES (44, 51, 'goodsPhotos\\20181010\\1fe24366ae85324dd738cd73fd4dfbd6.jpg', 'goodsPhotos\\20181010\\thumb_0_1fe24366ae85324dd738cd73fd4dfbd6.jpg', 'goodsPhotos\\20181010\\thumb_1_1fe24366ae85324dd738cd73fd4dfbd6.jpg', 'goodsPhotos\\20181010\\thumb_2_1fe24366ae85324dd738cd73fd4dfbd6.jpg', 'yewKjrGRrSLsGgM');
INSERT INTO `php_goods_photos` VALUES (45, 51, 'goodsPhotos\\20181010\\b39775d5419a43aaf2f8481e68ab39d4.jpg', 'goodsPhotos\\20181010\\thumb_0_b39775d5419a43aaf2f8481e68ab39d4.jpg', 'goodsPhotos\\20181010\\thumb_1_b39775d5419a43aaf2f8481e68ab39d4.jpg', 'goodsPhotos\\20181010\\thumb_2_b39775d5419a43aaf2f8481e68ab39d4.jpg', 'gdfJPVNgqDvSQMD');
INSERT INTO `php_goods_photos` VALUES (46, 51, 'goodsPhotos\\20181010\\2d88a5e5cdca83a418d4da2262d3ecdb.jpg', 'goodsPhotos\\20181010\\thumb_0_2d88a5e5cdca83a418d4da2262d3ecdb.jpg', 'goodsPhotos\\20181010\\thumb_1_2d88a5e5cdca83a418d4da2262d3ecdb.jpg', 'goodsPhotos\\20181010\\thumb_2_2d88a5e5cdca83a418d4da2262d3ecdb.jpg', 'oDCHFJAjIKGUfWi');
INSERT INTO `php_goods_photos` VALUES (38, 50, 'goodsPhotos\\20181010\\1c9a85ba48a6c0d570156237c2490d60.jpg', 'goodsPhotos\\20181010\\thumb_0_1c9a85ba48a6c0d570156237c2490d60.jpg', 'goodsPhotos\\20181010\\thumb_1_1c9a85ba48a6c0d570156237c2490d60.jpg', 'goodsPhotos\\20181010\\thumb_2_1c9a85ba48a6c0d570156237c2490d60.jpg', 'HTvKJKhEurNmCKh');
INSERT INTO `php_goods_photos` VALUES (39, 50, 'goodsPhotos\\20181010\\aea70d0ccc714cd7233e4512f9c39864.jpg', 'goodsPhotos\\20181010\\thumb_0_aea70d0ccc714cd7233e4512f9c39864.jpg', 'goodsPhotos\\20181010\\thumb_1_aea70d0ccc714cd7233e4512f9c39864.jpg', 'goodsPhotos\\20181010\\thumb_2_aea70d0ccc714cd7233e4512f9c39864.jpg', 'eLbucNrjVkcUeuV');
INSERT INTO `php_goods_photos` VALUES (40, 50, 'goodsPhotos\\20181010\\d76194a2c092cfd4f11e4a329a60ec44.jpg', 'goodsPhotos\\20181010\\thumb_0_d76194a2c092cfd4f11e4a329a60ec44.jpg', 'goodsPhotos\\20181010\\thumb_1_d76194a2c092cfd4f11e4a329a60ec44.jpg', 'goodsPhotos\\20181010\\thumb_2_d76194a2c092cfd4f11e4a329a60ec44.jpg', 'fvxVujjFogQUJjW');
INSERT INTO `php_goods_photos` VALUES (41, 49, 'goodsPhotos\\20181010\\40d5b351996aae53f07c594273bd3a5a.jpg', 'goodsPhotos\\20181010\\thumb_0_40d5b351996aae53f07c594273bd3a5a.jpg', 'goodsPhotos\\20181010\\thumb_1_40d5b351996aae53f07c594273bd3a5a.jpg', 'goodsPhotos\\20181010\\thumb_2_40d5b351996aae53f07c594273bd3a5a.jpg', 'ewoGtUENMxLPDAf');
INSERT INTO `php_goods_photos` VALUES (42, 49, 'goodsPhotos\\20181010\\8b961efa0e78f4a3cdf9265fb76acda6.jpg', 'goodsPhotos\\20181010\\thumb_0_8b961efa0e78f4a3cdf9265fb76acda6.jpg', 'goodsPhotos\\20181010\\thumb_1_8b961efa0e78f4a3cdf9265fb76acda6.jpg', 'goodsPhotos\\20181010\\thumb_2_8b961efa0e78f4a3cdf9265fb76acda6.jpg', 'lLiXNJmaSVSPFgp');
INSERT INTO `php_goods_photos` VALUES (48, 53, 'goodsPhotos\\20181010\\73946cc7d7d7381bfc82821706c79a50.jpg', 'goodsPhotos\\20181010\\thumb_0_73946cc7d7d7381bfc82821706c79a50.jpg', 'goodsPhotos\\20181010\\thumb_1_73946cc7d7d7381bfc82821706c79a50.jpg', 'goodsPhotos\\20181010\\thumb_2_73946cc7d7d7381bfc82821706c79a50.jpg', 'oLPXLpJXbORrgxE');
INSERT INTO `php_goods_photos` VALUES (49, 53, 'goodsPhotos\\20181010\\c2e4cb1737eb2df3f719fbd87a621311.jpg', 'goodsPhotos\\20181010\\thumb_0_c2e4cb1737eb2df3f719fbd87a621311.jpg', 'goodsPhotos\\20181010\\thumb_1_c2e4cb1737eb2df3f719fbd87a621311.jpg', 'goodsPhotos\\20181010\\thumb_2_c2e4cb1737eb2df3f719fbd87a621311.jpg', 'ieeNtvglpqyCzoY');
INSERT INTO `php_goods_photos` VALUES (50, 52, 'goodsPhotos\\20181010\\47115423ac6333109da1b82416e7d979.jpg', 'goodsPhotos\\20181010\\thumb_0_47115423ac6333109da1b82416e7d979.jpg', 'goodsPhotos\\20181010\\thumb_1_47115423ac6333109da1b82416e7d979.jpg', 'goodsPhotos\\20181010\\thumb_2_47115423ac6333109da1b82416e7d979.jpg', 'SWexCiKdfkLgOse');
INSERT INTO `php_goods_photos` VALUES (51, 52, 'goodsPhotos\\20181010\\304f31abe5ad3d4da485582a242c2393.jpg', 'goodsPhotos\\20181010\\thumb_0_304f31abe5ad3d4da485582a242c2393.jpg', 'goodsPhotos\\20181010\\thumb_1_304f31abe5ad3d4da485582a242c2393.jpg', 'goodsPhotos\\20181010\\thumb_2_304f31abe5ad3d4da485582a242c2393.jpg', 'dsHGcpYHdrNjOKX');
INSERT INTO `php_goods_photos` VALUES (52, 52, 'goodsPhotos\\20181010\\7f0add349bcca9a861b3a1140733fa6d.jpg', 'goodsPhotos\\20181010\\thumb_0_7f0add349bcca9a861b3a1140733fa6d.jpg', 'goodsPhotos\\20181010\\thumb_1_7f0add349bcca9a861b3a1140733fa6d.jpg', 'goodsPhotos\\20181010\\thumb_2_7f0add349bcca9a861b3a1140733fa6d.jpg', 'ijqbPSjVrWLsBSk');
INSERT INTO `php_goods_photos` VALUES (53, 54, 'goodsPhotos\\20181010\\e6fb6af869e438fe96c62b85b289b6e0.jpg', 'goodsPhotos\\20181010\\thumb_0_e6fb6af869e438fe96c62b85b289b6e0.jpg', 'goodsPhotos\\20181010\\thumb_1_e6fb6af869e438fe96c62b85b289b6e0.jpg', 'goodsPhotos\\20181010\\thumb_2_e6fb6af869e438fe96c62b85b289b6e0.jpg', 'jaoarGoascNYQmc');
INSERT INTO `php_goods_photos` VALUES (54, 54, 'goodsPhotos\\20181010\\05731e58c0e788912880b4b2f30ef474.jpg', 'goodsPhotos\\20181010\\thumb_0_05731e58c0e788912880b4b2f30ef474.jpg', 'goodsPhotos\\20181010\\thumb_1_05731e58c0e788912880b4b2f30ef474.jpg', 'goodsPhotos\\20181010\\thumb_2_05731e58c0e788912880b4b2f30ef474.jpg', 'jHLlVrSgNfWnXFK');
INSERT INTO `php_goods_photos` VALUES (55, 54, 'goodsPhotos\\20181010\\cdd5bc81cefefe2d7e383d8b37539f7e.jpg', 'goodsPhotos\\20181010\\thumb_0_cdd5bc81cefefe2d7e383d8b37539f7e.jpg', 'goodsPhotos\\20181010\\thumb_1_cdd5bc81cefefe2d7e383d8b37539f7e.jpg', 'goodsPhotos\\20181010\\thumb_2_cdd5bc81cefefe2d7e383d8b37539f7e.jpg', 'pzhunpMxpMGMNSc');
INSERT INTO `php_goods_photos` VALUES (56, 53, 'goodsPhotos/20181031/5c7d5cc961a8de3178966c51baffd711.jpg', 'goodsPhotos/20181031/thumb_0_5c7d5cc961a8de3178966c51baffd711.jpg', 'goodsPhotos/20181031/thumb_1_5c7d5cc961a8de3178966c51baffd711.jpg', 'goodsPhotos/20181031/thumb_2_5c7d5cc961a8de3178966c51baffd711.jpg', 'bYEvLSBOZIdodAO');

-- ----------------------------
-- Table structure for php_member_level
-- ----------------------------
DROP TABLE IF EXISTS `php_member_level`;
CREATE TABLE `php_member_level`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `levelName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '级别名称',
  `bottom` int(10) UNSIGNED NOT NULL COMMENT '积分下限',
  `top` int(10) UNSIGNED NOT NULL COMMENT '积分上限',
  `rate` tinyint(3) UNSIGNED NOT NULL DEFAULT 100 COMMENT '折扣率',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '会员级别' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_member_level
-- ----------------------------
INSERT INTO `php_member_level` VALUES (3, '注册会员', 0, 10000, 100);
INSERT INTO `php_member_level` VALUES (4, '中级会员', 10001, 20000, 90);
INSERT INTO `php_member_level` VALUES (5, '高级会员', 20001, 30000, 80);

-- ----------------------------
-- Table structure for php_member_price
-- ----------------------------
DROP TABLE IF EXISTS `php_member_price`;
CREATE TABLE `php_member_price`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `levelId` smallint(6) NOT NULL COMMENT '级别Id',
  `goodsId` mediumint(9) NOT NULL COMMENT '商品Id',
  `memPrice` decimal(10, 2) NULL DEFAULT NULL COMMENT '会员价格',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `levelId`(`levelId`) USING BTREE,
  INDEX `goodsId`(`goodsId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '会员价格' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_member_price
-- ----------------------------
INSERT INTO `php_member_price` VALUES (67, 3, 49, 4988.00);
INSERT INTO `php_member_price` VALUES (68, 4, 49, 4489.20);
INSERT INTO `php_member_price` VALUES (69, 5, 49, 3990.40);
INSERT INTO `php_member_price` VALUES (70, 3, 50, 4360.00);
INSERT INTO `php_member_price` VALUES (71, 4, 50, 3924.00);
INSERT INTO `php_member_price` VALUES (72, 5, 50, 3488.00);
INSERT INTO `php_member_price` VALUES (73, 3, 51, 5700.00);
INSERT INTO `php_member_price` VALUES (74, 4, 51, 5130.00);
INSERT INTO `php_member_price` VALUES (75, 5, 51, 4560.00);
INSERT INTO `php_member_price` VALUES (76, 3, 52, 7000.00);
INSERT INTO `php_member_price` VALUES (77, 4, 52, 6300.00);
INSERT INTO `php_member_price` VALUES (78, 5, 52, 5600.00);
INSERT INTO `php_member_price` VALUES (79, 3, 53, 188.00);
INSERT INTO `php_member_price` VALUES (80, 4, 53, 169.20);
INSERT INTO `php_member_price` VALUES (81, 5, 53, 150.40);
INSERT INTO `php_member_price` VALUES (82, 3, 54, 288.00);
INSERT INTO `php_member_price` VALUES (83, 4, 54, 259.20);
INSERT INTO `php_member_price` VALUES (84, 5, 54, 230.40);

-- ----------------------------
-- Table structure for php_nav
-- ----------------------------
DROP TABLE IF EXISTS `php_nav`;
CREATE TABLE `php_nav`  (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `navName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '导航名称',
  `navUrl` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '导航地址',
  `open` tinyint(1) NOT NULL DEFAULT 1 COMMENT '打开方式 1：新标签 2：当前页',
  `pos` tinyint(1) NOT NULL DEFAULT 1 COMMENT '显示位置：1：顶部 2：中间 3：底部',
  `sort` smallint(6) NOT NULL DEFAULT 50 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '导航' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_nav
-- ----------------------------
INSERT INTO `php_nav` VALUES (1, '我的订单', 'http://tongpankt.com', 2, 1, 50);
INSERT INTO `php_nav` VALUES (2, '我的浏览', 'http://tongpankt.com', 1, 1, 50);
INSERT INTO `php_nav` VALUES (3, '我的收藏', 'http://tongpankt.com', 1, 1, 50);
INSERT INTO `php_nav` VALUES (4, '客户服务', 'http://tongpankt.com', 1, 1, 50);
INSERT INTO `php_nav` VALUES (5, '女人街', 'http://tongpankt.com', 1, 2, 50);
INSERT INTO `php_nav` VALUES (6, '男人柜', 'http://tongpankt.com', 1, 2, 50);
INSERT INTO `php_nav` VALUES (7, '品牌专区', 'http://tongpankt.com', 1, 2, 50);
INSERT INTO `php_nav` VALUES (8, '聚划算', 'http://tongpankt.com', 1, 2, 50);
INSERT INTO `php_nav` VALUES (9, '积分商城', 'http://tongpankt.com', 1, 2, 50);

-- ----------------------------
-- Table structure for php_order
-- ----------------------------
DROP TABLE IF EXISTS `php_order`;
CREATE TABLE `php_order`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `outTradeNo` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `userId` mediumint(9) NOT NULL COMMENT '下单用户id',
  `goodsTotalPrice` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '商品总额',
  `orderTotalPrice` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '订单总额',
  `payment` tinyint(1) NOT NULL COMMENT '支付方式1支付宝2微信3微信第三方4余额',
  `distribution` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配送方式 申通、顺丰、圆通',
  `orderStatus` tinyint(1) NOT NULL DEFAULT 0 COMMENT '订单状态0未确认1已确认2申请退款3退款成功',
  `payStatus` tinyint(1) NOT NULL DEFAULT 0 COMMENT '支付状态0未支付1已支付',
  `postStatus` tinyint(1) NOT NULL DEFAULT 0 COMMENT '配送状态0未发货1已发货2已收货',
  `postSpant` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '运费',
  `remark` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '订单备注',
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收货人姓名',
  `province` char(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '省份',
  `city` char(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '市',
  `county` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '区',
  `address` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '具体地址',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `orderTime` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1531291609' COMMENT '下单时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `userId`(`userId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_order
-- ----------------------------
INSERT INTO `php_order` VALUES (1, '1539924981795979', 6, 952.00, 952.00, 1, '顺丰', 0, 1, 0, 0.00, '666', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1539924981');
INSERT INTO `php_order` VALUES (2, '1539925243318522', 6, 18500.00, 18500.00, 1, '顺丰', 0, 1, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1539925243');
INSERT INTO `php_order` VALUES (3, '1539925392463894', 6, 43708.00, 43708.00, 1, '顺丰', 0, 1, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1539925392');
INSERT INTO `php_order` VALUES (4, '1539925642192681', 6, 10160.00, 10160.00, 1, '顺丰', 0, 1, 0, 0.00, '78787', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1539925642');
INSERT INTO `php_order` VALUES (5, '1540950885124825', 6, 0.01, 0.01, 3, '顺丰', 0, 0, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1540950885');
INSERT INTO `php_order` VALUES (6, '1540950943286452', 6, 0.01, 0.01, 2, '顺丰', 0, 0, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1540950943');
INSERT INTO `php_order` VALUES (7, '1540951241878365', 6, 0.01, 0.01, 2, '顺丰', 0, 1, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1540951241');
INSERT INTO `php_order` VALUES (8, '1540951360313703', 6, 0.01, 0.01, 1, '顺丰', 0, 1, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1540951360');
INSERT INTO `php_order` VALUES (9, '1540951442190230', 6, 0.01, 0.01, 2, '顺丰', 0, 1, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1540951442');
INSERT INTO `php_order` VALUES (10, '1540951663389570', 6, 0.01, 0.01, 2, '顺丰', 0, 1, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1540951663');
INSERT INTO `php_order` VALUES (11, '1540980467223002', 6, 0.01, 0.01, 1, '顺丰', 0, 1, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1540980467');
INSERT INTO `php_order` VALUES (12, '1542503053569552', 6, 0.01, 0.01, 1, '顺丰', 0, 0, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1542503053');
INSERT INTO `php_order` VALUES (13, '1542504250867404', 6, 0.01, 0.01, 1, '顺丰', 0, 0, 0, 0.00, '', 'ming xiao', '河北省', '张家口市', '宣化区', '北京', '15161699059', '1542504250');

-- ----------------------------
-- Table structure for php_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `php_order_goods`;
CREATE TABLE `php_order_goods`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `goodsId` mediumint(9) NOT NULL COMMENT '商品id',
  `goodsName` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品名称',
  `goodsMemberPrice` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '商品会员价',
  `goodsMarketPrice` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '商品市场价',
  `goodsAttrId` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品属性id',
  `goodsAttrStr` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品属性',
  `goodsNum` mediumint(9) NOT NULL COMMENT '商品数量',
  `orderId` mediumint(9) NOT NULL COMMENT '所属订单',
  `goodsShopPrice` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '商品本店价',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `goodsId`(`goodsId`) USING BTREE,
  INDEX `orderId`(`orderId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单商品表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_order_goods
-- ----------------------------
INSERT INTO `php_order_goods` VALUES (1, 53, '衬衫1', 188.00, 200.00, '130,125', '尺码:M（￥0.00元）<br />颜色:白色（￥0.00元）', 2, 1, 188.00);
INSERT INTO `php_order_goods` VALUES (2, 54, '衬衫2', 288.00, 300.00, '147,142', '尺码:L（￥0.00元）<br />颜色:红色（￥0.00元）', 2, 1, 288.00);
INSERT INTO `php_order_goods` VALUES (3, 52, '笔记本2', 7000.00, 7000.00, '113,111,110,108,106', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX760（￥0.00元）<br />颜色:白色（￥0.00元）<br />内存:8GB（￥0.00元）<br />CPU:core i5（￥0.00元）', 1, 2, 7000.00);
INSERT INTO `php_order_goods` VALUES (4, 52, '笔记本2', 11500.00, 7000.00, '114,112,110,109,107', '硬盘容量:2TB（￥500.00元）<br />显卡:GTX1080（￥2000.00元）<br />颜色:白色（￥0.00元）<br />内存:16GB（￥1000.00元）<br />CPU:core  i7（￥1000.00元）', 1, 2, 11500.00);
INSERT INTO `php_order_goods` VALUES (5, 52, '笔记本2', 7000.00, 7000.00, '113,111,110,108,106', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX760（￥0.00元）<br />颜色:白色（￥0.00元）<br />内存:8GB（￥0.00元）<br />CPU:core i5（￥0.00元）', 1, 3, 7000.00);
INSERT INTO `php_order_goods` VALUES (6, 52, '笔记本2', 11500.00, 7000.00, '114,112,110,109,107', '硬盘容量:2TB（￥500.00元）<br />显卡:GTX1080（￥2000.00元）<br />颜色:白色（￥0.00元）<br />内存:16GB（￥1000.00元）<br />CPU:core  i7（￥1000.00元）', 2, 3, 11500.00);
INSERT INTO `php_order_goods` VALUES (7, 49, '笔记本1', 4988.00, 5000.00, '93,91,90,88,86', '硬盘容量:500GB（￥0.00元）<br />显卡:GTX660（￥0.00元）<br />颜色:黄色（￥0.00元）<br />内存:8GB（￥0.00元）<br />CPU:core i5（￥0.00元）', 1, 3, 4988.00);
INSERT INTO `php_order_goods` VALUES (8, 50, '平板电视1', 4360.00, 4500.00, '100,98,95', '分辨率:1080P（￥0.00元）<br />类型:等离子（￥0.00元）<br />尺寸:28寸（￥0.00元）', 2, 3, 4360.00);
INSERT INTO `php_order_goods` VALUES (9, 50, '平板电视1', 4360.00, 4500.00, '100,98,95', '分辨率:1080P（￥0.00元）<br />类型:等离子（￥0.00元）<br />尺寸:28寸（￥0.00元）', 2, 4, 4360.00);
INSERT INTO `php_order_goods` VALUES (10, 54, '衬衫2', 288.00, 300.00, '147,142', '尺码:L（￥0.00元）<br />颜色:红色（￥0.00元）', 2, 4, 288.00);
INSERT INTO `php_order_goods` VALUES (11, 54, '衬衫2', 288.00, 300.00, '150,142', '尺码:L（￥0.00元）<br />颜色:黑色（￥0.00元）', 1, 4, 288.00);
INSERT INTO `php_order_goods` VALUES (12, 54, '衬衫2', 288.00, 300.00, '150,145', '尺码:M（￥0.00元）<br />颜色:黑色（￥0.00元）', 2, 4, 288.00);
INSERT INTO `php_order_goods` VALUES (13, 55, '测试22', 0.01, 0.01, '152,153,154,155,156', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX660（￥0.00元）<br />颜色:蓝色（￥0.00元）<br />内存:16GB（￥0.00元）<br />CPU:core i5（￥0.00元）', 1, 5, 0.01);
INSERT INTO `php_order_goods` VALUES (14, 55, '测试22', 0.01, 0.01, '152,153,154,155,156', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX660（￥0.00元）<br />颜色:蓝色（￥0.00元）<br />内存:16GB（￥0.00元）<br />CPU:core i5（￥0.00元）', 1, 6, 0.01);
INSERT INTO `php_order_goods` VALUES (15, 55, '测试22', 0.01, 0.01, '152,153,154,155,156', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX660（￥0.00元）<br />颜色:蓝色（￥0.00元）<br />内存:16GB（￥0.00元）<br />CPU:core i5（￥0.00元）', 1, 7, 0.01);
INSERT INTO `php_order_goods` VALUES (16, 55, '测试22', 0.01, 0.01, '152,153,154,155,156', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX660（￥0.00元）<br />颜色:蓝色（￥0.00元）<br />内存:16GB（￥0.00元）<br />CPU:core i5（￥0.00元）', 1, 8, 0.01);
INSERT INTO `php_order_goods` VALUES (17, 55, '测试22', 0.01, 0.01, '152,153,154,155,156', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX660（￥0.00元）<br />颜色:蓝色（￥0.00元）<br />内存:16GB（￥0.00元）<br />CPU:core i5（￥0.00元）', 1, 9, 0.01);
INSERT INTO `php_order_goods` VALUES (18, 55, '测试22', 0.01, 0.01, '152,153,154,155,156', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX660（￥0.00元）<br />颜色:蓝色（￥0.00元）<br />内存:16GB（￥0.00元）<br />CPU:core i5（￥0.00元）', 1, 10, 0.01);
INSERT INTO `php_order_goods` VALUES (19, 55, '测试22', 0.01, 0.01, '152,153,154,155,156', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX660（￥0.00元）<br />颜色:蓝色（￥0.00元）<br />内存:16GB（￥0.00元）<br />CPU:core i5（￥0.00元）', 1, 11, 0.01);
INSERT INTO `php_order_goods` VALUES (20, 55, '测试22', 0.01, 0.01, '152,153,154,155,156', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX660（￥0.00元）<br />颜色:蓝色（￥0.00元）<br />内存:16GB（￥0.00元）<br />CPU:酷睿i5（￥0.00元）', 1, 12, 0.01);
INSERT INTO `php_order_goods` VALUES (21, 55, '测试22', 0.01, 0.01, '152,153,154,155,156', '硬盘容量:1TB（￥0.00元）<br />显卡:GTX660（￥0.00元）<br />颜色:蓝色（￥0.00元）<br />内存:16GB（￥0.00元）<br />CPU:酷睿i5（￥0.00元）', 1, 13, 0.01);

-- ----------------------------
-- Table structure for php_rec_item
-- ----------------------------
DROP TABLE IF EXISTS `php_rec_item`;
CREATE TABLE `php_rec_item`  (
  `recposId` smallint(5) UNSIGNED NOT NULL COMMENT '推荐位id',
  `valId` mediumint(8) UNSIGNED NOT NULL COMMENT '商品或商品分类id',
  `valType` tinyint(1) NOT NULL DEFAULT 1 COMMENT '推荐类型 1：商品 2：商品分类'
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '推荐位数据表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of php_rec_item
-- ----------------------------
INSERT INTO `php_rec_item` VALUES (5, 1, 2);
INSERT INTO `php_rec_item` VALUES (6, 35, 2);
INSERT INTO `php_rec_item` VALUES (5, 35, 2);
INSERT INTO `php_rec_item` VALUES (8, 49, 1);
INSERT INTO `php_rec_item` VALUES (7, 49, 1);
INSERT INTO `php_rec_item` VALUES (6, 10, 2);
INSERT INTO `php_rec_item` VALUES (5, 33, 2);
INSERT INTO `php_rec_item` VALUES (8, 50, 1);
INSERT INTO `php_rec_item` VALUES (5, 10, 2);
INSERT INTO `php_rec_item` VALUES (6, 7, 2);
INSERT INTO `php_rec_item` VALUES (5, 27, 2);
INSERT INTO `php_rec_item` VALUES (8, 52, 1);
INSERT INTO `php_rec_item` VALUES (7, 52, 1);
INSERT INTO `php_rec_item` VALUES (8, 51, 1);
INSERT INTO `php_rec_item` VALUES (7, 51, 1);
INSERT INTO `php_rec_item` VALUES (4, 51, 1);
INSERT INTO `php_rec_item` VALUES (7, 50, 1);
INSERT INTO `php_rec_item` VALUES (4, 50, 1);
INSERT INTO `php_rec_item` VALUES (4, 49, 1);
INSERT INTO `php_rec_item` VALUES (6, 34, 2);
INSERT INTO `php_rec_item` VALUES (5, 34, 2);
INSERT INTO `php_rec_item` VALUES (5, 2, 2);
INSERT INTO `php_rec_item` VALUES (6, 11, 2);
INSERT INTO `php_rec_item` VALUES (6, 4, 2);
INSERT INTO `php_rec_item` VALUES (7, 53, 1);
INSERT INTO `php_rec_item` VALUES (4, 53, 1);
INSERT INTO `php_rec_item` VALUES (2, 53, 1);
INSERT INTO `php_rec_item` VALUES (6, 36, 2);
INSERT INTO `php_rec_item` VALUES (3, 49, 1);
INSERT INTO `php_rec_item` VALUES (2, 49, 1);
INSERT INTO `php_rec_item` VALUES (2, 50, 1);
INSERT INTO `php_rec_item` VALUES (2, 51, 1);
INSERT INTO `php_rec_item` VALUES (2, 52, 1);
INSERT INTO `php_rec_item` VALUES (6, 28, 2);
INSERT INTO `php_rec_item` VALUES (8, 53, 1);
INSERT INTO `php_rec_item` VALUES (2, 55, 1);
INSERT INTO `php_rec_item` VALUES (4, 55, 1);
INSERT INTO `php_rec_item` VALUES (7, 55, 1);
INSERT INTO `php_rec_item` VALUES (8, 55, 1);

-- ----------------------------
-- Table structure for php_rec_pos
-- ----------------------------
DROP TABLE IF EXISTS `php_rec_pos`;
CREATE TABLE `php_rec_pos`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `recName` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '推荐位名称',
  `recType` tinyint(1) NOT NULL DEFAULT 1 COMMENT '推荐位类型 1：商品 2：分类',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '推荐位表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_rec_pos
-- ----------------------------
INSERT INTO `php_rec_pos` VALUES (2, '热卖商品', 1);
INSERT INTO `php_rec_pos` VALUES (3, '限时抢购', 1);
INSERT INTO `php_rec_pos` VALUES (4, '新品推荐', 1);
INSERT INTO `php_rec_pos` VALUES (5, '首页推荐', 2);
INSERT INTO `php_rec_pos` VALUES (6, '推荐分类', 2);
INSERT INTO `php_rec_pos` VALUES (7, '精品推荐', 1);
INSERT INTO `php_rec_pos` VALUES (8, '首页商品', 1);

-- ----------------------------
-- Table structure for php_session
-- ----------------------------
DROP TABLE IF EXISTS `php_session`;
CREATE TABLE `php_session`  (
  `session_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `session_expire` int(11) UNSIGNED NOT NULL,
  `session_data` blob NULL,
  UNIQUE INDEX `session_id`(`session_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'session数据表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_session
-- ----------------------------
INSERT INTO `php_session` VALUES ('php_v9mprd2fbjeg16mabev7luanf4', 1543734496, 0x6473635F746F6B656E7C733A33323A223265303431336463306462616566376330373636666662623266396165646566223B7569647C693A363B757365726E616D657C733A343A22726F6F74223B6C6576656C49647C693A333B726174657C693A3130303B);

-- ----------------------------
-- Table structure for php_slider
-- ----------------------------
DROP TABLE IF EXISTS `php_slider`;
CREATE TABLE `php_slider`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `pic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '轮播图',
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '名称',
  `url` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '链接地址',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否开启1:开启0:关闭',
  `sort` smallint(5) NOT NULL DEFAULT 50 COMMENT '栏目排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '轮播图' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_slider
-- ----------------------------
INSERT INTO `php_slider` VALUES (1, 'sliderPic\\20180311\\8ef788f5e1d08eacc0d2f6916556b0b7.jpg', '44d', 'affas', 1, 50);
INSERT INTO `php_slider` VALUES (3, 'sliderPic\\20180311\\fee28ecf0682833104873642d054c081.jpg', '558', '55', 1, 50);

-- ----------------------------
-- Table structure for php_type
-- ----------------------------
DROP TABLE IF EXISTS `php_type`;
CREATE TABLE `php_type`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `typeName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '属性名称',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `typeName`(`typeName`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品类型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_type
-- ----------------------------
INSERT INTO `php_type` VALUES (6, '电视');
INSERT INTO `php_type` VALUES (3, '笔记本');
INSERT INTO `php_type` VALUES (5, '女装');

-- ----------------------------
-- Table structure for php_user
-- ----------------------------
DROP TABLE IF EXISTS `php_user`;
CREATE TABLE `php_user`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `userName` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `password` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `eChecked` tinyint(1) NOT NULL DEFAULT 0 COMMENT '邮箱是否验证：1：是 0：否',
  `tel` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `tChecked` tinyint(1) NOT NULL DEFAULT 0 COMMENT '手机是否验证：1：是 0：否',
  `randString` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码盐值',
  `regType` tinyint(1) NOT NULL DEFAULT 1 COMMENT '验证标识：1：手机 0：邮箱 2：手机和邮箱',
  `regTime` int(10) NOT NULL COMMENT '注册时间',
  `points` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '积分',
  `avator` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户头像',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `userName`(`userName`) USING BTREE,
  INDEX `randString`(`randString`) USING BTREE,
  INDEX `email`(`email`) USING BTREE,
  INDEX `regType`(`regType`) USING BTREE,
  INDEX `regTime`(`regTime`) USING BTREE,
  INDEX `points`(`points`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_user
-- ----------------------------
INSERT INTO `php_user` VALUES (6, 'root', 'bd26110e29d6efa9de86221849cd12744cd734d3', '', 0, '15161699059', 1, 'MqCWgeawHAFmJAc', 1, 1521237483, 0, '');
INSERT INTO `php_user` VALUES (8, 'xm11211', '', '980172892@qq.com', 1, '', 0, 'NDgCaBvhFDlsnvb', 0, 1536211023, 0, '');
INSERT INTO `php_user` VALUES (9, 'xm11212', '9a6a42082dfa3618c53fc59e57214a2b877808f0', '', 0, '18012496756', 1, 'zKMDXovWQmizfqT', 1, 1535866876, 0, '');
INSERT INTO `php_user` VALUES (10, 'xm11213', '8d11509a75589d8b979e4cf49ea472add1070aef', 'xiaoming6351@gmail.com', 0, '13915348602', 1, 'AVURWyWFylAblOO', 1, 1536211836, 25000, 'userPic\\20180906\\691ebdfea07ce60423dc0b4748e59afd.jpg');

-- ----------------------------
-- Table structure for php_wea
-- ----------------------------
DROP TABLE IF EXISTS `php_wea`;
CREATE TABLE `php_wea`  (
  `wid` tinyint(3) UNSIGNED NOT NULL COMMENT '天气状况代号',
  `weacss` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '前端对应样式',
  INDEX `wid`(`wid`) USING BTREE,
  INDEX `weacss`(`weacss`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '天气种类表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of php_wea
-- ----------------------------
INSERT INTO `php_wea` VALUES (0, 'wi-day-sunny');
INSERT INTO `php_wea` VALUES (1, 'wi-night-clear');
INSERT INTO `php_wea` VALUES (2, 'wi-day-sunny');
INSERT INTO `php_wea` VALUES (3, 'wi-night-clear');
INSERT INTO `php_wea` VALUES (4, 'wi-day-cloudy');
INSERT INTO `php_wea` VALUES (5, 'wi-day-cloudy');
INSERT INTO `php_wea` VALUES (6, 'wi-night-cloudy');
INSERT INTO `php_wea` VALUES (7, 'wi-day-cloudy');
INSERT INTO `php_wea` VALUES (8, 'wi-night-cloudy');
INSERT INTO `php_wea` VALUES (9, 'wi-cloudy');
INSERT INTO `php_wea` VALUES (10, 'wi-showers');
INSERT INTO `php_wea` VALUES (11, 'wi-storm-showers');
INSERT INTO `php_wea` VALUES (12, 'wi-storm-showers');
INSERT INTO `php_wea` VALUES (13, 'wi-rain-mix');
INSERT INTO `php_wea` VALUES (14, 'wi-rain-mix');
INSERT INTO `php_wea` VALUES (15, 'wi-rain-wind');
INSERT INTO `php_wea` VALUES (16, 'wi-rain');
INSERT INTO `php_wea` VALUES (17, 'wi-thunderstorm');
INSERT INTO `php_wea` VALUES (18, 'wi-thunderstorm');
INSERT INTO `php_wea` VALUES (19, 'wi-rain-mix');
INSERT INTO `php_wea` VALUES (20, 'wi-rain-mix');
INSERT INTO `php_wea` VALUES (21, 'wi-snow');
INSERT INTO `php_wea` VALUES (22, 'wi-snow');
INSERT INTO `php_wea` VALUES (23, 'wi-snow');
INSERT INTO `php_wea` VALUES (24, 'wi-snow');
INSERT INTO `php_wea` VALUES (25, 'wi-snow');
INSERT INTO `php_wea` VALUES (26, 'wi-dust');
INSERT INTO `php_wea` VALUES (27, 'wi-dust');
INSERT INTO `php_wea` VALUES (28, 'wi-dust');
INSERT INTO `php_wea` VALUES (29, 'wi-dust');
INSERT INTO `php_wea` VALUES (30, 'wi-fog');
INSERT INTO `php_wea` VALUES (31, 'wi-dust');
INSERT INTO `php_wea` VALUES (32, 'wi-windy');
INSERT INTO `php_wea` VALUES (33, 'wi-strong-wind');
INSERT INTO `php_wea` VALUES (34, 'wi-hurricane');
INSERT INTO `php_wea` VALUES (35, 'wi-lightning');
INSERT INTO `php_wea` VALUES (36, 'wi-tornado');
INSERT INTO `php_wea` VALUES (37, 'wi-snowflake-cold');
INSERT INTO `php_wea` VALUES (38, 'wi-hot');
INSERT INTO `php_wea` VALUES (99, 'wi-alien');

SET FOREIGN_KEY_CHECKS = 1;

/*
Navicat MySQL Data Transfer

Source Server         : blog
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : ebay

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-11-28 09:46:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ad
-- ----------------------------
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ad
-- ----------------------------
INSERT INTO `ad` VALUES ('1', 'hhhhhhhhhhhh', '22222', 'hhhhh', 'hhhhhh', '1');
INSERT INTO `ad` VALUES ('2', 'llllll', 'lllll', 'lllll', 'lllll', '2');

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `goods_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for classify
-- ----------------------------
DROP TABLE IF EXISTS `classify`;
CREATE TABLE `classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of classify
-- ----------------------------
INSERT INTO `classify` VALUES ('1', '服装', '0', '1');
INSERT INTO `classify` VALUES ('2', '鞋类', '0', '1');
INSERT INTO `classify` VALUES ('3', '男装', '1', '1');
INSERT INTO `classify` VALUES ('4', '男鞋', '2', '1');
INSERT INTO `classify` VALUES ('5', '女鞋', '2', '1');
INSERT INTO `classify` VALUES ('6', '包袋', '0', '1');
INSERT INTO `classify` VALUES ('7', '女士包包', '6', '1');
INSERT INTO `classify` VALUES ('8', '饮食', '0', '1');
INSERT INTO `classify` VALUES ('9', ' 家居', '0', '1');
INSERT INTO `classify` VALUES ('10', '酒水', '8', '1');
INSERT INTO `classify` VALUES ('11', '地方特产', '8', '1');
INSERT INTO `classify` VALUES ('12', '装饰', '9', '1');
INSERT INTO `classify` VALUES ('13', '家纺', '9', '1');
INSERT INTO `classify` VALUES ('14', '双肩包', '6', '1');
INSERT INTO `classify` VALUES ('15', '单肩包', '6', '1');
INSERT INTO `classify` VALUES ('16', '斜挎包', '6', '1');
INSERT INTO `classify` VALUES ('17', '手提包', '6', '1');
INSERT INTO `classify` VALUES ('18', '棉鞋', '2', '1');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `classify_id` int(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `status` int(255) NOT NULL DEFAULT '0',
  `market_price` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '阿迪达斯跑步211', '4', '400.00', '1', '1', '900.00');
INSERT INTO `goods` VALUES ('2', '阿迪达斯跑步210', '4', '300.00', '1', '1', '600.00');
INSERT INTO `goods` VALUES ('3', '香奈儿女士包包R199', '7', '600.00', '2', '1', '700.00');
INSERT INTO `goods` VALUES ('4', '斜跨包', '7', '400.00', '2', '1', '800.00');
INSERT INTO `goods` VALUES ('5', '阿迪达斯女休闲鞋x889', '5', '333.00', '1', '1', '500.00');

-- ----------------------------
-- Table structure for goods_image
-- ----------------------------
DROP TABLE IF EXISTS `goods_image`;
CREATE TABLE `goods_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_image
-- ----------------------------
INSERT INTO `goods_image` VALUES ('11', '1', 'goods/2017-11-25/5a1949168eaae.png');
INSERT INTO `goods_image` VALUES ('12', '3', 'goods/2017-11-25/5a19492d0c625.png');
INSERT INTO `goods_image` VALUES ('13', '2', 'goods/2017-11-26/5a1a163a3af79.png');
INSERT INTO `goods_image` VALUES ('14', '1', 'goods/2017-11-26/5a1a6fd2920c0.png');

-- ----------------------------
-- Table structure for goods_stock
-- ----------------------------
DROP TABLE IF EXISTS `goods_stock`;
CREATE TABLE `goods_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `good_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_stock
-- ----------------------------

-- ----------------------------
-- Table structure for seller
-- ----------------------------
DROP TABLE IF EXISTS `seller`;
CREATE TABLE `seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of seller
-- ----------------------------
INSERT INTO `seller` VALUES ('1', '阿迪达斯官方旗舰店', '北京');
INSERT INTO `seller` VALUES ('2', '香奈儿', '广州');
INSERT INTO `seller` VALUES ('5', '农夫山泉官方旗舰店', '上海');
INSERT INTO `seller` VALUES ('6', '哈哈哈', '吉林');
INSERT INTO `seller` VALUES ('7', '啦啦啦', '吉林');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------

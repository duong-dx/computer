/*
Navicat MySQL Data Transfer

Source Server         : Laravel
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : computer

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-05 08:17:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bills
-- ----------------------------
DROP TABLE IF EXISTS `bills`;
CREATE TABLE `bills` (
  `bill_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `total_money` decimal(65,0) DEFAULT NULL,
  `time_bill` datetime DEFAULT NULL,
  `statuss` bit(1) DEFAULT b'0' COMMENT '1 đã thanh toán 0 chưa thanh toán',
  PRIMARY KEY (`bill_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bills
-- ----------------------------
INSERT INTO `bills` VALUES ('2_5_1558280259', '2', '5', '102410000', '2019-05-19 22:37:39', '');
INSERT INTO `bills` VALUES ('2_5_1559374451', '2', '5', '125115000', '2019-06-01 14:34:11', '\0');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('2', 'Camera');
INSERT INTO `categories` VALUES ('3', 'Điện thoại');
INSERT INTO `categories` VALUES ('4', 'Laptop');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL COMMENT '1 nam 0 nữ',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` bit(1) DEFAULT b'1' COMMENT '1 được hoạt động 0 là bị ban',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'Nguyễn Đặng Đan', '', 'Phú Điền, Bình Trị Thiên, Việt Nam', '0212121212', 'dannguyen@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'dannguyen.jpg', '\0');
INSERT INTO `customers` VALUES ('2', 'Đinh Xuân Phương', '', 'Ngọc Giang-Vĩnh Ngọc-Đông Anh-Hà Nội', '0977180943', 'duong120798@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'avt.jpg', '');
INSERT INTO `customers` VALUES ('3', 'Lê Thị Thu Hà', '', 'Thôn Đông - Tàm Xá - Đông Anh - Hà Nội', '0212121212', 'nethithuha@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '55719241_841986049470232_6655939753805873152_n.jpg', '');
INSERT INTO `customers` VALUES ('4', 'Trâm Anh', '', 'Trần Duy Hưng - Cầu Giấy - Hà Nội', '0212121212', 'tramanhpho`@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'do-thi-tram-anh-14.jpg', '');

-- ----------------------------
-- Table structure for detail_bill
-- ----------------------------
DROP TABLE IF EXISTS `detail_bill`;
CREATE TABLE `detail_bill` (
  `bill_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity_buy` int(11) DEFAULT NULL,
  `into_money` decimal(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of detail_bill
-- ----------------------------
INSERT INTO `detail_bill` VALUES ('2_5_1558280259', '2', '1', '60705000');
INSERT INTO `detail_bill` VALUES ('2_5_1558280259', '3', '1', '41705000');
INSERT INTO `detail_bill` VALUES ('2_5_1559374451', '3', '3', '125115000');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL COMMENT '1 nam 0 nữ',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` bit(1) DEFAULT b'1' COMMENT '1 là được hoạt đông 0 và bị ban',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('1', 'Lê Thị Thu Hà', '\0', 'Thôn Đông - Tàm Xá - Đông Anh - Hà Nội', '0212121212', 'nethithuha@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '55719241_841986049470232_6655939753805873152_n.jpg', '\0');
INSERT INTO `employees` VALUES ('3', 'Trâm Anh', '\0', 'Trần Duy Hưng - Cầu Giấy - Hà Nội', '0212121212', 'tramanhpho`@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'do-thi-tram-anh-14.jpg', '\0');
INSERT INTO `employees` VALUES ('4', 'Đinh Xuân Dương', '', 'Ngọc Giang-Vĩnh Ngọc-Đông Anh-Hà Nội', '0977180943', 'duong120798@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '13418747_1627526137472349_9214519337485730240_n.jpg', '');
INSERT INTO `employees` VALUES ('5', 'Online', '', 'online', '0977180943', 'online@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'images.jpg', '');

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `product_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Đường dẫn ảnh',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of images
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(65,0) DEFAULT NULL,
  `discount` int(2) DEFAULT NULL,
  `favorite` int(255) DEFAULT '0' COMMENT 'yêu thích',
  `quantity` int(255) DEFAULT NULL,
  `quantity_sold` int(255) DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hot` bit(1) DEFAULT b'1' COMMENT '1 hot 0 là không hot',
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('2', 'Apple Macbook Pro 15 ', '63900000', '5', '0', '9', '2', 'Apple Macbook Pro 15 Touchbar MR972 /512GB SSD (2018). Màu Bạc', 'Thiết kế đẹp mắt chất lượng siêu bền thích cứ đập thử vỡ tự chịu trách nhiệm', '', '4', '43792_1__small_.jpg');
INSERT INTO `products` VALUES ('3', 'Apple Macbook Pro 13', '43900000', '5', '0', '9', '0', 'Apple Macbook Pro 15 Touchbar MR932 /256GB SSD (2018)', 'Chất liệu siêu bền', '', '4', '43795_5__small_.jpg');
INSERT INTO `products` VALUES ('4', 'Apple Macbook Air MRE82 ', '28000000', '5', '0', '10', '0', 'Laptop Apple Macbook Air MRE82 ', 'Chất liệu siêu bền', '', '4', '44992_5.jpg');

-- ----------------------------
-- Table structure for slides
-- ----------------------------
DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` bit(1) DEFAULT b'1' COMMENT '1 là active 2 deactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of slides
-- ----------------------------
INSERT INTO `slides` VALUES ('1', 'xsmax11.jpg', 'Iphone Xs Maxxxx', 'Siêu phẩm', '');
INSERT INTO `slides` VALUES ('2', 'galaxynote99.jpg', 'SamSung  a9', 'Thiếu kế bắt mắt', '');
INSERT INTO `slides` VALUES ('3', 'mac111.jpg', 'Macbook', 'Thiết kế sang trọng', '');

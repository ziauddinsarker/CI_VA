/*
Navicat MySQL Data Transfer

Source Server         : bhaloachee
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : bhaloachee

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2015-11-06 02:16:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for discount
-- ----------------------------
DROP TABLE IF EXISTS `discount`;
CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `discount_name` varchar(255) DEFAULT NULL,
  `discount_area` varchar(255) DEFAULT NULL,
  `discount_on` varchar(255) DEFAULT NULL,
  `discount_time_start` datetime DEFAULT NULL,
  `dicount_time_end` datetime DEFAULT NULL,
  `discount_phone` varchar(255) DEFAULT NULL,
  `discount_contact_time` datetime DEFAULT NULL,
  `discount_email` varchar(255) DEFAULT NULL,
  `discount_website_or_page` varchar(255) DEFAULT NULL,
  `discount_duration` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `discount_instruction` varchar(255) DEFAULT NULL,
  `social_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of discount
-- ----------------------------
INSERT INTO `discount` VALUES ('1', 'Discount One ', 'Dhaka', 'Nothing', '2015-07-21 06:05:02', '2015-07-22 06:12:19', null, null, null, null, '2005', null, null, '12');
INSERT INTO `discount` VALUES ('325', 'Discount Two', null, null, '2015-07-13 06:09:58', '2015-08-27 06:12:22', null, null, null, null, null, null, null, '12');
INSERT INTO `discount` VALUES ('326', 'No discount found for discount one', 'Comilla', 'Medicine', '2015-07-28 06:10:01', '2015-07-27 06:12:26', null, null, null, null, '10day', null, null, '12');
INSERT INTO `discount` VALUES ('329', 'Discount count on e', 'Pharamacist', 'Nothing ', null, null, null, null, null, null, '256sf65sd6f', '1', null, '12');

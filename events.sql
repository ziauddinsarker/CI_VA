/*
Navicat MySQL Data Transfer

Source Server         : bhaloachee
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : bhaloachee

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2015-11-06 02:15:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `events_id` int(11) NOT NULL AUTO_INCREMENT,
  `events_name` varchar(255) DEFAULT NULL,
  `events_area` varchar(255) DEFAULT NULL,
  `events_on` varchar(255) DEFAULT NULL,
  `events_time` time DEFAULT NULL,
  `events_date` date DEFAULT NULL,
  `events_address` varchar(255) DEFAULT NULL,
  `events_phone` varchar(255) DEFAULT NULL,
  `events_contact_time` varchar(255) DEFAULT NULL,
  `events_email` varchar(255) DEFAULT NULL,
  `events_author` int(11) DEFAULT NULL,
  `events_active` tinyint(1) DEFAULT NULL,
  `social_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`events_id`),
  KEY `fk_event_author` (`events_author`),
  CONSTRAINT `fk_event_author` FOREIGN KEY (`events_author`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES ('1', 'Nothing Events', null, null, '00:00:00', '2015-11-06', '258 Nabinbagh, Khilgaon , Dhaka', '01720223388', '12:90', 'ziauddin.sarker@gmail.com', '1', null, '12');
INSERT INTO `events` VALUES ('2', 'Another Nothing Events', null, null, '00:00:00', null, 'Khilgaon Badda Kustia', '7211434', '3:20', 'info@simkam.com', '1', null, '12');
INSERT INTO `events` VALUES ('3', 'New q', 'sdlfkjsdalkf', 'aslkfj', null, '2015-11-06', null, null, null, null, null, '1', '12');
INSERT INTO `events` VALUES ('4', 'sdfasd', 'asdfasd', 'asdfa', null, '0000-00-00', null, null, null, null, null, '1', '12');

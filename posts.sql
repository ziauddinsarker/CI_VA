/*
Navicat MySQL Data Transfer

Source Server         : bhaloachee
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : bhaloachee

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2015-11-06 02:16:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `social_user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('11', 'What we’re reading today', 'As has become a Friday tradition, here are five education stories to “brighten” your day. If the spirit moves you, please read, recommend, share, and respond on Medium! Also, I’m looking to commission some new stories. If you’re interested in contributing, reach out to me on Twitter (@sarika008) and I’ll DM you my email address.', '1', '2015-08-08 11:18:41', '12');
INSERT INTO `posts` VALUES ('13', 'My Cujo', '\r\nOn the days that I have to leave early to work, I get very stressed out. But not for the reasons you might imagine. Every day, at around 6 a.m. there’s this tiny wisp of a girl that walks dogs in my neighborhood. Correction: it’s the dogs that walk her around. Her smallest canine friend looks bigger than she does — and there…', '1', '2015-08-08 14:00:33', '1');
INSERT INTO `posts` VALUES ('15', 'The new blog', 'Enter text here...sdalfjdlfjsdlkjflsdjfl', '1', '2015-08-18 07:19:09', '1');
INSERT INTO `posts` VALUES ('16', 'What next', 'As has become a Friday tradition, here are five education stories to “brighten” your day. If the spirit moves you, please read, recommend, share, and respond on Medium! Also, I’m looking to commission some new stories. If you’re interested in contributing, reach out to me on Twitter (@sarika008) and I’ll DM you my email address.', '1', '2015-08-08 11:18:41', '1');
INSERT INTO `posts` VALUES ('17', 'New post 3', 'As has become a Friday tradition, here are five education stories to “brighten” your day. If the spirit moves you, please read, recommend, share, and respond on Medium! Also, I’m looking to commission some new stories. If you’re interested in contributing, reach out to me on Twitter (@sarika008) and I’ll DM you my email address.', '1', '2015-08-08 11:18:41', '1');
INSERT INTO `posts` VALUES ('18', 'What we’re reading today', 'As has become a Friday tradition, here are five education stories to “brighten” your day. If the spirit moves you, please read, recommend, share, and respond on Medium! Also, I’m looking to commission some new stories. If you’re interested in contributing, reach out to me on Twitter (@sarika008) and I’ll DM you my email address.', '1', '2015-08-08 11:18:41', '1');
INSERT INTO `posts` VALUES ('19', 'This is a good day', 'As has become a Friday tradition, here are five education stories to “brighten” your day. If the spirit moves you, please read, recommend, share, and respond on Medium! Also, I’m looking to commission some new stories. If you’re interested in contributing, reach out to me on Twitter (@sarika008) and I’ll DM you my email address.', '1', '2015-08-08 11:18:41', '12');
INSERT INTO `posts` VALUES ('20', 'What we’re reading today', 'As has become a Friday tradition, here are five education stories to “brighten” your day. If the spirit moves you, please read, recommend, share, and respond on Medium! Also, I’m looking to commission some new stories. If you’re interested in contributing, reach out to me on Twitter (@sarika008) and I’ll DM you my email address.', '1', '2015-08-08 11:18:41', '1');
INSERT INTO `posts` VALUES ('25', 'sf', 'sdf', '1', '2015-11-03 00:17:22', '0');
INSERT INTO `posts` VALUES ('26', 'sdfsa', 'sdfas', '1', '2015-11-03 00:18:11', '0');
INSERT INTO `posts` VALUES ('27', 'sdfsdfsdasdf', 'sdfaasdf', '1', '2015-11-03 00:28:19', '0');
INSERT INTO `posts` VALUES ('29', 'Latest Post 12-6-15', 'This is latest post', '1', '2015-11-06 00:11:22', '12');

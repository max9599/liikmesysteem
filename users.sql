/*
Navicat MySQL Data Transfer

Source Server         : ityn
Source Server Version : 50162
Source Host           : localhost:3306
Source Database       : ityn

Target Server Type    : MYSQL
Target Server Version : 50162
File Encoding         : 65001

Date: 2014-10-27 17:19:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `telephone_number` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `bank_number` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `bank` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `isic_number` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `profession` varchar(30) DEFAULT NULL,
  `member_status` varchar(30) CHARACTER SET utf8 DEFAULT '0',
  `study_year` int(2) DEFAULT NULL,
  `date_accepted` date DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `date_ended_university` date DEFAULT NULL,
  `date_got_full_member` date DEFAULT NULL,
  `date_left` date DEFAULT NULL,
  `who_modified` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `projects_now` text CHARACTER SET utf8,
  `projects_past` text CHARACTER SET utf8,
  `information` text CHARACTER SET utf8,
  `hobbies` text CHARACTER SET utf8,
  `ityn_kokkupuude` text CHARACTER SET utf8,
  `ityn_arvamus` text CHARACTER SET utf8,
  `ityn_ootused` text CHARACTER SET utf8,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=cp1251;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'max99', 'c4d524159edd600552c1579895625c18', 'Maxim Gromo', '8989898', '89898989898', 'jhijhiji', '89898989898', 'jasidjas', '2', '2', null, null, null, null, null, null, null, null, null, null, 'safasf', null, null, null);
INSERT INTO `users` VALUES ('2', 'okoko', 'okok', 'test4', '333', '222', 'ko', '2222222', 'ok', '3', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('8', 'max9599@gmail.com', '5f11e5735267bc58b053bbf57070a23c', 'Maxim Gromov', '55590823', '22100233452244', 'Swedbank AS', '39510182223', 'Informaatika', '1', '1', null, '2014-10-05 20:19:00', null, null, null, null, null, 'ITÜNi liikmesüsteem, LAN', 'Skype firmakülastus', null, 'Igasuguseid', '', '', '');
INSERT INTO `users` VALUES ('5', 'maxsfa', '0c1c15529d2c423973094fb7dc735be1', 'test1', '23412421', '3525328752', 'fsafasf', '93285092838', 'asdfjasf', '4', '1', null, '2014-10-05 12:44:00', null, null, null, null, null, null, null, null, 'fdsdfdsgsd', '', '', '');
INSERT INTO `users` VALUES ('6', 'maxisfas', '69c199ea8faa40edafac3784fb9514ad', 'test2', '784784', '787387893', 'fasfafs', '35475897389', 'fasfs', '5', '1', null, '2014-10-05 12:48:00', null, null, null, null, null, null, null, null, 'sfafasfas', '', '', '');
INSERT INTO `users` VALUES ('7', 'safasfasf', '1114b73f0d09c5c0f5acad5b80ff71f4', 'test3', '83738783', '73287383', 'fsafsfas', '373873899', 'sfafssaf', null, '1', null, '2014-10-05 12:48:00', null, null, null, null, null, null, null, null, 'swfsafas', '', '', '');
INSERT INTO `users` VALUES ('9', 'Mak@mak.ee', 'c4d524159edd600552c1579895625c18', 'Max Gro', '394898598', '8938983939', 'jsfskajfkals', '39509182223', 'Informaatika', '0', '1', null, '2014-10-20 22:45:00', null, null, null, null, null, null, null, null, 'jkjkjkjlkjl', '', '', '');

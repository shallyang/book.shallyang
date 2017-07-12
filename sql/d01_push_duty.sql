/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : com.shallyang

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-07-12 23:04:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for d01_push_duty
-- ----------------------------
DROP TABLE IF EXISTS `d01_push_duty`;
CREATE TABLE `d01_push_duty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id,自增,无符号',
  `send_user_id` varchar(255) NOT NULL COMMENT '推送用户的id',
  `send_book_id` varchar(255) NOT NULL COMMENT '推送的图书id',
  `replay_time` varchar(255) DEFAULT NULL COMMENT '申请时间',
  `push_time` varchar(255) DEFAULT NULL COMMENT '推送时间',
  `state` varchar(255) DEFAULT NULL COMMENT '推送状态 ',
  `created_at` varchar(255) DEFAULT NULL COMMENT '申请创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

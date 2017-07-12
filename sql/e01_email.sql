/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : com.shallyang

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-07-12 23:04:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for e01_email
-- ----------------------------
DROP TABLE IF EXISTS `e01_email`;
CREATE TABLE `e01_email` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '邮箱id,主键,自动递增,无符号',
  `user_id` int(11) NOT NULL COMMENT '对应U1的id',
  `push_email` varchar(255) NOT NULL COMMENT '推送邮件的邮箱',
  `push_password` varchar(255) NOT NULL COMMENT '推送邮箱的密码',
  `receive_email` varchar(255) NOT NULL COMMENT '接收的邮箱',
  `created_at` varchar(255) DEFAULT NULL COMMENT '第一次上传时间',
  `updated_at` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

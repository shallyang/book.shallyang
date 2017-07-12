/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : com.shallyang

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-07-12 19:30:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for u1_user
-- ----------------------------
DROP TABLE IF EXISTS `u1_user`;
CREATE TABLE `u1_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id,主键,自动递增,无符号',
  `usename` varchar(255) NOT NULL COMMENT '用户名',
  `passwords` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL COMMENT '昵称,默认是username',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `last_login_time` varchar(255) DEFAULT NULL COMMENT '上次登录时间',
  `last_login_ip` varchar(255) DEFAULT NULL COMMENT '上次登录ip',
  `created_at` varchar(255) DEFAULT NULL COMMENT '注册时间',
  `updated_at` varchar(255) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : com.shallyang

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-07-15 13:04:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for a01_user
-- ----------------------------
DROP TABLE IF EXISTS `a01_user`;
CREATE TABLE `a01_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id,主键,自动递增,无符号',
  `openid` varchar(255) NOT NULL COMMENT '用户微信',
  `usename` varchar(255) NOT NULL COMMENT '用户名',
  `passwords` varchar(255) NOT NULL,
  `vip` tinyint(1) DEFAULT '0' COMMENT '是否是会员,1是会员,0不是会员,默认是0',
  `nickname` varchar(255) NOT NULL COMMENT '昵称,默认是username',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `last_login_time` varchar(255) DEFAULT NULL COMMENT '上次登录时间',
  `last_login_ip` varchar(255) DEFAULT NULL COMMENT '上次登录ip',
  `push_time` tinyint(1) DEFAULT '5' COMMENT '推送次数,默认5次,每天2点重置成5',
  `created_at` varchar(255) DEFAULT NULL COMMENT '注册时间',
  `updated_at` varchar(255) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for b01_book
-- ----------------------------
DROP TABLE IF EXISTS `b01_book`;
CREATE TABLE `b01_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id,自动递增,无符号',
  `book_name` varchar(255) NOT NULL COMMENT '书名',
  `book_cover` varchar(255) DEFAULT NULL COMMENT '书籍封面',
  `book_frist` varchar(255) DEFAULT NULL COMMENT '书名首字母',
  `book_english` varchar(255) DEFAULT NULL COMMENT '书的英文名',
  `book_size` varchar(255) NOT NULL COMMENT '书的容量,kB',
  `book_content` varchar(255) DEFAULT NULL COMMENT '书籍介绍',
  `book_category` varchar(255) DEFAULT NULL COMMENT '图书分类',
  `book_url` varchar(255) NOT NULL COMMENT '书存储地址',
  `md5` varchar(255) NOT NULL COMMENT 'MD5效验码,用来确定书的唯一性',
  `uploaded_time` int(11) NOT NULL COMMENT '上传时间',
  `uploader` varchar(255) NOT NULL COMMENT '上传者',
  `created_at` varchar(255) DEFAULT NULL COMMENT '记录创建时间',
  `updated_at` varchar(255) DEFAULT NULL COMMENT '记录上一次修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for b02_book_category
-- ----------------------------
DROP TABLE IF EXISTS `b02_book_category`;
CREATE TABLE `b02_book_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id,递增,无符号',
  `category_name` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for c01_web_config
-- ----------------------------
DROP TABLE IF EXISTS `c01_web_config`;
CREATE TABLE `c01_web_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id,自增,无符号',
  `web_title` varchar(255) NOT NULL COMMENT '网站主题',
  `web_state` tinyint(1) NOT NULL COMMENT '网站开关状态,1为开,0为关',
  `web_banner` varchar(255) NOT NULL COMMENT '顶部滚动广告',
  `web_copy` varchar(255) DEFAULT NULL COMMENT '网站版权',
  `web_friend` varchar(255) DEFAULT NULL COMMENT '友情链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

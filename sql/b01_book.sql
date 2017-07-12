/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : com.shallyang

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-07-12 23:03:58
*/

SET FOREIGN_KEY_CHECKS=0;

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

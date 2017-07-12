/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : com.shallyang

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-07-12 23:04:15
*/

SET FOREIGN_KEY_CHECKS=0;

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

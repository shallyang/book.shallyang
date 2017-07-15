/*
Navicat MySQL Data Transfer

Source Server         : local mysql
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : auth

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-03-16 17:43:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_page
-- ----------------------------
DROP TABLE IF EXISTS `auth_page`;
CREATE TABLE `auth_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '中文名：主键id，值域：，说明：自增，',
  `pid` int(11) NOT NULL COMMENT '中文名：父键id，值域：，说明：，',
  `title` varchar(100) NOT NULL COMMENT '中文名：功能名称，值域：，说明：，',
  `description` varchar(255) DEFAULT '' COMMENT '中文名：功能描述，值域：，说明：，',
  `number` int(11) DEFAULT '0' COMMENT '中文名：序号，值域：，说明：当前记录是全站的第几位功能，',
  `state` tinyint(3) DEFAULT '1' COMMENT '中文名：状态，值域：1启用 0 禁用\n-1 删除，说明：，',
  `created_at` int(11) DEFAULT '0' COMMENT '中文名：创建时间戳，值域：，说明：，',
  `updated_at` int(11) DEFAULT '0' COMMENT '中文名：修改时间戳，值域：，说明：，',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for auth_relation
-- ----------------------------
DROP TABLE IF EXISTS `auth_relation`;
CREATE TABLE `auth_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '中文名：主键id，值域：，说明：自增，',
  `user_id` int(11) NOT NULL COMMENT '中文名：用户id，值域：，说明：=>user:id，',
  `role_id` int(11) NOT NULL COMMENT '中文名：角色id，值域：，说明：=>role:id，',
  `state` tinyint(3) DEFAULT '1' COMMENT '中文名：状态，值域：1启用 0 禁用\n-1 删除，说明：，',
  `created_at` int(11) DEFAULT '0' COMMENT '中文名：创建时间戳，值域：，说明：，',
  `updated_at` int(11) DEFAULT '0' COMMENT '中文名：修改时间戳，值域：，说明：，',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for auth_role
-- ----------------------------
DROP TABLE IF EXISTS `auth_role`;
CREATE TABLE `auth_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '中文名：主键id，值域：，说明：自增，',
  `role_name` varchar(100) NOT NULL COMMENT '中文名：角色名称，值域：，说明：，',
  `description` varchar(255) DEFAULT '' COMMENT '中文名：角色描述，值域：，说明：，',
  `list` varchar(512) NOT NULL COMMENT '中文名：权限列表，值域：，说明：类似：101010101……。该串位数等于全站的所有功能项的合。1可用，0不可用，',
  `sort` int(11) DEFAULT '1' COMMENT '中文名：排序，值域：，说明：，',
  `state` tinyint(3) DEFAULT '1' COMMENT '中文名：状态，值域：1启用 0 禁用\n-1 删除，说明：，',
  `created_at` int(11) DEFAULT '0' COMMENT '中文名：创建时间戳，值域：，说明：，',
  `updated_at` int(11) DEFAULT '0' COMMENT '中文名：修改时间戳，值域：，说明：，',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for auth_user
-- ----------------------------
DROP TABLE IF EXISTS `auth_user`;
CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '中文名：主键id，值域：，说明：自增，',
  `uuid` varchar(32) NOT NULL,
  `username` varchar(16) NOT NULL COMMENT '中文名：用户名，值域：，说明：，',
  `password` varchar(32) NOT NULL COMMENT '中文名：登录密码，值域：，说明：，',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '中文名：邮箱，值域：，说明：，',
  `telephone` varchar(11) NOT NULL DEFAULT '' COMMENT '中文名：手机号，值域：，说明：，',
  `permission` varchar(512) NOT NULL COMMENT '中文名：权限列表，值域：，说明：类似：101010101……。该串位数等于全站的所有功能项的合。1可用，0不可用，',
  `state` tinyint(3) NOT NULL DEFAULT '1' COMMENT '中文名：状态，值域：1启用 0 禁用\n-1 删除，说明：，',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '中文名：创建时间戳，值域：，说明：，',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '中文名：修改时间戳，值域：，说明：，',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

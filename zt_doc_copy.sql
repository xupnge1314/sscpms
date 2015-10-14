/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : zentao

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2015-10-14 18:17:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zt_doc_copy`
-- ----------------------------
DROP TABLE IF EXISTS `zt_doc_copy`;
CREATE TABLE `zt_doc_copy` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL,
  `project` mediumint(8) unsigned NOT NULL,
  `lib` varchar(30) NOT NULL,
  `module` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `digest` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `views` smallint(5) unsigned NOT NULL,
  `addedBy` varchar(30) NOT NULL,
  `addedDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  `project_name` varchar(255) NOT NULL COMMENT '测试项目',
  `organization` varchar(255) NOT NULL COMMENT '测试机构',
  `money` decimal(10,2) NOT NULL COMMENT '优惠价格',
  `day` int(10) NOT NULL COMMENT '测试周期',
  `info` text NOT NULL COMMENT '具体说明',
  `remark` text NOT NULL COMMENT '备注',
  `add_user` varchar(255) NOT NULL COMMENT '编辑人员',
  `add_time` int(11) NOT NULL COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zt_doc_copy
-- ----------------------------

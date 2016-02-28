/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : zentao

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2015-10-29 10:12:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zt_product`
-- ----------------------------
DROP TABLE IF EXISTS `zt_product`;
CREATE TABLE `zt_product` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL COMMENT '项目名称',
  `code` varchar(45) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT '',
  `desc` text NOT NULL COMMENT '项目描述',
  `PO` varchar(30) NOT NULL,
  `QD` varchar(30) NOT NULL,
  `RD` varchar(30) NOT NULL,
  `acl` enum('open','private','custom') NOT NULL DEFAULT 'open',
  `whitelist` varchar(255) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdVersion` varchar(20) NOT NULL,
  `order` mediumint(8) unsigned NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  `customer` varchar(255) NOT NULL COMMENT '客户名称',
  `project_name` varchar(255) NOT NULL COMMENT '测试项目',
  `quote` decimal(10,2) NOT NULL COMMENT '报价金额',
  `quote_time` date DEFAULT NULL COMMENT '报价时间',
  `fare` varchar(255) NOT NULL COMMENT '目前进展',
  `person` varchar(255) DEFAULT NULL,
  `reason` varchar(255) NOT NULL COMMENT '未成交原因',
  `cash_time` date DEFAULT NULL COMMENT '收款日期',
  `invoice_time` date DEFAULT NULL COMMENT '开票日期',
  `sample_time` date DEFAULT NULL COMMENT '收样时间',
  `report_time` date DEFAULT NULL COMMENT '出报告时间',
  `send_time` date DEFAULT NULL COMMENT '报告/退样/发票寄送时间',
  `package_company` varchar(255) NOT NULL COMMENT '分包单位',
  `package_money` decimal(10,2) NOT NULL COMMENT '分包金额',
  `package_pay_time` date DEFAULT NULL COMMENT '分包付款日期',
  `package_invoice_time` date DEFAULT NULL COMMENT '分包开票日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zt_product
-- ----------------------------
INSERT INTO `zt_product` VALUES ('1', '', '', 'normal', '', '', '', '', 'open', '', 'admin', '2015-10-16 16:01:30', '7.2.5', '0', '0', '', '', '0.00', '2015-10-24', 'sprint', null, '', null, null, null, null, null, '', '0.00', null, null);
INSERT INTO `zt_product` VALUES ('2', '', '', 'normal', '额头微软图标', '', '', '', 'open', '', 'admin', '2015-10-16 17:58:51', '7.2.5', '5', '0', '凤凰花', '鬼地方', '34.00', '2015-10-17', 'sprint', null, '', null, null, null, null, null, '', '0.00', null, null);
INSERT INTO `zt_product` VALUES ('3', 'fhgf', '', 'normal', '', '', '', '', 'open', '', 'admin', '2015-10-21 14:39:05', '7.2.5', '15', '0', 'fh的', '向何方', '23.00', '2015-10-21', '0', '东方红', '', null, null, null, null, null, '', '0.00', null, null);
INSERT INTO `zt_product` VALUES ('4', 'sdsf', '', 'normal', '', '', '', '', 'open', '', 'admin', '2015-10-21 15:06:10', '7.2.5', '0', '0', 'dfgdf', 'dfgsd', '34.00', '2015-10-21', '0', 'fdfgd', '', null, null, null, null, null, '', '0.00', null, null);
INSERT INTO `zt_product` VALUES ('5', 'fs的高富帅的v', '', 'normal', '', '', '', '', 'open', '', 'admin', '2015-10-21 16:18:09', '7.2.5', '0', '0', 'sdfds', 'sdfsd', '32.00', '2015-10-21', '0', '宣传部', '', null, null, null, null, null, '', '0.00', null, null);
INSERT INTO `zt_product` VALUES ('6', '风格豪放的', '', 'normal', '', '', '', '', 'open', '', 'admin', '2015-10-21 16:25:50', '7.2.5', '10', '0', '弧光放电', '东方红', '34.00', '2015-10-21', '0', '宣传部', '', null, null, null, null, null, '', '0.00', null, null);
INSERT INTO `zt_product` VALUES ('7', '挂号费', '', 'normal', '', '', '', '', 'open', '', 'admin', '2015-10-21 16:39:49', '7.2.5', '0', '0', 'f更换 ', 'vbn ', '45.00', '2015-10-21', '0', 'vbnm', '', null, null, null, null, null, '', '0.00', null, null);

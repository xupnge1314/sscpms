/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : zentao

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2015-10-16 17:19:46
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
  `status1` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态   0  未成交   1  成交',
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zt_product
-- ----------------------------
INSERT INTO `zt_product` VALUES ('1', '', '', 'normal', '', '', '', '', 'open', '', 'admin', '2015-10-16 16:01:30', '7.2.5', '5', '0', '', '', '0.00', '2015-10-24', 'sprint', '0', '', '2015-10-09', '2015-10-23', '2015-10-24', '2015-10-24', '2015-10-23', '', '0.00', '2015-10-22', '2015-10-31');

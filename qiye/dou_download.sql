-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-03-14 14:31:33
-- 服务器版本： 5.6.21
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qiye`
--

-- --------------------------------------------------------

--
-- 表的结构 `dou_download`
--

CREATE TABLE IF NOT EXISTS `dou_download` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` smallint(5) NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL DEFAULT '',
  `defined` text NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `download_link` varchar(255) NOT NULL DEFAULT '',
  `size` varchar(50) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `click` smallint(6) unsigned NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '',
  `sort` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sign` varchar(255) NOT NULL DEFAULT '0' COMMENT '唯一标识',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `dou_download`
--

INSERT INTO `dou_download` (`id`, `cat_id`, `title`, `defined`, `content`, `image`, `download_link`, `size`, `keywords`, `add_time`, `click`, `description`, `sort`, `sign`) VALUES
(1, 0, '成都市', '', '成都市成都市成都市', 'images/download/20160227aknhai.pdf', '', '3', '成都市', 1456581836, 3, '成都市', 0, '0'),
(2, 0, '士大夫士大夫', '', '', 'images/download/20160228vvckuo.pdf', '192.168.1.168/qiye/images/download/20160228vvckuo.pdf', '', '', 0, 0, '', 0, 'qwetyyyy');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

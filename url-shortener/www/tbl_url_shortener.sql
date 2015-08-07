-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tbl_url_shortener`;
CREATE TABLE `tbl_url_shortener` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `long_url` varchar(150) NOT NULL,
  `short_code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tbl_url_shortener` (`id`, `long_url`, `short_code`) VALUES
(11,	'http://web.znu.edu.ua/lab/econom/dba/lectures/ADBS_lect5.pdf',	'd'),
(12,	'http://habrahabr.ru/post/141767/',	'f');

-- 2015-03-19 10:59:02

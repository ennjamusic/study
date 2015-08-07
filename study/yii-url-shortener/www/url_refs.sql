-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `url_refs`;
CREATE TABLE `url_refs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `long_url` varchar(255) NOT NULL,
  `short_url` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short_url` (`short_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `url_refs` (`id`, `long_url`, `short_url`) VALUES
(5,	'http://www.php.su/functions/?xdiff-file-diff',	'83863b4c09416ea267aa2f4ae4bf7c23'),
(6,	'http://php.net/manual/ru/function.time.php',	'0f9ee1d9776f50ff45e076ef7345ba17'),
(7,	'http://www.yiiframework.com/wiki/48/by-example-chtml/#hh0',	'886cffb86af5f64c95101a8cbe3b7aac');

-- 2015-08-06 15:12:28

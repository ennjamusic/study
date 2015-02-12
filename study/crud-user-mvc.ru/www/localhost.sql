-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `crudusertest` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `crudusertest`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(3) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `login`, `password`, `role`, `email`, `date_register`, `date_last_login`, `name`, `lastname`, `phone`) VALUES
(1,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	1,	'test@test.ru',	'2015-02-12 07:15:56',	'0000-00-00 00:00:00',	'Dmitry',	'Telepnev',	'123123123'),
(2,	'admin2',	'21232f297a57a5a743894a0e4a801fc3',	1,	'test@test.ru',	'2015-02-12 06:50:44',	'0000-00-00 00:00:00',	'Dmitry2',	'Telepnev2',	'123123123'),
(3,	'user',	'4297f44b13955235245b2497399d7a93',	0,	'test@test.ru',	'2015-02-12 09:06:33',	'0000-00-00 00:00:00',	'Dmitry3',	'Telepnev3',	'123123123');

-- 2015-02-12 13:28:46

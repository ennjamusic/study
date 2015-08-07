-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `posts` (`id`, `title`, `text`) VALUES
(1,	'post1',	'post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 post1 '),
(2,	'post2',	'post2 post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2post2'),
(3,	'post3',	'post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 '),
(4,	'post4',	'post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 post3 '),
(5,	'newpost',	'newpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpostnewpost'),
(6,	'newpost2',	'newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2'),
(7,	'newpost2',	'newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2'),
(8,	'newpost2',	'newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2newpost2 newpost2');

-- 2015-03-24 11:36:43

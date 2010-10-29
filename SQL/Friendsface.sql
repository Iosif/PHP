/*
SQLyog Community v8.6 RC2
MySQL - 5.1.41 : Database - friendsface
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` int(10) NOT NULL,
  `state` int(10) NOT NULL,
  `city` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL COMMENT 'male/female/unknown',
  `birthdate` varchar(20) NOT NULL COMMENT 'dd-mm-yyyy',
  `rank` int(2) unsigned NOT NULL DEFAULT '0' COMMENT 'User/Mod/Admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `accounts` */

LOCK TABLES `accounts` WRITE;

UNLOCK TABLES;

/*Table structure for table `additional` */

DROP TABLE IF EXISTS `additional`;

CREATE TABLE `additional` (
  `id` int(10) NOT NULL,
  `picture` tinyint(1) DEFAULT NULL,
  `sexuality` varchar(50) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `forum_language` varchar(50) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `music` varchar(255) DEFAULT NULL,
  `series` varchar(255) DEFAULT NULL,
  `movies` varchar(255) DEFAULT NULL,
  `games` varchar(255) DEFAULT NULL,
  `books` varchar(255) DEFAULT NULL,
  `places` varchar(255) DEFAULT NULL,
  `best_thing` varchar(255) DEFAULT NULL,
  `dream` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `additional` */

LOCK TABLES `additional` WRITE;

UNLOCK TABLES;

/*Table structure for table `friends` */

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `id` int(10) NOT NULL,
  `friend_id` int(10) NOT NULL,
  PRIMARY KEY (`id`,`friend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `friends` */

LOCK TABLES `friends` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

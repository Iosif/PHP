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
/*Table structure for table `ajax_chat_bans` */

DROP TABLE IF EXISTS `ajax_chat_bans`;

CREATE TABLE `ajax_chat_bans` (
  `userID` int(11) NOT NULL,
  `userName` varchar(64) COLLATE utf8_bin NOT NULL,
  `dateTime` datetime NOT NULL,
  `ip` varbinary(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `ajax_chat_bans` */

LOCK TABLES `ajax_chat_bans` WRITE;

UNLOCK TABLES;

/*Table structure for table `ajax_chat_invitations` */

DROP TABLE IF EXISTS `ajax_chat_invitations`;

CREATE TABLE `ajax_chat_invitations` (
  `userID` int(11) NOT NULL,
  `channel` int(11) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `ajax_chat_invitations` */

LOCK TABLES `ajax_chat_invitations` WRITE;

UNLOCK TABLES;

/*Table structure for table `ajax_chat_messages` */

DROP TABLE IF EXISTS `ajax_chat_messages`;

CREATE TABLE `ajax_chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `userName` varchar(64) COLLATE utf8_bin NOT NULL,
  `userRole` int(1) NOT NULL,
  `channel` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `text` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `ajax_chat_messages` */

LOCK TABLES `ajax_chat_messages` WRITE;

UNLOCK TABLES;

/*Table structure for table `ajax_chat_online` */

DROP TABLE IF EXISTS `ajax_chat_online`;

CREATE TABLE `ajax_chat_online` (
  `userID` int(11) NOT NULL,
  `userName` varchar(64) COLLATE utf8_bin NOT NULL,
  `userRole` int(1) NOT NULL,
  `channel` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `ip` varbinary(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `ajax_chat_online` */

LOCK TABLES `ajax_chat_online` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

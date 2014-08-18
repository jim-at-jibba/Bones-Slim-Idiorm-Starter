# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.34)
# Database: journalapp
# Generation Time: 2014-08-05 14:07:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table diary_entry
# ------------------------------------------------------------

DROP TABLE IF EXISTS `diary_entry`;

CREATE TABLE `diary_entry` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `markdown` text,
  `html` text,
  `created_on` bigint(20) DEFAULT NULL,
  `modified_on` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(11) NOT NULL DEFAULT '',
  `role` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL DEFAULT '',
  `joined` bigint(20) NOT NULL,
  `modified` bigint(20) DEFAULT NULL,
  `last_logged_in` bigint(20) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `email`, `joined`, `modified`, `last_logged_in`, `profile_image`)
VALUES
	(2,'James Best','Besty','admin','$2y$10$Da4K3Ad5Zpqi1BU4IPQm2O/yywhaambMwY8wJHh4/bAcQcYTe8R4.','jim@justjibba.net',1405755802,NULL,1407156988,NULL),
	(3,'ella Best','Ella','member','$2y$10$QiHWNght1PBSjI8A50bpA.JDsfTw8pnGTYIgo4WkE64b/s8I6GKRi','jim@justjibba.net',1405763181,NULL,1405783498,NULL),
	(4,'ella Best','Besty','member','$2y$10$SLUwD.YVDZSubx7LVJk2p.g9Y1geEsn.lU2XzVakZg91X68HUUEbC','jim@justjibba.net',1407155469,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

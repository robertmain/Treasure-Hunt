-- MySQL dump 10.13  Distrib 5.1.61, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: treasurehunt
-- ------------------------------------------------------
-- Server version	5.1.61-0+squeeze1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES ('authorisation','0'),('completetitle','Congratulations'),('completemessage','<p><span  26px; \">You have found all %NCODES QR Codes and have been entered into our prize draw. Please Visit The %TEAMNAME booth for more information.</span><br></p>'),('cookielaw','1');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `found`
--

DROP TABLE IF EXISTS `found`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `found` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `treasure` int(11) DEFAULT NULL,
  `pirate` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `found`
--

LOCK TABLES `found` WRITE;
/*!40000 ALTER TABLE `found` DISABLE KEYS */;
/*!40000 ALTER TABLE `found` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pirates`
--

DROP TABLE IF EXISTS `pirates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pirates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forename` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `authorised` tinyint(1) NOT NULL DEFAULT '0',
  `admin` int(1) NOT NULL DEFAULT '0',
  `username` varchar(255) DEFAULT NULL,
  `signup` int(11) DEFAULT NULL,
  `banned` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pirates`
--

LOCK TABLES `pirates` WRITE;
/*!40000 ALTER TABLE `pirates` DISABLE KEYS */;
INSERT INTO `pirates` VALUES (1,NULL,NULL,'01536478832',NULL,'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86',0,0,NULL,NULL,0),(2,'Foo','Bar',NULL,'foo.bar@gmail.com','24057942a277ba9f4be7ee806ecb9c63b1845677d501031367fb67ec273366e9d6edd7e37f1ed30d690fe8ce92a63e944d81658ca49ca70d1f76a386b9e41c13',0,1,'foobar',NULL,0);
/*!40000 ALTER TABLE `pirates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treasure`
--

DROP TABLE IF EXISTS `treasure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treasure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(23) DEFAULT NULL,
  `text` longtext,
  `md5` varchar(255) NOT NULL,
  `location` varchar(23) DEFAULT NULL,
  `clue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treasure`
--

LOCK TABLES `treasure` WRITE;
/*!40000 ALTER TABLE `treasure` DISABLE KEYS */;
/*!40000 ALTER TABLE `treasure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'treasurehunt'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-03  3:06:42

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
INSERT INTO `config` VALUES ('authorisation','0');
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
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pirates`
--

LOCK TABLES `pirates` WRITE;
/*!40000 ALTER TABLE `pirates` DISABLE KEYS */;
INSERT INTO `pirates` VALUES (1,'Robert','Main',NULL,'lenswipe@gmail.com','bdf6477258a7eb68f99208dec3b5d2d5770242893bf7e3547a823276c9011f4348a9f8f235ab7e544c2c92ed402519b242ad4d998fd2348411208f72394c2aa0',0,1,'robert'),(2,'Grahame','Thomson',NULL,'mrgrahamethomson@gmail.com','966f217d961375d50c04777e746b53dd01b53fd573e9bc26838f7c90bb48a6ea97bcd3687f3030db15a84738d718637eaa807e8095533819ef8f7d1dd37a2e08',0,0,'mrgt');
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
  `title` varchar(255) DEFAULT NULL,
  `text` longtext,
  `md5` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
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

-- Dump completed on 2012-05-21  3:32:32

-- MySQL dump 10.13  Distrib 5.1.72, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: gohome
-- ------------------------------------------------------
-- Server version	5.1.72-0ubuntu0.10.04.1

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
-- Table structure for table `drive_info`
--

DROP TABLE IF EXISTS `drive_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drive_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `source` varchar(32) NOT NULL COMMENT '出发地',
  `destination` varchar(32) NOT NULL COMMENT '目的地',
  `number_of_people` int(10) unsigned NOT NULL,
  `mobile` varchar(32) NOT NULL COMMENT '手机号',
  `unit_phone` varchar(32) NOT NULL COMMENT '单位电话',
  `unit_cert` varchar(32) NOT NULL COMMENT '单位证明',
  `postscript` tinytext NOT NULL COMMENT '附言',
  `start_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='开车信息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mount_info`
--

DROP TABLE IF EXISTS `mount_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mount_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `source` varchar(32) NOT NULL COMMENT '出发地',
  `destination` varchar(32) NOT NULL COMMENT '目的地',
  `number_of_people` int(10) unsigned NOT NULL COMMENT '乘坐人数',
  `contact_phone` varchar(32) NOT NULL COMMENT '联系电话',
  `unit_cert` varchar(32) NOT NULL COMMENT '单位证明',
  `photo` varchar(32) NOT NULL,
  `start_date` date NOT NULL,
  `postscript` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='坐车信息';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-07 17:10:10

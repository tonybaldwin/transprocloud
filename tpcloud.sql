-- MySQL dump 10.13  Distrib 5.1.61, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: tpcloud
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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `street` varchar(200) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `provsys` varchar(200) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `clinick` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'BaldwinLinguas','95 Pardee Street','New Haven','CT','USA','06513','anthony@baldwinlinguas.com','http://www.baldwinlinguas.com','none','awesomeness','blinguas'),(2,'Sample Translations Inc.','Sample St.','Arion','IA','USA','51520','sampletrans@example.com','http://www.example.com','http://providers.example.com','low rates, slow payers. yuck.','sampletran'),(3,'Bom Burger TraduÃ§Ãµes','42 Endo Ln.','Belo Horizonte','MG','Brasil','30627-085','ham1978@burger.com.br','http://www.bomburgertraducoes.com.br','http://proveedores.bomburgertraducoes.com.br','essa agencia nÃ£o existe','bburger');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodocs`
--

DROP TABLE IF EXISTS `prodocs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodocs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projno` varchar(20) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  `srclang` varchar(5) DEFAULT NULL,
  `targlangs` varchar(10) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `notrans` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodocs`
--

LOCK TABLES `prodocs` WRITE;
/*!40000 ALTER TABLE `prodocs` DISABLE KEYS */;
INSERT INTO `prodocs` VALUES (1,'bburg20120611','techspecsASSPROBE_es.docx',11563,'EN','PT_BR','illustrations = scary...ugh...',1);
/*!40000 ALTER TABLE `prodocs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` varchar(30) DEFAULT NULL,
  `indate` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `outdate` date DEFAULT NULL,
  `invdate` date DEFAULT NULL,
  `srclangs` varchar(20) DEFAULT NULL,
  `targlangs` varchar(20) DEFAULT NULL,
  `rate` decimal(5,2) DEFAULT NULL,
  `totprice` decimal(9,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `paidate` date DEFAULT NULL,
  `providers` varchar(500) DEFAULT NULL,
  `clientid` varchar(20) DEFAULT NULL,
  `projno` varchar(20) NOT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `payouts` decimal(9,2) DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  `grossprof` decimal(9,2) DEFAULT NULL,
  `netprofit` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (6,NULL,'0000-00-00','0000-00-00','0000-00-00','0000-00-00',NULL,NULL,'0.00','0.00',NULL,'0000-00-00',NULL,'','','','0.00',0,NULL,NULL),(7,NULL,'2012-06-11','2012-06-18','0000-00-00','0000-00-00',NULL,NULL,'0.12','1387.56',NULL,'0000-00-00',NULL,'bburger','bburg20120611','technical specs for ass probe','0.00',11563,NULL,NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `natlang` varchar(5) DEFAULT NULL,
  `street` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `bcountry` varchar(20) DEFAULT NULL,
  `srclang1` varchar(4) DEFAULT NULL,
  `srclang2` varchar(4) DEFAULT NULL,
  `srclang3` varchar(4) DEFAULT NULL,
  `rate` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (1,'Anthony Baldwin','EN','95 Pardee Street, 2nd Floor','New Haven','USA','06513','anthony@baldwinlinguas.com','http://www.baldwinlinguas.com','CT','smart, sexy, best','USA','ES','FR','PT','0.10'),(2,'Fulano Tal','PT','25 Some Street','Arion','USA','51520','fulano@example.com','http://www.example.com','IA','Ã³timo, bom tradutor','BR','EN','ES','','0.08'),(3,'Ham Burger','PT','42 Endo Ln.','Belo Horizonte','Brasil','30627-085','ham1978@burger.com.br','http://www.example.com.br/perfil/98465','MG','meaty, no cheese, hold the ketchup','Brasil','EN','ES','IT','0.09'),(4,'Sam Iam','EN','65 Madison Park','Lollipop','USA','10001','samiam1974@h0tmale.com','http://www.sam1am.net','NY','expert medical translator','USA','FR','-','-','0.12');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-11 20:30:28

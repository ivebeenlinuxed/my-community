-- MySQL dump 10.13  Distrib 5.5.22, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: mycommunity
-- ------------------------------------------------------
-- Server version	5.5.22-0ubuntu1

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
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT  IGNORE INTO `event` VALUES (1,1328126400,1328133600,'WEEKLY',7,'WE','MO',19,19,0,1,'Test Event','Testing Events','2012-06-07 16:23:48','',NULL,NULL,0,'','','',NULL),(2,1328126400,1328133600,'WEEKLY',7,'WE','MO',20,20,0,1,'Test Event','Testing Events','2012-06-07 16:24:10','',NULL,NULL,0,'','','',NULL);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT  IGNORE INTO `group` VALUES (2,'Test Group','','','','2012-06-07 16:11:21','','','','','','',0,0,NULL),(3,'Test Group','','','','2012-06-07 16:12:33','','','','','','',0,0,NULL),(4,'Test Group','','','','2012-06-07 16:13:22','','','','','','',0,0,NULL),(5,'Test Group','','','','2012-06-07 16:14:08','','','','','','',0,0,NULL),(6,'Test Group','','','','2012-06-07 16:14:58','','','','','','',0,0,NULL),(7,'Test Group','','','','2012-06-07 16:15:30','','','','','','',0,0,NULL),(8,'Test Group','','','','2012-06-07 16:15:40','','','','','','',0,0,NULL),(9,'Test Group','','','','2012-06-07 16:16:04','','','','','','',0,0,NULL),(10,'Test Group','','','','2012-06-07 16:16:18','','','','','','',0,0,NULL),(11,'Test Group','','','','2012-06-07 16:18:34','','','','','','',0,0,NULL),(12,'Test Group','','','','2012-06-07 16:20:11','','','','','','',0,0,NULL),(13,'Test Group','','','','2012-06-07 16:20:38','','','','','','',0,0,NULL),(14,'Test Group','','','','2012-06-07 16:21:01','','','','','','',0,0,NULL),(15,'Test Group','','','','2012-06-07 16:21:09','','','','','','',0,0,NULL),(16,'Test Group','','','','2012-06-07 16:22:12','','','','','','',0,0,NULL),(17,'Test Group','','','','2012-06-07 16:22:15','','','','','','',0,0,NULL),(18,'Test Group','','','','2012-06-07 16:23:27','','','','','','',0,0,NULL),(19,'Test Group','','','','2012-06-07 16:23:48','','','','','','',0,0,NULL),(20,'Test Group','','','','2012-06-07 16:24:10','','','','','','',0,0,NULL);
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `group_category`
--

LOCK TABLES `group_category` WRITE;
/*!40000 ALTER TABLE `group_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `group_news`
--

LOCK TABLES `group_news` WRITE;
/*!40000 ALTER TABLE `group_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `venue`
--

LOCK TABLES `venue` WRITE;
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;
INSERT  IGNORE INTO `venue` VALUES (2,'Test Venue',0.0000000,0.0000000,'','','','','','','','','2012-06-07 16:11:21','',NULL),(18,'Test Venue',52.6790015,-1.8134258,'','','','','','','','','2012-06-07 16:23:27','',NULL),(19,'Test Venue',52.6790015,-1.8134258,'','','','','','','','','2012-06-07 16:23:48','',NULL),(20,'Test Venue',52.6790015,-1.8134258,'','','','','','','','','2012-06-07 16:24:10','',NULL);
/*!40000 ALTER TABLE `venue` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-07 17:30:10

-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: puchiedarcycom
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12

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
-- Table structure for table `blogPost_tags`
--

DROP TABLE IF EXISTS `blogPost_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogPost_tags` (
  `blogPost_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogPost_tags`
--

LOCK TABLES `blogPost_tags` WRITE;
/*!40000 ALTER TABLE `blogPost_tags` DISABLE KEYS */;
INSERT INTO `blogPost_tags` VALUES (1,4),(1,1),(1,2);
/*!40000 ALTER TABLE `blogPost_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogPosts`
--

DROP TABLE IF EXISTS `blogPosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogPosts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogPosts`
--

LOCK TABLES `blogPosts` WRITE;
/*!40000 ALTER TABLE `blogPosts` DISABLE KEYS */;
INSERT INTO `blogPosts` VALUES (1,'Adding Tags to Posts','Puchie Darcy',1318198577,'In this shit, I\'m going to teach you how to add some tags to blog posts and how to store them properly in the database.\r\n\r\nIf that ain\'t cool with you, then you can get the fuck out.\r\n\r\nI came to blow it all.'),(2,'I love Nate Emmons so much, that I would cut his babies in half if he asked me to.','Puchie Darcy',1318998577,'I love Nate Emmons so much, that I would cut his babies in half if he asked me to.I love Nate Emmons so much, that I would cut his babies in half if he asked me to.I love Nate Emmons so much, that I would cut his babies in half if he asked me to.I love Nate Emmons so much, that I would cut his babies in half if he asked me to.I love Nate Emmons so much, that I would cut his babies in half if he asked me to.\r\nI love Nate Emmons so much, that I would cut his babies in half if he asked me to.\r\n\r\n\r\nI love Nate Emmons so much, that I would cut his babies in half if he asked me to.I love Nate Emmons so much, that I would cut his babies in half if he asked me to.\r\nI love Nate Emmons so much, that I would cut his babies in half if he asked me to.\r\n\r\n\r\nI love Nate Emmons so much, that I would cut his babies in half if he asked me to.'),(3,'1','2',4,'3\r\n5\r\n\r\n6\r\n\r\n\r\n7'),(4,'1','2',4,'3\r\n5\r\n\r\n6\r\n\r\n\r\n7'),(5,'1','1',1,'1'),(6,'2','2',1,'2'),(7,'A Day in the Life','Nate Emmons',9192923,'A day in the life...........'),(8,'somethign new','haha',439494,'afhwofhwoefh'),(9,'somethign new','haha',439494,'afhwofhwoefh');
/*!40000 ALTER TABLE `blogPosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'funny'),(2,'nes'),(3,'harhar'),(4,'haha'),(5,'barf');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-10-09 20:01:31

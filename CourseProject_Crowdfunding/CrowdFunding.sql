CREATE DATABASE  IF NOT EXISTS `CrowdFunding` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `CrowdFunding`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: CrowdFunding
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('Academic'),('Action Film'),('Animal'),('Architecture'),('Art Books'),('Blues'),('Comedy'),('Food'),('Horror Film'),('Jazz'),('Others'),('Painting'),('Poetry'),('Rock');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `loginname` varchar(40) NOT NULL,
  `pid` varchar(40) NOT NULL,
  `cposttime` datetime NOT NULL,
  `opinion` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`loginname`,`pid`,`cposttime`),
  KEY `pid` (`pid`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`loginname`) REFERENCES `user` (`loginname`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `project` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('Amy@nyu.edu','p255','2017-05-05 13:20:35','good!'),('Antonio@nyu.edu','p233','2017-05-04 01:15:57','seems good!'),('Antonio@nyu.edu','p238','2017-04-13 12:11:45','I like the wonderful poetry collection!!!'),('Antonio@nyu.edu','p238','2017-05-04 01:16:13','no!'),('Antonio@nyu.edu','p243','2017-04-02 22:09:22','What a pity!!!:('),('BobInBrooklyn','p233','2017-05-04 00:49:25','good!'),('BobInBrooklyn','p233','2017-05-04 01:05:36','test ok!'),('BobInBrooklyn','p233','2017-05-04 01:23:17','ok!'),('BobInBrooklyn','p233','2017-05-04 09:38:22','en!'),('BobInBrooklyn','p249','2017-05-04 01:23:37','great!'),('Boy@nyu.edu','p246','2017-03-11 12:22:33','So scary...the plot is really great!'),('Evelyn@nyu.edu','p243','2017-04-04 10:08:37','I wish I could see the request earlier!!!'),('Evelyn@nyu.edu','p252','2017-05-04 11:07:33','shfkshfsfhs'),('Evelyn@nyu.edu','p252','2017-05-04 11:07:52','shfkshfsfhsghg\'\n\n\nhjghf'),('Ivy@nyu.edu','p235','2015-12-21 12:01:55','I like comedy!'),('Ivy@nyu.edu','p239','2017-03-11 19:33:30','U guys really made a breakthrough! '),('ll@nyu.edu','p233','2017-05-05 14:05:27','hahha'),('Tom@nyu.edu','p235','2017-04-12 10:01:07','The movie is really funny!Hahaha'),('Tom@nyu.edu','p238','2017-05-05 13:09:47','haha'),('Tom@nyu.edu','p239','2017-05-05 13:18:42','bucuo'),('Tom@nyu.edu','p242','2016-08-07 18:22:34','I\'m looking forward to the fatanstic jazz club:)');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
  `loginname1` varchar(40) NOT NULL,
  `loginname2` varchar(40) NOT NULL,
  PRIMARY KEY (`loginname1`,`loginname2`),
  KEY `loginname2` (`loginname2`),
  CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`loginname1`) REFERENCES `user` (`loginname`),
  CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`loginname2`) REFERENCES `user` (`loginname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES ('Brown@nyu.edu','Amy@nyu.edu'),('Amy@nyu.edu','Antonio@nyu.edu'),('BobInBrooklyn','Antonio@nyu.edu'),('Tom@nyu.edu','Antonio@nyu.edu'),('Amy@nyu.edu','Bob@nyu.edu'),('BobInBrooklyn','Bob@nyu.edu'),('ll@nyu.edu','Bob@nyu.edu'),('Antonio@nyu.edu','Boy@nyu.edu'),('Evelyn@nyu.edu','Boy@nyu.edu'),('Tom@nyu.edu','Boy@nyu.edu'),('Amy@nyu.edu','Brown@nyu.edu'),('Antonio@nyu.edu','Evelyn@nyu.edu'),('Brown@nyu.edu','Evelyn@nyu.edu'),('BobInBrooklyn','Ivy@nyu.edu'),('Boy@nyu.edu','Ivy@nyu.edu'),('Brown@nyu.edu','Ivy@nyu.edu'),('Jack@nyu.edu','Ivy@nyu.edu'),('Jane@nyu.edu','Ivy@nyu.edu'),('Brown@nyu.edu','Jane@nyu.edu'),('Evelyn@nyu.edu','Jane@nyu.edu'),('BobInBrooklyn','Tom@nyu.edu');
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `loginname` varchar(40) CHARACTER SET utf8 NOT NULL,
  `history_info` varchar(200) CHARACTER SET utf8 NOT NULL,
  `acttime` datetime NOT NULL,
  `actid` varchar(40) DEFAULT NULL,
  `tag` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`loginname`,`acttime`),
  CONSTRAINT `history_ibfk_1` FOREIGN KEY (`loginname`) REFERENCES `user` (`loginname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES ('Amy@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:20:13','p255','p'),('Amy@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:20:22','p255','p'),('Amy@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:20:35','p255','p'),('Amy@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:20:58','p255','p'),('Amy@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:21:22','p255','p'),('Amy@nyu.edu','You checked a request (r676) about the project \"haha\".','2017-05-05 13:22:05','r676','r'),('Amy@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:22:25','p255','p'),('Amy@nyu.edu','You checked a request (r676) about the project \"haha\".','2017-05-05 13:22:35','r676','r'),('Amy@nyu.edu','You checked a request (r676) about the project \"haha\".','2017-05-05 13:23:12','r676','r'),('Amy@nyu.edu','You checked a request (r676) about the project \"haha\".','2017-05-05 13:23:37','r676','r'),('Amy@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:25:46','p255','p'),('Amy@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:25:56','p255','p'),('Amy@nyu.edu','You viewed a project \"Brooklyn making music\" (p233).','2017-05-05 13:53:29','p233','p'),('Amy@nyu.edu','You viewed a project \"666\" (p256).','2017-05-05 13:53:45','p256','p'),('Amy@nyu.edu','You checked a request (r677) about the project \"666\".','2017-05-05 13:54:20','r677','r'),('Amy@nyu.edu','You checked a request (r677) about the project \"666\".','2017-05-05 13:54:27','r677','r'),('Amy@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:55:30','p255','p'),('Amy@nyu.edu','You viewed a project \"666\" (p256).','2017-05-05 13:55:36','p256','p'),('Amy@nyu.edu','You checked a request (r677) about the project \"666\".','2017-05-05 13:55:44','r677','r'),('Amy@nyu.edu','You viewed a project \"666\" (p256).','2017-05-05 13:56:03','p256','p'),('Amy@nyu.edu','You viewed a project \"666\" (p256).','2017-05-05 13:56:05','p256','p'),('Amy@nyu.edu','You viewed a project \"666\" (p256).','2017-05-05 13:56:28','p256','p'),('Amy@nyu.edu','You viewed a project \"666\" (p256).','2017-05-05 13:57:16','p256','p'),('BobInBrooklyn','You viewed a project \"Brooklyn making music\" (p233).','2017-05-05 12:05:40','p233','p'),('BobInBrooklyn','You checked a request (r123) about the project \"Writing poetry\".','2017-05-05 12:06:19','r123','r'),('BobInBrooklyn','You clicked on a category \"Academic\".','2017-05-05 12:07:21','Academic','c'),('BobInBrooklyn','You clicked on a category \"Academic\".','2017-05-05 12:19:36','Academic','c'),('BobInBrooklyn','You clicked on a category \"Academic\".','2017-05-05 12:20:47','Academic','c'),('BobInBrooklyn','You viewed a project \"Brooklyn making music\" (p233).','2017-05-05 12:27:19','p233','p'),('BobInBrooklyn','You clicked on a category \"Academic\".','2017-05-05 12:27:27','Academic','c'),('BobInBrooklyn','You checked a request (r123) about the project \"Writing poetry\".','2017-05-05 12:31:22','r123','r'),('BobInBrooklyn','You checked a request (r123) about the project \"Writing poetry\".','2017-05-05 12:31:28','r123','r'),('BobInBrooklyn','You viewed a project \"Brooklyn making music\" (p233).','2017-05-05 12:31:35','p233','p'),('BobInBrooklyn','You clicked on a category \"Academic\".','2017-05-05 12:31:39','Academic','c'),('BobInBrooklyn','You viewed a project \"Writing poetry\" (p238).','2017-05-05 12:42:41','p238','p'),('BobInBrooklyn','You viewed a project \"test\" (p248).','2017-05-05 12:42:55','p248','p'),('BobInBrooklyn','You viewed a project \"test\" (p248).','2017-05-05 13:04:00','p248','p'),('BobInBrooklyn','You viewed a project \"test\" (p248).','2017-05-05 13:05:31','p248','p'),('BobInBrooklyn','You viewed a project \"test\" (p248).','2017-05-05 13:05:43','p248','p'),('BobInBrooklyn','You viewed a project \"test\" (p248).','2017-05-05 13:05:57','p248','p'),('Boy@nyu.edu','You viewed a project \"Filming a comedy\" (p235).','2017-05-05 13:48:45','p235','p'),('Boy@nyu.edu','You viewed a project \"India Jazz\" (p237).','2017-05-05 13:48:48','p237','p'),('Boy@nyu.edu','You viewed a project \"Writing books\" (p236).','2017-05-05 13:48:50','p236','p'),('Boy@nyu.edu','You viewed a project \"Writing books\" (p236).','2017-05-05 13:48:51','p236','p'),('Boy@nyu.edu','You viewed a project \"Writing books\" (p236).','2017-05-05 13:48:58','p236','p'),('Boy@nyu.edu','You checked a request (r668) about the project \"Writing books\".','2017-05-05 13:49:10','r668','r'),('Brown@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:26:45','p255','p'),('Brown@nyu.edu','You viewed a project \"Report on the State of the Animal\" (p244).','2017-05-05 13:27:28','p244','p'),('Brown@nyu.edu','You viewed a project \"Report on the State of the Animal\" (p244).','2017-05-05 13:27:41','p244','p'),('Brown@nyu.edu','You viewed a project \"Report on the State of the Animal\" (p244).','2017-05-05 13:27:57','p244','p'),('Brown@nyu.edu','You checked a request (r668) about the project \"Writing books\".','2017-05-05 13:28:22','r668','r'),('Brown@nyu.edu','You viewed a project \"Writing books\" (p236).','2017-05-05 13:28:54','p236','p'),('Brown@nyu.edu','You viewed a project \"Brooklyn making music\" (p233).','2017-05-05 13:30:17','p233','p'),('Brown@nyu.edu','You viewed a project \"Afrodaddy\'s Jazz Club\" (p242).','2017-05-05 13:46:58','p242','p'),('Brown@nyu.edu','You checked a request (r346) about the project \"Afrodaddy\'s Jazz Club\".','2017-05-05 13:47:17','r346','r'),('Brown@nyu.edu','You viewed a project \"Fab Vinyls\" (p243).','2017-05-05 13:47:54','p243','p'),('Brown@nyu.edu','You viewed a project \"Afrodaddy\'s Jazz Club\" (p242).','2017-05-05 13:47:58','p242','p'),('Brown@nyu.edu','You viewed a project \"Afrodaddy\'s Jazz Club\" (p242).','2017-05-05 13:48:03','p242','p'),('Brown@nyu.edu','You viewed a project \"Fab Vinyls\" (p243).','2017-05-05 13:48:06','p243','p'),('Brown@nyu.edu','You viewed a project \"Writing books\" (p236).','2017-05-05 13:49:49','p236','p'),('Brown@nyu.edu','You viewed a project \"Afrodaddy\'s Jazz Club\" (p242).','2017-05-05 13:50:01','p242','p'),('Brown@nyu.edu','You viewed a project \"Afrodaddy\'s Jazz Club\" (p242).','2017-05-05 13:50:11','p242','p'),('Brown@nyu.edu','You viewed a project \"Fab Vinyls\" (p243).','2017-05-05 13:50:21','p243','p'),('Brown@nyu.edu','You viewed a project \"Afrodaddy\'s Jazz Club\" (p242).','2017-05-05 13:50:31','p242','p'),('Brown@nyu.edu','You viewed a project \"Fab Vinyls\" (p243).','2017-05-05 13:50:36','p243','p'),('Brown@nyu.edu','You viewed a project \"Fab Vinyls\" (p243).','2017-05-05 13:51:25','p243','p'),('Brown@nyu.edu','You clicked on a category \"Academic\".','2017-05-05 13:51:56','Academic','c'),('Brown@nyu.edu','You clicked on a category \"Academic\".','2017-05-05 13:52:01','Academic','c'),('Brown@nyu.edu','You checked a request (r677) about the project \"666\".','2017-05-05 13:54:50','r677','r'),('Brown@nyu.edu','You checked a request (r677) about the project \"666\".','2017-05-05 13:54:58','r677','r'),('Brown@nyu.edu','You viewed a project \"666\" (p256).','2017-05-05 13:57:40','p256','p'),('Brown@nyu.edu','You viewed a project \"666\" (p256).','2017-05-05 13:57:50','p256','p'),('ll@nyu.edu','You viewed a project \"99\" (p257).','2017-05-05 14:03:30','p257','p'),('ll@nyu.edu','You viewed a project \"Brooklyn making music\" (p233).','2017-05-05 14:05:04','p233','p'),('ll@nyu.edu','You viewed a project \"Brooklyn making music\" (p233).','2017-05-05 14:05:27','p233','p'),('ll@nyu.edu','You checked a request (r673) about the project \"test1\".','2017-05-05 14:06:11','r673','r'),('ll@nyu.edu','You checked a request (r673) about the project \"test1\".','2017-05-05 14:06:42','r673','r'),('ll@nyu.edu','You checked a request (r673) about the project \"test1\".','2017-05-05 14:07:13','r673','r'),('Tom@nyu.edu','You viewed a project \"Brooklyn making music\" (p233).','2017-05-05 13:06:17','p233','p'),('Tom@nyu.edu','You viewed a project \"test\" (p248).','2017-05-05 13:06:23','p248','p'),('Tom@nyu.edu','You viewed a project \"Writing poetry\" (p238).','2017-05-05 13:06:29','p238','p'),('Tom@nyu.edu','You viewed a project \"Writing poetry\" (p238).','2017-05-05 13:06:45','p238','p'),('Tom@nyu.edu','You clicked on a category \"Academic\".','2017-05-05 13:08:46','Academic','c'),('Tom@nyu.edu','You viewed a project \"Networking security research\" (p239).','2017-05-05 13:08:47','p239','p'),('Tom@nyu.edu','You clicked on a category \"Academic\".','2017-05-05 13:08:49','Academic','c'),('Tom@nyu.edu','You viewed a project \"The Liberal Studies Leader\" (p241).','2017-05-05 13:08:50','p241','p'),('Tom@nyu.edu','You clicked on a category \"Academic\".','2017-05-05 13:08:51','Academic','c'),('Tom@nyu.edu','You viewed a project \"hahaha\" (p251).','2017-05-05 13:08:53','p251','p'),('Tom@nyu.edu','You clicked on a category \"Academic\".','2017-05-05 13:08:54','Academic','c'),('Tom@nyu.edu','You viewed a project \"Writing poetry\" (p238).','2017-05-05 13:09:42','p238','p'),('Tom@nyu.edu','You viewed a project \"Writing poetry\" (p238).','2017-05-05 13:09:47','p238','p'),('Tom@nyu.edu','You viewed a project \"Brooklyn making music\" (p233).','2017-05-05 13:10:17','p233','p'),('Tom@nyu.edu','You viewed a project \"Writing poetry\" (p238).','2017-05-05 13:10:23','p238','p'),('Tom@nyu.edu','You clicked on a category \"Academic\".','2017-05-05 13:18:27','Academic','c'),('Tom@nyu.edu','You viewed a project \"Networking security research\" (p239).','2017-05-05 13:18:28','p239','p'),('Tom@nyu.edu','You viewed a project \"Networking security research\" (p239).','2017-05-05 13:18:42','p239','p'),('Tom@nyu.edu','You checked a request (r669) about the project \"India Jazz\".','2017-05-05 13:24:33','r669','r'),('Tom@nyu.edu','You checked a request (r676) about the project \"haha\".','2017-05-05 13:24:41','r676','r'),('Tom@nyu.edu','You checked a request (r676) about the project \"haha\".','2017-05-05 13:24:47','r676','r'),('Tom@nyu.edu','You viewed a project \"haha\" (p255).','2017-05-05 13:25:06','p255','p'),('Tom@nyu.edu','You viewed a project \"Writing poetry\" (p238).','2017-05-05 15:54:25','p238','p'),('Tom@nyu.edu','You viewed a project \"Writing poetry\" (p238).','2017-05-05 20:14:48','p238','p'),('Tom@nyu.edu','You viewed a project \"Brooklyn making music\" (p233).','2017-05-06 10:27:32','p233','p'),('Tom@nyu.edu','You viewed a project \"Filming a comedy\" (p235).','2017-05-06 10:27:35','p235','p'),('Tom@nyu.edu','You viewed a project \"Networking security research\" (p239).','2017-05-06 10:27:51','p239','p'),('Tom@nyu.edu','You viewed a project \"Writing poetry\" (p238).','2017-05-06 10:27:54','p238','p');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest` (
  `loginname` varchar(40) NOT NULL,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`loginname`,`category`),
  KEY `category` (`category`),
  CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`loginname`) REFERENCES `user` (`loginname`),
  CONSTRAINT `interest_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest`
--

LOCK TABLES `interest` WRITE;
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
INSERT INTO `interest` VALUES ('BobInBrooklyn','Academic'),('Brown@nyu.edu','Academic'),('Tom@nyu.edu','Academic'),('Amy@nyu.edu','Animal'),('Tom@nyu.edu','Animal'),('Brown@nyu.edu','Architecture'),('Boy@nyu.edu','Art Books'),('Antonio@nyu.edu','Comedy'),('Boy@nyu.edu','Horror Film'),('Antonio@nyu.edu','Jazz'),('Ivy@nyu.edu','Jazz'),('Ivy@nyu.edu','Poetry');
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invest`
--

DROP TABLE IF EXISTS `invest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invest` (
  `sponsor` varchar(40) NOT NULL,
  `rid` varchar(40) NOT NULL,
  `investment` decimal(10,2) DEFAULT NULL,
  `istatus` varchar(15) DEFAULT NULL,
  `itime` datetime DEFAULT NULL,
  PRIMARY KEY (`sponsor`,`rid`),
  KEY `rid` (`rid`),
  CONSTRAINT `invest_ibfk_1` FOREIGN KEY (`sponsor`) REFERENCES `user` (`loginname`),
  CONSTRAINT `invest_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `request` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invest`
--

LOCK TABLES `invest` WRITE;
/*!40000 ALTER TABLE `invest` DISABLE KEYS */;
INSERT INTO `invest` VALUES ('Amy@nyu.edu','r676',1000.00,'success','2017-05-05 13:23:37'),('Amy@nyu.edu','r677',222.00,'success','2017-05-05 13:54:27'),('Antonio@nyu.edu','r123',4500.00,'success','2015-12-01 14:01:37'),('Antonio@nyu.edu','r125',1239.90,'success','2017-05-03 11:22:44'),('Antonio@nyu.edu','r346',85000.00,'success','2016-08-22 14:01:37'),('Antonio@nyu.edu','r347',9000.00,'fail','2017-03-01 07:01:12'),('Antonio@nyu.edu','r674',131.00,'success','2017-05-03 23:05:52'),('BobInBrooklyn','r125',1760.10,'success','2017-05-03 11:58:28'),('BobInBrooklyn','r666',3000.00,'success','2017-03-05 09:41:37'),('BobInBrooklyn','r672',1000.00,'success','2017-05-03 23:03:39'),('BobInBrooklyn','r673',100.00,'pending','2017-05-04 01:24:06'),('BobInBrooklyn','r674',100.00,'success','2017-05-03 23:04:14'),('Boy@nyu.edu','r123',5500.00,'success','2016-01-30 16:11:30'),('Boy@nyu.edu','r346',35000.00,'success','2016-11-09 20:01:06'),('Boy@nyu.edu','r670',700000.00,'success','2015-06-06 07:01:32'),('Brown@nyu.edu','r124',10000.00,'success','2015-10-01 08:01:22'),('Brown@nyu.edu','r125',7000.00,'success','2017-05-03 12:11:46'),('Brown@nyu.edu','r348',4000.00,'success','2016-10-11 11:31:37'),('Brown@nyu.edu','r668',500.00,'success','2017-04-08 12:01:59'),('Brown@nyu.edu','r677',8778.00,'success','2017-05-05 13:54:58'),('Evelyn@nyu.edu','r124',14000.00,'success','2015-12-21 11:11:37'),('Evelyn@nyu.edu','r349',7000.00,'success','2016-07-24 10:55:30'),('Evelyn@nyu.edu','r669',2000.00,'pending','2017-05-23 16:00:37'),('Ivy@nyu.edu','r124',11000.00,'success','2016-01-12 12:03:38'),('Ivy@nyu.edu','r667',150000.00,'success','2015-12-15 04:34:48'),('Ivy@nyu.edu','r668',800.00,'success','2017-04-27 11:01:00'),('Jack@nyu.edu','r345',7000.00,'success','2016-03-08 18:22:00'),('Jack@nyu.edu','r667',200000.00,'success','2016-01-03 12:01:08'),('Jack@nyu.edu','r670',550000.00,'success','2015-11-10 18:01:33'),('Jane@nyu.edu','r345',8000.00,'success','2016-04-01 21:01:16'),('Jane@nyu.edu','r666',1000.00,'success','2017-03-11 13:07:07'),('Jane@nyu.edu','r667',450000.00,'success','2016-02-22 19:31:00'),('ll@nyu.edu','r673',100.00,'pending','2017-05-05 14:07:13'),('Tom@nyu.edu','r346',30000.00,'success','2017-01-05 10:01:37'),('Tom@nyu.edu','r666',1000.00,'success','2017-04-06 14:01:37'),('Tom@nyu.edu','r667',100000.00,'success','2017-03-18 14:00:00'),('Tom@nyu.edu','r676',1000.00,'success','2017-05-05 13:24:47');
/*!40000 ALTER TABLE `invest` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `calculate_funds` BEFORE INSERT ON `invest` FOR EACH ROW begin
		if((select new.investment+actual_amount from Request where Request.rid = new.rid) >= (select max_amount from Request where Request.rid = new.rid)) then
				set new.investment=(select (max_amount-actual_amount)from request where request.rid = new.rid), new.istatus = 'success';
                
                update Request 
                set rstatus = 'over', actual_amount = max_amount
                where Request.rid = new.rid;
                
                update Project
                set pstatus = 'processing'
                where Project.pid = (select pid from (select * from Request natural join Project where Request.rid = new.rid) as a);
		else
				update Request
                set actual_amount = actual_amount + new.investment
                where Request.rid = new.rid;
		end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `loginname` varchar(40) NOT NULL,
  `pid` varchar(40) NOT NULL,
  PRIMARY KEY (`loginname`,`pid`),
  KEY `pid` (`pid`),
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`loginname`) REFERENCES `user` (`loginname`),
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `project` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES ('Evelyn@nyu.edu','p233'),('ll@nyu.edu','p233'),('Antonio@nyu.edu','p234'),('Ivy@nyu.edu','p234'),('Ivy@nyu.edu','p235'),('Jane@nyu.edu','p235'),('Antonio@nyu.edu','p237'),('Antonio@nyu.edu','p238'),('Brown@nyu.edu','p239'),('Evelyn@nyu.edu','p241'),('Brown@nyu.edu','p244'),('Evelyn@nyu.edu','p245'),('Brown@nyu.edu','p246'),('Amy@nyu.edu','p255');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentation` (
  `pid` varchar(40) NOT NULL,
  `updatetime` datetime NOT NULL,
  `path` varchar(200) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pid`,`updatetime`),
  CONSTRAINT `presentation_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `project` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentation`
--

LOCK TABLES `presentation` WRITE;
/*!40000 ALTER TABLE `presentation` DISABLE KEYS */;
INSERT INTO `presentation` VALUES ('p238','2017-05-05 13:06:43','/project1/presentation/p238/WechatIMG7.jpeg','WechatIMG7.jpeg'),('p242','2017-05-05 13:50:10','/project1/presentation/p242/license.txt','license.txt'),('p248','2017-05-05 13:05:42','/project1/presentation/p248/WechatIMG7.jpeg','WechatIMG7.jpeg'),('p248','2017-05-05 13:05:56','/project1/presentation/p248/Change Log.txt','Change Log.txt'),('p255','2017-05-05 13:20:20','/project1/presentation/p255/WechatIMG7.jpeg','WechatIMG7.jpeg'),('p255','2017-05-05 13:25:55','/project1/presentation/p255/Change Log.txt','Change Log.txt'),('p256','2017-05-05 13:56:27','/project1/presentation/p256/star-on.png','star-on.png');
/*!40000 ALTER TABLE `presentation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `pid` varchar(40) NOT NULL,
  `pname` varchar(40) DEFAULT NULL,
  `owner` varchar(40) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `pstatus` varchar(15) DEFAULT 'idle',
  PRIMARY KEY (`pid`),
  KEY `owner` (`owner`),
  KEY `category` (`category`),
  CONSTRAINT `project_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`loginname`),
  CONSTRAINT `project_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES ('p233','Brooklyn making music','Evelyn@nyu.edu','This is album about jazz','Jazz','idle'),('p234','Creating painting','Evelyn@nyu.edu','Wonderful landscape paintings','Painting','processing'),('p235','Filming a comedy','Boy@nyu.edu','Funny funny movie!','Comedy','completed'),('p236','Writing books','Boy@nyu.edu','19th century famous art book revision','Art Books','completed'),('p237','India Jazz','Boy@nyu.edu','Unique indian jazz music','Jazz','request'),('p238','Writing poetry','Tom@nyu.edu','Old poem collection','Poetry','completed'),('p239','Networking security research','Tom@nyu.edu','Doing research on network fingerprinter security ','Academic','completed'),('p240','Face\'s New Album','Tom@nyu.edu','Our most ambitious album project ever. More original songs.','Rock','processing'),('p241','The Liberal Studies Leader','Tom@nyu.edu','The Liberal Studies Leader is a website for sharing academic leadership and liberal arts knowledge','Academic','completed'),('p242','Afrodaddy\'s Jazz Club','Brown@nyu.edu','Afrodaddy\'s Jazz Club is a live jazz venue dedicated to N/NE Portland\'s jazz legacy','Jazz','processing'),('p243','Fab Vinyls','Brown@nyu.edu','Fab is re-releasing their two albums in vinyl for the 10th anniversary of the recordings.','Blues','fail'),('p244','Report on the State of the Animal','Ivy@nyu.edu','Stories of hope and drama are quietly taking place in remote wilderness areas.','Animal','completed'),('p245','Cooking with Dice','Ivy@nyu.edu','Cooking with Dice is an RPG-themed gamified cookbook.','Food','completed'),('p246','POOKIE: A Horror Short','Ivy@nyu.edu','A dark and campy horror romp through a Bushwick apartment with drugs and demons, blood and gore, a gutter punk and a southern belle','Horror Film','completed'),('p247','Redesign library','Jack@nyu.edu','Ideas and plans about modern design','Architecture','fail'),('p248','test','BobInBrooklyn','just a test','Others','processing'),('p249','test1','BobInBrooklyn','test1','Animal','request'),('p250','another test','BobInBrooklyn','aaa','Academic','processing'),('p251','hahaha','BobInBrooklyn','sdff','Academic','idle'),('p252','1234','Evelyn@nyu.edu','fdsf','Art books','request'),('p253','1234','BobInBrooklyn','1232','Academic','idle'),('p254','lalla','Tom@nyu.edu','dsjfksdjf','Academic','idle'),('p255','haha','Amy@nyu.edu','hhahha','Food','processing'),('p256','666','Amy@nyu.edu','666','Blues','completed'),('p257','99','ll@nyu.edu','sjdkfjsf','Action film','idle');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER setpid BEFORE INSERT ON project FOR EACH ROW begin set new.pid=concat('p',lpad(((SELECT substring(pid,2,3) from project where pid=(select pid from project order by pid desc limit 1))+1),3,0)); END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rate` (
  `sponsor` varchar(40) NOT NULL,
  `pid` varchar(40) NOT NULL,
  `star` int(11) DEFAULT '0',
  PRIMARY KEY (`sponsor`,`pid`),
  KEY `pid` (`pid`),
  CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`sponsor`) REFERENCES `user` (`loginname`),
  CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `project` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rate`
--

LOCK TABLES `rate` WRITE;
/*!40000 ALTER TABLE `rate` DISABLE KEYS */;
INSERT INTO `rate` VALUES ('Amy@nyu.edu','p256',4),('Antonio@nyu.edu','p238',4),('Boy@nyu.edu','p238',4),('Boy@nyu.edu','p246',4),('Brown@nyu.edu','p236',4),('Brown@nyu.edu','p239',3),('Brown@nyu.edu','p256',5),('Evelyn@nyu.edu','p239',4),('Evelyn@nyu.edu','p245',4),('Ivy@nyu.edu','p235',2),('Ivy@nyu.edu','p239',4),('Jack@nyu.edu','p235',5),('Jack@nyu.edu','p241',5),('Jack@nyu.edu','p246',4),('Jane@nyu.edu','p235',1),('Jane@nyu.edu','p241',3),('Tom@nyu.edu','p235',4);
/*!40000 ALTER TABLE `rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request` (
  `rid` varchar(40) NOT NULL,
  `pid` varchar(40) DEFAULT NULL,
  `min_amount` decimal(10,2) DEFAULT NULL,
  `max_amount` decimal(10,2) DEFAULT NULL,
  `endtime` date DEFAULT NULL,
  `planned_compl_time` date DEFAULT NULL,
  `rstatus` varchar(15) DEFAULT NULL,
  `rposttime` datetime DEFAULT NULL,
  `actual_amount` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`rid`),
  KEY `pid` (`pid`),
  CONSTRAINT `request_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `project` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES ('r123','p238',2000.00,12000.00,'2016-02-27','2017-04-03','over','2015-11-21 12:11:00',10000.00),('r124','p239',10000.00,50000.00,'2016-01-31','2017-02-28','over','2015-09-11 15:31:30',35000.00),('r125','p240',3000.00,10000.00,'2017-05-13','2018-01-01','over','2017-02-01 08:01:59',10000.00),('r345','p241',5500.00,15000.00,'2016-04-30','2017-01-25','over','2016-03-01 14:07:37',15000.00),('r346','p242',100000.00,250000.00,'2017-02-02','2017-11-30','over','2016-06-01 14:22:24',150000.00),('r347','p243',15000.00,35000.00,'2017-03-31','2017-10-30','over','2017-01-01 20:08:37',0.00),('r348','p244',2500.00,4000.00,'2016-11-08','2017-04-01','over','2016-09-28 10:11:11',4000.00),('r349','p245',5000.00,8000.00,'2016-09-11','2017-04-30','over','2016-06-03 07:12:19',7000.00),('r666','p234',1000.00,5000.00,'2017-04-30','2017-06-01','over','2017-03-01 14:01:37',5000.00),('r667','p235',200000.00,1000000.00,'2016-03-28','2017-03-30','over','2015-12-01 10:01:07',900000.00),('r668','p236',1000.00,10000.00,'2017-05-03','2017-12-30','over','2017-03-11 09:11:37',1300.00),('r669','p237',5000.00,10000.00,'2017-06-18','2017-12-16','pending','2017-03-03 11:11:11',2000.00),('r670','p246',600000.00,1500000.00,'2016-01-31','2017-02-21','over','2015-03-31 12:22:33',1250000.00),('r671','p247',10000.00,30000.00,'2017-04-20','2018-01-01','over','2017-04-19 00:00:01',0.00),('r672','p248',100.00,1000.00,'2017-05-05','2017-05-24','over','2017-05-03 22:25:22',1000.00),('r673','p249',123.00,1234.00,'2017-05-15','2018-06-13','pending','2017-05-03 22:27:44',200.00),('r674','p250',123.00,231.00,'2017-05-17','2017-05-31','over','2017-05-03 22:58:36',231.00),('r675','p252',100.00,1000.00,'2017-05-15','2017-05-31','pending','2017-05-04 11:07:06',0.00),('r676','p255',1000.00,2000.00,'2017-05-09','2017-05-23','over','2017-05-05 13:22:02',2000.00),('r677','p256',123.00,9000.00,'2017-05-16','2017-07-12','over','2017-05-05 13:54:09',9000.00);
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `setrid` BEFORE INSERT ON `request` FOR EACH ROW begin set new.rid=concat('r',lpad(((SELECT substring(rid,2,3) from request where rid=(select rid from request order by rid desc limit 1))+1),3,0)); END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `loginname` varchar(40) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `hometown` varchar(40) DEFAULT NULL,
  `ccn` char(16) DEFAULT NULL,
  PRIMARY KEY (`loginname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('Amy@nyu.edu','Amy li','123','China','1234667788990023'),('Antonio@nyu.edu','Antonio Rod','123456','India','4859678475611234'),('Bob@nyu.edu','Bob Lan','111',NULL,NULL),('BobInBrooklyn','Bob Liu','1234','China','1234567890123456'),('Boy@nyu.edu','Boy Xu','234567','China','8476372654112233'),('Brown@nyu.edu','Brown Snow','123','Britain','3485769403823456'),('Evelyn@nyu.edu','Evelyn ','123','China','3847596878667788'),('Ivy@nyu.edu','Ivy Yu','23455','America','2039485768008877'),('Jack@nyu.edu','Jack Smith','334455','Russia','9178594837567890'),('Jane@nyu.edu','Jane Jing','lalala','Korea','3948506859412345'),('ll@nyu.edu','lili ','123','China','1234567890123456'),('Ted@nyu.edu','Ted Gao','pass',NULL,NULL),('Tom@nyu.edu','Tom  White','abc','American','4578394058747890');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'CrowdFunding'
--
/*!50106 SET @save_time_zone= @@TIME_ZONE */ ;
/*!50106 DROP EVENT IF EXISTS `checktimeisup` */;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8 */ ;;
/*!50003 SET character_set_results = utf8 */ ;;
/*!50003 SET collation_connection  = utf8_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `checktimeisup` ON SCHEDULE EVERY 1 DAY STARTS '2017-04-20 00:01:00' ON COMPLETION PRESERVE ENABLE DO set SQL_SAFE_UPDATES = 0 */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
DELIMITER ;
/*!50106 SET TIME_ZONE= @save_time_zone */ ;

--
-- Dumping routines for database 'CrowdFunding'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-06 10:41:27

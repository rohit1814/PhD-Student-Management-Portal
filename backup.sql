-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: user_accounts
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achievements` (
  `achId` int(5) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `achievedBy` varchar(50) NOT NULL,
  `dateOfAchieved` date NOT NULL,
  PRIMARY KEY (`achId`),
  UNIQUE KEY `title` (`title`),
  KEY `userId` (`userId`),
  CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievements`
--

LOCK TABLES `achievements` WRITE;
/*!40000 ALTER TABLE `achievements` DISABLE KEYS */;
INSERT INTO `achievements` VALUES (1,4,'hello achievements','Hello Description from the acievement of hello 12345',1,'Shivangi Shukla','2019-03-05'),(4,4,'hello Publishements','Hello Description from the acievement of hello 12345',1,'Shivangi Shukla','2019-03-04'),(9,4,'First Achievements','This is my First Achievement and I am very excited',1,'Shubham Soni','2019-03-04');
/*!40000 ALTER TABLE `achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcCommittee`
--

DROP TABLE IF EXISTS `dcCommittee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcCommittee` (
  `dcId` varchar(10) NOT NULL,
  `dcName` varchar(25) NOT NULL,
  `dcDesg` varchar(50) NOT NULL,
  `dcDescription` varchar(250) NOT NULL,
  PRIMARY KEY (`dcId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcCommittee`
--

LOCK TABLES `dcCommittee` WRITE;
/*!40000 ALTER TABLE `dcCommittee` DISABLE KEYS */;
INSERT INTO `dcCommittee` VALUES ('EMP01','Hritik kumar','Internal-Guide','I am a internal guide for your project So be careful');
/*!40000 ALTER TABLE `dcCommittee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (101,'create-post','Can create the post'),(102,'update-post','Can update the post'),(103,'delete-post','Can delete the post'),(104,'publish-post','Can publish the post');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publishedPapers`
--

DROP TABLE IF EXISTS `publishedPapers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publishedPapers` (
  `pubId` int(5) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `publishedBy` varchar(50) NOT NULL,
  `dateOfPublished` date NOT NULL,
  PRIMARY KEY (`pubId`),
  UNIQUE KEY `title` (`title`),
  KEY `userId` (`userId`),
  CONSTRAINT `publishedPapers_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publishedPapers`
--

LOCK TABLES `publishedPapers` WRITE;
/*!40000 ALTER TABLE `publishedPapers` DISABLE KEYS */;
INSERT INTO `publishedPapers` VALUES (1,4,'hello Publishements','Hello Description from the publication of hello 12345',1,'Shivangi Shukla','2019-03-04');
/*!40000 ALTER TABLE `publishedPapers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','Has the authority of users and roles and permissions.'),(2,'Author','Has full authority of own posts'),(3,'Editor','Has full authority over all posts');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblclasses`
--

DROP TABLE IF EXISTS `tblclasses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(4) NOT NULL,
  `Section` varchar(5) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblclasses`
--

LOCK TABLES `tblclasses` WRITE;
/*!40000 ALTER TABLE `tblclasses` DISABLE KEYS */;
INSERT INTO `tblclasses` VALUES (1,'First',1,'C','2017-06-06 11:22:33','2017-06-07 00:23:47'),(2,'Second',2,'A','2017-06-06 11:51:20','2017-06-06 11:51:38'),(4,'Fourth',4,'C','2017-06-07 03:50:23','0000-00-00 00:00:00'),(5,'Sixth',6,'A','2017-06-07 04:05:08','0000-00-00 00:00:00'),(6,'Sixth',6,'B','2017-08-28 13:12:41','2017-08-28 13:13:02'),(7,'Seventh',7,'B','2017-08-28 13:22:00','2017-08-28 13:22:15'),(8,'Eight',8,'A','2017-08-28 13:51:05','2017-08-28 13:51:24');
/*!40000 ALTER TABLE `tblclasses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblresult`
--

DROP TABLE IF EXISTS `tblresult`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblresult`
--

LOCK TABLES `tblresult` WRITE;
/*!40000 ALTER TABLE `tblresult` DISABLE KEYS */;
INSERT INTO `tblresult` VALUES (2,1,1,2,100,'2017-08-24 12:24:09','2017-08-28 13:04:32'),(3,1,1,1,80,'2017-08-24 12:24:09','2017-08-28 13:04:25'),(4,1,1,5,78,'2017-08-24 12:24:09','2017-08-28 13:04:26'),(5,1,1,4,60,'2017-08-24 12:24:09','2017-08-28 13:04:26'),(6,2,4,2,90,'2017-08-28 13:08:18',NULL),(7,2,4,1,75,'2017-08-28 13:08:18',NULL),(8,2,4,5,56,'2017-08-28 13:08:18','2017-08-28 13:56:42'),(9,2,4,4,80,'2017-08-28 13:08:18','2017-08-28 13:56:42'),(10,4,7,2,54,'2017-08-28 13:26:21','2017-08-28 13:33:10'),(11,4,7,1,85,'2017-08-28 13:26:21',NULL),(12,4,7,5,55,'2017-08-28 13:26:21','2017-08-28 13:33:10'),(13,4,7,7,65,'2017-08-28 13:26:21','2017-08-28 13:33:10'),(14,5,8,2,75,'2017-08-28 13:55:07',NULL),(15,5,8,1,56,'2017-08-28 13:55:07',NULL),(16,5,8,5,52,'2017-08-28 13:55:07',NULL),(17,5,8,4,80,'2017-08-28 13:55:07',NULL);
/*!40000 ALTER TABLE `tblresult` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstudents`
--

DROP TABLE IF EXISTS `tblstudents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstudents` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL,
  `StudentEmail` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`StudentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstudents`
--

LOCK TABLES `tblstudents` WRITE;
/*!40000 ALTER TABLE `tblstudents` DISABLE KEYS */;
INSERT INTO `tblstudents` VALUES (1,'Sarita','46456','info@phpgurukul.com','Female','1995-03-03',1,'2017-06-12 05:00:57','2017-08-25 23:06:37',1),(2,'Anuj kumar','10861','anuj@gmail.co','Male','1995-02-02',4,'2017-08-19 13:48:28','2017-08-25 23:29:17',0),(3,'amit kumar','2626','amit@gmail.com','Male','2014-08-06',6,'2017-08-28 13:15:31','2017-08-28 13:16:02',1),(4,'rahul kumar','990','rahul01@gmail.com','Male','2001-02-03',7,'2017-08-28 13:24:58','2017-08-28 13:25:20',1),(5,'sanjeev singh','122','sanjeev01@gmail.com','Male','2002-02-03',8,'2017-08-28 13:53:53','2017-08-28 13:54:15',1);
/*!40000 ALTER TABLE `tblstudents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubjectcombination`
--

DROP TABLE IF EXISTS `tblsubjectcombination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubjectcombination`
--

LOCK TABLES `tblsubjectcombination` WRITE;
/*!40000 ALTER TABLE `tblsubjectcombination` DISABLE KEYS */;
INSERT INTO `tblsubjectcombination` VALUES (3,2,5,1,'2017-06-07 05:46:56','2017-06-07 05:46:56'),(4,1,2,1,'2017-06-12 01:16:32','2017-06-12 01:16:32'),(5,1,4,1,'2017-06-12 01:16:35','2017-06-12 01:16:35'),(6,1,5,1,'2017-06-12 01:16:40','2017-06-12 01:16:40'),(8,4,4,1,'2017-08-25 21:51:27','2017-08-25 21:51:27'),(10,4,1,1,'2017-08-25 21:52:05','2017-08-25 21:52:05'),(12,4,2,1,'2017-08-25 21:52:15','2017-08-25 21:52:15'),(13,4,5,1,'2017-08-25 21:52:20','2017-08-25 21:52:20'),(14,6,1,1,'2017-08-28 13:14:06','2017-08-28 13:14:06'),(15,6,2,1,'2017-08-28 13:14:12','2017-08-28 13:14:12'),(16,6,4,1,'2017-08-28 13:14:18','2017-08-28 13:14:18'),(17,6,6,1,'2017-08-28 13:14:23','2017-08-28 13:14:23'),(18,7,1,1,'2017-08-28 13:23:12','2017-08-28 13:23:12'),(19,7,7,1,'2017-08-28 13:23:19','2017-08-28 13:23:19'),(20,7,2,1,'2017-08-28 13:23:38','2017-08-28 13:23:38'),(21,7,6,1,'2017-08-28 13:23:44','2017-08-28 13:23:44'),(22,7,5,0,'2017-08-28 13:23:50','2017-08-28 13:23:50'),(23,8,1,1,'2017-08-28 13:52:25','2017-08-28 13:52:25'),(24,8,2,1,'2017-08-28 13:52:31','2017-08-28 13:52:31'),(25,8,4,1,'2017-08-28 13:52:36','2017-08-28 13:52:36'),(26,8,6,1,'2017-08-28 13:52:42','2017-08-28 13:52:42'),(27,8,5,0,'2017-08-28 13:52:47','2017-08-28 13:52:47');
/*!40000 ALTER TABLE `tblsubjectcombination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubjects`
--

DROP TABLE IF EXISTS `tblsubjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubjects`
--

LOCK TABLES `tblsubjects` WRITE;
/*!40000 ALTER TABLE `tblsubjects` DISABLE KEYS */;
INSERT INTO `tblsubjects` VALUES (1,'Maths','MTH01','2017-06-07 03:53:57','2017-06-07 04:16:54'),(2,'English','ENG11','2017-06-07 03:54:25','0000-00-00 00:00:00'),(4,'Science','SC1','2017-06-07 04:06:15','0000-00-00 00:00:00'),(5,'Music','MS','2017-06-07 04:06:23','0000-00-00 00:00:00'),(6,'Social Studies','SS08','2017-08-28 13:13:29','2017-08-28 13:13:45'),(7,'Physics','PH03','2017-08-28 13:22:41','2017-08-28 13:22:55'),(8,'Chemistry','CH65','2017-08-28 13:51:46','2017-08-28 13:52:14');
/*!40000 ALTER TABLE `tblsubjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `users_ibfk_1` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','admin123@gmail.com','$2y$10$ZTKOldVf9uLbvq5pUYEU5.Rso2OiVsQ1vruYTIHi02cM8O9cEuqOy',NULL,'2019-03-06 03:12:04','0000-00-00 00:00:00'),(2,3,'rohit','k.rohit@iiitmanipur.ac.in','$2y$10$lqiOCdP3WfPaXECyY2lV2uJ1gR/g9BAI1JDTE7g4.qZUfsAQfpsca',NULL,'2019-03-06 03:13:38','0000-00-00 00:00:00'),(3,2,'rahul','rahul@123gmail.com','$2y$10$VLo9Xs3hLWLIMTh6KMNZsOsiK/ZjqEJnxGO1P6MUhfJ1RYrbxMxb.',NULL,'2019-03-06 03:16:57','0000-00-00 00:00:00'),(4,NULL,'shivam','shivam1998@gmail.com','$2y$10$3I.zZYxt1ZlUua0XzHwQc.hRc4N6P/8P46rJJqbnULzKIGRLqprtq',NULL,'2019-03-06 04:23:36','0000-00-00 00:00:00'),(5,NULL,'0000','abc@gmail.com','$2y$10$Hu5Lhc9nXaUg5logwVM1audbE2gFhgxy2JjJnvpk/St.TEPIFPaCC',NULL,'2019-03-06 04:50:44','0000-00-00 00:00:00'),(6,NULL,'000','0@0.com','$2y$10$HxyO3HXr/eCxcS6NBd3nLO8VTIa/cSbloVPObHUGlJmk7ris7PsFC',NULL,'2019-03-08 14:54:01','0000-00-00 00:00:00'),(7,NULL,'999','9@9gmail.com','$2y$10$V.fUj.kKQ9nuT5i/2dymX..8HwVPDM9.NgeU5n3kH4yzA/K9oikS2',NULL,'2019-03-08 15:33:38','0000-00-00 00:00:00'),(8,NULL,'111','1@gmial.com','$2y$10$9kAf6H98aJ9ICS9vbKEFKOmOOx9woG6kKHnyraK/fft3K8nPT.FEi',NULL,'2019-03-08 15:40:09','0000-00-00 00:00:00'),(18,NULL,'shiv','user@gmail.com','$2y$10$laebrWTUKPuUgmyo1zupBuAIHRFqRkUKTGryCben41tY.3oC07uD.',NULL,'2019-03-08 16:52:11','0000-00-00 00:00:00'),(19,NULL,'fuser','fuser@gmail.com','$2y$10$vCBV8RmVqpk2o3tauKYkG.1aviFRkHtGY79S3ySdeyWXmYrtiBa5.',NULL,'2019-03-08 16:53:33','0000-00-00 00:00:00'),(20,NULL,'luser','luser@email.com','$2y$10$Mt6gTJO/JlaqQwjvmyDDreueTsmXRp94g03FLGN9j5dVKYtZss6Hy',NULL,'2019-03-08 16:56:14','0000-00-00 00:00:00'),(21,NULL,'abc','kbc@gmial.com','$2y$10$VA1xu5lTnMSSGifUIii72.nY86EUJzuxeobZcM5Vv8RjX/IYKWeL2',NULL,'2019-03-09 03:44:50','0000-00-00 00:00:00'),(22,NULL,'1111','11@gmail.com','$2y$10$wpNScxzcd0q3jR2pu6BhIu4obcwVnVZpECDgcCdSdNwABE2EvQu9G',NULL,'2019-03-09 07:28:19','0000-00-00 00:00:00'),(23,NULL,'t','test@gmail.com','$2y$10$yHy/wZR9y.vMUsNXr0ccIOgcohcQPMBrxRdGhznqq6w1vSLDebpbS',NULL,'2019-03-14 15:26:13','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-16 22:55:44

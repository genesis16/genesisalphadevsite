
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `cie1_revisr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cie1_revisr` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message` text DEFAULT NULL,
  `event` varchar(42) NOT NULL,
  `user` varchar(60) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cie1_revisr` WRITE;
/*!40000 ALTER TABLE `cie1_revisr` DISABLE KEYS */;
INSERT INTO `cie1_revisr` VALUES (1,'2020-07-19 10:34:02','Successfully created a new repository.','init','njfigh'),(2,'2020-07-19 10:37:46','Successfully pushed 1 commit to origin/master.','push','njfigh'),(3,'2020-07-19 10:38:49','Error staging files.','error','njfigh'),(4,'2020-07-19 10:38:49','There was an error committing the changes to the local repository.','error','njfigh'),(5,'2020-07-19 10:40:00','Successfully backed up the database.','backup','Revisr Bot'),(6,'2020-07-19 10:40:14','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(7,'2020-07-19 10:40:14','The daily backup was successful.','backup','Revisr Bot'),(8,'2020-07-20 18:27:03','Successfully backed up the database.','backup','Revisr Bot'),(9,'2020-07-20 18:27:11','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(10,'2020-07-20 18:27:11','The daily backup was successful.','backup','Revisr Bot'),(11,'2020-07-21 10:37:06','Successfully backed up the database.','backup','Revisr Bot'),(12,'2020-07-21 10:37:12','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(13,'2020-07-21 10:37:12','The daily backup was successful.','backup','Revisr Bot'),(14,'2020-07-22 04:03:22','Committed <a href=\"http://alphadevsite.co/wp-admin/admin.php?page=revisr_view_commit&commit=0e6b81a&success=true\">#0e6b81a</a> to the local repository.','commit','njfigh'),(15,'2020-07-22 04:03:33','Successfully pushed 1 commit to origin/master.','push','njfigh'),(16,'2020-07-22 20:16:54','Error staging files.','error','Revisr Bot'),(17,'2020-07-22 20:17:05','Successfully backed up the database.','backup','Revisr Bot'),(18,'2020-07-22 20:17:16','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(19,'2020-07-22 20:17:16','The daily backup was successful.','backup','Revisr Bot'),(20,'2020-07-23 13:19:20','Successfully backed up the database.','backup','Revisr Bot'),(21,'2020-07-23 13:19:27','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(22,'2020-07-23 13:19:27','The daily backup was successful.','backup','Revisr Bot'),(23,'2020-07-24 11:14:05','Successfully backed up the database.','backup','Revisr Bot'),(24,'2020-07-24 11:14:11','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(25,'2020-07-24 11:14:11','The daily backup was successful.','backup','Revisr Bot'),(26,'2020-07-25 20:12:47','Successfully backed up the database.','backup','Revisr Bot'),(27,'2020-07-25 20:12:53','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(28,'2020-07-25 20:12:53','The daily backup was successful.','backup','Revisr Bot'),(29,'2020-07-26 10:48:49','Successfully backed up the database.','backup','Revisr Bot'),(30,'2020-07-26 10:48:55','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(31,'2020-07-26 10:48:55','The daily backup was successful.','backup','Revisr Bot'),(32,'2020-07-27 20:10:14','Successfully backed up the database.','backup','Revisr Bot'),(33,'2020-07-27 20:10:20','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(34,'2020-07-27 20:10:20','The daily backup was successful.','backup','Revisr Bot'),(35,'2020-07-28 20:11:37','Successfully backed up the database.','backup','Revisr Bot'),(36,'2020-07-28 20:11:43','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(37,'2020-07-28 20:11:43','The daily backup was successful.','backup','Revisr Bot'),(38,'2020-07-29 06:15:37','Committed <a href=\"http://alphadevsite.co/wp-admin/admin.php?page=revisr_view_commit&commit=17105b3&success=true\">#17105b3</a> to the local repository.','commit','njfigh'),(39,'2020-07-29 06:15:42','Successfully pushed 1 commit to origin/master.','push','njfigh'),(40,'2020-07-29 12:37:08','Successfully backed up the database.','backup','Revisr Bot'),(41,'2020-07-29 12:37:17','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(42,'2020-07-29 12:37:17','The daily backup was successful.','backup','Revisr Bot'),(43,'2020-07-30 20:11:08','Successfully backed up the database.','backup','Revisr Bot'),(44,'2020-07-30 20:11:18','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(45,'2020-07-30 20:11:18','The daily backup was successful.','backup','Revisr Bot'),(46,'2020-07-31 20:12:35','Successfully backed up the database.','backup','Revisr Bot'),(47,'2020-07-31 20:12:41','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(48,'2020-07-31 20:12:41','The daily backup was successful.','backup','Revisr Bot'),(49,'2020-08-01 20:11:39','Successfully backed up the database.','backup','Revisr Bot'),(50,'2020-08-01 20:11:45','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(51,'2020-08-01 20:11:45','The daily backup was successful.','backup','Revisr Bot'),(52,'2020-08-02 20:13:28','Successfully backed up the database.','backup','Revisr Bot'),(53,'2020-08-02 20:13:34','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(54,'2020-08-02 20:13:34','The daily backup was successful.','backup','Revisr Bot'),(55,'2020-08-03 11:09:37','Successfully backed up the database.','backup','Revisr Bot'),(56,'2020-08-03 11:09:43','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(57,'2020-08-03 11:09:43','The daily backup was successful.','backup','Revisr Bot'),(58,'2020-08-04 20:12:49','Successfully backed up the database.','backup','Revisr Bot'),(59,'2020-08-04 20:12:55','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(60,'2020-08-04 20:12:55','The daily backup was successful.','backup','Revisr Bot'),(61,'2020-08-05 20:12:17','Error staging files.','error','Revisr Bot'),(62,'2020-08-05 20:12:22','Successfully backed up the database.','backup','Revisr Bot'),(63,'2020-08-05 20:12:29','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(64,'2020-08-05 20:12:29','The daily backup was successful.','backup','Revisr Bot'),(65,'2020-08-06 20:14:07','Successfully backed up the database.','backup','Revisr Bot'),(66,'2020-08-06 20:14:13','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(67,'2020-08-06 20:14:13','The daily backup was successful.','backup','Revisr Bot'),(68,'2020-08-07 20:20:44','Successfully backed up the database.','backup','Revisr Bot'),(69,'2020-08-07 20:21:12','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(70,'2020-08-07 20:21:12','The daily backup was successful.','backup','Revisr Bot'),(71,'2020-08-08 20:19:08','Successfully backed up the database.','backup','Revisr Bot'),(72,'2020-08-08 20:19:14','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(73,'2020-08-08 20:19:14','The daily backup was successful.','backup','Revisr Bot'),(74,'2020-08-09 20:12:26','Successfully backed up the database.','backup','Revisr Bot'),(75,'2020-08-09 20:12:31','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(76,'2020-08-09 20:12:31','The daily backup was successful.','backup','Revisr Bot'),(77,'2020-08-10 20:12:56','Successfully backed up the database.','backup','Revisr Bot'),(78,'2020-08-10 20:13:01','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(79,'2020-08-10 20:13:01','The daily backup was successful.','backup','Revisr Bot'),(80,'2020-08-11 20:12:17','Successfully backed up the database.','backup','Revisr Bot'),(81,'2020-08-11 20:12:22','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(82,'2020-08-11 20:12:22','The daily backup was successful.','backup','Revisr Bot'),(83,'2020-08-12 20:13:20','Successfully backed up the database.','backup','Revisr Bot'),(84,'2020-08-12 20:13:26','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(85,'2020-08-12 20:13:26','The daily backup was successful.','backup','Revisr Bot'),(86,'2020-08-13 20:11:34','Successfully backed up the database.','backup','Revisr Bot'),(87,'2020-08-13 20:11:41','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(88,'2020-08-13 20:11:41','The daily backup was successful.','backup','Revisr Bot'),(89,'2020-08-14 17:05:23','Successfully backed up the database.','backup','Revisr Bot'),(90,'2020-08-14 17:05:29','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(91,'2020-08-14 17:05:29','The daily backup was successful.','backup','Revisr Bot'),(92,'2020-08-15 20:12:13','Successfully backed up the database.','backup','Revisr Bot'),(93,'2020-08-15 20:12:19','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(94,'2020-08-15 20:12:19','The daily backup was successful.','backup','Revisr Bot'),(95,'2020-08-16 20:13:58','Successfully backed up the database.','backup','Revisr Bot'),(96,'2020-08-16 20:14:05','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(97,'2020-08-16 20:14:05','The daily backup was successful.','backup','Revisr Bot'),(98,'2020-08-17 20:13:52','Successfully backed up the database.','backup','Revisr Bot'),(99,'2020-08-17 20:13:58','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(100,'2020-08-17 20:13:58','The daily backup was successful.','backup','Revisr Bot'),(101,'2020-08-18 14:38:55','Successfully backed up the database.','backup','Revisr Bot'),(102,'2020-08-18 14:39:02','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(103,'2020-08-18 14:39:02','The daily backup was successful.','backup','Revisr Bot'),(104,'2020-08-19 20:12:32','Successfully backed up the database.','backup','Revisr Bot'),(105,'2020-08-19 20:12:40','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(106,'2020-08-19 20:12:40','The daily backup was successful.','backup','Revisr Bot'),(107,'2020-08-20 20:14:01','Successfully backed up the database.','backup','Revisr Bot'),(108,'2020-08-20 20:14:08','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(109,'2020-08-20 20:14:08','The daily backup was successful.','backup','Revisr Bot'),(110,'2020-08-21 13:23:50','Successfully backed up the database.','backup','Revisr Bot'),(111,'2020-08-21 13:23:57','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(112,'2020-08-21 13:23:57','The daily backup was successful.','backup','Revisr Bot'),(113,'2020-08-22 20:13:18','Successfully backed up the database.','backup','Revisr Bot'),(114,'2020-08-22 20:13:24','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(115,'2020-08-22 20:13:24','The daily backup was successful.','backup','Revisr Bot'),(116,'2020-08-23 20:26:52','Error staging files.','error','Revisr Bot'),(117,'2020-08-23 20:27:06','Successfully backed up the database.','backup','Revisr Bot'),(118,'2020-08-23 20:27:18','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(119,'2020-08-23 20:27:18','The daily backup was successful.','backup','Revisr Bot'),(120,'2020-08-24 20:14:22','Successfully backed up the database.','backup','Revisr Bot'),(121,'2020-08-24 20:14:28','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(122,'2020-08-24 20:14:28','The daily backup was successful.','backup','Revisr Bot'),(123,'2020-08-25 17:47:08','Successfully backed up the database.','backup','Revisr Bot'),(124,'2020-08-25 17:47:14','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(125,'2020-08-25 17:47:14','The daily backup was successful.','backup','Revisr Bot'),(126,'2020-08-26 14:14:46','Successfully backed up the database.','backup','Revisr Bot'),(127,'2020-08-26 14:14:52','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(128,'2020-08-26 14:14:52','The daily backup was successful.','backup','Revisr Bot'),(129,'2020-08-27 20:11:11','Successfully backed up the database.','backup','Revisr Bot'),(130,'2020-08-27 20:11:18','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(131,'2020-08-27 20:11:18','The daily backup was successful.','backup','Revisr Bot'),(132,'2020-08-28 14:13:41','Successfully backed up the database.','backup','Revisr Bot'),(133,'2020-08-28 14:13:48','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(134,'2020-08-28 14:13:48','The daily backup was successful.','backup','Revisr Bot'),(135,'2020-08-29 12:26:23','Successfully backed up the database.','backup','Revisr Bot'),(136,'2020-08-29 12:26:28','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(137,'2020-08-29 12:26:28','The daily backup was successful.','backup','Revisr Bot'),(138,'2020-08-30 20:12:50','Successfully backed up the database.','backup','Revisr Bot'),(139,'2020-08-30 20:12:56','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(140,'2020-08-30 20:12:56','The daily backup was successful.','backup','Revisr Bot'),(141,'2020-08-31 20:13:45','Successfully backed up the database.','backup','Revisr Bot'),(142,'2020-08-31 20:13:51','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(143,'2020-08-31 20:13:51','The daily backup was successful.','backup','Revisr Bot'),(144,'2020-09-01 14:14:55','Successfully backed up the database.','backup','Revisr Bot'),(145,'2020-09-01 14:15:01','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(146,'2020-09-01 14:15:01','The daily backup was successful.','backup','Revisr Bot'),(147,'2020-09-02 14:23:14','Successfully backed up the database.','backup','Revisr Bot'),(148,'2020-09-02 14:23:19','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(149,'2020-09-02 14:23:19','The daily backup was successful.','backup','Revisr Bot'),(150,'2020-09-03 13:33:48','Successfully backed up the database.','backup','Revisr Bot'),(151,'2020-09-03 13:33:54','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(152,'2020-09-03 13:33:54','The daily backup was successful.','backup','Revisr Bot'),(153,'2020-09-04 17:47:24','Successfully backed up the database.','backup','Revisr Bot'),(154,'2020-09-04 17:47:30','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(155,'2020-09-04 17:47:30','The daily backup was successful.','backup','Revisr Bot'),(156,'2020-09-05 20:12:02','Successfully backed up the database.','backup','Revisr Bot'),(157,'2020-09-05 20:12:07','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(158,'2020-09-05 20:12:07','The daily backup was successful.','backup','Revisr Bot'),(159,'2020-09-06 20:13:16','Successfully backed up the database.','backup','Revisr Bot'),(160,'2020-09-06 20:13:22','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(161,'2020-09-06 20:13:22','The daily backup was successful.','backup','Revisr Bot'),(162,'2020-09-07 18:46:02','Successfully backed up the database.','backup','Revisr Bot'),(163,'2020-09-07 18:46:08','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(164,'2020-09-07 18:46:09','The daily backup was successful.','backup','Revisr Bot'),(165,'2020-09-08 20:14:01','Successfully backed up the database.','backup','Revisr Bot'),(166,'2020-09-08 20:14:07','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(167,'2020-09-08 20:14:07','The daily backup was successful.','backup','Revisr Bot'),(168,'2020-09-09 20:15:40','Successfully backed up the database.','backup','Revisr Bot'),(169,'2020-09-09 20:15:46','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(170,'2020-09-09 20:15:46','The daily backup was successful.','backup','Revisr Bot'),(171,'2020-09-10 20:15:21','Successfully backed up the database.','backup','Revisr Bot'),(172,'2020-09-10 20:15:28','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(173,'2020-09-10 20:15:28','The daily backup was successful.','backup','Revisr Bot'),(174,'2020-09-11 13:12:30','Successfully backed up the database.','backup','Revisr Bot'),(175,'2020-09-11 13:12:36','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(176,'2020-09-11 13:12:36','The daily backup was successful.','backup','Revisr Bot'),(177,'2020-09-12 10:47:14','Successfully backed up the database.','backup','Revisr Bot'),(178,'2020-09-12 10:47:20','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(179,'2020-09-12 10:47:20','The daily backup was successful.','backup','Revisr Bot'),(180,'2020-09-13 13:03:23','Successfully backed up the database.','backup','Revisr Bot'),(181,'2020-09-13 13:03:29','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(182,'2020-09-13 13:03:29','The daily backup was successful.','backup','Revisr Bot'),(183,'2020-09-14 17:50:07','Successfully backed up the database.','backup','Revisr Bot'),(184,'2020-09-14 17:50:13','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(185,'2020-09-14 17:50:13','The daily backup was successful.','backup','Revisr Bot'),(186,'2020-09-15 20:14:18','Successfully backed up the database.','backup','Revisr Bot'),(187,'2020-09-15 20:14:24','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(188,'2020-09-15 20:14:24','The daily backup was successful.','backup','Revisr Bot'),(189,'2020-09-16 17:48:53','Successfully backed up the database.','backup','Revisr Bot'),(190,'2020-09-16 17:48:59','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(191,'2020-09-16 17:48:59','The daily backup was successful.','backup','Revisr Bot'),(192,'2020-09-17 14:59:45','Successfully backed up the database.','backup','Revisr Bot'),(193,'2020-09-17 14:59:51','Successfully pushed 1 commit to origin/master.','push','Revisr Bot'),(194,'2020-09-17 14:59:51','The daily backup was successful.','backup','Revisr Bot');
/*!40000 ALTER TABLE `cie1_revisr` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;



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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cie1_revisr` WRITE;
/*!40000 ALTER TABLE `cie1_revisr` DISABLE KEYS */;
INSERT INTO `cie1_revisr` VALUES (1,'2020-07-19 10:34:02','Successfully created a new repository.','init','njfigh'),(2,'2020-07-19 10:37:46','Successfully pushed 1 commit to origin/master.','push','njfigh'),(3,'2020-07-19 10:38:49','Error staging files.','error','njfigh'),(4,'2020-07-19 10:38:49','There was an error committing the changes to the local repository.','error','njfigh'),(5,'2020-07-19 10:40:00','Successfully backed up the database.','backup','Revisr Bot'),(6,'2020-07-19 10:40:14','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(7,'2020-07-19 10:40:14','The daily backup was successful.','backup','Revisr Bot'),(8,'2020-07-20 18:27:03','Successfully backed up the database.','backup','Revisr Bot'),(9,'2020-07-20 18:27:11','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(10,'2020-07-20 18:27:11','The daily backup was successful.','backup','Revisr Bot'),(11,'2020-07-21 10:37:06','Successfully backed up the database.','backup','Revisr Bot'),(12,'2020-07-21 10:37:12','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(13,'2020-07-21 10:37:12','The daily backup was successful.','backup','Revisr Bot'),(14,'2020-07-22 04:03:22','Committed <a href=\"http://alphadevsite.co/wp-admin/admin.php?page=revisr_view_commit&commit=0e6b81a&success=true\">#0e6b81a</a> to the local repository.','commit','njfigh'),(15,'2020-07-22 04:03:33','Successfully pushed 1 commit to origin/master.','push','njfigh'),(16,'2020-07-22 20:16:54','Error staging files.','error','Revisr Bot'),(17,'2020-07-22 20:17:05','Successfully backed up the database.','backup','Revisr Bot'),(18,'2020-07-22 20:17:16','Successfully pushed 2 commits to origin/master.','push','Revisr Bot'),(19,'2020-07-22 20:17:16','The daily backup was successful.','backup','Revisr Bot');
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


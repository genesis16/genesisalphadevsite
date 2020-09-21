
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
DROP TABLE IF EXISTS `cie1_actionscheduler_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cie1_actionscheduler_logs` (
  `log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `action_id` bigint(20) unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `log_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_date_local` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`log_id`),
  KEY `action_id` (`action_id`),
  KEY `log_date_gmt` (`log_date_gmt`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cie1_actionscheduler_logs` WRITE;
/*!40000 ALTER TABLE `cie1_actionscheduler_logs` DISABLE KEYS */;
INSERT INTO `cie1_actionscheduler_logs` VALUES (61,27,'action started via WP Cron','2020-08-30 20:12:44','2020-08-30 20:12:44'),(60,27,'action created','2020-08-29 12:26:12','2020-08-29 12:26:12'),(59,26,'action complete via WP Cron','2020-08-29 12:26:12','2020-08-29 12:26:12'),(54,25,'action created','2020-08-26 09:17:22','2020-08-26 09:17:22'),(55,25,'action started via WP Cron','2020-08-27 20:11:02','2020-08-27 20:11:02'),(56,25,'action complete via WP Cron','2020-08-27 20:11:02','2020-08-27 20:11:02'),(57,26,'action created','2020-08-27 20:11:02','2020-08-27 20:11:02'),(58,26,'action started via WP Cron','2020-08-29 12:26:12','2020-08-29 12:26:12'),(53,24,'action complete via WP Cron','2020-08-26 09:17:22','2020-08-26 09:17:22'),(52,24,'action started via WP Cron','2020-08-26 09:17:22','2020-08-26 09:17:22'),(51,24,'action created','2020-08-24 20:14:12','2020-08-24 20:14:12'),(50,23,'action complete via WP Cron','2020-08-24 20:14:12','2020-08-24 20:14:12'),(48,23,'action created','2020-08-23 02:46:37','2020-08-23 02:46:37'),(49,23,'action started via WP Cron','2020-08-24 20:14:12','2020-08-24 20:14:12'),(47,21,'action complete via WP Cron','2020-08-23 02:46:37','2020-08-23 02:46:37'),(46,21,'action started via WP Cron','2020-08-23 02:46:37','2020-08-23 02:46:37'),(38,19,'action complete via WP Cron','2020-08-22 22:05:33','2020-08-22 22:05:33'),(39,20,'action created','2020-08-22 22:05:33','2020-08-22 22:05:33'),(40,21,'action created','2020-08-22 22:05:34','2020-08-22 22:05:34'),(45,20,'action complete via Async Request','2020-08-22 22:07:17','2020-08-22 22:07:17'),(44,20,'action started via Async Request','2020-08-22 22:07:17','2020-08-22 22:07:17'),(43,22,'action complete via Async Request','2020-08-22 22:05:50','2020-08-22 22:05:50'),(42,22,'action started via Async Request','2020-08-22 22:05:49','2020-08-22 22:05:49'),(41,22,'action created','2020-08-22 22:05:34','2020-08-22 22:05:34'),(37,19,'action started via WP Cron','2020-08-22 22:05:33','2020-08-22 22:05:33'),(36,19,'action created','2020-08-22 22:04:24','2020-08-22 22:04:24'),(62,27,'action complete via WP Cron','2020-08-30 20:12:44','2020-08-30 20:12:44'),(63,28,'action created','2020-08-30 20:12:44','2020-08-30 20:12:44'),(64,28,'action started via WP Cron','2020-08-31 20:13:36','2020-08-31 20:13:36'),(65,28,'action complete via WP Cron','2020-08-31 20:13:36','2020-08-31 20:13:36'),(66,29,'action created','2020-08-31 20:13:36','2020-08-31 20:13:36'),(67,29,'action started via WP Cron','2020-09-02 14:23:04','2020-09-02 14:23:04'),(68,29,'action complete via WP Cron','2020-09-02 14:23:04','2020-09-02 14:23:04'),(69,30,'action created','2020-09-02 14:23:04','2020-09-02 14:23:04'),(70,30,'action started via WP Cron','2020-09-03 20:11:20','2020-09-03 20:11:20'),(71,30,'action complete via WP Cron','2020-09-03 20:11:20','2020-09-03 20:11:20'),(72,31,'action created','2020-09-03 20:11:20','2020-09-03 20:11:20'),(73,31,'action started via WP Cron','2020-09-05 20:11:51','2020-09-05 20:11:51'),(74,31,'action complete via WP Cron','2020-09-05 20:11:51','2020-09-05 20:11:51'),(75,32,'action created','2020-09-05 20:11:51','2020-09-05 20:11:51'),(76,32,'action started via WP Cron','2020-09-06 20:13:07','2020-09-06 20:13:07'),(77,32,'action complete via WP Cron','2020-09-06 20:13:07','2020-09-06 20:13:07'),(78,33,'action created','2020-09-06 20:13:07','2020-09-06 20:13:07'),(79,33,'action started via WP Cron','2020-09-07 20:14:11','2020-09-07 20:14:11'),(80,33,'action complete via WP Cron','2020-09-07 20:14:11','2020-09-07 20:14:11'),(81,34,'action created','2020-09-07 20:14:11','2020-09-07 20:14:11'),(82,34,'action started via WP Cron','2020-09-08 23:53:57','2020-09-08 23:53:57'),(83,34,'action complete via WP Cron','2020-09-08 23:53:57','2020-09-08 23:53:57'),(84,35,'action created','2020-09-08 23:53:57','2020-09-08 23:53:57'),(85,35,'action started via WP Cron','2020-09-10 20:15:14','2020-09-10 20:15:14'),(86,35,'action complete via WP Cron','2020-09-10 20:15:14','2020-09-10 20:15:14'),(87,36,'action created','2020-09-10 20:15:14','2020-09-10 20:15:14'),(88,36,'action started via WP Cron','2020-09-11 22:25:47','2020-09-11 22:25:47'),(89,36,'action complete via WP Cron','2020-09-11 22:25:47','2020-09-11 22:25:47'),(90,37,'action created','2020-09-11 22:25:47','2020-09-11 22:25:47'),(91,37,'action started via WP Cron','2020-09-13 13:03:15','2020-09-13 13:03:15'),(92,37,'action complete via WP Cron','2020-09-13 13:03:15','2020-09-13 13:03:15'),(93,38,'action created','2020-09-13 13:03:15','2020-09-13 13:03:15'),(94,38,'action started via WP Cron','2020-09-14 17:50:00','2020-09-14 17:50:00'),(95,38,'action complete via WP Cron','2020-09-14 17:50:00','2020-09-14 17:50:00'),(96,39,'action created','2020-09-14 17:50:00','2020-09-14 17:50:00'),(97,39,'action started via WP Cron','2020-09-15 20:14:13','2020-09-15 20:14:13'),(98,39,'action complete via WP Cron','2020-09-15 20:14:13','2020-09-15 20:14:13'),(99,40,'action created','2020-09-15 20:14:13','2020-09-15 20:14:13'),(100,40,'action started via WP Cron','2020-09-17 14:59:36','2020-09-17 14:59:36'),(101,40,'action complete via WP Cron','2020-09-17 14:59:36','2020-09-17 14:59:36'),(102,41,'action created','2020-09-17 14:59:36','2020-09-17 14:59:36'),(103,41,'action started via WP Cron','2020-09-18 20:13:38','2020-09-18 20:13:38'),(104,41,'action complete via WP Cron','2020-09-18 20:13:38','2020-09-18 20:13:38'),(105,42,'action created','2020-09-18 20:13:38','2020-09-18 20:13:38'),(106,42,'action started via WP Cron','2020-09-19 20:14:05','2020-09-19 20:14:05'),(107,42,'action complete via WP Cron','2020-09-19 20:14:05','2020-09-19 20:14:05'),(108,43,'action created','2020-09-19 20:14:05','2020-09-19 20:14:05'),(109,43,'action started via WP Cron','2020-09-20 20:14:36','2020-09-20 20:14:36'),(110,43,'action complete via WP Cron','2020-09-20 20:14:36','2020-09-20 20:14:36'),(111,44,'action created','2020-09-20 20:14:36','2020-09-20 20:14:36'),(112,44,'action started via WP Cron','2020-09-21 20:15:28','2020-09-21 20:15:28'),(113,44,'action complete via WP Cron','2020-09-21 20:15:28','2020-09-21 20:15:28'),(114,45,'action created','2020-09-21 20:15:28','2020-09-21 20:15:28');
/*!40000 ALTER TABLE `cie1_actionscheduler_logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


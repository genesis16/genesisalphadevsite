
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cie1_actionscheduler_logs` WRITE;
/*!40000 ALTER TABLE `cie1_actionscheduler_logs` DISABLE KEYS */;
INSERT INTO `cie1_actionscheduler_logs` VALUES (1,7,'action created','2020-07-19 00:31:25','2020-07-19 00:31:25'),(2,7,'action started via WP Cron','2020-07-19 00:33:49','2020-07-19 00:33:49'),(3,7,'action complete via WP Cron','2020-07-19 00:33:49','2020-07-19 00:33:49'),(4,8,'action created','2020-07-19 00:33:49','2020-07-19 00:33:49'),(5,9,'action created','2020-07-19 00:35:49','2020-07-19 00:35:49'),(6,8,'action started via WP Cron','2020-07-19 00:35:49','2020-07-19 00:35:49'),(7,8,'action complete via WP Cron','2020-07-19 00:35:49','2020-07-19 00:35:49'),(8,10,'action created','2020-07-19 10:28:56','2020-07-19 10:28:56'),(9,10,'action started via Async Request','2020-07-19 10:28:56','2020-07-19 10:28:56'),(10,10,'action complete via Async Request','2020-07-19 10:28:57','2020-07-19 10:28:57'),(11,9,'action started via WP Cron','2020-07-20 00:36:05','2020-07-20 00:36:05'),(12,9,'action complete via WP Cron','2020-07-20 00:36:05','2020-07-20 00:36:05'),(13,11,'action created','2020-07-20 00:36:05','2020-07-20 00:36:05'),(14,11,'action started via WP Cron','2020-07-21 01:46:04','2020-07-21 01:46:04'),(15,11,'action complete via WP Cron','2020-07-21 01:46:04','2020-07-21 01:46:04'),(16,12,'action created','2020-07-21 01:46:04','2020-07-21 01:46:04'),(17,13,'action created','2020-07-21 01:49:15','2020-07-21 01:49:15'),(18,13,'action started via WP Cron','2020-07-21 01:49:36','2020-07-21 01:49:36'),(19,13,'action complete via WP Cron','2020-07-21 01:49:37','2020-07-21 01:49:37');
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


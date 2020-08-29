
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
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cie1_actionscheduler_logs` WRITE;
/*!40000 ALTER TABLE `cie1_actionscheduler_logs` DISABLE KEYS */;
INSERT INTO `cie1_actionscheduler_logs` VALUES (60,27,'action created','2020-08-29 12:26:12','2020-08-29 12:26:12'),(59,26,'action complete via WP Cron','2020-08-29 12:26:12','2020-08-29 12:26:12'),(54,25,'action created','2020-08-26 09:17:22','2020-08-26 09:17:22'),(55,25,'action started via WP Cron','2020-08-27 20:11:02','2020-08-27 20:11:02'),(56,25,'action complete via WP Cron','2020-08-27 20:11:02','2020-08-27 20:11:02'),(57,26,'action created','2020-08-27 20:11:02','2020-08-27 20:11:02'),(58,26,'action started via WP Cron','2020-08-29 12:26:12','2020-08-29 12:26:12'),(53,24,'action complete via WP Cron','2020-08-26 09:17:22','2020-08-26 09:17:22'),(52,24,'action started via WP Cron','2020-08-26 09:17:22','2020-08-26 09:17:22'),(51,24,'action created','2020-08-24 20:14:12','2020-08-24 20:14:12'),(50,23,'action complete via WP Cron','2020-08-24 20:14:12','2020-08-24 20:14:12'),(48,23,'action created','2020-08-23 02:46:37','2020-08-23 02:46:37'),(49,23,'action started via WP Cron','2020-08-24 20:14:12','2020-08-24 20:14:12'),(47,21,'action complete via WP Cron','2020-08-23 02:46:37','2020-08-23 02:46:37'),(46,21,'action started via WP Cron','2020-08-23 02:46:37','2020-08-23 02:46:37'),(38,19,'action complete via WP Cron','2020-08-22 22:05:33','2020-08-22 22:05:33'),(39,20,'action created','2020-08-22 22:05:33','2020-08-22 22:05:33'),(40,21,'action created','2020-08-22 22:05:34','2020-08-22 22:05:34'),(45,20,'action complete via Async Request','2020-08-22 22:07:17','2020-08-22 22:07:17'),(44,20,'action started via Async Request','2020-08-22 22:07:17','2020-08-22 22:07:17'),(43,22,'action complete via Async Request','2020-08-22 22:05:50','2020-08-22 22:05:50'),(42,22,'action started via Async Request','2020-08-22 22:05:49','2020-08-22 22:05:49'),(41,22,'action created','2020-08-22 22:05:34','2020-08-22 22:05:34'),(37,19,'action started via WP Cron','2020-08-22 22:05:33','2020-08-22 22:05:33'),(36,19,'action created','2020-08-22 22:04:24','2020-08-22 22:04:24');
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


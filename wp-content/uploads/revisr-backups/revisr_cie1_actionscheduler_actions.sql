
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
DROP TABLE IF EXISTS `cie1_actionscheduler_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cie1_actionscheduler_actions` (
  `action_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hook` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `scheduled_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `scheduled_date_local` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `args` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `schedule` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `group_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `attempts` int(11) NOT NULL DEFAULT 0,
  `last_attempt_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_attempt_local` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `claim_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `extended_args` varchar(8000) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`action_id`),
  KEY `hook` (`hook`),
  KEY `status` (`status`),
  KEY `scheduled_date_gmt` (`scheduled_date_gmt`),
  KEY `args` (`args`),
  KEY `group_id` (`group_id`),
  KEY `last_attempt_gmt` (`last_attempt_gmt`),
  KEY `claim_id` (`claim_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cie1_actionscheduler_actions` WRITE;
/*!40000 ALTER TABLE `cie1_actionscheduler_actions` DISABLE KEYS */;
INSERT INTO `cie1_actionscheduler_actions` VALUES (7,'action_scheduler/migration_hook','complete','2020-07-19 00:32:25','2020-07-19 00:32:25','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1595118745;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1595118745;}',1,1,'2020-07-19 00:33:49','2020-07-19 00:33:49',0,NULL),(8,'action_scheduler/migration_hook','complete','2020-07-19 00:34:49','2020-07-19 00:34:49','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1595118889;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1595118889;}',1,1,'2020-07-19 00:35:49','2020-07-19 00:35:49',0,NULL),(9,'wpforms_process_entry_emails_meta_cleanup','complete','2020-07-20 00:00:00','2020-07-20 00:00:00','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1595203200;s:18:\"\0*\0first_timestamp\";i:1595203200;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1595203200;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',2,1,'2020-07-20 00:36:05','2020-07-20 00:36:05',0,NULL),(10,'wpforms_admin_notifications_update','complete','0000-00-00 00:00:00','0000-00-00 00:00:00','{\"tasks_meta_id\":2}','O:28:\"ActionScheduler_NullSchedule\":0:{}',2,1,'2020-07-19 10:28:57','2020-07-19 10:28:57',0,NULL),(11,'wpforms_process_entry_emails_meta_cleanup','complete','2020-07-21 00:36:05','2020-07-21 00:36:05','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1595291765;s:18:\"\0*\0first_timestamp\";i:1595203200;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1595291765;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',2,1,'2020-07-21 01:46:04','2020-07-21 01:46:04',0,NULL),(12,'wpforms_process_entry_emails_meta_cleanup','complete','2020-07-22 01:46:04','2020-07-22 01:46:04','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1595382364;s:18:\"\0*\0first_timestamp\";i:1595203200;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1595382364;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',2,1,'2020-07-22 01:47:29','2020-07-22 01:47:29',0,NULL),(13,'wpforms_admin_notifications_update','complete','0000-00-00 00:00:00','0000-00-00 00:00:00','{\"tasks_meta_id\":3}','O:28:\"ActionScheduler_NullSchedule\":0:{}',2,1,'2020-07-21 01:49:37','2020-07-21 01:49:37',0,NULL),(14,'wpforms_process_entry_emails_meta_cleanup','canceled','2020-07-23 01:47:29','2020-07-23 01:47:29','{\"tasks_meta_id\":1}','O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1595468849;s:18:\"\0*\0first_timestamp\";i:1595203200;s:13:\"\0*\0recurrence\";i:86400;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1595468849;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:86400;}',2,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,NULL),(15,'wpforms_admin_notifications_update','complete','0000-00-00 00:00:00','0000-00-00 00:00:00','{\"tasks_meta_id\":4}','O:28:\"ActionScheduler_NullSchedule\":0:{}',2,1,'2020-07-22 01:51:04','2020-07-22 01:51:04',0,NULL),(16,'action_scheduler/migration_hook','complete','2020-07-22 02:40:11','2020-07-22 02:40:11','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1595385611;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1595385611;}',1,1,'2020-07-22 02:41:10','2020-07-22 02:41:10',0,NULL),(17,'action_scheduler/migration_hook','complete','2020-07-22 02:42:10','2020-07-22 02:42:10','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1595385730;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1595385730;}',1,1,'2020-07-22 02:42:45','2020-07-22 02:42:45',0,NULL),(18,'action_scheduler/migration_hook','complete','2020-07-22 05:36:04','2020-07-22 05:36:04','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1595396164;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1595396164;}',1,1,'2020-07-22 05:36:13','2020-07-22 05:36:13',0,NULL);
/*!40000 ALTER TABLE `cie1_actionscheduler_actions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


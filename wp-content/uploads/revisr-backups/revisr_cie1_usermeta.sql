
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
DROP TABLE IF EXISTS `cie1_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cie1_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cie1_usermeta` WRITE;
/*!40000 ALTER TABLE `cie1_usermeta` DISABLE KEYS */;
INSERT INTO `cie1_usermeta` VALUES (1,1,'nickname','admin'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'syntax_highlighting','true'),(7,1,'comment_shortcuts','false'),(8,1,'admin_color','fresh'),(9,1,'use_ssl','0'),(10,1,'show_admin_bar_front','true'),(11,1,'locale',''),(12,1,'cie1_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(13,1,'cie1_user_level','10'),(14,1,'dismissed_wp_pointers',''),(15,1,'show_welcome_panel','1'),(16,1,'session_tokens','a:5:{s:64:\"eb7c8c0da626f3bcbd17911095aa08ea620688e25de8d8f2477914b9c581c734\";a:4:{s:10:\"expiration\";i:1596328029;s:2:\"ip\";s:14:\"101.176.98.127\";s:2:\"ua\";s:121:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36\";s:5:\"login\";i:1595118429;}s:64:\"e7d598295e039891b62e8c131d790e9d981f27a2653b1f5d41c3e56e4edee3c4\";a:4:{s:10:\"expiration\";i:1596150966;s:2:\"ip\";s:14:\"101.176.98.127\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36\";s:5:\"login\";i:1595978166;}s:64:\"5aca3413d9645a4b023374cc533b7869c783122df7afce4f25e65d55ccac4870\";a:4:{s:10:\"expiration\";i:1596166815;s:2:\"ip\";s:14:\"101.176.98.127\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36\";s:5:\"login\";i:1595994015;}s:64:\"bccf12a88b2b95cca4920abba42b6199c20f84809ace25dc3f5b90660c720ced\";a:4:{s:10:\"expiration\";i:1596167114;s:2:\"ip\";s:14:\"101.176.98.127\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36\";s:5:\"login\";i:1595994314;}s:64:\"dcb387a0c111b69af6fc3f17327da95607a6e8be33909a7f96e9e1ec1d2ca827\";a:4:{s:10:\"expiration\";i:1596176104;s:2:\"ip\";s:14:\"101.176.98.127\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36\";s:5:\"login\";i:1596003304;}}'),(17,1,'cie1_dashboard_quick_press_last_post_id','469'),(18,1,'community-events-location','a:1:{s:2:\"ip\";s:12:\"101.176.98.0\";}'),(19,1,'cie1_user-settings','libraryContent=browse'),(20,1,'cie1_user-settings-time','1595393739'),(22,1,'jetpack_tracks_anon_id','jetpack:xmyf32xtp5/dHFQcgRGwskA0'),(23,1,'jetpack_tracks_wpcom_id','107417124');
/*!40000 ALTER TABLE `cie1_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;



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
DROP TABLE IF EXISTS `cie1_postmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cie1_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cie1_postmeta` WRITE;
/*!40000 ALTER TABLE `cie1_postmeta` DISABLE KEYS */;
INSERT INTO `cie1_postmeta` VALUES (1,2,'_wp_page_template','default'),(2,3,'_wp_page_template','default'),(3,5,'_wp_attached_file','2020/07/Jane-James-1.png'),(4,5,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:226;s:6:\"height\";i:112;s:4:\"file\";s:24:\"2020/07/Jane-James-1.png\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:24:\"Jane-James-1-150x112.png\";s:5:\"width\";i:150;s:6:\"height\";i:112;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(10,8,'_genesis_hide_title','1'),(11,8,'_genesis_hide_breadcrumbs','1'),(9,8,'_genesis_layout','full-width-content'),(12,8,'_genesis_hide_singular_image','1'),(13,9,'_genesis_layout','full-width-content'),(14,10,'_genesis_layout','full-width-content'),(15,10,'_genesis_hide_singular_image','1'),(16,12,'_genesis_layout','full-width-content'),(17,12,'_genesis_hide_breadcrumbs','1'),(18,12,'_genesis_hide_singular_image','1'),(19,12,'_genesis_hide_footer_widgets','1'),(20,12,'_wp_page_template','page-templates/landing.php'),(21,15,'_menu_item_type','post_type'),(22,15,'_menu_item_menu_item_parent','0'),(23,15,'_menu_item_object_id','8'),(24,15,'_menu_item_object','page'),(25,15,'_menu_item_target',''),(26,15,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(27,15,'_menu_item_xfn',''),(28,15,'_menu_item_url',''),(29,16,'_menu_item_type','post_type'),(30,16,'_menu_item_menu_item_parent','0'),(31,16,'_menu_item_object_id','10'),(32,16,'_menu_item_object','page'),(33,16,'_menu_item_target',''),(34,16,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(35,16,'_menu_item_xfn',''),(36,16,'_menu_item_url',''),(37,17,'_menu_item_type','post_type'),(38,17,'_menu_item_menu_item_parent','0'),(39,17,'_menu_item_object_id','11'),(40,17,'_menu_item_object','page'),(41,17,'_menu_item_target',''),(42,17,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(43,17,'_menu_item_xfn',''),(44,17,'_menu_item_url',''),(45,18,'_menu_item_type','post_type'),(46,18,'_menu_item_menu_item_parent','0'),(47,18,'_menu_item_object_id','9'),(48,18,'_menu_item_object','page'),(49,18,'_menu_item_target',''),(50,18,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(51,18,'_menu_item_xfn',''),(52,18,'_menu_item_url',''),(53,19,'_menu_item_type','post_type'),(54,19,'_menu_item_menu_item_parent','0'),(55,19,'_menu_item_object_id','12'),(56,19,'_menu_item_object','page'),(57,19,'_menu_item_target',''),(58,19,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(59,19,'_menu_item_xfn',''),(60,19,'_menu_item_url',''),(61,5,'_wp_attachment_image_alt','jane james logo'),(62,20,'_wp_attached_file','2020/07/cropped-Jane-James-1.png'),(63,20,'_wp_attachment_context','custom-logo'),(64,20,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:226;s:6:\"height\";i:112;s:4:\"file\";s:32:\"2020/07/cropped-Jane-James-1.png\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:32:\"cropped-Jane-James-1-150x112.png\";s:5:\"width\";i:150;s:6:\"height\";i:112;s:9:\"mime-type\";s:9:\"image/png\";}s:16:\"sidebar-featured\";a:4:{s:4:\"file\";s:30:\"cropped-Jane-James-1-75x75.png\";s:5:\"width\";i:75;s:6:\"height\";i:75;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(65,21,'_wp_trash_meta_status','publish'),(66,21,'_wp_trash_meta_time','1595154624'),(67,22,'_wp_attached_file','2020/07/themer-pro-1.4.0.zip'),(68,22,'_wp_attachment_context','upgrader');
/*!40000 ALTER TABLE `cie1_postmeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


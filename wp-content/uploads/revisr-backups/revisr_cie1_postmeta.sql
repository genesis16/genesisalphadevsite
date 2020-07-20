
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
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cie1_postmeta` WRITE;
/*!40000 ALTER TABLE `cie1_postmeta` DISABLE KEYS */;
INSERT INTO `cie1_postmeta` VALUES (1,2,'_wp_page_template','default'),(2,3,'_wp_page_template','default'),(3,5,'_wp_attached_file','2020/07/Jane-James-1.png'),(4,5,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:226;s:6:\"height\";i:112;s:4:\"file\";s:24:\"2020/07/Jane-James-1.png\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:24:\"Jane-James-1-150x112.png\";s:5:\"width\";i:150;s:6:\"height\";i:112;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(10,8,'_genesis_hide_title','1'),(11,8,'_genesis_hide_breadcrumbs','1'),(9,8,'_genesis_layout','full-width-content'),(12,8,'_genesis_hide_singular_image','1'),(13,9,'_genesis_layout','full-width-content'),(14,10,'_genesis_layout','full-width-content'),(15,10,'_genesis_hide_singular_image','1'),(16,12,'_genesis_layout','full-width-content'),(17,12,'_genesis_hide_breadcrumbs','1'),(18,12,'_genesis_hide_singular_image','1'),(19,12,'_genesis_hide_footer_widgets','1'),(20,12,'_wp_page_template','page-templates/landing.php'),(21,15,'_menu_item_type','post_type'),(22,15,'_menu_item_menu_item_parent','0'),(23,15,'_menu_item_object_id','8'),(24,15,'_menu_item_object','page'),(25,15,'_menu_item_target',''),(26,15,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(27,15,'_menu_item_xfn',''),(28,15,'_menu_item_url',''),(29,16,'_menu_item_type','post_type'),(30,16,'_menu_item_menu_item_parent','0'),(31,16,'_menu_item_object_id','10'),(32,16,'_menu_item_object','page'),(33,16,'_menu_item_target',''),(34,16,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(35,16,'_menu_item_xfn',''),(36,16,'_menu_item_url',''),(37,17,'_menu_item_type','post_type'),(38,17,'_menu_item_menu_item_parent','0'),(39,17,'_menu_item_object_id','11'),(40,17,'_menu_item_object','page'),(41,17,'_menu_item_target',''),(42,17,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(43,17,'_menu_item_xfn',''),(44,17,'_menu_item_url',''),(45,18,'_menu_item_type','post_type'),(46,18,'_menu_item_menu_item_parent','0'),(47,18,'_menu_item_object_id','9'),(48,18,'_menu_item_object','page'),(49,18,'_menu_item_target',''),(50,18,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(51,18,'_menu_item_xfn',''),(52,18,'_menu_item_url',''),(53,19,'_menu_item_type','post_type'),(54,19,'_menu_item_menu_item_parent','0'),(55,19,'_menu_item_object_id','12'),(56,19,'_menu_item_object','page'),(57,19,'_menu_item_target',''),(58,19,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(59,19,'_menu_item_xfn',''),(60,19,'_menu_item_url',''),(61,5,'_wp_attachment_image_alt','jane james logo'),(62,20,'_wp_attached_file','2020/07/cropped-Jane-James-1.png'),(63,20,'_wp_attachment_context','custom-logo'),(64,20,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:226;s:6:\"height\";i:112;s:4:\"file\";s:32:\"2020/07/cropped-Jane-James-1.png\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:32:\"cropped-Jane-James-1-150x112.png\";s:5:\"width\";i:150;s:6:\"height\";i:112;s:9:\"mime-type\";s:9:\"image/png\";}s:16:\"sidebar-featured\";a:4:{s:4:\"file\";s:30:\"cropped-Jane-James-1-75x75.png\";s:5:\"width\";i:75;s:6:\"height\";i:75;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(65,21,'_wp_trash_meta_status','publish'),(66,21,'_wp_trash_meta_time','1595154624'),(111,62,'_wp_attached_file','2020/07/stephanie-harvey-OTUahHcqs0Y-unsplash-scaled.jpg'),(85,33,'_wp_attached_file','2020/07/facebook.png'),(71,8,'_edit_lock','1595229175:1'),(83,31,'_wp_attached_file','2020/07/janejameshero.png'),(84,31,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:1203;s:6:\"height\";i:1005;s:4:\"file\";s:25:\"2020/07/janejameshero.png\";s:5:\"sizes\";a:8:{s:6:\"medium\";a:4:{s:4:\"file\";s:25:\"janejameshero-300x251.png\";s:5:\"width\";i:300;s:6:\"height\";i:251;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:26:\"janejameshero-1024x855.png\";s:5:\"width\";i:1024;s:6:\"height\";i:855;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:25:\"janejameshero-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:25:\"janejameshero-768x642.png\";s:5:\"width\";i:768;s:6:\"height\";i:642;s:9:\"mime-type\";s:9:\"image/png\";}s:16:\"sidebar-featured\";a:4:{s:4:\"file\";s:23:\"janejameshero-75x75.png\";s:5:\"width\";i:75;s:6:\"height\";i:75;s:9:\"mime-type\";s:9:\"image/png\";}s:23:\"genesis-singular-images\";a:4:{s:4:\"file\";s:25:\"janejameshero-702x526.png\";s:5:\"width\";i:702;s:6:\"height\";i:526;s:9:\"mime-type\";s:9:\"image/png\";}s:28:\"ab-block-post-grid-landscape\";a:4:{s:4:\"file\";s:25:\"janejameshero-600x400.png\";s:5:\"width\";i:600;s:6:\"height\";i:400;s:9:\"mime-type\";s:9:\"image/png\";}s:25:\"ab-block-post-grid-square\";a:4:{s:4:\"file\";s:25:\"janejameshero-600x600.png\";s:5:\"width\";i:600;s:6:\"height\";i:600;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(82,8,'_genesis_scripts_body_position','bottom'),(81,8,'_edit_last','1'),(78,28,'_wp_attached_file','2020/07/Janehero.png'),(79,28,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:1230;s:6:\"height\";i:1005;s:4:\"file\";s:20:\"2020/07/Janehero.png\";s:5:\"sizes\";a:8:{s:6:\"medium\";a:4:{s:4:\"file\";s:20:\"Janehero-300x245.png\";s:5:\"width\";i:300;s:6:\"height\";i:245;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:21:\"Janehero-1024x837.png\";s:5:\"width\";i:1024;s:6:\"height\";i:837;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:20:\"Janehero-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:20:\"Janehero-768x628.png\";s:5:\"width\";i:768;s:6:\"height\";i:628;s:9:\"mime-type\";s:9:\"image/png\";}s:16:\"sidebar-featured\";a:4:{s:4:\"file\";s:18:\"Janehero-75x75.png\";s:5:\"width\";i:75;s:6:\"height\";i:75;s:9:\"mime-type\";s:9:\"image/png\";}s:23:\"genesis-singular-images\";a:4:{s:4:\"file\";s:20:\"Janehero-702x526.png\";s:5:\"width\";i:702;s:6:\"height\";i:526;s:9:\"mime-type\";s:9:\"image/png\";}s:28:\"ab-block-post-grid-landscape\";a:4:{s:4:\"file\";s:20:\"Janehero-600x400.png\";s:5:\"width\";i:600;s:6:\"height\";i:400;s:9:\"mime-type\";s:9:\"image/png\";}s:25:\"ab-block-post-grid-square\";a:4:{s:4:\"file\";s:20:\"Janehero-600x600.png\";s:5:\"width\";i:600;s:6:\"height\";i:600;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(80,28,'_wp_attachment_image_alt','jane james hero image'),(86,33,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:20:\"2020/07/facebook.png\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:20:\"facebook-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:20:\"facebook-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:16:\"sidebar-featured\";a:4:{s:4:\"file\";s:18:\"facebook-75x75.png\";s:5:\"width\";i:75;s:6:\"height\";i:75;s:9:\"mime-type\";s:9:\"image/png\";}s:28:\"ab-block-post-grid-landscape\";a:4:{s:4:\"file\";s:20:\"facebook-512x400.png\";s:5:\"width\";i:512;s:6:\"height\";i:400;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(87,34,'_wp_attached_file','2020/07/mail.png'),(88,34,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:16:\"2020/07/mail.png\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:16:\"mail-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:16:\"mail-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:16:\"sidebar-featured\";a:4:{s:4:\"file\";s:14:\"mail-75x75.png\";s:5:\"width\";i:75;s:6:\"height\";i:75;s:9:\"mime-type\";s:9:\"image/png\";}s:28:\"ab-block-post-grid-landscape\";a:4:{s:4:\"file\";s:16:\"mail-512x400.png\";s:5:\"width\";i:512;s:6:\"height\";i:400;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(89,35,'_wp_attached_file','2020/07/twitter.png'),(90,35,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:19:\"2020/07/twitter.png\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:19:\"twitter-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:19:\"twitter-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:16:\"sidebar-featured\";a:4:{s:4:\"file\";s:17:\"twitter-75x75.png\";s:5:\"width\";i:75;s:6:\"height\";i:75;s:9:\"mime-type\";s:9:\"image/png\";}s:28:\"ab-block-post-grid-landscape\";a:4:{s:4:\"file\";s:19:\"twitter-512x400.png\";s:5:\"width\";i:512;s:6:\"height\";i:400;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(91,37,'_wp_attached_file','2020/07/dribble.png'),(92,37,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:19:\"2020/07/dribble.png\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:19:\"dribble-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:19:\"dribble-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:16:\"sidebar-featured\";a:4:{s:4:\"file\";s:17:\"dribble-75x75.png\";s:5:\"width\";i:75;s:6:\"height\";i:75;s:9:\"mime-type\";s:9:\"image/png\";}s:28:\"ab-block-post-grid-landscape\";a:4:{s:4:\"file\";s:19:\"dribble-512x400.png\";s:5:\"width\";i:512;s:6:\"height\";i:400;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(93,41,'_wp_attached_file','2020/07/skills.png'),(94,41,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:219;s:6:\"height\";i:76;s:4:\"file\";s:18:\"2020/07/skills.png\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:17:\"skills-150x76.png\";s:5:\"width\";i:150;s:6:\"height\";i:76;s:9:\"mime-type\";s:9:\"image/png\";}s:16:\"sidebar-featured\";a:4:{s:4:\"file\";s:16:\"skills-75x75.png\";s:5:\"width\";i:75;s:6:\"height\";i:75;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(95,42,'_wp_attached_file','2020/07/1929181-512-1.png'),(96,42,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:46;s:6:\"height\";i:46;s:4:\"file\";s:25:\"2020/07/1929181-512-1.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(97,43,'_wp_attached_file','2020/07/4691390-512-1.png'),(98,43,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:45;s:6:\"height\";i:45;s:4:\"file\";s:25:\"2020/07/4691390-512-1.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(99,44,'_wp_attached_file','2020/07/css-1-1.png'),(100,44,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:50;s:6:\"height\";i:42;s:4:\"file\";s:19:\"2020/07/css-1-1.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(101,45,'_wp_attached_file','2020/07/databoxicon-1.png'),(102,45,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:45;s:6:\"height\";i:45;s:4:\"file\";s:25:\"2020/07/databoxicon-1.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(103,46,'_wp_attached_file','2020/07/html-5-1-1.png'),(104,46,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:50;s:6:\"height\";i:40;s:4:\"file\";s:22:\"2020/07/html-5-1-1.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(105,47,'_wp_attached_file','2020/07/javascript-1.png'),(106,47,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:45;s:6:\"height\";i:45;s:4:\"file\";s:24:\"2020/07/javascript-1.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(107,48,'_wp_attached_file','2020/07/webflow-icon-1.png'),(108,48,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:45;s:6:\"height\";i:45;s:4:\"file\";s:26:\"2020/07/webflow-icon-1.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(109,49,'_wp_attached_file','2020/07/wordpress-1-1.png'),(110,49,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:45;s:6:\"height\";i:45;s:4:\"file\";s:25:\"2020/07/wordpress-1-1.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),(112,62,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:2560;s:4:\"file\";s:56:\"2020/07/stephanie-harvey-OTUahHcqs0Y-unsplash-scaled.jpg\";s:5:\"sizes\";a:10:{s:6:\"medium\";a:4:{s:4:\"file\";s:49:\"stephanie-harvey-OTUahHcqs0Y-unsplash-225x300.jpg\";s:5:\"width\";i:225;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:50:\"stephanie-harvey-OTUahHcqs0Y-unsplash-768x1024.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:49:\"stephanie-harvey-OTUahHcqs0Y-unsplash-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:50:\"stephanie-harvey-OTUahHcqs0Y-unsplash-768x1024.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:51:\"stephanie-harvey-OTUahHcqs0Y-unsplash-1152x1536.jpg\";s:5:\"width\";i:1152;s:6:\"height\";i:1536;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"2048x2048\";a:4:{s:4:\"file\";s:51:\"stephanie-harvey-OTUahHcqs0Y-unsplash-1536x2048.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:2048;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:16:\"sidebar-featured\";a:4:{s:4:\"file\";s:47:\"stephanie-harvey-OTUahHcqs0Y-unsplash-75x75.jpg\";s:5:\"width\";i:75;s:6:\"height\";i:75;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:23:\"genesis-singular-images\";a:4:{s:4:\"file\";s:49:\"stephanie-harvey-OTUahHcqs0Y-unsplash-702x526.jpg\";s:5:\"width\";i:702;s:6:\"height\";i:526;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:28:\"ab-block-post-grid-landscape\";a:4:{s:4:\"file\";s:49:\"stephanie-harvey-OTUahHcqs0Y-unsplash-600x400.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:400;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:25:\"ab-block-post-grid-square\";a:4:{s:4:\"file\";s:49:\"stephanie-harvey-OTUahHcqs0Y-unsplash-600x600.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}s:14:\"original_image\";s:41:\"stephanie-harvey-OTUahHcqs0Y-unsplash.jpg\";}');
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


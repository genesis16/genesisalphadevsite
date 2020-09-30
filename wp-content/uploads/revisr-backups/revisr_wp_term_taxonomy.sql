
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
DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_term_taxonomy` VALUES (1,1,'category','',0,1),(2,2,'product_type','',0,32),(3,3,'product_type','',0,1),(4,4,'product_type','',0,2),(5,5,'product_type','',0,1),(6,6,'product_visibility','',0,0),(7,7,'product_visibility','',0,0),(8,8,'product_visibility','',0,0),(9,9,'product_visibility','',0,0),(10,10,'product_visibility','',0,0),(11,11,'product_visibility','',0,0),(12,12,'product_visibility','',0,0),(13,13,'product_visibility','',0,0),(14,14,'product_visibility','',0,1),(15,15,'product_cat','',0,0),(16,16,'category','',0,13),(17,17,'category','',0,10),(18,18,'category','',0,14),(19,19,'category','',0,6),(20,20,'category','',0,10),(21,21,'category','',0,12),(22,22,'post_tag','',0,8),(23,23,'post_tag','',0,10),(24,24,'post_tag','',0,7),(25,25,'post_tag','',0,7),(26,26,'post_tag','',0,4),(27,27,'post_tag','',0,6),(28,28,'post_tag','',0,2),(29,29,'post_tag','',0,4),(30,30,'post_tag','',0,7),(31,31,'post_tag','',0,5),(32,32,'post_tag','',0,2),(33,33,'post_tag','',0,6),(34,34,'post_tag','',0,4),(35,35,'product_tag','',0,10),(36,36,'product_tag','',0,5),(37,37,'product_tag','',0,3),(38,38,'carousels_category','',0,10),(39,39,'carousels_category','',0,4),(40,40,'carousels_category','',0,8),(41,41,'carousels_category','',0,5),(42,42,'product_tag','',0,17),(43,43,'product_tag','',0,5),(44,44,'product_tag','',0,6),(45,45,'product_tag','',0,4),(46,46,'product_tag','',0,2),(47,47,'product_tag','',0,2),(48,48,'product_tag','',0,4),(49,49,'product_tag','',0,7),(50,50,'product_tag','',0,5),(51,51,'slides_category','',0,1),(52,52,'slides_category','',0,1),(53,53,'slides_category','',0,5),(54,54,'slides_category','',0,4),(55,55,'slides_category','',0,1),(56,56,'slides_category','',0,4),(57,57,'product_tag','',0,11),(58,58,'product_tag','',0,2),(59,59,'product_tag','',0,1),(60,60,'portfolio-category','',0,5),(61,61,'portfolio-category','',0,14),(62,62,'portfolio-category','',0,25),(63,63,'testimonials_category','',0,9),(64,64,'testimonials_category','',0,3),(65,65,'testimonials_category','',0,3),(66,66,'product_tag','',0,10),(67,67,'portfolio-category','',0,20),(68,68,'product_tag','',0,11),(69,69,'product_cat','',0,2),(70,70,'product_cat','',0,1),(71,71,'product_cat','',0,1),(72,72,'product_cat','',0,15),(73,73,'product_cat','',0,1),(74,74,'product_cat','',0,2),(75,75,'product_cat','',0,2),(76,76,'product_cat','',0,3),(77,77,'product_cat','',0,12),(78,78,'nav_menu','',0,4),(79,79,'nav_menu','',0,4),(80,80,'nav_menu','',0,122),(81,81,'post_format','',0,3),(82,82,'post_format','',0,4),(83,83,'post_format','',0,4),(84,84,'post_format','',0,2),(85,85,'post_format','',0,0),(86,86,'pa_color','',0,2),(87,87,'pa_color','',0,2),(88,88,'pa_size','',0,1),(89,89,'pa_size','',0,1),(90,90,'pa_size','',0,1),(91,91,'nav_menu','',0,6);
/*!40000 ALTER TABLE `wp_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


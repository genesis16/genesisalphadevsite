
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
DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
INSERT INTO `wp_terms` VALUES (1,'Uncategorized','uncategorized',0),(2,'simple','simple',0),(3,'grouped','grouped',0),(4,'variable','variable',0),(5,'external','external',0),(6,'exclude-from-search','exclude-from-search',0),(7,'exclude-from-catalog','exclude-from-catalog',0),(8,'featured','featured',0),(9,'outofstock','outofstock',0),(10,'rated-1','rated-1',0),(11,'rated-2','rated-2',0),(12,'rated-3','rated-3',0),(13,'rated-4','rated-4',0),(14,'rated-5','rated-5',0),(15,'Uncategorized','uncategorized',0),(16,'Decoration','decoration',0),(17,'DIY','diy',0),(18,'Gowns','gowns',0),(19,'Ideas','ideas',0),(20,'Venues','venues',0),(21,'Wedding','wedding',0),(22,'Bride','bride',0),(23,'Bridesmaids','bridesmaids',0),(24,'Creative','creative',0),(25,'DIY','diy',0),(26,'Engagement','engagement',0),(27,'Fashion','fashion',0),(28,'Fashion Creative','fashion-creative',0),(29,'Gown','gown',0),(30,'Groom','groom',0),(31,'Idea','idea',0),(32,'Organizing','organizing',0),(33,'Venue','venue',0),(34,'Wedding','wedding',0),(35,'Bride','bride',0),(36,'Bridesmaids','bridesmaids',0),(37,'Cake','cake',0),(38,'Carousel 1','carousel-1',0),(39,'Carousel 2','carousel-2',0),(40,'Carousel 3','carousel-3',0),(41,'Carousel 4','carousel-4',0),(42,'Creative','creative',0),(43,'Decoration','decoration',0),(44,'Dress','dress',0),(45,'Event','event',0),(46,'Fashion','fashion',0),(47,'Gift','gift',0),(48,'Gown','gown',0),(49,'Groom','groom',0),(50,'Hairstyle','hairstyle',0),(51,'Home 1 Slider','home-1-slider',0),(52,'Home 2 Slider','home-2-slider',0),(53,'Home Main Slider','home-main-slider',0),(54,'Home Shop Slider','home-shop-slider',0),(55,'Home Slider','home-slider',0),(56,'Home video','home-video',0),(57,'Idea','idea',0),(58,'Invitation','invitation',0),(59,'Organizing','organizing',0),(60,'Photography','photography',0),(61,'Portrait','portrait',0),(62,'Standard','standard',0),(63,'Testimonials 1','testimonials-1',0),(64,'testimonials-2','testimonials-2',0),(65,'testimonials-3','testimonials-3',0),(66,'Venue','venue',0),(67,'Wedding','wedding',0),(68,'White','white',0),(69,'Accessories','accessories',0),(70,'Bridesmaids','bridesmaids',0),(71,'Dresses','dresses',0),(72,'Gifts','gifts',0),(73,'Jewelry','jewelry',0),(74,'Luxury','luxury',0),(75,'On Sale','on-sale',0),(76,'Special','special',0),(77,'Wedding','wedding',0),(78,'Footer 1','footer-1',0),(79,'Footer 2','footer-2',0),(80,'Main Menu','main-menu',0),(81,'Quote','post-format-quote',0),(82,'Gallery','post-format-gallery',0),(83,'Link','post-format-link',0),(84,'Video','post-format-video',0),(85,'Audio','post-format-audio',0),(86,'Blue','blue',0),(87,'White','white',0),(88,'Large','large',0),(89,'Medium','medium',0),(90,'Small','small',0),(91,'Megan Jordan Celebrant Website','megan-jordan-celebrant-website',0);
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


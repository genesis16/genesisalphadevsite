
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
DROP TABLE IF EXISTS `wp_termmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_termmeta` WRITE;
/*!40000 ALTER TABLE `wp_termmeta` DISABLE KEYS */;
INSERT INTO `wp_termmeta` VALUES (1,69,'order','0'),(2,70,'order','0'),(3,71,'order','0'),(4,72,'order','0'),(5,73,'order','0'),(6,74,'order','0'),(7,75,'order','0'),(8,76,'order','0'),(9,77,'order','0'),(10,35,'product_count_product_tag','10'),(11,49,'product_count_product_tag','7'),(12,57,'product_count_product_tag','11'),(13,43,'product_count_product_tag','5'),(14,66,'product_count_product_tag','10'),(15,42,'product_count_product_tag','17'),(16,68,'product_count_product_tag','11'),(17,47,'product_count_product_tag','2'),(18,36,'product_count_product_tag','5'),(19,46,'product_count_product_tag','2'),(20,59,'product_count_product_tag','1'),(21,48,'product_count_product_tag','4'),(22,37,'product_count_product_tag','3'),(23,44,'product_count_product_tag','6'),(24,50,'product_count_product_tag','5'),(25,45,'product_count_product_tag','4'),(26,58,'product_count_product_tag','2'),(27,72,'product_count_product_cat','15'),(28,69,'product_count_product_cat','2'),(29,76,'product_count_product_cat','3'),(30,74,'product_count_product_cat','2'),(31,75,'product_count_product_cat','2'),(32,70,'product_count_product_cat','1'),(33,71,'product_count_product_cat','1'),(34,73,'product_count_product_cat','1'),(35,77,'product_count_product_cat','12');
/*!40000 ALTER TABLE `wp_termmeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


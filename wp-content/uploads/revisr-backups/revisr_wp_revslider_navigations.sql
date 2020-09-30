
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
DROP TABLE IF EXISTS `wp_revslider_navigations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_revslider_navigations` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `handle` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `css` longtext NOT NULL,
  `markup` longtext NOT NULL,
  `settings` longtext,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_revslider_navigations` WRITE;
/*!40000 ALTER TABLE `wp_revslider_navigations` DISABLE KEYS */;
INSERT INTO `wp_revslider_navigations` VALUES (1,'select-custom','select-custom','arrows','.select-custom.tparrows {\n	cursor:pointer;\n	position:absolute;\n	display:block;\n	z-index:100;\n    cursor: pointer;\n    background: #fff;\n    width: 55px;\n    height: 55px;\n    position: absolute;\n    display: block;\n    z-index: 100;\n    line-height: 50px;\n    color: #333;\n    -webkit-transition: background-color 0.15s ease-out, color 0.15s ease-out;\n    -moz-transition: background-color 0.15s ease-out, color 0.15s ease-out;\n    transition: background-color 0.15s ease-out, color 0.15s ease-out;\n}\n.select-custom.tparrows:hover {\n    background: rgba(255,255,255,0.5);\n    color: #333;\n}\n.select-custom.tparrows:before {\n	font-family: \\\'ElegantIcons\\\';\n    font-size: 32px;\n    color: #333;\n    display: block;\n    line-height: 55px;\n    text-align: center;\n    height: 55px;\n    width: 55px;\n}\n.select-custom.tparrows.tp-leftarrow:before {\n	 content: \\\"\\\\34\\\";\n}\n.select-custom.tparrows.tp-rightarrow:before {\n	content: \\\"\\\\35\\\";\n}\n.select-custom.tparrows:hover:before {\n\n}\n','\n','{\"dim\":{\"width\":160,\"height\":160},\"placeholders\":{\"bg-color\":{\"title\":\"BG-Color\",\"type\":\"color-rgba\",\"data\":\"#ffffff\"},\"bg-size\":{\"title\":\"Size\",\"type\":\"custom\",\"data\":\"60\"},\"arrow-size\":{\"title\":\"Arrow-Size\",\"type\":\"custom\",\"data\":\"25\"},\"hover-arrow-color\":{\"title\":\"Hover-Arrow\",\"type\":\"color\",\"data\":\"#000000\"},\"hover-title-color\":{\"title\":\"Hover-Title\",\"type\":\"color\",\"data\":\"#000000\"},\"arrowcolor\":{\"title\":\"Arrow-Color\",\"type\":\"color-rgba\",\"data\":\"#aaaaaa\"}},\"presets\":{},\"version\":\"6.0.0\"}'),(2,'select-custom','select-custom','bullets','.select-custom .tp-bullet {\n	width: 10px;\n	height: 10px;\n    margin: 0 11px;\n	position:absolute;\n	background:rgba(255,255,255,0.5);\n	border-radius:50%;\n	cursor: pointer;\n	-webkit-box-sizing:content-box;\n    -moz-box-sizing:content-box;\n    box-sizing:content-box;\n}\n\n.select-custom .tp-bullet.selected {\n	background:rgba(255,255,255,1);\n}\n\n','','{\"dim\":{\"width\":160,\"height\":160},\"placeholders\":{\"bullet-size\":{\"title\":\"Bullet-Size\",\"type\":\"custom\",\"data\":\"13\"},\"bullet-bg-color\":{\"title\":\"Bullet-Background\",\"type\":\"color-rgba\",\"data\":\"#e5e5e5\"},\"hover-bullet-bg-color\":{\"title\":\"Hover-Bullet-BG\",\"type\":\"color-rgba\",\"data\":\"#ffffff\"},\"title-color\":{\"title\":\"Title-Color\",\"type\":\"color\",\"data\":\"#888888\"},\"title-font-size\":{\"title\":\"Title-Font-Size\",\"type\":\"custom\",\"data\":\"12\"},\"title-bg-color\":{\"title\":\"Title-BG-Color\",\"type\":\"color-rgba\",\"data\":\"rgba(255,255,255,0.75)\"}},\"presets\":{},\"version\":\"6.0.0\"}'),(3,'select-custom','select-custom','tabs','.select-custom .tp-tab { \n  opacity:1;      \n  padding:10px;\n  box-sizing:border-box;\n  font-family: \\\"##font-family##\\\", sans-serif;\n  border-bottom: ##bottom-border-size##px solid rgb(##bottom-border-color##);\n  background:rgb(##idle-bg-color);\n }\n.select-custom .tp-tab-image \n{ \n  width:##image-size##px;\n  height:##image-size##px; max-height:100%; max-width:100%;\n  position:relative;\n  display:inline-block;\n  float:left;\n\n}\n.select-custom .tp-tab-content \n{\n    background:rgba(0,0,0,0); \n    position:relative;\n    padding:15px 15px 15px 85px;\n left:0px;\n overflow:hidden;\n margin-top:-15px;\n    box-sizing:border-box;\n    color:#333;\n    display: inline-block;\n    width:100%;\n    height:100%;\n position:absolute; }\n.select-custom .tp-tab-date\n  {\n  display:block;\n  color: rgb(##param1-color##);\n  font-weight:500;\n  font-size:##param1-size##px;\n  margin-bottom:0px;\n  }\n.select-custom .tp-tab-title \n{\n    display:block;	\n    text-align:left;\n    color:rgb(##param2-color##);\n    font-size:##param2-size##px;\n    font-weight:500;\n    text-transform:none;\n    line-height:17px;\n}\n.select-custom .tp-tab:hover,\n.select-custom .tp-tab.selected {\n	background:rgb(##hover-bg-color##); \n}\n\n.select-custom .tp-tab-mask {\n}\n\n/* media queries */\n@media only screen and (max-width: 960px) {\n\n}\n@media only screen and (max-width: 768px) {\n\n}','<div class=\\\"tp-tab-content\\\">\n  <span class=\\\"tp-tab-date\\\">{{param1}}</span>\n  <span class=\\\"tp-tab-title\\\">{{param2}}</span>\n</div>\n<div class=\\\"tp-tab-image\\\"></div>','{\"dim\":{\"width\":\"250\",\"height\":\"80\"},\"placeholders\":{\"font-family\":{\"title\":\"Font-Family\",\"type\":\"font-family\",\"data\":\"Roboto\"},\"bottom-border-color\":{\"title\":\"Bottom-Border\",\"type\":\"color\",\"data\":\"#e5e5e5\"},\"bottom-border-size\":{\"title\":\"Bottom-Border-Size\",\"type\":\"custom\",\"data\":\"1\"},\"image-size\":{\"title\":\"Image-Size\",\"type\":\"custom\",\"data\":\"60\"},\"param1-color\":{\"title\":\"Param-1-Color\",\"type\":\"color\",\"data\":\"#aaaaaa\"},\"param1-size\":{\"title\":\"Param-1-Size\",\"type\":\"custom\",\"data\":\"12\"},\"param2-color\":{\"title\":\"Param-2-Color\",\"type\":\"color\",\"data\":\"#333333\"},\"param2-size\":{\"title\":\"Param-2-Size\",\"type\":\"custom\",\"data\":\"14\"},\"hover-bg-color\":{\"title\":\"Hover-Background\",\"type\":\"color\",\"data\":\"#eeeeee\"},\"idle-bg-color\":{\"title\":\"Idle-Background\",\"type\":\"color-rgba\",\"data\":\"rgba(0,0,0,0)\"}},\"presets\":{},\"version\":\"6.0.0\"}');
/*!40000 ALTER TABLE `wp_revslider_navigations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


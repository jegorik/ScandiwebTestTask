-- MariaDB dump 10.17  Distrib 10.4.7-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: scandiweb
-- ------------------------------------------------------
-- Server version	10.4.7-MariaDB

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

--
-- Table structure for table `product_list`
--

DROP TABLE IF EXISTS `product_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `product` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_list`
--

LOCK TABLES `product_list` WRITE;
/*!40000 ALTER TABLE `product_list` DISABLE KEYS */;
INSERT INTO `product_list` VALUES (1,'EMT1236867','Emtec disk',1.05,'dvd','Size: 3800 Mb'),(2,'TIT147826','Titanum disk',0.97,'dvd','Size: 700 Mb'),(3,'INT036974','Intenso disk',0.69,'dvd','Size: 3000 Mb'),(6,'ADA9712','Adata disk',0.76,'dvd','Size: 4800 Mb'),(7,'SON5321','Sony disk',1.35,'dvd','Size: 3500 Mb'),(8,'TOS19523','Toshiba disk',1.03,'dvd','Size: 2900 Mb'),(9,'SAM560131','Samsung disk',1.2,'dvd','Size: 4000 Mb'),(10,'VER12589','Verbatim disk',0.89,'dvd','Size: 2300 Mb'),(11,'ACM200133','Acme disk',0.67,'dvd','Size: 2000 Mb'),(12,'SH12TY','Shell',25.61,'furniture','Dimension: 125x234x450'),(13,'WU69er7','Wall unit',98.32,'furniture','Dimension: 342x68x270'),(14,'CH76OP','Chair',123,'furniture','Dimension: 52x89x61'),(15,'RG89io','Rug',52.78,'furniture','Dimension: 145x52x97'),(16,'AR78931','Armchair',34,'furniture','Dimension: 69x34x72'),(17,'CP43TBN','Cupboard',98.12,'furniture','Dimension: 200x125x61'),(18,'SB9890','Side board',986,'furniture','Dimension: 97x352x190'),(19,'DW3240p','Dishwasher',247.36,'furniture','Dimension: 86x34x120'),(20,'FR90KJH','Fridge',125.12,'furniture','Dimension: 756x258x400'),(21,'DK56ER','Bookcase',57.36,'furniture','Dimension: 37x125x78'),(22,'OV67RT','Oven',98.32,'furniture','Dimension: 25x18x56'),(23,'MT89','Magnolia Table',25.36,'book','Weight: 1.5 KG'),(24,'TIP1698','The Instant Pot Bible',15.98,'book','Weight: 0.2 KG'),(25,'MSP56k','Michael Symon\'s Playing with Fire',2.34,'book','Weight: 0.7 KG'),(26,'5Ilp7','5 Ingredients',45.36,'book','Weight: 2 KG'),(27,'WIT78cvR','Whiskey in a Teacup',17.52,'book','Weight: 0.5 KG'),(28,'TB78MN','The Bob\'s Burgers Burger Book',29.36,'book','Weight: 0.32 KG'),(29,'TCMC564','The Complete Mediterranean Cookbook',98.36,'book','Weight: 1.2 KG'),(30,'TES1276','The Elder Scrolls',45.78,'book','Weight: 1 KG'),(31,'BHGNCB2','Better Homes and Gardens New Cook Book',34.21,'book','Weight: 0.5 KG'),(32,'AFE56','Air Fry Everything',27.12,'book','Weight: 0.78 KG'),(33,'TSOC8945','The Science of Cooking',13.68,'book','Weight: 0.25 KG'),(60,'JOC7896','John\'s Cooking Book',23.69,'book','Weight: 2 KG'),(61,'HT67809','Hank\'s Trophy',12.39,'book','Weight: 0.5 KG'),(74,'MAX1893','Maxell disk',0.52,'dvd','Size: 1500 Mb'),(75,'TRC1698753','Tracert disk',0.82,'dvd','Size: 6000 Mb');
/*!40000 ALTER TABLE `product_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-27  1:58:38

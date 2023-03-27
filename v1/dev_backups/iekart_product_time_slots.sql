-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: iekart
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `product_time_slots`
--

DROP TABLE IF EXISTS `product_time_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_time_slots` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `delivery_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` text COLLATE utf8mb4_unicode_ci,
  `end_time` text COLLATE utf8mb4_unicode_ci,
  `time_delivery_quota` int DEFAULT NULL,
  `product_id` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_time_slots`
--

LOCK TABLES `product_time_slots` WRITE;
/*!40000 ALTER TABLE `product_time_slots` DISABLE KEYS */;
INSERT INTO `product_time_slots` VALUES (12,'1','09:00','18:00',1,521,1,NULL,NULL),(13,'2','09:00','17:00',0,521,1,NULL,NULL),(14,'3','09:00','18:00',0,521,1,NULL,NULL),(15,'4','09:00','18:00',0,521,1,NULL,NULL),(16,'5','09:00','18:00',0,521,1,NULL,NULL),(65,'1','09:00','18:00',1,121,1,NULL,NULL),(66,'1','09:00','18:00',0,523,1,NULL,NULL),(67,'2','09:00','18:00',0,523,1,NULL,NULL),(68,'2','09:00','18:00',6,509,1,NULL,NULL),(69,'5','09:00','18:00',6,509,1,NULL,NULL),(77,'1','09:00','18:00',1,541,1,NULL,NULL),(78,'2','09:00','18:00',2,541,1,NULL,NULL),(79,'3','09:00','18:00',0,541,1,NULL,NULL),(80,'4','09:00','18:00',0,541,1,NULL,NULL),(88,'2','09:00','18:00',3,543,1,NULL,NULL),(89,'3','09:00','18:00',3,543,1,NULL,NULL),(90,'4','09:00','18:00',3,543,1,NULL,NULL),(135,'3','09:00','18:00',2,380,1,NULL,NULL),(136,'6','09:00','18:00',2,380,1,NULL,NULL),(137,'7','09:00','18:00',2,380,1,NULL,NULL),(138,'3','09:00','18:00',2,381,1,NULL,NULL),(139,'6','09:00','18:00',2,381,1,NULL,NULL),(140,'7','09:00','18:00',2,381,1,NULL,NULL),(141,'3','09:00','18:00',2,382,1,NULL,NULL),(142,'6','09:00','18:00',2,382,1,NULL,NULL),(143,'7','09:00','18:00',2,382,1,NULL,NULL),(144,'3','09:00','18:00',2,379,1,NULL,NULL),(145,'6','09:00','18:00',2,379,1,NULL,NULL),(146,'7','09:00','18:00',2,379,1,NULL,NULL);
/*!40000 ALTER TABLE `product_time_slots` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-15 10:59:22

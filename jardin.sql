-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sae202
-- ------------------------------------------------------
-- Server version	10.3.39-MariaDB-0+deb10u2

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

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `action_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`action_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (6,'arroser'),(2,'planter'),(7,'recolter');
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journaux`
--

DROP TABLE IF EXISTS `journaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journaux` (
  `journal_id` int(100) NOT NULL AUTO_INCREMENT,
  `journal_date` int(200) NOT NULL DEFAULT current_timestamp(),
  `_user_id` int(100) NOT NULL,
  `_action_id` int(100) NOT NULL,
  `_parcelle_id` int(100) NOT NULL,
  `_plantation_id` int(100) NOT NULL,
  PRIMARY KEY (`journal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journaux`
--

LOCK TABLES `journaux` WRITE;
/*!40000 ALTER TABLE `journaux` DISABLE KEYS */;
INSERT INTO `journaux` VALUES (1,1718755200,2,1,56,1),(2,1718064000,2,1,56,1),(3,1718236800,2,2,56,1),(6,1717459200,2,1,78,1),(7,1718841600,2,2,78,1),(12,1718841600,2,6,98,1),(11,1717977600,2,6,98,1),(13,1718698663,2,6,98,1);
/*!40000 ALTER TABLE `journaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcelles`
--

DROP TABLE IF EXISTS `parcelles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcelles` (
  `parcelle_id` int(100) NOT NULL AUTO_INCREMENT,
  `parcelle_numero` int(100) NOT NULL,
  `parcelle_statut` int(1) NOT NULL COMMENT '0 = libre\r\n1 = prereserver\r\n2 = confirmer',
  `_user_id` int(100) NOT NULL,
  `_potager_id` int(100) NOT NULL,
  PRIMARY KEY (`parcelle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelles`
--

LOCK TABLES `parcelles` WRITE;
/*!40000 ALTER TABLE `parcelles` DISABLE KEYS */;
INSERT INTO `parcelles` VALUES (60,10,0,-1,15),(59,9,0,-1,15),(58,8,0,-1,15),(68,4,2,5,17),(57,7,1,5,15),(56,6,1,2,15),(55,5,0,-1,15),(54,4,0,-1,15),(53,3,0,-1,15),(52,2,0,-1,15),(51,1,0,-1,15),(67,3,0,-1,17),(66,2,0,-1,17),(65,1,0,-1,17),(69,5,0,-1,17),(70,1,0,-1,18),(71,2,0,-1,18),(72,3,0,-1,18),(73,4,0,-1,18),(74,5,0,-1,18),(75,6,0,-1,18),(76,1,0,-1,19),(77,2,0,-1,19),(78,3,2,2,19),(79,4,2,5,19),(80,5,2,2,19),(81,6,0,-1,19),(82,7,1,5,19),(104,2,0,-1,29),(103,1,0,-1,29),(102,2,0,-1,28),(101,1,0,-1,28),(100,4,0,-1,27),(99,3,0,-1,27),(98,2,2,2,27),(97,1,0,-1,27),(96,1,1,5,26);
/*!40000 ALTER TABLE `parcelles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plantations`
--

DROP TABLE IF EXISTS `plantations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plantations` (
  `plantation_id` int(100) NOT NULL AUTO_INCREMENT,
  `plantation_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`plantation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plantations`
--

LOCK TABLES `plantations` WRITE;
/*!40000 ALTER TABLE `plantations` DISABLE KEYS */;
INSERT INTO `plantations` VALUES (1,'tomate'),(4,'carotte'),(5,'radis');
/*!40000 ALTER TABLE `plantations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `potagers`
--

DROP TABLE IF EXISTS `potagers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `potagers` (
  `potager_id` int(11) NOT NULL AUTO_INCREMENT,
  `potager_adresse` text NOT NULL,
  `potager_longitude` varchar(50) NOT NULL,
  `potager_latitude` varchar(50) NOT NULL,
  `potager_nb_parcelle` int(10) NOT NULL,
  `_user_id` int(255) NOT NULL,
  `potager_photo` text DEFAULT NULL,
  PRIMARY KEY (`potager_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `potagers`
--

LOCK TABLES `potagers` WRITE;
/*!40000 ALTER TABLE `potagers` DISABLE KEYS */;
INSERT INTO `potagers` VALUES (19,'9 rue de quebec troyes','4.0783195','48.2691497',7,-1,''),(18,'2 rue de quebec troyes','4.0783195','48.2691497',6,2,''),(15,'10 rue de quebec troyes','4.0783195','48.2691497',10,2,''),(17,'3 rue de quebec troyes','4.0783195','48.2691497',5,-1,''),(26,'16 route d\'armeau dixmont','3.409264','48.082205',1,2,'2024_06_16_15_15_56---Capture d’écran (2).png'),(27,'3 rue du paon troyes','4.0778696','48.2996629',4,5,'2024_06_16_20_29_59---Capture d\'écran 2024-03-20 181439.png'),(28,'2 rue tournai troyes','4.0965285','48.3036647',2,5,'2024_06_17_09_46_53---Capture d\'écran 2024-03-20 171909.png'),(29,'2 rue Coli troyes','4.0753214','48.2827905',2,-1,'2024_06_17_17_57_07---Capture d\'écran 2024-03-20 174024.png');
/*!40000 ALTER TABLE `potagers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` text DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test','test@test.test','$2y$10$qQ6OJq53t/7p1B7CWWZ9uuR.S5CV/FPX7tG74X/yBh1As/xsn9f4O',NULL),(2,'a','a@a.a','$2y$10$4MQ6Ltl7Obw9QEhxt/x8Sebe700nN64zKHV0OfA2s278t63.ku8JO',NULL),(3,'b','b@b.b','$2y$10$P9BtpaViPnHlMadqZY2AOegflAg.Zt/rezsgbY186.pvmtEUqBxrq',NULL),(-1,'admin','admin@admin.fr','$2y$10$N94KVnAHHZ.JClP5r8dtjOVMugGmDXUQXNDXJrmyOKj9lMm1L.RGq',NULL),(5,'z','z@z.z','$2y$10$h0XvF3hGi68gwdGVkwWaHuNx3BtXOZhDqAr6NtBk.HdBYxTv55cai','2024_06_16_19_40_35---Capture d\'écran 2024-06-03 173558.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-18 10:00:11

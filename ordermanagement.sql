-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: billing_management
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `add_dranks`
--

DROP TABLE IF EXISTS `add_dranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `add_dranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flavour` varchar(255) NOT NULL,
  `large_price` varchar(255) NOT NULL,
  `medium_price` varchar(255) NOT NULL,
  `small_price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_dranks`
--

LOCK TABLES `add_dranks` WRITE;
/*!40000 ALTER TABLE `add_dranks` DISABLE KEYS */;
INSERT INTO `add_dranks` VALUES (4,'coca cola','120','100','70'),(5,'sprite','120','100','70'),(6,'fanta','120','110','70');
/*!40000 ALTER TABLE `add_dranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `add_fries`
--

DROP TABLE IF EXISTS `add_fries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `add_fries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `large_price` varchar(255) NOT NULL,
  `medium_price` varchar(255) NOT NULL,
  `small_price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_fries`
--

LOCK TABLES `add_fries` WRITE;
/*!40000 ALTER TABLE `add_fries` DISABLE KEYS */;
INSERT INTO `add_fries` VALUES (4,'210','160','170');
/*!40000 ALTER TABLE `add_fries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `add_pizza`
--

DROP TABLE IF EXISTS `add_pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `add_pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flavour` varchar(255) NOT NULL,
  `large_price` varchar(255) NOT NULL,
  `medium_price` varchar(255) NOT NULL,
  `small_price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_pizza`
--

LOCK TABLES `add_pizza` WRITE;
/*!40000 ALTER TABLE `add_pizza` DISABLE KEYS */;
INSERT INTO `add_pizza` VALUES (4,'shahi pizza','1100','860','410'),(5,'nawabni pizza','1000','850','400'),(6,'pari pari pizza','1000','850','70');
/*!40000 ALTER TABLE `add_pizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dranks`
--

DROP TABLE IF EXISTS `dranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drank` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dranks`
--

LOCK TABLES `dranks` WRITE;
/*!40000 ALTER TABLE `dranks` DISABLE KEYS */;
/*!40000 ALTER TABLE `dranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fries`
--

DROP TABLE IF EXISTS `fries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fries`
--

LOCK TABLES `fries` WRITE;
/*!40000 ALTER TABLE `fries` DISABLE KEYS */;
/*!40000 ALTER TABLE `fries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_place`
--

DROP TABLE IF EXISTS `order_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_done` text NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_place`
--

LOCK TABLES `order_place` WRITE;
/*!40000 ALTER TABLE `order_place` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pizza`
--

DROP TABLE IF EXISTS `pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pizza` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pizza`
--

LOCK TABLES `pizza` WRITE;
/*!40000 ALTER TABLE `pizza` DISABLE KEYS */;
/*!40000 ALTER TABLE `pizza` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-02 12:43:05

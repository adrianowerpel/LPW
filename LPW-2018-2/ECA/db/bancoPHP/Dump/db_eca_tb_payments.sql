CREATE DATABASE  IF NOT EXISTS `db_eca` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_eca`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_eca
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `tb_payments`
--

DROP TABLE IF EXISTS `tb_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_payments` (
  `id_payment` bigint(20) NOT NULL AUTO_INCREMENT,
  `tb_city_id_city` int(11) NOT NULL,
  `tb_functions_id_function` int(11) NOT NULL,
  `tb_subfunctions_id_subfunction` int(11) NOT NULL,
  `tb_program_id_program` int(11) NOT NULL,
  `tb_action_id_action` int(11) NOT NULL,
  `tb_beneficiaries_id_beneficiaries` bigint(20) NOT NULL,
  `tb_source_id_source` int(11) NOT NULL,
  `tb_files_id_file` int(11) NOT NULL,
  `db_value` double NOT NULL,
  PRIMARY KEY (`id_payment`),
  KEY `fk_tb_payments_tb_city1_idx` (`tb_city_id_city`),
  KEY `fk_tb_payments_tb_program1_idx` (`tb_program_id_program`),
  KEY `fk_tb_payments_tb_action1_idx` (`tb_action_id_action`),
  KEY `fk_tb_payments_tb_source1_idx` (`tb_source_id_source`),
  KEY `fk_tb_payments_tb_files1_idx` (`tb_files_id_file`),
  KEY `fk_tb_payments_tb_functions1_idx` (`tb_functions_id_function`),
  KEY `fk_tb_payments_tb_subfunctions1_idx` (`tb_subfunctions_id_subfunction`),
  KEY `fk_tb_payments_tb_beneficiaries1_idx` (`tb_beneficiaries_id_beneficiaries`),
  CONSTRAINT `fk_tb_payments_tb_action1` FOREIGN KEY (`tb_action_id_action`) REFERENCES `tb_action` (`id_action`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_payments_tb_beneficiaries1` FOREIGN KEY (`tb_beneficiaries_id_beneficiaries`) REFERENCES `tb_beneficiaries` (`id_beneficiaries`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_payments_tb_city1` FOREIGN KEY (`tb_city_id_city`) REFERENCES `tb_city` (`id_city`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_payments_tb_files1` FOREIGN KEY (`tb_files_id_file`) REFERENCES `tb_files` (`id_file`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_payments_tb_functions1` FOREIGN KEY (`tb_functions_id_function`) REFERENCES `tb_functions` (`id_function`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_payments_tb_program1` FOREIGN KEY (`tb_program_id_program`) REFERENCES `tb_program` (`id_program`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_payments_tb_source1` FOREIGN KEY (`tb_source_id_source`) REFERENCES `tb_source` (`id_source`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_payments_tb_subfunctions1` FOREIGN KEY (`tb_subfunctions_id_subfunction`) REFERENCES `tb_subfunctions` (`id_subfunction`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_payments`
--

LOCK TABLES `tb_payments` WRITE;
/*!40000 ALTER TABLE `tb_payments` DISABLE KEYS */;
INSERT INTO `tb_payments` VALUES (1,1,1,1,1,1,1,1,1,90),(2,2,1,1,1,1,2,1,1,44),(3,3,1,1,1,1,3,1,1,112),(4,4,1,1,1,1,4,1,1,22),(5,5,1,1,1,1,5,1,1,90),(6,6,1,1,1,1,6,1,1,66),(7,7,1,1,1,1,7,1,1,90),(8,8,1,1,1,1,8,1,1,101),(9,9,1,1,1,1,9,1,1,44),(10,10,1,1,1,1,10,1,1,90),(11,11,1,1,1,1,11,1,1,134),(12,12,1,1,1,1,12,1,1,134),(13,13,1,1,1,1,13,1,1,68),(14,14,1,1,1,1,14,1,1,112),(15,15,1,1,1,1,15,1,1,112),(16,16,1,1,1,1,16,1,1,134),(17,17,1,1,1,1,17,1,1,112),(18,18,1,1,1,1,18,1,1,44),(19,19,1,1,1,1,19,1,1,44),(20,20,1,1,1,1,20,1,1,66),(21,21,1,1,1,1,21,1,1,44),(22,22,1,1,1,1,22,1,1,134),(23,23,1,1,1,1,23,1,1,134),(24,24,1,1,1,1,24,1,1,50),(25,25,1,1,1,1,25,1,1,112),(26,26,1,1,1,1,26,1,1,112),(27,27,1,1,1,1,27,1,1,112),(28,28,1,1,1,1,28,1,1,44),(29,29,1,1,1,1,29,1,1,44),(30,30,1,1,1,1,30,1,1,50),(31,28,1,1,1,1,31,1,1,66),(32,31,1,1,1,1,32,1,1,167),(33,32,1,1,1,1,33,1,1,66),(34,10,1,1,1,1,34,1,1,90),(35,33,1,1,1,1,35,1,1,66),(36,34,1,1,1,1,36,1,1,44),(37,35,1,1,1,1,37,1,1,66),(38,36,1,1,1,1,38,1,1,22),(39,37,1,1,1,1,39,1,1,123),(40,38,1,1,1,1,40,1,1,134),(41,39,1,1,1,1,41,1,1,90),(42,40,1,1,1,1,42,1,1,134),(43,41,1,1,1,1,43,1,1,66),(44,42,1,1,1,1,44,1,1,112),(45,43,1,1,1,1,45,1,1,134),(46,44,1,1,1,1,46,1,1,44),(47,45,1,1,1,1,47,1,1,44),(48,46,1,1,1,1,48,1,1,90),(49,47,1,1,1,1,49,1,1,22),(50,48,1,1,1,1,50,1,1,44),(51,49,1,1,1,1,51,1,1,44),(52,50,1,1,1,1,52,1,1,22),(53,39,1,1,1,1,53,1,1,90),(54,51,1,1,1,1,54,1,1,22),(55,52,1,1,1,1,55,1,1,134),(56,7,1,1,1,1,56,1,1,112),(57,53,1,1,1,1,57,1,1,44),(58,54,1,1,1,1,58,1,1,134),(59,55,1,1,1,1,59,1,1,66),(60,56,1,1,1,1,60,1,1,112),(61,32,1,1,1,1,61,1,1,68),(62,57,1,1,1,1,62,1,1,134),(63,58,1,1,1,1,63,1,1,90),(64,59,1,1,1,1,64,1,1,90),(65,60,1,1,1,1,65,1,1,66),(66,58,1,1,1,1,66,1,1,90),(67,61,1,1,1,1,67,1,1,44),(68,62,1,1,1,1,68,1,1,66),(69,4,1,1,1,1,69,1,1,22),(70,63,1,1,1,1,70,1,1,112),(71,35,1,1,1,1,71,1,1,134),(72,64,1,1,1,1,72,1,1,134),(73,65,1,1,1,1,73,1,1,112),(74,66,1,1,1,1,74,1,1,22),(75,67,1,1,1,1,75,1,1,134),(76,68,1,1,1,1,76,1,1,50),(77,69,1,1,1,1,77,1,1,90),(78,70,1,1,1,1,78,1,1,90),(79,71,1,1,1,1,79,1,1,90),(80,72,1,1,1,1,80,1,1,55),(81,35,1,1,1,1,81,1,1,112),(82,32,1,1,1,1,82,1,1,134),(83,73,1,1,1,1,83,1,1,112),(84,74,1,1,1,1,84,1,1,90),(85,75,1,1,1,1,85,1,1,112),(86,76,1,1,1,1,86,1,1,22),(87,77,1,1,1,1,87,1,1,90),(88,78,1,1,1,1,88,1,1,90),(89,79,1,1,1,1,89,1,1,112),(90,80,1,1,1,1,90,1,1,112),(91,81,1,1,1,1,91,1,1,44),(92,82,1,1,1,1,92,1,1,134),(93,32,1,1,1,1,93,1,1,134),(94,83,1,1,1,1,94,1,1,55),(95,84,1,1,1,1,95,1,1,90),(96,3,1,1,1,1,96,1,1,112),(97,85,1,1,1,1,97,1,1,44),(98,42,1,1,1,1,98,1,1,66),(99,7,1,1,1,1,99,1,1,90),(100,86,1,1,1,1,100,1,1,66);
/*!40000 ALTER TABLE `tb_payments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-27 22:34:21

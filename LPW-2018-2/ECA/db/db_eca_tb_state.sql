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
-- Table structure for table `tb_state`
--

DROP TABLE IF EXISTS `tb_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_state` (
  `id_state` int(11) NOT NULL AUTO_INCREMENT,
  `str_uf` varchar(2) NOT NULL,
  `str_name` varchar(19) DEFAULT NULL,
  `tb_region_id_region` int(11) NOT NULL,
  PRIMARY KEY (`id_state`),
  UNIQUE KEY `str_uf_UNIQUE` (`str_uf`),
  UNIQUE KEY `str_name_UNIQUE` (`str_name`),
  KEY `fk_tb_state_tb_region1_idx` (`tb_region_id_region`),
  CONSTRAINT `fk_tb_state_tb_region1` FOREIGN KEY (`tb_region_id_region`) REFERENCES `tb_region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_state`
--

LOCK TABLES `tb_state` WRITE;
/*!40000 ALTER TABLE `tb_state` DISABLE KEYS */;
INSERT INTO `tb_state` VALUES (1,'AC','ACRE',1),(2,'AP','AMAPÁ',1),(3,'AM','AMAZONAS',1),(4,'RO','RONDÔNIA',1),(5,'RR','RORAIMA',1),(6,'TO','TOCANTIS',1),(7,'AL','ALAGOAS',2),(8,'BA','BAHIA',2),(9,'CE','CEARÁ',2),(10,'MA','MARANHÃO',2),(11,'PB','PARAÍBA',2),(12,'PA','PARÁ',2),(13,'PE','PERNAMBUCO',2),(14,'PI','PIAUÍ',2),(15,'RN','RIO GRANDE DO NORTE',2),(16,'SE','SERGIPE',2),(17,'ES','ESPÍRITO SANTO',3),(18,'MG','MINAS GERAIS',3),(19,'RJ','RIO DE JANEIRO',3),(20,'SP','SÃO PAULO',3),(21,'PR','PARANÁ',4),(22,'RS','RIO GRANDE DO SUL',4),(23,'SC','SANTA CATARINA',4),(24,'DF','DISTRITO FEDERAL',5),(25,'GO','GOIÁS',5),(26,'MT','MATO GROSSO',5),(27,'MS','MATO GROSSO DO SUL',5);
/*!40000 ALTER TABLE `tb_state` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-27 22:34:22

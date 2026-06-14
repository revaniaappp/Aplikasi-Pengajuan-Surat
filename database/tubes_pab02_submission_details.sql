-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: tubes_pab02
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `submission_details`
--

DROP TABLE IF EXISTS `submission_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submission_details` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `submission_id` int unsigned NOT NULL,
  `field_key` varchar(50) NOT NULL,
  `field_value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_submission` (`submission_id`),
  CONSTRAINT `fk_detail_submission` FOREIGN KEY (`submission_id`) REFERENCES `letter_submissions` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submission_details`
--

LOCK TABLES `submission_details` WRITE;
/*!40000 ALTER TABLE `submission_details` DISABLE KEYS */;
INSERT INTO `submission_details` VALUES (1,1,'keperluan','Pembaruan data BPJS'),(2,2,'nama_mk','Perancangan Basis Data'),(3,2,'nama_perusahaan','PT Daya Adicipta Motora'),(4,2,'anggota_1_nama','Annabelle Callista Zayne'),(5,2,'anggota_1_nrp','2573006'),(6,2,'anggota_2_nama','Miracle Mahanaim M'),(7,2,'anggota_2_nrp','2573002'),(8,2,'anggota_3_nama','Moses Jelani'),(9,2,'anggota_3_nrp','2573038'),(10,4,'keperluan','Beasiswa KIP'),(11,10,'tanggal_lulus','2026-06-06'),(12,11,'tanggal_lulus','2026-07-11'),(13,12,'keperluan','dtghdghdghdghgh');
/*!40000 ALTER TABLE `submission_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-10 22:11:33

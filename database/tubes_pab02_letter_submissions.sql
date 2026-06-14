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
-- Table structure for table `letter_submissions`
--

DROP TABLE IF EXISTS `letter_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `letter_submissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `submission_number` varchar(30) NOT NULL,
  `student_id` int unsigned NOT NULL,
  `prodi_id` int unsigned NOT NULL,
  `letter_type_id` int unsigned NOT NULL,
  `status` enum('pending','approved','rejected','available') NOT NULL DEFAULT 'pending',
  `rejection_reason` text,
  `reviewed_by` int unsigned DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `submission_number_UNIQUE` (`submission_number`),
  KEY `fk_submission_student` (`student_id`),
  KEY `fk_submission_prodi` (`prodi_id`),
  KEY `fk_submission_letter_type` (`letter_type_id`),
  KEY `fk_submission_reviewed_by` (`reviewed_by`),
  CONSTRAINT `fk_submission_letter_type` FOREIGN KEY (`letter_type_id`) REFERENCES `letter_types` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_submission_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `program_studi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_submission_reviewed_by` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_submission_student` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `letter_submissions`
--

LOCK TABLES `letter_submissions` WRITE;
/*!40000 ALTER TABLE `letter_submissions` DISABLE KEYS */;
INSERT INTO `letter_submissions` VALUES (1,'SUBM/2026/001',6,1,1,'pending',NULL,NULL,NULL,'2026-06-07 14:35:51','2026-06-07 14:35:51'),(2,'SUBM/2026/002',7,1,2,'available',NULL,2,'2026-05-26 03:00:00','2026-06-07 14:35:51','2026-06-07 14:35:51'),(3,'SUBM/2026/003',6,1,3,'approved',NULL,2,'2026-05-15 02:00:00','2026-06-07 14:35:51','2026-06-07 14:35:51'),(4,'SUBM/2026/004',8,1,1,'rejected',NULL,2,'2026-05-03 01:00:00','2026-06-07 14:35:51','2026-06-07 14:35:51'),(5,'SUBM/2026/005',6,1,1,'pending',NULL,NULL,NULL,'2026-06-09 07:19:30','2026-06-09 07:19:30'),(6,'SUBM/2026/006',6,1,1,'pending',NULL,NULL,NULL,'2026-06-09 07:19:59','2026-06-09 07:19:59'),(7,'SUBM/2026/007',6,1,1,'pending',NULL,NULL,NULL,'2026-06-09 07:21:22','2026-06-09 07:21:22'),(8,'SUBM/2026/008',6,1,1,'pending',NULL,NULL,NULL,'2026-06-09 07:22:21','2026-06-09 07:22:21'),(9,'SUBM/2026/009',6,1,3,'pending',NULL,NULL,NULL,'2026-06-09 07:25:34','2026-06-09 07:25:34'),(10,'SUBM/2026/010',9,1,3,'pending',NULL,NULL,NULL,'2026-06-09 07:35:17','2026-06-09 07:35:17'),(11,'SUBM/2026/011',6,1,3,'pending',NULL,NULL,NULL,'2026-06-09 07:41:11','2026-06-09 07:41:11'),(12,'SUBM/2026/012',9,1,1,'pending',NULL,NULL,NULL,'2026-06-09 07:41:48','2026-06-09 07:41:48');
/*!40000 ALTER TABLE `letter_submissions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-10 22:11:32

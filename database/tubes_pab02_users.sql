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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mahasiswa','kaprodi','manager','tata_usaha','admin') NOT NULL,
  `nim_nik` varchar(20) DEFAULT NULL,
  `prodi_id` int unsigned DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_prodi` (`prodi_id`),
  CONSTRAINT `fk_users_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `program_studi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin Sistem','admin@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','admin','100001',NULL,NULL,'2026-06-07 14:35:51','2026-06-09 13:46:15'),(2,'Sendy Ferdian Sujadi','kaprodi.si@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','kaprodi','730062',NULL,NULL,'2026-06-07 14:35:51','2026-06-09 14:20:38'),(3,'Budi Santoso','kaprodi.ti@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','kaprodi','730063',NULL,NULL,'2026-06-07 14:35:51','2026-06-09 14:20:38'),(4,'Rina Marlina','manager.si@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','manager','730064',NULL,NULL,'2026-06-07 14:35:51','2026-06-09 14:20:38'),(5,'Dewi Kusuma','tu.si@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','tata_usaha','730065',NULL,NULL,'2026-06-07 14:35:51','2026-06-09 14:20:38'),(6,'Ellena','ellena@student.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','mahasiswa','2273022',1,NULL,'2026-06-07 14:35:51','2026-06-09 14:20:38'),(7,'Annabelle Callista','annabelle@student.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','mahasiswa','2573006',1,NULL,'2026-06-07 14:35:51','2026-06-09 14:20:38'),(8,'Miracle Mahanaim','miracle@student.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','mahasiswa','2573002',1,NULL,'2026-06-07 14:35:51','2026-06-09 14:20:38'),(9,'Moses Jelani','moses@student.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','mahasiswa','2573038',1,NULL,'2026-06-07 14:35:51','2026-06-09 14:20:38');
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

-- Dump completed on 2026-06-10 22:11:34

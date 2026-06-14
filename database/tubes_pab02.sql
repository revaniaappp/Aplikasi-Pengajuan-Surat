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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `letter_files`
--

DROP TABLE IF EXISTS `letter_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `letter_files` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `submission_id` int unsigned NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `uploaded_by` int unsigned NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_file_submission` (`submission_id`),
  KEY `fk_file_uploaded_by` (`uploaded_by`),
  CONSTRAINT `fk_file_submission` FOREIGN KEY (`submission_id`) REFERENCES `letter_submissions` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_file_uploaded_by` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `letter_files`
--

LOCK TABLES `letter_files` WRITE;
/*!40000 ALTER TABLE `letter_files` DISABLE KEYS */;
INSERT INTO `letter_files` VALUES (1,2,'letters/SUBM-2026-002.pdf','Surat_Pengantar_MK_Annabelle.pdf',4,'2026-05-27 01:00:00');
/*!40000 ALTER TABLE `letter_files` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `letter_types`
--

DROP TABLE IF EXISTS `letter_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `letter_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `letter_types`
--

LOCK TABLES `letter_types` WRITE;
/*!40000 ALTER TABLE `letter_types` DISABLE KEYS */;
INSERT INTO `letter_types` VALUES (1,'AKTIF','Surat Keterangan Mahasiswa Aktif','Surat keterangan bahwa mahasiswa masih aktif berkuliah','2026-06-07 14:35:51','2026-06-07 14:35:51'),(2,'PENGANTAR_MK','Surat Pengantar Tugas Mata Kuliah','Surat pengantar ke perusahaan untuk keperluan tugas MK','2026-06-07 14:35:51','2026-06-07 14:35:51'),(3,'LULUS','Surat Keterangan Lulus','Surat keterangan bahwa mahasiswa telah dinyatakan lulus','2026-06-07 14:35:51','2026-06-07 14:35:51');
/*!40000 ALTER TABLE `letter_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000001_create_cache_table',1),(2,'0001_01_01_000002_create_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_studi`
--

DROP TABLE IF EXISTS `program_studi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program_studi` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_studi`
--

LOCK TABLES `program_studi` WRITE;
/*!40000 ALTER TABLE `program_studi` DISABLE KEYS */;
INSERT INTO `program_studi` VALUES (1,'SI','Sistem Informasi','2026-06-07 14:35:51','2026-06-07 14:35:51'),(2,'TI','Teknik Informatika','2026-06-07 14:35:51','2026-06-07 14:35:51');
/*!40000 ALTER TABLE `program_studi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('B6JENJZwbmocxuoij6bBi51Jfmy8uX0OTC7jnLvt',9,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiajFlbXliQVdoQXhURXFpOXU5YmxKUXdLYnJBT1JEMlBpbXhiUFpCYyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbWFoYXNpc3dhL3N1Ym1pc3Npb25zIjtzOjU6InJvdXRlIjtzOjI3OiJtYWhhc2lzd2Euc3VibWlzc2lvbnMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O30=',1781016109),('B7BSwsP0zcTMv6p2uCfRCw6P0U5rYMUp8j5ahWHg',6,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiemJCeGNvM3hzVEp2cUhXTU5HYnU4VXNlaG5qNG9oQXVmVWxtN3pDZyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbWFoYXNpc3dhL3N1Ym1pc3Npb25zIjtzOjU6InJvdXRlIjtzOjI3OiJtYWhhc2lzd2Euc3VibWlzc2lvbnMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=',1781017759),('d8q9ZMM3Ubrp94DObvBfUnGUqNRkGCL1a4Bksq44',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiV3NxZ0lYeU9jT3NTSnp3cmlSTlpIanBQbnZwbWtucEM3WDdmSW1HZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1781012220),('PkgZtBouXVmo1et7X8BNujNCdVS905bhGdW8buvU',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVGU2YTgxM2lSZE5MSjVmWmFOTkJUaWFWMzVOZHhDQVM5NVlXUEVkRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1781017962),('yJaGpoDNQPBRyJveroRjlYEeIP2ckc9d4DnTLo0p',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnlOWHdGWG1zcmZjS2Jsc1VXd0dXREh0YU84YUdxclhXVnJDRVVUaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==',1781013584);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_placements`
--

DROP TABLE IF EXISTS `staff_placements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_placements` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `prodi_id` int unsigned NOT NULL,
  `position_type` enum('kaprodi','manager','tata_usaha') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_staff_user` (`user_id`),
  KEY `fk_staff_prodi` (`prodi_id`),
  CONSTRAINT `fk_staff_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `program_studi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_staff_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_placements`
--

LOCK TABLES `staff_placements` WRITE;
/*!40000 ALTER TABLE `staff_placements` DISABLE KEYS */;
INSERT INTO `staff_placements` VALUES (1,2,1,'kaprodi','2024-01-01',NULL,'2026-06-07 14:35:51','2026-06-07 14:35:51'),(2,3,2,'kaprodi','2024-01-01',NULL,'2026-06-07 14:35:51','2026-06-07 14:35:51'),(3,4,1,'manager','2024-01-01',NULL,'2026-06-07 14:35:51','2026-06-07 14:35:51'),(4,5,1,'tata_usaha','2024-01-01',NULL,'2026-06-07 14:35:51','2026-06-07 14:35:51');
/*!40000 ALTER TABLE `staff_placements` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Dumping events for database 'tubes_pab02'
--

--
-- Dumping routines for database 'tubes_pab02'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-14 18:19:32

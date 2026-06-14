-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: tubes
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
  `file_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `uploaded_by` int unsigned NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_file_submission` (`submission_id`),
  KEY `fk_file_uploaded_by` (`uploaded_by`),
  CONSTRAINT `fk_file_submission` FOREIGN KEY (`submission_id`) REFERENCES `letter_submissions` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_file_uploaded_by` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `letter_files`
--

LOCK TABLES `letter_files` WRITE;
/*!40000 ALTER TABLE `letter_files` DISABLE KEYS */;
INSERT INTO `letter_files` VALUES (1,2,'letters/SUBM-2026-002.pdf','Surat_Pengantar_MK_Annabelle.pdf',4,'2026-05-27 01:00:00'),(2,12,'letters/letters-SUBM-2026-012.pdf','Hasil kuesioner riset_Kelompok 1_2373028,2373034,2373036.pdf',4,'2026-06-11 07:13:18'),(3,24,'letters/surat_SUBM/2026/024.pdf','surat_SUBM-2026-024.pdf',4,'2026-06-12 01:20:46'),(4,26,'letters/surat_SUBM/2026/026.pdf','surat_SUBM-2026-026.pdf',5,'2026-06-12 04:05:12'),(5,28,'letters/surat_SUBM/2026/028.pdf','surat_SUBM-2026-028.pdf',10,'2026-06-12 04:13:07'),(6,30,'letters/surat_SUBM/2026/030.pdf','surat_SUBM-2026-030.pdf',10,'2026-06-12 04:19:19');
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
  `submission_number` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `student_id` int unsigned NOT NULL,
  `prodi_id` int unsigned NOT NULL,
  `letter_type_id` int unsigned NOT NULL,
  `status` enum('pending','approved','rejected','available') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `rejection_reason` text COLLATE utf8mb4_general_ci,
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
  CONSTRAINT `fk_submission_letter_type` FOREIGN KEY (`letter_type_id`) REFERENCES `letter_types` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_submission_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `program_studi` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_submission_reviewed_by` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_submission_student` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `letter_submissions`
--

LOCK TABLES `letter_submissions` WRITE;
/*!40000 ALTER TABLE `letter_submissions` DISABLE KEYS */;
INSERT INTO `letter_submissions` VALUES (1,'SUBM/2026/001',6,1,1,'pending',NULL,NULL,NULL,'2026-06-07 14:35:51','2026-06-07 14:35:51'),(2,'SUBM/2026/002',7,1,2,'available',NULL,2,'2026-05-26 03:00:00','2026-06-07 14:35:51','2026-06-07 14:35:51'),(3,'SUBM/2026/003',6,1,3,'available',NULL,2,'2026-05-15 02:00:00','2026-06-07 14:35:51','2026-06-11 08:52:45'),(4,'SUBM/2026/004',8,2,1,'rejected',NULL,2,'2026-05-03 01:00:00','2026-06-07 14:35:51','2026-06-12 02:16:54'),(5,'SUBM/2026/005',6,1,1,'pending',NULL,NULL,NULL,'2026-06-09 07:19:30','2026-06-09 07:19:30'),(6,'SUBM/2026/006',6,1,1,'rejected','butut',2,'2026-06-10 10:53:52','2026-06-09 07:19:59','2026-06-10 10:53:52'),(7,'SUBM/2026/007',6,1,1,'pending',NULL,NULL,NULL,'2026-06-09 07:21:22','2026-06-09 07:21:22'),(8,'SUBM/2026/008',6,1,1,'pending',NULL,NULL,NULL,'2026-06-09 07:22:21','2026-06-09 07:22:21'),(9,'SUBM/2026/009',6,1,3,'pending',NULL,NULL,NULL,'2026-06-09 07:25:34','2026-06-09 07:25:34'),(10,'SUBM/2026/010',9,1,3,'available',NULL,2,'2026-06-10 10:54:00','2026-06-09 07:35:17','2026-06-11 08:51:16'),(11,'SUBM/2026/011',6,1,3,'pending',NULL,NULL,NULL,'2026-06-09 07:41:11','2026-06-09 07:41:11'),(12,'SUBM/2026/012',9,1,1,'available',NULL,2,'2026-06-10 10:46:36','2026-06-09 07:41:48','2026-06-11 07:13:18'),(13,'SUBM/2026/013',6,1,1,'rejected','gamau aja',2,'2026-06-10 10:50:49','2026-06-10 09:33:53','2026-06-10 10:50:49'),(14,'SUBM/2026/014',8,2,1,'pending',NULL,NULL,NULL,'2026-06-10 11:05:38','2026-06-10 11:05:38'),(15,'SUBM/2026/015',8,2,2,'rejected','gabust',3,'2026-06-10 11:13:45','2026-06-10 11:06:12','2026-06-10 11:13:45'),(16,'SUBM/2026/016',9,2,2,'pending',NULL,NULL,NULL,'2026-06-10 11:07:22','2026-06-10 11:07:22'),(17,'SUBM/2026/017',9,2,3,'rejected','blm lulus',3,'2026-06-10 11:08:51','2026-06-10 11:07:33','2026-06-10 11:08:51'),(18,'SUBM/2026/018',7,1,1,'available',NULL,2,'2026-06-11 09:10:28','2026-06-11 09:09:16','2026-06-11 09:47:17'),(19,'SUBM/2026/019',9,2,1,'available',NULL,3,'2026-06-11 09:13:17','2026-06-11 09:12:27','2026-06-11 09:13:43'),(20,'SUBM/2026/020',9,2,3,'available',NULL,3,'2026-06-11 09:18:34','2026-06-11 09:18:25','2026-06-11 09:46:54'),(21,'SUBM/2026/021',9,2,2,'available',NULL,3,'2026-06-11 09:33:57','2026-06-11 09:33:15','2026-06-11 09:34:13'),(22,'SUBM/2026/022',9,2,2,'available',NULL,3,'2026-06-11 09:35:37','2026-06-11 09:35:28','2026-06-11 09:38:46'),(23,'SUBM/2026/023',9,2,1,'available',NULL,3,'2026-06-11 09:44:49','2026-06-11 09:44:34','2026-06-11 09:44:57'),(24,'SUBM/2026/024',8,2,1,'available',NULL,3,'2026-06-12 01:19:59','2026-06-12 01:19:12','2026-06-12 01:20:46'),(25,'SUBM/2026/025',8,2,1,'rejected','gamau wle',3,'2026-06-12 01:42:02','2026-06-12 01:39:13','2026-06-12 01:42:02'),(26,'SUBM/2026/026',6,1,3,'available',NULL,2,'2026-06-12 04:04:46','2026-06-12 04:03:43','2026-06-12 04:05:12'),(27,'SUBM/2026/027',7,1,3,'approved',NULL,2,'2026-06-12 04:09:31','2026-06-12 04:08:27','2026-06-12 04:09:31'),(28,'SUBM/2026/028',8,2,3,'available',NULL,3,'2026-06-12 04:12:46','2026-06-12 04:11:16','2026-06-12 04:13:07'),(29,'SUBM/2026/029',9,2,1,'rejected','vhvjggvj',3,'2026-06-12 04:18:25','2026-06-12 04:18:02','2026-06-12 04:18:25'),(30,'SUBM/2026/030',9,2,3,'available',NULL,3,'2026-06-12 04:19:02','2026-06-12 04:18:46','2026-06-12 04:19:19');
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
  `code` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `kode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_general_ci,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('h1FI71pHicYcjB14dbwwSJpy863JLuVh2Bvn6EjL',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTFhhWHhMMVEwZmpFQlF4MldwbWRMa0kydjhWQW9GRDk2ckpQYzF2MiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9rYXByb2RpL2FwcHJvdmFscyI7czo1OiJyb3V0ZSI7czoyMzoia2Fwcm9kaS5hcHByb3ZhbHMuaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=',1781263142),('Is4zLayf9flhd3LpB32ApFwc8QEp2nldQFVJVSJd',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZkhPRW9ldFNOTUlpT012bjF3SUxMWEVrSmJrQ0NGcEVqanpVcXlRZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9',1781262590),('KBlh9zpV76eiGEbsRrLMVkwgCG8rNzYicDjDrKem',9,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidDZvNFlwQnR5enliQUMyTFpxcjljWG1Ia01ZdUlzem5MZmJ3WjAwSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYWhhc2lzd2Evc3VibWlzc2lvbnMiO3M6NToicm91dGUiO3M6Mjc6Im1haGFzaXN3YS5zdWJtaXNzaW9ucy5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==',1781263127),('TKz6oBTSpeBGINaoXM0zvYn9qUL3KFSN83yrVgYT',10,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ2ZZclRpYktOaWM4eng3UVJjNDhtNjFRM2E4cHRqVzNjT2dEbUhyQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5hZ2VyL2xldHRlcnMvMzAvcHJldmlldyI7czo1OiJyb3V0ZSI7czoyMzoibWFuYWdlci5sZXR0ZXJzLnByZXZpZXciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDt9',1781263162),('uhEzgPEMdLtRNfpj5s2DY3OhOEvaalgc3d1Bfkt8',8,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVjhSUXFCS1FCcjY1azJ0MzFiNFlGUHJJVGpqUHdaRzNhallxQXVpSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYWhhc2lzd2Evc3VibWlzc2lvbnMiO3M6NToicm91dGUiO3M6Mjc6Im1haGFzaXN3YS5zdWJtaXNzaW9ucy5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjg7fQ==',1781262676);
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
  `position_type` enum('kaprodi','manager','tata_usaha') COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_staff_user` (`user_id`),
  KEY `fk_staff_prodi` (`prodi_id`),
  CONSTRAINT `fk_staff_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `program_studi` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_staff_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `field_key` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `field_value` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_submission` (`submission_id`),
  CONSTRAINT `fk_detail_submission` FOREIGN KEY (`submission_id`) REFERENCES `letter_submissions` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submission_details`
--

LOCK TABLES `submission_details` WRITE;
/*!40000 ALTER TABLE `submission_details` DISABLE KEYS */;
INSERT INTO `submission_details` VALUES (1,1,'keperluan','Pembaruan data BPJS'),(2,2,'nama_mk','Perancangan Basis Data'),(3,2,'nama_perusahaan','PT Daya Adicipta Motora'),(4,2,'anggota_1_nama','Annabelle Callista Zayne'),(5,2,'anggota_1_nrp','2573006'),(6,2,'anggota_2_nama','Miracle Mahanaim M'),(7,2,'anggota_2_nrp','2573002'),(8,2,'anggota_3_nama','Moses Jelani'),(9,2,'anggota_3_nrp','2573038'),(10,4,'keperluan','Beasiswa KIP'),(11,10,'tanggal_lulus','2026-06-06'),(12,11,'tanggal_lulus','2026-07-11'),(13,12,'keperluan','dtghdghdghdghgh'),(14,13,'keperluan','hsbds'),(15,14,'keperluan','bpjs'),(16,15,'nama_mk','pab'),(17,15,'nama_perusahaan','toyota'),(18,15,'anggota_1','bswksbw | dw'),(19,15,'anggota_2','dnswbdn | dw dn'),(20,16,'nama_mk','oop'),(21,16,'nama_perusahaan','roketin'),(22,16,'anggota_1','dwedsdwd | 2373011'),(23,16,'anggota_2','dnbw | 2373012'),(24,17,'tanggal_lulus','2026-06-22'),(25,18,'keperluan','fdfssdfdssd'),(26,19,'keperluan','fhfh'),(27,20,'tanggal_lulus','2026-06-06'),(28,21,'nama_mk','sdfsdfsdf'),(29,21,'nama_perusahaan','aefsdf'),(30,21,'anggota_1','sdfsdf | 1223423'),(31,21,'anggota_2','sdfsdf111 | 23423534'),(32,21,'anggota_3','dbdf | 1243523'),(33,22,'nama_mk','sd'),(34,22,'nama_perusahaan','cds'),(35,22,'anggota_1','d | 12'),(36,22,'anggota_2','da | 34'),(37,22,'anggota_3','44 | 444'),(38,23,'keperluan','hj'),(39,24,'keperluan','bpjs'),(40,25,'keperluan','zzxzx'),(41,26,'tanggal_lulus','2026-06-20'),(42,27,'tanggal_lulus','2026-06-13'),(43,28,'tanggal_lulus','2026-07-04'),(44,29,'keperluan','fvhgbjhknj'),(45,30,'tanggal_lulus','2026-07-11');
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
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('mahasiswa','kaprodi','manager','tata_usaha','admin') COLLATE utf8mb4_general_ci NOT NULL,
  `nim_nik` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prodi_id` int unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_prodi` (`prodi_id`),
  CONSTRAINT `fk_users_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `program_studi` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin Sistem','admin@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','admin','100001',NULL,NULL,'2026-06-07 14:35:51','2026-06-09 13:46:15'),(2,'Sendy Ferdian Sujadi','kaprodi.si@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','kaprodi','730062',1,NULL,'2026-06-07 14:35:51','2026-06-10 17:31:16'),(3,'Budi Santoso','kaprodi.ti@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','kaprodi','730063',2,NULL,'2026-06-07 14:35:51','2026-06-10 17:31:33'),(4,'Rina Marlina','manager.si@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','manager','730064',1,NULL,'2026-06-07 14:35:51','2026-06-12 10:19:18'),(5,'Dewi Kusuma','tu.si@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','tata_usaha','730065',1,NULL,'2026-06-07 14:35:51','2026-06-12 10:13:13'),(6,'Ellena','ellena@student.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','mahasiswa','2273022',1,NULL,'2026-06-07 14:35:51','2026-06-09 14:20:38'),(7,'Annabelle Callista','annabelle@student.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','mahasiswa','2573006',1,NULL,'2026-06-07 14:35:51','2026-06-09 14:20:38'),(8,'Miracle Mahanaim','miracle@student.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','mahasiswa','2573002',2,NULL,'2026-06-07 14:35:51','2026-06-10 17:32:12'),(9,'Moses Jelani','moses@student.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','mahasiswa','2573038',2,NULL,'2026-06-07 14:35:51','2026-06-10 17:32:12'),(10,'TU IF','tu.if@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','tata_usaha','7200871',2,NULL,'2026-06-12 10:15:01','2026-06-12 10:15:40'),(11,'Manager IF','manager.if@maranatha.ac.id','$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa','manager','7200123',2,NULL,'2026-06-12 10:25:12','2026-06-12 10:25:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'tubes'
--

--
-- Dumping routines for database 'tubes'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-12 18:20:47

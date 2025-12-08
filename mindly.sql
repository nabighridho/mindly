-- MySQL dump 10.13  Distrib 8.0.44, for Linux (x86_64)
--
-- Host: localhost    Database: mindly
-- ------------------------------------------------------
-- Server version	8.0.44-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `activity_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `activity_logs_user_id_index` (`user_id`),
  KEY `activity_logs_activity_type_index` (`activity_type`),
  CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
INSERT INTO `activity_logs` VALUES (1,1,'login','Pengguna berhasil masuk.','127.0.0.1','2025-11-24 21:12:00'),(2,1,'mood_journey_create','Menambah catatan pada 2025-11-25 00:00:00','127.0.0.1','2025-11-24 21:12:12'),(3,1,'mood_journey_delete','Menghapus catatan pada ','127.0.0.1','2025-11-24 21:12:46'),(4,1,'mood_journey_delete','Menghapus catatan pada ','127.0.0.1','2025-11-24 21:12:50'),(5,1,'mood_journey_delete','Menghapus catatan pada ','127.0.0.1','2025-11-24 21:26:29'),(6,1,'mood_journey_delete','Menghapus catatan pada ','127.0.0.1','2025-11-24 21:30:33'),(7,1,'mood_journey_delete','Menghapus catatan pada ','127.0.0.1','2025-11-24 21:34:19'),(8,1,'mood_journey_delete','Menghapus catatan pada ','127.0.0.1','2025-11-24 21:53:15'),(9,1,'mood_journey_delete','Menghapus catatan pada ','127.0.0.1','2025-11-24 22:02:25'),(10,1,'mood_journey_delete','Menghapus catatan pada ','127.0.0.1','2025-11-24 22:02:29'),(11,1,'mood_journey_update','Memperbarui catatan pada 2025-11-25 00:00:00','127.0.0.1','2025-11-24 22:05:53'),(12,1,'mood_journey_delete','Menghapus catatan pada ','127.0.0.1','2025-11-24 22:06:00'),(13,1,'mood_journey_delete','Menghapus catatan pada 2025-11-25 00:00:00','127.0.0.1','2025-11-24 22:07:40'),(14,1,'mood_journey_create','Menambah catatan pada 2025-11-25 00:00:00','127.0.0.1','2025-11-24 22:07:58'),(15,1,'mood_journey_update','Memperbarui catatan pada 2025-11-25 00:00:00','127.0.0.1','2025-11-24 22:08:09'),(16,1,'mood_journey_delete','Menghapus catatan pada 2025-11-25 00:00:00','127.0.0.1','2025-11-24 22:08:12'),(17,1,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-24 22:23:57'),(18,1,'login','Pengguna berhasil masuk.','127.0.0.1','2025-11-24 22:24:53'),(19,1,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-24 22:27:16'),(20,3,'register','Pengguna baru mendaftar.','127.0.0.1','2025-11-24 22:27:35'),(21,3,'daily_mood','Check-in mood harian (2025-11-25 00:00:00).','127.0.0.1','2025-11-24 22:27:44'),(22,3,'daily_mood','Check-in mood harian (2025-11-25 00:00:00).','127.0.0.1','2025-11-24 22:28:07'),(23,3,'mood_journey_create','Menambah catatan pada 2025-11-25 00:00:00','127.0.0.1','2025-11-24 22:28:58'),(24,3,'mood_journey_update','Memperbarui catatan pada 2025-11-25 00:00:00','127.0.0.1','2025-11-24 22:29:22'),(25,3,'mood_journey_delete','Menghapus catatan pada 2025-11-25 00:00:00','127.0.0.1','2025-11-24 22:29:50'),(26,3,'self_check','Self-check dengan kategori Sedang','127.0.0.1','2025-11-24 22:30:06'),(27,3,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-24 22:31:50'),(28,1,'login','Pengguna berhasil masuk.','127.0.0.1','2025-11-24 22:32:03'),(29,NULL,'register','Pengguna baru mendaftar.','127.0.0.1','2025-11-26 07:47:42'),(30,NULL,'mood_journey_create','Menambah catatan pada 2025-11-26 00:00:00','127.0.0.1','2025-11-26 07:56:03'),(31,NULL,'mood_journey_update','Memperbarui catatan pada 2025-11-26 00:00:00','127.0.0.1','2025-11-26 07:56:06'),(32,NULL,'mood_journey_delete','Menghapus catatan pada 2025-11-26 00:00:00','127.0.0.1','2025-11-26 07:56:10'),(33,NULL,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-26 07:56:19'),(34,NULL,'register','Pengguna baru mendaftar.','127.0.0.1','2025-11-26 07:56:49'),(35,NULL,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-26 07:59:33'),(36,NULL,'register','Pengguna baru mendaftar.','127.0.0.1','2025-11-26 07:59:58'),(37,NULL,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-26 08:03:15'),(38,NULL,'register','Pengguna baru mendaftar.','127.0.0.1','2025-11-26 08:03:34'),(39,NULL,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-26 08:06:15'),(40,NULL,'register','Pengguna baru mendaftar.','127.0.0.1','2025-11-26 08:06:45'),(41,NULL,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-26 08:07:07'),(42,NULL,'register','Pengguna baru mendaftar.','127.0.0.1','2025-11-26 08:07:33'),(43,NULL,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-26 08:07:54'),(44,1,'login','Pengguna berhasil masuk.','127.0.0.1','2025-11-26 08:08:17'),(45,1,'mood_journey_create','Menambah catatan pada 2025-11-26 00:00:00','127.0.0.1','2025-11-26 08:09:18'),(46,1,'mood_journey_update','Memperbarui catatan pada 2025-11-26 00:00:00','127.0.0.1','2025-11-26 08:09:21'),(47,1,'mood_journey_delete','Menghapus catatan pada 2025-11-26 00:00:00','127.0.0.1','2025-11-26 08:09:23'),(48,1,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-26 08:09:27'),(49,3,'login','Pengguna berhasil masuk.','127.0.0.1','2025-11-26 08:12:44'),(50,3,'self_check','Self-check dengan kategori Sedang','127.0.0.1','2025-11-26 08:13:02'),(51,3,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-26 08:13:31'),(52,1,'login','Pengguna berhasil masuk.','127.0.0.1','2025-11-30 02:05:41'),(53,1,'self_check','Self-check dengan kategori Sedang','127.0.0.1','2025-11-30 02:06:31'),(54,1,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-30 02:08:32'),(55,3,'login','Pengguna berhasil masuk.','127.0.0.1','2025-11-30 02:08:55'),(56,3,'logout','Pengguna keluar dari sesi.','127.0.0.1','2025-11-30 02:09:06'),(57,3,'login','Pengguna berhasil masuk.','127.0.0.1','2025-11-30 02:09:35');
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`key`)
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
  PRIMARY KEY (`key`)
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
-- Table structure for table `daily_moods`
--

DROP TABLE IF EXISTS `daily_moods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daily_moods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `mood_level` tinyint NOT NULL COMMENT '1-5',
  `trigger_tag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `daily_moods_user_date_unique` (`user_id`,`log_date`),
  KEY `daily_moods_user_date_index` (`user_id`,`log_date`),
  CONSTRAINT `daily_moods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_moods`
--

LOCK TABLES `daily_moods` WRITE;
/*!40000 ALTER TABLE `daily_moods` DISABLE KEYS */;
INSERT INTO `daily_moods` VALUES (1,3,3,'Keluarga','2025-11-25','2025-11-24 22:27:44','2025-11-24 22:28:07');
/*!40000 ALTER TABLE `daily_moods` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_01_01_100000_create_daily_moods_table',1),(5,'2024_01_01_100100_create_mood_journals_table',1),(6,'2024_01_01_100200_create_selfcheck_results_table',1),(7,'2024_01_01_100300_create_activity_logs_table',1),(8,'2025_01_01_110000_create_selfcheck_questions_table',1),(9,'2025_01_02_120000_create_selfcheck_answers_table',1),(10,'2025_01_05_120000_rename_mood_journals_table',1),(11,'2025_01_05_130000_mark_existing_users_verified',2),(12,'2025_01_06_000000_drop_user_preferences_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mood_journeys`
--

DROP TABLE IF EXISTS `mood_journeys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mood_journeys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `daily_mood_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `journal_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mood_journals_user_id_index` (`user_id`),
  KEY `mood_journals_journal_date_index` (`journal_date`),
  KEY `mood_journals_daily_mood_id_index` (`daily_mood_id`),
  CONSTRAINT `mood_journals_daily_mood_id_foreign` FOREIGN KEY (`daily_mood_id`) REFERENCES `daily_moods` (`id`) ON DELETE SET NULL,
  CONSTRAINT `mood_journals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mood_journeys`
--

LOCK TABLES `mood_journeys` WRITE;
/*!40000 ALTER TABLE `mood_journeys` DISABLE KEYS */;
INSERT INTO `mood_journeys` VALUES (1,1,NULL,'cok','asuuuuuuuuuuuuuuuuu','2025-11-25','2025-11-24 21:12:12','2025-11-24 22:07:40','2025-11-24 22:07:40'),(2,1,NULL,'paul kontol','oeeeeeeeeeeee','2025-11-25','2025-11-24 22:07:58','2025-11-24 22:08:12','2025-11-24 22:08:12'),(3,3,1,'bla bla bla','bla bla bla','2025-11-25','2025-11-24 22:28:58','2025-11-24 22:29:50','2025-11-24 22:29:50'),(5,1,NULL,'jbfljweebfljweljfb','wehkbfkhsfjlbsljfbljsdbfbskdbf','2025-11-26','2025-11-26 08:09:18','2025-11-26 08:09:23','2025-11-26 08:09:23');
/*!40000 ALTER TABLE `mood_journeys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selfcheck_answers`
--

DROP TABLE IF EXISTS `selfcheck_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `selfcheck_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `selfcheck_result_id` bigint unsigned NOT NULL,
  `selfcheck_question_id` bigint unsigned DEFAULT NULL,
  `position` tinyint unsigned NOT NULL,
  `answer` tinyint unsigned NOT NULL,
  `question_text_snapshot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selfcheck_answers_selfcheck_question_id_foreign` (`selfcheck_question_id`),
  KEY `selfcheck_answers_selfcheck_result_id_position_index` (`selfcheck_result_id`,`position`),
  CONSTRAINT `selfcheck_answers_selfcheck_question_id_foreign` FOREIGN KEY (`selfcheck_question_id`) REFERENCES `selfcheck_questions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `selfcheck_answers_selfcheck_result_id_foreign` FOREIGN KEY (`selfcheck_result_id`) REFERENCES `selfcheck_results` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selfcheck_answers`
--

LOCK TABLES `selfcheck_answers` WRITE;
/*!40000 ALTER TABLE `selfcheck_answers` DISABLE KEYS */;
INSERT INTO `selfcheck_answers` VALUES (1,1,1,1,4,'Saya merasa sulit untuk rileks hari ini.','2025-11-24 22:30:06','2025-11-24 22:30:06'),(2,1,2,2,4,'Saya mengalami perasaan cemas tanpa alasan jelas.','2025-11-24 22:30:06','2025-11-24 22:30:06'),(3,1,3,3,4,'Saya merasa mudah tersinggung atau gelisah.','2025-11-24 22:30:06','2025-11-24 22:30:06'),(4,1,4,4,4,'Saya sulit tidur atau mempertahankan kualitas tidur.','2025-11-24 22:30:06','2025-11-24 22:30:06'),(5,1,5,5,4,'Saya merasa sedih atau hampa untuk sebagian besar hari.','2025-11-24 22:30:06','2025-11-24 22:30:06'),(6,1,6,6,4,'Saya kehilangan minat pada aktivitas yang biasanya saya nikmati.','2025-11-24 22:30:06','2025-11-24 22:30:06'),(7,1,7,7,4,'Saya merasa sangat lelah meski tidak banyak beraktivitas.','2025-11-24 22:30:06','2025-11-24 22:30:06'),(8,1,8,8,4,'Saya merasa pikiran saya sulit berhenti dan terus berputar.','2025-11-24 22:30:06','2025-11-24 22:30:06'),(9,1,9,9,4,'Saya kesulitan berkonsentrasi pada tugas sehari-hari.','2025-11-24 22:30:06','2025-11-24 22:30:06'),(10,1,10,10,4,'Saya merasa lebih baik jika menarik diri dari orang lain.','2025-11-24 22:30:06','2025-11-24 22:30:06'),(11,2,1,1,4,'Saya merasa sulit untuk rileks hari ini.','2025-11-26 08:13:02','2025-11-26 08:13:02'),(12,2,2,2,4,'Saya mengalami perasaan cemas tanpa alasan jelas.','2025-11-26 08:13:02','2025-11-26 08:13:02'),(13,2,3,3,4,'Saya merasa mudah tersinggung atau gelisah.','2025-11-26 08:13:02','2025-11-26 08:13:02'),(14,2,4,4,4,'Saya sulit tidur atau mempertahankan kualitas tidur.','2025-11-26 08:13:02','2025-11-26 08:13:02'),(15,2,5,5,4,'Saya merasa sedih atau hampa untuk sebagian besar hari.','2025-11-26 08:13:02','2025-11-26 08:13:02'),(16,2,6,6,4,'Saya kehilangan minat pada aktivitas yang biasanya saya nikmati.','2025-11-26 08:13:02','2025-11-26 08:13:02'),(17,2,7,7,4,'Saya merasa sangat lelah meski tidak banyak beraktivitas.','2025-11-26 08:13:02','2025-11-26 08:13:02'),(18,2,8,8,4,'Saya merasa pikiran saya sulit berhenti dan terus berputar.','2025-11-26 08:13:02','2025-11-26 08:13:02'),(19,2,9,9,4,'Saya kesulitan berkonsentrasi pada tugas sehari-hari.','2025-11-26 08:13:02','2025-11-26 08:13:02'),(20,2,10,10,4,'Saya merasa lebih baik jika menarik diri dari orang lain.','2025-11-26 08:13:02','2025-11-26 08:13:02'),(21,3,1,1,4,'Saya merasa sulit untuk rileks hari ini.','2025-11-30 02:06:31','2025-11-30 02:06:31'),(22,3,2,2,4,'Saya mengalami perasaan cemas tanpa alasan jelas.','2025-11-30 02:06:31','2025-11-30 02:06:31'),(23,3,3,3,4,'Saya merasa mudah tersinggung atau gelisah.','2025-11-30 02:06:31','2025-11-30 02:06:31'),(24,3,4,4,4,'Saya sulit tidur atau mempertahankan kualitas tidur.','2025-11-30 02:06:31','2025-11-30 02:06:31'),(25,3,5,5,4,'Saya merasa sedih atau hampa untuk sebagian besar hari.','2025-11-30 02:06:31','2025-11-30 02:06:31'),(26,3,6,6,4,'Saya kehilangan minat pada aktivitas yang biasanya saya nikmati.','2025-11-30 02:06:31','2025-11-30 02:06:31'),(27,3,7,7,4,'Saya merasa sangat lelah meski tidak banyak beraktivitas.','2025-11-30 02:06:31','2025-11-30 02:06:31'),(28,3,8,8,4,'Saya merasa pikiran saya sulit berhenti dan terus berputar.','2025-11-30 02:06:31','2025-11-30 02:06:31'),(29,3,9,9,4,'Saya kesulitan berkonsentrasi pada tugas sehari-hari.','2025-11-30 02:06:31','2025-11-30 02:06:31'),(30,3,10,10,4,'Saya merasa lebih baik jika menarik diri dari orang lain.','2025-11-30 02:06:31','2025-11-30 02:06:31');
/*!40000 ALTER TABLE `selfcheck_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selfcheck_questions`
--

DROP TABLE IF EXISTS `selfcheck_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `selfcheck_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` tinyint unsigned NOT NULL DEFAULT '0',
  `version` int unsigned NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selfcheck_questions_is_active_sort_order_index` (`is_active`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selfcheck_questions`
--

LOCK TABLES `selfcheck_questions` WRITE;
/*!40000 ALTER TABLE `selfcheck_questions` DISABLE KEYS */;
INSERT INTO `selfcheck_questions` VALUES (1,'Saya merasa sulit untuk rileks hari ini.',1,1,1,'2025-11-24 21:11:24','2025-11-24 21:11:24'),(2,'Saya mengalami perasaan cemas tanpa alasan jelas.',2,1,1,'2025-11-24 21:11:24','2025-11-24 21:11:24'),(3,'Saya merasa mudah tersinggung atau gelisah.',3,1,1,'2025-11-24 21:11:24','2025-11-24 21:11:24'),(4,'Saya sulit tidur atau mempertahankan kualitas tidur.',4,1,1,'2025-11-24 21:11:24','2025-11-24 21:11:24'),(5,'Saya merasa sedih atau hampa untuk sebagian besar hari.',5,1,1,'2025-11-24 21:11:24','2025-11-24 21:11:24'),(6,'Saya kehilangan minat pada aktivitas yang biasanya saya nikmati.',6,1,1,'2025-11-24 21:11:24','2025-11-24 21:11:24'),(7,'Saya merasa sangat lelah meski tidak banyak beraktivitas.',7,1,1,'2025-11-24 21:11:24','2025-11-24 21:11:24'),(8,'Saya merasa pikiran saya sulit berhenti dan terus berputar.',8,1,1,'2025-11-24 21:11:24','2025-11-24 21:11:24'),(9,'Saya kesulitan berkonsentrasi pada tugas sehari-hari.',9,1,1,'2025-11-24 21:11:24','2025-11-24 21:11:24'),(10,'Saya merasa lebih baik jika menarik diri dari orang lain.',10,3,1,'2025-11-24 21:11:24','2025-11-24 22:26:58');
/*!40000 ALTER TABLE `selfcheck_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selfcheck_results`
--

DROP TABLE IF EXISTS `selfcheck_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `selfcheck_results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `score` smallint NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommendation_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `raw_answers` json DEFAULT NULL,
  `question_version` int unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selfcheck_results_user_id_index` (`user_id`),
  KEY `selfcheck_results_test_date_index` (`test_date`),
  KEY `selfcheck_results_category_index` (`category`),
  CONSTRAINT `selfcheck_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selfcheck_results`
--

LOCK TABLES `selfcheck_results` WRITE;
/*!40000 ALTER TABLE `selfcheck_results` DISABLE KEYS */;
INSERT INTO `selfcheck_results` VALUES (1,3,40,'Sedang','Pertimbangkan untuk berkonsultasi dengan profesional. Tetapkan jadwal check-in mood harian dan gunakan jurnal untuk memetakan pemicu spesifik.','2025-11-24 22:30:06','[\"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\"]',3,'2025-11-24 22:30:06','2025-11-24 22:30:06',NULL),(2,3,40,'Sedang','Pertimbangkan untuk berkonsultasi dengan profesional. Tetapkan jadwal check-in mood harian dan gunakan jurnal untuk memetakan pemicu spesifik.','2025-11-26 08:13:02','[\"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\"]',3,'2025-11-26 08:13:02','2025-11-26 08:13:02',NULL),(3,1,40,'Sedang','Pertimbangkan untuk berkonsultasi dengan profesional. Tetapkan jadwal check-in mood harian dan gunakan jurnal untuk memetakan pemicu spesifik.','2025-11-30 02:06:31','[\"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\", \"4\"]',3,'2025-11-30 02:06:31','2025-11-30 02:06:31',NULL);
/*!40000 ALTER TABLE `selfcheck_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('RbSDWaSJpxpKkgAkF7BW5QE5yYiGmAa9wy4J87Lv',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZHVmQzJ0Q2s0SkhEVWg1SFhoSWZybWZMUmFaRVF5RHNNemY2QVU2WCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYWlseS1tb29kIjtzOjU6InJvdXRlIjtzOjE3OiJkYWlseS1tb29kLmNyZWF0ZSI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=',1764493799);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin@mindly.com','admin','2025-11-24 21:11:24','$2y$12$1wPxsWd1ps/guQrNrK7cC.wKvl6F0PllkxJi3nyNWSLvbWYPo09fa',NULL,'2025-11-24 21:11:24','2025-11-24 21:11:24'),(3,'Nabigh Nailur Ridho','nabighridho@gmail.com','user','2025-11-24 22:27:34','$2y$12$tJmlQN/DBDOynsS7a/Z1gefbaWXRYf9PD4Canjvl4tIf4CJgkFn4S',NULL,'2025-11-24 22:27:34','2025-11-24 22:27:34');
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

-- Dump completed on 2025-12-02 11:18:40

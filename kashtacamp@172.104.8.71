-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: 0.0.0.0    Database: laravel
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `internal_notification_user`
--

DROP TABLE IF EXISTS `internal_notification_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internal_notification_user` (
  `internal_notification_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `fk_p_91287_91282_user_int_5a13cf8707963` (`internal_notification_id`),
  KEY `fk_p_91282_91287_internal_5a13cf87079e8` (`user_id`),
  CONSTRAINT `fk_p_91282_91287_internal_5a13cf87079e8` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_p_91287_91282_user_int_5a13cf8707963` FOREIGN KEY (`internal_notification_id`) REFERENCES `internal_notifications` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internal_notification_user`
--

LOCK TABLES `internal_notification_user` WRITE;
/*!40000 ALTER TABLE `internal_notification_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `internal_notification_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internal_notifications`
--

DROP TABLE IF EXISTS `internal_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internal_notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internal_notifications`
--

LOCK TABLES `internal_notifications` WRITE;
/*!40000 ALTER TABLE `internal_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `internal_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
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
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) unsigned NOT NULL,
  `sender_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messenger_messages_topic_id_foreign` (`topic_id`),
  CONSTRAINT `messenger_messages_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `messenger_topics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_topics`
--

DROP TABLE IF EXISTS `messenger_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `sender_read_at` timestamp NULL DEFAULT NULL,
  `receiver_read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_topics`
--

LOCK TABLES `messenger_topics` WRITE;
/*!40000 ALTER TABLE `messenger_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2017_11_21_085551_create_1511247351_roles_table',1),(3,'2017_11_21_085554_create_1511247353_users_table',1),(4,'2017_11_21_085555_add_5a13cdfb861a3_relationships_to_user_table',1),(5,'2017_11_21_085753_create_1511247472_user_actions_table',1),(6,'2017_11_21_085754_add_5a13ce72c9901_relationships_to_useraction_table',1),(7,'2017_11_21_090208_create_messenger_topics_table',1),(8,'2017_11_21_090209_create_messenger_messages_table',1),(9,'2017_11_21_090228_create_1511247748_internal_notifications_table',1),(10,'2017_11_21_092233_create_1511248953_rooms_table',1),(11,'2017_11_21_092354_create_1511249034_customers_table',1),(12,'2017_11_21_103405_create_1511253244_reservations_table',1),(13,'2017_11_21_103406_add_5a13e4ff80f8a_relationships_to_reservation_table',1),(14,'2017_11_21_104546_add_5a13e7ba36a96_relationships_to_reservation_table',1),(15,'2017_11_21_104736_add_5a13e8289f703_relationships_to_reservation_table',1),(16,'2017_11_21_180733_create_5a13cf8707877_internal_notification_user_table',1),(17,'2017_11_23_172052_create_jobs_table',2),(18,'2017_11_23_172841_create_failed_jobs_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('gkaramgk94@gmail.com','$2y$10$fUvT27tIYGwITNIZAoqDteKi5nBBTvfA0BsCzzIqHJpRc/SDwXLfe','2017-11-23 21:25:50');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `paid` tinyint(4) DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `room_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservations_deleted_at_index` (`deleted_at`),
  KEY `91319_5a13e4fe21192` (`customer_id`),
  KEY `91319_5a13e4fe26fc2` (`room_id`),
  CONSTRAINT `91319_5a13e4fe21192` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `91319_5a13e4fe26fc2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator (can create other users)','2017-11-21 20:02:49','2017-11-21 20:02:49'),(2,'Simple user','2017-11-21 20:02:49','2017-11-21 20:02:49');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rooms_name_unique` (`name`),
  KEY `rooms_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (6,'1 : خيمه رقم','(5×8)','1','2017-11-22 18:23:32','2017-11-22 18:25:27',NULL),(7,'2 : خيمه رقم','(4×4)','1','2017-11-22 18:26:12','2017-11-22 18:26:12',NULL),(8,'3 : خيمه رقم','(5×8)','1','2017-11-22 18:26:51','2017-11-22 18:26:51',NULL),(9,'4 : خيمه رقم','(4×4)','1','2017-11-22 18:27:25','2017-11-22 18:27:25',NULL),(10,'5 : خيمه رقم','(5×8)','1','2017-11-22 18:28:02','2017-11-22 18:28:02',NULL),(12,'6 : خيمه رقم','(4×4)','1','2017-11-22 18:33:54','2017-11-22 18:33:54',NULL),(13,'7 : خيمه رقم','(5×8)','1','2017-11-22 18:34:28','2017-11-22 18:34:28',NULL),(14,'8 : خيمه رقم','(4x6)','1','2017-11-22 18:47:49','2017-11-22 18:47:49',NULL),(15,'9 : خيمه رقم','(5×8)','1','2017-11-22 18:49:09','2017-11-22 18:49:09',NULL),(16,'10 : خيمه رقم','(4x6)','1','2017-11-22 18:49:45','2017-11-22 18:49:45',NULL),(17,'11 : خيمه رقم','(5×8)','1','2017-11-22 18:54:07','2017-11-22 18:54:07',NULL),(18,'12 : خيمه رقم','(4x6)','1','2017-11-22 18:54:36','2017-11-22 18:54:36',NULL),(19,'13 : خيمه رقم','(5×8)','1','2017-11-22 18:55:03','2017-11-22 18:55:03',NULL),(20,'14 : خيمه رقم','(5×8)','1','2017-11-22 18:56:40','2017-11-22 18:56:40',NULL),(21,'15 : خيمه رقم','(5×8)','1','2017-11-22 18:57:53','2017-11-22 18:57:53',NULL),(22,'16 : خيمه رقم','(5×8)','1','2017-11-22 18:58:14','2017-11-22 18:58:14',NULL),(23,'17 : خيمه رقم','(5×8)','1','2017-11-22 18:58:38','2017-11-22 18:58:38',NULL),(24,'18 : خيمه رقم','(5×8)','1','2017-11-22 18:59:02','2017-11-22 18:59:02',NULL),(25,'19 : خيمه رقم','(5×8)','1','2017-11-22 18:59:29','2017-11-22 18:59:29',NULL),(26,'20 : خيمه رقم','(5×8)','1','2017-11-22 19:01:40','2017-11-22 19:01:40',NULL),(27,'21 : خيمه رقم','(5×8)','1','2017-11-22 19:02:13','2017-11-22 19:02:13',NULL),(28,'22 : خيمه رقم','(5×8)','1','2017-11-22 19:02:30','2017-11-22 19:02:30',NULL),(29,'23 : خيمه رقم','(5×8)','1','2017-11-22 19:03:00','2017-11-22 19:03:00',NULL),(30,'24 : خيمه رقم','(5×8)','1','2017-11-22 19:03:19','2017-11-22 19:03:19',NULL),(31,'25 : خيمه رقم','(5×8)','1','2017-11-22 19:03:38','2017-11-22 19:03:38',NULL),(32,'26 : خيمه رقم','(5×8)','1','2017-11-22 19:04:02','2017-11-22 19:04:02',NULL),(33,'27 : خيمه رقم','(5×8)','1','2017-11-22 19:04:46','2017-11-22 19:04:46',NULL),(34,'28 : خيمه رقم','(4x6)','1','2017-11-22 19:05:15','2017-11-22 19:05:15',NULL),(35,'29 : خيمه رقم','(5×8)','1','2017-11-22 19:05:38','2017-11-22 19:05:38',NULL),(36,'30 : خيمه رقم','(4x6)','1','2017-11-22 19:06:06','2017-11-22 19:06:06',NULL),(37,'31 : خيمه رقم','(5×8)','1','2017-11-22 19:06:48','2017-11-22 19:06:48',NULL),(38,'32 : خيمه رقم','(4x6)','1','2017-11-22 19:07:27','2017-11-22 19:07:27',NULL),(39,'33 : خيمه رقم','(5×8)','1','2017-11-22 19:07:49','2017-11-22 19:07:49',NULL),(40,'34 : خيمه رقم','(4×4)','1','2017-11-22 19:08:13','2017-11-22 19:08:13',NULL),(41,'35 : خيمه رقم','(5×8)','1','2017-11-22 19:09:09','2017-11-22 19:09:09',NULL),(42,'36 : خيمه رقم','(4×4)','1','2017-11-22 19:10:01','2017-11-22 19:10:01',NULL),(43,'37 : خيمه رقم','(5×8)','1','2017-11-22 19:12:17','2017-11-22 19:12:17',NULL),(44,'38 : خيمه رقم','(5×8)','1','2017-11-22 19:13:00','2017-11-22 19:13:00',NULL),(45,'39 : خيمه رقم','(5×8)','1','2017-11-22 19:13:35','2017-11-22 19:13:35',NULL),(46,'40 : خيمه رقم','(5×8)','1','2017-11-22 19:13:51','2017-11-22 19:13:51',NULL);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_actions`
--

DROP TABLE IF EXISTS `user_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `91286_5a13ce71a4b02` (`user_id`),
  CONSTRAINT `91286_5a13ce71a4b02` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_actions`
--

LOCK TABLES `user_actions` WRITE;
/*!40000 ALTER TABLE `user_actions` DISABLE KEYS */;
INSERT INTO `user_actions` VALUES (1,'created','customers',1,'2017-11-22 09:45:40','2017-11-22 09:45:40',1),(2,'created','customers',2,'2017-11-22 09:45:50','2017-11-22 09:45:50',1),(3,'created','customers',3,'2017-11-22 09:51:58','2017-11-22 09:51:58',1),(4,'created','customers',4,'2017-11-22 09:55:11','2017-11-22 09:55:11',1),(5,'created','users',2,'2017-11-22 17:46:37','2017-11-22 17:46:37',1),(6,'deleted','rooms',1,'2017-11-22 18:03:46','2017-11-22 18:03:46',1),(7,'deleted','rooms',2,'2017-11-22 18:03:47','2017-11-22 18:03:47',1),(8,'deleted','rooms',3,'2017-11-22 18:03:47','2017-11-22 18:03:47',1),(9,'deleted','reservations',2,'2017-11-22 18:04:08','2017-11-22 18:04:08',1),(10,'deleted','reservations',5,'2017-11-22 18:04:08','2017-11-22 18:04:08',1),(11,'deleted','reservations',6,'2017-11-22 18:04:08','2017-11-22 18:04:08',1),(12,'deleted','rooms',1,'2017-11-22 18:04:18','2017-11-22 18:04:18',1),(13,'deleted','rooms',2,'2017-11-22 18:04:28','2017-11-22 18:04:28',1),(14,'deleted','rooms',3,'2017-11-22 18:04:33','2017-11-22 18:04:33',1),(15,'deleted','customers',1,'2017-11-22 18:05:02','2017-11-22 18:05:02',1),(16,'deleted','customers',2,'2017-11-22 18:05:02','2017-11-22 18:05:02',1),(17,'deleted','customers',3,'2017-11-22 18:05:02','2017-11-22 18:05:02',1),(18,'deleted','customers',4,'2017-11-22 18:05:02','2017-11-22 18:05:02',1),(19,'deleted','customers',1,'2017-11-22 18:05:22','2017-11-22 18:05:22',1),(20,'deleted','customers',2,'2017-11-22 18:10:15','2017-11-22 18:10:15',1),(21,'deleted','customers',3,'2017-11-22 18:11:09','2017-11-22 18:11:09',1),(22,'deleted','customers',4,'2017-11-22 18:11:27','2017-11-22 18:11:27',1),(41,'deleted','reservations',7,'2017-11-22 20:35:33','2017-11-22 20:35:33',1),(42,'deleted','reservations',7,'2017-11-22 20:35:48','2017-11-22 20:35:48',1),(43,'deleted','reservations',7,'2017-11-22 20:35:57','2017-11-22 20:35:57',1),(44,'updated','users',1,'2017-11-22 20:42:52','2017-11-22 20:42:52',1),(45,'deleted','reservations',18,'2017-11-22 20:46:12','2017-11-22 20:46:12',1),(46,'deleted','reservations',7,'2017-11-22 20:46:19','2017-11-22 20:46:19',1),(47,'deleted','reservations',8,'2017-11-22 20:47:01','2017-11-22 20:47:01',1),(48,'deleted','reservations',9,'2017-11-22 20:47:06','2017-11-22 20:47:06',1),(49,'deleted','reservations',10,'2017-11-22 20:47:09','2017-11-22 20:47:09',1),(50,'deleted','reservations',11,'2017-11-22 20:47:12','2017-11-22 20:47:12',1),(51,'deleted','reservations',12,'2017-11-22 20:47:15','2017-11-22 20:47:15',1),(52,'deleted','reservations',13,'2017-11-22 20:47:17','2017-11-22 20:47:17',1),(53,'deleted','reservations',14,'2017-11-22 20:47:22','2017-11-22 20:47:22',1),(54,'deleted','reservations',15,'2017-11-22 20:47:25','2017-11-22 20:47:25',1),(55,'deleted','reservations',16,'2017-11-22 20:47:29','2017-11-22 20:47:29',1),(56,'deleted','reservations',17,'2017-11-22 20:47:32','2017-11-22 20:47:32',1),(57,'deleted','rooms',47,'2017-11-23 07:32:42','2017-11-23 07:32:42',1),(58,'deleted','rooms',47,'2017-11-23 07:32:57','2017-11-23 07:32:57',1),(59,'deleted','rooms',48,'2017-11-23 07:39:36','2017-11-23 07:39:36',1),(60,'deleted','rooms',49,'2017-11-23 07:39:36','2017-11-23 07:39:36',1),(61,'deleted','rooms',48,'2017-11-23 07:40:58','2017-11-23 07:40:58',1),(62,'deleted','rooms',49,'2017-11-23 07:41:10','2017-11-23 07:41:10',1),(63,'created','rooms',50,'2017-11-23 07:41:48','2017-11-23 07:41:48',1),(64,'created','rooms',51,'2017-11-23 07:45:03','2017-11-23 07:45:03',1),(65,'deleted','rooms',50,'2017-11-23 10:03:12','2017-11-23 10:03:12',1),(66,'deleted','rooms',51,'2017-11-23 10:03:13','2017-11-23 10:03:13',1),(67,'deleted','rooms',50,'2017-11-23 10:04:44','2017-11-23 10:04:44',1),(68,'deleted','rooms',51,'2017-11-23 10:04:56','2017-11-23 10:04:56',1),(69,'created','customers',6,'2017-11-23 15:37:57','2017-11-23 15:37:57',1),(70,'deleted','customers',6,'2017-11-23 15:38:04','2017-11-23 15:38:04',1),(71,'created','users',3,'2017-11-23 17:04:36','2017-11-23 17:04:36',1),(72,'updated','users',2,'2017-11-23 17:04:45','2017-11-23 17:04:45',1),(73,'created','users',4,'2017-11-23 17:12:35','2017-11-23 17:12:35',1),(74,'created','customers',7,'2017-11-23 18:13:31','2017-11-23 18:13:31',1),(75,'deleted','customers',7,'2017-11-23 18:13:40','2017-11-23 18:13:40',1),(76,'deleted','customers',7,'2017-11-23 18:14:23','2017-11-23 18:14:23',1),(77,'deleted','customers',7,'2017-11-23 18:15:04','2017-11-23 18:15:04',1),(78,'deleted','customers',7,'2017-11-23 18:15:35','2017-11-23 18:15:35',1),(79,'created','users',5,'2017-11-23 18:40:31','2017-11-23 18:40:31',1),(80,'updated','users',1,'2017-11-23 18:50:46','2017-11-23 18:50:46',1),(81,'created','customers',8,'2017-11-23 18:51:59','2017-11-23 18:51:59',5),(82,'updated','users',5,'2017-11-23 19:16:30','2017-11-23 19:16:30',5),(83,'deleted','customers',8,'2017-11-23 19:20:03','2017-11-23 19:20:03',5),(84,'deleted','customers',5,'2017-11-23 19:20:11','2017-11-23 19:20:11',5),(85,'created','customers',9,'2017-11-23 20:29:54','2017-11-23 20:29:54',5),(86,'deleted','reservations',41,'2017-11-23 20:34:15','2017-11-23 20:34:15',5),(87,'deleted','reservations',36,'2017-11-23 20:34:34','2017-11-23 20:34:34',5),(88,'deleted','reservations',37,'2017-11-23 20:34:57','2017-11-23 20:34:57',5),(89,'deleted','reservations',38,'2017-11-23 20:34:59','2017-11-23 20:34:59',5),(90,'deleted','reservations',39,'2017-11-23 20:35:00','2017-11-23 20:35:00',5),(91,'deleted','reservations',40,'2017-11-23 20:35:01','2017-11-23 20:35:01',5),(92,'deleted','reservations',42,'2017-11-23 20:39:48','2017-11-23 20:39:48',5),(93,'deleted','users',3,'2017-11-23 20:40:50','2017-11-23 20:40:50',5),(94,'deleted','users',2,'2017-11-23 20:41:11','2017-11-23 20:41:11',5),(95,'updated','users',5,'2017-11-23 20:49:13','2017-11-23 20:49:13',5),(96,'updated','users',5,'2017-11-23 20:49:50','2017-11-23 20:49:50',5),(97,'created','customers',10,'2017-11-23 21:16:40','2017-11-23 21:16:40',5),(98,'updated','users',5,'2017-11-24 13:06:03','2017-11-24 13:06:03',5),(99,'deleted','customers',9,'2017-11-24 17:28:09','2017-11-24 17:28:09',5),(100,'deleted','customers',10,'2017-11-24 17:28:13','2017-11-24 17:28:13',5),(101,'deleted','reservations',43,'2017-11-24 17:32:26','2017-11-24 17:32:26',5),(102,'deleted','reservations',45,'2017-11-24 17:32:27','2017-11-24 17:32:27',5),(103,'deleted','reservations',47,'2017-11-24 17:32:27','2017-11-24 17:32:27',5),(104,'deleted','reservations',48,'2017-11-24 17:32:28','2017-11-24 17:32:28',5),(105,'deleted','customers',5,'2017-11-24 17:55:38','2017-11-24 17:55:38',1),(106,'deleted','customers',6,'2017-11-24 18:46:35','2017-11-24 18:46:35',1),(107,'deleted','customers',7,'2017-11-24 18:46:43','2017-11-24 18:46:43',1),(108,'deleted','customers',8,'2017-11-24 18:46:53','2017-11-24 18:46:53',1),(109,'deleted','customers',9,'2017-11-24 18:47:01','2017-11-24 18:47:01',1),(110,'deleted','customers',10,'2017-11-24 18:47:08','2017-11-24 18:47:08',1);
/*!40000 ALTER TABLE `user_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `91282_5a13cdfa6d6be` (`role_id`),
  CONSTRAINT `91282_5a13cdfa6d6be` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','gkaramgk94@gmail.com','$2y$10$ap4XbRyIrzQdCKZaiLmkoedIBxEVbuDgsocwmOeuxCqvuBSnsJ9Iu','dd257psFlyA8QFf8JNad0hqzgE3wO7RWD8yS6V69uEDUuoqYSrBI8MdoqTtV','2017-11-21 20:02:49','2017-11-22 19:43:02',1),(4,'info@gabykaram.com','info@gabykaram.com','$2y$10$swCfQ5dtmZbx5UyPBvmGSuuEK3/smVxvyQrLqyqITCzF9KS2PVPGK',NULL,'2017-11-23 17:12:35','2017-11-23 17:12:35',1),(5,'Alsowailem85','saad1985boa7mad@gmail.com','$2y$10$IG6E1.1/yioual4H.kYFde9nvwygEGwKJsFPy8byUyc8mnEhvDIJq','n8j6UvxMt7Gx7WIJFHcvnSnTIPjHNgjD3faQ2bWAdK49MwiVtFfHtjVpe6YK','2017-11-23 18:40:31','2017-11-24 13:06:03',1);
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

-- Dump completed on 2017-11-24 19:35:52

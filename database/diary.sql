-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: diary
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
-- Current Database: `diary`
--

/*!40000 DROP DATABASE IF EXISTS `diary`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `diary` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `diary`;

--
-- Table structure for table `diaries`
--

DROP TABLE IF EXISTS `diaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diaries` (
  `owner` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `privacy` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy`)),
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`date`,`owner`),
  KEY `diaries_owner_foreign` (`owner`),
  CONSTRAINT `diaries_owner_foreign` FOREIGN KEY (`owner`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diaries`
--

LOCK TABLES `diaries` WRITE;
/*!40000 ALTER TABLE `diaries` DISABLE KEYS */;
INSERT INTO `diaries` VALUES (21,'1971-01-27',NULL,'Minima dolorem exercitationem et rerum nemo ab. Soluta id praesentium saepe et qui consequatur. Beatae hic nobis rerum expedita rerum architecto nulla.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'1971-01-30',NULL,'Amet ut molestiae aut reiciendis eius qui est. Perspiciatis modi qui voluptatum consectetur dolorum. Tenetur et dicta voluptatem voluptatem sint.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'1974-06-02',NULL,'Dolorem at harum atque quisquam deleniti recusandae. Ea dicta non accusantium et libero quam impedit ut.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'1977-11-25',NULL,'Ad ipsam iure explicabo. Voluptatem qui at ratione non sed. Neque explicabo recusandae quisquam blanditiis quas. Rerum necessitatibus commodi consequatur hic.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'1983-06-20',NULL,'Rerum et ad iste accusamus quo sed est. Et at fugit facilis eligendi.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'1985-06-27',NULL,'Quos non qui et sint excepturi est. Dolorem dolor laboriosam cupiditate quas in. Ut commodi labore et rerum non velit.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'1989-02-18',NULL,'Sunt quis culpa enim dolorem asperiores eius aliquam at. Repudiandae omnis ratione harum enim itaque. Quas fugit voluptas animi tempora voluptatem quia quam. Sit fuga odio corrupti.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'1992-03-25',NULL,'Nostrum fugit officiis cumque ullam consequatur dicta. Dolor et id architecto eos necessitatibus. Commodi eius earum aperiam laudantium autem ad itaque.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'1993-01-17',NULL,'Libero beatae assumenda adipisci quibusdam velit aliquam est. A esse eos quod qui. Repellendus qui velit illum error tempore. Quo reprehenderit aut enim optio rerum.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'1996-03-19',NULL,'Quia voluptatem eum quis quibusdam voluptas omnis. Tempora natus impedit qui reprehenderit officia rerum. Enim harum ut magni laboriosam. Et aut magni consequatur eos hic repellat.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'1997-01-24',NULL,'A et cumque nulla adipisci. Eum in velit sit iste minima.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'2001-12-15',NULL,'Explicabo earum ea non nesciunt sunt error. Veritatis quia accusamus rerum quo sint. Voluptatem consequatur sequi voluptatibus delectus corporis. Quidem mollitia dolore ipsum dicta ea.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'2003-05-11',NULL,'Voluptatum voluptas vero qui expedita itaque nobis ut. Numquam doloremque aut consequatur autem voluptates maiores accusamus. Est voluptas suscipit et earum.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'2004-02-11',NULL,'Qui enim aut qui corporis voluptas quia. Delectus eligendi dolores et quo sit. Itaque tempora iure est aut aut aspernatur non. Repellendus tempore et occaecati est eum praesentium.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'2005-01-25',NULL,'Vero incidunt consequuntur autem molestiae eos dolorum. Quis tenetur delectus inventore molestias sit voluptas.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'2008-10-23',NULL,'Odio ipsum aut sequi. Repellat aut et quo. Ullam voluptas nam eos repudiandae. Nostrum sequi ut quibusdam aliquid odit et explicabo aspernatur.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'2009-03-20',NULL,'Temporibus esse nisi perspiciatis quam rerum accusamus. Suscipit quia eaque recusandae rerum accusamus rerum aperiam accusamus. Ut unde in nisi neque illum aut.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'2011-01-14',NULL,'Ea occaecati ex rerum. Rerum ex repudiandae aut et esse aut.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'2012-07-24',NULL,'Facere laudantium quia officiis ad qui voluptate commodi. Fugit quisquam dolorem distinctio et nobis quidem velit. Culpa et modi non mollitia ut. Enim expedita totam quae.','2022-09-18 20:41:29','2022-09-18 20:41:29'),(21,'2017-06-12',NULL,'Nisi illo ut recusandae debitis omnis. Voluptatibus soluta rerum aut aspernatur maiores dolorem qui. Ipsa voluptates illo recusandae nostrum ipsa.','2022-09-18 20:41:29','2022-09-18 20:41:29');
/*!40000 ALTER TABLE `diaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_09_08_154022_create_profiles_table',1),(6,'2022_09_08_154037_create_diaries_table',1),(7,'2022_09_08_173548_create_user_trigger',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language` char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `profiles_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (21,'en','2022-09-18 20:41:29',NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (21,'Belle Medhurst','demo@diary.se','2022-09-18 20:41:29','$2y$10$e7UsJkqagjdX/nPUBr2NmeegVz5XSBWGibw4IlQUwJVClog2rR1mm','5zFmXUdEyB','2022-09-18 20:41:29','2022-09-18 20:41:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER tr_User_Default_Profile AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                INSERT INTO profiles (`id`, `created_at`) 
                VALUES (NEW.id, now());
            END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-18 20:42:42

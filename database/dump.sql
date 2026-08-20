-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: magang_ecatalog
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beritas`
--

DROP TABLE IF EXISTS `beritas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beritas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis_id` bigint unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `beritas_penulis_id_foreign` (`penulis_id`),
  CONSTRAINT `beritas_penulis_id_foreign` FOREIGN KEY (`penulis_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beritas`
--

LOCK TABLES `beritas` WRITE;
/*!40000 ALTER TABLE `beritas` DISABLE KEYS */;
INSERT INTO `beritas` VALUES (1,'Rumah Promosi Magetan Siapkan Konsep \"Wisata Resto\" untuk Dongkrak Penjualan UMKM','berita/WSNfIRXNhUDYagUNiMYnDNsoe60PfrGs2njMCxlD.png','Rumah Promosi Magetan (RPM) kini tengah mengubah strategi pengelolaannya demi meningkatkan angka kunjungan masyarakat sekaligus mendongkrak penjualan produk-produk dari Usaha Mikro, Kecil, dan Menengah (UMKM). Sebagai langkah inovasi, pihak pengelola tidak hanya sekadar menghadirkan fasilitas kafe, tetapi juga tengah mematangkan konsep baru berupa \"wisata resto\".\n\nKonsep wisata resto ini dijadwalkan akan mulai beroperasi pada bulan Agustus 2026 mendatang. Target utama dari strategi ini adalah untuk menyasar rombongan wisatawan yang berkunjung ke Kabupaten Magetan. Harapannya, lebih banyak wisatawan yang akan singgah ke RPM setelah mereka selesai menikmati keindahan Telaga Sarangan.\n\nMenurut Eko Patrianto selaku Pengelola Rumah Promosi Magetan, situasi ekonomi saat ini menuntut pengelola untuk terus berinovasi. RPM tidak boleh lagi hanya berfungsi sebagai etalase atau tempat memajang produk semata. Tempat ini harus terus dikembangkan agar menjadi sebuah destinasi wisata, sarana edukasi, sekaligus menjadi pusat utama untuk mempromosikan serta menjual produk unggulan daerah Magetan.\n\nBerbagai produk khas Magetan saat ini telah terhimpun dalam satu lokasi di RPM. Pengunjung dapat menemukan aneka kerajinan kulit, bambu, kayu, batik, rajut, hingga manik-manik. Selain produk kerajinan, tersedia pula beragam pilihan makanan, minuman, serta oleh-oleh khas Magetan yang siap memanjakan para wisatawan.',1,1,'2026-07-21 19:32:00','2026-07-21 19:42:52');
/*!40000 ALTER TABLE `beritas` ENABLE KEYS */;
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
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-admin@gmail.com|127.0.0.1','i:1;',1786507596),('laravel-cache-admin@gmail.com|127.0.0.1:timer','i:1786507596;',1786507596);
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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Festival Telaga Sarangan 2026','event/5nbvdnh7Ps4IbnOKxPRtycXIPjP8mmzIZBS7LjQq.jpg','Telaga Sarangan, Plaosan, Kabupaten Magetan','2026-08-25','20:00:00','Festival Telaga Sarangan merupakan agenda wisata tahunan Kabupaten Magetan yang menampilkan pertunjukan seni tradisional, kirab budaya, pameran UMKM, kuliner khas Magetan, pertunjukan musik, serta hiburan rakyat di kawasan wisata Telaga Sarangan.',NULL,1,'2026-07-28 06:56:01','2026-07-28 06:56:01'),(3,'Gebyar UMKM Magetan','event/8RV7q7xe0U52YMkJO3RNTf7PFLmPjFSoiMX1AwsS.jpg','GOR Ki Mageti Magetan','2026-08-20','09:00:00','Pameran dan bazar produk UMKM unggulan Kabupaten Magetan untuk memperkenalkan produk lokal kepada masyarakat luas.',NULL,1,'2026-07-30 02:25:03','2026-07-30 02:25:03'),(4,'Wisata Alam Gunung Lawu','event/rPZW81Ndwv3SgvbhT5LTkcZKXtbvap9FgW0DbyWT.jpg','Telaga Sarangan, Plaosan','2026-09-05','07:00:00','Event wisata alam bersama komunitas pecinta alam Magetan dengan rute pendakian Gunung Lawu yang menakjubkan.',NULL,1,'2026-07-30 02:25:03','2026-07-30 02:25:03'),(6,'Festival Budaya Magetan 2026','event/8RV7q7xe0U52YMkJO3RNTf7PFLmPjFSoiMX1AwsS.jpg','Alun-Alun Magetan','2026-08-10','08:00:00','Festival budaya tahunan Kabupaten Magetan yang menampilkan berbagai pertunjukan seni dan budaya lokal.',NULL,1,'2026-07-30 02:25:03','2026-07-30 02:25:03');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
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
-- Table structure for table `galeris`
--

DROP TABLE IF EXISTS `galeris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeris`
--

LOCK TABLES `galeris` WRITE;
/*!40000 ALTER TABLE `galeris` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeris` ENABLE KEYS */;
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
-- Table structure for table `kuliners`
--

DROP TABLE IF EXISTS `kuliners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kuliners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci,
  `menu_unggulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam_buka` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kuliners`
--

LOCK TABLES `kuliners` WRITE;
/*!40000 ALTER TABLE `kuliners` DISABLE KEYS */;
INSERT INTO `kuliners` VALUES (1,'Ayam Panggang Gandu Bu Setu','kuliner/nHktLQc41vsNIKa1f31Vp6tTSPO611U6IgIUc7Zi.jpg','Desa Gandu, RT.01/RW.01, Kec. Karangrejo, Kabupaten Magetan, Jawa Timur 63395','https://maps.app.goo.gl/b6WmVG9LgkFemU7Y9','Ayam Panggang Bumbu Rujak (Pedas) dan Bumbu Bawang (Gurih)','08.00 - 20.00','081234567891','2026-07-17 01:04:23','2026-07-21 18:44:15');
/*!40000 ALTER TABLE `kuliners` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_07_15_034006_create_permission_tables',1),(5,'2026_07_15_034032_create_wisatas_table',1),(6,'2026_07_15_034033_create_umkms_table',1),(7,'2026_07_15_034033_create_wisata_galleries_table',1),(8,'2026_07_15_034034_create_produks_table',1),(9,'2026_07_15_034035_create_events_table',1),(10,'2026_07_15_034036_create_kuliners_table',1),(11,'2026_07_15_034036_create_penginapans_table',1),(12,'2026_07_15_034037_create_banners_table',1),(13,'2026_07_15_034037_create_beritas_table',1),(14,'2026_07_15_034038_create_galeris_table',1),(15,'2026_07_20_042101_add_maps_to_wisatas_table',1),(16,'2026_07_27_091151_create_wisata_ratings_table',1),(17,'2026_07_27_091353_create_wishlists_table',1),(18,'2026_07_27_110228_add_admin_reply_to_wisata_ratings_table',1),(19,'2026_07_28_082053_add_likes_to_wisata_ratings_table',1),(20,'2026_08_04_094654_add_is_pinned_to_wisatas_table',2),(21,'2026_08_04_100424_add_pinned_at_to_wisatas_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(3,'App\\Models\\User',2),(3,'App\\Models\\User',3),(3,'App\\Models\\User',4),(3,'App\\Models\\User',5),(3,'App\\Models\\User',6),(3,'App\\Models\\User',7);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
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
-- Table structure for table `penginapans`
--

DROP TABLE IF EXISTS `penginapans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penginapans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_mulai` decimal(15,2) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci,
  `fasilitas` text COLLATE utf8mb4_unicode_ci,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penginapans`
--

LOCK TABLES `penginapans` WRITE;
/*!40000 ALTER TABLE `penginapans` DISABLE KEYS */;
INSERT INTO `penginapans` VALUES (1,'Hotel Telaga Mas Sarangan','Hotel',300000.00,'penginapan/JCR5tYateLewkRLzOVyHHNcLQbrCnp0VzS3nRibB.jpg','Jl. Raya Telaga Sarangan, RT.07/RW.01, Ngluweng, Sarangan, Kec. Plaosan, Kabupaten Magetan, Jawa Timur 63361','https://maps.app.goo.gl/5jAkLG1JcQPYMjMz7','Kamar luas dengan balkon yang menghadap langsung ke Telaga Sarangan, Kamar mandi dalam dengan fasilitas Air Panas (Water Heater), Wi-Fi gratis, TV LED, Layanan Sarapan Pagi, Area parkir kendaraan yang aman dan luas, serta Restoran 24 Jam yang menyajikan hidangan lokal.','0351888762','2026-07-21 18:49:01','2026-07-22 04:29:01');
/*!40000 ALTER TABLE `penginapans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produks`
--

DROP TABLE IF EXISTS `produks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `umkm_id` bigint unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produks_umkm_id_foreign` (`umkm_id`),
  CONSTRAINT `produks_umkm_id_foreign` FOREIGN KEY (`umkm_id`) REFERENCES `umkms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produks`
--

LOCK TABLES `produks` WRITE;
/*!40000 ALTER TABLE `produks` DISABLE KEYS */;
INSERT INTO `produks` VALUES (1,1,'Sepatu Pantofel Pria Kulit Sapi Asli Premium','Kerajinan',250000.00,'produk/BFOCOo8SlGoGlTazQ6Aeb3cus2FV300jLJ62Y47c.jpg','Sepatu pantofel pria formal premium yang terbuat dari 100% kulit sapi asli kualitas top dari sentra industri kulit Magetan. Diproduksi secara handmade oleh pengrajin lokal berpengalaman dengan ketelitian tinggi, menghasilkan jahitan yang rapi dan konstruksi sepatu yang sangat kuat. Dilengkapi dengan lapisan dalam yang empuk serta sol karet (rubber sole) anti-selip, membuat sepatu ini sangat nyaman dipakai seharian untuk kerja kantoran, acara formal, maupun pernikahan. Tersedia ukuran mulai dari 39 hingga 44.',1,'2026-07-21 18:40:19','2026-07-21 18:40:19');
/*!40000 ALTER TABLE `produks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','web','2026-07-14 20:43:26','2026-07-14 20:43:26'),(2,'Petugas','web','2026-07-14 20:43:26','2026-07-14 20:43:26'),(3,'User','web','2026-07-19 21:47:41','2026-07-19 21:47:41');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
INSERT INTO `sessions` VALUES ('dzN5Z1FshIJ3c4vZgHvae3zyrLNLJ5T6yFnJkNaQ',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoicUNSS3ZXcUh1MzVMNUlRdEdDWnZieWtYNTVWdG5XR09GZmF4UldQUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi93aXNhdGE/cGFnZT0xIjtzOjU6InJvdXRlIjtzOjE4OiJhZG1pbi53aXNhdGEuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1787196091),('fJsPtfGKCJqLzYFUPrSuPyUNAG2QW4PKXNjjMBQi',5,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZkUySFg1ZGtRcHNGb1YwNWpMNm9BekhRblZGWFUwMWJPYWp4alY5WiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9',1787200096),('gZ5BE0JSFyH1KJO9U8d1XhINlimm7O8sfNObiTCF',5,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTWdKRXJGV3REOEE2cElSUm5rMzhOaVZlOWN3Mm1KUkplSHZwWm1uOCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9',1787025896),('R6rqtJHgHNnRXs98T9wfiqw8bUysyPIsDbXbNgxc',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRmVrMzdwRFJiaXdWeFlxWkFIenI4QmZrRUg5OXBnaDZEMkh2cW5tZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL3dpc2F0YSI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vd2lzYXRhIjtzOjU6InJvdXRlIjtzOjE4OiJhZG1pbi53aXNhdGEuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1787024518);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `umkms`
--

DROP TABLE IF EXISTS `umkms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `umkms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `umkms`
--

LOCK TABLES `umkms` WRITE;
/*!40000 ALTER TABLE `umkms` DISABLE KEYS */;
INSERT INTO `umkms` VALUES (1,'Kerajinan Kulit \"Sawo Asri\"','Bpk. Haryanto','081234567890','Jl. Sawo, Sentra Kerajinan Kulit, Kelurahan Selosari, Kec. Magetan, Kabupaten Magetan, Jawa Timur 63314.','Magetan',NULL,'Kerajinan Kulit \"Sawo Asri\" adalah salah satu pelopor UMKM pengrajin kulit asli di sentra industri Jalan Sawo, Selosari, Magetan. Kami memproduksi berbagai macam produk fashion dan aksesoris berbahan dasar kulit sapi asli berkualitas, seperti sepatu pantofel, sandal, tas, sabuk, dan dompet pria/wanita. Semua produk dikerjakan secara handmade oleh pengrajin lokal berpengalaman, sehingga kualitas jahitan dan keawetannya terjamin. Melayani pembelian eceran, grosir, dan pesanan custom.','2026-07-17 00:56:14','2026-07-17 00:56:14'),(2,'Kerajinan Bambu \"Ringin Asri\"','Ibu Sri Wahyuni','082143658709','Jl. Karya Dharma, RT 02/RW 01, Desa Ringinagung, Kec. Magetan, Kabupaten Magetan, Jawa Timur 63312','Magetan',NULL,'Kerajinan Bambu \"Ringin Asri\" merupakan salah satu pelopor produk kerajinan anyaman bambu kreatif di sentra industri Desa Ringinagung, Magetan. Kami memproduksi berbagai macam perlengkapan rumah tangga dan dekorasi estetik, mulai dari besek premium, tampah, tempat tisu, kap lampu hias, hingga tas anyaman kombinasi kulit untuk suvenir fashion. Produk kami dibuat secara tradisional (handmade) oleh pengrajin lokal berpengalaman dengan anyaman yang rapi, kuat, serta ramah lingkungan. Kami melayani pembelian eceran, grosir, maupun pesanan khusus suvenir pernikahan dan dekorasi hotel.','2026-07-20 00:57:49','2026-07-20 00:57:49'),(3,'Toko Baju Sulis','Ibu Sulistyowati','087856679178','Jl. Raya Telaga Sarangan, Ngluweng, Sarangan, Kec. Plaosan, Kabupaten Magetan, Jawa Timur 63361','Plaosan',NULL,'Menyediakan berbagai macam merchandise dan baju khas Sarangan','2026-07-21 19:53:04','2026-07-22 03:32:02');
/*!40000 ALTER TABLE `umkms` ENABLE KEYS */;
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','admin@magetan.go.id','2026-07-14 20:43:26','$2y$12$HY9ctGjEw5UrgKG6d0zthOjPTVTPF/tPp3ontFNtnFmkm8.BY7DiG','h2kz3WfhCr3KpVsozjqUr04YpCe6fBwsVwp5HQslY8xFVSDSrSxO7WMplf7e','2026-07-14 20:43:26','2026-07-14 20:43:26'),(2,'Petugas Magetan','petugas@magetan.go.id','2026-07-14 20:43:27','$2y$12$QDuZjU/4fGWSHpYcFKScIe/1EHm3u5KBvCTUoD8rDoFHwhTYwtkI.','MTJqHIyV0RULwj2MNgxgjXGx3Rwv9Sp74ODc4M0byfcLpEoOGiPWPNBGrUAX','2026-07-14 20:43:27','2026-07-14 20:43:27'),(3,'Levdanzz','eek123@gmail.com',NULL,'$2y$12$KyRGmZsCzNAwRII2Q5/Ua.gi4k0FMXMgtWNFb2vYv5robCDUi60hC',NULL,'2026-07-19 21:36:29','2026-07-19 21:36:29'),(4,'Dinas Kebudayaan dan Pariwisata','disparbudpora@gmail.com',NULL,'$2y$12$jwCwqM7gyubzvMTmBNa4/.7ZVCINe.xXZN6.KElekIIn9QdN7rP86',NULL,'2026-07-27 01:57:32','2026-07-27 01:57:32'),(5,'levy danendra','levydanendra@gmail.com',NULL,'$2y$12$2QPF1CfJ6cNs/V7MoesrmeMOJ2HMHzyiahPaY3BPIZvvLPLhj62Ju',NULL,'2026-07-27 04:06:27','2026-07-27 04:06:27'),(6,'Haji SOP','sofyands23@gmail.com',NULL,'$2y$12$tImyLKGS3RiOfw70yfw8fOa2IC2cLVHOgsLKVE4ykoxXKK/ExaKUm',NULL,'2026-07-28 03:26:47','2026-07-28 03:26:47'),(7,'jajalan','haehae@gmail.com',NULL,'$2y$12$Vd7kRxc6JXJmz3Hhu3eKT.TlYdIoZppKm2u1DrH/WYIn2j2wJo8gS',NULL,'2026-07-30 07:22:10','2026-07-30 07:22:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wisata_galleries`
--

DROP TABLE IF EXISTS `wisata_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wisata_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `wisata_id` bigint unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wisata_galleries_wisata_id_foreign` (`wisata_id`),
  CONSTRAINT `wisata_galleries_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wisata_galleries`
--

LOCK TABLES `wisata_galleries` WRITE;
/*!40000 ALTER TABLE `wisata_galleries` DISABLE KEYS */;
INSERT INTO `wisata_galleries` VALUES (1,1,'wisata/gallery/Tl72P79LQvEj90dcLa0sU8VvRGtRsCUVgPV0cjir.jpg','2026-08-12 04:11:30','2026-08-12 04:11:30'),(3,1,'wisata/gallery/vSs0CleSHRuHHTi1eKiaKGG3hwMKjYpstTUuiHix.jpg','2026-08-12 04:30:09','2026-08-12 04:30:09'),(4,1,'wisata/gallery/OqRwkee9wgt47tWfnW4v80KoEFqVXHR7OqN2QTyW.jpg','2026-08-12 04:34:00','2026-08-12 04:34:00'),(5,1,'wisata/gallery/FWQl5vQ6PDMPbRlnxB2vwXNwJmhreE4ANfgjj0CY.jpg','2026-08-12 04:37:34','2026-08-12 04:37:34'),(6,15,'wisata/gallery/NaRlwPBbgb9chZRXUzsBG3X0gBBwaJG3LMgYb9nb.jpg','2026-08-18 01:18:14','2026-08-18 01:18:14'),(7,15,'wisata/gallery/LrjdbadgWVSXApId8HFWecxeCZRb84E2HN8hUZMk.jpg','2026-08-18 01:18:23','2026-08-18 01:18:23'),(8,4,'wisata/gallery/gtxjmutnwMzOxTSAYvOa8N5vQsBtGTFuw2Jh0FAJ.jpg','2026-08-18 03:28:03','2026-08-18 03:28:03'),(9,4,'wisata/gallery/kVJi7OQt4ddftYLEoFaPi2K3fHD1l3n394ZFG5ok.jpg','2026-08-18 03:28:11','2026-08-18 03:28:11'),(10,4,'wisata/gallery/glVcrRwBX3jXXfBMPU52urTJS12zaXUgFyCPDvhV.jpg','2026-08-18 03:29:22','2026-08-18 03:29:22'),(11,4,'wisata/gallery/EUyJcNvwyBGZa8RvNlaOlzek025oaLd6tBVLBbFo.jpg','2026-08-18 03:30:06','2026-08-18 03:30:06'),(12,2,'wisata/gallery/2PHee7PFczHARCQMyFWsaweAqsgbfWonThmpEtxV.png','2026-08-18 04:08:59','2026-08-18 04:08:59'),(13,2,'wisata/gallery/834bKI10UvuLm0XB3FNQBYL8H8Xwox8lqKfiUyJQ.jpg','2026-08-18 04:08:59','2026-08-18 04:08:59'),(14,2,'wisata/gallery/9UyrjFJezxHsp12GsntFiRs6TTrqan99K6Ww17jr.jpg','2026-08-18 04:08:59','2026-08-18 04:08:59'),(15,14,'wisata/gallery/sibyKQqBliKVUPpX7FEFgtboitTK1oUnjoFN1XHK.jpg','2026-08-18 04:10:57','2026-08-18 04:10:57'),(16,14,'wisata/gallery/gZa4IL2qfLwCkmmIlUEcEayhNht5CHOXc1NCcbXf.webp','2026-08-18 04:10:57','2026-08-18 04:10:57'),(17,14,'wisata/gallery/i6jUxW2ksotRfq6ATLjeOqwnQ3LPdkCUPMxNUtpw.webp','2026-08-18 04:10:57','2026-08-18 04:10:57'),(18,14,'wisata/gallery/tChpdtznW85PXncu7qzKOozLzWEnLu9sCEbC5fJ8.webp','2026-08-18 04:10:57','2026-08-18 04:10:57'),(19,12,'wisata/gallery/zuWJvJXYEiDpJqrpyypXY3l2e1MU7uG8Q4IrJ3uE.webp','2026-08-18 04:12:56','2026-08-18 04:12:56'),(20,12,'wisata/gallery/x1Jy5zesFa2jurnYwZYYBzdSwprRLciZeSD0WfnG.jpg','2026-08-18 04:12:56','2026-08-18 04:12:56'),(21,12,'wisata/gallery/vJxVSS5kkMjkW2H6jU7RTSClJUXs5J3bm3PrWEp9.jpg','2026-08-18 04:12:56','2026-08-18 04:12:56'),(22,12,'wisata/gallery/RBJQLJQQArHxE8gPuw1Y6k2QbV4FPgQLlVWTmVhp.jpg','2026-08-18 04:12:56','2026-08-18 04:12:56'),(23,3,'wisata/gallery/qh8TeLZJBEWkHGVYkSFdLaoVG994YUDFg17YvQB7.jpg','2026-08-18 04:15:08','2026-08-18 04:15:08'),(24,3,'wisata/gallery/GSjh4eF0l3vg7wGDJWjapxLcUGNLoxROTQIRGkRH.jpg','2026-08-18 04:15:08','2026-08-18 04:15:08'),(25,3,'wisata/gallery/xQfU4ipoB2RXPqG9IW8tpsPQlw20b4AJN9HrM7VC.webp','2026-08-18 04:15:08','2026-08-18 04:15:08'),(26,5,'wisata/gallery/io45w3cYEsAq3l4xXUL4WDJ3UAzzWKbgglp87xCD.webp','2026-08-18 04:17:13','2026-08-18 04:17:13'),(27,5,'wisata/gallery/Lxzb5FHytj82eXnp0BB4XFlEzSk5cn9AFV4I8ZAP.jpg','2026-08-18 04:17:13','2026-08-18 04:17:13'),(28,5,'wisata/gallery/aCNeTJg6cW2kGeob0uZ6pw8OVc1dDJVY11GbTT84.png','2026-08-18 04:17:13','2026-08-18 04:17:13'),(29,5,'wisata/gallery/G7bpzD9akVgUtdil7KoWkP8LDEMAuh6B3Fx4PazQ.jpg','2026-08-18 04:17:13','2026-08-18 04:17:13'),(30,5,'wisata/gallery/Dy3xaXPRCcAB5UeZW7ipEcNfS443b0Xzi4bEqYKg.jpg','2026-08-18 04:17:13','2026-08-18 04:17:13'),(31,6,'wisata/gallery/57FPTfQLnaqadj3eIYfgL7OIvEIJvNJuGN5PZCZY.webp','2026-08-18 04:18:36','2026-08-18 04:18:36'),(32,6,'wisata/gallery/EUYTKp3IiAXvHhdYDbCrgmblvcP7GhukVLYzIvzS.jpg','2026-08-18 04:18:36','2026-08-18 04:18:36'),(33,6,'wisata/gallery/p1RY67enVDdMTr3nqvbA71WjWDaxqtBNrn7PPRTP.png','2026-08-18 04:18:36','2026-08-18 04:18:36'),(34,6,'wisata/gallery/yiLgd94cEsmbKC92PW5XuAdWqbYasAjOUgJyKgdS.jpg','2026-08-18 04:18:36','2026-08-18 04:18:36'),(35,7,'wisata/gallery/AXErNr05lYfPC5WJm6IolUMdLBpWeUNdQMoZOCGQ.jpg','2026-08-18 04:19:49','2026-08-18 04:19:49'),(36,7,'wisata/gallery/CVbq37NbNqMMIoOiKHQ6prfkpNtB3yyruaZ54gF0.webp','2026-08-18 04:19:50','2026-08-18 04:19:50'),(37,7,'wisata/gallery/OjSjrcpqufJNM2PNTzDFlLbqNSVFAv63kExobIHB.jpg','2026-08-18 04:19:50','2026-08-18 04:19:50'),(38,7,'wisata/gallery/pVs9Y8UeeTYC7uwSNqw2YGKtz8QxLNVHEh1Psl1n.jpg','2026-08-18 04:19:50','2026-08-18 04:19:50'),(39,7,'wisata/gallery/b05Iw8QUk0wgkk0IXTbvgn9BXOhznuCLJGGohGeV.jpg','2026-08-18 04:19:50','2026-08-18 04:19:50'),(40,8,'wisata/gallery/jsDvvqk4TQSiuZ7yUCWs9IDtn9JauLSWXlIStDEX.jpg','2026-08-18 04:20:59','2026-08-18 04:20:59'),(41,8,'wisata/gallery/xgSVFtchGMuMwYCe71cPrY9fxjjIPubP6mjPwNnq.jpg','2026-08-18 04:20:59','2026-08-18 04:20:59'),(42,8,'wisata/gallery/5R9ful4EFnJzOuZQI2NoJWWssY9GXOKwVjdSlPRK.jpg','2026-08-18 04:20:59','2026-08-18 04:20:59'),(43,9,'wisata/gallery/E89DJFtXWyXejKtFcMkaP4B7NMIVCPVpvZuAheJH.jpg','2026-08-18 04:22:52','2026-08-18 04:22:52'),(44,9,'wisata/gallery/ypyo6d43LgSGm3svQPAumNMJafaP4nd7LW5S996m.jpg','2026-08-18 04:22:52','2026-08-18 04:22:52'),(45,9,'wisata/gallery/XxOEcKNkVmKMgw8DuuldSqHhvCH3uN6HOcKhNsYu.jpg','2026-08-18 04:22:52','2026-08-18 04:22:52'),(46,9,'wisata/gallery/4wA6Irwpa81nqOXnYofEGzzeQTS1eRuFp6y0cOsv.webp','2026-08-18 04:22:52','2026-08-18 04:22:52'),(47,9,'wisata/gallery/uqWBdyOTwu7h7OJ7nlbg5jEo1V2xTt0BAHbXagM2.jpg','2026-08-18 04:22:52','2026-08-18 04:22:52'),(48,10,'wisata/gallery/MFsVd9HWoYqDbn3q3yDr7y4aPh4O7gbGcGjKwRXc.jpg','2026-08-18 04:24:01','2026-08-18 04:24:01'),(49,10,'wisata/gallery/9pqzWWbvfgjACsPnS5nbK6ljG6fVtPSnGV8EGzZ6.jpg','2026-08-18 04:24:01','2026-08-18 04:24:01'),(50,10,'wisata/gallery/QASLl3pndv8eKZ8MFHmnSrqsVhgLg70JBsVeJkYa.jpg','2026-08-18 04:24:01','2026-08-18 04:24:01'),(51,11,'wisata/gallery/nsed5ekkjbhxA1A3joLpjEyAio4hLiK8Er8PW7M4.jpg','2026-08-18 04:25:39','2026-08-18 04:25:39'),(52,11,'wisata/gallery/3yxWTTCEYUec9N1mPSU315IUyTUbn40ITioyQzlE.jpg','2026-08-18 04:25:39','2026-08-18 04:25:39'),(53,11,'wisata/gallery/yY7W2SnslB77bDE0hNgcdEWtQNB5cEJFQLo61urN.webp','2026-08-18 04:25:39','2026-08-18 04:25:39'),(54,11,'wisata/gallery/qWSrPQZhpyS3oWFEYNIIAJd2fhXD19CgUyGIOdeH.jpg','2026-08-18 04:25:39','2026-08-18 04:25:39'),(55,11,'wisata/gallery/qbHGrUN7vVJWehCpzwSEwAGZlA2V8ThPmbYHmi6j.jpg','2026-08-18 04:25:39','2026-08-18 04:25:39'),(56,13,'wisata/gallery/qY0T8nivIvVwj5svr7sEC7O6Q9goxzvZh7i19fAm.jpg','2026-08-18 04:27:35','2026-08-18 04:27:35'),(57,13,'wisata/gallery/TvGurWPikX7LoCvgBzbiKxbaXMdFFOoP5bnNYBeo.jpg','2026-08-18 04:27:35','2026-08-18 04:27:35'),(58,13,'wisata/gallery/vC0zzCK5IS5GE4ErJ0LE7HNu4RIFOGlvmi8TbwbM.jpg','2026-08-18 04:27:35','2026-08-18 04:27:35'),(59,13,'wisata/gallery/fpOHfcMhOwpPVGe7yQjlj1jzWd8HXykfdOkgaJlx.jpg','2026-08-18 04:27:35','2026-08-18 04:27:35'),(60,13,'wisata/gallery/7PPeewNvlbbHi1GcJVnA8R8nXarc1iPdCSogyzr5.jpg','2026-08-18 04:27:35','2026-08-18 04:27:35'),(61,16,'wisata/gallery/rrGrXgkGGURYYSoi73gEoXuJSeR5nftFSAyj6eGE.jpg','2026-08-18 04:29:03','2026-08-18 04:29:03'),(62,16,'wisata/gallery/K8eupNAXfU3MAJf3eFh4itGE3NgEJbix88S2PA5s.jpg','2026-08-18 04:29:03','2026-08-18 04:29:03'),(63,16,'wisata/gallery/0CsMAUOvxCts7fmhHzzQmEIyHBkzc0q4unUjpZqh.jpg','2026-08-18 04:29:03','2026-08-18 04:29:03'),(64,17,'wisata/gallery/ZkFKNUK8R8snmP0pwrML5CRqEpt2VURVoAfla0is.jpg','2026-08-18 04:31:42','2026-08-18 04:31:42'),(65,17,'wisata/gallery/65x4jicCTKLXXUso9aliRPz5sa0XklRlfvcyAPQo.jpg','2026-08-18 04:31:42','2026-08-18 04:31:42'),(66,17,'wisata/gallery/y7iLE0iGPbWrFVkLrIvmcqoqUrkl8BO6JA6N9wrU.jpg','2026-08-18 04:31:42','2026-08-18 04:31:42'),(67,18,'wisata/gallery/BtSgGkYjPg4He4nnQscbAbqxbt2BQSrPJjiTv1rv.jpg','2026-08-18 04:33:26','2026-08-18 04:33:26'),(68,18,'wisata/gallery/ccC9mycCTqMo2iwvhJqbC9neHKsocgqCVMFJO3hM.jpg','2026-08-18 04:33:26','2026-08-18 04:33:26'),(69,18,'wisata/gallery/RTK3od0RuBxwMRU0TZ8shwSLY8FBwC73lM7JbvI5.jpg','2026-08-18 04:33:26','2026-08-18 04:33:26'),(70,19,'wisata/gallery/QmgnzDlq9hMTOTRy5m6gsjkJmDUcsODJgIsijvKf.webp','2026-08-18 04:35:09','2026-08-18 04:35:09'),(71,19,'wisata/gallery/AzWOzmA69Rv3KpvjBKiTqgqSfrvAQn9iIt9jPNGJ.jpg','2026-08-18 04:35:09','2026-08-18 04:35:09'),(72,19,'wisata/gallery/kZESq50NZXgNYXzo9kUeIvO5hxb1dXGHMHF1UHWU.jpg','2026-08-18 04:35:09','2026-08-18 04:35:09'),(73,20,'wisata/gallery/mQINDPAwEE5k0f6EHYYuBG4vR5PO0bNDLFJOQGym.webp','2026-08-20 01:53:32','2026-08-20 01:53:32'),(74,20,'wisata/gallery/mK6oVrLYXH8KJgbcIO9hTESoqOIIg73WF3o7U84d.webp','2026-08-20 01:53:32','2026-08-20 01:53:32'),(75,20,'wisata/gallery/JzF78vw1e5UtmTsJKanFDBZf44U75QamnhHy7D3I.webp','2026-08-20 01:53:32','2026-08-20 01:53:32'),(76,20,'wisata/gallery/EJesc7roeVWJ5VpcBRk2r50vPss5D7QOJwjf7ydF.webp','2026-08-20 01:53:32','2026-08-20 01:53:32'),(77,20,'wisata/gallery/JkATuIP3k6cyDgSGk8iz1L7ozdZ4ceFvnS0cJBQG.webp','2026-08-20 01:53:32','2026-08-20 01:53:32'),(78,21,'wisata/gallery/cc2dv86JjI1dsU3AnOu0BuDUm1QiAbyg5ySg2LLw.webp','2026-08-20 01:57:15','2026-08-20 01:57:15'),(79,21,'wisata/gallery/irKBYGfEOjgltnri5GDq1VaRRk1jprm7uZdic45y.webp','2026-08-20 01:57:15','2026-08-20 01:57:15'),(80,21,'wisata/gallery/0eoUgqmbrhRkohiyGCd1onrxOnWB0Lrnoo3ZENCx.webp','2026-08-20 01:57:16','2026-08-20 01:57:16'),(81,21,'wisata/gallery/1YPZo4gEFOMi7Nbc7q79hdXNGs6SBPNPKXkPosj8.webp','2026-08-20 01:57:16','2026-08-20 01:57:16'),(82,21,'wisata/gallery/2Mwa2WMw5bPFlePKsQAW8VFeT7sOCoENXzfbNJlh.webp','2026-08-20 01:57:16','2026-08-20 01:57:16');
/*!40000 ALTER TABLE `wisata_galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wisata_ratings`
--

DROP TABLE IF EXISTS `wisata_ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wisata_ratings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `wisata_id` bigint unsigned NOT NULL,
  `rating` tinyint NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `likes` int unsigned NOT NULL DEFAULT '0',
  `admin_reply` text COLLATE utf8mb4_unicode_ci,
  `admin_replied_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wisata_ratings_user_id_wisata_id_unique` (`user_id`,`wisata_id`),
  KEY `wisata_ratings_wisata_id_foreign` (`wisata_id`),
  CONSTRAINT `wisata_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wisata_ratings_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wisata_ratings`
--

LOCK TABLES `wisata_ratings` WRITE;
/*!40000 ALTER TABLE `wisata_ratings` DISABLE KEYS */;
INSERT INTO `wisata_ratings` VALUES (2,5,1,5,'sangat indahhhh',0,NULL,NULL,'2026-07-27 04:06:50','2026-08-05 07:31:52'),(3,5,9,5,'endyulll parahhhh😱😱😱',1,'terimakasih sudah mampir🙏😀','2026-07-27 04:08:40','2026-07-27 04:07:44','2026-07-28 01:34:36'),(5,3,1,5,'woww',0,NULL,NULL,'2026-07-27 04:11:48','2026-07-27 04:14:57'),(6,3,9,5,'mantappp👍',1,'kamsiaaa','2026-07-28 01:35:10','2026-07-28 01:31:57','2026-07-28 01:35:10'),(7,4,9,5,'wow',1,NULL,NULL,'2026-07-28 01:33:08','2026-07-28 01:34:35');
/*!40000 ALTER TABLE `wisata_ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wisatas`
--

DROP TABLE IF EXISTS `wisatas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wisatas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_tiket` decimal(10,2) NOT NULL DEFAULT '0.00',
  `jam_operasional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `fasilitas` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_publish` tinyint(1) NOT NULL DEFAULT '1',
  `is_pinned` tinyint(1) NOT NULL DEFAULT '0',
  `pinned_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wisatas_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wisatas`
--

LOCK TABLES `wisatas` WRITE;
/*!40000 ALTER TABLE `wisatas` DISABLE KEYS */;
INSERT INTO `wisatas` VALUES (1,'Telaga Sarangan','telaga-sarangan','Alam','Plaosan','Jl. Raya Telaga Sarangan, Ngluweng, Sarangan, Kec. Plaosan, Kabupaten Magetan, Jawa Timur 63361','-7.6678','111.2205','https://maps.app.goo.gl/Lqw55sbkQQaFGu4x7',20000.00,'07.00 - 17.00 WIB','Telaga Sarangan, juga dikenal sebagai Telaga Pasir, adalah telaga alami yang berada di ketinggian 1.200 meter di atas permukaan laut dan terletak di lereng timur Gunung Lawu. Telaga ini memiliki luas sekitar 30 hektare dan kedalaman hingga 28 meter. Dengan suhu udara pegunungan yang sejuk antara 15 hingga 20 derajat Celcius, tempat ini menjadi destinasi favorit untuk bersantai. Pengunjung dapat menikmati pemandangan alam, berkeliling telaga menggunakan speedboat, atau menyewa kuda tunggang.','Area Parkir Luas, Toilet Umum, Mushola, Warung Makan (Sate Kelinci), Penginapan / Hotel, Sewa Speedboat, Sewa Kuda Tunggang, Kios Souvenir.','wisata/bM9DTqNWVOGqGCABwlhtnFbA2oVWk3yWXBy1Gmjc.jpg',1,1,'2026-08-18 03:40:52','2026-07-14 21:52:17','2026-08-20 02:14:33'),(2,'Mojosemi Forest Park','mojosemi-forest-park','Alam','Plaosan','Jl. Raya Sarangan, Cemorosewu Km. 5, Kali Jumok, Sarangan, Kec. Plaosan, Kabupaten Magetan, Jawa Timur 63361','-7.6701','111.1972','https://maps.app.goo.gl/w3HAJiRYTyLASV7w8',35000.00,'08.00 - 16.00 WIB','Mojosemi Forest Park adalah destinasi wisata keluarga yang memadukan keasrian hutan pinus di lereng Gunung Lawu dengan berbagai wahana hiburan seru. Daya tarik paling ikonik dari tempat ini adalah Mojosemi Dinosaurus Park, di mana pengunjung dapat menyusuri hutan sambil berinteraksi dengan puluhan replika dinosaurus raksasa berteknologi animatronik yang bisa bergerak dan bersuara layaknya hidup di habitat aslinya. Selain itu, tempat ini juga menawarkan udara pegunungan yang sangat segar dan berbagai aktivitas luar ruang.','Area Parkir Luas, Toilet, Mushola, Food Court & Resto, Wahana Dinosaurus Park, Dino Show (Pertunjukan Dinosaurus), Outbound, Flying Fox, High Rope, Paintball, ATV, Glamping & Tenda Camp, Spot Foto Instagramable, Jeep Adventure.','wisata/8DvgTZVZEUIK1Q0heGxnStjK4xBlY6sx55X8yd2t.jpg',1,1,'2026-08-18 03:41:05','2026-07-20 00:17:52','2026-08-20 02:14:48'),(3,'Taman Wisata Genilangit','taman-wisata-genilangit','Alam','Poncol','Desa Genilangit, Kecamatan Poncol, Kabupaten Magetan, Jawa Timur 63362','-7.7272','111.2341','https://maps.app.goo.gl/1x7ujutSGigqMKAL9',10000.00,'08.00 - 17.00 WIB','Taman Wisata Genilangit adalah destinasi wisata alam kekinian yang terletak di kawasan perbukitan lereng Gunung Lawu. Menawarkan kombinasi sempurna antara panorama hutan pinus yang asri, udara pegunungan yang sejuk, dan deretan spot foto yang sangat instagramable. Tempat ini menjadi favorit wisatawan untuk berburu foto dengan latar belakang lembah hijau yang memukau, bersantai bersama keluarga, atau menikmati suasana tenang jauh dari hiruk-pikuk perkotaan.','Area Parkir, Mushola, Toilet Umum, Warung Kuliner & Kopi, Gazebo / Tempat Istirahat, Spot Foto Kreatif (Sepeda Gantung, Perahu Kayu di Pinggir Tebing, Rumah Pohon, Sayap Kupu-Kupu), Area Bermain Anak, Flying Fox, Penyewaan Kostum Jepang/Kimono.','wisata/UOZJMA136yBhMDMOZWsRDBby5W5vtAxAzqkpXYQ5.jpg',1,0,NULL,'2026-07-20 00:46:09','2026-08-06 05:38:12'),(4,'Sgodean (Kolam Renang & Cafe)','sgodean-kolam-renang-cafe','Desa','Panekan','Jl. Raya Jabung, Bulusari, Jabung, Panekan, Kabupaten Magetan, Jawa Timur 63352','-7.6122146','111.2719443','https://maps.app.goo.gl/pRD3APFvi5KB3J9LA',5000.00,'08.00 - 16.00 WIB','Sgodean adalah destinasi wisata air tersembunyi yang sedang populer di kawasan Ngiliran, Kecamatan Panekan, Magetan. Tempat ini menawarkan pesona kolam pemandian terbuka yang luas dengan air yang sangat jernih dan menyegarkan. Dikelilingi oleh pepohonan dan suasana alam yang asri, pengunjung dapat berenang santai menggunakan ban pelampung. Selain bermain air, Sgodean juga terintegrasi dengan area kafe, menjadikannya lokasi yang sangat cocok untuk rekreasi keluarga atau sekadar healing santai bersama teman-teman.','Kolam Renang Terbuka, Penyewaan Ban Pelampung, Cafe & Restoran, Area Parkir Kendaraan, Kamar Bilas / Toilet, Tempat Duduk / Area Santai.','wisata/1tjF1zw9lQuxKcip1YZmtpriaONyXYXCcDpOQsV8.jpg',1,1,'2026-08-18 03:41:58','2026-07-21 20:05:29','2026-08-18 03:41:58'),(5,'Situs Candi Sadon (Candi Reog)','situs-candi-sadon-candi-reog','Budaya','Panekan','Dusun Sadon, Desa Cepoko, Kecamatan Panekan, Kabupaten Magetan, Jawa Timur 63352','-7.6256','111.2987','https://maps.app.goo.gl/sqcdMGL982da5knd6',0.00,'08.00 - 16.00 WIB','Situs Candi Sadon, atau yang populer di kalangan masyarakat lokal dengan sebutan Candi Reog, adalah sebuah situs cagar budaya peninggalan masa klasik (Hindu) yang berada di Magetan. Dinamakan Candi Reog karena pada salah satu batu candi (Kala) terdapat pahatan wajah yang dipercaya masyarakat mirip dengan topeng dadak merak pada kesenian Reog Ponorogo. Di situs ini, wisatawan dapat mengamati susunan batu andesit kuno dan peninggalan arca lembu (Nandi). Destinasi ini sangat tepat untuk wisata edukasi, penelitian sejarah, dan pengenalan budaya bagi pelajar maupun keluarga yang ingin melihat langsung jejak peradaban masa lampau di lereng Gunung Lawu.','Area Parkir (terbatas), Papan Informasi Sejarah Cagar Budaya, Gazebo / Tempat Istirahat, Juru Pelihara (Jupel) yang siap memandu menceritakan sejarah situs.','wisata/Bu9lPpm9ZDxRz1zN5TBIoJwmlqlbe45j7ofOuZjq.jpg',1,0,NULL,'2026-07-22 03:22:35','2026-07-22 03:23:55'),(6,'Masjid Agung Baitussalam Magetan','masjid-agung-baitussalam-magetan','Religi','Magetan','Jl. Basuki Rahmat Barat No.1, Tambran, Kec. Magetan, Kabupaten Magetan, Jawa Timur 63314 (Tepat di sebelah barat Alun-Alun Magetan)','-7.6166','111.3259','https://maps.app.goo.gl/9bav1Sz3B7ALpc5N6',0.00,'24 Jam','Masjid Agung Baitussalam merupakan masjid utama dan terbesar di Kabupaten Magetan yang berlokasi sangat strategis, berdampingan langsung dengan Alun-Alun kota. Masjid ini memiliki arsitektur megah dengan perpaduan gaya klasik dan modern yang indah, serta memiliki menara yang menjulang tinggi. Selain menjadi pusat ibadah masyarakat Magetan, masjid ini sering menjadi destinasi wisata religi bagi para musafir atau rombongan wisatawan dari luar kota. Suasananya yang sejuk, bersih, dan tenang menjadikannya tempat yang sempurna untuk beri\'tikaf, beribadah, sekaligus beristirahat sejenak sebelum melanjutkan perjalanan wisata di Magetan.','Area Parkir Luas (terintegrasi dengan area Alun-Alun), Tempat Wudhu Pria & Wanita yang bersih, Toilet Umum, Ruang Penitipan Sandal/Barang, Peminjaman Mukena & Sarung, Area Istirahat (Serambi), serta akses pejalan kaki yang sangat dekat dengan pusat kuliner dan suvenir di sekitar Alun-Alun Magetan.','wisata/K4DtPvSvktY3Tw6sR13uLLyHtGxj1MNTy9vQJEy6.jpg',1,0,NULL,'2026-07-22 03:38:28','2026-07-22 03:38:28'),(7,'Magetan Park','magetan-park','Buatan','Magetan','Jl. Pahlawan No.14, Tambran, Kec. Magetan, Kabupaten Magetan, Jawa Timur 63318','-7.6191','111.3275','https://maps.app.goo.gl/Z9oGkSzukXu19Cew5',20000.00,'08.00 - 16.00 WIB (Biasanya tutup pada hari Senin untuk pemeliharaan)','Magetan Park adalah taman rekreasi keluarga berkonsep wisata buatan terpadu yang berada di jantung kota Magetan. Destinasi ini memadukan keseruan wahana permainan air (waterpark) dengan aktivitas luar ruangan (outbound) dalam satu kawasan yang rindang dan tertata rapi. Pengunjung dapat menikmati berbagai wahana seperti kolam renang anak dan dewasa, perosotan air (waterboom), ember tumpah, hingga wahana memacu adrenalin seperti flying fox dan high rope. Tempat ini menjadi pilihan favorit bagi keluarga, rombongan sekolah, maupun instansi yang ingin mengadakan acara family gathering di lokasi yang mudah diakses.','Kolam Renang (Waterboom), Wahana Outbound (Flying Fox, ATV), Loker Penitipan Barang, Kamar Bilas dan Toilet yang bersih, Food Court / Kantin, Gazebo untuk bersantai, Mushola, dan Area Parkir yang memadai.','wisata/boxrLlHvv8ppUQ2PKUEdfuEYTm2MK1NQD39k6CWG.jpg',1,0,NULL,'2026-07-22 03:45:14','2026-07-22 03:46:16'),(8,'Kampung Susu Lawu Singolangu','kampung-susu-lawu-singolangu','Edukasi','Plaosan','Kali Jumok, Sarangan, Kec. Plaosan, Kabupaten Magetan, Jawa Timur 63361','-7.6740','111.2335','https://maps.app.goo.gl/vUhdsKJCNwbmm78D8',5000.00,'08.00 - 16.00 WIB','Kampung Susu Lawu Singolangu merupakan destinasi wisata edukasi unggulan di Magetan yang berlokasi tidak jauh dari Telaga Sarangan. Mengusung konsep agrowisata, KSL mengajak pengunjung untuk belajar dan berinteraksi langsung dengan kegiatan peternakan sapi perah. Wisatawan, khususnya anak-anak dan pelajar, dapat mengikuti paket edukasi yang meliputi kegiatan memerah susu sapi, memberi makan pedet (anak sapi), hingga melihat langsung proses pengolahan susu segar menjadi aneka produk lezat seperti susu pasteurisasi, yoghurt, dan permen karamel susu. Didukung udara pegunungan Lawu yang sejuk, belajar di KSL menjadi pengalaman liburan yang menyenangkan sekaligus menambah wawasan.','Area Parkir, Pemandu Wisata Edukasi (untuk rombongan), Kandang Percontohan, Kedai Susu & Pusat Oleh-oleh Olahan Susu, Spot Foto, Toilet Bersih, dan Gazebo / Area Kumpul Rombongan.','wisata/DQARnhHHrlQoMC9zRh9mar8336k2SJUkBfFh9ljn.webp',1,0,NULL,'2026-07-22 03:58:29','2026-07-22 04:00:03'),(9,'Sentra Kuliner Ayam Panggang Gandu','sentra-kuliner-ayam-panggang-gandu','Kuliner','Karangrejo','Desa Gandu, Kecamatan Karangrejo, Kabupaten Magetan, Jawa Timur 63375','-7.5684','11.4121','https://maps.app.goo.gl/9ka2STuwYTBXUQr69',0.00,'08.00 - 20.00 WIB','Desa Gandu telah lama dikenal sebagai surga kuliner ayam panggang tradisional yang legendaris di Magetan. Saat memasuki kawasan desa ini, pengunjung akan langsung disambut oleh aroma sedap kepulan asap dari dapur-dapur rumah warga. Keunikan dari Ayam Panggang Gandu adalah proses memasaknya yang masih mempertahankan cara tradisional, yakni dipanggang di atas tungku tanah liat menggunakan kayu bakar. Hal ini menghasilkan cita rasa bumbu yang meresap sempurna, daging yang empuk, dan aroma smokey yang khas. Pengunjung disuguhkan pengalaman makan yang otentik karena bisa langsung melihat proses pemanggangan di dapur warga (konsep open kitchen tradisional) dan menyantap hidangan secara lesehan bersama keluarga.','Area Parkir (tersedia di halaman masing-masing rumah makan warga), Ruang Makan Lesehan yang luas dan nyaman, Konsep Dapur Terbuka, Toilet Bersih, Mushola, dan beberapa warga juga menjual oleh-oleh khas Magetan lainnya seperti kerupuk lempeng/karak.','wisata/OKLx9iStv2G06JZakmmHIMhAtl0JoLZDhQ8snMvb.jpg',1,0,NULL,'2026-07-22 04:08:22','2026-07-22 04:19:42'),(10,'Wisata Paralayang Gunung Blego','wisata-paralayang-gunung-blego','Olahraga','Parang','67MW+G4R, Gn. Blego, Sayutan, Kec. Parang, Kabupaten Magetan, Jawa Timur 63371','-7.6985','111.3092','https://maps.app.goo.gl/Q7rphyfNxNVCv3Gy7',5000.00,'08.00 - 17.00 WIB (Waktu operasional sangat bergantung pada kondisi cuaca dan arah angin)','Gunung Blego menawarkan daya tarik utama berupa wisata olahraga dirgantara, khususnya paralayang (paragliding). Dengan ketinggian dan kontur alam yang ideal, lokasi ini menjadi titik lepas landas (take-off) favorit bagi para atlet paralayang maupun wisatawan yang ingin memacu adrenalin melalui penerbangan tandem. Selain menikmati sensasi terbang bebas di udara, pengunjung akan dimanjakan dengan panorama alam Magetan dari ketinggian, hamparan perbukitan hijau, dan hembusan angin pegunungan yang segar. Destinasi ini juga sangat cocok bagi fotografer atau wisatawan yang sekadar ingin refreshing sambil menonton paralayang yang sedang mengudara.','Landasan Pacu / Titik Lepas Landas (Take-off Area), Area Pendaratan (Landing Area), Jasa Terbang Tandem dengan Instruktur Berlisensi, Area Parkir Kendaraan, Warung Makan/Kopi sederhana milik warga sekitar, dan Spot Foto panorama ketinggian.','wisata/Vz6PZKD2va0ZG3lUZm2j37vzMJYTS8GDYaun7obn.jpg',1,0,NULL,'2026-07-22 04:26:32','2026-07-22 04:26:32'),(11,'Air Terjun Tirtosari','air-terjun-tirtosari','Alam','Plaosan','Desa Ngancar, Kecamatan Plaosan, Kabupaten Magetan, Jawa Timur.','-7.679','111.2297','https://maps.google.com/?q=Air+Terjun+Tirtosari+Magetan',10000.00,'07.00 - 17.00 WIB','Air Terjun Tirtosari atau dikenal juga sebagai Grojogan Tirtosari merupakan salah satu destinasi wisata alam unggulan di Kabupaten Magetan. Air terjun ini memiliki ketinggian sekitar 50 meter dengan aliran air yang jernih dan suasana pegunungan yang sejuk. Lokasinya berada di kaki Gunung Lawu sehingga dikelilingi pepohonan hijau yang masih alami. Pengunjung dapat menikmati pemandangan alam, berfoto, serta berjalan melalui jalur trekking yang telah disediakan. Destinasi ini sangat cocok untuk wisata keluarga maupun pecinta alam yang ingin menikmati suasana tenang dan udara segar.','Area parkir\nToilet\nMushola\nWarung makan\nGazebo\nJalur trekking\nSpot foto','wisata/yKxlwxEMjyaTkf4WMPOqTWmezj01xVYiD0rmnW1a.webp',1,0,NULL,'2026-07-28 03:32:43','2026-07-28 03:32:43'),(12,'Taman Bunga Refugia','taman-bunga-refugia','Buatan','Plaosan','Jl. Raya Sarangan, Plaosan II, Plaosan, Kec. Plaosan, Kabupaten Magetan, Jawa Timur','-7.6813677','111.2535154','https://maps.app.goo.gl/Am5unTEq3zkcnZg2A',10000.00,'08.00 - 17.00 WIB','Taman Bunga Refugia adalah hamparan bunga warna-warni yang tertata rapi membentuk lautan warna di antara udara sejuk khas pegunungan. Refugia juga dikenal sebagai wisata edukatif berbasis agrowisata, di mana pengunjung, khususnya anak-anak dapat belajar tentang proses menanam dan mengenal berbagai jenis tanaman hortikultura.Ada pula taman kelinci, tempat anak-anak bisa berinteraksi langsung dengan hewan lucu tersebut, memberi makan, atau berfoto di depan ikon patung kelinci yang menjadi simbol taman. Selain itu, terdapat menara pandang setinggi 15 meter yang memungkinkan pengunjung menikmati panorama Magetan dari ketinggian.Beberapa gazebo disediakan untuk bersantai sambil menikmati camilan atau hidangan ringan dari warung sekitar. Bagi rombongan sekolah atau kantor, tersedia pula area outbound yang bisa digunakan untuk kegiatan kelompok dan permainan edukatif','Parkir, Toilet, Warung Makan, Gazebo, Area Outbound, Spot Foto','wisata/kENGLrHJUp6l84rggdYkbHBSiwygQyKexuLUt1Gk.jpg',1,1,'2026-08-18 03:41:43','2026-08-03 02:05:10','2026-08-18 03:41:43'),(13,'Telaga Wahyu','telaga-wahyu','Alam','Plaosan','Plaosan III, Plaosan, Kec. Plaosan, Kabupaten Magetan, Jawa Timur','-7.681498','111.250550','https://maps.app.goo.gl/XofZBN4jnq6MnzvHA',5000.00,'08.00 - 18.00 WIB (Catatan: Wisata ini buka setiap hari dari pagi hingga menjelang petang).','Telaga wahyu dulunya bernama Telaga Wurung. Dinamai demikian karena terdapat mitos bahwa jika sepasang kekasih pergi ke sini, maka cepat atau lambat hubungan mereka akan berakhir. Nama Wurung berasal dari kata urung. Guna menghilangkan kekhawatiran pengunjung, maka nama Telaga Wurung diganti menjadi Telaga Wahyu. Mitos itu pun sebenarnya tidak terbukti dan hanya merupakan alasan bagi pasangan yang memang sudah ingin mengakhiri hubungan. Telaga wahyu digunakan untuk memancing ikan','Area Parkir Kendaraan, Toilet Umum, Warung Kuliner Tradisional, Wahana Becak Air (Perahu Bebek), Spot Memancing, Gazebo, Area Berkemah (Camping Ground).','wisata/lu2yNxYIVI1yNiPfXZkfcvGre9a4Zz2VfO3Edf6p.png',1,0,NULL,'2026-08-03 02:17:00','2026-08-06 05:38:49'),(14,'Lawu Green Forest (LGF) Magetan','lawu-green-forest-lgf-magetan','Alam','Plaosan','Jl. Sarangan-Cemorosewu Km, Kali Jumok, Sarangan, Kec. Plaosan, Kabupaten Magetan, Jawa Timur','-7.663707','111.218171','https://maps.app.goo.gl/NUAa5ZSa64rH8qCe8',20000.00,'08.00 - 17.00 WIB','Lawu green forest merupakan wisata alam dengan latar belakang pepohonan pinus yang asri, berada di kawasan pegunungan. Memiliki daya tarik wisata berkemah dengan nuansa alam hutan pinus, bermain outbound dengan konsep edukasi dan outdoor creative program activity ( Fun Outdoor, Educational Fun Outdoor Program, dan Fun Develop Outdoor Activity Program), wahana rainbow slide, bangunan/spot foto unik-unik instagramable, jeep dan atv, kampung jepang, dan taman bunga.','Area Parkir Luas, Toilet, Mushola, Restoran, Villa & Glamping, Rainbow Slide, Tamiya Coaster, Wahana Miniatur Dunia, Outbound & Camping Ground.','wisata/0iOSV09ArBZR9HpEn53hRLwu9ljQcXi1YYZiOLkW.webp',1,1,'2026-08-18 03:41:26','2026-08-03 03:21:41','2026-08-18 03:41:26'),(15,'Wisata Sorbendo','wisata-sorbendo','Desa','Panekan','Jl. Tirto Mudo, Blanten, Sumberdodol, Panekan, Kabupaten Magetan, Jawa Timur 63352','-7.63056','111.27917','https://maps.app.goo.gl/BwUUUkQTYRUuZ2FGA',0.00,'08.00 - 17.00 WIB','Wisata Sorbendo merupakan destinasi wisata alam/desa yang berada di Desa Sumberdodol, Kecamatan Panekan, Kabupaten Magetan, Jawa Timur. Berada di kawasan lereng Gunung Lawu, Sorbendo menawarkan suasana pedesaan yang sejuk, asri, dan tenang dengan sumber air yang jernih. Salah satu daya tarik utama Sorbendo adalah kolam alami yang dihuni ikan koi. Pengunjung dapat menikmati terapi ikan dengan merendam kaki sambil memberi makan ikan. Tersedia pula gazebo, jembatan bambu, spot foto, serta perahu kecil yang dapat digunakan untuk menikmati suasana kolam. Sorbendo sangat cocok untuk wisata keluarga karena menawarkan suasana alam yang santai dan ramah untuk anak-anak. Selain menikmati wisata air dan ikan koi, pengunjung juga dapat menikmati kuliner serta produk UMKM masyarakat sekitar.Wisata Sorbendo merupakan bagian dari potensi Desa Wisata Sumberdodol yang mengembangkan wisata berbasis alam, masyarakat, perikanan, budaya, dan edukasi.','Gazebo, spot foto, kuliner/UMKM','wisata/PFu0knDSxcvRZMMGxChYNhbGABBLi7UJLrm6jG8L.jpg',1,0,NULL,'2026-08-10 02:21:13','2026-08-18 01:18:27'),(16,'Wisata Lembah Serimpi','wisata-lembah-serimpi','Desa','Plaosan','Desa Randugede, Kecamatan Plaosan, Kabupaten Magetan, Jawa Timur','-7.671234','111.321234','https://maps.app.goo.gl/sKp8HvCQMVEwrbDD8',7500.00,'08.00-17.00 WIB (Buka Setiap Hari)','Wisata Lembah Serimpi merupakan destinasi wisata alam yang berada di Desa Randugede, Kecamatan Plaosan, Kabupaten Magetan. Wisata ini menawarkan suasana pedesaan yang asri dengan udara sejuk serta wahana kolam renang untuk anak-anak dan dewasa. Tersedia pula berbagai fasilitas seperti resto dan kuliner, permainan anak, pendopo, gazebo, area outbound, dan camping ground sehingga cocok untuk rekreasi bersama keluarga.','Kolam Renang Anak, Kolam Renang Dewasa, Resto dan Kuliner, Gazebo, Pendopo, Permainan Anak, Area Outbound, Area Parkir, Toilet','wisata/adMCltUcYKV3bnxkEffykQYSGNlgrXEj5Pv2VeXu.jpg',1,0,NULL,'2026-08-10 02:40:26','2026-08-10 02:40:26'),(17,'Kolam Renang Banyu Biru','kolam-renang-banyu-biru','Buatan','Sukomoro','Jl. Raya Maospati - Magetan, Dusun Babatan, Desa Tinap, Kecamatan Sukomoro, Kabupaten Magetan, Jawa Timur','-7.619897','111.387573','https://maps.app.goo.gl/4iqupLoHiGYjwrfi8',10000.00,'07.30 - 16.30 WIB (Buka Setiap Hari)','Kolam Renang Banyu Biru merupakan salah satu destinasi wisata rekreasi keluarga yang berada di Desa Tinap, Kecamatan Sukomoro, Kabupaten Magetan. Berlokasi di jalur utama Maospati–Magetan, tempat ini mudah dijangkau dan menawarkan berbagai aktivitas rekreasi air untuk anak-anak maupun orang dewasa. Selain kolam renang, Banyu Biru juga dilengkapi dengan berbagai wahana permainan anak dan kebun binatang mini. Suasana yang nyaman serta beragam fasilitas membuat Banyu Biru cocok sebagai tempat berlibur dan menghabiskan waktu bersama keluarga.','Kolam Renang Anak, Kolam Renang Dewasa, Waterboom, Wahana Permainan Anak, Kebun Binatang Mini, Area Pemancingan, Playground, Warung Makan, Kantin, Kamar Mandi, Kamar Ganti, Mushola, Area Parkir','wisata/qhmY1YEiEKblm7ZCszf0Uql6pYlDZwwt4vhBYlnD.jpg',1,0,NULL,'2026-08-10 02:45:08','2026-08-10 02:59:23'),(18,'Taman Wisata Desa Jabung','taman-wisata-desa-jabung','Desa','Panekan','RT.01/RW.01, Dusun Bulusari, Desa Jabung, Kecamatan Panekan, Kabupaten Magetan, Jawa Timur 63352','-7.60860987045986','111.275918473935','https://maps.app.goo.gl/qmy2k8pUwdE7CXEN9',10000.00,'08.00 - 17.00 WIB (Buka Setiap Hari)','Taman Wisata Desa Jabung merupakan destinasi wisata keluarga yang berada di Dusun Bulusari, Desa Jabung, Kecamatan Panekan, Kabupaten Magetan. Berada di kawasan kaki Gunung Lawu, tempat ini menawarkan suasana alam yang asri, udara sejuk, pepohonan rindang, serta pemandangan persawahan. Pengunjung dapat menikmati berbagai aktivitas seperti berenang, memancing, outbound, bermain bersama keluarga, dan menikmati kuliner. Taman Wisata Desa Jabung cocok menjadi tempat rekreasi keluarga, kegiatan sekolah, maupun kegiatan kelompok dengan suasana alam yang nyaman.','Kolam Renang, Pemancingan Keluarga, Area Outbound, Area Parkir, Balai Pertemuan, Cafeteria, Tempat Makan, Area Kuliner, Mushola, Kamar Mandi Umum, Selfie Area, Spot Foto, Wifi Area','wisata/MI8YNoAxtU6zRAUnNPZfzB2ikt3x3LBNhxV1C6rn.jpg',1,0,NULL,'2026-08-10 02:53:02','2026-08-10 02:53:02'),(19,'Magetan Green Garden','magetan-green-garden','Alam','Sukomoro','Menggolo, Desa Truneng, Kecamatan Sukomoro, Kabupaten Magetan, Jawa Timur 63391','-7.603802368081757','111.35174629483153','https://maps.app.goo.gl/PokMxrCFD9ugE6xT6',5000.00,'07.30 - 17.00 WIB (Buka Setiap Hari)','Magetan Green Garden merupakan destinasi agrowisata yang berada di Desa Truneng, Kecamatan Sukomoro, Kabupaten Magetan. Wisata ini menawarkan suasana pedesaan yang asri dengan berbagai tanaman bunga, tanaman buah, dan area pertanian yang dapat menjadi sarana rekreasi sekaligus edukasi bagi pengunjung. Salah satu daya tariknya adalah keindahan bunga matahari serta berbagai spot foto yang menarik. Pengunjung juga dapat menikmati area outbound, permainan, dan kegiatan wisata edukasi mengenai tanaman. Magetan Green Garden cocok dikunjungi bersama keluarga, teman, maupun rombongan.','Area Parkir, Pusat Informasi, Warung Wisata, Mushola, Toilet Umum, Area Outbound, Kolam Renang, Wahana Permainan, Spot Foto, Taman Bermain, Gazebo, Gardu Pandang','wisata/Etjk32H7NUpCpKsMzRBjxey9omnslSrdX6chPzGt.jpg',1,0,NULL,'2026-08-10 03:03:49','2026-08-10 03:03:49'),(20,'Kolam Renang Sumber Barokah','kolam-renang-sumber-barokah','Buatan','Kawedanan','Desa Sugihrejo, Kecamatan Kawedanan, Kabupaten Magetan, Jawa Timur','-7.665681066249545','111.37571084880196','https://maps.app.goo.gl/QqWgJXxKsSLn9CHNA',7000.00,'08.00 - 17.00 WIB (Buka Setiap Hari)','Kolam Renang Sumber Barokah merupakan destinasi wisata rekreasi keluarga yang berada di Desa Sugihrejo, Kecamatan Kawedanan, Kabupaten Magetan. Tempat wisata ini menawarkan kolam renang untuk anak-anak dan dewasa dengan suasana yang nyaman untuk berenang dan bermain bersama keluarga. Selain kolam renang, tersedia berbagai permainan anak serta fasilitas pendukung yang membuat tempat ini cocok untuk menghabiskan waktu liburan bersama keluarga. Lokasinya berada di jalur Madigondo–Magetan sehingga cukup mudah dijangkau oleh wisatawan dari berbagai wilayah di Kabupaten Magetan.','Kolam Renang Dewasa, Kolam Renang Anak, Permainan Anak, Area Bermain, Kamar Mandi, Kamar Ganti, Toilet, Area Parkir, Tempat Istirahat','wisata/f24AurvOLVzucJ4GK4KNw6z9omiN1TU0sMNkYMpU.jpg',1,0,NULL,'2026-08-10 03:08:19','2026-08-20 01:53:35'),(21,'Soheden','soheden','Desa','Bendo','Desa Soco, Kecamatan Bendo, Kabupaten Magetan, Jawa Timur 63384','-7.648511158126668','111.44620257763756','https://maps.app.goo.gl/c3qyWMXevEJxmGay9',7000.00,'08.00 - 16.00 WIB (Buka Setiap Hari)','Soheden atau Soco Herbal Garden merupakan destinasi wisata edukasi yang berada di Desa Soco, Kecamatan Bendo, Kabupaten Magetan. Wisata ini mengusung konsep taman edukasi dengan berbagai tanaman herbal dan lingkungan pedesaan yang asri. Pengunjung dapat mengenal berbagai tanaman obat, menikmati kolam renang, serta bermain dan belajar melalui berbagai fasilitas edukatif yang tersedia. Soheden cocok sebagai tempat rekreasi keluarga sekaligus sarana edukasi bagi anak-anak dan pelajar untuk mengenal tanaman herbal dan lingkungan sekitar.','Taman Herbal, Kolam Renang Anak, Taman Bermain, Wahana Edukasi, Perpustakaan, Taman Baca, Area Bermain Anak, Gazebo, Area Parkir, Toilet, Tempat Istirahat','wisata/auasiiKJ27c5XsQAkAzOH3Ne4MGp7nfODIMHUeKD.jpg',1,0,NULL,'2026-08-10 03:12:32','2026-08-20 02:07:19');
/*!40000 ALTER TABLE `wisatas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `wisata_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wishlists_user_id_wisata_id_unique` (`user_id`,`wisata_id`),
  KEY `wishlists_wisata_id_foreign` (`wisata_id`),
  CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlists_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (2,3,1,'2026-08-02 14:58:05','2026-08-02 14:58:05'),(3,3,2,'2026-08-02 15:28:51','2026-08-02 15:28:51'),(4,3,14,'2026-08-04 02:40:45','2026-08-04 02:40:45'),(5,3,12,'2026-08-10 07:53:19','2026-08-10 07:53:19'),(6,5,1,'2026-08-12 04:34:28','2026-08-12 04:34:28');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-20 11:30:05

-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: harivyasNikunja
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.22.04.1

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
-- Table structure for table `component_templates`
--

DROP TABLE IF EXISTS `component_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `component_templates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `component_templates`
--

LOCK TABLES `component_templates` WRITE;
/*!40000 ALTER TABLE `component_templates` DISABLE KEYS */;
INSERT INTO `component_templates` VALUES (1,'button','Primary CTA Button','<button class=\"btn btn-primary\">Click Me</button>','\"{\\\"text\\\":\\\"Click Me\\\"}\"','2025-05-29 10:30:52','2025-05-29 10:30:52'),(2,'card','Simple Info Card','<div class=\"card bg-base-100 shadow-md p-4\"><h2 class=\"card-title\">Title</h2><p>Some info here.</p></div>','\"{\\\"title\\\":\\\"Title\\\",\\\"content\\\":\\\"Some info here.\\\"}\"','2025-05-29 10:30:52','2025-05-29 10:30:52'),(3,'alert','Warning Alert','<div class=\"alert alert-warning\">Warning message!</div>','\"{\\\"message\\\":\\\"Warning message!\\\"}\"','2025-05-29 10:30:52','2025-05-29 10:30:52'),(4,'badge','Status Badge','<span class=\"badge badge-success\">Active</span>','\"{\\\"text\\\":\\\"Active\\\"}\"','2025-05-29 10:30:52','2025-05-29 10:30:52'),(5,'navbar','Basic Navbar','<div class=\"navbar bg-base-200\"><a class=\"btn btn-ghost normal-case text-xl\">Harivyas Nikunja</a></div>',NULL,'2025-05-29 10:30:52','2025-05-29 10:30:52'),(6,'button','Accent','<button class=\"btn btn-outline btn-accent\">Accent</button>','\"{\\n    \\\"text\\\": \\\"Click Me\\\"\\n}\"','2025-05-29 15:40:01','2025-05-29 15:40:01'),(7,'button','Button with icon','<button class=\"btn btn-square\">\n  <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"2.5\" stroke=\"currentColor\" class=\"size-[1.2em]\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z\" /></svg>\n</button>','\"[]\"','2025-05-29 16:56:13','2025-05-29 16:56:13'),(8,'button','Error','<button class=\"btn btn-dash btn-error\">Error</button>','\"{\\\"button[0].text\\\":\\\"Error\\\"}\"','2025-05-29 16:58:09','2025-05-29 16:58:09'),(9,'card','Normal Card','<div class=\"card bg-base-100 w-96 shadow-sm\">\n  <figure>\n    <img\n      src=\"https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp\"\n      alt=\"Shoes\" />\n  </figure>\n  <div class=\"card-body\">\n    <h2 class=\"card-title\">Card Title</h2>\n    <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>\n    <div class=\"card-actions justify-end\">\n      <button class=\"btn btn-primary\">Buy Now</button>\n    </div>\n  </div>\n</div>','\"{\\\"h2[0].text\\\":\\\"Card Title\\\",\\\"p[0].text\\\":\\\"A card component has a figure, a body part, and inside body there are title and actions parts\\\",\\\"button[0].text\\\":\\\"Buy Now\\\",\\\"div[0].text\\\":\\\"Card Title\\\\n    A card component has a figure, a body part, and inside body there are title and actions parts\\\\n    \\\\n      Buy Now\\\",\\\"div[1].text\\\":\\\"Card Title\\\\n    A card component has a figure, a body part, and inside body there are title and actions parts\\\\n    \\\\n      Buy Now\\\",\\\"div[2].text\\\":\\\"Buy Now\\\",\\\"img[0].src\\\":\\\"https:\\\\/\\\\/img.daisyui.com\\\\/images\\\\/stock\\\\/photo-1606107557195-0e29a4b5b4aa.webp\\\",\\\"img[0].alt\\\":\\\"Shoes\\\"}\"','2025-05-29 17:00:05','2025-05-29 17:00:05'),(10,'card','Pricing Card','<div class=\"card w-96 bg-base-100 shadow-sm\">\n  <div class=\"card-body\">\n    <span class=\"badge badge-xs badge-warning\">Most Popular</span>\n    <div class=\"flex justify-between\">\n      <h2 class=\"text-3xl font-bold\">Premium</h2>\n      <span class=\"text-xl\">$29/mo</span>\n    </div>\n    <ul class=\"mt-6 flex flex-col gap-2 text-xs\">\n      <li>\n        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"size-4 me-2 inline-block text-success\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\" /></svg>\n        <span>High-resolution image generation</span>\n      </li>\n      <li>\n        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"size-4 me-2 inline-block text-success\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\" /></svg>\n        <span>Customizable style templates</span>\n      </li>\n      <li>\n        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"size-4 me-2 inline-block text-success\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\" /></svg>\n        <span>Batch processing capabilities</span>\n      </li>\n      <li>\n        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"size-4 me-2 inline-block text-success\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\" /></svg>\n        <span>AI-driven image enhancements</span>\n      </li>\n      <li class=\"opacity-50\">\n        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"size-4 me-2 inline-block text-base-content/50\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\" /></svg>\n        <span class=\"line-through\">Seamless cloud integration</span>\n      </li>\n      <li class=\"opacity-50\">\n        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"size-4 me-2 inline-block text-base-content/50\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\" /></svg>\n        <span class=\"line-through\">Real-time collaboration tools</span>\n      </li>\n    </ul>\n    <div class=\"mt-6\">\n      <button class=\"btn btn-primary btn-block\">Subscribe</button>\n    </div>\n  </div>\n</div>','\"{\\\"h2[0].text\\\":\\\"Premium\\\",\\\"span[0].text\\\":\\\"Most Popular\\\",\\\"span[1].text\\\":\\\"$29\\\\/mo\\\",\\\"span[2].text\\\":\\\"High-resolution image generation\\\",\\\"span[3].text\\\":\\\"Customizable style templates\\\",\\\"span[4].text\\\":\\\"Batch processing capabilities\\\",\\\"span[5].text\\\":\\\"AI-driven image enhancements\\\",\\\"span[6].text\\\":\\\"Seamless cloud integration\\\",\\\"span[7].text\\\":\\\"Real-time collaboration tools\\\",\\\"button[0].text\\\":\\\"Subscribe\\\",\\\"li[0].text\\\":\\\"High-resolution image generation\\\",\\\"li[1].text\\\":\\\"Customizable style templates\\\",\\\"li[2].text\\\":\\\"Batch processing capabilities\\\",\\\"li[3].text\\\":\\\"AI-driven image enhancements\\\",\\\"li[4].text\\\":\\\"Seamless cloud integration\\\",\\\"li[5].text\\\":\\\"Real-time collaboration tools\\\",\\\"div[0].text\\\":\\\"Most Popular\\\\n    \\\\n      Premium\\\\n      $29\\\\/mo\\\\n    \\\\n    \\\\n      \\\\n        \\\\n        High-resolution image generation\\\\n      \\\\n      \\\\n        \\\\n        Customizable style templates\\\\n      \\\\n      \\\\n        \\\\n        Batch processing capabilities\\\\n      \\\\n      \\\\n        \\\\n        AI-driven image enhancements\\\\n      \\\\n      \\\\n        \\\\n        Seamless cloud integration\\\\n      \\\\n      \\\\n        \\\\n        Real-time collaboration tools\\\\n      \\\\n    \\\\n    \\\\n      Subscribe\\\",\\\"div[1].text\\\":\\\"Most Popular\\\\n    \\\\n      Premium\\\\n      $29\\\\/mo\\\\n    \\\\n    \\\\n      \\\\n        \\\\n        High-resolution image generation\\\\n      \\\\n      \\\\n        \\\\n        Customizable style templates\\\\n      \\\\n      \\\\n        \\\\n        Batch processing capabilities\\\\n      \\\\n      \\\\n        \\\\n        AI-driven image enhancements\\\\n      \\\\n      \\\\n        \\\\n        Seamless cloud integration\\\\n      \\\\n      \\\\n        \\\\n        Real-time collaboration tools\\\\n      \\\\n    \\\\n    \\\\n      Subscribe\\\",\\\"div[2].text\\\":\\\"Premium\\\\n      $29\\\\/mo\\\",\\\"div[3].text\\\":\\\"Subscribe\\\"}\"','2025-05-29 17:04:28','2025-05-29 17:04:28'),(11,'navbar','navbar 2','<div class=\"navbar bg-base-100 shadow-sm\">\n  <div class=\"flex-none\">\n    <button class=\"btn btn-square btn-ghost\">\n      <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" class=\"inline-block h-5 w-5 stroke-current\"> <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M4 6h16M4 12h16M4 18h16\"></path> </svg>\n    </button>\n  </div>\n  <div class=\"flex-1\">\n    <a class=\"btn btn-ghost text-xl\">daisyUI</a>\n  </div>\n  <div class=\"flex-none\">\n    <button class=\"btn btn-square btn-ghost\">\n      <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" class=\"inline-block h-5 w-5 stroke-current\"> <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z\"></path> </svg>\n    </button>\n  </div>\n</div>','\"{\\\"a[0].text\\\":\\\"daisyUI\\\",\\\"div[0].text\\\":\\\"daisyUI\\\",\\\"div[2].text\\\":\\\"daisyUI\\\",\\\"a[0].class\\\":\\\"btn btn-ghost text-xl\\\"}\"','2025-05-30 03:44:51','2025-05-30 03:44:51'),(12,'navbar','Navbar with search input and dropdown','<div class=\"navbar bg-base-100 shadow-sm\">\n  <div class=\"flex-1\">\n    <a class=\"btn btn-ghost text-xl\">daisyUI</a>\n  </div>\n  <div class=\"flex gap-2\">\n    <input type=\"text\" placeholder=\"Search\" class=\"input input-bordered w-24 md:w-auto\" />\n    <div class=\"dropdown dropdown-end\">\n      <div tabindex=\"0\" role=\"button\" class=\"btn btn-ghost btn-circle avatar\">\n        <div class=\"w-10 rounded-full\">\n          <img\n            alt=\"Tailwind CSS Navbar component\"\n            src=\"https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp\" />\n        </div>\n      </div>\n      <ul\n        tabindex=\"0\"\n        class=\"menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow\">\n        <li>\n          <a class=\"justify-between\">\n            Profile\n            <span class=\"badge\">New</span>\n          </a>\n        </li>\n        <li><a>Settings</a></li>\n        <li><a>Logout</a></li>\n      </ul>\n    </div>\n  </div>\n</div>','\"{\\\"span[0].text\\\":\\\"New\\\",\\\"a[0].text\\\":\\\"daisyUI\\\",\\\"a[1].text\\\":\\\"Profile\\\\n            New\\\",\\\"a[2].text\\\":\\\"Settings\\\",\\\"a[3].text\\\":\\\"Logout\\\",\\\"li[0].text\\\":\\\"Profile\\\\n            New\\\",\\\"li[1].text\\\":\\\"Settings\\\",\\\"li[2].text\\\":\\\"Logout\\\",\\\"div[0].text\\\":\\\"daisyUI\\\\n  \\\\n  \\\\n    \\\\n    \\\\n      \\\\n        \\\\n          \\\\n        \\\\n      \\\\n      \\\\n        \\\\n          \\\\n            Profile\\\\n            New\\\\n          \\\\n        \\\\n        Settings\\\\n        Logout\\\",\\\"div[1].text\\\":\\\"daisyUI\\\",\\\"div[2].text\\\":\\\"Profile\\\\n            New\\\\n          \\\\n        \\\\n        Settings\\\\n        Logout\\\",\\\"div[3].text\\\":\\\"Profile\\\\n            New\\\\n          \\\\n        \\\\n        Settings\\\\n        Logout\\\",\\\"img[0].alt\\\":\\\"Tailwind CSS Navbar component\\\",\\\"img[0].src\\\":\\\"https:\\\\/\\\\/img.daisyui.com\\\\/images\\\\/stock\\\\/photo-1534528741775-53994a69daeb.webp\\\",\\\"a[0].class\\\":\\\"btn btn-ghost text-xl\\\",\\\"a[1].class\\\":\\\"justify-between\\\",\\\"input[0].type\\\":\\\"text\\\",\\\"input[0].placeholder\\\":\\\"Search\\\",\\\"input[0].class\\\":\\\"input input-bordered w-24 md:w-auto\\\"}\"','2025-05-30 04:16:24','2025-05-30 04:16:24');
/*!40000 ALTER TABLE `component_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `components` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_id` bigint unsigned NOT NULL,
  `component_template_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` json DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `components_page_id_foreign` (`page_id`),
  KEY `components_component_template_id_foreign` (`component_template_id`),
  CONSTRAINT `components_component_template_id_foreign` FOREIGN KEY (`component_template_id`) REFERENCES `component_templates` (`id`) ON DELETE SET NULL,
  CONSTRAINT `components_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (1,1,1,'Hero CTA Button','<button class=\"btn btn-primary\">Get Started</button>','\"{\\\"text\\\":\\\"Get Started\\\"}\"',1,1,'2025-05-29 10:35:14','2025-05-29 10:35:14',NULL),(2,1,2,'Welcome Info Card','<div class=\"card bg-base-100 shadow-md p-4\"><h2 class=\"card-title\">Welcome</h2><p>Welcome to Harivyas Nikunja website.</p></div>','\"{\\\"title\\\":\\\"Welcome\\\",\\\"content\\\":\\\"Welcome to Harivyas Nikunja website.\\\"}\"',2,1,'2025-05-29 10:35:14','2025-05-29 10:35:14',NULL);
/*!40000 ALTER TABLE `components` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_05_29_135104_create_pages_table',2),(5,'2025_05_29_142340_create_component_templates_table',3),(6,'2025_05_29_141029_create_components_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `show_in_nav` tinyint(1) NOT NULL DEFAULT '1',
  `nav_order` int NOT NULL DEFAULT '0',
  `type` enum('static','dynamic') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'static',
  `meta` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_parent_id_foreign` (`parent_id`),
  CONSTRAINT `pages_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,NULL,'Home','home',1,1,1,1,1,'static','{\"title\": \"Welcome to Harivyas Nikunja\"}','2025-05-29 10:07:02','2025-05-29 20:54:16',NULL),(2,NULL,'About','about',1,1,1,1,2,'static','{\"title\": \"About Nimbarka Sampradaya\"}','2025-05-29 10:07:03','2025-05-29 20:54:20',NULL),(3,NULL,'Contact','contact',0,1,1,1,3,'static','{\"title\": \"Contact Us\"}','2025-05-29 10:07:03','2025-05-29 14:05:24','2025-05-29 14:05:24'),(4,NULL,'Parampara','parampara',0,1,1,1,4,'static',NULL,'2025-05-29 14:18:01','2025-05-29 14:18:01',NULL),(5,1,'ppp guu','pppGuu',0,1,1,1,0,'static',NULL,'2025-05-29 20:21:50','2025-05-29 22:13:10',NULL),(6,NULL,'asdf','asdf',0,1,0,1,0,'static',NULL,'2025-05-29 20:22:56','2025-05-29 22:13:18',NULL),(7,NULL,'ljblb','jhgjh',0,1,1,1,0,'static',NULL,'2025-05-29 21:00:37','2025-05-31 11:55:17','2025-05-31 11:55:17'),(8,NULL,'kkk','kkk',0,1,1,1,0,'static',NULL,'2025-05-29 21:06:07','2025-05-29 21:06:07',NULL),(9,8,'lll','lll',0,1,0,1,0,'static',NULL,'2025-05-29 21:06:24','2025-05-31 12:00:42','2025-05-31 12:00:42'),(10,7,'oooo','oooo',0,1,1,1,0,'static',NULL,'2025-05-29 21:07:06','2025-05-29 21:07:06',NULL),(11,5,'heyy','heyy',0,1,1,1,0,'static',NULL,'2025-05-29 22:19:28','2025-05-29 22:19:28',NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
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
INSERT INTO `sessions` VALUES ('5gE1evr2xSTHNfXjWWCFIuz6EAqx7lSUVUM7CKfR',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:138.0) Gecko/20100101 Firefox/138.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQU5GVlRrdGlUTW95dW5lUjJqUW5EVTRwQWdPTXR5OGd2U3pzTjNoYyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL25pbWJhcmthLXNhbXByYWRheWEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6ImxvY2FsZSI7czoyOiJoaSI7fQ==',1749815944),('wxcmV1IjUWZgYfxx9RIPAsINaKrKHPiBMf7y5rry',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:138.0) Gecko/20100101 Firefox/138.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWTNISEJaamlFeWpWMWRFZktDZXV5ZTJ1Wms4RzBaQmZ3bFJycXNucSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyODoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2tpcnRhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1749831985);
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'puskar wagle','admin@admin.com',NULL,'$2y$12$5HTyeIGdm3J1gfAiz2HWQOb0t8jUk6sNUYU5rElboBo3gMjxCJl5S','IOxf70DVFUr4uASPe8lGP3eiDcG4cqhzjySRTYXUIBaP5MZglmYqdiPJ7lXj','2025-05-24 13:23:15','2025-05-24 13:23:15'),(2,'Test User','test@example.com','2025-05-29 09:38:19','$2y$12$/MpjuhdPq0u7/JeQxEG39uFU/hD1u4T3csYbmoZUKdHWCGvZ9nmWm','TTxB3ByRiQ','2025-05-29 09:38:20','2025-05-29 09:38:20'),(4,'Radhe User','readhe@krishna.com','2025-05-29 10:05:37','$2y$12$JNlj8fKZ5PD8eoKcEmQK7OxnAZs2VJz4Y4Yohfhi40DgPDgSBNIiW','4PFbIvwbef','2025-05-29 10:05:39','2025-05-29 10:05:39');
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

-- Dump completed on 2025-06-14 18:12:35

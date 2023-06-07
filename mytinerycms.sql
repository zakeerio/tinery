-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2023 at 05:19 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytinerycms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@sms.com', NULL, '$2a$12$Vzb9uYjf5VNpES60alHFGOV1YN82YKcY8WKEkb4kNk/iFnYccAetu', NULL, '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(2, 'testuser', 'test@gmail.com', NULL, '$2y$10$YUGDqptaWfl1LyncorZJZ./YF9J2E5a72IlPC9FpV8VC1OJjSO0JW', NULL, '2023-05-07 01:03:09', '2023-05-07 20:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Group', '2023-05-12 15:10:02', '2023-05-12 15:10:02'),
(7, 'Foodie', '2023-05-12 15:09:42', '2023-05-12 15:09:42'),
(6, 'Bars', '2023-05-12 15:09:37', '2023-05-12 15:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `itineraries_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_itineraries_id_foreign` (`itineraries_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `itineraries_id`, `created_at`, `updated_at`) VALUES
(1, 'First comment testing here', 6, 4, '2023-05-25 21:30:49', '2023-05-25 21:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `itineraries_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favorites_user_id_foreign` (`user_id`),
  KEY `favorites_itineraries_id_foreign` (`itineraries_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `itineraries_id`, `created_at`, `updated_at`) VALUES
(1, 6, 5, '2023-05-22 06:12:04', '2023-05-22 06:12:04'),
(2, 6, 4, '2023-05-22 06:12:46', '2023-05-22 06:12:46'),
(3, 2, 5, '2023-05-23 02:26:01', '2023-05-23 02:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password_codes`
--

DROP TABLE IF EXISTS `forgot_password_codes`;
CREATE TABLE IF NOT EXISTS `forgot_password_codes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forgot_password_codes`
--

INSERT INTO `forgot_password_codes` (`id`, `email`, `code`, `created_at`, `updated_at`) VALUES
(1, 'umairamjad52@gmail.com', '4257', '2023-06-06 08:55:08', '2023-06-06 08:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

DROP TABLE IF EXISTS `itineraries`;
CREATE TABLE IF NOT EXISTS `itineraries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seo_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `categories` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street_line1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_zipcode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `activities_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `featured` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `visibility` enum('public','private') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `status` enum('published','draft') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duration` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `itineraries_slug_unique` (`slug`),
  KEY `itineraries_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itineraries`
--

INSERT INTO `itineraries` (`id`, `title`, `slug`, `description`, `excerpt`, `seo_title`, `seo_description`, `seo_image`, `user_id`, `categories`, `tags`, `address_street`, `address_street_line1`, `address_city`, `address_state`, `address_zipcode`, `address_country`, `latitude`, `longitude`, `phone`, `website`, `additional_info`, `activities_data`, `featured`, `visibility`, `status`, `created_at`, `updated_at`, `duration`) VALUES
(6, 'Autumn Escape', 'autumn-escape', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. At sed amet dictumst maecenas nisi, volutpat suscipit. Ultrices eget laoreet commodo at', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. At sed amet dictumst maecenas nisi, volutpat suscipit. Ultrices eget laoreet commodo at', 'vfs', 'fdg', '1685405707.png', 12, '[\"8\",\"7\"]', '[\"7\",\"8\",\"9\",\"10\"]', 'Scotland Island NSW, Australia', 'Scotland Island NSW 2105, Australia', 'Scotland', 'New South Wales', '2105', 'Australia', '-33.641844', '151.2934369', '+923331736316', NULL, NULL, NULL, '1', 'public', 'published', '2023-05-22 08:33:55', '2023-05-29 15:01:25', 0),
(7, 'Semester Abroad', 'semester-abroad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. At sed amet dictumst maecenas nisi, volutpat suscipit. Ultrices eget laoreet commodo at', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. At sed amet dictumst maecenas nisi, volutpat suscipit. Ultrices eget laoreet commodo at', 'one', 'one', '1685405834.png', 10, '[\"8\"]', '[\"5\",\"8\",\"9\",\"10\"]', 'Turkey Point, ON, Canada', 'Quebec G0S, Canada', 'Turkey', 'Quebec', 'G0S', 'Canada', '46.4762754', '-71.4429373', NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-05-29 04:52:41', '2023-05-29 15:01:36', 0),
(5, 'My Winter Break 2022', 'my-winter-break-2022', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', 'Title test', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', '1685405564.png', 13, '[\"7\",\"6\"]', '[\"5\",\"6\"]', 'Toronto, ON, Canada', NULL, 'Toronto', NULL, '7899', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-05-15 03:51:13', '2023-05-29 14:28:25', 0),
(4, 'My Spring Break Trip', 'my-spring-break-trip', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', 'My Spring Break Trip', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', '1685405480.png', 6, '[\"6\"]', '[\"1\",\"2\",\"3\"]', 'Mexico City, CDMX, Mexico', 'Toronto, ON, Canada', 'Mexico City', 'Ontario', NULL, 'Canada', '43.653226', '-79.3831843', NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-05-12 10:31:04', '2023-05-29 14:27:59', 0),
(12, 'My winter vacation in 2023', 'my-winter-vacation-in-2023', 'My winter vacation in 2023\r\nMy winter vacation in 2023\r\nMy winter vacation in 2023', NULL, NULL, NULL, '1686066493.png', 4, NULL, '[\"1\"]', 'Istumbol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://mytinery.com', NULL, NULL, '0', 'public', 'published', '2023-06-01 14:00:53', '2023-06-06 10:48:13', 3);

-- --------------------------------------------------------

--
-- Table structure for table `itineraries_tags`
--

DROP TABLE IF EXISTS `itineraries_tags`;
CREATE TABLE IF NOT EXISTS `itineraries_tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_activities`
--

DROP TABLE IF EXISTS `itinerary_activities`;
CREATE TABLE IF NOT EXISTS `itinerary_activities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `itineraries_id` bigint UNSIGNED NOT NULL,
  `tempid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starttime` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endtime` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `itinerary_activities_itineraries_id_foreign` (`itineraries_id`),
  KEY `itinerary_activities_days_id_foreign` (`days_id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary_activities`
--

INSERT INTO `itinerary_activities` (`id`, `itineraries_id`, `tempid`, `days_id`, `title`, `starttime`, `endtime`, `description`, `location`, `created_at`, `updated_at`) VALUES
(103, 4, '', 30, NULL, '19:59', '19:00', 'Onde sds', NULL, '2023-05-29 09:57:01', '2023-05-29 09:58:25'),
(96, 7, '', 29, 'Way to clifton', '19:52', '19:53', 'Filter by location, trip length, tag or user. Don’t see your location? New itineraries are added by users everyday - or take it upon yourself to write the first one!', NULL, '2023-05-29 09:48:29', '2023-06-03 07:43:22'),
(100, 7, '', 29, 'Way to clifton 2', '19:51', '19:54', 'New itineraries are added by users everyday - or take it upon yourself to write the first one!', NULL, '2023-05-29 09:49:12', '2023-06-03 07:43:24'),
(104, 11, NULL, 33, NULL, NULL, NULL, NULL, NULL, '2023-05-30 04:11:05', '2023-05-30 04:11:05'),
(105, 10, NULL, 31, 'Way to clifton 2', '18:19', '18:18', 'test', NULL, '2023-05-30 08:08:32', '2023-05-30 08:16:00'),
(110, 12, NULL, 37, NULL, NULL, NULL, NULL, NULL, '2023-06-01 14:14:35', '2023-06-01 14:14:35'),
(109, 12, NULL, 37, NULL, NULL, NULL, NULL, NULL, '2023-06-01 14:01:07', '2023-06-01 14:01:07'),
(114, 12, NULL, 40, NULL, NULL, NULL, NULL, NULL, '2023-06-06 06:27:19', '2023-06-06 06:27:19'),
(113, 12, NULL, 40, NULL, NULL, NULL, NULL, NULL, '2023-06-06 06:27:17', '2023-06-06 06:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_days`
--

DROP TABLE IF EXISTS `itinerary_days`;
CREATE TABLE IF NOT EXISTS `itinerary_days` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `itineraries_id` bigint UNSIGNED NOT NULL,
  `tempid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `itinerary_days_itineraries_id_foreign` (`itineraries_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary_days`
--

INSERT INTO `itinerary_days` (`id`, `itineraries_id`, `tempid`, `date`, `created_at`, `updated_at`) VALUES
(29, 7, '', '2023-05-18', '2023-05-29 09:48:17', '2023-05-29 09:59:01'),
(30, 4, '', '2023-05-12', '2023-05-29 09:56:56', '2023-05-29 09:58:25'),
(31, 10, NULL, NULL, '2023-05-30 08:08:19', '2023-05-30 08:08:19'),
(32, 10, NULL, NULL, '2023-05-30 08:08:19', '2023-05-30 08:08:19'),
(33, 10, NULL, NULL, '2023-05-30 08:08:19', '2023-05-30 08:08:19'),
(34, 11, NULL, NULL, '2023-05-30 08:27:57', '2023-05-30 08:27:57'),
(35, 11, NULL, NULL, '2023-05-30 08:27:57', '2023-05-30 08:27:57'),
(36, 10, NULL, NULL, '2023-05-30 08:28:44', '2023-05-30 08:28:44'),
(37, 12, NULL, NULL, '2023-06-01 14:00:53', '2023-06-01 14:00:53'),
(38, 12, NULL, NULL, '2023-06-01 14:00:53', '2023-06-01 14:00:53'),
(40, 12, NULL, NULL, '2023-06-06 06:26:58', '2023-06-06 06:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_galleries`
--

DROP TABLE IF EXISTS `itinerary_galleries`;
CREATE TABLE IF NOT EXISTS `itinerary_galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `itineraryid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary_galleries`
--

INSERT INTO `itinerary_galleries` (`id`, `itineraryid`, `image`, `created_at`, `updated_at`) VALUES
(1, '12', '168607076678.png', '2023-06-06 11:59:26', '2023-06-06 11:59:26'),
(2, '12', '1686070766100.png', '2023-06-06 11:59:26', '2023-06-06 11:59:26'),
(3, '12', '168607076624.png', '2023-06-06 11:59:26', '2023-06-06 11:59:26'),
(4, '12', '168607076688.png', '2023-06-06 11:59:26', '2023-06-06 11:59:26'),
(5, '12', '16860707661.png', '2023-06-06 11:59:26', '2023-06-06 11:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `like_dislikes`
--

DROP TABLE IF EXISTS `like_dislikes`;
CREATE TABLE IF NOT EXISTS `like_dislikes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` enum('like','dislike') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `like_dislikes_user_id_foreign` (`user_id`),
  KEY `like_dislikes_comment_id_foreign` (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_dislikes`
--

INSERT INTO `like_dislikes` (`id`, `type`, `user_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(1, 'dislike', 4, 1, '2023-05-25 16:39:59', '2023-05-25 16:40:13'),
(4, 'like', 4, 1, '2023-05-26 09:13:47', '2023-05-26 09:13:47'),
(3, 'like', 4, 1, '2023-05-26 01:37:48', '2023-05-26 01:37:48'),
(5, 'like', 4, 1, '2023-05-26 10:04:26', '2023-05-26 10:04:26'),
(6, 'like', 4, 1, '2023-05-26 10:06:15', '2023-05-26 10:06:15'),
(7, 'like', 4, 1, '2023-05-26 13:15:26', '2023-05-26 13:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_admins_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_07_12_095310_create_permission_tables', 1),
(6, '2021_07_17_042336_create_settings_table', 1),
(7, '2023_05_07_151701_create_itineraries_table', 2),
(11, '2023_05_07_151842_create_tags_table', 3),
(12, '2023_05_07_151917_create_categories_table', 3),
(13, '2023_05_12_064531_create_itineraries_categories_table', 4),
(14, '2023_05_12_064818_create_itineraries_tags_table', 5),
(15, '2023_05_21_151302_add_columns_to_itineraries_table', 6),
(16, '2023_05_21_191510_create_favorites_table', 7),
(17, '2023_05_25_205146_create_comments_table', 8),
(18, '2023_05_25_205228_create_like_dislikes_table', 8),
(20, '2023_05_27_201940_create_itinerary_days_table', 9),
(21, '2023_05_27_202414_create_itinerary_activities_table', 10),
(22, '2023_06_01_124825_create_forgot_password_codes_table', 11),
(23, '2023_06_01_145624_add_deleted_at_to_users_table', 12),
(24, '2023_06_06_164410_create_itinerary_galleries_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(62, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Itineraries', 1),
(2, 'App\\Models\\Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-create', 'admin', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(2, 'role-store', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(3, 'role-edit', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(4, 'role-update', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(5, 'role-show', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(6, 'role-destroy', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(7, 'role-index', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(8, 'permission-create', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(9, 'permission-store', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(10, 'permission-edit', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(11, 'permission-update', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(12, 'permission-show', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(13, 'permission-destroy', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(14, 'permission-index', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(15, 'adminuser-create', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(16, 'adminuser-store', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(17, 'adminuser-edit', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(18, 'adminuser-update', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(19, 'adminuser-show', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(20, 'adminuser-destroy', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(21, 'adminuser-index', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(22, 'filemanager-content', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(23, 'filemanager-createDirectory', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(24, 'filemanager-createFile', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(25, 'filemanager-delete', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(26, 'filemanager-download', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(27, 'filemanager-fmButton', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(28, 'filemanager-initialize', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(29, 'filemanager-paste', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(30, 'filemanager-preview', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(31, 'filemanager-rename', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(32, 'filemanager-selectDisk', 'admin', '2023-05-07 00:55:52', '2023-05-07 00:55:52'),
(33, 'filemanager-streamFile', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(34, 'filemanager-thumbnails', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(35, 'filemanager-tree', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(36, 'filemanager-unzip', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(37, 'filemanager-updateFile', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(38, 'filemanager-upload', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(39, 'filemanager-url', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(40, 'filemanager-zip', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(41, 'admin-index', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(42, 'admin-media', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(43, 'setting-index', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(44, 'setting-update', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(45, 'setting-themeSetting', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(95, 'tags-update', 'admin', '2023-05-12 15:06:40', '2023-05-12 15:06:40'),
(94, 'tags-edit', 'admin', '2023-05-12 15:06:34', '2023-05-12 15:06:34'),
(88, 'categories-index', 'admin', '2023-05-12 14:08:51', '2023-05-12 14:08:51'),
(91, 'categories-update', 'admin', '2023-05-12 14:53:31', '2023-05-12 14:53:31'),
(90, 'categories-edit', 'admin', '2023-05-12 14:45:09', '2023-05-12 14:45:09'),
(89, 'categories-store', 'admin', '2023-05-12 14:33:14', '2023-05-12 14:33:14'),
(85, 'itineraries-index', 'admin', '2023-05-10 01:31:14', '2023-05-10 01:31:14'),
(68, 'itineraries-show', 'admin', '2023-05-09 05:26:57', '2023-05-10 01:26:12'),
(67, 'itineraries-create', 'admin', '2023-05-09 05:26:53', '2023-05-09 08:23:47'),
(66, 'itineraries-edit', 'admin', '2023-05-09 05:26:46', '2023-05-09 08:23:58'),
(65, 'itineraries-destroy', 'admin', '2023-05-09 05:26:39', '2023-05-09 08:24:09'),
(93, 'tags-create', 'admin', '2023-05-12 15:06:20', '2023-05-12 15:06:20'),
(79, 'tags-index', 'admin', '2023-05-09 05:29:21', '2023-05-12 15:01:08'),
(80, 'Blog-Destroy', 'admin', '2023-05-09 05:29:31', '2023-05-09 05:29:31'),
(81, 'Blog-Edit', 'admin', '2023-05-09 05:29:42', '2023-05-09 05:29:42'),
(82, 'Blog-Create', 'admin', '2023-05-09 05:29:53', '2023-05-09 05:29:53'),
(83, 'Blog-Index', 'admin', '2023-05-09 05:30:02', '2023-05-09 05:30:02'),
(84, 'itineraries-store', 'admin', '2023-05-09 08:28:05', '2023-05-09 08:28:05'),
(86, 'itineraries-update', 'admin', '2023-05-10 02:42:58', '2023-05-10 02:42:58'),
(92, 'categories-destroy', 'admin', '2023-05-12 14:55:02', '2023-05-12 14:55:02'),
(96, 'tags-destroy', 'admin', '2023-05-12 15:06:47', '2023-05-12 15:06:47'),
(97, 'tags-store', 'admin', '2023-05-12 15:07:17', '2023-05-12 15:07:17'),
(98, 'users-index', 'admin', '2023-05-24 13:01:22', '2023-05-24 13:01:22'),
(99, 'users-create', 'admin', '2023-05-24 13:12:52', '2023-05-24 13:12:52'),
(100, 'users-store', 'admin', '2023-05-24 13:30:32', '2023-05-24 13:30:32'),
(101, 'users-edit', 'admin', '2023-05-24 14:47:05', '2023-05-24 14:47:05'),
(102, 'users-update', 'admin', '2023-05-24 14:48:52', '2023-05-24 14:48:52'),
(103, 'users-show', 'admin', '2023-05-24 14:59:58', '2023-05-24 14:59:58'),
(104, 'users-destroy', 'admin', '2023-05-24 15:00:05', '2023-05-24 15:00:05'),
(107, 'itineraries-createload', 'admin', '2023-05-28 06:27:53', '2023-05-28 06:27:53'),
(108, 'itineraries-additineraryday', 'admin', '2023-05-28 11:01:52', '2023-05-28 11:01:52'),
(109, 'itineraries-showitinerarydays', 'admin', '2023-05-28 11:25:36', '2023-05-28 11:25:36'),
(110, 'itineraries-deleteday', 'admin', '2023-05-28 11:56:09', '2023-05-28 11:56:09'),
(111, 'itineraries-addactivity', 'admin', '2023-05-28 11:57:56', '2023-05-28 11:57:56'),
(112, 'itineraries-showitineraryactivities', 'admin', '2023-05-28 11:58:55', '2023-05-28 11:58:55'),
(113, 'itineraries-deleteactivity', 'admin', '2023-05-28 11:59:23', '2023-05-28 11:59:23'),
(114, 'itineraries-submitdayform', 'admin', '2023-05-29 09:15:01', '2023-05-29 09:15:01'),
(115, 'itineraries-submitstarttimeform', 'admin', '2023-05-29 09:30:24', '2023-05-29 09:30:24'),
(116, 'itineraries-submitendtimeform', 'admin', '2023-05-29 09:30:32', '2023-05-29 09:30:32'),
(117, 'itineraries-submitdescriptionform', 'admin', '2023-05-29 09:30:41', '2023-05-29 09:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', '2023-05-07 00:55:53', '2023-05-07 00:55:53'),
(2, 'User', 'admin', '2023-05-07 01:00:14', '2023-05-07 01:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Tinery Website', '2023-05-07 00:55:51', '2023-05-07 01:00:44'),
(2, 'primary_email', NULL, '2023-05-07 00:55:51', '2023-05-07 01:00:44'),
(3, 'secondry_email', NULL, '2023-05-07 00:55:51', '2023-05-07 01:00:44'),
(4, 'primary_phone', NULL, '2023-05-07 00:55:51', '2023-05-07 01:00:44'),
(5, 'secondry_phone', NULL, '2023-05-07 00:55:51', '2023-05-07 01:00:44'),
(6, 'address', NULL, '2023-05-07 00:55:51', '2023-05-07 01:00:44'),
(7, 'site_logo', 'http://127.0.0.1:8000/storage/media/word-image-14-e1623132014777.png', '2023-05-07 00:55:51', '2023-05-07 23:15:10'),
(8, 'site_icon', 'http://127.0.0.1:8000/storage/media/bullet-1.png', '2023-05-07 00:55:51', '2023-05-07 23:15:10'),
(9, 'ctrl_dark_mode', NULL, '2023-05-07 00:55:51', '2023-05-07 01:00:58'),
(10, 'ctrl_nav_fixed', NULL, '2023-05-07 00:55:51', '2023-05-07 01:01:03'),
(11, 'ctrl_nav_noborder', NULL, '2023-05-07 00:55:51', '2023-05-07 01:01:01'),
(12, 'ctrl_nav_collapsed', '', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(13, 'ctrl_nav_sidefixed', 'layout-fixed', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(14, 'ctrl_nav_sidemini', 'sidebar-mini', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(15, 'ctrl_nav_sidemini-md', '', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(16, 'ctrl_nav_sidemini-xs', '', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(17, 'ctrl_nav_flat', NULL, '2023-05-07 00:55:51', '2023-05-07 01:01:08'),
(18, 'ctrl_nav_legacy', NULL, '2023-05-07 00:55:51', '2023-05-07 01:01:10'),
(19, 'ctrl_nav_compact', NULL, '2023-05-07 00:55:51', '2023-05-07 01:01:12'),
(20, 'ctrl_nav_child_indent', NULL, '2023-05-07 00:55:51', '2023-05-07 01:01:14'),
(21, 'ctrl_nav_collapse_hide_child', NULL, '2023-05-07 00:55:51', '2023-05-07 01:01:15'),
(22, 'ctrl_nav_disable_expand', NULL, '2023-05-07 00:55:51', '2023-05-07 01:01:16'),
(23, 'ctrl_fixed_footer', NULL, '2023-05-07 00:55:51', '2023-05-07 01:01:19'),
(24, 'ctrl_body_text_sm', '', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(25, 'ctrl_nav_text_sm', '', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(26, 'ctrl_brand_text_sm', '', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(27, 'ctrl_sidebar_text_sm', '', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(28, 'ctrl_footer_text_sm', '', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(29, 'ctrl_navbar_variant', 'navbar-white navbar-light', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(30, 'ctrl_navbar_accent', '', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(31, 'ctrl_sidebar_theme', 'sidebar-light-primary', '2023-05-07 00:55:51', '2023-05-08 19:03:10'),
(32, 'ctrl_brand_logo_varient', '', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(33, 'ctrl_sidebar_elevation', 'elevation-4', '2023-05-07 00:55:51', '2023-05-07 00:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'foodie', 'Foodie', '2023-05-08 12:20:34', '2023-06-04 10:19:13'),
(2, 'backpacker', 'Backpacker', '2023-05-08 12:20:34', '2023-06-04 10:19:52'),
(3, 'brief', 'Brief', '2023-05-08 12:20:34', '2023-06-04 10:21:38'),
(5, 'cold', 'Cold', '2023-05-29 13:57:05', '2023-06-04 10:21:42'),
(6, 'travel', 'Travel', '2023-05-29 13:57:24', '2023-06-04 10:21:47'),
(7, 'leaves', 'Leaves', '2023-05-29 13:57:49', '2023-06-04 10:21:51'),
(8, 'coffee', 'Coffee', '2023-05-29 13:57:59', '2023-06-04 10:21:56'),
(9, 'planned', 'Planned', '2023-05-29 13:58:10', '2023-06-04 10:22:00'),
(10, 'fun', 'Fun', '2023-05-29 13:58:23', '2023-06-04 10:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirmpassword` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `username`, `email_verified_at`, `password`, `created_at`, `updated_at`, `confirmpassword`, `remember_token`, `bio`, `facebook`, `twitter`, `instagram`, `tiktok`, `website`, `tags`, `profile`, `deleted_at`) VALUES
(4, 'ali', 'zafar', 'test@test.com', 'alizafar', NULL, '$2y$10$dSGq1LZgcIgDi.mmBKgaAugYJ2fs7GPtkGX1HsGH7IsEXOVKK8tbW', '2023-05-18 09:13:06', '2023-06-06 08:55:45', NULL, NULL, 'I like to travel all around the world.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Benjamin', 'Franklin', 'benjaminfranklin@gmail.com', 'benjaminfranklin', NULL, '$2y$10$1jPH0tJJpjlvj4TxuIXgxuG0PPMMyvRrnFEue/ZSKa/XgVpzqV3U.', '2023-05-22 06:04:55', '2023-05-22 07:10:40', '$2y$10$0CdtE.VqzVT3WpYdYRQ4WOTAGzEUhTI1YLL1eRY5QUAnu7B1qC5R6', NULL, 'I like to travel all around the world.', NULL, NULL, NULL, NULL, NULL, NULL, '1684757440.png', NULL),
(9, 'James', 'Dean', 'jamesdean@gmail.com', 'jamesdean', NULL, '$2y$10$IFiqJItMoVk7RQnGt1lLa.7qlpYXgZ/o.TASQqgOccg1yKjqe3L6q', '2023-05-29 18:20:02', '2023-05-29 18:20:56', '$2y$10$fNWK93JyNnoRlnXwYTnJFeKTNaG/viXI259Wn92dzq3tuN/RNK1xa', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit....', '#', '#', '#', '#', '#', NULL, '1685402446.png', NULL),
(10, 'Angelina', 'Smith', 'angelinasmith@gmail.com', 'angelinasmith', NULL, '$2y$10$U8BKIe2boEaM6qZktEOSae8T7IHhmBLY7pHTUKj1ekVUHsOgLrbvi', '2023-05-29 18:21:32', '2023-05-29 18:22:23', '$2y$10$Y.mBCCk6tFYIszPieGuFyOrofykO5GtrouZJrpsEfzb64jpNYTNLe', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit....', '#', '#', '#', '#', '#', NULL, '1685402534.png', NULL),
(11, 'Megan', 'James', 'meganjames@gmail.com', 'meganjames', NULL, '$2y$10$FoXdCQ5E99VgoM/CqehDQevRyfIPu3B0MCzeOsOIlUqIm5W1dAzt2', '2023-05-29 18:24:48', '2023-05-29 18:25:32', '$2y$10$EyPxFCLOkV1xMcCRrhrbD.lHbPaAPpzs3xr4im8XRrstdbKr2e702', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit....', '#', '#', '#', '#', '#', NULL, '1685402723.png', NULL),
(12, 'Holly', 'Fax', 'hollyfax@gmail.com', 'hollyfax', NULL, '$2y$10$j28Q9BqOu3TvqnvH3CMq5Ozlt6ZKVFYGpGN4oO2dRhBwnWT7cGvUK', '2023-05-29 18:26:05', '2023-05-29 18:26:41', '$2y$10$0jOWZPPC1Ze2PPypzIv.f.kvgEdvS5srz3Jr4Y.4I5IWFGSzQ1peu', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit....', '#', '#', '#', '#', '#', NULL, '1685402791.png', NULL),
(13, 'Justin', 'Lang', 'justinlang@gmail.com', 'justinlang', NULL, '$2a$12$A8xyz0fOOgB41EbR.5L5YOPjmiui76NAaTJvci0D6EMu8ro3O84rC', '2023-05-29 18:27:20', '2023-05-29 18:29:13', '$2y$10$eCPMVoK5b/JFL4gqz8DNFeEsWf3AcQYBQSm2/hRI0U1e8NLUdn6yW', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit....', '#', '#', '#', '#', '#', NULL, '1685402895.png', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

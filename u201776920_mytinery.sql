-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 28, 2023 at 02:12 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u201776920_mytinery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `itineraries_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `itineraries_id`, `created_at`, `updated_at`) VALUES
(1, 'First comment testing here', 6, 4, '2023-05-25 21:30:49', '2023-05-25 21:30:49'),
(2, 'hi', 13, 6, '2023-06-26 01:43:01', '2023-06-26 01:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `crud_pages`
--

CREATE TABLE `crud_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` text DEFAULT NULL,
  `file` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crud_pages`
--

INSERT INTO `crud_pages` (`id`, `slug`, `title`, `seo_description`, `seo_keywords`, `file`, `description`, `created_at`, `updated_at`) VALUES
(1, 'term-of-use', 'Term of use', 'Description', 'keywords,keyword', '1687763732.png', '<p><font color=\"#000000\">Description Details</font></p>', '2023-06-26 07:15:32', '2023-06-26 07:15:51'),
(2, 'privacy-policy', 'Privacy Policy', 'Description', 'keywords,keyword', '1687763785.png', '<p><font color=\"#000000\">Descriptions</font></p>', '2023-06-26 07:16:25', '2023-06-26 07:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `itineraries_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `itineraries_id`, `created_at`, `updated_at`) VALUES
(1, 6, 5, '2023-05-22 06:12:04', '2023-05-22 06:12:04'),
(2, 6, 4, '2023-05-22 06:12:46', '2023-05-22 06:12:46'),
(3, 2, 5, '2023-05-23 02:26:01', '2023-05-23 02:26:01'),
(14, 12, 12, '2023-06-15 13:01:11', '2023-06-15 13:01:11'),
(16, 4, 13, '2023-07-04 10:02:04', '2023-07-04 10:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password_codes`
--

CREATE TABLE `forgot_password_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `code` varchar(191) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

CREATE TABLE `itineraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `seo_title` varchar(191) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_image` varchar(191) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categories` varchar(191) DEFAULT NULL,
  `tags` varchar(191) DEFAULT NULL,
  `address_street` varchar(191) DEFAULT NULL,
  `address_street_line1` varchar(191) DEFAULT NULL,
  `address_city` varchar(191) DEFAULT NULL,
  `address_state` varchar(191) DEFAULT NULL,
  `address_zipcode` varchar(191) DEFAULT NULL,
  `address_country` varchar(191) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `longitude` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `activities_data` text DEFAULT NULL,
  `featured` enum('0','1') NOT NULL DEFAULT '0',
  `visibility` enum('public','private') NOT NULL DEFAULT 'public',
  `status` enum('published','draft') NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT 0,
  `itinerary_status` varchar(191) DEFAULT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itineraries`
--

INSERT INTO `itineraries` (`id`, `title`, `slug`, `description`, `excerpt`, `seo_title`, `seo_description`, `seo_image`, `user_id`, `categories`, `tags`, `address_street`, `address_street_line1`, `address_city`, `address_state`, `address_zipcode`, `address_country`, `latitude`, `longitude`, `phone`, `website`, `additional_info`, `activities_data`, `featured`, `visibility`, `status`, `created_at`, `updated_at`, `duration`, `itinerary_status`, `location_id`) VALUES
(6, 'Autumn Escape', 'autumn-escape-1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. At sed amet dictumst maecenas nisi, volutpat suscipit. Ultrices eget laoreet commodo at', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. At sed amet dictumst maecenas nisi, volutpat suscipit. Ultrices eget laoreet commodo at', 'vfs', 'fdg', '1685405707.png', 12, '[\"8\",\"7\"]', '[\"1\",\"15\"]', 'Scotland Island NSW, Australia', 'Scotland Island NSW 2105, Australia', 'Scotland', 'New South Wales', '2105', 'Australia', '-33.641844', '151.2934369', NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-05-22 08:33:55', '2023-06-16 07:20:48', 0, 'updated', 4),
(7, 'Semester Abroad', 'semester-abroad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. At sed amet dictumst maecenas nisi, volutpat suscipit. Ultrices eget laoreet commodo at', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. At sed amet dictumst maecenas nisi, volutpat suscipit. Ultrices eget laoreet commodo at', 'one', 'one', '1685405834.png', 10, '[\"8\"]', '[\"1\",\"2\",\"5\",\"8\",\"9\",\"10\"]', 'Turkey Point, ON, Canada', 'Quebec G0S, Canada', 'Turkey', 'Quebec', 'G0S', 'Canada', '46.4762754', '-71.4429373', NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-05-29 04:52:41', '2023-06-05 08:59:51', 0, 'updated', 4),
(5, 'My Winter Break 2022', 'my-winter-break-2022', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', 'Title test', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', '1685405564.png', 13, '[\"7\",\"6\"]', '[\"5\",\"6\"]', 'Toronto, ON, Canada', NULL, 'Toronto', NULL, '7899', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-05-15 03:51:13', '2023-06-08 15:29:20', 1, 'updated', 4),
(4, 'My Spring Break Trip', 'my-spring-break-trip', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', 'My Spring Break Trip', 'After 2 years of planning, we finally visited Toronto to experience the best this vibrant metropolis has to offer. From the iconic CN Tower to the bustling streets of Kensington Market, there’s something for everyone in this bustling metropolis. In this itinerary, we’ll take you on a journey through Toronto’s must-see sights, hidden gems, and unforgettable moments. Here is how we embrace the culture, beauty, and energy of this exciting city.', '1685405480.png', 6, '[\"6\"]', '[\"1\",\"2\",\"3\"]', 'Mexico City, CDMX, Mexico', 'Toronto, ON, Canada', 'Mexico City', 'Ontario', NULL, 'Canada', '43.653226', '-79.3831843', NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-05-12 10:31:04', '2023-05-29 14:27:59', 0, 'updated', 4),
(12, 'My winter vacation in 2023', 'my-winter-vacation-in-2023-1', 'My winter vacation in 2023\r\nMy winter vacation in 2023\r\nMy winter vacation in 2023', NULL, NULL, NULL, '1686242974.jpg', 4, NULL, '[\"1\"]', 'Istumbol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://mytinery.com', NULL, NULL, '1', 'public', 'published', '2023-06-01 14:00:53', '2023-06-14 20:30:22', 3, 'updated', 6),
(13, 'Arizona Trip', 'test', 'test', NULL, NULL, NULL, NULL, 12, NULL, '[\"9\"]', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'public', 'published', '2023-06-07 16:25:41', '2023-06-07 16:25:41', 0, 'updated', 4),
(14, 'Test Itinerary', 'test-itinerary', 'Test Itinerary added description', NULL, NULL, NULL, NULL, 10, NULL, '[\"2\",\"3\",\"7\",\"9\"]', 'United Kingdom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://google.com', NULL, NULL, '1', 'public', 'published', '2023-06-07 19:59:58', '2023-06-07 20:10:49', 3, 'updated', 4),
(15, 'My Test Case', 'my-test-case-1', 'test test', NULL, NULL, NULL, '1687764669.png', 11, NULL, '[\"13\"]', 'New York', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-06-08 15:19:00', '2023-06-26 07:31:09', 3, 'updated', 4),
(16, 'London, UK', 'london-uk', '5 day trip to London with my gals!', NULL, NULL, NULL, '1686583867.jpeg', 11, NULL, '[\"1\",\"14\",\"15\"]', 'London, UK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-06-08 15:26:30', '2023-06-12 15:31:07', 4, 'updated', 4),
(17, 'Las Vegas', 'las-vegas', 'Best Las Vegas Trip ever!', 'test', NULL, NULL, NULL, 11, NULL, '[\"1\",\"15\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-06-14 13:49:45', '2023-06-19 17:42:39', 5, 'updated', 5),
(18, '', 'itinerary-18', NULL, NULL, NULL, NULL, '1688464309.png', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'public', 'published', '2023-06-14 22:14:38', '2023-07-04 09:51:49', 2, NULL, 0),
(19, 'Italia', 'italia', 'dfdsasdf', 'sdfsdafasdf', NULL, NULL, NULL, 11, NULL, '[\"13\",\"14\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-06-19 18:05:16', '2023-06-19 18:42:29', 3, 'updated', 3),
(20, 'NYC Vacation', 'nyc-vacation', 'sdfsdfsfas', NULL, NULL, NULL, NULL, 11, NULL, '[\"14\",\"15\",\"16\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-06-21 14:32:06', '2023-06-22 13:32:07', 3, 'updated', 10),
(21, 'Test New', 'test-new', 'Summery', NULL, NULL, NULL, '1687764705.jpg', 11, NULL, '[\"15\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.testdemo.com', NULL, NULL, '1', 'public', 'published', '2023-06-23 12:33:41', '2023-06-26 07:32:20', 2, 'updated', 3),
(22, '', 'itinerary-22', NULL, NULL, NULL, NULL, '1687523893.png', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'public', 'published', '2023-06-23 12:37:20', '2023-06-23 12:38:13', 0, NULL, 0),
(23, 'Phoenix in Summer', 'phoenix-in-summer', 'sdfsfsfsfsa', NULL, NULL, NULL, '1687785426.png', 13, NULL, '[\"13\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'public', 'published', '2023-06-26 01:27:51', '2023-06-26 13:17:06', 4, 'updated', 4),
(24, '', 'itinerary-24', NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'public', 'published', '2023-06-26 07:33:15', '2023-07-08 18:12:02', 0, NULL, 0),
(25, '', 'itinerary-25', NULL, NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'public', 'published', '2023-06-26 13:28:30', '2023-06-26 13:28:30', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `itineraries_tags`
--

CREATE TABLE `itineraries_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_activities`
--

CREATE TABLE `itinerary_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `itineraries_id` bigint(20) UNSIGNED NOT NULL,
  `tempid` varchar(255) DEFAULT NULL,
  `days_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `starttime` varchar(191) DEFAULT NULL,
  `endtime` varchar(191) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary_activities`
--

INSERT INTO `itinerary_activities` (`id`, `itineraries_id`, `tempid`, `days_id`, `title`, `starttime`, `endtime`, `description`, `location`, `created_at`, `updated_at`) VALUES
(103, 4, '', 30, NULL, '19:59', '19:00', 'Onde sds', NULL, '2023-05-29 09:57:01', '2023-05-29 09:58:25'),
(96, 7, '', 29, 'Way to clifton', '19:52', '19:53', 'Filter by location, trip length, tag or user. Don’t see your location? New itineraries are added by users everyday - or take it upon yourself to write the first one!', NULL, '2023-05-29 09:48:29', '2023-06-03 07:43:22'),
(100, 7, '', 29, 'Way to clifton 2', '19:51', '19:54', 'New itineraries are added by users everyday - or take it upon yourself to write the first one!', NULL, '2023-05-29 09:49:12', '2023-06-03 07:43:24'),
(104, 11, NULL, 33, NULL, NULL, NULL, NULL, NULL, '2023-05-30 04:11:05', '2023-05-30 04:11:05'),
(105, 10, NULL, 31, 'Way to clifton 2', '18:19', '18:18', 'test', NULL, '2023-05-30 08:08:32', '2023-05-30 08:16:00'),
(110, 12, NULL, 37, 'Way to clifton', '13:52', '14:48', 'Way to clifton Way to clifton Way to clifton', NULL, '2023-06-01 14:14:35', '2023-06-08 16:48:38'),
(109, 12, NULL, 37, 'Way to clifton 22', '12:48', '15:48', 'Way to clifton Way to clifton Way to clifton', NULL, '2023-06-01 14:01:07', '2023-06-08 16:48:50'),
(111, 15, NULL, 40, 'Day Trip', '11:30', NULL, 'blah bahblah blah Blah', NULL, '2023-06-08 15:20:12', '2023-06-26 07:30:19'),
(112, 15, NULL, 40, 'museum', '01:27', NULL, 'went to the museum', NULL, '2023-06-08 15:26:45', '2023-06-26 07:30:43'),
(113, 5, NULL, 42, 'Way to clifton', '10:29', '13:29', 'Testing here', NULL, '2023-06-08 15:29:28', '2023-06-08 15:29:54'),
(115, 15, NULL, 40, 'Way to clifton 2', '00:36', '02:36', 'Way to clifton 2', NULL, '2023-06-08 15:36:44', '2023-06-08 15:37:10'),
(116, 16, NULL, 43, 'Check-In to Hotel', '15:00', '16:00', 'Check in to The Royal Horseguards Hotel & One Whitehall Place, London', NULL, '2023-06-08 15:37:33', '2023-06-12 15:34:49'),
(117, 15, NULL, 40, 'pool', '10:39', NULL, 'went to the pool', NULL, '2023-06-08 15:39:11', '2023-06-08 15:39:30'),
(118, 16, NULL, 43, 'Dinner', NULL, NULL, 'Dinner at Fancy Restaurant', NULL, '2023-06-12 15:31:16', '2023-06-12 15:35:36'),
(121, 16, NULL, 44, 'PARK', NULL, NULL, 'FROLICK AROUND', NULL, '2023-06-12 15:39:28', '2023-06-12 15:39:55'),
(122, 16, NULL, 44, NULL, NULL, NULL, NULL, NULL, '2023-06-12 15:39:36', '2023-06-12 15:39:36'),
(123, 16, NULL, 44, NULL, NULL, NULL, NULL, NULL, '2023-06-12 15:40:20', '2023-06-12 15:40:20'),
(124, 17, NULL, 47, 'Museum', '11:03', NULL, 'Went to the mseum and it was awesome!', NULL, '2023-06-19 18:03:08', '2023-06-19 18:03:43'),
(125, 17, NULL, 47, 'pool', '23:04', '23:04', 'Test Teset', NULL, '2023-06-19 18:04:07', '2023-06-19 18:04:33'),
(126, 19, NULL, 52, 'test', '02:42', '02:43', 'test', NULL, '2023-06-19 18:42:50', '2023-06-19 18:43:04'),
(127, 19, NULL, 52, NULL, NULL, NULL, NULL, NULL, '2023-06-19 18:42:55', '2023-06-19 18:42:55'),
(128, 19, NULL, 52, 'pool time', '04:43', '04:43', 'testasta ssdfsdf', NULL, '2023-06-19 18:43:19', '2023-06-19 18:43:35'),
(129, 19, NULL, 52, NULL, NULL, NULL, NULL, NULL, '2023-06-19 18:43:44', '2023-06-19 18:43:44'),
(130, 20, NULL, 55, 'museum', '08:32', '10:32', 'dsfsfsafsadf', NULL, '2023-06-22 13:32:19', '2023-06-22 13:32:44'),
(131, 23, NULL, 58, 'Mountain Hike', '18:38', '06:38', 'Climb a mountain with your bros', NULL, '2023-06-26 01:38:22', '2023-06-26 01:39:26'),
(132, 23, NULL, 58, 'Lunch', '12:39', '18:39', 'fsafsjklfjasklfa;fasfds', NULL, '2023-06-26 01:39:36', '2023-06-26 01:40:04'),
(133, 23, NULL, 58, 'pool', '09:22', '11:22', 'sdfsdfasfasdfas', NULL, '2023-06-26 01:40:07', '2023-06-26 13:22:11'),
(134, 23, NULL, 58, 'fsafasdfsdf', '10:22', '11:22', 'sdfsdfasdf', NULL, '2023-06-26 13:22:19', '2023-06-26 13:22:40'),
(135, 23, NULL, 58, NULL, NULL, NULL, NULL, NULL, '2023-06-26 13:22:32', '2023-06-26 13:22:32'),
(136, 23, NULL, 58, NULL, NULL, NULL, NULL, NULL, '2023-06-26 13:22:44', '2023-06-26 13:22:44'),
(137, 18, NULL, 65, 'My Test', '15:53', '17:53', 'sasadsd', NULL, '2023-07-04 09:49:35', '2023-07-04 09:53:30'),
(138, 18, NULL, 65, 'My Test2', '14:55', '14:55', '\\zx\\zx\\zx', NULL, '2023-07-04 09:53:20', '2023-07-04 09:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_days`
--

CREATE TABLE `itinerary_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `itineraries_id` bigint(20) UNSIGNED NOT NULL,
  `tempid` varchar(255) DEFAULT NULL,
  `date` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(39, 12, NULL, NULL, '2023-06-01 14:00:53', '2023-06-01 14:00:53'),
(40, 15, NULL, NULL, '2023-06-08 15:19:59', '2023-06-08 15:19:59'),
(41, 15, NULL, NULL, '2023-06-08 15:19:59', '2023-06-08 15:19:59'),
(42, 5, NULL, NULL, '2023-06-08 15:29:20', '2023-06-08 15:29:20'),
(43, 16, NULL, NULL, '2023-06-08 15:32:09', '2023-06-08 15:32:09'),
(44, 16, NULL, NULL, '2023-06-12 15:30:09', '2023-06-12 15:30:09'),
(45, 16, NULL, NULL, '2023-06-12 15:30:09', '2023-06-12 15:30:09'),
(46, 16, NULL, NULL, '2023-06-12 15:30:09', '2023-06-12 15:30:09'),
(47, 17, NULL, NULL, '2023-06-19 17:42:39', '2023-06-19 17:42:39'),
(48, 17, NULL, NULL, '2023-06-19 17:42:39', '2023-06-19 17:42:39'),
(49, 17, NULL, NULL, '2023-06-19 17:42:39', '2023-06-19 17:42:39'),
(50, 17, NULL, NULL, '2023-06-19 17:42:39', '2023-06-19 17:42:39'),
(51, 17, NULL, NULL, '2023-06-19 17:42:39', '2023-06-19 17:42:39'),
(52, 19, NULL, NULL, '2023-06-19 18:42:29', '2023-06-19 18:42:29'),
(53, 19, NULL, NULL, '2023-06-19 18:42:29', '2023-06-19 18:42:29'),
(54, 19, NULL, NULL, '2023-06-19 18:42:29', '2023-06-19 18:42:29'),
(55, 20, NULL, NULL, '2023-06-22 13:32:07', '2023-06-22 13:32:07'),
(56, 20, NULL, NULL, '2023-06-22 13:32:07', '2023-06-22 13:32:07'),
(57, 20, NULL, NULL, '2023-06-22 13:32:07', '2023-06-22 13:32:07'),
(58, 23, NULL, NULL, '2023-06-26 01:37:11', '2023-06-26 01:37:11'),
(59, 23, NULL, NULL, '2023-06-26 01:37:14', '2023-06-26 01:37:14'),
(60, 23, NULL, NULL, '2023-06-26 01:37:17', '2023-06-26 01:37:17'),
(61, 23, NULL, NULL, '2023-06-26 01:37:20', '2023-06-26 01:37:20'),
(62, 15, NULL, NULL, '2023-06-26 07:30:07', '2023-06-26 07:30:07'),
(63, 21, NULL, NULL, '2023-06-26 07:32:20', '2023-06-26 07:32:20'),
(64, 21, NULL, NULL, '2023-06-26 07:32:20', '2023-06-26 07:32:20'),
(65, 18, NULL, NULL, '2023-07-04 09:48:24', '2023-07-04 09:48:24'),
(66, 18, NULL, NULL, '2023-07-04 09:48:30', '2023-07-04 09:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_galleries`
--

CREATE TABLE `itinerary_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `itineraryid` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary_galleries`
--

INSERT INTO `itinerary_galleries` (`id`, `itineraryid`, `image`, `created_at`, `updated_at`) VALUES
(9, '23', '168774367237.zip', '2023-06-26 01:41:12', '2023-06-26 01:41:12'),
(2, '6', '168608760534.jpg', '2023-06-06 21:40:05', '2023-06-06 21:40:05'),
(3, '6', '168608760566.jpg', '2023-06-06 21:40:05', '2023-06-06 21:40:05'),
(4, '6', '16860876052.jpg', '2023-06-06 21:40:05', '2023-06-06 21:40:05'),
(5, '6', '168608760588.jpg', '2023-06-06 21:40:05', '2023-06-06 21:40:05'),
(6, '6', '168608768433.png', '2023-06-06 21:41:24', '2023-06-06 21:41:24'),
(7, '6', '168608768438.png', '2023-06-06 21:41:24', '2023-06-06 21:41:24'),
(8, '6', '168608768425.png', '2023-06-06 21:41:24', '2023-06-06 21:41:24'),
(10, '23', '168778592635.png', '2023-06-26 13:25:26', '2023-06-26 13:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_locations`
--

CREATE TABLE `itinerary_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_street` varchar(191) DEFAULT NULL,
  `address_street_line1` varchar(191) DEFAULT NULL,
  `address_city` varchar(191) DEFAULT NULL,
  `address_state` varchar(191) DEFAULT NULL,
  `address_zipcode` varchar(191) DEFAULT NULL,
  `address_country` varchar(191) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `longitude` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary_locations`
--

INSERT INTO `itinerary_locations` (`id`, `address_street`, `address_street_line1`, `address_city`, `address_state`, `address_zipcode`, `address_country`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(3, 'Hong Kong', 'Hong Kong', 'Hong Kong', 'Hong Kong', '1234', 'Hong Kong', '22.3192011', '114.1696121', '2023-06-12 18:44:16', '2023-06-12 18:44:16'),
(4, 'Singapore, Singapore', 'Singapore', 'Singapore', 'Singapor', '999', 'Singapore', '1.3553794', '103.8677444', '2023-06-12 18:44:39', '2023-06-12 18:44:39'),
(5, 'Bangkok, Thailand', 'Bangkok, Thailand', 'Bangkok', 'Bangkok', '111', 'Thailand', '13.7563309', '100.5017651', '2023-06-12 18:44:49', '2023-06-12 18:44:49'),
(6, 'London, UK', 'London, UK', 'London', 'England', '121', 'United Kingdom', '51.5072178', '-0.1275862', '2023-06-12 18:45:05', '2023-06-12 18:45:05'),
(7, 'Macau, Macau - State of Rio Grande do Norte, Brazil', 'Macau, RN, 59500-000, Brazil', 'Macau', 'Rio Grande do Norte', '59500-000', 'Brazil', '-5.113349', '-36.6355223', '2023-06-12 18:45:15', '2023-06-12 18:45:15'),
(8, 'Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia', 'Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia', 'Kuala Lumpur', 'Federal Territory of Kuala Lumpur', '111', 'Malaysia', '3.139003', '101.686855', '2023-06-12 18:45:25', '2023-06-12 18:45:25'),
(9, 'Shenzhen, Guangdong Province, China', 'Shenzhen, Guangdong Province, China', 'Shenzhen', 'Guangdong Province', NULL, 'China', '22.5428599', '114.05956', '2023-06-20 22:01:45', '2023-06-20 22:01:45'),
(10, 'New York City, NY, USA', 'New York, NY, USA', 'New York', 'New York', NULL, 'United States', '40.7127753', '-74.0059728', '2023-06-20 22:02:13', '2023-06-20 22:02:13'),
(11, 'Antalya, Turkey', 'Antalya, Türkiye', 'Antalya', 'Antalya', NULL, 'Türkiye', '36.8968908', '30.7133233', '2023-06-20 22:02:32', '2023-06-20 22:02:32'),
(12, 'Paris, France', 'Paris, France', 'Paris', 'Île-de-France', NULL, 'France', '48.856614', '2.3522219', '2023-06-20 22:02:44', '2023-06-20 22:02:44'),
(13, 'İstanbul, Turkey', 'İstanbul, Türkiye', 'İstanbul', 'İstanbul', NULL, 'Türkiye', '41.0082376', '28.9783589', '2023-06-20 22:02:55', '2023-06-20 22:02:55'),
(14, 'Rome, Metropolitan City of Rome Capital, Italy', 'Rome, Metropolitan City of Rome Capital, Italy', 'Rome', 'Lazio', NULL, 'Italy', '41.9027835', '12.4963655', '2023-06-20 22:03:29', '2023-06-20 22:03:29'),
(15, 'Dubai - UAE', 'Dubai - United Arab Emirates', 'Dubai', 'Dubai', NULL, 'United Arab Emirates', '25.2048493', '55.2707828', '2023-06-20 22:03:57', '2023-06-20 22:03:57'),
(16, 'Guangzhou, Guangdong Province, China', 'Guangzhou, Guangdong Province, China', 'Guangzhou', 'Guangdong Province', NULL, 'China', '23.1290799', '113.26436', '2023-06-20 22:04:20', '2023-06-20 22:04:20'),
(17, 'Phuket, Mueang Phuket District, Phuket, Thailand', 'Phuket, Mueang Phuket District, Phuket 83000, Thailand', 'Phuket', 'Phuket', '83000', 'Thailand', '7.8804479', '98.3922504', '2023-06-20 22:11:25', '2023-06-20 22:11:25'),
(18, 'Mecca Saudi Arabia', 'Mecca Saudi Arabia', 'Mecca', 'Makkah Province', NULL, 'Saudi Arabia', '21.3890824', '39.8579118', '2023-06-20 22:11:57', '2023-06-20 22:11:57'),
(19, 'Pattaya, Bang Lamung District, Chon Buri, Thailand', 'Pattaya City, Bang Lamung District, Chon Buri 20150, Thailand', 'Pattaya City', 'Chon Buri', '20150', 'Thailand', '12.9235557', '100.8824551', '2023-06-20 22:13:10', '2023-06-20 22:13:10'),
(20, 'Taipei, Taiwan', 'Taipei, Taiwan', 'Taipei', 'Taipei', NULL, 'Taiwan', '25.0329694', '121.5654177', '2023-06-20 22:16:23', '2023-06-20 22:16:23'),
(21, 'Prague, Czech Republic', 'Prague, Czechia', 'Prague', 'Prague', NULL, 'Czechia', '50.0755381', '14.4378005', '2023-06-20 22:16:47', '2023-06-20 22:16:47'),
(22, 'Shanghai, China', 'Shanghai, China', 'Shanghai', 'Shanghai', NULL, 'China', '31.230416', '121.473701', '2023-06-20 22:17:05', '2023-06-20 22:17:05'),
(23, 'Las Vegas, NV, USA', 'Las Vegas, NV, USA', 'Las Vegas', 'Nevada', NULL, 'United States', '36.171563', '-115.1391009', '2023-06-20 22:17:52', '2023-06-20 22:17:52'),
(24, 'Miami, FL, USA', 'Miami, FL, USA', 'Miami', 'Florida', NULL, 'United States', '25.7616798', '-80.1917902', '2023-06-20 22:18:23', '2023-06-20 22:18:23'),
(25, 'Barcelona, Spain', 'Barcelona, Spain', 'Barcelona', 'Catalonia', NULL, 'Spain', '41.3873974', '2.168568', '2023-06-20 22:18:37', '2023-06-20 22:18:37'),
(26, 'Moscow, Russia', 'Moscow, Russia', 'Moscow', 'Moscow', NULL, 'Russia', '55.755826', '37.6173', '2023-06-20 22:19:25', '2023-06-20 22:19:25'),
(27, 'Beijing, China', 'Beijing, China', 'Beijing', 'Beijing', NULL, 'China', '39.904211', '116.407395', '2023-06-20 22:19:50', '2023-06-20 22:19:50'),
(28, 'Los Angeles, CA, USA', 'Los Angeles, CA, USA', 'Los Angeles', 'California', NULL, 'United States', '34.0522342', '-118.2436849', '2023-06-20 22:21:13', '2023-06-20 22:21:13'),
(29, 'Budapest, Hungary', 'Budapest, Hungary', 'Budapest', 'Central Hungary', NULL, 'Hungary', '47.497912', '19.040235', '2023-06-20 22:24:50', '2023-06-20 22:24:50'),
(30, 'Vienna, Austria', 'Vienna, Austria', 'Vienna', 'Vienna', NULL, 'Austria', '48.2081743', '16.3738189', '2023-06-20 22:25:19', '2023-06-20 22:25:19'),
(31, 'Amsterdam, Netherlands', 'Amsterdam, Netherlands', 'Amsterdam', 'North Holland', NULL, 'Netherlands', '52.3675734', '4.9041389', '2023-06-20 22:25:50', '2023-06-20 22:25:50'),
(32, 'Sofia, Bulgaria', 'Sofia, Bulgaria', 'Sofia', 'Sofia City Province', NULL, 'Bulgaria', '42.6977082', '23.3218675', '2023-06-20 22:26:13', '2023-06-20 22:26:13'),
(33, 'Madrid, Spain', 'Madrid, Spain', 'Madrid', 'Community of Madrid', NULL, 'Spain', '40.4167754', '-3.7037902', '2023-06-20 22:26:36', '2023-06-20 22:26:36'),
(34, 'Orlando, FL, USA', 'Orlando, FL, USA', 'Orlando', 'Florida', NULL, 'United States', '28.5383832', '-81.3789269', '2023-06-20 22:27:54', '2023-06-20 22:27:54'),
(35, 'Ho Chi Minh City, Vietnam', 'Ho Chi Minh City, Vietnam', 'Ho Chi Minh City', 'Ho Chi Minh City', NULL, 'Vietnam', '10.8230989', '106.6296638', '2023-06-20 22:28:32', '2023-06-20 22:28:32'),
(36, 'Lima, Peru', 'Lima, Peru', 'Lima', 'Callao Region', NULL, 'Peru', '-12.0463731', '-77.042754', '2023-06-20 22:29:03', '2023-06-20 22:29:03'),
(37, 'Berlin, Germany', 'Berlin, Germany', 'Berlin', 'Berlin', NULL, 'Germany', '52.52000659999999', '13.404954', '2023-06-20 22:29:25', '2023-06-20 22:29:25'),
(38, 'Tokyo, Japan', 'Tokyo, Japan', 'Tokyo', 'Tokyo', NULL, 'Japan', '35.6803997', '139.7690174', '2023-06-20 22:29:45', '2023-06-20 22:29:45'),
(39, 'Warsaw, Poland', 'Warsaw, Poland', 'Warsaw', 'Masovian Voivodeship', '03', 'Poland', '52.2296756', '21.0122287', '2023-06-20 22:30:11', '2023-06-20 22:30:11'),
(40, 'Chennai, Tamil Nadu, India', 'Chennai, Tamil Nadu, India', 'Chennai', 'Tamil Nadu', NULL, 'India', '13.0826802', '80.2707184', '2023-06-20 22:31:19', '2023-06-20 22:31:19'),
(41, 'Cairo, Egypt', 'Cairo, Cairo Governorate, Egypt', 'Cairo', 'Cairo Governorate', NULL, 'Egypt', '30.0444196', '31.2357116', '2023-06-20 22:31:44', '2023-06-20 22:31:44'),
(42, 'Nairobi, Kenya', 'Nairobi, Kenya', 'Nairobi', 'Nairobi County', NULL, 'Kenya', '-1.2920659', '36.8219462', '2023-06-20 22:32:07', '2023-06-20 22:32:07'),
(43, 'Hangzhou, Zhejiang, China', 'Hangzhou, Zhejiang, China', 'Hangzhou', 'Zhejiang', NULL, 'China', '30.2741499', '120.15515', '2023-06-20 22:32:33', '2023-06-20 22:32:33'),
(44, 'Milan, Metropolitan City of Milan, Italy', 'Milan, Metropolitan City of Milan, Italy', 'Milan', 'Lombardy', NULL, 'Italy', '45.4642035', '9.189982', '2023-06-20 22:34:38', '2023-06-20 22:34:38'),
(45, 'San Francisco, CA, USA', 'San Francisco, CA, USA', 'San Francisco', 'California', NULL, 'United States', '37.7749295', '-122.4194155', '2023-06-20 22:37:18', '2023-06-20 22:37:18'),
(46, 'Buenos Aires, Argentina', 'Buenos Aires, Argentina', 'Buenos Aires', 'Buenos Aires', NULL, 'Argentina', '-34.6036844', '-58.3815591', '2023-06-20 22:37:41', '2023-06-20 22:37:41'),
(47, 'Venice, Metropolitan City of Venice, Italy', 'Venice, Metropolitan City of Venice, Italy', 'Venice', 'Veneto', NULL, 'Italy', '45.4408474', '12.3155151', '2023-06-20 22:38:16', '2023-06-20 22:38:16'),
(48, 'Mexico City, CDMX, Mexico', 'Mexico City, CDMX, Mexico', 'Mexico City', 'Mexico City', NULL, 'Mexico', '19.4326077', '-99.133208', '2023-06-20 22:38:59', '2023-06-20 22:38:59'),
(49, 'Dublin, Ireland', 'Dublin, Ireland', 'Dublin', 'County Dublin', NULL, 'Ireland', '53.3498053', '-6.2603097', '2023-06-20 22:39:23', '2023-06-20 22:39:23'),
(50, 'Seoul, South Korea', 'Seoul, South Korea', 'Seoul', 'Seoul', NULL, 'South Korea', '37.5518911', '126.9917937', '2023-06-20 22:39:42', '2023-06-20 22:39:42'),
(51, 'Muğla, Menteşe/Muğla, Turkey', 'Muğla, 48000 Menteşe/Muğla, Türkiye', 'Muğla', 'Muğla', '48000', 'Türkiye', '37.215374', '28.363394', '2023-06-20 22:40:13', '2023-06-20 22:40:13'),
(52, 'Mumbai, Maharashtra, India', 'Mumbai, Maharashtra, India', 'Mumbai', 'Maharashtra', NULL, 'India', '19.0759837', '72.8776559', '2023-06-20 22:40:40', '2023-06-20 22:40:40'),
(53, 'Denpasar, Denpasar City, Bali, Indonesia', 'Denpasar, Denpasar City, Bali, Indonesia', 'Denpasar', 'Bali', NULL, 'Indonesia', '-8.670458199999999', '115.2126293', '2023-06-20 22:41:22', '2023-06-20 22:41:22'),
(54, 'Delhi, India', 'Delhi, India', 'Delhi', 'Delhi', NULL, 'India', '28.6862738', '77.2217831', '2023-06-20 22:41:40', '2023-06-20 22:41:40'),
(55, 'Toronto, ON, Canada', 'Toronto, ON, Canada', 'Toronto', 'Ontario', NULL, 'Canada', '43.653226', '-79.3831843', '2023-06-20 22:42:29', '2023-06-20 22:42:29'),
(56, 'Zhuhai, Guangdong Province, China', 'Zhuhai, Guangdong Province, China', 'Zhuhai', 'Guangdong Province', NULL, 'China', '22.2708599', '113.57666', '2023-06-20 22:42:56', '2023-06-20 22:42:56'),
(57, 'St Petersburg, Russia', 'St Petersburg, Russia', 'Saint Petersburg', 'Saint Petersburg', NULL, 'Russia', '59.9310584', '30.3609097', '2023-06-20 22:43:16', '2023-06-20 22:43:16'),
(58, 'Burgas, Bulgaria', 'Burgas, Bulgaria', 'Burgas', 'Burgas', NULL, 'Bulgaria', '42.50479259999999', '27.4626361', '2023-06-20 22:43:36', '2023-06-20 22:43:36'),
(59, 'Sydney NSW, Australia', 'Sydney NSW, Australia', 'Sydney', 'New South Wales', NULL, 'Australia', '-33.8688197', '151.2092955', '2023-06-20 22:44:00', '2023-06-20 22:44:00'),
(60, 'Djerba Ajim, Tunisia', 'Djerba Ajim, Tunisia', 'Djerba Ajim', 'Medenine', NULL, 'Tunisia', '33.7322543', '10.7605239', '2023-06-20 22:46:07', '2023-06-20 22:46:07'),
(61, 'Munich, Germany', 'Munich, Germany', 'Munich', 'Bavaria', NULL, 'Germany', '48.1351253', '11.5819806', '2023-06-20 22:46:37', '2023-06-20 22:46:37'),
(62, 'Johannesburg, South Africa', 'Johannesburg, South Africa', 'Johannesburg', 'Gauteng', NULL, 'South Africa', '-26.2041028', '28.0473051', '2023-06-20 22:47:04', '2023-06-20 22:47:04'),
(63, 'Cancún, Quintana Roo, Mexico', 'Cancún, Quintana Roo, Mexico', 'Cancún', 'Quintana Roo', NULL, 'Mexico', '21.161908', '-86.8515279', '2023-06-20 22:53:35', '2023-06-20 22:53:35'),
(64, 'Edirne, Edirne Merkez/Edirne, Turkey', 'Edirne, Edirne Merkez/Edirne, Türkiye', 'Edirne', 'Edirne', NULL, 'Türkiye', '41.67712969999999', '26.5557145', '2023-06-20 22:54:40', '2023-06-20 22:54:40'),
(65, 'Suzhou, Jiangsu, China', 'Suzhou, Jiangsu, China', 'Suzhou', 'Jiangsu', NULL, 'China', '31.29833989999999', '120.58319', '2023-06-20 23:00:13', '2023-06-20 23:00:13'),
(66, 'Bucharest, Romania', 'Bucharest, Romania', 'Bucharest', 'Bucharest', NULL, 'Romania', '44.4267674', '26.1025384', '2023-06-20 23:00:31', '2023-06-20 23:00:31'),
(67, 'Punta Cana, Dominican Republic', 'Punta Cana, Dominican Republic', 'Punta Cana', 'La Altagracia Province', NULL, 'Dominican Republic', '18.5600761', '-68.372535', '2023-06-20 23:00:53', '2023-06-20 23:00:53'),
(68, 'Agra, Uttar Pradesh, India', 'Agra, Uttar Pradesh, India', 'Agra', 'Uttar Pradesh', NULL, 'India', '27.1766701', '78.00807449999999', '2023-06-20 23:02:26', '2023-06-20 23:02:26'),
(69, 'Jaipur, Rajasthan, India', 'Jaipur, Rajasthan, India', 'Jaipur', 'Rajasthan', NULL, 'India', '26.9124336', '75.7872709', '2023-06-20 23:03:11', '2023-06-20 23:03:11'),
(70, 'Brussels, Belgium', 'Brussels, Belgium', 'Brussels', 'Brussels', NULL, 'Belgium', '50.8476424', '4.3571696', '2023-06-20 23:03:29', '2023-06-20 23:03:29'),
(71, 'Nice, France', 'Nice, France', 'Nice', 'Provence-Alpes-Côte d\'Azur', NULL, 'France', '43.7101728', '7.261953200000001', '2023-06-20 23:03:47', '2023-06-20 23:03:47'),
(72, 'Chiang Mai, Mueang Chiang Mai District, Chiang Mai, Thailand', 'Chiang Mai, Mueang Chiang Mai District, Chiang Mai, Thailand', 'Chiang Mai', 'Chiang Mai', NULL, 'Thailand', '18.7883439', '98.98530079999999', '2023-06-20 23:06:25', '2023-06-20 23:06:25'),
(73, 'Sharm El-Sheikh, Qesm Sharm Ash Sheikh, Egypt', 'Sharm El-Sheikh, Qesm Sharm Ash Sheikh, South Sinai Governorate, Egypt', 'Sharm El-Sheikh', 'South Sinai Governorate', NULL, 'Egypt', '27.9654198', '34.3617769', '2023-06-20 23:07:18', '2023-06-20 23:07:18'),
(74, 'Lisbon, Portugal', 'Lisbon, Portugal', 'Lisbon', 'Lisbon', NULL, 'Portugal', '38.7222524', '-9.1393366', '2023-06-20 23:07:45', '2023-06-20 23:07:45'),
(75, 'المنطقة الصناعية بالاحساء، Eastern Province Saudi Arabia', 'Hasa Industrial City Saudi Arabia', 'Hasa Industrial City', 'Eastern Province', NULL, 'Saudi Arabia', '25.4016664', '49.4653313', '2023-06-20 23:14:10', '2023-06-20 23:14:10'),
(76, 'Marrakech, Morocco', 'Marrakesh, Morocco', 'Marrakesh', 'Marrakesh-Safi', NULL, 'Morocco', '31.6294723', '-7.981084500000001', '2023-06-20 23:14:50', '2023-06-20 23:14:50'),
(77, 'Jakarta, Indonesia', 'Jakarta, Indonesia', 'Jakarta', 'Jakarta', NULL, 'Indonesia', '-6.2087634', '106.845599', '2023-06-20 23:15:09', '2023-06-20 23:15:09'),
(78, 'Manama, Bahrain', 'Manama, Bahrain', 'Manama', 'Capital Governorate', NULL, 'Bahrain', '26.2235305', '50.5875935', '2023-06-20 23:15:34', '2023-06-20 23:15:34'),
(79, 'Hanoi, Hoàn Kiếm, Hanoi, Vietnam', 'Hanoi, Hoàn Kiếm, Hanoi, Vietnam', 'Hanoi', 'Hanoi', NULL, 'Vietnam', '21.0277644', '105.8341598', '2023-06-20 23:15:59', '2023-06-20 23:15:59'),
(80, 'Honolulu, HI, USA', 'Honolulu, HI, USA', 'Honolulu', 'Hawaii', NULL, 'United States', '21.3098845', '-157.8581401', '2023-06-20 23:16:33', '2023-06-20 23:16:33'),
(81, 'Manila, Metro Manila, Philippines', 'Manila, Metro Manila, Philippines', 'Manila', 'Metro Manila', NULL, 'Philippines', '14.5995124', '120.9842195', '2023-06-20 23:16:57', '2023-06-20 23:16:57'),
(82, 'Guilin, Guangxi, China', 'Guilin, Guangxi, China', 'Guilin', 'Guangxi', NULL, 'China', '25.2736099', '110.29002', '2023-06-20 23:17:21', '2023-06-20 23:17:21'),
(83, 'Auckland, New Zealand', 'Auckland, New Zealand', 'Auckland', 'Auckland', NULL, 'New Zealand', '-36.85088270000001', '174.7644881', '2023-06-20 23:17:54', '2023-06-20 23:17:54'),
(84, 'Siem Reap, Cambodia', 'Krong Siem Reap, Cambodia', 'Krong Siem Reap', 'Siem Reap Province', NULL, 'Cambodia', '13.3632533', '103.856403', '2023-06-20 23:18:39', '2023-06-20 23:18:39'),
(85, 'Sousse, Tunisia', 'Sousse, Tunisia', 'Sousse', 'Sousse', NULL, 'Tunisia', '35.8245029', '10.634584', '2023-06-20 23:19:07', '2023-06-20 23:19:07'),
(86, 'Amman, Jordan', 'Amman, Jordan', 'Amman', 'Amman Governorate', NULL, 'Jordan', '31.9539494', '35.910635', '2023-06-20 23:19:49', '2023-06-20 23:19:49'),
(87, 'Vancouver, BC, Canada', 'Vancouver, BC, Canada', 'Vancouver', 'British Columbia', NULL, 'Canada', '49.2827291', '-123.1207375', '2023-06-20 23:20:09', '2023-06-20 23:20:09'),
(88, 'Abu Dhabi - UAE', 'Abu Dhabi - United Arab Emirates', 'Abu Dhabi', 'Abu Dhabi', NULL, 'United Arab Emirates', '24.453884', '54.3773438', '2023-06-20 23:20:20', '2023-06-20 23:20:20'),
(89, 'Kiev, Ukraine', 'Kyiv, Ukraine, 02000', 'Kyiv', 'Kyiv city', '02000', 'Ukraine', '50.4501', '30.5234', '2023-06-20 23:20:37', '2023-06-20 23:20:37'),
(90, 'Doha, Qatar', 'Doha, Qatar', 'Doha', 'Doha', NULL, 'Qatar', '25.2854473', '51.53103979999999', '2023-06-20 23:20:51', '2023-06-20 23:20:51'),
(91, 'Florence, Metropolitan City of Florence, Italy', 'Florence, Metropolitan City of Florence, Italy', 'Florence', 'Tuscany', NULL, 'Italy', '43.7695604', '11.2558136', '2023-06-20 23:21:18', '2023-06-20 23:21:18'),
(92, 'Rio de Janeiro, State of Rio de Janeiro, Brazil', 'Rio de Janeiro, State of Rio de Janeiro, Brazil', 'Rio de Janeiro', 'State of Rio de Janeiro', NULL, 'Brazil', '-22.9068467', '-43.1728965', '2023-06-20 23:21:49', '2023-06-20 23:21:49'),
(93, 'Melbourne VIC, Australia', 'Melbourne VIC, Australia', 'Melbourne', 'Victoria', NULL, 'Australia', '-37.8136276', '144.9630576', '2023-06-20 23:21:59', '2023-06-20 23:21:59'),
(94, 'Washington D.C., DC, USA', 'Washington, DC, USA', 'Washington', 'District of Columbia', NULL, 'United States', '38.9071923', '-77.0368707', '2023-06-20 23:22:12', '2023-06-20 23:22:12'),
(95, 'Riyadh Saudi Arabia', 'Riyadh Saudi Arabia', 'Riyadh', 'Riyadh Province', NULL, 'Saudi Arabia', '24.7135517', '46.6752957', '2023-06-20 23:22:31', '2023-06-20 23:22:31'),
(96, 'Christchurch, New Zealand', 'Christchurch, New Zealand', 'Christchurch', 'Canterbury', NULL, 'New Zealand', '-43.5320214', '172.6305589', '2023-06-20 23:22:54', '2023-06-20 23:22:54'),
(97, 'Frankfurt, Germany', 'Frankfurt, Germany', 'Frankfurt', 'Hessen', NULL, 'Germany', '50.1109221', '8.6821267', '2023-06-20 23:23:08', '2023-06-20 23:23:08'),
(98, 'Baku, Azerbaijan', 'Baku, Azerbaijan', 'Baku', 'Baku', NULL, 'Azerbaijan', '40.40926169999999', '49.8670924', '2023-06-20 23:28:13', '2023-06-20 23:28:13'),
(99, 'Harare, Zimbabwe', 'Harare, Zimbabwe', 'Harare', 'Harare Province', NULL, 'Zimbabwe', '-17.8216288', '31.0492259', '2023-06-20 23:28:30', '2023-06-20 23:28:30'),
(100, 'Kolkata, West Bengal, India', 'Kolkata, West Bengal, India', 'Kolkata', 'West Bengal', NULL, 'India', '22.572646', '88.36389500000001', '2023-06-20 23:28:49', '2023-06-20 23:28:49'),
(101, 'Nanjing, Jiangsu, China', 'Nanjing, Jiangsu, China', 'Nanjing', 'Jiangsu', NULL, 'China', '32.0583799', '118.79647', '2023-06-20 23:30:43', '2023-06-20 23:30:43'),
(102, 'São Paulo, State of São Paulo, Brazil', 'São Paulo, State of São Paulo, Brazil', 'São Paulo', 'State of São Paulo', NULL, 'Brazil', '-23.5557714', '-46.6395571', '2023-06-20 23:49:01', '2023-06-20 23:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `like_dislikes`
--

CREATE TABLE `like_dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('like','dislike') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(24, '2023_06_06_164410_create_itinerary_galleries_table', 13),
(25, '2023_06_13_073242_create_itinerary_locations_table', 14),
(26, '2023_06_14_065334_add_location_id_to_itineraries', 14),
(27, '2023_06_16_103143_create_home_settings_table', 15),
(28, '2023_06_18_121137_create_subscriptions_table', 15),
(29, '2023_06_20_062648_create_crud_pages_table', 16),
(30, '2023_07_05_201115_create_sitemaps_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
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

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
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

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(117, 'itineraries-submitdescriptionform', 'admin', '2023-05-29 09:30:41', '2023-05-29 09:30:41'),
(118, 'itinerarylocations-index', 'admin', '2023-06-13 02:54:01', '2023-06-13 02:54:01'),
(119, 'itinerarylocations-create', 'admin', '2023-06-13 03:01:11', '2023-06-13 03:01:11'),
(120, 'itinerarylocations-store', 'admin', '2023-06-13 03:54:36', '2023-06-13 03:54:36'),
(121, 'itinerarylocations-update', 'admin', '2023-06-13 03:54:49', '2023-06-13 03:54:49'),
(122, 'itinerarylocations-edit', 'admin', '2023-06-13 03:55:11', '2023-06-13 03:55:11'),
(123, 'itinerarylocations-destroy', 'admin', '2023-06-13 03:55:29', '2023-06-13 03:55:29'),
(131, 'homesetting-destroy', 'admin', '2023-06-16 05:40:18', '2023-06-16 05:40:18'),
(132, 'homesetting-store', 'admin', '2023-06-17 15:19:06', '2023-06-17 15:19:06'),
(133, 'homesetting-updatepictures', 'admin', '2023-06-17 15:40:05', '2023-06-17 15:40:05'),
(134, 'crudpages-index', 'admin', '2023-06-20 01:32:41', '2023-06-20 01:32:41'),
(135, 'crudpages-create', 'admin', '2023-06-20 01:41:31', '2023-06-20 01:41:31'),
(136, 'crudpages-store', 'admin', '2023-06-20 01:49:24', '2023-06-20 01:49:24'),
(137, 'crudpages-edit', 'admin', '2023-06-20 01:59:33', '2023-06-20 01:59:33'),
(138, 'crudpages-update', 'admin', '2023-06-20 01:59:41', '2023-06-20 01:59:41'),
(139, 'crudpages-destroy', 'admin', '2023-06-20 01:59:51', '2023-06-20 01:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
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
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, 'site_logo', 'https://mytinery.pixeltechnosol.com/storage/media/siteimages/LOGO.png', '2023-05-07 00:55:51', '2023-06-20 22:38:34'),
(8, 'site_icon', 'https://mytinery.pixeltechnosol.com/storage/media/siteimages/LOGO.png', '2023-05-07 00:55:51', '2023-06-20 22:38:34'),
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
(33, 'ctrl_sidebar_elevation', 'elevation-4', '2023-05-07 00:55:51', '2023-05-07 00:55:51'),
(34, 'meta_description', 'The breathtaking vista, enchanting fountains, lush greenery, and monuments all coalesced to create an unforgettable experience. We strolled along the tranquil', '2023-06-15 23:20:15', '2023-06-15 23:20:15'),
(35, 'meta_keywords', 'Foodie, Backpacker, Cold, Coffee, Planned, Fun, Brief, Leaves', '2023-06-15 23:20:15', '2023-06-15 23:20:15'),
(36, 'banner_title', 'Welcome to Tinery', '2023-06-18 11:43:37', '2023-06-18 11:43:37'),
(37, 'banner_description', 'The Network for travelers, big and small, to discover and share their favourite experiences.', '2023-06-18 11:43:37', '2023-06-18 11:43:37'),
(38, 'about_us', '<p>Join our network today and become part of a growing community of travel enthusiasts.</p><p>Tinery aims to disrupt the #travelinspo industry by taking the power away from algorithms and into the hands of real people. With our unique focus on user-generated content, we empower travel creators to build awareness and reputation, and allow travel consumers to find more personalized and authentic travel recommendations from their peers.</p>', '2023-06-18 11:43:37', '2023-06-18 11:43:37'),
(39, 'files', NULL, '2023-06-18 11:43:37', '2023-06-18 11:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `sitemaps`
--

CREATE TABLE `sitemaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'foodie', 'Foodie', '2023-05-08 12:20:34', '2023-06-04 10:19:13'),
(13, 'traveling-with-kids', 'Traveling With Kids', '2023-06-11 21:46:11', '2023-06-11 21:46:11'),
(14, 'hiking', 'Hiking', '2023-06-11 21:48:16', '2023-06-11 21:48:16'),
(15, 'culture', 'Culture', '2023-06-11 21:48:40', '2023-06-11 21:48:40'),
(16, 'seniors', 'Seniors', '2023-06-11 21:50:48', '2023-06-11 21:50:48'),
(17, 'breweries', 'Breweries', '2023-06-11 21:51:42', '2023-06-11 21:51:42'),
(11, 'bachelorette', 'Bachelorette', '2023-06-11 21:42:05', '2023-06-11 21:42:05'),
(12, 'girls-trip', 'Girls Trip', '2023-06-11 21:44:48', '2023-06-11 21:44:48'),
(18, 'wineries', 'Wineries', '2023-06-11 21:51:55', '2023-06-11 21:51:55'),
(19, 'lazy', 'Lazy', '2023-06-11 21:52:16', '2023-06-11 21:52:16'),
(20, 'beach', 'Beach', '2023-06-11 21:52:26', '2023-06-11 21:52:26'),
(21, 'unique', 'Unique', '2023-06-11 21:52:46', '2023-06-11 21:52:46'),
(22, 'dancing', 'Dancing', '2023-06-22 13:08:46', '2023-06-22 13:08:46'),
(34, 'nightlife', 'Nightlife', '2023-06-22 13:15:48', '2023-06-22 13:15:48'),
(24, 'accessible', 'Accessible', '2023-06-22 13:10:35', '2023-06-22 13:10:35'),
(25, 'outdoorsy', 'Outdoorsy', '2023-06-22 13:11:09', '2023-06-22 13:11:09'),
(26, 'group-trip', 'Group Trip', '2023-06-22 13:11:41', '2023-06-22 13:11:41'),
(27, 'couple-trip', 'Couple Trip', '2023-06-22 13:11:47', '2023-06-22 13:11:47'),
(28, 'spa', 'Spa', '2023-06-22 13:12:12', '2023-06-22 13:12:12'),
(29, 'skiing', 'Skiing', '2023-06-22 13:12:38', '2023-06-22 13:12:38'),
(30, 'surfing', 'Surfing', '2023-06-22 13:12:41', '2023-06-22 13:12:41'),
(31, 'scenic', 'Scenic', '2023-06-22 13:14:16', '2023-06-22 13:14:16'),
(32, 'roadtrip', 'Roadtrip', '2023-06-22 13:14:24', '2023-06-22 13:14:24'),
(33, 'cycling', 'Cycling', '2023-06-22 13:14:46', '2023-06-22 13:14:46'),
(35, 'day-drinking', 'Day Drinking', '2023-06-22 13:15:56', '2023-06-22 13:15:56'),
(36, 'shopping', 'Shopping', '2023-06-22 13:16:28', '2023-06-22 13:16:28'),
(37, 'boys-weekend', 'Boys Weekend', '2023-06-26 01:32:10', '2023-06-26 01:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `lastname` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirmpassword` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `username`, `email_verified_at`, `password`, `created_at`, `updated_at`, `confirmpassword`, `remember_token`, `bio`, `facebook`, `twitter`, `instagram`, `tiktok`, `website`, `tags`, `profile`, `deleted_at`) VALUES
(4, 'ali', 'zafar', 'test@test.com', 'alizafar', NULL, '$2y$10$L4/Lc8lmthoDYe9ne54skOSX673eZEJTqH1Eef0mwMerYX6zNUBb.', '2023-05-18 09:13:06', '2023-05-18 09:13:06', NULL, NULL, 'I like to travel all around the world.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Benjamin', 'Franklin', 'benjaminfranklin@gmail.com', 'benjaminfranklin', NULL, '$2y$10$1jPH0tJJpjlvj4TxuIXgxuG0PPMMyvRrnFEue/ZSKa/XgVpzqV3U.', '2023-05-22 06:04:55', '2023-05-22 07:10:40', '$2y$10$0CdtE.VqzVT3WpYdYRQ4WOTAGzEUhTI1YLL1eRY5QUAnu7B1qC5R6', NULL, 'I like to travel all around the world.', NULL, NULL, NULL, NULL, NULL, NULL, '1684757440.png', NULL),
(9, 'James', 'Dean', 'jamesdean@gmail.com', 'jamesdean', NULL, '$2y$10$IFiqJItMoVk7RQnGt1lLa.7qlpYXgZ/o.TASQqgOccg1yKjqe3L6q', '2023-05-29 18:20:02', '2023-05-29 18:20:56', '$2y$10$fNWK93JyNnoRlnXwYTnJFeKTNaG/viXI259Wn92dzq3tuN/RNK1xa', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit....', '#', '#', '#', '#', '#', NULL, '1685402446.png', NULL),
(10, 'Angelina', 'Smith', 'angelinasmith@gmail.com', 'angelinasmith', NULL, '$2y$10$U8BKIe2boEaM6qZktEOSae8T7IHhmBLY7pHTUKj1ekVUHsOgLrbvi', '2023-05-29 18:21:32', '2023-05-29 18:22:23', '$2y$10$Y.mBCCk6tFYIszPieGuFyOrofykO5GtrouZJrpsEfzb64jpNYTNLe', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit....', '#', '#', '#', '#', '#', NULL, '1685402534.png', NULL),
(11, 'Megan', 'James', 'meganjames@gmail.com', 'meganjames', NULL, '$2y$10$FoXdCQ5E99VgoM/CqehDQevRyfIPu3B0MCzeOsOIlUqIm5W1dAzt2', '2023-05-29 18:24:48', '2023-06-26 07:33:06', '$2y$10$EyPxFCLOkV1xMcCRrhrbD.lHbPaAPpzs3xr4im8XRrstdbKr2e702', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit........', '#', '#', '#', '#', '#', NULL, '1685402723.png', NULL),
(12, 'Holly', 'Fax', 'hollyfax@gmail.com', 'hollyfax', NULL, '$2y$10$j28Q9BqOu3TvqnvH3CMq5Ozlt6ZKVFYGpGN4oO2dRhBwnWT7cGvUK', '2023-05-29 18:26:05', '2023-05-29 18:26:41', '$2y$10$0jOWZPPC1Ze2PPypzIv.f.kvgEdvS5srz3Jr4Y.4I5IWFGSzQ1peu', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit....', '#', '#', '#', '#', '#', NULL, '1685402791.png', NULL),
(13, 'Justin', 'Lang', 'justinlang@gmail.com', 'justinlang', NULL, '$2a$12$A8xyz0fOOgB41EbR.5L5YOPjmiui76NAaTJvci0D6EMu8ro3O84rC', '2023-05-29 18:27:20', '2023-05-29 18:29:13', '$2y$10$eCPMVoK5b/JFL4gqz8DNFeEsWf3AcQYBQSm2/hRI0U1e8NLUdn6yW', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit....', '#', '#', '#', '#', '#', NULL, '1685402895.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_itineraries_id_foreign` (`itineraries_id`) USING BTREE;

--
-- Indexes for table `crud_pages`
--
ALTER TABLE `crud_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `crud_pages_slug_unique` (`slug`),
  ADD UNIQUE KEY `crud_pages_file_unique` (`file`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_itineraries_id_foreign` (`itineraries_id`);

--
-- Indexes for table `forgot_password_codes`
--
ALTER TABLE `forgot_password_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itineraries_slug_unique` (`slug`),
  ADD KEY `itineraries_user_id_foreign` (`user_id`);

--
-- Indexes for table `itineraries_tags`
--
ALTER TABLE `itineraries_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itinerary_activities`
--
ALTER TABLE `itinerary_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_activities_itineraries_id_foreign` (`itineraries_id`),
  ADD KEY `itinerary_activities_days_id_foreign` (`days_id`);

--
-- Indexes for table `itinerary_days`
--
ALTER TABLE `itinerary_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_days_itineraries_id_foreign` (`itineraries_id`);

--
-- Indexes for table `itinerary_galleries`
--
ALTER TABLE `itinerary_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itinerary_locations`
--
ALTER TABLE `itinerary_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_dislikes`
--
ALTER TABLE `like_dislikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_dislikes_user_id_foreign` (`user_id`),
  ADD KEY `like_dislikes_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitemaps`
--
ALTER TABLE `sitemaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `crud_pages`
--
ALTER TABLE `crud_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `forgot_password_codes`
--
ALTER TABLE `forgot_password_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itineraries`
--
ALTER TABLE `itineraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `itineraries_tags`
--
ALTER TABLE `itineraries_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itinerary_activities`
--
ALTER TABLE `itinerary_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `itinerary_days`
--
ALTER TABLE `itinerary_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `itinerary_galleries`
--
ALTER TABLE `itinerary_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `itinerary_locations`
--
ALTER TABLE `itinerary_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `like_dislikes`
--
ALTER TABLE `like_dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sitemaps`
--
ALTER TABLE `sitemaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

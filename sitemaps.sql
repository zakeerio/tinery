-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 05, 2023 at 08:53 PM
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
-- Table structure for table `sitemaps`
--

DROP TABLE IF EXISTS `sitemaps`;
CREATE TABLE IF NOT EXISTS `sitemaps` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitemaps`
--

INSERT INTO `sitemaps` (`id`, `url`, `description`, `created_at`, `updated_at`) VALUES
(1, 'http://127.0.0.1:8001/itineraries/autumn-escape-1', 'Autumn Escape', '2023-07-05 15:52:48', '2023-07-05 15:52:48'),
(2, 'http://127.0.0.1:8001/itineraries/semester-abroad-1', 'Semester Abroad', '2023-07-05 15:52:48', '2023-07-05 15:52:48'),
(3, 'http://127.0.0.1:8001/itineraries/my-winter-break-2022', 'My Winter Break 2022', '2023-07-05 15:52:48', '2023-07-05 15:52:48'),
(4, 'http://127.0.0.1:8001/itineraries/my-spring-break-trip', 'My Spring Break Trip', '2023-07-05 15:52:48', '2023-07-05 15:52:48'),
(5, 'http://127.0.0.1:8001/itineraries/my-winter-vacation-in-2023-1', 'My winter vacation in 2023', '2023-07-05 15:52:48', '2023-07-05 15:52:48'),
(6, 'http://127.0.0.1:8001/itineraries/test-two-1', 'Test two', '2023-07-05 15:52:48', '2023-07-05 15:52:48'),
(7, 'http://127.0.0.1:8001/itineraries/my-itinerary-1-1', 'My itinerary 1', '2023-07-05 15:52:48', '2023-07-05 15:52:48'),
(8, 'http://127.0.0.1:8001/itineraries/one-title-1', 'One title', '2023-07-05 15:52:48', '2023-07-05 15:52:48'),
(9, 'http://127.0.0.1:8001/itineraries/itinerary-16', '', '2023-07-05 15:52:48', '2023-07-05 15:52:48'),
(10, 'http://127.0.0.1:8001', 'Home', '2023-07-05 20:52:48', '2023-07-05 20:52:48'),
(11, 'http://127.0.0.1:8001/itineraries', 'Itineraries', '2023-07-05 20:52:48', '2023-07-05 20:52:48'),
(12, 'http://127.0.0.1:8001/term-of-use', 'Term of use', '2023-07-05 20:52:48', '2023-07-05 20:52:48'),
(13, 'http://127.0.0.1:8001/privacy-policy', 'Privacy policy', '2023-07-05 20:52:48', '2023-07-05 20:52:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

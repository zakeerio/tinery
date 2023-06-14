-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2023 at 11:20 AM
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
-- Table structure for table `itinerary_locations`
--

DROP TABLE IF EXISTS `itinerary_locations`;
CREATE TABLE IF NOT EXISTS `itinerary_locations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `address_street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street_line1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary_locations`
--

INSERT INTO `itinerary_locations` (`id`, `address_street`, `address_street_line1`, `address_city`, `address_state`, `address_zipcode`, `address_country`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(3, 'Hong Kong', 'Hong Kong', 'Hong Kong', 'Hong Kong', '1234', 'Hong Kong', '22.3192011', '114.1696121', '2023-06-13 04:44:16', '2023-06-13 04:44:16'),
(4, 'Singapore, Singapore', 'Singapore', 'Singapore', 'Singapor', '999', 'Singapore', '1.3553794', '103.8677444', '2023-06-13 04:44:39', '2023-06-13 04:44:39'),
(5, 'Bangkok, Thailand', 'Bangkok, Thailand', 'Bangkok', 'Bangkok', '111', 'Thailand', '13.7563309', '100.5017651', '2023-06-13 04:44:49', '2023-06-13 04:44:49'),
(6, 'London, UK', 'London, UK', 'London', 'England', '121', 'United Kingdom', '51.5072178', '-0.1275862', '2023-06-13 04:45:05', '2023-06-13 04:45:05'),
(7, 'Macau, Macau - State of Rio Grande do Norte, Brazil', 'Macau, RN, 59500-000, Brazil', 'Macau', 'Rio Grande do Norte', '59500-000', 'Brazil', '-5.113349', '-36.6355223', '2023-06-13 04:45:15', '2023-06-13 04:45:15'),
(8, 'Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia', 'Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia', 'Kuala Lumpur', 'Federal Territory of Kuala Lumpur', '111', 'Malaysia', '3.139003', '101.686855', '2023-06-13 04:45:25', '2023-06-13 04:45:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

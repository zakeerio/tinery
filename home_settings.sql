-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2023 at 09:01 PM
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
-- Table structure for table `home_settings`
--

DROP TABLE IF EXISTS `home_settings`;
CREATE TABLE IF NOT EXISTS `home_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_title` text COLLATE utf8mb4_unicode_ci,
  `banner_title` text COLLATE utf8mb4_unicode_ci,
  `banner_description` text COLLATE utf8mb4_unicode_ci,
  `about_us` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_settings`
--

INSERT INTO `home_settings` (`id`, `site_title`, `banner_title`, `banner_description`, `about_us`, `logo`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Tinery Website | Tinery Website', 'Welcome to Tinery', 'The Network for travelers, big and small, to discover and share their favourite experiences.', '<p>Join our network today and become part of a growing community of travel enthusiasts.</p><p>Tinery aims to disrupt the #travelinspo industry by taking the power away from algorithms and into the hands of real people. With our unique focus on user-generated content, we empower travel creators to build awareness and reputation, and allow travel consumers to find more personalized and authentic travel recommendations from their peers.<br></p>', '16870351051.png', '16870351052.png', NULL, '2023-06-17 15:55:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

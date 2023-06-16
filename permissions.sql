-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2023 at 06:50 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(120, 'itinerarylocations-index', 'admin', '2023-06-13 02:54:01', '2023-06-13 02:54:01'),
(121, 'itinerarylocations-create', 'admin', '2023-06-13 03:01:11', '2023-06-13 03:01:11'),
(122, 'itinerarylocations-store', 'admin', '2023-06-13 03:54:36', '2023-06-13 03:54:36'),
(123, 'itinerarylocations-update', 'admin', '2023-06-13 03:54:49', '2023-06-13 03:54:49'),
(124, 'itinerarylocations-edit', 'admin', '2023-06-13 03:55:11', '2023-06-13 03:55:11'),
(125, 'itinerarylocations-destroy', 'admin', '2023-06-13 03:55:29', '2023-06-13 03:55:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

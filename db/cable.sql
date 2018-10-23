-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2018 at 07:48 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cable`
--

-- --------------------------------------------------------

--
-- Table structure for table `collectors`
--

DROP TABLE IF EXISTS `collectors`;
CREATE TABLE IF NOT EXISTS `collectors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_payment_collected` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_payment_given_to_owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_pending` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collectors`
--

INSERT INTO `collectors` (`id`, `name`, `father_name`, `phone_number`, `address`, `region`, `total_payment_collected`, `total_payment_given_to_owner`, `amount_pending`, `created_at`, `updated_at`, `password`) VALUES
(2, 'Talha', 'yousuf', '043428699554', 'lahore', 'lahore', '-1200', '1200', '-1200', '2018-10-23 12:21:47', '2018-10-23 12:21:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_collected_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_collection_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '200',
  `amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_collector_id` int(11) DEFAULT NULL,
  `reserve_amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `father_name`, `phone_number`, `address`, `connection_date`, `region`, `payment_status`, `payment_collected_by`, `payment_collection_date`, `monthly_amount`, `amount_paid`, `created_at`, `updated_at`, `payment_collector_id`, `reserve_amount`) VALUES
(20, 'yousuf', 'javaid', '03428699554', 'lahore', '10/31/2018 12:24 AM', 'lahore', 'paid', 'Talha', NULL, '200', '200', '2018-10-23 14:25:06', '2018-10-23 14:25:06', 2, '0'),
(21, 'yousf', 'javaid', '0342869954', 'lahore', '11/05/2018 12:26 AM', 'lahore', 'paid', 'Talha', NULL, '200', '200', '2018-10-23 14:26:17', '2018-10-23 14:26:17', 2, '0'),
(22, 'yousf', 'javaid', '0342869954', 'lahore', '11/05/2018 12:26 AM', 'lahore', 'paid', 'Talha', NULL, '200', '200', '2018-10-23 14:30:41', '2018-10-23 14:30:41', 2, '0'),
(23, 'djhfh', 'dfdf', '65', 'dbfdf', '10/30/2018 12:34 AM', 'fdf', 'paid', 'Talha', NULL, '123', '45', '2018-10-23 14:35:01', '2018-10-23 14:35:01', 2, '0'),
(9, 'dds', 'ds', 'dssd', 'dfsdf', '10/03/2018 6:45 PM', 'dffsdfsdf', 'paid', 'paid', '12-12-28', 'dffdf', 'fsdfsdf', '2018-10-21 08:47:43', '2018-10-21 08:47:43', NULL, '0'),
(24, 'qw', 'qw', '232', 'as', '10/29/2018 12:37 AM', 'wq', 'paid', 'Talha', NULL, '12', '23', '2018-10-23 14:37:45', '2018-10-23 14:37:45', 2, '0'),
(12, 'dds', 'ds', 'dssd', 'dfsdf', '10/03/2018 6:45 PM', 'dffsdfsdf', 'paid', 'paid', '12-12-28', 'dffdf', 'fsdfsdf', '2018-10-21 08:58:07', '2018-10-21 08:58:07', NULL, '0'),
(13, 'dds', 'ds', 'dssd', 'dfsdf', '10/03/2018 6:45 PM', 'dffsdfsdf', 'paid', 'paid', '12-12-28', 'dffdf', 'fsdfsdf', '2018-10-21 08:58:41', '2018-10-21 08:58:41', NULL, '0'),
(14, 'dds', 'ds', 'dssd', 'dfsdf', '10/03/2018 6:45 PM', 'dffsdfsdf', 'paid', 'paid', '12-12-28', 'dffdf', 'fsdfsdf', '2018-10-21 09:02:07', '2018-10-21 09:02:07', NULL, '0'),
(15, 'dds', 'ds', 'dssd', 'dfsdf', '10/03/2018 6:45 PM', 'dffsdfsdf', 'paid', 'paid', '12-12-28', 'dffdf', 'fsdfsdf', '2018-10-21 09:03:54', '2018-10-21 09:03:54', NULL, '0'),
(16, 'dds', 'ds', 'dssd', 'dfsdf', '10/03/2018 6:45 PM', 'dffsdfsdf', 'paid', 'paid', '12-12-28', 'dffdf', 'fsdfsdf', '2018-10-21 09:04:16', '2018-10-21 09:04:16', NULL, '0'),
(17, 'YOusuf', 'ds', 'dssd', 'dfsdf', '10/03/2018 6:45 PM', 'dffsdfsdf', 'unpaid', 'Talha', '12-12-28', 'dffdf', 'fsdfsdf', '2018-10-21 09:04:41', '2018-10-21 09:04:41', 2, '0'),
(18, 'CHAUDHRY', 'JAVAID', '03428699554', 'LAHORE', '11/30/2018 7:08 PM', 'lAHORE', 'paid', 'paid', NULL, '200', '100', '2018-10-21 09:09:22', '2018-10-21 09:09:22', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_10_02_172854_create_customers_table', 1),
(2, '2018_10_02_180659_create_collectors_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yousuf', 'ch@gmail.com', '12345', NULL, '2018-10-01 13:05:00', '2018-10-01 13:05:00'),
(2, 'yousuf', 'ch12@gmail.com', 'Yousuf@123', NULL, '2018-10-03 11:51:13', '2018-10-03 11:51:13'),
(3, 'kam', 'kam@gmail.com', 'you@123', NULL, '2018-10-03 12:00:23', '2018-10-03 12:00:23'),
(4, 'dd', 'hv@gmail.com', '12344', NULL, '2018-10-03 12:03:10', '2018-10-03 12:03:10'),
(5, 'dd', 'hv@gmail.com', '12344', NULL, '2018-10-03 12:03:26', '2018-10-03 12:03:26'),
(6, 'dd', 'hv@gmail.com', '12344', NULL, '2018-10-03 12:03:42', '2018-10-03 12:03:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

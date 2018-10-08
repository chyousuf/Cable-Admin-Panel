-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2018 at 06:26 PM
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `payment_collection_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `father_name`, `phone_number`, `address`, `connection_date`, `region`, `payment_status`, `payment_collected_by`, `payment_collection_date`, `monthly_amount`, `amount_paid`, `created_at`, `updated_at`) VALUES
(1, 'Yousuf', 'javaid', '03428699554', 'Lahore', '10/23/2018 11:04 PM', 'islampura', 'paid', 'paid', '23-12-2018', '200', '200', '2018-10-08 13:04:43', '2018-10-08 13:04:43'),
(2, 'Yousuf', 'javaid', '03428699554', 'Lahore', '10/23/2018 11:04 PM', 'islampura', 'paid', 'paid', '23-12-2018', '200', '200', '2018-10-08 13:04:59', '2018-10-08 13:04:59'),
(3, 'jhon', 'taylor', '0987654', '123as', '10/24/2018 11:10 PM', 'asd', 'paid', 'paid', '21', '211', '112', '2018-10-08 13:10:25', '2018-10-08 13:10:25'),
(4, 'jhon', 'taylor', '0987654', '123as', '10/24/2018 11:10 PM', 'asd', 'paid', 'paid', '21', '211', '112', '2018-10-08 13:10:52', '2018-10-08 13:10:52'),
(5, 'jhon', 'taylor', '0987654', '123as', '10/24/2018 11:10 PM', 'asd', 'paid', 'paid', '21', '211', '112', '2018-10-08 13:15:18', '2018-10-08 13:15:18'),
(6, 'jhon', 'taylor', '0987654', '123as', '10/24/2018 11:10 PM', 'asd', 'paid', 'paid', '21', '211', '112', '2018-10-08 13:15:44', '2018-10-08 13:15:44'),
(7, 'jhon', 'taylor', '0987654', '123as', '10/24/2018 11:10 PM', 'asd', 'paid', 'paid', '21', '211', '112', '2018-10-08 13:17:12', '2018-10-08 13:17:12'),
(8, 'jhon', 'taylor', '0987654', '123as', '10/24/2018 11:10 PM', 'asd', 'paid', 'paid', '21', '211', '112', '2018-10-08 13:19:10', '2018-10-08 13:19:10');

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

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 09, 2022 at 04:31 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `avatar`, `created_at`, `updated_at`) VALUES
(5, 'Apple', '1654598272CodeLearn_certification.png', '2022-06-07 03:34:14', '2022-06-07 03:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_category_name_unique` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'điện thoại apple', '2022-06-06 23:48:28', '2022-06-06 23:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_05_28_084834_create_users_table', 1),
(3, '2022_05_28_095021_create_roles_table', 1),
(4, '2022_06_04_080651_create_categories_table', 1),
(5, '2022_06_04_080900_create_brands_table', 1),
(10, '2022_06_05_125802_update_users_table', 2),
(11, '2022_06_09_093408_create_suppliers_table', 3),
(12, '2022_06_09_110214_create_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `desc` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_supplier_id_foreign` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name_role`, `created_at`, `updated_at`) VALUES
(1, 'supper admin', '2022-06-07', NULL),
(2, 'admin', '2022-06-07', NULL),
(3, 'customer', '2022-06-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GST` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_supplied` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone_number`, `GST`, `address`, `city`, `country`, `quantity_supplied`, `created_at`, `updated_at`) VALUES
(1, 'MeanTus', 'tu@gmail.com', '0834333860', '12345678', 'aaaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:33:01', '2022-06-09 03:33:01'),
(2, 'MeanTus12344', 'tu123@gmail.com', '0834333860', '12345678', 'aaaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:44:40', '2022-06-09 03:44:40'),
(3, 'Tus', 'aaaa@gmail.com', '0834333860', '12345678', 'aaaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:49:40', '2022-06-09 03:49:40'),
(4, 'Manh', 'manh@gmail.com', '0834333860', '12345678', 'aaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:50:14', '2022-06-09 03:50:14'),
(5, 'Apple', 'apple@gmail.com', '0834333860', '12345678', 'aaaaaaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:50:55', '2022-06-09 03:50:55'),
(6, 'Samsung', 'sungsam@gmail.com', '0834333860', '12345678', 'aaaaaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:51:24', '2022-06-09 03:51:24'),
(7, 'ABCD', 'abcd@gmail.com', '0834333860', '12345678', 'aaaaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:52:02', '2022-06-09 03:52:02'),
(8, 'DEFGH', 'defgh@gmail.com', '0834333860', '12345678', 'aaaaaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:52:37', '2022-06-09 03:52:37'),
(9, 'QQQQQQQ', 'qqq@gmail.com', '0834333860', '12345678', 'aaaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:53:05', '2022-06-09 03:53:05'),
(10, 'EEEEEEEE', 'eeeeee@gmail.com', '0834333860', '12345678', 'aaaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:53:38', '2022-06-09 03:53:38'),
(11, 'RRRRRRR', 'rrrrrr@gmail.com', '0834333860', '12345678', 'aaaaaaaaaaa', 'bbbbbbbb', 'cccccc', 0, '2022-06-09 03:54:06', '2022-06-09 03:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `avatar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `gender`, `password`, `birthdate`, `role_id`, `created_at`, `updated_at`, `phone_number`, `status`, `avatar`) VALUES
(2, 'MeanTus', 'admin@gmail.com', 1, '$2y$10$qr16skowJ0DChYWkzcTKkuGQm0.PDMW/t2M7RK/dS4M.olJtqLxki', '2022-06-01', 1, '2022-06-07', '2022-06-07', NULL, 0, NULL),
(3, 'MeanTus12344', 'tu@gmail.com', 0, '$2y$10$g7r3ykFKmULAYSzrBFx7.udYtfDnwBcqsoUEUEkBzeSyoAUr4Kv2C', '2022-06-02', 3, '2022-06-07', '2022-06-08', '0834333860', 0, 'user3/1654705162123.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

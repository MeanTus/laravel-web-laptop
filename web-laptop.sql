-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th8 09, 2022 lúc 03:54 PM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web-laptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'MSI', '1655269243Msi_logo.png', '2022-06-14 22:00:43', '2022-06-14 22:00:43'),
(2, 'DELL', '1655269287Dell_Logo.svg.png', '2022-06-14 22:01:27', '2022-06-14 22:01:27'),
(3, 'Acer', '1655269437acer.jpg', '2022-06-14 22:03:57', '2022-06-14 22:03:57'),
(4, 'HP', '16552694512048px-HP_logo_2012.svg.png', '2022-06-14 22:04:11', '2022-06-14 22:04:11'),
(5, 'Lenovo', '1655269468Lenovo_logo_2015.svg.png', '2022-06-14 22:04:28', '2022-06-14 22:04:28'),
(6, 'Asus', '1655269480AsusTek-black-logo.png', '2022-06-14 22:04:40', '2022-07-25 10:15:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_product_id_foreign` (`product_id`),
  KEY `cart_customer_id_foreign` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `qty`, `price`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(44, 1, 15000000, 2, 6, '2022-07-26 00:30:17', '2022-07-26 00:30:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_category_name_unique` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Laptop gaming', '2022-06-14 22:05:31', '2022-06-14 22:05:31'),
(2, 'Laptop văn phòng', '2022-06-14 22:05:59', '2022-06-19 08:29:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_color` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hex` (`hex`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `hex`, `name_color`, `created_at`, `updated_at`) VALUES
(1, '#0E0E0E', 'Đen', '2022-06-18 11:00:03', '2022-06-18 11:00:03'),
(2, '#EB2D37', 'Đỏ', '2022-06-18 11:02:31', '2022-06-18 11:02:31'),
(3, '#8A49E4', 'Tím', '2022-06-28 09:13:58', '2022-06-28 09:13:58'),
(4, '#3381F6', 'Xanh dương', '2022-06-28 09:16:04', '2022-06-28 09:16:04'),
(5, '#A0D911', 'Xanh Lá', '2022-06-28 09:16:43', '2022-06-28 09:16:43'),
(6, '#FBDD1E', 'Vàng Nhạt', '2022-06-28 09:18:45', '2022-06-28 09:18:45'),
(7, '#F0F2F4', 'Xám', '2022-06-28 09:19:17', '2022-06-28 09:19:17'),
(8, '#FFFFFF', 'Trắng', '2022-06-28 09:19:45', '2022-06-28 09:19:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_product_id_foreign` (`product_id`),
  KEY `comments_customer_id_foreign` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `content`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm rất đẹp', 21, 3, '2022-08-02 06:08:07', NULL),
(2, 'Sản phẩm sử dụng tốt', 21, 5, '2022-08-02 06:08:07', NULL),
(3, 'Quá tuyệt', 21, 3, '2022-08-02 02:59:58', '2022-08-02 02:59:58'),
(8, 'Sản phẩm rất chất lượng.', 21, 3, '2022-08-02 03:10:15', '2022-08-02 03:10:15'),
(9, 'Đẹp dữ lắm', 21, 6, '2022-08-02 03:12:28', '2022-08-02 03:12:28'),
(10, 'Mẫu này rất đẹp', 20, 6, '2022-08-02 03:29:15', '2022-08-02 03:29:15'),
(13, 'Rất vừa ý', 21, 3, '2022-08-02 09:28:50', '2022-08-02 09:28:50'),
(14, 'Hàng rất đẹp', 21, 3, '2022-08-02 09:31:40', '2022-08-02 09:31:40'),
(15, 'Dùng rất tốt', 21, 3, '2022-08-02 09:32:42', '2022-08-02 09:32:42'),
(31, 'Sản phẩm sử dụng tốt.', 1, 3, '2022-08-03 19:07:05', '2022-08-03 19:07:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` smallint(6) NOT NULL,
  `discount_rate` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `desc_coupon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `feature`, `discount_rate`, `quantity`, `status`, `desc_coupon`, `created_at`, `updated_at`) VALUES
(5, 'ABCDEF123', 0, 20, 97, 1, 'Giảm giá 20%', '2022-07-13 21:13:29', '2022-08-08 03:46:39'),
(6, 'ABC', 1, 7500000, 97, 0, 'aaa', NULL, '2022-08-07 09:01:28'),
(7, 'GIAMGIA', 0, 10, 100, 0, 'Giảm giá 10%', '2022-08-09 03:59:06', '2022-08-09 03:59:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cpu`
--

DROP TABLE IF EXISTS `cpu`;
CREATE TABLE IF NOT EXISTS `cpu` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cpu`
--

INSERT INTO `cpu` (`id`, `name`, `created_at`, `updated_at`) VALUES
('1', 'CPUIntel, Core i7, 10750H', '2022-06-14 19:42:48', '2022-06-14 19:42:48'),
('i51240P', 'Intel Core i5 1240P, 12 nhân, 16 luồng', '2022-07-31 08:13:03', '2022-07-31 08:13:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gpu`
--

DROP TABLE IF EXISTS `gpu`;
CREATE TABLE IF NOT EXISTS `gpu` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gpu`
--

INSERT INTO `gpu` (`id`, `name`, `created_at`, `updated_at`) VALUES
('1', 'RTX 3070Ti 16gb', '2022-06-14 19:43:38', '2022-06-14 19:43:38'),
('IrisXeGraphics', 'Intel Iris Xe Graphics', '2022-07-31 08:18:14', '2022-07-31 08:18:14'),
('RTX3070Ti8GBGDDR6', 'NVIDIA® GeForce RTX™ 3070 Ti 8GB GDDR6', '2022-07-31 08:26:21', '2022-07-31 08:26:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_05_28_084834_create_users_table', 2),
(4, '2022_06_04_080651_create_categories_table', 2),
(5, '2022_06_04_080900_create_brands_table', 2),
(6, '2022_06_05_125802_update_users_table', 3),
(7, '2022_06_09_093408_create_suppliers_table', 3),
(8, '2022_06_09_110214_create_products_table', 3),
(10, '2022_06_13_095103_create_ram_table', 4),
(11, '2022_06_13_095737_create_cpu_table', 4),
(12, '2022_06_13_095902_create_gpu_table', 4),
(13, '2022_06_13_101340_change_desc_type_products_table', 4),
(15, '2022_06_18_155426_create_colors_table', 5),
(18, '2022_06_12_132228_update_products_table', 6),
(21, '2022_07_04_094645_create_orders_table', 9),
(22, '2022_07_04_110606_create_order_detail_table', 10),
(23, '2022_07_12_025208_create_cart_table', 11),
(24, '2022_07_13_062158_create_tbl_social_table', 12),
(26, '2022_07_13_104859_create_coupons_table', 13),
(27, '2022_05_28_095021_create_roles_table', 14),
(28, '2022_07_16_160301_create_token_reset_pass_table', 15),
(29, '2022_07_20_043435_create_statistical_table', 16),
(32, '2022_08_02_043835_create_comments_table', 17),
(33, '2022_08_03_030545_create_ratings_table', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` double DEFAULT '0',
  `payment_method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `total_price` double NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `desc_cancel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  KEY `orders_admin_id_foreign` (`admin_id`),
  KEY `orders_discount_code_foreign` (`discount_code`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `email`, `phone_number`, `address`, `city`, `country`, `discount_code`, `discount_price`, `payment_method`, `note`, `total_price`, `status`, `desc_cancel`, `customer_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(24, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '5/20 Nguyễn Văn Vĩnh', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'trực tiếp', 'a', 15000000, 0, NULL, 3, NULL, '2022-07-09 22:54:55', '2022-07-09 22:54:55'),
(25, 'Ái Nhi', 'tu.minhnguyen3107@gmail.com', '0834333860', '5/20 Nguyễn Văn Vĩnh', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'trực tiếp', 'a', 15000000, 0, NULL, 3, NULL, '2022-07-09 23:11:42', '2022-07-09 23:11:42'),
(26, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'trực tiếp', NULL, 15000000, 0, NULL, 3, NULL, '2022-07-10 05:46:44', '2022-07-10 05:46:44'),
(27, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'trực tiếp', NULL, 15000000, 1, 'Địa chỉ không hợp lệ', 3, 2, '2022-07-10 06:27:31', '2022-07-10 21:32:18'),
(28, 'Ái Nhi', 'tu.minhnguyen3107@gmail.com', '0834333860', '5/20 Nguyễn Văn Vĩnh', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'trực tiếp', 'a', 3000000, 0, NULL, 3, 2, '2022-07-10 06:55:11', '2022-07-10 21:31:57'),
(29, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '5/20 Nguyễn Văn Vĩnh', 'Hồ Chí Minh', 'Việt Nam', 'ABC', 7500000, 'trực tiếp', 'Dễ vỡ', 7500000, 1, NULL, 3, 2, '2022-07-14 17:42:08', '2022-07-23 09:48:19'),
(30, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '5/20 Nguyễn Văn Vĩnh', 'Hồ Chí Minh', 'Việt Nam', 'ABCDEF123', 3000000, 'trực tiếp', NULL, 12000000, 1, NULL, NULL, 2, '2022-07-15 20:03:53', '2022-07-23 09:46:00'),
(31, 'Ái Nhi', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', 'ABCDEF123', 12400000, 'trực tiếp', NULL, 49600000, 1, NULL, NULL, 2, '2022-07-15 20:19:46', '2022-07-21 04:18:00'),
(32, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'vnpay', 'dễ vỡ', 61500000, 0, NULL, NULL, 2, '2022-07-24 03:26:53', '2022-07-31 07:29:06'),
(33, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'vnpay', 'dễ vỡ', 61500000, 0, NULL, NULL, NULL, '2022-07-24 03:29:44', '2022-07-24 03:29:44'),
(34, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'vnpay', 'dễ vỡ', 32000000, 1, NULL, NULL, 2, '2022-07-24 19:04:39', '2022-07-24 19:07:15'),
(35, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'vnpay', 'Dễ vỡ', 32000000, 0, NULL, 3, NULL, '2022-07-24 19:18:29', '2022-07-24 19:18:29'),
(36, 'Minh Tú', 'minhtunetroiui@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'vnpay', 'hàng dễ vỡ', 30030000, 1, NULL, 6, 2, '2022-07-26 00:35:18', '2022-07-26 10:13:17'),
(37, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'vnpay', 'aaaa', 4530000, 1, NULL, 3, 2, '2022-07-26 09:43:45', '2022-07-26 10:12:16'),
(38, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '5/20 Nguyễn Văn Vĩnh', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'vnpay', 'bbbb', 4530000, 3, NULL, 3, NULL, '2022-07-26 09:52:46', '2022-07-26 09:52:52'),
(39, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'vnpay', 'cccccc', 4530000, 3, NULL, 3, NULL, '2022-07-26 10:03:38', '2022-07-26 10:03:43'),
(44, 'Mạnh', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', 'ABCDEF123', 29200000, 'vnpay', 'Hàng dễ vỡ', 116830000, 3, NULL, 3, NULL, '2022-08-08 03:46:34', '2022-08-08 03:46:39'),
(45, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'trực tiếp', 'giao nhanh', 146030000, 1, NULL, 3, 2, '2022-08-08 09:26:12', '2022-08-08 09:27:56'),
(46, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '5/20 Nguyễn Văn Vĩnh', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'vnpay', 'Hàng dễ vỡ', 121030000, 3, NULL, 3, NULL, '2022-08-09 04:07:05', '2022-08-09 04:07:10'),
(47, 'Minh Tú', 'tu.minhnguyen3107@gmail.com', '0834333860', '180 Cao Lỗ', 'Hồ Chí Minh', 'Việt Nam', NULL, 0, 'vnpay', 'test', 121030000, 3, NULL, 3, NULL, '2022-08-09 04:10:43', '2022-08-09 04:10:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_detail_order_id_foreign` (`order_id`),
  KEY `order_detail_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `price`, `quantity`, `total_price`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(10, 15000000, 1, 15000000, 24, 1, '2022-07-09 22:55:00', '2022-07-09 22:55:00'),
(11, 15000000, 1, 15000000, 25, 1, '2022-07-09 23:11:47', '2022-07-09 23:11:47'),
(12, 15000000, 1, 15000000, 26, 1, '2022-07-10 05:46:49', '2022-07-10 05:46:49'),
(13, 15000000, 1, 15000000, 27, 1, '2022-07-10 06:27:36', '2022-07-10 06:27:36'),
(14, 1500000, 2, 3000000, 28, 19, '2022-07-10 06:55:17', '2022-07-10 06:55:17'),
(15, 15000000, 1, 15000000, 29, 1, '2022-07-14 17:42:18', '2022-07-14 17:42:18'),
(16, 15000000, 1, 15000000, 30, 1, '2022-07-15 20:03:57', '2022-07-15 20:03:57'),
(17, 15000000, 3, 45000000, 31, 1, '2022-07-15 20:19:48', '2022-07-15 20:19:48'),
(18, 17000000, 1, 17000000, 31, 16, '2022-07-15 20:19:48', '2022-07-15 20:19:48'),
(19, 15000000, 4, 60000000, 32, 1, '2022-07-24 03:26:58', '2022-07-24 03:26:58'),
(20, 1500000, 1, 1500000, 32, 17, '2022-07-24 03:26:58', '2022-07-24 03:26:58'),
(21, 15000000, 4, 60000000, 33, 1, '2022-07-24 03:29:49', '2022-07-24 03:29:49'),
(22, 1500000, 1, 1500000, 33, 17, '2022-07-24 03:29:49', '2022-07-24 03:29:49'),
(23, 15000000, 1, 15000000, 34, 1, '2022-07-24 19:04:45', '2022-07-24 19:04:45'),
(24, 17000000, 1, 17000000, 34, 16, '2022-07-24 19:04:45', '2022-07-24 19:04:45'),
(25, 15000000, 1, 15000000, 35, 1, '2022-07-24 19:18:31', '2022-07-24 19:18:31'),
(26, 17000000, 1, 17000000, 35, 16, '2022-07-24 19:18:31', '2022-07-24 19:18:31'),
(27, 15000000, 1, 15000000, 36, 1, '2022-07-26 00:35:22', '2022-07-26 00:35:22'),
(28, 15000000, 1, 15000000, 36, 2, '2022-07-26 00:35:22', '2022-07-26 00:35:22'),
(29, 1500000, 3, 4500000, 37, 3, '2022-07-26 09:43:50', '2022-07-26 09:43:50'),
(30, 1500000, 3, 4500000, 38, 3, '2022-07-26 09:52:51', '2022-07-26 09:52:51'),
(31, 1500000, 3, 4500000, 39, 3, '2022-07-26 10:03:43', '2022-07-26 10:03:43'),
(36, 25000000, 1, 25000000, 44, 3, '2022-08-08 03:46:39', '2022-08-08 03:46:39'),
(37, 48000000, 2, 96000000, 44, 21, '2022-08-08 03:46:39', '2022-08-08 03:46:39'),
(38, 25000000, 1, 25000000, 44, 20, '2022-08-08 03:46:39', '2022-08-08 03:46:39'),
(39, 25000000, 1, 25000000, 45, 3, '2022-08-08 09:26:18', '2022-08-08 09:26:18'),
(40, 48000000, 2, 96000000, 45, 21, '2022-08-08 09:26:18', '2022-08-08 09:26:18'),
(41, 25000000, 1, 25000000, 45, 20, '2022-08-08 09:26:18', '2022-08-08 09:26:18'),
(42, 48000000, 2, 96000000, 46, 21, '2022-08-09 04:07:10', '2022-08-09 04:07:10'),
(43, 25000000, 1, 25000000, 46, 20, '2022-08-09 04:07:10', '2022-08-09 04:07:10'),
(44, 48000000, 2, 96000000, 47, 21, '2022-08-09 04:10:48', '2022-08-09 04:10:48'),
(45, 25000000, 1, 25000000, 47, 20, '2022-08-09 04:10:48', '2022-08-09 04:10:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `quantity_sold` int(11) NOT NULL DEFAULT '0',
  `pin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `cpu_id` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gpu_id` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram_id` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_supplier_id_foreign` (`supplier_id`),
  KEY `products_color_id_foreign` (`color_id`),
  KEY `products_cpu_id_foreign` (`cpu_id`),
  KEY `products_ram_id_foreign` (`ram_id`),
  KEY `products_gpu_id_foreign` (`gpu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `unit`, `quantity`, `quantity_sold`, `pin`, `price`, `desc`, `avatar`, `status`, `category_id`, `brand_id`, `supplier_id`, `created_at`, `updated_at`, `weight`, `cpu_id`, `gpu_id`, `ram_id`, `color_id`) VALUES
(1, 'Laptop MSI Gaming GF65 10UE-286VN i5 10500H', 'Cái', 2, 3, '100', 15000000, 'Laptop MSI Gaming GF65 10UE-286VN i5 10500H/16GB/512GB/15.6FHD/NVIDIA GeForce RTX 3060', 'Laptop_MSI_Gaming_GF65_10UE-286VN_i5_10500H/1655270051Picture1.jpg', 0, 1, 1, 1, '2022-06-14 22:14:11', '2022-08-09 04:06:18', 2, '1', '1', '1', '#3381F6'),
(2, 'Laptop Dell Gaming G15 5511 i5 11400H', 'Cái', 97, 3, '100', 15000000, 'Laptop Dell Gaming G15 5511 i5 11400H/8GB/256GB/15.6\"FHD/NVIDIA GeForce RTX 3050 4GB/Win 11', 'Laptop_Dell_Gaming_G15_5511_i5_11400H/1655270131Picture2.jpg', 0, 1, 2, 1, '2022-06-14 22:15:31', '2022-07-26 10:13:17', 2, '1', '1', '1', '#EB2D37'),
(3, 'Laptop Acer Nitro Gaming AN515-45-R6EV R5 5600H', 'Cái', 92, 8, '100', 25000000, 'Laptop Acer Nitro Gaming AN515-45-R6EV R5 5600H/8GB/512GB SSD/GTX1650 4GB/Win11', 'Laptop_Acer_Nitro_Gaming_AN515-45-R6EV_R5_5600H/1655276393Picture1.png', 0, 1, 3, 1, '2022-06-14 23:59:53', '2022-08-08 09:27:56', 2, '1', '1', '1', '#0E0E0E'),
(4, 'Laptop HP Gaming Victus 16-e0168AX R7 5800H', 'Cái', 1000, 90, '100', 150000000, 'Laptop HP Gaming Victus 16-e0168AX R7 5800H/8GB/512GB/16.1FHD/NVIDIA GeForce RTX 3050 Ti 4GB/Win 11', 'Laptop_HP_Gaming_Victus_16-e0168AX_R7_5800H/1655276443Picture2.png', 0, 1, 4, 1, '2022-06-15 00:00:43', '2022-06-28 10:14:22', 2, '1', '1', '1', '#0E0E0E'),
(5, 'Laptop Acer Aspire Gaming A715 42G R4ST R5 5500U', 'Cái', 100, 80, '100', 15000000, 'Laptop Acer Aspire Gaming A715 42G R4ST R5 5500U/8GB/256GB SSD/Nvidia GTX1650 4GB/Win10', 'Laptop_Acer_Aspire_Gaming_A715_42G_R4ST_R5_5500U/1655276542Picture3.png', 0, 1, 3, 1, '2022-06-15 00:02:23', '2022-06-28 10:12:27', 2, '1', '1', '1', '#8A49E4'),
(6, 'Laptop HP Gaming OMEN 16-b0141TX i5 11400H', 'Cái', 100, 0, '100', 150000000, 'Laptop HP Gaming OMEN 16-b0141TX i5 11400H/16GB/1TBSSD + 32GB/16.1\"FHD/NVIDIA GeForce RTX 3060 6GB/Win10', 'Laptop_HP_Gaming_OMEN_16-b0141TX_i5_11400H/1655276599Picture4.png', 0, 1, 4, 1, '2022-06-15 00:03:19', '2022-06-28 10:14:41', 100, '1', '1', '1', '#8A49E4'),
(7, 'Laptop Lenovo Yoga 7 14ACN6 R5 5600U', 'Cái', 100, 0, '100', 150000000, 'Laptop Lenovo Yoga 7 14ACN6 R5 5600U/8GB/512GB/14.0\'\'FHD/Win 11', 'Laptop_Lenovo_Yoga_7_14ACN6_R5_5600U/1655276712Picture5.png', 0, 2, 5, 1, '2022-06-15 00:05:12', '2022-06-15 00:05:12', 100, '1', '1', '1', '#F0F2F4'),
(8, 'Laptop Dell Inspiron N3505 R5 3450U', 'Cái', 1000, 0, '100', 160000000, 'Laptop Dell Inspiron N3505 R5 3450U/8GB/256GB/15.6\"FHD Touch/AMD Radeon Vega 8/Win 10', 'Laptop_Dell_Inspiron_N3505_R5_3450U/1655276820Picture6.png', 0, 2, 2, 1, '2022-06-15 00:07:00', '2022-06-15 00:07:00', 2, '1', '1', '1', '#8A49E4'),
(9, 'Laptop MSI Modern 14 B11MOU 852VN i5 1155G7', 'Cái', 100, 0, '100', 150000000, 'Laptop MSI Modern 14 B11MOU 852VN i5 1155G7/8GB/512GB/14\"FHD/Win 10', 'Laptop_MSI_Modern_14_B11MOU_852VN_i5_1155G7/1655276860Picture7.png', 0, 2, 1, 1, '2022-06-15 00:07:40', '2022-06-15 00:07:40', 2, '1', '1', '1', '#EB2D37'),
(10, 'Laptop Lenovo ThinkBook 15 G2 ITL i5 1135G7', 'Cái', 1000, 0, '100', 14000000, 'Laptop Lenovo ThinkBook 15 G2 ITL i5 1135G7/8GB/512GB/15.6”FHD/MX450 2GB/Win 11', 'Laptop_Lenovo_ThinkBook_15_G2_ITL_i5_1135G7/1655276963Picture8.png', 0, 2, 5, 1, '2022-06-15 00:09:23', '2022-06-15 00:09:23', 2, '1', '1', '1', '#3381F6'),
(11, 'Laptop HP ZBook Firefly 14 G8 i5 1135G7', 'Cái', 1000, 0, '100', 30000000, 'Laptop HP ZBook Firefly 14 G8 i5 1135G7/8GB/512GB/14”FHD/Win 10 Pro', 'Laptop_HP_ZBook_Firefly_14_G8_i5_1135G7/1655277017Picture9.png', 0, 1, 4, 1, '2022-06-15 00:10:17', '2022-07-31 06:17:38', 2, '1', '1', '1', '#F0F2F4'),
(12, 'Laptop HP Envy x360 13-bd0530TU i5 1135G7', 'Cái', 100, 0, '100', 15000000, 'Laptop HP Envy x360 13-bd0530TU i5 1135G7/8GB/512GB/13.3\"FHD Touch/Bút/Win 11 ', 'Laptop_HP_Envy_x360_13-bd0530TU_i5_1135G7/1655277078Picture10.png', 0, 1, 4, 1, '2022-06-15 00:11:19', '2022-06-28 10:15:08', 2, '1', '1', '1', '#3381F6'),
(13, 'Laptop Asus Zenbook UX325EA-KG656W i5 1135G7', 'Cái', 100, 0, '100', 15000000, 'Laptop Asus Zenbook UX325EA-KG656W i5 1135G7', 'Laptop_Asus_Zenbook_UX325EA-KG656W_i5_1135G7/1655277153Picture11.png', 0, 2, 6, 1, '2022-06-15 00:12:34', '2022-06-15 00:12:34', 2, '1', '1', '1', '#A0D911'),
(14, 'Laptop HP Pavilion 15 eg0539TU i5 1135G7', 'Cái', 100, 0, '100', 150000000, 'Laptop HP Pavilion 15 eg0539TU i5 1135G7/8GB/512GB/15.6\"FHD/Win 11', 'Laptop_HP_Pavilion_15_eg0539TU_i5_1135G7/1655277196Picture12.png', 0, 2, 4, 1, '2022-06-15 00:13:16', '2022-06-15 00:13:16', 100, '1', '1', '1', '#FBDD1E'),
(15, 'Laptop CHUWI GemiBook Pro Celeron N5100', 'Cái', 100, 0, '100', 15000000, 'Laptop CHUWI GemiBook Pro Celeron N5100/8GB/256GB/14\'\'IPS/Win 10', 'Laptop_CHUWI_GemiBook_Pro_Celeron_N5100/1655277247Picture13.png', 0, 1, 5, 1, '2022-06-15 00:14:07', '2022-06-15 00:14:07', 2, '1', '1', '1', '#8A49E4'),
(16, 'Laptop Dell Inspiron N3511 i5 1135G7', 'Cái', 97, 1, '100', 17000000, 'Laptop Dell Inspiron N3511 i5 1135G7/4GB/512GB/15.6\"FHD/Win 11+Office HS21 ', 'Laptop_Dell_Inspiron_N3511_i5_1135G7/1655277382Picture14.png', 0, 1, 2, 1, '2022-06-15 00:16:22', '2022-07-24 19:07:15', 2, '1', '1', '1', '#8A49E4'),
(17, 'Laptop Acer Nitro Gaming AN515-57-74NU i7 11800H', 'Cái', 100, 0, '100', 40000000, 'Laptop Acer Nitro Gaming AN515-57-74NU i7 11800H/8GB/512GB/NVIDIA GeForce RTX 3050 Ti 4GB/Win10', 'Laptop_Acer_Nitro_Gaming_AN515-57-74NU_i7_11800H/1655277435Picture15.png', 0, 1, 3, 1, '2022-06-15 00:17:15', '2022-07-31 06:16:11', 1000, '1', '1', '1', '#3381F6'),
(18, 'HP Envy x360 13 ay0069AU R7 4700U', 'Cái', 9000, 0, '100', 16000000, 'HP Envy x360 13 ay0069AU R7 4700U/8GB/256GB/13.3FHDTouch/Win 10+Office Home&Student', 'HP_Envy_x360_13_ay0069AU_R7_4700U/1655277506Picture16.png', 0, 1, 4, 1, '2022-06-15 00:18:26', '2022-06-15 00:18:26', 2, '1', '1', '1', '#A0D911'),
(19, 'Laptop Lenovo Gaming Legion 5 15ACH6 R5 5600H', 'Cái', 0, 0, '100', 20000000, 'Laptop Lenovo Gaming Legion 5 15ACH6 R5 5600H/8GB/512GB/15.6\"FHD/NVIDIA GeForce RTX 3050 Ti 4GB/Win11', 'Laptop_Lenovo_Gaming_Legion_5_15ACH6_R5_5600H/1655277691Picture18.png', 0, 1, 5, 1, '2022-06-15 00:21:31', '2022-08-07 08:10:49', 2, '1', '1', '1', '#FBDD1E'),
(20, 'Lenovo ThinkPad X13 Gen 2 (AMD)', 'cái', 95, 5, '64WH', 25000000, 'Vi xử lý (CPU)\r\nAMD Ryzen 7 Pro 5850U, 8 nhân, 16 luồng\r\nRAM\r\n16GB, LPDDR4X, 4266 MHz\r\nMàn hình\r\n13.3\", 1920 x 1200 px, IPS, 100% sRGB, 60 Hz\r\nCard đồ họa (GPU)\r\nAMD Radeon Graphics\r\nLưu trữ\r\nCó thể nâng cấp\r\nSSD 512GB\r\nPin\r\n54.7WHr\r\nKết nối chính\r\n2 x Type-C, 2 x USB-A\r\nTrọng lượng\r\n1.34 kg', 'Lenovo_ThinkPad_X13_Gen_2_(AMD)/1659274703lenovo-thinkpad-x13-gen2.jpg', 0, 2, 5, 1, '2022-07-31 06:38:23', '2022-08-09 04:10:48', 800, '1', '1', '1', '#0E0E0E'),
(21, 'Lenovo ThinkPad X1 Carbon Gen 10', 'cái', 890, 8, '100WH', 48000000, 'Vi xử lý (CPU)\r\nIntel Core i5 1240P, 12 nhân, 16 luồng\r\nRAM\r\n16GB\r\nMàn hình\r\n14\", 2240 x 1400 px, IPS, 100% sRGB, 60 Hz\r\nCard đồ họa (GPU)\r\nIntel Iris Xe Graphics\r\nLưu trữ\r\nCó thể nâng cấp\r\nSSD 512GB\r\nPin\r\n57WHr\r\nKết nối chính\r\n2 x Type-C, 2 x USB-A, Thunderbolt\r\nTrọng lượng\r\n1.12 kg', 'Lenovo_ThinkPad_X1_Carbon_Gen_10/1659275011Lenovo_ThinkPad_X1_Carbon_Gen_10.jpg', 0, 1, 1, 1, '2022-07-31 06:43:31', '2022-08-09 04:10:48', 1000, '1', '1', '1', '#0E0E0E');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ram`
--

DROP TABLE IF EXISTS `ram`;
CREATE TABLE IF NOT EXISTS `ram` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ram`
--

INSERT INTO `ram` (`id`, `name`, `created_at`, `updated_at`) VALUES
('1', 'RAM 8 GB (1 thanh 8 GB), DDR4, 3200 MHz', '2022-06-14 19:42:05', '2022-06-14 19:42:05'),
('16GBDDR4', '16GB DDR4', '2022-07-31 08:11:47', '2022-07-31 08:11:47'),
('16GBDDR4X', '16GB, LPDDR4X, 4266 MHz', '2022-07-31 08:19:36', '2022-07-31 08:19:36'),
('32GBDDR5', '32GB, DDR5, 4800 MHz', '2022-07-31 08:23:32', '2022-07-31 08:23:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rating` smallint(6) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_product_id_foreign` (`product_id`),
  KEY `ratings_customer_id_foreign` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `rating`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 5, 21, 6, '2022-08-03 00:39:44', '2022-08-03 00:39:44'),
(2, 2, 21, 7, '2022-08-03 09:47:31', NULL),
(3, 5, 21, 3, '2022-08-03 03:08:26', '2022-08-03 03:08:26'),
(7, 5, 3, 3, '2022-08-03 03:16:27', '2022-08-03 03:16:27'),
(8, 5, 5, 7, '2022-08-03 03:17:40', '2022-08-03 03:17:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `name_role`, `created_at`, `updated_at`) VALUES
(1, 'supper admin', NULL, NULL),
(2, 'admin', NULL, NULL),
(3, 'customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statistical`
--

DROP TABLE IF EXISTS `statistical`;
CREATE TABLE IF NOT EXISTS `statistical` (
  `id_statistical` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` varchar(100) NOT NULL,
  `sales` double NOT NULL,
  `profit` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL,
  PRIMARY KEY (`id_statistical`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `statistical`
--

INSERT INTO `statistical` (`id_statistical`, `order_date`, `sales`, `profit`, `quantity`, `total_order`) VALUES
(1, '2022-07-01', 20000000, 14000000, 90, 10),
(2, '2022-07-02', 68000000, 47600000, 60, 8),
(3, '2022-07-03', 30000000, 21000000, 45, 7),
(4, '2022-07-04', 45000000, 31500000, 30, 9),
(5, '2022-07-06', 30000000, 21000000, 15, 12),
(6, '2022-07-07', 8000000, 5600000, 65, 30),
(7, '2022-07-08', 28000000, 19600000, 32, 20),
(8, '2022-07-09', 25000000, 17500000, 7, 6),
(9, '2022-07-09', 36000000, 25200000, 40, 15),
(10, '2022-07-10', 50000000, 35000000, 89, 19),
(11, '2022-07-11', 20000000, 14000000, 63, 11),
(12, '2022-07-12', 25000000, 17500000, 94, 14),
(13, '2022-07-13', 32000000, 22400000, 16, 10),
(14, '2022-07-14', 33000000, 23100000, 14, 5),
(15, '2022-07-15', 36000000, 25200000, 22, 12),
(16, '2022-07-16', 34000000, 23800000, 33, 20),
(17, '2022-07-17', 25000000, 17500000, 94, 14),
(18, '2022-07-18', 12000000, 8400000, 16, 10),
(19, '2022-07-19', 63000000, 44100000, 14, 5),
(20, '2022-07-20', 66000000, 46200000, 22, 12),
(21, '2022-07-21', 123600000, 86520000, 37, 21),
(22, '2022-06-30', 63000000, 44100000, 14, 5),
(23, '2022-06-29', 66000000, 46200000, 23, 12),
(24, '2022-06-28', 74000000, 51800000, 32, 20),
(25, '2022-06-27', 63000000, 44100000, 14, 5),
(26, '2020-10-14', 66000000, 18000000, 23, 12),
(27, '2020-10-13', 74000000, 20000000, 33, 20),
(28, '2020-10-12', 66000000, 18000000, 23, 12),
(29, '2020-10-11', 74000000, 20000000, 10, 20),
(30, '2020-10-10', 63000000, 19000000, 14, 5),
(31, '2020-10-09', 66000000, 18000000, 23, 12),
(32, '2020-10-08', 74000000, 20000000, 15, 20),
(33, '2020-10-07', 66000000, 18000000, 23, 12),
(34, '2020-10-06', 74000000, 20000000, 30, 22),
(35, '2020-10-05', 66000000, 18000000, 23, 12),
(36, '2020-10-04', 74000000, 20000000, 32, 20),
(37, '2020-10-03', 63000000, 19000000, 14, 5),
(38, '2020-10-02', 66000000, 18000000, 23, 12),
(39, '2020-10-01', 74000000, 20000000, 32, 20),
(40, '2020-09-30', 63000000, 19000000, 14, 5),
(41, '2020-09-29', 66000000, 18000000, 23, 12),
(42, '2020-09-28', 74000000, 20000000, 15, 20),
(43, '2020-09-27', 66000000, 18000000, 23, 12),
(44, '2020-09-26', 74000000, 20000000, 30, 22),
(45, '2020-09-25', 66000000, 18000000, 23, 12),
(46, '2020-09-24', 74000000, 20000000, 32, 20),
(47, '2020-09-23', 63000000, 19000000, 14, 5),
(48, '2020-09-22', 66000000, 18000000, 23, 12),
(49, '2020-09-21', 74000000, 20000000, 32, 20),
(50, '2020-09-20', 63000000, 19000000, 14, 5),
(51, '2020-09-19', 66000000, 18000000, 23, 12),
(52, '2020-09-18', 74000000, 20000000, 15, 20),
(53, '2020-09-17', 66000000, 18000000, 23, 12),
(54, '2020-09-16', 74000000, 20000000, 30, 22),
(55, '2020-09-15', 66000000, 18000000, 23, 12),
(56, '2020-09-14', 74000000, 20000000, 32, 20),
(57, '2020-09-13', 63000000, 19000000, 14, 5),
(58, '2020-09-12', 66000000, 18000000, 23, 12),
(59, '2020-09-11', 74000000, 20000000, 32, 20),
(60, '2020-09-10', 63000000, 19000000, 14, 5),
(61, '2020-09-09', 66000000, 18000000, 23, 12),
(62, '2020-09-08', 74000000, 20000000, 15, 20),
(63, '2020-09-07', 66000000, 18000000, 23, 12),
(64, '2020-09-06', 74000000, 20000000, 30, 22),
(65, '2020-09-05', 66000000, 18000000, 23, 12),
(66, '2020-09-04', 74000000, 20000000, 32, 20),
(67, '2020-09-03', 63000000, 19000000, 14, 5),
(68, '2020-09-02', 66000000, 18000000, 23, 12),
(69, '2020-09-01', 74000000, 20000000, 32, 20),
(70, '2022-07-23', 19500000, 13650000, 2, 2),
(71, '2022-07-25', 32000000, 22400000, 2, 1),
(72, '2022-07-26', 9060000, 6342000, 6, 2),
(73, '2022-07-27', 39090000, 27363000, 8, 3),
(74, '2022-08-06', 7530000, 5271000, 1, 1),
(75, '2022-08-07', 17530000, 12271000, 1, 1),
(76, '2022-08-08', 262860000, 184002000, 8, 2),
(77, '2022-08-09', 242060000, 169442000, 6, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GST` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_supplied` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone_number`, `GST`, `address`, `city`, `country`, `quantity_supplied`, `created_at`, `updated_at`) VALUES
(1, 'Minh Tú', 'admin@gmail.com', '0123456789', '123123', '206 Hoàng Văn Thụ, Phường 8, Quận Phú Nhuận', 'Thành Phố Hồ Chí Minh', 'Việt Nam', 1000, '2022-06-14 22:08:37', '2022-08-09 03:10:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_social`
--

DROP TABLE IF EXISTS `tbl_social`;
CREATE TABLE IF NOT EXISTS `tbl_social` (
  `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider_user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `token_reset_pass`
--

DROP TABLE IF EXISTS `token_reset_pass`;
CREATE TABLE IF NOT EXISTS `token_reset_pass` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reset_token` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `token_reset_pass_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `token_reset_pass`
--

INSERT INTO `token_reset_pass` (`id`, `reset_token`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'P37yj', 'tu.minhnguyen3107@gmail.com', 3, '2022-07-16 10:51:23', '2022-08-04 04:12:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `desc_block` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id_foreignkey_roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `gender`, `password`, `birthdate`, `phone_number`, `status`, `desc_block`, `avatar`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', 1, '$2y$10$FlUGvswyNoCpHtUf5A8NIunFkmZhM8EA9ve5W3GeYAo6JBougJZe.', '2000-06-30', NULL, 0, NULL, 'user2/1657562200123.jpg', 1, '2022-06-15', '2022-07-11'),
(3, 'Tú', 'tu.minhnguyen3107@gmail.com', 1, '$2y$10$oXUo2YSCzK.oibOV.xa5EO3DKU6zKout9vGon.K7Ta.q6y21SKigS', '2022-07-04', '0834333860', 0, NULL, 'user3/1659612302CodeLearn_certification.png', 3, '2022-07-09', '2022-08-04'),
(5, 'Ái Nhi', 'ainhi@gmail.com', 0, '$2y$10$YhYbTR14FHlimTvZ98bVZ.Zr9l20H1hllXg895AVYrChDjblzGEC.', '2001-10-13', NULL, 0, NULL, NULL, 3, '2022-07-25', '2022-07-25'),
(6, 'nguyen minh tu', 'minhtunetroiui@gmail.com', 1, '$2y$10$9ZaEQ0XZS3x7MJO1uxipXO.mjTKrd0e9PDD820gRy04V5wWNjbiZm', '2000-07-31', NULL, 0, NULL, NULL, 3, '2022-07-26', '2022-07-26'),
(7, 'MeanTus', 'tu@gmail.com', 1, '$2y$10$PO6ClDB.dHfUbEjnx3m6Mum8OA8mDzF8JofnsLh.zcqFoWKvlEITi', '2000-07-31', NULL, 0, NULL, NULL, 3, '2022-07-26', '2022-07-26');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_discount_code_foreign` FOREIGN KEY (`discount_code`) REFERENCES `coupons` (`code`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`hex`),
  ADD CONSTRAINT `products_cpu_id_foreign` FOREIGN KEY (`cpu_id`) REFERENCES `cpu` (`id`),
  ADD CONSTRAINT `products_gpu_id_foreign` FOREIGN KEY (`gpu_id`) REFERENCES `gpu` (`id`),
  ADD CONSTRAINT `products_ram_id_foreign` FOREIGN KEY (`ram_id`) REFERENCES `ram` (`id`),
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `token_reset_pass`
--
ALTER TABLE `token_reset_pass`
  ADD CONSTRAINT `token_reset_pass_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id_foreignkey_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

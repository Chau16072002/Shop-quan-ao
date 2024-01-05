-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2024 at 05:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopquanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(191) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Gucci', 'Thuong hieu noi tieng', 1, NULL, '2023-11-12 23:22:52'),
(2, 'Chanel', 'Thương hiệu rất nổi tiếng ', 1, NULL, NULL),
(3, 'adidas', 'admin', 1, '2023-11-12 21:37:34', '2023-11-12 22:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_name` varchar(191) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Menu 1', 'menu-1', 1, '2023-11-10 02:44:38', '2023-11-10 02:44:38', NULL),
(2, 0, 'Menu 2', 'menu-2', 1, '2023-11-10 02:44:54', '2023-11-10 02:44:54', NULL),
(3, 0, 'Menu 1.1', 'menu-1.1', 1, '2023-11-10 02:48:42', '2023-11-10 02:48:42', NULL),
(4, 0, 'Menu 1.1.1', 'menu-1.1.1', 1, '2023-11-10 03:09:42', '2023-11-10 03:09:42', NULL),
(5, 2, 'Menu 2.1gfgfgf', 'menu-2.1', 0, '2023-11-10 03:13:42', '2023-11-10 03:44:37', '2023-11-10 03:44:37'),
(6, 0, 'Menu 3', 'menu-3', 1, '2023-11-10 03:37:37', '2023-11-12 22:11:56', '2023-11-12 22:11:56'),
(7, 6, 'Menu 3.2', 'menu-3.1', 0, '2023-11-10 03:37:52', '2023-11-12 22:12:05', '2023-11-12 22:12:05'),
(8, 1, 'Áo', 'ádasd', 1, '2023-11-12 22:36:43', '2023-11-12 22:36:43', NULL),
(9, 2, 'Menu 3.2', 'ádasd', 1, '2023-11-12 22:36:59', '2023-11-12 22:36:59', NULL),
(10, 1, 'Quần', 'ádasd', 1, '2023-11-12 22:38:20', '2023-11-12 22:38:20', NULL),
(11, 3, 'Giày', 'gt6f5dfr', 1, '2023-11-15 04:27:02', '2023-11-15 07:34:57', NULL),
(12, 1, 'Kính', 'kinh ne', 1, '2023-11-30 00:19:51', '2023-11-30 00:20:28', NULL),
(13, 2, 'Ca Vat', 'c', 1, '2023-11-30 00:21:16', '2023-11-30 00:21:16', NULL),
(14, 3, 'Balo', 'balo ne', 1, '2023-11-30 00:22:26', '2023-11-30 00:22:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `customer_id`, `product_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 3, 25, 'dep', '2023-12-06 23:26:26', '2023-12-06 23:26:26'),
(2, 3, 25, 'san pham chat luong', '2023-12-06 23:39:20', '2023-12-06 23:39:20'),
(3, 3, 24, 'Quan hơi ngắn', '2023-12-06 23:41:45', '2023-12-06 23:41:45'),
(4, 4, 26, 'ádasđ', '2023-12-28 20:38:02', '2023-12-28 20:38:02'),
(5, 4, 26, 'a', '2023-12-28 20:44:25', '2023-12-28 20:44:25'),
(6, 4, 25, '10đ không có nhưng', '2023-12-28 20:45:44', '2023-12-28 20:45:44'),
(7, 4, 26, 'hahahaha', '2023-12-28 20:46:26', '2023-12-28 20:46:26'),
(8, 4, 26, 'đẹp quá hahaha', '2023-12-28 20:47:26', '2023-12-28 20:47:26'),
(9, 4, 26, '111', '2023-12-28 20:48:10', '2023-12-28 20:48:10'),
(10, 4, 26, '222', '2023-12-28 20:48:14', '2023-12-28 20:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `con_name` varchar(191) NOT NULL,
  `con_email` varchar(100) NOT NULL,
  `con_subject` varchar(191) NOT NULL,
  `con_message` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `con_name`, `con_email`, `con_subject`, `con_message`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Trí Bảo', 'bao@gmailcom', 'test', 'em xin', NULL, NULL),
(2, 'Nguyễn Trí Bảo', 'bao@gmailcom', 'test', 'test1', '2023-11-27 10:20:16', NULL),
(4, 'Nguyễn Trí Bảo', 'tribao0510@gmail.com', 'aaaa', '11111111', '2023-11-29 23:20:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(150) NOT NULL,
  `coupon_time` varchar(191) NOT NULL,
  `coupon_condition` int(11) NOT NULL,
  `coupon_number` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_name`, `coupon_time`, `coupon_condition`, `coupon_number`, `coupon_code`, `created_at`, `updated_at`) VALUES
(1, 'Giảm giá 12.12', '5', 1, 10, 'GFRGR', NULL, NULL),
(3, 'Giảm giá noel', '6', 2, 100000, 'NOEL', NULL, NULL),
(4, 'Giảm giá tết dương lịch', '6', 1, 15, 'TETDUONGLICH', NULL, NULL),
(5, 'Giảm giá covid', '8', 1, 14, 'COVID123', NULL, NULL),
(6, 'Giảm giá tết', '8', 2, 50000, 'TET2024', NULL, NULL),
(7, 'Giảm giá 1233', '8', 2, 100000, 'GIAMGIA123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_03_225647_create_tbl_admin_table', 1),
(6, '2023_11_05_171457_create_tbl_category_product', 2),
(7, '2023_11_05_202027_create_tbl_brand_product', 3),
(8, '2023_11_05_210239_create_tbl_product', 4),
(9, '2023_11_10_052244_create_tbl_categories', 5),
(10, '2023_11_10_055601_create_categories', 6),
(11, '2023_11_10_065440_create_categories', 7),
(14, '2023_11_10_065620_create_categories', 8),
(15, '2023_11_10_101817_add_column_delete_at_table_categories', 9),
(16, '2023_11_13_041929_create_brands', 10),
(17, '2023_11_13_073613_create_products_table', 11),
(18, '2023_11_13_074357_create_productimages_table', 12),
(19, '2023_11_13_074849_create_tags_table', 12),
(20, '2023_11_13_075002_create_producttags_table', 12),
(21, '2023_11_13_085030_create_products_table', 13),
(22, '2023_11_13_144159_create_products_table', 14),
(23, '2023_11_14_084857_create_product_images_table', 15),
(24, '2023_11_13_072913_create_sliders_table', 16),
(25, '2023_11_15_131212_create_tbl_customer', 16),
(26, '2023_11_17_045143_create_wishlists_table', 17),
(27, '2023_11_23_063811_create_wishlists_table', 18),
(28, '2023_11_27_170127_create_contact', 19),
(29, '2023_11_28_152019_create_sliders_table', 20),
(30, '2023_11_29_103922_create_coupons_table', 21),
(31, '2023_11_29_160427_create_ratings_table', 22),
(32, '2023_12_07_020357_create_comments_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` int(191) NOT NULL,
  `product_image` varchar(191) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(20, 8, 1, 'Hoodie Đen', 'ádasd', 'ádasd', 99000, '/storage/product/UHCQFo6Ck1AjpEInJpKG.jpg', 1, '2023-11-15 02:33:28', '2023-11-29 23:36:16'),
(21, 8, 1, 'Áo Khoác Hoodie', '100% Cotton', '100% Cotton', 109000, '/storage/product/HIG6mWVeW96bbeK0SbgC.jpg', 1, '2023-11-15 02:47:53', '2023-11-29 23:34:57'),
(22, 8, 2, 'Quần cơ bản trơn thường ngày cho nữ LNE27279 (Xám đen)', '100% Cotton', '100% Cotton', 99000, '/storage/product/3Z6wjlKiDZNeCcZsxeVp.jpg', 1, '2023-11-15 02:49:17', '2023-11-29 23:33:40'),
(23, 11, 1, 'giầy bata nữ gấu siêu dễ thương', 'Giày đẹp', 'Giày đẹp', 139000, '/storage/product/c5dA5d0E7KqOcWpv2Tz1.jpg', 0, '2023-11-15 04:29:00', '2023-11-29 23:32:22'),
(24, 10, 1, 'Quần Short Lưng Thun Trên Gối Vải Thun Co Giãn Trơn Dáng Rộng Đơn Giản No Style 06', 'Thành phần: 100% Polyester\r\nCấu trúc dệt WAFFLE đặc biệt\r\n- Hạn chế nhăn\r\n- Mềm mại\r\n- Tỏa nhiệt bề mặt\r\n- Co dãn tốt\r\n- Lưng thun đàn hồi\r\n- Dây rút bên trong eo để điều chỉnh kích cỡ', 'đftftftf', 157000, '/storage/product/BBRVk4tZBPMnxMQgR4l9.jpg', 1, '2023-11-15 07:20:49', '2023-11-29 23:29:48'),
(25, 8, 3, 'ÁO HOODIE UNISEX Nam Nữ BASIC CAO CẤP', 'Áo Hoodie Nỉ BASIC với Chất liệu Nỉ Ngoại tốt; mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp bạn giữ ấm trong mùa lạnh mà còn có thể chống nắng, chống gió, chống bụi, chống rét, chống tia UV cực tốt, rất tiện lợi nhé!!! (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)\r\n🌀 Fullsize: Từ 40-95kg mặc đẹp . \r\n🌀 Màu sắc: 9 màu Y hình.\r\n🌀 Đường may kỹ, tinh tế, sắc xảo.\r\n🌀 Form chuẩn Unisex Nam Nữ Couple đều mặc được.\r\n🌀 Giao hàng tận nơi. Nhận hàng rồi thanh toán.\r\n🌀 Cam kết: Chất lượng và Mẫu mã Sản phẩm giống với Hình ảnh.\r\n🌀 Trả hàng hoàn tiền trong 3 ngày nếu sản phẩm bị lỗi.\r\n(Nếu Sản phẩm bị lỗi, mong Quý khách khoan Đánh giá, vui lòng inbox hoặc liên hệ Shop để được hỗ trợ đổi hàng hoặc Trả hàng/Hoàn tiền cho ạ!)\r\n💦 Sỉ Inbox Shop.', 'Áo Hoodie Nỉ BASIC với Chất liệu Nỉ Ngoại tốt; mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp bạn giữ ấm trong mùa lạnh mà còn có thể chống nắng, chống gió, chống bụi, chống rét, chống tia UV cực tốt, rất tiện lợi nhé!!! (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)\r\n🌀 Fullsize: Từ 40-95kg mặc đẹp . \r\n🌀 Màu sắc: 9 màu Y hình.\r\n🌀 Đường may kỹ, tinh tế, sắc xảo.\r\n🌀 Form chuẩn Unisex Nam Nữ Couple đều mặc được.\r\n🌀 Giao hàng tận nơi. Nhận hàng rồi thanh toán.\r\n🌀 Cam kết: Chất lượng và Mẫu mã Sản phẩm giống với Hình ảnh.\r\n🌀 Trả hàng hoàn tiền trong 3 ngày nếu sản phẩm bị lỗi.\r\n(Nếu Sản phẩm bị lỗi, mong Quý khách khoan Đánh giá, vui lòng inbox hoặc liên hệ Shop để được hỗ trợ đổi hàng hoặc Trả hàng/Hoàn tiền cho ạ!)\r\n💦 Sỉ Inbox Shop.', 63000, '/storage/product/GmBH9hXgXRWwlOLfNpXt.jpg', 1, '2023-11-16 01:43:30', '2023-11-29 23:28:26'),
(26, 8, 1, 'Áo đẹp ghê', 'test', 'test', 63000, '/storage/product/CXTGIfoPs7S77eGchtwe.jpg', 1, '2023-11-17 00:33:28', '2023-11-29 23:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `producttags`
--

CREATE TABLE `producttags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(191) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `product_id`, `created_at`, `updated_at`) VALUES
(46, '/storage/product/Ss57OwsYcmpQJspUBesh.jpg', 27, '2023-11-29 23:24:49', '2023-11-29 23:24:49'),
(47, '/storage/product/FGIC7RKutGDATFjn4VNb.jpg', 27, '2023-11-29 23:24:49', '2023-11-29 23:24:49'),
(48, '/storage/product/TB8FilWajJxpdKQKmil0.jpg', 27, '2023-11-29 23:24:49', '2023-11-29 23:24:49'),
(49, '/storage/product/IvEc750759qa0zKISWID.jpg', 26, '2023-11-29 23:26:59', '2023-11-29 23:26:59'),
(50, '/storage/product/c7UGK9PlBhNKndXuYDqM.jpg', 26, '2023-11-29 23:26:59', '2023-11-29 23:26:59'),
(51, '/storage/product/N0G8umzrBdANScVLgn3S.jpg', 26, '2023-11-29 23:26:59', '2023-11-29 23:26:59'),
(52, '/storage/product/m6FJN1nxkhlaNCIm64FZ.jpg', 25, '2023-11-29 23:28:26', '2023-11-29 23:28:26'),
(53, '/storage/product/m2zHy1yyXnu7xsomj8Zc.jpg', 25, '2023-11-29 23:28:26', '2023-11-29 23:28:26'),
(54, '/storage/product/2IykdaBqNJEoAwz9npgc.jpg', 25, '2023-11-29 23:28:26', '2023-11-29 23:28:26'),
(55, '/storage/product/iXDMQwOp77OLYaEZu7ED.jpg', 24, '2023-11-29 23:29:48', '2023-11-29 23:29:48'),
(56, '/storage/product/hhRBMlEX8RSBPQmSGvAA.jpg', 24, '2023-11-29 23:29:48', '2023-11-29 23:29:48'),
(57, '/storage/product/ZNJlYyoocQ0b57RB80Iq.jpg', 24, '2023-11-29 23:29:48', '2023-11-29 23:29:48'),
(58, '/storage/product/ZlAw163LB8tJGkoss7MB.jpg', 23, '2023-11-29 23:32:22', '2023-11-29 23:32:22'),
(59, '/storage/product/yczGP2XTz4YdO6POe4ey.jpg', 23, '2023-11-29 23:32:22', '2023-11-29 23:32:22'),
(60, '/storage/product/cn4V2Nf0IcTkxduOQk0A.jpg', 23, '2023-11-29 23:32:22', '2023-11-29 23:32:22'),
(61, '/storage/product/qdnX0GU0K8fVcdiIdHam.jpg', 22, '2023-11-29 23:33:40', '2023-11-29 23:33:40'),
(62, '/storage/product/jaZECuj0N8bWd838j4QM.jpg', 22, '2023-11-29 23:33:40', '2023-11-29 23:33:40'),
(63, '/storage/product/xtKzV61T1CNhcfxubtgf.jpg', 22, '2023-11-29 23:33:40', '2023-11-29 23:33:40'),
(64, '/storage/product/Z4WcyR6JGPN4Vwx1aSgq.jpg', 21, '2023-11-29 23:34:57', '2023-11-29 23:34:57'),
(65, '/storage/product/zzocfnz4GAUmfrk5KME6.jpg', 21, '2023-11-29 23:34:57', '2023-11-29 23:34:57'),
(66, '/storage/product/UXUQ8e5zf9x9al0uZzQj.jpg', 21, '2023-11-29 23:34:57', '2023-11-29 23:34:57'),
(67, '/storage/product/oz5VHwphEkh3OxfU361y.jpg', 20, '2023-11-29 23:36:16', '2023-11-29 23:36:16'),
(68, '/storage/product/dH9FWj0T1YkEwkhblXbr.jpg', 20, '2023-11-29 23:36:16', '2023-11-29 23:36:16'),
(69, '/storage/product/Xhx3XfHuU9YmVV1hZ4an.jpg', 20, '2023-11-29 23:36:16', '2023-11-29 23:36:16'),
(70, '/storage/product/n12XDSWvqKKEcFf0zPnX.jpg', 28, '2023-11-30 00:24:55', '2023-11-30 00:24:55'),
(71, '/storage/product/tZVvRq7xQV2EZod2Wm3c.jpg', 28, '2023-11-30 00:24:55', '2023-11-30 00:24:55'),
(72, '/storage/product/OA14V566hi9SOpRhKOdR.jpg', 28, '2023-11-30 00:24:55', '2023-11-30 00:24:55'),
(73, '/storage/product/oujQdAVp8e4GiXwfOBWb.jpg', 28, '2023-11-30 00:24:55', '2023-11-30 00:24:55'),
(74, '/storage/product/FQVTeL0A2v5JIol1G53Q.jpg', 28, '2023-11-30 00:24:55', '2023-11-30 00:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 27, 4, '2023-11-29 22:35:56', '2023-11-29 22:35:56'),
(2, 27, 5, '2023-11-30 00:05:27', '2023-11-30 00:05:27'),
(3, 25, 3, '2023-12-06 18:08:10', '2023-12-06 18:08:10'),
(4, 25, 3, '2023-12-06 18:08:11', '2023-12-06 18:08:11'),
(5, 25, 1, '2023-12-06 18:08:14', '2023-12-06 18:08:14'),
(6, 25, 5, '2023-12-06 18:58:48', '2023-12-06 18:58:48'),
(7, 25, 5, '2023-12-06 18:59:17', '2023-12-06 18:59:17'),
(8, 25, 5, '2023-12-06 19:01:08', '2023-12-06 19:01:08'),
(9, 25, 5, '2023-12-06 19:01:10', '2023-12-06 19:01:10'),
(10, 25, 5, '2023-12-06 19:01:11', '2023-12-06 19:01:11'),
(11, 25, 5, '2023-12-06 19:01:12', '2023-12-06 19:01:12'),
(12, 25, 5, '2023-12-06 19:01:12', '2023-12-06 19:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `image_path` varchar(191) NOT NULL,
  `image_name` varchar(191) NOT NULL,
  `slider_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '123456789', NULL, NULL),
(2, 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'admin11', '1323243434', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cus_name` varchar(191) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_password` varchar(191) NOT NULL,
  `cus_phone` varchar(191) NOT NULL,
  `cus_address` varchar(191) NOT NULL,
  `cus_image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `token` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `cus_name`, `cus_email`, `cus_password`, `cus_phone`, `cus_address`, `cus_image`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'dang minh chau', 'chau.dmc1607@gmail.com', '12345', '0332924692', 'dfdfdfdf', NULL, 0, '', NULL, NULL),
(2, 'Nguyễn Trí Bảo', 'tribao@gmail.com', '202cb962ac59075b964b07152d234b70', '21312', 'Đồng Nai', '/storage/product/IciYN1Bii0pk9BnjOP8f.png', 0, '', NULL, '2023-11-27 01:21:36'),
(3, 'Bảo Nguyễn', 'tribao1@gmail.com', '202cb962ac59075b964b07152d234b70', '0932715285', 'Định Quán', NULL, 0, '', NULL, NULL),
(4, 'Nguyễn Trí Bảo', 'tribao0510@gmail.com', '202cb962ac59075b964b07152d234b70', '0368390949', 'Định Quán', '/storage/product/IGcwvr5kSrEhGQlA4EpG.png', 0, '', NULL, '2023-11-27 00:58:34'),
(5, 'đá', 'tribao12@gmail.com', '202cb962ac59075b964b07152d234b70', '0988761229', 'Đồng Nai', NULL, 0, '', NULL, NULL),
(7, 'Trần Hoàng', 'tribao10@gmail.com', '202cb962ac59075b964b07152d234b70', '0389405149', 'Linh Chiểu', 'aaa', 0, NULL, '2023-11-23 08:58:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(13, 28, 4, '2023-11-30 02:21:51', '2023-11-30 02:21:51'),
(14, 27, 4, '2023-11-30 02:24:01', '2023-11-30 02:24:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttags`
--
ALTER TABLE `producttags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `producttags`
--
ALTER TABLE `producttags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

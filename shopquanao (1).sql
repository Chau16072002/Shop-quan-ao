-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2023 at 11:42 AM
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
(11, 3, 'Giày', 'gt6f5dfr', 1, '2023-11-15 04:27:02', '2023-11-15 07:34:57', NULL);

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
(25, '2023_11_15_131212_create_tbl_customer', 16);

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
  `product_price` varchar(191) NOT NULL,
  `product_image` varchar(191) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(20, 8, 1, 'Hoodie Đen', 'ádasd', 'ádasd', '99.000', '/storage/product/dyHUjDcKNQS9p1CgNXy1.jpg', 1, '2023-11-15 02:33:28', '2023-11-15 02:33:28'),
(21, 8, 1, 'Áo Khoác Hoodie', '100% Cotton', '100% Cotton', '109.000', '/storage/product/rwmas2mfQVctaXrGFnxT.jpg', 1, '2023-11-15 02:47:53', '2023-11-15 02:47:53'),
(22, 8, 2, 'Quần cơ bản trơn thường ngày cho nữ LNE27279 (Xám đen)', '100% Cotton', '100% Cotton', '99.000', '/storage/product/cca1XxoDmPN9kTPzkNuV.jpg', 1, '2023-11-15 02:49:17', '2023-11-15 02:49:17'),
(23, 11, 1, 'giầy bata nữ gấu siêu dễ thương', 'Giày đẹp', 'Giày đẹp', '139.000', '/storage/product/GP8XyF6PyTkBcUQ7Axeq.jpg', 0, '2023-11-15 04:29:00', '2023-11-15 07:39:58'),
(24, 10, 1, 'Quần Short Lưng Thun Trên Gối Vải Thun Co Giãn Trơn Dáng Rộng Đơn Giản No Style 06', 'Thành phần: 100% Polyester\r\nCấu trúc dệt WAFFLE đặc biệt\r\n- Hạn chế nhăn\r\n- Mềm mại\r\n- Tỏa nhiệt bề mặt\r\n- Co dãn tốt\r\n- Lưng thun đàn hồi\r\n- Dây rút bên trong eo để điều chỉnh kích cỡ', 'đftftftf', '157000', '/storage/product/9sZqmYOkHMIymmD7xWFD.png', 1, '2023-11-15 07:20:49', '2023-11-16 00:30:53'),
(25, 8, 3, 'ÁO HOODIE UNISEX Nam Nữ BASIC CAO CẤP', 'Áo Hoodie Nỉ BASIC với Chất liệu Nỉ Ngoại tốt; mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp bạn giữ ấm trong mùa lạnh mà còn có thể chống nắng, chống gió, chống bụi, chống rét, chống tia UV cực tốt, rất tiện lợi nhé!!! (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)\r\n🌀 Fullsize: Từ 40-95kg mặc đẹp . \r\n🌀 Màu sắc: 9 màu Y hình.\r\n🌀 Đường may kỹ, tinh tế, sắc xảo.\r\n🌀 Form chuẩn Unisex Nam Nữ Couple đều mặc được.\r\n🌀 Giao hàng tận nơi. Nhận hàng rồi thanh toán.\r\n🌀 Cam kết: Chất lượng và Mẫu mã Sản phẩm giống với Hình ảnh.\r\n🌀 Trả hàng hoàn tiền trong 3 ngày nếu sản phẩm bị lỗi.\r\n(Nếu Sản phẩm bị lỗi, mong Quý khách khoan Đánh giá, vui lòng inbox hoặc liên hệ Shop để được hỗ trợ đổi hàng hoặc Trả hàng/Hoàn tiền cho ạ!)\r\n💦 Sỉ Inbox Shop.', 'Áo Hoodie Nỉ BASIC với Chất liệu Nỉ Ngoại tốt; mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp bạn giữ ấm trong mùa lạnh mà còn có thể chống nắng, chống gió, chống bụi, chống rét, chống tia UV cực tốt, rất tiện lợi nhé!!! (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)\r\n🌀 Fullsize: Từ 40-95kg mặc đẹp . \r\n🌀 Màu sắc: 9 màu Y hình.\r\n🌀 Đường may kỹ, tinh tế, sắc xảo.\r\n🌀 Form chuẩn Unisex Nam Nữ Couple đều mặc được.\r\n🌀 Giao hàng tận nơi. Nhận hàng rồi thanh toán.\r\n🌀 Cam kết: Chất lượng và Mẫu mã Sản phẩm giống với Hình ảnh.\r\n🌀 Trả hàng hoàn tiền trong 3 ngày nếu sản phẩm bị lỗi.\r\n(Nếu Sản phẩm bị lỗi, mong Quý khách khoan Đánh giá, vui lòng inbox hoặc liên hệ Shop để được hỗ trợ đổi hàng hoặc Trả hàng/Hoàn tiền cho ạ!)\r\n💦 Sỉ Inbox Shop.', '63.000', '/storage/product/0MZKvG74ZmU5AvXBQSeU.jpeg', 1, '2023-11-16 01:43:30', '2023-11-16 01:46:26');

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
(19, '/storage/product/qRl8p1HVMnrrBVN4tL8m.jpg', 20, '2023-11-15 02:33:28', '2023-11-15 02:33:28'),
(20, '/storage/product/9ZMF2ThiPLy8BTr3pvi0.jpg', 24, '2023-11-15 07:39:17', '2023-11-15 07:39:17'),
(21, '/storage/product/nlFbPeCWPZHUjRf7CgIa.jpg', 24, '2023-11-15 07:39:17', '2023-11-15 07:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `image_path` varchar(191) NOT NULL,
  `image_` varchar(191) NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `cus_name`, `cus_email`, `cus_password`, `cus_phone`, `cus_address`, `cus_image`, `created_at`, `updated_at`) VALUES
(1, 'dang minh chau', 'chau.dmc1607@gmail.com', '12345', '0332924692', 'dfdfdfdf', NULL, NULL, NULL),
(2, 'Nguyễn Trí Bảo', 'tribao@gmail.com', '202cb962ac59075b964b07152d234b70', '21312', 'Đồng Nai', NULL, NULL, NULL);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `producttags`
--
ALTER TABLE `producttags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

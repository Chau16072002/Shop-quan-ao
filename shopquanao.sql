-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2023 lúc 02:45 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
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
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Gucci', 'Thuong hieu noi tieng', 1, NULL, '2023-11-12 23:22:52'),
(2, 'Chanel', 'Thương hiệu rất nổi tiếng ', 1, NULL, NULL),
(3, 'adidas', 'admin', 1, '2023-11-12 21:37:34', '2023-11-12 22:09:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
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
-- Đang đổ dữ liệu cho bảng `categories`
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
-- Cấu trúc bảng cho bảng `contact`
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
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `con_name`, `con_email`, `con_subject`, `con_message`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Trí Bảo', 'bao@gmailcom', 'test', 'em xin', NULL, NULL),
(2, 'Nguyễn Trí Bảo', 'bao@gmailcom', 'test', 'test1', '2023-11-27 10:20:16', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
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
-- Đang đổ dữ liệu cho bảng `coupons`
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
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
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
(30, '2023_11_29_103922_create_coupons_table', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(20, 8, 1, 'Hoodie Đen', 'ádasd', 'ádasd', 99000, '/storage/product/Hz5c6xNV2gjALvWJLOgE.jpg', 1, '2023-11-15 02:33:28', '2023-11-27 23:04:31'),
(21, 8, 1, 'Áo Khoác Hoodie', '100% Cotton', '100% Cotton', 109000, '/storage/product/gJZa4TiipU60iwxo7nVl.jpg', 1, '2023-11-15 02:47:53', '2023-11-27 23:04:18'),
(22, 8, 2, 'Quần cơ bản trơn thường ngày cho nữ LNE27279 (Xám đen)', '100% Cotton', '100% Cotton', 99000, '/storage/product/i0yeC1ta3GQ6IisM0Vs1.jpg', 1, '2023-11-15 02:49:17', '2023-11-27 23:04:07'),
(23, 11, 1, 'giầy bata nữ gấu siêu dễ thương', 'Giày đẹp', 'Giày đẹp', 139000, '/storage/product/VMzCcg0F6hAnn2SsHxL4.jpg', 0, '2023-11-15 04:29:00', '2023-11-27 23:03:54'),
(24, 10, 1, 'Quần Short Lưng Thun Trên Gối Vải Thun Co Giãn Trơn Dáng Rộng Đơn Giản No Style 06', 'Thành phần: 100% Polyester\r\nCấu trúc dệt WAFFLE đặc biệt\r\n- Hạn chế nhăn\r\n- Mềm mại\r\n- Tỏa nhiệt bề mặt\r\n- Co dãn tốt\r\n- Lưng thun đàn hồi\r\n- Dây rút bên trong eo để điều chỉnh kích cỡ', 'đftftftf', 157000, '/storage/product/9sZqmYOkHMIymmD7xWFD.png', 1, '2023-11-15 07:20:49', '2023-11-16 00:30:53'),
(25, 8, 3, 'ÁO HOODIE UNISEX Nam Nữ BASIC CAO CẤP', 'Áo Hoodie Nỉ BASIC với Chất liệu Nỉ Ngoại tốt; mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp bạn giữ ấm trong mùa lạnh mà còn có thể chống nắng, chống gió, chống bụi, chống rét, chống tia UV cực tốt, rất tiện lợi nhé!!! (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)\r\n🌀 Fullsize: Từ 40-95kg mặc đẹp . \r\n🌀 Màu sắc: 9 màu Y hình.\r\n🌀 Đường may kỹ, tinh tế, sắc xảo.\r\n🌀 Form chuẩn Unisex Nam Nữ Couple đều mặc được.\r\n🌀 Giao hàng tận nơi. Nhận hàng rồi thanh toán.\r\n🌀 Cam kết: Chất lượng và Mẫu mã Sản phẩm giống với Hình ảnh.\r\n🌀 Trả hàng hoàn tiền trong 3 ngày nếu sản phẩm bị lỗi.\r\n(Nếu Sản phẩm bị lỗi, mong Quý khách khoan Đánh giá, vui lòng inbox hoặc liên hệ Shop để được hỗ trợ đổi hàng hoặc Trả hàng/Hoàn tiền cho ạ!)\r\n💦 Sỉ Inbox Shop.', 'Áo Hoodie Nỉ BASIC với Chất liệu Nỉ Ngoại tốt; mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp bạn giữ ấm trong mùa lạnh mà còn có thể chống nắng, chống gió, chống bụi, chống rét, chống tia UV cực tốt, rất tiện lợi nhé!!! (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)\r\n🌀 Fullsize: Từ 40-95kg mặc đẹp . \r\n🌀 Màu sắc: 9 màu Y hình.\r\n🌀 Đường may kỹ, tinh tế, sắc xảo.\r\n🌀 Form chuẩn Unisex Nam Nữ Couple đều mặc được.\r\n🌀 Giao hàng tận nơi. Nhận hàng rồi thanh toán.\r\n🌀 Cam kết: Chất lượng và Mẫu mã Sản phẩm giống với Hình ảnh.\r\n🌀 Trả hàng hoàn tiền trong 3 ngày nếu sản phẩm bị lỗi.\r\n(Nếu Sản phẩm bị lỗi, mong Quý khách khoan Đánh giá, vui lòng inbox hoặc liên hệ Shop để được hỗ trợ đổi hàng hoặc Trả hàng/Hoàn tiền cho ạ!)\r\n💦 Sỉ Inbox Shop.', 63000, '/storage/product/E2WUG2XHKf2ZwlCr9ozJ.jpg', 1, '2023-11-16 01:43:30', '2023-11-27 23:03:42'),
(26, 8, 1, 'Áo đẹp ghê', 'test', 'test', 63000, '/storage/product/ZnxfQVv5kQUyU9BEH3dS.jpg', 1, '2023-11-17 00:33:28', '2023-11-27 23:03:30'),
(27, 11, 3, 'VENUS giày thể thao nữ Đế Bằng Hàn Quốc', '🌈 Chào mừng đến với cửa hàng của chúng tôi.\r\n\r\n\r\n\r\n  🌈 Theo dõi cửa hàng để nhận phiếu giảm giá ”◕‿◕｡\r\n\r\n\r\n\r\n  🌈 Nếu bạn hài lòng với sản phẩm và dịch vụ của chúng tôi Lời khen ngợi năm sao\r\n\r\n\r\n\r\n  🚚 Sản phẩm đến từ Trung Quốc và mất một thời gian để vận chuyển\r\n\r\n\r\n\r\n  💕 Phải mặc! Phổ biến vào năm 2023!\r\n\r\n\r\n\r\n  💕Được làm bằng chất liệu cao cấp, đủ bền để bạn mặc hàng ngày!\r\n\r\n\r\n\r\n  💕 Thật thoải mái Chất liệu vải mềm mại, hình dáng đẹp, chất lượng tốt.\r\n\r\n\r\n\r\n  💕 Thiết kế đẹp, sang trọng, độc đáo.\r\n\r\n\r\n\r\n  💕 Nó là một món quà tốt cho người yêu của bạn hoặc chính bạn.\r\n\r\n\r\n\r\n  ❣️ Chất lượng và giá cả như thế này không thể tìm thấy ở bất kỳ nơi nào khác, rất đáng đồng tiền. ️\r\n\r\n\r\n\r\n  ❣️Do các thiết bị hiển thị và chiếu sáng khác nhau, hình ảnh có thể không phản ánh màu sắc thực tế của tất cả các sản phẩm. Cảm ơn bạn đã thông cảm ❣️\r\n\r\n\r\n\r\n  ❣️ Đánh giá 1 hoặc 2 sao không có lý do / hình minh họa. hoặc đặt điều gì đó không đúng sự thật làm hỏng danh tiếng của shop shop sẽ không giúp gì cả vì bạn được coi là đang vào vì lợi ích của Shop, đặc biệt cảm ơn quý khách hàng đã có nhu cầu vui lòng đặt hàng hoặc yêu cầu thêm thông tin tin tin nhé ️', '🌈 Chào mừng đến với cửa hàng của chúng tôi.\r\n\r\n\r\n\r\n  🌈 Theo dõi cửa hàng để nhận phiếu giảm giá ”◕‿◕｡\r\n\r\n\r\n\r\n  🌈 Nếu bạn hài lòng với sản phẩm và dịch vụ của chúng tôi Lời khen ngợi năm sao\r\n\r\n\r\n\r\n  🚚 Sản phẩm đến từ Trung Quốc và mất một thời gian để vận chuyển\r\n\r\n\r\n\r\n  💕 Phải mặc! Phổ biến vào năm 2023!\r\n\r\n\r\n\r\n  💕Được làm bằng chất liệu cao cấp, đủ bền để bạn mặc hàng ngày!\r\n\r\n\r\n\r\n  💕 Thật thoải mái Chất liệu vải mềm mại, hình dáng đẹp, chất lượng tốt.\r\n\r\n\r\n\r\n  💕 Thiết kế đẹp, sang trọng, độc đáo.\r\n\r\n\r\n\r\n  💕 Nó là một món quà tốt cho người yêu của bạn hoặc chính bạn.\r\n\r\n\r\n\r\n  ❣️ Chất lượng và giá cả như thế này không thể tìm thấy ở bất kỳ nơi nào khác, rất đáng đồng tiền. ️\r\n\r\n\r\n\r\n  ❣️Do các thiết bị hiển thị và chiếu sáng khác nhau, hình ảnh có thể không phản ánh màu sắc thực tế của tất cả các sản phẩm. Cảm ơn bạn đã thông cảm ❣️\r\n\r\n\r\n\r\n  ❣️ Đánh giá 1 hoặc 2 sao không có lý do / hình minh họa. hoặc đặt điều gì đó không đúng sự thật làm hỏng danh tiếng của shop shop sẽ không giúp gì cả vì bạn được coi là đang vào vì lợi ích của Shop, đặc biệt cảm ơn quý khách hàng đã có nhu cầu vui lòng đặt hàng hoặc yêu cầu thêm thông tin tin tin nhé ️', 220900, '/storage/product/zDBk3knv5zmc6AxanaKQ.jpg', 1, '2023-11-18 00:11:16', '2023-11-27 23:03:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producttags`
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
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(191) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `product_id`, `created_at`, `updated_at`) VALUES
(20, '/storage/product/9ZMF2ThiPLy8BTr3pvi0.jpg', 24, '2023-11-15 07:39:17', '2023-11-15 07:39:17'),
(21, '/storage/product/nlFbPeCWPZHUjRf7CgIa.jpg', 24, '2023-11-15 07:39:17', '2023-11-15 07:39:17'),
(25, '/storage/product/4xCRlKWvqSsk3N8Z3LeJ.jpg', 27, '2023-11-27 23:03:17', '2023-11-27 23:03:17'),
(26, '/storage/product/QWUc4j8ih9dZYLT6it6G.jpg', 27, '2023-11-27 23:03:17', '2023-11-27 23:03:17'),
(27, '/storage/product/lqfHcDTojieERapCDkhG.jpg', 27, '2023-11-27 23:03:17', '2023-11-27 23:03:17'),
(28, '/storage/product/yoJf4KHQaYY9VWMYlJb9.jpg', 26, '2023-11-27 23:03:30', '2023-11-27 23:03:30'),
(29, '/storage/product/1iAXxX5EOYJBzk4Jg6Hx.jpg', 26, '2023-11-27 23:03:30', '2023-11-27 23:03:30'),
(30, '/storage/product/19t8UlYuc3337RJm7D2E.jpg', 26, '2023-11-27 23:03:30', '2023-11-27 23:03:30'),
(31, '/storage/product/FQKiSmmBj8Pfvyn0MCng.jpg', 25, '2023-11-27 23:03:42', '2023-11-27 23:03:42'),
(32, '/storage/product/kEB9lZ0Cc7TWd5n7fVTB.jpg', 25, '2023-11-27 23:03:42', '2023-11-27 23:03:42'),
(33, '/storage/product/r0pqqSHFqOxd8WV7mILU.jpg', 25, '2023-11-27 23:03:42', '2023-11-27 23:03:42'),
(34, '/storage/product/BsyhQlS9XhxFu172AAGl.jpg', 23, '2023-11-27 23:03:54', '2023-11-27 23:03:54'),
(35, '/storage/product/b4U0dVy4eXCklWbi2rSv.jpg', 23, '2023-11-27 23:03:54', '2023-11-27 23:03:54'),
(36, '/storage/product/ufWdLf2Oh6MERtjhGspx.jpg', 23, '2023-11-27 23:03:54', '2023-11-27 23:03:54'),
(37, '/storage/product/5KXAXGfzlgmYptl3X836.jpg', 22, '2023-11-27 23:04:07', '2023-11-27 23:04:07'),
(38, '/storage/product/uH26fbdz0nFDhNI5arxP.jpg', 22, '2023-11-27 23:04:07', '2023-11-27 23:04:07'),
(39, '/storage/product/0O3sfMs34WZAIUB94VyX.jpg', 22, '2023-11-27 23:04:07', '2023-11-27 23:04:07'),
(40, '/storage/product/uUAqA5tyrCsqMW39a2N8.jpg', 21, '2023-11-27 23:04:19', '2023-11-27 23:04:19'),
(41, '/storage/product/b8hgaxdSIbsPKAnhogbt.jpg', 21, '2023-11-27 23:04:19', '2023-11-27 23:04:19'),
(42, '/storage/product/pHdPgeCe6prZQvTrnUdZ.jpg', 21, '2023-11-27 23:04:19', '2023-11-27 23:04:19'),
(43, '/storage/product/STT6X9dtUhAW3vHZGjoa.jpg', 20, '2023-11-27 23:04:31', '2023-11-27 23:04:31'),
(44, '/storage/product/C7hMoTOWH9QP6KBZgLzq.jpg', 20, '2023-11-27 23:04:31', '2023-11-27 23:04:31'),
(45, '/storage/product/Gs7QIu1T0qORYGrMKPF9.jpg', 20, '2023-11-27 23:04:31', '2023-11-27 23:04:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
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
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
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
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '123456789', NULL, NULL),
(2, 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'admin11', '1323243434', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
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
-- Đang đổ dữ liệu cho bảng `tbl_customer`
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
-- Cấu trúc bảng cho bảng `users`
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
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(6, 27, 4, '2023-11-27 22:53:31', '2023-11-27 22:53:31'),
(7, 26, 4, '2023-11-27 22:54:22', '2023-11-27 22:54:22');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `producttags`
--
ALTER TABLE `producttags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `producttags`
--
ALTER TABLE `producttags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

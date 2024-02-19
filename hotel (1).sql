-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2024 at 06:57 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Travlez Destinations', 'travlez-destinations', NULL, '2023-11-20 10:53:58'),
(2, 'Luxury Hotels', 'luxury-hotels', NULL, NULL),
(3, 'Boutique Hotels', 'boutique-hotels', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blogcat_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_posts_blogcat_id_foreign` (`blogcat_id`),
  KEY `blog_posts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blogcat_id`, `user_id`, `post_title`, `post_slug`, `post_image`, `short_desc`, `long_desc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Hotel Management', 'hotel-management', 'upload/post/1783453808113254.jpg', 'Hotel Management is the Best Issue in the Global Market', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', '2023-11-24 10:54:51', NULL),
(4, 1, 1, 'Hotel Management', 'hotel-management', 'upload/post/1783540870995507.jpg', 'Hotel Management is the Best Issue in the Global Market', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', '2023-11-25 09:58:41', NULL),
(5, 2, 1, 'Reservation is a Common Fact Now', 'reservation-is-a-common-fact-now', 'upload/post/1783541002366235.jpg', 'Hotel Management is the Best Issue in the Global Market', 'rem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', '2023-11-25 10:00:46', NULL),
(6, 2, 1, 'Reservation is a Common Fact Now', 'reservation-is-a-common-fact-now', 'upload/post/1783541036471045.jpg', 'rem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiehenderit in voluptate velit esse cillum dolore', 'rem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', '2023-11-25 10:01:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `rooms_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `check_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_out` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_rooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_night` double(8,2) NOT NULL DEFAULT '0.00',
  `actual_price` double(8,2) NOT NULL DEFAULT '0.00',
  `subtotal` double(8,2) NOT NULL DEFAULT '0.00',
  `discount` int NOT NULL DEFAULT '0',
  `total_price` double(8,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id_for_booking` (`rooms_id`),
  KEY `user_id_booking` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `address`, `rooms_id`, `user_id`, `check_in`, `check_out`, `person`, `number_of_rooms`, `total_night`, `actual_price`, `subtotal`, `discount`, `total_price`, `payment_method`, `payment_status`, `phone`, `state`, `code`, `status`, `created_at`, `updated_at`) VALUES
(24, 'admin', 'admin@gmail.com', 'Jordan Ammanaa', 2, 1, '2024-01-18', '2024-01-19', '01', '01', 1.00, 1000.00, 1000.00, 0, 1000.00, 'COD', '1', '+962 7994386600', NULL, 204338145, 1, '2024-01-18 05:52:28', '2024-01-18 05:53:18'),
(25, 'abed al rahman ziq', 'abed_al_zag@yahoo.com', 'jordan-Amman', 2, 3, '2024-01-18', '2024-01-19', '01', '2', 1.00, 1000.00, 1000.00, 0, 1000.00, 'Stripe', '1', '+96279943866', NULL, 214128334, 1, '2024-01-18 09:52:14', '2024-01-20 13:34:36'),
(26, 'abed al rahman ziq', 'abed_al_zag@yahoo.com', 'jordan-Amman', 5, 3, '2024-01-22', '2024-01-23', '01', '01', 1.00, 250.00, 250.00, 25, 225.00, 'Stripe', '1', '+96279943866', NULL, 648930028, 1, '2024-01-18 10:02:42', '2024-01-18 10:03:41'),
(27, 'user', 'user@gmail.com', 'Jordan Amman', 6, 2, '2024-01-30', '2024-01-31', '04', '02', 1.00, 150.00, 300.00, 15, 285.00, 'Stripe', '1', '+962799438660', NULL, 348586530, 1, '2024-01-18 16:07:46', '2024-01-18 16:08:29'),
(28, 'abed al rahman ziq', 'abed_al_zag@yahoo.com', 'jordan', 4, 3, '2024-01-21', '2024-01-22', '01', '01', 1.00, 250.00, 250.00, 0, 250.00, 'COD', '0', '+96279943866', NULL, 613907434, 0, '2024-01-20 13:03:33', '2024-01-20 13:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `booking_room_lists`
--

DROP TABLE IF EXISTS `booking_room_lists`;
CREATE TABLE IF NOT EXISTS `booking_room_lists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` bigint UNSIGNED DEFAULT NULL,
  `room_id` bigint UNSIGNED DEFAULT NULL,
  `room_number_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_id_forlist` (`booking_id`),
  KEY `room_id_forlist` (`room_id`),
  KEY `room_numberforlist` (`room_number_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_room_lists`
--

INSERT INTO `booking_room_lists` (`id`, `booking_id`, `room_id`, `room_number_id`, `created_at`, `updated_at`) VALUES
(17, 24, 2, 1, '2024-01-18 09:04:31', '2024-01-18 09:04:31'),
(19, 26, 5, 14, '2024-01-18 10:03:36', '2024-01-18 10:03:36'),
(20, 27, 6, 13, '2024-01-18 16:08:12', '2024-01-18 16:08:12'),
(21, 27, 6, 18, '2024-01-18 16:08:18', '2024-01-18 16:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `book_areas`
--

DROP TABLE IF EXISTS `book_areas`;
CREATE TABLE IF NOT EXISTS `book_areas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_areas`
--

INSERT INTO `book_areas` (`id`, `image`, `short_title`, `main_title`, `short_desc`, `url_link`, `created_at`, `updated_at`) VALUES
(1, 'upload/bookarea/1782174177239189.jpg', 'MAKE A QUICK BOOKING .', 'We Are the Best in All-time & So Please Get a Quick Booking', 'Atoli is one of the best resorts in the global market and that\'s why you will get a luxury life period on the global market. We always provide you a special support for all of our guests and that\'s will be the main reason to be the most popular.', 'http://127.0.0.1:8000/', NULL, '2023-11-10 07:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'Nice website', '1', '2023-11-27 22:39:21', '2023-12-23 16:11:49'),
(2, 3, 4, 'asdasfsadfsdga', '1', NULL, '2023-11-29 18:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'ziq', 'asd@yahoo.com', '2416', 'abeasd', 'assssssssssssssssssssssssssssssffffffffffff', '2023-12-01 06:59:13', NULL),
(2, 'ziq', 'asd@yahoo.com', '2416', 'abeasd', 'i want to contact someone i need help with reservation', '2023-12-01 23:42:12', NULL),
(3, 'asf', 'sdf2@sdf', 'sdf', 'sdf', 'sdfsdf', '2024-01-17 13:01:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `rooms_id` bigint UNSIGNED NOT NULL,
  `facility_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facility_foreign_keu` (`rooms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `rooms_id`, `facility_name`, `created_at`, `updated_at`) VALUES
(70, 2, '32/42 inch LED TV', '2023-11-12 14:48:06', '2023-11-12 14:48:06'),
(71, 2, 'Minibar', '2023-11-12 14:48:06', '2023-11-12 14:48:06'),
(72, 2, 'Electronic door lock', '2023-11-12 14:48:06', '2023-11-12 14:48:06'),
(85, 5, 'Free Wi-Fi', '2023-11-13 09:57:44', '2023-11-13 09:57:44'),
(86, 5, 'Complimentary Breakfast', '2023-11-13 09:57:44', '2023-11-13 09:57:44'),
(90, 6, 'Free Wi-Fi', '2023-11-14 13:51:31', '2023-11-14 13:51:31'),
(91, 6, 'Work Desk', '2023-11-14 13:51:31', '2023-11-14 13:51:31'),
(92, 6, 'Electronic door lock', '2023-11-14 13:51:31', '2023-11-14 13:51:31'),
(93, 4, 'Wake-up service', '2023-11-15 20:20:41', '2023-11-15 20:20:41'),
(94, 4, 'Rain Shower', '2023-11-15 20:20:41', '2023-11-15 20:20:41'),
(95, 4, 'Hair dryer', '2023-11-15 20:20:41', '2023-11-15 20:20:41'),
(107, 10, 'Smoke alarms', '2024-01-18 14:41:25', '2024-01-18 14:41:25'),
(108, 10, 'Slippers', '2024-01-18 14:41:25', '2024-01-18 14:41:25'),
(109, 10, 'Hair dryer', '2024-01-18 14:41:25', '2024-01-18 14:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `photo_name`, `created_at`, `updated_at`) VALUES
(5, 'upload/gallery/1784069607972827.jpg', '2023-12-01 06:02:44', NULL),
(6, 'upload/gallery/1784069608273541.jpg', '2023-12-01 06:02:44', NULL),
(7, 'upload/gallery/1784069608492052.jpg', '2023-12-01 06:02:44', NULL),
(8, 'upload/gallery/1784069608690202.jpg', '2023-12-01 06:02:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_04_232914_create_teams_table', 2),
(6, '2023_11_05_052132_create_book_areas_table', 3),
(7, '2023_11_06_022856_create_room_types_table', 4),
(8, '2023_11_06_040503_create_rooms_table', 5),
(9, '2023_11_06_040513_create_facilities_table', 5),
(10, '2023_11_06_040529_create_multi_images_table', 5),
(11, '2023_11_08_043549_create_room_numbers_table', 6),
(12, '2023_11_10_061712_add_timestamps_to_room_numbers', 7),
(13, '2023_11_12_175402_create_bookings_table', 8),
(14, '2023_11_12_180732_create_room_booked_dates_table', 8),
(15, '2023_11_13_072726_create_booking_room_lists_table', 9),
(16, '2023_11_13_073055_create_booking_room_lists_table', 10),
(17, '2023_11_19_202540_create_stmp_settings_table', 11),
(18, '2023_11_20_085425_create_testimonials_table', 12),
(19, '2023_11_20_120848_create_blog_categories_table', 13),
(20, '2023_11_23_221431_create_blog_posts_table', 14),
(21, '2023_11_28_005757_create_comments_table', 15),
(22, '2023_11_29_220936_create_site_settings_table', 16),
(23, '2023_12_01_080307_create_galleries_table', 17),
(24, '2023_12_01_094129_create_contacts_table', 18),
(25, '2023_12_02_042710_create_notifications_table', 19),
(26, '2023_12_03_045316_create_permission_tables', 20);

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

DROP TABLE IF EXISTS `multi_images`;
CREATE TABLE IF NOT EXISTS `multi_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `rooms_id` int NOT NULL,
  `multi_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_images`
--

INSERT INTO `multi_images` (`id`, `rooms_id`, `multi_image`, `created_at`, `updated_at`) VALUES
(20, 2, '202311080312Executive-Suite-Photo2.jpg', '2023-11-08 00:12:04', '2023-11-08 00:12:04'),
(21, 2, '202311080312Executive-Suite-Photo3.jpg', '2023-11-08 00:12:04', '2023-11-08 00:12:04'),
(25, 6, '202311101729Executive-Suite-Photo1.jpg', '2023-11-10 14:29:06', '2023-11-10 14:29:06'),
(26, 6, '202311101729Executive-Suite-Photo2.jpg', '2023-11-10 14:29:06', '2023-11-10 14:29:06'),
(27, 6, '202311101729Executive-Suite-Photo3.jpg', '2023-11-10 14:29:06', '2023-11-10 14:29:06'),
(28, 5, '202311101731Premier-Deluxe-Twin-main-Photo1.jpg', '2023-11-10 14:31:12', '2023-11-10 14:31:12'),
(29, 5, '202311101731Premier-Deluxe-Twin-main-Photo2.jpg', '2023-11-10 14:31:12', '2023-11-10 14:31:12'),
(30, 5, '202311101731Premier-Deluxe-Twin-main-Photo3.jpg', '2023-11-10 14:31:12', '2023-11-10 14:31:12'),
(31, 4, '202311101735super-premier-deluxe-main-Photo1.jpg', '2023-11-10 14:35:28', '2023-11-10 14:35:28'),
(32, 4, '202311101735super-premier-deluxe-main-Photo2.jpg', '2023-11-10 14:35:28', '2023-11-10 14:35:28'),
(33, 4, '202311101735super-premier-deluxe-main-Photo3.jpg', '2023-11-10 14:35:28', '2023-11-10 14:35:28'),
(34, 10, '202401181741bandicam 2023-12-08 14-49-07-643.jpg', '2024-01-18 14:41:25', '2024-01-18 14:41:25'),
(35, 10, '202401181741bandicam 2023-12-08 14-49-13-117.jpg', '2024-01-18 14:41:25', '2024-01-18 14:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('063714b2-4577-4f1d-9b80-5ce0955a61a1', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2023-12-02 02:51:43', '2023-12-02 02:51:10', '2023-12-02 02:51:43'),
('0b90892d-3670-425e-807c-0c9650525ce5', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2024-01-18 09:52:24', '2024-01-18 09:52:16', '2024-01-18 09:52:24'),
('13137cfb-8512-48d6-9abd-d27d9d1b490e', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-18 02:43:43', '2024-01-18 02:43:43'),
('2b0dfa11-5a12-43e9-bee0-20e556d7fcf5', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2024-01-17 12:40:57', '2024-01-17 12:39:42', '2024-01-17 12:40:57'),
('318b7e7c-1be2-4aa7-8743-864ecb4dc480', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-18 09:52:16', '2024-01-18 09:52:16'),
('45073814-9839-4bd2-883b-e8f752fb33dc', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-17 12:39:42', '2024-01-17 12:39:42'),
('562df227-a26e-405c-a7fb-36dd9f312f72', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-20 13:03:34', '2024-01-20 13:03:34'),
('5bb48c8e-628f-4003-899f-afc4fb0fec12', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2023-12-02 02:49:54', '2023-12-02 01:54:33', '2023-12-02 02:49:54'),
('6a956c66-7223-4538-bc93-90310d6467d2', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-18 10:02:42', '2024-01-18 10:02:42'),
('6d11916e-7538-479b-86fa-7c612ebc0986', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2024-01-18 09:22:25', '2024-01-18 05:52:28', '2024-01-18 09:22:25'),
('75ae0ddf-bf99-45f9-ab56-c6a3fcf20089', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-18 16:07:46', '2024-01-18 16:07:46'),
('77f70e94-c2d3-4d7d-8b07-6ea67fe80269', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2023-12-23 16:17:33', '2023-12-08 09:34:11', '2023-12-23 16:17:33'),
('7dd3d47a-4a4d-4b53-aad0-ce966c4bd645', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-20 13:03:34', '2024-01-20 13:03:34'),
('8d9c83d8-5fce-41ba-b340-e2e5a648c68a', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-18 05:52:28', '2024-01-18 05:52:28'),
('9e0afae3-dfaf-4207-80df-37a54107dce0', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-18 16:07:46', '2024-01-18 16:07:46'),
('c5914314-ee1e-4ff1-81a8-53dee55c35e3', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2024-01-18 09:22:30', '2024-01-18 04:31:48', '2024-01-18 09:22:30'),
('c6c9ac09-4d4c-4b2d-b4c1-762f5b49746f', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2024-01-18 09:22:26', '2024-01-18 02:43:43', '2024-01-18 09:22:26'),
('cee195e2-fed5-46d1-8e36-241efdee15e3', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-08 03:35:15', '2024-01-08 03:35:15'),
('d88483b4-dc8e-4f2b-b221-1e9a24d45e8e', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2023-12-08 09:34:11', '2023-12-08 09:34:11'),
('dfcc5c86-6154-49b7-af1c-850bffddb54b', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2023-12-06 03:23:09', '2023-12-06 03:23:09'),
('e11c3f68-5375-4e83-9552-348e2c3b604d', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2024-01-18 12:26:06', '2024-01-18 10:02:42', '2024-01-18 12:26:06'),
('e421e03b-0010-474e-97d9-c7fa35932798', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2023-12-06 03:23:29', '2023-12-06 03:23:09', '2023-12-06 03:23:29'),
('e97a234c-853b-46aa-960a-bee5fd279002', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 1, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', '2024-01-08 03:39:30', '2024-01-08 03:35:15', '2024-01-08 03:39:30'),
('fd31e216-7c92-48f6-b7ad-fd1158f3b3b8', 'App\\Notifications\\BookingComplete', 'App\\Models\\User', 11, '{\"message\":\"New Booking Added in Hotel\",\"0\":\"\"}', NULL, '2024-01-18 04:31:48', '2024-01-18 04:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$10$ExUA8385Ud1vz60U7Ox5wuClthbIwJkfmE2dXq8I9o5yAfNs3zIk.', '2023-11-01 11:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `roomtype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `userID` bigint UNSIGNED DEFAULT NULL,
  `total_adult` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_child` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_capacity` int DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bed_style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `short_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roomtype` (`roomtype`),
  KEY `userCreateRoom` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomtype`, `userID`, `total_adult`, `total_child`, `room_capacity`, `image`, `price`, `size`, `view`, `bed_style`, `discount`, `short_desc`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'PREMIER SINGLE', 1, '1', '0', 4, '1781958858785409.jpg', '1000', '120', 'sea View', 'Queen Bed', 0, 'Our Premier Single Rooms are designed with today\'s business travelers in mind. The delightful interior, softened by yellow accents, create an ultra-\r\ncontemporary space.', '<p>Our Premier Single Rooms are designed with today\'s business travelers in mind. The delightful interior, softened by yellow accents, create an ultra-<br>contemporary space. The smart location of our hotel, qne plot away from the main road, means you will have silent and peaceful nights, found rarely at<br>Dhaka. Balancing productivity and relaxation in equal measure, Premier Single Rooms include a softly-lit desk, ideal for reading the daily newspaper or<br>using your notebook on. Meanwhile complimentary wireless High Speed Internet Access offers a home-like setting to do your chores.</p>', 1, NULL, '2023-11-12 14:48:06'),
(4, 'SUPER PREIMER ', 1, '3', '1', 3, '1782199330997811.jpg', '250', '350', 'sea View', 'King Bed', 0, 'Our spacious Super Premier Deluxe Rooms are designed with today’s business travelers in mind. The delightful interior, softened by yellow accents, create an ultra-contemporary space.', '<p>Our spacious Super Premier Deluxe Rooms are designed with today&rsquo;s business travelers in mind. The delightful interior, softened by yellow accents, create an ultra-contemporary space. The smart location of our hotel, one plot away from the main road, means you will have silent and peaceful nights, found rarely at Dhaka. Balancing productivity and relaxation in equal measure, Premier Deluxe Rooms include a softly-lit desk, ideal for reading the daily newspaper or using your notebook on. Meanwhile complimentary wireless High Speed Internet Access offers a home-like setting to do your chores.</p>', 1, NULL, '2023-11-15 20:20:41'),
(5, 'PREMIER TWIN ', 1, '2', '2', 3, '1782199062440475.jpg', '250', '41', 'hill View', 'Twin Bed', 10, 'Our room offers a generous 40.5 sqm of elegant living space, designed for your utmost comfort and convenience. Each room is furnished with twin beds and all the essential facilities to enhance your stay.', '<p>Our room offers a generous 40.5 sqm of elegant living space, designed for your utmost comfort and convenience. Each room is furnished with twin beds and all the essential facilities to enhance your stay. It also comes with polished parquet floors or exquisite tiles. The marble-clad suite bathroom boasts a luxurious bathtub and features the finest amenities for your indulgence. The concept design of this room type is modern comfort as its core ethos. Each room features a private balcony, affording breathtaking views of our pristine pool, lush golf course, or serene garden.</p>', 1, NULL, '2023-11-13 09:57:44'),
(6, 'ECECUTIVE SUITE ', 1, '5', '3', 2, '1782198929239359.jpg', '150', '120', 'sea View', 'Queen Bed', 5, 'The Executive Suite is the epitome of luxury and sophistication in our hotel. Designed for discerning travelers, this spacious and well-appointed room offers a blend of comfort and style.', '<p>Welcome to the pinnacle of opulence &ndash; our Executive Suite. Tailored for the most discerning of travelers, this expansive and meticulously designed accommodation is a testament to luxury and comfort. The suite seamlessly combines contemporary elegance with thoughtful functionality, providing a haven for both relaxation and productivity.</p>\r\n<p>Upon entering, you are greeted by a spacious living area adorned with tasteful furnishings, creating an inviting ambiance for socializing or unwinding in private. The separate bedroom, furnished with a sumptuous king-sized bed and premium linens, ensures a restful night\'s sleep. The suite\'s design exudes sophistication, with attention to detail evident in every corner.</p>', 1, NULL, '2023-11-14 13:51:31'),
(10, 'xxxx', NULL, '2', '3', 3, '1788448516243629.jpg', '333', '3', 'sea View', 'Queen Bed', 3, 'asdasd', '<p>xasdasd</p>', 1, NULL, '2024-01-18 14:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `room_booked_dates`
--

DROP TABLE IF EXISTS `room_booked_dates`;
CREATE TABLE IF NOT EXISTS `room_booked_dates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` bigint UNSIGNED DEFAULT NULL,
  `room_id` bigint UNSIGNED DEFAULT NULL,
  `book_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `room_booked_dates`
--

INSERT INTO `room_booked_dates` (`id`, `booking_id`, `room_id`, `book_date`, `created_at`, `updated_at`) VALUES
(2, 23, 6, '2024-01-20', '2024-01-18 04:41:49', '2024-01-18 04:41:49'),
(3, 24, 2, '2024-01-18', '2024-01-18 05:52:28', '2024-01-18 05:52:28'),
(5, 26, 5, '2024-01-22', '2024-01-18 10:02:42', '2024-01-18 10:02:42'),
(6, 27, 6, '2024-01-30', '2024-01-18 16:07:46', '2024-01-18 16:07:46'),
(7, 28, 4, '2024-01-21', '2024-01-20 13:03:33', '2024-01-20 13:03:33'),
(9, 25, 2, '2024-01-18', '2024-01-20 13:34:44', '2024-01-20 13:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `room_numbers`
--

DROP TABLE IF EXISTS `room_numbers`;
CREATE TABLE IF NOT EXISTS `room_numbers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `rooms_id` bigint UNSIGNED NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk` (`rooms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_numbers`
--

INSERT INTO `room_numbers` (`id`, `rooms_id`, `room_no`, `status`) VALUES
(1, 2, '201', 'Active'),
(2, 2, '202', 'Active'),
(8, 2, '204', 'Active'),
(9, 2, '203', 'Active'),
(10, 5, '501', 'Active'),
(11, 4, '601', 'Active'),
(12, 4, '602', 'Active'),
(13, 6, '555', 'reserved'),
(14, 5, '502', 'reserved'),
(15, 5, '503', 'Active'),
(16, 6, '565', 'Active'),
(17, 4, '603', 'Active'),
(18, 6, '570', 'reserved');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facbook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone`, `address`, `email`, `facbook`, `twitter`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'upload/site/1783939458392504.png', '+962799438660', '`amman', 'abed_al_zag@yahoo.com', 'xxxxxxxxxx', 'xxxxxx', 'xxxxx', '2023-11-29 22:14:06', '2024-01-17 15:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `stmp_settings`
--

DROP TABLE IF EXISTS `stmp_settings`;
CREATE TABLE IF NOT EXISTS `stmp_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `mailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stmp_settings`
--

INSERT INTO `stmp_settings` (`id`, `mailer`, `host`, `port`, `username`, `password`, `encryption`, `from_address`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'sandbox.smtp.mailtrap.io', '2525', '63d1a49575e5df', '41c6d9bc5a9f65', 'tls', 'hello@abed.com', NULL, '2023-11-19 18:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facbook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `image`, `postion`, `facbook`, `created_at`, `updated_at`) VALUES
(2, 'abed', 'upload/team/1781693851409961.png', 'Ceo', 'https://www.facebook.com/', '2023-11-05 00:41:05', NULL),
(9, 'khaled', 'upload/team/1782173015095353.png', 'Manger', 'test', '2023-11-10 07:37:12', NULL),
(10, 'Ahmed', 'upload/team/1782173050709448.png', 'Housekeeping', 'test', '2023-11-10 07:37:45', NULL),
(11, 'Zaid', 'upload/team/1782173069879263.png', 'test130', 'test', '2023-11-10 07:38:04', '2023-11-10 07:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `city`, `Image`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Abed khaled', 'Ammana', 'upload/testimonial/1783075588930846.png', 'This is one of the best & quality full hotels in the world that will help you to make an excellent study market.', '2023-11-20 06:43:13', NULL),
(2, 'oamr1', 'asd1', 'upload/testimonial/1783075787628812.png', 'This is one of the best & quality full hotels in the world that will help you to make an excellent study market.', '2023-11-20 06:46:22', '2023-11-20 07:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$XSYM/PBNhcg6gAbEgxNLluzOGIaw.zDJST4nnFj0mNIKWx2buD4bq', '202311022013avatar-1.png', '+962 7994386600', 'Jordan Ammanaa', 'admin', 'active', 'xzZFQMRTTSOeG8YBryw6f6m5VGfX5RvFC7TjtLPnNzDSBeS8eRaCrG8vImMn', NULL, '2023-12-06 03:16:36'),
(2, 'user', 'user@gmail.com', NULL, '$2y$10$f17s1.wGavCUHKygAy10tOnBZVwA49QpXJPouclXgUIFNryHrKCAi', '202311040243avatar-1.png', '+962799438660', 'Jordan Amman', 'user', 'active', NULL, NULL, '2023-11-04 03:47:30'),
(3, 'abed al rahman ziq', 'abed_al_zag@yahoo.com', NULL, '$2y$10$OyDCMU4nI7q8cXszebtigOTmA/KARiivSFo/gSs/tCeVLBOT/EaWi', NULL, '+96279943866', NULL, 'user', 'active', 'MagN5nYVSXWui2r4EwhSb4lNrYVBw2R0FJuS7NtCL9sStpBnCe3cyRZSnBF0', '2023-11-03 01:24:00', '2023-11-15 09:28:47'),
(11, 'khaled', 'asdkhlasf@asd.com', NULL, '$2y$10$/jYzKczE./bkm2KGxD7.j.KOqXtOjaFctZ9XDFxqIrAcxEMsWAiM.', NULL, '2465231', 'amman', 'admin', 'active', NULL, '2023-12-06 01:15:13', '2023-12-06 01:15:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_blogcat_id_foreign` FOREIGN KEY (`blogcat_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `room_id_for_booking` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_booking` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_room_lists`
--
ALTER TABLE `booking_room_lists`
  ADD CONSTRAINT `booking_id_forlist` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_id_forlist` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_numberforlist` FOREIGN KEY (`room_number_id`) REFERENCES `room_numbers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facility_foreign_keu` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `userCreateRoom` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_numbers`
--
ALTER TABLE `room_numbers`
  ADD CONSTRAINT `fk` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

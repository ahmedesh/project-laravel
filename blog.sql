-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2021 at 07:47 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_11_21_121457_create_profile_users', 1),
(5, '2021_11_22_172806_create_posts_table', 1),
(7, '2021_11_27_183538_create_tags_table', 2),
(8, '2021_11_28_100551_post_tag', 2),
(9, '2021_11_28_101138_create_post_tag_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `photo`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 2, 'java', 'java course', 'uploads/posts/16381361043sh.jpg', 'java', NULL, '2021-11-28 18:50:09', '2021-11-28 19:48:24'),
(14, 2, 'c#', 'c# course', 'uploads/posts/16381360043sh.jpg', 'c', NULL, '2021-11-28 19:46:45', '2021-11-28 19:46:45'),
(10, 1, 'web backend developer', 'web developer beckend', 'uploads/posts/16381029203sh.jpg', 'web-backend', '2021-11-28 18:45:00', '2021-11-28 10:19:14', '2021-11-28 18:45:00'),
(9, 1, 'web frontend developer', 'web style && deveoper', 'uploads/posts/16381029473sh.jpg', 'web-frontend', NULL, '2021-11-28 10:18:48', '2021-11-28 18:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tag_post_id_foreign` (`post_id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(17, 11, 3, NULL, NULL),
(16, 11, 2, NULL, NULL),
(15, 9, 3, NULL, NULL),
(14, 9, 2, NULL, NULL),
(13, 9, 1, NULL, NULL),
(12, 10, 5, NULL, NULL),
(18, 12, 1, NULL, NULL),
(11, 10, 4, NULL, NULL),
(19, 12, 3, NULL, NULL),
(20, 13, 3, NULL, NULL),
(21, 14, 2, NULL, NULL),
(22, 13, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_users`
--

DROP TABLE IF EXISTS `profile_users`;
CREATE TABLE IF NOT EXISTS `profile_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_users_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_users`
--

INSERT INTO `profile_users` (`id`, `province`, `user_id`, `gender`, `bio`, `facebook`, `created_at`, `updated_at`) VALUES
(5, 'Kirkuk', 1, 'Male', 'Hello world', 'https://www.facebook.com', '2021-11-27 19:04:56', '2021-11-27 19:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'html5', '2021-11-28 08:40:39', '2021-11-28 10:19:26'),
(2, 'css', '2021-11-28 08:40:43', '2021-11-28 08:40:43'),
(3, 'js', '2021-11-28 08:40:46', '2021-11-28 08:40:46'),
(4, 'php', '2021-11-28 08:40:50', '2021-11-28 08:40:50'),
(5, 'mysql', '2021-11-28 08:41:47', '2021-11-28 08:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yara', 'yara@gmail.com', NULL, '$2y$10$X7S8Lx5ua2fXpPlxZDVZnumJE6Si2dfukcJ1.OphN3BbBnJCRBLqO', NULL, '2021-11-27 18:44:07', '2021-11-27 18:44:07'),
(2, 'tamer', 'tamer@gmail.com', NULL, '$2y$10$LITY3QxzdJOUD3Hx1i8sZOB4IBYFlLgX3Jk5rVCepEy9.jMKHaBfm', NULL, '2021-11-28 17:15:08', '2021-11-28 17:15:08'),
(3, 'ola', 'ola@gmail.com', NULL, '$2y$10$FtGNgKllavNyyH53tmJpvOnD.RplSFWltwb8L3Y936PZLCgOUYGL2', NULL, '2021-11-28 22:28:47', '2021-11-28 22:28:47'),
(4, 'Gamal', 'Gamal@gmail.com', NULL, '$2y$10$ktehDwNgNqLf8VYuQddAheLBa7B55ZmPwns2MpYbZa3WDmDf9Nfhe', NULL, '2021-11-28 22:52:57', '2021-11-28 22:52:57'),
(5, 'belal', 'belal@gmail.com', NULL, '$2y$10$oNe0Vh03YGkL16Wldy..3uaHELOM1hzNxyj0k24dT2xm1aOxU3XFO', NULL, '2021-11-28 23:05:34', '2021-11-28 23:05:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

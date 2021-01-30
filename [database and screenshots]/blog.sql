-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 03, 2021 at 12:29 PM
-- Server version: 8.0.21
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
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_18_140811_create_profiles_table', 1),
(5, '2020_12_19_060834_create_posts_table', 1),
(6, '2021_01_02_072413_create_reviews_table', 1),
(7, '2021_01_02_072619_create_relations_table', 1);

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
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `rating` double(8,2) UNSIGNED DEFAULT NULL,
  `review` bigint UNSIGNED DEFAULT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `rating`, `review`, `caption`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 0, 'This is the first post on this site', 'uploads/C7hnNcuxLs8bZ1Pxe63kEB3kU1vWzUEMWsANCdJR.png', '2021-01-03 04:07:48', '2021-01-03 04:07:48'),
(2, 2, NULL, 0, 'Boracay Island', 'uploads/80Id5SqdrjTxV1VubO9LKCLVn7jOLRHY9yGqH2f9.jpg', '2021-01-03 04:09:52', '2021-01-03 04:09:52'),
(3, 2, NULL, 0, 'Greens', 'uploads/CcPtBU5J1KfZPR75oY4M7ASULSkWSm2KFm6szE0P.png', '2021-01-03 04:12:36', '2021-01-03 04:12:36'),
(4, 2, NULL, 0, 'Ha Long Bay', 'uploads/tp6zXWPUQuI2xmxadA03tnJPFvyJDZhAmg2IIx9Q.jpg', '2021-01-03 04:13:07', '2021-01-03 04:13:07'),
(5, 3, NULL, 0, 'Nature', 'uploads/yGvg7XOVIXW8QTLOpdvdGUKJwmB1ocAZyQEmbtBK.jpg', '2021-01-03 04:15:39', '2021-01-03 04:15:39'),
(6, 3, NULL, 0, 'Australia', 'uploads/1xo2pzYjZXuwE9BmnWF1WDJsnq9fYd6hWPaN1Zwu.jpg', '2021-01-03 04:15:59', '2021-01-03 04:15:59'),
(7, 3, NULL, 0, 'Azure Window', 'uploads/pe14NzBa1R4oEAbGv0CU2c5vybojDTWW192py3uG.jpg', '2021-01-03 04:16:21', '2021-01-03 04:16:21'),
(8, 3, NULL, 0, 'Blue Hole', 'uploads/tsEDIhJPOA5m1dB7NpcbVsD39kgWYLEtUBNCpRj0.jpg', '2021-01-03 04:16:49', '2021-01-03 04:16:49'),
(9, 4, NULL, 0, 'Sunset', 'uploads/CzNAXEUNHPyps6pKKE2DkDpugYRiBdMA3JSDGabF.jpg', '2021-01-03 04:20:26', '2021-01-03 04:20:26'),
(10, 4, NULL, 0, 'Beautiful, but is it dangerous?', 'uploads/dSA9L8ePJgyPYzj6rYKKVHKYy2aAVntqpZAIiYz5.jpg', '2021-01-03 04:21:00', '2021-01-03 04:21:00'),
(11, 4, NULL, 0, 'I love islands', 'uploads/cYN26kRMjmPmgFD1bXCDUC6aY5UIFhb6z5XpqVGn.jpg', '2021-01-03 04:21:24', '2021-01-03 04:21:24'),
(12, 4, NULL, 0, 'Island again', 'uploads/CRwjOqmzpSafAdQMKntIYD2AGQ9iI6jxbUPsaaUe.jpg', '2021-01-03 04:21:42', '2021-01-03 04:21:42'),
(13, 4, NULL, 0, 'Love to swim here', 'uploads/Itkmv6gmzfgvzk8pWtiEHZwfxcvB6Rr7Uqplyr8r.jpg', '2021-01-03 04:22:07', '2021-01-03 04:22:07'),
(14, 3, NULL, 0, 'Autumn', 'uploads/xmXhU3Wgu9M3iQwkOpvJHEHWFUuFxICLeupYzIkS.jpg', '2021-01-03 04:23:30', '2021-01-03 04:23:30'),
(15, 3, NULL, 0, 'Beautify cliffs', 'uploads/aI49vaCEUDLaORKMKkeIK8cnUmbVpoDnDQHdPeAc.jpg', '2021-01-03 04:23:51', '2021-01-03 04:23:51'),
(16, 3, NULL, 0, 'Devil eye', 'uploads/OgfhFlpRSSi8WKgpoG6pP6RFxpnaabq6t0ksPJ73.jpg', '2021-01-03 04:24:11', '2021-01-03 04:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'This is the Admin account', 'uploads/HMNN17Bf2e7VBcaLiyy1fZRhHPVRtUEEf1Ej8H5d.png', NULL, '2021-01-03 04:05:48'),
(2, 2, 'I am a playkitty', 'uploads/9ytbro0tamt3mYmTIJ3UYRjzuBkpRxx7W47bPavB.png', '2021-01-03 04:09:11', '2021-01-03 04:09:11'),
(3, 3, 'Lazy Dog', 'uploads/iu6O3wrgnvvBJvvxKf9SQKn6Ca0BWsk46c1inLBk.png', '2021-01-03 04:15:10', '2021-01-03 04:15:10'),
(4, 4, 'I am a drunk rooster', 'uploads/oyvQrZExHinVtqsvDSn72hrEcg8LoXcj3fJVjTHK.png', '2021-01-03 04:19:54', '2021-01-03 04:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
CREATE TABLE IF NOT EXISTS `relations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `follower_id` bigint UNSIGNED DEFAULT NULL,
  `followee_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relations_follower_id_followee_id_index` (`follower_id`,`followee_id`),
  KEY `relations_followee_id_foreign` (`followee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `post_id` bigint UNSIGNED DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `rating` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_post_id_index` (`user_id`,`post_id`),
  KEY `reviews_post_id_foreign` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@blog.com', NULL, '$2y$10$YFBgDGLMta.TjITp5pizWOs8eqK3etmqavvvUshXeVCanXhjZXkZq', NULL, NULL, NULL),
(2, 'Cat', 'user', 'cat@blog.com', NULL, '$2y$10$fC03qdao2S2DV2SLQlSNBOsivUB/RLGJ/yH2JTzvg75c0UTkuN1yW', NULL, '2021-01-03 04:08:57', '2021-01-03 04:08:57'),
(3, 'Dog', 'user', 'dog@blog.com', NULL, '$2y$10$D6YHVtN1Logrw9rprhyqK.E6nmP1.9OK712IMzAebjh3Yn2vH598q', NULL, '2021-01-03 04:14:47', '2021-01-03 04:14:47'),
(4, 'Rooster', 'user', 'rooster@blog.com', NULL, '$2y$10$RewoIghiEBU2wJdTcui/guIbtE.083lI2gFlZmumVK6uFyhzfEi.m', NULL, '2021-01-03 04:19:41', '2021-01-03 04:19:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

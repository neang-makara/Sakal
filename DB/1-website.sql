-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2023 at 06:20 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 'IT', 1, '2023-09-27 01:14:05', '2023-09-27 01:14:05'),
(2, 'Accounting', 2, '2023-09-27 01:14:21', '2023-09-27 01:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

DROP TABLE IF EXISTS `generals`;
CREATE TABLE IF NOT EXISTS `generals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_users`
--

DROP TABLE IF EXISTS `history_users`;
CREATE TABLE IF NOT EXISTS `history_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_obj` json DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `created_by` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_users`
--

INSERT INTO `history_users` (`id`, `data_obj`, `deleted_at`, `created_at`, `updated_at`, `deleted_by`, `updated_by`, `created_by`) VALUES
(1, '{\"name\": \"TUN Chanty\", \"phone\": \"087881427\", \"gender\": \"Male\", \"talent\": [\"គីមីវិទ្យា\", \"ប្រវិត្តវិទ្យា\", \"វប្បធម៌ទូទៅ\"]}', NULL, '2023-09-29 01:51:35', '2023-09-29 01:51:35', NULL, NULL, 1),
(2, '{\"name\": \"Test\", \"phone\": \"23\", \"gender\": \"Male\", \"talent\": [\"គីមីវិទ្យា\", \"មូលដ្ឋានគ្រឹះភាសាបារាំង (កំរិតមធ្យម)\", \"វប្បធម៌ទូទៅ\"]}', NULL, '2023-09-29 01:53:41', '2023-09-29 01:53:41', NULL, NULL, 1),
(3, '{\"name\": \"Test1\", \"phone\": \"23\", \"gender\": \"Male\", \"talent\": [\"ប្រវិត្តវិទ្យា\", \"រឿងនិទាន\"]}', NULL, '2023-09-29 02:00:35', '2023-09-29 02:00:35', NULL, NULL, 1),
(4, '{\"name\": \"ទន់​ ចាន់ទី\", \"phone\": \"០៨៧៨៨១៤២៧\", \"gender\": \"Male\", \"talent\": [\"គីមីវិទ្យា\", \"ផែនដីវិទ្យា\", \"រឿងនិទាន\"]}', NULL, '2023-09-29 03:54:23', '2023-09-29 03:54:23', NULL, NULL, 1),
(5, '{\"name\": \"2\", \"phone\": \"2\", \"gender\": \"Male\", \"talent\": [\"គីមីវិទ្យា\", \"រឿងនិទាន\"]}', NULL, '2023-09-30 10:29:05', '2023-09-30 10:29:05', NULL, NULL, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_05_29_085733_create_types_table', 1),
(4, '2022_05_29_100808_create_schools_table', 1),
(5, '2022_06_25_014154_add_admin_to_users', 1),
(6, '2022_06_25_061621_create_generals_table', 1),
(7, '2022_08_14_040513_create_departments_table', 1),
(8, '2022_10_01_071139_create_subjects_table', 1),
(9, '2023_08_29_022836_create_skills_table', 1),
(10, '2023_09_26_184335_create_skills_table', 2),
(11, '2023_09_26_184902_create_talent_table', 3),
(12, '2023_09_26_185304_create_history_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `newsyouth`
--

DROP TABLE IF EXISTS `newsyouth`;
CREATE TABLE IF NOT EXISTS `newsyouth` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `type_id`, `logo`, `note`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'ភូមិន្ទភ្នំពេញ', 1, 'logo/EDikXLo18ttnfD487OgLvP7Z0sMzpSNXSi8N5TEp.png', '', 0, 0, '2023-09-03 20:06:35', '2023-09-03 20:06:35'),
(2, 'ភូមិន្ទកសិកម្ម', 1, 'logo/dzemDcmuF80GE1cHuXCN765n6nMkYzOxpcv4Vt2c.jpg', '', 0, 0, '2023-09-03 20:08:47', '2023-09-14 08:44:14'),
(3, 'ជាតិគ្រប់គ្រង', 1, 'logo/59BJ80cW10EsvKfhmvzm59O9p5h7QWjSwC7KytW0.png', '', 0, 0, '2023-09-03 20:09:29', '2023-09-14 08:44:38'),
(4, 'វ៉ាន់ដា', 2, 'logo/KE7X3u3eT8WkVtUMZ7loTug7yBxFhKmSfwmSmGtM.png', '', 0, 0, '2023-09-03 20:09:51', '2023-09-03 20:09:51'),
(5, 'បច្ចេកវិទ្យាតិចណូ', 2, 'logo/RlwqfJws5bGIUv04NzVuwE4cb3U81oCQ6gZMdONI.png', '', 0, 0, '2023-09-03 20:10:24', '2023-09-03 20:10:24'),
(6, 'ភាសាបរទេស ភូមិន្ទភ្នំពេញ', 2, 'logo/I2ly6W5Ys5kaN34CCCnuSOLzDvfSu71N1pOEPDmr.png', '', 0, 0, '2023-09-03 20:10:49', '2023-09-14 08:53:11'),
(7, 'បច្ចេកវិទ្យា AI', 3, 'logo/8zM8NGDXQrMJElf6sRWpaaHBJVFC4MAMOfY7KfkB.jpg', '', 0, 0, '2023-09-05 11:26:24', '2023-09-05 11:26:24'),
(8, 'ប្រទេសថៃ ទីក្រុងប៉ាងកក', 3, 'logo/OgokFnm3dON1BM5NPhc1COpukts8RsOkjhzysNc5.jpg', '', 0, 0, '2023-09-05 11:29:18', '2023-09-05 11:29:18'),
(9, 'សហរដ្ឋអាមេរិក (Oxford University)', 3, 'logo/mRd8ucLdughuTAT3yXyfHpAfyfGSn1XOMe4J16lk.jpg', '', 0, 0, '2023-09-05 11:30:38', '2023-09-05 11:30:38'),
(10, 'វិទ្យាសាស្ត្រសុខាភិបាល', 1, 'logo/P1Smw7rjZJG7wvxexqNPuCTYNqG5aWRAZNkfIfyU.png', '', 0, 0, '2023-09-07 19:32:30', '2023-09-14 08:54:26'),
(11, 'ភូមិន្ទនីតិសាស្ត្រ និងវិទ្យាសាស្ត្រសេដ្ឋកិច្ច', 1, 'logo/4icRfpku2wpwW4JDHV5qVDj00Tncu3ARLavWcRpJ.png', '', 0, 0, '2023-09-14 08:49:20', '2023-09-14 08:49:20'),
(12, 'ភូមិន្ទវិចិត្រសិល្បៈ', 1, 'logo/yYbGhnLFy2Lo8LswZk3f03aSRXCtTzyBIH4HJ2Xr.png', '', 0, 0, '2023-09-14 08:49:49', '2023-09-14 08:49:49'),
(13, 'ន័រតុន', 1, 'logo/6czJBn0YENbUb87hvUGUeaLGLsdgReLo06BJWudp.png', '', 0, 0, '2023-09-14 08:50:25', '2023-09-14 08:50:25'),
(14, 'បញ្ញាសាស្ត្រ', 1, 'logo/aSZmS1eJ9D6VKA4WTBQ0q24LxvHoVAlYdOiQR74n.png', '', 0, 0, '2023-09-14 08:50:52', '2023-09-14 08:50:52'),
(15, 'បៀលប្រាយ', 1, 'logo/PGl8dR9iHYfp61y0ZUDaimhqI0Hdlk4hqohNH8y2.png', '', 0, 0, '2023-09-14 08:51:16', '2023-09-14 08:51:16'),
(16, 'អាស៊ី អឺរ៉ុប', 1, 'logo/ApJpm9jUcEkJ1sDI6wXuxpOsWQhaE6AGk4ybamhf.png', '', 0, 0, '2023-09-14 08:51:42', '2023-09-14 08:51:42'),
(17, 'ជាតិពាណិជ្ជសាស្ត្រ', 2, 'logo/mS2PSWtJqcGTChk53akLiLb1WsttuHxsPZD91Ekv.png', '', 0, 0, '2023-09-14 08:54:07', '2023-09-14 08:54:07'),
(18, 'ណិបតិច', 2, 'logo/s147RVFCVx5gKE0OpJpDgEUZTPRSguVCievKvjKH.png', '', 0, 0, '2023-09-14 08:55:23', '2023-09-14 08:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `talent_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `created_by` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `talent_id`, `status`, `deleted_at`, `created_at`, `updated_at`, `deleted_by`, `updated_by`, `created_by`) VALUES
(1, 'IT', '2', 1, NULL, '2023-10-18 21:14:59', '2023-10-18 21:23:41', NULL, 1, 1),
(2, 'HR', '1', 1, NULL, '2023-10-18 21:28:28', '2023-10-18 21:28:52', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'KHMER', 1, '2023-09-27 01:15:48', '2023-09-27 01:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `talent`
--

DROP TABLE IF EXISTS `talent`;
CREATE TABLE IF NOT EXISTS `talent` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_object` json DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `created_by` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talent`
--

INSERT INTO `talent` (`id`, `name`, `data_object`, `status`, `deleted_at`, `created_at`, `updated_at`, `deleted_by`, `updated_by`, `created_by`) VALUES
(1, 'វប្បធម៌ទូទៅ', NULL, 1, NULL, '2023-09-27 14:43:45', '2023-09-27 15:49:00', NULL, 1, 1),
(2, 'ពលរដ្ឋ និងសីលធម៌', NULL, 1, NULL, '2023-09-27 14:43:59', '2023-10-02 05:13:33', NULL, 1, 1),
(3, 'ភាសាខ្មែរ', NULL, 1, NULL, '2023-09-27 14:44:16', '2023-10-02 05:12:13', NULL, 1, 1),
(4, 'រូបវិទ្យា', NULL, 1, NULL, '2023-09-27 15:50:12', '2023-10-02 05:13:16', NULL, 1, 1),
(5, 'គណិតវិទ្យា', NULL, 1, NULL, '2023-09-27 15:50:36', '2023-10-02 05:11:44', NULL, 1, 1),
(6, 'គីមីវិទ្យា', NULL, 1, NULL, '2023-09-29 03:50:42', '2023-10-02 05:12:42', NULL, 1, 1),
(7, 'មូលដ្ឋានគ្រឹះភាសាអង់គ្លេស', NULL, 1, NULL, '2023-10-02 05:14:22', '2023-10-02 05:14:22', NULL, NULL, 1),
(8, 'មូលដ្ឋានគ្រឹះភាសាជប៉ុន', NULL, 1, NULL, '2023-10-02 05:14:38', '2023-10-02 05:14:38', NULL, NULL, 1),
(9, 'មូលដ្ឋានគ្រឹះភាសាចិន', NULL, 1, NULL, '2023-10-02 05:15:04', '2023-10-02 05:15:04', NULL, NULL, 1),
(10, 'យល់ដឹងអំពីបរិស្ថាន', NULL, 1, NULL, '2023-10-02 05:15:18', '2023-10-02 05:15:18', NULL, NULL, 1),
(11, 'ប្រព័ន្ធអ៊ីនធើណេត', NULL, 1, NULL, '2023-10-02 05:15:44', '2023-10-02 05:15:44', NULL, NULL, 1),
(12, 'បច្ចេកវិទ្យា', NULL, 1, NULL, '2023-10-02 05:15:58', '2023-10-02 05:15:58', NULL, NULL, 1),
(13, 'យល់ដឹងអំពីកុំព្យូទ័រ', NULL, 1, NULL, '2023-10-02 05:16:13', '2023-10-02 05:16:13', NULL, NULL, 1),
(14, 'ថតកុន និងប្រព័ន្ធផ្សព្វផ្សាយ', NULL, 1, NULL, '2023-10-02 05:16:33', '2023-10-02 05:16:33', NULL, NULL, 1),
(15, 'របៀបបិទបញ្ជី', NULL, 1, NULL, '2023-10-02 05:16:48', '2023-10-02 05:16:48', NULL, NULL, 1),
(16, 'បង្កើតកម្មវិធីថ្មី', NULL, 1, NULL, '2023-10-02 05:17:05', '2023-10-02 05:17:05', NULL, NULL, 1),
(17, 'ជួសជុលអេឡិចត្រូនិច', NULL, 1, NULL, '2023-10-02 05:17:32', '2023-10-02 05:17:32', NULL, NULL, 1),
(18, 'យល់ដឹងអំពីច្បាប់', NULL, 1, NULL, '2023-10-02 05:17:50', '2023-10-02 05:17:50', NULL, NULL, 1),
(19, 'គ្រប់គ្រងវិស័យសាធារណៈ', NULL, 1, NULL, '2023-10-02 05:18:08', '2023-10-02 05:18:08', NULL, NULL, 1),
(20, 'ផ្នែកវេជ្ជសាស្ត្រ', NULL, 1, NULL, '2023-10-02 05:18:23', '2023-10-02 05:18:23', NULL, NULL, 1),
(21, 'ផ្នែកទន្តសាស្ត្រ', NULL, 1, NULL, '2023-10-02 05:18:39', '2023-10-02 05:18:39', NULL, NULL, 1),
(22, 'គម្រោងស្ថាបត្យកម្ម ការសាង', NULL, 1, NULL, '2023-10-02 05:18:55', '2023-10-02 05:18:55', NULL, NULL, 1),
(23, 'គូសគំនូរ (2D) (3D)', NULL, 1, NULL, '2023-10-02 05:19:11', '2023-10-02 05:19:11', NULL, NULL, 1),
(24, 'ផលិតផលកសិឧស្សាហកម្ម', NULL, 1, NULL, '2023-10-02 05:19:32', '2023-10-02 05:19:32', NULL, NULL, 1),
(25, 'គ្រប់គ្រងការដ្ឋានសំណង់', NULL, 1, NULL, '2023-10-02 05:19:49', '2023-10-02 05:19:49', NULL, NULL, 1),
(26, 'បច្ចេកវិទ្យាអគ្គិសនី', NULL, 1, NULL, '2023-10-02 05:20:10', '2023-10-02 05:20:10', NULL, NULL, 1),
(27, 'គ្រប់គ្រង និងជ្រើសរើសបុគ្គលិក', NULL, 1, NULL, '2023-10-02 05:20:27', '2023-10-02 05:20:27', NULL, NULL, 1),
(28, 'គណនេយ្យ បង់ពន្ធ', NULL, 1, NULL, '2023-10-02 05:20:43', '2023-10-02 05:20:43', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'សាកលវិទ្យាល័យ', NULL, NULL),
(2, 'វិទ្យាស្ថាន', NULL, NULL),
(3, 'អាហាររូបករណ៍', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `disabled`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'admin', '$2a$10$hlkHd0WsCx70k3YfVgVIgezFDg4rDaQgcboxcqVerPdssIq3p9XlG', 0, NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

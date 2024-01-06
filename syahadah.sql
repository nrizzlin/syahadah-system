-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 04:35 PM
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
-- Database: `syahadah`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_mualaf`
--

CREATE TABLE `assigned_mualaf` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mentor_id` bigint(20) UNSIGNED NOT NULL,
  `mualaf_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_mualaf`
--

INSERT INTO `assigned_mualaf` (`id`, `mentor_id`, `mualaf_id`, `created_at`, `updated_at`) VALUES
(1, 5, 8, '2024-01-06 02:26:49', '2024-01-06 02:26:49'),
(2, 7, 8, '2024-01-06 02:26:55', '2024-01-06 02:26:55'),
(3, 5, 6, '2024-01-06 02:27:03', '2024-01-06 02:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `clockIn` timestamp NULL DEFAULT NULL,
  `clockOut` timestamp NULL DEFAULT NULL,
  `tasks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tasks`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `clockIn`, `clockOut`, `tasks`, `created_at`, `updated_at`) VALUES
(1, 5, '2024-01-06 04:14:22', '2024-01-06 04:15:01', '[\"Meeting up with Mualaf\",\"Add new journal\"]', '2024-01-06 04:14:22', '2024-01-06 04:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `daily_progress`
--

CREATE TABLE `daily_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `question_topic` varchar(255) DEFAULT NULL,
  `question_desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_progress`
--

INSERT INTO `daily_progress` (`id`, `title`, `description`, `date`, `attachment`, `status`, `question_topic`, `question_desc`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Meet the Mentor', 'try to discuss about my issue', '2024-01-19 19:34:00', '1704540885.word', 'Moderate', 'Perkawinan', 'why the maximum of marriage only 4 ?', '2024-01-06 03:34:45', '2024-01-06 03:34:45', 6);

-- --------------------------------------------------------

--
-- Table structure for table `evaluated_mualafs`
--

CREATE TABLE `evaluated_mualafs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `performance` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `result_status` varchar(255) DEFAULT 'good',
  `assigned_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluated_mualafs`
--

INSERT INTO `evaluated_mualafs` (`id`, `date`, `performance`, `note`, `result_status`, `assigned_id`, `created_at`, `updated_at`) VALUES
(1, '2024-01-19', 'Undestanding of Faith,Prayer,Learning and Recitation of Al-Quran,Morality and Character,Fasting,Charity', 'Good Performance', 'Good', 1, '2024-01-06 02:28:19', '2024-01-06 02:28:19'),
(2, '2024-01-13', 'Undestanding of Faith,Prayer', 'need to guide more', 'Poor', 3, '2024-01-06 02:28:41', '2024-01-06 02:28:41'),
(3, '2024-01-20', 'Prayer,Learning and Recitation of Al-Quran', 'not believing in faith .', 'Poor', 1, '2024-01-06 02:31:34', '2024-01-06 02:31:34'),
(4, '2024-01-13', 'Undestanding of Faith,Prayer,Learning and Recitation of Al-Quran,Morality and Character,Fasting,Charity,Connection with Muslim Community,Continue Learning,Lifestyle Choice,Personal Reflection', 'good performance', 'Excellent', 2, '2024-01-06 02:32:54', '2024-01-06 02:32:54'),
(5, '2024-01-11', 'Undestanding of Faith,Prayer,Learning and Recitation of Al-Quran,Morality and Character,Fasting,Charity', 'progress pergormance of ahchong is good', 'Good', 2, '2024-01-06 02:33:34', '2024-01-06 02:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `title`, `description`, `date`, `place`, `status`, `attachment`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Reflecting on Today\\\'s Session', 'Had a productive mentoring session with the mualaf. Discussed challenges and set goals for the upcoming weeks', '2024-01-04 19:27:00', 'Virtual Meeting', 'Good', '1704540734.word', '2024-01-06 03:32:14', '2024-01-06 03:32:14', 5),
(2, 'Reflecting on Today\\\'s Session', 'Had a productive mentoring session with the mualaf. Discussed challenges and set goals for the upcoming weeks', '2024-01-04 19:27:00', 'Virtual Meeting', 'Good', '1704540736.word', '2024-01-06 03:32:16', '2024-01-06 03:32:16', 5);

-- --------------------------------------------------------

--
-- Table structure for table `madus`
--

CREATE TABLE `madus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `issue` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_18_042654_create_journal_table', 1),
(6, '2023_10_18_050232_drop_journal_table', 1),
(7, '2023_10_18_050957_create_journals_table', 1),
(8, '2023_10_31_162644_create_resources_table', 1),
(9, '2023_10_31_162651_create_events_table', 1),
(10, '2023_11_14_073949_create_attendances_table', 1),
(11, '2023_11_18_162303_create_daily_progress_table', 1),
(12, '2023_12_20_152156_create_assigned_mualaf_table', 1),
(13, '2023_12_22_230949_create_specialists_table', 1),
(14, '2023_12_22_232944_add_specialist_id_to_users', 1),
(15, '2023_12_24_154849_create_evaluated_mualaf_table', 1),
(16, '2023_12_24_155621_drop_evaluated_mualaf_table', 1),
(17, '2023_12_25_072833_create_evaluated_mualafs_table', 1),
(18, '2023_12_25_123604_add_category_to_resources_table', 1),
(19, '2023_12_25_145210_create_madus_table', 1),
(20, '2023_12_29_132041_add_last_seen_to_users_table', 1),
(21, '2024_01_06_115301_change_description_datatype_in_events_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `description`, `attachment`, `user_id`, `created_at`, `updated_at`, `category`) VALUES
(1, 'Turkey expresses outrage after far-right politician burns a Quran', 'Learn More in attachment', '1704542530.pdf', 3, '2024-01-06 04:02:10', '2024-01-06 04:12:21', 'Doa');

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Solat', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(2, 'Doa', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(3, 'Al-Quran', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(4, 'Hadith', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(5, 'Fiqh', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(6, 'Fasting', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(7, 'Zakat', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(8, 'Hajj', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(9, 'Dawah', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(10, 'Islamic History', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(11, 'Islamic Ethics and Morality', '2024-01-06 01:45:58', '2024-01-06 01:45:58'),
(12, 'Islamic Art and Architecture', '2024-01-06 01:45:58', '2024-01-06 01:45:58');

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
  `usertype` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` int(10) UNSIGNED DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `previous_religion` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `facebook_page` varchar(255) DEFAULT NULL,
  `syahadah_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `specialist_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `usertype`, `gender`, `age`, `country`, `city`, `previous_religion`, `phone_number`, `facebook_page`, `syahadah_date`, `status`, `remember_token`, `created_at`, `updated_at`, `specialist_id`, `last_seen`) VALUES
(3, 'Nur Izzlin', 'admin@gmail.com', '2024-01-06 01:45:57', '$2y$10$7HbllzP5.byr1p5T6B03k.jUZNocv.RDyoUsh8ny91XrpRp5lXQxK', 'admin', 'female', 27, 'Malaysia', 'Kuala Lumpur', NULL, '0174741431', 'MRM Volunteer', NULL, 'active', '3U16Yo1dJldSdKumvXBhSzNS3rcuQsl3uoD5cET7PN9ZT2kQdKh8G4C32bxU', '2024-01-06 01:45:57', '2024-01-06 07:35:05', 4, '2024-01-06 07:35:05'),
(4, 'Azlina Zainuddin', 'daie@gmail.com', '2024-01-06 01:45:57', '$2y$10$6T30ikf9snhxHmHq.BQT4ODZV0az/NQQToQLAxD6bRyy0e5dprbPq', 'daie', 'female', 40, 'Malaysia', 'Kuala Lumpur', NULL, '0187849536', 'azlinPage', NULL, 'active', 'it1mdP53T1phsdKyHG311UE1n67FIRFTSb2l5wbApxeWiEaq6VqnhTB8NLNh', '2024-01-06 01:45:57', '2024-01-06 02:26:19', 7, '2024-01-06 02:26:19'),
(5, 'Zainul Abidin', 'mentor@gmail.com', '2024-01-06 01:45:58', '$2y$10$6MIfwxvk1JIutXnFp9.7/OFrSFgIlomi973WUx2I0xZZwP1Rp3oYW', 'mentor', 'male', 29, 'Malaysia', 'Kuala Lumpur', NULL, '0198734596', 'Bidin Zaifa', NULL, 'active', 'idYKA59ngiDafFl50S3rdKbyNZgf0uFtTHK57kzmacaf9G6guQbCCMRMxHOd', '2024-01-06 01:45:58', '2024-01-06 04:15:11', 10, '2024-01-06 04:15:11'),
(6, 'Jeremy Lau', 'mualaf@gmail.com', '2024-01-06 01:45:58', '$2y$10$CQfqyY8J3bxzPrDLI7w45e/EksRCCHNmmOhDtU5Xdf3o7Rdox3S6y', 'mualaf', 'male', 30, 'Malaysia', 'Ampang', 'Christian', '0178495873', 'JLau Page', '2022-12-27', 'active', 'wOU1DHfOsCrnKcxylAuUwSt8VfOwMwOnjGaY0OWZFHKNmNUksR6EGUVIAfpF', '2024-01-06 01:45:58', '2024-01-06 03:34:54', NULL, '2024-01-06 03:34:54'),
(7, 'Azhar Sabri', 'daietest@gmail.com', '2024-01-06 01:45:58', '$2y$10$Ki4FgDt9IW9tJGPB/99Np.g/aSQ.swV0e.czNPAuvCUYn36JRpR8.', 'daie,mentor', 'male', 45, 'Malaysia', 'Petaling Jaya', NULL, '0129893456', 'Ustaz Azhar', NULL, 'active', 'rxY475HEBOQhybsT6vifoDyKZHgHlrSDxKcgXBnkO4iyWlQFgOweXKFl6kvt', '2024-01-06 01:45:58', '2024-01-06 02:33:44', 3, '2024-01-06 02:33:44'),
(8, 'Ah chong', 'mualaftest@gmail.com', NULL, '$2y$10$WLuD/YQDplg1wtfLD/bLs.yghj6ZwnNE9ef9MdK1JCIDwsgUWPxeK', 'mualaf', 'male', 35, 'China', 'China', 'kristian', '0129706544', 'Ahchong page', '2024-01-17', 'active', NULL, '2024-01-06 02:26:11', '2024-01-06 02:26:11', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_mualaf`
--
ALTER TABLE `assigned_mualaf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_mualaf_mentor_id_foreign` (`mentor_id`),
  ADD KEY `assigned_mualaf_mualaf_id_foreign` (`mualaf_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`);

--
-- Indexes for table `daily_progress`
--
ALTER TABLE `daily_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_progress_user_id_foreign` (`user_id`);

--
-- Indexes for table `evaluated_mualafs`
--
ALTER TABLE `evaluated_mualafs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluated_mualafs_assigned_id_foreign` (`assigned_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journals_user_id_foreign` (`user_id`);

--
-- Indexes for table `madus`
--
ALTER TABLE `madus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `madus_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resources_user_id_foreign` (`user_id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_specialist_id_foreign` (`specialist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_mualaf`
--
ALTER TABLE `assigned_mualaf`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daily_progress`
--
ALTER TABLE `daily_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluated_mualafs`
--
ALTER TABLE `evaluated_mualafs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `madus`
--
ALTER TABLE `madus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_mualaf`
--
ALTER TABLE `assigned_mualaf`
  ADD CONSTRAINT `assigned_mualaf_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assigned_mualaf_mualaf_id_foreign` FOREIGN KEY (`mualaf_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `daily_progress`
--
ALTER TABLE `daily_progress`
  ADD CONSTRAINT `daily_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluated_mualafs`
--
ALTER TABLE `evaluated_mualafs`
  ADD CONSTRAINT `evaluated_mualafs_assigned_id_foreign` FOREIGN KEY (`assigned_id`) REFERENCES `assigned_mualaf` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `journals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `madus`
--
ALTER TABLE `madus`
  ADD CONSTRAINT `madus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

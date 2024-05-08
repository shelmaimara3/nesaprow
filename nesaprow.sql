-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2024 at 01:56 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nesaprow`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 'html', 'icons/A8B7yIdJyu7DEjDJbrR4AyFl3ELDTbGnrycGqp36.png', NULL, '2024-05-02 22:39:05', '2024-05-03 06:06:58'),
(2, 'CSS', 'css', 'icons/RqmmQXt9MjNedTOlYIFMQaS3rpCOkkAD4bqmODta.svg', NULL, '2024-05-02 22:39:05', '2024-05-03 06:06:32'),
(3, 'JAVASCRIPT', 'javascript', 'icons/tIFyoInkcVLzvNmHqQYxKTAvSg8Ms52m3yOqdsVq.svg', NULL, '2024-05-02 22:39:05', '2024-05-03 06:06:22'),
(4, 'POST TEST', 'post-test', 'icons/GUtXIQIQktm6QLJOkVkPyec76etgLCmENEc9qxZA.svg', NULL, '2024-05-02 22:39:05', '2024-05-03 06:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `path_trailer` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `slug`, `path_trailer`, `about`, `cover`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Struktur Dasar Dokumen HTML', 'struktur-dasar-dokumen-html', 'iFw-AB4iAnQ', 'HTML kepanjangan dari HyperText Markup Language', 'product_covers/Mxk4zReGpHBu1SpdvumNNC2EQtgJhvR4cLKHkNW9.png', 1, NULL, '2024-05-03 06:09:57', '2024-05-03 06:09:57'),
(2, 'Latihan Studi Kasus CSS', 'latihan-studi-kasus-css', '-B17ATAt9vA', 'CSS adalah Cascading Style Sheet', 'product_covers/Nx5v7uCwYPIVVekjEZNSOFciehM1RSV9qR4N3Uzs.png', 2, NULL, '2024-05-03 06:12:24', '2024-05-03 06:12:24'),
(3, 'Konsep Bahasa Pemrograman Javascript', 'konsep-bahasa-pemrograman-javascript', 'sNLadea-tLU', 'JavaScript (JS) adalah bahasa pemrograman tingkat tinggi yang digunakan untuk mengembangkan website interaktif dan dinamis.', 'product_covers/uDyTOmOLTXkqVROyQgGRAsEwngtUxhIQmv0kbVzy.png', 3, NULL, '2024-05-03 06:13:01', '2024-05-06 03:09:05'),
(4, 'Post Test', 'post-test', 'W6NZfCO5SIk', 'Tes untuk mengukur kemampuan kognitif', 'product_covers/hsTB6QAEQrFU1HbDzkp4luR8qegPxZAtSoOhmR0T.png', 4, NULL, '2024-05-03 06:17:58', '2024-05-03 06:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `course_answers`
--

CREATE TABLE `course_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `answer` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `course_question_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `course_answers`
--

INSERT INTO `course_answers` (`id`, `answer`, `is_correct`, `course_question_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 0, 1, NULL, '2024-05-06 04:30:22', '2024-05-06 04:30:22'),
(2, '2', 0, 1, NULL, '2024-05-06 04:30:22', '2024-05-06 04:30:22'),
(3, '3', 0, 1, NULL, '2024-05-06 04:30:22', '2024-05-06 04:30:22'),
(4, '4', 1, 1, NULL, '2024-05-06 04:30:22', '2024-05-06 04:30:22'),
(5, '5', 0, 1, NULL, '2024-05-06 04:30:22', '2024-05-06 04:30:22'),
(6, '5', 0, 2, NULL, '2024-05-06 04:30:41', '2024-05-06 04:30:41'),
(7, '4', 0, 2, NULL, '2024-05-06 04:30:41', '2024-05-06 04:30:41'),
(8, '3', 0, 2, NULL, '2024-05-06 04:30:41', '2024-05-06 04:30:41'),
(9, '2', 1, 2, NULL, '2024-05-06 04:30:41', '2024-05-06 04:30:41'),
(10, '1', 0, 2, NULL, '2024-05-06 04:30:41', '2024-05-06 04:30:41'),
(11, '1', 0, 3, NULL, '2024-05-06 04:33:11', '2024-05-06 04:33:11'),
(12, '2', 0, 3, NULL, '2024-05-06 04:33:11', '2024-05-06 04:33:11'),
(13, '3', 0, 3, NULL, '2024-05-06 04:33:11', '2024-05-06 04:33:11'),
(14, '4', 1, 3, NULL, '2024-05-06 04:33:11', '2024-05-06 04:33:11'),
(15, '5', 0, 3, NULL, '2024-05-06 04:33:11', '2024-05-06 04:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `course_keypoints`
--

CREATE TABLE `course_keypoints` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_moduls`
--

CREATE TABLE `course_moduls` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_modul` varchar(255) NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `course_moduls`
--

INSERT INTO `course_moduls` (`id`, `name`, `path_modul`, `course_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Materi Javascript', 'public/modul/Isi Validasi Materi Pembelajaran Pemrograman Web kls 11 RPL.pdf', 3, NULL, '2024-05-05 22:42:59', '2024-05-05 22:42:59'),
(2, 'Ini coba upload', 'public/modul/laporan-validasi print.pdf', 3, '2024-05-05 22:50:46', '2024-05-05 22:46:58', '2024-05-05 22:50:46'),
(3, 'Materi Javascript 2', 'public/modul/Modul Ajar kelas 11 fase F fix.pdf', 3, NULL, '2024-05-05 23:30:15', '2024-05-05 23:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `course_questions`
--

CREATE TABLE `course_questions` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `course_questions`
--

INSERT INTO `course_questions` (`id`, `question`, `course_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Coba tes', 4, '2024-05-06 04:32:55', '2024-05-06 04:30:22', '2024-05-06 04:32:55'),
(2, 'tes 2', 4, '2024-05-06 04:32:53', '2024-05-06 04:30:41', '2024-05-06 04:32:53'),
(3, 'coba lagi', 4, NULL, '2024-05-06 04:33:11', '2024-05-06 04:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `course_students`
--

CREATE TABLE `course_students` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `course_students`
--

INSERT INTO `course_students` (`id`, `user_id`, `course_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(3, 2, 3, NULL, NULL, NULL),
(4, 2, 4, NULL, NULL, NULL),
(5, 1, 2, NULL, NULL, NULL),
(6, 1, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_videos`
--

CREATE TABLE `course_videos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_video` varchar(255) NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `course_videos`
--

INSERT INTO `course_videos` (`id`, `name`, `path_video`, `course_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Belajar Dasar Dokumen HTML', 'iFw-AB4iAnQ', 1, NULL, '2024-05-03 06:10:21', '2024-05-03 06:10:21'),
(2, 'Instalasi Bootstrap', 'pJpnMyFNaz0', 2, NULL, '2024-05-03 06:13:51', '2024-05-03 06:13:51'),
(3, 'Studi Kasus CSS', '-B17ATAt9vA', 2, NULL, '2024-05-03 06:14:37', '2024-05-03 06:14:37'),
(4, 'Konsep Bahasa Pemrograman Javascript', 'W6NZfCO5SIk', 3, NULL, '2024-05-03 06:15:47', '2024-05-03 06:15:47'),
(5, 'Belajar Javascript [Dasar] - Apa itu Javascript?', 'sNLadea-tLU', 3, NULL, '2024-05-06 03:08:29', '2024-05-06 03:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '0001_01_01_000000_create_users_table', 1),
(39, '0001_01_01_000001_create_cache_table', 1),
(40, '0001_01_01_000002_create_jobs_table', 1),
(41, '2024_04_23_034134_create_permission_tables', 1),
(42, '2024_04_23_071459_create_categories_table', 1),
(43, '2024_04_23_071535_create_courses_table', 1),
(44, '2024_04_23_071602_create_course_students_table', 1),
(45, '2024_04_23_071654_create_course_questions_table', 1),
(46, '2024_04_23_071721_create_course_answers_table', 1),
(47, '2024_04_23_071750_create_student_answers_table', 1),
(48, '2024_04_23_071843_create_course_videos_table', 1),
(49, '2024_04_23_071908_create_course_keypoints_table', 1),
(50, '2024_04_23_072114_create_teachers_table', 1),
(51, '2024_05_02_133312_create_students_table', 1),
(52, '2024_05_03_035414_create_occupations_table', 1),
(53, '2024_05_03_043824_create_project_students_table', 1),
(54, '2024_05_06_041506_create_course_moduls_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Project Manager', NULL, '2024-05-02 22:39:05', '2024-05-02 22:39:05'),
(2, 'Developer', NULL, '2024-05-02 22:39:05', '2024-05-02 22:39:05'),
(3, 'Quality Assurance', NULL, '2024-05-02 22:39:05', '2024-05-02 22:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view courses', 'web', '2024-05-02 22:39:04', '2024-05-02 22:39:04'),
(2, 'create courses', 'web', '2024-05-02 22:39:04', '2024-05-02 22:39:04'),
(3, 'edit courses', 'web', '2024-05-02 22:39:04', '2024-05-02 22:39:04'),
(4, 'delete courses', 'web', '2024-05-02 22:39:04', '2024-05-02 22:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `project_students`
--

CREATE TABLE `project_students` (
  `id` bigint UNSIGNED NOT NULL,
  `name_team` varchar(255) NOT NULL,
  `title_project` varchar(255) NOT NULL,
  `desc_project` text NOT NULL,
  `proof_project` varchar(255) NOT NULL,
  `deadline` date DEFAULT NULL,
  `is_done` tinyint(1) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `occupation_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `project_students`
--

INSERT INTO `project_students` (`id`, `name_team`, `title_project`, `desc_project`, `proof_project`, `deadline`, `is_done`, `user_id`, `occupation_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Kelompok 1', 'Proyek Web Kalkulator', 'Proyek Web Kalkulator', 'project_students/BfUNn17x7iOHzHtH1SJywzPobfpc8q3W2YNxpH9s.zip', '2024-05-06', 1, 2, 1, NULL, '2024-05-03 02:19:00', '2024-05-05 23:39:17'),
(2, 'Kelompok 1', 'Proyek Web Kalkulator', 'Proyek Web Kalkulator', 'project_students/z8gheOQ3eKpv2khyE6ZlmUzKPCLSk3ektpRAKX4n.zip', '2024-05-06', 1, 2, 1, NULL, '2024-05-03 02:20:04', '2024-05-03 05:24:14'),
(6, 'Kelompok 2', 'Proyek Web Music Store', 'Proyek Web Music Store', 'project_students/gZJxmKWQEiXldtfSEyyERqFRnETBoJFsFEklmzXK.zip', '2024-05-06', 1, 2, 2, NULL, '2024-05-03 02:23:38', '2024-05-03 05:34:26'),
(8, 'Kelompok 5', 'Proyek Web Calculator', 'Proyek Web Calculator', 'public/project_students/WebCalculator.zip', '2024-05-09', 1, 2, 3, NULL, '2024-05-05 20:36:42', '2024-05-05 23:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'teacher', 'web', '2024-05-02 22:39:04', '2024-05-02 22:39:04'),
(2, 'student', 'web', '2024-05-02 22:39:04', '2024-05-02 22:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QXKsH7fgdr34tvnyTk2p5JVI9irCAzEogoD3iYvd', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRnRab3JJejlaemZ4T2JEU1VFWFpsbGZhcURNb0U2ODJRbmZZQUxTcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvc3R1ZGVudHMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1715017077);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE `student_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `answer` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `course_question_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student_answers`
--

INSERT INTO `student_answers` (`id`, `answer`, `user_id`, `course_question_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'wrong', 2, 1, NULL, '2024-05-06 04:31:35', '2024-05-06 04:31:35'),
(2, 'correct', 2, 2, NULL, '2024-05-06 04:31:39', '2024-05-06 04:31:39'),
(3, 'wrong', 2, 3, NULL, '2024-05-06 04:34:05', '2024-05-06 04:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shelma Bakir', 'images/photos/default-photo.svg', 'shelma@owner.com', NULL, '$2y$12$xdV7VvOyT2EZJoP7Yu0QVuT01Sqz.Vi2UxtRFQ8cnKk2iPRd4RiaW', NULL, '2024-05-02 22:39:05', '2024-05-02 22:39:05'),
(2, 'Navyyah', 'avatars/p3uSv6KagdvoXVcSnr207wff83PZRx7TQvHDlADD.png', 'navy@gmail.com', NULL, '$2y$12$occmV2stj2E/2JkY.asX8e3xAF9XohatWgS.04YwBQboc79tbyyJi', NULL, '2024-05-02 23:17:30', '2024-05-02 23:17:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`);

--
-- Indexes for table `course_answers`
--
ALTER TABLE `course_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_answers_course_question_id_foreign` (`course_question_id`);

--
-- Indexes for table `course_keypoints`
--
ALTER TABLE `course_keypoints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_keypoints_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_moduls`
--
ALTER TABLE `course_moduls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_moduls_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_questions`
--
ALTER TABLE `course_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_questions_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_students`
--
ALTER TABLE `course_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_students_user_id_foreign` (`user_id`),
  ADD KEY `course_students_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_videos_course_id_foreign` (`course_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `project_students`
--
ALTER TABLE `project_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_students_user_id_foreign` (`user_id`),
  ADD KEY `project_students_occupation_id_foreign` (`occupation_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_answers_user_id_foreign` (`user_id`),
  ADD KEY `student_answers_course_question_id_foreign` (`course_question_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_answers`
--
ALTER TABLE `course_answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course_keypoints`
--
ALTER TABLE `course_keypoints`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_moduls`
--
ALTER TABLE `course_moduls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_questions`
--
ALTER TABLE `course_questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_students`
--
ALTER TABLE `course_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_videos`
--
ALTER TABLE `course_videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `occupations`
--
ALTER TABLE `occupations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_students`
--
ALTER TABLE `project_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_answers`
--
ALTER TABLE `course_answers`
  ADD CONSTRAINT `course_answers_course_question_id_foreign` FOREIGN KEY (`course_question_id`) REFERENCES `course_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_keypoints`
--
ALTER TABLE `course_keypoints`
  ADD CONSTRAINT `course_keypoints_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_moduls`
--
ALTER TABLE `course_moduls`
  ADD CONSTRAINT `course_moduls_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_questions`
--
ALTER TABLE `course_questions`
  ADD CONSTRAINT `course_questions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_students`
--
ALTER TABLE `course_students`
  ADD CONSTRAINT `course_students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD CONSTRAINT `course_videos_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_students`
--
ALTER TABLE `project_students`
  ADD CONSTRAINT `project_students_occupation_id_foreign` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD CONSTRAINT `student_answers_course_question_id_foreign` FOREIGN KEY (`course_question_id`) REFERENCES `course_questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

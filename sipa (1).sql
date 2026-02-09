-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2026 at 12:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipa`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `activity`, `created_at`, `updated_at`) VALUES
(1, 1, 'create', 'Membuat kategori (ID: 1)', '2026-02-09 07:41:51', '2026-02-09 07:41:51'),
(2, 1, 'update', 'Memperbarui alat (ID: 1): Description berubah dari \'\' menjadi \'res\'', '2026-02-09 08:03:00', '2026-02-09 08:03:00'),
(3, 1, 'update', 'Memperbarui alat (ID: 1): Description berubah dari \'res\' menjadi \'2 Controller + Kabel (HDMI,Power,Stik)\'', '2026-02-09 08:03:18', '2026-02-09 08:03:18'),
(4, 1, 'create', 'Membuat alat (ID: 2)', '2026-02-09 08:04:56', '2026-02-09 08:04:56'),
(5, 1, 'update', 'Memperbarui alat (ID: 2): Name berubah dari \'eqw\' menjadi \'PS 4 (Dengan TV)\', Code berubah dari \'we\' menjadi \'PS-004T\', Price per day berubah dari \'123\' menjadi \'150000\', Description berubah dari \'2asd\' menjadi \'2 Controller + Kabel(HDMI,Power,Stick)\'', '2026-02-09 08:06:05', '2026-02-09 08:06:05'),
(6, 1, 'update', 'Memperbarui alat (ID: 1): Price per day berubah dari \'100000\' menjadi \'120000\'', '2026-02-09 08:11:32', '2026-02-09 08:11:32'),
(7, 1, 'update', 'Memperbarui alat (ID: 2): Price per day berubah dari \'150000\' menjadi \'170000\'', '2026-02-09 08:11:37', '2026-02-09 08:11:37'),
(8, 1, 'create', 'Membuat user (ID: 2)', '2026-02-09 08:20:24', '2026-02-09 08:20:24'),
(9, 1, 'create', 'Membuat data peminjaman (ID: 1)', '2026-02-09 08:31:33', '2026-02-09 08:31:33'),
(10, 1, 'create', 'Membuat data peminjaman (ID: 2)', '2026-02-09 09:06:22', '2026-02-09 09:06:22'),
(11, 1, 'create', 'Membuat data peminjaman (ID: 3)', '2026-02-09 09:19:22', '2026-02-09 09:19:22'),
(12, 1, 'create', 'Membuat user (ID: 3)', '2026-02-09 09:32:28', '2026-02-09 09:32:28'),
(13, 1, 'update', 'Memperbarui peminjaman (ID: 3): Due date berubah dari \'2026-02-28\' menjadi \'2026-02-14\'', '2026-02-09 09:35:38', '2026-02-09 09:35:38'),
(14, 1, 'update', 'Memperbarui peminjaman (ID: 3): Due date berubah dari \'2026-02-14\' menjadi \'2026-02-15\', Total price berubah dari \'1920000\' menjadi \'360000\'', '2026-02-09 09:37:39', '2026-02-09 09:37:39'),
(15, 3, 'update', 'Memperbarui alat (ID: 1): Stock berubah dari \'10\' menjadi \'9\'', '2026-02-09 09:56:01', '2026-02-09 09:56:01'),
(16, 3, 'update', 'Memperbarui peminjaman (ID: 3): Status berubah dari \'Menunggu Persetujuan\' menjadi \'Sedang Dipinjam\'', '2026-02-09 09:56:01', '2026-02-09 09:56:01'),
(17, 2, 'create', 'Membuat data peminjaman (ID: 4)', '2026-02-09 10:41:09', '2026-02-09 10:41:09'),
(18, 3, 'update', 'Memperbarui alat (ID: 2): Stock berubah dari \'10\' menjadi \'9\'', '2026-02-09 10:41:46', '2026-02-09 10:41:46'),
(19, 3, 'update', 'Memperbarui peminjaman (ID: 4): Status berubah dari \'Menunggu Persetujuan\' menjadi \'Sedang Dipinjam\', Pay price berubah dari \'\' menjadi \'280\'', '2026-02-09 10:41:46', '2026-02-09 10:41:46'),
(20, 3, 'update', 'Memperbarui alat (ID: 2): Stock berubah dari \'9\' menjadi \'8\'', '2026-02-09 10:47:16', '2026-02-09 10:47:16'),
(21, 3, 'update', 'Memperbarui peminjaman (ID: 4): Status berubah dari \'Menunggu Persetujuan\' menjadi \'Sedang Dipinjam\', Pay price berubah dari \'\' menjadi \'2900000\'', '2026-02-09 10:47:16', '2026-02-09 10:47:16'),
(22, 2, 'update', 'Memperbarui peminjaman (ID: 4): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-09 11:00:16', '2026-02-09 11:00:16'),
(23, 2, 'update', 'Memperbarui peminjaman (ID: 3): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-09 11:01:40', '2026-02-09 11:01:40'),
(25, 3, 'update', 'Memperbarui peminjaman (ID: 4): Status berubah dari \'Menunggu Validasi\' menjadi \'Sudah Dikembalikan\'', '2026-02-09 11:15:41', '2026-02-09 11:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Konsol', NULL, '2026-02-09 07:41:51', '2026-02-09 07:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price_per_day` int(11) NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `code`, `category_id`, `price_per_day`, `stock`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'PS 4 (Tanpa Tv)', 'PS-004', 1, 120000, 9, '2 Controller + Kabel (HDMI,Power,Stik)', NULL, '2026-02-09 07:48:57', '2026-02-09 09:56:01'),
(2, 'PS 4 (Dengan TV)', 'PS-004T', 1, 170000, 9, '2 Controller + Kabel(HDMI,Power,Stick)', NULL, '2026-02-09 08:04:56', '2026-02-09 11:15:41');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `received_by` bigint(20) UNSIGNED DEFAULT NULL,
  `loan_date` date NOT NULL,
  `due_date` date NOT NULL,
  `returned_date` datetime DEFAULT NULL,
  `status` enum('canceled','pending','validation','borrowed','returned') NOT NULL DEFAULT 'pending',
  `price_per_day` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `pay_price` int(11) DEFAULT NULL,
  `total_fine` int(11) DEFAULT NULL,
  `pay_fine` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `device_id`, `user_id`, `approved_by`, `received_by`, `loan_date`, `due_date`, `returned_date`, `status`, `price_per_day`, `total_price`, `pay_price`, `total_fine`, `pay_fine`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, '2026-02-09', '2026-02-10', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, '2026-02-09 08:31:33', '2026-02-09 08:31:33'),
(2, 2, 2, NULL, NULL, '2026-02-10', '2026-02-11', NULL, 'pending', 170000, NULL, NULL, NULL, NULL, NULL, '2026-02-09 09:06:22', '2026-02-09 09:06:22'),
(3, 1, 2, 3, NULL, '2026-02-13', '2026-02-15', NULL, 'validation', 120000, 360000, NULL, NULL, NULL, NULL, '2026-02-09 09:19:22', '2026-02-09 11:01:40'),
(4, 2, 2, 3, NULL, '2026-02-04', '2026-02-05', '2026-02-09 18:15:41', 'returned', 170000, 2890000, 2900000, NULL, NULL, NULL, '2026-02-09 10:41:09', '2026-02-09 11:15:41');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_19_073226_create_categories_table', 1),
(5, '2026_01_27_100000_create_devices_table', 1),
(6, '2026_01_27_104146_create_loans_table', 1),
(7, '2026_02_07_090350_create_activity_logs_table', 1);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('b1YrAZ2GI9PvymGIWOsGaqhjWoiHCgMKpQRgsqmk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkxsaXgxT1BTMmhXN1FjTzlXcGF4TG80RFlDODF6bHhyaFZ3eUZLdyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770679774);

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
  `role` enum('admin','officer','borrower') NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone_number`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$pVCMcJzX/UR3w0ewG2tZ.uYdIbtRfCIO2TIwQrsSgdxK2yFAXu0Xy', 'admin', '081234567890', NULL, NULL, NULL, NULL),
(2, 'User', 'user@mail.com', NULL, '$2y$12$4Z/H5mWW6rfHvMdNV8buseBy7ux0TIdYooszBid0f3Fk8Bptcez4O', 'borrower', '0812331232', NULL, '2026-02-09 08:20:24', '2026-02-09 08:20:24', NULL),
(3, 'officer', 'officer@mail.com', NULL, '$2y$12$Q9L/feMtlapAeg5I0acMnOUAv9Cn5Sr.Kf/sIT8KYLvk8vW2EAwBi', 'officer', '098213213223', NULL, '2026-02-09 09:32:28', '2026-02-09 09:32:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

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
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devices_code_unique` (`code`),
  ADD KEY `devices_category_id_foreign` (`category_id`);

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
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_device_id_foreign` (`device_id`),
  ADD KEY `loans_user_id_foreign` (`user_id`),
  ADD KEY `loans_approved_by_foreign` (`approved_by`),
  ADD KEY `loans_received_by_foreign` (`received_by`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `loans_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_received_by_foreign` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

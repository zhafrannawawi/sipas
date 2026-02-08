-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2026 at 04:39 PM
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
(6, 2, 'update', 'Memperbarui kategori', '2026-02-07 03:06:46', '2026-02-07 03:06:46'),
(7, 2, 'update', 'Memperbarui kategori (ID: 14)', '2026-02-07 03:08:12', '2026-02-07 03:08:12'),
(8, 2, 'update', 'Memperbarui alat (ID: 1)', '2026-02-07 03:19:27', '2026-02-07 03:19:27'),
(9, 2, 'update', 'Memperbarui alat (ID: 1): Stock berubah dari \'200\' menjadi \'199\'', '2026-02-07 03:22:41', '2026-02-07 03:22:41'),
(10, 2, 'update', 'Memparbarui user (ID : 1): Name berubah dari Andi Admin menjadi Andi', '2026-02-07 04:44:23', '2026-02-07 04:44:23'),
(11, 2, 'create', 'Membuat alat (ID: 13)', '2026-02-07 04:46:48', '2026-02-07 04:46:48'),
(12, 2, 'create', 'Membuat peminjaman (ID: 14)', '2026-02-07 04:47:32', '2026-02-07 04:47:32'),
(13, 2, 'update', 'Memperbarui peminjaman (ID: 14): Loan date berubah dari \'2026-02-14 00:00:00\' menjadi \'2026-02-15 00:00:00\', Due date berubah dari \'2026-02-14 00:00:00\' menjadi \'2026-02-16 00:00:00\'', '2026-02-07 04:50:41', '2026-02-07 04:50:41'),
(14, 2, 'update', 'Memperbarui peminjaman (ID: 14): Loan date berubah dari \'2026-02-16 00:00:00\' menjadi \'2026-02-07\'', '2026-02-07 07:04:55', '2026-02-07 07:04:55'),
(15, 2, 'update', 'Memperbarui peminjaman (ID: 14): Loan date berubah dari \'2026-02-07 00:00:00\' menjadi \'2026-02-08\'', '2026-02-07 07:06:07', '2026-02-07 07:06:07'),
(16, 2, 'update', 'Memperbarui peminjaman (ID: 14): Loan date berubah dari \'2026-02-08 00:00:00\' menjadi \'2026-02-09\'', '2026-02-07 07:08:18', '2026-02-07 07:08:18'),
(17, 2, 'update', 'Memperbarui peminjaman (ID: 14): Loan date berubah dari \'2026-02-09 00:00:00\' menjadi \'2026-02-10\'', '2026-02-07 07:09:01', '2026-02-07 07:09:01'),
(18, 2, 'update', 'Memperbarui peminjaman (ID: 14): Loan date berubah dari \'2026-02-10 00:00:00\' menjadi \'2026-02-11\'', '2026-02-07 07:10:56', '2026-02-07 07:10:56'),
(19, 2, 'update', 'Memperbarui peminjaman (ID: 14): Loan date berubah dari \'2026-02-11 00:00:00\' menjadi \'2026-02-12\'', '2026-02-07 07:14:14', '2026-02-07 07:14:14'),
(20, 2, 'update', 'Memperbarui peminjaman (ID: 14): Loan date berubah dari \'2026-02-12\' menjadi \'2026-02-13\'', '2026-02-07 07:17:02', '2026-02-07 07:17:02'),
(21, 11, 'update', 'Memperbarui peminjaman (ID: 14): Approved by berubah dari \'\' menjadi \'11\', Status berubah dari \'pending\' menjadi \'borrowed\'', '2026-02-07 07:21:02', '2026-02-07 07:21:02'),
(22, 11, 'update', 'Memperbarui peminjaman (ID: 13): Approved by berubah dari \'\' menjadi \'11\', Status berubah dari \'Menunggu Persetujuan\' menjadi \'Sedang Dipinjam\'', '2026-02-07 07:48:42', '2026-02-07 07:48:42'),
(23, 11, 'update', 'Memperbarui peminjaman (ID: 14): Status berubah dari \'Menunggu Persetujuan\' menjadi \'Sedang Dipinjam\'', '2026-02-07 07:50:25', '2026-02-07 07:50:25'),
(24, 11, 'update', 'Memperbarui peminjaman (ID: 14): Approved by berubah dari \'\' menjadi \'11\', Status berubah dari \'Menunggu Persetujuan\' menjadi \'Sedang Dipinjam\'', '2026-02-07 07:51:54', '2026-02-07 07:51:54'),
(25, 11, 'update', 'Memperbarui peminjaman (ID: 14): Approved by berubah dari \'\' menjadi \'11\', Status berubah dari \'Menunggu Persetujuan\' menjadi \'Sedang Dipinjam\'', '2026-02-07 07:52:19', '2026-02-07 07:52:19'),
(26, 11, 'update', 'Memperbarui peminjaman (ID: 14): Approved by berubah dari \'\' menjadi \'11\', Status berubah dari \'Menunggu Persetujuan\' menjadi \'Sedang Dipinjam\'', '2026-02-07 07:54:41', '2026-02-07 07:54:41'),
(27, 11, 'update', 'Memperbarui peminjaman (ID: 14): Approved by berubah dari \'\' menjadi \'11\', Status berubah dari \'Menunggu Persetujuan\' menjadi \'Sedang Dipinjam\'', '2026-02-07 07:56:15', '2026-02-07 07:56:15'),
(28, 11, 'update', 'Memperbarui peminjaman (ID: 13): Status berubah dari \'Menunggu Persetujuan\' menjadi \'Sedang Dipinjam\'', '2026-02-07 07:57:19', '2026-02-07 07:57:19'),
(29, 22, 'update', 'Memperbarui peminjaman (ID: 14): Returned date berubah dari \'\' menjadi \'2026-02-07 14:58:30\', Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-07 07:58:30', '2026-02-07 07:58:30'),
(30, 22, 'update', 'Memperbarui peminjaman (ID: 14): Returned date berubah dari \'2026-02-07\' menjadi \'2026-02-07\', Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-07 07:59:34', '2026-02-07 07:59:34'),
(31, 22, 'update', 'Memperbarui peminjaman (ID: 13): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-07 08:00:59', '2026-02-07 08:00:59'),
(32, 2, 'update', 'Memparbarui user (ID : 1): Password berubah dari  menjadi $2y$12$fQKWrzecgi3lBsURupSOFeHYLsZJC5lsJUZTSPqUUfOpvRz9xjSCi', '2026-02-07 08:02:18', '2026-02-07 08:02:18'),
(33, 11, 'update', 'Memperbarui peminjaman (ID: 13): Status berubah dari \'Menunggu Validasi\' menjadi \'Sudah Dikembalikan\'', '2026-02-07 08:03:02', '2026-02-07 08:03:02'),
(34, 11, 'update', 'Memperbarui alat (ID: 1): Stock berubah dari \'197\' menjadi \'198\'', '2026-02-07 08:03:02', '2026-02-07 08:03:02'),
(35, 11, 'update', 'Memperbarui peminjaman (ID: 14): Status berubah dari \'Menunggu Validasi\' menjadi \'Sudah Dikembalikan\'', '2026-02-07 08:03:04', '2026-02-07 08:03:04'),
(36, 11, 'update', 'Memperbarui alat (ID: 36): Stock berubah dari \'199\' menjadi \'200\'', '2026-02-07 08:03:04', '2026-02-07 08:03:04'),
(37, 2, 'update', 'Memparbarui user (ID : 1): Password telah diubah! ,Password berubah dari $2y$12$fQKWrzecgi3lBsURupSOFeHYLsZJC5lsJUZTSPqUUfOpvRz9xjSCi menjadi $2y$12$yeCPIjI2YkJw.Y62imvq2.zSHbYAwudiRIjdgLSC5aubVTrpLwwFi', '2026-02-07 08:21:17', '2026-02-07 08:21:17'),
(38, 2, 'update', 'Memparbarui user (ID : 1): Password telah diubah! ', '2026-02-07 08:26:09', '2026-02-07 08:26:09'),
(39, 2, 'delete', 'Menghapus kategori (ID: 17)', '2026-02-07 08:27:25', '2026-02-07 08:27:25'),
(40, 2, 'delete', 'Menghapus kategori (ID: 16)', '2026-02-07 08:27:29', '2026-02-07 08:27:29'),
(41, 2, 'delete', 'Menghapus kategori (ID: 15)', '2026-02-07 08:27:32', '2026-02-07 08:27:32'),
(42, 2, 'delete', 'Menghapus kategori (ID: 14)', '2026-02-07 08:27:34', '2026-02-07 08:27:34'),
(43, 2, 'update', 'Memparbarui user (ID : 1): Email berubah dari admin1@test.com menjadi admin@mail.com,berhasil memperbarui kata sandi! ', '2026-02-07 08:30:07', '2026-02-07 08:30:07'),
(44, 21, 'update', 'Memperbarui peminjaman (ID: 12): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-08 04:18:07', '2026-02-08 04:18:07'),
(45, 21, 'update', 'Memperbarui peminjaman (ID: 12): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-08 04:21:16', '2026-02-08 04:21:16'),
(46, 21, 'update', 'Memperbarui peminjaman (ID: 12): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-08 04:23:02', '2026-02-08 04:23:02'),
(47, 21, 'update', 'Memperbarui peminjaman (ID: 12): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-08 04:30:14', '2026-02-08 04:30:14'),
(48, 21, 'update', 'Memperbarui peminjaman (ID: 12): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-08 04:32:14', '2026-02-08 04:32:14'),
(49, 21, 'update', 'Memperbarui peminjaman (ID: 12): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\'', '2026-02-08 04:37:13', '2026-02-08 04:37:13'),
(50, 21, 'update', 'Memperbarui peminjaman (ID: 12): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\', Fine total berubah dari \'\' menjadi \'30000\', Fine paid at berubah dari \'\' menjadi \'2026-02-08 11:42:28\', Amount paid berubah dari \'\' menjadi \'30000\'', '2026-02-08 04:42:28', '2026-02-08 04:42:28'),
(51, 21, 'update', 'Memperbarui peminjaman (ID: 12): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\', Fine paid at berubah dari \'\' menjadi \'2026-02-08 11:49:30\', Amount paid berubah dari \'30000\' menjadi \'21\'', '2026-02-08 04:49:30', '2026-02-08 04:49:30'),
(52, 21, 'update', 'Memperbarui peminjaman (ID: 12): Status berubah dari \'Sedang Dipinjam\' menjadi \'Menunggu Validasi\', Fine total berubah dari \'\' menjadi \'30000\', Fine paid at berubah dari \'\' menjadi \'2026-02-08 12:42:59\', Amount paid berubah dari \'\' menjadi \'30000\'', '2026-02-08 05:42:59', '2026-02-08 05:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Elektronik & Gadget', '2026-01-29 00:53:24', '2026-01-29 00:53:24', NULL),
(10, 'Peralatan Presentasi', '2026-02-02 07:56:17', '2026-02-02 07:56:17', NULL),
(11, 'Perlengkapan Event', '2026-02-02 07:56:17', '2026-02-02 07:56:17', NULL),
(12, 'Alat Tulis Kantor (ATK)', '2026-02-02 07:56:17', '2026-02-02 07:56:17', NULL),
(14, 'AAAAA', '2026-02-07 02:14:36', '2026-02-07 08:27:34', '2026-02-07 08:27:34'),
(15, 'set', '2026-02-07 02:22:38', '2026-02-07 08:27:32', '2026-02-07 08:27:32'),
(16, 'ass', '2026-02-07 02:23:50', '2026-02-07 08:27:29', '2026-02-07 08:27:29'),
(17, 'saw', '2026-02-07 02:24:05', '2026-02-07 08:27:25', '2026-02-07 08:27:25');

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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_code` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `name`, `unique_code`, `category_id`, `stock`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Proyektor Epson X500', 'PRY-001', 1, 198, NULL, '2026-01-29 00:58:00', '2026-02-07 08:03:02'),
(36, 'Laptop MacBook Air', 'ELC-001', 1, 200, NULL, '2026-02-02 08:03:17', '2026-02-07 08:03:04'),
(37, 'Mouse Wireless Logi', 'ELC-002', 1, 10, NULL, '2026-02-02 08:03:17', '2026-02-07 01:45:56'),
(38, 'Kabel HDMI 5m', 'ELC-003', 1, 8, NULL, '2026-02-02 08:03:17', '2026-02-02 08:03:17'),
(39, 'Proyektor Epson', 'PRS-001', 10, 3, NULL, '2026-02-02 08:03:17', '2026-02-02 08:03:17'),
(40, 'Pointer Laser Logitech', 'PRS-002', 10, 4, NULL, '2026-02-02 08:03:17', '2026-02-07 01:45:54'),
(41, 'Layar Proyektor Portabel', 'PRS-003', 10, 2, NULL, '2026-02-02 08:03:17', '2026-02-02 08:03:17'),
(42, 'Speaker Portable / Toa', 'EVT-001', 11, 2, NULL, '2026-02-02 08:03:17', '2026-02-03 06:26:03'),
(43, 'Mic Wireless Set', 'EVT-002', 11, 4, NULL, '2026-02-02 08:03:17', '2026-02-02 08:03:17'),
(44, 'Kabel Roll 10m', 'EVT-003', 11, 12, NULL, '2026-02-02 08:03:17', '2026-02-02 08:03:17'),
(45, 'Stapler Besar', 'ATK-001', 12, 15, NULL, '2026-02-02 08:03:17', '2026-02-02 08:03:17'),
(46, 'Papan Tulis Whiteboard', 'ATK-002', 12, 3, NULL, '2026-02-02 08:03:17', '2026-02-02 08:03:17'),
(47, 'Vacuum Cleaner', 'KONS-002', 10, 5, NULL, '2026-02-02 08:03:17', '2026-02-04 08:16:14');

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
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `received_by` bigint(20) UNSIGNED DEFAULT NULL,
  `loan_date` date NOT NULL,
  `due_date` date NOT NULL,
  `returned_date` date DEFAULT NULL,
  `status` enum('canceled','pending','borrowed','validation','returned') NOT NULL DEFAULT 'pending',
  `fine_total` int(11) DEFAULT NULL,
  `fine_paid_at` date DEFAULT NULL,
  `amount_paid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `inventory_id`, `user_id`, `approved_by`, `received_by`, `loan_date`, `due_date`, `returned_date`, `status`, `fine_total`, `fine_paid_at`, `amount_paid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 21, 11, 11, '2026-01-29', '2026-01-31', '2026-01-31', 'returned', NULL, NULL, 0, NULL, '2026-01-31 01:00:38', NULL),
(2, 1, 21, NULL, NULL, '2026-02-03', '2026-02-04', NULL, 'canceled', NULL, NULL, 0, '2026-02-01 02:17:45', '2026-02-01 05:07:51', NULL),
(3, 1, 21, 11, 11, '2026-02-13', '2026-02-28', '2026-02-01', 'returned', NULL, NULL, 0, '2026-02-01 05:17:02', '2026-02-01 05:21:46', NULL),
(4, 1, 21, NULL, NULL, '2026-02-02', '2026-02-03', NULL, 'canceled', NULL, NULL, 0, '2026-02-01 06:46:14', '2026-02-01 06:47:23', NULL),
(5, 40, 21, 20, 11, '2026-02-05', '2026-02-04', '2026-02-07', 'returned', NULL, NULL, 0, '2026-02-01 06:48:24', '2026-02-07 01:45:54', NULL),
(6, 42, 21, 11, 11, '2026-02-05', '2026-02-12', '2026-02-03', 'returned', NULL, NULL, 0, '2026-02-03 06:21:37', '2026-02-03 06:26:03', NULL),
(7, 37, 21, 12, 11, '2026-02-04', '2026-02-04', '2026-02-07', 'returned', NULL, NULL, 0, '2026-02-03 08:50:48', '2026-02-07 01:45:56', NULL),
(8, 36, 21, NULL, NULL, '2026-02-05', '2026-02-13', NULL, 'canceled', NULL, NULL, 0, '2026-02-04 05:40:59', '2026-02-04 05:41:31', NULL),
(9, 38, 22, NULL, NULL, '2026-02-05', '2026-02-13', NULL, 'canceled', NULL, NULL, 0, NULL, '2026-02-04 07:18:40', NULL),
(10, 40, 30, 11, NULL, '2026-02-14', '2026-02-21', NULL, 'borrowed', NULL, NULL, 0, '2026-02-04 08:34:44', '2026-02-07 01:45:52', NULL),
(11, 37, 30, 11, NULL, '2026-02-14', '2026-02-21', NULL, 'borrowed', NULL, NULL, 0, '2026-02-04 08:35:19', '2026-02-07 01:45:51', NULL),
(12, 1, 21, 11, 12, '2026-02-07', '2026-02-02', '2026-02-08', 'returned', 30000, '2026-02-08', 30000, '2026-02-07 01:24:50', '2026-02-08 05:42:59', NULL),
(13, 1, 22, 11, 11, '2026-02-21', '2026-02-21', NULL, 'borrowed', NULL, NULL, 0, '2026-02-07 04:46:48', '2026-02-07 08:03:02', NULL),
(14, 36, 22, 11, 11, '2026-02-13', '2026-02-16', '2026-02-07', 'returned', NULL, NULL, 0, '2026-02-07 04:47:32', '2026-02-07 08:03:04', NULL);

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
(5, '2026_01_19_114953_create_inventories_table', 1),
(6, '2026_01_21_073243_create_administrators_table', 1),
(7, '2026_01_23_071137_create_officers_table', 1),
(8, '2026_01_23_152017_create_borrowers_table', 1),
(9, '2026_01_27_104146_create_loans_table', 1),
(10, '2026_02_07_090350_create_activity_logs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('ExMtc6yP9RJNQoJZluqvlcDlH3jPUcTtAAkbiYrB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQktEN2ZTaFBCWW5XeHZCanRBNDZqRHowVko2aGxJakFnOUMxS2pjNSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770564815),
('XIYbn4mYAoNjOsvZOmXIXt0lhBOErysyJQ97A7Qc', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid29jTXl0R1NLOWd5Um5HWDUxRmRKME44TE4xUzh1UzdnR3V5RlhxVyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vZmZpY2VyL2V4cG9ydC1sb2FucyI7czo1OiJyb3V0ZSI7czoyMDoib2ZmaWNlci5sb2Fucy5leHBvcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMTt9', 1770565161);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
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
(1, 'Andi', 'admin@mail.com', NULL, '$2y$12$XG1IertMHaY7O7dEUhjoQOBCXeFcb5AbdT0Nr62FF3BeshVUjrhp2', 'admin', '081234567890', NULL, '2026-01-28 15:20:41', '2026-02-07 08:30:07', NULL),
(2, 'Budi Admin', 'admin2@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '081234567891', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(3, 'Citra Admin', 'admin3@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '081234567892', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(4, 'Dedi Admin', 'admin4@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '081234567893', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(5, 'Eka Admin', 'admin5@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '081234567894', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(6, 'Fani Admin', 'admin6@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '081234567895', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(7, 'Gani Admin', 'admin7@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '081234567896', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(8, 'Hana Admin', 'admin8@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '081234567897', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(9, 'Indra Admin', 'admin9@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '081234567898', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(10, 'Jaka Admin', 'admin10@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '081234567899', NULL, '2026-01-28 15:20:41', '2026-02-04 08:09:29', '2026-02-04 08:09:29'),
(11, 'Kiki Officer', 'officer1@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'officer', '082134567801', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(12, 'Lala Officer', 'officer2@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'officer', '082134567802', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(13, 'Mira Officer', 'officer3@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'officer', '082134567803', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(14, 'Nico Officer', 'officer4@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'officer', '082134567804', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(15, 'Oki Officer', 'officer5@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'officer', '082134567805', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(16, 'Putri Officer', 'officer6@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'officer', '082134567806', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(17, 'Qori Officer', 'officer7@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'officer', '082134567807', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(18, 'Rian Officer', 'officer8@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'officer', '082134567808', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(19, 'Sita Officer', 'officer9@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'officer', '082134567809', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(20, 'Tono Officer', 'officer10@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'officer', '082134567810', NULL, '2026-01-28 15:20:41', '2026-02-04 08:09:47', '2026-02-04 08:09:47'),
(21, 'Umar Borrower', 'user1@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'borrower', '085734567001', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(22, 'Vina Borrower', 'user2@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'borrower', '085734567002', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(23, 'Wawan Borrower', 'user3@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'borrower', '085734567003', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(24, 'Xena Borrower', 'user4@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'borrower', '085734567004', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(25, 'Yayan Borrower', 'user5@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'borrower', '085734567005', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(26, 'Zizi Borrower', 'user6@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'borrower', '085734567006', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(27, 'Bambang Borrower', 'user7@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'borrower', '085734567007', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(28, 'Caca Borrower', 'user8@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'borrower', '085734567008', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(29, 'Dodo Borrower', 'user9@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'borrower', '085734567009', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL),
(30, 'Euis Borrower', 'user10@test.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'borrower', '085734567010', NULL, '2026-01-28 15:20:41', '2026-01-28 15:20:41', NULL);

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
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administrators_email_unique` (`email`),
  ADD UNIQUE KEY `administrators_username_unique` (`username`),
  ADD UNIQUE KEY `administrators_phone_number_unique` (`phone_number`);

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `borrowers_email_unique` (`email`),
  ADD UNIQUE KEY `borrowers_phone_number_unique` (`phone_number`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventories_unique_code_unique` (`unique_code`),
  ADD KEY `inventories_category_id_foreign` (`category_id`);

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
  ADD KEY `loans_inventory_id_foreign` (`inventory_id`),
  ADD KEY `loans_user_id_foreign` (`user_id`),
  ADD KEY `loans_approved_by_foreign` (`approved_by`),
  ADD KEY `loans_recieved_by_foreign` (`received_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `officers_email_unique` (`email`),
  ADD UNIQUE KEY `officers_username_unique` (`username`),
  ADD UNIQUE KEY `officers_phone_number_unique` (`phone_number`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `loans_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`),
  ADD CONSTRAINT `loans_recieved_by_foreign` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

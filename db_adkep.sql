-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2025 at 07:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_adkep`
--

-- --------------------------------------------------------

--
-- Table structure for table `datadiri`
--

CREATE TABLE `datadiri` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nuptk_nip` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `status_kawin` varchar(50) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `scan_ktp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datadiri`
--

INSERT INTO `datadiri` (`id`, `nama`, `nik`, `nuptk_nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_kawin`, `alamat_ktp`, `no_hp`, `email`, `foto`, `scan_ktp`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Iqbal Tegar Addiansyah', '123456', '12345678', 'Surabaya', '2312-12-21', 'Laki-laki', 'asdasd', 'Kawin', 'dsaqwqed', '1212312312', 'rafli12@gmail.com', NULL, NULL, '2025-04-08 23:24:36', '2025-04-08 23:24:36'),
(2, 'Muhammad Iqbal Tegar Addiansyah', '123456', '12345678', 'Surabaya', '2312-12-21', 'Laki-laki', 'asdasd', 'Kawin', 'dsaqwqed', '1212312312', 'rafli12@gmail.com', NULL, NULL, '2025-04-08 23:25:38', '2025-04-08 23:25:38'),
(3, 'Muhammad Iqbal Tegar Addiansyah', '123456', '12345678', 'Surabaya', '2312-12-21', 'Laki-laki', 'asdasd', 'Kawin', 'dsaqwqed', '1212312312', 'rafli12@gmail.com', NULL, NULL, '2025-04-08 23:26:07', '2025-04-08 23:26:07'),
(4, 'Muhammad Iqbal Tegar Addiansyah', '123456', '12345678', 'Surabaya', '2312-12-21', 'Laki-laki', 'asdasd', 'Kawin', 'dsaqwqed', '1212312312', 'rafli12@gmail.com', NULL, NULL, '2025-04-08 23:26:21', '2025-04-08 23:26:21'),
(5, 'Muhammad Iqbal Tegar Addiansyah', '123456', '12345678', 'Surabaya', '2312-12-21', 'Laki-laki', 'asdasd', 'Kawin', 'dsaqwqed', '1212312312', 'rafli12@gmail.com', NULL, NULL, '2025-04-08 23:33:37', '2025-04-08 23:33:37'),
(6, 'Muhammad Iqbal Tegar Addiansyah', '123456', '12345678', 'Surabaya', '2025-04-12', 'Laki-laki', 'asdasd', 'Kawin', 'jbbub', '088994061653', 'prabowo@gmail.com', NULL, NULL, '2025-04-08 23:34:29', '2025-04-08 23:34:29'),
(7, 'Muhammad Iqbal Tegar Addiansyah', '123456', '12345678', 'Surabaya', '2025-04-01', 'Laki-laki', 'krislam', 'Kawin', 'efsdf', '12345678', 'rafli12@gmail.com', NULL, NULL, '2025-04-08 23:49:19', '2025-04-08 23:49:19'),
(8, 'Muhammad Iqbal Tegar Addiansyah', '123456', '12345678', 'Surabaya', '2025-04-03', 'Laki-laki', 'asdasd', 'Duda/Janda', 'sdwd', '088994061653', 'rafli12@gmail.com', NULL, NULL, '2025-04-08 23:50:04', '2025-04-08 23:50:04'),
(9, 'dasdasd', '3123123', '13123123', 'Surabaya', '2025-04-13', 'Laki-laki', 'asdasd', 'Kawin', '233', '213123', 'rafli12@gmail.com', NULL, NULL, '2025-04-09 01:57:17', '2025-04-09 01:57:17');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `riwayat_menikah`
--

CREATE TABLE `riwayat_menikah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `tanggal_menikah_cerai` date DEFAULT NULL,
  `nama_pasangan` varchar(255) DEFAULT NULL,
  `pekerjaan_pasangan` varchar(255) DEFAULT NULL,
  `jumlah_anak` int(11) DEFAULT 0,
  `akta_nikah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nuptk_nip` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nuptk_nip`, `email`, `no_hp`, `password`, `created_at`, `updated_at`) VALUES
(2, 'ilovepopy', '123123', 'prabowo@gmail.com', '088994061653', '$2y$10$rmqGl0M.tY0piNrDRvGGxeUmDb2NSrEd7Qss/HmufZwBHmmVCaxXu', '2025-04-09 07:30:35', '2025-04-09 07:30:35');

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
-- Indexes for table `datadiri`
--
ALTER TABLE `datadiri`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `riwayat_menikah`
--
ALTER TABLE `riwayat_menikah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nuptk_nip` (`nuptk_nip`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `datadiri`
--
ALTER TABLE `datadiri`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_menikah`
--
ALTER TABLE `riwayat_menikah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
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

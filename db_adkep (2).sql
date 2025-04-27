-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2025 pada 01.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `status_kawin` varchar(50) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `scan_ktp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id`, `user_id`, `nama`, `nik`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_kawin`, `alamat_ktp`, `no_hp`, `email`, `foto`, `scan_ktp`, `created_at`, `updated_at`) VALUES
(26, 14, 'jingan', '0987654567890987', '098765456789876543', 'hahahah', '2013-12-26', 'Laki-laki', 'islam', 'Belum Kawin', 'hahahah', '0987654345678987', 'user@gmail.com', 'storage/1745547164_foto_LaporanSoloApk .pdf', 'storage/1745547164_ktp_LaporanSoloApk .pdf', '2025-04-24 19:12:44', '2025-04-24 19:12:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `riwayat_menikah`
--

CREATE TABLE `riwayat_menikah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `tanggal_menikah_cerai` date DEFAULT NULL,
  `nama_pasangan` varchar(100) DEFAULT NULL,
  `pekerjaan_pasangan` varchar(100) DEFAULT NULL,
  `jumlah_anak` int(11) DEFAULT 0,
  `akta_nikah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_menikah`
--

INSERT INTO `riwayat_menikah` (`id`, `user_id`, `status_perkawinan`, `tanggal_menikah_cerai`, `nama_pasangan`, `pekerjaan_pasangan`, `jumlah_anak`, `akta_nikah`, `created_at`, `updated_at`) VALUES
(19, 14, 'menikah', '2017-12-31', 'fufufaafa', 'hahaaha', 100, NULL, '2025-04-20 08:34:20', '2025-04-21 10:51:22'),
(20, 15, 'hahahahah', '2023-11-30', 'jhghjkewttdyui', 'efhgyuhijokdojihuggh', 9, NULL, '2025-04-21 17:01:22', '2025-04-21 17:01:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenjang_pendidikan` varchar(100) NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `nama_pelatihan` varchar(255) DEFAULT NULL,
  `penyelenggara_pelatihan` varchar(255) DEFAULT NULL,
  `tahun_pelatihan` year(4) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `sertifikat_pelatihan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`id`, `user_id`, `jenjang_pendidikan`, `nama_institusi`, `jurusan`, `tahun_lulus`, `nama_pelatihan`, `penyelenggara_pelatihan`, `tahun_pelatihan`, `ijazah`, `sertifikat_pelatihan`, `created_at`, `updated_at`) VALUES
(4, 10, 'D3', 'ITS SURABAYA', 'RPL', '2007', 'tidak ada', 'tidak ada', NULL, NULL, NULL, '2025-04-16 22:44:03', '2025-04-16 22:44:03'),
(5, 14, 'SMA/SMK', 'halo saya adalah denis', 'pemburu malam', '2029', 'nona snow whitee doku', 'nona bismark', '2007', NULL, NULL, '2025-04-19 08:19:04', '2025-04-21 10:33:44'),
(6, 15, 'S1/D4', 'bombardilo', 'ufrfgvhjk', '1901', 'khgfdesrjnkml', 'jresrtvbnm', '1915', NULL, NULL, '2025-04-21 17:03:46', '2025-04-21 17:03:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_penugasan`
--

CREATE TABLE `riwayat_penugasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `mata_pelajaran` varchar(255) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `nomor_sk` varchar(100) DEFAULT NULL,
  `status_penugasan` enum('Tetap','Honorer','Kontrak') NOT NULL,
  `sk_penugasan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_penugasan`
--

INSERT INTO `riwayat_penugasan` (`id`, `user_id`, `nama_sekolah`, `jabatan`, `mata_pelajaran`, `tanggal_mulai`, `tanggal_selesai`, `nomor_sk`, `status_penugasan`, `sk_penugasan`, `created_at`, `updated_at`) VALUES
(4, 10, 'SMKN 10 SURABAYA', 'PRESIDEN', 'RPL', '2309-12-02', '9823-06-02', '09876544567890', 'Tetap', NULL, '2025-04-16 23:06:28', '2025-04-16 23:06:28'),
(5, 14, 'Ambatukam School expo g display maximal', 'kapten garis depan maju maju', 'Belajar Berburu', '2025-12-31', '2023-12-31', '09876543234567', 'Honorer', NULL, '2025-04-19 08:22:08', '2025-04-21 10:52:33'),
(6, 15, 'buntat assammblle', 'chibaku tensei', 'oiudftghujikoplk', '2026-03-31', '2025-12-01', '09876543456789', 'Tetap', NULL, '2025-04-21 17:05:02', '2025-04-21 17:05:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_handphone` varchar(15) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `nip`, `email`, `no_handphone`, `gambar`, `password`, `role`, `created_at`, `updated_at`) VALUES
(10, 'rans', '111111111111111111', 'rans@gmail.com', '098765445678987', 'storagegambar/1744869831.png', '$2y$10$xfDoJWDZp.AtdUnnPRuiNOMi4MOY9oWW3pXvnGUKs/Ww1bzibFJMS', 'user', '2025-04-16 11:01:50', '2025-04-16 23:03:51'),
(11, 'adminV10', '123456789123456789', 'admin@gmail.com', '098765434567897', 'storagegambar/1744850742.jpg', '$2y$10$33tnEJAho4GxqFbOOG5yBeSEbsAi3TLyeQbB.xIfdcq5EwRUq0kkq', 'admin', NULL, '2025-04-20 10:58:49'),
(13, 'Dzaky', '121212121212121212', 'dzaky@gmail.com', '098765434567890', 'storagegambar/1744843426.jpg', '$2y$10$5b.gXFGZ9xltOk8EngD.QeJbKm3/f3LIXKuS4HaT9BWnxRW7yngUu', 'user', '2025-04-16 15:43:04', '2025-04-16 15:43:46'),
(14, 'user', '100000000000000001', 'user@gmail.com', '098765445678998', 'storagegambar/1745139508.jpg', '$2y$10$xlx4w4Eu13RzfPd/dMlHQ.ujTaiPEAM8ilFbE72ViIOymoJ5XPblS', 'user', '2025-04-19 07:59:42', '2025-04-20 01:58:28'),
(15, 'Randi', '200000000000000002', 'Randi@gmail.com', '098765445678909', NULL, '$2y$10$b/sj4tUnuK2UfWX7V8Zjc.BP4GpIAjWRF1ghHHZPBAUj1Fc3Xtht6', 'user', '2025-04-21 16:40:49', '2025-04-21 16:40:49'),
(18, 'dhimas', '080000000000000080', 'dhimas@gmail.com', '098765434567899', NULL, '$2y$10$E13NevZtolDC1gHvs1F7TeEYHmdLr2OnNWa2OQfty9VOlfAqP7H2e', 'admin', '2025-04-24 09:06:04', '2025-04-24 09:06:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `riwayat_menikah`
--
ALTER TABLE `riwayat_menikah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indeks untuk tabel `riwayat_penugasan`
--
ALTER TABLE `riwayat_penugasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_riwayat_penugasan_user` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_menikah`
--
ALTER TABLE `riwayat_menikah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `riwayat_penugasan`
--
ALTER TABLE `riwayat_penugasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `riwayat_menikah`
--
ALTER TABLE `riwayat_menikah`
  ADD CONSTRAINT `riwayat_menikah_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_penugasan`
--
ALTER TABLE `riwayat_penugasan`
  ADD CONSTRAINT `fk_riwayat_penugasan_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

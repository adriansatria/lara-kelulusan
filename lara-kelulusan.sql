-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2021 pada 08.53
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara-kelulusan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL,
  `nama_dosen` varchar(128) NOT NULL,
  `mata_kuliah` varchar(128) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `nama_mahasiswa` varchar(128) NOT NULL,
  `nim` int(11) NOT NULL,
  `nilai_akhir` varchar(50) NOT NULL,
  `kemungkinan_perbaikan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `tahun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `evaluations`
--

INSERT INTO `evaluations` (`id`, `nama_dosen`, `mata_kuliah`, `kelas`, `nama_mahasiswa`, `nim`, `nilai_akhir`, `kemungkinan_perbaikan`, `keterangan`, `tahun`) VALUES
(1, 'Dewi Sartika, M.Kom.', 'Basis Data 2', '04TPLP0010', 'Rina Nakazawa', 2016142159, 'D', 'Bisa', 'Cuti', '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_10_055224_create_report_f1s_table', 2),
(5, '2021_05_10_055745_create_report_f2s_table', 3),
(6, '2021_05_10_060004_create_report_f3s_table', 4),
(7, '2021_05_10_060231_create_report_f4s_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_f1s`
--

CREATE TABLE `report_f1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_kuliah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jpm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kpk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rata_kehadiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `report_f1s`
--

INSERT INTO `report_f1s` (`id`, `nama_dosen`, `nip`, `mata_kuliah`, `kelas`, `jpm`, `kpk`, `rata_kehadiran`, `tahun`) VALUES
(1, 'Ervan', '12345', 'Basis Data 1', 'X', '4', '100', '100', '2021'),
(2, 'Ervan', '12345', 'AI', 'XI', '4', '100', '100', '2021'),
(3, 'Budi', '23480', 'Alprom', 'XII', '4', '100', '100', '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_f2s`
--

CREATE TABLE `report_f2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_s1` float NOT NULL,
  `ip_s2` float NOT NULL,
  `ip_s3` float NOT NULL,
  `ip_s4` float NOT NULL,
  `ip_s5` float NOT NULL,
  `ip_s6` float NOT NULL,
  `ip_s7` float NOT NULL,
  `ip_s8` float NOT NULL,
  `ipk` float NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `report_f2s`
--

INSERT INTO `report_f2s` (`id`, `kelas`, `nama_mahasiswa`, `nim`, `ip_s1`, `ip_s2`, `ip_s3`, `ip_s4`, `ip_s5`, `ip_s6`, `ip_s7`, `ip_s8`, `ipk`, `status`, `tahun`) VALUES
(1, 'X', 'Rina', '201987709', 3.11, 3.65, 3.77, 3.5, 3.9, 4, 3.11, 3.65, 3.79, 'L', '2021'),
(3, 'XII', 'sasa', '2012173', 2.88, 2.99, 3.1, 2.99, 3.31, 2.55, 3.44, 3.88, 3.11, 'sasa', '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_f3s`
--

CREATE TABLE `report_f3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_l` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_lp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_ct` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_ml` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_md` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_do` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `report_f3s`
--

INSERT INTO `report_f3s` (`id`, `nama_mahasiswa`, `nim`, `prodi`, `jenjang`, `semester`, `kelas`, `jumlah_mahasiswa`, `status_l`, `status_lp`, `status_ct`, `status_ml`, `status_md`, `status_do`, `tahun`) VALUES
(1, NULL, NULL, 'Sistem Informasi', 'S1', '8', '32RTHH', '44', '33', '11', NULL, NULL, NULL, NULL, '2021'),
(3, 'wqwqw', '2113', 'dada', 'dada', '13', 'wqwqw', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_f4s`
--

CREATE TABLE `report_f4s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `report_f4s`
--

INSERT INTO `report_f4s` (`id`, `prodi`, `jenjang`, `semester`, `kelas`, `jumlah_mahasiswa`, `sp1`, `sp2`, `sp3`, `keterangan`, `tahun`) VALUES
(6, 'TI', 's1', '12', '12', '222', '3', NULL, NULL, NULL, '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'Ervan', 'admin', 'admin@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-05-10 00:32:53', '2021-05-10 00:32:53', 'Admin'),
(2, 'Rina', 'petugas', 'petugas@gmail.com', NULL, 'afb91ef692fd08c445e8cb1bab2ccf9c', NULL, '2021-05-10 00:32:53', '2021-05-10 00:32:53', 'Petugas'),
(4, 'Budi', 'budi', 'kajur@gmail.com', NULL, 'fa2a64d863ff8a83fee0b8fafd292d26', NULL, NULL, NULL, 'Kajur');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `report_f1s`
--
ALTER TABLE `report_f1s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report_f2s`
--
ALTER TABLE `report_f2s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report_f3s`
--
ALTER TABLE `report_f3s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report_f4s`
--
ALTER TABLE `report_f4s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `report_f1s`
--
ALTER TABLE `report_f1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `report_f2s`
--
ALTER TABLE `report_f2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `report_f3s`
--
ALTER TABLE `report_f3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `report_f4s`
--
ALTER TABLE `report_f4s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

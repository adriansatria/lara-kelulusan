-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 02:06 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dosen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_struktural` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat_golongan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_fungsional` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn_nidk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homebase_prodi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serdos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama_dosen`, `nip`, `jabatan_struktural`, `pangkat_golongan`, `jabatan_fungsional`, `tmt`, `notelp`, `nidn_nidk`, `homebase_prodi`, `serdos`, `keterangan`) VALUES
(1, 'Jhon Doe', '181911020', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
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
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `nama_dosen`, `mata_kuliah`, `kelas`, `nama_mahasiswa`, `nim`, `nilai_akhir`, `kemungkinan_perbaikan`, `keterangan`, `tahun`) VALUES
(1, 'Dewi Sartika, M.Kom.', 'Basis Data 2', '04TPLP0010', 'Rina Nakazawa', 2016142159, 'D', 'Bisa', 'Cuti', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_darah` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ortu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_akademik` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `foto`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `asal_sekolah`, `jenis_kelamin`, `golongan_darah`, `alamat`, `nama_ortu`, `pendidikan_terakhir`, `pekerjaan`, `keterangan`, `tahun_akademik`) VALUES
(1, '1819117641', 'none', 'Addyana Ilman', 'Bandung', '2002-10-20', 'Islam', 'SMKN 4 BDG', 'L', 'A', 'Jln. Cijawura', 'Maman', 'SMP', 'IRT', 'Lulus', '2021'),
(2, '1819117642', 'none', 'Adrian Maulana F', 'Bandung', '2002-04-12', 'Islam', 'SMKN 4 BDG', 'L', 'B', 'Jln. Malabar', 'Jhon Doe', 'SMA', 'Programmer', 'Lulus', '2020'),
(3, '1819117641', 'none', 'Addyana Ilman', 'Bandung', '2002-10-20', 'Islam', 'SMKN 4 BDG', 'L', 'A', 'Jln. Cijawura', 'Maman', 'SMP', 'IRT', 'Lulus', '2021'),
(4, '1819117642', 'none', 'Adrian Maulana F', 'Bandung', '2002-04-12', 'Islam', 'SMKN 4 BDG', 'L', 'B', 'Jln. Malabar', 'Jhon Doe', 'SMA', 'Programmer', 'Lulus', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_10_055224_create_report_f1s_table', 2),
(5, '2021_05_10_055745_create_report_f2s_table', 3),
(6, '2021_05_10_060004_create_report_f3s_table', 4),
(7, '2021_05_10_060231_create_report_f4s_table', 5),
(12, '2021_06_12_135139_create_mahasiswa_table', 6),
(13, '2021_06_13_095558_create_dosen_tabel', 6),
(16, '2021_06_17_062753_create_reportf1s_table', 7),
(19, '2021_06_18_021345_create_reportf3_table', 8),
(20, '2021_06_19_063207_create_reportf2_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reportf1s`
--

CREATE TABLE `reportf1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dosen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_kuliah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p1` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p3` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p4` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p5` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p6` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p7` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p8` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p9` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p10` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p11` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p12` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p13` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p14` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p15` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p16` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p17` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p18` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p19` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prosentase_hadir` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prosentase_tidakhadir` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hadir` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keluar_dinas` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mangkir` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sakit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportf1s`
--

INSERT INTO `reportf1s` (`id`, `nama_dosen`, `nip`, `mata_kuliah`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `prosentase_hadir`, `prosentase_tidakhadir`, `hadir`, `izin`, `keluar_dinas`, `mangkir`, `sakit`, `tahun`) VALUES
(7, 'Luthfi Ismail', '1819117680', 'PBO', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '15', '4', '15', '1', NULL, '2', '1', '2020'),
(8, 'Ahmad Gozali', '1819117681', 'PPL', '1', '1', '1', '1', NULL, '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '17', '2', '18', NULL, NULL, NULL, '1', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `reportf2s`
--

CREATE TABLE `reportf2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mahasiswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tidak_izin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelakuan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_lulus_lalu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_lulus_baru` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amxsks` int(11) NOT NULL,
  `ip` double(8,2) NOT NULL,
  `kapita_selekta2` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k3` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metodologi_penelitian2` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k2` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa_inggris_komunikasi3` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k2_2` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tugas_akhir` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k6` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportf2s`
--

INSERT INTO `reportf2s` (`id`, `nim`, `nama_mahasiswa`, `izin`, `tidak_izin`, `jumlah`, `kelakuan`, `status_lulus_lalu`, `status_lulus_baru`, `amxsks`, `ip`, `kapita_selekta2`, `k3`, `metodologi_penelitian2`, `k2`, `bahasa_inggris_komunikasi3`, `k2_2`, `tugas_akhir`, `k6`) VALUES
(1, '4616010032', 'ABDULLAH K', '0', '0', '0', 'Sangat Baik', 'LULUS', 'LULUS', 43, 3.22, 'B-', '8.1', 'A', '6.6', 'B+', '6.6', 'B+', '19.8'),
(2, '4616010032', 'AHMED AHYAN', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 43, 3.23, 'B-', '8.2', 'A', '6.7', 'B+', '6.7', 'B+', '19.9'),
(3, '4616010032', 'SYIHABUDIN', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 43, 3.24, 'B-', '8.3', 'A', '6.8', 'B+', '6.8', 'B', '19.1'),
(4, '4616010032', 'AMELIA HASWA', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 43, 3.25, 'B-', '8.4', 'A', '6.9', 'B+', '6.9', 'B+', '19.11');

-- --------------------------------------------------------

--
-- Table structure for table `reportf3s`
--

CREATE TABLE `reportf3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mahasiswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tidak_izin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelakuan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_lulus_lalu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_lulus_baru` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amxsks` int(11) NOT NULL,
  `ip` double(8,2) NOT NULL,
  `kapita_selekta2` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k3` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metodologi_penelitian2` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k2` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa_inggris_komunikasi3` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k2_2` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tugas_akhir` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k6` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportf3s`
--

INSERT INTO `reportf3s` (`id`, `nim`, `nama_mahasiswa`, `izin`, `tidak_izin`, `jumlah`, `kelakuan`, `status_lulus_lalu`, `status_lulus_baru`, `amxsks`, `ip`, `kapita_selekta2`, `k3`, `metodologi_penelitian2`, `k2`, `bahasa_inggris_komunikasi3`, `k2_2`, `tugas_akhir`, `k6`) VALUES
(2, '4616010032', 'ABDULLAH K', '0', '0', '0', 'Sangat Baik', 'LULUS', 'LULUS', 43, 3.22, 'B-', '8.1', 'A', '6.6', 'B+', '6.6', 'B+', '19.8'),
(3, '4616010032', 'AHMED AHYAN', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 43, 3.23, 'B-', '8.2', 'A', '6.7', 'B+', '6.7', 'B+', '19.9'),
(4, '4616010032', 'SYIHABUDIN', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 43, 3.24, 'B-', '8.3', 'A', '6.8', 'B+', '6.8', 'B+', '19.10'),
(5, '4616010032', 'AMELIA HASWA', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 43, 3.25, 'B-', '8.4', 'A', '6.9', 'B+', '6.9', 'B+', '19.11');

-- --------------------------------------------------------

--
-- Table structure for table `report_f1s`
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
-- Dumping data for table `report_f1s`
--

INSERT INTO `report_f1s` (`id`, `nama_dosen`, `nip`, `mata_kuliah`, `kelas`, `jpm`, `kpk`, `rata_kehadiran`, `tahun`) VALUES
(25, 'Virgiawan Dejan', '1819117678', 'Basis Data', 'XII', '4', '100', '100', '2021'),
(26, 'PILIH', 'PILIH', 'PWPB', 'XII', '4', '80', '80', '2020'),
(27, 'Luthfi Ismail', '1819117680', 'PBO', 'XII', '6', '90', '90', '2020'),
(28, 'Ahmad Gozali', '1819117681', 'PPL', 'XII', '3', '100', '100', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `report_f2s`
--

CREATE TABLE `report_f2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `prodi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_f2s`
--

INSERT INTO `report_f2s` (`id`, `nama_mahasiswa`, `kelas`, `nim`, `ip_s1`, `ip_s2`, `ip_s3`, `ip_s4`, `ip_s5`, `ip_s6`, `ip_s7`, `ip_s8`, `ipk`, `status`, `prodi`, `tahun`) VALUES
(1, 'Rina', 'X', '201987709', 3.11, 3.65, 3.77, 3.5, 3.9, 4, 3.11, 3.65, 3.79, 'L', 'Teknik Informatika', '2020'),
(3, 'sasa', 'XII', '2012173', 2.88, 2.99, 3.1, 2.99, 3.31, 2.55, 3.44, 3.88, 3.11, 'TL', 'Teknik Informatika', '2021'),
(4, 'Ramdan Rohendi', 'Teknik Komputer dan Jaringan', '1819117668', 33.3, 33.3, 33.3, 33.3, 33.3, 33.3, 33.3, 33.3, 33.3, 'TL', 'Sistem Infromasi', '2019'),
(65, 'Agus Rohendi', 'XII', '1819117644', 3.11, 3.65, 3.77, 3.5, 3.9, 4, 3.14, 3.2, 3.8, 'TL', 'Teknik Informatika', '2020'),
(66, 'Zahy Habibie', 'XII', '1819117645', 3.12, 3.66, 3.78, 3.6, 3.1, 5, 3.15, 3.21, 3.81, 'TL', 'Sistem Informasi', '2021'),
(67, 'Ahmad Fatih', 'XII', '1819117646', 3.13, 3.67, 3.79, 3.7, 3.11, 6, 3.16, 3.22, 3.82, 'L', 'Teknik Informatika', '2021'),
(68, 'Ahmad Ablul', 'XII', '1819117647', 3.14, 3.68, 3.8, 3.8, 3.12, 6, 3.17, 3.23, 3.83, 'L', 'Sistem Informasi', '2021'),
(69, 'Ahmad Singh', 'XII', '1819117648', 3.15, 3.69, 3.81, 3.9, 3.13, 6, 3.18, 3.24, 3.84, 'L', 'Sistem Informasi', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `report_f3s`
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
  `tahun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_f3s`
--

INSERT INTO `report_f3s` (`id`, `nama_mahasiswa`, `nim`, `prodi`, `jenjang`, `semester`, `kelas`, `jumlah_mahasiswa`, `status_l`, `status_lp`, `status_ct`, `status_ml`, `status_md`, `status_do`, `tahun`, `keterangan`) VALUES
(1, 'Addyana Ilman', '1819117641', 'Sistem Informasi', 'S1', '8', '32RTHH', '44', '33', '11', NULL, NULL, NULL, NULL, '2021', 'none'),
(5, 'Angga Saputra', '1819117665', 'Teknik Informatika', 'S1', '1', '32RTHH', '40', '33', '12', NULL, NULL, NULL, NULL, '2020', ''),
(6, 'Young Lex', '1819117668', 'Teknik Informatika', 'S1', '4', '32RTHH', '40', '33', '12', NULL, NULL, NULL, NULL, '2020', 'none'),
(7, 'Gilang Restu', '1819117670', 'Sistem Informasi', 'S1', '8', '32RTHH', '40', '33', '6', NULL, NULL, '7', NULL, '2021', 'none'),
(8, 'Rifqi Fauzan', '1819117600', 'Teknik Informatika', 'D3', '2', '32RTHH', '40', '33', '3', NULL, '2', NULL, NULL, '2020', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `report_f4s`
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
-- Dumping data for table `report_f4s`
--

INSERT INTO `report_f4s` (`id`, `prodi`, `jenjang`, `semester`, `kelas`, `jumlah_mahasiswa`, `sp1`, `sp2`, `sp3`, `keterangan`, `tahun`) VALUES
(6, 'TI', 's1', '12', '12', '222', '3', NULL, NULL, NULL, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'Ervan', 'admin', 'admin@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-05-10 00:32:53', '2021-05-10 00:32:53', 'Admin'),
(2, 'Rina', 'petugas', 'petugas@gmail.com', NULL, 'afb91ef692fd08c445e8cb1bab2ccf9c', NULL, '2021-05-10 00:32:53', '2021-05-10 00:32:53', 'Petugas'),
(4, 'Budi', 'budi', 'kajur@gmail.com', NULL, '9c5fa085ce256c7c598f6710584ab25d', NULL, NULL, NULL, 'Kajur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reportf1s`
--
ALTER TABLE `reportf1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportf2s`
--
ALTER TABLE `reportf2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportf3s`
--
ALTER TABLE `reportf3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_f1s`
--
ALTER TABLE `report_f1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_f2s`
--
ALTER TABLE `report_f2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_f3s`
--
ALTER TABLE `report_f3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_f4s`
--
ALTER TABLE `report_f4s`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reportf1s`
--
ALTER TABLE `reportf1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reportf2s`
--
ALTER TABLE `reportf2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reportf3s`
--
ALTER TABLE `reportf3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report_f1s`
--
ALTER TABLE `report_f1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `report_f2s`
--
ALTER TABLE `report_f2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `report_f3s`
--
ALTER TABLE `report_f3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report_f4s`
--
ALTER TABLE `report_f4s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

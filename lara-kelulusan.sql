-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 11:38 AM
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
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_struktural` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat_golongan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_fungsional` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notelp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nidn_nidk` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homebase_prodi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serdos` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama_dosen`, `nip`, `jabatan_struktural`, `pangkat_golongan`, `jabatan_fungsional`, `tmt`, `notelp`, `nidn_nidk`, `homebase_prodi`, `serdos`, `keterangan`) VALUES
(245, 'Mauldy Laya, S.Kom., M.Kom.', '197802112009121003', 'Ketua Jurusan', 'Penata Tk.1 / IIId', 'Lektor', NULL, '08978882742', '0311027801', 'D4 TI', 'V', NULL),
(246, 'Eriya, S.Kom., M.T.', '197802032005012002', 'Sekjur', 'Penata Tk.1 / IIId', 'Lektor', NULL, '081366241202', '0003027801', 'D4 TMD', 'V', 'Pindahan dari Jambi'),
(247, 'Risna Sari, S.Kom., M.Ti.', '198502272015042001', 'KPS D4 TI', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '08561406772', '0027028506', 'D4 TI', 'V', NULL),
(248, 'Defiana  Arnaldy, S.Tp., M.Si.', '198112012015041001', 'KPS D4 TMJ', 'Penata  / IIIc', 'Lektor', NULL, '081802964763', '2001128101', 'D4 TMJ', 'V', NULL),
(249, 'Iwan Sonjaya, S.T., M.T.', '197605302008121002', 'KPS D4 TMD', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '0816 95 68 29', '0330057601', 'D4 TMD', 'V', NULL),
(250, 'Ayu Rosyida Zain, S.ST, M.T', '198910112018032002', 'KPS D1 TKJ', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '081394667473', '0011108902', 'D4 TMJ', NULL, NULL),
(251, 'Hata Maulana, S.Si., M.Ti.', '198410232014041001', 'Ka. Lab. Komputer', 'Penata  / IIIc', 'Lektor', NULL, '085695451024', '0323108402', 'D4 TMD', 'V', NULL),
(252, 'Drs. Abdul Aziz, M.MSI.', '195609231987031002', 'Dosen  PNS', 'Penata Tk.1 / IIId', 'Lektor', '01/04/2013', '081315890090', '0023095601', 'D1 TKJ', 'V', 'Studi Lanjut S3 di UTeM'),
(253, 'Yoyok Sabar Waluyo, S.S., M.Hum.', '197011061998021001', 'Dosen  PNS', 'Penata Tk.1 / IIId', 'Lektor', '01/10/2016', '081399835806', '0006117002', 'D4 TMD', 'V', 'Studi Lanjut S3 di UNS'),
(254, 'Nur Fauzi Soelaiman, S.T., M.Kom', '195809201984031001', 'Dosen  PNS', 'Penata Tk.1 / IIId', 'Lektor', '01/10/2011', '0817791491', '0020095806', 'D1 TKJ', 'V', 'Studi Lanjut S3 di UTeM'),
(255, 'Indri Neforawati, S.T., M.T.', '196311131989032001', 'Dosen  PNS', 'Penata Tk.1 / IIId', 'Lektor', NULL, '081280703038', '0013116308', 'D4 TMJ', 'V', 'Studi Lanjut S3 di UTeM'),
(256, 'Drs. Refirman, M.Kom.', '195708101986031005', 'Dosen  PNS', 'Penata  / IIIc', 'Lektor', NULL, '0895392867016', '0010085704', 'D1 TKJ', 'V', NULL),
(257, 'Drs. Agus Setiawan, M.Kom.', '195808171986121001', 'Dosen  PNS', 'Pembina  / IVa', 'Lektor Kepala', NULL, '08129433815', '0017085806', 'D4 TMD', 'V', NULL),
(258, 'Dr. Dewi Yanti Liliana, S.Kom., M.Kom.', '198111162005012004', 'Dosen  PNS', 'Penata  / IIIc', 'Lektor', NULL, '081218769796', '0016118101', 'D4 TI', 'V', 'LULUS S3  UI 2019'),
(259, 'Anita Hidayati, S.Kom., M.Kom.', '197908032003122003', 'Dosen  PNS', 'Penata Tk.1 / IIId', 'Lektor', NULL, '081554257259', '0003087902', 'D4 TI', 'V', 'Studi Lanjut S3 di UI'),
(260, 'Prihatin Oktivasari, S.Si., M.Si', '197910062003122001', 'Dosen  PNS', 'Penata Tk.1 / IIId', 'Lektor', NULL, '0887884077101', '0006107904', 'D4 TMJ', 'V', 'Studi Lanjut S3 di ITB'),
(261, NULL, '520000000000000343', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(262, 'Mera Kartika D, S.Si., M.T., Ph.D', '197904282005012002', 'Dosen  PNS', 'Pembina  / IVa', 'Lektor Kepala', NULL, '08122144084', '0028047901', 'D4 TI', 'V', 'LULUS S3  tahun 2020'),
(263, 'Maria Agustin, S.Kom., M.Kom.', '197509152003122003', 'Dosen  PNS', 'Penata Tk.1 / IIId', 'Lektor', NULL, '081367510026', '0015097510', 'D4 TMJ', 'V', 'Pindahan Polsri'),
(264, 'Iklima Ermis Ismail, S.Kom., M.Kom.', '198807122018032001', 'Dosen  PNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '081287393851', '0312079904', 'D4 TI', NULL, NULL),
(265, 'Ariawan Andi Suhandana, S,Kom., M.Ti.', '198501292010121003', 'Dosen  PNS', 'Penata  / IIIc', 'Asisten Ahli', NULL, '081410019556', '0029018505', 'D4 TMJ', NULL, 'Pindahan DIKTI'),
(266, 'Asep Taufik Muharram, S.Kom., M.Kom.', '198410282019031005', 'Dosen  PNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '081514377249', '0428108408', 'D4 TI', NULL, NULL),
(267, 'Anggi Mardiyono, S.Kom., M.Kom.', '198606072019031011', 'Dosen  PNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', '01/05/2020', '085227622664', '0407068601', 'D4 TI', 'V', NULL),
(268, 'Rizki Elisa Nalawati, S.T., M.T.', '199201302019032018', 'Dosen  PNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '081222546786', '0030019204', 'D4 TI', NULL, NULL),
(269, 'Malisa Huzaifa, S.Kom., M.T.', '199110042019032024', 'Dosen  PNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '085370833573', '0004109102', 'D4 TMD', NULL, NULL),
(270, 'Noorlela Marcheta, S,Kom., M.Kom.', '199303022019032022', 'Dosen  PNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '087873757293', '0002039301', 'D4 TMD', NULL, NULL),
(271, 'Muhammad Yusuf Bagus Rasyiidin, S.Kom., M.TI.', '199308142019031015', 'Dosen  PNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '081211181989', '0004089301', 'D4 TMJ', NULL, NULL),
(272, 'Asep Kurniawan, S.Pd., M.Kom.', '199109262019031012', 'Dosen  PNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '082385155431', '0026099103', 'D4 TMJ', NULL, NULL),
(273, 'Indra Hermawan, S.Kom., M.Kom.', '198703132019031012', 'Dosen  PNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '085217987034', '0413038701', 'D4 TMJ', 'V', NULL),
(274, 'Ade Rahma Yuly, S.Kom., M.Ds.', '199007252020122012', 'Dosen  CPNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '085263971990', '0025079003', 'D4 TMD', NULL, NULL),
(275, 'Bambang Warsuta, S.Kom., M.T.I.', '198411292020121002', 'Dosen  CPNS', 'Penata Muda Tk.1 / IIIb', 'Asisten Ahli', NULL, '081299441447', '0029118402', 'D4 TI', NULL, NULL),
(276, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, 'Euis Oktavianti, S.Si., M.Ti.', '23072014090119801027', 'Dosen  Tetap Non PNS', 'Setara 3B', 'Asisten Ahli', NULL, '087897756868', '0027108010', 'D4 TI', 'V', NULL),
(278, 'Afifah Muharikah, S.S., M. Hum.', '23232015030219870908', 'Dosen  Tetap Non PNS ', '3B', 'Asisten Ahli', NULL, '08158501813', '0008098701', 'D4 TMJ', NULL, NULL),
(279, 'Dr. Muhammad Yusuf, S.Ag., M.A.', '23252015100119690204', 'Dosen  Tetap Non PNS ', 'Setara 3C', 'Lektor', NULL, '081905086977', '0004026905', 'D1 TKJ', 'Proses', NULL),
(280, 'Syamsi Dwi Cahya, S.ST., M.Kom.', '59152016040119890406', 'Dosen  Tetap Non PNS ', '3B', 'Asisten Ahli', NULL, '089613614003', '0006048903', 'D1 TKJ', NULL, NULL),
(281, 'Fitria Nugrahani, S.Pd., M.Si.', '48302016040119890510', 'Dosen  Tetap Non PNS ', '3B', 'Asisten Ahli', NULL, '08993606397', '0010058903', 'D4 TMD', NULL, NULL),
(282, 'Ayres Pradiptyas, S.ST., M.M.', '59142016040119870912', 'Dosen  Tetap Non PNS ', '3B', 'Asisten Ahli', NULL, '081281836410', '0012098705', 'D4 TI', NULL, NULL),
(283, 'Dewi Kurniawati, S.S., M.Pd.', '5932017020119850430 ', 'Dosen  Tetap Non PNS ', '3B', 'Asisten Ahli', NULL, '082137161310', '0030048501', 'D4 TI', NULL, NULL),
(284, 'Fachroni Arbi Murad, S.Kom., M.Kom.', '9202017012019840513', 'Dosen  Tetap Non PNS ', '3B', 'Asisten Ahli', NULL, '08986480122', '0013058401', 'D1 TKJ', NULL, NULL),
(285, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(286, 'Muhammad Abdul Hadi, S.Si., M.T.I.', '520000000000000226', 'Dosen Part Timer', '3B', NULL, NULL, '08989389706', '0306017904', 'STTJ', NULL, NULL),
(287, 'Irawati, S.T., M.T.', '520000000000000228', 'Dosen Part Timer', '3B', NULL, NULL, '089636446373', NULL, NULL, NULL, NULL),
(288, 'Mahbubul Wathoni, S.Si., M.Kom. ', '520000000000000233', 'Dosen Part Timer', '3B', NULL, NULL, '08561611408', '9903004945', 'UIN Jakarta', NULL, NULL),
(289, 'Herlino Nanang, S.T., M.Kom.', '520000000000000275', 'Dosen Part Timer', '3B', NULL, NULL, '082298623532', '2009127301', 'UIN Jakarta', NULL, NULL),
(290, 'Taufik Muhammad Guntur, S.E., M.M.', '520000000000000282', 'Dosen Part Timer', '3B', NULL, NULL, '081210177358', '0305068301', 'Akademi Pariwisata Pertiwi', NULL, NULL),
(291, 'Toni Haryanto', '520000000000000024', 'Dosen Part Timer', '3B', NULL, NULL, '081280407285', NULL, 'TGP', NULL, NULL),
(292, 'Weldy Rahman Nazmi, S.T., M.TI', '520000000000000306', 'Dosen Part Timer', '3B', NULL, NULL, '082113310090', NULL, 'STTJ', NULL, NULL),
(293, 'Indah Sari Mukarramah, B.Ict., S.Tr., M.TI.', '520000000000000302', 'Dosen Part Timer', '3B', NULL, NULL, '085718145181', NULL, NULL, NULL, NULL),
(294, 'Chandra Wirawan, S.Kom.', '520000000000000329', 'Dosen Part Timer', '3B', NULL, NULL, NULL, NULL, 'Dosen AN', NULL, NULL),
(295, 'Muhammad Yusuf Khadafi, S.Kom., M.TI', '520000000000000303', 'Dosen Part Timer', '3B', NULL, NULL, '08114714793', NULL, NULL, NULL, NULL),
(296, 'I Nyoman Sujana Saputra, S.T., M.T.I.', '520000000000000280', 'Dosen Part Timer', '3B', NULL, NULL, '081310102183', NULL, NULL, NULL, NULL),
(297, 'Yana Suryana , S.Pd., M.M.', '520000000000000356', 'Dosen Part Timer', '3B', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, 'Dr. Yohan Suryanto, S.T., M.T.', '16292016032819740206', 'Dosen Part Timer', '3B', 'Asisten Ahli', NULL, '0811893708', '8860600016', 'D4 TMJ', NULL, 'Homebase pindah ke UI'),
(299, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(300, 'Yeni Nurhasanah, S.Pd., M.T. ', '520000000000000232', 'Dosen Part Timer', '3B', NULL, NULL, '081283633818', NULL, 'D4 TMD', NULL, NULL),
(301, 'Faizul Mubarok, S.S.i, M.M.', '520000000000000277', 'Dosen Part Timer', '3B', NULL, NULL, '085692117726', '99201112711', 'UIN Jakarta', NULL, NULL),
(302, 'Pedro Iriano, S.Kom., M.Kom.', '520000000000000279', 'Dosen Part Timer', '3B', NULL, NULL, '08999002566', '9904011147', 'STMIK IKMI Cirebon', NULL, NULL),
(303, 'Novita Angra, S.Pd., M.Hum.', '520000000000000278', 'Dosen Part Timer', '3B', NULL, NULL, '082139728434', NULL, NULL, NULL, NULL),
(304, 'Dian Rosdiana, S.ST., M.Kom.', '520000000000000283', 'Dosen Part Timer', '3B', NULL, NULL, '082118595951', '0405127604', 'Politeknik TEDC', NULL, NULL),
(305, 'Minto Rahayu, S.S., M.Si.', '195807191987032001', 'Dosen  PNS T. Mesin', '4B', NULL, NULL, '08561313551', '0019075804', 'TM', NULL, NULL),
(306, 'Hamid Tharhan, S.T., M.Kom.', '520000000000000246', 'Dosen Part Timer', '3B', NULL, NULL, '08129580366', '9903000827', 'D1 TKJ', NULL, 'Studi Lanjut S3 di UTeM'),
(307, 'Fidriyanti, M.M.', '520000000000000304', 'Dosen Part Timer', '3B', NULL, NULL, '081317900539', NULL, 'CCIT', NULL, NULL),
(308, 'Shynde Limar Kinanti, S.Si, M.Si.', '520000000000000305', 'Dosen Part Timer', '3B', NULL, NULL, '081212976740', NULL, 'STTJ', NULL, NULL),
(309, 'Andriyanti Dwi Kartikawati, S.T, M.T.', '520000000000000301', 'Dosen Part Timer', '3B', NULL, NULL, '081298889945', NULL, NULL, NULL, NULL),
(310, 'Wibby Aldryani Astuti Praditasari, S.S.T, M.T., M.Eng.', '39572017050219901227', 'Dosen Non PNS TE', '3B', NULL, NULL, NULL, '0327129002', 'TE', NULL, NULL),
(311, 'Ikhwanul Kholis, S.T, M.T.', '520000000000000198', 'Dosen Part Timer', '3B', NULL, NULL, '08568131842', '0327059002', 'STTJ', NULL, NULL),
(312, 'M. Octaviano Pratama, S.Kom., M.Kom.', '520000000000000339', 'Dosen Part Timer', '3B', NULL, NULL, '081286116407', NULL, NULL, NULL, NULL),
(313, 'Dr. Eng. Muhammad Rahmat Widyanto, S.Kom., M.Eng.Sc.', '520000000000000340', 'Dosen Part Timer', '3B', NULL, NULL, '0895611593797', NULL, NULL, NULL, NULL),
(314, 'Gunady Haryanto, S.T., M.T.', '520000000000000338', 'Dosen Part Timer', '3B', NULL, NULL, '08128194497', NULL, NULL, NULL, NULL),
(315, 'Andriyanto, S.E., M.Kom', '23272015100119730629', 'Dosen Non PNS TGP', '3B', NULL, NULL, NULL, NULL, 'TGP', NULL, NULL),
(316, 'Ady Arman, S.Pd., M.Kom.I', '19800408201504001', 'Dosen PNS Akuntansi', 'IIIB', NULL, NULL, '085772106290', NULL, 'AK', NULL, NULL),
(317, 'Linda Sari Wulandari, S.Hum., M.Hum.', '199207172019032036', 'Dosen PNS T. Sipil', 'IIIB', NULL, NULL, NULL, NULL, 'TS', NULL, NULL),
(318, 'Asep Yana Yusyama, S.Pd., M.Pd.', '199001112019031016', 'Dosen  PNS T. Mesin', 'IIIB', NULL, NULL, '087771096611', NULL, 'TM', NULL, NULL),
(319, 'Taufik Hidayat, S.T MT', '520000000000000207', 'Dosen Part Timer TE', '3B', NULL, NULL, '081316501917', NULL, 'TE', NULL, NULL),
(320, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, 'Mochamad Soleh', '196505081990031004', 'Staf Adm. JTIK', 'IIIC', NULL, NULL, '085920552722', 'Arsiparis Penyelia, IIIc (tmt.01/04/2018)', NULL, NULL, NULL),
(322, 'Olivia Emilda Mamahit, S.E.', '197507212007064030', 'Staf Adm. JTIK', '3A', NULL, NULL, '081315201459', 'Pegawai Kontrak', NULL, NULL, NULL),
(323, 'Suliman, S.Pd.', '196702011990031005', 'Staf Adm. JTIK', 'IIID', NULL, NULL, '081280890225', 'Fungsional Umum,  IIId (tmt.01/04/2021)', NULL, NULL, NULL),
(324, 'Tedi Supartadi', '196801011990031005', 'Staf Adm. JTIK', 'IIIB', NULL, NULL, '081316151404', 'Fungsional Umum, IIIb', NULL, NULL, NULL),
(325, 'Rini Maharani, A.Md.', '199609292018013227', 'Staf Adm. JTIK', '2C', NULL, NULL, '083873003413', 'Pegawai Kontrak', NULL, NULL, NULL),
(326, 'Isro Machfudin, S.T., M.Kom.', '196810141990031001', 'Laboran JTIK', 'IIIC', NULL, NULL, '089661707772', 'PLP Ahli Muda, IIIc', NULL, NULL, NULL),
(327, 'Syafrizal Choir, S.Kom., M.Kom.', '197512162001121002', 'Laboran JTIK', 'IIIA', NULL, NULL, '08128178404', 'Fungsional Umum, IIIa', NULL, NULL, NULL),
(328, 'Jamhari, S.Kom.', '198601282014041001', 'Staf Adm. JTIK', 'IIIA', NULL, NULL, '082111680074', 'Fungsional Umum, IIIa', NULL, NULL, NULL),
(329, 'Rangga Saputra', '198107012006103027', 'Helper JTIK', '2C', NULL, NULL, '085716585714', 'Pegawai Kontrak', NULL, NULL, NULL),
(330, 'Pratiwi Nur Fadillah, S.Pd.', '199208192017013149', 'Staf Adm. PBI-TIK', '3A', NULL, NULL, '085811203059', 'Pegawai Kontrak', NULL, NULL, NULL),
(331, 'Prastiyo', NULL, 'Helper JTIK', NULL, NULL, NULL, '087882520574', 'OB', NULL, NULL, NULL),
(332, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 'Shinta Oktaviana R, S.Kom., M.Kom.', '23062014090119801027', 'Dosen  Tetap Non PNS ', NULL, 'Asisten Ahli', NULL, '08128839520', '0027108011', 'D4 TI', NULL, 'Keluar');

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
  `nim` varchar(11) NOT NULL,
  `nilai_akhir` varchar(50) NOT NULL,
  `kemungkinan_perbaikan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `tahun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `nama_dosen`, `mata_kuliah`, `kelas`, `nama_mahasiswa`, `nim`, `nilai_akhir`, `kemungkinan_perbaikan`, `keterangan`, `tahun`) VALUES
(8, 'Mauldy Laya, S.Kom., M.Kom.', 'Bahasa Inggris untuk TIK 2', '32RTHH', 'Nazla', '4617010010', 'C', 'Bisa', 'Kerjakan tugas PPL yang belum', '2020/2021');

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
  `nim` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `golongan_darah` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ortu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_akademik` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `asal_sekolah`, `jenis_kelamin`, `golongan_darah`, `alamat`, `nama_ortu`, `pendidikan_terakhir`, `pekerjaan`, `keterangan`, `tahun_akademik`) VALUES
(18, '4617010010', 'Nazla', 'Jakarta', '1999-11-25', 'Islam', 'SMK Islam PB. Soedirman', 'P', 'A', 'Jln. Raya Condet', 'HJ. Zuhria', 'SMA', 'Pegawai Swasta', 'Lulus', '2020/2021'),
(19, '4617010011', 'Sasquilla', 'Bandung', '2000-12-26', 'Islam', 'SMAN 8', 'P', 'O', 'Jln. Kampung Melayu', 'Budi', 'D3', 'Pegawai Swasta', 'Lulus', '2020/2021'),
(20, '4617010012', 'Putri', 'Padang', '1999-01-27', 'Kristen', 'SMAN 10', 'P', 'AB', 'Jln. Batu Ampar', 'Syarif', 'S1', 'Pengusaha', 'Lulus', '2020/2021'),
(21, '4617010013', 'Rachmawan', 'Jakarta', '2001-10-28', 'Kristen', 'SMA Penabur', 'L', 'B', 'Jln. Damai', 'Layla', 'SMA', 'Guru', 'Lulus', '2020/2021'),
(22, '4617010014', 'Cindy', 'Jakarta', '1999-09-29', 'Islam', 'SMA Adi Luhur', 'P', 'B', 'Jln. Beji Timur', 'Sutami', 'SMA', 'PNS', 'Lulus', '2020/2021'),
(23, '4617010015', 'Jeremy', 'Bali', '1999-08-01', 'Budha', 'SMKN 22', 'L', 'AB', 'Jln. H. Marzuki', 'Masiah', 'S1', 'PNS', 'Lulus', '2020/2021'),
(24, '4617010016', 'Aldino', 'Sulawesi', '2000-03-02', 'Islam', 'SMAN 48', 'L', 'O', 'Jln. Sejahtera', 'Yahya', 'D3', 'Pegawai Swasta', 'Lulus', '2020/2021'),
(25, '4617010017', 'Dinda', 'Kalimantan', '1999-11-03', 'Islam', 'SMKN 12', 'P', 'O', 'Jln. Jaya Abadi', 'Mulfi', 'S3', 'Dosen', 'Lulus', '2020/2021'),
(26, '4617010018', 'Zavier', 'Jakarta', '1999-08-04', 'Kristen', 'SMA Harapan Pelita', 'L', 'B', 'Jln. Perempatan Mampang', 'Ilyas', 'SMA', 'Pegawai Swasta', 'Lulus', '2020/2021'),
(27, '4617010019', 'Ilham', 'Jakarta', '1999-04-05', 'Islam', 'SMK N 10', 'L', 'A', 'Jln. Dewi Sartika', 'Zaini', 'S1', 'PNS', 'Lulus', '2020/2021');

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
  `nama_dosen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mata_kuliah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(11, 'Drs. Agus Setiawan, M.Kom', '1819117680', 'Aljabar Linier', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '56', '0', '0', '0', '0', '2020/2021'),
(12, 'Novita Angra, S.Pd., M.Hum.', '1819117681', 'Bahasa Indonesia untuk Teknik Informatika', '1', '1', '1', '1', NULL, '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '64', '0', '0', '0', '0', '2020/2021'),
(13, ' Fitria Nugrahani, S.Pd., M.Si.', '1819117682', ' Bahasa Inggris untuk TIK 2', '1', '1', '1', '1', NULL, '1', '1', '1', NULL, '1', '1', '1', '1', NULL, '1', '1', '1', '1', '1', '0.9333', '0.0667', '42', '0', '0', '3', '0', '2020/2021'),
(14, ' Risna Sari, S.Kom., M.T.i', '1819117683', ' Basis Data 1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '0', '80', '0', '0', '0', '0', '2020/2021'),
(15, ' Herlino Nanang', '1819117684', ' Jaringan Komputer dan Komunikasi', NULL, '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', NULL, NULL, '1', '1', '1', '1', '1', '1', '0', '84', '0', '0', '0', '0', '2020/2021'),
(16, ' Iklima Ermis Ismail, S.Kom., M.Kom', '1819117685', ' Pemrograman Web 1', '1', '1', '1', '1', '1', '1', NULL, '1', '1', '1', '1', '1', '1', NULL, '1', '1', '1', '1', '1', '0.9375', '0.0625', '77', '0', '0', '6', '0', '2020/2021'),
(17, ' Euis Oktavianti, S.Si, M.T.i', '1819117686', ' Rekayasa Perangkat Lunak', '1', '1', '1', '1', '1', '1', NULL, '1', '1', '1', '1', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '0', '45', '0', '0', '0', '0', '2020/2021'),
(18, ' Dewi Yanti Liliana , S.Kom., M.Kom.', '1819117687', ' Struktur Data', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, '1', '1', '1', '1', '1', '1', '0', '102', '0', '0', '0', '0', '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `reportf2s`
--

CREATE TABLE `reportf2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_mahasiswa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tidak_izin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelakuan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_lulus_lalu` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_lulus_baru` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amxsks` int(11) DEFAULT NULL,
  `ip` double(8,2) DEFAULT NULL,
  `kapita_selekta2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k3` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metodologi_penelitian2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahasa_inggris_komunikasi3` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k2_2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tugas_akhir` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k6` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportf2s`
--

INSERT INTO `reportf2s` (`id`, `nim`, `nama_mahasiswa`, `izin`, `tidak_izin`, `jumlah`, `kelakuan`, `status_lulus_lalu`, `status_lulus_baru`, `amxsks`, `ip`, `kapita_selekta2`, `k3`, `metodologi_penelitian2`, `k2`, `bahasa_inggris_komunikasi3`, `k2_2`, `tugas_akhir`, `k6`) VALUES
(34, '4616010032', 'ABDULLAH KHALID YAHYA', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 43, 3.27, 'B-', '8.1', 'A', '6.6', 'B+', '6.6', 'B+', '19.8'),
(35, '4616010034', 'ADITYO BAGAS PRIANTO', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 49, 3.82, 'A', '12', 'A', '7.4', 'A-', '7.4', 'A-', '22.2'),
(36, '4616010001', 'AKLI HAKIKI HASIBUAN', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 51, 3.89, 'A', '12', 'A', '6.6', 'B+', '6.6', 'A', '24'),
(37, '4616010032', 'ANDI MAKKASAU', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 45, 3.47, 'B+', '9.9', 'A', '7.4', 'A-', '7.4', 'B+', '19.8'),
(38, '4616010020', 'ASYMALA PERMATA SARI', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 48, 3.68, 'A', '12', 'A', '8', 'A', '8', 'B+', '19.8'),
(39, '4616010005', 'DIMAS RAMA PUTRA', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 45, 3.43, 'A', '12', 'A', '6.6', 'B+', '6.6', 'B', '18'),
(40, '4616010022', 'DZAKI FADLULLAH ABDURRACHMAN', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 51, 3.95, 'A', '12', 'A', '7.4', 'A-', '7.4', 'A', '24'),
(41, '4616010036', 'FAKHIRAH MAHARANI', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 50, 3.86, 'A', '12', 'A', '8', 'A', '8', 'A-', '22.2'),
(42, '4616010038', 'GITA DIAZ PANGESTI', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 49, 3.82, 'A', '12', 'A', '7.4', 'A-', '7.4', 'A-', '22.2'),
(43, '4616010012', 'GUNTUR JANUAR FITRIANO', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 48, 3.68, 'A-', '11.1', 'A', '6.6', 'B+', '6.6', 'A-', '22.2'),
(44, '4616010058', 'HIZKIA ROBINSAR MARPAUNG', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 49, 3.79, 'A-', '11.1', 'A', '8', 'A', '8', 'A-', '22.2'),
(45, '4616010040', 'IKHSAN SOLIHIN', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 43, 3.27, 'B+', '9.9', 'A', '6.6', 'B+', '6.6', 'B', '18'),
(46, '4616010008', 'IRFAN AHMAD RASYIQ', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 51, 3.95, 'A', '12', 'A', '7.4', 'A-', '7.4', 'A', '24'),
(47, '4616010014', 'JACK MARTIN REINALDO', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 46, 3.54, 'A', '12', 'A', '8', 'A', '8', 'B', '18'),
(48, '4616010042', 'JALLU RAMADHAN', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 47, 3.63, 'A', '12', 'A', '7.4', 'A-', '7.4', 'B+', '19.8'),
(49, '4616010044', 'MAULIDA NUZULIA', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 52, 4.00, 'A', '12', 'A', '8', 'A', '8', 'A', '24'),
(50, '4616010046', 'MUHAMMAD ADHI HERLIANTO', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 50, 3.88, 'A-', '11.1', 'A', '7.4', 'A-', '7.4', 'A', '24'),
(51, '4616010048', 'MUHAMMAD RAFI NUGROHO', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 52, 4.00, 'A', '12', 'A', '8', 'A', '8', 'A', '24'),
(52, '4616010024', 'MUHAMMAD RAFLY THARHAN', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 48, 3.68, 'A-', '11.1', 'A', '6.6', 'B+', '6.6', 'A-', '22.2'),
(53, '4616010050', 'MUHAMMAD REZA PAHLEVI YULIANTO', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 51, 3.89, 'A', '12', 'A', '6.6', 'B+', '6.6', 'A', '24'),
(54, '4616010026', 'NADIAH TSAMARA PRATIWI', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 51, 3.89, 'A', '12', 'A', '6.6', 'B+', '6.6', 'A', '24'),
(55, '4616010052', 'NADIA NURUL HIKMAH', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 49, 3.82, 'A', '12', 'A', '7.4', 'A-', '7.4', 'A-', '22.2'),
(56, '4616010016', 'PRISKA PUTRI PRATIWI PUJIYANTO', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 49, 3.82, 'A', '12', 'A', '7.4', 'A-', '7.4', 'A-', '22.2'),
(57, '4616010028', 'RIO ANGGARA SUFILIN', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 48, 3.68, 'A-', '11.1', 'A', '6.6', 'B+', '6.6', 'A-', '22.2'),
(58, '4616010060', 'RIZKYTA RABEA', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 47, 3.63, 'A', '12', 'A', '7.4', 'A-', '7.4', 'B+', '19.8'),
(59, '4616010054', 'ROBBY KURNIA APRILIAN', '0', '0', '0', 'Baik', 'LULUS', 'TIDAK LULUS', 25, 3.50, 'B+', '9.9', 'A', '6.6', 'B+', '6.6', NULL, '0'),
(60, '4616010056', 'SITI NURDIANA APRILIANTI', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 48, 3.68, 'A-', '11.1', 'A', '6.6', 'B+', '6.6', 'A-', '22.2'),
(61, '4616010018', 'SITI SARAH BALGIS', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 52, 4.00, 'A', '12', 'A', '8', 'A', '8', 'A', '24'),
(62, '4616010030', 'VIDI AYUNINGTYAS', '0', '0', '0', 'Baik', 'LULUS', 'LULUS', 52, 4.00, 'A', '12', 'A', '8', 'A', '8', 'A', '24'),
(63, '4314010019', 'TIMBO HIDAYAT SIREGAR', '0', '0', '0', 'Baik', NULL, 'TIDAK LULUS', 14, 2.80, 'C', '6', 'A', '0', NULL, '0', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `reportf3s`
--

CREATE TABLE `reportf3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_mahasiswa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tidak_izin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelakuan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_lulus_lalu` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_lulus_baru` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amxsks` int(11) DEFAULT NULL,
  `ip` double(8,2) DEFAULT NULL,
  `kapita_selekta2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k3` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metodologi_penelitian2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahasa_inggris_komunikasi3` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k2_2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tugas_akhir` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k6` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(30, 'Mauldy Laya, S.Kom., M.Kom.', '197802112009121003', 'Bahasa Inggris untuk TIK 2', '32RTHH', '100', '100', '100', '2020/2021');

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
(76, 'Nazla', '32RTHH', '4617010010', 3.33, 3.33, 3.33, 3.33, 3.33, 3.33, 3.33, 3.33, 3.8, 'L', 'Teknik Informatika', '2020/2021'),
(77, 'Jeremy', '32RTHH', '4617010015', 2, 2, 2, 2, 2, 2.44, 2.5, 3, 29, 'LP', 'Sistem Informasi', '2020/2021'),
(78, 'Sasquilla', '32RTHH', '4617010011', 3.33, 3.33, 3.33, 3.33, 3.33, 3.33, 3.33, 3.33, 3.8, 'L', 'Sistem Informasi', '2019/2020');

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
(10, 'Nazla', '4617010010', 'Teknik Informatika', 'D3', '6', '32RTHH', '44', '1', NULL, NULL, NULL, NULL, '2', '2020/2021', 'Tidak pernah mengerjakan tugas');

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
(7, 'Teknik Informatika', 'D3', '4', '32RTHH', '40', '1', '2', '3', 'Nakal disaat pembelajaran, dan tidak sopan', '2020/2021'),
(8, 'Sistem Informasi', 'S1', '1', '32RTHH', '40', '1', '2', NULL, 'none', '2020/2021');

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
(4, 'Budi', 'budi', 'kajur@gmail.com', NULL, '00dfc53ee86af02e742515cdcf075ed3', NULL, NULL, NULL, 'Kajur'),
(7, 'Jhon Doe', 'Jhon Doe', 'jhondoe@gmail.com', NULL, 'e1f60ee64481d586a7b9897e89571852', NULL, NULL, NULL, 'Dosen'),
(10, 'Mauldy Laya, S.Kom., M.Kom.', 'mauldya', 'mauldya@gmail.com', NULL, '5ac38d57794459b67c037f7d72cb7023', NULL, NULL, NULL, 'Dosen');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reportf1s`
--
ALTER TABLE `reportf1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reportf2s`
--
ALTER TABLE `reportf2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `reportf3s`
--
ALTER TABLE `reportf3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `report_f1s`
--
ALTER TABLE `report_f1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `report_f2s`
--
ALTER TABLE `report_f2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `report_f3s`
--
ALTER TABLE `report_f3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `report_f4s`
--
ALTER TABLE `report_f4s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

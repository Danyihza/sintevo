-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 09:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sintevo`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `prodi` int(11) DEFAULT NULL,
  `no_identify` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_user`, `nama`, `status`, `prodi`, `no_identify`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'DOS0001', 'Dany Ahmad Ihza Prakoso', 2, NULL, '12124213', 'CEO', '2021-04-25 08:25:39', '2021-06-05 19:29:04'),
(2, 'DOS0001', 'Budi Santoso', 1, 4, '1234', 'CFO', '2021-05-06 03:39:35', '2021-05-06 03:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `detail_users`
--

CREATE TABLE `detail_users` (
  `id_detail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` int(11) NOT NULL,
  `nama_brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ketua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `prodi` int(11) DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_users`
--

INSERT INTO `detail_users` (`id_detail`, `kategori`, `nama_brand`, `deskripsi`, `alamat`, `nama_ketua`, `no_whatsapp`, `status`, `prodi`, `website`, `instagram`, `created_at`, `updated_at`) VALUES
('DOS0001', 3, 'Aftermeet Academy 2.0', 'testing', 'Desa Rondokuning Kraksaan Kabupaten Probolinggo Jawa Timur', 'Dany Ahmad', '082331147549', 2, NULL, 'www.mediarraihan.com', '@danyihza', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
('MHS0002', 7, 'Jang Jang Wings', 'adada', 'Desa Rondokuning Kraksaan Kabupaten Probolinggo Jawa Timur', 'Reza', '082331144346', 1, 14, NULL, NULL, '2021-05-06 02:20:40', '2021-05-06 02:20:40');

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
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` varchar(255) NOT NULL,
  `uploader` varchar(50) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `path_file` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `uploader`, `nama_file`, `path_file`, `created_at`, `updated_at`) VALUES
('3SBmJB6zJD9BWPIMwdkGQoEMOl7wGGgp', 'DOS0001', 'Tugas 6_185150701111017_Dany Ahmad Ihza Prakoso_AWS ECS.pdf', 'assets/file/3SBmJB6zJD9BWPIMwdkGQoEMOl7wGGgp', '2021-05-08 00:38:02', '2021-05-08 00:38:02'),
('ATpWZoJYkhymKEDBTVAYCGZCBfLRLVaU', 'DOS0001', 'Tugas 6_185150701111017_Dany Ahmad Ihza Prakoso_AWS ECS.pdf', 'assets/file/ATpWZoJYkhymKEDBTVAYCGZCBfLRLVaU', '2021-05-08 01:02:26', '2021-05-08 01:02:26'),
('D8e1vQY4OMQMhhM2l6vG3Z6EMZhNLHp5', 'DOS0001', 'alt_jember.png', 'assets/file/D8e1vQY4OMQMhhM2l6vG3Z6EMZhNLHp5', '2021-05-20 00:19:01', '2021-05-20 00:19:01'),
('HUilPtzdazIPaEvNiMwzNAJTRyy7axku', 'DOS0001', '400 (1).jpeg', 'assets/file/HUilPtzdazIPaEvNiMwzNAJTRyy7axku', '2021-05-19 13:11:42', '2021-05-19 13:11:42'),
('JGM9NX2qgiXLhn4pOKyZNfnPG7x0HMv5', 'DOS0001', 'Tugas 6_185150701111017_Dany Ahmad Ihza Prakoso_AWS ECS.pdf', 'assets/file/JGM9NX2qgiXLhn4pOKyZNfnPG7x0HMv5', '2021-05-08 00:39:23', '2021-05-08 00:39:23'),
('JUvvAcy2NG7gSIHDrbtNDaqjewVtuCO9', 'DOS0001', 'banner_img.png', 'assets/file/JUvvAcy2NG7gSIHDrbtNDaqjewVtuCO9', '2021-05-19 13:11:00', '2021-05-19 13:11:00'),
('mCzbiGSYRRQ69OnMWMrHSiQCA1lOdVus', 'DOS0001', '400 (1).jpeg', 'assets/file/mCzbiGSYRRQ69OnMWMrHSiQCA1lOdVus', '2021-05-19 11:22:15', '2021-05-19 11:22:15'),
('skL0k2PrDr64cds4AJDhbxaPiyfbwdju', 'DOS0001', 'Tugas 6_185150701111017_Dany Ahmad Ihza Prakoso_AWS ECS.pdf', 'assets/file/skL0k2PrDr64cds4AJDhbxaPiyfbwdju', '2021-05-08 00:43:18', '2021-05-08 00:43:18'),
('UI5j6xgGcHZv3WyeB9kVuwStSLt8r5qv', 'DOS0001', '176-0.jpg', 'assets/file/UI5j6xgGcHZv3WyeB9kVuwStSLt8r5qv', '2021-05-19 12:46:05', '2021-05-19 12:46:05'),
('uRLh5VU5HqmU5R9a9kes31N2NlFxWn8K', 'DOS0001', '400 (1).jpeg', 'assets/file/uRLh5VU5HqmU5R9a9kes31N2NlFxWn8K', '2021-05-19 13:09:46', '2021-05-19 13:09:46'),
('vOQS6AmaHCCess1XONEsGKSlszmnjbIp', 'DOS0001', 'Tugas 6_185150701111017_Dany Ahmad Ihza Prakoso_AWS ECS.pdf', 'assets/file/vOQS6AmaHCCess1XONEsGKSlszmnjbIp', '2021-05-08 01:00:00', '2021-05-08 01:00:00'),
('xqZyEaDiiaQieDInzW1C1Z8lzfrZ4Dur', 'DOS0001', 'Tugas 6_185150701111017_Dany Ahmad Ihza Prakoso_AWS ECS.pdf', 'assets/file/xqZyEaDiiaQieDInzW1C1Z8lzfrZ4Dur', '2021-05-08 01:00:50', '2021-05-08 01:00:50'),
('YrvnHq6pD0OVOYUaSYLsnl10nXCEeTL0', 'DOS0001', '400 (1).jpeg', 'assets/file/YrvnHq6pD0OVOYUaSYLsnl10nXCEeTL0', '2021-05-19 13:10:27', '2021-05-19 13:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Pangan', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(2, 'Energi', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(3, 'Rekayasa Keteknikan', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(4, 'Biomedis', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(5, 'Material Maju', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(6, 'Sosial & Budaya', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(7, 'Transportasi', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(8, 'Material', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(9, 'Pertahanan', '2021-04-25 08:25:39', '2021-04-25 08:25:39');

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
(4, '2021_02_24_031838_create_kategori_table', 1),
(5, '2021_02_24_224813_create_prodis_table', 1),
(6, '2021_02_26_085816_create_detail_users_table', 1),
(7, '2021_02_26_091300_create_statuses_table', 1),
(8, '2021_04_05_014021_create_anggota_table', 1),
(9, '2021_04_18_222837_create_pengumumen_table', 1),
(10, '2021_04_21_012011_create_monevs_table', 1),
(11, '2021_04_25_010109_create_monev__transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monev`
--

CREATE TABLE `monev` (
  `id_monev` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_monev` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_progress` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monev`
--

INSERT INTO `monev` (`id_monev`, `id_user`, `jenis_monev`, `status_progress`, `uraian`, `tanggal`, `file`, `feedback`, `created_at`, `updated_at`) VALUES
('1dyeBtQL', 'DOS0001', 'kendala', 'Berat', 'Variasi meningkat membuat banyak pilihan bagi konsumen menjadi lebih bervariasi, tetapi perlu diperhatikan produksi menjadi lebih kompleks', '2021-10-28 00:00:00', NULL, 'Variasi meningkat membuat banyak pilihan bagi konsumen menjadi lebih bervariasi, tetapi perlu diperhatikan produksi menjadi lebih kompleks', NULL, NULL),
('asvukLLw', 'DOS0001', 'pemasaran', 'Ada Progress', 'asdasd', '2021-04-30 00:00:00', NULL, NULL, NULL, NULL),
('iHUByGba', 'DOS0001', 'pelanggan', 'Progress Melampaui', 'adsadsadasd', '2021-05-08 00:00:00', NULL, NULL, NULL, NULL),
('kfaQmTNn', 'DOS0001', 'produk', 'Ada Progress', 'asdadasd', '2021-05-08 00:00:00', NULL, NULL, NULL, NULL),
('pO68r9b2', 'DOS0001', 'operasional', 'Progress Melampaui', 'asdasdsadasd', '2021-01-05 00:00:00', NULL, 'bagus', NULL, NULL),
('s5mELsC1', 'DOS0001', 'pemasaran', 'Progress Melampaui', 'asasdasd', '2021-05-08 00:00:00', NULL, NULL, NULL, NULL),
('ZbKqP7d5', 'DOS0001', 'pemasaran', 'Ada Progress', 'asdsadasd', '2021-03-31 00:00:00', NULL, NULL, NULL, NULL),
('zxA60j3b', 'DOS0001', 'pemasaran', 'Ada Progress', 'ASDASDAD', '2021-05-19 00:00:00', 'skL0k2PrDr64cds4AJDhbxaPiyfbwdju', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `monev_finansial`
--

CREATE TABLE `monev_finansial` (
  `id_finansial` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `jenis_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monev_finansial`
--

INSERT INTO `monev_finansial` (`id_finansial`, `id_user`, `tanggal`, `jenis_transaksi`, `keterangan_transaksi`, `jumlah`, `file`, `created_at`, `updated_at`) VALUES
('2Zy4RZ7CBC2HOrFt', 'DOS0001', '2021-05-08 00:00:00', 'Pendapatan', 'Pendapatan tunai', 232323, 'xqZyEaDiiaQieDInzW1C1Z8lzfrZ4Dur', '2021-05-07 18:00:50', '2021-05-07 18:00:50'),
('9FYnsRS5fWwGy1lL', 'DOS0001', '2021-05-19 00:00:00', 'Pendapatan', 'Pembelian bahan habis kantor', 123123, 'mCzbiGSYRRQ69OnMWMrHSiQCA1lOdVus', '2021-05-19 04:22:15', '2021-05-19 04:22:15'),
('f1MjJss06tjICMUd', 'DOS0001', '2021-05-08 01:03:09', 'Pengeluaran', 'Pembayaran hutang', 233345, 'vOQS6AmaHCCess1XONEsGKSlszmnjbIp', '2021-05-07 18:00:00', '2021-05-07 18:00:00'),
('nBDTLF354iuM7XFt', 'DOS0001', '2021-05-19 00:00:00', 'Pendapatan', 'Pendapatan tunai', 123123, 'UI5j6xgGcHZv3WyeB9kVuwStSLt8r5qv', '2021-05-19 05:46:05', '2021-05-19 05:46:05'),
('OBg4BCr2jV0op8Vg', 'DOS0001', '2021-04-06 00:00:00', 'Pendapatan', 'Pendapatan tunai', 233333, 'ATpWZoJYkhymKEDBTVAYCGZCBfLRLVaU', '2021-05-07 18:02:26', '2021-05-07 18:02:26'),
('s5ulgkIexcCQYV92', 'DOS0001', '2021-05-19 00:00:00', 'Pendapatan', 'Pembayaran packaging/pengiriman', 123123, '0', '2021-05-19 03:42:07', '2021-05-19 03:42:07');

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
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` varchar(16) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jenis_kegiatan` varchar(50) NOT NULL,
  `prestasi` varchar(50) NOT NULL,
  `tingkat_prestasi` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `id_user`, `tanggal`, `jenis_kegiatan`, `prestasi`, `tingkat_prestasi`, `file`, `created_at`, `updated_at`) VALUES
('Pmk4m7BVduys6kyI', 'DOS0001', '2021-05-20 00:00:00', 'KBMI', 'Juara 2', 'Internasional', 'HUilPtzdazIPaEvNiMwzNAJTRyy7axku', '2021-05-19 13:11:42', '2021-05-19 13:11:42'),
('pSvZO7JvvGP6ft6R', 'DOS0001', '2021-05-20 00:00:00', 'KBMI', 'Juara 1', 'Nasional', 'D8e1vQY4OMQMhhM2l6vG3Z6EMZhNLHp5', '2021-05-20 00:19:01', '2021-05-20 00:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `prodis`
--

CREATE TABLE `prodis` (
  `id_prodi` bigint(20) UNSIGNED NOT NULL,
  `nama_prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodis`
--

INSERT INTO `prodis` (`id_prodi`, `nama_prodi`, `created_at`, `updated_at`) VALUES
(1, 'D3 Teknik Perancangan dan Konstruksi Kapal', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(2, 'D3 Teknik Bangunan Kapal', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(3, 'D3 Teknik Permesinan Kapal', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(4, 'D3 Teknik Kelistrikan Kapal', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(5, 'D4 Teknik Pengelasan', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(6, 'D4 Teknik Perancangan dan Konstruksi Kapal', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(7, 'D4 Teknik Perpipaan', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(8, 'D4 Teknik Permesinan Kapal', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(9, 'D4 Teknik Otomasi', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(10, 'D4 Teknik Kelistrikan Kapal', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(11, 'D4 Teknik Keselamatan dan Kesehatan Kerja', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(12, 'D4 Teknik Pengolahan Limbah', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(13, 'D4 Teknik Desain dan Manufaktur', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(14, 'D4 Manajemen Bisnis', '2021-04-25 08:25:39', '2021-04-25 08:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `jenis_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id_status`, `jenis_status`, `created_at`, `updated_at`) VALUES
(1, 'Mahasiswa', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(2, 'Dosen', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(3, 'Alumni', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(4, 'Mitra', '2021-04-25 08:25:39', '2021-04-25 08:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `role`, `email_verified_at`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
('ADM001', 'fb@gmail.com', '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72', 1, NULL, 'ABVDE322', NULL, '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
('admin', 'admin@admin.com', '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72', 0, NULL, '-', NULL, '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
('DOS0001', 'google@gmail.com', '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72', 2, NULL, '7ZWEFLBJ', NULL, '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
('MHS0002', 'reza123@gmail.com', '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72', 1, NULL, 'VAQYSCZH', NULL, '2021-05-06 02:20:40', '2021-05-06 02:20:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `detail_users`
--
ALTER TABLE `detail_users`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monev`
--
ALTER TABLE `monev`
  ADD PRIMARY KEY (`id_monev`);

--
-- Indexes for table `monev_finansial`
--
ALTER TABLE `monev_finansial`
  ADD PRIMARY KEY (`id_finansial`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD UNIQUE KEY `pengumuman_kode_unique` (`kode`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id_prodi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id_status` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

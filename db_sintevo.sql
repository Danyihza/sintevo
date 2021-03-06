-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 04:44 PM
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
(2, 'DOS0001', 'Budi Santoso', 3, NULL, '1234', 'CFO', '2021-05-06 03:39:35', '2021-06-30 06:05:05'),
(5, 'DOS0001', 'Dany Ahmad Ihza Prakoso', 2, 1, '4343434', 'CEO', '2021-06-30 06:04:36', '2021-07-09 07:45:44'),
(7, 'DOS0001', 'Dany', 2, 15, '0', 'adsada', '2021-07-09 07:48:59', '2021-07-09 07:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_pengumuman`
--

CREATE TABLE `dashboard_pengumuman` (
  `id` int(11) NOT NULL,
  `file` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashboard_pengumuman`
--

INSERT INTO `dashboard_pengumuman` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'NqXMFAz22qrUb7DB3dej2ZVms4EbTZuo', '2021-07-06 14:07:43', '2021-07-06 14:15:57');

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
  `gambar` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_users`
--

INSERT INTO `detail_users` (`id_detail`, `kategori`, `nama_brand`, `deskripsi`, `alamat`, `nama_ketua`, `no_whatsapp`, `status`, `prodi`, `website`, `instagram`, `gambar`, `created_at`, `updated_at`) VALUES
('DOS0001', 1, 'Aftermeet Academy 2.0', 'testing', 'Desa Rondokuning Kraksaan Kabupaten Probolinggo Jawa Timur', 'Dany Ahmad', '082331147549', 2, NULL, NULL, NULL, 'DOS0001_1625032588.png', '2021-04-25 08:25:39', '2021-07-08 15:05:10'),
('DOS0003', 7, 'EatSambel', 'adadadsbfdfg', 'Testing', 'Arini Firdausiyah', '082331147549', 2, 13, NULL, NULL, 'DOS0003_1624996560.png', '2021-06-29 19:53:53', '2021-06-29 19:56:00');

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
('1VUchgAicCYUva2N5JFGsZoou2OAGQa2', 'admin', 'unnamed.png', 'assets/file/1VUchgAicCYUva2N5JFGsZoou2OAGQa2', '2021-07-02 13:38:50', '2021-07-02 13:38:50'),
('3SBmJB6zJD9BWPIMwdkGQoEMOl7wGGgp', 'DOS0001', 'Tugas 6_185150701111017_Dany Ahmad Ihza Prakoso_AWS ECS.pdf', 'assets/file/3SBmJB6zJD9BWPIMwdkGQoEMOl7wGGgp', '2021-05-08 00:38:02', '2021-05-08 00:38:02'),
('5U7zGFgiK2eLHm5sLDULMcnmzELur3V4', 'DOS0001', 'ti.png', 'assets/file/5U7zGFgiK2eLHm5sLDULMcnmzELur3V4', '2021-07-09 15:25:11', '2021-07-09 15:25:11'),
('6k6vqMJEmtUHXxs8NfLdFi3nzOh527ut', 'admin', 'Cheese_PNG_Clipart-3141.png', 'assets/file/6k6vqMJEmtUHXxs8NfLdFi3nzOh527ut', '2021-07-02 20:51:34', '2021-07-02 20:51:34'),
('AGjaFFtFUTdgplBCH7T0RXB8u1nztF3T', 'admin', 'asdadasdas.png', 'assets/file/AGjaFFtFUTdgplBCH7T0RXB8u1nztF3T', '2021-06-20 13:22:32', '2021-06-20 13:22:32'),
('AMwSYxiQhvWy2QyGW0fSCnpm2FbSM9YW', 'DOS0001', 'Cheese_PNG_Clipart-3141.png', 'assets/file/AMwSYxiQhvWy2QyGW0fSCnpm2FbSM9YW', '2021-06-22 01:57:04', '2021-06-22 01:57:04'),
('DY8P6UwUYmCMdWOzt9yDHlXZzkpQzKd7', 'admin', 'asdasdasd.png', 'assets/file/DY8P6UwUYmCMdWOzt9yDHlXZzkpQzKd7', '2021-06-19 23:36:12', '2021-06-19 23:36:12'),
('epFvDNPIsBlkfLkmcFLtZo0tt7njbeSO', 'admin', 'unnamed.png', 'assets/file/epFvDNPIsBlkfLkmcFLtZo0tt7njbeSO', '2021-07-02 21:04:21', '2021-07-02 21:04:21'),
('HE2Kx4tJCAGwWrsHtfHI2MxNIYFXJL3k', 'DOS0001', 'hasil.xlsx', 'assets/file/HE2Kx4tJCAGwWrsHtfHI2MxNIYFXJL3k', '2021-07-08 02:13:44', '2021-07-08 02:13:44'),
('JGM9NX2qgiXLhn4pOKyZNfnPG7x0HMv5', 'DOS0001', 'Tugas 6_185150701111017_Dany Ahmad Ihza Prakoso_AWS ECS.pdf', 'assets/file/JGM9NX2qgiXLhn4pOKyZNfnPG7x0HMv5', '2021-05-08 00:39:23', '2021-05-08 00:39:23'),
('jHUKWzN9yn3sJW8o7ss4ZmM2A17nyONW', 'admin', '176-0.jpg', 'assets/file/jHUKWzN9yn3sJW8o7ss4ZmM2A17nyONW', '2021-06-19 02:14:49', '2021-06-19 02:14:49'),
('JUvvAcy2NG7gSIHDrbtNDaqjewVtuCO9', 'DOS0001', 'banner_img.png', 'assets/file/JUvvAcy2NG7gSIHDrbtNDaqjewVtuCO9', '2021-05-19 13:11:00', '2021-05-19 13:11:00'),
('lPo2ZvWEixKSnXASqks9Ox1yX5DdPi6z', 'DOS0001', 'Template Laporan Akhir PKMV 2021.pdf', 'assets/file/lPo2ZvWEixKSnXASqks9Ox1yX5DdPi6z', '2021-06-24 19:10:24', '2021-06-24 19:10:24'),
('LvqRhOUoc9IrZK8pZjiGCUh542QXcMxo', 'DOS0001', '215-388-1-SM.pdf', 'assets/file/LvqRhOUoc9IrZK8pZjiGCUh542QXcMxo', '2021-07-08 02:07:47', '2021-07-08 02:07:47'),
('NqXMFAz22qrUb7DB3dej2ZVms4EbTZuo', 'admin', 'Pedoman Pelaksanaan Kurikulum TI-FILKOM 2020.pdf', 'assets/file/NqXMFAz22qrUb7DB3dej2ZVms4EbTZuo', '2021-07-06 21:15:57', '2021-07-06 21:15:57'),
('NrxW79aRdfl7rAI8Nfq4sVUnmQ4zTtis', 'admin', 'asdasdasd.png', 'assets/file/NrxW79aRdfl7rAI8Nfq4sVUnmQ4zTtis', '2021-06-19 23:32:19', '2021-06-19 23:32:19'),
('oSWPLqGunlILzcy0qJNEnwOOclGVwRR3', 'admin', 'aldo.jpeg', 'assets/file/oSWPLqGunlILzcy0qJNEnwOOclGVwRR3', '2021-06-20 10:25:04', '2021-06-20 10:25:04'),
('qRsxwlN0TynCHlfK19NDI3KrN7ZpAYsO', 'DOS0001', 'Aftermeet Academy 2.0 History Inkubasi.xlsx', 'assets/file/qRsxwlN0TynCHlfK19NDI3KrN7ZpAYsO', '2021-07-08 01:57:24', '2021-07-08 01:57:24'),
('rg2z6OGR0GT0mAyJ5Ob83Kth4tOv1NCn', 'admin', 'aldo.jpeg', 'assets/file/rg2z6OGR0GT0mAyJ5Ob83Kth4tOv1NCn', '2021-06-19 10:23:09', '2021-06-19 10:23:09'),
('rmdl9KI7VLQX34pkxyYaTAltP6laEbsC', 'DOS0001', 'Template Laporan Akhir PKMV 2021.pdf', 'assets/file/rmdl9KI7VLQX34pkxyYaTAltP6laEbsC', '2021-06-24 19:07:08', '2021-06-24 19:07:08'),
('RpRfxVmwbkoAVC2pcVpWvWxSuE62iXM6', 'DOS0001', 'WhatsApp Image 2021-07-01 at 8.48.19 PM.jpeg', 'assets/file/RpRfxVmwbkoAVC2pcVpWvWxSuE62iXM6', '2021-07-09 21:43:11', '2021-07-09 21:43:11'),
('TniBbKBptwyMULJFoojCAvvIQo7cCqGj', 'admin', 'Template Laporan Akhir PKMV 2021.pdf', 'assets/file/TniBbKBptwyMULJFoojCAvvIQo7cCqGj', '2021-06-23 14:28:12', '2021-06-23 14:28:12'),
('uRLh5VU5HqmU5R9a9kes31N2NlFxWn8K', 'DOS0001', '400 (1).jpeg', 'assets/file/uRLh5VU5HqmU5R9a9kes31N2NlFxWn8K', '2021-05-19 13:09:46', '2021-05-19 13:09:46'),
('vDxTZ6uW5y9gJDMPkjo4sC67YLavGHMZ', 'DOS0001', 'Data Seluruh Tenant.xlsx', 'assets/file/vDxTZ6uW5y9gJDMPkjo4sC67YLavGHMZ', '2021-07-08 02:05:05', '2021-07-08 02:05:05'),
('y6BMSmU0QAgBRN4rGU34IkXCAbdyw0EY', 'DOS0001', 'WhatsApp Image 2020-09-09 at 9.46.44 AM.jpeg', 'assets/file/y6BMSmU0QAgBRN4rGU34IkXCAbdyw0EY', '2021-06-24 19:21:09', '2021-06-24 19:21:09'),
('Y7MYIUBQKCv37zx8hfSn3Zwn5mo39Eqk', 'admin', '285-2855629_profile-clipart-hd-png-download.png', 'assets/file/Y7MYIUBQKCv37zx8hfSn3Zwn5mo39Eqk', '2021-06-19 23:37:24', '2021-06-19 23:37:24'),
('YrvnHq6pD0OVOYUaSYLsnl10nXCEeTL0', 'DOS0001', '400 (1).jpeg', 'assets/file/YrvnHq6pD0OVOYUaSYLsnl10nXCEeTL0', '2021-05-19 13:10:27', '2021-05-19 13:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `file_monev`
--

CREATE TABLE `file_monev` (
  `id_filemonev` varchar(128) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `jenis_kegiatan` varchar(128) NOT NULL,
  `keterangan_file` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `feedback` text DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_monev`
--

INSERT INTO `file_monev` (`id_filemonev`, `id_user`, `jenis_kegiatan`, `keterangan_file`, `file`, `feedback`, `tanggal`, `created_at`, `updated_at`) VALUES
('ySIunJRpElNBke0Q', 'DOS0002', 'KBMI', 'Lembar Pengesahan', 'mVrJwLVlJaVrulXsV3r4YNnbzfT7HmTI', NULL, '2021-06-20 17:00:00', '2021-06-20 17:39:09', '2021-06-20 17:39:09');

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
(9, 'Pertahanan Keamanan', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(10, 'Pendidikan', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(11, 'Maritim', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(12, 'Pertanian', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(13, 'Industri Kreatif', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(14, 'Food and Beverage', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(15, 'Jasa', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(16, 'Kesehatan', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(17, 'Multidisiplin dan Lintas Sektoral', '2021-04-25 08:25:39', '2021-04-25 08:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `kelulusan`
--

CREATE TABLE `kelulusan` (
  `id_kelulusan` varchar(128) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `kelulusan` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelulusan`
--

INSERT INTO `kelulusan` (`id_kelulusan`, `id_user`, `kelulusan`, `file`, `created_at`, `updated_at`) VALUES
('gIm4cFI9xxf48hRgpQNexkVsLvEPv7K3', 'DOS0001', 'Sertifikat Kelulusan 2.0', '6k6vqMJEmtUHXxs8NfLdFi3nzOh527ut', '2021-07-02 13:51:34', '2021-07-02 13:51:34'),
('WfNrll2pALmaPo1SsxLRBA7kgoQdJG2N', 'DOS0001', 'Sertifikat Kelulusan', 'epFvDNPIsBlkfLkmcFLtZo0tt7njbeSO', '2021-07-02 14:04:21', '2021-07-02 14:04:21');

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
('1dyeBtQL', 'DOS0001', 'kendala', 'Ringan', 'Variasi meningkat membuat banyak pilihan bagi konsumen menjadi lebih bervariasi, tetapi perlu diperhatikan produksi menjadi lebih kompleks', '2021-07-08 00:00:00', 'qRsxwlN0TynCHlfK19NDI3KrN7ZpAYsO', 'Variasi meningkat membuat banyak pilihan bagi konsumen menjadi lebih bervariasi, tetapi perlu diperhatikan produksi menjadi lebih kompleks', NULL, '2021-07-07 18:57:24'),
('1YtKq2Bk', 'DOS0001', 'operasional', 'Ada Progress', 'asdsadasdasd', '2021-07-08 00:00:00', 'vDxTZ6uW5y9gJDMPkjo4sC67YLavGHMZ', NULL, '2021-07-07 19:04:53', '2021-07-07 19:05:05'),
('asvukLLw', 'DOS0001', 'pemasaran', 'Tidak Ada Progress', 'asdasdas', '2021-07-09 00:00:00', 'HE2Kx4tJCAGwWrsHtfHI2MxNIYFXJL3k', NULL, NULL, '2021-07-09 13:22:24'),
('GG8z2GGl', 'DOS0001', 'produk', 'Ada Progress', 'asdsad', '2021-07-09 00:00:00', NULL, NULL, NULL, '2021-07-09 13:32:54'),
('iHUByGba', 'DOS0001', 'pelanggan', 'Progress Melampaui', 'adsadsadasd', '2021-05-08 00:00:00', NULL, NULL, NULL, NULL),
('ppRR8rQe', 'DOS0001', 'produk', 'Tidak Ada Progress', 'asdsadasd', '2021-06-24 00:00:00', NULL, NULL, NULL, NULL),
('pUhb09bM', 'DOS0001', 'operasional', 'Progress Melampaui', 'asdadasd', '2021-06-24 00:00:00', 'y6BMSmU0QAgBRN4rGU34IkXCAbdyw0EY', NULL, '2021-06-24 12:21:09', '2021-06-24 12:21:09'),
('XiSyPCzF', 'DOS0001', 'pelanggan', 'Ada Progress', 'asdsadadad', '2020-12-28 00:00:00', 'LvqRhOUoc9IrZK8pZjiGCUh542QXcMxo', NULL, '2021-06-28 12:31:26', '2021-07-07 19:07:58');

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
('mWwUScDfCkWDkR1h', 'DOS0001', '2021-07-09 00:00:00', 'Pengeluaran', 'Pembayaran biaya promosi/pemasaran', 123123, 'RpRfxVmwbkoAVC2pcVpWvWxSuE62iXM6', '2021-07-09 14:43:11', '2021-07-09 14:43:11'),
('N51TMnn2JnzyXWx1', 'DOS0001', '2021-02-28 00:00:00', 'Pendapatan', 'Pendapatan tunai', 1000000, 'AMwSYxiQhvWy2QyGW0fSCnpm2FbSM9YW', '2021-06-21 18:57:04', '2021-06-22 02:42:00');

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
  `file` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `kode`, `pengumuman`, `file`, `created_at`, `end_at`, `updated_at`) VALUES
('1EFS0cJgQuGEi4rb', 'Ratatata', 'atatatatatat', '1VUchgAicCYUva2N5JFGsZoou2OAGQa2', '2021-07-02 06:38:50', '2021-07-01 17:00:00', '2021-07-02 06:38:50'),
('Eye9Ep6T6bvJF9Ru', 'PKMV', 'Buku Panduan PKMV 2021', 'NrxW79aRdfl7rAI8Nfq4sVUnmQ4zTtis', '2021-06-19 16:32:19', NULL, '2021-06-19 16:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `petunjuk_teknis`
--

CREATE TABLE `petunjuk_teknis` (
  `id_juknis` varchar(128) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petunjuk_teknis`
--

INSERT INTO `petunjuk_teknis` (`id_juknis`, `kode`, `file`, `created_at`, `updated_at`) VALUES
('womRs2IrvyUJbrPZ', 'PKMV', 'TniBbKBptwyMULJFoojCAvvIQo7cCqGj', '2021-06-23 07:28:12', '2021-06-23 07:28:12');

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
('I4jigsAfk8tuLhVy', 'DOS0001', '2021-07-09 00:00:00', 'KBMI', 'Juara 3', 'Kampus', '5U7zGFgiK2eLHm5sLDULMcnmzELur3V4', '2021-07-09 15:25:11', '2021-07-09 15:25:11');

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
(14, 'D4 Manajemen Bisnis', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(15, 'Lainnya', '2021-04-25 08:25:39', '2021-04-25 08:25:39');

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
(2, 'Mahasiswa', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(3, 'Dosen', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(4, 'Alumni', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
(5, 'Mitra', '2021-04-25 08:25:39', '2021-04-25 08:25:39');

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
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `role`, `email_verified_at`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
('ADM0001', 'fb@gmail.com', '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72', 1, NULL, 'ABVDE322', NULL, '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
('ADM0002', 'jojoko', '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72', 1, NULL, NULL, NULL, '2021-07-03 05:51:16', '2021-07-03 05:51:16'),
('admin', 'admin@gmail.com', '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72', 0, NULL, '-', NULL, '2021-04-25 08:25:39', '2021-07-03 05:39:07'),
('DOS0001', 'google@gmail.com', '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72', 2, NULL, '7ZWEFLBJ', NULL, '2021-04-25 08:25:39', '2021-06-29 19:18:50'),
('DOS0003', 'danyahmadihza99@gmail.com', '6f190e0aa1044a83cbead45ed26b9d2adbe99f8a503c2e99b0442b293ad9dab4', 2, NULL, '05FYBTW3', NULL, '2021-06-29 19:53:53', '2021-06-29 19:53:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `dashboard_pengumuman`
--
ALTER TABLE `dashboard_pengumuman`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `file_monev`
--
ALTER TABLE `file_monev`
  ADD PRIMARY KEY (`id_filemonev`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelulusan`
--
ALTER TABLE `kelulusan`
  ADD PRIMARY KEY (`id_kelulusan`);

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
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `petunjuk_teknis`
--
ALTER TABLE `petunjuk_teknis`
  ADD PRIMARY KEY (`id_juknis`);

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
  MODIFY `id_anggota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dashboard_pengumuman`
--
ALTER TABLE `dashboard_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id_prodi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id_status` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

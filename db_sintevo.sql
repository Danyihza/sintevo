-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 04:17 PM
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
(1, 'DOS0001', 'Dany Ahmad Ihza Prakoso', 1, 3, '12124213', 'CEO', '2021-04-25 08:25:39', '2021-04-25 08:25:39'),
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
  `nama_file` varchar(255) NOT NULL,
  `path_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monev`
--

INSERT INTO `monev` (`id_monev`, `id_user`, `jenis_monev`, `status_progress`, `uraian`, `tanggal`, `path`, `nama_file`, `feedback`, `created_at`, `updated_at`) VALUES
('5BVy9QdT', 'DOS0001', 'operasional', 'Tidak Ada Progress', 'asdasdasd', '06/05/2021', NULL, NULL, 'sip ditingkatkan lagi', NULL, NULL),
('Kde8CzfK', 'DOS0001', 'pemasaran', 'Ada Progress', 'rtesdad', '06/05/2021', NULL, NULL, 'Ulangi lagi pada tahap berikutnya', NULL, NULL),
('ld5Uji7F', 'DOS0001', 'operasional', 'Progress Melampaui', 'trasdasd', '20/05/2021', 'assets/file/monev/mPW5eu0aFZT31Dxqas9h5oKIDreYFnOf', 'Tugas 6_185150701111017_Dany Ahmad Ihza Prakoso_AWS ECS.pdf', 'waw keren banget', NULL, NULL),
('nKLnVd9X', 'DOS0001', 'produk', 'Tidak Ada Progress', 'asdasdd', '16/04/2021', 'assets/file/monev/aHTORpaPuZeilsUhbMsfPda5lPTFAgFW', 'TITIK PENYEKATAN NEW PAK DIR.pdf', 'sip lanjutkan', NULL, NULL),
('UpW27Usd', 'DOS0001', 'kendala', 'Sedang', '3232323', '07/05/2021', NULL, NULL, 'Verified 👶', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `monev_finansial`
--

CREATE TABLE `monev_finansial` (
  `id_finansial` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `path_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monev_finansial`
--

INSERT INTO `monev_finansial` (`id_finansial`, `id_user`, `tanggal`, `jenis_transaksi`, `keterangan_transaksi`, `jumlah`, `path_file`, `origin_file`, `created_at`, `updated_at`) VALUES
('7CYDJTFXLcwmsi5F', 'DOS0001', '25/04/2021', 'Pendapatan', 'Pembayaran packaging/pengiriman', 123123, 'assets/file/monev/BrotSVATLMUw4qx5giG7UpYFKi4MIJE7', 'home.jpg', '2021-04-25 08:29:59', '2021-04-25 08:29:59'),
('PsdkFRx2SmRSgsrb', 'DOS0001', '27/04/2021', 'Pengeluaran', 'Pendapatan uang muka oleh konsumen', 30000, 'assets/file/monev/ClPa1S28RPqb4Tx7yu8JWtGjXBkaoTdn', 'threed_mockup (1).png', '2021-04-25 18:56:29', '2021-04-25 18:56:29');

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

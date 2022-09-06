-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 09:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukti_transaksi`
--

CREATE TABLE `bukti_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `resi_id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_wisata`
--

CREATE TABLE `daftar_wisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_wisata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL,
  `harga` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_wisata`
--

INSERT INTO `daftar_wisata` (`id`, `nama_wisata`, `deskripsi`, `jam`, `kuota`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'River Tubing Adventure', 'Merupakan wisata air beregu yang didampingin oleh pendamping. Wisata yang dilakukan adalah melakukan susur sungai Pusur dengan jarak tertentu', '08.00', 100, '30000', 'fotowisata\\RTPA.jpeg', '2022-08-06 02:27:26', '2022-08-06 02:27:26'),
(2, 'River Tubing Adventure', 'Merupakan wisata air beregu yang didampingin oleh pendamping. Wisata yang dilakukan adalah melakukan susur sungai Pusur dengan jarak tertentu', '13.00', 100, '30000', 'fotowisata\\RTPA.jpeg', '2022-08-06 02:27:40', '2022-08-06 02:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `fasilitas_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fasilitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `fasilitas`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Makan', '10000', '2022-08-06 02:27:06', '2022-08-06 02:27:06'),
(2, 'Outbound', '30000', '2022-08-06 02:27:10', '2022-08-06 02:27:10'),
(3, 'Fun Tubing', '15000', '2022-08-06 23:55:39', '2022-08-06 23:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitaswisata`
--

CREATE TABLE `fasilitaswisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitaswisata`
--

INSERT INTO `fasilitaswisata` (`id`, `wisata_id`, `fasilitas_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2022-08-06 02:27:46', '2022-08-06 02:27:46'),
(2, '1', '2', '2022-08-06 02:27:51', '2022-08-06 02:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_11_032425_pemesanan', 1),
(6, '2022_04_13_164537_resi_pembayaran', 1),
(7, '2022_04_14_231814_bukti_transaksi', 1),
(8, '2022_04_15_000949_tiket', 1),
(9, '2022_04_18_033619_fasilitas', 1),
(10, '2022_05_16_164000_show_detail', 1),
(11, '2022_05_19_102923_wisata', 1),
(12, '2022_06_23_175935_kegiatan', 1),
(13, '2022_07_01_012450_create_contacts_table', 1),
(14, '2022_07_02_005446_create_table_fasilitas_wisata', 1),
(15, '2022_07_02_014007_daftar_wisata', 1),
(16, '2022_07_05_172046_transaksi', 1),
(17, '2022_07_05_172715_transaksi_wisata', 1),
(18, '2022_07_06_025319_transaksi_fasilitas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal_Kunjungan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tagihan` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pemesanan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reschedule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refund` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `ID_User` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resi_pembayaran`
--

CREATE TABLE `resi_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `fasilitas_id` bigint(20) UNSIGNED NOT NULL,
  `Tanggal_Kunjungan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tagihan` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `resi_id` bigint(20) UNSIGNED NOT NULL,
  `bukti_transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `fasilitas_id` bigint(20) UNSIGNED NOT NULL,
  `Tanggal_Kunjungan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_tr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal_Kunjungan` date NOT NULL,
  `jam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tagihan` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pemesanan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reschedule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_tr`, `users_id`, `wisata_id`, `Tanggal_Kunjungan`, `jam`, `jumlah`, `tagihan`, `status_pemesanan`, `reschedule`, `bukti_transaksi`, `waktu_transaksi`, `note`, `created_at`, `updated_at`) VALUES
(6, 'WP-62ee6e184cbd5', 2, '1', '2022-08-12', '08.00', 40, '2400000', 'Pending', '-', 'Belum Melakukan Transaksi', '2022-08-06 13:35:20', '-', '2022-08-06 06:35:20', '2022-08-06 06:35:20'),
(7, 'WP-62ee6fa4eb8e8', 2, '1', '2022-08-12', '13.00', 5, '200000', 'Pending', '-', 'Belum Melakukan Transaksi', '2022-08-06 13:41:56', '-', '2022-08-06 06:41:56', '2022-08-06 06:41:56'),
(8, 'WP-62ee7d00890b6', 2, '1', '2022-08-12', '08.00', 5, '300000', 'Berhasil Pesan', '-', 'fotowisata\\struk.jpg', '2022-08-06 21:38:56', '-', '2022-08-06 14:38:56', '2022-08-06 08:02:13'),
(10, 'WP-62ef628b0de0c', 3, '1', '2022-08-19', '08.00', 35, '1400000', 'Pemesanan Selesai', '-', 'fotowisata\\struk.jpg', '2022-08-07 13:58:19', '-', '2022-08-07 06:58:19', '2022-08-07 00:01:13'),
(11, 'WP-62f08402aca39', 2, '1', '2022-08-19', '08.00', 40, '2400000', 'Pending', '-', 'Belum Melakukan Transaksi', '2022-08-08 10:33:22', '-', '2022-08-08 03:33:22', '2022-08-08 03:33:22'),
(12, 'WP-62f45a7098520', 2, '1', '2022-08-19', '08.00', 3, '120000', 'Pending', '-', 'Belum Melakukan Transaksi', '2022-08-11 08:25:04', '-', '2022-08-11 01:25:04', '2022-08-11 01:25:04'),
(13, 'WP-62f9eea2069f1', 2, '1', '2022-08-18', '08.00', 3, '120000', 'Berhasil Pesan', '-', 'fotowisata\\struk.jpg', '2022-08-15 13:58:42', '-', '2022-08-15 06:58:42', '2022-08-14 23:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksifasilitas`
--

CREATE TABLE `transaksifasilitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fasilitas_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksifasilitas`
--

INSERT INTO `transaksifasilitas` (`id`, `fasilitas_id`, `trx_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2022-08-06 02:28:31', '2022-08-06 02:28:31'),
(2, '2', '2', '2022-08-06 02:29:33', '2022-08-06 02:29:33'),
(3, '1', '3', '2022-08-06 02:30:43', '2022-08-06 02:30:43'),
(4, '1', '4', '2022-08-06 02:35:36', '2022-08-06 02:35:36'),
(5, '1', '5', '2022-08-06 06:32:59', '2022-08-06 06:32:59'),
(6, '2', '6', '2022-08-06 06:35:20', '2022-08-06 06:35:20'),
(7, '1', '7', '2022-08-06 06:41:56', '2022-08-06 06:41:56'),
(8, '2', '8', '2022-08-06 14:38:56', '2022-08-06 14:38:56'),
(9, '1', '9', '2022-08-06 14:44:22', '2022-08-06 14:44:22'),
(10, '1', '10', '2022-08-07 06:58:19', '2022-08-07 06:58:19'),
(11, '2', '11', '2022-08-08 03:33:22', '2022-08-08 03:33:22'),
(12, '1', '12', '2022-08-11 01:25:04', '2022-08-11 01:25:04'),
(13, '1', '13', '2022-08-15 06:58:42', '2022-08-15 06:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `transaksiwisata`
--

CREATE TABLE `transaksiwisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 1, '$2y$10$7IHvjnIr2zJ7tBeb9/u.feJdQXDI5jc04OOn1U5iYCtoDHmhuu/wy', NULL, '2022-08-06 02:26:07', '2022-08-06 02:26:07'),
(2, 'Dita', 'dita@gmail.com', NULL, 0, '$2y$10$4AcsK4ohpxupXcUfCWH8XOjPNRvoDiI.nB1FBU2dJWRmakPdfpRnK', NULL, '2022-08-06 02:26:07', '2022-08-06 02:26:07'),
(3, 'Ilva', 'ilva@gmail.com', NULL, 0, '$2y$10$0imLAAKYYdKHe0LfFuVgGew8f2p8lWT1G5UY07CdfX4q4LnAAH4fC', NULL, '2022-08-06 23:56:32', '2022-08-06 23:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_wisata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL,
  `harga` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_transaksi`
--
ALTER TABLE `bukti_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_wisata`
--
ALTER TABLE `daftar_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitaswisata`
--
ALTER TABLE `fasilitaswisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
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
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`ID_User`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `resi_pembayaran`
--
ALTER TABLE `resi_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksifasilitas`
--
ALTER TABLE `transaksifasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksiwisata`
--
ALTER TABLE `transaksiwisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukti_transaksi`
--
ALTER TABLE `bukti_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_wisata`
--
ALTER TABLE `daftar_wisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fasilitaswisata`
--
ALTER TABLE `fasilitaswisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `ID_User` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resi_pembayaran`
--
ALTER TABLE `resi_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksifasilitas`
--
ALTER TABLE `transaksifasilitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksiwisata`
--
ALTER TABLE `transaksiwisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2019 at 02:28 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lapakdesa`
--

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_12_22_042543_create_usaha_table', 1),
(9, '2018_12_22_042607_create_produk_table', 1),
(10, '2018_12_22_042632_create_transaksi_table', 1);

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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `usaha_id` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_pic.jpg',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `harga`, `usaha_id`, `gambar`, `aktif`, `created_at`, `updated_at`) VALUES
(3, 'Keripik Jeruk', 'Keripik asli ekstrak buah jeruk mantap kali ini mon', 50000, 1, '1311353398/produk-1545653533', 1, '2018-12-23 01:28:07', '2018-12-24 05:12:13'),
(4, 'Jus Apple Nokrowakyo', 'Minuman dari ekstrak apel segar kota Malang', 25000, 2, '1772966617/produk-1545652848', 1, '2018-12-24 01:40:35', '2018-12-24 05:00:48'),
(5, 'Pie Apple Bukan Kaleng-kaleng', 'Produk Pie dari ekstrak buah apel kota Malang, wew...good', 60000, 2, '885957386/produk-1545653004', 1, '2018-12-24 01:42:04', '2018-12-24 05:03:24'),
(10, 'Jus Jeruk Owey', 'Jus Jeruk yang beda dari yang lainnya', 20000, 1, '1800236790/produk-1545649903', 1, '2018-12-24 04:11:43', '2018-12-24 04:11:43'),
(11, 'Kursi', 'kursi', 100000, 3, '1528158461/produk-1545834047', 1, '2018-12-26 07:20:48', '2018-12-26 07:20:48'),
(12, 'Meja', 'Meja bisa panjang -> pendek dan sebaliknya', 200000, 3, '362664072/produk-1545835203', 1, '2018-12-26 07:40:03', '2018-12-26 07:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `usaha_id` int(11) NOT NULL,
  `nama_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `status_bayar` tinyint(1) NOT NULL DEFAULT '0',
  `status_kirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `produk_id`, `usaha_id`, `nama_tujuan`, `nohp_tujuan`, `alamat_tujuan`, `jumlah_beli`, `total_biaya`, `status_bayar`, `status_kirim`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 1, 'Fandi', '081283123', 'Sudimoro, Malang', 1, 50000, 0, 'menunggu', '2018-12-23 21:42:54', '2018-12-24 01:20:07'),
(4, 1, 5, 2, 'Bruce Wayne', '0823782', 'Gotham City', 5, 200000, 0, 'menunggu', '2018-12-24 02:38:39', '2018-12-24 02:38:39'),
(5, 3, 5, 2, 'Fandi', '081283123', 'Sudimoro, Malang', 1, 60000, 0, 'menunggu', '2018-12-26 09:07:08', '2018-12-26 09:07:08'),
(6, 3, 3, 1, 'Fandi', '081283123', 'Sudimoro, Malang', 2, 100000, 0, 'menunggu', '2018-12-26 21:20:17', '2018-12-26 21:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

CREATE TABLE `usaha` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terverifikasi` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usaha`
--

INSERT INTO `usaha` (`id`, `user_id`, `deskripsi`, `desa`, `terverifikasi`) VALUES
(1, 7, 'OrangeStore merupakan usaha yang menyediakan berbagai olahan jeruk seperti keripik, kue, minuman, dan lainnya.', 'sumbersekar', 1),
(2, 8, 'AppleGood adalah usaha yang menyediakan berbagai olahan apel seperti keripik, jajanan, manisan, minuman, dan lain sebagainya.', 'sumbersekar', 1),
(3, 9, 'Toko meja kursi', 'sumbersekar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'account.png',
  `role` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `alamat`, `no_hp`, `password`, `avatar`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dummy', 'user123', 'user123@mail.com', 'Dau, Malang', '08987654321', '$2y$10$ophQo4PnSWOdgZlQubY78.I3KmQF0lZ1zr/pLwl0Jd2TEH6zwZajC', 'account.png', 1, 'jzVL9mQ1l5cX0DmsVtZ5SdzGjA4wZem5I5dIv7lx22solcKucrNFd8KP2C8P', '2018-12-21 21:38:50', '2018-12-24 02:45:36'),
(2, 'AdminSumbersekar', 'adminss', 'adminss@mail.com', 'Dau, Malang', '08123456789', '$2y$10$55RNWhAtE7E92U9Jf5eh.O8qKSKCc7WRjVt.k90Xh2MWEKnWnf2J.', 'account.png', 2, 'BeFp9b3GlLSilurdr5Hxaqly69BWVFhrOZQaeS0vyDTvMjGoIJ5VWmPIkiWC', '2018-12-21 21:38:50', '2018-12-21 21:38:50'),
(3, 'Fandi', 'fandi123', 'fandi123@mail.com', 'Sudimoro, Malang', '081283123', '$2y$10$9jhXd2rqhFae3IJCJ.10JOu7nvfHh8Ye45blsWZMa7ZEAPe0rGQx2', 'account.png', 1, '8UCglBNoQQy3rVDP0LLhiwtsM5T9NMMsI7hAVK4n4KcwgrqHTzje33JobPU9', '2018-12-22 03:44:44', '2018-12-23 23:01:35'),
(7, 'OrangeStore', 'orangestore', 'orangestore@mail.com', 'Dau, Malang', '08123727123', '$2y$10$tKWV9/k2FySSzLyExIplr.IJXxsEQr3Tnp4oBRHwf0HGGm93sKUUu', 'usaha-1545653280.png', 3, 'l34U1GYo7X1NnFKKSfk3Uvt1HlNYakbd49hDwnY4i3AoqlQEmhAQoya8uSRu', '2018-12-22 03:53:14', '2018-12-24 05:08:00'),
(8, 'AppleGood', 'applegood', 'applegood@mail.com', 'Dau, Malang', '082831728312', '$2y$10$aS9smrtP9DwweLKqBEtKSuJ7H5k1PAya1ZCj1WNm7FDs9eV2knvyi', 'usaha-1545653169.jpg', 3, 'V4RMhwAQNbBhrasjUKzvwvRz96os9GNTWwBTxVmCQZF61E11vLK2X8h2nGDW', '2018-12-24 01:21:57', '2018-12-24 05:06:09'),
(9, 'TokoKalian', 'tokokalian', 'tokokalian@mail.com', 'Sudimoro, Malang', '081982371231', '$2y$10$7MHs1Yx7V3pxP.vo.MMLjuK1jUnRdtCO0uhFKv0GqGZ9ZOQjNf.0C', 'usaha-1545835623.jpg', 3, 'ITT2zMGEcYZJCbwhwWAXJ59FlpxH9kNVvdPtPnCC2QjDH2lu5ZUpUl2T64Rx', '2018-12-26 06:47:38', '2018-12-26 07:47:03');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

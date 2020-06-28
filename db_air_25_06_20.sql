-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2020 pada 15.30
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_air`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id` int(10) UNSIGNED NOT NULL,
  `harga_pakai` int(11) NOT NULL,
  `harga_beban` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`id`, `harga_pakai`, `harga_beban`, `created_at`, `updated_at`) VALUES
(1, 3000, 4000, '2019-10-09 22:28:37', '2019-10-09 22:28:37');

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
(3, '2019_08_20_101803_create_pelanggan_table', 1),
(4, '2019_09_04_130529_create_transaksi_table', 2),
(5, '2019_09_04_131801_create_harga_table', 2),
(6, '2019_09_04_140307_update_table_user_add_status', 2),
(7, '2019_10_13_125619_update_transaksi_table', 3),
(8, '2019_10_14_090959_create_tagihan_table', 4),
(9, '2019_10_14_095346_update_tagihan_table', 5),
(10, '2019_10_19_053155_create_transaksi_table', 6),
(11, '2019_11_06_154638_update_users_table', 7),
(12, '2019_11_14_080213_update_users_table', 8),
(13, '2019_12_03_075611_update_transaksi_add_field_id_pelanggan', 9);

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
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `rekening` double NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` double NOT NULL,
  `meteran` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `rekening`, `nama`, `alamat`, `hp`, `meteran`, `created_at`, `updated_at`) VALUES
(5, 120501, 'Budi Setiawan', 'Tompak RT 05', 621819117, 100, '2019-12-05 03:56:22', '2020-01-20 14:01:21'),
(6, 120202, 'Baharudin ahmad', 'Tompak RT 01', 4572358472538, 0, '2020-01-20 07:36:42', '2020-01-20 07:36:42'),
(7, 120100, 'Haji Kodir', 'Tompak RT 05', 2163825382, 412, '2020-01-21 07:28:39', '2020-01-21 07:28:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `meteran_baru` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id`, `id_pelanggan`, `meteran_baru`, `volume`, `tagihan`, `status_bayar`, `tanggal`, `bulan`, `tahun`, `created_at`, `updated_at`) VALUES
(13, 5, 100, 100, 304000, 1, '2020-01-20', 1, 2020, '2020-01-20 07:58:31', '2020-01-20 14:01:21'),
(14, 6, 20, 20, 64000, 0, NULL, 1, 2020, '2020-01-20 14:49:01', '2020-01-20 14:49:01'),
(15, 7, 415, 3, 13000, 0, NULL, 1, 2020, '2020-01-21 23:20:38', '2020-01-21 23:20:38'),
(16, 6, 10, 10, 34000, 0, NULL, 2, 2020, '2020-02-24 07:54:21', '2020-02-24 07:54:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `bulan_transaksi` int(11) NOT NULL,
  `tahun_transaksi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_tagihan`, `id_pelanggan`, `pembayaran`, `kembalian`, `tanggal_transaksi`, `bulan_transaksi`, `tahun_transaksi`, `created_at`, `updated_at`) VALUES
(10, 13, 5, 305000, 1000, '2020-01-20', 1, 2020, '2020-01-20 14:01:21', '2020-01-20 14:01:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$h2wz6v5.xge1j2amEMK4KuNRHQOeQ2luzvkTqKZa9rXA7KWuMrlwu', 1, NULL, '2019-10-13 17:18:56', '2019-10-13 17:18:56'),
(6, 'Annisa', '120500', 'annisa@annisa.com', NULL, '$2y$10$sX605xK4XCuNwfXebO.xi.jitHcXruIiKHfuA49C.5JUmdw.Mcix6', 0, NULL, '2019-11-24 03:22:04', '2020-01-20 07:03:50'),
(7, 'Budi Setiawan', '120501', 'budi@setiawan.com', NULL, '$2y$10$7v5sOfJsQn9FU4cWATZIce52OiRpeg/7BtzthKo1tyvgG9.x0JkSi', 0, NULL, '2019-12-05 03:56:22', '2019-12-05 03:56:22'),
(8, 'Baharudin ahmad', '120202', 'lanang@lanang.com', NULL, '$2y$10$dlwgzOdSSchJlOKWoF74N.dpXgSvvjvOLYkq19Rm9FiDj9fnsV9Ua', 0, NULL, '2020-01-20 07:36:42', '2020-01-20 07:36:42'),
(9, 'Haji Kodir', '120100', 'kodir@kodir.com', NULL, '$2y$10$1eWo.X5I8ExL6Bu6NEaJB.8J1CiDbtTcVOSALHRZNVUxZfcKsYJ/i', 0, NULL, '2020-01-21 07:28:39', '2020-01-21 07:28:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pelanggan_rekening_unique` (`rekening`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT untuk tabel `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

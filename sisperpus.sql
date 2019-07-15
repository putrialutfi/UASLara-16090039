-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 15 Jul 2019 pada 03.42
-- Versi server: 5.7.24
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisperpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

DROP TABLE IF EXISTS `buku`;
CREATE TABLE IF NOT EXISTS `buku` (
  `kode_buku` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_buku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rak` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penulis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penerbit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `no_isbn` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `id_rak`, `id_penulis`, `id_kategori`, `id_penerbit`, `tahun`, `no_isbn`, `deleted`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('BK001', 'A Brief History Of Time', 'RAK016', 'PNL002', 'KTG002', 'PNB004', 2016, '979-3062-79-7', '0', NULL, 'PTG0001', '2019-07-04 03:55:06', '2019-07-15 02:46:14'),
('BK002', 'homo deus', 'RAK016', 'PNL001', 'KTG002', 'PNB003', 2017, '987656789980', '0', NULL, NULL, '2019-07-04 03:55:29', '2019-07-04 03:55:29'),
('BK003', 'Sapiens', 'RAK016', 'PNL002', 'KTG004', 'PNB003', 2016, '987656789980', '0', NULL, NULL, '2019-07-06 15:14:35', '2019-07-06 15:17:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
('KTG003', 'Agama', '2019-06-27 03:46:30', '2019-06-27 03:47:10'),
('KTG002', 'Sains', '2019-04-29 03:58:15', '2019-06-26 02:15:36'),
('KTG004', 'Sejarah', '2019-06-27 03:46:44', '2019-06-27 03:46:51'),
('KTG005', 'Sosial', '2019-07-07 15:35:29', '2019-07-07 15:35:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logs`
--

INSERT INTO `logs` (`id`, `id_user`, `act`, `created_at`, `updated_at`) VALUES
(1, 'AGT0004', 'on dashboard', '2019-07-07 13:54:40', '2019-07-07 13:54:40'),
(2, 'AGT0004', 'on dashboard', '2019-07-07 13:55:46', '2019-07-07 13:55:46'),
(3, 'AGT0004', 'tambah kategori', '2019-07-07 15:35:29', '2019-07-07 15:35:29'),
(4, 'AGT0004', 'update pengaturan - denda', '2019-07-07 15:41:02', '2019-07-07 15:41:02'),
(5, 'PTG0001', 'tambah rak', '2019-07-08 23:14:08', '2019-07-08 23:14:08'),
(6, 'PTG0001', 'tambah peminjaman', '2019-07-09 00:17:53', '2019-07-09 00:17:53'),
(7, 'PTG0001', 'tambah peminjaman', '2019-07-09 00:40:20', '2019-07-09 00:40:20'),
(8, 'PTG0001', 'tambah rak', '2019-07-15 02:34:26', '2019-07-15 02:34:26'),
(9, 'PTG0001', 'update rak', '2019-07-15 02:37:27', '2019-07-15 02:37:27'),
(10, 'PTG0001', 'update buku', '2019-07-15 02:46:14', '2019-07-15 02:46:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_24_020342_create_table_rak', 1),
(4, '2019_04_29_100839_create_table_kategori', 1),
(5, '2019_06_26_092908_create_table_penerbit', 2),
(6, '2019_06_26_105755_create_table_penulis', 3),
(7, '2019_06_27_105337_create_table_buku', 4),
(8, '2019_07_01_091605_create_table_peminjaman', 5),
(10, '2019_07_06_092552_create_table_pengaturan', 6),
(12, '2019_07_07_125938_create_table_pengembalian', 7),
(13, '2019_07_07_203202_create_table_logs', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_peminjaman` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pinjam` timestamp NOT NULL,
  `tgl_kembali` timestamp NOT NULL,
  `id_anggota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kodebuku` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_petugas` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `kode_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `id_anggota`, `id_kodebuku`, `status`, `id_petugas`, `deleted`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(16, 'PJ001', '2019-07-09 00:40:20', '2019-07-17 00:40:20', 'AGT0004', 'BK002', '1', 'PTG0001', '0', 'PTG0001', NULL, '2019-07-09 00:40:20', '2019-07-09 00:40:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

DROP TABLE IF EXISTS `penerbit`;
CREATE TABLE IF NOT EXISTS `penerbit` (
  `id_penerbit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerbit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `created_at`, `updated_at`) VALUES
('PNB003', 'gramed', '2019-06-27 03:44:57', '2019-06-27 03:46:13'),
('PNB002', 'lokomedia', '2019-06-26 03:53:13', '2019-06-27 03:46:05'),
('PNB004', 'kpg', '2019-06-27 03:45:06', '2019-06-27 03:45:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

DROP TABLE IF EXISTS `pengaturan`;
CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `ket`, `created_at`, `updated_at`) VALUES
('tgl_kembali', '8', '2019-07-05 17:00:00', '2019-07-06 02:59:08'),
('denda', '1000', '2019-07-05 17:00:00', '2019-07-07 15:41:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

DROP TABLE IF EXISTS `pengembalian`;
CREATE TABLE IF NOT EXISTS `pengembalian` (
  `kode_pengembalian` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kodepeminjaman` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `denda` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kodepetugas` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_pengembalian`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`kode_pengembalian`, `id_kodepeminjaman`, `tgl_pengembalian`, `denda`, `id_kodepetugas`, `created_at`, `updated_at`) VALUES
('KMB001', 'PJ001', '2019-07-07', '0', NULL, '2019-07-07 07:22:23', '2019-07-07 07:22:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis`
--

DROP TABLE IF EXISTS `penulis`;
CREATE TABLE IF NOT EXISTS `penulis` (
  `id_penulis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penulis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penulis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`, `created_at`, `updated_at`) VALUES
('PNL001', 'Yuval Noah Harari', '2019-06-25 17:00:00', '2019-06-26 05:27:30'),
('PNL002', 'Stephen Hawking', '2019-06-26 04:27:38', '2019-06-26 04:27:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

DROP TABLE IF EXISTS `rak`;
CREATE TABLE IF NOT EXISTS `rak` (
  `id_rak` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rak` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id_rak`, `nama_rak`, `created_at`, `updated_at`) VALUES
('RAK017', 'RSos', '2019-07-08 23:14:08', '2019-07-08 23:14:08'),
('RAK016', 'RSej', '2019-06-26 04:57:06', '2019-07-15 02:37:27'),
('RAK018', 'RSains', '2019-07-15 02:34:26', '2019-07-15 02:34:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(210) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `no_telp` (`no_telp`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `status`, `role`, `email`, `username`, `email_verified_at`, `password`, `deleted`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('PTG0001', 'putri', 'brebes', '1998-11-29', '08986300090', 'brebes', '1', 'petugas', 'putrialvina@gmail.com', 'putri', '2019-06-29 17:00:00', '$2y$12$pdXyZsjr1WOIyJtkszxSXeEnn3PafxClTvRRI/HhEuWN2nVXMZAt.', '0', NULL, NULL, NULL, '2019-06-30 03:22:19', '2019-06-30 09:24:10'),
('AGT0002', 'alvina', 'tegal', '1998-06-28', 'deleted - 08986300091', 'tegal', '1', 'anggota', 'deleted - alvina@gmail.com', 'deleted - anggotaputri', NULL, '$2y$10$NOhUbthTv.kot41O2tVT1upm/NCuQ0rSQxjmNlWCk2j7fRWfbSUg2', '1', NULL, NULL, NULL, '2019-06-30 03:29:50', '2019-06-30 06:46:28'),
('AGT0003', 'lutfiani', 'brebes', '1998-11-29', 'deleted - 08986300092', 'Brebes', '1', 'anggota', 'deleted - putrilutfiani@gmail.com', 'deleted - putrialutfi', NULL, '$2y$10$HKymiiNRX.181vMbISyk5uCFv0dSp4leMNdbCM5/G.hyLIsYM.LpO', '1', NULL, NULL, NULL, '2019-06-30 04:32:18', '2019-06-30 09:24:29'),
('AGT0004', 'elon musk', 'south africa', '1985-06-28', '085787656782', 'California', '0', 'anggota', 'elon@email.com', 'elonmusk', NULL, '$2y$12$1GWaLMCRAgoabx8K5p5O4.N5Yh5Euqi75.SUDRywm8J7VdTDjRogO', '0', NULL, NULL, NULL, '2019-06-30 06:35:04', '2019-06-30 08:28:24'),
('AGT0005', 'ndkad', 'jndjnd', '1998-02-02', 'deleted - 085787876333', 'ajdjajn', '1', 'anggota', 'deleted - dnjdn@gdnd.com', 'deleted - nndmsnd', NULL, '$2y$10$pwA62nAsfzR9mFdoVWQ6sutcPatyVbRhXVxJi749dL5EI68fkM6bq', '1', NULL, NULL, NULL, '2019-06-30 06:36:40', '2019-07-06 05:22:59'),
('AGT0006', 'dadbb', 'bbdnabd', '1998-08-31', '089384783782', 'bnmabnma', '1', 'anggota', 'jdkjd@hd.com', 'absndbnad', NULL, '$2y$10$5rnxhusuG/K2jFLJFXhqxupIPLjjAy3HUr6pZ63M1CebRdkkDT1J2', '0', NULL, NULL, NULL, '2019-06-30 07:27:48', '2019-06-30 08:03:26'),
('PTG0007', 'dsndd', 'mndmsandm', '2019-06-30', '08986303333', 'dnsand', '1', 'petugas', 'sdds@hd.com', 'sdnsbdnd', NULL, '$2y$10$KG2Dnx4D196TSSV8ZcVKIOtgE7iXEK32k4p/z5YKqNPui4O/uNb9y', '0', NULL, NULL, NULL, NULL, '2019-06-30 09:16:46'),
('PTG0008', 'sdsan', 'nsndjn', '2019-06-18', 'deleted - 085787656222', 'smn', '1', 'petugas', 'deleted - mercury@gmail.com', 'deleted - ssdn', NULL, '$2y$10$/zBYMVE6Z7D3.4A.UX03z.AG.xTEPv8N6UWvKqRdq.w96uRGMHfR.', '1', NULL, NULL, NULL, '2019-06-30 09:06:34', '2019-06-30 09:19:02'),
('PTG0009', 'bsbsb', 'bsbn', '2019-06-10', '08986307643', 'sasa', '1', 'petugas', 'sdsdd@admin.com', 'msan', NULL, '$2y$10$I7mMB1MfaCb4Nz.f2V9y7eq4ocYP1qHpT5kzhpP0iFwpx8RJxC0i.', '0', NULL, NULL, NULL, '2019-06-30 09:14:23', '2019-06-30 09:14:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

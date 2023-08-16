-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2023 pada 06.21
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harga_pangan_pulang_pisau`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda_pasar_murah`
--

CREATE TABLE `agenda_pasar_murah` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_kegiatan` time NOT NULL,
  `item_komoditas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`item_komoditas`)),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `agenda_pasar_murah`
--

INSERT INTO `agenda_pasar_murah` (`id`, `lokasi`, `tanggal`, `jam_kegiatan`, `item_komoditas`, `created_at`, `updated_at`) VALUES
(1, 'Pasar Sudimampir', '2023-07-27', '00:00:00', '', '2023-07-27 07:50:55', '2023-07-27 07:50:55'),
(2, 'Pasar Malam', '2023-07-30', '00:00:00', '', '2023-07-30 13:08:26', '2023-07-30 13:08:26'),
(3, 'Pasar Nggasudimampir', '2023-08-19', '13:39:00', '[{\"id\":\"1\",\"name\":\"Beras\"},{\"id\":\"6\",\"name\":\"Kopi\"},{\"id\":\"3\",\"name\":\"Teh\"}]', '2023-08-15 18:39:59', '2023-08-15 18:39:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_sembako`
--

CREATE TABLE `harga_sembako` (
  `id` int(11) NOT NULL,
  `id_sembako` int(11) NOT NULL,
  `id_komoditas` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga_pedagang_1` int(11) NOT NULL,
  `harga_pedagang_2` int(11) NOT NULL,
  `harga_pedagang_3` int(11) NOT NULL,
  `harga_pedagang_4` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `harga_sembako`
--

INSERT INTO `harga_sembako` (`id`, `id_sembako`, `id_komoditas`, `satuan`, `harga_pedagang_1`, `harga_pedagang_2`, `harga_pedagang_3`, `harga_pedagang_4`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Kg', 9000, 9500, 9000, 9200, '2023-08-06 17:57:14', '2023-08-06 17:57:14', NULL),
(2, 1, 2, 'Butir', 2000, 1000, 1500, 1200, '2023-08-06 17:57:51', '2023-08-06 17:57:51', NULL),
(3, 1, 6, 'Saset', 1500, 1000, 2500, 2500, '2023-08-15 16:01:26', '2023-08-15 16:01:26', NULL),
(4, 2, 3, 'Saset', 900, 1000, 1100, 1100, '2023-08-15 16:02:51', '2023-08-15 16:02:51', NULL),
(5, 3, 1, 'Liter', 3500, 4000, 3000, 3000, '2023-08-16 10:40:33', '2023-08-16 10:40:33', NULL),
(6, 3, 2, 'Kg', 20000, 19000, 18000, 18000, '2023-08-16 10:40:58', '2023-08-16 10:40:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komoditas`
--

CREATE TABLE `komoditas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT 4,
  `satuan` varchar(50) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `merk` varchar(200) NOT NULL,
  `approved_at` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komoditas`
--

INSERT INTO `komoditas` (`id`, `nama`, `id_satuan`, `satuan`, `kategori_id`, `kategori`, `merk`, `approved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Beras', 1, 'Kg', 0, '', '', '2023-06-15 10:45:16', '2023-06-15 10:45:16', '2023-06-15 10:45:16', NULL),
(2, 'Telur', 3, 'Butir', 0, '', '', '2023-06-15 10:46:04', '2023-06-15 10:46:04', '2023-06-15 10:46:04', NULL),
(3, 'Teh', 2, 'Kotak', 0, '', '', '2023-07-26 11:01:13', '2023-07-26 11:01:13', '2023-07-30 00:00:00', NULL),
(6, 'Kopi', 4, 'Kg', 0, '', '', '2023-07-30 19:01:34', '2023-07-30 00:00:00', '2023-07-30 00:00:00', NULL),
(7, 'Teh', 4, 'Kotak', 0, '', '', '2023-07-30 19:02:31', '2023-07-30 00:00:00', '2023-07-30 00:00:00', '2023-07-30 14:05:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kritik_saran`
--

INSERT INTO `kritik_saran` (`id`, `nama`, `alamat`, `email`, `no_hp`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'penguji 1', 'jalan sesat', 'penguji.1@gmail.com', '0895123123123', 'percobaan kami', '2023-07-21 07:26:55', '2023-07-21 07:26:55'),
(2, 'penguji 2', 'jalan nyasar', 'penguji.2@gmail.com', '089531232121', 'ini adalah kritik dan saran yang baru', '2023-07-26 10:16:00', '2023-07-26 10:16:00'),
(3, 'Muhammad Insan Kamil', 'Jalan Wonosari KM 10, Sitimulyo, Piyungan, Bantul', 'muhammad.kamil@jatis.com', '08971239871982', 'Kritik yang membangun', '2023-08-15 16:15:57', '2023-08-15 16:15:57'),
(4, 'Muhammad Insan Kamil', 'Jalan Wonosari KM 10, Sitimulyo, Piyungan, Bantul', 'staff@electrolux.id', '08971239871982', 'Percobaan tambah ya', '2023-08-15 20:41:14', '2023-08-15 20:41:14'),
(5, 'Egg Holder', 'Jalan Kemenangan', 'supervisor@electrolux.id', '08971239871982', 'Nyoba yang katanya error', '2023-08-15 20:44:26', '2023-08-15 20:44:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasar`
--

CREATE TABLE `pasar` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasar`
--

INSERT INTO `pasar` (`id`, `nama`, `kecamatan`, `kelurahan`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pasar Percontohan', 'Banjarmasin Barat', 'Telagabiru', 'pasar ini hanya fiktif semata', '2023-08-06 17:13:41', '2023-08-06 17:13:41', NULL),
(2, 'Pasar Sample', 'Banjarmasin Barat', 'Telaga Biru', 'Pasar fiktif', '2023-08-15 16:02:16', '2023-08-15 16:02:16', NULL),
(3, 'Gasudimampir', 'Banjarmasin Tengah', 'Kertak Baru Ulu', 'Berhasil menambah pasar fiktif', '2023-08-16 10:39:57', '2023-08-16 10:39:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(11) NOT NULL,
  `id_komoditas` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`id`, `id_komoditas`, `jumlah`, `approved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, '2023-07-06 20:02:09', '2023-08-04 00:00:00', '2023-08-04 00:00:00', NULL),
(2, 3, 2, '2023-07-30 21:10:54', '2023-07-30 21:10:54', '2023-07-30 21:10:54', '2023-07-30 16:11:52'),
(3, 2, 100, '2023-08-04 20:02:58', '2023-08-03 00:00:00', '2023-08-04 20:02:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_monitor`
--

CREATE TABLE `permintaan_monitor` (
  `id` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `permintaan_monitor`
--

INSERT INTO `permintaan_monitor` (`id`, `id_pasar`, `petugas`, `tanggal`, `approved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Waluh; Kaciput', '2023-08-16 00:00:00', '2023-08-15 12:04:39', '2023-08-15 16:10:06', '2023-08-15 16:10:06', NULL),
(3, 2, 'Waluh; Kaciput', '2023-08-17 00:00:00', NULL, '2023-08-15 17:04:51', '2023-08-15 17:04:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id`, `nama`) VALUES
(1, 'Pimpinan / Administrator'),
(2, 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sembako`
--

CREATE TABLE `sembako` (
  `id` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sembako`
--

INSERT INTO `sembako` (`id`, `id_pasar`, `petugas`, `file`, `approved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Palui; Waluh; Joker', '', NULL, '2023-08-06 17:55:59', '2023-08-06 17:55:59', NULL),
(2, 2, 'Birin; Demo; Sample', '', NULL, '2023-08-15 16:02:32', '2023-08-15 16:02:32', NULL),
(3, 3, 'Budi; Badu', '', NULL, '2023-08-16 10:40:10', '2023-08-16 10:40:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `id_role`, `aktif`) VALUES
(2, 'Pimpinan', '12345', '$2y$10$6ZhDHCtKLTwrmFxnVa9WRelhOwGNHK5t2TcVdj2h2o1THSv2xTapu', 1, 1),
(3, 'Administrator Biasa', '54321', '$2y$10$6ZhDHCtKLTwrmFxnVa9WRelhOwGNHK5t2TcVdj2h2o1THSv2xTapu', 2, 1),
(4, 'Insan Kamil', 'insanz01', '$2y$10$cF6Jt/XXZtJmW3gTusBFOOafanoZj61GVjMnDYCI5z3st0vW4OVuu', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda_pasar_murah`
--
ALTER TABLE `agenda_pasar_murah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `harga_sembako`
--
ALTER TABLE `harga_sembako`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komoditas_ibfk_1` (`id_satuan`);

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasar`
--
ALTER TABLE `pasar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_komoditas` (`id_komoditas`);

--
-- Indeks untuk tabel `permintaan_monitor`
--
ALTER TABLE `permintaan_monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sembako`
--
ALTER TABLE `sembako`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda_pasar_murah`
--
ALTER TABLE `agenda_pasar_murah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `harga_sembako`
--
ALTER TABLE `harga_sembako`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pasar`
--
ALTER TABLE `pasar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permintaan_monitor`
--
ALTER TABLE `permintaan_monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sembako`
--
ALTER TABLE `sembako`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  ADD CONSTRAINT `komoditas_ibfk_1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2023 pada 14.32
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
-- Database: `harga_pangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_distributor`
--

CREATE TABLE `harga_distributor` (
  `id` int(11) NOT NULL,
  `id_komoditas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_eceran`
--

CREATE TABLE `harga_eceran` (
  `id` int(11) NOT NULL,
  `id_komoditas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `harga_eceran`
--

INSERT INTO `harga_eceran` (`id`, `id_komoditas`, `harga`, `approved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 12000, NULL, '2023-06-15 18:24:04', '2023-06-15 18:24:04', NULL),
(2, 2, 1500, NULL, '2023-06-15 18:57:36', '2023-06-15 18:57:36', NULL),
(3, 2, 12000, NULL, '2023-06-25 17:11:13', '2023-06-25 17:11:13', '2023-06-25 12:11:21'),
(4, 1, 1000, NULL, '2023-06-25 17:13:11', '2023-06-25 17:13:11', '2023-06-25 12:13:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_grosir`
--

CREATE TABLE `harga_grosir` (
  `id` int(11) NOT NULL,
  `id_komoditas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `harga_grosir`
--

INSERT INTO `harga_grosir` (`id`, `id_komoditas`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 9000, '2023-06-15 18:59:04', '2023-06-15 18:59:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_nasional`
--

CREATE TABLE `harga_nasional` (
  `id` int(11) NOT NULL,
  `id_komoditas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_produsen`
--

CREATE TABLE `harga_produsen` (
  `id` int(11) NOT NULL,
  `id_komoditas` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inflasi`
--

CREATE TABLE `inflasi` (
  `id` int(11) NOT NULL,
  `id_permintaan` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `nilai` varchar(20) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komoditas`
--

CREATE TABLE `komoditas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komoditas`
--

INSERT INTO `komoditas` (`id`, `nama`, `id_satuan`, `approved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Beras', 1, NULL, '2023-06-15 10:45:16', '2023-06-15 10:45:16', NULL),
(2, 'Telur', 3, NULL, '2023-06-15 10:46:04', '2023-06-15 10:46:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(11) NOT NULL,
  `id_komoditas` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`id`, `id_komoditas`, `jumlah`, `approved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 1, 10, NULL, '2023-07-06 19:14:36', '2023-07-06 19:14:36', NULL);

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
(1, 'Pimpinan'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `nama`) VALUES
(1, 'Kg'),
(2, 'Pc'),
(3, 'Butir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_komoditas`
--

CREATE TABLE `stok_komoditas` (
  `id` int(11) NOT NULL,
  `id_komoditas` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok_komoditas`
--

INSERT INTO `stok_komoditas` (`id`, `id_komoditas`, `stok`, `approved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 5, '2023-06-25 12:48:39', '2023-06-25 17:42:11', '2023-06-25 17:42:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `id_role`) VALUES
(2, 'Pimpinan', '12345', '$2y$10$6ZhDHCtKLTwrmFxnVa9WRelhOwGNHK5t2TcVdj2h2o1THSv2xTapu', 1),
(3, 'Administrator Biasa', '54321', '$2y$10$6ZhDHCtKLTwrmFxnVa9WRelhOwGNHK5t2TcVdj2h2o1THSv2xTapu', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `harga_distributor`
--
ALTER TABLE `harga_distributor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_komoditas` (`id_komoditas`);

--
-- Indeks untuk tabel `harga_eceran`
--
ALTER TABLE `harga_eceran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_komoditas` (`id_komoditas`);

--
-- Indeks untuk tabel `harga_grosir`
--
ALTER TABLE `harga_grosir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_komoditas` (`id_komoditas`);

--
-- Indeks untuk tabel `harga_nasional`
--
ALTER TABLE `harga_nasional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_komoditas` (`id_komoditas`);

--
-- Indeks untuk tabel `harga_produsen`
--
ALTER TABLE `harga_produsen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_komoditas` (`id_komoditas`);

--
-- Indeks untuk tabel `inflasi`
--
ALTER TABLE `inflasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_permintaan` (`id_permintaan`);

--
-- Indeks untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_komoditas` (`id_komoditas`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stok_komoditas`
--
ALTER TABLE `stok_komoditas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_komoditas` (`id_komoditas`);

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
-- AUTO_INCREMENT untuk tabel `harga_distributor`
--
ALTER TABLE `harga_distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `harga_eceran`
--
ALTER TABLE `harga_eceran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `harga_grosir`
--
ALTER TABLE `harga_grosir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `harga_nasional`
--
ALTER TABLE `harga_nasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `harga_produsen`
--
ALTER TABLE `harga_produsen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inflasi`
--
ALTER TABLE `inflasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stok_komoditas`
--
ALTER TABLE `stok_komoditas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `harga_distributor`
--
ALTER TABLE `harga_distributor`
  ADD CONSTRAINT `harga_distributor_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id`);

--
-- Ketidakleluasaan untuk tabel `harga_eceran`
--
ALTER TABLE `harga_eceran`
  ADD CONSTRAINT `harga_eceran_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id`);

--
-- Ketidakleluasaan untuk tabel `harga_grosir`
--
ALTER TABLE `harga_grosir`
  ADD CONSTRAINT `harga_grosir_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id`);

--
-- Ketidakleluasaan untuk tabel `harga_nasional`
--
ALTER TABLE `harga_nasional`
  ADD CONSTRAINT `harga_nasional_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id`);

--
-- Ketidakleluasaan untuk tabel `harga_produsen`
--
ALTER TABLE `harga_produsen`
  ADD CONSTRAINT `harga_produsen_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id`);

--
-- Ketidakleluasaan untuk tabel `inflasi`
--
ALTER TABLE `inflasi`
  ADD CONSTRAINT `inflasi_ibfk_1` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  ADD CONSTRAINT `komoditas_ibfk_1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id`);

--
-- Ketidakleluasaan untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id`);

--
-- Ketidakleluasaan untuk tabel `stok_komoditas`
--
ALTER TABLE `stok_komoditas`
  ADD CONSTRAINT `stok_komoditas_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

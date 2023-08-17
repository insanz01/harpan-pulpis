-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2023 pada 14.56
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
-- Struktur dari tabel `laporan_publik`
--

CREATE TABLE `laporan_publik` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `jenis_kegiatan` text NOT NULL,
  `foto_kegiatan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan_publik`
--

INSERT INTO `laporan_publik` (`id`, `tanggal_kegiatan`, `lokasi`, `jenis_kegiatan`, `foto_kegiatan`, `created_at`, `updated_at`) VALUES
(1, '2023-08-18', 'Pasar Wildan', 'Sidak', 'market-bg.jpg', '2023-08-17 19:15:36', '2023-08-17 19:15:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laporan_publik`
--
ALTER TABLE `laporan_publik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laporan_publik`
--
ALTER TABLE `laporan_publik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

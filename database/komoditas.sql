-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2023 pada 11.16
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
-- Struktur dari tabel `komoditas`
--

CREATE TABLE `komoditas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `satuan` varchar(50) NOT NULL,
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

INSERT INTO `komoditas` (`id`, `nama`, `satuan`, `kategori`, `merk`, `approved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Beras', 'Kg', '', '', '2023-06-15 10:45:16', '2023-06-15 10:45:16', '2023-06-15 10:45:16', NULL),
(2, 'Telur', 'Butir', '', '', '2023-06-15 10:46:04', '2023-06-15 10:46:04', '2023-06-15 10:46:04', NULL),
(3, 'Teh', 'Kotak', '', '', '2023-07-26 11:01:13', '2023-07-26 11:01:13', '2023-07-30 00:00:00', NULL),
(6, 'Kopi', 'Kg', '', '', '2023-07-30 19:01:34', '2023-07-30 00:00:00', '2023-07-30 00:00:00', NULL),
(7, 'Teh', 'Kotak', '', '', '2023-07-30 19:02:31', '2023-07-30 00:00:00', '2023-07-30 00:00:00', '2023-07-30 14:05:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

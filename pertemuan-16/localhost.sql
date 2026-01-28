-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jan 2026 pada 10.05
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--
CREATE DATABASE IF NOT EXISTS `db_pwd2025` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_pwd2025`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biodata_mahasiswa`
--

CREATE TABLE `tbl_biodata_mahasiswa` (
  `cid` int(11) NOT NULL,
  `cnim` varchar(20) NOT NULL,
  `cnamalengkap` varchar(150) NOT NULL,
  `ctempatlahir` varchar(60) NOT NULL,
  `ctanggallahir` varchar(20) NOT NULL,
  `chobi` varchar(100) NOT NULL,
  `cpasangan` varchar(150) NOT NULL,
  `cpekerjaan` varchar(60) NOT NULL,
  `cnamaortu` varchar(150) NOT NULL,
  `cnamakakak` varchar(150) NOT NULL,
  `cnamaadik` varchar(150) NOT NULL,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_biodata_mahasiswa`
--

INSERT INTO `tbl_biodata_mahasiswa` (`cid`, `cnim`, `cnamalengkap`, `ctempatlahir`, `ctanggallahir`, `chobi`, `cpasangan`, `cpekerjaan`, `cnamaortu`, `cnamakakak`, `cnamaadik`, `dcreated_at`) VALUES
(23, '2511500018', 'Dika Yansah', 'Pangkalpinang', '2006-12-13', 'berenang', 'tidak ada', 'pelajar/mahasiswa', 'marwadi', 'nuryanto', 'gg MU Glory', '2026-01-28 14:30:26'),
(26, '2511500018', 'dika yansa', 'Pangkalpinang', '2000-11-13', 'main game', 'tidak ada', 'pelajar/mahasiswa', 'marwadi', 'nuryanto', 'gg mu', '2026-01-28 15:15:14'),
(27, '2511500018', 'dika yansa', 'Pangkalpinang', '2000-12-13', 'main game', 'tidak ada', 'pelajar/mahasiswa', 'marwadi', 'nuryanto', 'gg mu', '2026-01-28 15:26:50'),
(30, '2511500018', 'dika yansa', 'Pangkalpinang', '2006-12-13', 'main game', 'tidak ada', 'pelajar/mahasiswa', 'marwadi', 'nuryanto', 'gg mu', '2026-01-28 16:53:35'),
(31, '2511500018', 'hjgkrjvtrgnrjkhjrb', 'Pangkalpinang', '2000-12-13', 'berenang', 'tttttt', 'pelajar/mahasiswa', 'marwadi', 'wwwwwww', 'tidak ada', '2026-01-28 16:54:16'),
(32, '2511500018', 'dika yansa', 'Pangkalpinang', '2000-12-13', 'main game', 'tidak ada', 'pelajar/mahasiswa', 'marwadi', 'nuryanto', 'gg mu', '2026-01-28 17:02:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `cid` int(11) NOT NULL,
  `cnama` varchar(100) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `cpesan` text,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`cid`, `cnama`, `cemail`, `cpesan`, `dcreated_at`) VALUES
(18, 'abdul', 'abdulkece@gmail.com', 'GG MU MANTAP KING', '2025-12-24 12:25:29'),
(19, 'dika', 'dikayansah90@gmail.com', 'ggmugugugugugu', '2026-01-07 11:46:15'),
(20, 'dika', 'udinganteng@gmail.com', 'MU keren banget', '2026-01-07 14:05:02'),
(21, 'udin gg', 'udinganteng@gmail.com', 'hhhhhhhhhjujhhh', '2026-01-07 14:55:39'),
(22, 'dika', 'dikayansah90@gmail.com', 'gggggggggggggg', '2026-01-10 08:33:29'),
(23, 'DIKA YANSAH', 'dikayansah90@gmail.com', 'gg cuyyyyyy', '2026-01-10 08:52:43'),
(24, 'dika', 'dikayansah90@gmail.com', 'ggggggggggggggggggg', '2026-01-28 07:24:31'),
(25, 'dika', 'dikayansah90@gmail.com', 'ggggggggggggggggg', '2026-01-28 07:42:00'),
(26, 'DIKA YANSAH', 'dikayansah90@gmail.com', 'keren berkarakter', '2026-01-28 07:52:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_biodata_mahasiswa`
--
ALTER TABLE `tbl_biodata_mahasiswa`
  ADD PRIMARY KEY (`cid`);

--
-- Indeks untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_biodata_mahasiswa`
--
ALTER TABLE `tbl_biodata_mahasiswa`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

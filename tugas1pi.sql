-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2021 pada 09.58
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasform_pi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id` int(11) UNSIGNED NOT NULL,
  `nim` char(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_jurusan` char(4) NOT NULL,
  `stambuk` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `usia` tinyint(2) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `alasan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `kode_fakultas` char(2) NOT NULL,
  `fakultas` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`kode_fakultas`, `fakultas`, `created_at`) VALUES
('01', 'Kedokteran', '2021-03-30 16:59:50'),
('02', 'Hukum', '2021-03-30 17:04:37'),
('03', 'Pertanian', '2021-03-30 17:04:37'),
('04', 'Teknik', '2021-03-30 17:04:37'),
('05', 'Ekonomi dan Bisnis', '2021-03-30 17:04:37'),
('06', 'Kedokteran Gigi', '2021-03-30 17:04:37'),
('07', 'Ilmu Budaya', '2021-03-30 17:04:37'),
('08', 'Matematika dan Ilmu Pengetahuan Alam', '2021-03-30 17:04:37'),
('09', 'Ilmu Sosial dan Ilmu Politik', '2021-03-30 17:04:37'),
('10', 'Kesehatan Masyarakat', '2021-03-30 17:04:37'),
('11', 'Keperawatan', '2021-03-30 17:04:37'),
('12', 'Kehutanan', '2021-03-30 17:04:37'),
('13', 'Psikologi', '2021-03-30 17:04:37'),
('14', 'Ilmu Komputer dan Teknologi Informasi', '2021-03-30 17:04:37'),
('15', 'Farmasi', '2021-03-30 17:04:37');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `fakultas_jurusan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `fakultas_jurusan` (
`kode_jurusan` char(4)
,`jurusan` varchar(150)
,`kode_fakultas` char(2)
,`fakultas` varchar(150)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` char(4) NOT NULL,
  `jurusan` varchar(150) NOT NULL,
  `kode_fakultas` char(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `jurusan`, `kode_fakultas`, `created_at`) VALUES
('0100', 'Pendidikan Kedokteran', '01', '2021-03-30 17:18:13'),
('0200', 'Ilmu Hukum', '02', '2021-03-30 17:19:35'),
('0301', 'Agroteknologi', '03', '2021-03-30 17:19:35'),
('0302', 'Manajemen Sumber Daya Perairan', '03', '2021-03-30 17:19:35'),
('0304', 'Agribisnis', '03', '2021-03-30 17:21:45'),
('0305', 'Ilmu dan Teknologi Pangan', '03', '2021-03-30 17:21:45'),
('0306', 'Peternakan', '03', '2021-03-30 17:21:45'),
('0308', 'Keteknikan Pertanian', '03', '2021-03-30 17:21:45'),
('0401', 'Teknik Mesin', '04', '2021-03-31 05:31:20'),
('0402', 'Teknik Elektro', '04', '2021-03-31 05:31:20'),
('0403', 'Teknik Industri', '04', '2021-03-31 05:31:20'),
('0404', 'Teknik Sipil', '04', '2021-03-31 05:31:20'),
('0405', 'Teknik Kimia', '04', '2021-03-31 05:31:20'),
('0406', 'Arsitektur', '04', '2021-03-31 05:31:20'),
('0407', 'Teknik Lingkungan', '04', '2021-03-31 05:31:20'),
('0501', 'Ekonomi Pembangunan', '05', '2021-03-31 05:33:04'),
('0502', 'Manajemen', '05', '2021-03-31 05:33:04'),
('0503', 'Akuntansi', '05', '2021-03-31 05:33:04'),
('0600', 'Pendidikan Dokter Gigi', '06', '2021-03-31 05:38:10'),
('0701', 'Sastra Indonesia', '07', '2021-03-31 05:38:10'),
('0702', 'Sastra Daerah', '07', '2021-03-31 05:38:10'),
('0703', 'Sastra Arab', '07', '2021-03-31 05:38:10'),
('0704', 'Sastra Inggris', '07', '2021-03-31 05:38:10'),
('0705', 'Ilmu Sejarah', '07', '2021-03-31 05:38:10'),
('0706', 'Etnomusikologi', '07', '2021-03-31 05:38:10'),
('0707', 'Sastra Jepang', '07', '2021-03-31 05:38:10'),
('0708', 'Ilmu Perpustakaan', '07', '2021-03-31 05:38:10'),
('0709', 'Sastra Cina', '07', '2021-03-31 05:38:10'),
('0801', 'Fisika', '08', '2021-03-31 05:38:10'),
('0802', 'Kimia', '08', '2021-03-31 05:38:10'),
('0803', 'Matematika', '08', '2021-03-31 05:38:10'),
('0805', 'Biologi', '08', '2021-03-31 05:38:10'),
('0901', 'Sosiologi', '09', '2021-03-31 05:41:31'),
('0904', 'Ilmu Komunikasi', '09', '2021-03-31 05:41:31'),
('1000', 'Kesehatan Masyarakat', '10', '2021-03-31 05:41:31'),
('1100', 'Ilmu Keperawatan', '11', '2021-03-31 05:41:31'),
('1200', 'Kehutanan', '12', '2021-03-31 05:41:31'),
('1300', 'Psikologi', '13', '2021-03-31 05:41:31'),
('1401', 'Ilmu Komputer', '14', '2021-03-31 05:41:31'),
('1402', 'Teknologi Informasi', '14', '2021-03-31 05:41:31'),
('1500', 'Farmasi', '15', '2021-03-31 05:41:31');

-- --------------------------------------------------------

--
-- Struktur untuk view `fakultas_jurusan`
--
DROP TABLE IF EXISTS `fakultas_jurusan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fakultas_jurusan`  AS  select `j`.`kode_jurusan` AS `kode_jurusan`,`j`.`jurusan` AS `jurusan`,`f`.`kode_fakultas` AS `kode_fakultas`,`f`.`fakultas` AS `fakultas` from (`jurusan` `j` join `fakultas` `f` on(`j`.`kode_fakultas` = `f`.`kode_fakultas`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id`,`nim`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kode_fakultas`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`,`kode_fakultas`),
  ADD KEY `kode_fakultas` (`kode_fakultas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD CONSTRAINT `data_mahasiswa_ibfk_1` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`kode_fakultas`) REFERENCES `fakultas` (`kode_fakultas`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2022 pada 10.03
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkamdmedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator`
--

CREATE TABLE `indikator` (
  `idindikator` int(11) NOT NULL,
  `indikator` varchar(99) NOT NULL,
  `nilai` int(11) NOT NULL,
  `idkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `indikator`
--

INSERT INTO `indikator` (`idindikator`, `indikator`, `nilai`, `idkriteria`) VALUES
(1, '<=20%', 1, 3),
(2, '>20% dan <=45%', 2, 3),
(3, '>45% dan <=65%', 3, 3),
(4, '>65% dan <=75 %', 4, 3),
(5, '>=75%', 5, 3),
(6, '<60%', 1, 1),
(7, '>60% dan <=70%', 2, 1),
(8, ' >70% dan <= 80%', 3, 1),
(9, '>80% dan <= 90%', 4, 1),
(10, '>90% dan 100%', 5, 1),
(11, 'Sangat Kurang', 1, 4),
(12, 'Kurang', 2, 4),
(13, 'Cukup', 3, 4),
(14, 'Baik', 4, 4),
(15, 'Sangat Baik', 5, 4),
(16, 'Sangat Kurang', 1, 5),
(17, 'Kurang', 2, 5),
(18, 'Cukup', 3, 5),
(19, 'Baik', 4, 5),
(20, 'Sangat baik', 5, 5),
(21, 'SP 3', 1, 2),
(22, 'SP 2', 2, 2),
(23, 'SP 1', 3, 2),
(24, 'Tidak Ada SP', 4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `idkaryawan` int(11) NOT NULL,
  `nik` char(27) NOT NULL,
  `nama` varchar(63) NOT NULL,
  `jekel` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `telepon` char(14) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`idkaryawan`, `nik`, `nama`, `jekel`, `alamat`, `telepon`, `status`) VALUES
(1, '', 'Karyawan A', 'Wanita', 'alamat lengkap', '08123456789', '1'),
(2, '', 'Karyawan B', 'Wanita', 'alamat lengkap', '08123456789', '1'),
(3, '', 'Karyawan C', 'Wanita', 'alamat lengkap', '08123456789', '1'),
(4, '', 'Karyawan D', 'Wanita', 'alamat lengkap', '08123456789', '1'),
(5, '', 'Karyawan E', 'Pria', 'alamat lengkap', '08123456789', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `idkriteria` int(11) NOT NULL,
  `kriteria` varchar(36) NOT NULL,
  `kategori` enum('Cost','Benefit') NOT NULL,
  `bobot` int(11) NOT NULL,
  `persentase` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`idkriteria`, `kriteria`, `kategori`, `bobot`, `persentase`) VALUES
(1, 'Kehadiran', 'Benefit', 15, 15),
(2, 'Sikap', 'Benefit', 25, 25),
(3, 'Kedisiplinan Waktu', 'Cost', 20, 20),
(4, 'Kreatifitas', 'Benefit', 30, 30),
(5, 'Kuantitas', 'Benefit', 10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `na`
--

CREATE TABLE `na` (
  `idna` int(11) NOT NULL,
  `na` double NOT NULL,
  `periode` varchar(18) NOT NULL,
  `idkaryawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `na`
--

INSERT INTO `na` (`idna`, `na`, `periode`, `idkaryawan`) VALUES
(1, 0.7875, 'November 2022', 1),
(2, 0.66916666666667, 'November 2022', 2),
(3, 0.555, 'November 2022', 3),
(4, 0.59, 'November 2022', 4),
(5, 0.75, 'November 2022', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `idnilai` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `periode` varchar(18) NOT NULL,
  `idkriteria` int(11) NOT NULL,
  `idkaryawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`idnilai`, `nilai`, `periode`, `idkriteria`, `idkaryawan`) VALUES
(1, 4, 'November 2022', 1, 1),
(2, 3, 'November 2022', 2, 1),
(3, 4, 'November 2022', 3, 1),
(4, 5, 'November 2022', 4, 1),
(5, 4, 'November 2022', 5, 1),
(6, 1, 'November 2022', 1, 2),
(7, 4, 'November 2022', 2, 2),
(8, 3, 'November 2022', 3, 2),
(9, 4, 'November 2022', 4, 2),
(10, 3, 'November 2022', 5, 2),
(11, 3, 'November 2022', 1, 3),
(12, 1, 'November 2022', 2, 3),
(13, 2, 'November 2022', 3, 3),
(14, 3, 'November 2022', 4, 3),
(15, 4, 'November 2022', 5, 3),
(16, 4, 'November 2022', 1, 4),
(17, 2, 'November 2022', 2, 4),
(18, 4, 'November 2022', 3, 4),
(19, 4, 'November 2022', 4, 4),
(20, 1, 'November 2022', 5, 4),
(21, 2, 'November 2022', 1, 5),
(22, 2, 'November 2022', 2, 5),
(23, 1, 'November 2022', 3, 5),
(24, 5, 'November 2022', 4, 5),
(25, 2, 'November 2022', 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(99) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`idindikator`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`idkriteria`);

--
-- Indeks untuk tabel `na`
--
ALTER TABLE `na`
  ADD PRIMARY KEY (`idna`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idnilai`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `indikator`
--
ALTER TABLE `indikator`
  MODIFY `idindikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `idkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `na`
--
ALTER TABLE `na`
  MODIFY `idna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

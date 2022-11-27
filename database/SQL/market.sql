-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2022 pada 13.18
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_barang` int(11) NOT NULL,
  `namabarang` text NOT NULL,
  `kd_jenis` text NOT NULL,
  `hargabarang` text NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `sisabarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_barang`, `namabarang`, `kd_jenis`, `hargabarang`, `jumlahbarang`, `sisabarang`) VALUES
(1, 'Kemeja Putih Polos', '1', '120000', 34, 34),
(2, 'Celana Hitam Polos Kerja', '2', '110000', 34, 34),
(3, 'Logo Jeans Dress Mori Khaki', '1', '429900', 34, 34),
(4, 'Rhumell Brave', '3', '235900', 34, 34),
(5, 'ZEGER Sandal Kulit Pria Casual Jepit', '4', '299000', 36, 0),
(6, 'Heyjude - Sandal Gunung', '4', '281650', 34, 34),
(7, 'Sepatu Thunderbear - Slip On Voltaire Off White CB', '3', '139000', 36, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `kd_jenis` int(11) NOT NULL,
  `jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenisbarang`
--

INSERT INTO `jenisbarang` (`kd_jenis`, `jenis`) VALUES
(1, 'Pakaian'),
(2, 'Celena'),
(3, 'Sepatu'),
(4, 'Sendal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `kd_pegawai` int(11) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `namapegawai` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`kd_pegawai`, `userEmail`, `password`, `namapegawai`) VALUES
(1, 'admin@gmail.com', 'admin123', 'Admin Ganteng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `kd_beli` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `namabarang` text NOT NULL,
  `hargabarang` text NOT NULL,
  `jumlahbeli` text NOT NULL,
  `laba` text NOT NULL,
  `total_harga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`kd_beli`, `tanggal`, `namabarang`, `hargabarang`, `jumlahbeli`, `laba`, `total_harga`) VALUES
(2, '11/27/2022', 'Kemeja Putih Polos', '120000', '2', '240000', '240000'),
(3, '11/27/2022', 'Logo Jeans Dress Mori Khaki', '429900', '2', '859800', '859800'),
(4, '11/27/2022', 'Celana Hitam Polos Kerja', '110000', '2', '220000', '220000'),
(5, '11/27/2022', 'Heyjude - Sandal Gunung', '281650', '2', '563300', '563300'),
(6, '11/27/2022', 'Rhumell Brave', '235900', '2', '471800', '471800');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kd_pegawai`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kd_beli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenisbarang`
--
ALTER TABLE `jenisbarang`
  MODIFY `kd_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `kd_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `kd_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

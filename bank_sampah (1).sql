-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2019 pada 09.35
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_sampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sampah`
--

CREATE TABLE `data_sampah` (
  `id_data_smph` int(11) NOT NULL,
  `jns_smph` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `hrg_smph` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_sampah`
--

INSERT INTO `data_sampah` (`id_data_smph`, `jns_smph`, `satuan`, `hrg_smph`) VALUES
(1, 'Emberan', 'KG', 1500),
(2, 'Gelas Bersih', 'KG', 5500),
(3, 'Gelas Kotor', 'KG', 2500),
(4, 'Plastik Bening', 'KG', 800),
(5, 'Kresek Warna', 'KG', 300),
(6, 'Pet Bersih', 'KG', 2500),
(7, 'Pet Kotor', 'KG', 1000),
(8, 'Pet Warna', 'KG', 1000),
(9, 'Tutup Botol', 'KG', 2000),
(10, 'Tutup Galon', 'KG', 2500),
(11, 'Mika Tipis/PPC', 'KG', 200),
(12, 'Selopan/Bimoli/Wipol', 'KG', 300),
(13, 'Yakult/Impek', 'KG', 200),
(14, 'Kristal/Mika Tebal', 'KG', 3000),
(15, 'Karung', 'KG', 500),
(16, 'Keping VCD', 'KG', 5000),
(17, 'Duplek', 'KG', 500),
(18, 'Kardus', 'KG', 1000),
(19, 'Kertas Semen', 'KG', 800),
(20, 'Koran A', 'KG', 900),
(21, 'Koran B', 'KG', 700),
(22, 'Majalah', 'KG', 1000),
(23, 'Putihan', 'KG', 1200),
(24, 'Tetrapack', 'KG', 300),
(25, 'Boncos', 'KG', 300),
(26, 'Buku', 'KG', 1000),
(27, 'Alumunium Kaleng', 'KG', 9000),
(28, 'Besi A', 'KG', 2000),
(29, 'Besi Stal B/Kerompong', 'KG', 1200),
(30, 'Kaleng/Kawat/Seng', 'KG', 1000),
(31, 'Aki Mobil/Motor', 'KG', 8000),
(32, 'Botol Beling', 'KG', 300),
(33, 'Botol Bir (Angker/Bintang) Besar', 'BUAH', 500),
(34, 'Botol Saus/Kecap SS', 'BUAH', 350),
(35, 'Gabrukan', 'KG', 500),
(36, 'Kabel Listrik Rambut/Kecil', 'KG', 8500),
(37, 'Kulit Kabel', 'KG', 1000),
(38, 'Sandal Kulit', 'KG', 900),
(39, 'Minyak Jelantah', '600 ML', 1000),
(40, 'Karpet Talang', 'KG', 300);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_bank_sampah`
--

CREATE TABLE `laporan_bank_sampah` (
  `id_laporan_bank` int(11) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_nabung` date NOT NULL,
  `rek` varchar(50) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `jns_smph` varchar(50) NOT NULL,
  `brt_smph` varchar(20) NOT NULL,
  `hrg_smph` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` varchar(11) NOT NULL,
  `petugas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `rek` varchar(11) NOT NULL,
  `noktp` int(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `tmpt` varchar(25) NOT NULL,
  `tgll` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `nohp` int(15) NOT NULL,
  `bergabung` date NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nama`, `rek`, `noktp`, `username`, `email`, `tmpt`, `tgll`, `alamat`, `pass`, `nohp`, `bergabung`, `saldo`) VALUES
(4, 'KURNIA', '2018001', 0, 'kurniaMRRRRRR', 'kukurman@yahoo.com', 'Jakarta', '1996-06-10', 'PSM S1 6', '1234', 2147483647, '2018-11-07', 0),
(5, 'kurnia', '2018002', 0, 'kurniaMR', 'kukurman@go.id', 'bandung', '2018-12-11', 'PSM S1 6', '1234', 2147483647, '2018-12-12', 0),
(18, 'HILMIYAH', '2019005', 1231242123, 'apriraisalw', 'asdaw', 'Jakarta', '1996-08-02', 'PSM R1 26', '1234', 1231421, '2019-01-09', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nohp` int(20) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama`, `email`, `nohp`, `jabatan`) VALUES
(1, 'kurniMR', '1234', 'kurnia', 'kurnia@gmail.com', 89654, 'ui');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_sampah`
--
ALTER TABLE `data_sampah`
  ADD PRIMARY KEY (`id_data_smph`);

--
-- Indeks untuk tabel `laporan_bank_sampah`
--
ALTER TABLE `laporan_bank_sampah`
  ADD PRIMARY KEY (`id_laporan_bank`);

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_sampah`
--
ALTER TABLE `data_sampah`
  MODIFY `id_data_smph` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `laporan_bank_sampah`
--
ALTER TABLE `laporan_bank_sampah`
  MODIFY `id_laporan_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

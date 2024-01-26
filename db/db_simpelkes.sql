-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2024 pada 09.34
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simpelkes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `kd_bayar` int(11) NOT NULL,
  `kd_resep` int(15) NOT NULL,
  `tot_biaya` int(11) NOT NULL,
  `tgl_trans` date NOT NULL,
  `sts_trans` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_bayar`
--

INSERT INTO `tb_bayar` (`kd_bayar`, `kd_resep`, `tot_biaya`, `tgl_trans`, `sts_trans`) VALUES
(4, 4, 31900, '2024-01-26', '0'),
(5, 6, 25300, '2024-01-26', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `kd_kunj` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tgl_berobat` date NOT NULL,
  `kd_poli` varchar(10) NOT NULL,
  `kd_kpasien` varchar(10) NOT NULL,
  `sts_daftar` int(2) NOT NULL,
  `keluhan` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_daftar`
--

INSERT INTO `tb_daftar` (`kd_kunj`, `nik`, `tgl_berobat`, `kd_poli`, `kd_kpasien`, `sts_daftar`, `keluhan`) VALUES
('202401260001', '1509999875678', '2024-01-26', 'POLI001', 'KP002', 1, 'd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kpasien`
--

CREATE TABLE `tb_kpasien` (
  `kd_kpasien` varchar(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `biaya` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kpasien`
--

INSERT INTO `tb_kpasien` (`kd_kpasien`, `kategori`, `ket`, `biaya`) VALUES
('KP001', 'ASKES', 'Asuransi Kesehatan', 5000),
('KP002', 'UMUM', 'Keluarga Miskin', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `kd_obat` varchar(12) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `ketersediaan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`kd_obat`, `nm_obat`, `satuan`, `harga`, `ketersediaan`) VALUES
('A10001', 'Amoxicillin', 'Botol', 1100, 41),
('A10002', 'Asetosal', 'Tablet', 1090, 83),
('AA0003', 'Bodrex', 'Tablet', 15000, 95);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `nik` varchar(16) NOT NULL,
  `nm_pasien` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `alamat` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`nik`, `nm_pasien`, `jk`, `agama`, `tgl_lahir`, `no_tlp`, `alamat`) VALUES
('23324365768787', 'Pasien 1', 'Perempuan', 'Islam', '2023-11-01', '21324354365', 'llg'),
('1509999875678', 'rizki', 'Laki-Laki', 'Islam', '0000-00-00', '085758065911', 'llg'),
('1605020309990007', 'sri widiana', 'Perempuan', 'Islam', '1999-09-03', '085767099987', 'mataram'),
('01', 'deni', 'Laki-Laki', 'Islam', '2024-01-31', '085766789876', 'llg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nm_pegawai` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nik`, `nm_pegawai`, `jk`, `agama`, `alamat`) VALUES
('123456', '1234567890123456', 'Pimpinan', 'Laki-Laki', 'Islam', 'Llg'),
('654321', '9876753421874532', 'Petugas ', 'Laki-Laki', 'Islam', 'Musi Rawas'),
('23145', '6574389702134566', 'Poli Umum', 'Laki-Laki', 'Islam', 'Tugumulyo'),
('234532', '5676745475686754', 'Kasir', 'Perempuan', 'Islam', 'Mirasi'),
('56780', '3243456578654234', 'Poli Gigi', 'Perempuan', 'Islam', 'llg'),
('687432785', '2544568898', 'Apoteker', 'Laki-Laki', 'Islam', 'Llg'),
('07866454768', '4657878675676', 'Rekam Medis', 'Laki-Laki', 'Islam', 'llg'),
('12334567', '1605010502960003', 'pemeriksaan', 'Laki-Laki', 'Islam', 'llg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periksa`
--

CREATE TABLE `tb_periksa` (
  `kd_periksa` int(11) NOT NULL,
  `kd_kunj` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `keluhan` longtext NOT NULL,
  `diagnosa` longtext NOT NULL,
  `tindakan` longtext NOT NULL,
  `pemeriksaan` longtext NOT NULL,
  `ket` longtext NOT NULL,
  `tgl_periksa` date NOT NULL,
  `sts_periksa` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_periksa`
--

INSERT INTO `tb_periksa` (`kd_periksa`, `kd_kunj`, `nik`, `keluhan`, `diagnosa`, `tindakan`, `pemeriksaan`, `ket`, `tgl_periksa`, `sts_periksa`) VALUES
(1, '202401260001', '1509999875678', 'd', 'd', 'd', 'd', 'd', '2024-01-26', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poli`
--

CREATE TABLE `tb_poli` (
  `kd_poli` varchar(12) NOT NULL,
  `nm_poli` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_poli`
--

INSERT INTO `tb_poli` (`kd_poli`, `nm_poli`) VALUES
('POLI001', 'Umum'),
('POLI002', 'Gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resep`
--

CREATE TABLE `tb_resep` (
  `kd_resep` int(10) NOT NULL,
  `kd_periksa` int(10) NOT NULL,
  `tgl_resep` date NOT NULL,
  `ket_resep` longtext NOT NULL,
  `sts_resep` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_resep`
--

INSERT INTO `tb_resep` (`kd_resep`, `kd_periksa`, `tgl_resep`, `ket_resep`, `sts_resep`) VALUES
(1, 1, '2024-01-26', 'd', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resep_detail`
--

CREATE TABLE `tb_resep_detail` (
  `kd_detail_resep` int(11) NOT NULL,
  `kd_resep` varchar(10) NOT NULL,
  `kd_obat` varchar(10) NOT NULL,
  `tgl_dt_resep` timestamp NOT NULL DEFAULT current_timestamp(),
  `jlh` int(10) NOT NULL,
  `hrg_satuan` int(11) NOT NULL,
  `sisa_obat` int(11) NOT NULL,
  `ket_detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_resep_detail`
--

INSERT INTO `tb_resep_detail` (`kd_detail_resep`, `kd_resep`, `kd_obat`, `tgl_dt_resep`, `jlh`, `hrg_satuan`, `sisa_obat`, `ket_detail`) VALUES
(1, '1', 'A10002', '2024-01-26 08:27:22', 2, 1090, 83, 'd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `nip` varchar(16) NOT NULL,
  `kd_poli` varchar(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`nip`, `kd_poli`, `username`, `email`, `level`, `password`) VALUES
('001', '00', 'admin', 'admin@gmail.com', 'Administrator', '$2y$10$n5d2Ddf/awpfvkCqY3ejpeCxxRBKLuEecDcDJXP0b0r1XlfN.KeDy'),
('07866454768', '0', 'rekam_medis', 'rm@gmail.com', 'Rekam Medis', '$2y$10$fFbclkNiEhEHKPp3b/kfFezZxhfbU0fr/6PipsL/pkadFdKb3C9hK'),
('12334567', '0', 'periksa', 'periksa@gmail.com', 'Pemeriksaan', '$2y$10$Wo0MemDXCNfmFugAvK7mauu/YDrcaSwmkjvsecwRxIjbstHhNxDja'),
('123456', '0', 'pimpinan', 'pimpinan@gmail.com', 'Pimpinan', '$2y$10$ttyuplNQsSodDyHx.T9KSeKb.YRm1Qnx2NLihoCRJW1/6.tfrkreK'),
('23145', 'POLI001', 'poli_umum', 'poli@gmail.com', 'Poli', '$2y$10$sxx51tSZnwbrdzQSHMpjfuGLXc2XEQn.D6Otbrc.ckoC920QbvF5G'),
('234532', '0', 'kasir', 'kasir@gmail.com', 'Kasir', '$2y$10$d6qx3nZgVY2QsGuMYbMhx.AeF61YjNwxbSSz/R.XhpV5A0k.ZH.OS'),
('56780', 'POLI002', 'poli_gigi', 'poligigi@gmail.com', 'Poli', '$2y$10$tBux8Asle.UXBZTm/ISKDej6ene2MOtcIvuNS5lb9uQKgb7bGQ3IW'),
('654321', '0', 'petugas', 'petugas@gmail.com', 'Pendaftaran', '$2y$10$d55yg/x8YxlCDcs11toJiOSACmhqD8Xmyl66l8nfwEP0Rj0OiCSQW'),
('687432785', '0', 'apoteker', 'apoteker@gmail.com', 'Apotik', '$2y$10$hHFdTICefGUkEKHkAqUObO/GBsP8RJLjeNZIhmxBYgI7JcCg2TDui');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`kd_bayar`);

--
-- Indeks untuk tabel `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`kd_kunj`);

--
-- Indeks untuk tabel `tb_kpasien`
--
ALTER TABLE `tb_kpasien`
  ADD PRIMARY KEY (`kd_kpasien`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tb_periksa`
--
ALTER TABLE `tb_periksa`
  ADD PRIMARY KEY (`kd_periksa`);

--
-- Indeks untuk tabel `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`kd_poli`);

--
-- Indeks untuk tabel `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`kd_resep`);

--
-- Indeks untuk tabel `tb_resep_detail`
--
ALTER TABLE `tb_resep_detail`
  ADD PRIMARY KEY (`kd_detail_resep`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `kd_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_periksa`
--
ALTER TABLE `tb_periksa`
  MODIFY `kd_periksa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_resep`
--
ALTER TABLE `tb_resep`
  MODIFY `kd_resep` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_resep_detail`
--
ALTER TABLE `tb_resep_detail`
  MODIFY `kd_detail_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Jun 2020 pada 15.05
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(40) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `spesialis` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `jenis_kelamin`, `spesialis`, `alamat`, `no_telp`, `username`, `password`) VALUES
('753fdf75-d16b-445d-9bb2-4ef09adefe6a', 'Dr. Anne', 'L', 'Umum', 'Jl. Otista Raya', '081389989344', 'dokter2', '$2y$10$fSPgVaW6bASHAqjv7hUkCufkM66Mb2rFKF61Kw3ljLH6Vg0YHzsZe'),
('86742588-a48f-44fe-b5e4-ce959b7833c1', 'Dr. Aulia Rahmat R', 'L', 'Umum', 'Jl. Panglima Polim', '08122244005', 'dokter1', '$2y$10$OvAdpIb8I/rGY0t4OelTp.Ob3ukUfwf6SZGetUfGErUk9praujQVC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nakes`
--

CREATE TABLE `tb_nakes` (
  `id_nakes` varchar(50) NOT NULL,
  `nama_nakes` varchar(40) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nakes`
--

INSERT INTO `tb_nakes` (`id_nakes`, `nama_nakes`, `jenis_kelamin`, `jabatan`, `alamat`, `no_telp`, `username`, `password`) VALUES
('3b1ff5e3-db45-4a4d-a9ac-97097e5439b8', 'Polo', '', 'Perawat', 'Jl. Margonda', '083155667788', '', '$2y$10$sJD4Ywq2kRlJzQ.hHYQCHOt08YIOb/8uu5lY8yh.CkEzecD1scHtS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('224e9ef5-69cf-11ea-acae-00ff6990c3c7', 'EsterC', 'Vitamin C'),
('86071bfd-7511-11ea-b32f-00ff6990c3c7', 'Imboost', 'Suplemen Imun booster'),
('860797df-7511-11ea-b32f-00ff6990c3c7', 'Fufang', 'Suplemen'),
('da9b034d-1d98-4fae-87bb-3359bc87427a', 'Ever E', 'Vitamin E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(10) NOT NULL,
  `nomor_identitas` varchar(16) NOT NULL,
  `nama_pasien` varchar(40) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `nama_kk` varchar(40) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nomor_identitas`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `agama`, `alamat`, `nama_kk`, `no_telp`) VALUES
('7cab302f-6', '0847563819284655', 'Luccrecia', 'P', '2020-06-20', 'Islam', 'Jl. Pondok Indah Raya', 'Simeon', '08125678764'),
('9a5f75e2-0', '0975623981576835', 'Clara', 'P', '1989-06-22', 'Islam', 'Jl. Pejaten', 'Yere', '0812764528');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` int(2) NOT NULL,
  `nama_poli` varchar(20) NOT NULL,
  `gedung` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
(1, 'Poli Gigi', 'A'),
(2, 'Poli Umum', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(10) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` varchar(2) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES
('d9c470ce-b537-4328-b443-b1cf6a07872c', '7cab302f-6', '<p>Pilek, Batuk</p>\r\n', '86742588-a48f-44fe-b5e4-ce959b7833c1', 'Flu', '2', '2020-06-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id` int(8) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rm_obat`
--

INSERT INTO `tb_rm_obat` (`id`, `id_rm`, `id_obat`) VALUES
(3, 'd9c470ce-b537-4328-b443-b1cf6a07872c', '224e9ef5-69cf-11ea-acae-00ff6990c3c7'),
(4, 'd9c470ce-b537-4328-b443-b1cf6a07872c', 'da9b034d-1d98-4fae-87bb-3359bc87427a'),
(5, 'd9c470ce-b537-4328-b443-b1cf6a07872c', '860797df-7511-11ea-b32f-00ff6990c3c7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(90) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('a2b6057c-6765-11ea-b5a4-00ff6990c3c7', 'Aulia Rahmat Ramadhani', 'admin', '$2y$10$0tcdC8sWK3hdOnG0kJ9UmO0i5vO8iMxgRipQVwMOgu7zP3/NKiWlO', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_nakes`
--
ALTER TABLE `tb_nakes`
  ADD PRIMARY KEY (`id_nakes`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`),
  ADD UNIQUE KEY `id_poli` (`id_poli`),
  ADD UNIQUE KEY `id_poli_2` (`id_poli`);

--
-- Indexes for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  MODIFY `id_poli` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `tb_rm_obat_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

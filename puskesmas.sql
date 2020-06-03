-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Mei 2020 pada 20.33
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
  `nama_dokter` varchar(90) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`, `username`, `password`) VALUES
('74e808a1-40bf-444c-b69b-1e6dd6705d1e', 'Dr. Aulia Rahmat R', 'Umum', 'JL. BATU', '08122244005', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nakes`
--

CREATE TABLE `tb_nakes` (
  `id_nakes` varchar(50) NOT NULL,
  `nama_nakes` varchar(90) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `jabatan` varchar(80) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` varchar(90) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('224e9ef5-69cf-11ea-acae-00ff6990c3c7', 'EsterC', 'Vitamin C'),
('86071bfd-7511-11ea-b32f-00ff6990c3c7', 'Imboost', 'Suplemen Imun booster'),
('860797df-7511-11ea-b32f-00ff6990c3c7', 'Fufang', 'Suplemen'),
('98bc1f09-3954-4b29-af61-310bed90bdd9', 'Glico', 'a'),
('f2454f14-f42d-4c3f-b3e5-be400335ae89', 'AA', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nomor_identitas` varchar(30) NOT NULL,
  `nama_pasien` varchar(90) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `nama_kk` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nomor_identitas`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `agama`, `alamat`, `nama_kk`, `no_telp`) VALUES
('13111292-fa63-4c0b-b935-2022f4ccad73', '112345', 'Angela', 'L', '0000-00-00', 'Islam', 'Jl Taman Purbakala Cipari', 'Asd', '21345'),
('141ddd1b-73ae-48a4-87cc-5838db430fe6', '111111111111111111111111', 'Andriana', 'P', '1999-12-15', 'Islam', 'JL. BATU', 'Andreno', '02111345'),
('26363aa0-8974-47d4-8142-3a7e0ac9f0a2', '444448965', 'Copper', 'L', '0000-00-00', '', 'QQW', '', '443'),
('57939ed4-4af4-4787-9a03-b7d8430a07d3', '12223332765899', 'Adreno', 'L', '0000-00-00', '', 'XTZ', '', '12322'),
('aef15c63-ef7e-47f6-a83e-d483d1812e92', '23331212', 'Simonn', 'P', '0000-00-00', '', 'Jakarta', '', '22222'),
('c431617a-300c-497e-9637-64db4c892dc5', '556744823', 'Prism', 'L', '0000-00-00', '', 'FGF', '', '554'),
('e94d99bc-4be5-451e-bc5f-658695cca0fa', '444448961', 'Iridium', 'P', '0000-00-00', '', 'AAA', '', '0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
('fe948c83-7813-11ea-a2c1-00ff6990c3c7', 'Poli Gigi', 'A'),
('fe949ee6-7813-11ea-a2c1-00ff6990c3c7', 'Poli Umum', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES
('3fe562a0-7ca5-47a2-b316-a21c3aec7254', '57939ed4-4af4-4787-9a03-b7d8430a07d3', 'Sakit perut', '74e808a1-40bf-444c-b69b-1e6dd6705d1e', 'Diare', 'fe949ee6-7813-11ea-a2c1-00ff6990c3c7', '2020-04-25');

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
(2, '3fe562a0-7ca5-47a2-b316-a21c3aec7254', '224e9ef5-69cf-11ea-acae-00ff6990c3c7'),
(3, '3fe562a0-7ca5-47a2-b316-a21c3aec7254', '860797df-7511-11ea-b32f-00ff6990c3c7'),
(4, '3fe562a0-7ca5-47a2-b316-a21c3aec7254', '98bc1f09-3954-4b29-af61-310bed90bdd9'),
(5, '3fe562a0-7ca5-47a2-b316-a21c3aec7254', '86071bfd-7511-11ea-b32f-00ff6990c3c7');

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
  ADD PRIMARY KEY (`id_poli`);

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
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`);

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

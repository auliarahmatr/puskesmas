-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jul 2020 pada 18.21
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
  `id_dokter` varchar(4) NOT NULL,
  `nama_dokter` varchar(40) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `spesialis` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `jenis_kelamin`, `spesialis`, `alamat`, `no_telp`, `username`, `password`) VALUES
('0101', 'Dr. Aulia Rahmat R', 'L', 'Umum', 'Jl. Batu', '021143535', 'dokter_aulia', '$2y$10$gVyUMa.V.uK2uGdiNfYrGujtjIUDBE/p45kmPUmGjPjTtx7/OB8ku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_icd`
--

CREATE TABLE `tb_icd` (
  `kode_icd` varchar(6) NOT NULL,
  `nama_icd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_icd`
--

INSERT INTO `tb_icd` (`kode_icd`, `nama_icd`) VALUES
('A00', 'Kholera'),
('A01', 'Thyfus dan Parathyfus'),
('A03.0', 'Disentri basiler'),
('A04.9', 'Infeksi bakteri usus lainnya'),
('A05.9', 'Keracunan makanan oleh bakteri'),
('A06.0', 'Disentri amuba akut'),
('A06.1', 'Disentri amuba kronis'),
('A06.9', 'Infeksi amuba lainnya'),
('A07', 'Penyakit protosoa lainnya'),
('A07.1', 'Giardiasis'),
('A09', 'Diarie dan gastroentritis non spesifik'),
('A15.0', 'TBC paru BTA(+) tanpa biakan'),
('A16.0', 'TBC klinis tanpa pemeriksaan BTA'),
('A31.0', 'Pnemonia Paru'),
('A36', 'Diphteria'),
('A37', 'Batuk rejan / Whooping cough'),
('A80.3', 'AFP'),
('A82', 'Rabies'),
('B02', 'Herpes Zooster'),
('B03', 'Smallpox (cacar)'),
('B05', 'Measles / campak'),
('B06', 'Rubella'),
('B07', 'Viral warts / caplak'),
('B15', 'Hepatitis A akut'),
('B16', 'Hepatitis B akut'),
('B26', 'Mumps / Gondongan'),
('B58', 'Toxoplasmosis'),
('J11', 'Influenza, virus not identified'),
('J18.9', 'Pneumonia, unspecified');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nakes`
--

CREATE TABLE `tb_nakes` (
  `id_nakes` varchar(4) NOT NULL,
  `nama_nakes` varchar(40) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nakes`
--

INSERT INTO `tb_nakes` (`id_nakes`, `nama_nakes`, `jenis_kelamin`, `jabatan`, `alamat`, `no_telp`, `username`, `password`) VALUES
('TK01', 'Reynaldi', 'L', 'Perawat Poli Umum', 'Jl. Kavling DKI', '08122334455', '', '$2y$10$7OD0qhtylCObMkvtLAEZtuBVYKxtoDjALrPA5tDxyTxh/SdXm7Ysm'),
('TK02', 'Lauren', 'P', 'Perawat Poli Umum', 'Jl. Permata Hijau', '08778872874', '', '$2y$10$MoLdG7dJD3hiRTJpuny.3exzZ0anLsrtt5gh5AcEFU19bcpyR7dFK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(4) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `jenis_obat`) VALUES
(3, 'Amoxicillin', 'Antibiotik'),
(4, 'Ampicillin', 'Antibiotik\r\n'),
(5, 'Oxacillin', 'Antibiotik'),
(6, 'Penicillin G', 'Antibiotik'),
(8, 'Thrombo Aspilets', 'Aspirin'),
(9, 'Cefadroxil', 'Antibiotik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(7) NOT NULL,
  `nomor_identitas` varchar(16) NOT NULL,
  `nama_pasien` varchar(40) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `nama_kk` varchar(40) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nomor_identitas`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `gol_darah`, `agama`, `alamat`, `nama_kk`, `no_telp`) VALUES
('P200001', '3244353647893467', 'Lucrecia', 'P', '1999-07-15', 'A', 'Kristen', 'Jl. Boulevard', 'Felipe', '02318778809'),
('P200002', '3278123423987635', 'Cayetana', 'P', '2000-02-24', 'AB', 'Katolik', 'Jl. Avenue', 'Victoria', '021987709'),
('P200003', '3270009876341122', 'Samuel', 'L', '2000-12-23', 'AB', 'Kristen', 'Jl. Avenue Selatan', 'Pilar', '0881898001'),
('P200004', '3279876543344000', 'Nadia', 'P', '2000-07-12', 'O', 'Islam', 'Jl. Metro', 'Yusuf', '0218877669'),
('P200005', '3279019879874000', 'Omar', 'L', '1998-09-22', 'O', 'Islam', 'Jl. Metro', 'Yusuf', '0882118890');

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
(1, 'Umum', 'A'),
(2, 'Gigi', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(16) NOT NULL,
  `id_pasien` varchar(7) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(4) NOT NULL,
  `kode_icd` varchar(6) NOT NULL,
  `id_poli` int(2) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resep`
--

CREATE TABLE `tb_resep` (
  `id_resep` int(4) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `dosis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id` int(8) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` int(4) NOT NULL,
  `id_resep` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(4) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('AD01', 'ADMIN AULIA', 'admin_aulia', '$2y$10$0tcdC8sWK3hdOnG0kJ9UmO0i5vO8iMxgRipQVwMOgu7zP3/NKiWlO', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_icd`
--
ALTER TABLE `tb_icd`
  ADD PRIMARY KEY (`kode_icd`);

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
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `kode_icd` (`kode_icd`);

--
-- Indexes for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_resep` (`id_resep`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  MODIFY `id_poli` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_resep`
--
ALTER TABLE `tb_resep`
  MODIFY `id_resep` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`kode_icd`) REFERENCES `tb_icd` (`kode_icd`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_4` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`);

--
-- Ketidakleluasaan untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `tb_rm_obat_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `tb_resep` (`id_resep`),
  ADD CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`),
  ADD CONSTRAINT `tb_rm_obat_ibfk_3` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

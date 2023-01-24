-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2022 pada 02.42
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_polairud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_kp`
--

CREATE TABLE `db_kp` (
  `id` int(11) NOT NULL,
  `nama_kapal` varchar(30) COLLATE utf8_bin NOT NULL,
  `no_lambung_kapal` int(4) NOT NULL,
  `klas_kapal` varchar(2) COLLATE utf8_bin NOT NULL,
  `thn_kp` int(4) NOT NULL,
  `jumlah_radar` int(30) NOT NULL,
  `kondisi_radar` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_radar` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_radar` text COLLATE utf8_bin NOT NULL,
  `jumlah_gyrocompass` int(30) NOT NULL,
  `kondisi_gyrocompass` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_gyrocompass` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_gyrocompass` text COLLATE utf8_bin NOT NULL,
  `jumlah_magneticcompass` int(30) NOT NULL,
  `kondisi_magneticcompass` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_magneticcompass` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_magneticcompass` text COLLATE utf8_bin NOT NULL,
  `jumlah_navtex` int(30) NOT NULL,
  `kondisi_navtex` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_navtex` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_navtex` text COLLATE utf8_bin NOT NULL,
  `jumlah_gps` int(30) NOT NULL,
  `kondisi_gps` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_gps` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_gps` text COLLATE utf8_bin NOT NULL,
  `jumlah_ecdis` int(30) NOT NULL,
  `kondisi_ecdis` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_ecdis` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_ecdis` text COLLATE utf8_bin NOT NULL,
  `jumlah_ais` int(30) NOT NULL,
  `kondisi_ais` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_ais` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_ais` text COLLATE utf8_bin NOT NULL,
  `jumlah_autopilot` int(30) NOT NULL,
  `kondisi_autopilot` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_autopilot` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_autopilot` text COLLATE utf8_bin NOT NULL,
  `jumlah_speedlog` int(30) NOT NULL,
  `kondisi_speedlog` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_speedlog` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_speedlog` text COLLATE utf8_bin NOT NULL,
  `jumlah_windspeed` int(30) NOT NULL,
  `kondisi_windspeed` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_windspeed` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_windspeed` text COLLATE utf8_bin NOT NULL,
  `jumlah_clinometer` int(30) NOT NULL,
  `kondisi_clinometer` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_clinometer` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_clinometer` text COLLATE utf8_bin NOT NULL,
  `jumlah_echosounder` int(30) NOT NULL,
  `kondisi_echosounder` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_echosounder` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_echosounder` text COLLATE utf8_bin NOT NULL,
  `jumlah_teropong` int(30) NOT NULL,
  `kondisi_teropong` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_teropong` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_teropong` text COLLATE utf8_bin NOT NULL,
  `jumlah_cctv` int(30) NOT NULL,
  `kondisi_cctv` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_cctv` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_cctv` text COLLATE utf8_bin NOT NULL,
  `jumlah_publicaddressor` int(30) NOT NULL,
  `kondisi_publicaddressor` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_publicaddressor` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_publicaddress` text COLLATE utf8_bin NOT NULL,
  `jumlah_rhf` int(30) NOT NULL,
  `kondisi_rhf` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_rhf` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_rhf` text COLLATE utf8_bin NOT NULL,
  `jumlah_rvhfmarine` int(30) NOT NULL,
  `kondisi_rvhfmarine` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_rvhfmarine` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_rvhfmarine` text COLLATE utf8_bin NOT NULL,
  `jumlah_rvhfgroundtoair` int(30) NOT NULL,
  `kondisi_rvhfgroundtoair` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_rvhfgroundtoair` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_rvhfgroundtoair` text COLLATE utf8_bin NOT NULL,
  `jumlah_ht` int(30) NOT NULL,
  `kondisi_ht` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_ht` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_ht` text COLLATE utf8_bin NOT NULL,
  `jumlah_komunikasisatellite` int(30) NOT NULL,
  `kondisi_komunikasisatellite` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_komunikasisatellite` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_komunikasisatellite` text COLLATE utf8_bin NOT NULL,
  `jumlah_telephoneinternal` int(30) NOT NULL,
  `kondisi_telephoneinternal` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_telephoneinternal` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_telephoneinternal` text COLLATE utf8_bin NOT NULL,
  `jumlah_morse` int(30) NOT NULL,
  `kondisi_morse` varchar(30) COLLATE utf8_bin NOT NULL,
  `merk_morse` varchar(30) COLLATE utf8_bin NOT NULL,
  `ket_morse` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `db_kp`
--

INSERT INTO `db_kp` (`id`, `nama_kapal`, `no_lambung_kapal`, `klas_kapal`, `thn_kp`, `jumlah_radar`, `kondisi_radar`, `merk_radar`, `ket_radar`, `jumlah_gyrocompass`, `kondisi_gyrocompass`, `merk_gyrocompass`, `ket_gyrocompass`, `jumlah_magneticcompass`, `kondisi_magneticcompass`, `merk_magneticcompass`, `ket_magneticcompass`, `jumlah_navtex`, `kondisi_navtex`, `merk_navtex`, `ket_navtex`, `jumlah_gps`, `kondisi_gps`, `merk_gps`, `ket_gps`, `jumlah_ecdis`, `kondisi_ecdis`, `merk_ecdis`, `ket_ecdis`, `jumlah_ais`, `kondisi_ais`, `merk_ais`, `ket_ais`, `jumlah_autopilot`, `kondisi_autopilot`, `merk_autopilot`, `ket_autopilot`, `jumlah_speedlog`, `kondisi_speedlog`, `merk_speedlog`, `ket_speedlog`, `jumlah_windspeed`, `kondisi_windspeed`, `merk_windspeed`, `ket_windspeed`, `jumlah_clinometer`, `kondisi_clinometer`, `merk_clinometer`, `ket_clinometer`, `jumlah_echosounder`, `kondisi_echosounder`, `merk_echosounder`, `ket_echosounder`, `jumlah_teropong`, `kondisi_teropong`, `merk_teropong`, `ket_teropong`, `jumlah_cctv`, `kondisi_cctv`, `merk_cctv`, `ket_cctv`, `jumlah_publicaddressor`, `kondisi_publicaddressor`, `merk_publicaddressor`, `ket_publicaddress`, `jumlah_rhf`, `kondisi_rhf`, `merk_rhf`, `ket_rhf`, `jumlah_rvhfmarine`, `kondisi_rvhfmarine`, `merk_rvhfmarine`, `ket_rvhfmarine`, `jumlah_rvhfgroundtoair`, `kondisi_rvhfgroundtoair`, `merk_rvhfgroundtoair`, `ket_rvhfgroundtoair`, `jumlah_ht`, `kondisi_ht`, `merk_ht`, `ket_ht`, `jumlah_komunikasisatellite`, `kondisi_komunikasisatellite`, `merk_komunikasisatellite`, `ket_komunikasisatellite`, `jumlah_telephoneinternal`, `kondisi_telephoneinternal`, `merk_telephoneinternal`, `ket_telephoneinternal`, `jumlah_morse`, `kondisi_morse`, `merk_morse`, `ket_morse`) VALUES
(3, 'fas', 1231, 'A1', 1232, 123, 'Rusak Ringan', 'dsadas', 'HAHAHAHAHHAHAHAHAHAA', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', ''),
(5, 'adufas', 0, '', 0, 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', ''),
(6, 'bsjsbb', 989979, 'vs', 9494979, 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', ''),
(7, 'bhdbabdajh', 0, '', 0, 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', ''),
(8, 'sfsfsfsdfs', 1231, 'A', 2006, 17, 'Baik', '18', 'sghdfhsjhfgsdfgsydfvu\r\n\r\n\r\n', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', ''),
(9, 'sdgfuhsuy', 81, 'A', 291919, 17, '', '17', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', ''),
(14, 'das', 21, 'as', 1232131, 1231, 'Baik', '1231', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', ''),
(15, 'sdfsfs', 1231, 'sd', 123131, 1231, 'Baik', '1231231', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', ''),
(16, 'fas', 1232, 'A2', 2134, 123, 'Baik', 'asd', '123124', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', ''),
(17, 'halo', 1020202, 'A1', 2005, 3, 'Baik', 'a1', 'baik', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_alat`
--

CREATE TABLE `dt_alat` (
  `id` int(11) NOT NULL,
  `nama_alat` varchar(40) COLLATE utf8_bin NOT NULL,
  `alat_id` varchar(50) COLLATE utf8_bin NOT NULL,
  `alat_abbrev_jml` varchar(5) COLLATE utf8_bin NOT NULL,
  `alat_abbrev_knd` varchar(5) COLLATE utf8_bin NOT NULL,
  `alat_abbrev_merk` varchar(30) COLLATE utf8_bin NOT NULL,
  `alat_abbrev_ket` varchar(30) COLLATE utf8_bin NOT NULL,
  `tipe_alat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `dt_alat`
--

INSERT INTO `dt_alat` (`id`, `nama_alat`, `alat_id`, `alat_abbrev_jml`, `alat_abbrev_knd`, `alat_abbrev_merk`, `alat_abbrev_ket`, `tipe_alat`) VALUES
(1, 'Radar', 'radar', 'jr', 'kr', 'mr', 'ker', 1),
(3, 'Gyro Compass', 'gyrocompass', 'jgc', 'kgc', 'mgc', 'kegc', 1),
(4, 'Magnetic Compass', 'magneticcompass', 'jmc', 'kmc', 'mmc', 'kemc', 1),
(5, 'Navtex', 'navtex', 'jnt', 'knt', 'mnt', 'kent', 1),
(6, 'GPS', 'gps', 'jgp', 'kgp', 'mgp', 'kegp', 1),
(8, 'ECDIS', 'ecdis', 'jec', 'kec', 'mec', 'keec', 1),
(10, 'AIS', 'ais', 'jais', 'kais', 'mais', 'keais', 1),
(11, 'Autopilot', 'autopilot', 'jap', 'kap', 'map', 'kemap', 1),
(12, 'Speed Log', 'speedlog', 'jsl', 'ksl', 'msl', 'kesl', 1),
(13, 'Wind Speed', 'windspeed', 'jws', 'kws', 'mws', 'kews', 1),
(14, 'Clinometer', 'clinometer', 'jcl', 'kcl', 'mcl', 'kecl', 1),
(15, 'Echo Sounder', 'echosounder', 'jes', 'kes', 'mes', 'kees', 1),
(16, 'Teropong', 'teropong', 'jtp', 'ktp', 'mtp', 'ketp', 1),
(19, 'CCTV', 'cctv', 'jcc', 'kcc', 'mcc', 'kecc', 1),
(20, 'Public Addressor', 'publicaddressor', 'jpa', 'kpa', 'mpa', 'kepa', 2),
(22, 'Radio HF', 'rhf', 'jrh', 'krh', 'mrh', 'kerh', 2),
(23, 'Radio VHF Marine', 'rvhfmarine', 'jrm', 'krm', 'mrm', 'kerm', 2),
(24, 'Radio VHF Ground To Air', 'rvhfgroundtoair', 'jrg', 'krg', 'mrg', 'kerg', 2),
(25, 'HT', 'ht', 'jht', 'kht', 'mht', 'keht', 2),
(26, 'Komunikasi Satellite', 'komunikasisatellite', 'jks', 'kks', 'mks', 'keks', 2),
(27, 'Telephone antar Ruangan', 'telephoneinternal', 'jti', 'kti', 'mti', 'keti', 2),
(30, 'Morse', 'morse', 'jmr', 'kmr', 'mmr', 'kemr', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_klas`
--

CREATE TABLE `dt_klas` (
  `id` int(11) NOT NULL,
  `nama_klas` varchar(2) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `dt_klas`
--

INSERT INTO `dt_klas` (`id`, `nama_klas`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'B1'),
(5, 'B2'),
(6, 'B3'),
(7, 'C1'),
(8, 'C2'),
(9, 'C3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'sam', 'dsam180805@gmail.com', '1', 0),
(2, 'ggg', 'edi3ug@gmail.com', '12345', 0),
(3, 'i3u4gf', 'owuref@gmail.com', '22', 0),
(4, 'davide', 'lisdr@gmail.com', '$2y$10$dSxS2C03AzUqpffgaRy2j.foKRN/DcET9fFtmzRqj1w/.REvqXzwO', 1),
(5, 'e', 'wjdn@gmail.com', '$2y$10$ko2HSSrUmIk.LoMq.35L.u8BtpycBLlV1Ra0FVYFzcs4APsY5v.de', 0),
(6, 'knknk', 'kwedn@gmail.com', '$2y$10$pT0gBSw.u2NPVdnR5WzCUe5N5zY/f2rebrBS./VhSujceiqj5CDxK', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_kp`
--
ALTER TABLE `db_kp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dt_alat`
--
ALTER TABLE `dt_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dt_klas`
--
ALTER TABLE `dt_klas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `db_kp`
--
ALTER TABLE `db_kp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `dt_alat`
--
ALTER TABLE `dt_alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `dt_klas`
--
ALTER TABLE `dt_klas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

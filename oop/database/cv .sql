-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2023 pada 12.59
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_user` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_user`, `id_sekolah`, `sekolah`, `tahun`, `jurusan`) VALUES
(1, 1, 'SD 1 BANJAR', '2005', 'IPA'),
(1, 2, 'SMP 1 BANJAR', '2010', 'FISIKA'),
(1, 3, 'SMA 1 BANJAR', '2020', 'IPS'),
(2, 4, 'SD 1 TASIKMALAYA', '2005', 'SOSIAL'),
(2, 5, 'SMP 1 TASIKMALAYA', '2010', 'IPS'),
(2, 6, 'SMA 1TASIKMALAYA', '2020', 'IPS'),
(3, 7, 'SD 2 CIENTEUNG', '2005', 'TKJ'),
(3, 8, 'SMP 2 CIENTEUNG', '2010', 'TKI'),
(3, 9, 'SMA 1 CIENTEUNG', '2020', 'PUPR'),
(4, 10, 'SD 1 SINGAPARNA', '2005', 'TATABOGA'),
(4, 11, 'SMP 1 SINGAPARNA', '2010', 'COFFE SHOP'),
(4, 12, 'SMA 1  SINGAPARNA', '2020', 'MIXUE SCHOOL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_skill`
--

CREATE TABLE `tb_skill` (
  `id_user` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `lembaga` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_skill`
--

INSERT INTO `tb_skill` (`id_user`, `id_skill`, `skill`, `lembaga`, `nilai`) VALUES
(1, 1, 'Adobe Illustrator', 'Sekolah desain', '100'),
(1, 2, 'Photoshop Adobe', 'Sekolah desain vol 1', '100'),
(1, 3, 'CAP CUT', 'Sekolah desain CAPCUT', '100'),
(2, 4, 'MS.WORLD', 'PUPR STUDENT', '100'),
(2, 5, 'MS.EXEL', 'PUPR STUDENT', '100'),
(2, 6, 'MS.POWERPOINT', 'PUPR STUDENT', '100'),
(3, 7, 'ASPAL JALAN', 'PUPR STUDENT', '100'),
(3, 8, 'ASPAL JALAN RAYA PROVINSI', 'PUPR STUDENT', '100'),
(3, 9, 'ASPAL JALAN RAYA PROVINSI TOL CIPALI', 'PUPR STUDENT', '100'),
(4, 10, 'CASIR ', 'SEKOLAH CASIR IT', '100'),
(4, 11, 'BARTENER', 'SEKOLAH BARTENER IT', '100'),
(4, 12, 'MIXUE ', 'SEKOLAH MIXUE IT', '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `fullname`, `email`, `job`, `no_telepon`) VALUES
(1, 'Muhammad Luthfi', 'Luthfi@gmail.com', 'Desain Grafis', '08998992856'),
(2, 'Irvan Febriawan', 'irvan@gmail.com', 'Sekertaris PUPR', '082118459642'),
(3, 'Muhammad Irgi', 'irgi@gmail.com', 'Kabag.Lapangan', '0899892856'),
(4, 'Faisal Darmawan', 'Faisal@gmail.com', 'Caseer Mixue', '082118453945');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `tb_skill`
--
ALTER TABLE `tb_skill`
  ADD PRIMARY KEY (`id_skill`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_skill`
--
ALTER TABLE `tb_skill`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD CONSTRAINT `tb_sekolah_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_skill`
--
ALTER TABLE `tb_skill`
  ADD CONSTRAINT `tb_skill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Apr 2024 pada 15.21
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pigur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `id_detail` int(11) NOT NULL,
  `id_jampel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_piket`
--

CREATE TABLE `guru_piket` (
  `id_piket` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `is_koord` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jampel`
--

CREATE TABLE `jampel` (
  `id_jampel` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `jam_ke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nip` varchar(18) NOT NULL,
  `jklm` varchar(100) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `user` char(25) NOT NULL,
  `pass` char(25) NOT NULL,
  `is_admin` enum('0','1') NOT NULL DEFAULT '0',
  `telepon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `foto`, `nip`, `jklm`, `mapel`, `user`, `pass`, `is_admin`, `telepon`) VALUES
(1, 'Sholeh', 'assets/images/1.jpg', '2147483647', 'Lak-laki', 'Produktig RPL', 'ss', '123', '1', '081252933111'),
(2, 'Imam Khumaidi', 'assets/images/2.jpg', '2147483647', 'Lak-laki', 'Produktig RPL', 'guru', '123', '0', '081252933111'),
(3, 'Agus priono', 'assets/images/3.jpg', '2147483647', 'Lak-laki', 'Produktig RPL', 'guru', '123', '0', '081252933111'),
(4, 'Dra. Irmawati', 'assets/images/4.jpg', '2147483647', 'Perempuan', 'Produktig TKJ', 'guru', '123', '0', '081252933111'),
(5, 'Aries Wahyuni', 'assets/images/5.jpg', '19812022210211', 'Perempuan', 'Seni Budaya', 'guru', '123', '0', '091238012984'),
(8, 'Abd. Manan', 'assets/images/6.jpg', '19812022210211', 'Laki-laki', 'Pendidikan Agama', 'guru', '123', '0', '091238012984'),
(9, 'Siani', 'assets/images/7.jpg', '19812022210210', 'Perempuan', 'Matematika', 'guru', '123', '0', '081252977888'),
(10, 'Hidayatul matduyah', 'assets/images/10.jpg', '198211182022210023', 'Perempuan', 'PPKN', 'guru', '123', '0', '081253456772'),
(11, 'Gatot suherman', 'assets/images/11.jpg', '198211182022210023', 'Laki-laki', 'PPKN', 'guru', '123', '0', '081253456772'),
(12, 'Riza umami', 'assets/images/12.jpg', '029292876', 'Perempuan', 'produktif rpl', 'guru', '123', '0', '9812373737');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_jampel` (`id_jampel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `guru_piket`
--
ALTER TABLE `guru_piket`
  ADD PRIMARY KEY (`id_piket`),
  ADD UNIQUE KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jampel`
--
ALTER TABLE `jampel`
  ADD PRIMARY KEY (`id_jampel`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru_piket`
--
ALTER TABLE `guru_piket`
  MODIFY `id_piket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jampel`
--
ALTER TABLE `jampel`
  MODIFY `id_jampel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD CONSTRAINT `detail_jadwal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `detail_jadwal_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `detail_jadwal_ibfk_3` FOREIGN KEY (`id_jampel`) REFERENCES `jampel` (`id_jampel`);

--
-- Ketidakleluasaan untuk tabel `guru_piket`
--
ALTER TABLE `guru_piket`
  ADD CONSTRAINT `guru_piket_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Ketidakleluasaan untuk tabel `jampel`
--
ALTER TABLE `jampel`
  ADD CONSTRAINT `jampel_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

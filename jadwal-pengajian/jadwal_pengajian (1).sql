-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Okt 2020 pada 13.41
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_pengajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamaah`
--

CREATE TABLE `jamaah` (
  `id_jamaah` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_pengajian` int(12) NOT NULL,
  `token` varchar(256) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jamaah`
--

INSERT INTO `jamaah` (`id_jamaah`, `nama`, `email`, `alamat`, `id_pengajian`, `token`, `status`) VALUES
(18, 'rivan', 'rivanramdani96@gmail.com', 'Pacet', 12, '4f7ae095e733fae74f278a0ec832d1718df2d829b51d9386ca5a89472dbea414', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panitia`
--

CREATE TABLE `panitia` (
  `id_panitia` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `nama`, `email`, `no_wa`, `password`, `token`, `status`) VALUES
(7, 'rizal', 'netizengalau@gmail.com', '123456788798', '$2y$10$tOgms7ZnmCl667U8klqcbu6yhkb8/pEMNio/tXru/nSldhDsTzALC', '22fb0dc3397dcdedd4a3569a9c6e0612e18637981de122e57ca09b29ea6d2ccd', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajian`
--

CREATE TABLE `pengajian` (
  `id_pengajian` int(11) NOT NULL,
  `nama_ustadz` varchar(128) NOT NULL,
  `judul_pengajian` varchar(256) NOT NULL,
  `tanggal_pengajian` date NOT NULL,
  `jam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajian`
--

INSERT INTO `pengajian` (`id_pengajian`, `nama_ustadz`, `judul_pengajian`, `tanggal_pengajian`, `jam`) VALUES
(11, 'hanan attaki', 'perkara iman', '2020-07-12', '18:30'),
(12, 'adi hidayat', 'neraka mengerikan', '2020-09-21', '19:30'),
(13, 'agus', 'berkah', '2020-07-27', '07:30'),
(14, 'pak ridwan', 'Ketenangan Dalam Hati', '2020-07-27', '07:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(256) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `token`, `status`) VALUES
(8, 'rivanramdani96@gmail.com', 'eb1fcbb6f26e8a15da04082cb99a3ed365993fe4c1385fe02e5d6204a3134d69', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jamaah`
--
ALTER TABLE `jamaah`
  ADD PRIMARY KEY (`id_jamaah`);

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id_panitia`);

--
-- Indexes for table `pengajian`
--
ALTER TABLE `pengajian`
  ADD PRIMARY KEY (`id_pengajian`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jamaah`
--
ALTER TABLE `jamaah`
  MODIFY `id_jamaah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajian`
--
ALTER TABLE `pengajian`
  MODIFY `id_pengajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

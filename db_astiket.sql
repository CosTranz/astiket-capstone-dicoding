-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2024 pada 22.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_astiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id_message` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_contact`
--

INSERT INTO `tb_contact` (`id_message`, `name`, `email`, `subject`, `message`) VALUES
(7, 'Example', 'example@gmail.com', 'Looking for Job', 'Any job available?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_place`
--

CREATE TABLE `tb_place` (
  `id_place` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL,
  `name_place` varchar(200) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_place`
--

INSERT INTO `tb_place` (`id_place`, `file`, `name_place`, `jenis`, `status`) VALUES
('ID100', '1717295892_b01312267adc34f2bb05.jpg', 'Kastil Alaska', 'Tiket', 'Active'),
('ID101', '1717375321_fa0af179d7c7e26cd091.jpg', 'Dino Park', 'Tiket', 'Active'),
('ID102', '1717375393_c5af4694493a29987848.jpg', 'Rainbow Slide', 'Tiket', 'Active'),
('ID103', '1717375435_5ad3c191160118f8a343.jpg', 'Bom Bom Car', 'Tiket', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_place` varchar(20) DEFAULT NULL,
  `customer` varchar(20) DEFAULT NULL,
  `metode` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_place`, `customer`, `metode`, `jumlah`, `tanggal`) VALUES
(44, 'ID103', 'Kinax', 'BCA Mobile', 120000, '2024-06-13'),
(45, 'ID102', 'Kinax', 'PayPal', 40000, '2024-06-13'),
(46, 'ID102', 'Kinax', 'Gopay', 70000, '2024-06-13'),
(47, 'ID102', 'Kinax', 'PayPal', 160000, '2024-06-13'),
(48, 'ID100', 'Kinax', 'PayPal', 70000, '2024-06-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `customer` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone_number` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`customer`, `email`, `password`, `country`, `phone_number`) VALUES
('admin', 'admin@gmail.com', 'admin123', 'Indonesia', 12441414),
('example', 'example@gmail.com', 'example', 'Indonesia', 11111),
('Gues', 'Gues232@gmail.com', 'gues', 'Indonesia', 81),
('Hafiz', 'hafiz@gmail.com', 'hafiz123', 'Indonesia', 0),
('Hexin', 'hexin@yahoo.com', 'hexin123', 'Singapore', 8892102),
('Jaya', 'jaya@gmail.com', 'jaya', 'Indonesia', 628888),
('Kinax', 'kinax@email.com', 'kinax', 'Japan', 8102912);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id_message`);

--
-- Indeks untuk tabel `tb_place`
--
ALTER TABLE `tb_place`
  ADD PRIMARY KEY (`id_place`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_place` (`id_place`),
  ADD KEY `customer` (`customer`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`customer`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id_message` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_place`) REFERENCES `tb_place` (`id_place`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`customer`) REFERENCES `tb_user` (`customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

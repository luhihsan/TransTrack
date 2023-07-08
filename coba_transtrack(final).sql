-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2023 pada 09.03
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
-- Database: `coba_transtrack`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chart_kondisi_unit`
--

CREATE TABLE `chart_kondisi_unit` (
  `id_kondisi_unit` int(5) NOT NULL,
  `prsn_mesin` float NOT NULL,
  `prsn_transmisi` float NOT NULL,
  `prsn_rem_dan_ban` float NOT NULL,
  `prsn_kelistrikan` float NOT NULL,
  `id_unit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `chart_kondisi_unit`
--

INSERT INTO `chart_kondisi_unit` (`id_kondisi_unit`, `prsn_mesin`, `prsn_transmisi`, `prsn_rem_dan_ban`, `prsn_kelistrikan`, `id_unit`) VALUES
(2, 84, 65, 72, 81, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_chassis`
--

CREATE TABLE `data_chassis` (
  `id_chassis` int(5) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `eng_power` varchar(25) NOT NULL,
  `eng_torque` varchar(25) NOT NULL,
  `gearbox` varchar(25) NOT NULL,
  `oil_tank` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_chassis`
--

INSERT INTO `data_chassis` (`id_chassis`, `id_unit`, `eng_power`, `eng_torque`, `gearbox`, `oil_tank`) VALUES
(1, 1, '360HP', '1750Nm', 'GR875R', '300lt'),
(2, 2, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(3, 3, '260HP', '1600Nm', 'R260', '400lt'),
(4, 4, '360HP', '1750Nm', 'GR875R', '300lt'),
(5, 5, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(6, 6, '360HP', '1600Nm', 'R260', '400lt'),
(7, 7, '360HP', '1750Nm', 'GR875R', '300lt'),
(8, 8, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(9, 9, '360HP', '1600Nm', 'R260', '400lt'),
(10, 10, '360HP', '1750Nm', 'GR875R', '300lt'),
(11, 11, '360HP', '1750Nm', 'GR875R', '300lt'),
(12, 12, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(13, 13, '260HP', '1600Nm', 'R260', '400lt'),
(14, 14, '360HP', '1750Nm', 'GR875R', '300lt'),
(15, 15, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(16, 16, '360HP', '1600Nm', 'R260', '400lt'),
(17, 17, '360HP', '1750Nm', 'GR875R', '300lt'),
(18, 18, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(19, 19, '360HP', '1600Nm', 'R260', '400lt'),
(20, 20, '360HP', '1750Nm', 'GR875R', '300lt'),
(21, 21, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(22, 22, '260HP', '1600Nm', 'R260', '400lt'),
(23, 23, '360HP', '1750Nm', 'GR875R', '300lt'),
(24, 24, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(25, 25, '360HP', '1600Nm', 'R260', '400lt'),
(26, 26, '360HP', '1750Nm', 'GR875R', '300lt'),
(27, 27, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(28, 28, '360HP', '1600Nm', 'R260', '400lt'),
(29, 29, '360HP', '1750Nm', 'GR875R', '300lt'),
(30, 30, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(31, 31, '260HP', '1600Nm', 'R260', '400lt'),
(32, 32, '360HP', '1750Nm', 'GR875R', '300lt'),
(33, 33, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(34, 34, '360HP', '1600Nm', 'R260', '400lt'),
(35, 35, '360HP', '1750Nm', 'GR875R', '300lt'),
(36, 36, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(37, 37, '360HP', '1600Nm', 'R260', '400lt'),
(38, 38, '360HP', '1750Nm', 'GR875R', '300lt'),
(39, 39, '260HP', '2091Nm', 'MB-GO210', '350lt'),
(40, 40, '360HP', '1600Nm', 'R260', '400lt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(10) NOT NULL,
  `nama_driver` varchar(25) NOT NULL,
  `id_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `driver`
--

INSERT INTO `driver` (`id_driver`, `nama_driver`, `id_unit`) VALUES
(1, 'Ari Harianto', 1),
(2, 'Budi Santoso', 2),
(3, 'Cindy Wijaya', 3),
(4, 'Dian Novita', 4),
(5, 'Eko Pratomo', 5),
(6, 'Fifi Amelia', 6),
(7, 'Gita Susanti', 7),
(8, 'Hendro Wibowo', 8),
(9, 'Indra Permana', 9),
(10, 'Joko Santoso', 10),
(11, 'Kurnia Sari', 11),
(12, 'Linda Dewi', 12),
(13, 'Mira Putri', 13),
(14, 'Nanda Pratama', 14),
(15, 'Oscar Hidayat', 15),
(16, 'Putri Ananda', 16),
(17, 'Rudi Hermawan', 17),
(18, 'Siti Rahayu', 18),
(19, 'Tono Kusnadi', 19),
(20, 'Umi Sari', 20),
(21, 'Vita Susanti', 21),
(22, 'Wahyu Pradana', 22),
(23, 'Xavier Aditya', 23),
(24, 'Yuli Fitriani', 24),
(25, 'Zara Putri', 25),
(26, 'Andi Permana', 26),
(27, 'Bella Wijaya', 27),
(28, 'Candra Susanto', 28),
(29, 'Dina Pratiwi', 29),
(30, 'Eko Nugroho', 30),
(31, 'Ari Harianto', 31),
(32, 'Budi Santoso', 32),
(33, 'Cindy Wijaya', 33),
(34, 'Dian Novita', 34),
(35, 'Eko Pratomo', 35),
(36, 'Fifi Amelia', 36),
(37, 'Gita Susanti', 37),
(38, 'Hendro Wibowo', 38),
(39, 'Indra Permana', 39),
(40, 'Joko Santoso', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_log`
--

CREATE TABLE `history_log` (
  `id_log` int(5) NOT NULL,
  `id_unit` int(5) NOT NULL,
  `tgl` varchar(25) NOT NULL,
  `odometer` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `pic` varchar(25) NOT NULL,
  `cost` varchar(25) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `history_log`
--

INSERT INTO `history_log` (`id_log`, `id_unit`, `tgl`, `odometer`, `deskripsi`, `pic`, `cost`, `note`) VALUES
(1, 1, '29 Juni 2023', '475.658Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Subarjo', 'Rp.3.578.500', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(2, 2, '15 Mei 2023', '652.421Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior. ', 'Subarjo', 'Rp.6.890.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(3, 3, '10 April 2023', '720.500Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.200.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(4, 4, '22 April 2023', '562.750Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.6.890.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(5, 5, '17 April 2023', '621.200Km', 'Penggantian oli mesin, gardan dan power steering. Ganti busi yang mati. Bersihkan injektor solar dan ganti filter solar. Ganti belt dinamo.', 'Soeswanto', 'Rp.9.500.000', 'Perhatikan kualitas solar karena injektor gampang kotor, Jangan cabut sekring speed limit, Hindari penggunaan exhaust break yang berlebih, gunakan retarder'),
(6, 6, '5 Juni 2023', '497.600Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.500.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(7, 7, '28 April 2023', '825.000Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.8.750.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(8, 8, '15 Mei 2023', '690.000Km', 'Penggantian oli mesin, gardan dan power steering. Ganti busi yang mati. Bersihkan injektor solar dan ganti filter solar. Ganti belt dinamo.', 'Soeswanto', 'Rp.5.200.000', 'Perhatikan kualitas solar karena injektor gampang kotor, Jangan cabut sekring speed limit, Hindari penggunaan exhaust break yang berlebih, gunakan retarder'),
(9, 9, '20 Juni 2023', '550.300Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.750.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(10, 10, '9 Mei 2023', '780.900Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.7.500.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(11, 11, '3 April 2023', '580.250Km', 'Penggantian oli mesin, gardan dan power steering. Ganti busi yang mati. Bersihkan injektor solar dan ganti filter solar. Ganti belt dinamo.', 'Soeswanto', 'Rp.4.000.000', 'Perhatikan kualitas solar karena injektor gampang kotor, Jangan cabut sekring speed limit, Hindari penggunaan exhaust break yang berlebih, gunakan retarder'),
(12, 12, '26 Juni 2023', '510.700Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.5.250.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(13, 13, '12 April 2023', '680.150Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.350.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(14, 14, '25 April 2023', '595.850Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.6.590.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(15, 15, '19 Mei 2023', '715.300Km', 'Penggantian oli mesin, gardan dan power steering. Ganti busi yang mati. Bersihkan injektor solar dan ganti filter solar. Ganti belt dinamo.', 'Soeswanto', 'Rp.8.200.000', 'Perhatikan kualitas solar karena injektor gampang kotor, Jangan cabut sekring speed limit, Hindari penggunaan exhaust break yang berlebih, gunakan retarder'),
(16, 16, '8 Juni 2023', '520.200Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.800.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(17, 17, '27 Juni 2023', '830.400Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.7.950.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(18, 18, '14 April 2023', '590.500Km', 'Penggantian oli mesin, gardan dan power steering. Ganti busi yang mati. Bersihkan injektor solar dan ganti filter solar. Ganti belt dinamo.', 'Soeswanto', 'Rp.4.250.000', 'Perhatikan kualitas solar karena injektor gampang kotor, Jangan cabut sekring speed limit, Hindari penggunaan exhaust break yang berlebih, gunakan retarder'),
(19, 19, '1 Juni 2023', '480.100Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.500.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(20, 20, '22 Juni 2023', '695.600Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.7.200.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(21, 21, '17 April 2023', '560.300Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.600.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(22, 22, '4 Mei 2023', '745.900Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.6.950.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(23, 23, '9 April 2023', '615.200Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.200.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(24, 24, '18 April 2023', '575.400Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.6.650.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(25, 25, '26 Mei 2023', '695.500Km', 'Penggantian oli mesin, gardan dan power steering. Ganti busi yang mati. Bersihkan injektor solar dan ganti filter solar. Ganti belt dinamo.', 'Soeswanto', 'Rp.8.050.000', 'Perhatikan kualitas solar karena injektor gampang kotor, Jangan cabut sekring speed limit, Hindari penggunaan exhaust break yang berlebih, gunakan retarder'),
(26, 26, '7 Juni 2023', '532.100Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.650.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(27, 27, '29 Juni 2023', '815.300Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.7.750.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(28, 28, '16 April 2023', '585.600Km', 'Penggantian oli mesin, gardan dan power steering. Ganti busi yang mati. Bersihkan injektor solar dan ganti filter solar. Ganti belt dinamo.', 'Soeswanto', 'Rp.4.150.000', 'Perhatikan kualitas solar karena injektor gampang kotor, Jangan cabut sekring speed limit, Hindari penggunaan exhaust break yang berlebih, gunakan retarder'),
(29, 29, '3 Mei 2023', '745.900Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.6.950.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(30, 30, '25 April 2023', '575.800Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.6.600.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(31, 31, '5 Juni 2023', '527.100Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.750.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(32, 32, '24 Juni 2023', '802.200Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.7.850.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(33, 33, '12 April 2023', '595.100Km', 'Penggantian oli mesin, gardan dan power steering. Ganti busi yang mati. Bersihkan injektor solar dan ganti filter solar. Ganti belt dinamo.', 'Soeswanto', 'Rp.4.450.000', 'Perhatikan kualitas solar karena injektor gampang kotor, Jangan cabut sekring speed limit, Hindari penggunaan exhaust break yang berlebih, gunakan retarder'),
(34, 34, '21 April 2023', '555.400Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.950.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(35, 35, '28 Mei 2023', '675.500Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.7.450.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(36, 36, '9 Juni 2023', '512.100Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.5.550.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(37, 37, '11 Juni 2023', '795.300Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.7.650.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.'),
(38, 38, '5 April 2023', '565.600Km', 'Penggantian oli mesin, gardan dan power steering. Ganti busi yang mati. Bersihkan injektor solar dan ganti filter solar. Ganti belt dinamo.', 'Soeswanto', 'Rp.4.350.000', 'Perhatikan kualitas solar karena injektor gampang kotor, Jangan cabut sekring speed limit, Hindari penggunaan exhaust break yang berlebih, gunakan retarder'),
(39, 39, '19 April 2023', '525.900Km', 'Dilakukan penggantian kampas rem pada seluruh roda. Ganti oli gardan rutin. Pemasangan turbo timer. Check kopel belakang, bunyi berdecit. Ganti relay untuk lampu sign dan pasang flasher.', 'Joko Handoyo', 'Rp.4.750.000', 'Lakukan ganti oli pada 485.000km. Hindari mentok speed limit, untuk menjaga umur kopel belakang. Pasang relay lampu senja belakang'),
(40, 40, '26 Mei 2023', '655.000Km', 'Penggantian oli mesin, gardan dan powes steering. Balon suspensi kiri depan pecah dan diganti baru. Strum aki kelistrikan interior.', 'Subarjo', 'Rp.7.150.000', 'Lakukan ganti oli mesin pada 672.000km, pasang relay untuk lampu interior untuk menghindari strum aki interior drop.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_unit`
--

CREATE TABLE `kondisi_unit` (
  `id_kondisi` int(11) NOT NULL,
  `prsn_mesin` varchar(11) NOT NULL,
  `prsn_transmisi` varchar(11) NOT NULL,
  `prsn_rem_dan_ban` varchar(11) NOT NULL,
  `prsn_kelistrikan` varchar(11) NOT NULL,
  `prsn_total` varchar(10) NOT NULL,
  `total_pay` varchar(11) NOT NULL,
  `id_unit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kondisi_unit`
--

INSERT INTO `kondisi_unit` (`id_kondisi`, `prsn_mesin`, `prsn_transmisi`, `prsn_rem_dan_ban`, `prsn_kelistrikan`, `prsn_total`, `total_pay`, `id_unit`) VALUES
(0, '75%', '73%', '69%', '87%', '34%', 'Rp3.600.000', 29),
(1, '84%', '75%', '72%', '81%', '13%', 'Rp2.100.000', 1),
(2, '78%', '83%', '69%', '77%', '20%', 'Rp1.500.000', 2),
(3, '80%', '71%', '76%', '79%', '15%', 'Rp3.200.000', 3),
(4, '72%', '82%', '68%', '74%', '25%', 'Rp2.900.000', 4),
(5, '87%', '76%', '79%', '83%', '35%', 'Rp6.500.000', 5),
(6, '76%', '78%', '73%', '70%', '28%', 'Rp4.800.000', 6),
(7, '81%', '84%', '77%', '75%', '18%', 'Rp2.200.000', 7),
(8, '75%', '79%', '82%', '71%', '42%', 'Rp6.900.000', 8),
(9, '83%', '77%', '74%', '85%', '32%', 'Rp3.700.000', 9),
(10, '79%', '81%', '70%', '88%', '10%', 'Rp1.000.000', 10),
(11, '73%', '42%', '91%', '66%', '27%', 'Rp5.100.000', 11),
(12, '54%', '76%', '88%', '33%', '18%', 'Rp2.200.000', 12),
(13, '87%', '22%', '69%', '95%', '35%', 'Rp6.700.000', 13),
(14, '41%', '79%', '50%', '70%', '12%', 'Rp1.300.000', 14),
(15, '92%', '66%', '75%', '54%', '42%', 'Rp7.200.000', 15),
(16, '58%', '91%', '84%', '77%', '30%', 'Rp4.500.000', 16),
(17, '82%', '48%', '67%', '80%', '20%', 'Rp2.800.000', 17),
(18, '62%', '85%', '93%', '45%', '48%', 'Rp7.000.000', 18),
(19, '76%', '73%', '71%', '89%', '32%', 'Rp3.900.000', 19),
(20, '49%', '97%', '60%', '96%', '15%', 'Rp1.800.000', 20),
(21, '82%', '70%', '68%', '90%', '38%', 'Rp6.300.000', 21),
(22, '55%', '95%', '81%', '72%', '24%', 'Rp3.000.000', 22),
(23, '91%', '50%', '79%', '66%', '40%', 'Rp7.500.000', 23),
(24, '45%', '84%', '73%', '98%', '22%', 'Rp2.500.000', 24),
(25, '96%', '77%', '88%', '59%', '45%', 'Rp7.100.000', 25),
(26, '67%', '93%', '75%', '83%', '28%', 'Rp4.200.000', 26),
(27, '79%', '62%', '71%', '94%', '17%', 'Rp2.400.000', 27),
(28, '60%', '88%', '95%', '49%', '50%', 'Rp6.800.000', 28),
(30, '50%', '99%', '60%', '92%', '14%', 'Rp1.700.000', 30),
(31, '68%', '92%', '79%', '85%', '27%', 'Rp5.100.000', 31),
(32, '42%', '75%', '88%', '76%', '18%', 'Rp2.200.000', 32),
(33, '94%', '62%', '72%', '97%', '35%', 'Rp6.700.000', 33),
(34, '36%', '86%', '77%', '91%', '12%', 'Rp1.300.000', 34),
(35, '99%', '70%', '83%', '57%', '42%', 'Rp7.200.000', 35),
(36, '64%', '90%', '75%', '80%', '30%', 'Rp4.500.000', 36),
(37, '78%', '55%', '71%', '93%', '20%', 'Rp2.800.000', 37),
(38, '58%', '88%', '94%', '46%', '48%', 'Rp7.000.000', 38),
(39, '73%', '72%', '69%', '89%', '32%', 'Rp3.900.000', 39),
(40, '48%', '98%', '60%', '96%', '15%', 'Rp1.800.000', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan_perusahaan`
--

CREATE TABLE `pendapatan_perusahaan` (
  `id_profit_perusahaan` int(5) NOT NULL,
  `januari` double NOT NULL,
  `februari` double NOT NULL,
  `maret` double NOT NULL,
  `april` double NOT NULL,
  `mei` double NOT NULL,
  `juni` double NOT NULL,
  `juli` double NOT NULL,
  `agustus` double NOT NULL,
  `september` double NOT NULL,
  `oktober` double NOT NULL,
  `november` double NOT NULL,
  `desember` double NOT NULL,
  `avg_profit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendapatan_perusahaan`
--

INSERT INTO `pendapatan_perusahaan` (`id_profit_perusahaan`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `avg_profit`) VALUES
(1, 2800000000, 2750000000, 3150000000, 3100000000, 2975000000, 2745000000, 3345000000, 3250000000, 2754500000, 2895000000, 3235000000, 3345000000, 'Rp.334.500.0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan_unit`
--

CREATE TABLE `pendapatan_unit` (
  `id_pendapatan` int(5) NOT NULL,
  `Januari` double NOT NULL,
  `Februari` double NOT NULL,
  `Maret` double NOT NULL,
  `April` double NOT NULL,
  `Mei` double NOT NULL,
  `Juni` double NOT NULL,
  `Juli` double NOT NULL,
  `Agustus` double NOT NULL,
  `September` double NOT NULL,
  `Oktober` double NOT NULL,
  `November` double NOT NULL,
  `Desember` double NOT NULL,
  `jumlah` double NOT NULL,
  `rata_rata_per_bulan` double NOT NULL,
  `avg_profit` varchar(100) NOT NULL,
  `id_unit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendapatan_unit`
--

INSERT INTO `pendapatan_unit` (`id_pendapatan`, `Januari`, `Februari`, `Maret`, `April`, `Mei`, `Juni`, `Juli`, `Agustus`, `September`, `Oktober`, `November`, `Desember`, `jumlah`, `rata_rata_per_bulan`, `avg_profit`, `id_unit`) VALUES
(1, 105000000, 113000000, 102000000, 99000000, 98000000, 106000000, 118000000, 110000000, 117000000, 109000000, 121000000, 123000000, 1152400000, 108500000, 'Rp.121.525.000', 1),
(2, 100000000, 120000000, 101000000, 97000000, 99000000, 100000000, 115000000, 105000000, 110000000, 105000000, 120000000, 122000000, 1275300000, 113800000, '', 2),
(3, 115000000, 116000000, 104000000, 100000000, 97000000, 108000000, 120000000, 112000000, 116000000, 106000000, 118000000, 119000000, 1057800000, 99000000, '', 3),
(4, 110000000, 105000000, 100000000, 95000000, 98000000, 105000000, 116000000, 108000000, 115000000, 103000000, 117000000, 121000000, 1289600000, 114500000, '', 4),
(5, 108000000, 114000000, 103000000, 96000000, 99000000, 102000000, 114000000, 105000000, 112000000, 104000000, 119000000, 120000000, 987000000, 102000000, '', 5),
(6, 103000000, 111000000, 101000000, 97000000, 100000000, 103000000, 112000000, 106000000, 118000000, 106000000, 120000000, 122000000, 1154600000, 109200000, '', 6),
(7, 106000000, 108000000, 100000000, 98000000, 99000000, 105000000, 110000000, 107000000, 120000000, 107000000, 115000000, 123000000, 1217000000, 107900000, '', 7),
(8, 112000000, 109000000, 104000000, 96000000, 97000000, 108000000, 118000000, 108000000, 116000000, 108000000, 117000000, 124000000, 1045300000, 98000000, '', 8),
(9, 100000000, 110000000, 103000000, 95000000, 98000000, 101000000, 116000000, 109000000, 117000000, 110000000, 116000000, 120000000, 1123400000, 105700000, '', 9),
(10, 105000000, 115000000, 102000000, 97000000, 99000000, 106000000, 120000000, 110000000, 112000000, 109000000, 118000000, 121000000, 1269000000, 112200000, '', 10),
(11, 105000000, 113000000, 102000000, 99000000, 98000000, 106000000, 118000000, 110000000, 117000000, 109000000, 121000000, 123000000, 1248000000, 112000000, '', 11),
(12, 100000000, 120000000, 101000000, 97000000, 99000000, 100000000, 115000000, 105000000, 110000000, 105000000, 120000000, 122000000, 1156000000, 104000000, '', 12),
(13, 115000000, 116000000, 104000000, 100000000, 97000000, 108000000, 120000000, 112000000, 116000000, 106000000, 118000000, 119000000, 1087000000, 96000000, '', 13),
(14, 110000000, 105000000, 100000000, 95000000, 98000000, 105000000, 116000000, 108000000, 115000000, 103000000, 117000000, 121000000, 1295000000, 116000000, '', 14),
(15, 108000000, 114000000, 103000000, 96000000, 99000000, 102000000, 114000000, 105000000, 112000000, 104000000, 119000000, 120000000, 1032000000, 92000000, '', 15),
(16, 103000000, 111000000, 101000000, 97000000, 100000000, 103000000, 112000000, 106000000, 118000000, 106000000, 120000000, 122000000, 1189000000, 106000000, '', 16),
(17, 106000000, 108000000, 100000000, 98000000, 99000000, 105000000, 110000000, 107000000, 120000000, 107000000, 115000000, 123000000, 1118000000, 100000000, '', 17),
(18, 112000000, 109000000, 104000000, 96000000, 97000000, 108000000, 118000000, 108000000, 116000000, 108000000, 117000000, 124000000, 1237000000, 110000000, '', 18),
(19, 100000000, 110000000, 103000000, 95000000, 98000000, 101000000, 116000000, 109000000, 117000000, 110000000, 116000000, 120000000, 1076000000, 96000000, '', 19),
(20, 105000000, 115000000, 102000000, 97000000, 99000000, 106000000, 120000000, 110000000, 112000000, 109000000, 118000000, 121000000, 1153000000, 103000000, '', 20),
(21, 107000000, 112000000, 104000000, 98000000, 97000000, 107000000, 119000000, 110000000, 115000000, 107000000, 120000000, 122000000, 1195000000, 107000000, '', 21),
(22, 105000000, 113000000, 101000000, 97000000, 98000000, 105000000, 118000000, 105000000, 114000000, 109000000, 121000000, 123000000, 1064000000, 94000000, '', 22),
(23, 100000000, 120000000, 102000000, 96000000, 99000000, 100000000, 115000000, 106000000, 117000000, 105000000, 120000000, 122000000, 1281000000, 115000000, '', 23),
(24, 115000000, 116000000, 103000000, 95000000, 97000000, 108000000, 120000000, 108000000, 116000000, 106000000, 118000000, 119000000, 1040000000, 93000000, '', 24),
(25, 110000000, 105000000, 100000000, 97000000, 98000000, 105000000, 116000000, 109000000, 115000000, 103000000, 117000000, 121000000, 1177000000, 105000000, '', 25),
(26, 108000000, 114000000, 104000000, 96000000, 99000000, 102000000, 114000000, 105000000, 112000000, 104000000, 119000000, 120000000, 1126000000, 101000000, '', 26),
(27, 103000000, 111000000, 101000000, 97000000, 100000000, 103000000, 112000000, 106000000, 118000000, 106000000, 120000000, 122000000, 1215000000, 109000000, '', 27),
(28, 106000000, 108000000, 100000000, 98000000, 99000000, 105000000, 110000000, 107000000, 120000000, 107000000, 115000000, 123000000, 1054000000, 94000000, '', 28),
(29, 112000000, 109000000, 104000000, 96000000, 97000000, 108000000, 118000000, 108000000, 116000000, 108000000, 117000000, 124000000, 1141000000, 102000000, '', 29),
(30, 100000000, 110000000, 103000000, 95000000, 98000000, 101000000, 116000000, 109000000, 117000000, 110000000, 116000000, 120000000, 1228000000, 110000000, '', 30),
(31, 105000000, 113000000, 102000000, 99000000, 98000000, 106000000, 118000000, 110000000, 117000000, 109000000, 121000000, 123000000, 1097000000, 102500000, '', 31),
(32, 100000000, 120000000, 101000000, 97000000, 99000000, 100000000, 115000000, 105000000, 110000000, 105000000, 120000000, 122000000, 1162000000, 108400000, '', 32),
(33, 115000000, 116000000, 104000000, 100000000, 97000000, 108000000, 120000000, 112000000, 116000000, 106000000, 118000000, 119000000, 1289000000, 113700000, '', 33),
(34, 110000000, 105000000, 100000000, 95000000, 98000000, 105000000, 116000000, 108000000, 115000000, 103000000, 117000000, 121000000, 1056000000, 98800000, '', 34),
(35, 108000000, 114000000, 103000000, 96000000, 99000000, 102000000, 114000000, 105000000, 112000000, 104000000, 119000000, 120000000, 1225000000, 109000000, '', 35),
(36, 103000000, 111000000, 101000000, 97000000, 100000000, 103000000, 112000000, 106000000, 118000000, 106000000, 120000000, 122000000, 1134000000, 106300000, '', 36),
(37, 106000000, 108000000, 100000000, 98000000, 99000000, 105000000, 110000000, 107000000, 120000000, 107000000, 115000000, 123000000, 1072000000, 102800000, '', 37),
(38, 112000000, 109000000, 104000000, 96000000, 97000000, 108000000, 118000000, 108000000, 116000000, 108000000, 117000000, 124000000, 1159000000, 107100000, '', 38),
(39, 100000000, 110000000, 103000000, 95000000, 98000000, 101000000, 116000000, 109000000, 117000000, 110000000, 116000000, 120000000, 1111000000, 105200000, '', 39),
(40, 105000000, 115000000, 102000000, 97000000, 99000000, 106000000, 120000000, 110000000, 112000000, 109000000, 118000000, 121000000, 1038000000, 98700000, '', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spend_perusahaan`
--

CREATE TABLE `spend_perusahaan` (
  `id_spend_perusahaan` int(5) NOT NULL,
  `januari` double NOT NULL,
  `februari` double NOT NULL,
  `maret` double NOT NULL,
  `april` double NOT NULL,
  `mei` double NOT NULL,
  `juni` double NOT NULL,
  `juli` double NOT NULL,
  `agustus` double NOT NULL,
  `september` double NOT NULL,
  `oktober` double NOT NULL,
  `november` double NOT NULL,
  `desember` double NOT NULL,
  `avg_spend` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spend_perusahaan`
--

INSERT INTO `spend_perusahaan` (`id_spend_perusahaan`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `avg_spend`) VALUES
(2, 980000000, 1145000000, 1425000000, 875000000, 1275000000, 850000000, 950000000, 1405000000, 825000000, 1220000000, 1450000000, 900000000, 'Rp.90.000.0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spend_unit`
--

CREATE TABLE `spend_unit` (
  `id_spend` int(5) NOT NULL,
  `id_unit` int(5) NOT NULL,
  `januari` double NOT NULL,
  `februari` double NOT NULL,
  `maret` double NOT NULL,
  `april` double NOT NULL,
  `mei` double NOT NULL,
  `juni` double NOT NULL,
  `juli` double NOT NULL,
  `agustus` double NOT NULL,
  `september` double NOT NULL,
  `oktober` double NOT NULL,
  `november` double NOT NULL,
  `desember` double NOT NULL,
  `jumlah` double NOT NULL,
  `rata_rata_per_bulan` double NOT NULL,
  `avg_spend` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spend_unit`
--

INSERT INTO `spend_unit` (`id_spend`, `id_unit`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `jumlah`, `rata_rata_per_bulan`, `avg_spend`) VALUES
(1, 1, 16300000, 14100000, 19400000, 13500000, 17500000, 21800000, 17300000, 11400000, 20400000, 22300000, 13300000, 19800000, 227550000, 16900000, 'Rp.18.052.500'),
(2, 2, 13900000, 20200000, 15200000, 12800000, 21800000, 19200000, 11700000, 21300000, 14500000, 22600000, 19800000, 14600000, 228980000, 15970000, '0'),
(3, 3, 18000000, 16800000, 14800000, 19600000, 14700000, 11100000, 21400000, 18900000, 12200000, 23300000, 13900000, 22500000, 224670000, 15860000, '0'),
(4, 4, 13600000, 19900000, 18600000, 15500000, 20300000, 14800000, 14100000, 19600000, 22300000, 17300000, 12100000, 23900000, 229320000, 18450000, '0'),
(5, 5, 21600000, 14400000, 12100000, 17800000, 13300000, 19200000, 19800000, 20800000, 13800000, 19500000, 13200000, 22300000, 222440000, 18790000, '0'),
(6, 6, 14600000, 12300000, 16300000, 22000000, 20200000, 17500000, 20200000, 18700000, 18600000, 13800000, 21000000, 14900000, 228170000, 17320000, '0'),
(7, 7, 18700000, 21300000, 19600000, 19900000, 15500000, 18900000, 14500000, 13900000, 19600000, 14300000, 13500000, 20200000, 220430000, 16380000, '0'),
(8, 8, 15500000, 20100000, 13700000, 22000000, 18000000, 19300000, 19000000, 15100000, 21900000, 13200000, 19800000, 15500000, 221770000, 16710000, '0'),
(9, 9, 13800000, 16200000, 20200000, 17300000, 18700000, 20700000, 12200000, 20500000, 21900000, 16100000, 13900000, 21600000, 226680000, 15220000, '0'),
(10, 10, 16100000, 22200000, 18800000, 14700000, 21600000, 19600000, 14700000, 12800000, 22400000, 19600000, 18800000, 17200000, 223560000, 17360000, '0'),
(11, 11, 17200000, 15200000, 21100000, 15900000, 14700000, 20600000, 12500000, 22400000, 21500000, 13500000, 19900000, 21800000, 229890000, 16830000, '0'),
(12, 12, 20700000, 16900000, 22400000, 20200000, 17500000, 13400000, 13300000, 15400000, 20500000, 15800000, 20600000, 12700000, 225330000, 18040000, '0'),
(13, 13, 19300000, 20500000, 19800000, 14600000, 13400000, 21400000, 13000000, 18800000, 14000000, 18300000, 22300000, 15600000, 222780000, 16390000, '0'),
(14, 14, 14100000, 14900000, 15700000, 16100000, 19700000, 13100000, 15300000, 22700000, 16500000, 14700000, 20500000, 22900000, 226440000, 19000000, '0'),
(15, 15, 13200000, 21500000, 17000000, 18200000, 18500000, 18800000, 22000000, 13300000, 18700000, 22100000, 13800000, 17600000, 222710000, 18320000, '0'),
(16, 16, 19800000, 17700000, 16300000, 16900000, 19900000, 16700000, 20000000, 21800000, 15700000, 19300000, 21400000, 13100000, 228140000, 16510000, '0'),
(17, 17, 16600000, 14400000, 14600000, 21000000, 20700000, 15700000, 17200000, 20400000, 13700000, 17200000, 18900000, 20800000, 227300000, 17890000, '0'),
(18, 18, 15200000, 21600000, 20300000, 19300000, 16000000, 17600000, 19600000, 18600000, 17600000, 16200000, 19900000, 16000000, 223460000, 17380000, '0'),
(19, 19, 20800000, 18700000, 21200000, 16400000, 15200000, 14500000, 15700000, 20700000, 15300000, 14500000, 18800000, 21900000, 229120000, 16130000, '0'),
(20, 20, 17000000, 17300000, 13700000, 15500000, 19400000, 21600000, 16400000, 21700000, 21600000, 20700000, 14700000, 15500000, 224980000, 15690000, '0'),
(21, 21, 17400000, 12800000, 22200000, 20200000, 14700000, 21500000, 20800000, 19900000, 22100000, 15000000, 19500000, 22600000, 227220000, 19000000, '0'),
(22, 22, 15100000, 20300000, 15200000, 17500000, 14000000, 18700000, 21000000, 15600000, 20400000, 22700000, 16700000, 18800000, 221780000, 16320000, '0'),
(23, 23, 20300000, 18200000, 13800000, 18900000, 19600000, 12900000, 21200000, 16000000, 21100000, 17900000, 14200000, 19200000, 228430000, 16850000, '0'),
(24, 24, 14000000, 15400000, 21000000, 15600000, 13700000, 19000000, 17000000, 22400000, 19500000, 18700000, 20700000, 13100000, 226090000, 17460000, '0'),
(25, 25, 21300000, 19800000, 22300000, 14400000, 22200000, 14000000, 12800000, 21100000, 17000000, 20700000, 18700000, 15300000, 222870000, 15920000, '0'),
(26, 26, 14600000, 18000000, 21100000, 15900000, 16900000, 19600000, 22200000, 13400000, 14500000, 22000000, 16400000, 19400000, 228520000, 18370000, '0'),
(27, 27, 21200000, 14400000, 20000000, 18200000, 20700000, 19600000, 14900000, 13700000, 21200000, 18600000, 20700000, 13800000, 224190000, 17250000, '0'),
(28, 28, 17400000, 21400000, 17200000, 20900000, 17500000, 18800000, 21000000, 18300000, 16400000, 15000000, 13800000, 20900000, 222680000, 16540000, '0'),
(29, 29, 15000000, 16400000, 18900000, 20200000, 19400000, 21500000, 18000000, 20900000, 17900000, 18600000, 19300000, 14400000, 227330000, 15970000, '0'),
(30, 30, 18800000, 13700000, 19900000, 19300000, 16300000, 21400000, 14500000, 20500000, 19100000, 22100000, 20000000, 16600000, 225110000, 19000000, '0'),
(31, 31, 19600000, 16800000, 19800000, 14900000, 18800000, 16800000, 19000000, 16800000, 19200000, 14700000, 19300000, 18700000, 221580000, 18530000, '0'),
(32, 32, 18200000, 14300000, 21800000, 15900000, 16600000, 21100000, 17800000, 20600000, 18600000, 21400000, 13900000, 19500000, 228210000, 16920000, '0'),
(33, 33, 21100000, 18400000, 18500000, 21400000, 20100000, 15600000, 22300000, 17000000, 21400000, 16100000, 21400000, 14500000, 221450000, 16500000, '0'),
(34, 34, 15300000, 18900000, 15000000, 17700000, 19200000, 16200000, 21600000, 20300000, 19900000, 20500000, 20800000, 19800000, 228700000, 17400000, '0'),
(35, 35, 16200000, 19800000, 14800000, 19100000, 19000000, 17700000, 19800000, 20800000, 18700000, 15600000, 20000000, 17800000, 227600000, 17100000, '0'),
(36, 36, 17100000, 21300000, 20700000, 14200000, 20000000, 19300000, 14000000, 15100000, 18500000, 15200000, 20700000, 19100000, 225200000, 16600000, '0'),
(37, 37, 19100000, 20000000, 21000000, 13800000, 17300000, 17600000, 16000000, 14100000, 21300000, 14300000, 17100000, 15000000, 222800000, 16000000, '0'),
(38, 38, 15800000, 16200000, 19700000, 20400000, 19800000, 20100000, 21800000, 22100000, 20700000, 17600000, 20900000, 20500000, 223750000, 16250000, '0'),
(39, 39, 19600000, 21300000, 17000000, 19400000, 18500000, 21200000, 17100000, 17700000, 14900000, 20600000, 16500000, 16000000, 222150000, 15900000, '0'),
(40, 40, 16800000, 16500000, 18500000, 20000000, 15500000, 15700000, 18500000, 14300000, 21800000, 21700000, 17400000, 16700000, 224300000, 16350000, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_unit`
--

CREATE TABLE `status_unit` (
  `id_status` int(5) NOT NULL,
  `id_unit` int(5) NOT NULL,
  `keterangan_status` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_unit`
--

INSERT INTO `status_unit` (`id_status`, `id_unit`, `keterangan_status`) VALUES
(1, 1, 'Memiliki catatan kerusakan'),
(2, 2, 'Unit dalam keadaan baik'),
(3, 3, 'Dalam perawatan di bengkel'),
(4, 4, 'Unit dalam keadaan baik'),
(5, 5, 'Memiliki catatan kerusakan'),
(6, 6, 'Dalam perawatan di bengkel'),
(7, 7, 'Unit dalam keadaan baik'),
(8, 8, 'Unit dalam keadaan baik'),
(9, 9, 'Dalam perawatan di bengkel'),
(10, 10, 'Unit dalam keadaan baik'),
(11, 11, 'Memiliki catatan kerusakan'),
(12, 12, 'Unit dalam keadaan baik'),
(13, 13, 'Dalam perawatan di bengkel'),
(14, 14, 'Unit dalam keadaan baik'),
(15, 15, 'Memiliki catatan kerusakan'),
(16, 16, 'Unit dalam keadaan baik'),
(17, 17, 'Dalam perawatan di bengkel'),
(18, 18, 'Unit dalam keadaan baik'),
(19, 19, 'Memiliki catatan kerusakan'),
(20, 20, 'Unit dalam keadaan baik'),
(21, 21, 'Dalam perawatan di bengkel'),
(22, 22, 'Unit dalam keadaan baik'),
(23, 23, 'Memiliki catatan kerusakan'),
(24, 24, 'Unit dalam keadaan baik'),
(25, 25, 'Dalam perawatan di bengkel'),
(26, 26, 'Unit dalam keadaan baik'),
(27, 27, 'Memiliki catatan kerusakan'),
(28, 28, 'Unit dalam keadaan baik'),
(29, 29, 'Dalam perawatan di bengkel'),
(30, 30, 'Unit dalam keadaan baik'),
(31, 31, 'Unit dalam keadaan baik'),
(32, 32, 'Memiliki catatan kerusakan'),
(33, 33, 'Unit dalam keadaan baik'),
(34, 34, 'Dalam perawatan di bengkel'),
(35, 35, 'Unit dalam keadaan baik'),
(36, 36, 'Memiliki catatan kerusakan'),
(37, 37, 'Unit dalam keadaan baik'),
(38, 38, 'Dalam perawatan di bengkel'),
(39, 39, 'Unit dalam keadaan baik'),
(40, 40, 'Memiliki catatan kerusakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(10) NOT NULL,
  `nomer_lambung` varchar(25) NOT NULL,
  `plat_nomer` varchar(10) NOT NULL,
  `chassis` varchar(50) NOT NULL,
  `foto_unit` varchar(100) NOT NULL,
  `odometer` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nomer_lambung`, `plat_nomer`, `chassis`, `foto_unit`, `odometer`) VALUES
(1, 'AA001', 'AD 2897 BC', 'Scania K360', 'unit1.png', '475.658Km'),
(2, 'AA002', 'AD 4427 BC', 'Scania K360', 'unit2.png', '475.658Km'),
(3, 'AA003', 'AD 1234 BC', 'Scania K360', 'unit2.png', '123456Km'),
(4, 'AA004', 'AD 5678 BC', 'Hino RK 8', 'unit3.png', '789012Km'),
(5, 'AA005', 'AD 9876 BC', 'Mercedes OC 1836', 'unit4.png', '654321Km'),
(6, 'AA006', 'AD 2468 BC', 'Scania K360', 'unit5.png', '987654Km'),
(7, 'AA007', 'AD 1357 BC', 'Hino RK 8', 'unit6.png', '135792Km'),
(8, 'AA008', 'AD 8642 BC', 'Mercedes OC 1836', 'unit1.png', '246813Km'),
(9, 'AA009', 'AD 7531 BC', 'Scania K360', 'unit2.png', '579246Km'),
(10, 'AA010', 'AD 9513 BC', 'Hino RK 8', 'unit3.png', '468135Km'),
(11, 'AA011', 'AD 3698 BC', 'Mercedes OC 1836', 'unit4.png', '813579Km'),
(12, 'AA012', 'AD 2897 BC', 'Scania K360', 'unit1.png', '475.658Km'),
(13, 'AA013', 'AD 1234 BC', 'Scania K360', 'unit2.png', '123456Km'),
(14, 'AA014', 'AD 5678 BC', 'Hino RK 8', 'unit3.png', '789012Km'),
(15, 'AA015', 'AD 9876 BC', 'Mercedes OC 1836', 'unit4.png', '654321Km'),
(16, 'AA016', 'AD 2468 BC', 'Scania K360', 'unit5.png', '987654Km'),
(17, 'AA017', 'AD 1357 BC', 'Hino RK 8', 'unit6.png', '135792Km'),
(18, 'AA018', 'AD 8642 BC', 'Mercedes OC 1836', 'unit1.png', '246813Km'),
(19, 'AA019', 'AD 7531 BC', 'Scania K360', 'unit2.png', '579246Km'),
(20, 'AA020', 'AD 9513 BC', 'Hino RK 8', 'unit3.png', '468135Km'),
(21, 'AA021', 'AD 3698 BC', 'Mercedes OC 1836', 'unit4.png', '813579Km'),
(22, 'AA022', 'AD 2897 BC', 'Scania K360', 'unit1.png', '475.658Km'),
(23, 'AA023', 'AD 1234 BC', 'Scania K360', 'unit2.png', '123456Km'),
(24, 'AA024', 'AD 5678 BC', 'Hino RK 8', 'unit3.png', '789012Km'),
(25, 'AA025', 'AD 9876 BC', 'Mercedes OC 1836', 'unit4.png', '654321Km'),
(26, 'AA026', 'AD 2468 BC', 'Scania K360', 'unit5.png', '987654Km'),
(27, 'AA027', 'AD 1357 BC', 'Hino RK 8', 'unit6.png', '135792Km'),
(28, 'AA028', 'AD 8642 BC', 'Mercedes OC 1836', 'unit1.png', '246813Km'),
(29, 'AA029', 'AD 7531 BC', 'Scania K360', 'unit2.png', '579246Km'),
(30, 'AA030', 'AD 9513 BC', 'Hino RK 8', 'unit3.png', '468135Km'),
(31, 'AA031', 'AD 3698 BC', 'Mercedes OC 1836', 'unit4.png', '813579Km'),
(32, 'AA032', 'AD 5674 BC', 'Scania K360', 'unit5.png', '457823Km'),
(33, 'AA033', 'AD 2819 BC', 'Hino RK 8', 'unit6.png', '239846Km'),
(34, 'AA034', 'AD 7432 BC', 'Mercedes OC 1836', 'unit1.png', '925481Km'),
(35, 'AA035', 'AD 6315 BC', 'Scania K360', 'unit2.png', '641379Km'),
(36, 'AA036', 'AD 4856 BC', 'Hino RK 8', 'unit3.png', '364715Km'),
(37, 'AA037', 'AD 9524 BC', 'Mercedes OC 1836', 'unit4.png', '817635Km'),
(38, 'AA038', 'AD 3657 BC', 'Scania K360', 'unit5.png', '586241Km'),
(39, 'AA039', 'AD 7192 BC', 'Hino RK 8', 'unit6.png', '452963Km'),
(40, 'AA040', 'AD 8246 BC', 'Mercedes OC 1836', 'unit1.png', '123456Km');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usability`
--

CREATE TABLE `usability` (
  `id_usability` int(5) NOT NULL,
  `avg_daily_profit` varchar(25) NOT NULL,
  `avg_daily_spend` varchar(25) NOT NULL,
  `avg_monthly_profit` varchar(25) NOT NULL,
  `avg_monthly_spend` varchar(25) NOT NULL,
  `avg_fuel` varchar(25) NOT NULL,
  `avg_job` varchar(10) NOT NULL,
  `id_unit` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `usability`
--

INSERT INTO `usability` (`id_usability`, `avg_daily_profit`, `avg_daily_spend`, `avg_monthly_profit`, `avg_monthly_spend`, `avg_fuel`, `avg_job`, `id_unit`) VALUES
(1, 'Rp2.500.000', 'Rp750.000', 'Rp13.750.000', 'Rp23.000.000', '567lt/trip', '25 Trip/Mo', 1),
(2, 'Rp2.100.000', 'Rp800.000', 'Rp15.200.000', 'Rp25.400.000', '600lt/trip', '26 Trip/Mo', 2),
(3, 'Rp2.800.000', 'Rp900.000', 'Rp16.100.000', 'Rp26.900.000', '550lt/trip', '27 Trip/Mo', 3),
(4, 'Rp2.300.000', 'Rp850.000', 'Rp14.950.000', 'Rp24.900.000', '590lt/trip', '28 Trip/Mo', 4),
(5, 'Rp2.600.000', 'Rp780.000', 'Rp15.400.000', 'Rp25.700.000', '570lt/trip', '29 Trip/Mo', 5),
(6, 'Rp2.400.000', 'Rp720.000', 'Rp13.800.000', 'Rp23.000.000', '580lt/trip', '30 Trip/Mo', 6),
(7, 'Rp2.900.000', 'Rp820.000', 'Rp16.300.000', 'Rp27.200.000', '560lt/trip', '25 Trip/Mo', 7),
(8, 'Rp2.200.000', 'Rp750.000', 'Rp14.500.000', 'Rp24.200.000', '590lt/trip', '26 Trip/Mo', 8),
(9, 'Rp2.700.000', 'Rp850.000', 'Rp15.900.000', 'Rp26.500.000', '550lt/trip', '27 Trip/Mo', 9),
(10, 'Rp2.500.000', 'Rp780.000', 'Rp14.800.000', 'Rp24.700.000', '570lt/trip', '28 Trip/Mo', 10),
(11, 'Rp2.500.000', 'Rp1.500.000', 'Rp20.000.000', 'Rp15.000.000', '567lt/trip', '29 Trip/Mo', 11),
(12, 'Rp2.200.000', 'Rp2.000.000', 'Rp18.000.000', 'Rp11.500.000', '500lt/trip', '30 Trip/Mo', 12),
(13, 'Rp3.100.000', 'Rp1.800.000', 'Rp22.500.000', 'Rp18.500.000', '600lt/trip', '25 Trip/Mo', 13),
(14, 'Rp1.800.000', 'Rp2.500.000', 'Rp15.500.000', 'Rp10.000.000', '450lt/trip', '26 Trip/Mo', 14),
(15, 'Rp2.800.000', 'Rp1.200.000', 'Rp24.000.000', 'Rp16.500.000', '550lt/trip', '27 Trip/Mo', 15),
(16, 'Rp2.400.000', 'Rp2.300.000', 'Rp17.500.000', 'Rp12.500.000', '520lt/trip', '28 Trip/Mo', 16),
(17, 'Rp2.900.000', 'Rp1.700.000', 'Rp21.000.000', 'Rp17.000.000', '590lt/trip', '29 Trip/Mo', 17),
(18, 'Rp2.100.000', 'Rp2.100.000', 'Rp16.000.000', 'Rp13.500.000', '480lt/trip', '30 Trip/Mo', 18),
(19, 'Rp2.600.000', 'Rp1.400.000', 'Rp19.500.000', 'Rp14.500.000', '530lt/trip', '25 Trip/Mo', 19),
(20, 'Rp2.300.000', 'Rp1.900.000', 'Rp17.000.000', 'Rp11.000.000', '510lt/trip', '26 Trip/Mo', 20),
(21, 'Rp2.500.000', 'Rp1.500.000', 'Rp20.000.000', 'Rp15.000.000', '567lt/trip', '25 Trip/Mo', 21),
(22, 'Rp2.200.000', 'Rp2.000.000', 'Rp18.000.000', 'Rp11.500.000', '500lt/trip', '26 Trip/Mo', 22),
(23, 'Rp3.100.000', 'Rp1.800.000', 'Rp22.500.000', 'Rp18.500.000', '600lt/trip', '27 Trip/Mo', 23),
(24, 'Rp1.800.000', 'Rp2.500.000', 'Rp15.500.000', 'Rp10.000.000', '450lt/trip', '28 Trip/Mo', 24),
(25, 'Rp2.800.000', 'Rp1.200.000', 'Rp24.000.000', 'Rp16.500.000', '550lt/trip', '29 Trip/Mo', 25),
(26, 'Rp2.400.000', 'Rp2.300.000', 'Rp17.500.000', 'Rp12.500.000', '520lt/trip', '30 Trip/Mo', 26),
(27, 'Rp2.900.000', 'Rp1.700.000', 'Rp21.000.000', 'Rp17.000.000', '590lt/trip', '25 Trip/Mo', 27),
(28, 'Rp2.100.000', 'Rp2.100.000', 'Rp16.000.000', 'Rp13.500.000', '480lt/trip', '26 Trip/Mo', 28),
(29, 'Rp2.600.000', 'Rp1.400.000', 'Rp19.500.000', 'Rp14.500.000', '530lt/trip', '27 Trip/Mo', 29),
(30, 'Rp2.300.000', 'Rp1.900.000', 'Rp17.000.000', 'Rp11.000.000', '510lt/trip', '28 Trip/Mo', 30),
(31, 'Rp2.800.000', 'Rp1.200.000', 'Rp23.500.000', 'Rp17.500.000', '580lt/trip', '29 Trip/Mo', 31),
(32, 'Rp2.400.000', 'Rp1.800.000', 'Rp18.500.000', 'Rp14.500.000', '530lt/trip', '30 Trip/Mo', 32),
(33, 'Rp2.900.000', 'Rp2.500.000', 'Rp21.000.000', 'Rp15.500.000', '570lt/trip', '25 Trip/Mo', 33),
(34, 'Rp2.200.000', 'Rp1.500.000', 'Rp19.000.000', 'Rp11.500.000', '510lt/trip', '26 Trip/Mo', 34),
(35, 'Rp2.600.000', 'Rp2.300.000', 'Rp22.500.000', 'Rp16.500.000', '550lt/trip', '27 Trip/Mo', 35),
(36, 'Rp2.100.000', 'Rp1.400.000', 'Rp17.500.000', 'Rp12.500.000', '500lt/trip', '28 Trip/Mo', 36),
(37, 'Rp2.500.000', 'Rp2.000.000', 'Rp20.000.000', 'Rp18.000.000', '590lt/trip', '29 Trip/Mo', 37),
(38, 'Rp2.300.000', 'Rp1.700.000', 'Rp16.500.000', 'Rp13.000.000', '540lt/trip', '30 Trip/Mo', 38),
(39, 'Rp2.700.000', 'Rp1.300.000', 'Rp22.000.000', 'Rp17.000.000', '560lt/trip', '25 Trip/Mo', 39),
(40, 'Rp2.000.000', 'Rp1.900.000', 'Rp15.500.000', 'Rp10.500.000', '520lt/trip', '26 Trip/Mo', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `user_type`) VALUES
(1, 'alwi_kriting', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chart_kondisi_unit`
--
ALTER TABLE `chart_kondisi_unit`
  ADD PRIMARY KEY (`id_kondisi_unit`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `data_chassis`
--
ALTER TABLE `data_chassis`
  ADD PRIMARY KEY (`id_chassis`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `kondisi_unit`
--
ALTER TABLE `kondisi_unit`
  ADD PRIMARY KEY (`id_kondisi`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `pendapatan_perusahaan`
--
ALTER TABLE `pendapatan_perusahaan`
  ADD PRIMARY KEY (`id_profit_perusahaan`);

--
-- Indeks untuk tabel `pendapatan_unit`
--
ALTER TABLE `pendapatan_unit`
  ADD PRIMARY KEY (`id_pendapatan`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `spend_perusahaan`
--
ALTER TABLE `spend_perusahaan`
  ADD PRIMARY KEY (`id_spend_perusahaan`);

--
-- Indeks untuk tabel `spend_unit`
--
ALTER TABLE `spend_unit`
  ADD PRIMARY KEY (`id_spend`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `status_unit`
--
ALTER TABLE `status_unit`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `usability`
--
ALTER TABLE `usability`
  ADD PRIMARY KEY (`id_usability`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kondisi_unit`
--
ALTER TABLE `kondisi_unit`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `status_unit`
--
ALTER TABLE `status_unit`
  MODIFY `id_status` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `usability`
--
ALTER TABLE `usability`
  MODIFY `id_usability` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chart_kondisi_unit`
--
ALTER TABLE `chart_kondisi_unit`
  ADD CONSTRAINT `chart_kondisi_unit_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `data_chassis`
--
ALTER TABLE `data_chassis`
  ADD CONSTRAINT `data_chassis_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `history_log`
--
ALTER TABLE `history_log`
  ADD CONSTRAINT `history_log_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `kondisi_unit`
--
ALTER TABLE `kondisi_unit`
  ADD CONSTRAINT `kondisi_unit_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `pendapatan_unit`
--
ALTER TABLE `pendapatan_unit`
  ADD CONSTRAINT `pendapatan_unit_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `spend_unit`
--
ALTER TABLE `spend_unit`
  ADD CONSTRAINT `spend_unit_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `status_unit`
--
ALTER TABLE `status_unit`
  ADD CONSTRAINT `status_unit_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `usability`
--
ALTER TABLE `usability`
  ADD CONSTRAINT `usability_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

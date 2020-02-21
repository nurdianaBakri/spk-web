-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2020 pada 15.09
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi_wisata`
--

CREATE TABLE `destinasi_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `lat` varchar(30) NOT NULL,
  `jenis_wisata` int(11) NOT NULL,
  `fasilitas` varchar(20) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `lng` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `destinasi_wisata`
--

INSERT INTO `destinasi_wisata` (`id_wisata`, `nama_wisata`, `alamat`, `lat`, `jenis_wisata`, `fasilitas`, `gambar`, `lng`, `keterangan`, `biaya`) VALUES
(1, 'AIR TERJUN TIUKELEP', 'SENARU-BAYAN', '-8.719748', 2, 'Mushola,Hotel', '1582127253.png', '116.058121', 'Air terjun ini merupakan destinasi yang populer di kaki Gunung Rinjani. Di kaki gunung ini memang ada dua air terjun populer yaitu Air Terjun Sendang Gile dan Air Terjun Tiu Kelep.\r\n\r\nAir Terjun Tiu Kelep berada di dekat Air Terjun Sendang Gile. Jadi, wisatawan lebih dulu menuju Air Terjun Sendang Gile lalu melanjutkannya ke Air Terjun Tiu Kelep dengan satu kali tiket masuk.', 0),
(2, 'PANTAI CEMARA', 'LOMBOK-BARAT', '-8.5203828', 1, 'Mushola', '1582127267.png', '116.2831224', 'Pantai cemare terletak di daerah lembar, Kabupaten Lombok barat. Pantai ini terletak didaerah utara pelabuhan lembar, pantai ini memang bukan tempat tujuan utama wisata di pulau Lombok, tapi tidak salah juga kalau ingin berkunjung kesana. Mungkin bagi teman-teman yang ingin mencari tempat untuk refresing, menghilangkan kejenuhan/kepenatan. Saya rasa pantai ini sangat cocok untuk itu karna pantai ini sangat nyaman dan cocok dijadikan tempat berwisata. Pantai cemare sangat ramai dikunjungi pada waktu liburan baik kalangan remaja maupun orang dewasa.\r\n\r\n Akses perjalanan menuju pantai cemara pun tidak terlalu sulit, ditengah perjalanan kita akan menemukan sebuah jembatan kayu yang sangat bagus dan jembatan menjadi daya tarik tersendiri bagi para pengunjung jembatan ini sering dijadikan lokasi hunting dan tempat nongkrong bagi kalangan remaja. Kehidupan didesa cemare ini pun masih sangat kental selayaknya desa nelayan pantai pasir hitam dengan sentuhan bukit di sebelah selatan pantai yang berhiaskan jajaran perahu nelayan membuat view (pemandangan) disini menjadi lebih menarik.', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `titik_a` varchar(255) NOT NULL,
  `titik_b` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_wisata`
--

CREATE TABLE `jenis_wisata` (
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_wisata`
--

INSERT INTO `jenis_wisata` (`id_jenis`, `nama`) VALUES
(1, 'Pantai'),
(2, 'Air terjun'),
(3, 'Lainya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilaiP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `nilaiP`) VALUES
(1, 'kriteria A', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `admin`, `alamat`, `email`, `no_hp`, `nama`) VALUES
('diana', '3a23bb515e06d0e944ff916e79a7775c', 0, 'mataram', 'diana@gmail.com', '93403', 'Nurdiana'),
('nuri', '883b86a631f14fd095ca4f7627b6be7b', 0, 'mataram', 'nuri@gmail.com', '9890', 'nuri');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `jenis_wisata`
--
ALTER TABLE `jenis_wisata`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_wisata`
--
ALTER TABLE `jenis_wisata`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

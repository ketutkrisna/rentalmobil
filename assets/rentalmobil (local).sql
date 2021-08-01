-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2021 pada 07.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id_booking` int(11) NOT NULL,
  `kode_booking` varchar(50) NOT NULL,
  `id_user_booking` int(11) NOT NULL,
  `id_mobil_booking` int(11) NOT NULL,
  `tanggalambil_booking` datetime NOT NULL,
  `tanggalkembali_booking` datetime NOT NULL,
  `jamambil_booking` varchar(50) NOT NULL,
  `totalhari_booking` int(11) NOT NULL,
  `totalharga_booking` int(11) NOT NULL,
  `denda_booking` int(11) NOT NULL,
  `notlp_booking` varchar(20) NOT NULL,
  `alamat_booking` text NOT NULL,
  `ktp_booking` varchar(150) NOT NULL,
  `tanggalpemesanan_booking` varchar(50) NOT NULL,
  `fotopembayaran_booking` varchar(100) NOT NULL,
  `statuspembayaran_booking` enum('belumbayar','sudahbayar','bayarditolak','bayarditerima') NOT NULL,
  `status_booking` enum('dipesan','dibayar','diambil','dikembalikan','selesai','ditolak','dicancel') NOT NULL,
  `notif_booking` enum('belumdilihat','sudahdilihat','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id_booking`, `kode_booking`, `id_user_booking`, `id_mobil_booking`, `tanggalambil_booking`, `tanggalkembali_booking`, `jamambil_booking`, `totalhari_booking`, `totalharga_booking`, `denda_booking`, `notlp_booking`, `alamat_booking`, `ktp_booking`, `tanggalpemesanan_booking`, `fotopembayaran_booking`, `statuspembayaran_booking`, `status_booking`, `notif_booking`) VALUES
(1, 'RENTAL0001', 2, 2, '2020-07-11 16:00:00', '2020-07-13 16:00:00', '16:00', 2, 1200000, 2000000, '082133234422', 'karang', 'ktp1.jpg', '1594350852', 'rgb.png', 'bayarditerima', 'selesai', 'sudahdilihat'),
(2, 'RENTAL0002', 3, 1, '2020-07-21 09:00:00', '2020-07-23 09:00:00', '09:00', 2, 1400000, 0, '082123231231', 'mulyasari', 'ktp2.jpg', '1594450852', 'struk-atm-bri-2013-img1.jpg', 'bayarditerima', 'diambil', 'sudahdilihat'),
(3, 'RENTAL0003', 3, 2, '2020-07-10 14:00:00', '2020-07-12 14:00:00', '14:00', 2, 1000000, 0, '008', 'neaka', 'ktp3.jpg', '1594453327', '', 'belumbayar', 'dicancel', 'sudahdilihat'),
(4, 'RENTAL0004', 2, 2, '2020-07-17 16:00:00', '2020-07-18 20:16:00', '16:00', 1, 500000, 0, '08231231232', 'mulyasari', 'ktp4.jpg', '1594532941', '', 'belumbayar', 'dipesan', 'sudahdilihat'),
(5, 'RENTAL0005', 4, 1, '2020-07-24 14:00:00', '2020-07-26 14:00:00', '14:00', 2, 1400000, 0, '082321234786', 'mulyasari', 'ktp5.jpg', '1595083817', '', 'belumbayar', 'dipesan', 'sudahdilihat'),
(6, 'RENTAL0006', 4, 1, '2020-08-18 16:00:00', '2020-08-20 16:00:00', '16:00', 2, 1400000, 0, '0844', 'jalan raya', 'ktp6.jpg', '1597554792', '', 'belumbayar', 'dipesan', 'sudahdilihat'),
(7, 'RENTAL0007', 4, 2, '2020-08-28 15:00:00', '2020-08-29 15:00:00', '15:00', 1, 600000, 0, '08999', 'mulyasari', 'iconadnroid.png', '1597556664', '', 'belumbayar', 'dipesan', 'sudahdilihat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobils`
--

CREATE TABLE `mobils` (
  `id_mobil` int(11) NOT NULL,
  `kode_mobil` varchar(50) NOT NULL,
  `foto_mobil` varchar(100) NOT NULL,
  `nama_mobil` varchar(50) NOT NULL,
  `jenis_mobil` varchar(50) NOT NULL,
  `warna_mobil` varchar(50) NOT NULL,
  `nopol_mobil` varchar(50) NOT NULL,
  `tarif_mobil` int(11) NOT NULL,
  `denda_mobil` int(11) NOT NULL,
  `deskripsi_mobil` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobils`
--

INSERT INTO `mobils` (`id_mobil`, `kode_mobil`, `foto_mobil`, `nama_mobil`, `jenis_mobil`, `warna_mobil`, `nopol_mobil`, `tarif_mobil`, `denda_mobil`, `deskripsi_mobil`) VALUES
(1, 'MBL0001', 'mobil2.png', 'Fortuners', 'Suzuki', 'Hitam', 'D 4N COK', 700000, 100000, 'Mobil keren tenaga super kuat '),
(2, 'MBL0002', 'mobil1.png', 'Avanza', 'Honda', 'Putih', 'AV 4N ZA', 600000, 20000, 'Mobil modis kekinian anjing taik kucing asu lah kau bangsat kau babi kau monyet kau '),
(4, 'MBL0003', 'step_2_inport_databse.PNG', 'asu', 'asu', 'asu', 'asu', 200000, 10000, 'asu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `tanggallahir_user` date NOT NULL,
  `jeniskelamin_user` varchar(10) NOT NULL,
  `alamat_user` text NOT NULL,
  `nomertelepon_user` varchar(15) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `level_user` varchar(10) NOT NULL,
  `daftar_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_pelanggan`, `foto_user`, `nama_user`, `tanggallahir_user`, `jeniskelamin_user`, `alamat_user`, `nomertelepon_user`, `email_user`, `password_user`, `level_user`, `daftar_user`) VALUES
(1, 'USER0001', 'mobil.png', 'admin rental mobils', '1945-08-17', 'laki-laki', 'jln kura-kura no 45 bandar lampung', '082273243330', 'rentalmobil21@gmail.com', '12345', 'admin', '1594012959'),
(2, 'USER0002', 'zorro.png', 'rida sadega', '1945-08-17', 'laki-laki', 'mulyasari negeri agung way kanan lampung', '082188884444', 'ridasadega21@gmail.com', '12345', 'user', '1594013959'),
(3, 'USER0003', 'shank.png', 'gobeh sadega', '1946-06-17', 'laki-laki', 'labuhan dalam tanjung senang bandar lampung', '082355557777', 'gobehsadega21@gmail.com', '12345', 'user', '1594014959'),
(4, 'USER0004', '0.default.png', 'ketut krisna sanjaya', '1945-08-18', 'laki-laki', '', '', 'ketutkrisna21@gmail.com', '12345', 'user', '1594015959'),
(5, 'USER0005', '0.default.png', 'solikin', '1980-07-10', 'laki-laki', '', '', 'solikin@gmail.com', '12345', 'user', '1595397471');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

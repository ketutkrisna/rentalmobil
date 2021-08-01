-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 05:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id_booking` int(11) NOT NULL,
  `kode_booking` varchar(50) NOT NULL,
  `id_user_booking` int(11) NOT NULL,
  `id_mobil_booking` int(11) NOT NULL,
  `tanggalambil_booking` date NOT NULL,
  `tanggalkembali_booking` date NOT NULL,
  `jamambil_booking` varchar(50) NOT NULL,
  `totalhari_booking` int(11) NOT NULL,
  `totalharga_booking` int(11) NOT NULL,
  `denda_booking` int(11) NOT NULL,
  `notlp_booking` varchar(20) NOT NULL,
  `alamat_booking` text NOT NULL,
  `tanggalpemesanan_booking` varchar(50) NOT NULL,
  `fotopembayaran_booking` varchar(100) NOT NULL,
  `statuspembayaran_booking` enum('belumbayar','sudahbayar','bayarditolak','bayarditerima') NOT NULL,
  `status_booking` enum('dipesan','dibayar','diambil','dikembalikan','selesai','ditolak') NOT NULL,
  `notif_booking` enum('belumdilihat','sudahdilihat','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id_booking`, `kode_booking`, `id_user_booking`, `id_mobil_booking`, `tanggalambil_booking`, `tanggalkembali_booking`, `jamambil_booking`, `totalhari_booking`, `totalharga_booking`, `denda_booking`, `notlp_booking`, `alamat_booking`, `tanggalpemesanan_booking`, `fotopembayaran_booking`, `statuspembayaran_booking`, `status_booking`, `notif_booking`) VALUES
(1, 'RENTAL0001', 2, 2, '2020-07-11', '2020-07-13', '16:00', 2, 1200000, 60000, '082133234422', 'karang', '1594350852', 'rgb.png', 'bayarditerima', 'selesai', 'sudahdilihat'),
(2, 'RENTAL0002', 3, 1, '2020-07-21', '2020-07-23', '09:00', 2, 1400000, 0, '082123231231', 'mulyasari', '1594450852', '', 'belumbayar', 'dipesan', 'sudahdilihat'),
(3, 'RENTAL0003', 3, 2, '2020-07-10', '2020-07-12', '14:00', 2, 1000000, 0, '008', 'neaka', '1594453327', '', 'belumbayar', 'ditolak', 'sudahdilihat'),
(4, 'RENTAL0004', 2, 2, '2020-07-17', '2020-07-18', '16:00', 1, 500000, 0, '08231231232', 'mulyasari', '1594532941', '', 'belumbayar', 'dipesan', 'sudahdilihat');

-- --------------------------------------------------------

--
-- Table structure for table `mobils`
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
-- Dumping data for table `mobils`
--

INSERT INTO `mobils` (`id_mobil`, `kode_mobil`, `foto_mobil`, `nama_mobil`, `jenis_mobil`, `warna_mobil`, `nopol_mobil`, `tarif_mobil`, `denda_mobil`, `deskripsi_mobil`) VALUES
(1, 'MBL0001', 'mobil2.png', 'Fortuners', 'Suzuki', 'Hitam', 'D 4N COK', 700000, 100000, 'Mobil keren tenaga super kuat '),
(2, 'MBL0002', 'mobil1.png', 'Avanza', 'Honda', 'Putih', 'AV 4N ZA', 600000, 20000, 'Mobil modis kekinian anjing taik kucing asu lah kau bangsat kau babi kau monyet kau '),
(3, 'MBL0003', 'mobil.png', 'Gak Tau', 'Gak tau', 'Hitam', 'Gak tau', 800000, 50000, 'mobil apa ini saya gk tau bos');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_pelanggan`, `foto_user`, `nama_user`, `tanggallahir_user`, `jeniskelamin_user`, `alamat_user`, `nomertelepon_user`, `email_user`, `password_user`, `level_user`, `daftar_user`) VALUES
(1, 'USER0001', '30.jpg', 'admin rental mobil', '1996-12-24', 'laki-laki', 'jln kura-kura no 45 bandar lampungs', '082273243330', 'rentalmobil21@gmail.com', '12345', 'admin', '1594012959'),
(2, 'USER0002', 'zorro.png', 'rida sadega', '1945-08-17', 'laki-laki', 'mulyasari negeri agung way kanan lampung', '082188884444', 'ridasadega21@gmail.com', '12345', 'user', '1594013959'),
(3, 'USER0003', 'shank.png', 'gobeh sadega', '1946-06-17', 'laki-laki', 'labuhan dalam tanjung senang bandar lampung', '082355557777', 'gobehsadega21@gmail.com', '12345', 'user', '1594014959'),
(4, 'USER0004', '0.default.png', 'ketut krisna sanjaya', '1945-08-18', 'laki-laki', '', '', 'ketutkrisna21@gmail.com', '12345', 'user', '1594015959');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

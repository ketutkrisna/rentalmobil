-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2020 at 11:47 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14433844_rentalmobil`
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
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id_booking`, `kode_booking`, `id_user_booking`, `id_mobil_booking`, `tanggalambil_booking`, `tanggalkembali_booking`, `jamambil_booking`, `totalhari_booking`, `totalharga_booking`, `denda_booking`, `notlp_booking`, `alamat_booking`, `ktp_booking`, `tanggalpemesanan_booking`, `fotopembayaran_booking`, `statuspembayaran_booking`, `status_booking`, `notif_booking`) VALUES
(1, 'RENTAL0001', 2, 2, '2020-07-11 16:00:00', '2020-07-13 16:00:00', '16:00', 2, 1200000, 500000, '082133234422', 'karang', 'ktp1.jpg', '1594350852', 'rgb.PNG', 'bayarditerima', 'selesai', 'sudahdilihat'),
(2, 'RENTAL0002', 3, 1, '2020-07-21 09:00:00', '2020-07-23 09:00:00', '09:00', 2, 1400000, 0, '082123231231', 'mulyasari', 'ktp2.jpg', '1594450852', 'struk-atm-bri-2013-img1.jpg', 'bayarditerima', 'selesai', 'sudahdilihat'),
(3, 'RENTAL0003', 3, 2, '2020-07-10 14:00:00', '2020-07-12 14:00:00', '14:00', 2, 1000000, 0, '008', 'neaka', 'ktp3.jpg', '1594453327', '', 'belumbayar', 'dicancel', 'sudahdilihat'),
(4, 'RENTAL0004', 2, 2, '2020-07-17 16:00:00', '2020-07-18 20:16:00', '16:00', 1, 500000, 0, '08231231232', 'mulyasari', 'ktp4.jpg', '1594532941', '', 'belumbayar', 'dipesan', 'sudahdilihat'),
(5, 'RENTAL0005', 4, 1, '2020-07-24 14:00:00', '2020-07-26 14:00:00', '14:00', 2, 1400000, 0, '082321234786', 'mulyasari', 'ktp5.jpg', '1595083817', '', 'belumbayar', 'dipesan', 'sudahdilihat'),
(6, 'RENTAL0006', 5, 3, '2020-07-23 18:48:00', '2020-07-24 18:48:00', '18:48', 1, 8000000, 0, '0852141368', 'Jln.flamboyan labuan dalem', 'ktp6.jpg', '1595482953', '', 'belumbayar', 'dipesan', 'sudahdilihat'),
(7, 'RENTAL0007', 5, 1, '2020-07-27 16:20:00', '2020-07-28 16:20:00', '16:20', 1, 700000, 0, '085217516523', 'Fajar baru', 'ktp7.jpg', '1595489727', '', 'belumbayar', 'dicancel', 'sudahdilihat'),
(8, 'RENTAL0008', 6, 2, '2020-07-30 19:11:00', '2020-07-31 19:11:00', '19:11', 1, 600000, 0, '0878982888', 'raja ratu', 'ktp8.jpg', '1595509904', '', 'belumbayar', 'ditolak', 'sudahdilihat'),
(9, 'RENTAL0009', 5, 2, '2020-07-31 08:00:00', '2020-08-01 08:00:00', '08:00', 1, 600000, 0, '085216435362', 'Rajabasa', 'ktp9.jpg', '1595868227', 'IMG-20200718-WA0002.jpg', 'bayarditerima', 'selesai', 'sudahdilihat'),
(10, 'RENTAL0010', 5, 2, '2020-08-05 04:27:00', '2020-08-06 04:27:00', '04:27', 1, 600000, 0, '08521233398', 'Rajabasa', 'ktp10.jpg', '1596515316', 'IMG_20200824_235443.JPG', 'sudahbayar', 'dibayar', 'sudahdilihat'),
(11, 'RENTAL0011', 5, 2, '2020-08-13 15:28:00', '2020-08-15 15:28:00', '15:28', 2, 1200000, 0, '085380350462', 'Jl. Z.a Pagar Alam No.93 Bandar Lampung', 'ktp11.jpg', '1597220959', 'IMG_20200813_1650041.jpg', 'sudahbayar', 'dibayar', 'sudahdilihat'),
(12, 'RENTAL0012', 7, 3, '2020-08-20 07:30:00', '2020-08-21 07:30:00', '07:30', 1, 8000000, 0, '085217571368', 'Labuan dalem', 'IMG_20200819_152719.JPG', '1597825773', 'IMG_20200813_165004.jpg', 'bayarditerima', 'dibayar', 'sudahdilihat');

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
(2, 'MBL0002', 'mobil1.png', 'Avanza', 'Toyota Avanza', 'Putih', 'BE 2247  YI', 550000, 50000, 'Avanza merupakan mobil pilihan keluarga karna terlihat gagah dan elegan sehingga menjadikan avanza menjadi mobil ksyangan kluarga '),
(3, 'MBL0003', 'mobil600.png', 'Monster', 'Monster', 'Hitam', 'Gak tau', 8000000, 50000, 'mobil apa ini saya gk tau bos');

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
(1, 'USER0001', 'IMG_20200814_183554.JPG', 'admin rental mobil', '1945-08-17', 'laki-laki', 'jl.sultan haji no 18, sepang jaya, kota bandar lampung', '082273243330', 'rentalmobil21@gmail.com', '12345', 'admin', '1594012959'),
(2, 'USER0002', 'zorro.png', 'sumanto', '1945-08-17', 'laki-laki', 'mulyasari negeri agung way kanan lampung', '082188884444', 'sumanto@gmail.com', '12345', 'user', '1594013959'),
(3, 'USER0003', 'IMG_20200422_162943.jpg', 'juminten', '1946-06-17', 'laki-laki', 'labuhan dalam tanjung senang bandar lampung', '082355557777', 'juminten@gmail.com', '12345', 'user', '1594014959'),
(4, 'USER0004', '0.default.png', 'ketut krisna sanjaya', '1945-08-18', 'laki-laki', '', '', 'ketutkrisna21@gmail.com', '12345', 'user', '1594015959'),
(5, 'USER0005', '0.default.png', 'triska', '2020-07-12', 'laki-laki', 'kita sepang', '085213645986', 'triska@gmail.com', '12345', 'user', '1595482784'),
(6, 'USER0006', '0.default.png', 'gusti komang', '2020-07-14', 'laki-laki', '', '', 'gusti@gmail.com', '12345', 'user', '1595509805'),
(7, 'USER0007', '0.default.png', 'Topik', '2020-07-05', 'laki-laki', '', '', 'topik@gmail.com', '12345', 'user', '1597824797');

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
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

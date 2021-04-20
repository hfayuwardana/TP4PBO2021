-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 09:38 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chores`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_to_do`
--

CREATE TABLE `tb_to_do` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `prioritas` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_to_do`
--

INSERT INTO `tb_to_do` (`id`, `nama`, `detail`, `kategori`, `prioritas`, `tanggal`, `waktu`, `status`) VALUES
(2, 'Mengajak kocheng bermain', 'main bola', 'Hewan Peliharaan', 'Tinggi', '2021-04-02', '15:58:00', 'Sudah'),
(3, 'Membayar tagihan listrik', 'Dan jangan lupa pakai masker', 'Bayaran', 'Rendah', '2021-04-21', '10:06:00', 'Belum'),
(5, 'Memanaskan makanan untuk sahur', 'Ayam goreng saos asam manis', 'Dapur', 'Sedang', '2021-04-21', '03:20:00', 'Sudah'),
(7, 'Mengisi ulang stock sabun mand', 'Yang botol warna biru', 'Kamar Mandi', 'Tinggi', '2021-04-16', '14:11:00', 'Belum'),
(8, 'Mengerjakan TP4 PBO', 'Materi PHP MVC', 'Sekolah', 'Tinggi', '2021-04-20', '13:10:00', 'Belum'),
(9, 'Memasak air', 'Untuk menyeduh segala minuman untuk buka puasa', 'Dapur', 'Tinggi', '2021-04-21', '13:30:00', 'Belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_to_do`
--
ALTER TABLE `tb_to_do`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_to_do`
--
ALTER TABLE `tb_to_do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

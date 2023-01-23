-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 02:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdev_sofa`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(200) NOT NULL,
  `harga_product` varchar(200) NOT NULL,
  `ketersediaan` enum('Tersedia','Kosong') NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nama_product`, `harga_product`, `ketersediaan`, `image`) VALUES
(7, 'Ergonomic Chair', '1.200.000', 'Tersedia', '63cdff43a706a.png'),
(8, 'Kruzo Aero Chair', '800.000', 'Tersedia', '63cdffa27c453.png'),
(9, 'Nordic Chair', '650.000', 'Kosong', '63cdffdda3a55.png'),
(10, 'Kursi Gaming', '1.650.000', 'Tersedia', '63ce003659436.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama_depan` varchar(200) NOT NULL,
  `nama_belakang` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `organisasi` varchar(200) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama_depan`, `nama_belakang`, `email`, `organisasi`, `nomor_hp`, `alamat`, `password`, `image`) VALUES
(9, 'misbahx', 'misbahx', 'hulmunir', 'misbahx.id@gmail.com', 'oxigent', '85641054319', 'bandung', 'tes', '63cdf5c387030.png'),
(10, 'edi', 'edi', 'kosasih', 'edi@gmail.com', 'anggalarang', '08652830923', '', 'tes', 'edi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

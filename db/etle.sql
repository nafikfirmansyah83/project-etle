-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2024 at 04:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etle`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('operator','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `email`, `password`, `level`) VALUES
(1, 'admin@etle.pas', 'admin123', 'operator'),
(2, 'uas@gmail.com', 'uas123', 'user'),
(3, 'user@etle.pas', 'user123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `kode_transaksi` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_mesin` varchar(50) NOT NULL,
  `no_rangka` varchar(50) NOT NULL,
  `no_plat` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `jenis_pelanggaran` enum('Melanggar rambu lalu lintas','Tidak mengenakan sabuk pengaman','Menggunakan smartphone','Melanggar batas kecepatan','Tidak pakai helm','Boncengan lebih dari 3 orang') NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` enum('Rp. 100.000','Rp. 250.000','Rp. 500.000','Rp. 750.000') NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`kode_transaksi`, `nama`, `no_mesin`, `no_rangka`, `no_plat`, `merk`, `jenis_pelanggaran`, `lokasi`, `tanggal`, `nominal`, `gambar`) VALUES
('HFS63P873527352', 'Althof Rikhul Fatkhi', 'ESG78K8745783', 'JDSFH67B93847', 'N 6529 TCH', 'HONDA/HDG92 AT', 'Boncengan lebih dari 3 orang', 'Jl. Cucut', '2024-01-09', 'Rp. 250.000', '659cbb571060f.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2026 at 06:31 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1d_fathir_ihza_mahendra`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `semester` int NOT NULL,
  `tarif_ukt_nominal` decimal(10,2) NOT NULL,
  `jenis_pembiayaan` enum('mandiri','bidikmisi','prestasi') NOT NULL,
  `golongan_ukt` varchar(10) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nomor_KIP_kuliah` varchar(50) DEFAULT NULL,
  `dana_saku_subsidi` decimal(10,2) DEFAULT NULL,
  `nama_instansi_beasiswa` varchar(100) DEFAULT NULL,
  `minimal_ipk_syarat` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `semester`, `tarif_ukt_nominal`, `jenis_pembiayaan`, `golongan_ukt`, `nama_wali`, `nomor_KIP_kuliah`, `dana_saku_subsidi`, `nama_instansi_beasiswa`, `minimal_ipk_syarat`) VALUES
(1, 'Fathir Ihza Mahendra', '250102107', 2, 4500000.00, 'mandiri', 'Golongan 4', 'Suryono', NULL, NULL, NULL, NULL),
(2, 'Ahmad Fauzi', '250102001', 2, 5000000.00, 'mandiri', 'Golongan 5', 'Rahmat Hidayat', NULL, NULL, NULL, NULL),
(3, 'Budi Santoso', '250102002', 4, 3500000.00, 'mandiri', 'Golongan 3', 'Eko Santoso', NULL, NULL, NULL, NULL),
(4, 'Citra Lestari', '250102003', 2, 4500000.00, 'mandiri', 'Golongan 4', 'Agus Lestari', NULL, NULL, NULL, NULL),
(5, 'Dewi Utami', '250102004', 6, 5500000.00, 'mandiri', 'Golongan 5', 'Bambang Utami', NULL, NULL, NULL, NULL),
(6, 'Eko Prasetyo', '250102005', 4, 3500000.00, 'mandiri', 'Golongan 3', 'Supardi', NULL, NULL, NULL, NULL),
(7, 'Fitriani', '250102006', 2, 4500000.00, 'mandiri', 'Golongan 4', 'Mulyono', NULL, NULL, NULL, NULL),
(8, 'Guntur Wibowo', '250102007', 2, 5000000.00, 'mandiri', 'Golongan 5', 'Joko Wibowo', NULL, NULL, NULL, NULL),
(9, 'Hany Ramadhani', '250102008', 4, 3500000.00, 'mandiri', 'Golongan 3', 'Dedi Ramadhan', NULL, NULL, NULL, NULL),
(10, 'Indah Permatasari', '250102009', 2, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2025-00192', 700000.00, NULL, NULL),
(11, 'Joko Susilo', '250102010', 4, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2024-00541', 700000.00, NULL, NULL),
(12, 'Kartika Sari', '250102011', 2, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2025-00211', 700000.00, NULL, NULL),
(13, 'Lukman Hakim', '250102012', 6, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2023-00877', 750000.00, NULL, NULL),
(14, 'Mega Utami', '250102013', 2, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2025-00432', 700000.00, NULL, NULL),
(15, 'Nurul Hidayah', '250102014', 4, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2024-00112', 700000.00, NULL, NULL),
(16, 'Oki Setiawan', '250102015', 2, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2025-00901', 700000.00, NULL, NULL),
(17, 'Putu Wijaya', '250102016', 6, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2023-00345', 750000.00, NULL, NULL),
(18, 'Rian Hidayat', '250102017', 4, 1500000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50),
(19, 'Sinta Dewi', '250102018', 2, 1000000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Unggulan Kemendikbud', 3.75),
(20, 'Taufik Hidayat', '250102019', 2, 2000000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Bank Indonesia', 3.25),
(21, 'Utari Putri', '250102020', 6, 1500000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50),
(22, 'Vina Panduwinata', '250102021', 4, 1000000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Unggulan Kemendikbud', 3.75),
(23, 'Wahyu Hidayat', '250102022', 2, 2000000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Bank Indonesia', 3.25),
(24, 'Yayan Ruhian', '250102023', 4, 1500000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Karya Salemba Empat', 3.30),
(25, 'Zainal Abidin', '250102024', 6, 1000000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Unggulan Kemendikbud', 3.75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

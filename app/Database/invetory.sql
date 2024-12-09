-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2024 at 03:10 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invetory`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `harga` int NOT NULL,
  `kondisi` varchar(50) DEFAULT NULL,
  `id_lokasi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `nama_kategori`, `merk`, `spesifikasi`, `tanggal_pembelian`, `harga`, `kondisi`, `id_lokasi`) VALUES
(2, 'PC', 'Peralatan Elektronik', 'HP', 'Processor: Intel Core i3 1115G4\r\nRAM: 4GB DDR4, SSD: 512GB\r\nODD: DVDRW, VGA: Integrated\r\nUkuran Layar: 21.5 Inch FHD\r\nSistem Operasi: Windows 10\r\nHP All-in-One 22-df1001d', '2024-08-10', 8500000, 'baik', 1),
(4, 'meja', 'Perabotan', 'Expo MDC 1075', 'panjang: 100 cm\r\nlebar: 75 cm\r\ntinggi: 75 cm\r\nwarna: coklat', '2024-08-08', 1700000, 'baik', 1),
(5, 'mouse', 'Peralatan Elektronik', 'HP X1000', 'Tipe: kabel\r\nDPI: 1000 DPI\r\nFitur: Desain sederhana, plug-and-play, kompatibilitas universal dengan USB', '2024-08-14', 100000, 'baik', 11),
(6, 'kursi', 'Perabotan', 'BW 602 UPC', 'panjang: 74 cm\r\nlebar: 44cm\r\ntinggi 82 cm\r\nbahan: besi\r\nwarna: hitam\r\n', '2024-08-23', 640000, 'rusak', 2),
(7, 'cctv', 'Peralatan Keamanan', 'Hikvision', 'Model : Kikvision DS-2CD2143G0-I\r\nResolusi : 4MP\r\nLensa: 4mm', '2023-12-08', 1500000, 'baik', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int NOT NULL,
  `nm_lokasi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `nm_lokasi`) VALUES
(1, 'A1'),
(2, 'A2'),
(8, 'Lab A2'),
(9, 'Lab B1'),
(11, 'BAUK');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `level` int NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `foto`) VALUES
(1, 'Vicky', 'admin', 'admin', 0, 'foto.jpg'),
(2, 'Athor', 'user', '123', 2, 'user.png'),
(4, 'User', 'direktur', '123', 1, 'user.png'),
(6, 'sasa', 'sasa', '123', 2, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usulan`
--

CREATE TABLE `tbl_usulan` (
  `id_` int NOT NULL,
  `id_pengusul` varchar(40) NOT NULL,
  `namaBarang` text NOT NULL,
  `jmlBarang` varchar(12) NOT NULL,
  `kiraHarga` varchar(15) NOT NULL,
  `jmlHarga` varchar(15) NOT NULL,
  `keperluan` text NOT NULL,
  `status` enum('1','2','3','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_usulan`
--

INSERT INTO `tbl_usulan` (`id_`, `id_pengusul`, `namaBarang`, `jmlBarang`, `kiraHarga`, `jmlHarga`, `keperluan`, `status`) VALUES
(2, '1', 'kursi', '20', '50000', '1000000', 'kelengkapan kelas', '2'),
(5, '1', 'komputer', '12', '100000', '1200000', 'kebutuhan lab', '0'),
(7, '', 'meja', '10', '60000', '600000', 'dsadsa', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  ADD PRIMARY KEY (`id_`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  MODIFY `id_` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `tbl_lokasi` (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

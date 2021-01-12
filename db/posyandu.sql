-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2020 at 09:10 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `balita`
--

CREATE TABLE `balita` (
  `id_balita` int(11) NOT NULL,
  `nik_ortu` int(11) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `nama_bayi` varchar(255) NOT NULL,
  `tempatlhr_bayi` varchar(255) NOT NULL,
  `tanggallhr_bayi` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `berat_lahir` decimal(10,0) NOT NULL,
  `usia_bayi` int(11) NOT NULL,
  `panjang_lahir` decimal(10,0) NOT NULL,
  `goldar_bayi` varchar(255) NOT NULL,
  `tgl_daftar_bayi` date NOT NULL,
  `alamat_bayi` text NOT NULL,
  `tgl_kematian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balita`
--

INSERT INTO `balita` (`id_balita`, `nik_ortu`, `nama_ayah`, `nama_ibu`, `nama_bayi`, `tempatlhr_bayi`, `tanggallhr_bayi`, `jenis_kelamin`, `berat_lahir`, `usia_bayi`, `panjang_lahir`, `goldar_bayi`, `tgl_daftar_bayi`, `alamat_bayi`, `tgl_kematian`) VALUES
(3, 1163024, 'Ahmad Wijayanto', 'Restu Wijayanti', 'Reza Rahardian', 'Bandung', '2020-01-01', 'Laki-Laki', '20', 6, '50', '', '2020-07-15', 'Bandung', '2020-07-18'),
(6, 101010, 'Reza Rahardian', 'Alisa Subandono', 'Alyf', 'Jakarta Selatan', '2020-02-14', 'Laki-Laki', '15', 5, '25', '', '2020-07-18', 'Fatmawati', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ibu_hamil`
--

CREATE TABLE `ibu_hamil` (
  `id_ibuhamil` int(5) NOT NULL,
  `nik_ibuhamil` int(255) NOT NULL,
  `nama_ibuhamil` varchar(255) NOT NULL,
  `nama_suami` varchar(50) NOT NULL,
  `kandunganke` int(11) NOT NULL,
  `umur` int(255) NOT NULL,
  `tempatlhr_ibuhamil` varchar(255) NOT NULL,
  `tanggallhr_ibuhamil` date DEFAULT NULL,
  `tinggi_ibuhamil` double NOT NULL,
  `tgl_daftar_pasien` date DEFAULT NULL,
  `alamat_ibu` text NOT NULL,
  `tgl_kematian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibu_hamil`
--

INSERT INTO `ibu_hamil` (`id_ibuhamil`, `nik_ibuhamil`, `nama_ibuhamil`, `nama_suami`, `kandunganke`, `umur`, `tempatlhr_ibuhamil`, `tanggallhr_ibuhamil`, `tinggi_ibuhamil`, `tgl_daftar_pasien`, `alamat_ibu`, `tgl_kematian`) VALUES
(1, 1163024, 'Restu Wijayanti', 'Ahmad Wijayanto', 1, 26, 'Jakarta', '1993-11-04', 1.65, '2020-07-10', 'Cengkareng  Blok B2', '2020-07-18'),
(9, 1163024, 'Sarah Widianti', 'Reza Gunandar', 1, 26, 'Jakarta Selatan', '2020-07-01', 1.6, '2020-07-10', 'Fatmawati', '2020-07-10'),
(18, 101010, 'Alisa Subandono', 'Reza Rahardian', 1, 33, 'Jakarta Selatan', '2020-07-01', 172, '2020-07-18', 'Fatmawati', '2020-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id_imun` int(11) NOT NULL,
  `nama_imun` varchar(50) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imunisasi`
--

INSERT INTO `imunisasi` (`id_imun`, `nama_imun`, `ket`) VALUES
(1, 'Imunisasi Cacar', 'Imunisasi ini, untuk bayi lahir dan pencegahan cacar.'),
(2, 'Imunisasi Alergi Kulit', 'untuk mengurangi alergi kulit merah pada anak/ibu');

-- --------------------------------------------------------

--
-- Table structure for table `pemb_imun_bayi`
--

CREATE TABLE `pemb_imun_bayi` (
  `id_imun` int(11) NOT NULL,
  `id_bayi` int(11) NOT NULL,
  `tgl_pem` date NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemb_imun_bayi`
--

INSERT INTO `pemb_imun_bayi` (`id_imun`, `id_bayi`, `tgl_pem`, `ket`) VALUES
(1, 3, '2020-07-15', 'Imunisasi Cacar'),
(2, 3, '2020-07-18', 'Alergi Kulit Bayi'),
(2, 3, '2020-07-18', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `pemb_imun_ibu`
--

CREATE TABLE `pemb_imun_ibu` (
  `id_imun` int(11) NOT NULL,
  `id_ibuhamil` int(11) NOT NULL,
  `tgl_pem` date NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemb_imun_ibu`
--

INSERT INTO `pemb_imun_ibu` (`id_imun`, `id_ibuhamil`, `tgl_pem`, `ket`) VALUES
(1, 1, '2020-07-10', 'asdasd'),
(1, 1, '2020-07-10', 'TESTING JAM 17'),
(1, 9, '2020-07-10', 'Polio Porosis'),
(2, 1, '2020-07-18', 'Imunisasi Alergi Kulit Radang'),
(2, 1, '2020-07-18', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `pemb_vitamin_ibu`
--

CREATE TABLE `pemb_vitamin_ibu` (
  `id_vit` int(11) NOT NULL,
  `id_ibuhamil` int(11) NOT NULL,
  `tgl_pem_vit` date NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemb_vitamin_ibu`
--

INSERT INTO `pemb_vitamin_ibu` (`id_vit`, `id_ibuhamil`, `tgl_pem_vit`, `ket`) VALUES
(1, 1, '2020-07-10', 'asdas'),
(1, 1, '2020-07-10', 'TESTING JAM 17'),
(1, 9, '2020-07-10', 'Vitamin untuk mencegah pilek'),
(2, 1, '2020-07-18', 'Vitamin tambah darah dan stamina'),
(1, 1, '2020-07-18', 'asdsa'),
(1, 1, '2020-07-18', 'asdsa');

-- --------------------------------------------------------

--
-- Table structure for table `pemb_vit_balita`
--

CREATE TABLE `pemb_vit_balita` (
  `id_vit` int(11) NOT NULL,
  `id_bayi` int(11) NOT NULL,
  `tgl_pem` date NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemb_vit_balita`
--

INSERT INTO `pemb_vit_balita` (`id_vit`, `id_bayi`, `tgl_pem`, `ket`) VALUES
(1, 3, '2020-07-15', 'Vitamin Bayi'),
(2, 3, '2020-07-18', 'Vitamin Tambah darah dan stamina'),
(2, 3, '2020-07-18', 'sdas');

-- --------------------------------------------------------

--
-- Table structure for table `penimb_bayi`
--

CREATE TABLE `penimb_bayi` (
  `id_penimb_bayi` int(11) NOT NULL,
  `id_balita` int(50) NOT NULL,
  `bb_bayi` decimal(10,0) NOT NULL,
  `tinggi_bayi` decimal(10,0) NOT NULL,
  `tgl_penimb_bayi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penimb_bayi`
--

INSERT INTO `penimb_bayi` (`id_penimb_bayi`, `id_balita`, `bb_bayi`, `tinggi_bayi`, `tgl_penimb_bayi`) VALUES
(4, 1, '20', '90', '2020-07-14'),
(5, 3, '30', '90', '2020-07-15'),
(6, 3, '30', '50', '2020-07-18'),
(7, 3, '7', '25', '2020-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `penimb_ibu`
--

CREATE TABLE `penimb_ibu` (
  `id_penimb_ibu` int(11) NOT NULL,
  `id_ibuhamil` int(50) NOT NULL,
  `bb_ibu` decimal(10,0) NOT NULL,
  `lingleng` decimal(10,0) NOT NULL,
  `tgl_penimb_ibu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penimb_ibu`
--

INSERT INTO `penimb_ibu` (`id_penimb_ibu`, `id_ibuhamil`, `bb_ibu`, `lingleng`, `tgl_penimb_ibu`) VALUES
(4, 9, '58', '20', '2020-07-15'),
(5, 1, '60', '20', '2020-07-15'),
(6, 1, '55', '25', '2020-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `nik` bigint(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` bigint(20) NOT NULL,
  `alamat` text NOT NULL,
  `alamat_kota` varchar(255) NOT NULL,
  `kode_pos` bigint(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nik`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `alamat`, `alamat_kota`, `kode_pos`, `username`, `nama_lengkap`, `email`, `password`, `level`) VALUES
(1, 0, '', NULL, 0, '', '', 0, 'admin', 'Miftahul Ulum', 'admin@localhost', '21232f297a57a5a743894a0e4a801fc3', 1),
(13, 1163024, 'User', '2020-07-01', 80, 'User', 'User', 20, 'user', 'User Testing', 'user@localhost', 'ee11cbb19052e40b07aac0ca060c23ee', 2),
(15, 1173011, 'Bandung', '2020-07-03', 84568445, 'Sarijadi Blok 7', 'Bandung', 42520, 'ira.kusuma', 'Ira Kusuma', 'ira@localhost', '3c67080a1a09b022fb9d94e57a75ddad', 2),
(16, 101010, 'user2', '2018-01-18', 101010, 'user2', 'user2', 454545, 'user2', 'user2', 'user2@localhost', '7e58d63b60197ceb55a1c487989a3720', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vitamin`
--

CREATE TABLE `vitamin` (
  `id_vit` int(11) NOT NULL,
  `nama_vit` varchar(50) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vitamin`
--

INSERT INTO `vitamin` (`id_vit`, `nama_vit`, `ket`) VALUES
(1, 'SAN-B-PLEX', 'Vitamin C,B dan macamnya untuk membantu Vitamin Bayi/ibu.'),
(2, 'Sangobion', 'Vitamin untuk penambah darah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balita`
--
ALTER TABLE `balita`
  ADD PRIMARY KEY (`id_balita`);

--
-- Indexes for table `ibu_hamil`
--
ALTER TABLE `ibu_hamil`
  ADD PRIMARY KEY (`id_ibuhamil`);

--
-- Indexes for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id_imun`);

--
-- Indexes for table `penimb_bayi`
--
ALTER TABLE `penimb_bayi`
  ADD PRIMARY KEY (`id_penimb_bayi`);

--
-- Indexes for table `penimb_ibu`
--
ALTER TABLE `penimb_ibu`
  ADD PRIMARY KEY (`id_penimb_ibu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vitamin`
--
ALTER TABLE `vitamin`
  ADD PRIMARY KEY (`id_vit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balita`
--
ALTER TABLE `balita`
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ibu_hamil`
--
ALTER TABLE `ibu_hamil`
  MODIFY `id_ibuhamil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id_imun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penimb_bayi`
--
ALTER TABLE `penimb_bayi`
  MODIFY `id_penimb_bayi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penimb_ibu`
--
ALTER TABLE `penimb_ibu`
  MODIFY `id_penimb_ibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vitamin`
--
ALTER TABLE `vitamin`
  MODIFY `id_vit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

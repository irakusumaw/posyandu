-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 08:51 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `tgl_kematian` date NOT NULL,
  `penyebab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balita`
--

INSERT INTO `balita` (`id_balita`, `nik_ortu`, `nama_ayah`, `nama_ibu`, `nama_bayi`, `tempatlhr_bayi`, `tanggallhr_bayi`, `jenis_kelamin`, `berat_lahir`, `usia_bayi`, `panjang_lahir`, `goldar_bayi`, `tgl_daftar_bayi`, `alamat_bayi`, `tgl_kematian`, `penyebab`) VALUES
(3, 11730789, 'Ahmad Wijayanto', 'Restu Wijayanti', 'Reza Rahardian', 'Bandung', '2020-07-01', 'Laki-Laki', '20', 1, '50', '', '2020-07-15', 'Bandung', '2020-08-19', 'kekurangan oralit'),
(6, 101010, 'Reza Rahardian', 'Alisa Subandono', 'Alyf', 'Jakarta Selatan', '2020-02-14', 'Laki-Laki', '15', 5, '25', '', '2020-07-18', 'Fatmawati', '0000-00-00', '');

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
  `tgl_kematian` date DEFAULT NULL,
  `penyebab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibu_hamil`
--

INSERT INTO `ibu_hamil` (`id_ibuhamil`, `nik_ibuhamil`, `nama_ibuhamil`, `nama_suami`, `kandunganke`, `umur`, `tempatlhr_ibuhamil`, `tanggallhr_ibuhamil`, `tinggi_ibuhamil`, `tgl_daftar_pasien`, `alamat_ibu`, `tgl_kematian`, `penyebab`) VALUES
(1, 11730789, 'Restu Wijayanti', 'Ahmad Wijayanto', 1, 26, 'Jakarta', '1993-11-04', 165, '2020-07-10', 'Cengkareng  Blok B2', '2020-08-19', 'Pendarahan saat melahirkan'),
(9, 11730789, 'Sarah Widianti', 'Reza Gunandar', 1, 26, 'Jakarta Selatan', '2020-07-01', 160, '2020-07-10', 'Fatmawati', '2020-07-10', ''),
(18, 101010, 'Alisa Subandono', 'Reza Rahardian', 1, 33, 'Jakarta Selatan', '2020-07-01', 172, '2020-07-18', 'Fatmawati', '2020-07-10', '');

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
-- Table structure for table `pelayanan_bayi`
--

CREATE TABLE `pelayanan_bayi` (
  `id_pelbayi` int(11) NOT NULL,
  `id_balita` int(50) NOT NULL,
  `tgl_pelbayi` date NOT NULL,
  `keluhan` text NOT NULL,
  `nasihat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelayanan_bayi`
--

INSERT INTO `pelayanan_bayi` (`id_pelbayi`, `id_balita`, `tgl_pelbayi`, `keluhan`, `nasihat`) VALUES
(1, 3, '2020-08-19', 'Sakit Diare', 'Berikan makanan yang berserat tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_ibu`
--

CREATE TABLE `pelayanan_ibu` (
  `id_pelibu` int(11) NOT NULL,
  `id_ibuhamil` int(50) NOT NULL,
  `tgl_pel` date NOT NULL,
  `keluhan` text NOT NULL,
  `nasihat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelayanan_ibu`
--

INSERT INTO `pelayanan_ibu` (`id_pelibu`, `id_ibuhamil`, `tgl_pel`, `keluhan`, `nasihat`) VALUES
(1, 1, '2020-08-19', 'Kaki Bengkak', 'Jangan terlalu cape '),
(2, 1, '2020-08-19', 'Pusing', 'Banyak makanan yang memiliki zat besi'),
(3, 9, '2020-08-19', 'Kaki Bengkak', 'Perbanyak Istirahat'),
(4, 0, '2020-08-19', 'Kaki Bengkak', 'Jangan terlalu cape, perbanyak minum air putih');

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
  `lingkep` int(10) NOT NULL,
  `tdd` varchar(128) NOT NULL,
  `tdl` varchar(128) NOT NULL,
  `kpsp` varchar(128) NOT NULL,
  `kmpe` varchar(128) NOT NULL,
  `mchat` varchar(128) NOT NULL,
  `gpph` varchar(128) NOT NULL,
  `tgl_penimb_bayi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penimb_bayi`
--

INSERT INTO `penimb_bayi` (`id_penimb_bayi`, `id_balita`, `bb_bayi`, `tinggi_bayi`, `lingkep`, `tdd`, `tdl`, `kpsp`, `kmpe`, `mchat`, `gpph`, `tgl_penimb_bayi`) VALUES
(4, 1, '20', '90', 0, '', '', '', '', '', '', '2020-07-14'),
(9, 3, '4000', '55', 50, 'Baik', 'Baik', 'Sesuai', 'Sesuai', 'Sesuai', 'Sesuai', '2020-08-19'),
(11, 3, '4000', '50', 55, 'Baik', 'Baik', 'Sesuai', 'Sesuai', 'Sesuai', 'Sesuai', '2020-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `penimb_ibu`
--

CREATE TABLE `penimb_ibu` (
  `id_penimb_ibu` int(11) NOT NULL,
  `id_ibuhamil` int(50) NOT NULL,
  `bb_ibu` decimal(10,0) NOT NULL,
  `lingleng` decimal(10,0) NOT NULL,
  `sistol` int(5) NOT NULL,
  `diastol` int(5) NOT NULL,
  `tgl_penimb_ibu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penimb_ibu`
--

INSERT INTO `penimb_ibu` (`id_penimb_ibu`, `id_ibuhamil`, `bb_ibu`, `lingleng`, `sistol`, `diastol`, `tgl_penimb_ibu`) VALUES
(4, 9, '58', '20', 100, 80, '2020-07-15'),
(5, 1, '60', '20', 90, 70, '2020-07-15'),
(6, 1, '55', '25', 120, 80, '2020-07-18'),
(7, 1, '70', '20', 100, 90, '2020-08-19');

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
  `level` int(10) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nik`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `alamat`, `alamat_kota`, `kode_pos`, `username`, `nama_lengkap`, `email`, `password`, `level`, `is_active`) VALUES
(1, 0, '', NULL, 0, '', '', 0, 'admin', 'Admin Posyandu', 'admin@localhost', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(13, 1163024, 'User', '2020-07-01', 80, 'User', 'User', 20, 'user', 'User Testing', 'user@localhost', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 0),
(15, 1173011, 'Bandung', '2020-07-03', 84568445, 'Sarijadi Blok 7', 'Bandung', 42520, 'ira.kusuma', 'Ira Kusuma', 'ira@gmail.com', '3c67080a1a09b022fb9d94e57a75ddad', 2, 0),
(16, 101010, 'user2', '2018-01-18', 101010, 'user2', 'user2', 454545, 'user2', 'user2', 'user2@localhost', '7e58d63b60197ceb55a1c487989a3720', 2, 1),
(17, 1173089, 'Bandung', '2020-08-10', 89765456342, 'Bandung Sarijadi 123', 'Bandung', 53164, 'budidoremi', 'Budi Doremi', 'budi@gmail.com', '43e149876e965f4fa3b49109ea2ddefe', 2, 0),
(19, 11730789, 'Bandung', '1999-03-10', 87656432567, 'Bandung Sariasih', 'Bandung', 40151, 'Ira Wardani', 'Ira Wardani', 'kusumaira21@gmail.com', 'bd2b2935cc0199e6a83578d80ddbd4b6', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'kusumaira21@gmail.com', 'PHkzY/wsqLPx5HIe9yXHykE/AK/Ol5suXJjUUoAAm8c=', 1597720807),
(2, 'kusumaira21@gmail.com', '5y4ghYKYnQ9BHPFJBT3kD3XOThqS5mA8e1Zh6ErMYFc=', 1597721261),
(3, 'kusumaira21@gmail.com', 'Uc/8beA+9U6PHjhbLrw4rAxP9Rr3Ha01DOov5z0o144=', 1597722255),
(4, 'kusumaira21@gmail.com', 'kJpLlTFSv6sQUgNiiR8SOHUnEKoQ6vlBwfnNYF+6gBo=', 1597724272),
(5, 'kusumaira21@gmail.com', 'zqDnmsp8PSFWJzXSZeiQ2PEwLaZkqI3u0/SODvQou7E=', 1597810813);

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
-- Indexes for table `pelayanan_bayi`
--
ALTER TABLE `pelayanan_bayi`
  ADD PRIMARY KEY (`id_pelbayi`);

--
-- Indexes for table `pelayanan_ibu`
--
ALTER TABLE `pelayanan_ibu`
  ADD PRIMARY KEY (`id_pelibu`);

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
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `pelayanan_bayi`
--
ALTER TABLE `pelayanan_bayi`
  MODIFY `id_pelbayi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelayanan_ibu`
--
ALTER TABLE `pelayanan_ibu`
  MODIFY `id_pelibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penimb_bayi`
--
ALTER TABLE `penimb_bayi`
  MODIFY `id_penimb_bayi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penimb_ibu`
--
ALTER TABLE `penimb_ibu`
  MODIFY `id_penimb_ibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vitamin`
--
ALTER TABLE `vitamin`
  MODIFY `id_vit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

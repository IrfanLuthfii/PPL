-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2023 at 01:38 PM
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
-- Database: `db-simasjid-ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `kode_rekening`
--

CREATE TABLE `kode_rekening` (
  `id` int NOT NULL,
  `kode` varchar(3) NOT NULL,
  `nama_bank` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kode_rekening`
--

INSERT INTO `kode_rekening` (`id`, `kode`, `nama_bank`) VALUES
(2, '002', 'BRI'),
(3, '451', 'BSI'),
(4, '008', 'MANDIRI'),
(5, '014', 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `nama_kegiatan`, `tanggal`, `jam`) VALUES
(1, 'Kajian Bersama Ustad Abdul Somad', '2024-01-24', '14:00:00'),
(2, 'Kajian Bersama Ustad Adi Hidayat', '2023-12-01', '14:00:00'),
(3, 'Kajian Bersama Ustad Handy Bonny', '2024-01-25', '14:00:00'),
(4, 'Wirid', '2023-11-29', '17:00:00'),
(5, 'Kajain Rutin', '2023-11-28', '20:00:00'),
(6, 'kebersihan', '2023-11-26', '08:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi`
--

CREATE TABLE `tbl_donasi` (
  `id_donasi` int NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_rekening` int DEFAULT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(50) DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `jenis_donasi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `bukti` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_donasi`
--

INSERT INTO `tbl_donasi` (`id_donasi`, `tgl`, `id_rekening`, `nama_bank`, `no_rek`, `nama_pengirim`, `jumlah`, `jenis_donasi`, `bukti`) VALUES
(22, '2023-11-25', 1, 'Bank BRI', '2756-2355-2355-2623', 'Dodo', 120000, 'Masjid', '1700894190_e4885a8080807d4e16f4.jpeg'),
(24, '2023-11-25', 1, 'Bank Mandiri', '4837-3413-4524-2564', 'Ilham', 100000, 'Zakat Mal', '1700894229_325e32e3c70644f9e387.jpg'),
(25, '2023-11-25', 1, 'Bank BCA', '2756-2355-2355-2623', 'Reval', 100000, 'Zakat Penghasilan', '1700894246_427b3efc174cffe686ad.jpg'),
(23, '2023-11-25', 1, 'Bank BSI', '1111-3423-2454-5424', 'Cibo', 100000, 'Zakat Fitrah', '1700894212_47998b7776294db44e4d.jpg'),
(35, '2023-12-15', 6, 'Bank BSI', '4837-3413-4524-2564', 'Ilham', 999999, 'Masjid', '1702645484_c973eab40404f98c9a6e.jpeg'),
(34, '2023-12-15', 12, 'Bank BSI', '2756-2355-2355-2623', 'ojik', 99999, 'ZakatFitrah', '1702645425_ccd8c42e425a78fcf9fa.jpg'),
(33, '2023-12-15', 13, 'Bank BCA', '1234-1243-2345-2354', 'wawa', 99999, 'ZakatFitrah', '1702645235_2ec0389b9932d4d0c85e.jpeg'),
(32, '2023-12-15', 6, 'Bank BRI', '2756-2355-2355-2623', 'ojik', 99999, 'Masjid', '1702644871_aef09e9862daa2b59a54.jpg'),
(31, '2023-12-12', 1, 'Bank BRI', '1234-1243-2345-2354', 'wawa', 100000, 'ZakatFitrah', '1702366289_2797b13c3ebfbfc6bd01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_masjid`
--

CREATE TABLE `tbl_kas_masjid` (
  `id_kas_masjid` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int DEFAULT NULL,
  `kas_keluar` int DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `validasi` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas_masjid`
--

INSERT INTO `tbl_kas_masjid` (`id_kas_masjid`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`, `bukti`, `validasi`) VALUES
(1, '2023-11-22', 'Sald', 10000000, 0, 'Masuk', NULL, 'tidak'),
(2, '2023-11-23', 'Pembbayaran PDAM', 0, 150000, 'Keluar', NULL, 'ya'),
(3, '2023-10-23', 'Pembayaran Tagihan Listrik Bulan Agustus 2022', 0, 250000, 'Keluar', NULL, 'ya'),
(4, '2023-11-23', 'Kotak Infak Kajian', 230000, 0, 'Masuk', NULL, 'tidak'),
(5, '2023-11-24', 'Infak Masjid', 170000, 0, 'Masuk', NULL, 'ya'),
(6, '2023-11-01', 'Gaji Garim', 0, 1200000, 'Keluar', NULL, 'ya'),
(7, '2023-11-25', 'Infak Wirid', 168000, 0, 'Masuk', NULL, 'ya'),
(8, '2023-11-26', 'Kotak Infak Jumat', 348000, 0, 'Masuk', NULL, 'tidak'),
(19, '2023-12-01', 'Cibo', 10, 0, 'Masuk', NULL, 'ya'),
(20, '2023-12-07', '12', 0, 2, 'Keluar', '1702552367_a1093ec9aa000f9eac16.jpg', 'ya'),
(21, '2023-12-15', 'ojik', 99999, 0, 'Masuk', NULL, NULL),
(22, '2023-12-15', 'Ilham', 999999, 0, 'Masuk', NULL, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_sosial`
--

CREATE TABLE `tbl_kas_sosial` (
  `id_kas_sosial` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int DEFAULT NULL,
  `kas_keluar` int DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `validasi` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas_sosial`
--

INSERT INTO `tbl_kas_sosial` (`id_kas_sosial`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`, `bukti`, `validasi`) VALUES
(1, '2023-11-29', 'Zakat warga', 5600000, 0, 'Masuk', NULL, 'ya'),
(2, '2023-11-30', 'Zakat warga luar', 475000, 0, 'Masuk', NULL, 'tidak'),
(4, '2023-11-30', 'Membeli Beras 50 Kg Untuk Duafa', 0, 635000, 'Keluar', NULL, 'ya'),
(5, '2023-11-30', 'membantu anak yatim', 0, 300000, 'Keluar', NULL, 'ya'),
(8, '2023-12-12', 'wawa', 100000, 0, 'Masuk', NULL, 'ya'),
(9, '2023-12-14', 'ok2', 0, 110, 'Keluar', '1702555320_38aa7d8dfe4c8af8de9a.png', NULL),
(10, '2023-12-15', 'wawa', 99999, 0, 'Masuk', NULL, 'ya'),
(11, '2023-12-15', 'ojik', 99999, 0, 'Masuk', NULL, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_zakatmal`
--

CREATE TABLE `tbl_kas_zakatmal` (
  `id_kas_zakatmal` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int DEFAULT NULL,
  `kas_keluar` int DEFAULT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `validasi` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas_zakatmal`
--

INSERT INTO `tbl_kas_zakatmal` (`id_kas_zakatmal`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`, `bukti`, `validasi`) VALUES
(1, '2023-11-29', 'Zakat warga', 5600000, 0, 'Masuk', NULL, 'ya'),
(2, '2023-11-30', 'Zakat warga luar', 475000, 0, 'Masuk', NULL, 'ya'),
(4, '2023-11-30', 'Membeli Beras 50 Kg Untuk Duafa', 0, 63500, 'Keluar', NULL, 'ya'),
(5, '2023-11-30', 'membantu anak yatim', 0, 300000, 'Keluar', NULL, 'ya'),
(8, '2023-11-11', 'zakat kurniawan', 500000, 0, 'Masuk', NULL, 'tidak'),
(7, '2023-11-11', 'zakat ilham', 200000, 0, 'Masuk', NULL, 'ya'),
(10, '2023-12-23', '111', 0, 1110, 'Keluar', '1702555963_b31220f2df2a805ffe80.jpeg', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_zakatpenghasilan`
--

CREATE TABLE `tbl_kas_zakatpenghasilan` (
  `id_kas_zakatpenghasilan` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int DEFAULT NULL,
  `kas_keluar` int DEFAULT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `validasi` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas_zakatpenghasilan`
--

INSERT INTO `tbl_kas_zakatpenghasilan` (`id_kas_zakatpenghasilan`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`, `bukti`, `validasi`) VALUES
(1, '2023-11-29', 'Zakat warga', 5600000, 0, 'Masuk', NULL, 'ya'),
(2, '2023-11-30', 'Zakat warga luar', 475000, 0, 'Masuk', NULL, 'ya'),
(4, '2023-11-30', 'Membeli Beras 50 Kg Untuk Duafa', 0, 635000, 'Keluar', NULL, 'ya'),
(5, '2023-11-30', 'membantu anak yatim', 0, 300000, 'Keluar', NULL, 'ya'),
(9, '2023-11-11', 'zakat ilham', 5000, 0, 'Masuk', NULL, 'tidak'),
(11, '2023-11-11', 'zakat kurniawan', 1000, 0, 'Masuk', NULL, 'ya'),
(12, '2023-12-13', 'ok111', 0, 1111120, 'Keluar', '1702556307_e35da778175ac9673ddd.png', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int NOT NULL,
  `kode` int NOT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `kode`, `no_rek`, `atas_nama`) VALUES
(6, 2, '002-1243-2345-2354', 'Masjid AL_KHAIR'),
(7, 2, '1234-1243-2345-2354', 'Masjid AL_KHAIR'),
(8, 3, '3--1243-2345-2354', 'Masjid AL_KHAIR'),
(9, 3, '3-3413-4524-2564', 'Masjid AL_KHAIRqqq'),
(10, 3, '3-2756-2355-2355-2623', 'Masjid AL_KHAIRqqq'),
(11, 3, '3-1234-1243-2345-2354', 'Masjid AL_KHAIRqqq'),
(12, 3, '4837-3413-4524-2564', 'Masjid AL_KHAIRqqqs'),
(13, 5, '1243-2345-2354', 'upi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int NOT NULL,
  `nama_masjid` varchar(100) NOT NULL,
  `id_kota` varchar(5) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_masjid`, `id_kota`, `alamat`) VALUES
(1, 'MASJID AL-KHAIR', '0710', 'Kebun Kenanga, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38222');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun`
--

CREATE TABLE `tbl_tahun` (
  `id_tahun` int NOT NULL,
  `tahun_h` varchar(4) DEFAULT NULL,
  `tahun_m` year DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_tahun`
--

INSERT INTO `tbl_tahun` (`id_tahun`, `tahun_h`, `tahun_m`) VALUES
(1, '1444', 2023),
(2, '1445', 2024),
(3, '1446', 2025);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
(1, 'ADMIN', 'admin@gmail.com', '1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kode_rekening`
--
ALTER TABLE `kode_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`) USING BTREE;

--
-- Indexes for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  ADD PRIMARY KEY (`id_donasi`) USING BTREE;

--
-- Indexes for table `tbl_kas_masjid`
--
ALTER TABLE `tbl_kas_masjid`
  ADD PRIMARY KEY (`id_kas_masjid`) USING BTREE;

--
-- Indexes for table `tbl_kas_sosial`
--
ALTER TABLE `tbl_kas_sosial`
  ADD PRIMARY KEY (`id_kas_sosial`) USING BTREE;

--
-- Indexes for table `tbl_kas_zakatmal`
--
ALTER TABLE `tbl_kas_zakatmal`
  ADD PRIMARY KEY (`id_kas_zakatmal`) USING BTREE;

--
-- Indexes for table `tbl_kas_zakatpenghasilan`
--
ALTER TABLE `tbl_kas_zakatpenghasilan`
  ADD PRIMARY KEY (`id_kas_zakatpenghasilan`) USING BTREE;

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`) USING BTREE,
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  ADD PRIMARY KEY (`id_tahun`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kode_rekening`
--
ALTER TABLE `kode_rekening`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id_donasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_kas_masjid`
--
ALTER TABLE `tbl_kas_masjid`
  MODIFY `id_kas_masjid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_kas_sosial`
--
ALTER TABLE `tbl_kas_sosial`
  MODIFY `id_kas_sosial` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_kas_zakatmal`
--
ALTER TABLE `tbl_kas_zakatmal`
  MODIFY `id_kas_zakatmal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kas_zakatpenghasilan`
--
ALTER TABLE `tbl_kas_zakatpenghasilan`
  MODIFY `id_kas_zakatpenghasilan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  MODIFY `id_tahun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD CONSTRAINT `tbl_rekening_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `kode_rekening` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

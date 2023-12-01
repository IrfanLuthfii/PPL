-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 05:08 PM
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
-- Database: `db-simasjid-ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `nama_kegiatan`, `tanggal`, `jam`) VALUES
(1, 'Kajian Bersama Ustad Adi Hidayat', '2022-08-24', '14:00:00'),
(2, 'Kajian Bersama Ustad A', '2022-08-25', '14:00:00'),
(3, 'Kajian Bersama Ustad B', '2022-08-07', '14:00:00'),
(4, 'Wirid', '2022-08-26', '17:00:00'),
(7, 'Kajain Rutin', '2022-08-22', '20:00:00'),
(8, 'kebersihan', '2022-12-19', '12:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi`
--

CREATE TABLE `tbl_donasi` (
  `id_donasi` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `jenis_donasi` varchar(10) DEFAULT NULL,
  `bukti` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_donasi`
--

INSERT INTO `tbl_donasi` (`id_donasi`, `tgl`, `id_rekening`, `nama_bank`, `no_rek`, `nama_pengirim`, `jumlah`, `jenis_donasi`, `bukti`) VALUES
(11, '2022-12-15', 1, 'BRI', '0919101901901', 'salim', 1, 'Masjid', '1671108189_0af58a863c83d7d46000.jpg'),
(12, '2022-12-15', 1, 'BRI', '0919101901901', 'salim', 3, 'ZakatFitra', '1671108206_4092dc835d1c761edbbf.jpg'),
(13, '2022-12-15', 1, 'BRI', '0919101901901', 'salim', 1, 'ZakatMal', '1671108217_ff8c62c6e3c782dcd417.jpg'),
(14, '2022-12-15', 1, 'BRI', '0919101901901', 'salim', 1, 'ZakatPengh', '1671108230_0f14c2c4dc66f5a25e8b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_masjid`
--

CREATE TABLE `tbl_kas_masjid` (
  `id_kas_masjid` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int(11) DEFAULT NULL,
  `kas_keluar` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas_masjid`
--

INSERT INTO `tbl_kas_masjid` (`id_kas_masjid`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`) VALUES
(1, '2022-08-23', 'Saldo Awal', 10000000, 0, 'Masuk'),
(2, '2022-08-23', 'Pembbayaran PDAM', 0, 150000, 'Keluar'),
(3, '2022-08-23', 'Pembayaran Tagihan Listrik Bulan Agustus 2022', 0, 250000, 'Keluar'),
(4, '2022-08-23', 'Kotak Infak Kajian', 230000, 0, 'Masuk'),
(5, '2022-08-24', 'Infak Masjid', 170000, 0, 'Masuk'),
(6, '2022-08-01', 'Gaji Garim', 0, 1200000, 'Keluar'),
(7, '2022-08-25', 'Infak Wirid', 168000, 0, 'Masuk'),
(8, '2022-08-26', 'Kotak Infak Jumat', 348000, 0, 'Masuk'),
(13, '2022-12-12', 'test', 5, 0, 'Masuk'),
(14, '2022-12-21', 'zakat ilham', 0, 0, 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_sosial`
--

CREATE TABLE `tbl_kas_sosial` (
  `id_kas_sosial` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int(11) DEFAULT NULL,
  `kas_keluar` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas_sosial`
--

INSERT INTO `tbl_kas_sosial` (`id_kas_sosial`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`) VALUES
(1, '2022-04-29', 'Zakat warga', 5600000, 0, 'Masuk'),
(2, '2022-04-30', 'Zakat warga luar', 475000, 0, 'Masuk'),
(4, '2022-04-30', 'Membeli Beras 50 Kg Untuk Duafa', 0, 635000, 'Keluar'),
(5, '2022-04-30', 'membantu anak yatim', 0, 300000, 'Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_zakatmal`
--

CREATE TABLE `tbl_kas_zakatmal` (
  `id_kas_zakatmal` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int(11) DEFAULT NULL,
  `kas_keluar` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas_zakatmal`
--

INSERT INTO `tbl_kas_zakatmal` (`id_kas_zakatmal`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`) VALUES
(1, '2022-04-29', 'Zakat warga', 5600000, 0, 'Masuk'),
(2, '2022-04-30', 'Zakat warga luar', 475000, 0, 'Masuk'),
(4, '2022-04-30', 'Membeli Beras 50 Kg Untuk Duafa', 0, 63500, 'Keluar'),
(5, '2022-04-30', 'membantu anak yatim', 0, 300000, 'Keluar'),
(8, '2022-12-11', 'zakat kurniawan', 500000, 0, 'Masuk'),
(7, '2022-12-11', 'zakat ilham', 200000, 0, 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_zakatpenghasilan`
--

CREATE TABLE `tbl_kas_zakatpenghasilan` (
  `id_kas_zakatpenghasilan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int(11) DEFAULT NULL,
  `kas_keluar` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas_zakatpenghasilan`
--

INSERT INTO `tbl_kas_zakatpenghasilan` (`id_kas_zakatpenghasilan`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`) VALUES
(1, '2022-04-29', 'Zakat warga', 5600000, 0, 'Masuk'),
(2, '2022-04-30', 'Zakat warga luar', 475000, 0, 'Masuk'),
(4, '2022-04-30', 'Membeli Beras 50 Kg Untuk Duafa', 0, 635000, 'Keluar'),
(5, '2022-04-30', 'membantu anak yatim', 0, 300000, 'Keluar'),
(9, '2022-12-11', 'zakat ilham', 5000, 0, 'Masuk'),
(11, '2022-12-11', 'zakat kurniawan', 1000, 0, 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelompok`
--

CREATE TABLE `tbl_kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `nama_kelompok` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kelompok`
--

INSERT INTO `tbl_kelompok` (`id_kelompok`, `id_tahun`, `nama_kelompok`) VALUES
(1, 1, 'Kelompok 1'),
(2, 1, 'Kelompok 2'),
(5, 2, 'Kelompok 1'),
(9, 2, 'Kelompok 2'),
(10, 2, 'Kelompok 3'),
(11, 3, 'Kelompok 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta_kelompok`
--

CREATE TABLE `tbl_peserta_kelompok` (
  `id_peserta` int(11) NOT NULL,
  `id_kelompok` int(11) DEFAULT NULL,
  `nama_peserta` varchar(100) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_peserta_kelompok`
--

INSERT INTO `tbl_peserta_kelompok` (`id_peserta`, `id_kelompok`, `nama_peserta`, `biaya`) VALUES
(1, 1, 'Wawan', 2200000),
(2, 1, 'Marwan', 2200000),
(3, 1, 'Mahmudin', 2200000),
(4, 2, 'Maimuna', 2200000),
(5, 2, 'Maimun', 2200000),
(8, 2, 'Hamdan', 2200000),
(9, 5, 'Ani', 2500000),
(10, 5, 'Hana', 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'Bank BRI', '2345-4584-1111-111', 'Masjid Nurul Iman'),
(2, 'Bank BSI', '1111-4584-2222-1234', 'Masjid Nurul Iman'),
(3, 'Bank Mandiri', '4837-111-232-111', 'Masjid Nurul Iman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_masjid` varchar(100) NOT NULL,
  `id_kota` varchar(5) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_masjid`, `id_kota`, `alamat`) VALUES
(1, 'MASJID NURUL IMAN', '0710', 'Surabaya, Kec. Sungai Serut, Kota Bengkulu, Bengkulu 38119');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun`
--

CREATE TABLE `tbl_tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun_h` varchar(4) DEFAULT NULL,
  `tahun_m` year(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_tahun`
--

INSERT INTO `tbl_tahun` (`id_tahun`, `tahun_h`, `tahun_m`) VALUES
(1, '1443', 2022),
(2, '1444', 2023),
(3, '1445', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
(1, 'Sulaiman', 'admin@gmail.com', '1234', 0),
(2, 'Bahrudin', 'bahrudin@gmail.com', '1234', 1),
(3, 'Mahmudin', 'mahmudin@gmail.com', '123456', 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_kelompok`
--
ALTER TABLE `tbl_kelompok`
  ADD PRIMARY KEY (`id_kelompok`) USING BTREE;

--
-- Indexes for table `tbl_peserta_kelompok`
--
ALTER TABLE `tbl_peserta_kelompok`
  ADD PRIMARY KEY (`id_peserta`) USING BTREE;

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`) USING BTREE;

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
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_kas_masjid`
--
ALTER TABLE `tbl_kas_masjid`
  MODIFY `id_kas_masjid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_kas_sosial`
--
ALTER TABLE `tbl_kas_sosial`
  MODIFY `id_kas_sosial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kas_zakatmal`
--
ALTER TABLE `tbl_kas_zakatmal`
  MODIFY `id_kas_zakatmal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_kas_zakatpenghasilan`
--
ALTER TABLE `tbl_kas_zakatpenghasilan`
  MODIFY `id_kas_zakatpenghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_kelompok`
--
ALTER TABLE `tbl_kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_peserta_kelompok`
--
ALTER TABLE `tbl_peserta_kelompok`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
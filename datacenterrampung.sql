-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 08:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datacenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabel`
--

CREATE TABLE `tb_kabel` (
  `id_kabel` int(55) NOT NULL,
  `id_server` int(55) NOT NULL,
  `nama_kabel` varchar(255) NOT NULL,
  `jns_kabel` varchar(255) NOT NULL,
  `kec_kabel` varchar(255) NOT NULL,
  `ket_kabel` varchar(255) NOT NULL,
  `status_kabel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kabel`
--

INSERT INTO `tb_kabel` (`id_kabel`, `id_server`, `nama_kabel`, `jns_kabel`, `kec_kabel`, `ket_kabel`, `status_kabel`) VALUES
(1, 1, 'RASO 45', 'RJ45', '1000', '', 'RUSAK'),
(2, 2, 'XIAOMI PRO', 'LAN', '1000', 'Bagus', 'GANTI'),
(4, 2, 'LANPRO', 'LAN', '149', '-', 'GANTI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komponen`
--

CREATE TABLE `tb_komponen` (
  `id_komponen` int(55) NOT NULL,
  `id_server` int(55) NOT NULL,
  `id_hardware` int(55) NOT NULL,
  `nama_komponen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lemari`
--

CREATE TABLE `tb_lemari` (
  `id_lemari` int(55) NOT NULL,
  `id_ruangan` int(55) NOT NULL,
  `nama_lemari` varchar(255) NOT NULL,
  `slotrack` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lemari`
--

INSERT INTO `tb_lemari` (`id_lemari`, `id_ruangan`, `nama_lemari`, `slotrack`) VALUES
(1, 1, 'Lemari A15', 5),
(2, 2, 'Lemari B01', 7),
(3, 1, 'Lemari A10', 4),
(5, 3, 'Tes ubah Lemari', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `halaman` varchar(255) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `id_user`, `halaman`, `aktivitas`, `waktu`) VALUES
(5, 5, 'Prosesor', 'AMD 555 di Server NAGA di ubah status menjadi PERBAIKI', '2020-07-09 12:08:16'),
(11, 5, 'RAM', 'ASROCK SODIMM DDR3 di Server NAGA di ubah status menjadi PERBAIKI', '2020-07-09 13:07:31'),
(12, 5, 'RAM', 'ASROCK SODIMM DDR3 di Server NAGA di ubah status menjadi RUSAK', '2020-07-09 13:08:11'),
(16, 5, 'Storage', 'SSD ADATA di Server HIU di ubah status menjadi GANTI', '2020-07-09 14:09:57'),
(17, 5, 'Kabel', 'XIAOMI di Server NAGA di ubah status menjadi RUSAK', '2020-07-09 14:42:21'),
(18, 5, 'Kabel', 'RASO 45 di Server HIU di ubah status menjadi GANTI', '2020-07-09 14:43:17'),
(19, 5, 'Storage', 'SSD ADATA di Server HIU di ubah status menjadi RUSAK', '2020-07-09 14:43:36'),
(20, 5, 'RAM', 'ASROCK SODIMM DDR3 di Server NAGA di ubah status menjadi GANTI', '2020-07-09 14:43:46'),
(21, 5, 'Prosesor', 'AMD Ryzen 9 di Server NAGA di ubah status menjadi GANTI', '2020-07-09 14:44:14'),
(22, 5, 'Kabel', 'RASO 45 di Server HIU di ubah status menjadi GANTI', '2020-07-16 15:54:47'),
(23, 5, 'Prosesor', 'AMD Ryzen 3 di Server HIU di ubah status menjadi PERBAIKI', '2021-02-01 08:56:01'),
(24, 5, 'Prosesor', 'Intel i9 di Server HIU di ubah status menjadi GANTI', '2021-02-01 12:07:53'),
(25, 5, 'Kabel', 'XIAOMI di Server NAGA di ubah status menjadi GANTI', '2021-02-01 12:09:04'),
(34, 2, 'Prosesor', 'AMD Ryzen 3 di pindah dari Server NAGA ke Server HIU', '2021-02-15 02:54:46'),
(35, 2, 'Prosesor', 'AMD Ryzen 3 di pindah dari Server HIU ke Server NAGA', '2021-02-15 02:57:37'),
(36, 2, 'RAM', 'CORSAIR SODIMM DDR3 di pindah dari Server HIU ke Server NAGA', '2021-02-15 03:14:06'),
(37, 2, 'RAM', 'VGEN SODIMM DDR3 di pindah dari Server NAGA ke Server HIU', '2021-02-15 03:16:45'),
(38, 2, 'Storage', 'SSD ADATA di pindah dari Server NAGA ke Server HIU', '2021-02-15 03:23:09'),
(39, 2, 'Kabel', 'RASO 45 di pindah dari Server HIU ke Server NAGA', '2021-02-15 03:29:49'),
(40, 2, 'Kabel', 'RASO 45 di pindah dari Server NAGA ke Server HIU', '2021-02-15 03:30:07'),
(41, 2, 'Prosesor', 'Intel i9 di Server HIU di ubah status menjadi RUSAK', '2021-02-15 05:17:41'),
(42, 2, 'Prosesor', 'AMD 555 di Server NAGA di ubah status menjadi GANTI', '2021-02-15 05:17:57'),
(43, 2, 'RAM', 'CORSAIR SODIMM DDR3 di Server NAGA di ubah status menjadi RUSAK', '2021-02-15 05:18:31'),
(44, 2, 'RAM', 'VGEN SODIMM DDR3 di Server HIU di ubah status menjadi PERBAIKI', '2021-02-15 05:18:51'),
(45, 2, 'Storage', 'SSD ADATA di Server NAGA di ubah status menjadi PERBAIKI', '2021-02-15 05:19:26'),
(46, 2, 'Storage', 'SSD ADATA di Server NAGA di ubah status menjadi RUSAK', '2021-02-15 05:19:42'),
(47, 2, 'Kabel', 'RASO 45 di Server HIU di ubah status menjadi RUSAK', '2021-02-15 05:20:08'),
(49, 2, 'Storage', 'SSD ADATA di Server NAGA di ubah status menjadi RUSAK', '2021-02-15 05:19:42'),
(50, 2, 'Storage', 'SSD ADATA di Server NAGA di ubah status menjadi PERBAIKI', '2021-02-15 05:19:26'),
(51, 2, 'RAM', 'VGEN SODIMM DDR3 di Server HIU di ubah status menjadi PERBAIKI', '2021-02-15 05:18:51'),
(52, 2, 'RAM', 'CORSAIR SODIMM DDR3 di Server NAGA di ubah status menjadi RUSAK', '2021-02-15 05:18:31'),
(53, 2, 'Prosesor', 'AMD 555 di Server NAGA di ubah status menjadi GANTI', '2021-02-15 05:17:57'),
(54, 2, 'Prosesor', 'Intel i9 di Server HIU di ubah status menjadi RUSAK', '2021-02-15 05:17:41'),
(55, 2, 'Kabel', 'RASO 45 di pindah dari Server NAGA ke Server HIU', '2021-02-15 03:30:07'),
(56, 2, 'Kabel', 'RASO 45 di pindah dari Server HIU ke Server NAGA', '2021-02-15 03:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pc`
--

CREATE TABLE `tb_pc` (
  `id_pc` int(55) NOT NULL,
  `id_server` int(55) NOT NULL,
  `id_ram` int(55) NOT NULL,
  `id_storage` int(55) NOT NULL,
  `id_prosesor` int(55) NOT NULL,
  `id_kabel` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prosesor`
--

CREATE TABLE `tb_prosesor` (
  `id_prosesor` int(55) NOT NULL,
  `id_server` int(55) NOT NULL,
  `nama_prosesor` varchar(255) NOT NULL,
  `jml_core` int(55) NOT NULL,
  `ket_prosesor` varchar(255) NOT NULL,
  `status_prosesor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prosesor`
--

INSERT INTO `tb_prosesor` (`id_prosesor`, `id_server`, `nama_prosesor`, `jml_core`, `ket_prosesor`, `status_prosesor`) VALUES
(3, 1, 'Intel i9 gen 12', 8, 'Keren', 'RUSAK'),
(4, 2, 'AMD Ryzen 9', 10, '', 'RUSAK'),
(5, 2, 'AMD 555', 10, '', 'GANTI'),
(6, 2, 'AMD 123', 10, 'Test 123', 'RUSAK'),
(7, 1, 'AMD Ryzen 3', 4, '', 'PERBAIKI'),
(11, 1, 'Ryzen 5', 10, 'Kosong', 'GANTI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rack`
--

CREATE TABLE `tb_rack` (
  `id_rack` int(55) NOT NULL,
  `id_lemari` int(55) NOT NULL,
  `nama_rack` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rack`
--

INSERT INTO `tb_rack` (`id_rack`, `id_lemari`, `nama_rack`) VALUES
(1, 1, 'Rak A1'),
(2, 1, 'Rak B2'),
(3, 2, 'Rak B2C'),
(4, 3, 'Rak C1'),
(5, 5, 'Tes ubah Rak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ram`
--

CREATE TABLE `tb_ram` (
  `id_ram` int(55) NOT NULL,
  `id_server` int(55) NOT NULL,
  `nama_ram` varchar(255) NOT NULL,
  `ukuran_ram` int(55) NOT NULL,
  `ket_ram` varchar(255) NOT NULL,
  `status_ram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ram`
--

INSERT INTO `tb_ram` (`id_ram`, `id_server`, `nama_ram`, `ukuran_ram`, `ket_ram`, `status_ram`) VALUES
(1, 2, 'ASROCK SODIMM DDR3', 7, 'Cuma 1', 'GANTI'),
(2, 1, 'VGEN SODIMM DDR3', 8, 'Cuma 1', 'PERBAIKI'),
(5, 2, 'CORSAIR SODIMM DDR3', 4, 'Hiyahiya', 'RUSAK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` int(55) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'Lantai 1'),
(2, 'Lantai 2'),
(3, 'Test ubah ruangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_server`
--

CREATE TABLE `tb_server` (
  `id_server` int(55) NOT NULL,
  `id_rack` int(55) NOT NULL,
  `nama_server` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_server`
--

INSERT INTO `tb_server` (`id_server`, `id_rack`, `nama_server`) VALUES
(1, 1, 'HIU'),
(2, 3, 'NAGA'),
(3, 5, 'tes ubah server 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sistem`
--

CREATE TABLE `tb_sistem` (
  `id_sistem` int(55) NOT NULL,
  `id_vps` varchar(55) NOT NULL,
  `nama_sistem` varchar(255) NOT NULL,
  `alamat_sistem` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tahun` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sistem`
--

INSERT INTO `tb_sistem` (`id_sistem`, `id_vps`, `nama_sistem`, `alamat_sistem`, `deskripsi`, `tahun`) VALUES
(1, '2', 'Sistem Informasi Akademik', 'akademik.unsoed.ac.id', 'Ini adalah sistem akademik unsoed V 2.0', 2020),
(2, '1', 'Sistem Tagihan', 'sista.unsoed.ac.id', 'Ini adalah sistem tagihan unsoed V 1.0', 2018),
(3, '4', 'Test ubah Teknik', 'test.teknikubah.ac.id', 'Test ubah desk', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `tb_storage`
--

CREATE TABLE `tb_storage` (
  `id_storage` int(55) NOT NULL,
  `id_server` int(55) NOT NULL,
  `nama_storage` varchar(255) NOT NULL,
  `ukuran_storage` int(55) NOT NULL,
  `tipe_storage` varchar(255) NOT NULL,
  `ket_storage` varchar(255) NOT NULL,
  `status_storage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_storage`
--

INSERT INTO `tb_storage` (`id_storage`, `id_server`, `nama_storage`, `ukuran_storage`, `tipe_storage`, `ket_storage`, `status_storage`) VALUES
(1, 2, 'SSD ADATA', 5000, 'SSD', 'Tahun 2019', 'RUSAK'),
(2, 1, 'SSD ADATA', 5000, 'SSD', 'Tahun 2019', 'PERBAIKI'),
(3, 2, 'SSD ADATA', 5000, 'SSD', 'Tahun 2019', 'PERBAIKI'),
(5, 1, 'SANDISK', 2500, 'SSD', 'Keren', 'GANTI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `level_user` int(10) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `email`, `photo`, `level_user`, `last_login`) VALUES
(1, 'lptsi', '21232f297a57a5a743894a0e4a801fc3', 'Limaa', 'satriaperwirateam@gmail.com', 'logounsoedlp3m.png', 1, '2021-02-14 23:03:12'),
(2, 'unsoed', 'e21394aaeee10f917f581054d24b031f', 'Tuan Lorem Ipsum', 'satriaperwirateam@gmail.com', 'logounsoedlp3m.png', 2, '2021-02-15 05:22:59'),
(4, 'cpz', 'eedae20fc3c7a6e9c5b1102098771c70', 'Contoh Admin', 'satriaperwirateam@gmail.com', 'logounsoedlp3m.png', 1, '2022-06-27 01:23:13'),
(5, 'hayuk', 'eedae20fc3c7a6e9c5b1102098771c70', 'Pak Iqbal AE', 'satriaperwirateam@gmail.com', 'logounsoedlp3m.png', 2, '2022-06-27 00:51:26'),
(6, 'rafi', 'eedae20fc3c7a6e9c5b1102098771c70', 'Nyoba', 'mila@gmail.com', 'logounsoedlp3m.png', 2, '0000-00-00 00:00:00'),
(8, 'cek', '6ab97dc5c706cfdc425ca52a65d97b0d', 'cek', 'cek@gmail.com', 'logounsoedlp3m.png', 2, '0000-00-00 00:00:00'),
(9, 'iniusername', '36471498d56905c10b75456b80264d3b', 'Ini nama', 'iniemail@email.com', 'logounsoedlp3m.png', 1, '2022-05-10 13:30:46'),
(10, 'lulus', '27841d777fe6ad278009c32e72f03621', 'Lulus', 'lulus@gmail.com', 'logounsoedlp3m.png', 2, '2022-05-10 13:37:00'),
(14, 'gambar', 'c67620564d2bbdded755b8e5ca8ec184', 'gambar coba', 'coba', '1652167387.jpg', 1, '2022-05-10 14:36:01'),
(15, 'guest', '084e0343a0486ff05530df6c705c8bb4', 'Tamu', 'guest', 'logounsoedlp3m.png', 3, '2022-06-23 20:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vps`
--

CREATE TABLE `tb_vps` (
  `id_vps` int(55) NOT NULL,
  `id_server` int(55) NOT NULL,
  `nama_vps` varchar(255) NOT NULL,
  `prosesor_vps` int(55) NOT NULL,
  `ukuran_harddiskvps` varchar(55) NOT NULL,
  `ukuran_ramvps` varchar(55) NOT NULL,
  `os_vps` varchar(255) NOT NULL,
  `id_user` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_vps`
--

INSERT INTO `tb_vps` (`id_vps`, `id_server`, `nama_vps`, `prosesor_vps`, `ukuran_harddiskvps`, `ukuran_ramvps`, `os_vps`, `id_user`) VALUES
(1, 2, 'AB12', 1, '128', '1', 'Windows 2016 Sever', 2),
(2, 2, 'AX12', 1, '250', '2', 'Linux Ubuntu 16', 4),
(4, 1, 'Test ubah VPS', 3, '20', '5', 'Ubuntu', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kabel`
--
ALTER TABLE `tb_kabel`
  ADD PRIMARY KEY (`id_kabel`);

--
-- Indexes for table `tb_komponen`
--
ALTER TABLE `tb_komponen`
  ADD PRIMARY KEY (`id_komponen`);

--
-- Indexes for table `tb_lemari`
--
ALTER TABLE `tb_lemari`
  ADD PRIMARY KEY (`id_lemari`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_pc`
--
ALTER TABLE `tb_pc`
  ADD PRIMARY KEY (`id_pc`);

--
-- Indexes for table `tb_prosesor`
--
ALTER TABLE `tb_prosesor`
  ADD PRIMARY KEY (`id_prosesor`);

--
-- Indexes for table `tb_rack`
--
ALTER TABLE `tb_rack`
  ADD PRIMARY KEY (`id_rack`);

--
-- Indexes for table `tb_ram`
--
ALTER TABLE `tb_ram`
  ADD PRIMARY KEY (`id_ram`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tb_server`
--
ALTER TABLE `tb_server`
  ADD PRIMARY KEY (`id_server`);

--
-- Indexes for table `tb_sistem`
--
ALTER TABLE `tb_sistem`
  ADD PRIMARY KEY (`id_sistem`);

--
-- Indexes for table `tb_storage`
--
ALTER TABLE `tb_storage`
  ADD PRIMARY KEY (`id_storage`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_vps`
--
ALTER TABLE `tb_vps`
  ADD PRIMARY KEY (`id_vps`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kabel`
--
ALTER TABLE `tb_kabel`
  MODIFY `id_kabel` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_komponen`
--
ALTER TABLE `tb_komponen`
  MODIFY `id_komponen` int(55) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lemari`
--
ALTER TABLE `tb_lemari`
  MODIFY `id_lemari` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tb_pc`
--
ALTER TABLE `tb_pc`
  MODIFY `id_pc` int(55) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_prosesor`
--
ALTER TABLE `tb_prosesor`
  MODIFY `id_prosesor` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_rack`
--
ALTER TABLE `tb_rack`
  MODIFY `id_rack` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ram`
--
ALTER TABLE `tb_ram`
  MODIFY `id_ram` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_server`
--
ALTER TABLE `tb_server`
  MODIFY `id_server` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sistem`
--
ALTER TABLE `tb_sistem`
  MODIFY `id_sistem` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_storage`
--
ALTER TABLE `tb_storage`
  MODIFY `id_storage` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_vps`
--
ALTER TABLE `tb_vps`
  MODIFY `id_vps` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

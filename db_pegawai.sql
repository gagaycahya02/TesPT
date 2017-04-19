-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Apr 2017 pada 01.11
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.4
DROP DATABASE IF EXISTS db_pegawai;
CREATE DATABASE db_pegawai;
USE db_pegawai;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempatLahir` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tglLahir` date NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `eselon` varchar(10) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tmpTugas` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `unitKerja` varchar(30) NOT NULL,
  `noHP` varchar(20) NOT NULL,
  `NPWP` varchar(50) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nip`, `nama`, `tempatLahir`, `alamat`, `tglLahir`, `gender`, `golongan`, `eselon`, `jabatan`, `tmpTugas`, `agama`, `unitKerja`, `noHP`, `NPWP`, `userPic`) VALUES
('183577883', 'Ujang', 'Cianjur', 'JL.KH Saleh', '1999-07-07', 'L', 'IV/e', 'IV', 'Kepala', 'Jakarta', 'Islam', '1', '081563283453', '12', 'garsya c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `noUser` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hakAkses` enum('admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`noUser`, `userName`, `password`, `hakAkses`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`noUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `noUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

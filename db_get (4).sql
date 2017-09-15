-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Agu 2017 pada 13.55
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_get`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paketlevel`
--

CREATE TABLE `tbl_paketlevel` (
  `level` varchar(15) NOT NULL,
  `nama_level` varchar(25) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_paketlevel`
--

INSERT INTO `tbl_paketlevel` (`level`, `nama_level`, `biaya`) VALUES
('CEC1', 'Children 1', 575000),
('CEC2', 'Children 2', 575000),
('CEC3', 'Children 3', 575000),
('IMCE1', 'Intermediate Children 1', 625000),
('IMCE2', 'Intermediate Children 2', 625000),
('IMCE3', 'Intermediate Children 3', 625000),
('JE1', 'Junior 1', 650000),
('JE2', 'Junior 2', 650000),
('JE3', 'Junior 3', 650000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `tgl_pembayaran` date NOT NULL,
  `no_kwitansi` varchar(20) NOT NULL,
  `no_induk` varchar(15) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `level` varchar(15) NOT NULL,
  `status_pembayaran` varchar(25) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`tgl_pembayaran`, `no_kwitansi`, `no_induk`, `nama_siswa`, `level`, `status_pembayaran`, `nominal`) VALUES
('2017-08-19', 'PB.170819001', 'CE17.01.004 ', 'Teguh', 'CEC1', 'Angsuran 1', 500000),
('2017-08-19', 'PB.170819002', 'CE17.01.003 ', 'Tita', 'CEC2', 'Angsuran 1', 500000),
('2017-08-19', 'PB.170819003', 'CE17.01.003', 'Tita', 'CEC2', 'Angsuran 2', 500000),
('2017-08-22', 'PB.170822001', 'CE17.01.002', 'Ririn', 'CEC1', 'Angsuran 1', 275000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `no_bktpengeluaran` varchar(25) NOT NULL,
  `tgl` date NOT NULL,
  `rek` int(11) NOT NULL,
  `rincian` varchar(100) NOT NULL,
  `item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`no_bktpengeluaran`, `tgl`, `rek`, `rincian`, `item`, `total`) VALUES
('PP.170813002', '2017-08-13', 2, 'pinsil', 20, 200000),
('PP.170813001', '2017-08-13', 2, 'Pulpen', 1, 20000),
('PP.170819001', '2017-08-19', 1, 'Guru', 1, 2000000),
('PP.170821001', '2017-08-21', 3, 'Pembayaran rekening telepon dan internet speedy', 1, 450000),
('PP.170821002', '2017-08-21', 4, 'Pembuatan banner', 3, 225000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekpengeluaran`
--

CREATE TABLE `tbl_rekpengeluaran` (
  `rek` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekpengeluaran`
--

INSERT INTO `tbl_rekpengeluaran` (`rek`, `keterangan`) VALUES
(1, 'Gaji'),
(2, 'ATK'),
(3, 'Operasional'),
(4, 'Promosi'),
(5, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `no_induk` varchar(15) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jk` char(15) NOT NULL,
  `level` varchar(15) NOT NULL,
  `sekolah_asal` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`no_induk`, `nama_siswa`, `jk`, `level`, `sekolah_asal`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`) VALUES
('CE17.01.001', 'Tua', 'Laki - Laki', 'CEC1', 'SMKN 1 SINDANG', 'Indramayu', '1995-08-09', 'sukaurip', '088888'),
('CE17.01.002', 'Ririn', 'Perempuan', 'CEC1', 'SMPN 1 Balongan', 'Indramayu', '1995-12-08', 'Sukaurip', '08009090'),
('CE17.01.004', 'Teguh', 'Laki - Laki', 'CEC1', 'SMPN 1 SIndang', 'Indarmayu', '2016-10-30', 'kartur', '009090990');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_paketlevel`
--
ALTER TABLE `tbl_paketlevel`
  ADD PRIMARY KEY (`level`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`no_kwitansi`);

--
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`no_bktpengeluaran`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`no_induk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

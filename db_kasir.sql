-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2017 at 09:32 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_barang`
--

CREATE TABLE IF NOT EXISTS `tabel_barang` (
  `kode_barang` varchar(25) NOT NULL default '',
  `nama_barang` varchar(50) NOT NULL,
  `merk_barang` varchar(50) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  PRIMARY KEY  (`kode_barang`),
  UNIQUE KEY `nama_barang` (`nama_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`kode_barang`, `nama_barang`, `merk_barang`, `harga_barang`) VALUES
('2323123123123', 'FlashDisk 16GB', 'Trancend', 80000),
('2452341231232', 'Voucher Internet 5GB', 'Tri', 50000),
('3422342342342', 'Teh Celup', 'Sari Wangi', 1000),
('3434542324234', 'Smartphone Xperia J', 'Sony', 2000000),
('3453453321253', 'Smartphone Andromax A', 'Smartfren', 800000),
('3453453454353', 'Laptop VAIO', 'VAIO', 4000000),
('3545734132354', 'Air Mineral Botol', 'Aqua', 5000),
('4331231231231', 'Handphone Nokia 3310', 'Nokia', 100000),
('4513435452432', 'DX Kamen Rider Kabuto', 'Bandai', 5000000),
('4523424324234', 'DX GameDriver ExAid', 'Bandai', 1000000),
('4542343242342', 'DX Kamen Rider Gatack', 'Bandai', 7000000),
('7687674567698', 'Voucher 32GB', 'AXIS', 9000000),
('7834923487438', 'Camera Digital', 'Canon', 6000000),
('8993988048053', 'Pensil Warna', 'JOYKO', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `tabel_detail_transaksi` (
  `id_detail` int(4) NOT NULL auto_increment,
  `kode_transaksi` varchar(25) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY  (`id_detail`),
  KEY `kode_transaksi` (`kode_transaksi`),
  KEY `kode_barang` (`kode_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tabel_detail_transaksi`
--

INSERT INTO `tabel_detail_transaksi` (`id_detail`, `kode_transaksi`, `kode_barang`, `jumlah_barang`, `total_harga`) VALUES
(23, 'TR8109', '3545734132354', 2, 10000),
(24, 'TR4223', '3545734132354', 2, 10000),
(25, 'TR4223', '8993988048053', 1, 5000),
(26, 'TR6102', '3434542324234', 1, 2000000),
(27, 'TR6102', '3545734132354', 1, 2500),
(29, 'TR548', '4513435452432', 1, 5000000),
(30, 'TR1696', '4513435452432', 1, 5000000),
(31, 'TR1696', '3545734132354', 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kasir`
--

CREATE TABLE IF NOT EXISTS `tabel_kasir` (
  `no_pegawai` varchar(15) NOT NULL,
  `nama_kasir` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `foto_kasir` varchar(100) NOT NULL default 'user.jpg',
  PRIMARY KEY  (`no_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kasir`
--

INSERT INTO `tabel_kasir` (`no_pegawai`, `nama_kasir`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `foto_kasir`) VALUES
('0010498037', 'Rena Senja Oktafia', 'P', 'Bandung', '2001-10-16', 'Dukuh Asem', '089677999693', 'user.jpg'),
('0012498036', 'D.Syafaatul Anbiya', 'L', 'Majalengka', '2001-05-02', 'JL.Rajawali no.312 RT 32/16 Perumahan Sindangkasih, Majalengka', '089677011289', 'dsyafaatul.jpg'),
('0012987878', 'Anna Siti Hasanah', 'P', 'Majalengka', '2001-05-31', 'Majalengka', '089767167621', 'user.jpg'),
('0013426543', 'Tia Listiyani', 'P', 'Majalengka', '2001-01-01', 'Majalengka', '080000000000', 'user.jpg'),
('0025455454', 'Robiatul Adawiah', 'P', 'Majalengka', '2001-02-05', 'Majalengka, Jalan Suha', '0895352824978', 'user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE IF NOT EXISTS `tabel_transaksi` (
  `kode_transaksi` varchar(25) NOT NULL,
  `no_pegawai` varchar(15) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` enum('yes','no') NOT NULL,
  PRIMARY KEY  (`kode_transaksi`),
  KEY `no_pegawai` (`no_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`kode_transaksi`, `no_pegawai`, `tanggal_transaksi`, `jumlah_barang`, `bayar`, `total_bayar`, `kembalian`, `status`) VALUES
('TR1696', '0025455454', '2017-12-07', 2, 5010000, 5005000, 5000, 'yes'),
('TR4223', '0010498037', '2017-11-18', 3, 15000, 15000, 0, 'yes'),
('TR548', '0012498036', '2017-12-07', 1, 5000000, 5000000, 0, 'yes'),
('TR6102', '0012987878', '2017-11-19', 2, 2005000, 2002500, 2500, 'yes'),
('TR8109', '0012498036', '2017-10-19', 3, 10000, 10000, 0, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE IF NOT EXISTS `tabel_user` (
  `id_user` int(4) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_pegawai` varchar(15) NOT NULL,
  `level` enum('Admin','Kasir') NOT NULL,
  PRIMARY KEY  (`id_user`),
  UNIQUE KEY `no_pegawai` (`no_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `username`, `password`, `no_pegawai`, `level`) VALUES
(2, 'Renasenja', 'a3b332d4506b767c216acba667d08434', '0010498037', 'Kasir'),
(4, 'anna', 'a70f9e38ff015afaa9ab0aacabee2e13', '0012987878', 'Kasir'),
(6, 'robiatul', 'b8b743a499e461922accad58fdbf25d2', '0025455454', 'Kasir'),
(7, 'tia', 'e7292d5ba58672ce7f6fc3c0b646ab63', '0013426543', 'Kasir'),
(8, 'dsyafaatul', 'da2cc0d1f467275e2b24d4c45c64ed39', '0012498036', 'Admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_detail_transaksi`
--
ALTER TABLE `tabel_detail_transaksi`
  ADD CONSTRAINT `tabel_detail_transaksi_ibfk_3` FOREIGN KEY (`kode_transaksi`) REFERENCES `tabel_transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_detail_transaksi_ibfk_4` FOREIGN KEY (`kode_barang`) REFERENCES `tabel_barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD CONSTRAINT `tabel_transaksi_ibfk_1` FOREIGN KEY (`no_pegawai`) REFERENCES `tabel_kasir` (`no_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD CONSTRAINT `tabel_user_ibfk_1` FOREIGN KEY (`no_pegawai`) REFERENCES `tabel_kasir` (`no_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2012 at 10:16 AM
-- Server version: 5.5.28
-- PHP Version: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrd2`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE IF NOT EXISTS `absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `is_present` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL,
  `cuti_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`pegawai_id`),
  KEY `id_cuti` (`cuti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `tanggal`, `keterangan`, `jam_masuk`, `jam_keluar`, `is_present`, `created`, `updated`, `pegawai_id`, `cuti_id`) VALUES
(103, '2012-12-05', 'testing ', NULL, NULL, 0, '2012-12-05 14:11:40', '2012-12-05 14:11:40', 22, 6),
(104, '2012-12-07', 'testing cuti', NULL, NULL, 0, '2012-12-05 15:17:21', '2012-12-05 15:17:21', 22, 6),
(105, '2012-12-12', 'testing', NULL, NULL, 0, '2012-12-11 09:34:20', '2012-12-11 09:34:20', 22, 7);

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE IF NOT EXISTS `bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `besar` double NOT NULL,
  `keterangan` text,
  `tanggal` date NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bonus_pegawai1` (`pegawai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`id`, `nama`, `besar`, `keterangan`, `tanggal`, `created`, `updated`, `pegawai_id`) VALUES
(10, 'test bonus', 90000, 'testing bonus', '2012-12-05', '2012-12-05 14:23:14', '2012-12-05 14:23:14', 22),
(11, 'Bonus dadakan', 1000000, 'bonus dadakan', '2012-12-11', '2012-12-11 09:17:54', '2012-12-11 09:17:54', 22),
(12, 'testing', 9000000, 'testing gan', '2012-12-12', '2012-12-11 09:43:01', '2012-12-11 09:43:01', 22);

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE IF NOT EXISTS `cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `jatah` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `nama`, `jatah`, `created`, `updated`) VALUES
(6, 'Cuti', 20, '2012-12-05 13:17:28', '2012-12-05 13:17:28'),
(7, 'Cuti Hamil', 90, '2012-12-05 13:17:55', '2012-12-05 13:17:55'),
(8, 'Sakit', 365, '2012-12-11 09:55:23', '2012-12-11 09:55:23'),
(9, 'Izin', 365, '2012-12-11 09:55:40', '2012-12-11 09:55:40'),
(10, 'Alfa (Tanpa Keterangan)', 365, '2012-12-11 09:56:04', '2012-12-11 09:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE IF NOT EXISTS `gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah_gaji` double NOT NULL,
  `jumlah_tunjangan` double NOT NULL,
  `jumlah_pajak` double NOT NULL,
  `jumlah_lembur` double NOT NULL,
  `jumlah_bonus` double NOT NULL,
  `total_gaji_bersih` double NOT NULL,
  `date` date NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`pegawai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `gaji` double NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_jabatan_jabatan1` (`jabatan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `gaji`, `created`, `updated`, `jabatan_id`) VALUES
(6, 'Direktur', 10000000, '2012-12-05 08:24:46', '2012-12-05 08:24:46', NULL),
(7, 'Senior Programmer', 5000000, '2012-12-05 09:53:14', '2012-12-11 10:00:13', 9),
(8, 'Designer', 4000000, '2012-12-05 09:53:58', '2012-12-11 09:58:47', 9),
(9, 'Project Manager', 7000000, '2012-12-11 09:58:01', '2012-12-11 10:01:20', 6),
(10, 'Junior Programmer', 4000000, '2012-12-11 10:00:35', '2012-12-11 10:00:55', 7);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE IF NOT EXISTS `keluarga` (
  `pegawai_id` int(11) NOT NULL,
  `marital_status` tinyint(1) NOT NULL DEFAULT '0',
  `jumlah_anak` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`pegawai_id`),
  KEY `fk_keluarga_pegawai1` (`pegawai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`pegawai_id`, `marital_status`, `jumlah_anak`, `created`, `updated`) VALUES
(22, 0, 0, '2012-12-05 09:41:23', '2012-12-05 12:36:36'),
(23, 0, 0, '2012-12-05 11:02:24', '2012-12-05 11:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `lembur`
--

CREATE TABLE IF NOT EXISTS `lembur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lama` int(11) NOT NULL,
  `biaya` double NOT NULL,
  `tanggal` date NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`pegawai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `lembur`
--

INSERT INTO `lembur` (`id`, `lama`, `biaya`, `tanggal`, `created`, `updated`, `pegawai_id`) VALUES
(5, 5, 90000, '2012-12-05', '2012-12-05 14:14:28', '2012-12-05 14:14:28', 22),
(6, 1, 90000, '2012-12-05', '2012-12-05 14:18:21', '2012-12-05 14:18:21', 22),
(7, 5, 90000, '2012-12-11', '2012-12-11 09:53:01', '2012-12-11 09:53:01', 22),
(8, 6, 900000, '2012-12-12', '2012-12-11 09:53:17', '2012-12-11 09:53:17', 22);

-- --------------------------------------------------------

--
-- Table structure for table `libur`
--

CREATE TABLE IF NOT EXISTS `libur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `recuring` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `libur`
--

INSERT INTO `libur` (`id`, `tanggal`, `nama`, `recuring`, `created`, `updated`) VALUES
(1, '2012-12-25', 'Natal', 1, '2012-12-07 08:36:19', '2012-12-07 08:36:19'),
(2, '2013-01-01', 'Tahun Baru', 1, '2012-12-11 09:11:05', '2012-12-11 09:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `pajak`
--

CREATE TABLE IF NOT EXISTS `pajak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `besaran` double NOT NULL,
  `min_gaji` double NOT NULL,
  `max_gaji` double NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pajak`
--

INSERT INTO `pajak` (`id`, `nama`, `besaran`, `min_gaji`, `max_gaji`, `created`, `updated`) VALUES
(1, 'Tarif pajak sesuai dengan pasal 17', 5, 0, 25000000, '2012-12-11 08:00:43', '2012-12-11 08:00:43'),
(2, 'Tarif pajak sesuai dengan pasal 17', 10, 25000000, 50000000, '2012-12-11 08:01:31', '2012-12-11 08:01:31'),
(3, 'Tarif pajak sesuai dengan pasal 17', 15, 50000000, 100000000, '2012-12-11 08:01:58', '2012-12-11 08:01:58'),
(4, 'Tarif pajak sesuai dengan pasal 17', 25, 100000000, 200000000, '2012-12-11 08:02:29', '2012-12-11 08:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text,
  `jenis_kelamin` varchar(1) NOT NULL DEFAULT 'P',
  `file_name` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `jabatan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jabatan` (`jabatan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nik`, `nama`, `alamat`, `jenis_kelamin`, `file_name`, `created`, `updated`, `jabatan_id`) VALUES
(22, '001', 'Widodo Pangestu', 'testing', '1', '818193dff18228a1e45266e239350206f46efb7a.jpg', '2012-12-05 09:41:23', '2012-12-05 12:36:36', 6),
(23, '0980980', 'kjkj', 'hkh', '1', '56d2aa35a9e923e32b260a62062e0298d897d09c.jpg', '2012-12-05 11:02:24', '2012-12-05 11:02:24', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lembaga` varchar(50) NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`pegawai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `lembaga`, `jenjang`, `tahun`, `created`, `updated`, `pegawai_id`) VALUES
(1, 'UIN Syarif Hidayatullah', 'S1', '2006', '2012-12-05 12:11:31', '2012-12-05 12:11:31', 22);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_tunjangan`
--

CREATE TABLE IF NOT EXISTS `tipe_tunjangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tipe_tunjangan`
--

INSERT INTO `tipe_tunjangan` (`id`, `nama`, `keterangan`, `created`, `updated`) VALUES
(2, 'Daily', 'Tunjangan yang diberikan harian', '2012-12-05 12:47:14', '2012-12-05 12:47:14'),
(3, 'Weekly', 'Tunjangan yang diberikan mingguan', '2012-12-05 12:47:39', '2012-12-05 12:47:39'),
(4, 'Monthly', 'Tunjangan yang diberikan bulanan', '2012-12-05 12:48:09', '2012-12-07 09:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE IF NOT EXISTS `tunjangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `tipe_tunjangan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipe_tunjangan` (`tipe_tunjangan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id`, `nama`, `keterangan`, `created`, `updated`, `tipe_tunjangan_id`) VALUES
(2, 'Biaya Transportasi', 'Biaya untuk transportasi', '2012-12-05 12:49:27', '2012-12-05 12:49:27', 2),
(3, 'Biaya Makan Siang', 'Biaya untuk makan siang', '2012-12-05 12:51:45', '2012-12-05 12:51:45', 2),
(4, 'Dana Kesejahteraan', 'Dana Kesejahteraan', '2012-12-11 10:10:45', '2012-12-11 10:10:45', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan_jabatan`
--

CREATE TABLE IF NOT EXISTS `tunjangan_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `jabatan_id` int(11) NOT NULL,
  `tunjangan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tunjangan_has_jabatan_jabatan1` (`jabatan_id`),
  KEY `fk_tunjangan_has_jabatan_tunjangan1` (`tunjangan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tunjangan_jabatan`
--

INSERT INTO `tunjangan_jabatan` (`id`, `nilai`, `created`, `updated`, `jabatan_id`, `tunjangan_id`) VALUES
(1, 10000, '2012-12-05 13:02:29', '2012-12-05 13:02:29', 6, 2),
(2, 15000, '2012-12-05 13:04:13', '2012-12-05 13:04:13', 6, 2),
(3, 90000, '2012-12-05 13:09:26', '2012-12-05 13:09:26', 6, 3),
(4, 25000, '2012-12-11 10:04:48', '2012-12-11 10:04:48', 7, 2),
(5, 15000, '2012-12-11 10:05:00', '2012-12-11 10:05:00', 7, 3),
(6, 25000, '2012-12-11 10:09:51', '2012-12-11 10:09:51', 8, 2),
(7, 15000, '2012-12-11 10:10:00', '2012-12-11 10:10:00', 8, 3),
(8, 25000, '2012-12-11 10:12:53', '2012-12-11 10:12:53', 9, 2),
(9, 15000, '2012-12-11 10:13:02', '2012-12-11 10:13:02', 9, 3),
(10, 100000, '2012-12-11 10:13:10', '2012-12-11 10:13:10', 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `lastvisit` datetime NOT NULL,
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `pegawai_id_UNIQUE` (`pegawai_id`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`),
  KEY `fk_user_pegawai1` (`pegawai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `activkey`, `lastvisit`, `superuser`, `status`, `created`, `updated`, `pegawai_id`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@hrd.com', 'ff6be47d3b1e454053c340bd2eacec90', '0000-00-00 00:00:00', 1, 1, '2012-11-30 13:45:00', '2012-11-30 14:04:59', 22),
(22, 'sdasdf', 'c441f164b1283bd56e0aa24dabb133150397df87', 'ffff@mail.cmo', '', '0000-00-00 00:00:00', 0, 1, '2012-12-05 14:37:47', '2012-12-05 14:37:47', 23);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`cuti_id`) REFERENCES `cuti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bonus`
--
ALTER TABLE `bonus`
  ADD CONSTRAINT `fk_bonus_pegawai1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `fk_jabatan_jabatan1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `fk_keluarga_pegawai1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lembur`
--
ALTER TABLE `lembur`
  ADD CONSTRAINT `lembur_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD CONSTRAINT `tunjangan_ibfk_1` FOREIGN KEY (`tipe_tunjangan_id`) REFERENCES `tipe_tunjangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tunjangan_jabatan`
--
ALTER TABLE `tunjangan_jabatan`
  ADD CONSTRAINT `fk_tunjangan_has_jabatan_jabatan1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tunjangan_has_jabatan_tunjangan1` FOREIGN KEY (`tunjangan_id`) REFERENCES `tunjangan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_pegawai1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

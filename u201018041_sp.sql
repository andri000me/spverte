
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2016 at 10:19 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u201018041_sp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciri`
--

CREATE TABLE IF NOT EXISTS `ciri` (
  `kode_ciri` varchar(4) NOT NULL,
  `nama_ciri` varchar(100) NOT NULL,
  `kode_induk_ya` varchar(4) NOT NULL,
  `kode_induk_tidak` varchar(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode_ciri`),
  KEY `kode_induk_ya` (`kode_induk_ya`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ciri`
--

INSERT INTO `ciri` (`kode_ciri`, `nama_ciri`, `kode_induk_ya`, `kode_induk_tidak`) VALUES
('G001', 'Memiliki urogenital', '', ''),
('G002', 'Memiliki cekung hidung untuk organ penciuman', 'G001', 'G006'),
('G003', 'Memiliki sudut muka rongga mata', '', 'G001'),
('G004', 'Kulitnya cenderung kering', 'G003', 'G006'),
('G005', 'Memiliki lipatan paha', '', 'G003'),
('G006', 'Memiliki anus terletak ventral dari pangkal ekor', 'G005', 'G005'),
('G007', 'Memiliki sirip dada', 'G002', 'G006'),
('G008', 'Kulit selalu basah halus terdapat butiran-butiran pigmen', '', 'G002'),
('G009', 'Terdapat cakar pada jari kaki', '', 'G008'),
('G010', 'Kulitnya berlendir', 'G007', 'G009'),
('G011', 'Badannya terdapat sisik kasar', 'G010', 'G010'),
('G012', 'Memiliki lubang telinga tertutup bulu', 'G009', 'G011'),
('G013', 'Memiliki mata besar', 'G008', 'G012'),
('G014', 'Memiliki hidung dan sepasang lubang hidung', 'G006', 'G013'),
('G015', 'Memiliki ekor meruncing ke ujung', 'G004', 'G014'),
('G016', 'Sisik berbentuk hexagonal pada seluruh badan', 'G015', 'G015'),
('G017', 'Memiliki lidah yang lebih panjang', 'G016', 'G016'),
('G018', 'Memiliki sirip ekor', 'G011', 'G017'),
('G019', 'Diatas bibir memiliki kumis peraba', 'G014', 'G018'),
('G020', 'Kaki depan memiliki 4 jari dan kaki belakang 5 jari', 'G013', 'G019'),
('G021', 'Memiliki gurat sisi', 'G018', 'G020'),
('G022', 'Seluruh badan tertutupi sisik halus', 'G017', 'G021'),
('G023', 'Alat penglihatan tidak berkelopak terletak dikedua sisi kepala berbentuk cembung dan pupil mata semp', 'G021', 'G022'),
('G024', 'Memiliki tutup insang dibawahnya terdapat insang', 'G023', 'G023'),
('G025', 'Memiliki selaput mata atau niktitan', 'G020', 'G024'),
('G026', 'Pupil mata berbentuk belah ketupat', 'G025', 'G025'),
('G027', 'Daerah perut berwarna keputihan', 'G022', 'G026'),
('G028', 'Memiliki bibir atas dan bawah', 'G019', 'G027'),
('G029', 'Memiliki paruh atas dan bawah', 'G012', 'G028'),
('G030', 'Iris berwarna keemas-emasan', 'G026', 'G029'),
('G031', 'Memiliki pupil dan iris umumnya berwarna merah', 'G029', 'G030'),
('G032', 'Memiliki lubang hidung luar', 'G030', 'G031'),
('G033', 'Memiliki bokong atau pantat', 'G028', 'G032'),
('G034', 'Memiliki sayap yang ditutupi bulu', 'G031', 'G033'),
('G035', 'Alat kelamin jantan terlihat menonjol jelas dari luar', 'G033', 'G034'),
('G036', 'Memiliki hidung diatas paruh', 'G034', 'G035'),
('G037', 'Disebelah ventralnya terdapat lubang alat kelamin', 'G035', 'G036'),
('G038', 'Bagian punggung berwarna kekuning coklat tua', 'G027', 'G037'),
('G039', 'Anus terdapat pada ujung posterior tubuh', 'G032', 'G038'),
('G040', 'Tubuhnya ditutupi rambut halus', 'G037', 'G039'),
('G041', 'Terdapat leher nyata antara caput dan truncus', 'G038', 'G040'),
('G042', 'Memiliki daun telinga kanan dan kiri', 'G040', 'G041'),
('G043', 'Kulitnya cenderung lunak', 'G039', 'G042'),
('G044', 'Seluruh badan ditutupi bulu', 'G036', 'G043'),
('G045', 'Kepala memipih tegak dan ujung anterior agak meruncing bermoncong', 'G024', 'G044'),
('G046', 'Memiliki sirip punggung', 'G045', 'G045'),
('G047', 'Anggota gerak berupa sayap', 'G044', 'G046'),
('G048', 'Memiliki puting susu', 'G042', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_pakar`
--

CREATE TABLE IF NOT EXISTS `data_pakar` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pertanyaan` varchar(50) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pakar`
--

INSERT INTO `data_pakar` (`username`, `password`, `pertanyaan`, `jawaban`) VALUES
('adminayu', '2728476ab86a3dd2cf704ce4157ed79b', 'Apa Makanan Favorit Anda?', '2728476ab86a3dd2cf704ce4157ed79b');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `usia` int(2) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `pertanyaan` varchar(50) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`),
  KEY `nama_user` (`nama_user`),
  KEY `usia` (`usia`),
  KEY `alamat` (`alamat`),
  KEY `jenis_kelamin` (`jenis_kelamin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`username`, `password`, `nama_user`, `usia`, `jenis_kelamin`, `alamat`, `pertanyaan`, `jawaban`) VALUES
('GemaAS', '0a41747da957876bfcaf34f30278923b', 'Gema Agung Setiandi', 16, 'L', 'Jl. Poltangan No.10 Pasming', 'Apa Makanan Favorit Anda?', '3dfeafc94050e02b8953d90cbdb37e52'),
('Naura', '9afc8b10cfe281cf8d49fd56fddf48a4', 'Naura Eki', 13, 'P', 'jl. gunuk jaksel', 'Siapa Nama Guru Favorit Anda?', '036851a55f5059007c6f9d8b1cf9cf27'),
('rahman', 'cb048a08d2e857f37fe9cd373cf15bac', 'Aulia Rahman', 46, 'L', 'Jl. Kapt. Muslim Medan', 'Siapa Nama Guru Favorit Anda?', 'cb048a08d2e857f37fe9cd373cf15bac');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `kode_golongan` varchar(4) NOT NULL,
  `nama_golongan` varchar(50) NOT NULL,
  `definisi` varchar(1000) NOT NULL,
  PRIMARY KEY (`kode_golongan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`kode_golongan`, `nama_golongan`, `definisi`) VALUES
('P001', 'PISCES', '<center><img src="images/golongan/ikan.png" width="400" /></center><br>Memiliki habitat di air dengan alat pernafasan berupa insang. Hewan ini mempunyai sirip yang berfungsi untuk menentukan arah gerak di dalam air dan memiliki gurat sisi untuk mengetahui tekanan air. Termasuk hewan berdarah dingin (Poikiloterm), yaitu suhu tubuh disesuaikan dengan lingkungan. Pisces berkembang biak dengan bertelur (Ovipar).\nBerdasarkan jenis tulangnya ikan dibagi menjadi 2 kelompok, yaitu :\n<li>Chondrichthyes atau ikan tulang rawan, contoh : ikan pari, ikan hiu dan ikan cucut.</li>\n<li>Osteichthyes atau ikan tulang keras, contoh : ikan mas, ikan gurami, ikan tongkol.</li>\n'),
('P002', 'AMPHIBI', '<center><img src="images/golongan/kodok.png" width="400" /></center><br>Merupakan hewan yang dapat hidup pada dua habitat, yaitu darat dan air, namun tidak semua jenis Amphibia hidup di dua tempat kehidupan. Beberapa jenis katak, salamander, dan caecilian ada yang hanya hidup di air dan ada yang hanya di darat. Namun habitatnya secara keseluruhan dekat dengan air dan tempat yang lembap seperti rawa dan hutan hujan tropis. \n<br>Hewan ini bernafas dengan insang dan paru-paru dan memiliki suhu badan Poikiloterm, berkembang biak dengan bertelur (ovipar) dan pembuahan terjadi di luar tubuh (eksternal). Contoh : katak sawah, salamander, kodok.\n '),
('P003', 'REPTILE', '<center><img src="images/golongan/buaya.png" width="400" /></center><br>Reptilia (dalam bahasa latin, reptile = melata) memiliki kulit bersisik yang terbuat dari zat tanduk (keratin). Sisik berfungsi mencegah kekeringan. ciri lain yang dimiliki oleh sebagian besar reptil adalah :  anggota tubuh berjari lima,  bernapas dengan paru-paru,  jantung beruang tiga tau empat,  menggunakan energi lingkungan untuk mengatur suhu tubuhnya sehingga tergolong hewan poikiloterm, fertilisasi secara internal, menghasilkan telur sehingga tergolong ovipar dengan telur bercangkang.\n<br>Reptilia mencakup tiga ordo besar yaitu Chelonia atau Testudines (reptilia bercangkang), Squamata atau Lepidosauria (reptilia dengan kulit bersisik) , dan Crocodilia (bangsa buaya). Bangsa kura-kura mempunyai cangkang (perisai) yang keras disebut dengan karapaks (bagian atas) dan plastron (bagian bawah). Contoh: buaya, kadal, biawak, komodo.\n'),
('P004', 'AVES', '<center><img src="images/golongan/merpati.png" width="400" /></center><br>Memiliki suhu badan Homoiterm (suhu badan tetap, tidak terpengaruh suhu lingkungan). Memiliki tubuh berbulu melindungi tubuh dan bulu yang membentuk sayap digunakan untuk terbang. Tulangnya berongga sehingga ringan. Berkembang biak secara bertelur (Ovipar) dan pembuahan di dalam tubuh. \n<br>Telur aves bercangkang dan memiliki kuning telur yang besar. Bernafas dengan paru-paru dan memiliki pundi-pundi udara yang membantu pernafasan saat terbang.\n<br>Aves meliputi burung, ayam, angsa, dan bebek (itik). Tubuh aves terdiri atas kepala, leher, badan dan ekor. Pada aves terdapat sepasang sayap yang digunakan dan berfungsi untuk terbang serta kaki yang digunakan untuk berjalan. Tungkai belakang bersisik dengan bentuk tungkai belakang dengan cakar yang bermacam-macam sesuai dengan jenis makanan dan cara hidup pada aves tersebut.'),
('P005', 'MAMALIA', '<center><img src="images/golongan/simpanse.png" width="400" /></center><br>ciri khas dari Mammalia adalah memiliki kelenjar susu. Susu dihasilkan oleh kelenjar (Mammae) yang terdapat  di daerah perut atau dada. Mammalia disebut juga hewan menyusui karena menyusui anaknya.<br>\nTubuh Mammalia tertutup oleh rambut yang berfungsi sebagai insulasi yang memperlambat pertukaran panas dengan lingkungan, segabai indera peraba antara lain pada kumis, sebagai pelindung dari gesekan maupun sinar matahari, sebagai penyamar atau pertahanan untuk melindungi dari mangsa, dan sebagai penciri kelamin. <br>\nMammalia berkembang biak dengan cara melahirkan (Vivipar). Hewan ini memiliki suhu tubuh Homoiterm (suhu tubuh tetap) dan bernafas dengan paru-paru. Mammalia memiliki otak yang lebih berkembang dibandingkan dengan hewan vertebrata yang lain. Contoh: Orangutan, simpanse, gorilla, kucing, anjing, harimau, singa, badak, zebra, kuda, kanguru, koala, musang, tikus.\n');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_identifikasi`
--

CREATE TABLE IF NOT EXISTS `hasil_identifikasi` (
  `id_identifikasi` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `kode_golongan` varchar(4) NOT NULL,
  `tanggal_identifikasi` datetime NOT NULL,
  `persentase` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_identifikasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `hasil_identifikasi`
--

INSERT INTO `hasil_identifikasi` (`id_identifikasi`, `username`, `kode_golongan`, `tanggal_identifikasi`, `persentase`) VALUES
(3, 'rahman', 'P002', '2013-09-13 19:26:53', 80),
(4, 'rahman', 'P002', '2013-09-13 19:28:23', 60),
(5, 'rahman', 'P001', '2013-09-13 19:30:04', 90),
(6, 'rahman', 'P002', '2015-02-25 14:17:48', 120),
(7, 'rahman', '', '2015-02-25 14:21:43', 0),
(8, 'rahman', 'P002', '2015-02-26 11:45:15', 120),
(9, 'rahman', 'P001', '2015-02-26 11:50:25', 105),
(10, 'rahman', 'P002', '2015-02-26 11:52:42', 100),
(11, 'rahman', 'P002', '2015-02-26 17:47:52', 120),
(12, 'rahman', 'P002', '2015-03-03 10:30:46', 80),
(13, 'rahman', 'P002', '2015-03-03 10:31:55', 120),
(14, 'rahman', 'P002', '2015-03-03 10:40:24', 120),
(15, 'rahman', 'P002', '2015-03-03 11:08:16', 60),
(16, 'Naura', 'P002', '2016-07-13 13:48:44', 100),
(17, 'Naura', '', '2016-07-13 16:13:12', 0),
(18, 'Naura', '', '2016-07-13 16:31:42', 0),
(19, 'Naura', '', '2016-07-13 16:33:00', 0),
(20, 'Naura', '', '2016-07-13 16:33:14', 0),
(21, 'Naura', '', '2016-07-13 16:33:30', 0),
(22, 'Naura', '', '2016-07-13 16:33:51', 0),
(23, 'Naura', '', '2016-07-13 16:34:08', 0),
(24, 'Naura', '', '2016-07-13 16:58:13', 0),
(25, 'Naura', '', '2016-07-13 16:58:26', 0),
(26, 'Naura', '', '2016-07-13 16:58:37', 0),
(27, 'GemaAS', 'P003', '2016-07-24 17:23:44', 26),
(28, 'GemaAS', 'P003', '2016-07-24 17:27:58', 13),
(29, 'GemaAS', '', '2016-07-24 17:33:44', 0),
(30, 'GemaAS', 'P003', '2016-07-24 17:34:14', 13),
(31, 'GemaAS', '', '2016-07-24 17:34:38', 0),
(32, 'GemaAS', 'P003', '2016-07-24 17:34:50', 26),
(33, 'GemaAS', '', '2016-07-24 17:38:32', 0),
(34, 'GemaAS', 'P003', '2016-07-24 17:38:54', 26),
(35, 'GemaAS', 'P003', '2016-07-24 18:00:56', 26),
(36, 'GemaAS', '', '2016-07-24 18:04:38', 0),
(37, 'GemaAS', 'P003', '2016-07-24 18:20:37', 26),
(38, 'GemaAS', '', '2016-07-24 18:21:02', 0),
(39, 'GemaAS', 'P003', '2016-07-24 18:23:06', 26),
(40, 'GemaAS', 'P003', '2016-07-24 18:23:20', 26),
(41, 'GemaAS', 'P003', '2016-07-25 01:10:15', 26),
(42, 'GemaAS', 'P003', '2016-07-25 02:28:55', 26),
(43, 'GemaAS', '', '2016-07-25 02:29:28', 0),
(44, 'GemaAS', 'P003', '2016-07-27 11:58:14', 26),
(45, 'GemaAS', '', '2016-07-27 11:59:06', 0),
(46, 'GemaAS', 'P003', '2016-07-31 14:56:36', 26),
(47, 'GemaAS', 'P003', '2016-07-31 15:05:49', 26),
(48, 'GemaAS', 'P003', '2016-07-31 15:33:03', 26),
(49, 'GemaAS', 'P003', '2016-07-31 16:00:04', 26),
(50, 'GemaAS', 'P003', '2016-07-31 16:11:12', 26),
(51, 'GemaAS', 'P003', '2016-07-31 20:15:13', 26),
(52, 'GemaAS', '', '2016-07-31 20:21:18', 0),
(53, 'GemaAS', 'P005', '2016-07-31 20:21:54', 20),
(54, 'GemaAS', '', '2016-07-31 21:24:57', 0),
(55, 'GemaAS', '', '2016-07-31 21:28:00', 0),
(56, 'GemaAS', '', '2016-07-31 21:28:30', 0),
(57, 'GemaAS', '', '2016-07-31 21:29:13', 0),
(58, 'GemaAS', '', '2016-07-31 21:29:55', 0),
(59, 'GemaAS', '', '2016-07-31 21:31:13', 0),
(60, 'GemaAS', '', '2016-07-31 21:32:04', 0),
(61, 'GemaAS', '', '2016-07-31 21:32:57', 0),
(62, 'GemaAS', '', '2016-07-31 21:34:29', 0),
(63, 'GemaAS', '', '2016-07-31 21:42:12', 0),
(64, 'GemaAS', '', '2016-07-31 21:42:28', 0),
(65, 'GemaAS', '', '2016-07-31 21:46:13', 0),
(66, 'GemaAS', '', '2016-07-31 22:03:04', 0),
(67, 'GemaAS', '', '2016-07-31 22:10:04', 0),
(68, 'GemaAS', '', '2016-08-15 12:26:57', 0),
(69, '', '', '2016-08-15 12:38:52', 0),
(70, '', '', '2016-08-15 12:38:54', 0),
(71, '', '', '2016-08-15 12:38:55', 0),
(72, '', '', '2016-08-15 12:38:56', 0),
(73, '', '', '2016-08-15 12:38:57', 0),
(74, '', '', '2016-08-15 12:38:58', 0),
(75, '', '', '2016-08-15 12:38:59', 0),
(76, '', '', '2016-08-15 12:39:00', 0),
(77, '', '', '2016-08-15 12:39:01', 0),
(78, '', '', '2016-08-15 12:39:03', 0),
(79, '', '', '2016-08-15 12:39:04', 0),
(80, '', '', '2016-08-15 12:39:04', 0),
(81, '', '', '2016-08-15 12:39:05', 0),
(82, '', '', '2016-08-15 12:39:06', 0),
(83, '', '', '2016-08-15 12:39:07', 0),
(84, '', '', '2016-08-15 12:39:08', 0),
(85, '', '', '2016-08-15 12:39:09', 0),
(86, '', '', '2016-08-15 12:39:10', 0),
(87, '', '', '2016-08-15 12:39:12', 0),
(88, '', '', '2016-08-15 12:39:13', 0),
(89, '', '', '2016-08-15 12:39:14', 0),
(90, '', '', '2016-08-15 12:39:15', 0),
(91, '', '', '2016-08-15 12:39:35', 0),
(92, '', '', '2016-08-15 12:39:35', 0),
(93, '', '', '2016-08-15 12:39:36', 0),
(94, '', '', '2016-08-15 12:39:38', 0),
(95, '', '', '2016-08-15 12:39:39', 0),
(96, '', '', '2016-08-15 12:39:40', 0),
(97, '', '', '2016-08-15 12:39:40', 0),
(98, '', '', '2016-08-15 12:40:48', 0),
(99, '', '', '2016-08-15 12:40:51', 0),
(100, '', '', '2016-08-15 12:40:52', 0),
(101, '', '', '2016-08-15 12:42:08', 0),
(102, '', '', '2016-08-15 12:42:09', 0),
(103, '', '', '2016-08-15 12:42:10', 0),
(104, '', '', '2016-08-15 12:42:11', 0),
(105, '', '', '2016-08-15 12:42:12', 0),
(106, '', '', '2016-08-15 12:42:13', 0),
(107, '', '', '2016-08-15 12:42:13', 0),
(108, '', '', '2016-08-15 12:42:14', 0),
(109, '', '', '2016-08-15 12:42:15', 0),
(110, '', '', '2016-08-15 12:42:16', 0),
(111, '', '', '2016-08-15 12:42:17', 0),
(112, '', '', '2016-08-15 12:42:18', 0),
(113, '', '', '2016-08-15 12:42:19', 0),
(114, '', '', '2016-08-15 12:42:20', 0),
(115, 'GemaAS', '', '2016-08-15 14:18:56', 0),
(116, 'GemaAS', '', '2016-08-15 14:26:45', 0),
(117, 'GemaAS', '', '2016-08-15 14:26:51', 0),
(118, 'GemaAS', '', '2016-08-17 07:46:42', 0),
(119, 'GemaAS', '', '2016-08-17 07:46:48', 0),
(120, 'GemaAS', '', '2016-08-17 07:46:50', 0),
(121, 'GemaAS', '', '2016-08-17 08:29:08', 0),
(122, 'GemaAS', '', '2016-08-17 08:29:31', 0),
(123, 'GemaAS', '', '2016-08-17 08:31:29', 0),
(124, 'GemaAS', '', '2016-08-17 10:41:04', 0),
(125, 'GemaAS', '', '2016-08-17 12:08:40', 0),
(126, 'GemaAS', '', '2016-08-17 22:59:41', 0),
(127, 'GemaAS', '', '2016-08-17 22:59:45', 0),
(128, 'GemaAS', '', '2016-08-17 22:59:46', 0),
(129, 'GemaAS', '', '2016-08-17 22:59:51', 0),
(130, 'GemaAS', '', '2016-08-17 23:08:35', 0),
(131, 'GemaAS', '', '2016-08-17 23:08:37', 0),
(132, 'GemaAS', '', '2016-08-17 23:08:38', 0),
(133, 'GemaAS', '', '2016-08-17 23:08:40', 0),
(134, 'GemaAS', '', '2016-08-17 23:08:41', 0),
(135, 'GemaAS', '', '2016-08-17 23:09:49', 0),
(136, 'GemaAS', '', '2016-08-17 23:57:04', 0),
(137, 'GemaAS', '', '2016-08-17 23:57:06', 0),
(138, 'GemaAS', '', '2016-08-17 23:58:16', 0),
(139, 'GemaAS', '', '2016-08-18 14:40:16', 0),
(140, 'GemaAS', '', '2016-08-18 14:40:18', 0),
(141, 'GemaAS', '', '2016-08-18 15:10:55', 0),
(142, 'GemaAS', '', '2016-08-18 15:15:55', 0),
(143, 'GemaAS', 'P001', '2016-08-18 18:02:02', 72),
(144, 'GemaAS', '', '2016-08-18 18:02:51', 0),
(145, 'GemaAS', 'P003', '2016-08-18 18:06:32', 99),
(146, 'GemaAS', '', '2016-08-18 18:07:06', 0),
(147, 'GemaAS', 'P005', '2016-08-18 18:10:01', 99),
(148, 'GemaAS', 'P002', '2016-08-18 18:14:12', 99),
(149, 'GemaAS', 'P001', '2016-08-18 18:18:43', 99),
(150, 'rahman', 'P001', '2016-08-19 16:04:12', 99),
(151, 'rahman', 'P003', '2016-08-19 17:22:16', 99),
(152, 'rahman', 'P005', '2016-08-19 17:22:59', 99),
(153, 'rahman', 'P004', '2016-08-19 17:24:08', 104),
(154, 'rahman', 'P002', '2016-08-19 17:25:13', 88),
(155, 'GemaAS', '', '2016-08-20 03:14:25', 0),
(156, 'rahman', 'P001', '2016-08-20 22:08:48', 99),
(157, 'rahman', 'P001', '2016-08-20 22:09:34', 117),
(158, 'GemaAS', 'P004', '2016-08-20 22:10:18', 104);

-- --------------------------------------------------------

--
-- Table structure for table `relasi_golongan_ciri`
--

CREATE TABLE IF NOT EXISTS `relasi_golongan_ciri` (
  `kode_golongan` varchar(4) NOT NULL,
  `kode_ciri` varchar(4) NOT NULL,
  `bobot` int(3) NOT NULL,
  KEY `kode_golongan` (`kode_golongan`),
  KEY `kode_ciri` (`kode_ciri`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi_golongan_ciri`
--

INSERT INTO `relasi_golongan_ciri` (`kode_golongan`, `kode_ciri`, `bobot`) VALUES
('P002', 'G008', 11),
('P002', 'G013', 11),
('P002', 'G020', 11),
('P002', 'G025', 12),
('P002', 'G026', 11),
('P002', 'G030', 11),
('P002', 'G032', 11),
('P002', 'G039', 11),
('P002', 'G043', 11),
('P003', 'G003', 11),
('P003', 'G004', 11),
('P003', 'G015', 12),
('P003', 'G016', 11),
('P003', 'G017', 11),
('P003', 'G022', 11),
('P003', 'G027', 11),
('P003', 'G038', 11),
('P003', 'G041', 11),
('P004', 'G009', 13),
('P004', 'G012', 12),
('P004', 'G029', 13),
('P004', 'G031', 12),
('P004', 'G034', 12),
('P004', 'G036', 12),
('P004', 'G044', 13),
('P004', 'G047', 13),
('P005', 'G005', 9),
('P005', 'G006', 9),
('P005', 'G014', 9),
('P005', 'G019', 9),
('P005', 'G028', 9),
('P005', 'G033', 9),
('P005', 'G035', 9),
('P005', 'G037', 9),
('P005', 'G040', 9),
('P005', 'G042', 9),
('P005', 'G048', 10),
('P001', 'G001', 9),
('P001', 'G002', 9),
('P001', 'G007', 9),
('P001', 'G010', 9),
('P001', 'G011', 10),
('P001', 'G018', 9),
('P001', 'G021', 9),
('P001', 'G023', 9),
('P001', 'G024', 9),
('P001', 'G045', 9),
('P001', 'G046', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE IF NOT EXISTS `tmp_analisa` (
  `username` varchar(10) NOT NULL,
  `kode_golongan` varchar(5) NOT NULL,
  `kode_ciri` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_ciri`
--

CREATE TABLE IF NOT EXISTS `tmp_ciri` (
  `username` varchar(10) NOT NULL,
  `kode_ciri` varchar(5) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_golongan`
--

CREATE TABLE IF NOT EXISTS `tmp_golongan` (
  `username` varchar(10) NOT NULL,
  `kode_golongan` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

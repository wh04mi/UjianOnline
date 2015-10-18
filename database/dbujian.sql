-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2015 at 11:46 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE IF NOT EXISTS `matkul` (
  `id` varchar(20) NOT NULL,
  `kd_mp` varchar(30) NOT NULL,
  `nama_mp` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id`, `kd_mp`, `nama_mp`) VALUES
('1', 'mp1', 'BAHASA INDONESIA'),
('2', 'mp2', 'BAHSA INGGRIS');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `Id` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `typeuser` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Id`, `nama`, `email`, `password`, `divisi`, `typeuser`) VALUES
(5, 'Adam Abdi A', 'adam.adifakenshi@gmail.com', 'adamadifa', 'IT', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mini_config`
--

CREATE TABLE IF NOT EXISTS `mini_config` (
  `id_config` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL DEFAULT '',
  `site_keyword` varchar(255) NOT NULL DEFAULT '',
  `site_description` text NOT NULL,
  `site_author` varchar(255) NOT NULL DEFAULT '',
  `site_url` varchar(255) NOT NULL DEFAULT '',
  `site_reason` varchar(100) NOT NULL DEFAULT '',
  `site_email` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mini_config`
--

INSERT INTO `mini_config` (`id_config`, `site_title`, `site_keyword`, `site_description`, `site_author`, `site_url`, `site_reason`, `site_email`) VALUES
(1, '.::LP3I Tasikmalaya Online Test::. ', '.::LP3I Tasikmalaya Online Test::. ', '.::LP3I Tasikmalaya Online Test::. ', 'LP3I Tasikmalaya', 'http://localhost/pegawai', '.::LP3I Tasikmalaya Online Test::. ', 'webmaster@localhost.com');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id` varchar(12) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `na` float NOT NULL,
  `na1` float NOT NULL,
  `na2` float NOT NULL,
  `tol` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pencacah`
--

CREATE TABLE IF NOT EXISTS `pencacah` (
  `skrip` char(65) COLLATE utf8_bin NOT NULL,
  `cacah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pencacah`
--

INSERT INTO `pencacah` (`skrip`, `cacah`) VALUES
('/pegawai/user/index.php', 5),
('/pegawai/index.php', 24),
('/pegawai/admin/index.php', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` tinyint(4) NOT NULL,
  `q` text NOT NULL,
  `question` text NOT NULL,
  `opt1` text NOT NULL,
  `opt2` text NOT NULL,
  `opt3` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tjawab`
--

CREATE TABLE IF NOT EXISTS `tjawab` (
  `nim` varchar(30) NOT NULL,
  `nilai` tinyint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tjawab`
--

INSERT INTO `tjawab` (`nim`, `nilai`) VALUES
('201426386', 64),
('201426401', 64),
('201426360', 48),
('201426379', 52),
('201426366', 52),
('201426375', 52),
('201426332', 60),
('201426373', 56),
('201426349', 56),
('201426335', 60),
('201426356', 80),
('201426357', 68),
('201426307', 48),
('201426304', 72),
('201426368', 60),
('201426355', 44),
('201426377', 60),
('201426374', 60),
('201426261', 60),
('201426378', 52),
('201426282', 64),
('201426380', 56),
('201426363', 56),
('201426345', 40),
('201426323', 52),
('201426334', 48),
('201426330', 52),
('201426333', 44),
('201426389', 52),
('201426364', 68),
('201426288', 48),
('201426342', 52),
('201426367', 52),
('201426339', 48),
('201426348', 52),
('201426283', 64),
('201426351', 60),
('201426116', 52),
('201426376', 52),
('201426402', 44),
('201426352', 48),
('201426400', 48),
('201426394', 48),
('2014263472', 44),
('201426392', 56),
('2014263666', 68),
('201426023', 48),
('201426331', 48),
('201426341', 56),
('201426358', 70),
('201426382', 72),
('201426396', 72),
('201426370', 52);

-- --------------------------------------------------------

--
-- Table structure for table `tjawab1`
--

CREATE TABLE IF NOT EXISTS `tjawab1` (
  `nim` varchar(30) NOT NULL,
  `nilai1` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tjawab1`
--

INSERT INTO `tjawab1` (`nim`, `nilai1`) VALUES
('201426386', '96'),
('201426401', '88'),
('201426373', '76'),
('201426356', '88'),
('201426357', '92'),
('201426377', '80'),
('201426349', '72'),
('201426335', '84'),
('201426378', '80'),
('201426360', '60'),
('201426366', '76'),
('201426375', '96'),
('201426332', '92'),
('201426307', '56'),
('201426379', '84'),
('201426396', '88'),
('201426400', '88'),
('201426342', '76'),
('201426304', '76'),
('201426382', '72'),
('201426368', '52'),
('201426363', '64'),
('2014263472', '28'),
('201426394', '36'),
('201426370', '68'),
('201426282', '80'),
('201426334', '36'),
('201426330', '36'),
('201426374', '76'),
('201426283', '56'),
('201426339', '32'),
('201426116', '48'),
('201426389', '68'),
('201426355', '44'),
('201426323', '80'),
('201426380', '80'),
('201426352', '76'),
('201426393', '92'),
('201426023', '92'),
('201426331', '84'),
('201426341', '88'),
('201426358', '70'),
('201426376', '54'),
('201426261', '72'),
('201426351', '72'),
('201426367', '80'),
('201426288', '60'),
('201426348', '68'),
('201426364', '80'),
('201426345', '68'),
('2014263666', '80'),
('201426392', '64'),
('201426402', '80'),
('201426333', '72');

-- --------------------------------------------------------

--
-- Table structure for table `tjawab2`
--

CREATE TABLE IF NOT EXISTS `tjawab2` (
  `nim` varchar(30) NOT NULL,
  `nilai2` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tjawab2`
--

INSERT INTO `tjawab2` (`nim`, `nilai2`) VALUES
('201426373', '40'),
('201426386', '48'),
('201426375', '32'),
('2014263472', '28'),
('201426330', '28'),
('201426334', '28'),
('201426282', '36'),
('201426355', '32'),
('201426394', '24'),
('201426370', '36'),
('201426379', '28'),
('201426345', '20'),
('201426331', '20'),
('201426023', '32'),
('201426393', '36'),
('201426392', '28'),
('2014263666', '20'),
('201426401', '55'),
('201426368', '56'),
('201426307', '60'),
('201426358', '74'),
('201426349', '52'),
('201426335', '68'),
('201426304', '78'),
('201426382', '68'),
('201426366', '60'),
('201426332', '68'),
('201426360', '54'),
('201426400', '60'),
('201426396', '84'),
('201426356', '88'),
('201426357', '88'),
('201426352', '60'),
('201426376', '60'),
('201426261', '72'),
('201426339', '56'),
('201426342', '72'),
('201426116', '60'),
('201426351', '68'),
('201426367', '68'),
('201426288', '68'),
('201426348', '68'),
('201426364', '88'),
('201426380', '84\\'),
('201426323', '84'),
('201426363', '72'),
('201426283', '72'),
('201426341', '68'),
('201426374', '76'),
('201426402', '56'),
('201426333', '56');

-- --------------------------------------------------------

--
-- Table structure for table `tsoal`
--

CREATE TABLE IF NOT EXISTS `tsoal` (
  `soalid` int(150) NOT NULL,
  `jawaban` varchar(500) NOT NULL,
  `pertanyaan` varchar(5000) NOT NULL,
  `pilihan_a` varchar(2000) NOT NULL,
  `pilihan_b` varchar(2000) NOT NULL,
  `pilihan_c` varchar(2000) NOT NULL,
  `pilihan_d` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tsoal`
--

INSERT INTO `tsoal` (`soalid`, `jawaban`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`) VALUES
(1, 'c', 'Semua donor harus berbadan sehat. Sebagian donor darah memiliki golongan darah O, jadi ...', 'Sebagian orang yang bergolongan darah O dan menjadi donor darah berbadan sehat.', 'Semua donor harus memiliki golongan darah O dan berbadan sehat.', 'Semua donor darah yang memiliki golongan darah O harus berbadan sehat.', 'Yang berbadan sehat adalah yang memiliki golongan darah O dan menjadi donor darah.'),
(2, 'a', 'Hanya jika berbakat dan bekerja keras, seorang atlet dapat sukses sebagai atlet profesional. Berikut adalah kesimpulan yang secara logis dapat ditarik dari pernyataan di atas:', 'Jika seorang atlet berbakat dan bekerja keras, maka ia akan sukses sebagai atlet profesional.', 'Jika seorang atlet tidak sukses sebagai atlet profesional, maka ia tidak berbakat.', 'Jika seorang atlet tidak sukses sebagai atlet profesional, maka ia bukan pekerja keras.', 'Jika seorang atlet tidak berbakat atau tidak bekerja keras, maka ia tidak akan sukses sebagai atlet profesional.'),
(3, 'b', 'Murid yang pandai dalam matematika lebih mudah belajar bahasa. Orang yang tinggal di negara asing lebih lancar berbicara dalam bahasa yang dipakai di negara tersebut. Tati lancar berbicara dalam bahasa Inggris. Jadi :', 'Mungkin Tati bisu.', 'Mungkin Tati tidak pernah tinggal diluar negeri.', 'Tidak mungkin Tati pernah tinggal di luar negeri.', 'mungkin Tati pandai dalam matematik.'),
(4, 'd', 'Sarjana yang lulus dengan predikat cum laude harus memiliki indeks prestasi di atas 3,5. Beberapa mahasiswa yang menjadi sarjana lulus dengan indeks prestasi di bawah 3,5. Kesimpulan pernyataan di atas adalah :', 'Semua mahasiswa tidak lulus dengan predikat cum laude.', 'Semua mahasiswa yang menjadi sarjana lulus dengan predikat cum laude.', 'Semua mahasiswa yang menjadi sarjana memiliki indeks prestasi di atas 3,5', 'Beberapa mahasiswa yang menjadi sarjana lulus dengan predikat cum laude.');

-- --------------------------------------------------------

--
-- Table structure for table `tsoal1`
--

CREATE TABLE IF NOT EXISTS `tsoal1` (
  `soalid` int(150) NOT NULL,
  `jawaban` varchar(150) NOT NULL,
  `pertanyaan` varchar(5000) NOT NULL,
  `pilihan_a` varchar(200) NOT NULL,
  `pilihan_b` varchar(200) NOT NULL,
  `pilihan_c` varchar(200) NOT NULL,
  `pilihan_d` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tsoal1`
--

INSERT INTO `tsoal1` (`soalid`, `jawaban`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`) VALUES
(1, 'b', '1,3,5,7', '8', '9', '10', '11'),
(2, 'a', 'A,C,E,G', 'I', 'J', 'K', 'L'),
(3, 'c', '3,5,8,12', '15', '16', '17', '19'),
(4, 'a', 'A,D,H,M', 'S', 'T', 'O', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `tsoal2`
--

CREATE TABLE IF NOT EXISTS `tsoal2` (
  `soalid` int(150) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `pertanyaan` varchar(2000) NOT NULL,
  `pilihan_a` varchar(50) NOT NULL,
  `pilihan_b` varchar(50) NOT NULL,
  `pilihan_c` varchar(50) NOT NULL,
  `pilihan_d` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tsoal2`
--

INSERT INTO `tsoal2` (`soalid`, `jawaban`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`) VALUES
(1, 'd', 'Amin : Hi, Rais. I wish the eartquake had not hurt your family at all. Rais : Alhamdulilllah, not a', 'it''s okay', 'I don''t care', 'How lucky you are', 'I''m sorry to hear that'),
(2, 'c', 'Andi : I never see you so nervous like this. What happened to you? Malarangeng: I have to do', 'uncertainly', 'dissatisfaction', 'incapability', 'disagreement'),
(3, 'c', 'Zein : Let''s to see Mr. Ruiffi Ronny : ... I also want to see him.', 'Oh you are right', 'I don''t think I can', 'That''s a good idea', 'I like him very much'),
(4, 'd', 'Mila : Will you go with me to the movie Tonight? Euis : I''d love to but I don''t think I can. There', 'accepting ah offer', 'stating agreement', 'asking for permission', 'refusing an Invitation');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE IF NOT EXISTS `tuser` (
  `id` int(10) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tlp` char(13) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id`, `nim`, `nama`, `kelas`, `tlp`, `password`, `tanggal`) VALUES
(9, '201126067', 'Steven Gerrard', 'Teknik Informatika', '08123456678', 'rahasia', '2014-06-14'),
(10, '201426375', 'Ilham Hamdani', 'Office Management', '085659623926', '5513', '2014-06-14'),
(11, '201426331', 'heru gunawan', 'Teknik Informatika', '085294234078', '112233', '2014-06-14'),
(12, '201426023', 'novi hendriyana', 'Teknik Informatika', '085310377339', 'novihendriyana', '2014-06-14'),
(13, '201426373', 'Sri susanti', 'Teknik Informatika', '087728116195', 'sripradja17', '2014-06-14'),
(14, '201426393', 'Ridwan Fauzi', 'Business Administration', '085323900079', '02091995', '2014-06-14'),
(15, '201426401', 'chipta adhitya rahman', 'Teknik Informatika', '089662082086', '0265maret', '2014-06-14'),
(16, '201426368', 'Muhamad Syamsan Salsabil', 'Business Administration', '08889370409', '130694', '2014-06-14'),
(17, '201426379', 'rizki muhammad fauzi', 'Teknik Otomotif', '083873591155', 'rizkifauzi', '2014-06-14'),
(18, '201426307', 'tri setiyawati', 'Office Management', '0857864255445', '18021996', '2014-06-14'),
(19, '201426386', 'Widi Nurfatwa', 'Teknik Informatika', '082128788692', 'lindialucu', '2014-06-14'),
(20, '201426358', 'Efembina sipayung', 'Teknik Informatika', '082276196548', 'efembina12', '2014-06-14'),
(21, '201426349', 'yunita ariady', 'Komputer Akuntasi', '085721174541', 'yunita789', '2014-06-14'),
(22, '201426335', 'ulfah nurmaulidiyatu sholihah', 'Komputer Akuntasi', '085294215109', '130410', '2014-06-14'),
(23, '201426304', 'PIPIH HANIPAH', 'Office Management', '08970705917', '100995', '2014-06-14'),
(24, '201426382', 'Fathan Azis', 'Business Administration', '08973970095', 'cintadamai', '2014-06-14'),
(25, '201426366', 'Silvia Wulandari', 'Komputer Akuntasi', '083827500659', 'purwaharja', '2014-06-14'),
(26, '201426332', 'Nursyamsi Agung Gumilar', 'Office Management', '085353653385', 'ujianonline', '2014-06-14'),
(27, '201426360', 'wati Rikawati', 'Teknik Informatika', '087725324702', 'rikawati', '2014-06-14'),
(28, '201426400', 'Muhamad dondon', 'Office Management', '087725476469', 'pastibisa', '2014-06-14'),
(29, '201426396', 'Apriliani Puspa Dewi', 'Office Management', '085316605870', 'rianigasbela', '2014-06-14'),
(30, '201426356', 'agung prayogo', 'Business Administration', '083827803862', 'agung', '2014-06-14'),
(31, '201426370', 'Andi Sutandi', 'Office Management', '085691931641', 'cancel', '2014-06-14'),
(33, '201426357', 'Irsan fahrul pratama', 'Office Management', '085723763747', '180396', '2014-06-14'),
(34, '201426355', 'yogi putra pradana', 'Office Management', '087826586202', 'tasik', '2014-06-14'),
(35, '201426352', 'asna gusliana', 'Office Management', '085220826400', 'bobonolan', '2014-06-14'),
(36, '201426376', 'emma rahmawati', 'Office Management', '085353255304', 'orongoh', '2014-06-14'),
(37, '201426261', 'Lela Sari', 'Komputer Akuntasi', '089672041821', 'wk407203', '2014-06-14'),
(38, '201426339', 'Ridha Fiki Rosyidah', 'Teknik Otomotif', '089650681221', 'ridha', '2014-06-14'),
(39, '201426342', 'Ujang Nanang Qosim', 'Teknik Otomotif', '085624901867', '11121994', '2014-06-14'),
(40, '201426116', 'Veni Komalasari', 'Komputer Akuntasi', '087826106885', 'venikomalasari', '2014-06-14'),
(41, '201426351', 'Ade Reni', 'Komputer Akuntasi', '081320226693', 'bismillah', '2014-06-14'),
(42, '201426367', 'irvan fauzi', 'Teknik Otomotif', '085774763904', 'kutukupret', '2014-06-14'),
(43, '201426288', 'isna nadia zulfa', 'Komputer Akuntasi', '085724222418', 'inaz07', '2014-06-14'),
(44, '201426348', 'Nisa Nur Apipah', 'Teknik Informatika', '085863866433', '02071994', '2014-06-14'),
(45, '201426364', 'Amalia Khoerunnisa', 'Komputer Akuntasi', '085798610640', 'september', '2014-06-14'),
(46, '201426380', 'asep kurniawan', 'Teknik Otomotif', '081214129084', '290195', '2014-06-14'),
(47, '201426323', 'cepi maulana', 'Teknik Informatika', '087728198143', '12345', '2014-06-14'),
(48, '201426345', 'sumarni alawiah', 'Business Administration', '085223117025', '08juni', '2014-06-14'),
(49, '201426282', 'GINA MEILINDA HASANUDIN', 'Komputer Akuntasi', '087708531151', '24112012', '2014-06-14'),
(50, '201426363', 'agustina anggita putri', 'Business Administration', '085795766241', 'putrii', '2014-06-14'),
(51, '201426283', 'Heni Handayani', 'Komputer Akuntasi', '087725794901', 'KAhenhanda', '2014-06-14'),
(52, '201426330', 'Ai Nuraeni', 'Komputer Akuntasi', '082319820219', 'Ainie', '2014-06-14'),
(53, '201426334', 'Nurratri dyah ayu retno palupi', 'Office Management', '88808366329', 'paluvi', '2014-06-14'),
(54, '201426378', 'Dewi Siti Rukoyah', 'Office Management', '087728032730', 'rukoyah', '2014-06-14'),
(55, '201426377', 'Meta Rachmanita Alamsyah', 'Komputer Akuntasi', '087708600309', 'Maret02', '2014-06-14'),
(56, '201426389', 'ulfa rahmatul umah', 'Komputer Akuntasi', '089636314807', 'rahma', '2014-06-14'),
(57, '201426333', 'Rahmat Darmawan', 'Teknik Otomotif', '081221454004', 'rahmat', '2014-06-14'),
(58, '123456', 'bini', 'Teknik Informatika', '025884110003', '123456789', '2014-06-14'),
(59, '201426402', 'Ana Rahmiati', 'Komputer Akuntasi', '083826269985', 'rahmiati', '2014-06-14'),
(67, '115566', 'adamadifa', 'Teknik Informatika', '08964907109', 'adamadifa', '2015-10-17'),
(61, '201426392', 'agung muharam', 'Teknik Otomotif', '085314423566', '17071992', '2014-06-14'),
(62, '201426374', 'Restu Nurochman', 'Teknik Informatika', '085793619850', '06011995', '2014-06-14'),
(63, '201426394', 'sopi meidina', 'Komputer Akuntasi', '082320252559', '04051995', '2014-06-14'),
(64, '2014263472', 'Frans Derian Yudha', 'Business Administration', '0265773374', 'gita gardea', '2014-06-14'),
(65, '2014263666', 'heri herdiansyah', 'Teknik Otomotif', '087826744168', '1234567', '2014-06-14'),
(66, '201426341', 'Tati Sri Maulani', 'Komputer Akuntasi', '087822912841', 'lp3i', '2014-06-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kd_mp`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `mini_config`
--
ALTER TABLE `mini_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `pencacah`
--
ALTER TABLE `pencacah`
  ADD PRIMARY KEY (`skrip`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tjawab`
--
ALTER TABLE `tjawab`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tjawab1`
--
ALTER TABLE `tjawab1`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tjawab2`
--
ALTER TABLE `tjawab2`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tsoal`
--
ALTER TABLE `tsoal`
  ADD PRIMARY KEY (`soalid`);

--
-- Indexes for table `tsoal1`
--
ALTER TABLE `tsoal1`
  ADD PRIMARY KEY (`soalid`);

--
-- Indexes for table `tsoal2`
--
ALTER TABLE `tsoal2`
  ADD PRIMARY KEY (`soalid`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mini_config`
--
ALTER TABLE `mini_config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Okt 2016 pada 04.11
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_simrt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL,
  `controller_id` varchar(50) NOT NULL,
  `action_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `action`
--

INSERT INTO `action` (`id`, `controller_id`, `action_id`, `name`) VALUES
(12, 'site', 'index', 'Index'),
(13, 'site', 'profile', 'Profile'),
(14, 'site', 'login', 'Login'),
(15, 'site', 'logout', 'Logout'),
(16, 'site', 'contact', 'Contact'),
(17, 'site', 'about', 'About'),
(18, 'menu', 'index', 'Index'),
(19, 'menu', 'view', 'View'),
(20, 'menu', 'create', 'Create'),
(21, 'menu', 'update', 'Update'),
(22, 'menu', 'delete', 'Delete'),
(23, 'role', 'index', 'Index'),
(24, 'role', 'view', 'View'),
(25, 'role', 'create', 'Create'),
(26, 'role', 'update', 'Update'),
(27, 'role', 'delete', 'Delete'),
(28, 'role', 'detail', 'Detail'),
(29, 'user', 'index', 'Index'),
(30, 'user', 'view', 'View'),
(31, 'user', 'create', 'Create'),
(32, 'user', 'update', 'Update'),
(33, 'user', 'delete', 'Delete'),
(34, 'site', 'register', 'Register'),
(35, 'menu', 'save', 'Save'),
(36, 'agama', 'index', 'Index'),
(37, 'agama', 'view', 'View'),
(38, 'agama', 'create', 'Create'),
(39, 'agama', 'update', 'Update'),
(40, 'agama', 'delete', 'Delete'),
(41, 'pengaturan', 'index', 'Index'),
(42, 'pengaturan', 'view', 'View'),
(43, 'pengaturan', 'create', 'Create'),
(44, 'pengaturan', 'update', 'Update'),
(45, 'pengaturan', 'delete', 'Delete'),
(46, 'iuran', 'index', 'Index'),
(47, 'iuran', 'view', 'View'),
(48, 'iuran', 'create', 'Create'),
(49, 'iuran', 'update', 'Update'),
(50, 'iuran', 'delete', 'Delete'),
(51, 'penduduk', 'index', 'Index'),
(52, 'penduduk', 'view', 'View'),
(53, 'penduduk', 'create', 'Create'),
(54, 'penduduk', 'update', 'Update'),
(55, 'penduduk', 'delete', 'Delete'),
(56, 'pengeluaran', 'index', 'Index'),
(57, 'pengeluaran', 'view', 'View'),
(58, 'pengeluaran', 'create', 'Create'),
(59, 'pengeluaran', 'update', 'Update'),
(60, 'pengeluaran', 'delete', 'Delete'),
(61, 'tamu', 'index', 'Index'),
(62, 'tamu', 'view', 'View'),
(63, 'tamu', 'create', 'Create'),
(64, 'tamu', 'update', 'Update'),
(65, 'tamu', 'delete', 'Delete'),
(66, 'status-perkawinan', 'index', 'Index'),
(67, 'status-perkawinan', 'view', 'View'),
(68, 'status-perkawinan', 'create', 'Create'),
(69, 'status-perkawinan', 'update', 'Update'),
(70, 'status-perkawinan', 'delete', 'Delete'),
(71, 'iuran', 'get-data', 'Get Data'),
(72, 'tamu', 'surat', 'Surat'),
(73, 'ktp', 'index', 'Index'),
(74, 'ktp', 'view', 'View'),
(75, 'ktp', 'create', 'Create'),
(76, 'ktp', 'update', 'Update'),
(77, 'ktp', 'delete', 'Delete'),
(78, 'ktp', 'findpenduduk', 'Findpenduduk'),
(79, 'ktp', 'surat', 'Surat'),
(80, 'event', 'index', 'Index'),
(81, 'event', 'view', 'View'),
(82, 'event', 'create', 'Create'),
(83, 'event', 'update', 'Update'),
(84, 'event', 'delete', 'Delete'),
(85, 'event', 'surat', 'Surat'),
(86, 'laporan-pemasukkan', 'index', 'Index'),
(87, 'laporan-pemasukkan', 'process', 'Process'),
(88, 'laporan-pemasukkan', 'export', 'Export'),
(89, 'laporan-pengeluaran', 'index', 'Index'),
(90, 'laporan-pengeluaran', 'process', 'Process'),
(91, 'laporan-pengeluaran', 'export', 'Export'),
(92, 'site', 'request', 'Request'),
(93, 'site', 'informasi', 'Informasi'),
(94, 'papan-informasi', 'index', 'Index'),
(95, 'papan-informasi', 'view', 'View'),
(96, 'papan-informasi', 'create', 'Create'),
(97, 'papan-informasi', 'update', 'Update'),
(98, 'papan-informasi', 'delete', 'Delete'),
(99, 'skck', 'index', 'Index'),
(100, 'skck', 'view', 'View'),
(101, 'skck', 'create', 'Create'),
(102, 'skck', 'update', 'Update'),
(103, 'skck', 'delete', 'Delete');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `id` int(11) NOT NULL,
  `nama_agama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Katolik'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL,
  `ditujukan` varchar(250) NOT NULL,
  `keperluan` text NOT NULL,
  `tempat` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `ditujukan`, `keperluan`, `tempat`, `tanggal`, `jam`, `user`) VALUES
(1, 'Semua Warga', 'Arisan RT', 'Rumah Bapak Yetno', '2016-09-02', '07:30:00', 1),
(2, 'Semua Warga', 'Memperingati HUT Kemerdakaan RI', 'Lapangan GOR', '2016-08-17', '23:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iuran`
--

CREATE TABLE IF NOT EXISTS `iuran` (
  `id` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `iuran`
--

INSERT INTO `iuran` (`id`, `nik`, `nama`, `nominal`, `tanggal`, `keterangan`, `user`) VALUES
(8, '3507270703870004', 'Ari Dian Setiawan', '100000', '2016-09-04', 'Iuran bulan september 2016', 1),
(9, '3502171108960003', 'Anang Wijayanto', '50000', '2016-09-11', 'Iuran bulan september 2016', 1),
(10, '3502171108960003', 'Anang Wijayanto', '50000', '2016-09-11', 'Iuran bulan september 2016', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ktp`
--

CREATE TABLE IF NOT EXISTS `ktp` (
  `id` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nik_nama` varchar(60) NOT NULL,
  `nik_tempat_lahir` varchar(50) NOT NULL,
  `nik_tanggal_lahir` date NOT NULL,
  `nik_jenis_kelamin` varchar(15) NOT NULL,
  `nik_pekerjaan` varchar(50) NOT NULL,
  `nik_agama` int(11) NOT NULL,
  `nik_status_perkawinan` int(11) NOT NULL,
  `nik_kewarganegaraan` varchar(25) NOT NULL,
  `nik_alamat` text NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ktp`
--

INSERT INTO `ktp` (`id`, `nik`, `nik_nama`, `nik_tempat_lahir`, `nik_tanggal_lahir`, `nik_jenis_kelamin`, `nik_pekerjaan`, `nik_agama`, `nik_status_perkawinan`, `nik_kewarganegaraan`, `nik_alamat`, `rt`, `rw`, `tanggal_buat`, `user`) VALUES
(1, '3502171108960001', 'Didik Tri Saputro', 'Ponorogo', '1996-08-11', 'Laki - Laki', 'Pelajar/Mahasiswa', 1, 2, 'WNI', 'Jl. Subali', '004', '004', '2016-04-12', 1),
(2, '3502171108960003', 'Anang Wijayanto', 'Ponorogo', '1993-03-06', 'Laki - Laki', 'Pegawai', 1, 2, 'WNI', 'Jl. Subali', '004', '004', '2016-03-16', 1),
(8, '3502171108960001', 'Didik Tri Saputro', 'Ponorogo', '1996-08-11', 'Laki - Laki', 'Pelajar/Mahasiswa', 1, 2, 'WNI', 'Jl. Subali', '004', '004', '2016-09-08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL DEFAULT 'index',
  `icon` varchar(50) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `name`, `controller`, `action`, `icon`, `order`, `parent_id`) VALUES
(1, 'Beranda', 'site', 'index', 'fa fa-home', 1, NULL),
(2, 'Master', '', 'index', 'fa fa-database', 17, NULL),
(3, 'Menu', 'menu', 'index', 'fa fa-circle-o', 18, 2),
(4, 'Hak Akses', 'role', 'index', 'fa fa-circle-o', 19, 2),
(5, 'Pengguna', 'user', 'index', 'fa fa-circle-o', 20, 2),
(6, 'Pengaturan', '', 'index', 'fa fa-gears', 13, NULL),
(7, 'Agama', 'agama', 'index', 'fa fa-globe', 14, 6),
(8, 'Domisili', 'pengaturan', 'index', 'fa fa-home', 15, 6),
(9, 'Iuran', 'iuran', 'index', 'fa fa-credit-card', 2, NULL),
(10, 'Data Penduduk', 'penduduk', 'index', 'fa fa-group', 12, NULL),
(11, 'Pengeluaran', 'pengeluaran', 'index', 'fa fa-location-arrow', 3, NULL),
(12, 'Pembuatan Surat', '', 'index', 'fa fa-clipboard', 4, NULL),
(13, 'Tamu', 'tamu', 'index', 'fa fa-book', 5, 12),
(14, 'Status Perkawinan', 'status-perkawinan', 'index', 'fa fa-heart', 16, 6),
(15, 'Pengantar KTP', 'ktp', 'index', 'fa fa-credit-card', 7, 12),
(16, 'Event / Acara', 'event', 'index', 'fa fa-calendar', 6, 12),
(17, 'Laporan', '', 'index', 'fa fa-list-alt', 9, NULL),
(18, 'Laporan Pemasukan', 'laporan-pemasukkan', 'index', 'fa fa-indent', 10, 17),
(19, 'Laporan Pengeluaran', 'laporan-pengeluaran', 'index', 'fa fa-outdent', 11, 17),
(20, 'Papan Informasi', 'papan-informasi', 'index', 'fa fa-info-circle', 21, NULL),
(21, 'Pengantar SKCK', 'skck', 'index', 'fa fa-copy', 8, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `papan_informasi`
--

CREATE TABLE IF NOT EXISTS `papan_informasi` (
  `id` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `caption` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `papan_informasi`
--

INSERT INTO `papan_informasi` (`id`, `gambar`, `caption`) VALUES
(1, 'qCrkwbKUognJ7d30bh_XlICAS40rngf4.jpg', 'Memperingati 1437 H. Dilakukan Penyembelihan Hewan Qurban di Masjid Nurul Qodim Pukul 06:00 WIB'),
(2, '3LUHy1li675oZUenqEjHRH3ca8r51Nyo.jpg', 'Acara Penampilan Reog untuk Memperingati HUT RI yang Ke-71 di Depan Rumah Ketua RT Pukul 15:00 WIB'),
(3, 'zAnGXBXxMgvd0LW4zD7IDvaxgOe7hfxZ.jpg', 'HUT RI Jalan Santai Pukul 06.00 WIB Hari Minggu RT.004 RW.004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE IF NOT EXISTS `penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `gol_darah` varchar(5) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kel_desa` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `agama` int(11) NOT NULL,
  `status_perkawinan` int(11) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `nik`, `nama`, `jenis_kelamin`, `gol_darah`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `rt`, `rw`, `kel_desa`, `kecamatan`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`) VALUES
(1, '3502171108960001', 'Didik Tri Saputro', 'Laki - Laki', '-', 'Ponorogo', '1996-08-11', 'Jl. Subali No. 11 A', '004', '004', 'Surodikraman', 'Ponorogo', 1, 2, 'Pelajar/Mahasiswa', 'WNI'),
(2, '3502171108960003', 'Anang Wijayanto', 'Laki - Laki', 'O', 'Ponorogo', '1993-03-06', 'Jl. Subali No. 11', '004', '004', 'Surodikraman', 'Ponorogo', 1, 2, 'Pegawai', 'WNI'),
(3, '3507270703870004', 'Ari Dian Setiawan', 'Laki - Laki', 'O', 'Malang', '1987-03-07', 'Jalan Subali 14', '004', '004', 'Surodikraman', 'Ponorogo', 1, 2, 'Swasta', 'WNI'),
(4, '3502172407970020', 'Muhammad Faisal', 'Laki - Laki', '-', 'Ponorogo', '1997-07-24', 'Jl. Subali No. 20', '004', '004', 'Surodikraman', 'Ponorogo', 1, 2, 'Pelajar/Mahasiswa', 'WNI'),
(5, '3502171901960020', 'Ichsan Prabowo', 'Laki - Laki', 'AB', 'Ponorogo', '1996-01-19', 'Jl. Subali No. 08', '004', '004', 'Surodikraman', 'Ponorogo', 1, 2, 'Pelajar/Mahasiswa', 'WNI'),
(6, '3502172302940045', 'Linda Nur Halimah', 'Perempuan', 'A', 'Surabaya', '1994-02-23', 'Jl. Subali No. 13C', '004', '004', 'Surodikraman', 'Ponorogo', 1, 2, 'Pelajar/Mahasiswa', 'WNI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id` int(11) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kel_desa` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `rt`, `rw`, `kel_desa`, `kecamatan`) VALUES
(1, '004', '004', 'Surodikraman', 'Ponorogo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id` int(11) NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `nominal`, `keperluan`, `tanggal`, `user`) VALUES
(1, '75000', 'Biaya beli mix masjid', '2016-08-23', 1),
(2, '100000', 'untuk pembelian barang', '2016-09-11', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Ketua RT'),
(2, 'Information'),
(3, 'Regular User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_action`
--

CREATE TABLE IF NOT EXISTS `role_action` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=956 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_action`
--

INSERT INTO `role_action` (`id`, `role_id`, `action_id`) VALUES
(98, 3, 12),
(99, 3, 13),
(100, 3, 14),
(101, 3, 15),
(102, 3, 16),
(103, 3, 17),
(104, 3, 18),
(105, 3, 19),
(106, 3, 20),
(107, 3, 21),
(108, 3, 22),
(109, 3, 23),
(110, 3, 24),
(111, 3, 25),
(112, 3, 26),
(113, 3, 27),
(114, 3, 28),
(115, 3, 29),
(116, 3, 30),
(117, 3, 31),
(118, 3, 32),
(119, 3, 33),
(874, 2, 12),
(875, 2, 13),
(876, 2, 14),
(877, 2, 15),
(878, 2, 16),
(879, 2, 17),
(880, 2, 94),
(881, 2, 95),
(882, 2, 96),
(883, 2, 97),
(884, 2, 98),
(885, 1, 12),
(886, 1, 13),
(887, 1, 14),
(888, 1, 15),
(889, 1, 17),
(890, 1, 18),
(891, 1, 19),
(892, 1, 20),
(893, 1, 21),
(894, 1, 22),
(895, 1, 23),
(896, 1, 24),
(897, 1, 25),
(898, 1, 26),
(899, 1, 27),
(900, 1, 28),
(901, 1, 29),
(902, 1, 30),
(903, 1, 31),
(904, 1, 32),
(905, 1, 33),
(906, 1, 36),
(907, 1, 37),
(908, 1, 38),
(909, 1, 39),
(910, 1, 40),
(911, 1, 41),
(912, 1, 42),
(913, 1, 43),
(914, 1, 44),
(915, 1, 45),
(916, 1, 66),
(917, 1, 67),
(918, 1, 68),
(919, 1, 69),
(920, 1, 70),
(921, 1, 46),
(922, 1, 47),
(923, 1, 48),
(924, 1, 49),
(925, 1, 50),
(926, 1, 51),
(927, 1, 52),
(928, 1, 53),
(929, 1, 54),
(930, 1, 55),
(931, 1, 56),
(932, 1, 57),
(933, 1, 58),
(934, 1, 59),
(935, 1, 60),
(936, 1, 61),
(937, 1, 62),
(938, 1, 63),
(939, 1, 64),
(940, 1, 65),
(941, 1, 73),
(942, 1, 74),
(943, 1, 75),
(944, 1, 76),
(945, 1, 77),
(946, 1, 78),
(947, 1, 79),
(948, 1, 99),
(949, 1, 100),
(950, 1, 101),
(951, 1, 102),
(952, 1, 103),
(953, 1, 86),
(954, 1, 87),
(955, 1, 88);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_menu`
--

CREATE TABLE IF NOT EXISTS `role_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_menu`
--

INSERT INTO `role_menu` (`id`, `role_id`, `menu_id`) VALUES
(71, 3, 1),
(72, 3, 2),
(73, 3, 3),
(74, 3, 4),
(75, 3, 5),
(267, 2, 1),
(268, 2, 20),
(269, 1, 1),
(270, 1, 3),
(271, 1, 4),
(272, 1, 5),
(273, 1, 7),
(274, 1, 8),
(275, 1, 14),
(276, 1, 9),
(277, 1, 10),
(278, 1, 11),
(279, 1, 12),
(280, 1, 13),
(281, 1, 15),
(282, 1, 21),
(283, 1, 17),
(284, 1, 18),
(285, 1, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skck`
--

CREATE TABLE IF NOT EXISTS `skck` (
  `id` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nik_nama` varchar(60) NOT NULL,
  `nik_tempat_lahir` varchar(50) NOT NULL,
  `nik_tanggal_lahir` date NOT NULL,
  `nik_jenis_kelamin` varchar(15) NOT NULL,
  `nik_pekerjaan` varchar(50) NOT NULL,
  `nik_agama` int(11) NOT NULL,
  `nik_status_perkawinan` int(11) NOT NULL,
  `nik_kewarganegaraan` varchar(25) NOT NULL,
  `nik_alamat` text NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skck`
--

INSERT INTO `skck` (`id`, `nik`, `nik_nama`, `nik_tempat_lahir`, `nik_tanggal_lahir`, `nik_jenis_kelamin`, `nik_pekerjaan`, `nik_agama`, `nik_status_perkawinan`, `nik_kewarganegaraan`, `nik_alamat`, `rt`, `rw`, `tanggal_buat`, `user`) VALUES
(1, '3502171108960001', 'Didik Tri Saputro', 'Ponorogo', '1996-08-11', 'Laki - Laki', 'Pelajar/Mahasiswa', 1, 2, 'WNI', 'Jl. Subali No. 11 A', '004', '004', '2016-09-09', 1),
(2, '3502171108960003', 'Anang Wijayanto', 'Ponorogo', '1993-03-06', 'Laki - Laki', 'Pegawai', 1, 2, 'WNI', 'Jl. Subali No. 11', '004', '004', '2016-09-09', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_perkawinan`
--

CREATE TABLE IF NOT EXISTS `status_perkawinan` (
  `id` int(11) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_perkawinan`
--

INSERT INTO `status_perkawinan` (`id`, `status_perkawinan`) VALUES
(1, 'Menikah'),
(2, 'Belum Menikah'),
(3, 'Cerai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE IF NOT EXISTS `tamu` (
  `id` int(11) NOT NULL,
  `nik_tamu` varchar(25) NOT NULL,
  `nama_tamu` varchar(60) NOT NULL,
  `dituju` int(11) NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id`, `nik_tamu`, `nama_tamu`, `dituju`, `keperluan`, `tanggal`, `user`) VALUES
(2, '983112333111', 'Aldi Satria', 1, 'Urusan Keluarga', '2016-01-01', 1),
(3, '23990101231', 'Radea Bastian', 3, 'Belajar kelompok', '2016-09-04', 1),
(4, '87199000022', 'Didik Tri Saputro', 3, 'Mengurus keperluan kantor', '2016-09-11', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `photo_url`, `last_login`, `last_logout`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Parmin S. M.pd', 1, 'default.png', '2016-09-11 12:20:54', '2016-09-11 11:10:32'),
(2, 'information', 'bb3ccd5881d651448ded1dac904054ac', 'Budi Gimin', 2, 'default.png', '2016-09-11 11:11:06', '2016-09-10 17:25:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`), ADD KEY `user` (`user`);

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id`), ADD KEY `user` (`user`), ADD KEY `nik` (`nik`);

--
-- Indexes for table `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`id`), ADD KEY `agama` (`nik_agama`), ADD KEY `status_perkawinan` (`nik_status_perkawinan`), ADD KEY `user` (`user`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`), ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `papan_informasi`
--
ALTER TABLE `papan_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`), ADD KEY `agama` (`agama`), ADD KEY `status_perkawinan` (`status_perkawinan`), ADD KEY `nik` (`nik`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`), ADD KEY `user` (`user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_action`
--
ALTER TABLE `role_action`
  ADD PRIMARY KEY (`id`), ADD KEY `role_id` (`role_id`), ADD KEY `action_id` (`action_id`);

--
-- Indexes for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`id`), ADD KEY `role_id` (`role_id`), ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `skck`
--
ALTER TABLE `skck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_perkawinan`
--
ALTER TABLE `status_perkawinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`), ADD KEY `dituju` (`dituju`), ADD KEY `user` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ktp`
--
ALTER TABLE `ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `papan_informasi`
--
ALTER TABLE `papan_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_action`
--
ALTER TABLE `role_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=956;
--
-- AUTO_INCREMENT for table `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=286;
--
-- AUTO_INCREMENT for table `skck`
--
ALTER TABLE `skck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_perkawinan`
--
ALTER TABLE `status_perkawinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `event`
--
ALTER TABLE `event`
ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `iuran`
--
ALTER TABLE `iuran`
ADD CONSTRAINT `iuran_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE NO ACTION,
ADD CONSTRAINT `iuran_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`);

--
-- Ketidakleluasaan untuk tabel `ktp`
--
ALTER TABLE `ktp`
ADD CONSTRAINT `ktp_ibfk_2` FOREIGN KEY (`nik_agama`) REFERENCES `agama` (`id`) ON DELETE NO ACTION,
ADD CONSTRAINT `ktp_ibfk_3` FOREIGN KEY (`nik_status_perkawinan`) REFERENCES `status_perkawinan` (`id`) ON DELETE NO ACTION,
ADD CONSTRAINT `ktp_ibfk_4` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
ADD CONSTRAINT `penduduk_ibfk_1` FOREIGN KEY (`agama`) REFERENCES `agama` (`id`) ON DELETE NO ACTION,
ADD CONSTRAINT `penduduk_ibfk_2` FOREIGN KEY (`status_perkawinan`) REFERENCES `status_perkawinan` (`id`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `role_action`
--
ALTER TABLE `role_action`
ADD CONSTRAINT `role_action_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
ADD CONSTRAINT `role_action_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `action` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_menu`
--
ALTER TABLE `role_menu`
ADD CONSTRAINT `role_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
ADD CONSTRAINT `role_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `tamu`
--
ALTER TABLE `tamu`
ADD CONSTRAINT `tamu_ibfk_1` FOREIGN KEY (`dituju`) REFERENCES `penduduk` (`id`) ON DELETE NO ACTION,
ADD CONSTRAINT `tamu_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

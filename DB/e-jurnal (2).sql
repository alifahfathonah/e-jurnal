-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 08:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-jurnal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id_absensi` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL COMMENT '1=diparaf\r\n0=tidak diparaf',
  `keterangan_absensi_id` int(11) DEFAULT NULL,
  `tanggal_absensi` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id_absensi`, `siswa_id`, `is_active`, `keterangan_absensi_id`, `tanggal_absensi`, `created_at`) VALUES
(5, 35, 1, 1, '05-08-2020', '2020-08-25 04:16:39'),
(6, 35, 1, 1, '06-08-2020', '2020-08-25 04:16:39'),
(7, 35, 1, 1, '07-08-2020', '2020-08-25 04:19:26'),
(8, 35, 1, 1, '08-08-2020', '2020-08-25 04:19:26'),
(9, 35, 1, 1, '09-08-2020', '2020-08-25 04:19:26'),
(10, 35, 1, 1, '10-08-2020', '2020-08-25 04:19:26'),
(11, 35, 1, 1, '11-08-2020', '2020-08-25 04:19:26'),
(12, 35, 1, 1, '12-08-2020', '2020-08-25 04:58:10'),
(13, 35, 1, 1, '13-09-2020', '2020-08-25 05:01:48'),
(14, 35, 1, 1, '14-08-2020', '2020-08-25 05:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_menu`
--

CREATE TABLE `tbl_access_menu` (
  `id_access_menu` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_access_menu`
--

INSERT INTO `tbl_access_menu` (`id_access_menu`, `role_id`, `menu_id`) VALUES
(11, 1, 1),
(15, 1, 7),
(16, 2, 2),
(17, 2, 7),
(18, 3, 3),
(19, 3, 7),
(22, 4, 4),
(23, 4, 7),
(25, 1, 5),
(26, 1, 6),
(27, 4, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bulan`
--

CREATE TABLE `tbl_bulan` (
  `id_bulan` int(11) NOT NULL,
  `no_bulan` varchar(11) NOT NULL,
  `nama_bulan` varchar(45) NOT NULL,
  `nama_bulan_english` varchar(45) NOT NULL,
  `slug_bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bulan`
--

INSERT INTO `tbl_bulan` (`id_bulan`, `no_bulan`, `nama_bulan`, `nama_bulan_english`, `slug_bulan`) VALUES
(1, '01', 'Januari', 'January', 'januari'),
(2, '02', 'Februari', 'February', 'februari'),
(3, '03', 'Maret', 'March', 'maret'),
(4, '04', 'April', 'April', 'april'),
(5, '05', 'Mei', 'May', 'mei'),
(6, '06', 'Juni', 'June', 'juni'),
(7, '07', 'Juli', 'July', 'juli'),
(8, '08', 'Agustus', 'August', 'agustus'),
(9, '09', 'September', 'September', 'september'),
(10, '10', 'Oktober', 'October', 'oktober'),
(11, '11', 'November', 'November', 'november'),
(12, '12', 'Desember', 'December', 'desember');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id_chat` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `isi_chat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(75) NOT NULL,
  `prefix_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`, `prefix_jurusan`) VALUES
(1, 'Multimedia', 'MM'),
(2, 'Rekayasa Perangkat Lunak', 'RPL'),
(3, 'Teknik Komputer Dan Jaringan', 'TKJ'),
(4, 'Teknik Elektronika Industri', 'TEKLIN'),
(5, 'Teknik Kendaraan Ringan', 'TKR'),
(6, 'Teknik Sepeda Motor', 'TSM'),
(7, 'Teknik Gambar Bangunan', 'TGB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `tanggal` varchar(45) NOT NULL,
  `jam_masuk` varchar(10) NOT NULL,
  `jam_pulang` varchar(10) NOT NULL,
  `uraian_kegiatan` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan_siswa`
--

CREATE TABLE `tbl_kegiatan_siswa` (
  `id_kegiatan_siswa` bigint(20) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  `nama_lengkap_kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `nama_lengkap_kelas`) VALUES
(4, 'XII', 'Duabelas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keterangan_absensi`
--

CREATE TABLE `tbl_keterangan_absensi` (
  `id_keterangan_absensi` int(11) NOT NULL,
  `nama_keterangan` varchar(35) DEFAULT NULL,
  `prefix_keterangan` varchar(5) NOT NULL,
  `badge_keterangan_absensi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_keterangan_absensi`
--

INSERT INTO `tbl_keterangan_absensi` (`id_keterangan_absensi`, `nama_keterangan`, `prefix_keterangan`, `badge_keterangan_absensi`) VALUES
(1, 'Hadir', 'H', '<span class=\"badge badge-primary\">H</span>'),
(2, 'Tidak Hadir', 'TH', '<span class=\"badge badge-danger\">TH</span>'),
(3, 'Libur', 'L', '<span class=\"badge badge-success\">L</span>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keterangan_penilaian`
--

CREATE TABLE `tbl_keterangan_penilaian` (
  `id_keterangan_penilaian` int(11) NOT NULL,
  `nama_keterangan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_keterangan_penilaian`
--

INSERT INTO `tbl_keterangan_penilaian` (`id_keterangan_penilaian`, `nama_keterangan`) VALUES
(1, 'Baik Sekali'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komponen_penilaian`
--

CREATE TABLE `tbl_komponen_penilaian` (
  `id_komponen_penilaian` int(11) NOT NULL,
  `nama_komponen_penilaian` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_komponen_penilaian`
--

INSERT INTO `tbl_komponen_penilaian` (`id_komponen_penilaian`, `nama_komponen_penilaian`) VALUES
(1, 'Team Work'),
(2, 'Implementasi Kerja'),
(3, 'Komunikasi'),
(4, 'Inisiatif & Kreatifitas'),
(5, 'Tanggung Jawab');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(45) DEFAULT NULL,
  `slug_menu` varchar(45) NOT NULL,
  `parent_menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `slug_menu`, `parent_menu_id`) VALUES
(1, 'ADMIN', 'admin', 0),
(2, 'PEMBIMBING', 'pembimbing', 0),
(3, 'PETUGAS', 'petugas', 0),
(4, 'SISWA', 'siswa', 0),
(5, 'TABEL DATA', 'master-data', 0),
(6, 'MANAGE MENU', 'menu-management', 0),
(7, 'USER', 'user', 0),
(13, 'JURNAL', 'jurnal', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembimbing`
--

CREATE TABLE `tbl_pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama_pembimbing` varchar(45) DEFAULT NULL,
  `no_telp_pembimbing` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian_siswa`
--

CREATE TABLE `tbl_penilaian_siswa` (
  `id_penilaian_siswa` bigint(20) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `komponen_penilaian_id` int(11) NOT NULL,
  `keterangan_penilaian_id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaan`
--

CREATE TABLE `tbl_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(75) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `nama_pimpinan` varchar(45) NOT NULL,
  `bidang_usaha` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_perusahaan`
--

INSERT INTO `tbl_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat_perusahaan`, `nama_pimpinan`, `bidang_usaha`) VALUES
(8, 'PT.INOVINDO WEB MEDIA', 'Bandung,Buahbatu', 'Novi Heriyana', 'Software House');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas_monitoring`
--

CREATE TABLE `tbl_petugas_monitoring` (
  `id_petugas_monitoring` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_petugas_monitoring` varchar(45) NOT NULL,
  `saran_petugas_monitoring` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `no_telp_petugas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_petugas_monitoring`
--

INSERT INTO `tbl_petugas_monitoring` (`id_petugas_monitoring`, `user_id`, `nama_petugas_monitoring`, `saran_petugas_monitoring`, `is_active`, `no_telp_petugas`) VALUES
(1, 26, 'Heri Heryana', 'belajar dengan baik diperusahaan nya yaaaaaa', 1, '089274827345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(45) DEFAULT NULL,
  `redirect` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `nama_role`, `redirect`) VALUES
(1, 'Admin', 'admin'),
(2, 'Pembimbing', 'pembimbing'),
(3, 'Petugas', 'petugas'),
(4, 'Siswa', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `nama_siswa` varchar(45) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `tempat_lahir` varchar(75) NOT NULL,
  `tanggal_lahir` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `nama_orang_tua` varchar(45) NOT NULL,
  `alamat_orang_tua` text NOT NULL,
  `no_telp_siswa` varchar(45) NOT NULL,
  `foto_siswa` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `user_id`, `kelas_id`, `jurusan_id`, `perusahaan_id`, `nama_siswa`, `nis`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_siswa`, `nama_orang_tua`, `alamat_orang_tua`, `no_telp_siswa`, `foto_siswa`) VALUES
(35, 34, 4, 3, NULL, 'Abdul Malik Ramdani', '01080871', 'sodong', '2001-07-08', 'Laki-laki', 'Cikeusal,Magunreja,Tasikmalaya', 'Ikhsan', 'Cikeusal', '+629092392399', ''),
(36, 27, 4, 5, NULL, 'Sendi Fajar ', '01080872', 'Tasikmalaya', '2002-08-08', 'Laki-laki', 'Bojongkoneng,Singaparna,Tasikmalaya', 'Martina', 'Bojongkoneng,Singaparna,Tasikmalaya', '+629092392392', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `id_submenu` int(11) NOT NULL,
  `nama_submenu` varchar(45) DEFAULT NULL,
  `icon_submenu` varchar(45) DEFAULT NULL,
  `url_submenu` varchar(75) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`id_submenu`, `nama_submenu`, `icon_submenu`, `url_submenu`, `menu_id`, `is_active`) VALUES
(17, 'Ubah Katasandi', 'nav-icon fas fa-lock', 'user/settings/change-password', 7, 1),
(18, 'Dashboard', 'nav-icon fas fa-tachometer-alt', 'admin', 1, 1),
(21, 'Kehadiran', 'nav-icon fas fa-calendar-check', 'siswa/kehadiran', 4, 1),
(22, 'Kegiatan', 'nav-icon fas fa-list', 'siswa/kegiatan', 4, 1),
(23, 'Data Absensi', 'nav-icon fas fa-book', 'admin/crud/tbl_absen', 5, 1),
(24, 'Data Access Menu', 'nav-icon fas fa-user-tie', 'admin/crud/tbl_access_menu', 5, 1),
(25, 'Data Admin', 'nav-icon fas fa-user-secret', 'admin/crud/tbl_admin', 5, 1),
(26, 'Data Menu', 'nav-icon fas fa-folder', 'admin/crud/tbl_menu', 5, 1),
(27, 'Data Submenu', 'nav-icon fas fa-folder-open', 'admin/crud/tbl_submenu', 5, 1),
(28, 'Data Siswa', 'nav-icon fas fa-school', 'admin/crud/tbl_siswa', 5, 1),
(29, 'Data Petugas', 'nav-icon fas fa-user-tie', 'admin/crud/tbl_petugas', 5, 1),
(30, 'Data Pembimbing', 'nav-icon fas fa-user-tie', 'admin/crud/tbl_pembimbing', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `role_id`, `username`, `email`, `password`) VALUES
(24, 1, 'imamamirulloh', 'imamamirulloh123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6'),
(25, 2, 'doniahmad', 'doniahmad123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6'),
(26, 3, 'heriheryana', 'heriheryana123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6'),
(27, 4, 'sendifajar', 'sendifajar123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6'),
(28, 1, 'admin', 'admin@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6'),
(29, 2, 'nurikhsan', 'nurukhsan123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6'),
(30, 3, 'udeusman', 'udeusman123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6'),
(31, 4, 'mIqbal', 'iqbal123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6'),
(32, 2, 'nurzaman', 'nurzaman123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6'),
(33, 3, 'fahmitaufiq', 'fahmitaufiq123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6'),
(34, 4, 'abdulmalik', 'abdulmalik123@gmail.com', '$2y$10$gUvVuiM./ZvikyY//zkn/uRwMhN2Du4GhctoND/tGRjxLWcp19Zb6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `siswa.absen_idx` (`siswa_id`),
  ADD KEY `keterangan.absen_idx` (`keterangan_absensi_id`);

--
-- Indexes for table `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `role.access_menu_idx` (`role_id`),
  ADD KEY `menu.access_menu_idx` (`menu_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `user.admin_idx` (`user_id`);

--
-- Indexes for table `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `user.chat_idx` (`user_id`),
  ADD KEY `perusahaan_id` (`perusahaan_id`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_kegiatan_siswa`
--
ALTER TABLE `tbl_kegiatan_siswa`
  ADD PRIMARY KEY (`id_kegiatan_siswa`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `kegiatan_id` (`kegiatan_id`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_keterangan_absensi`
--
ALTER TABLE `tbl_keterangan_absensi`
  ADD PRIMARY KEY (`id_keterangan_absensi`);

--
-- Indexes for table `tbl_keterangan_penilaian`
--
ALTER TABLE `tbl_keterangan_penilaian`
  ADD PRIMARY KEY (`id_keterangan_penilaian`);

--
-- Indexes for table `tbl_komponen_penilaian`
--
ALTER TABLE `tbl_komponen_penilaian`
  ADD PRIMARY KEY (`id_komponen_penilaian`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_pembimbing`
--
ALTER TABLE `tbl_pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`),
  ADD KEY `user.pembimbing_idx` (`user_id`),
  ADD KEY `perusahaan_id` (`perusahaan_id`);

--
-- Indexes for table `tbl_penilaian_siswa`
--
ALTER TABLE `tbl_penilaian_siswa`
  ADD PRIMARY KEY (`id_penilaian_siswa`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `keterangan_penilaian_id` (`keterangan_penilaian_id`),
  ADD KEY `komponen_penilaian_id` (`komponen_penilaian_id`);

--
-- Indexes for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `tbl_petugas_monitoring`
--
ALTER TABLE `tbl_petugas_monitoring`
  ADD PRIMARY KEY (`id_petugas_monitoring`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `user.siswa_idx` (`user_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `jurusan_id` (`jurusan_id`),
  ADD KEY `perusahaan_id` (`perusahaan_id`);

--
-- Indexes for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `menu.submenu_idx` (`menu_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role.user_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kegiatan_siswa`
--
ALTER TABLE `tbl_kegiatan_siswa`
  MODIFY `id_kegiatan_siswa` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_keterangan_absensi`
--
ALTER TABLE `tbl_keterangan_absensi`
  MODIFY `id_keterangan_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_keterangan_penilaian`
--
ALTER TABLE `tbl_keterangan_penilaian`
  MODIFY `id_keterangan_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_komponen_penilaian`
--
ALTER TABLE `tbl_komponen_penilaian`
  MODIFY `id_komponen_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pembimbing`
--
ALTER TABLE `tbl_pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_penilaian_siswa`
--
ALTER TABLE `tbl_penilaian_siswa`
  MODIFY `id_penilaian_siswa` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_petugas_monitoring`
--
ALTER TABLE `tbl_petugas_monitoring`
  MODIFY `id_petugas_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD CONSTRAINT `keterangan.absen` FOREIGN KEY (`keterangan_absensi_id`) REFERENCES `tbl_keterangan_absensi` (`id_keterangan_absensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa.absen` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  ADD CONSTRAINT `menu.access_menu` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role.access_menu` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `user.admin` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD CONSTRAINT `tbl_chat_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `tbl_perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user.chat` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kegiatan_siswa`
--
ALTER TABLE `tbl_kegiatan_siswa`
  ADD CONSTRAINT `tbl_kegiatan_siswa_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembimbing`
--
ALTER TABLE `tbl_pembimbing`
  ADD CONSTRAINT `tbl_pembimbing_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `tbl_perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user.pembimbing` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_penilaian_siswa`
--
ALTER TABLE `tbl_penilaian_siswa`
  ADD CONSTRAINT `tbl_penilaian_siswa_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_petugas_monitoring`
--
ALTER TABLE `tbl_petugas_monitoring`
  ADD CONSTRAINT `tbl_petugas_monitoring_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_siswa_ibfk_2` FOREIGN KEY (`jurusan_id`) REFERENCES `tbl_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_siswa_ibfk_3` FOREIGN KEY (`perusahaan_id`) REFERENCES `tbl_perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user.siswa` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD CONSTRAINT `menu.submenu` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `role.user` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2020 pada 03.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

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
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id_absensi` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL COMMENT '1=diparaf\r\n0=tidak diparaf',
  `keterangan_absensi_id` int(11) DEFAULT NULL,
  `bulan_id` int(11) NOT NULL,
  `tanggal_absensi` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_grup_absensi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_access_menu`
--

CREATE TABLE `tbl_access_menu` (
  `id_access_menu` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_access_menu`
--

INSERT INTO `tbl_access_menu` (`id_access_menu`, `role_id`, `menu_id`) VALUES
(33, 1, 1),
(34, 1, 5),
(35, 1, 6),
(36, 1, 7),
(45, 2, 2),
(46, 2, 7),
(47, 3, 3),
(48, 3, 7),
(49, 4, 4),
(50, 4, 13),
(51, 4, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `user_id`) VALUES
(2, 28),
(3, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_balasan_tugas_siswa`
--

CREATE TABLE `tbl_balasan_tugas_siswa` (
  `id_balasan_tugas_siswa` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `tugas_siswa_id` int(11) NOT NULL,
  `deskripsi_balasan_tugas` text NOT NULL,
  `nama_file_balasan_tugas` varchar(70) DEFAULT NULL,
  `tanggal_balasan_tugas_siswa` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bulan`
--

CREATE TABLE `tbl_bulan` (
  `id_bulan` int(11) NOT NULL,
  `no_bulan` varchar(11) NOT NULL,
  `nama_bulan` varchar(45) NOT NULL,
  `nama_bulan_english` varchar(45) NOT NULL,
  `slug_bulan` varchar(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `total_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_bulan`
--

INSERT INTO `tbl_bulan` (`id_bulan`, `no_bulan`, `nama_bulan`, `nama_bulan_english`, `slug_bulan`, `is_active`, `total_hari`) VALUES
(1, '01', 'Januari', 'January', 'januari', 0, 30),
(2, '02', 'Februari', 'February', 'februari', 0, 29),
(3, '03', 'Maret', 'March', 'maret', 0, 30),
(4, '04', 'April', 'April', 'april', 0, 31),
(5, '05', 'Mei', 'May', 'mei', 0, 30),
(6, '06', 'Juni', 'June', 'juni', 0, 31),
(7, '07', 'Juli', 'July', 'juli', 0, 30),
(8, '08', 'Agustus', 'August', 'agustus', 1, 31),
(9, '09', 'September', 'September', 'september', 1, 30),
(10, '10', 'Oktober', 'October', 'oktober', 1, 31),
(11, '11', 'November', 'November', 'november', 0, 30),
(12, '12', 'Desember', 'December', 'desember', 0, 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id_chat` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tugas_siswa_id` int(11) NOT NULL,
  `isi_chat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_chat`
--

INSERT INTO `tbl_chat` (`id_chat`, `user_id`, `tugas_siswa_id`, `isi_chat`, `created_at`) VALUES
(64, 41, 29, 'oke', '2020-09-05 00:32:58'),
(65, 41, 29, 'hmm', '2020-09-05 00:33:55'),
(66, 35, 29, 'o', '2020-09-06 00:40:26'),
(67, 35, 29, 'ok', '2020-09-06 00:40:35'),
(68, 35, 29, 'mm', '2020-09-06 00:50:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(75) NOT NULL,
  `prefix_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jurusan`
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
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `bulan_id` int(11) NOT NULL,
  `tanggal` varchar(45) NOT NULL,
  `jam_masuk` varchar(10) NOT NULL,
  `jam_pulang` varchar(10) NOT NULL,
  `uraian_kegiatan` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `id_grup_kegiatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan_absensi`
--

CREATE TABLE `tbl_kegiatan_absensi` (
  `id_kegiatan_absensi` int(11) NOT NULL,
  `absensi_id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `id_group_kegiatan_absensi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan_siswa`
--

CREATE TABLE `tbl_kegiatan_siswa` (
  `id_kegiatan_siswa` bigint(20) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  `nama_lengkap_kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `nama_lengkap_kelas`) VALUES
(4, 'XII', 'Duabelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keterangan_absensi`
--

CREATE TABLE `tbl_keterangan_absensi` (
  `id_keterangan_absensi` int(11) NOT NULL,
  `nama_keterangan` varchar(35) DEFAULT NULL,
  `prefix_keterangan` varchar(5) NOT NULL,
  `badge_keterangan_absensi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_keterangan_absensi`
--

INSERT INTO `tbl_keterangan_absensi` (`id_keterangan_absensi`, `nama_keterangan`, `prefix_keterangan`, `badge_keterangan_absensi`) VALUES
(1, 'Hadir', 'H', '<span class=\"badge badge-primary\">H</span>'),
(2, 'Tidak Hadir', 'TH', '<span class=\"badge badge-danger\">TH</span>'),
(3, 'Libur', 'L', '<span class=\"badge badge-success\">L</span>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keterangan_penilaian`
--

CREATE TABLE `tbl_keterangan_penilaian` (
  `id_keterangan_penilaian` int(11) NOT NULL,
  `nama_keterangan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_keterangan_penilaian`
--

INSERT INTO `tbl_keterangan_penilaian` (`id_keterangan_penilaian`, `nama_keterangan`) VALUES
(1, 'Baik Sekali'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komponen_penilaian`
--

CREATE TABLE `tbl_komponen_penilaian` (
  `id_komponen_penilaian` int(11) NOT NULL,
  `nama_komponen_penilaian` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_komponen_penilaian`
--

INSERT INTO `tbl_komponen_penilaian` (`id_komponen_penilaian`, `nama_komponen_penilaian`) VALUES
(1, 'Team Work'),
(2, 'Implementasi Kerja'),
(3, 'Komunikasi'),
(4, 'Inisiatif & Kreatifitas'),
(5, 'Tanggung Jawab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(45) DEFAULT NULL,
  `slug_menu` varchar(45) NOT NULL,
  `parent_menu_id` int(11) NOT NULL,
  `no_urut_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `slug_menu`, `parent_menu_id`, `no_urut_menu`) VALUES
(1, 'ADMIN', 'admin', 0, 1),
(2, 'PEMBIMBING', 'pembimbing', 0, 2),
(3, 'PETUGAS', 'petugas', 0, 3),
(4, 'SISWA', 'siswa', 0, 4),
(5, 'TABEL DATA', 'master-data', 0, 5),
(6, 'MANAGE MENU', 'menu-management', 0, 6),
(7, 'USER', 'user', 0, 8),
(13, 'JURNAL', 'jurnal', 4, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembimbing`
--

CREATE TABLE `tbl_pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama_pembimbing` varchar(45) DEFAULT NULL,
  `no_telp_pembimbing` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_pembimbing`
--

INSERT INTO `tbl_pembimbing` (`id_pembimbing`, `user_id`, `nip`, `nama_pembimbing`, `no_telp_pembimbing`) VALUES
(15, 40, '19218811', 'Jajang Nur Zaman', '085321540976'),
(16, 41, '19951995', 'Mang Rasmus', '085321725290');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penilaian_siswa`
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
-- Struktur dari tabel `tbl_perusahaan`
--

CREATE TABLE `tbl_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(75) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `nama_pimpinan` varchar(45) NOT NULL,
  `bidang_usaha` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_perusahaan`
--

INSERT INTO `tbl_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat_perusahaan`, `nama_pimpinan`, `bidang_usaha`) VALUES
(8, 'PT.INOVINDO WEB MEDIA', 'Bandung,Buahbatu', 'Novi Heriyana', 'Software House');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_petugas_monitoring`
--

CREATE TABLE `tbl_petugas_monitoring` (
  `id_petugas_monitoring` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_petugas_monitoring` varchar(45) NOT NULL,
  `no_telp_petugas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_petugas_monitoring`
--

INSERT INTO `tbl_petugas_monitoring` (`id_petugas_monitoring`, `user_id`, `nama_petugas_monitoring`, `no_telp_petugas`) VALUES
(1, 26, 'Heri Heryana', '089274827345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(45) DEFAULT NULL,
  `login_redirect` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `nama_role`, `login_redirect`) VALUES
(1, 'Admin', 'admin'),
(2, 'Pembimbing', 'pembimbing'),
(3, 'Petugas', 'petugas'),
(4, 'Siswa', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_saran`
--

CREATE TABLE `tbl_saran` (
  `id_saran` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `isi_saran` text NOT NULL,
  `tanggal_saran` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
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
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `user_id`, `kelas_id`, `jurusan_id`, `nama_siswa`, `nis`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_siswa`, `nama_orang_tua`, `alamat_orang_tua`, `no_telp_siswa`, `foto_siswa`) VALUES
(35, 35, 4, 3, 'Abdul Malik Ramdani', '01080871', 'sodong', '2001-07-08', 'Laki-laki', 'Cikeusal,Magunreja,Tasikmalaya', 'Ikhsan', 'Cikeusal', '+629092392399', ''),
(36, 27, 4, 5, 'Sendi Fajar ', '01080872', 'Tasikmalaya', '2002-08-08', 'Laki-laki', 'Bojongkoneng,Singaparna,Tasikmalaya', 'Martina', 'Bojongkoneng,Singaparna,Tasikmalaya', '+629092392392', ''),
(37, 36, 4, 2, 'Rahmat Hidayat', '99999999', 'Tasikmalaya', '2002-07-09', 'Laki-laki', 'Cikunten,Singaparna,Tasikmalaya', 'Euis Nurjannah', 'Cikunten,Singaparna,Tasikmalaya', '+629999999999', ''),
(38, 44, 4, 2, 'Andi Suhandi', '99998888', 'Paradise Island', '2003-09-12', 'Laki-laki', 'Paradise Island', 'Yeager', 'Paradise Island', '+62876526238723', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `id_submenu` int(11) NOT NULL,
  `nama_submenu` varchar(45) DEFAULT NULL,
  `icon_submenu` varchar(45) DEFAULT NULL,
  `url_submenu` varchar(75) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `no_urut_submenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`id_submenu`, `nama_submenu`, `icon_submenu`, `url_submenu`, `menu_id`, `is_active`, `no_urut_submenu`) VALUES
(18, 'Dashboard', 'nav-icon fas fa-tachometer-alt', 'admin', 1, 1, 1),
(23, 'Data Absensi', 'nav-icon fas fa-book', 'admin/crud/Tbl_Absen', 5, 1, 1),
(24, 'Data Access Menu', 'nav-icon fas fa-user-tie', 'admin/crud/Tbl_Access_Menu', 6, 1, 0),
(25, 'Data Admin', 'nav-icon fas fa-user-secret', 'admin/crud/Tbl_Admin', 1, 0, 0),
(26, 'Data Menu', 'nav-icon fas fa-folder', 'admin/crud/Tbl_Menu', 6, 1, 0),
(27, 'Data Submenu', 'nav-icon fas fa-folder-open', 'admin/crud/Tbl_Submenu', 6, 1, 0),
(28, 'Data Siswa', 'nav-icon fas fa-school', 'admin/crud/Tbl_Siswa', 5, 1, 0),
(29, 'Data Petugas', 'nav-icon fas fa-user-tie', 'admin/crud/Tbl_Petugas', 5, 1, 0),
(30, 'Data Pembimbing', 'nav-icon fas fa-user-tie', 'admin/crud/Tbl_Pembimbing', 5, 1, 0),
(31, 'Kehadiran', 'nav-icon fas fa-calendar-check', 'siswa/kehadiran', 13, 1, 0),
(33, 'Kegiatan', 'nav-icon fas fa-list', 'siswa/kegiatan', 13, 1, 0),
(34, 'Identitas', 'nav-icon fas fa-user', 'siswa/identitas', 4, 1, 2),
(35, 'Tugas & Materi', 'nav-icon fas fa-th', 'siswa/tugas', 4, 1, 3),
(36, 'Tugas Siswa', 'nav-icon fas fa-book', 'pembimbing/tugas-siswa', 2, 1, 4),
(37, 'Kehadiran Siswa', 'nav-icon fas fa-users', 'pembimbing/kehadiran-siswa', 2, 1, 2),
(38, 'Ubah Password', 'nav-icon fas fa-lock', 'user/change-password', 7, 1, 3),
(39, 'Kehadiran Siswa', 'nav-icon fas fa-table', 'petugas/Monitoring_Kehadiran_Siswa', 3, 1, 0),
(40, 'Saran Siswa', 'nav-icon fas fa-book', 'petugas/Saran_SIswa', 3, 1, 0),
(41, 'List Kontak', 'nav-icon fas fa-phone', 'admin/List_Kontak', 1, 1, 2),
(42, 'Bulan Aktif Prakerin', 'nav-icon fas fa-user', 'pembimbing/Bulan_Prakerin_Siswa', 2, 1, 5),
(43, 'Kegiatan Siswa', 'nav-icon fas fa-list', 'pembimbing/Kegiatan_Siswa', 2, 1, 3),
(44, 'Data User', 'nav-icon fas fa-users', 'admin/crud/Tbl_User', 5, 1, 0),
(45, 'Saran', 'nav-icon fas fa-pen', 'siswa/saran', 13, 1, 0),
(46, 'Data Role', 'nav-icon fas fa-user-tie', 'admin/crud/Tbl_Role', 5, 1, 0),
(47, 'Data Keterangan Absensi', 'nav-icon fas fa-list', 'admin/crud/Tbl_Keterangan', 5, 1, 0),
(48, 'Identitas', 'nav-icon fas fa-user', 'pembimbing/identitas', 2, 1, 6),
(49, 'Home', 'nav-icon fas fa-home', 'pembimbing', 2, 1, 1),
(50, 'Profile', 'nav-icon fas fa-user', 'user/Profile', 7, 1, 2),
(51, 'Home', 'nav-icon fas fa-home', 'user', 7, 1, 1),
(52, 'Home', 'nav-icon fas fa-home', 'siswa', 4, 1, 1),
(53, 'Contoh', 'nav-icon fas fa-list', 'contoh', 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tipe_tugas_siswa`
--

CREATE TABLE `tbl_tipe_tugas_siswa` (
  `id_tipe_tugas_siswa` int(11) NOT NULL,
  `nama_tipe_tugas` varchar(45) NOT NULL,
  `slug_tipe_tugas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tipe_tugas_siswa`
--

INSERT INTO `tbl_tipe_tugas_siswa` (`id_tipe_tugas_siswa`, `nama_tipe_tugas`, `slug_tipe_tugas`) VALUES
(1, 'Siswa', 'siswa'),
(2, 'Kelompok', 'kelompok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tugas_siswa`
--

CREATE TABLE `tbl_tugas_siswa` (
  `id_tugas` int(11) NOT NULL,
  `tipe_tugas_siswa_id` int(11) NOT NULL,
  `pembimbing_id` int(11) NOT NULL,
  `judul_tugas_siswa` varchar(255) NOT NULL,
  `deskripsi_tugas` text NOT NULL,
  `tanggal_tugas_siswa` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tugas_siswa`
--

INSERT INTO `tbl_tugas_siswa` (`id_tugas`, `tipe_tugas_siswa_id`, `pembimbing_id`, `judul_tugas_siswa`, `deskripsi_tugas`, `tanggal_tugas_siswa`, `created_at`) VALUES
(29, 1, 16, 'Membuat Crud dengan PHP Myqli', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p><s><strong><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</em></strong></s></p>\r\n', '05-09-2020', '2020-09-05 00:32:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `role_id`, `username`, `email`, `password`, `image`) VALUES
(24, 1, 'imamamirulloh', 'imamamirulloh123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6', ''),
(26, 3, 'heriheryana', 'heriheryana123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6', ''),
(27, 4, 'sendifajar', 'sendifajar123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6', ''),
(28, 1, 'admin', 'admin@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6', '74529afaf5678a87af2be2ffd71e8484.png'),
(29, 2, 'nurikhsan', 'nurukhsan123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6', ''),
(30, 3, 'udeusman', 'udeusman123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6', ''),
(31, 4, 'mIqbal', 'iqbal123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6', ''),
(32, 2, 'nurzaman', 'nurzaman123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6', ''),
(33, 3, 'fahmitaufiq', 'fahmitaufiq123@gmail.com', '$2y$10$QhRwCUhWXoWIWQjGnsy00OUk1EqU/E4qP.LLAuXbJiMa4/2p56aZ6', ''),
(35, 4, 'abdulmalik', 'abdulmalik123@gmail.com', '$2y$10$gUvVuiM./ZvikyY//zkn/uRwMhN2Du4GhctoND/tGRjxLWcp19Zb6', '53d40e962de78459e6c20c45de53a3e4.png'),
(36, 4, 'matplotlib', 'matplotlib@gmail.com', '$2y$10$slNDZgXoE8WGPusgncgZn.T8/bifF7LQVLw33JKnULGQl90XE8IZO', ''),
(37, 2, 'dandi', 'dandi123@gmail.com', '$2y$10$uil0Y9qgdq4lUfTzfr1heuVGOP7KCxmn7lqnU7iHuO/Y8PLvDuzKO', ''),
(38, 2, 'rian', 'rian123@gmail.com', '$2y$10$4H6wQLsFV0gf7WgK7fsXg.maf/5xY8PlOKYr0XKGYhvpvK329Rh.m', ''),
(39, 1, 'admin2', 'admin2@gmail.com', '$2y$10$R7ttYhOZlA9ypcYAbq29f.wmK2MHNgazt4DIxXIV6ggJpiOGaJoJu', ''),
(40, 2, 'jajang', 'jajang123@gmail.com', '$2y$10$REkF1yS3ZtbmzIDUKdZaQe6bQScAFYZ0KYGIt06cDLWoEv8ZdOimK', ''),
(41, 2, 'pembimbing1', 'pembimbing1@gmail.com', '$2y$10$qlOdmqkQF0JyMDaYy4Tt0u3J4N6hj/om3r5BFNlxDY9EHoIO05wq6', ''),
(42, 3, 'petugas1', 'petugas1@gmail.com', '$2y$10$eVDr1YSJh5FhxB.QgCBCCuZE.SjrjbJ5OxOBM8p2i89XkFaFCrz3u', ''),
(43, 4, 'nanadaime', 'nanadaime123@gmail.com', '$2y$10$YZDB/hDkcgn3IBH5P198LOiVocgbmLTYytIqTGiXGfvYhHy0dF6TW', ''),
(44, 4, 'siswa1', 'siswa1@gmail.com', '$2y$10$pxf1n3jYliTbOcqh1mlS0eQ5YNs93L1JtzqpoNg8xlpwh/HBGhI9G', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `siswa.absen_idx` (`siswa_id`),
  ADD KEY `keterangan.absen_idx` (`keterangan_absensi_id`),
  ADD KEY `bulan_id` (`bulan_id`);

--
-- Indeks untuk tabel `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `role.access_menu_idx` (`role_id`),
  ADD KEY `menu.access_menu_idx` (`menu_id`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `user.admin_idx` (`user_id`);

--
-- Indeks untuk tabel `tbl_balasan_tugas_siswa`
--
ALTER TABLE `tbl_balasan_tugas_siswa`
  ADD PRIMARY KEY (`id_balasan_tugas_siswa`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `tugas_siswa_id` (`tugas_siswa_id`);

--
-- Indeks untuk tabel `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indeks untuk tabel `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tugas_siswa_id` (`tugas_siswa_id`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `bulan_id` (`bulan_id`);

--
-- Indeks untuk tabel `tbl_kegiatan_absensi`
--
ALTER TABLE `tbl_kegiatan_absensi`
  ADD PRIMARY KEY (`id_kegiatan_absensi`),
  ADD KEY `absensi_id` (`absensi_id`),
  ADD KEY `kegiatan_id` (`kegiatan_id`);

--
-- Indeks untuk tabel `tbl_kegiatan_siswa`
--
ALTER TABLE `tbl_kegiatan_siswa`
  ADD PRIMARY KEY (`id_kegiatan_siswa`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `kegiatan_id` (`kegiatan_id`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_keterangan_absensi`
--
ALTER TABLE `tbl_keterangan_absensi`
  ADD PRIMARY KEY (`id_keterangan_absensi`);

--
-- Indeks untuk tabel `tbl_keterangan_penilaian`
--
ALTER TABLE `tbl_keterangan_penilaian`
  ADD PRIMARY KEY (`id_keterangan_penilaian`);

--
-- Indeks untuk tabel `tbl_komponen_penilaian`
--
ALTER TABLE `tbl_komponen_penilaian`
  ADD PRIMARY KEY (`id_komponen_penilaian`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_pembimbing`
--
ALTER TABLE `tbl_pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`),
  ADD KEY `user.pembimbing_idx` (`user_id`);

--
-- Indeks untuk tabel `tbl_penilaian_siswa`
--
ALTER TABLE `tbl_penilaian_siswa`
  ADD PRIMARY KEY (`id_penilaian_siswa`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `keterangan_penilaian_id` (`keterangan_penilaian_id`),
  ADD KEY `komponen_penilaian_id` (`komponen_penilaian_id`);

--
-- Indeks untuk tabel `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `tbl_petugas_monitoring`
--
ALTER TABLE `tbl_petugas_monitoring`
  ADD PRIMARY KEY (`id_petugas_monitoring`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tbl_saran`
--
ALTER TABLE `tbl_saran`
  ADD PRIMARY KEY (`id_saran`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `user.siswa_idx` (`user_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `menu.submenu_idx` (`menu_id`);

--
-- Indeks untuk tabel `tbl_tipe_tugas_siswa`
--
ALTER TABLE `tbl_tipe_tugas_siswa`
  ADD PRIMARY KEY (`id_tipe_tugas_siswa`);

--
-- Indeks untuk tabel `tbl_tugas_siswa`
--
ALTER TABLE `tbl_tugas_siswa`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `tipe_tugas_siswa_id` (`tipe_tugas_siswa_id`),
  ADD KEY `pembimbing_id` (`pembimbing_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role.user_idx` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_balasan_tugas_siswa`
--
ALTER TABLE `tbl_balasan_tugas_siswa`
  MODIFY `id_balasan_tugas_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan_absensi`
--
ALTER TABLE `tbl_kegiatan_absensi`
  MODIFY `id_kegiatan_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan_siswa`
--
ALTER TABLE `tbl_kegiatan_siswa`
  MODIFY `id_kegiatan_siswa` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_keterangan_absensi`
--
ALTER TABLE `tbl_keterangan_absensi`
  MODIFY `id_keterangan_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_keterangan_penilaian`
--
ALTER TABLE `tbl_keterangan_penilaian`
  MODIFY `id_keterangan_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_komponen_penilaian`
--
ALTER TABLE `tbl_komponen_penilaian`
  MODIFY `id_komponen_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembimbing`
--
ALTER TABLE `tbl_pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_penilaian_siswa`
--
ALTER TABLE `tbl_penilaian_siswa`
  MODIFY `id_penilaian_siswa` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_petugas_monitoring`
--
ALTER TABLE `tbl_petugas_monitoring`
  MODIFY `id_petugas_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_saran`
--
ALTER TABLE `tbl_saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tbl_tipe_tugas_siswa`
--
ALTER TABLE `tbl_tipe_tugas_siswa`
  MODIFY `id_tipe_tugas_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_tugas_siswa`
--
ALTER TABLE `tbl_tugas_siswa`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD CONSTRAINT `keterangan.absen` FOREIGN KEY (`keterangan_absensi_id`) REFERENCES `tbl_keterangan_absensi` (`id_keterangan_absensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa.absen` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_absensi_ibfk_1` FOREIGN KEY (`bulan_id`) REFERENCES `tbl_bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  ADD CONSTRAINT `menu.access_menu` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role.access_menu` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `user.admin` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_balasan_tugas_siswa`
--
ALTER TABLE `tbl_balasan_tugas_siswa`
  ADD CONSTRAINT `tbl_balasan_tugas_siswa_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_balasan_tugas_siswa_ibfk_2` FOREIGN KEY (`tugas_siswa_id`) REFERENCES `tbl_tugas_siswa` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD CONSTRAINT `tbl_chat_ibfk_2` FOREIGN KEY (`tugas_siswa_id`) REFERENCES `tbl_tugas_siswa` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_chat_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD CONSTRAINT `tbl_kegiatan_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kegiatan_ibfk_2` FOREIGN KEY (`bulan_id`) REFERENCES `tbl_bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kegiatan_absensi`
--
ALTER TABLE `tbl_kegiatan_absensi`
  ADD CONSTRAINT `tbl_kegiatan_absensi_ibfk_1` FOREIGN KEY (`kegiatan_id`) REFERENCES `tbl_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kegiatan_absensi_ibfk_2` FOREIGN KEY (`absensi_id`) REFERENCES `tbl_absensi` (`id_absensi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kegiatan_siswa`
--
ALTER TABLE `tbl_kegiatan_siswa`
  ADD CONSTRAINT `tbl_kegiatan_siswa_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pembimbing`
--
ALTER TABLE `tbl_pembimbing`
  ADD CONSTRAINT `user.pembimbing` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_penilaian_siswa`
--
ALTER TABLE `tbl_penilaian_siswa`
  ADD CONSTRAINT `tbl_penilaian_siswa_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_petugas_monitoring`
--
ALTER TABLE `tbl_petugas_monitoring`
  ADD CONSTRAINT `tbl_petugas_monitoring_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_saran`
--
ALTER TABLE `tbl_saran`
  ADD CONSTRAINT `tbl_saran_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_saran_ibfk_2` FOREIGN KEY (`petugas_id`) REFERENCES `tbl_petugas_monitoring` (`id_petugas_monitoring`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_siswa_ibfk_2` FOREIGN KEY (`jurusan_id`) REFERENCES `tbl_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user.siswa` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD CONSTRAINT `menu.submenu` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_tugas_siswa`
--
ALTER TABLE `tbl_tugas_siswa`
  ADD CONSTRAINT `tbl_tugas_siswa_ibfk_1` FOREIGN KEY (`tipe_tugas_siswa_id`) REFERENCES `tbl_tipe_tugas_siswa` (`id_tipe_tugas_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tugas_siswa_ibfk_2` FOREIGN KEY (`pembimbing_id`) REFERENCES `tbl_pembimbing` (`id_pembimbing`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `role.user` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

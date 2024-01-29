-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 02:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT '0',
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `isi` text,
  `jenis_berita` varchar(20) DEFAULT 'Berita',
  `status_berita` varchar(20) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `id_kategori`, `slug_berita`, `judul_berita`, `gambar`, `isi`, `jenis_berita`, `status_berita`, `urutan`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_post`, `tanggal_publish`, `tanggal`) VALUES
(63, 16, 10, 'prestasi-mahasiswa-universitas-bumigora-memenangkan-challenge-dicoding-dan-dirilis-koran-suara-ntb-pada-tanggal-9-juli-2019', 'Prestasi Mahasiswa Universitas Bumigora Memenangkan Challenge Dicoding Dan Dirilis Koran Suara NTB Pada Tanggal 9 Juli 2019', 'screenshot-2024-01-26-152020-1706257270.png', NULL, 'Berita', 'Publish', 1, NULL, NULL, '2024-01-26 08:21:11', '2024-01-26 00:00:00', '2024-01-26 08:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_user`, `nama`, `email`, `comment`, `tanggal`) VALUES
(22, 15, 'penandatanganan-kontrak-hibah-penelitian-pengabdian-kepada-masyarakat-universitas-bumigora-2023', NULL, '', '2023-11-10 00:27:11'),
(29, 15, 'no-virtual-accounts-untuk-mahasiswa-tahun-akademik-20232024-semester-ganjil', NULL, '', '2023-11-10 08:59:52'),
(30, 15, 'asesmen-lapangan-program-studi-ilmu-komputer-universitas-bumigora-2023', NULL, '', '2023-11-10 06:48:18'),
(31, 15, 'assalam', NULL, '', '2023-11-10 06:49:11'),
(53, 16, 'asesmen-lapangan-program-studi-ilmu-komputer-universitas-bumigora-2023', 'Berita', 'Publish', '2024-01-18 01:08:18'),
(60, 16, 'no-virtual-accounts-untuk-mahasiswa-tahun-akademik-20232024-semester-ganjil', 'Berita', 'Publish', '2024-01-18 01:07:52'),
(62, 16, 'penandatanganan-kontrak-hibah-penelitiann-pengabdian-kepada-masyarakat-universitas-bumigora-2023', 'Berita', 'Publish', '2024-01-18 01:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_staff`
--

CREATE TABLE `dosen_staff` (
  `id_staff` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `slug_staff` varchar(255) NOT NULL,
  `nama_staff` varchar(255) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `status_staff` varchar(20) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_staff`
--

INSERT INTO `dosen_staff` (`id_staff`, `id_user`, `slug_staff`, `nama_staff`, `nik`, `gambar`, `status_staff`, `urutan`, `tanggal`) VALUES
(1, 16, 'prof-dr-muhammad-tajuddin-msi', 'Prof. Dr. Muhammad Tajuddin M.Si', '196011221995011001', 'screenshot-2024-01-26-153828-1706283876.png', 'Ya', 1, '2024-01-26 15:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id_download` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_download` varchar(100) DEFAULT NULL,
  `nama_download` varchar(100) NOT NULL,
  `file` varchar(200) NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `id_user`, `judul_download`, `nama_download`, `file`, `hits`, `urutan`, `tanggal`) VALUES
(54, 16, 'Download', 'Pedoman Penulisan Laporan KKP/Magang', 'surat-pernyataan-tidak-menerima-beasiswa-1702678508.pdf', 0, 3, '2024-01-20 02:53:39'),
(55, 16, 'Download', 'Pedoman Penulisan Skripsi', 'form-berita-acara-1702621529-9-1705719192.pdf', 0, 2, '2024-01-20 02:53:53'),
(56, 16, 'Download', 'Pedoman Pengajuan Sinopsis', 'virtual-account-akuntansi-genap-2324-1705719146.pdf', 4, 1, '2024-01-20 03:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_galeri` varchar(200) DEFAULT NULL,
  `motto` varchar(200) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `status_text` enum('Ya','Tidak','','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_user`, `judul_galeri`, `motto`, `isi`, `gambar`, `urutan`, `status_text`, `tanggal`) VALUES
(16, 16, 'Universitas Bumigora', 'YOUR GATEWAY TO BE EXCELENT STUDENT', 'Univeristas Bumigora memiliki program studi unggulan,staf pengajar yang berkualifikasi dan terdidik dengan baik, ruang kelas yang cerah dan nyaman, konseling dan bimbingan mahasiswa yang berkesinambungan, dan staf pendukung siswa yang sangat efektif dan antusias.', 'whatsapp-image-2023-02-14-at-163247-1-1702523007.jpeg', 1, 'Tidak', '2024-01-05 07:27:10'),
(19, 16, 'Ini Pilihan Terbaik Anda', 'Mari membangun masa depan', 'Kami terus berupaya untuk memaksimalkan program studi kami. Dengan Program Sarjana, Sertifikat profesional', 'whatsapp-image-2023-12-14-at-153339-1702543273.jpeg', NULL, 'Ya', '2023-12-14 08:41:13'),
(22, 16, 'Bersama & Selamanya', 'Mari membangun masa depan', 'salah satu tugas kami adalah untuk menginspirasi mahasiswa kami tidak hanya hebat secara intelektual tapi juga paham dengan nilai-nilai spiritual, melalui partisipasi dalam aktifitas keorganisasian', 'whatsapp-image-2023-02-14-at-163247-1702531919.jpeg', 3, 'Tidak', '2024-01-05 07:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_user`, `bahasa`, `slug_kategori`, `nama_kategori`, `urutan`, `hits`, `tanggal`) VALUES
(10, 16, 'ID', 'berita', 'Berita', 1, NULL, '2023-12-15 23:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_download`
--

CREATE TABLE `kategori_download` (
  `id_kategori_download` int(11) NOT NULL,
  `slug_kategori_download` varchar(255) NOT NULL,
  `nama_kategori_download` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_download`
--

INSERT INTO `kategori_download` (`id_kategori_download`, `slug_kategori_download`, `nama_kategori_download`, `urutan`) VALUES
(2, 'akademik', 'Akademik', 1),
(3, 'administrasi-umum', 'Administrasi Umum', 2),
(4, 'pustik', 'Pustik', 3),
(5, 'beasiswa-ppa', 'Beasiswa PPA', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_galeri`
--

CREATE TABLE `kategori_galeri` (
  `id_kategori_galeri` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori_galeri` varchar(255) NOT NULL,
  `nama_kategori_galeri` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_galeri`
--

INSERT INTO `kategori_galeri` (`id_kategori_galeri`, `bahasa`, `slug_kategori_galeri`, `nama_kategori_galeri`, `urutan`) VALUES
(4, 'ID', 'kegiatan', 'Kegiatan', 2),
(6, 'ID', 'kegiatan-kampus', 'Kegiatan Kampus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pengumuman`
--

CREATE TABLE `kategori_pengumuman` (
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_pengumuman`
--

INSERT INTO `kategori_pengumuman` (`id_kategori`, `id_user`, `bahasa`, `slug_kategori`, `nama_kategori`, `urutan`, `hits`, `tanggal`) VALUES
(11, 16, 'ID', 'pengumuman', 'Pengumuman', 1, NULL, '2023-12-15 23:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_profil`
--

CREATE TABLE `kategori_profil` (
  `id_kategori_profil` int(11) NOT NULL,
  `slug_kategori_profil` varchar(255) NOT NULL,
  `nama_kategori_profil` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_profil`
--

INSERT INTO `kategori_profil` (`id_kategori_profil`, `slug_kategori_profil`, `nama_kategori_profil`, `urutan`) VALUES
(11, 'visi-misi', 'Visi & Misi', 2),
(12, 'tentang-prodi', 'Tentang Prodi', 3),
(13, 'fasilitas-penunjang', 'Fasilitas Penunjang', 4),
(15, 'struktur-organisasi', 'Struktur Organisasi', 6),
(17, 'sejarah', 'Sejarah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_skripsi`
--

CREATE TABLE `kategori_skripsi` (
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_skripsi`
--

INSERT INTO `kategori_skripsi` (`id_kategori`, `id_user`, `bahasa`, `slug_kategori`, `nama_kategori`, `urutan`, `hits`, `tanggal`) VALUES
(11, 16, 'ID', 'skripsi', 'Skripsi', 1, NULL, '2024-01-18 07:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `namaweb` varchar(200) NOT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text,
  `jam_pelayanan` varchar(50) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website_color` varchar(30) DEFAULT NULL,
  `singkatan` varchar(255) NOT NULL,
  `tentang` text,
  `periode_satu` varchar(100) DEFAULT NULL,
  `periode_dua` varchar(100) DEFAULT NULL,
  `periode_tiga` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `bahasa`, `namaweb`, `tagline`, `email`, `alamat`, `jam_pelayanan`, `telepon`, `icon`, `logo`, `website_color`, `singkatan`, `tentang`, `periode_satu`, `periode_dua`, `periode_tiga`, `id_user`, `tanggal`) VALUES
(1, 'ID', 'Ilmu Komputer', 'home 2', 'kontak@universitasbumigora.ac.id', 'Jl. Ismail Marzuki, Cilinaya,\r\n Cakranegara, Kota Mataram, \r\nNusa Tenggara Bar. 83127, Indonesia', '08:00-17:00 WITA', '085715100485', 'logo-ubg.png', 'logo.png', '#2196ef', 'Ilkom', 'enjang Strata Satu (S1) IlKom Universitas Bumigora adalah program yang dirancang agar para lulusanya nanti memiliki kemampuan atau kompetensi untuk memformulakan masalah yang berkaitan dengan informatika, kemampuan teknis mengaplikasikan konsep atau teori dalam disain dan analisa sistem, memilih dan menggunakan teknik pemrograman dan perangkat lunak aplikasi yang sesuai. Program studi S1 Ilkom memiliki kurikulum berbasis kompetensi yang akan menghasilkan lulusan yang memiliki salah satu dari 2 kompetensi berikut , yaitu kompetensi Sistem Cerdas dan Jaringan dan Sistem Terdistribusi', 'Periode 1 :09 Desember 2022 s.d 28 Februari 2023', 'Periode 2 :1 Maret 2023 s.d 31 Agustus 2023', 'Periode 3 :Ditutup jika quota telah memenuhi', 16, '2024-01-29 00:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nama_pengajar`
--

CREATE TABLE `nama_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `nidn` varchar(100) DEFAULT NULL,
  `nik_nip` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nama_pengajar`
--

INSERT INTO `nama_pengajar` (`id_pengajar`, `id_user`, `nama`, `nidn`, `nik_nip`, `created_at`, `update_at`) VALUES
(1, 16, 'Prof. Dr. Muhammad Tajuddin M.Si', '0022116005', '196011221995011001', '2024-01-29 01:21:05', '2024-01-29 01:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT '0',
  `slug_pengumuman` varchar(255) NOT NULL,
  `judul_pengumuman` varchar(255) NOT NULL,
  `file` varchar(225) DEFAULT NULL,
  `isi` text,
  `jenis_pengumuman` varchar(20) DEFAULT 'Berita',
  `urutan` int(11) DEFAULT NULL,
  `status_pengumuman` varchar(20) DEFAULT NULL,
  `like` varchar(10) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_user`, `id_kategori`, `slug_pengumuman`, `judul_pengumuman`, `file`, `isi`, `jenis_pengumuman`, `urutan`, `status_pengumuman`, `like`, `hits`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_post`, `tanggal_publish`, `tanggal`) VALUES
(33, 16, 11, 'pengumuman-pembayaran-skripsi', 'Pengumuman Pembayaran Skripsi', 'pengumuman-pembayaran-skripsi-1706257736.pdf', NULL, 'pengumuman', 1, 'Publish', NULL, NULL, NULL, NULL, '2024-01-26 08:28:02', '2024-01-26 00:00:00', '2024-01-26 08:28:56'),
(34, 16, 11, 'pengumuman-batas-pemberian-kkp', 'Pengumuman Batas Pemberian KKP', 'batas-pemberian-nilai-kkp-1706257896.pdf', NULL, 'pengumuman', 2, 'Publish', NULL, NULL, NULL, NULL, '2024-01-26 08:30:43', '2024-01-26 00:00:00', '2024-01-26 08:31:36'),
(35, 16, 11, 'pengumuman-perpanjangan-pengumpulan-berkas-maju-seminar-skripsi', 'Pengumuman Perpanjangan Pengumpulan Berkas Maju seminar Skripsi', 'pengumuman-perpanjangan-1706257970.pdf', NULL, 'pengumuman', NULL, 'Publish', NULL, NULL, NULL, NULL, '2024-01-26 08:32:12', '2024-01-26 00:00:00', '2024-01-26 08:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `id_kategori_profil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `id_kategori_profil`, `id_user`, `isi`, `urutan`, `tanggal`) VALUES
(10, 17, 16, '<p><strong><span style=\"color:#2c3e50\"><span style=\"font-size:48px\">B</span></span></strong>erdirinya Perguruan Tinggi Komputer dengan nama Sekolah Tinggi Teknologi Komputer Bumigora (STTK Bumigora) di bawah naungan &ldquo;Yayasan Pendidikan Eksekutip Komputer &rdquo; dengan Akta Notaris Nomor : 39 tanggal 26 September 1987 dihadapan Notaris Abdullah, SH. Gagasan untuk mendirikan Perguruan Tinggi tersebut sesungguhnya telah dirintis sejak tahun 1987, namun karena ada kebijaksanaan baru mengenai Pendidikan Perguruan Tinggi Swasta (PTS) oleh Dirjen Dikti No. 2834/D/T/1987 tanggal 26 September 1987 dan Nomor : 086a/D/T 88 tanggal 16 Januari 1988, rencana tersebut tertunda dan baru dapat diwujudkan dalam tahun akademik 1989/1990 atas dasar :</p>\r\n\r\n<ul>\r\n	<li>Surat Petunjuk dari Kopertis Wilayah VIII, Nomor : 117/Kop.8/N/1989 tanggal 11 Mei 1989 perihal Pendirian PTS Baru.</li>\r\n	<li>Rekomendasi Gubernur Kepala daerah Tingkat I Propinsi NTB Nomor : 421.4/873/008 tanggal 15 Juni 1989</li>\r\n	<li>Rekomendasi Bupati Kepala daerah Tingkat II Lombok Barat Nomor : 425.12/563 tanggal 26 Juni 1989</li>\r\n</ul>\r\n\r\n<p>Keberadaan lembaga pendidikan UNIVERSITASBumigora tersebut kemudian semakin dimantapkan lagi dengan dikeluarkannya surat keputusan menteri pendidikan dan kebudayaan melalui Koordinator Perguruan tinggi swasta (KOPERTIS) Wilayah VIII yang memberi status terdaftar untuk jenjang studi Strata 0 (S0) program studi Diploma tiga (D3) Manajemen Informatika, berdasar surat keputusan nomor</p>\r\n\r\n<p>0390/O/1991 tertanggal 22 Juni 1991 sekaligus merubah nama Sekolah Tinggi Teknologi Komputer (STTK) menjadi Sekolah Tinggi Manajemen Informatika dan Komputer (STMIK) Bumigora Mataram. Beberapa waktu kemudian, yaitu tanggal 8 Januari 1992 dengan surat keputusan nomor 026/O/1992, program diploma tiga (D3) Teknik Informatika mendapat status Terdaftar.</p>\r\n\r\n<p>Memperhatikan sistem pengelolaan kedua program studi tersebut dinilai cukup baik, UNIVERSITASBumigora diperkenankan pula untuk menyelenggarakan jenjang studi Strata Satu (S1) program studi Teknik Informatika dengan status Terdaftar berdasarkan surat keputusan nomor 608/DIKTI/EP/1993 tertanggal 23 Nopember 1993.</p>\r\n\r\n<p>Berdasarkan Surat Keputusan No. 1267/KPT/I/2018 tanggal 31 Desember 2018, UNIVERSITASBumigora dan STIBA Bumigora melebur menjadi Universitas Bumigora.</p>', 1, '2024-01-05 07:59:35'),
(11, 11, 16, '<h3><span style=\"color:#2c3e50\"><u>VISI</u></span></h3>\r\n\r\n<p>Menjadi Program Studi S1 Ilmu Komputer yang memiliki unggulan dalam implementasi di bidang Sistem Cerdas, Jaringan dan Sistem terdistribusi di Kawasan Timur Indonesia dengan jejaring Nasional tahun 2039.</p>\r\n\r\n<h3><span style=\"color:#2c3e50\"><u>MISI</u></span></h3>\r\n\r\n<ol>\r\n	<li>Mengembangkan strategi pengelolaan proses belajar mengajar agar menghasilkan lulusan yang memiliki kompetensi, studi tepat waktu, dan terserap di pasar kerja.</li>\r\n	<li>Mengembangkan kualitas sumber daya dosen sehingga dapat memenuhi Tridharma Perguruan Tinggi dan mendukung pembangunan wilayah NTB.</li>\r\n	<li>Mengembangkan strategi peningkatan kesesuaian bidang kerja lulusan.</li>\r\n	<li>Mengembangkan strategi dalam rangka meningkatkan kuantitas dan kualitas mahasiswa.</li>\r\n	<li>Mengembangkan kerjasama dalam dan luar negeri.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>', 2, '2024-01-05 08:02:36'),
(12, 12, 16, '<p><strong>Ilmu Komputer :</strong></p>\r\n\r\n<p>Ilmu Komputer adalah program yang dirancang agar lulusannya nanti memiliki kemampuan atau kompetensi untuk memformulasikan masalah yang berkaitan dengan informatika, kemampuan teknis mengaplikasikan konsep atau teori dalam desain dan analisa sistem, memilih dan menggunakan&nbsp; teknik pemrograman dan perangkat aplikasi yang sesuai.</p>\r\n\r\n<p><strong>Yang dipelajari :</strong></p>\r\n\r\n<p><strong>Teori :</strong></p>\r\n\r\n<ul>\r\n	<li>Algoritma dan Pemrograman</li>\r\n	<li>Pengantar Sistem Digital</li>\r\n	<li>Kalkulus</li>\r\n	<li>Logika Informatika</li>\r\n	<li>Matematika diskrit</li>\r\n	<li>Struktur Data</li>\r\n	<li>Sistem Basis Data</li>\r\n	<li>Organisasi dan Arsitektur Komputer</li>\r\n	<li>Sistem Operasi</li>\r\n	<li>Aljabar Linear dan Matriks</li>\r\n	<li>Pemrograman Berorientasi Objek</li>\r\n	<li>Interaksi manusia dan komputer</li>\r\n	<li>Sistem Cerdas</li>\r\n	<li>Pemrograman Sistem</li>\r\n	<li>Teori Informasi</li>\r\n	<li>Analisis Numerik</li>\r\n	<li>Pemerograman Web</li>\r\n	<li>Pemerograman Deklaratif</li>\r\n	<li>Grafika Komputer</li>\r\n	<li>Jaringan Komputer</li>\r\n	<li>Kecerdasan Buatan</li>\r\n	<li>Sistem Pakar</li>\r\n	<li>Desain dan Analisis Algoritma</li>\r\n	<li>Pengolahan Citra</li>\r\n	<li>Statistika dan Probabilitas</li>\r\n	<li>Rekayasa Perangkat Lunak</li>\r\n	<li>Pemrosesan Data Terdistribusi</li>\r\n	<li>Logika Fuzzy</li>\r\n	<li>Manajemen Jaringan</li>\r\n	<li>dll</li>\r\n</ul>\r\n\r\n<p><strong>Praktek dan Praktikum</strong></p>\r\n\r\n<ul>\r\n	<li>Rekayasa Perangkat Lunak</li>\r\n	<li>Pemrosesan Data Terdistribusi</li>\r\n	<li>Logika Fuzzy</li>\r\n	<li>Manajemen Jaringan</li>\r\n	<li>Sistem Pakar</li>\r\n	<li>Desain dan Analisis Algoritma</li>\r\n	<li>Pengolahan Citra</li>\r\n	<li>Mobile Computing</li>\r\n	<li>Machine Learning</li>\r\n	<li>Komputer dan Masyarakat</li>\r\n	<li>Data Mining</li>\r\n	<li>Jaringan Syaraf Tiruan</li>\r\n	<li>Kriptografi</li>\r\n	<li>Algoritma Terdistribusi</li>\r\n	<li>Natural Language Processing</li>\r\n	<li>Jaringan Nirkabel</li>\r\n	<li>Teori Bahasa dan Automata</li>\r\n	<li>Sistem Multimedia</li>\r\n	<li>Technopreunership</li>\r\n	<li>Deep Learning</li>\r\n	<li>SPK</li>\r\n	<li>Pemrograman Sistem Jaringan</li>\r\n	<li>Sistem Keamanan Jaringan</li>\r\n	<li>Data Science</li>\r\n	<li>Analisis Jaringan dan Komputasi</li>\r\n	<li>Cloud Computing</li>\r\n	<li>Big Data</li>\r\n	<li>Pengelolaan Pusat Data</li>\r\n</ul>\r\n\r\n<p><strong>Prospek Kerja :</strong></p>\r\n\r\n<ul>\r\n	<li>Programmer</li>\r\n	<li>Teknisi Jaringan (Network Engineer)</li>\r\n	<li>Database Administrator</li>\r\n	<li>Mobile Programmer</li>\r\n	<li>Software Engineer</li>\r\n	<li>System Analyst atau System Integrator</li>\r\n	<li>Konsultan IT</li>\r\n	<li>Computer Network atau Data Comunication Engineer</li>\r\n	<li>Intelligent System Developer</li>\r\n	<li>Web Designer atau Web Programmer</li>\r\n	<li>Freelance Programmer</li>\r\n	<li>&nbsp;Pengajar IT (Instruktur/Guru/Dosen)</li>\r\n	<li>Jadi PNS (Pegawai Negeri Sipil)</li>\r\n</ul>', 3, '2024-01-05 08:04:21'),
(13, 13, 16, '<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2023-12-14 213032_1706487415.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Ruang Kelas</strong></h3>\r\n\r\n<p>Prodi Ilmu Komputer mempunyai 7 ruang kelas. Setiap ruang kelas dilengkapi dengan kursi kuliah yang nyaman, AC atau kipas angin, dan LCD proyektor.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2023-12-14 213159_1706488252.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Perpustakaan</strong></h3>\r\n\r\n<p>Perpustakaan Universitas Bumigora merupakan perpustakaan perguruan tinggi swasta terlengkap dan terbaik di NTB. Menyediakan 6928 referensi dalam bentuk buku dan jurnal. Pengelolaan menggunakan sistem informasi SLIMS dan katalog buku dapat diakses secara online melalui Digilib.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071053_1706488346.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Laboratorium Komputer</strong></h3>\r\n\r\n<p>Laboratorium Komputer 1 memiliki 42 unit komputer yang terdiri dari 12 unit computer dengan spesifikasi Intel Core i3 dan 30 unit computer dengan spesifikasi Intel Dual Core. Dilengkapi dengan Monitor LCD, Sistem Operasi Windows 7, koneksi jaringan dan LCD proyektor, serta&nbsp;<em>software</em>&nbsp;yang lengkap untuk mendukung praktikum pemrograman dasar.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071020_1706488449.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Laboratorium Komputer</strong>&nbsp;<strong>Rekayasa Perangkat Lunak (RPL) 2</strong></h3>\r\n\r\n<p>Laboratorium Komputer 2 menyediakan 23 unit komputer dengan sfesifikasi Intel Core i3. Dilengkapi dengan Monitor LCD, Sistem Operasi Windows 7, Koneksi Jaringan dan dilengkapi LCD proyektor. Digunakan untuk praktikum pemrograman lanjut.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071037_1706488565.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Laboratorium Komputer&nbsp;Rekayasa Perangkat Lunak (RPL) 3</strong></h3>\r\n\r\n<p>Laboratorium Komputer 3 menyediakan 13 unit komputer dengan sfesifikasi Intel Core i5. Dilengkapi dengan Monitor LCD, Sistem Operasi Windows 10, Koneksi Jaringan dan dilengkapi LCD proyektor. Digunakan untuk praktikum pemrograman lanjut.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071053_1706488647.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Laboratorium Multimedia</strong></h3>\r\n\r\n<p>Laboratorium Multimedia memiliki 21 unit komputer dengan sfesifikasi Intel Core i5. Dilengkapi dengan Monitor LCD, Sistem Operasi Windows 8, Koneksi Jaringan, Speaker, LCD Proyektor, serta&nbsp;<em>software-software</em>&nbsp;multimedia yang mendukung untuk praktikum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071108_1706488727.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Laboratorium Jaringan Komputer</strong></h3>\r\n\r\n<p>Laboratorium Jaringan UNIVERSITASBumigora memiliki 24 unit komputer yang memiliki sfesifikasi Intel Core i3 dengan dilengkapi dengan Monitor LCD, Oprasi Sistem Windows 7, 1 buah&nbsp;<em>mounting rack</em>&nbsp;yang dilengkapi dengan perangkat router, switch dan hub, wireless dan hotspot, serta perangkat pendukung lainnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071127_1706488790.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Laboratorium Desain Komunikasi Visual</strong></h3>\r\n\r\n<p>Laboratorium Desain Komunikasi Visual memiliki 21 unit komputer yang terdiri dari 15 unit komputer dengan spesifikasi Intel Core i7 dan 6 unit computer dengan spesifikasi Intel Core i5. Dilengkapi dengan Monitor LCD, Sistem Operasi Windows 7 &amp; 10, koneksi jaringan, speaker dan LCD proyektor, serta&nbsp;<em>software-software</em>&nbsp;multimedia untuk mendukung praktikum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071151_1706488852.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Laboratorium Bahasa</strong></h3>\r\n\r\n<p>Laboratorium Bahasa dilengkapi dengan 20 perangkat peralatan bahasa, speaker dan LCD monitor.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071208_1706488920.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Aula</strong></h3>\r\n\r\n<p>Luas Aula UNIVERSITAS Bumigora adalah 240 m<sup>2</sup>&nbsp;dan dapat menampung 200 orang. Aula digunakan untuk&nbsp;<em>event</em>&nbsp;atau seminar. Selain itu, Aula juga dapat dipergunakan untuk perkuliahan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071229_1706488981.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong><em>Internet Connection</em></strong></h3>\r\n\r\n<p>Universitas Bumigora menyediakan&nbsp; fasilitas 13 titik hotspot dengan kapasitas 200 MB untuk hotspot dan jaringan internal serta 2 MB khusus PDDIKTI. Dengan fasilitas tersebut mahasiswa Universitas Bumigora dapat dengan mudah mengakses internet di lingkungan kampus.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071251_1706489037.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong>Musholla</strong></h3>\r\n\r\n<p>Universitas Bumigora menyediakan musholla, yang di pisahkan antara musholla laki-laki dan perempuan. Yang mampu menampung 40 orang.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-29 071312_1706489088.png\" style=\"float:left; height:100px; margin-right:10px; width:100px\" /><strong><em>Video Conference</em></strong></h3>\r\n\r\n<p>Dengan peralatan video conference, Universitas Bumigora secara berkala mengadakan kuliah, seminar atau meeting&nbsp; jarak jauh dengan perguruan tinggi lain seperti ITS, UGM dan Universitas Gunadarma, serta DIKTI.</p>', 4, '2024-01-29 00:45:05'),
(14, 15, 16, '<p style=\"text-align:center\"><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/Screenshot 2024-01-05 150724_1705366534.png\" style=\"height:295px; width:445px\" /></p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;</p>\r\n</p>', 1, '2024-01-20 00:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `semester_delapan`
--

CREATE TABLE `semester_delapan` (
  `id_kurikulum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_mk` varchar(100) DEFAULT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester_dua`
--

CREATE TABLE `semester_dua` (
  `id_kurikulum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_mk` varchar(100) DEFAULT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester_dua`
--

INSERT INTO `semester_dua` (`id_kurikulum`, `id_user`, `kode_mk`, `nama_mk`, `sks`, `created_at`, `update_at`) VALUES
(1, 16, 'ISPK320007', 'Bahasa Indonesia', 3, '2024-01-25 06:29:09', '2024-01-25 03:29:08'),
(2, 16, 'ISPK220008', 'Bahasa Inggris lanjut', 2, '2024-01-25 06:27:57', '2024-01-25 03:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `semester_empat`
--

CREATE TABLE `semester_empat` (
  `id_kurikulum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_mk` varchar(100) DEFAULT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester_enam`
--

CREATE TABLE `semester_enam` (
  `id_kurikulum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_mk` varchar(100) DEFAULT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester_lima`
--

CREATE TABLE `semester_lima` (
  `id_kurikulum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_mk` varchar(100) DEFAULT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester_satu`
--

CREATE TABLE `semester_satu` (
  `id_kurikulum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_mk` varchar(100) DEFAULT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester_satu`
--

INSERT INTO `semester_satu` (`id_kurikulum`, `id_user`, `kode_mk`, `nama_mk`, `sks`, `created_at`, `update_at`) VALUES
(1, 16, 'ISPK310001', 'Pendidikan Agama', 3, '2024-01-25 03:27:01', '2024-01-25 03:27:01'),
(2, 16, 'ISPK210002', 'Bahasa Inggris', 2, '2024-01-25 03:28:31', '2024-01-25 03:28:31'),
(3, 16, 'ISKK410203', 'Algoritma dan Pemrograman', 2, '2024-01-25 03:29:08', '2024-01-25 03:29:08'),
(4, 16, 'ISKK310204', 'Pengantar Sistem Digital', 3, '2024-01-25 03:29:53', '2024-01-25 03:29:53'),
(5, 16, 'ISKK410105', 'Kalkulus', 4, '2024-01-25 03:30:28', '2024-01-25 03:30:28'),
(6, 16, 'ISKK310106', 'Logika Informatika', 3, '2024-01-25 03:31:00', '2024-01-25 03:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `semester_tiga`
--

CREATE TABLE `semester_tiga` (
  `id_kurikulum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_mk` varchar(100) DEFAULT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester_tujuh`
--

CREATE TABLE `semester_tujuh` (
  `id_kurikulum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_mk` varchar(100) DEFAULT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT '0',
  `slug_skripsi` varchar(255) NOT NULL,
  `judul_skripsi` varchar(255) NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `isi` text,
  `jenis_skripsi` varchar(20) DEFAULT 'Berita',
  `status_skripsi` varchar(20) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id_skripsi`, `id_user`, `id_kategori`, `slug_skripsi`, `judul_skripsi`, `file`, `isi`, `jenis_skripsi`, `status_skripsi`, `urutan`, `hits`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_post`, `tanggal_publish`, `tanggal`) VALUES
(22, 16, 0, 'pengumuman-batas-pembayaran-skripsi', 'Pengumuman Batas Pembayaran Skripsi', 'screenshot-2024-01-18-080618-1705567609.png', NULL, NULL, 'Publish', 2, 0, NULL, NULL, '2020-09-16 00:01:35', '2020-09-15 00:00:00', '2024-01-18 08:46:49'),
(29, 16, 0, 'pengumuman-perpanjangan-pengumpulan-berkas-maju-seminar-skripsi', 'Pengumuman Perpanjangan Pengumpulan Berkas Maju seminar Skripsi', 'va-genap-2023-2024-s2-ilkom-s2-sastra-inggris-1705999584.pdf', NULL, NULL, 'Publish', 2, NULL, NULL, NULL, '2023-11-10 03:25:36', '2023-11-10 00:00:00', '2024-01-23 08:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `akses_level`, `tanggal`) VALUES
(16, 'Admin UBG', 'adminilkom', 'a34bd3952a6e346021f77936e6b5a65400f4d679', 'Admin', '2024-01-29 00:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `video` text NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `video`, `urutan`, `id_user`, `tanggal`) VALUES
(72, 'https://www.youtube.com/embed/_5ccf9ldxwQ?si=T_vzTn8q6_32LjJS', 1, 15, '2023-12-06 00:52:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `dosen_staff`
--
ALTER TABLE `dosen_staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `kategori_download`
--
ALTER TABLE `kategori_download`
  ADD PRIMARY KEY (`id_kategori_download`);

--
-- Indexes for table `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  ADD PRIMARY KEY (`id_kategori_galeri`);

--
-- Indexes for table `kategori_pengumuman`
--
ALTER TABLE `kategori_pengumuman`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `kategori_profil`
--
ALTER TABLE `kategori_profil`
  ADD PRIMARY KEY (`id_kategori_profil`);

--
-- Indexes for table `kategori_skripsi`
--
ALTER TABLE `kategori_skripsi`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nama_pengajar`
--
ALTER TABLE `nama_pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `semester_delapan`
--
ALTER TABLE `semester_delapan`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `semester_dua`
--
ALTER TABLE `semester_dua`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `semester_empat`
--
ALTER TABLE `semester_empat`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `semester_enam`
--
ALTER TABLE `semester_enam`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `semester_lima`
--
ALTER TABLE `semester_lima`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `semester_satu`
--
ALTER TABLE `semester_satu`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `semester_tiga`
--
ALTER TABLE `semester_tiga`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `semester_tujuh`
--
ALTER TABLE `semester_tujuh`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `dosen_staff`
--
ALTER TABLE `dosen_staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori_download`
--
ALTER TABLE `kategori_download`
  MODIFY `id_kategori_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  MODIFY `id_kategori_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_pengumuman`
--
ALTER TABLE `kategori_pengumuman`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_profil`
--
ALTER TABLE `kategori_profil`
  MODIFY `id_kategori_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kategori_skripsi`
--
ALTER TABLE `kategori_skripsi`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nama_pengajar`
--
ALTER TABLE `nama_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `semester_delapan`
--
ALTER TABLE `semester_delapan`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester_dua`
--
ALTER TABLE `semester_dua`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester_empat`
--
ALTER TABLE `semester_empat`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester_enam`
--
ALTER TABLE `semester_enam`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester_lima`
--
ALTER TABLE `semester_lima`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester_satu`
--
ALTER TABLE `semester_satu`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semester_tiga`
--
ALTER TABLE `semester_tiga`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester_tujuh`
--
ALTER TABLE `semester_tujuh`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id_skripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

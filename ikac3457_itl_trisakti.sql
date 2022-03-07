-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Des 2021 pada 11.19
-- Versi server: 10.2.41-MariaDB-cll-lve
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikac3457_itl_trisakti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID_Admin` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_Admin`, `Username`, `Password`, `Level`) VALUES
(1, 'Admin', '123', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `ID_Anggota` varchar(20) NOT NULL,
  `NIA` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `NIM` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Tahun_Masuk` varchar(20) NOT NULL,
  `Tahun_Wisuda` varchar(20) NOT NULL,
  `Fakultas` varchar(100) NOT NULL,
  `No_Telp` varchar(20) NOT NULL,
  `Alamat` text NOT NULL,
  `Nama_Perusahaan` varchar(200) NOT NULL,
  `Kota_Perusahaan` varchar(100) NOT NULL,
  `Jabatan_Perusahaan` varchar(200) NOT NULL,
  `Periode_dari` varchar(20) NOT NULL,
  `Periode_sampai` varchar(20) NOT NULL,
  `Kode_Pos` varchar(20) NOT NULL,
  `Provinsi` varchar(20) NOT NULL,
  `Tanggal_Entri` varchar(20) NOT NULL,
  `Level` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`ID_Anggota`, `NIA`, `Password`, `Nama`, `NIM`, `Email`, `Tahun_Masuk`, `Tahun_Wisuda`, `Fakultas`, `No_Telp`, `Alamat`, `Nama_Perusahaan`, `Kota_Perusahaan`, `Jabatan_Perusahaan`, `Periode_dari`, `Periode_sampai`, `Kode_Pos`, `Provinsi`, `Tanggal_Entri`, `Level`, `gambar`) VALUES
('KSS290001', '1821180441180036', 'cefb33932318bcefb7415c69cc06b642b4f1e634', 'Syifa Azzahra', '180441180036', 'sipa12@gmail.com', '2018', '2021', 'Teknik Dirgantara (Kebandarudaraan)', '08988153992', 'bogor', 'PT.sekian', 'Jakarta', 'HR', '2020', '2021', '1234', 'Jawa Barat', '27 May 2021', 'Alumni', '60af9b7c1fca4.jpeg'),
('KSS290002', '161581643431', '9f849340ac44673fee3bcd207e6c66dfbbe3faa3', 'Anjenk', '81643431', 'numpang@gmail.com', '2016', '2015', 'Program Studi Manajemen Logistik dan Material (MLM)', '08453463119', 'Gorontalo', 'Saham', 'Riau', 'Pengangguran:v', 'Selamanya', 'Selamanya', '65646461', 'Bengkulu', '05 July 2021', 'Alumni', '60e20d348b13f.jpg'),
('KSS290003', '21211122334455', '986e936144dc31f017cd19e1fbc93a02425535a7', 'jaya', '1122334455', 'BakuHantamCrew@gmail.com', '2021', '2021', 'Program Studi Manajemen Transpor Udara (MTU)', '083833571194', 'Aceh', 'Awok', 'HWCA', 'Dosen', '1', '1', '62341', 'Aceh', '06 July 2021', 'Alumni', '60e36f12258e2.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `ID_Berita` int(20) NOT NULL,
  `Judul_Berita` varchar(255) NOT NULL,
  `Link_Berita` text NOT NULL,
  `Jenis_Konfigurasi` varchar(50) NOT NULL,
  `Tanggal` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`ID_Berita`, `Judul_Berita`, `Link_Berita`, `Jenis_Konfigurasi`, `Tanggal`, `gambar`) VALUES
(393, 'Pengukuhan Pengurus IKAITL Trisakti Periode 2018 â€“ 2023', 'http://beritamiliter.com/2021/03/03/pengukuhan-pengurus-ikaitl-trisakti-periode-2018-2023/', 'Vertikal', '10 March 2021', '604872c53370f.jpg'),
(394, 'Bangun Silaturahmi dan Jaringan Bisnis, IKAITL Trisakti Launching Website', 'http://www.suratkabarindonesiahebat.com/news-11781-bangun-silaturahmi-dan-jaringan-bisnis-ikaitl-trisakti-lounching-website.html', 'Vertikal', '10 March 2021', '604872f3ba5fd.jpg'),
(395, 'Singapura Sampaikan Belasungkawa untuk Korban Bencana Alam NTT-NTB', 'https://news.detik.com/internasional/d-5524760/singapura-sampaikan-belasungkawa-untuk-korban-bencana-alam-ntt-ntb?tag_from=wp_nhl_2', 'Vertikal', '08 April 2021', '606eab5fd3daf.jpg'),
(396, 'Pakar Transportasi Nilai Tak Perlu Larang Mudik, Ini Alasan-Solusinya', 'https://news.detik.com/berita-jawa-tengah/d-5524755/pakar-transportasi-nilai-tak-perlu-larang-mudik-ini-alasan-solusinya?tag_from=wp_nhl_4', 'Vertikal', '08 April 2021', '606eab8b0ac6e.jpg'),
(397, 'Kapan Awal Puasa Ramadhan 2021? Berikut Link Download Jadwal Ramadhan 1442 H di Seluruh Indonesia', 'https://www.tribunnews.com/ramadan/2021/04/08/kapan-awal-puasa-ramadhan-2021-berikut-link-download-jadwal-ramadhan-1442-h-di-seluruh-indonesia', 'Vertikal', '08 April 2021', '606eabce6e32f.jpg'),
(398, 'Panduan Resmi Ibadah Ramadhan dan Idul Fitri 2021 Kementerian Agama', 'https://www.kompas.com/tren/read/2021/04/06/100000965/panduan-resmi-ibadah-ramadhan-dan-idul-fitri-2021-kementerian-agama?page=all', 'Vertikal', '08 April 2021', '606eac1f5b10b.jpg'),
(399, 'Kapan Puasa Ramadhan 2021? Muhammadiyah Tetapkan Selasa, 13 April 2021, Download Jadwal Imsakiyah', 'https://www.tribunnews.com/ramadan/2021/04/08/kapan-puasa-ramadhan-2021-muhammadiyah-tetapkan-selasa-13-april-2021-download-jadwal-imsakiyah', 'Vertikal', '08 April 2021', '606eac5936d26.jpg'),
(400, 'H-1 Larangan Mudik, Pemkot Bandung Pantau Kesiapan Check Point', 'https://news.detik.com/berita-jawa-barat/d-5558581/h-1-larangan-mudik-pemkot-bandung-pantau-kesiapan-check-point?tag_from=wp_nhl_1', 'Vertikal', '05 May 2021', '609236293b08d.jpeg'),
(401, 'H-1 Larangan Mudik, Sudah 5.000 Orang Masuk ke Jateng', 'https://news.detik.com/berita-jawa-tengah/d-5558565/h-1-larangan-mudik-sudah-5000-orang-masuk-ke-jateng?tag_from=wp_nhl_9', 'Vertikal', '05 May 2021', '6092365189d44.jpeg'),
(402, 'Polisi Bangun Check Point dan Posko Penyekatan Mudik di Kota Tangerang', 'https://megapolitan.kompas.com/read/2021/05/05/12471031/polisi-bangun-check-point-dan-posko-penyekatan-mudik-di-kota-tangerang', 'Vertikal', '05 May 2021', ''),
(403, 'Jelang Larangan Mudik, Ketua DPR Tinjau Terminal dan Stasiun KA di Cirebon.', 'https://nasional.kompas.com/read/2021/05/05/12364221/jelang-larangan-mudik-ketua-dpr-tinjau-terminal-dan-stasiun-ka-di-cirebon', 'Vertikal', '05 May 2021', '609236d83993f.jpg'),
(404, 'Ganjar Minta Semua Jalur Masuk Jateng Dijaga Cegah Pemudik', 'https://www.cnnindonesia.com/nasional/20210505121056-12-638801/ganjar-minta-semua-jalur-masuk-jateng-dijaga-cegah-pemudik', 'Vertikal', '05 May 2021', '609236f8e5aa4.jpeg'),
(405, 'Satgas: Larangan Mudik Putusan Negara, Daerah Tak Boleh Beda', 'https://www.cnnindonesia.com/nasional/20210505114849-20-638797/satgas-larangan-mudik-putusan-negara-daerah-tak-boleh-beda', 'Vertikal', '05 May 2021', '609237197d326.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bisnis`
--

CREATE TABLE `bisnis` (
  `ID_Bisnis` int(11) NOT NULL,
  `Nama_Bisnis` varchar(200) NOT NULL,
  `Link_Bisnis` text NOT NULL,
  `Tanggal_Entri` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bisnis`
--

INSERT INTO `bisnis` (`ID_Bisnis`, `Nama_Bisnis`, `Link_Bisnis`, `Tanggal_Entri`, `gambar`) VALUES
(2, 'INTITRANS', 'https://temen.id/component/marketplace/sellerprofile/953?Itemid=', '27 May 2021', '60af44af3bec6.jpg'),
(3, 'PT MAX GLOBAL LOGISTICS', 'https://temen.id/component/marketplace/sellerprofile/906?Itemid=', '27 May 2021', '60af453e6a0a5.jpg'),
(4, 'PMBLAST EXPLOSIVES', 'https://temen.id/component/marketplace/sellerprofile/956?Itemid=', '27 May 2021', '60af4562a5c0a.jpg'),
(5, 'LINUS EXPRESS', 'https://temen.id/component/marketplace/sellerprofile/903?Itemid=', '27 May 2021', '60af474e48f8b.jpg'),
(6, 'TRILINK LOGISTIK', 'https://temen.id/component/marketplace/sellerprofile/955?Itemid=', '27 May 2021', '60af477e17995.jpg'),
(7, 'GEO TRANS', 'https://temen.id/component/marketplace/sellerprofile/957?Itemid=', '27 May 2021', '60af47e84319f.jpg'),
(8, 'SURYA PANDAWA NUSA LOGISTIK', 'https://temen.id/component/marketplace/sellerprofile/954?Itemid=', '27 May 2021', '60af496393cd6.jpg'),
(9, 'PT. DEWI ABADI CEMERLANG', 'https://temen.id/component/marketplace/sellerprofile/967', '27 May 2021', '60af49a1d6958.jpg'),
(10, 'PT. WAHANA MULTI LOGISTIK', 'https://temen.id/component/marketplace/sellerprofile/968', '27 May 2021', '60af49ec5d03a.jpg'),
(11, 'PT. Transaka Dunia Cargo', 'https://temen.id/component/marketplace/sellerprofile/970', '', ''),
(12, 'PT ODISYS INDONESIA', 'https://temen.id/component/marketplace/sellerprofile/971', '27 May 2021', '60af4c36da7fe.jpg'),
(13, 'PT. Teknologi Pandawa Lima', 'https://temen.id/component/marketplace/sellerprofile/972', '27 May 2021', '60af4d48f2c58.jpg'),
(14, 'Jalur Distribusi Indonesia', 'https://temen.id/component/marketplace/sellerprofile/973', '27 May 2021', '60af4d6bbc5ee.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_komunitas`
--

CREATE TABLE `gambar_komunitas` (
  `ID_Gambar_Komunitas` int(11) NOT NULL,
  `Nama_Komunitas` varchar(200) NOT NULL,
  `Link` varchar(200) NOT NULL,
  `Tanggal` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar_komunitas`
--

INSERT INTO `gambar_komunitas` (`ID_Gambar_Komunitas`, `Nama_Komunitas`, `Link`, `Tanggal`, `gambar`) VALUES
(3, 'Komunitas Golf', 'k_komunitas_golf.php', '27 May 2021', '60af4322bc242.jpg'),
(4, 'Komunitas Sepeda', 'k_komunitas_sepeda.php', '27 May 2021', '60af433d1270b.jpg'),
(5, 'Komunitas Basket', 'k_komunitas_basket.php', '27 May 2021', '60af439cf0ea5.jpg'),
(6, 'Komunitas Seni', 'k_komunitas_seni.php', '27 May 2021', '60af43b20c326.jpeg'),
(7, 'Biker Community', 'k_biker_community.php', '27 May 2021', '60af43d675be9.jpg'),
(8, 'Komunitas Futsal', 'k_komunitas_futsal.php', '27 May 2021', '60af43eb574ec.jpg'),
(9, 'KPMIT', 'k_kpmit.php', '27 May 2021', '60af43fcb7796.jpg'),
(10, 'Translogku', 'k_translogku.php', '27 May 2021', '60af4425ac7e9.jpg'),
(11, 'Kupat', 'k_kupat.php', '27 May 2021', '60af4434c8d10.jpg'),
(12, 'LITBANG', 'k_komunitas_litbang.php', '27 May 2021', '60af444b819bb.jpg'),
(13, 'KOPAI', 'k_kopai.php', '27 May 2021', '60af445f4e502.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `ID_Iklan` int(11) NOT NULL,
  `Nama_Iklan` varchar(200) NOT NULL,
  `Penempatan_Iklan` varchar(100) NOT NULL,
  `Tanggal` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`ID_Iklan`, `Nama_Iklan`, `Penempatan_Iklan`, `Tanggal`, `gambar`) VALUES
(3, 'ELBARKA 2', 'Iklan 1', '27 May 2021', '60d41b6d2ab9c.jpg'),
(5, 'ELBARKA 3', 'Iklan 2', '27 May 2021', '60af32941842a.jpg'),
(6, 'ELBARKA 4', 'Iklan 4', '27 May 2021', '60af3390a77f6.jpg'),
(8, 'RAMADHAN', 'Baner Utama', '27 May 2021', '60af3969761f9.jpg'),
(9, 'LINUS', 'Baner Utama', '27 May 2021', '60af3c92e4093.jpg'),
(10, 'IPCCT', 'Baner Utama', '27 May 2021', '60af3d9812471.jpg'),
(11, 'DKS', 'Baner Utama', '27 May 2021', '60af3dab639df.jpg'),
(12, 'ODISYS', 'Baner Utama', '27 May 2021', '60af3dc803774.jpg'),
(13, 'ELBARKA', 'Baner Utama', '27 May 2021', '60af3ddcbaf5d.jpg'),
(17, 'ELBARKA 4', 'Iklan 5', '27 May 2021', '60af4de828a12.jpg'),
(18, 'ELBARKA 3', 'Iklan 3', '27 May 2021', '60af4e0b9bf08.jpg'),
(21, 'kupat 1', 'Iklan K Kupat 1', '08 June 2021', '60bef9ebefaf2.jpg'),
(22, 'kupat 2', 'Iklan K Kupat 2', '08 June 2021', '60befa04f391e.jpg'),
(23, 'iklan umkm 1', 'Iklan UMKM 1', '08 June 2021', '60bf29b1e4a3d.jpg'),
(24, 'iklan umkm 2', 'Iklan UMKM 2', '08 June 2021', '60bf29e2c17d6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komunitas`
--

CREATE TABLE `komunitas` (
  `ID_Komunitas` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Tahun_Masuk` varchar(20) NOT NULL,
  `Tahun_Wisuda` varchar(20) NOT NULL,
  `Nama_Komunitas` varchar(100) NOT NULL,
  `Fakultas` varchar(100) NOT NULL,
  `No_Telp` varchar(20) NOT NULL,
  `Alamat` text NOT NULL,
  `Tanggal` varchar(50) NOT NULL,
  `Kode_Pos` varchar(20) NOT NULL,
  `Provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komunitas`
--

INSERT INTO `komunitas` (`ID_Komunitas`, `Nama`, `Email`, `Tahun_Masuk`, `Tahun_Wisuda`, `Nama_Komunitas`, `Fakultas`, `No_Telp`, `Alamat`, `Tanggal`, `Kode_Pos`, `Provinsi`) VALUES
(12, 'dude', 'sefia.ti441@gmail.com', '2018', '2017', 'Komunitas Golf', 'Manajemen Transportasi Udara (MTU)', '0866544584', 'asdkad', '21 January 2021, 10:53:13 AM', '123', 'DI Yogyakarta'),
(13, 'Bagas Widiyanto', 'bagaswidiyanto123@gmail.com', '2014', '2021', 'Komunitas Litbang', 'Program Studi Manajemen Transpor Laut (MTL)', '0866544584', 'Nanggewer', '28 January 2021, 19:06:16 PM', '123000', 'Jambi'),
(14, 'Reno Prasetyo Nugroho', 'reno_tyo@yahoo.com', '2001', '2006', 'Komunitas Sepeda', 'Program Studi Manajemen Transpor Laut (MTL)', '085219309081', 'Villa mutiara tipar blok d.11 cimanggis depok', '06 March 2021, 11:15:13 AM', '16452', 'Jawa Barat'),
(15, 'Reno Prasetyo Nugroho', 'reno_tyo@yahoo.com', '2001', '2006', 'KPMIT', 'Manajemen Transportasi Laut (MTL)', '085219309081', 'Villa mutiara tipar blok.d 11 cimanggis depok', '06 March 2021, 11:20:33 AM', '16452', 'Jawa Barat'),
(16, 'Reno Prasetyo Nugroho', 'reno_tyo@yahoo.com', '2001', '2006', 'Komunitas Sepeda', 'Manajemen Transportasi Laut (MTL)', '085219309081', 'Villa mutiara tipar blok d.11 cimanggis depok', '06 March 2021, 11:23:40 AM', '16452', 'Jawa Barat'),
(17, 'Reno Prasetyo Nugroho', 'reno_tyo@yahoo.com', '2001', '2006', 'Translogku', 'Manajemen Transportasi Laut (MTL)', '085219309081', 'Villa mutiara tipar blok d.11 cimanggis depok', '06 March 2021, 11:29:02 AM', '16452', 'Jawa Barat'),
(18, 'Romi Fahjana', 'romifahjana@gmail.com', '1993', '1998', 'KPMIT', 'Manajemen Transportasi Udara (MTU)', '08119105142', 'Cipinang Asem RT014/002 Kebon Pala Jakarta Timur', '08 March 2021, 11:19:36 AM', '13650', 'DKI Jakarta'),
(19, 'Amir Waluyo', 'm.amiruddin@gmail.com', '1990', '1997', 'Komunitas Sepeda', '', '087885848628', 'Tebet Timur 4 No. 19', '04 June 2021, 14:35:32 PM', '12820', 'DKI Jakarta'),
(20, 'Ilham  mansis', 'aldenmansis@gmail.com', '1991', '1995', 'Komunitas Sepeda', 'Program Studi Manajemen Logistik dan Material (MLM)', '081585876616', 'Bogor', '04 June 2021, 14:40:54 PM', '', 'Jawa Barat'),
(21, 'Mulyadi', 'mulyadi180571@rocketmail.com', '1990', '1994', 'Komunitas Sepeda', 'Manajemen Transportasi Udara (MTU)', '0818942542', 'Jl .Kebagusan 4 RT 10 RW 04  no 2', '04 June 2021, 15:00:41 PM', '12940', 'DKI Jakarta'),
(22, 'Heri Rianto S', 'kang.obet119@gmail.com', '1990', '1994', 'Komunitas Sepeda', 'Program Studi Manajemen Transpor Udara (MTU)', '081280370778', 'Jl arjuna 3 no 26, utan kayu selatan  JT', '06 June 2021, 15:11:08 PM', '1312', 'DKI Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan_kerja`
--

CREATE TABLE `lowongan_kerja` (
  `ID_Lowongan_Kerja` int(11) NOT NULL,
  `Kota` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `Tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lowongan_kerja`
--

INSERT INTO `lowongan_kerja` (`ID_Lowongan_Kerja`, `Kota`, `gambar`, `Tanggal`) VALUES
(13, 'Jakarta', '6041cf809fb09.jpg', '05 March 2021'),
(14, 'Jakarta', '6041cf94332a4.jpg', '05 March 2021'),
(15, 'Bogor', '6041cfac3ec92.jpg', '05 March 2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `ID_News` int(11) NOT NULL,
  `Judul_Berita` text NOT NULL,
  `Isi` text NOT NULL,
  `Tanggal` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`ID_News`, `Judul_Berita`, `Isi`, `Tanggal`, `gambar`) VALUES
(6, 'Serah Terima Website IKAITL Trisakti ', '<p><i>Serah terima Hibah media komunikasi dalam bentuk website dari PT. Teknologi Pandawa Lima selaku perwakilan dari Donatur yang tidak ingin disebutkan namanya kepada Ikatan Alumni ITL - Trisakti (IKAITL -Â  TRISAKTI)</i></p><p>Di lanjutkan dengan penyerahan Surat Penunjukan dari Pihak IKAITL Trisakti kepada PT. Teknologi Pandawa Lima untuk pengelolaan, pemeliharaan dan pengembangan website tersebut.</p><p>Acara berikutnya yaitu penandatanganan bersama Surat Kesepakatan Kerjasama atas keperluan tersebut diatas, antara IKAITL TRISAKTI yang diwakili Oleh Bp. Irza Tanjung SE., MM. dengan PT. Teknologi Pandawa Lima yang diwakili Oleh Bp. Ahmad Gaotsul Alam ST., MM.</p><p>Acara kemudian diakhiri dengan ramah tamah & makan siang bersama. Semoga kerjasama ini dapat bermanfaat bagi kedua belah pihak pada umumnya dan bermanfaat bagi Alumni IKAITL Trisakti pada umumnya.</p>', '10 February 2021', '602368f9b6559.jpg'),
(7, 'Pengukuhan Pengurus IKAITL Trisakti', '<p>Pengkuhuan IKAITL Trisakti antar waktu 2018 sampai 2023</p>', '08 March 2021', '6045c500f2f5f.jpeg'),
(8, 'Rapat Kerja IKAITL Trisakti', '<p>Rapat kerja yang dilaksanakan setelah pengukuhan pengurus IKAITL Trisakti</p>', '08 March 2021', '6045c661e20d4.jpeg'),
(9, 'Gala Premier Website IKAITL Trisakti', '<p>Peresmian Website IKA ITL Trisakti pada Sabtu 06 Maret 2021</p>', '08 March 2021', '6045e5e3844f4.jpeg'),
(10, 'Penandatanganan Nota Kesepahaman Kerjasama antara LPTL ITL Trisakti - IKAITL Trisakti - PATLI', '<p>Penandatanganan Nota Kesepahaman Kerjasama antara LPTL ITL Trisakti - IKAITL Trisakti - PATLI (Perkumpulan Ahli Transportasi &amp; Logistik Indonesia), Jakarta 06 Maret 2021<br></p>', '08 March 2021', '6045c7bab438d.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `souvenir`
--

CREATE TABLE `souvenir` (
  `ID_Souvenir` int(11) NOT NULL,
  `Nama_Barang` varchar(255) NOT NULL,
  `Harga` varchar(30) NOT NULL,
  `No_Telp` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `souvenir`
--

INSERT INTO `souvenir` (`ID_Souvenir`, `Nama_Barang`, `Harga`, `No_Telp`, `gambar`) VALUES
(19, 'Batch', '25000', '087820595612', ''),
(20, 'Handuk', '50000', '087820595612', '60b73102c32ac.jpg'),
(21, 'Masker', '10000', '087820595612', '6034cf939cdca.jpg'),
(22, 'Gelas Mug', '25000', '087820595612', '6034d01210076.jpg'),
(24, 'Kemeja', '250000', '087820595612', '6034d05b19de7.jpg'),
(25, 'Topi + Bordir ', '75000', '087820595612', '6035cd7833f71.jpg'),
(26, 'Topi Polos', '50000', '087820595612', '6036110ec9100.jpg'),
(27, 'Topi Biru', '70000', '08988153992', '604075474e376.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `umkm`
--

CREATE TABLE `umkm` (
  `ID_UMKM` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Link_Mitra` text NOT NULL,
  `Tanggal` varchar(20) NOT NULL,
  `Level` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `umkm`
--

INSERT INTO `umkm` (`ID_UMKM`, `Nama`, `Link_Mitra`, `Tanggal`, `Level`, `gambar`) VALUES
(1, 'AMIRA CAKE', 'https://temen.id/component/marketplace/sellerprofile/907?Itemid=', '19 January 2021', 'UMKM', '6010d23e0bfb5.jpg'),
(2, 'AYAM BAKAR BABE H JAMAL', 'https://temen.id/component/marketplace/sellerprofile/909?Itemid=', '21 January 2021', 'UMKM', '60094c704b8c2.jpg'),
(3, 'BAKMI AYAM BABE H JAMAL', 'https://temen.id/component/marketplace/sellerprofile/917?Itemid=', '21 January 2021', 'UMKM', '60094c83b41c8.jpg'),
(4, 'BEBEK BEGIH', 'https://temen.id/component/marketplace/sellerprofile/919?Itemid=', '21 January 2021', 'UMKM', '60094c8fd0c64.jpg'),
(5, 'BELLA COOKIES', 'https://temen.id/component/marketplace/sellerprofile/941?Itemid=', '21 January 2021', 'UMKM', '60094cbb9c582.jpg'),
(6, 'BUFFER KURAI', 'https://temen.id/component/marketplace/sellerprofile/942?Itemid=', '21 January 2021', 'UMKM', '60094cc743c7f.jpg'),
(7, 'DAPUR KOKAL GRIYA', 'https://temen.id/component/marketplace/sellerprofile/943?Itemid=', '21 January 2021', 'UMKM', '60094cff17a9d.jpg'),
(8, 'DAPUR MAMA YANCE', 'https://temen.id/component/marketplace/sellerprofile/944?Itemid=', '21 January 2021', 'UMKM', '60094d0da7d52.jpg'),
(9, 'DAPUR MUSTI ENAK', 'https://temen.id/component/marketplace/sellerprofile/945?Itemid=', '21 January 2021', 'UMKM', '60094d1a023c9.jpg'),
(10, 'DAPUR PURA', 'https://temen.id/component/marketplace/sellerprofile/946?Itemid=', '21 January 2021', 'UMKM', '60094d2516897.jpg'),
(11, 'DAPUR YOSSI', 'https://temen.id/component/marketplace/sellerprofile/947?Itemid=', '21 January 2021', 'UMKM', '60094d35be67a.jpg'),
(12, 'DAPURE MOMMY CHAN', 'https://temen.id/component/marketplace/sellerprofile/948?Itemid=', '21 January 2021', 'UMKM', '60094d476e510.jpg'),
(13, 'DISKAZ KOPI', 'https://temen.id/component/marketplace/sellerprofile/949?Itemid=', '21 January 2021', 'UMKM', '60094d544d62e.jpg'),
(14, 'FENNY CORNER', 'https://temen.id/component/marketplace/sellerprofile/950?Itemid=', '21 January 2021', 'UMKM', '60094d63855a3.jpg'),
(15, 'GARDEN KIDS', 'https://temen.id/component/marketplace/sellerprofile/951?Itemid=', '21 January 2021', 'UMKM', '60094d718e211.jpg'),
(16, 'KACANG COKLAT', 'https://temen.id/component/marketplace/sellerprofile/911?Itemid=', '21 January 2021', 'UMKM', '60094d8a3d572.jpg'),
(17, 'KANEEAN', 'https://temen.id/component/marketplace/sellerprofile/913?Itemid=', '21 January 2021', 'UMKM', '60094daadc195.jpg'),
(18, 'KARTIKA JAYA CATERING', 'https://temen.id/component/marketplace/sellerprofile/915?Itemid=', '21 January 2021', 'UMKM', '60094db6b54bb.jpg'),
(19, 'KATANYA ENAK', 'https://temen.id/component/marketplace/sellerprofile/918?Itemid=', '21 January 2021', 'UMKM', '60094dc27a408.jpg'),
(20, 'KEIONA BAKERY', 'https://temen.id/component/marketplace/sellerprofile/921?Itemid=', '21 January 2021', 'UMKM', '60094dcfc099a.jpg'),
(21, 'KOPITIKUM', 'https://temen.id/component/marketplace/sellerprofile/923?Itemid=', '21 January 2021', 'UMKM', '60094de596661.jpg'),
(22, 'KOTJOK DAHULU', 'https://temen.id/component/marketplace/sellerprofile/925?Itemid=', '21 January 2021', 'UMKM', '60094df2cb2be.jpg'),
(23, 'LATASHA', 'https://temen.id/component/marketplace/sellerprofile/929?Itemid=', '21 January 2021', 'UMKM', '60094dfe216e9.jpg'),
(24, 'LEKEDAICOFFEE', 'https://temen.id/component/marketplace/sellerprofile/930?Itemid=', '21 January 2021', 'UMKM', '60094e091a2dc.jpg'),
(25, 'LOKA SAJI', 'https://temen.id/component/marketplace/sellerprofile/932?Itemid=', '21 January 2021', 'UMKM', '60094e13badef.jpg'),
(26, 'LOVIS AUTHENTIC CAFÃ‰', 'https://temen.id/component/marketplace/sellerprofile/933?Itemid=', '21 January 2021', '', '60094e206547e.jpg'),
(27, 'LUCHUIMUT', 'https://temen.id/component/marketplace/sellerprofile/934?Itemid=', '21 January 2021', '', '60094e2a7c005.jpg'),
(28, 'MAISON', 'https://temen.id/component/marketplace/sellerprofile/935?Itemid=', '21 January 2021', '', '60094e35b002f.jpg'),
(29, 'MS DIMSUM', 'https://temen.id/component/marketplace/sellerprofile/936?Itemid=', '21 January 2021', '', '60094e4314fc0.jpg'),
(30, 'NAM-NAM BITES', 'https://temen.id/component/marketplace/sellerprofile/910?Itemid=', '21 January 2021', '', '60094e542788b.jpg'),
(31, 'NASI BAKAR MAK ATI', 'https://temen.id/component/marketplace/sellerprofile/912?Itemid=', '21 January 2021', '', '60094e6092ab5.jpg'),
(32, 'OLEH-OLEH NUSANTARA', 'https://temen.id/component/marketplace/sellerprofile/914?Itemid=', '21 January 2021', '', '60094e8c3aef2.jpg'),
(33, 'OTAK-OTAK ISTIMEWA H BOIM', 'https://temen.id/component/marketplace/sellerprofile/916?Itemid=', '21 January 2021', '', '60094e9e8dce3.jpg'),
(34, 'FROZEN FOOD ALA MIKKA POHAN', 'https://temen.id/component/marketplace/sellerprofile/920?Itemid=', '21 January 2021', '', '60094ead15e18.jpg'),
(35, 'RAHMA CATERING', 'https://temen.id/component/marketplace/sellerprofile/922?Itemid=', '21 January 2021', '', '60094ebb42251.jpg'),
(36, 'REGIA CATERING', 'https://temen.id/component/marketplace/sellerprofile/924?Itemid=', '21 January 2021', '', '60094ec64fa52.jpg'),
(37, 'RENDANG PARIAMAN ASLI', 'https://temen.id/component/marketplace/sellerprofile/926?Itemid=', '21 January 2021', '', '60094ed0cb853.jpg'),
(38, 'RUMAH KITA KOPI', 'https://temen.id/component/marketplace/sellerprofile/927?Itemid=', '21 January 2021', '', '60094edb336c5.jpg'),
(39, 'RUMAH ICE CREAM SAFINA', 'https://temen.id/component/marketplace/sellerprofile/928?Itemid=', '21 January 2021', '', '60094f2276b8f.jpg'),
(40, 'SATE KLOPO SUROBOYO', 'https://temen.id/component/marketplace/sellerprofile/931?Itemid=', '21 January 2021', '', '60094f2dd2a90.jpg'),
(43, 'THE M BITES', 'https://temen.id/component/marketplace/sellerprofile/937?Itemid=', '21 January 2021', '', '60094f4468aba.jpg'),
(46, 'UGIES S CORNER', 'https://temen.id/component/marketplace/sellerprofile/938?Itemid=', '21 January 2021', '', '60094f5481187.jpg'),
(47, 'UGIES S PASTRIES', 'https://temen.id/component/marketplace/sellerprofile/938?Itemid=', '21 January 2021', '', '60094f63b8789.jpg'),
(49, 'WAROENG BUNTUT BANG JACK', 'https://temen.id/component/marketplace/sellerprofile/940?Itemid=', '21 January 2021', '', '60094f9ab5984.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `ID_Video` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Isi` text NOT NULL,
  `Video` varchar(200) NOT NULL,
  `Tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ID_Anggota`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`ID_Berita`);

--
-- Indeks untuk tabel `bisnis`
--
ALTER TABLE `bisnis`
  ADD PRIMARY KEY (`ID_Bisnis`);

--
-- Indeks untuk tabel `gambar_komunitas`
--
ALTER TABLE `gambar_komunitas`
  ADD PRIMARY KEY (`ID_Gambar_Komunitas`);

--
-- Indeks untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`ID_Iklan`);

--
-- Indeks untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`ID_Komunitas`);

--
-- Indeks untuk tabel `lowongan_kerja`
--
ALTER TABLE `lowongan_kerja`
  ADD PRIMARY KEY (`ID_Lowongan_Kerja`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID_News`);

--
-- Indeks untuk tabel `souvenir`
--
ALTER TABLE `souvenir`
  ADD PRIMARY KEY (`ID_Souvenir`);

--
-- Indeks untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`ID_UMKM`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`ID_Video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `ID_Berita` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT untuk tabel `bisnis`
--
ALTER TABLE `bisnis`
  MODIFY `ID_Bisnis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `gambar_komunitas`
--
ALTER TABLE `gambar_komunitas`
  MODIFY `ID_Gambar_Komunitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `iklan`
--
ALTER TABLE `iklan`
  MODIFY `ID_Iklan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `ID_Komunitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `lowongan_kerja`
--
ALTER TABLE `lowongan_kerja`
  MODIFY `ID_Lowongan_Kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `ID_News` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `souvenir`
--
ALTER TABLE `souvenir`
  MODIFY `ID_Souvenir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `umkm`
--
ALTER TABLE `umkm`
  MODIFY `ID_UMKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `ID_Video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

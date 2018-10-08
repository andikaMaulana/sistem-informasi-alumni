-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 04:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `email`, `password`, `foto`) VALUES
('admin', 'Admin', 'admin@almuhsin.ac.id', '0c2d499e527f1f443367610953c86f599af25e42e6f74c1d512e78ededbf8777a78746fae806e4ba7f67a3a3cb6370c79866e86af643f500fb51dff30ecc6132HS1Mm/llFpynAOBhpEcWeYLAJQbVcLcJg1EtUms0z8I=', '');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `angkatan` varchar(4) NOT NULL,
  `tahun_lulus` year(4) DEFAULT NULL,
  `program_studi` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tempat_kerja` varchar(100) NOT NULL,
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`nim`, `nama`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `angkatan`, `tahun_lulus`, `program_studi`, `foto`, `password`, `tempat_lahir`, `telepon`, `email`, `tempat_kerja`, `tentang`) VALUES
('44123', 'Ahmad Faisal', 'jl. Matahari no.12', '1996-12-07', 'L', '2015', 2018, 1, '', 'c926de9bf72dd5cdec726f8cc23446d2cf154fecdc12951dcdc19165689c0a16b669539d8c4b51d93273e6131c3073cb7c7d9625c54ac700d4e206d62047b334pyoaTGMKTMlWIOEIo8kafZjfJ5lWY0SI8QFkpQ1LWew=', 'Semarang', '0812345111', 'ahmad@ggwp.id', '', ''),
('44124', 'Ria Ratnasari', 'jl. Melati no.02 Malang', '1997-07-12', 'P', '2015', 2018, 1, '', '44124', 'Malang', '081423414', 'ria_ratnasari@gmail.com', '', ''),
('5150411222', 'Andika Maulana', 'Temanggung', '1997-09-23', 'L', '2015', 2018, 1, '554a4f86eae549e93d9372e422982783.jpg', '0d825c6e3e5eaed07a3984ada3d5a2f35a67bf882ea1a7e5df780206cdf5eae3b02a5f5897acebf5f1888f1b554cb16cb2cf828efc8aaea42269c0b429be0816Rug2AtjQdSb1MxNtXC+9tKHcAwcPmQRYNRzL6bQoGaY=', 'Temanggung', '0855909', 'andik4maulana@gmail.com', 'Facebook Inc.', 'hallo\r\n'),
('5160111048', 'Rina Wati', 'jl. Yosh no. 11 Bandung', '1999-10-12', 'P', '2015', 2020, 1, '5160111048.jpg', '0d825c6e3e5eaed07a3984ada3d5a2f35a67bf882ea1a7e5df780206cdf5eae3b02a5f5897acebf5f1888f1b554cb16cb2cf828efc8aaea42269c0b429be0816Rug2AtjQdSb1MxNtXC+9tKHcAwcPmQRYNRzL6bQoGaY=', 'Bandung', '01219019', '', 'Github.io', 'hello world'),
('5160111049', 'Ayu Meidya Wardani', 'Jakarta', '1998-11-01', 'P', '2015', 2019, 1, '5160111049.jpg', '123', 'Jakarta', '085111234', '', 'Facebook', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111050', 'Yesi Wulandari', 'Bekasi', '1998-11-01', 'P', '2015', 2019, 1, '5160111050.jpg', '68d33f984fd24a8cc3f10d86dbcfb9ba0c90d7c118acbab671d9c8e16cf4610f0b433ad42d99bf83fbee3fb967fc98decd0a4cdc5785136b1f6374bea5b612394dV3GM5rlhRIbY6myH6tXczTWy9HdFR+p/b0fir0IKk=', 'Surabaya', '085111234', '', 'Google Inc.', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111051', 'Nursalim', 'Bandung', '1998-11-01', 'L', '2015', 2019, 1, '5160111051.jpg', 'c73bc15cae9081f5bd9c304836585c36c9a63a10752adf0976338e813e7e188c4f7c617ab6102ef7de1567ef1ee08cf5936de359b19c7819f10619e619366d6crzZVA+utUyppKxc5ruT9hqoQxW1RrwE/asfTiuxYSp4=', 'Yogyakarta', '085111234', '', 'Microsoft', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111052', 'Novia Dewi Sartika', 'Temanggung', '1998-11-01', 'P', '2015', 2019, 1, '5160111052.jpg', '123', 'Bengkulu', '085111234', '', 'Apple', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111053', 'Eka Putri Kusumawati', 'Jakarta', '1998-11-01', 'P', '2016', 2020, 2, '5160111053.jpg', '123', 'Manado', '085111234', '', 'Apple', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111054', 'Fathurrahman', 'Solo', '1998-11-01', 'L', '2016', 2020, 2, '5160111054.jpg', '123', 'Jakarta', '085111234', '', '', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111055', 'Aninditha Rahma Cahyadi', 'Palembang', '1998-11-01', 'P', '2016', 2020, 1, '5160111055.jpg', '123', 'Surabaya', '085111234', '', '', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111056', 'Dina Yuliana', 'Bandung', '1998-11-01', 'P', '2016', 2020, 1, '5160111056.jpg', '123', 'Yogyakarta', '085111234', '', '', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111057', 'Natalia', 'Yogyakarta', '1998-11-01', 'P', '2016', 2020, 1, '5160111057.jpg', '123', 'Jakarta', '085111234', '', '', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111058', 'Budiman', 'Jakarta', '1998-11-01', 'L', '2016', 2020, 1, '5160111058.jpg', '123', 'Medan', '085111234', '', '', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111059', 'Leni Safitri', 'Jakarta', '1998-11-01', 'P', '2016', 2020, 2, '5160111059.jpg', '123', 'Magelang', '085111234', '', '', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('5160111060', 'Viviyona Apriani', 'Bogor', '1998-11-01', 'P', '2015', 2020, 1, '5160111060.jpg', '123', 'Bandung', '085111234', '', '', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `waktu` datetime NOT NULL,
  `kategori` enum('Lowongan Pekerjaan','Berita Alumni') DEFAULT NULL,
  `isi` text,
  `thumbnail` varchar(100) NOT NULL,
  `author` varchar(15) DEFAULT NULL,
  `waktu_berakhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `waktu`, `kategori`, `isi`, `thumbnail`, `author`, `waktu_berakhir`) VALUES
(20, 'Bank Rakyat Indonesia', '2016-07-01 01:01:01', 'Lowongan Pekerjaan', '<p>Program Pengembangan Staff (PPS) adalah pola penerimaan pekerja tetap yang dimaksudkan untuk mencetak kader-kader pemimpin perusahaan di masa depan yang mampu menghadapi persaingan bisnis yang semakin kompetitif.<br><br>Persyaratan</p>\r\n<ul>\r\n<li>Lulusan S1/S2 dari Perguruan Tinggi dan Fakultas/Jurusan dengan akreditasi A/B:</li>\r\n<ul>\r\n<li>Teknik Informatika</li>\r\n<li>Ilmu Komputer</li>\r\n<li>Teknik Jaringan</li>\r\n<li>Teknik Elektro</li>\r\n<li>Teknik Elektro-Telekomunikasi</li>\r\n<li>Teknik Telekomunikasi</li>\r\n<li>Sistem Informasi</li>\r\n</ul>\r\n<li>IPK S1 min. 3.00 dan IPK S2 min. 3.25</li>\r\n<li>Berusia maks. 25 tahun untuk lulusan S1 dan maks. 28 tahun untuk lulusan S2</li>\r\n<li>Belum menikah dan bersedia tidak menikah selama pendidikan dan 1 tahun sejak diangkat menjadi pekerja tetap BRI</li>\r\n<li>Bersedia ditempatkan di seluruh unit kerja BRI</li>\r\n</ul>\r\n<p><br><strong>Pendaftaran:</strong><br>Bagi Anda yang tertarik untuk melamar dan tentunya telah memenuhi setiap persyaratan yang dibutuhkan pada Lowongan Kerja Bank BRI tersebut. Segera daftarkan diri Anda dengan mengirimkan/mengantarkan lamaran ke:<br><br>Tertarik, ???? <strong><a href="https://e-recruitment.bri.co.id/home/pilih_publish/KP00" target="_blank" rel="nofollow noopener">DAFTAR</a></strong></p>', '53304429e09cebe5d1d41a7c8ff9d155.png', '5150411222', '2018-07-31'),
(21, 'PT. CHEMCO HARAPAN NUSANTARA', '2017-12-01 08:36:14', 'Lowongan Pekerjaan', '<p>PT.CHEMCO Harapan Nusantara adalah perusahaan joint venture Indonesia dan jepang yang ahli dalam pembuatan barang bermutu dan presisi tinggi untuk Brake system serta alumunium casting part untuk kendaraan bermotor roda 2 dan 4. Misi kami adalah menjadi salah satu produsen komponen otomotif terbaik di Asia, dengan memegan prinsip bahwa kepuasan pelanggan menjadi prioritas utama. Kami selalu berupaya untuk menghasilkan barang bermutu tinggi dengan didukung oleh teknologi dan sumber daya Manusia yang baik serta pengiriman barang tepat waktu.</p>\r\n<p>Dengan kerja keras dan dedikasi tinggi kami telah mendapatkan kepercayaan untuk supply produk ke beberapa produsen otomotif ternama seperti Daihatsu, Hino, Honda, Isuzu, Kawasaki, Mitsubishi, Suzuki, Yamaha. Dunia Internasional juga telah memberikan kepercayaan dengan adanya permintaan ekspor ke beberapa Negara seperti Jepang, Thailand, Vietnam, Brazil, Italy, Spanyol, dan Amerika Serikat.</p>\r\n<p>Dalam rangka penyediaan Sumber daya manusia yang sejalan dengan prinsip dan misi perusahaan, kami memberi kesempatan berkarier untuk beberapa posisi sebagai berikut:</p>\r\n<p><strong>STAFF PRODUKSI</strong></p>\r\n<p>D3/S1 Teknik Elektro, Teknik Industri, Teknik Mesin, Teknik Mekatronika</p>\r\n<p><strong>STAFF ENGINEERING</strong></p>\r\n<p>D3/S1 Teknik Mesin, Teknik Elektro, Teknik Mekatronika</p>\r\n<p><strong>STAFF PRODUCTION DEVELOPMENT</strong></p>\r\n<p>D3/S1 Teknik Mekatronika, Desain Produk Mekatronika</p>\r\n<p><strong>STAFF QUALITY</strong></p>\r\n<p>D3/S1 Teknik Kimia</p>\r\n<p><strong>SYARAT & KETENTUAN UMUM:</strong></p>\r\n<ul>\r\n<li>Laki-Laki Max Umur 27 tahun</li>\r\n<li>Fresh Graduate/Experience</li>\r\n<li>IPK min 2,75 skala 4</li>\r\n<li>Berbadan sehat, Visus mata Maksimal 1, dan Tidak buta Warna</li>\r\n<li>Memiliki inisiatif tinggi dan dinamis</li>\r\n<li>Dapat bekerja sama dan Bekerja dengan sistem target</li>\r\n<li>Dapat mengoperasikan Komputer (Ms Office)</li>\r\n<li>Menguasai Software Solid work & Autocad (Khusus bag Production Development)</li>\r\n<li>Menguasai dan memahami gambar teknik</li>\r\n<li>Bersedia tinggal di Bekasi atau karawang, Jawa barat</li>\r\n</ul>\r\n<p>*) Proses seleksi di YOGYAKARTA tgl.13 Juli 2018 dan penerimaan calon karyawan tidak dipungut biaya</p>\r\n<p>Kirim surat Lamaran, CV, Referensi kerja, Foto copy KTP, pas Photo berwarna terbaru ke <a href="mailto:recruitment@chemco.co.id">recruitment@chemco.co.id</a>atau PT. Chemco Harapan Nusantara Kawasan Industri Jababeka Jl. Jababeka Raya Blok F No.19-28 Cikarang-Bekasi, Jawa Barat</p>', 'ini_gambar.jpg', '5150411222', '2018-07-24'),
(22, 'Reuni Alumni Manajemen Bisnis Syariah', '2018-02-14 08:42:12', 'Berita Alumni', '<p>Apa kabar para alumnus Manajemen Bisnis Syariah? Semoga sehat dan selalu dilimpahi berkah oleh Tuhan YME. Kapan kah terakhir mas/mba bertemu dengan rekan sejawat sewaktu kuliah di Manajemen Bisnis Syariah STEBI Al-Muhsin?, masih ingatkah dengan wajah teman-teman atau mantan pacar atau mantan gebetan sewaktu kuliah di STEBI Al-Muhsin? Ingin bertemu mereka kembali? Ingin menyambung tali silaturahmi ataupun mempererat kembali?, ya, jawabannya ada disini.</p>\r\n<p>Kami panitia Reuni Akbar Himpunan Alumni Manajemen Bisnis Syariah STEBI Al-Muhsin Tahun 2018, mengundang seluruh alumni  untuk menghadiri serangkaian acara REUNI AKBAR Manajemen Bisnis Syariah STEBI Al-Muhsin Tahun 2018 yang akan dilaksanakan pada bulan Mei 2018 dan acara puncaknya akan dilaksanakan pada :</p>\r\n<p>Hari/tanggal    : Sabtu / 7 Mei 2018</p>\r\n<p>Tempat             :  Jalan Parangtritis KM 3.5 KRAPYAK WETAN NO.280 Yogyakarta.</p>\r\n<p>Mari kita ramaikan dan meriahkan acara Reuni Akbar Manajemen Bisnis Syariah STEBI Al-Muhsin Tahun 2018.</p>\r\n<p>Sampai bertemu di Yogyakarta dalam acara Reuni Akbar Manajemen Bisnis Syariah STEBI Al-Muhsin Tahun 2018.</p>\r\n<p><em>Salam,</em></p>\r\n<p><em>Panitia</em></p>', 'ini_gambar1.jpg', '5150411222', '2018-08-06'),
(29, 'PT Hydril Indonesia ', '2018-07-12 10:10:35', 'Lowongan Pekerjaan', '<article class="single-post ">\r\n<div class="post-content">\r\n<p>Profile &#40;Minimum Requirements&#41;:</p>\r\n<ul>\r\n<li>Bachelor’s Degree – Engineering machinery / industry</li>\r\n<li>GPA 3.0 +</li>\r\n<li>Actively organize</li>\r\n<li>Able to communicate in english actively</li>\r\n<li>Able to work in teams</li>\r\n<li>Have leadership skills</li>\r\n<li>Previous training & development experience preferred</li>\r\n<li>High level of computer literacy (specially excel and learning management systems)</li>\r\n<li>Interest in international/ domestic travel</li>\r\n<li>Multicultural openness.</li>\r\n</ul>\r\n<p>Please send the updated resume with subject GT Operation in Tenaris Hydril Batam to <a href="mailto:HBISRITAUFIK@TENARIS.COM">HBISRITAUFIK@TENARIS.COM</a></p>\r\n<p> </p>\r\n</div>\r\n</article>', 'images.png', 'admin', '2018-08-29'),
(32, 'Start UP Nano Techno', '2018-07-15 16:15:28', 'Lowongan Pekerjaan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'images2.png', '5160111048', '2018-07-25'),
(33, 'Buka Bersama Alumni Perbankan Syariah 16', '2018-07-21 08:39:41', 'Berita Alumni', '<p>Assalamualaikum.</p>\r\n<p>info : kami akan mengadakan acara buka bersama di bulan ramadhan tahun ini,yg rencana nya dalam kepanitiaan kami akan melibatkan teman2 dari alumni perbankan syariah 2016. undangan terbatas hanya 100 orang baik keluarga alumni perbankan syariah 2016 maupun bukan,u/ donasi belum kami tentukan,bagi yg ingin berpartisipasi dan tidak dapat menghadiri acara tersebut, dapat mendonasikan dana melalui rekening yg nanti akan kami umumkan atau dapat menyalurkan melalui teman2 yg nanti kami tunjuk untuk menjadi koordinator area,karena dana tersebut akan kami sumbangkan ke yayasan yg telah kami tunjuk.</p>\r\n<p>teman2 bisa infokan acara tsb ke teman2 yg lain.</p>\r\n<p>mohon support dan doanya,mudah2an acara ini kan terealisasi dengan baik,Amin</p>\r\n<p>thx</p>', '6fd5ca4530e63ece70b6ca098b9db367.jpg', '5150411222', '2018-08-06'),
(34, 'Accounting Staff PT. Kurnia Makmur ', '2018-07-27 18:51:19', 'Lowongan Pekerjaan', '<div>\r\n<p>PT. Kurnia Makmur Abadi Jaya bergerak di bidang usaha perdagangan dan distribusi bahan kimia industri dan alat laboratorium berlokasi di Semarang, Jawa Tengah, sedang membutuhkan staff administrasi dan akunting</p>\r\n</div>\r\n<h5>Tanggung Jawab Pekerjaan :</h5>\r\n<div>\r\n<p>-Mengurus administrasi keuangan<br>-Mengurus input data transaksi keuangan<br>-Menyusun laporan keuangan dan jurnal akuntansi<br>-Mengurus SPT badan<br>-Mengurus PPN<br>-Melakukan stock opname di gudang bila dibutuhkan</p>\r\n</div>\r\n<h5>Syarat Pengalaman :</h5>\r\n<div>Pengalaman minimal 2th di bidang yang sama</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>-Menguasai MS office<br>-Mengerti perpajakan, SPT badan<br>-Menguasai penyusunan neraca keuangan</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>-Usia maksimal 35thn<br>-Teliti, jujur dan bertanggung jawa</p>\r\n</div>', 'HCB3-150x150.png', '5160111048', '2018-09-29'),
(35, 'Accounting Supervisor Company Confidential Trading', '2018-07-30 08:34:20', 'Lowongan Pekerjaan', '<div class="i-matte">\r\n<div class="b-matte">\r\n<section class="b-matte__content">\r\n<p>Kantor Konsultan Pajak Terdaftar membutuhkan tenaga profesional  untuk wilayah Jakarta Utara ( Lokasi Pluit )<br>Accounting Supervisor</p>\r\n<ul>\r\n<li>Pria / Wanita</li>\r\n<li>S1 Akuntansi</li>\r\n<li>Menguasai Microsoft Office, eSPT, eFaktur</li>\r\n<li>Gaji dan bonus menarik</li>\r\n</ul>\r\n<p>Kirim  Lamaran lengkap beserta Pasphoto  terbaru  via Email ke :  ( Cantumkan kode "KR" di Surat Lamaran )<br>btchconsulting@gmail.com<br><br>Interview akan dilakukan di masing-masing lokasi yang dilamar</p>\r\n</section>\r\n</div>\r\n</div>\r\n<div class="i-matte">\r\n<div class="b-matte"><header class="b-matte__header">Tanggung Jawab</header>\r\n<section class="b-matte__content">\r\n<ul>\r\n<li>Menganalisa dan memonitor setiap transaksi yang terjadi di perusahaan</li>\r\n<li>Menyiapkan laporan keuangan dalam tenggat waktu</li>\r\n<li>Bekerjasama dengan financial officer</li>\r\n<li>Memverifikasi faktur yang telah diajukan untuk disetujui dan menyampaikan ke kepala divisi</li>\r\n<li>Memantau aset fisik perusahaan, nilai depresiasi, dan mengambil langkah-langkah efisien untuk mengelolanya</li>\r\n<li>Membantu auditor eksternal maupun internal selama proses auditing</li>\r\n<li>Serta kegiatan yang berhubungan dengan accounting lainnya.</li>\r\n<li><img src="http://localhost/CI_SIA/upload/berita/HCB3-150x1501.png" alt="" width="150" height="150"></li>\r\n</ul>\r\n</section>\r\n</div>\r\n</div>', '5f7976e3cba1768361241e98a979b6f0.jpg', '5150411222', '2018-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`) VALUES
(1, 'Ekonomi dan Bisnis Islam');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `url`, `keterangan`) VALUES
(1, '1.jpg', NULL),
(2, '2.jpg', NULL),
(3, '3.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `nama_kampus` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `link_facebook` varchar(100) DEFAULT NULL,
  `link_twitter` varchar(100) DEFAULT NULL,
  `link_instagram` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `logo` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`nama_kampus`, `alamat`, `link_facebook`, `link_twitter`, `link_instagram`, `telepon`, `email`, `logo`) VALUES
('STEBI Al-Muhsin', 'Jalan Parangtritis KM 3.5 KRAPYAK WETAN NO.280 Yogyakarta', 'Stebi Al-Muhsin ', '@stebi_almuhsin ', '@stebi_almuhsin ', '021-222-188', 'stebi.almuhsin@gmail.com', '46edb3b836e80a20ada71024e6223258.png');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `author` varchar(15) NOT NULL,
  `waktu` datetime NOT NULL,
  `isi` varchar(100) DEFAULT NULL,
  `id_parent_comment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_berita`, `author`, `waktu`, `isi`, `id_parent_comment`) VALUES
(3, 22, 'admin', '2018-07-05 18:42:09', 'ff', NULL),
(4, 22, 'admin', '2018-07-05 18:42:16', 'ddd', NULL),
(8, 22, 'admin', '2018-07-12 14:49:41', 'a', NULL),
(10, 22, '5160111048', '2018-07-12 15:02:20', 'hai', NULL),
(12, 22, 'admin', '2018-07-12 15:03:49', 'f', NULL),
(13, 22, 'admin', '2018-07-12 15:03:56', 'hellllo', NULL),
(14, 22, 'admin', '2018-07-12 18:41:59', NULL, NULL),
(15, 22, 'admin', '2018-07-13 10:31:19', 'hai', NULL),
(48, 22, '5150411222', '2018-07-14 16:21:13', 'hai bro', 15),
(53, 21, '5150411222', '2018-07-19 15:07:33', 'f', NULL),
(54, 22, '5150411222', '2018-07-21 08:40:56', 'iya bro', 48),
(60, 29, '5160111048', '2018-07-23 11:32:19', 'oke', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `program_studi` int(11) DEFAULT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status_` enum('aktif','nonaktif','lulus','cuti') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `angkatan`, `program_studi`, `telepon`, `email`, `status_`) VALUES
('44123', 'Ahmad Faisal', 'jl. Matahari no.12', '1996-12-07', 'Semarang', 'L', '2015', 1, '0812345111', 'ahmad@ggwp.id', 'lulus'),
('44124', 'Ria Ratnasari', 'jl. Melati no.02 Malang', '1997-07-12', 'Malang', 'P', '2015', 1, '081423414', 'ria_ratnasari@gmail.com', 'lulus'),
('44125', 'Pramita Dyah Ayu', 'jl. Pacar 34', '1998-04-15', 'Bojonegoro', 'P', '2015', 2, '0823231313', 'pramita@gmail.com', 'aktif'),
('44126', 'Renita Erdiana', 'jl. Tugu no.48', '1997-12-20', 'Trenggalek', 'P', '2015', 2, '0858781234', 'reni@yahoo.com', 'aktif'),
('44127', 'Tina Margareta', 'jl. Sumbersari no.17', '1997-06-03', 'Surabaya', 'P', '2016', 1, '081321456', 'tina@gmail.com', 'aktif'),
('44128', 'Teguh Cahyo', 'jl. Sudirman no.14', '1998-01-02', 'Magelang', 'L', '2016', 1, '08233312392', 'teguh11@ymail.com', 'aktif'),
('44129', 'Wisnu Saputra', 'jl. Magelang km.11', '1998-09-11', 'Sleman', 'L', '2016', 2, '084123231', 'wisnu@gmail.com', 'aktif');

--
-- Triggers `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `tambah_alumni` AFTER UPDATE ON `mahasiswa` FOR EACH ROW BEGIN
 DECLARE _nama VARCHAR(50);
 DECLARE _nim VARCHAR(15);
 DECLARE _alamat VARCHAR(50);
 DECLARE _tanggal_lahir DATE;
 DECLARE _jenis_kelamin CHAR(1);
 DECLARE _program_studi CHAR(1);
 DECLARE _password VARCHAR(15);
 DECLARE _tempat_lahir VARCHAR(50);
 DECLARE _telepon VARCHAR(15);
 DECLARE _email VARCHAR(50);
 DECLARE _angkatan VARCHAR(4);
 
 SET _nim=OLD.nim;
SELECT nim INTO _nim FROM mahasiswa WHERE nim=_nim;
SELECT nama INTO _nama FROM mahasiswa WHERE nim=_nim;
SELECT alamat INTO _alamat FROM mahasiswa WHERE nim=_nim;
SELECT tanggal_lahir INTO _tanggal_lahir FROM mahasiswa WHERE nim=_nim;
SELECT jenis_kelamin INTO _jenis_kelamin FROM mahasiswa WHERE nim=_nim;
SELECT program_studi INTO _program_studi FROM mahasiswa WHERE nim=_nim;
SELECT nim INTO _password FROM mahasiswa WHERE nim=_nim;
SELECT angkatan INTO _angkatan FROM mahasiswa WHERE nim=_nim;
SELECT tempat_lahir INTO _tempat_lahir FROM mahasiswa WHERE nim=_nim;
SELECT telepon INTO _telepon FROM mahasiswa WHERE nim=_nim;
SELECT email INTO _email FROM mahasiswa WHERE nim=_nim;
 IF NEW.status_='lulus' THEN
 INSERT INTO alumni VALUES(_nim, _nama, _alamat, _tanggal_lahir,_jenis_kelamin,_angkatan,now(),_program_studi, '',_password,_tempat_lahir,_telepon,_email,'','');
 END IF;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_fakultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id`, `nama`, `id_fakultas`) VALUES
(1, '(S1) Perbankan Syariah', 1),
(2, '(S1) Manajemen Bisnis Syariah', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `program_studi` (`program_studi`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

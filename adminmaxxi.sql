-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2018 at 03:40 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminmaxxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` int(11) NOT NULL,
  `NamaKaryawan` text NOT NULL,
  `Jabatan` int(11) NOT NULL,
  `gambar` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `NamaKaryawan`, `Jabatan`, `gambar`, `FlagActive`) VALUES
(1, 'Caroline Josephine Pranata', 1, '', 'Y'),
(2, 'Felix Yosafat. S.Sos', 2, 'Felix-Yosafat.-S.Sos.jpg', 'Y'),
(3, 'Sahat Simbolon. S.Kom, S.E.', 3, 'Sahat-Simbolon.-S.Kom,-S.E..jpg', 'Y'),
(4, 'Erikson Sihombing', 4, '', 'Y'),
(5, 'Piator Simangunsong', 4, '', 'Y'),
(6, 'Suryadi', 5, '', 'Y'),
(7, 'Ajat Sudajat', 5, '', 'Y'),
(8, 'Maria Magdalena', 6, '', 'Y'),
(9, 'Siti Farra Fatimah Zahra', 6, '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_background`
--

CREATE TABLE `ms_background` (
  `No` int(11) NOT NULL,
  `Image` text NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_background`
--

INSERT INTO `ms_background` (`No`, `Image`, `FlagActive`) VALUES
(1, 'cargoship.png', 'Y'),
(2, '20151106173349_1713.jpg', 'Y'),
(3, 'wingbox.jpg', 'Y'),
(4, 'team.jpg', 'Y'),
(5, '20160824_131911.jpg', 'Y'),
(6, '20160824_131733.jpg', 'Y'),
(7, 'gudangs.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_compro`
--

CREATE TABLE `ms_compro` (
  `id_compro` int(11) NOT NULL,
  `header` text NOT NULL,
  `isi` text NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_compro`
--

INSERT INTO `ms_compro` (`id_compro`, `header`, `isi`, `FlagActive`) VALUES
(1, 'About Us', '<p>Perusahaan ini berdiri sejak tahun 1998 dengan nama semula PT. Putera Perdana International (sesuai Akte Notaris Juliaan Nimrod Siregar, SH, No 75 tanggal 12 November 1999).</p><p>Pada tahun 2000, seluruh saham dan management perusahaan diambil alih oleh GroupRaplima Utama dan nama perusahaan berubah menjadi PT. Perdana Maxxi International (Akte Notaris Rusnaldy, SH, No.5-X-2000 tanggal 25 Maret 2000).<br></p>', 'Y'),
(2, 'Licenses', '<ol><li>Pengesahan Akta Pendirian No.C-13391 HT.01.01.TH.2003</li><li>Persetujuan Akta Perubahan No.C-23397 HT.01.04.TH.2005</li><li>Persetujuan Akta Perubahan AHU-51703.AH.01.02.TH.2008</li><li>Surat Pengukuhan Pengusaha Kena Pajak No.PEM-085/WPJ.20/Kp.0103/2007</li><li>Surat Keterangan Domisili Perusahaan No.0369/1.824.1/09</li><li>Surat Izin Jasa Pengurusan Transportasi ( SIUJPT ) No.13/ SIUJPT / DISHUB / I / 2006</li><li>Tanda Daftar Perusahaan Perseroan Terbatas No.09.04.1.63.19109</li><li>Surat Keterangan Terdaftar No. PEM-02/WPJ.20/KP.0103/2006</li><li>Surat Izin Tempat Usaha No. SK.1372/09/08</li><li>Nomor Pokok Wajib Pajak No.02.245.458.1-001.000<br></li></ol>', 'Y'),
(3, 'Tujuan Perusahaan', '<p>PT Perdana Maxxi International berdiri untuk membantu meningkatkan perdagangan dalam negeri dengan membantu pengiriman dalam negeri secara tepat dan aman di Indonesia, serta pengiriman eksport&nbsp; dan&nbsp; import.</p><p>Perkembangan&nbsp; teknologi&nbsp; dan&nbsp; peningkatkan&nbsp; kegiatan&nbsp; ekonomi&nbsp; di&nbsp; berbagai sektor usaha telah menumbuhkan permintaan yang dinamis akan jasa-jasa angkutan dalam maupun luar negeri dengan volume dan kapasitas yang besar.</p><p> Untuk dapat memberikan proteksi dan layanan yang&nbsp; cepat,&nbsp; fleksibel&nbsp; dan&nbsp; terpercaya&nbsp; maka&nbsp; PT.&nbsp; Perdana&nbsp; Maxxi&nbsp; International&nbsp; telah&nbsp; menjalin kerjasama dengan perusahaan â€“ perusahaan forwading dan shipping yang ada di dalam dan diluar negeri karena hanya dengan pengelolaan penyebaran yang di dukung dengan kepentingan mitra usaha / customer akan terjamin dengan aman dan terpercaya.Untuk dapat menjamin keamanan dari jasa&nbsp; yang&nbsp; kami&nbsp; berikan,&nbsp; kami&nbsp; telah&nbsp; menjalin&nbsp; kerjasama&nbsp; dengan <b>PT. Howden&nbsp; Indonesia</b>&nbsp; sebagai Perusahaan Broker Asuransi termuka.<br></p>', 'Y'),
(4, 'Visi & Misi Perusahaan', '<p>Memberikan <b>Maximum Service </b>kepada Perusahaan dan Perorangan dengan rasa <b>AMAN, CEPAT, dan TEPAT </b>dalam meningkatkan perdanganan, export, import, dan domestic serta dengan <b>Harga </b>yang sangat kompetitif.</p>', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_customer`
--

CREATE TABLE `ms_customer` (
  `idCustomer` int(11) NOT NULL,
  `NamaCustomer` text NOT NULL,
  `Image` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_customer`
--

INSERT INTO `ms_customer` (`idCustomer`, `NamaCustomer`, `Image`, `FlagActive`) VALUES
(1, 'PT. Ford Motor Indonesia', 'PT.-Ford-Motor-Indonesia.jpg', 'Y'),
(2, 'PT. Lautan Luas', 'PT.-Lautan-Luas.jpg', 'Y'),
(3, 'PT. Kenko Kanzen Indonesia', 'PT.-Kenko-Kanzen-Indonesia.jpg', 'Y'),
(4, 'CV. Kobe & Lina Food', 'CV.-Kobe-&-Lina-Food.jpg', 'Y'),
(5, 'PT. Prasetya Gema Mulia', 'PT.-Prasetya-Gema-Mulia.jpg', 'Y'),
(6, 'Bumi Paradise', 'Bumi-Paradise.png', 'Y'),
(7, 'PT. Zentro', 'PT.-Zentro.jpg', 'Y'),
(8, 'Takenaka Doboku Indonesia', 'Takenaka-Doboku-Indonesia.jpg', 'Y'),
(9, 'PT. Tunas Daya Mustika', 'PT.-Tunas-Daya-Mustika.jpg', 'Y'),
(10, 'CMC', 'CMC.jpg', 'Y'),
(11, 'Indokomas', 'Indokomas.jpg', 'Y'),
(12, 'PT. Hanwa Indonesia', 'PT.-Hanwa-Indonesia.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_experience`
--

CREATE TABLE `ms_experience` (
  `id_e` int(11) NOT NULL,
  `keterangan` text,
  `gambar` text NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_experience`
--

INSERT INTO `ms_experience` (`id_e`, `keterangan`, `gambar`, `FlagActive`) VALUES
(1, 'kita coba gan', 'kita-coba-gan.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_facility`
--

CREATE TABLE `ms_facility` (
  `id_facility` int(11) NOT NULL,
  `header` text NOT NULL,
  `keterangan` text,
  `gambar` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_facility`
--

INSERT INTO `ms_facility` (`id_facility`, `header`, `keterangan`, `gambar`, `FlagActive`) VALUES
(1, 'Kantor Pusat', 'Kantor pusat dengan letak strategis dan mempermudah armada kendaraan untuk keluar-masuk kantor', '20160824_131733.jpg', 'Y'),
(2, 'Pool/Kantor Cabang', 'Tersedianya pool kendaraan yang dimiliki serta memiliki kantor cabang di luar kota untuk membantu mengantarkan barang sampai tujuan', 'poolmaxxi.jpg', 'Y'),
(3, 'Armada Maxxi', 'Tersedianya armada truk Maxxi yang bisa digunakan untuk mengangkut barang Anda sampai tujuan', 'armadamaxxi.jpg', 'Y'),
(4, 'Gudang', 'Adanya gudang yang digunakan untuk menyimpan barang Anda sebelum pengiriman agar barang kiriman Anda tidak mengalami kerusakan', 'gudangs.jpg', 'Y'),
(5, 'Gudang di pool', 'Adanya gudang di pool agar barang Anda tetap terjaga', 'gudangpool.jpg', 'Y'),
(6, 'Our Office Inside', 'Penampakan tempat kerja karyawan operasional', 'kantordalem.jpg', 'Y'),
(7, 'Our Front Office', NULL, 'front.jpg', 'Y'),
(8, 'Our Crane', NULL, 'P_09062016044933_photocollage.jpg', 'Y'),
(9, 'Our Forklift', NULL, 'FORKLIFT-STACKER-HYDRAULIC-1000-KG-STRADDLE-LEG-MANUAL-TWM-172029914247-3.jpg', 'Y'),
(10, 'test', NULL, 'air-freight-worldwide.jpg', 'Y'),
(11, 'testing', NULL, '1055140-pure-background.jpg', 'N'),
(12, 'testing', NULL, '1055140-pure-background.jpg', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `ms_fleet`
--

CREATE TABLE `ms_fleet` (
  `No` int(11) NOT NULL,
  `NoPolisi` varchar(10) NOT NULL,
  `NamaSupir` text NOT NULL,
  `NickName` text NOT NULL,
  `JenisArmada` text NOT NULL,
  `TahunPembuatan` int(4) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_fleet`
--

INSERT INTO `ms_fleet` (`No`, `NoPolisi`, `NamaSupir`, `NickName`, `JenisArmada`, `TahunPembuatan`, `FlagActive`) VALUES
(1, 'B 9123 TYT', 'Andika', 'Andika', 'Tronton Hino', 2010, 'Y'),
(2, 'B 9271 TYT', 'Kurniawan', 'Wawan', 'Tronton Hino', 2010, 'Y'),
(3, 'B 9414 TYT', 'Ican', 'Ican', 'Tronton Hino', 2010, 'Y'),
(4, 'B 9384 TYT', 'Isnadi', 'Is', 'Tronton Hino', 2010, 'Y'),
(5, 'B 9897 TYT', 'Ponijan', 'Sapon', 'Tronton Hino', 2011, 'Y'),
(6, 'B 9899 TYT', 'Indra Saputra', 'Aseng', 'Tronton Hino', 2011, 'Y'),
(7, 'B 9058 TYU', 'Rudi Hartono', 'Rudi', 'Tronton Hino', 2011, 'Y'),
(8, 'B 9129 TYU', 'Bejo', 'Bejo', 'Tronton Hino', 2011, 'Y'),
(9, 'B 9227 TYU', 'Juniarto', 'Rian', 'Tronton Hino', 2011, 'Y'),
(10, 'B 9226 TYU', 'Sutriono', 'Sisu', 'Tronton Hino', 2011, 'Y'),
(11, 'B 9385 TYU', 'Elyakin', 'Serly', 'Tronton Hino', 2012, 'Y'),
(12, 'B 9680 TYU', 'Erwin', 'Erwin', 'Tronton Hino', 2012, 'Y'),
(13, 'B 9720 TYU', 'Abdul Muklis', 'Muklis', 'Tronton Hino', 2012, 'Y'),
(14, 'B 9820 TYU', 'Kusmadi', 'Midun', 'Tronton Hino', 2012, 'Y'),
(15, 'B 9366 BI', 'Samiran', 'Samiran', 'Tronton Hino', 2012, 'Y'),
(16, 'B 9366 VI', 'Tomi Andani', 'Tomi', 'Tronton Hino', 2012, 'Y'),
(17, 'B 9373 TYW', 'Irwansyah', 'Iwan', 'Tronton Hino', 2013, 'Y'),
(18, 'B 9366 NI', 'Kirsam', 'Kirsam', 'Tronton Hino', 2012, 'Y'),
(19, 'B 9366 XJ', 'Gunawan', 'Gugun', 'Tronton Hino', 2012, 'Y'),
(20, 'B 9366 JN', 'Ngadimun', 'Gimun', 'Tronton Hino', 2012, 'Y'),
(21, 'B 9561 TYW', 'Ardi Siboro', 'Boro', 'Tronton Hino', 2013, 'Y'),
(22, 'B 9828 TYW', 'Windra', 'Wiwin', 'Tronton Hino', 2013, 'Y'),
(23, 'B 9937 TYW', 'Rusli Ginting', 'Rusli', 'Tronton Hino', 2014, 'Y'),
(24, 'B 9959 TYW', 'Tarigan', 'Tarigan', 'Tronton Hino', 2014, 'Y'),
(25, 'B 9963 TYW', 'Gunawan', 'Gunawan', 'Tronton Hino', 2014, 'Y'),
(26, 'BK 8286 XS', 'Agus Heri', 'Agus', 'Engkel Fuso', 1994, 'Y'),
(27, 'B 9063 TXR', 'Ajo', 'Ajo', 'CDD Dutro Jumbo', 2010, 'Y'),
(28, 'B 9786 QA', 'Vanderppin S', 'Sitorus', 'CDE Mitsubishi', 2010, 'Y'),
(29, 'B 9278 BYX', 'Siregar', 'Regar', 'Tronton Hino', 2013, 'Y'),
(30, 'B 9279 BYX', 'Santoso', 'Gondrong', 'Tronton Hino', 2013, 'Y'),
(31, 'B 9060 PCJ', 'Bernadus P', 'Nandar', 'CDE Isuzu', 2014, 'Y'),
(32, 'B 9322 NAJ', 'Dewanto', 'Dedi', 'Daihatsu GrandMax', 2013, 'Y'),
(33, 'B 9101 SJ', 'Setiawan', 'Iwan', 'CDE Isuzu', 2007, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_harga`
--

CREATE TABLE `ms_harga` (
  `ID_Harga` int(11) NOT NULL,
  `ID_Pelanggan` int(11) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_jabatan`
--

CREATE TABLE `ms_jabatan` (
  `idJabatan` int(11) NOT NULL,
  `NamaJabatan` text NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_jabatan`
--

INSERT INTO `ms_jabatan` (`idJabatan`, `NamaJabatan`, `FlagActive`) VALUES
(1, 'Komisaris Utama', 'Y'),
(2, 'Direktur Utama', 'Y'),
(3, 'Direktur Marketing & Operasional', 'Y'),
(4, 'Manager Marketing', 'Y'),
(5, 'Manager Operasional', 'Y'),
(6, 'Manager Keuangan', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_karyawan`
--

CREATE TABLE `ms_karyawan` (
  `KodeKaryawan` varchar(6) NOT NULL,
  `NamaKaryawan` text NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ID_Role` int(11) NOT NULL,
  `Foto` text NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_karyawan`
--

INSERT INTO `ms_karyawan` (`KodeKaryawan`, `NamaKaryawan`, `Password`, `ID_Role`, `Foto`, `FlagActive`) VALUES
('0000', 'Administrator', '$2y$10$jcSjVAPQuo/vP326nsNMTubDPPZ.slUoggDy8Q/TMrI/quKmcpr6W', 1, '', 'Y'),
('0001', 'Director', '$2y$10$VM6op8KxC/3lMdPcxQ87audLLl3SZPDXdaQOgMuwfcxmmE0vBuIcK', 2, '', 'Y'),
('0002', 'HRD', '$2y$10$etjxn0cpNewzeDDRG07Jeer9KAE7LyaoQ/5zl4jj1kKKR/.GE12EC', 3, '', 'Y'),
('0003', 'Employee', '$2y$10$HZ3D5OOZgKgA2b8PESaZ/.TqjLsytKxQN0F03PgHbiN3Li03BWSVy', 4, '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_menu`
--

CREATE TABLE `ms_menu` (
  `ID_Menu` int(11) NOT NULL,
  `NamaMenu` text NOT NULL,
  `URL` text NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_menu`
--

INSERT INTO `ms_menu` (`ID_Menu`, `NamaMenu`, `URL`, `FlagActive`) VALUES
(1, 'Fleet', 'Fleet', 'Y'),
(2, 'Customers', 'Customers', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_services`
--

CREATE TABLE `ms_services` (
  `id_service` int(11) NOT NULL,
  `judul` text NOT NULL,
  `judulseo` text NOT NULL,
  `isi` text NOT NULL,
  `background` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_services`
--

INSERT INTO `ms_services` (`id_service`, `judul`, `judulseo`, `isi`, `background`, `FlagActive`) VALUES
(1, 'Land Transportation', 'Land-Transportation', '<p>Maxxi menjadi rekan terpercaya anda dengan sejumlah armada sendiri (own\r\n fleet thn produksi 2010 ke atas) yang terawat dan di bawa oleh supir \r\nprofesional dengan pengalaman berkendara lebih dari 3 tahun. Dengan ini \r\nkami siap untuk memenuhi kebutuhan pengiriman barang anda berupa :\r\n                </p><ul><li id=\"down\">Sewa Truk/Charter</li><p id=\"popup\" style=\"overflow: hidden; height: 1.90346px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0.475865px;\">Untuk mempercepat dan mengamankan pengiriman Anda tanpa barang lain selain barang Anda dalam truk</p><li id=\"down1\">Campuran/Combine</li><p id=\"popup1\" style=\"overflow: hidden; height: 0.681483px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0.170371px;\">Pengiriman\r\n via trucking guna mendapatkan biaya yang sangat murah, dan tetap aman \r\ndan tepat waktu sesuai dengan tujuan yang sudah ditentukan</p><li id=\"down2\">Pindahan</li><p id=\"popup2\" style=\"overflow: hidden; height: 0.0395893px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0.0197947px;\">Membantu Anda mengangkut barang perumahan/kantor ataupun pabrik</p><li>Event/Pameran</li><li>Pengiriman barang kimia dan industri, sparepart dan mesin</li><li>Pengiriman barang besar dan spesial delivery</li></ul>', 'Land-Transportation.jpg', 'Y'),
(2, 'Air Transportation', 'Air-Transportation', '<p style=\"color:black;\">Maxxi juga sangat membantu pengiriman ke seluruh\r\n Indonesia dengan pesawat udara baik door to door maupun pengiriman door\r\n to port seperti :\r\n                </p>\r\n                <ul><li>Reguler services 3-4 hari</li><li>One day services/express</li><li id=\"down\">Special delivery service</li></ul>', 'Air-Transportation.jpg', 'Y'),
(3, 'Sea Transportation', 'Sea-Transportation', '<p style=\"color:black;\">Maxxi \r\njuga bisa diandalkan untuk pengiriman antar pulau di seluruah Indonesia \r\nbaik door to door ataupun door to port ataupun permintaan khusus dalam \r\npengiriman. Dimana kami mengadakan kerjasama kontrak dengan beberapa \r\npelayaran seperti Temas Line, Meratus, Tanto, dan lain-lain, berupa:\r\n                </p>\r\n                <ul><li>Pengirman FULL container 20â€,40â€, 40 HC, 45â€ dan LCL</li><li>Break Bulk (Tanpa Container)</li><li id=\"down\">LCT (900dwt, 1200dwt), Tug dan Barge Charter Services (full LCT /combined)</li></ul>    \r\n            \r\n        ', 'Sea-Transportation.png', 'Y'),
(4, 'Packing Services', 'Packing-Services', '<p style=\"color:black;\">Maxxi \r\ntetap mengedepankan keselamatan dan keutuhan barang yang kami kirim.\r\n                Packing bisa menjadi pilihan untuk menghindari ataupun \r\nmengurangi kerusakan dalam pengiriman itu. Kami juga menyediakan packing\r\n barang dengan kualitas ekspor ataupun untuk kemasan pindahan barang \r\n(moving) ataupun alat-alat pecah belah yang mudah rusak ataupun \r\nbarang-barang karya seni.</p>\r\n            \r\n        ', 'Packing-Services.jpg', 'Y'),
(5, 'Insurance Delivery (Cargo Insurance)', 'Insurance-Delivery-(Cargo-Insurance)', 'PT. Perdana maxxi International telah bekerjasama dengan Perusahaan Asuransi terpercaya dengan <strong>Produk Marine Open Cover</strong> dan Perusahaan Asuransi <strong>Howden Indonesia</strong>.\r\n Seluruh pengiriman melalui Maxxi kami cover maximum 100 juta per \r\nkirim/shipment, jika ada kerusakan ataupun kehilangan barang dikarenakan\r\n oleh pengiriman yang kami lakukan.<br>\r\n                Kami juga menyediakan rate khusus jika customer kami \r\nhanya mau mengasuransikan barang kirimannya kepada kami tanpa kami yang \r\nmelakukan pengiriman.', 'Insurance-Delivery-(Cargo-Insurance).jpg', 'Y'),
(6, 'Intermoda and Multimoda', 'Intermoda-and-Multimoda', '<p>Untuk mempermudah customer \r\nkami juga bisa membantu pengiriman yang menggunakan pengiriman darat \r\nyang dilanjutkan dengan penggiriman laut dan udara (mix) dengan \r\nmelakukan manajemen transportasi untuk mempermudah pengiriman barang \r\nyang hendak dikirim.</p>\r\n            \r\n        ', 'Intermoda-and-Multimoda.jpg', 'Y'),
(7, 'Global Airfrieght and Ocean Freight for Export', 'Global-Airfrieght-and-Ocean-Freight-for-Export', 'Maxxi juga melayani pengiriman untuk Ekspor dan Impor dengan layanan \r\nmelalui udara dan laut, sehinggan Anda bisa mengirim barang Anda keluar \r\nmaupun ke dalam Negeri dengan jasa perusahaan Maxxi', 'Global-Airfrieght-and-Ocean-Freight-for-Export.jpg', 'Y'),
(8, 'Export,Import and Custom Clearencence', 'Export,Import-and-Custom-Clearencence', 'Maxxi juga bisa membantu Anda dalam pengiriman ekspor dan impor serta \r\nbisa mambantu agar barang Anda bisa melewati Bea Cukai dan sampai pada \r\ntujuannya', 'Export,Import-and-Custom-Clearencence.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_servicesimage`
--

CREATE TABLE `ms_servicesimage` (
  `id_image` int(11) NOT NULL,
  `isi` text NOT NULL,
  `id_service` int(11) NOT NULL,
  `Image` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_servicesimage`
--

INSERT INTO `ms_servicesimage` (`id_image`, `isi`, `id_service`, `Image`, `FlagActive`) VALUES
(1, 'Wingbox', 1, 'wingbox.jpg', 'Y'),
(2, 'Truk Krudung', 1, 'truckkrudung.jpg', 'Y'),
(3, 'Armada Truk Maxxi', 1, 'armadamaxxi.jpg', 'Y'),
(4, 'Truk di Pool Maxxi', 1, 'pool.jpg', 'Y'),
(5, 'Pengiriman dengan menggunakan jasa penerbangan terpercaya', 2, 'air-transport-texto_largo_imagen1.aeaeb40a97cee773f82cfb6d9d921c9321.jpg', 'Y'),
(6, 'Container 20 Feet', 3, '20-dry.jpg', 'Y'),
(7, 'Container 40 Feet', 3, 'Dry_container_40PW_Palle_wide_01.jpg', 'Y'),
(8, 'Container 40 Feet High Cube', 3, '40HC-Container.jpg', 'Y'),
(9, 'Container 45 Feet', 3, 'download_005.jpg', 'Y'),
(10, 'Less than Container Load', 3, 'selfpack_containers1.jpg', 'Y'),
(11, 'Break Bulk (Tanpa Container)', 3, 'break-bulk-16-pressen-10.png', 'Y'),
(12, 'LCT (900 dwt, 1200 dwt), Tug and Barge Charter Services (full LCT /combined)', 3, 'mulia_jaya_2-ed279-631_132-t598_13.jpg', 'Y'),
(13, '', 4, 'packing.jpg', 'Y'),
(14, '', 4, 'packingservice.jpg', 'Y'),
(15, '', 4, 'packing1.jpg', 'Y'),
(16, '', 5, 'howden_logo.gif', 'Y'),
(17, '', 5, 'marine-open-cover.jpg', 'Y'),
(18, '', 6, '11190.jpg', 'Y'),
(19, '', 7, 'IMG-20160823-WA0003.jpg', 'Y'),
(20, '', 8, 'IMG-20160823-WA0003.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_submenu`
--

CREATE TABLE `ms_submenu` (
  `ID_SubMenu` int(11) NOT NULL,
  `ID_Menu` int(11) NOT NULL,
  `NamaSubMenu` text NOT NULL,
  `URL` text NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_authorizemenu`
--

CREATE TABLE `tr_authorizemenu` (
  `ID_AuthorizeMenu` int(11) NOT NULL,
  `ID_Menu` int(11) NOT NULL,
  `KodeKaryawan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_authorizemenu`
--

INSERT INTO `tr_authorizemenu` (`ID_AuthorizeMenu`, `ID_Menu`, `KodeKaryawan`) VALUES
(1, 1, '0000'),
(2, 2, '0000');

-- --------------------------------------------------------

--
-- Table structure for table `tr_authorizesubmenu`
--

CREATE TABLE `tr_authorizesubmenu` (
  `ID_AuthorizeSubMenu` int(11) NOT NULL,
  `ID_SubMenu` int(11) NOT NULL,
  `KodeKaryawan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_email`
--

CREATE TABLE `tr_email` (
  `id` int(11) NOT NULL,
  `NamaPengirim` text NOT NULL,
  `EmailPengirim` text NOT NULL,
  `Subject` text NOT NULL,
  `IsiEmail` text NOT NULL,
  `TanggalKirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idKaryawan`),
  ADD KEY `idJabatan` (`Jabatan`);

--
-- Indexes for table `ms_background`
--
ALTER TABLE `ms_background`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `ms_compro`
--
ALTER TABLE `ms_compro`
  ADD PRIMARY KEY (`id_compro`);

--
-- Indexes for table `ms_customer`
--
ALTER TABLE `ms_customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `ms_experience`
--
ALTER TABLE `ms_experience`
  ADD PRIMARY KEY (`id_e`);

--
-- Indexes for table `ms_facility`
--
ALTER TABLE `ms_facility`
  ADD PRIMARY KEY (`id_facility`);

--
-- Indexes for table `ms_fleet`
--
ALTER TABLE `ms_fleet`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `ms_harga`
--
ALTER TABLE `ms_harga`
  ADD PRIMARY KEY (`ID_Harga`),
  ADD KEY `ms_harga_ibfk_1` (`ID_Pelanggan`);

--
-- Indexes for table `ms_jabatan`
--
ALTER TABLE `ms_jabatan`
  ADD PRIMARY KEY (`idJabatan`);

--
-- Indexes for table `ms_karyawan`
--
ALTER TABLE `ms_karyawan`
  ADD PRIMARY KEY (`KodeKaryawan`);

--
-- Indexes for table `ms_menu`
--
ALTER TABLE `ms_menu`
  ADD PRIMARY KEY (`ID_Menu`);

--
-- Indexes for table `ms_services`
--
ALTER TABLE `ms_services`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `ms_servicesimage`
--
ALTER TABLE `ms_servicesimage`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `ms_submenu`
--
ALTER TABLE `ms_submenu`
  ADD PRIMARY KEY (`ID_SubMenu`);

--
-- Indexes for table `tr_authorizemenu`
--
ALTER TABLE `tr_authorizemenu`
  ADD PRIMARY KEY (`ID_AuthorizeMenu`);

--
-- Indexes for table `tr_authorizesubmenu`
--
ALTER TABLE `tr_authorizesubmenu`
  ADD PRIMARY KEY (`ID_AuthorizeSubMenu`);

--
-- Indexes for table `tr_email`
--
ALTER TABLE `tr_email`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ms_background`
--
ALTER TABLE `ms_background`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ms_compro`
--
ALTER TABLE `ms_compro`
  MODIFY `id_compro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ms_customer`
--
ALTER TABLE `ms_customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ms_experience`
--
ALTER TABLE `ms_experience`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_facility`
--
ALTER TABLE `ms_facility`
  MODIFY `id_facility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ms_fleet`
--
ALTER TABLE `ms_fleet`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ms_harga`
--
ALTER TABLE `ms_harga`
  MODIFY `ID_Harga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_jabatan`
--
ALTER TABLE `ms_jabatan`
  MODIFY `idJabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ms_menu`
--
ALTER TABLE `ms_menu`
  MODIFY `ID_Menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ms_services`
--
ALTER TABLE `ms_services`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ms_servicesimage`
--
ALTER TABLE `ms_servicesimage`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ms_submenu`
--
ALTER TABLE `ms_submenu`
  MODIFY `ID_SubMenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_authorizemenu`
--
ALTER TABLE `tr_authorizemenu`
  MODIFY `ID_AuthorizeMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tr_authorizesubmenu`
--
ALTER TABLE `tr_authorizesubmenu`
  MODIFY `ID_AuthorizeSubMenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_email`
--
ALTER TABLE `tr_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `idJabatan` FOREIGN KEY (`Jabatan`) REFERENCES `ms_jabatan` (`idJabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

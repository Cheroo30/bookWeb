-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 12:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(100) DEFAULT NULL,
  `halaman` int(11) DEFAULT NULL,
  `tahun_terbit` date DEFAULT NULL,
  `kode_isbn` varchar(50) DEFAULT NULL,
  `synopsis` text DEFAULT NULL,
  `gambar_bk` varchar(200) DEFAULT NULL,
  `id_genre` int(11) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `id_penulis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `halaman`, `tahun_terbit`, `kode_isbn`, `synopsis`, `gambar_bk`, `id_genre`, `id_penerbit`, `id_penulis`) VALUES
(2, 'Solo Leveling1', 201, '2024-02-28', 'Marvel0092', '1Dunia diserang monster! Muncullah \"hunter\" untuk menyerang monster-monster itu. Di kalangan hunter, ada yang disebut hunter terlemah di dunia. Itulah julukan Seong Jinwoo. Masuk rumah sakit adalah kebiasaannya setelah masuk ke dungeon. Suatu hari, saat melakukan raid, suatu peristiwa tragis menimpanya. Peristiwa itu hampir merenggut nyawanya. Namun, saat tersadar, dia mendapati dirinya masih hidup dan melihat sesuatu yang tidak bisa dilihat orang lain.', '../assets/images/coverBuku/20240219070826Solo_Leveling_Webtoon.png', 1, 1, 1),
(7, 'Demon Slayer', 20, '2024-02-28', 'Marvel0092', 'Berlatar di Jepang pada zaman Taisho, Tanjiro Kamado adalah seorang bocah lelaki baik hati dan cerdas yang tinggal bersama keluarganya dan mencari uang dengan cara menjual arang. Semuanya berubah ketika keluarganya diserang dan dibantai oleh iblis (oni). Tanjiro dan saudarinya Nezuko adalah satu-satunya yang selamat dari insiden tersebut, meskipun Nezuko sekarang telah berubah menjadi iblis—tetapi secara mengejutkan dia masih menunjukkan tanda-tanda emosi dan pemikiran layaknya seorang manusia. Tanjiro kemudian menjadi pembasmi iblis untuk mengembalikan Nezuko menjadi manusia lagi, dan untuk mencegah tragedi yang terjadi pada dia dan adiknya terulang pada orang lain.', '../assets/images/coverBuku/20240219070123Demon_Slayer_-_Kimetsu_no_Yaiba,_volume_1.jpg', 1, 12, 59),
(15, 'Jujutsu Kaisen', 12, '2024-02-06', 'jjt9902', 'Yūji Itadori adalah seorang siswa SMA dengan atletisitas yang tidak wajar yang tinggal di Sendai bersama kakeknya. Ia sering menghindari Klub Lari karena keengganannya pada bidang atletik, meskipun dia memiliki bakat bawaan untuk olahraga tersebut. Sebaliknya, dia memilih untuk bergabung dengan Klub Penelitian Ilmu Gaib, agar dirinya dapat bersantai dan bergaul dengan para seniornya.', '../assets/images/coverBuku20240219071125_gambar_bk.jpg', 1, 15, 58),
(16, 'ChainsawMan', 13, '2024-02-21', 'chn0092', 'Denji memiliki mimpi sederhana—hidup bahagia dan damai, menghabiskan waktu bersama gadis yang disukainya. Namun, ini jauh dari kenyataan, karena Denji dipaksa oleh yakuza untuk membunuh iblis untuk melunasi hutangnya yang besar. Menggunakan iblis peliharaannya Pochita sebagai senjata, dia siap melakukan apa saja dengan sedikit uang.', '../assets/images/coverBuku20240219071444_gambar_bk.jpg', 1, 14, 59),
(17, 'One Piece', 17, '2024-02-13', 'onc2323', 'One Piece (Jepang: ワンピース, Hepburn: Wan Pīsu) adalah sebuah seri manga Jepang yang ditulis dan diilustrasikan oleh Eiichiro Oda. Manga ini telah dimuat di majalah Weekly Shōnen Jump milik Shueisha sejak tanggal 22 Juli 1997, dan telah dibundel menjadi 105 volume tankōbon hingga Maret 2023. Ceritanya mengisahkan petualangan Monkey D. Luffy, seorang anak laki-laki yang memiliki kemampuan tubuh elastis seperti karet setelah memakan Buah Iblis secara tidak disengaja. Luffy bersama kru bajak lautnya, yang dinamakan Bajak Laut Topi Jerami, menjelajahi Grand Line untuk mencari harta karun terbesar di dunia yang dikenal sebagai \"One Piece\" dalam rangka untuk menjadi Raja Bajak Laut yang berikutnya.', '../assets/images/coverBuku/20240306022541images.jfif', 1, 1, 1),
(18, 'Hunter x Hunter', 9, '2024-02-07', 'Hnt192', 'Para pemburu menyisihkan diri untuk menyelesaikan tugas-tugas berbahaya, mulai dari menjelajahi wilayah tak terjamah di dunia hingga menemukan barang langka dan monster. Sebelum menjadi seorang Pemburu, seseorang harus lulus Ujian Pemburu—proses seleksi berisiko tinggi di mana sebagian besar pelamar akhirnya cacat atau bahkan tewas.\r\n\r\nPeserta yang ambisius yang menantang ujian terkenal membawa alasan mereka sendiri. Yang mendorong Gon Freecss yang berusia 12 tahun adalah untuk menemukan Ging, ayahnya dan seorang Pemburu itu sendiri. Dengan percaya bahwa dia akan bertemu dengan ayahnya dengan menjadi seorang Pemburu, Gon mengambil langkah pertama untuk berjalan di jalur yang sama.\r\n\r\nSelama Ujian Pemburu, Gon berteman dengan mahasiswa kedokteran Leorio Paladiknight, Kurapika yang penuh dendam, dan mantan pembunuh bayaran Killua Zoldyck. Meskipun motif mereka sangat berbeda satu sama lain, mereka bergabung untuk tujuan yang sama dan mulai menjelajahi dunia yang penuh bahaya.', '../assets/images/coverBuku20240219073933_gambar_bk.jpg', 1, 10, 1),
(22, 'Tokyo Ghoul', 12, '2024-03-03', 'tky3294', 'Ken Kaneki, yang hampir tidak dapat bertahan hidup setelah pertemuan mematikan dengan Rize Kamishiro, seorang wanita yang diturunkan menjadi ghoul, yaitu makhluk mirip manusia yang memburu dan memakan daging manusia, dibawa ke rumah sakit dalam kondisi kritis. Setelah sembuh, Kaneki menemukan bahwa entah bagaimana ia menjalani operasi yang mengubahnya menjadi setengah ghoul, dan seperti mereka, harus mengkonsumsi daging manusia untuk bertahan hidup juga.', '../assets/images/coverBuku20240305072929_gambar_bk.jpg', 1, 15, 58),
(23, 'Dr. Stone', 14, '2024-03-01', 'drs12763', '3700 tahun setelah kilatan cahaya hijau misterius mengubah umat manusia menjadi batu, seorang remaja jenius bernama Senku Ishigami bangkit dan menemukan dirinya di dunia tempat di mana semua jejak peradaban manusia telah terkikis oleh waktu. Senku yang menyadari bahwa dirinya dibangkitkan dengan asam nitrat, menghidupkan kembali temannya yang bernama Taiju Oki dan teman sekelas mereka Yuzuriha Ogawa untuk membangun kembali peradaban mereka.', '../assets/images/coverBuku20240305073419_gambar_bk.jpg', 1, 14, 59),
(24, 'Solo level', 12, '2024-03-11', '123213', 'solo', '../assets/images/coverBuku/20240306093144drStone.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `buku_satuan`
--

CREATE TABLE `buku_satuan` (
  `id_buku_satuan` int(11) NOT NULL,
  `kondisi` varchar(100) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_satuan`
--

INSERT INTO `buku_satuan` (`id_buku_satuan`, `kondisi`, `id_buku`) VALUES
(24, 'Baik', 15),
(25, 'Baik', 15),
(26, 'Baik', 18),
(27, 'Baik', 18),
(28, 'Baik', 18),
(29, 'Baik', 18),
(30, 'Baik', 18),
(31, 'rusak', 23),
(32, 'Baik', 23),
(33, 'Baik', 23),
(34, 'Baik', 23),
(36, 'Baik', 23),
(37, 'Baik', 23),
(38, 'Baik', 23),
(39, 'Baik', 23),
(40, 'Baik', 23);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `status_peminjaman` varchar(100) DEFAULT NULL,
  `id_buku_satuan` int(11) DEFAULT NULL,
  `id_peminjaman` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Adventure'),
(4, 'Horror'),
(5, 'Romance'),
(6, 'Drama'),
(8, 'Fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `tgl_dikembalikan` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(100) DEFAULT NULL,
  `alamat_penerbit` text DEFAULT NULL,
  `no_telp_penerbit` varchar(13) DEFAULT NULL,
  `email_penerbit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `alamat_penerbit`, `no_telp_penerbit`, `email_penerbit`) VALUES
(1, 'Kim Jong Un', 'North Korea', '11223345223', 'kim@gmail.com'),
(10, 'ABC Publications', '123 Main Street, Cityville, State, Zip Code', '+1234567890', 'info@abcpublishing.com'),
(11, 'XYZ Books', '456 Elm Street, Townsville, State, Zip Code', '+1987654321', ' contact@xyzbooks.net'),
(12, 'Rainbow Publishing House', '789 Oak Avenue, Villagetown, State, Zip Code', '+1122334455', 'hello@rainbowpublishing.com'),
(14, 'Simon & Schuster', 'info@simonandschuster.com', '+1 (212) 698-', '1230 Avenue of the Americas, New York, NY 10020, USA'),
(15, 'Hachette Book Group', ' 1290 Avenue of the Americas, New York, NY 10104, USA', '+1 (212) 364-', 'info@hbgusa.com'),
(17, 'Blue Sky Publishing House', '123 Main Street, Anytown, USA', '+1 (555) 123-', 'info@blueskypublishing.com');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(100) DEFAULT NULL,
  `email_penulis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`, `email_penulis`) VALUES
(1, 'Chimamanda Ngozi Adichie', 'ngozi@gmail.com'),
(58, 'Alice Walker', 'alice@gmail.com'),
(59, 'Haruki Murakami', 'haruki@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `alamat`, `no_telp`, `email`, `role`) VALUES
(20, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'd', 'd', 'd', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_buku_genre` (`id_genre`),
  ADD KEY `fk_buku_penerbit` (`id_penerbit`),
  ADD KEY `fk_buku_penulis` (`id_penulis`);

--
-- Indexes for table `buku_satuan`
--
ALTER TABLE `buku_satuan`
  ADD PRIMARY KEY (`id_buku_satuan`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `fk_detail_buku_satuan` (`id_buku_satuan`),
  ADD KEY `fk_detail_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_peminjaman_user` (`id_user`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `buku_satuan`
--
ALTER TABLE `buku_satuan`
  MODIFY `id_buku_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `fk_buku_penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`),
  ADD CONSTRAINT `fk_buku_penulis` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id_penulis`);

--
-- Constraints for table `buku_satuan`
--
ALTER TABLE `buku_satuan`
  ADD CONSTRAINT `buku_satuan_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `fk_detail_buku_satuan` FOREIGN KEY (`id_buku_satuan`) REFERENCES `buku_satuan` (`id_buku_satuan`),
  ADD CONSTRAINT `fk_detail_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

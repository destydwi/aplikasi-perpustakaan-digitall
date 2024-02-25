-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 08:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(250) DEFAULT NULL,
  `foto` varchar(250) NOT NULL,
  `stok` int(11) NOT NULL,
  `penulis` varchar(250) DEFAULT NULL,
  `penerbit` varchar(250) DEFAULT NULL,
  `tahun_terbit` varchar(250) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_kategori`, `judul`, `foto`, `stok`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`) VALUES
(1, 3, 'Jakarta Sebelum Pagi', 'jakarta.jpg', 20, 'Ziggy', 'Gramedia', '2016', 'Emina menerima selembar surat tanpa nama pengirim dan diikatkan pada balon berwarna perak. Juga setangkai bunga hyacinth biru. '),
(3, 3, 'Laut Bercerita', 'laut.png', 25, 'Leila Chudori', 'Gramedia', '2017', ' Laut Bercerita menceritakan terkait perilaku kekejaman dan kebengisan yang dirasakan oleh kelompok aktivis mahasiswa di masa Orde Baru. '),
(4, 6, 'Habis Gelap Terbitlah Terang', 'kartini.jpg', 12, 'R.A Kartini', 'Balai Pustaka', '1911', '  Habis Gelap Terbitlah Terang adalah buku kumpulan surat yang ditulis oleh Kartini. Kumpulan surat tersebut dibukukan oleh J.H.   '),
(5, 3, 'Selamat Tinggal', 'selamat_tinggal.jpg', 17, 'Tere Liye', 'Gramedia', '2020', ' Kehidupan seorang pemuda bernama Sintong Tinggal atau biasa dipanggil dengan Sintong ia merupakan anak rantau. Ia diberi julukan “Mahasiswa Abadi”'),
(6, 3, 'Harry Potter and The Philosopher’s Stone', 'harry potter.jpg', 20, 'JK Rowling', 'Gramedia', '2020', '  Harry Potter yang merupakan seorang anak laki-laki berusia 11 tahun yang berhasil selamat dari sihir mematikan seorang penyihir yang sangat ditakuti '),
(7, 6, 'Filosofi Teras', 'filosofi teras.png', 19, 'Henry Manampiring', 'Kompas', '2018', 'Buku ini ditulis untuk menjawab permasalahan tentang tingkat kekhawatiran yang cukup tinggi dalam skala nasional terutama yang dialami oleh anak muda.         '),
(8, 6, 'I Want To Die But I Want To Eat Tteokbokki', 'i want.jpg', 25, 'Baek Se-hee', 'Haru', '2022', 'Seorang penulis yang mengalami depresi berkepanjangan. Ia sudah mengunjungi berbagai psikolog maupun psikiater yang berbeda, tetapi tidak ada hasil.   '),
(9, 6, 'Sebuah Seni Untuk Bersikap Bodo Amat', 'Sebuah seni.jpg', 22, 'Mark Manson', 'Gramedia', '2016', '  Buku ini menceritakan kisah nyata hidupnya saat ia memiliki banyak masalah yang membuatnya lebih kuat dan mencapai tujuannya.  '),
(12, 3, 'Keajaiban Toko Kelontong Namiya', 'toko kelontong.jpg', 25, 'Keigo Higashino', 'Kadokawa Shoten', '2012', 'Ketika tiga pemuda berandal bersembunyi di toko kelontong tak berpenghuni setelah melakukan pencurian, sepucuk surat misterius mendadak ditemukan'),
(13, 3, 'Bumi Manusia', 'bumi manusia.jpg', 30, 'Pramoedya Ananta Toer', 'Hasta Mitra ', '1980', ' Bumi Manusia adalah sebuah novel fiksi dengan genre drama history yang memiliki setting di kehidupan periode penjajahan Belanda   ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(3, 'Fiksi'),
(6, 'Nonfiksi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_koleksi`
--

CREATE TABLE `tb_koleksi` (
  `id_koleksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_koleksi`
--

INSERT INTO `tb_koleksi` (`id_koleksi`, `id_user`, `id_buku`) VALUES
(6, 3, 4),
(7, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `kode_peminjaman` varchar(11) NOT NULL,
  `tanggal_peminjaman` varchar(250) DEFAULT NULL,
  `tanggal_pengembalian` varchar(250) DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan') DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `kode_peminjaman`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status`, `qty`) VALUES
(1, 3, 1, '0', '2024-01-28', '2024-01-29', 'dikembalikan', 0),
(10, 3, 4, '0', '2024-02-06', '2024-02-13', 'dikembalikan', 1),
(13, 4, 12, '0', '2024-02-21', '2024-02-28', 'dikembalikan', 1),
(14, 4, 7, '0', '2024-02-21', '2024-02-28', 'dikembalikan', 0),
(16, 4, 8, '0', '2024-02-21', '2024-02-28', 'dikembalikan', 1),
(17, 3, 6, '0', '2024-02-21', '2024-02-28', 'dipinjam', 0),
(18, 3, 13, '0', '2024-02-21', '2024-02-28', 'dipinjam', 0),
(19, 3, 9, '0', '2024-02-21', '2024-02-28', 'dipinjam', 1),
(20, 4, 3, '0', '2024-02-21', '2024-02-28', 'dipinjam', 0),
(21, 4, 5, '0', '2024-02-21', '2024-02-28', 'dipinjam', 0),
(22, 5, 8, '0', '2024-02-21', '2024-02-28', 'dipinjam', 1),
(23, 5, 6, '0', '2024-02-22', '2024-02-29', 'dipinjam', 0),
(24, 5, 3, '0', '2024-02-22', '2024-02-29', 'dipinjam', 0),
(25, 5, 1, '0', '2024-02-22', '2024-02-29', 'dipinjam', 0),
(26, 5, 1, '0', '2024-02-22', '2024-02-29', 'dipinjam', 0),
(27, 5, 3, '0', '2024-02-22', '2024-02-29', 'dipinjam', 0),
(28, 5, 8, '0', '2024-02-22', '2024-02-29', 'dipinjam', 0),
(29, 5, 12, '0', '2024-02-22', '2024-02-29', 'dipinjam', 0),
(30, 5, 1, 'PMJ001', '2024-02-22', '2024-02-29', 'dipinjam', 0);

--
-- Triggers `tb_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER INSERT ON `tb_peminjaman` FOR EACH ROW BEGIN
UPDATE tb_buku SET stok = stok-new.qty
WHERE id_buku= new.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengembalian` AFTER UPDATE ON `tb_peminjaman` FOR EACH ROW BEGIN
UPDATE tb_buku SET stok = stok + new.qty
WHERE id_buku = new.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ulasan`
--

CREATE TABLE `tb_ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ulasan`
--

INSERT INTO `tb_ulasan` (`id_ulasan`, `id_user`, `id_buku`, `ulasan`, `rating`) VALUES
(1, 1, 1, 'Ceritanya sangat seru  ditambah kisah romance yang diliputi pengetahuan juga, bahasa nya sedikit agak berat tapi jika sudah mengerti alur ceritanya pasti akan terbawa suasana ', 5),
(6, 1, 3, 'Seru sekali novel ini, mengandung kesedihan karena cerita yang mengangkat tentang penculikan aktivis di tahun 1998', 4),
(7, 1, 4, 'Bagus bukunya saya suka', 4),
(8, 1, 4, 'lumayan nanti ending nya mc nya tidur selamanya', 3),
(9, 1, 13, 'Buku nya sangat tebal, butuh waktu lama untuk membaca hingga selesai', 3),
(10, 3, 12, 'Seru sekali ceritanya pantas saja ramai dibicarakan di twitter', 5),
(11, 4, 8, 'Ceritanya mengenai penulis yang sedang berobat ke psikiater karena ia mengalami depresi', 4),
(12, 3, 7, 'Buku filsafat yang sangat menarik terutama untuk kalangan anak muda', 5),
(13, 5, 8, 'Seru saya suka sekali membaca ini, sering relate terhadap kehidupan kita sehari hari', 4),
(14, 4, 3, 'Buku ini sangat mengandung nilai sejarah yang terjadi pada tahun 1998, genre yang sedih juga membuat buku ini sangat best seller di gramedia', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `level` enum('admin','petugas','peminjam') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `email`, `alamat`, `no_telepon`, `level`) VALUES
(1, 'Administrator', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin@gmail.com', 'Batujajar Barat', '087565459001', 'admin'),
(2, 'Petugas 1', 'petugas', '7c6a180b36896a0a8c02787eeafb0e4c', 'petugas@gmail.com', 'Batujajar Timur', '085865459001', 'petugas'),
(3, 'Siswa 1', 'peminjam', '6cb75f652a9b52798eb6cf2201057c73', 'siswa1@gmail.com', 'Batujajar', '088103220765', 'peminjam'),
(4, 'Peminjam 2', 'peminjam2', '819b0643d6b89dc9b579fdfc9094f28e', 'peminjam2@gmail.com', 'Bandung barat', '085559066774', 'peminjam'),
(5, 'Desty dwi susanti', 'destydwi', '34cc93ece0ba9e3f6f235d4af979b16c', 'desty.dwi.2018@gmail.com', 'Kp. Ranca rt 04/02, Desa Batujajar barat, Kec. Batujajar', '085872995580', 'peminjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_id_kategori_tb_buku` (`id_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_koleksi`
--
ALTER TABLE `tb_koleksi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD KEY `fk_id_buku_tb_koleksi` (`id_buku`),
  ADD KEY `fk_id_user_tb_koleksi` (`id_user`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_id_user_tb_peminjaman` (`id_user`),
  ADD KEY `fk_id_buku_tb_peminjaman` (`id_buku`);

--
-- Indexes for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `fk_id_buku_tb_ulasan` (`id_buku`),
  ADD KEY `fk_id_user_tb_ulasan` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_koleksi`
--
ALTER TABLE `tb_koleksi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `fk_id_kategori_tb_buku` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `tb_koleksi`
--
ALTER TABLE `tb_koleksi`
  ADD CONSTRAINT `fk_id_buku_tb_koleksi` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_user_tb_koleksi` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `fk_id_buku_tb_peminjaman` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_user_tb_peminjaman` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD CONSTRAINT `fk_id_buku_tb_ulasan` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_user_tb_ulasan` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

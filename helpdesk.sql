-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 06:05 AM
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
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_detail_faq`
--

CREATE TABLE `master_detail_faq` (
  `id_detail_faq` int(255) NOT NULL,
  `id_master_faq` int(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `file` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_faq`
--

CREATE TABLE `master_faq` (
  `id_master_faq` int(255) NOT NULL,
  `id_kodefikasi_tiket` int(255) NOT NULL,
  `id_sub_kodefikasi_tiket` int(255) NOT NULL,
  `id_sub_sub_kodefikasi_tiket` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_kodefikasi_tiket`
--

CREATE TABLE `master_kodefikasi_tiket` (
  `id_kodefikasi_tiket` int(255) NOT NULL,
  `name_kodefikasi_tiket` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_kodefikasi_tiket`
--

INSERT INTO `master_kodefikasi_tiket` (`id_kodefikasi_tiket`, `name_kodefikasi_tiket`, `deskripsi`) VALUES
(1, 'Software', 'Berikut adalah FAQ seputar Software'),
(2, 'Hardware', 'Berikut adalah FAQ seputar Hardware'),
(3, 'Jaringan', 'Berikut adalah FAQ seputar Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `master_rating`
--

CREATE TABLE `master_rating` (
  `id` int(255) NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_rating`
--

INSERT INTO `master_rating` (`id`, `rating`) VALUES
(1, 'Buruk Sekali'),
(2, 'Buruk'),
(3, 'Cukup'),
(4, 'Bagus'),
(5, 'Bagus Sekali');

-- --------------------------------------------------------

--
-- Table structure for table `master_status_tiket`
--

CREATE TABLE `master_status_tiket` (
  `id` int(11) NOT NULL,
  `jenis_status_tiket` enum('Telah Diterima','Menunggu Respon','Telah Direspon') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_status_tiket`
--

INSERT INTO `master_status_tiket` (`id`, `jenis_status_tiket`) VALUES
(1, 'Telah Diterima'),
(2, 'Menunggu Respon'),
(3, 'Telah Direspon');

-- --------------------------------------------------------

--
-- Table structure for table `master_sub_kodefikasi_tiket`
--

CREATE TABLE `master_sub_kodefikasi_tiket` (
  `id_sub_kodefikasi_tiket` int(11) NOT NULL,
  `id_kodefikasi_tiket` int(11) NOT NULL,
  `nama_sub_kodefikasi_tiket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_sub_kodefikasi_tiket`
--

INSERT INTO `master_sub_kodefikasi_tiket` (`id_sub_kodefikasi_tiket`, `id_kodefikasi_tiket`, `nama_sub_kodefikasi_tiket`) VALUES
(1, 1, '1.1. Layanan Email'),
(2, 1, '1.2. Layanan Kapasitas Penyimpanan Daring'),
(3, 1, '1.3. Layanan Perkuliahan Daring'),
(4, 1, '1.4. Layanan Aktivasi Lisensi Software'),
(5, 1, '1.5. Layanan Forms Daring'),
(6, 1, '1.6. Layanan sistem informasi akademik mahasiswa'),
(7, 1, '1.7. Layanan sistem informasi akademik dosen'),
(8, 1, '1.8. Layanan sistem informasi akademik orang tua'),
(9, 1, '1.9. Layanan sistem informasi penerimaan mahasiswa'),
(10, 1, '1.10. Layanan sistem informasi manajemen akademik'),
(11, 1, '1.11. Layanan sistem informasi akademik fakultas'),
(12, 1, '1.12. Layanan sistem informasi penjaminan mutu'),
(13, 1, '1.13. Layanan sistem informasi poin keaktifan maha'),
(14, 1, '1.14. Layanan sistem informasi keuangan mahasiswa'),
(15, 1, '1.15. Layanan sistem informasi manajemen aset'),
(16, 1, '1.16. Layanan sistem informasi eksekutif'),
(17, 1, '1.17. Layanan sistem informasi kurikulum'),
(18, 1, '1.18. Layanan sistem informasi kepegawaian'),
(19, 1, '1.19. Layanan software non Windows'),
(20, 2, '2.1. Perangkat PC '),
(21, 3, '3.1. Layanan koneksi internet');

-- --------------------------------------------------------

--
-- Table structure for table `master_sub_sub_kodefikasi_tiket`
--

CREATE TABLE `master_sub_sub_kodefikasi_tiket` (
  `id_sub_sub_kodefikasi_tiket` int(255) NOT NULL,
  `id_kodefikasi_tiket` int(255) NOT NULL,
  `id_sub_kodefikasi_tiket` int(255) NOT NULL,
  `nama_sub_sub_kodefikasi_tiket` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_sub_sub_kodefikasi_tiket`
--

INSERT INTO `master_sub_sub_kodefikasi_tiket` (`id_sub_sub_kodefikasi_tiket`, `id_kodefikasi_tiket`, `id_sub_kodefikasi_tiket`, `nama_sub_sub_kodefikasi_tiket`, `deskripsi`) VALUES
(1, 1, 1, '1.1.1. Pembuatan Akun Email', ''),
(2, 1, 1, '1.1.2. Reset password email', ''),
(3, 1, 1, '1.1.3. Reset nomor handphone akun email\r\n', ''),
(4, 1, 1, '1.1.4. Tidak bisa login di perangkat pengguna', ''),
(5, 1, 1, '1.1.5. Penggunaan email', ''),
(6, 1, 1, '1.1.6. Memasukkan akun email ke grup email', ''),
(7, 1, 1, '1.1.7. Mengubah nama yang tertampil di email', ''),
(8, 1, 1, '1.1.8. Mengeluarkan atau memindahkan akun \r\nemail dari grup email\r\n', ''),
(9, 1, 1, '1.1.9. Membuat grup email baru', ''),
(10, 1, 1, '1.1.10. Menambahkan moderasi pada grup \r\nemail', ''),
(11, 1, 1, '1.1.11. Menonaktifkan akun email', ''),
(12, 1, 1, '1.1.12. Menambahkan penerima email pada \r\nbroadcast email', ''),
(13, 1, 2, '1.2.1. Kapasitas penyimpanan daring penuh', ''),
(14, 1, 2, '1.2.2. Kendala berkas tidak terlihat oleh \r\npengguna lain atau pihak eksternal', ''),
(15, 1, 2, '1.2.3. Penggunaan penyimpanan daring\r\n', ''),
(16, 1, 2, '1.2.4. Mengakses penyimpanan daring\r\n', ''),
(17, 1, 3, '1.3.1. Mengunduh aplikasi Microsoft Teams', ''),
(18, 1, 3, '1.3.2. Penggunaan perkuliahan daring', ''),
(19, 1, 3, '1.3.3. Kendala aplikasi Microsoft Teams tidak \r\nbisa dibuka', ''),
(20, 1, 4, '1.4.1. Aktivasi lisensi software', ''),
(21, 1, 4, '1.4.2. Unduh dan instalasi software', ''),
(22, 1, 5, '1.5.1. Penggunaan forms daring', ''),
(23, 1, 6, '1.6.1. Reset password akun sistem informasi \r\nakademik mahasiswa', ''),
(24, 1, 6, '1.6.2. Akun sistem informasi akademik \r\nmahasiswa tidak bisa diakses', ''),
(25, 1, 6, '1.6.3. Kendala teknis pada akun sistem \r\ninformasi akademik mahasiswa', ''),
(26, 1, 6, '1.6.4. Penggunaan sistem informasi akademik \r\nmahasiswa', ''),
(27, 1, 6, '1.6.5. Pembuatan akun sistem informasi \r\nakademik mahasiswa', ''),
(28, 1, 7, '1.7.1. Pembuatan akun sistem informasi \r\nakademik dosen', ''),
(29, 1, 7, '1.7.2. Penggunaan sistem informasi akademik \r\ndosen', ''),
(30, 1, 7, '1.7.3. Pembukaan hak akses pada sistem \r\ninformasi akademik dosen', ''),
(31, 1, 7, '1.7.4. Reset password akun sistem informasi \r\nakademik dosen', ''),
(32, 1, 7, '1.7.5. Kendala teknis pada akun sistem \r\ninformasi akademik dosen', ''),
(33, 1, 7, '1.7.6. Akun sistem informasi akademik \r\nmahasiswa tidak bisa diakses\r\n', ''),
(34, 1, 8, '1.8.1. Reset password akun sistem informasi \r\nakademik orang tua\r\n', ''),
(35, 1, 8, '1.8.2. Kendala teknis pada akun sistem \r\ninformasi akademik orang tua', ''),
(36, 1, 8, '1.8.3. Penggunaan sistem informasi akademik \r\norang tua', ''),
(37, 1, 8, '1.8.4. Pembuatan akun sistem informasi \r\nakademik orang tua', ''),
(38, 1, 9, '1.9.1. Kendala penggunaan sistem informasi \r\npenerimaan mahasiswa baru', ''),
(39, 1, 9, '1.9.2. Penambahan fitur pada sistem informasi \r\npenerimaan mahasiswa baru', ''),
(40, 1, 10, '1.10.1. Kendala penggunaan sistem informasi \r\nmanajemen akademik', ''),
(41, 1, 10, '1.10.2. Penambahan fitur pada sistem informasi \r\nmanajemen akademik', ''),
(42, 1, 11, '1.11.1. Kendala penggunaan sistem informasi \r\nakademik fakultas', ''),
(43, 1, 11, '1.11.2. Penambahan fitur pada sistem informasi \r\nakademik fakultas\r\n', ''),
(44, 1, 12, '1.12.1. Kendala penggunaan sistem informasi \r\npenjaminan mutu', ''),
(45, 1, 12, '1.12.2. Penambahan fitur pada sistem informasi \r\npenjaminan mutu\r\n', ''),
(46, 1, 13, '1.13.1. Kendala penggunaan sistem informasi \r\npoin keaktifan mahasiswa', ''),
(47, 1, 13, '1.13.2. Penambahan fitur pada sistem informasi \r\npoin keaktifan mahasiswa', ''),
(48, 1, 14, '1.14.1. Kendala penggunaan sistem informasi \r\npoin keuangan mahasiswa', ''),
(49, 1, 14, '1.14.2. Penambahan fitur pada sistem informasi \r\nkeuangan mahasiswa', ''),
(50, 1, 15, '1.15.1. Kendala penggunaan sistem informasi \r\nmanajemen aset', ''),
(51, 1, 15, '1.15.2. Penambahan fitur pada sistem informasi \r\nmanajemen aset', ''),
(52, 1, 16, '1.16.1. Kendala penggunaan sistem informasi \r\neksekutif', ''),
(53, 1, 16, '1.16.2. Penambahan fitur pada sistem informasi \r\neksekutif', ''),
(54, 1, 17, '1.17.1. Kendala penggunaan sistem informasi \r\nkurikulum\r\n', ''),
(55, 1, 17, '1.17.2. Penambahan fitur pada sistem informasi \r\nkurikulum', ''),
(56, 1, 18, '1.18.1. Kendala penggunaan sistem informasi \r\nkepegawaian', ''),
(57, 1, 18, '1.18.2. Penambahan fitur pada sistem informasi \r\nkepegawaian', ''),
(58, 1, 19, '1.19.1. Unduh dan instalasi software non \r\nWindows License', ''),
(59, 1, 19, '1.19.2. Kendala driver instalasi hardware pada \r\nperangkat PC\r\n', ''),
(60, 2, 20, '2.1.1. Kendala komponen hardware pada \r\nperangkat PC\r\n', ''),
(61, 2, 20, '2.1.2. Kendala penggunaan pada perangkat \r\npada perangkat PC\r\n', ''),
(62, 2, 20, '2.1.3. Kendala perangkat PC mengalami \r\noverheat', ''),
(63, 2, 20, '2.1.4.', ''),
(64, 3, 21, '3.1.1. Kendala pada koneksi internet wifi', ''),
(65, 3, 21, '3.1.2. Kendala pada koneksi internet LAN', ''),
(66, 3, 21, '3.1.3. Kendala kecepatan koneksi internet \r\nlambat\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses_user` enum('Admin','Mahasiswa','Dosen','Staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id_user`, `nama_user`, `username`, `password`, `hak_akses_user`) VALUES
(1, 'qwert', 'qwert@gmail.com', '$2y$10$oyjWDqStxwGUvwRILzYAfuLyAglsWTLdyZmaP.yRtX3YUKSrgZjyK', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_tiket`
--

CREATE TABLE `transaksi_tiket` (
  `id_transaksi_tiket` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_kodefikasi_tiket` int(255) NOT NULL,
  `id_sub_kodefikasi_tiket` int(255) NOT NULL,
  `id_sub_sub_kodefikasi` int(255) NOT NULL,
  `id_status_tiket` int(255) NOT NULL,
  `id_rating` int(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `respon_admin` varchar(255) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_tiket`
--

INSERT INTO `transaksi_tiket` (`id_transaksi_tiket`, `id_user`, `id_kodefikasi_tiket`, `id_sub_kodefikasi_tiket`, `id_sub_sub_kodefikasi`, `id_status_tiket`, `id_rating`, `keluhan`, `respon_admin`, `tanggal_transaksi`) VALUES
(1, 1, 1, 4, 20, 3, 5, 'help\r\n', 'sudah', '2024-09-20 03:10:21'),
(2, 1, 1, 7, 29, 3, 1, '\"', '.', '2024-09-20 08:29:42'),
(3, 1, 1, 13, 47, 1, 1, '.\r\n', '', '2024-09-23 04:00:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_detail_faq`
--
ALTER TABLE `master_detail_faq`
  ADD PRIMARY KEY (`id_detail_faq`);

--
-- Indexes for table `master_faq`
--
ALTER TABLE `master_faq`
  ADD PRIMARY KEY (`id_master_faq`);

--
-- Indexes for table `master_kodefikasi_tiket`
--
ALTER TABLE `master_kodefikasi_tiket`
  ADD PRIMARY KEY (`id_kodefikasi_tiket`);

--
-- Indexes for table `master_rating`
--
ALTER TABLE `master_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_status_tiket`
--
ALTER TABLE `master_status_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_kodefikasi_tiket`
  ADD PRIMARY KEY (`id_sub_kodefikasi_tiket`),
  ADD KEY `id_kodefikasi_tiket` (`id_kodefikasi_tiket`);

--
-- Indexes for table `master_sub_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_sub_kodefikasi_tiket`
  ADD PRIMARY KEY (`id_sub_sub_kodefikasi_tiket`),
  ADD KEY `id_kodefikasi_tiket` (`id_kodefikasi_tiket`,`id_sub_kodefikasi_tiket`),
  ADD KEY `id_sub_kodefikasi_tiket` (`id_sub_kodefikasi_tiket`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `transaksi_tiket`
--
ALTER TABLE `transaksi_tiket`
  ADD PRIMARY KEY (`id_transaksi_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_detail_faq`
--
ALTER TABLE `master_detail_faq`
  MODIFY `id_detail_faq` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_faq`
--
ALTER TABLE `master_faq`
  MODIFY `id_master_faq` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_kodefikasi_tiket`
--
ALTER TABLE `master_kodefikasi_tiket`
  MODIFY `id_kodefikasi_tiket` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_rating`
--
ALTER TABLE `master_rating`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_status_tiket`
--
ALTER TABLE `master_status_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_kodefikasi_tiket`
  MODIFY `id_sub_kodefikasi_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `master_sub_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_sub_kodefikasi_tiket`
  MODIFY `id_sub_sub_kodefikasi_tiket` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi_tiket`
--
ALTER TABLE `transaksi_tiket`
  MODIFY `id_transaksi_tiket` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_kodefikasi_tiket`
  ADD CONSTRAINT `master_sub_kodefikasi_tiket_ibfk_1` FOREIGN KEY (`id_kodefikasi_tiket`) REFERENCES `master_kodefikasi_tiket` (`id_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_sub_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_sub_kodefikasi_tiket`
  ADD CONSTRAINT `master_sub_sub_kodefikasi_tiket_ibfk_1` FOREIGN KEY (`id_sub_kodefikasi_tiket`) REFERENCES `master_sub_kodefikasi_tiket` (`id_sub_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_sub_sub_kodefikasi_tiket_ibfk_2` FOREIGN KEY (`id_kodefikasi_tiket`) REFERENCES `master_kodefikasi_tiket` (`id_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

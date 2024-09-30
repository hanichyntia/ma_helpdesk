-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2024 pada 09.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `master_detail_faq`
--

CREATE TABLE `master_detail_faq` (
  `id_detail_faq` int(255) NOT NULL,
  `id_master_faq` int(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_faq`
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
-- Struktur dari tabel `master_kodefikasi_tiket`
--

CREATE TABLE `master_kodefikasi_tiket` (
  `id_kodefikasi_tiket` int(255) NOT NULL,
  `name_kodefikasi_tiket` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_kodefikasi_tiket`
--

INSERT INTO `master_kodefikasi_tiket` (`id_kodefikasi_tiket`, `name_kodefikasi_tiket`, `deskripsi`) VALUES
(1, 'Software', 'Berikut adalah FAQ seputar Software'),
(2, 'Hardware', 'Berikut adalah FAQ seputar Hardware'),
(3, 'Jaringan', 'Berikut adalah FAQ seputar Jaringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_rating`
--

CREATE TABLE `master_rating` (
  `id` int(255) NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_rating`
--

INSERT INTO `master_rating` (`id`, `rating`) VALUES
(1, 'Buruk Sekali'),
(2, 'Buruk'),
(3, 'Cukup'),
(4, 'Bagus'),
(5, 'Bagus Sekali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_status_tiket`
--

CREATE TABLE `master_status_tiket` (
  `id` int(11) NOT NULL,
  `jenis_status_tiket` enum('Telah Diterima','Menunggu Respon','Telah Direspon') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_status_tiket`
--

INSERT INTO `master_status_tiket` (`id`, `jenis_status_tiket`) VALUES
(1, 'Telah Diterima'),
(2, 'Menunggu Respon'),
(3, 'Telah Direspon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_sub_kodefikasi_tiket`
--

CREATE TABLE `master_sub_kodefikasi_tiket` (
  `id_sub_kodefikasi_tiket` int(11) NOT NULL,
  `id_kodefikasi_tiket` int(11) NOT NULL,
  `nama_sub_kodefikasi_tiket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_sub_kodefikasi_tiket`
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
-- Struktur dari tabel `master_sub_sub_kodefikasi_tiket`
--

CREATE TABLE `master_sub_sub_kodefikasi_tiket` (
  `id_sub_sub_kodefikasi_tiket` int(255) NOT NULL,
  `id_kodefikasi_tiket` int(255) NOT NULL,
  `id_sub_kodefikasi_tiket` int(255) NOT NULL,
  `nama_sub_sub_kodefikasi_tiket` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_sub_sub_kodefikasi_tiket`
--

INSERT INTO `master_sub_sub_kodefikasi_tiket` (`id_sub_sub_kodefikasi_tiket`, `id_kodefikasi_tiket`, `id_sub_kodefikasi_tiket`, `nama_sub_sub_kodefikasi_tiket`, `deskripsi`) VALUES
(1, 1, 1, '1.1.1. Pembuatan Akun Email', 'Pembuatan email hanya berlaku untuk sivitas akademik Universitas untuk keperluan membuat email diluar akun email milik pribadi. Berikut untuk mengajukan pembuatan akun email'),
(2, 1, 1, '1.1.2. Reset password email', 'Layanan Helpdesk untuk sivitas Universitas untuk mereset password email. Berikut adalah form pengajuan untuk mereset password email'),
(3, 1, 1, '1.1.3. Reset nomor handphone akun email\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk mereset password akun email. Berikut adalah form pengajuan mereset nomor handphone akun email'),
(4, 1, 1, '1.1.4. Tidak bisa login di perangkat pengguna', 'Layanan Helpdesk untuk sivitas Universitas untuk sivitas yang tidak bisa login di perangkat. Berikut adalah form pengajuan untuk sivitas yang tidak bisa login di perangkat\r\n'),
(5, 1, 1, '1.1.5. Penggunaan email', 'Layanan Helpdesk untuk sivitas Universitas untuk penggunaan email. Berikut adalah FAQ untuk penggunaan email bagi sivitas\r\n'),
(6, 1, 1, '1.1.6. Memasukkan akun email ke grup email', 'Layanan Helpdesk untuk sivitas Universitas untuk memasukkan akun email ke grup email. Berikut adalah form pengajuan untuk sivitas yang ingin memasukkan akun email ke grup email\r\n\r\n'),
(7, 1, 1, '1.1.7. Mengubah nama yang tertampil di email', 'Layanan Helpdesk untuk sivitas Universitas untuk mengubah nama yang tertampil dalam email. Berikut adalah form pengajuan untuk sivitas yang ingin mengubah nama yang tertampil di email\r\n'),
(8, 1, 1, '1.1.8. Mengeluarkan atau memindahkan akun \r\nemail dari grup email\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk mengeluarkan atau memindahkan akun email dari grup email. Berikut adalah form pengajuan untuk mengeluarkan atau memindahkan akun email dari grup email\r\n'),
(9, 1, 1, '1.1.9. Membuat grup email baru', 'Layanan Helpdesk untuk sivitas Universitas untuk membuat grup email baru. Berikut adalah form pengajuan untuk membuat grup email baru'),
(10, 1, 1, '1.1.10. Menambahkan moderasi pada grup \r\nemail', 'Layanan Helpdesk untuk sivitas Universitas untuk mereset password email. Berikut adalah cara untuk mereset password email\r\n'),
(11, 1, 1, '1.1.11. Menonaktifkan akun email', 'Layanan Helpdesk untuk sivitas Universitas untuk menonaktifkan akun email. Berikut adalah form pengajuan untuk menonaktifkan akun email\r\n'),
(12, 1, 1, '1.1.12. Menambahkan penerima email pada \r\nbroadcast email', 'Layanan Helpdesk untuk sivitas Universitas untuk menambahkan penerima email pada broadcast email. Berikut adalah form pengajuan untuk menambahkan penerima email pada broadcast email\r\n\r\n'),
(13, 1, 2, '1.2.1. Kapasitas penyimpanan daring penuh', 'Layanan Helpdesk untuk sivitas Universitas untuk kapasitas penyimpanan daring yang penuh. Berikut adalah form pengajuan untuk kapasitas penyimpanan daring yang penuh\r\n\r\n'),
(14, 1, 2, '1.2.2. Kendala berkas tidak terlihat oleh \r\npengguna lain atau pihak eksternal', 'Layanan Helpdesk untuk sivitas Universitas untuk Kendala berupa berkas tidak terlihat oleh pengguna lain atau pihak eksternal. Berikut adalah form pengajuan untuk kendala berkas tidak terlihat oleh pengguna lain atau pihak eksternal\r\n'),
(15, 1, 2, '1.2.3. Penggunaan penyimpanan daring\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk penggunaan penyimpanan daring. Berikut adalah FAQ mengenai penggunaan penyimpanan daring'),
(16, 1, 2, '1.2.4. Mengakses penyimpanan daring\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk sivitas yang ingin mengakses penyimpanan daring. Berikut adalah form pengajuan untuk mengakses penyimpanan daring\r\n'),
(17, 1, 3, '1.3.1. Mengunduh aplikasi Microsoft Teams', 'Layanan Helpdesk untuk sivitas Universitas untuk mengunduh aplikasi Microsoft Teams. Berikut adalah form pengajuan untuk mengunduh aplikasi Microsoft Teams\r\n\r\n'),
(18, 1, 3, '1.3.2. Penggunaan perkuliahan daring', 'Layanan Helpdesk untuk sivitas Universitas mengenai penggunaan perkuliahan daring. Berikut adalah FAQ untuk penggunaan perkuliahan daring\r\n\r\n'),
(19, 1, 3, '1.3.3. Kendala aplikasi Microsoft Teams tidak \r\nbisa dibuka', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala aplikasi Microsoft Teams tidak bisa dibuka. Berikut adalah form pengajuan untuk kendala aplikasi Microsoft Teams tidak bisa dibuka\r\n\r\n'),
(20, 1, 4, '1.4.1. Aktivasi lisensi software', 'Layanan Helpdesk untuk sivitas Universitas untuk aktivasi lisensi software. Berikut adalah form pengajuan untuk aktivasi lisensi software\r\n\r\n'),
(21, 1, 4, '1.4.2. Unduh dan instalasi software', 'Layanan Helpdesk untuk sivitas Universitas untuk pengunduhan dan instalasi software. Berikut adalah form pengajuan untuk pengunduhan dan instalasi software\r\n'),
(22, 1, 5, '1.5.1. Penggunaan forms daring', 'Layanan Helpdesk untuk sivitas Universitas mengenai penggunaan forms daring. Berikut adalah FAQ untuk penggunaan forms daring'),
(23, 1, 6, '1.6.1. Reset password akun sistem informasi \r\nakademik mahasiswa', 'Layanan Helpdesk untuk sivitas Universitas untuk reset password akun sistem informasi mahasiswa. Berikut adalah form pengajuan untuk reset password akun sistem informasi akademik mahasiswa\r\n\r\n'),
(24, 1, 6, '1.6.2. Akun sistem informasi akademik \r\nmahasiswa tidak bisa diakses', 'Layanan Helpdesk untuk sivitas Universitas untuk akun sistem informasi akademik mahasiswa yang tidak bisa di akses. Berikut adalah form pengajuan untuk akun sistem informasi akademik mahasiswa yang tidak bisa diakses\r\n\r\n'),
(25, 1, 6, '1.6.3. Kendala teknis pada akun sistem \r\ninformasi akademik mahasiswa', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala teknis pada akun sistem informasi akademik mahasiswa. Berikut adalah form pengajuan untuk kendala teknis pada akun sistem informasi akademik mahasiswa\r\n\r\n'),
(26, 1, 6, '1.6.4. Penggunaan sistem informasi akademik \r\nmahasiswa', 'Layanan Helpdesk untuk sivitas Universitas untuk sivitas yang ingin mengetahui penggunaan sistem informasi akademik mahasiswa. Berikut adalah playlist video untuk penggunaan sistem informasi akademik mahasiswa'),
(27, 1, 6, '1.6.5. Pembuatan akun sistem informasi \r\nakademik mahasiswa', 'Layanan Helpdesk untuk sivitas Universitas untuk pembuatan akun sistem informasi akademik mahasiswa. Berikut adalah form pengajuan untuk pembuatan akun sistem informasi akademik mahasiswa\r\n'),
(28, 1, 7, '1.7.1. Pembuatan akun sistem informasi \r\nakademik dosen', 'Layanan Helpdesk untuk sivitas Universitas untuk pembuatan akun sistem informasi akademik dosen. Berikut adalah form pengajuan untuk pembuatan akun sistem informasi akademik dosen\r\n'),
(29, 1, 7, '1.7.2. Penggunaan sistem informasi akademik \r\ndosen', 'Layanan Helpdesk untuk sivitas Universitas mengenai penggunaan sistem informasi akademik dosen. Berikut adalah playlist video untuk penggunaan sistem informasi akademik dosen\r\n\r\n'),
(30, 1, 7, '1.7.3. Pembukaan hak akses pada sistem \r\ninformasi akademik dosen', 'Layanan Helpdesk untuk sivitas Universitas untuk pembukaan hak akses pada sistem informasi akademik dosen. Berikut adalah form pengajuan untuk pembukaan hak akses pada sitem informasi akademik dosen\r\n'),
(31, 1, 7, '1.7.4. Reset password akun sistem informasi \r\nakademik dosen', 'Layanan Helpdesk untuk sivitas Universitas untuk reset password akun sistem informasi akademik dosen. Berikut adalah form pengajuan untuk reset password akun sistem informasi akademik dosen\r\n'),
(32, 1, 7, '1.7.5. Kendala teknis pada akun sistem \r\ninformasi akademik dosen', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala teknis pada akun sistem informasi akademik dosen. Berikut adalah form pengajuan untuk kendala teknis pada akun sistem informasi akademik dosen'),
(33, 1, 7, '1.7.6. Akun sistem informasi akademik \r\nmahasiswa tidak bisa diakses\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk akun sistem informasi akademik mahasiswa yang tidak bisa diakses. Berikut adalah form pengajuan untuk akun sistem informasi akademik mahasiswa yang tidak bisa diakses\r\n\r\n'),
(34, 1, 8, '1.8.1. Reset password akun sistem informasi \r\nakademik orang tua\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk reset password akun sistem informasi akademik orang tua. Berikut adalah form pengajuan untuk reset password akun sistem informasi akademik orang tua\r\n'),
(35, 1, 8, '1.8.2. Kendala teknis pada akun sistem \r\ninformasi akademik orang tua', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala teknis pada akun sistem informasi akademik orang tua. Berikut adalah form pengajuan untuk kendala teknis pada akun sistem informasi akademik orang tua\r\n'),
(36, 1, 8, '1.8.3. Penggunaan sistem informasi akademik \r\norang tua', 'Layanan Helpdesk untuk sivitas Universitas mengenai penggunaan sistem informasi akademik orang tua. Berikut adalah FAQ untuk Penggunaan sistem informasi akademik orang tua\r\n'),
(37, 1, 8, '1.8.4. Pembuatan akun sistem informasi \r\nakademik orang tua', 'Layanan Helpdesk untuk sivitas Universitas untuk pembuatan akun sistem informasi akademik orang tua. Berikut adalah form pengajuan untuk pembuatan akun sistem informasi akademik orang tua'),
(38, 1, 9, '1.9.1. Kendala penggunaan sistem informasi \r\npenerimaan mahasiswa baru', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan sistem informasi penerimaan mahasiswa baru. Berikut adalah form pengajuan untuk Kendala penggunaan sistem informasi penerimaan mahasiswa baru'),
(39, 1, 9, '1.9.2. Penambahan fitur pada sistem informasi \r\npenerimaan mahasiswa baru', 'Layanan Helpdesk untuk sivitas Universitas untuk penambahan fitur pada sistem informasi penerimaan mahasiswa baru. Berikut adalah form pengajuan untuk penambahan fitur pada sistem informasi penerimaan mahasiswa baru\r\n'),
(40, 1, 10, '1.10.1. Kendala penggunaan sistem informasi \r\nmanajemen akademik', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan sistem informasi manajemen akademik. Berikut adalah form pengajuan untuk kendala penggunaan sistem informasi manajemen akademik\r\n'),
(41, 1, 10, '1.10.2. Penambahan fitur pada sistem informasi \r\nmanajemen akademik', 'Layanan Helpdesk untuk sivitas Universitas untuk penambahan fitur pada sistem informasi manajemen akademik. Berikut adalah form pengajuan untuk penambahan fitur pada sistem informasi manajemen akademik\r\n\r\n'),
(42, 1, 11, '1.11.1. Kendala penggunaan sistem informasi \r\nakademik fakultas', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan sistem informasi akademik fakultas. Berikut adalah form pengajuan untuk kendala penggunaan sistem informasi akademik fakultas\r\n'),
(43, 1, 11, '1.11.2. Penambahan fitur pada sistem informasi \r\nakademik fakultas\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk penambahan fitur pada sistem informasi akademik fakultas. Berikut adalah form pengajuan untuk penambahan fitur pada sistem informasi akademik fakultas'),
(44, 1, 12, '1.12.1. Kendala penggunaan sistem informasi \r\npenjaminan mutu', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan sistem informasi penjaminan mutu. Berikut adalah form pengajuan untuk kendala penggunaan sistem informasi penjaminan mutu'),
(45, 1, 12, '1.12.2. Penambahan fitur pada sistem informasi \r\npenjaminan mutu\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk penambahan fitur pada sistem informasi penjaminan mutu. Berikut adalah form pengajuan untuk penambahan fitur pada sistem informasi penjaminan mutu'),
(46, 1, 13, '1.13.1. Kendala penggunaan sistem informasi \r\npoin keaktifan mahasiswa', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan sistem informasi poin keaktifan mahasiswa. Berikut adalah form pengajuan untuk kendala penggunaan sistem informasi poin keaktifan mahasiswa'),
(47, 1, 13, '1.13.2. Penambahan fitur pada sistem informasi \r\npoin keaktifan mahasiswa', 'Layanan Helpdesk untuk sivitas Universitas untuk penambahan fitur pada sistem informasi poin keaktifan mahasiswa. Berikut adalah form pengajuan untuk penambahan fitur pada sistem informasi poin keaktifan mahasiswa'),
(48, 1, 14, '1.14.1. Kendala penggunaan sistem informasi \r\npoin keuangan mahasiswa', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan sistem informasi poin keuangan mahasiswa. Berikut adalah form pengajuan untuk kendala penggunaan sistem informasi poin keuangan mahasiswa\r\n'),
(49, 1, 14, '1.14.2. Penambahan fitur pada sistem informasi \r\nkeuangan mahasiswa', 'Layanan Helpdesk untuk sivitas Universitas untuk penambahan fitur pada sistem informasi keuangan mahasiswa. Berikut adalah form pengajuan untuk penambahan fitur pada sistem informasi keuangan mahasiswa\r\n'),
(50, 1, 15, '1.15.1. Kendala penggunaan sistem informasi \r\nmanajemen aset', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan sistem informasi manajemen aset. Berikut adalah form pengajuan untuk kendala penggunaan sistem informasi manajemen asset\r\n'),
(51, 1, 15, '1.15.2. Penambahan fitur pada sistem informasi \r\nmanajemen aset', 'Layanan Helpdesk untuk sivitas Universitas untuk penambahan fitur pada sistem informasi manajemen aset. Berikut adalah form pengajuan untuk penambahan fitur pada sistem informasi manajemen aset'),
(52, 1, 16, '1.16.1. Kendala penggunaan sistem informasi \r\neksekutif', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan sistem informasi eksekutif. Berikut adalah form pengajuan untuk kendala penggunaan sistem informasi eksekutif\r\n'),
(53, 1, 16, '1.16.2. Penambahan fitur pada sistem informasi \r\neksekutif', 'Layanan Helpdesk untuk sivitas Universitas untuk penambahan fitur pada sistem informasi eksekutif. Berikut adalah form pengajuan untuk penambahan fitur pada sistem informasi eksekutif\r\n'),
(54, 1, 17, '1.17.1. Kendala penggunaan sistem informasi \r\nkurikulum\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan sistem informasi kurikulum. Berikut adalah form pengajuan untuk kendala penggunaan sistem informasi kurikulum'),
(55, 1, 17, '1.17.2. Penambahan fitur pada sistem informasi \r\nkurikulum', 'Layanan Helpdesk untuk sivitas Universitas untuk penambahan fitur pada sistem informasi kurikulum. Berikut adalah form pengajuan untuk penambahan fitur pada sistem informasi kurikulum'),
(56, 1, 18, '1.18.1. Kendala penggunaan sistem informasi \r\nkepegawaian', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan sistem informasi kepegawaian. Berikut adalah form pengajuan untuk kendala penggunaan sistem informasi kepegawaian\r\n'),
(57, 1, 18, '1.18.2. Penambahan fitur pada sistem informasi \r\nkepegawaian', 'Layanan Helpdesk untuk sivitas Universitas untuk penambahan fitur pada sistem informasi kepegawaian. Berikut adalah form pengajuan untuk penambahan fitur pada sistem informasi kepegawaian\r\n'),
(58, 1, 19, '1.19.1. Unduh dan instalasi software non \r\nWindows License', 'Layanan Helpdesk untuk sivitas Universitas untuk mengunduh dan instalasi software non Windows License. Berikut adalah form pengajuan untuk mengunduh dan instalasi software non Windows License\r\n'),
(59, 1, 19, '1.19.2. Kendala driver instalasi hardware pada \r\nperangkat PC\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala driver instalasi hardware pada perangkat PC. Berikut adalah form pengajuan untuk kendala driver instalasi hardware pada perangkat PC'),
(60, 2, 20, '2.1.1. Kendala komponen hardware pada \r\nperangkat PC\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala komponen hardware pada perangkat PC. Berikut adalah form pengajuan untuk kendala komponen hardware pada perangkat PC\r\n'),
(61, 2, 20, '2.1.2. Kendala penggunaan pada perangkat \r\npada perangkat PC\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala penggunaan pada perangkat pada perangkat PC. Berikut adalah form pengajuan untuk kendala penggunaan pada perangkat pada perangkat PC'),
(62, 2, 20, '2.1.3. Kendala perangkat PC mengalami \r\noverheat', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala perangkat PC mengalami overheat. Berikut adalah form pengajuan untuk kendala perangkat PC mengalami overheat\r\n'),
(63, 2, 20, '2.1.4.', ''),
(64, 3, 21, '3.1.1. Kendala pada koneksi internet wifi', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala pada koneksi internet wifi. Berikut adalah form pengajuan untuk kendala pada koneksi internet wifi\r\n\r\n'),
(65, 3, 21, '3.1.2. Kendala pada koneksi internet LAN', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala pada koneksi internet LAN. Berikut adalah form pengajuan untuk kendala pada koneksi internet LAN'),
(66, 3, 21, '3.1.3. Kendala kecepatan koneksi internet \r\nlambat\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala kecepatan koneksi internet lambat. Berikut adalah form pengajuan untuk kendala kecepatan koneksi internet lambat\r\n'),
(67, 3, 21, '3.1.4. Kendala koneksi internet pada perangkat\r\nmilik pribadi (non aset milik Universitas \r\nMa Chung)\r\n', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala koneksi internet pada perangkat milik pribadi (non aset milik Universitas Ma Chung). Berikut adalah form pengajuan untuk kendala koneksi internet pada perangkat milik pribadi (non aset milik Univers'),
(68, 3, 21, '3.1.5. Kendala perangkat tidak dapat \r\nterhubung dengan internet', 'Layanan Helpdesk untuk sivitas Universitas untuk kendala perangkat tidak dapat terhubung dengan internet. Berikut adalah form pengajuan untuk kendala perangkat tidak dapat terhubung dengan internet'),
(69, 3, 21, '3.1.6. Password wifi pada gedung Bhakti \r\nPersada', 'Layanan Helpdesk untuk sivitas Universitas untuk password wifi pada gedung Bhakti Persada. Berikut adalah form pengajuan untuk password wifi pada gedung Bhakti Persada\r\n'),
(70, 3, 21, '3.1.7. Password wifi pada gedung non Bhakti \r\nPersada', 'Layanan Helpdesk untuk sivitas Universitas untuk password wifi pada gedung non Bhakti Persada. Berikut adalah form pengajuan untuk password wifi pada gedung non Bhakti Persada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_user`
--

CREATE TABLE `master_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses_user` enum('Admin','Mahasiswa','Dosen','Staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_user`
--

INSERT INTO `master_user` (`id_user`, `nama_user`, `username`, `password`, `hak_akses_user`) VALUES
(1, 'qwert', 'qwert@gmail.com', '$2y$10$oyjWDqStxwGUvwRILzYAfuLyAglsWTLdyZmaP.yRtX3YUKSrgZjyK', 'Mahasiswa'),
(3, 'dosen', 'dosen@gmail.com', '$2y$10$oyjWDqStxwGUvwRILzYAfuLyAglsWTLdyZmaP.yRtX3YUKSrgZjyK', 'Dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_tiket`
--

CREATE TABLE `transaksi_tiket` (
  `id_transaksi_tiket` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_detail_faq`
--
ALTER TABLE `master_detail_faq`
  ADD PRIMARY KEY (`id_detail_faq`),
  ADD KEY `id_master_faq` (`id_master_faq`);

--
-- Indeks untuk tabel `master_faq`
--
ALTER TABLE `master_faq`
  ADD PRIMARY KEY (`id_master_faq`),
  ADD KEY `id_kodefikasi_tiket` (`id_kodefikasi_tiket`,`id_sub_kodefikasi_tiket`,`id_sub_sub_kodefikasi_tiket`),
  ADD KEY `id_sub_kodefikasi_tiket` (`id_sub_kodefikasi_tiket`),
  ADD KEY `id_sub_sub_kodefikasi_tiket` (`id_sub_sub_kodefikasi_tiket`);

--
-- Indeks untuk tabel `master_kodefikasi_tiket`
--
ALTER TABLE `master_kodefikasi_tiket`
  ADD PRIMARY KEY (`id_kodefikasi_tiket`);

--
-- Indeks untuk tabel `master_rating`
--
ALTER TABLE `master_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_status_tiket`
--
ALTER TABLE `master_status_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_kodefikasi_tiket`
  ADD PRIMARY KEY (`id_sub_kodefikasi_tiket`),
  ADD KEY `id_kodefikasi_tiket` (`id_kodefikasi_tiket`);

--
-- Indeks untuk tabel `master_sub_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_sub_kodefikasi_tiket`
  ADD PRIMARY KEY (`id_sub_sub_kodefikasi_tiket`),
  ADD KEY `id_kodefikasi_tiket` (`id_kodefikasi_tiket`,`id_sub_kodefikasi_tiket`),
  ADD KEY `id_sub_kodefikasi_tiket` (`id_sub_kodefikasi_tiket`);

--
-- Indeks untuk tabel `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `transaksi_tiket`
--
ALTER TABLE `transaksi_tiket`
  ADD PRIMARY KEY (`id_transaksi_tiket`),
  ADD KEY `id_status_tiket` (`id_status_tiket`),
  ADD KEY `id_kodefikasi_tiket` (`id_kodefikasi_tiket`),
  ADD KEY `id_sub_kodefikasi_tiket` (`id_sub_kodefikasi_tiket`),
  ADD KEY `id_sub_sub_kodefikasi` (`id_sub_sub_kodefikasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_detail_faq`
--
ALTER TABLE `master_detail_faq`
  MODIFY `id_detail_faq` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_faq`
--
ALTER TABLE `master_faq`
  MODIFY `id_master_faq` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_kodefikasi_tiket`
--
ALTER TABLE `master_kodefikasi_tiket`
  MODIFY `id_kodefikasi_tiket` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_rating`
--
ALTER TABLE `master_rating`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `master_status_tiket`
--
ALTER TABLE `master_status_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_kodefikasi_tiket`
  MODIFY `id_sub_kodefikasi_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `master_sub_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_sub_kodefikasi_tiket`
  MODIFY `id_sub_sub_kodefikasi_tiket` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi_tiket`
--
ALTER TABLE `transaksi_tiket`
  MODIFY `id_transaksi_tiket` int(255) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `master_detail_faq`
--
ALTER TABLE `master_detail_faq`
  ADD CONSTRAINT `master_detail_faq_ibfk_1` FOREIGN KEY (`id_master_faq`) REFERENCES `master_faq` (`id_master_faq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_faq`
--
ALTER TABLE `master_faq`
  ADD CONSTRAINT `master_faq_ibfk_1` FOREIGN KEY (`id_kodefikasi_tiket`) REFERENCES `master_kodefikasi_tiket` (`id_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_faq_ibfk_2` FOREIGN KEY (`id_sub_kodefikasi_tiket`) REFERENCES `master_sub_kodefikasi_tiket` (`id_sub_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_faq_ibfk_3` FOREIGN KEY (`id_sub_sub_kodefikasi_tiket`) REFERENCES `master_sub_sub_kodefikasi_tiket` (`id_sub_sub_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_kodefikasi_tiket`
  ADD CONSTRAINT `master_sub_kodefikasi_tiket_ibfk_1` FOREIGN KEY (`id_kodefikasi_tiket`) REFERENCES `master_kodefikasi_tiket` (`id_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_sub_sub_kodefikasi_tiket`
--
ALTER TABLE `master_sub_sub_kodefikasi_tiket`
  ADD CONSTRAINT `master_sub_sub_kodefikasi_tiket_ibfk_1` FOREIGN KEY (`id_sub_kodefikasi_tiket`) REFERENCES `master_sub_kodefikasi_tiket` (`id_sub_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_sub_sub_kodefikasi_tiket_ibfk_2` FOREIGN KEY (`id_kodefikasi_tiket`) REFERENCES `master_kodefikasi_tiket` (`id_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_tiket`
--
ALTER TABLE `transaksi_tiket`
  ADD CONSTRAINT `transaksi_tiket_ibfk_2` FOREIGN KEY (`id_status_tiket`) REFERENCES `master_status_tiket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_tiket_ibfk_3` FOREIGN KEY (`id_kodefikasi_tiket`) REFERENCES `master_kodefikasi_tiket` (`id_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_tiket_ibfk_4` FOREIGN KEY (`id_sub_kodefikasi_tiket`) REFERENCES `master_sub_kodefikasi_tiket` (`id_sub_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_tiket_ibfk_5` FOREIGN KEY (`id_sub_sub_kodefikasi`) REFERENCES `master_sub_sub_kodefikasi_tiket` (`id_sub_sub_kodefikasi_tiket`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 16 Mar 2023 pada 04.08
-- Versi server: 8.0.32
-- Versi PHP: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbabsensiHS`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int NOT NULL,
  `id_karyawan` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `clock_in` datetime NOT NULL,
  `clock_out` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `id_karyawan`, `nama`, `clock_in`, `clock_out`) VALUES
(101, 4, 'Rakha', '2023-02-22 04:15:33', '2023-02-22 04:16:14'),
(102, 22, 'Allea Rakha Mahardhika', '2023-03-02 10:00:00', '2023-03-02 18:00:00'),
(103, 3, 'Adam Muafa', '2023-03-02 10:03:32', '2023-03-02 06:04:12'),
(104, 3, 'Adam Muafa', '2023-03-03 09:51:18', '2023-03-03 06:02:34'),
(105, 22, 'Allea Rakha Mahardhika', '2023-03-03 10:00:46', '2023-03-03 06:02:18'),
(106, 22, 'Allea Rakha Mahardhika', '2023-03-06 10:01:10', '2023-03-06 06:04:50'),
(107, 3, 'Adam Muafa', '2023-03-06 10:01:13', '2023-03-06 06:03:18'),
(108, 3, 'Adam Muafa', '2023-03-07 09:54:21', '2023-03-07 05:57:04'),
(109, 22, 'Allea Rakha Mahardhika', '2023-03-07 09:57:28', '2023-03-07 06:01:28'),
(110, 22, 'Allea Rakha Mahardhika', '2023-03-08 09:58:15', '2023-03-08 06:11:40'),
(111, 3, 'Adam Muafa', '2023-03-08 10:00:21', '2023-03-08 06:04:46'),
(112, 3, 'Adam Muafa', '2023-03-09 10:00:58', '2023-03-09 06:06:14'),
(113, 22, 'Allea Rakha Mahardhika', '2023-03-09 10:01:47', '2023-03-09 06:05:01'),
(114, 3, 'Adam Muafa', '2023-03-10 09:58:40', '2023-03-10 06:04:01'),
(115, 22, 'Allea Rakha Mahardhika', '2023-03-10 09:58:54', '2023-03-10 06:07:30'),
(116, 22, 'Allea Rakha Mahardhika', '2023-03-13 09:52:22', '2023-03-13 06:04:04'),
(117, 3, 'Adam Muafa', '2023-03-13 10:03:57', '2023-03-13 06:14:12'),
(118, 24, 'bu mega', '2023-03-13 04:14:05', '2023-03-13 04:14:42'),
(119, 3, 'Adam Muafa', '2023-03-14 09:53:14', '2023-03-15 06:10:26'),
(120, 22, 'Allea Rakha Mahardhika', '2023-03-14 09:57:39', '2023-03-14 06:03:31'),
(122, 25, 'raka', '2023-03-14 01:43:14', '2023-03-14 01:43:32'),
(123, 4, 'Rakha', '2023-03-14 01:49:53', '2023-03-14 01:50:11'),
(124, 26, 'yanto', '2023-03-14 02:07:24', '2023-03-14 02:08:23'),
(126, 22, 'Allea Rakha Mahardhika', '2023-03-15 10:08:19', '2023-03-15 06:09:16'),
(129, 3, 'Adam Muafa', '2023-03-16 10:04:50', '1111-01-01 11:11:11'),
(130, 22, 'Allea Rakha Mahardhika', '2023-03-16 10:07:55', '1111-01-01 11:11:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int NOT NULL,
  `jabatan_karyawan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan_karyawan`) VALUES
(1, 'CTO'),
(2, 'CEO'),
(3, 'HRD'),
(4, 'Office Boy'),
(5, 'Programmer'),
(7, 'IT'),
(9, 'Manager'),
(12, 'Software Engineer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jenkel` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tel` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `level` enum('admin','karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `username`, `password`, `nama`, `tgl_lhr`, `jenkel`, `alamat`, `no_tel`, `jabatan`, `level`) VALUES
(3, 'chaeng', '123456', 'Adam Muafa', '2005-12-28', 'Male', 'Jl.jalan', '081240449465', 'Programmer', 'karyawan'),
(4, 'hiken', '123456', 'Admin', '2005-02-08', 'Male', 'Jl.Palem 1', '089590908080', 'CEO', 'admin'),
(22, 'rakha', '123456', 'Allea Rakha Mahardhika', '2005-08-08', 'Male', 'JL.palem 1', '089525538959', 'IT', 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id_keterangan` int NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `alasan` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`id_keterangan`, `id_karyawan`, `nama`, `keterangan`, `alasan`, `waktu`, `bukti`) VALUES
(1, '4', 'Rakha', 'Sakit', 'Panas', 'Tuesday, 21-02-2023', 'img/21022023160316WhatsApp Image 2022-09-14 at 14.35.02.jpeg'),
(2, '3', 'Adam Muafa', 'Sakit', 'test', 'Tuesday, 21-02-2023', 'img/21022023163853IMG_20220906_114133.jpg'),
(3, '4', 'Rakha', 'Izin', 'jalan jalan', 'Wednesday, 22-02-2023', 'img/22022023141216iyaaa.jpg'),
(4, '25', 'raka', 'Sakit', 'panas', 'Tuesday, 14-03-2023', 'img/140320231348031KJDAT2.pdf'),
(5, '26', 'yanto', 'Sakit', 'Panas', 'Tuesday, 14-03-2023', 'img/14032023141233IMG_20220906_114133.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_keterangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-111283-0.cloudclusters.net:19688
-- Waktu pembuatan: 23 Feb 2023 pada 04.22
-- Versi server: 8.0.26
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
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
(98, 3, 'Adam Muafa', '2023-02-22 03:42:21', '2023-02-22 03:43:40'),
(99, 3, 'Adam Muafa', '2023-02-23 07:00:00', '2023-02-23 15:00:00'),
(100, 3, 'Adam Muafa', '2023-02-22 03:54:11', '2023-02-22 03:54:25'),
(101, 4, 'Rakha', '2023-02-22 04:15:33', '2023-02-22 04:16:14');

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
(9, 'Manager');

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
(2, 'Rakha ganteng banget', 'gggaming123', 'Allea Rakha', '2023-02-15', 'Male', 'Ngawi', '18931031321', 'CEO', 'admin'),
(3, 'chaeng', '123456', 'Adam Muafa', '2005-02-08', 'Male', 'Jl.jalan', '089590908080', 'HRD', 'karyawan'),
(4, 'hiken', '123456', 'Rakha', '2005-02-08', 'Male', 'Jl.Palem 1', '089590908080', 'CEO', 'admin'),
(5, 'aji', '123456', 'aji suparji', '1996-09-16', 'Male', 'JL.palem 1', '0895049030', 'CEO', 'admin'),
(6, 'edi ', '123456', 'edi sukadi', '2003-11-18', 'Male', 'JL.palem 1', '0895049030', 'CEO', 'karyawan'),
(17, 'Masbro Ganteng', 'masbro123', 'Masbro', '2023-02-17', 'Female', 'Jember Utara', '08128182182121', 'Office Boy', 'karyawan'),
(18, 'hello', 'hello', 'hello', '2023-02-01', 'Male', 'hello', '0321312', 'CEO', 'karyawan'),
(19, 'Tatang', '123456', 'Tartaglia', '2000-01-19', 'Male', 'Snezhnaya', '0895049030', 'CEO', 'karyawan'),
(20, 'Kurogami', '123456', 'Itachi Uchiha', '2023-02-22', 'Male', 'Konohagakure gng Uchiha', '0895049030', 'IT', 'karyawan');

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
(3, '4', 'Rakha', 'Izin', 'jalan jalan', 'Wednesday, 22-02-2023', 'img/22022023141216iyaaa.jpg');

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
  MODIFY `id_absen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_keterangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

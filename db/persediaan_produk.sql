-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2023 pada 16.11
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persediaan_produk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`, `tgl_update`) VALUES
(1, 'Album', '2021-11-25 02:11:19', '2021-11-25 02:12:58'),
(3, 'Set Pakaian', '2021-11-27 18:06:03', '0000-00-00 00:00:00'),
(4, 'Aksesoris', '2021-11-27 18:07:00', '0000-00-00 00:00:00'),
(5, 'Stationery', '2023-05-26 15:44:40', '2023-05-26 15:49:40'),
(6, 'Lightstick', '2023-05-26 16:00:00', '2023-05-27 16:05:10'),
(7, 'Concert Goods', '2023-05-27 15:36:01', '2023-05-27 15:36:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_pemasok` varchar(100) NOT NULL,
  `alamat_pemasok` text NOT NULL,
  `no_hp_pemasok` int(13) NOT NULL,
  `is_active_pemasok` enum('1','0') NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `id_user`, `id_produk`, `nama_pemasok`, `alamat_pemasok`, `no_hp_pemasok`, `is_active_pemasok`, `tgl_input`, `tgl_update`) VALUES
(1, 2, 2, 'YG Select', '02015 Seoul, Jungnang-gu, Dongil-ro 139-gil 78, 6th floor Prime YG SELECT', 231404686, '1', '2021-11-26 08:04:10', '2021-11-26 08:10:05'),
(2, 2, 7, 'Weverse Shop', 'C, 6F, PangyoTech-onetower, 131, Bundangnaegok-ro, Bundang-gu, Gyeonggi-do, South Korea', 822209718, '1', '2023-05-27 12:14:16', '2023-05-27 12:14:16'),
(3, 2, 1, 'KTown For You', '3 Floor, 513 Yeongdong-daero, Gangnam-gu, Seoul (Samsung-dong, COEX)', 1208771116, '1', '2023-05-27 12:14:16', '2023-05-27 12:14:16'),
(4, 2, 6, 'Naver Co.Ltd', '95 Jeongjail-ro, Bundang-gu, Seongnam-si, Gyeonggi-do, NAVER 1784, 13561', 15883819, '1', '2023-05-27 12:18:33', '2023-05-27 12:18:33'),
(5, 2, 8, 'SM Global Shop', '04769 6F, 83-21, Wangsimni-ro, Seongdong-gu, Seoul, South Korea', 2118817109, '1', '2023-05-27 12:18:33', '2023-05-27 12:18:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `id_satuan`, `kode_produk`, `nama_produk`, `harga`, `stok`, `tgl_input`, `tgl_update`) VALUES
(1, 3, 1, 'HNV202111255823', 'Wonderwall A.C.L Logo Shortsleeve', 635000, 3, '2021-11-25 06:58:18', '2021-11-25 08:09:27'),
(2, 1, 1, 'HNV202111251740', 'Jisoo Single Mini Album Me', 260000, 3, '2021-11-25 07:17:54', '2021-11-25 08:08:39'),
(6, 4, 1, 'HNV202111270604', 'Truz Minini Bagcharm Ruru', 240000, 5, '2021-11-27 18:06:26', '2021-11-27 18:06:32'),
(7, 1, 1, 'HNV202111270701', 'Treasure TSS: CH2 Album Deep Ver.', 220000, 2, '2021-11-27 18:07:19', '0000-00-00 00:00:00'),
(8, 4, 1, 'HNV202305264434', 'Aespa Caendy Pocket Ball Cap', 730000, 4, '2023-05-27 11:57:13', '2023-05-27 11:57:13'),
(9, 6, 5, 'HNV202305265802', 'Blackpink Lightstick Ver.2', 680000, 5, '2023-05-27 11:58:37', '2023-05-27 11:58:37'),
(10, 7, 1, 'HNV202305273710', 'Treasure Tour Hoodie Oatmeal', 1100000, 6, '2023-05-27 11:59:36', '2023-06-04 15:15:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_keluar`
--

CREATE TABLE `produk_keluar` (
  `id_produk_keluar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` int(4) NOT NULL,
  `tahun` int(8) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_keluar`
--

INSERT INTO `produk_keluar` (`id_produk_keluar`, `id_produk`, `jumlah`, `tanggal`, `bulan`, `tahun`, `tgl_input`, `tgl_update`) VALUES
(7, 6, 2, '2023-05-27', 5, 2023, '2023-05-27 10:34:57', '0000-00-00 00:00:00'),
(10, 10, 1, '2023-05-27', 5, 2023, '2023-05-27 18:07:51', '0000-00-00 00:00:00'),
(11, 8, 2, '2023-05-27', 5, 2023, '2023-05-27 12:05:04', '2023-05-27 12:05:04');

--
-- Trigger `produk_keluar`
--
DELIMITER $$
CREATE TRIGGER `hapus_produk_keluar` AFTER DELETE ON `produk_keluar` FOR EACH ROW BEGIN
UPDATE produk SET stok = stok + OLD.jumlah WHERE id_produk = OLD.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `produk_keluar` AFTER INSERT ON `produk_keluar` FOR EACH ROW BEGIN
UPDATE produk SET stok = stok -NEW.jumlah WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id_produk_masuk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(5) NOT NULL,
  `tahun` varchar(8) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_masuk`
--

INSERT INTO `produk_masuk` (`id_produk_masuk`, `id_produk`, `jumlah`, `tanggal`, `bulan`, `tahun`, `tgl_input`, `tgl_update`) VALUES
(1, 8, 4, '2023-05-26', '5', '2023', '2023-05-26 10:23:04', '0000-00-00 00:00:00'),
(5, 10, 6, '2023-05-27', '5', '2023', '2023-05-27 18:06:42', '0000-00-00 00:00:00'),
(6, 9, 5, '2023-05-27', '5', '2023', '2023-05-27 18:07:29', '0000-00-00 00:00:00'),
(7, 2, 2, '2023-05-27', '5', '2023', '2023-05-27 12:09:24', '2023-05-27 12:09:24');

--
-- Trigger `produk_masuk`
--
DELIMITER $$
CREATE TRIGGER `delete_produk_masuk` AFTER DELETE ON `produk_masuk` FOR EACH ROW BEGIN
UPDATE produk SET stok = stok - OLD.jumlah WHERE id_produk = OLD.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `produk_masuk` AFTER INSERT ON `produk_masuk` FOR EACH ROW BEGIN
UPDATE produk SET stok = stok + NEW.jumlah WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_produk`
--

CREATE TABLE `request_produk` (
  `id_request_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `status` enum('0','1','2','3','4','5') NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `request_produk`
--

INSERT INTO `request_produk` (`id_request_produk`, `id_produk`, `id_pemasok`, `jumlah`, `tanggal_kirim`, `status`, `tgl_input`, `tgl_update`) VALUES
(1, 8, 5, 4, '2023-05-26', '5', '2023-05-26 09:19:30', '2023-05-26 11:24:19'),
(4, 9, 1, 5, '2023-05-26', '5', '2023-05-26 12:22:05', '2023-05-26 12:22:05'),
(5, 10, 2, 6, '2023-05-27', '2', '2023-05-27 12:22:05', '2023-05-27 17:44:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `tgl_input`, `tgl_update`) VALUES
(1, 'Pcs', '2021-11-25 00:32:37', '0000-00-00 00:00:00'),
(3, 'Set', '2023-05-26 17:49:42', '2023-05-26 17:51:42'),
(4, 'Pack', '2023-05-26 17:50:03', '2023-05-26 17:05:12'),
(5, 'Unit', '2023-05-26 17:11:18', '2023-05-26 17:13:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `role_id` enum('1','2','3','4') NOT NULL,
  `is_active` enum('1','2') NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama`, `no_hp`, `profile`, `password`, `alamat`, `role_id`, `is_active`, `tgl_input`, `tgl_update`) VALUES
(1, 'owner', 'Owner Rani', '08979987084', 'Profile4936471e896116bb2023-05-27.jpeg', '$2y$10$Qh/QVB8iPmx0z5Xc4jTFIeQorW/aP1fOdqqr0/jKRC3RYbQQZnx0K', 'Jl. Jenderal Sudirman kav. 54-55', '1', '1', '2023-05-27 18:25:10', '2023-05-25 16:44:38'),
(2, 'supplier', 'Supplier Hooniverse', '-', 'Profile7496471e89fda9ee2023-05-27.jpeg', '$2y$10$NdwFIYGrUv89HBjLwKG1VulccyjNfsJHu5yeQOkruAt0glqWg1e0u', '-', '3', '1', '2023-05-27 18:25:19', '2023-05-25 17:25:19'),
(3, 'admin', 'Admin Hooniverse', '08979987084', 'Profile1056471e8aabc7de2023-05-27.jpeg', '$2y$10$TimkVnZE0HjdBB6RZdyFM.OZOyZ82ICDtjwl2J3LzlrDjQgZ5jfw6', 'Jl. Jenderal Sudirman kav.54-55', '4', '1', '2023-05-27 18:25:30', '2023-05-25 16:45:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`),
  ADD KEY `us` (`id_user`),
  ADD KEY `pr` (`id_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori` (`id_kategori`),
  ADD KEY `satuan` (`id_satuan`);

--
-- Indeks untuk tabel `produk_keluar`
--
ALTER TABLE `produk_keluar`
  ADD PRIMARY KEY (`id_produk_keluar`),
  ADD KEY `produk_keluar_id` (`id_produk`);

--
-- Indeks untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id_produk_masuk`),
  ADD KEY `id_pm` (`id_produk`);

--
-- Indeks untuk tabel `request_produk`
--
ALTER TABLE `request_produk`
  ADD PRIMARY KEY (`id_request_produk`),
  ADD KEY `requst_relasi_produk` (`id_produk`),
  ADD KEY `pemasok` (`id_pemasok`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `produk_keluar`
--
ALTER TABLE `produk_keluar`
  MODIFY `id_produk_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id_produk_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `request_produk`
--
ALTER TABLE `request_produk`
  MODIFY `id_request_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD CONSTRAINT `pr` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `satuan` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_keluar`
--
ALTER TABLE `produk_keluar`
  ADD CONSTRAINT `produk_keluar_id` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD CONSTRAINT `id_pm` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `request_produk`
--
ALTER TABLE `request_produk`
  ADD CONSTRAINT `pemasok` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`),
  ADD CONSTRAINT `requst_relasi_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

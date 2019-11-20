-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2019 pada 10.28
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payrolls`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absens`
--

CREATE TABLE `absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `tglAbsen` date NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `namalengkap` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bpjs_kes`
--

CREATE TABLE `bpjs_kes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `angkaLembaga` int(11) NOT NULL,
  `angkaKaryawan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bpjs_kets`
--

CREATE TABLE `bpjs_kets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `angkaLembaga` int(11) NOT NULL,
  `angkaKaryawan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gajis`
--

CREATE TABLE `gajis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gajiPokok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `head_gajis`
--

CREATE TABLE `head_gajis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `tglBuat` date NOT NULL,
  `idPotongan` bigint(20) UNSIGNED NOT NULL,
  `idGapok` bigint(20) UNSIGNED NOT NULL,
  `idTunjangan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatJabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglMasuk` date NOT NULL,
  `tglKeluar` date NOT NULL,
  `bpjsKes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpjsKet` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasbons`
--

CREATE TABLE `kasbons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahKasbon` int(11) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadirans`
--

CREATE TABLE `kehadirans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CardNumber` double DEFAULT NULL,
  `tglK` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lainlains`
--

CREATE TABLE `lainlains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lemburs`
--

CREATE TABLE `lemburs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglLembur` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  `makan` int(11) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjamen`
--

CREATE TABLE `pinjamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahPinjam` int(11) NOT NULL,
  `sisaPinjaman` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongans`
--

CREATE TABLE `potongans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zakat` int(11) NOT NULL,
  `idPinjaman` bigint(20) UNSIGNED NOT NULL,
  `idKasbon` bigint(20) UNSIGNED NOT NULL,
  `idLainlain` bigint(20) UNSIGNED NOT NULL,
  `makan` int(11) NOT NULL,
  `bpjsKes` bigint(20) UNSIGNED NOT NULL,
  `bpjsKet` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunjangans`
--

CREATE TABLE `tunjangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fungsional` int(11) NOT NULL,
  `keluarga` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `idTunjangan` bigint(20) UNSIGNED NOT NULL,
  `makanFas` int(11) NOT NULL,
  `lemburUmum` int(11) NOT NULL,
  `lemburKhusus` int(11) NOT NULL,
  `bpjsKes` bigint(20) UNSIGNED NOT NULL,
  `bpjsKet` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tuntams`
--

CREATE TABLE `tuntams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `bpjs_kes`
--
ALTER TABLE `bpjs_kes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bpjs_kets`
--
ALTER TABLE `bpjs_kets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gajis`
--
ALTER TABLE `gajis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gajis_idkaryawan_foreign` (`idKaryawan`);

--
-- Indeks untuk tabel `head_gajis`
--
ALTER TABLE `head_gajis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `head_gajis_idkaryawan_foreign` (`idKaryawan`),
  ADD KEY `head_gajis_idpotongan_foreign` (`idPotongan`),
  ADD KEY `head_gajis_idgapok_foreign` (`idGapok`),
  ADD KEY `head_gajis_idtunjangan_foreign` (`idTunjangan`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kasbons`
--
ALTER TABLE `kasbons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kasbons_idkaryawan_foreign` (`idKaryawan`);

--
-- Indeks untuk tabel `kehadirans`
--
ALTER TABLE `kehadirans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kehadirans_idkaryawan_foreign` (`idKaryawan`);

--
-- Indeks untuk tabel `lainlains`
--
ALTER TABLE `lainlains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lainlains_idkaryawan_foreign` (`idKaryawan`);

--
-- Indeks untuk tabel `lemburs`
--
ALTER TABLE `lemburs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lemburs_idkaryawan_foreign` (`idKaryawan`);

--
-- Indeks untuk tabel `pinjamen`
--
ALTER TABLE `pinjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjamen_idkaryawan_foreign` (`idKaryawan`);

--
-- Indeks untuk tabel `potongans`
--
ALTER TABLE `potongans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `potongans_idpinjaman_foreign` (`idPinjaman`),
  ADD KEY `potongans_idkasbon_foreign` (`idKasbon`),
  ADD KEY `potongans_idlainlain_foreign` (`idLainlain`),
  ADD KEY `potongans_bpjskes_foreign` (`bpjsKes`),
  ADD KEY `potongans_bpjsket_foreign` (`bpjsKet`);

--
-- Indeks untuk tabel `tunjangans`
--
ALTER TABLE `tunjangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tunjangans_idtunjangan_foreign` (`idTunjangan`),
  ADD KEY `tunjangans_bpjskes_foreign` (`bpjsKes`),
  ADD KEY `tunjangans_bpjsket_foreign` (`bpjsKet`);

--
-- Indeks untuk tabel `tuntams`
--
ALTER TABLE `tuntams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tuntams_idkaryawan_foreign` (`idKaryawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bpjs_kes`
--
ALTER TABLE `bpjs_kes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bpjs_kets`
--
ALTER TABLE `bpjs_kets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gajis`
--
ALTER TABLE `gajis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `head_gajis`
--
ALTER TABLE `head_gajis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kasbons`
--
ALTER TABLE `kasbons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kehadirans`
--
ALTER TABLE `kehadirans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lainlains`
--
ALTER TABLE `lainlains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lemburs`
--
ALTER TABLE `lemburs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pinjamen`
--
ALTER TABLE `pinjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `potongans`
--
ALTER TABLE `potongans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tunjangans`
--
ALTER TABLE `tunjangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tuntams`
--
ALTER TABLE `tuntams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gajis`
--
ALTER TABLE `gajis`
  ADD CONSTRAINT `gajis_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `head_gajis`
--
ALTER TABLE `head_gajis`
  ADD CONSTRAINT `head_gajis_idgapok_foreign` FOREIGN KEY (`idGapok`) REFERENCES `gajis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `head_gajis_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `head_gajis_idpotongan_foreign` FOREIGN KEY (`idPotongan`) REFERENCES `potongans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `head_gajis_idtunjangan_foreign` FOREIGN KEY (`idTunjangan`) REFERENCES `tunjangans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kasbons`
--
ALTER TABLE `kasbons`
  ADD CONSTRAINT `kasbons_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kehadirans`
--
ALTER TABLE `kehadirans`
  ADD CONSTRAINT `kehadirans_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lainlains`
--
ALTER TABLE `lainlains`
  ADD CONSTRAINT `lainlains_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lemburs`
--
ALTER TABLE `lemburs`
  ADD CONSTRAINT `lemburs_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pinjamen`
--
ALTER TABLE `pinjamen`
  ADD CONSTRAINT `pinjamen_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `potongans`
--
ALTER TABLE `potongans`
  ADD CONSTRAINT `potongans_bpjskes_foreign` FOREIGN KEY (`bpjsKes`) REFERENCES `bpjs_kes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `potongans_bpjsket_foreign` FOREIGN KEY (`bpjsKet`) REFERENCES `bpjs_kets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `potongans_idkasbon_foreign` FOREIGN KEY (`idKasbon`) REFERENCES `kasbons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `potongans_idlainlain_foreign` FOREIGN KEY (`idLainlain`) REFERENCES `lainlains` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `potongans_idpinjaman_foreign` FOREIGN KEY (`idPinjaman`) REFERENCES `pinjamen` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tunjangans`
--
ALTER TABLE `tunjangans`
  ADD CONSTRAINT `tunjangans_bpjskes_foreign` FOREIGN KEY (`bpjsKes`) REFERENCES `bpjs_kes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tunjangans_bpjsket_foreign` FOREIGN KEY (`bpjsKet`) REFERENCES `bpjs_kets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tunjangans_idtunjangan_foreign` FOREIGN KEY (`idTunjangan`) REFERENCES `tuntams` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tuntams`
--
ALTER TABLE `tuntams`
  ADD CONSTRAINT `tuntams_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

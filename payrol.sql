/*
SQLyog Enterprise Trial - MySQL GUI v7.11 
MySQL - 5.5.5-10.4.8-MariaDB : Database - payrol
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`payrol` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `payrol`;

/*Table structure for table `absens` */

DROP TABLE IF EXISTS `absens`;

CREATE TABLE `absens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idKaryawan` bigint(20) unsigned NOT NULL,
  `tglAbsen` date NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Gambar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `absens` */

insert  into `absens`(`id`,`idKaryawan`,`tglAbsen`,`keterangan`,`created_at`,`updated_at`,`Gambar`) values (2,5,'2019-12-19','jlk',NULL,NULL,'191220191355283 x 4.jpg');

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `namalengkap` varchar(40) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`idadmin`,`username`,`password`,`namalengkap`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin');

/*Table structure for table `bpjs_kes` */

DROP TABLE IF EXISTS `bpjs_kes`;

CREATE TABLE `bpjs_kes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `angkaLembaga` decimal(11,2) NOT NULL,
  `angkaKaryawan` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bpjs_kes` */

insert  into `bpjs_kes`(`id`,`angkaLembaga`,`angkaKaryawan`,`created_at`,`updated_at`) values (1,'0.04','0.01',NULL,NULL);

/*Table structure for table `bpjs_kets` */

DROP TABLE IF EXISTS `bpjs_kets`;

CREATE TABLE `bpjs_kets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `angkaLembaga` decimal(11,4) NOT NULL,
  `angkaKaryawan` decimal(11,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bpjs_kets` */

insert  into `bpjs_kets`(`id`,`angkaLembaga`,`angkaKaryawan`,`created_at`,`updated_at`) values (1,'0.0624','0.0300',NULL,NULL);

/*Table structure for table `gajis` */

DROP TABLE IF EXISTS `gajis`;

CREATE TABLE `gajis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idKaryawan` bigint(20) unsigned NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gajiPokok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gajis_idkaryawan_foreign` (`idKaryawan`),
  CONSTRAINT `gajis_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `gajis` */

/*Table structure for table `head_gajis` */

DROP TABLE IF EXISTS `head_gajis`;

CREATE TABLE `head_gajis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idKaryawan` bigint(20) unsigned NOT NULL,
  `tglBuat` date NOT NULL,
  `idPotongan` bigint(20) unsigned NOT NULL,
  `idGapok` bigint(20) unsigned NOT NULL,
  `idTunjangan` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `head_gajis_idkaryawan_foreign` (`idKaryawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `head_gajis` */

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `namajabatan` varchar(200) CHARACTER SET utf8 NOT NULL,
  `gapok` int(200) NOT NULL,
  `fungsional` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id`,`namajabatan`,`gapok`,`fungsional`) values (3,'TS',20000,20000);

/*Table structure for table `karyawans` */

DROP TABLE IF EXISTS `karyawans`;

CREATE TABLE `karyawans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CardNumber` double DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatJabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglMasuk` date NOT NULL,
  `tglKeluar` date NOT NULL,
  `bpjsKes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpjsKet` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `karyawans` */

insert  into `karyawans`(`id`,`CardNumber`,`nama`,`jabatan`,`status`,`tempatJabatan`,`tglMasuk`,`tglKeluar`,`bpjsKes`,`bpjsKet`,`created_at`,`updated_at`) values (5,897,'sffs','TS','TETAP','SD','2019-02-01','0000-00-00','3','3',NULL,NULL);

/*Table structure for table `kasbons` */

DROP TABLE IF EXISTS `kasbons`;

CREATE TABLE `kasbons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idKaryawan` bigint(20) unsigned NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahKasbon` int(11) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kasbons` */

insert  into `kasbons`(`id`,`idKaryawan`,`namaKaryawan`,`jumlahKasbon`,`keterangan`,`tgl`,`created_at`,`updated_at`) values (6,5,'sffs',98080,'qwee','2019-12-17',NULL,NULL);

/*Table structure for table `kehadirans` */

DROP TABLE IF EXISTS `kehadirans`;

CREATE TABLE `kehadirans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idKaryawan` bigint(20) unsigned NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CardNumber` double DEFAULT NULL,
  `tglK` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kehadirans_idkaryawan_foreign` (`idKaryawan`),
  CONSTRAINT `kehadirans_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kehadirans` */

insert  into `kehadirans`(`id`,`idKaryawan`,`namaKaryawan`,`CardNumber`,`tglK`,`timeIn`,`timeOut`,`keterangan`,`created_at`,`updated_at`) values (1,5,'sffs',213132,'2019-12-13','07:00:00','12:00:00','tepat waktu',NULL,NULL),(2,5,'sffs',213132,'2019-12-01','07:00:00','13:00:00','tepat waktu',NULL,NULL),(3,5,'sffs',213132,'2019-01-01','07:00:00','15:00:00','telat',NULL,NULL);

/*Table structure for table `lainlains` */

DROP TABLE IF EXISTS `lainlains`;

CREATE TABLE `lainlains` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idKaryawan` bigint(20) unsigned NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lainlains_idkaryawan_foreign` (`idKaryawan`),
  CONSTRAINT `lainlains_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lainlains` */

insert  into `lainlains`(`id`,`idKaryawan`,`jumlah`,`keterangan`,`tgl`,`created_at`,`updated_at`) values (1,5,200,';ksdf              ','2019-12-01',NULL,NULL);

/*Table structure for table `lemburs` */

DROP TABLE IF EXISTS `lemburs`;

CREATE TABLE `lemburs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idKaryawan` bigint(20) unsigned NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglLembur` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  `makan` int(11) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lemburs_idkaryawan_foreign` (`idKaryawan`),
  CONSTRAINT `lemburs_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lemburs` */

/*Table structure for table `pinjamen` */

DROP TABLE IF EXISTS `pinjamen`;

CREATE TABLE `pinjamen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idKaryawan` bigint(20) unsigned NOT NULL,
  `namaKaryawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahPinjam` int(11) NOT NULL,
  `sisaPinjaman` int(11) DEFAULT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pinjamen_idkaryawan_foreign` (`idKaryawan`),
  CONSTRAINT `pinjamen_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pinjamen` */

insert  into `pinjamen`(`id`,`idKaryawan`,`namaKaryawan`,`jumlahPinjam`,`sisaPinjaman`,`tgl`,`created_at`,`updated_at`) values (59,5,'sffs',1000,1000,'2019-12-17',NULL,NULL);

/*Table structure for table `potongans` */

DROP TABLE IF EXISTS `potongans`;

CREATE TABLE `potongans` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `zakat` int(11) DEFAULT NULL,
  `Pinjaman` int(11) DEFAULT NULL,
  `Kasbon` int(11) DEFAULT NULL,
  `Lainlain` int(11) DEFAULT NULL,
  `makan` int(11) DEFAULT NULL,
  `bpjsKes` int(11) DEFAULT NULL,
  `bpjsKet` int(11) DEFAULT NULL,
  `tanggal_p` date DEFAULT NULL,
  `idKaryawan` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `potongans` */

insert  into `potongans`(`id`,`zakat`,`Pinjaman`,`Kasbon`,`Lainlain`,`makan`,`bpjsKes`,`bpjsKet`,`tanggal_p`,`idKaryawan`) values (4,500,1000,98080,200,1,1,1,'2019-12-17',5);

/*Table structure for table `potongans1` */

DROP TABLE IF EXISTS `potongans1`;

CREATE TABLE `potongans1` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `zakat` int(11) NOT NULL,
  `idPinjaman` bigint(20) unsigned NOT NULL,
  `idKasbon` bigint(20) unsigned NOT NULL,
  `idLainlain` bigint(20) unsigned NOT NULL,
  `makan` int(11) NOT NULL,
  `bpjsKes` bigint(20) unsigned NOT NULL,
  `bpjsKet` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `potongans_idpinjaman_foreign` (`idPinjaman`),
  KEY `potongans_idkasbon_foreign` (`idKasbon`),
  KEY `potongans_idlainlain_foreign` (`idLainlain`),
  KEY `potongans_bpjskes_foreign` (`bpjsKes`),
  KEY `potongans_bpjsket_foreign` (`bpjsKet`),
  CONSTRAINT `potongans_bpjskes_foreign` FOREIGN KEY (`bpjsKes`) REFERENCES `bpjs_kes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `potongans_bpjsket_foreign` FOREIGN KEY (`bpjsKet`) REFERENCES `bpjs_kets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `potongans_idlainlain_foreign` FOREIGN KEY (`idLainlain`) REFERENCES `lainlains` (`id`) ON DELETE CASCADE,
  CONSTRAINT `potongans_idpinjaman_foreign` FOREIGN KEY (`idPinjaman`) REFERENCES `pinjamen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `potongans1` */

/*Table structure for table `tunjangans` */

DROP TABLE IF EXISTS `tunjangans`;

CREATE TABLE `tunjangans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `fungsional` int(11) NOT NULL,
  `keluarga` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `idTunjangan` bigint(20) unsigned NOT NULL,
  `makanFas` int(11) NOT NULL,
  `lemburUmum` int(11) NOT NULL,
  `lemburKhusus` int(11) NOT NULL,
  `bpjsKes` decimal(11,2) unsigned NOT NULL,
  `bpjsKet` decimal(11,2) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idKaryawan` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_jabatan` (`id_jabatan`),
  KEY `tunjangans_idtunjangan_foreign` (`idTunjangan`),
  KEY `tunjangans_bpjskes_foreign` (`bpjsKes`),
  KEY `tunjangans_bpjsket_foreign` (`bpjsKet`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tunjangans` */

insert  into `tunjangans`(`id`,`id_jabatan`,`fungsional`,`keluarga`,`transport`,`idTunjangan`,`makanFas`,`lemburUmum`,`lemburKhusus`,`bpjsKes`,`bpjsKet`,`created_at`,`updated_at`,`idKaryawan`) values (9,3,20000,1,51000,199,51000,1,1,'0.03','0.01',NULL,NULL,5);

/*Table structure for table `tuntams` */

DROP TABLE IF EXISTS `tuntams`;

CREATE TABLE `tuntams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idKaryawan` bigint(20) unsigned NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tuntams_idkaryawan_foreign` (`idKaryawan`),
  CONSTRAINT `tuntams_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tuntams` */

insert  into `tuntams`(`id`,`idKaryawan`,`jumlah`,`keterangan`,`created_at`,`updated_at`,`tanggal`) values (1,5,199,'lkjj                  ',NULL,NULL,'2019-12-21');

/*Table structure for table `umk` */

DROP TABLE IF EXISTS `umk`;

CREATE TABLE `umk` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `UMK` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `umk` */

insert  into `umk`(`id`,`UMK`) values (1,3842785);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

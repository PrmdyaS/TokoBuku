/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - toko_buku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`toko_buku` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `toko_buku`;

/*Table structure for table `buku` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id_buku` int(10) NOT NULL AUTO_INCREMENT,
  `thumbnail_buku` varchar(255) DEFAULT NULL,
  `nama_buku` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT '',
  `penerbit` varchar(255) DEFAULT '',
  `tanggal_publikasi` date DEFAULT NULL,
  `jumlah_halaman` int(10) DEFAULT NULL,
  `id_genre_buku` int(10) DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `buku` */

insert  into `buku`(`id_buku`,`thumbnail_buku`,`nama_buku`,`pengarang`,`penerbit`,`tanggal_publikasi`,`jumlah_halaman`,`id_genre_buku`,`stock`,`harga`,`created_at`,`updated_at`) values 
(5,'1684240037-Media dan Teknologi.jpg','Media dan Teknologi','Amar','Bahgni','2023-05-10',125,3,3,24000,'2023-05-22 09:40:00','2023-05-22 02:40:00'),
(6,'1684240082-Peribahasa Sehari-hari.jpg','Peribahasa Sehari-hari','Ismael','Maul','2023-05-24',214,2,18,24000,'2023-05-17 08:49:02','2023-05-17 01:49:02'),
(7,'1684240164-Buku Kenangan.jpg','Buku Kenangan','Ki Haryo','Melda','2023-05-16',123,1,4,30000,'2023-05-22 09:43:36','2023-05-22 02:43:36'),
(8,'1684240191-Lamunan Senja.jpg','Lamunan Senja','Alex','Melda','2023-05-16',241,3,10,24000,'2023-05-17 00:37:04','2023-05-16 17:35:25'),
(9,'1684240500-Ketika Cinta Bertasbih.jpg','Ketika Cinta Bertasbih','Kurniawan','Okta','2023-05-08',210,4,20,24000,'2023-05-16 19:35:27','2023-05-16 12:35:27'),
(10,'1684240584-Filsafat Ilmu.jpg','Filsafat Ilmu','Kurniawan','Melda','2023-05-16',21,4,1,24000,'2023-05-17 13:54:02','2023-05-16 12:36:24'),
(11,'1684240945-Farmakope Herbal Indonesia.jpg','Farmakope Herbal Indonesia','Alex','Makaka','2023-05-08',213,3,8,24000,'2023-05-17 07:42:35','2023-05-17 00:42:35'),
(12,'1684241176-Pengantar Ilmu Hukum.jpg','Pengantar Ilmu Hukum','Kurniawan','Melda','2023-05-03',21,2,32,24000,'2023-05-16 12:46:16','2023-05-16 12:46:16'),
(13,'1684241235-Jingga dan Senja.jpg','Jingga dan Senja','Esti KInasih','Melda','2023-05-16',23,3,27,30000,'2023-05-17 02:00:23','2023-05-16 19:00:23'),
(14,'1684251279-Rekrotruksi Kekurangan Air.jpg','Rekrotruksi Kekurangan Air','Alex','Okta','2023-05-16',123,3,18,24000,'2023-05-17 08:48:03','2023-05-17 01:48:03'),
(17,'1684311082-belajar bersama.jpg','belajar bersama','pram','ytta','2023-05-17',120,1,1,30000,'2023-05-17 08:11:22','2023-05-17 08:11:22');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `genre_buku` */

DROP TABLE IF EXISTS `genre_buku`;

CREATE TABLE `genre_buku` (
  `id_genre_buku` int(10) NOT NULL AUTO_INCREMENT,
  `nama_genre_buku` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_genre_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `genre_buku` */

insert  into `genre_buku`(`id_genre_buku`,`nama_genre_buku`) values 
(1,'Horor'),
(2,'Fiksi'),
(3,'Ilmu Ilmiah'),
(4,'Religius'),
(5,'Komedi'),
(6,'K-POP'),
(7,'Marga');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `riwayat_pembelian` */

DROP TABLE IF EXISTS `riwayat_pembelian`;

CREATE TABLE `riwayat_pembelian` (
  `id_riwayat_pembelian` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) DEFAULT NULL,
  `id_buku` int(10) DEFAULT NULL,
  `harga_buku` int(10) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `riwayat_pembelian` */

insert  into `riwayat_pembelian`(`id_riwayat_pembelian`,`id`,`id_buku`,`harga_buku`,`jumlah`,`total_harga`,`tanggal_pembelian`,`created_at`,`updated_at`) values 
(1,1,11,24000,2,48000,'2023-01-01','2023-05-16 17:32:32','2023-05-16 17:32:32'),
(2,1,8,24000,2,48000,'2023-01-01','2023-05-16 17:35:23','2023-05-16 17:35:23'),
(3,1,8,24000,2,48000,'2023-02-02','2023-05-16 17:35:25','2023-05-16 17:35:25'),
(4,1,6,24000,2,48000,'2023-04-30','2023-05-16 17:40:16','2023-05-16 17:40:16'),
(5,1,7,30000,1,30000,'2023-04-30','2023-05-16 18:09:47','2023-05-16 18:09:47'),
(6,1,6,24000,10,240000,'2023-04-30','2023-05-16 18:23:45','2023-05-16 18:23:45'),
(7,6,13,30000,5,150000,'2023-04-30','2023-05-16 19:00:23','2023-05-16 19:00:23'),
(8,12,11,24000,2,48000,'2023-04-30','2023-05-16 00:42:35','2023-05-17 00:42:35'),
(9,5,5,24000,1,24000,'2023-04-30','2023-05-16 00:44:03','2023-05-17 00:44:03'),
(10,5,7,30000,3,90000,'2023-04-30','2023-05-17 01:38:59','2023-05-17 01:38:59'),
(11,13,14,24000,2,48000,'2023-04-30','2023-05-17 01:48:03','2023-05-17 01:48:03'),
(12,14,6,24000,2,48000,'2023-05-17','2023-05-17 01:49:02','2023-05-17 01:49:02'),
(13,15,7,30000,1,30000,'2023-05-17','2023-05-17 06:12:45','2023-05-17 06:12:45'),
(14,21,5,24000,14,336000,'2023-05-17','2023-05-17 08:08:30','2023-05-17 08:08:30'),
(15,13,5,24000,2,48000,'2023-05-21','2023-05-22 02:40:00','2023-05-22 02:40:00'),
(16,13,7,30000,1,30000,'2023-05-22','2023-05-22 02:43:36','2023-05-22 02:43:36');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_users_grup` int(10) DEFAULT 3,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`id_users_grup`,`username`,`firstname`,`lastname`,`email`,`password`,`address`,`city`,`country`,`postal`,`about`,`remember_token`,`created_at`,`updated_at`) values 
(13,1,'Prmdya','Marta','Makya','slebew@gmail.com','$2y$10$uyhzTEtfpNHyw7a3AquP4u1wKw7T/Qf1lIYYUK.JABGwSeRcaSdHy',NULL,NULL,NULL,NULL,'Menjadi lebih baik dari sebelumnya.',NULL,'2023-05-01 01:45:40','2023-05-17 06:07:32'),
(14,2,'Melda','Merkury','Maga','slebew1@gmail.com','$2y$10$xblhzruINbx2pezwvrC5UeXS/9EWnz.DHEwFAJLNMUcTIHwvDm1Cy',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-17 01:48:48','2023-05-17 06:09:44'),
(15,3,'Makarim','Rere','Maga','slebew2@gmail.com','$2y$10$wtxj88/xwJ5gAoUZwQ3Wu.p/Yb3e57nwTGiKK6tRbEqnQRosVAf0m',NULL,NULL,NULL,NULL,NULL,NULL,'2023-05-17 03:33:12','2023-05-17 06:09:48');

/*Table structure for table `users_grup` */

DROP TABLE IF EXISTS `users_grup`;

CREATE TABLE `users_grup` (
  `id_users_grup` int(10) NOT NULL AUTO_INCREMENT,
  `users_grup_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_users_grup`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users_grup` */

insert  into `users_grup`(`id_users_grup`,`users_grup_name`) values 
(1,'Admin'),
(2,'Seller'),
(3,'Buyer');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

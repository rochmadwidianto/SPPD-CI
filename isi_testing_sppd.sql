/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 5.5.21 : Database - isi_testing_sppd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`isi_testing_sppd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `isi_testing_sppd`;

/*Table structure for table `fin_rab_mst` */

DROP TABLE IF EXISTS `fin_rab_mst`;

CREATE TABLE `fin_rab_mst` (
  `rabId` int(11) NOT NULL AUTO_INCREMENT,
  `rabThnAnggId` int(11) NOT NULL,
  `rabKode` varchar(50) DEFAULT NULL,
  `rabNama` varchar(100) NOT NULL,
  `rabKeterangan` text,
  `rabNominalTotal` decimal(20,2) DEFAULT '0.00',
  `rabTglInput` date DEFAULT NULL,
  `rabTglUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rabUserId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`rabId`),
  KEY `rab_thn_anggaran` (`rabThnAnggId`),
  KEY `rab_user_id` (`rabUserId`),
  CONSTRAINT `rab_thn_anggaran` FOREIGN KEY (`rabThnAnggId`) REFERENCES `ref_tahun_anggaran` (`thAnggaranId`) ON UPDATE CASCADE,
  CONSTRAINT `rab_user_id` FOREIGN KEY (`rabUserId`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `fin_rab_mst` */

insert  into `fin_rab_mst`(`rabId`,`rabThnAnggId`,`rabKode`,`rabNama`,`rabKeterangan`,`rabNominalTotal`,`rabTglInput`,`rabTglUpdate`,`rabUserId`) values (1,1,'RAB-001','RAB Awal Tahun','Keterangan','500000000.00','2018-09-29','2018-09-29 23:28:08',1);

/*Table structure for table `ref_biaya_sbu` */

DROP TABLE IF EXISTS `ref_biaya_sbu`;

CREATE TABLE `ref_biaya_sbu` (
  `biayaSbuId` int(11) NOT NULL AUTO_INCREMENT,
  `biayaSbuKode` varchar(10) DEFAULT NULL,
  `biayaSbuNama` varchar(100) DEFAULT NULL,
  `biayaSbuMakId` int(11) DEFAULT NULL,
  `biayaSbuSumberdanaId` int(11) DEFAULT NULL,
  PRIMARY KEY (`biayaSbuId`),
  KEY `biaya_sbu_mak_id` (`biayaSbuMakId`),
  KEY `biaya_sbu_sumberdana_id` (`biayaSbuSumberdanaId`),
  CONSTRAINT `biaya_sbu_mak_id` FOREIGN KEY (`biayaSbuMakId`) REFERENCES `ref_mak` (`makId`) ON UPDATE CASCADE,
  CONSTRAINT `biaya_sbu_sumberdana_id` FOREIGN KEY (`biayaSbuSumberdanaId`) REFERENCES `ref_sumberdana` (`sumberdanaId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ref_biaya_sbu` */

insert  into `ref_biaya_sbu`(`biayaSbuId`,`biayaSbuKode`,`biayaSbuNama`,`biayaSbuMakId`,`biayaSbuSumberdanaId`) values (1,'SBU-001','BLU',1,4);

/*Table structure for table `ref_golongan` */

DROP TABLE IF EXISTS `ref_golongan`;

CREATE TABLE `ref_golongan` (
  `golonganId` int(11) NOT NULL AUTO_INCREMENT,
  `golonganKode` varchar(10) DEFAULT NULL,
  `golonganNama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`golonganId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ref_golongan` */

insert  into `ref_golongan`(`golonganId`,`golonganKode`,`golonganNama`) values (1,'GOL-001','Tetap'),(2,'GOL-002','Kontrak');

/*Table structure for table `ref_jabatan` */

DROP TABLE IF EXISTS `ref_jabatan`;

CREATE TABLE `ref_jabatan` (
  `jabatanId` int(11) NOT NULL AUTO_INCREMENT,
  `jabatanKode` varchar(10) DEFAULT NULL,
  `jabatanNama` varchar(100) DEFAULT NULL,
  `jabatanKeterangan` text,
  PRIMARY KEY (`jabatanId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ref_jabatan` */

insert  into `ref_jabatan`(`jabatanId`,`jabatanKode`,`jabatanNama`,`jabatanKeterangan`) values (1,'001','Rektor','');

/*Table structure for table `ref_jenis_transportasi` */

DROP TABLE IF EXISTS `ref_jenis_transportasi`;

CREATE TABLE `ref_jenis_transportasi` (
  `jenisTransportId` int(11) NOT NULL AUTO_INCREMENT,
  `jenisTransportNama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`jenisTransportId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ref_jenis_transportasi` */

insert  into `ref_jenis_transportasi`(`jenisTransportId`,`jenisTransportNama`) values (1,'Darat'),(2,'Laut'),(3,'Udara'),(4,'Kapal'),(5,'Pesawat'),(6,'Kereta Api'),(7,'Mobil Dinas'),(8,'Motor');

/*Table structure for table `ref_kota_tujuan` */

DROP TABLE IF EXISTS `ref_kota_tujuan`;

CREATE TABLE `ref_kota_tujuan` (
  `kotaTujuanId` int(11) NOT NULL AUTO_INCREMENT,
  `kotaTujuanNama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kotaTujuanId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ref_kota_tujuan` */

insert  into `ref_kota_tujuan`(`kotaTujuanId`,`kotaTujuanNama`) values (1,'Jakarta'),(2,'Surabaya'),(3,'Semarang'),(4,'Yogyakarta'),(5,'Pekalongan');

/*Table structure for table `ref_mak` */

DROP TABLE IF EXISTS `ref_mak`;

CREATE TABLE `ref_mak` (
  `makId` int(11) NOT NULL AUTO_INCREMENT,
  `makKode` varchar(50) DEFAULT NULL,
  `makNama` varchar(100) NOT NULL,
  PRIMARY KEY (`makId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ref_mak` */

insert  into `ref_mak`(`makId`,`makKode`,`makNama`) values (1,'525111','Belanja Peralatan IT');

/*Table structure for table `ref_pegawai` */

DROP TABLE IF EXISTS `ref_pegawai`;

CREATE TABLE `ref_pegawai` (
  `pegawaiId` int(11) NOT NULL AUTO_INCREMENT,
  `pegawaiNip` varchar(50) DEFAULT NULL,
  `pegawaiNama` varchar(100) NOT NULL,
  `pegawaiPangkat` varchar(50) DEFAULT NULL,
  `pegawaiJabatanId` int(11) DEFAULT NULL,
  `pegawaiJabatan` varchar(50) DEFAULT NULL,
  `pegawaiGolonganId` int(11) NOT NULL,
  PRIMARY KEY (`pegawaiId`),
  KEY `pegawai_golongan` (`pegawaiGolonganId`),
  KEY `pegawai_jabatan_id` (`pegawaiJabatanId`),
  CONSTRAINT `pegawai_golongan` FOREIGN KEY (`pegawaiGolonganId`) REFERENCES `ref_golongan` (`golonganId`) ON UPDATE CASCADE,
  CONSTRAINT `pegawai_jabatan_id` FOREIGN KEY (`pegawaiJabatanId`) REFERENCES `ref_jabatan` (`jabatanId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ref_pegawai` */

insert  into `ref_pegawai`(`pegawaiId`,`pegawaiNip`,`pegawaiNama`,`pegawaiPangkat`,`pegawaiJabatanId`,`pegawaiJabatan`,`pegawaiGolonganId`) values (2,'33741100920911','Anggi','III C',1,NULL,1);

/*Table structure for table `ref_sumberdana` */

DROP TABLE IF EXISTS `ref_sumberdana`;

CREATE TABLE `ref_sumberdana` (
  `sumberdanaId` int(11) NOT NULL AUTO_INCREMENT,
  `sumberdanaKode` varchar(10) DEFAULT NULL,
  `sumberdanaNama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sumberdanaId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ref_sumberdana` */

insert  into `ref_sumberdana`(`sumberdanaId`,`sumberdanaKode`,`sumberdanaNama`) values (3,'SD - 001','BLU'),(4,'SD - 002','Rupiah Murni'),(5,'SD - 003','PNBP');

/*Table structure for table `ref_tahun_anggaran` */

DROP TABLE IF EXISTS `ref_tahun_anggaran`;

CREATE TABLE `ref_tahun_anggaran` (
  `thAnggaranId` int(11) NOT NULL AUTO_INCREMENT,
  `thAnggaranNama` varchar(10) DEFAULT NULL,
  `thAnggaranIsAktif` enum('Ya','Tidak') DEFAULT 'Tidak',
  `thAnggaranIsOpen` enum('Ya','Tidak') DEFAULT 'Tidak',
  `thAnggaranBuka` date DEFAULT NULL,
  `thAnggaranTutup` date DEFAULT NULL,
  PRIMARY KEY (`thAnggaranId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ref_tahun_anggaran` */

insert  into `ref_tahun_anggaran`(`thAnggaranId`,`thAnggaranNama`,`thAnggaranIsAktif`,`thAnggaranIsOpen`,`thAnggaranBuka`,`thAnggaranTutup`) values (1,'2018','Ya','Ya','2018-09-29','2019-11-21');

/*Table structure for table `tb_groups` */

DROP TABLE IF EXISTS `tb_groups`;

CREATE TABLE `tb_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_groups` */

insert  into `tb_groups`(`id`,`name`,`description`) values (1,'admin','Administrator'),(2,'members','General User');

/*Table structure for table `tb_harga` */

DROP TABLE IF EXISTS `tb_harga`;

CREATE TABLE `tb_harga` (
  `id_harga` int(30) NOT NULL AUTO_INCREMENT,
  `harga` decimal(7,0) DEFAULT NULL,
  `uid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_harga`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tb_harga` */

insert  into `tb_harga`(`id_harga`,`harga`,`uid`) values (1,'11000',7),(2,'6000',7),(3,'300000',7),(4,'30000',1),(5,'11000',1),(6,'51000',1),(7,'6000',1),(8,'21000',9),(9,'7000',7),(10,'6000',9),(11,'11000',9),(12,'6000',10),(13,'11000',10);

/*Table structure for table `tb_login_attempts` */

DROP TABLE IF EXISTS `tb_login_attempts`;

CREATE TABLE `tb_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tb_login_attempts` */

/*Table structure for table `tb_menu` */

DROP TABLE IF EXISTS `tb_menu`;

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `link` varchar(30) NOT NULL,
  `parent` int(11) NOT NULL,
  `role` enum('Administrator','Admin') DEFAULT 'Admin',
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `tb_menu` */

insert  into `tb_menu`(`id_menu`,`nama_menu`,`icon`,`link`,`parent`,`role`,`aktif`) values (1,'Dashboard','fa fa-dashboard','dashboard',0,'Admin','Y'),(22,'Setting','fa fa-gears','#',0,'Administrator','Y'),(23,'Menu','fa  fa-bars text-aqua','menu',22,'Administrator','Y'),(24,'User','fa fa-users text-aqua','auth/member',22,'Administrator','Y'),(26,'Group User','fa  fa-bars text-aqua','groups',22,'Admin','Y'),(28,'Manajemen Referensi','fa fa-navicon','#',0,'Admin','Y'),(29,'Golongan Pegawai','fa fa-bookmark text-aqua','golongan',28,'Admin','Y'),(30,'Pegawai','fa fa-group text-aqua','pegawai',28,'Admin','Y'),(31,'Jenis Transportasi','fa fa-automobile text-aqua','jenisTransportasi',28,'Admin','Y'),(32,'Kota Tujuan','fa fa-map-marker text-aqua','kotaTujuan',28,'Admin','Y'),(33,'Manajemen Anggaran','fa fa-money','#',0,'Admin','Y'),(34,'Standar Biaya SBU','fa fa-calculator text-aqua','biayaSbu',33,'Admin','Y'),(35,'Tahun Anggaran','fa fa-calendar text-aqua','TahunAnggaran',33,'Admin','Y'),(36,'Mata Anggaran Kegiatan','fa fa-book text-aqua','Mak',33,'Admin','Y'),(37,'Rencana Anggaran Belanja','fa fa-list-alt text-aqua','Rab',33,'Admin','Y'),(38,'Jabatan','fa fa-sitemap text-aqua','jabatan',28,'Admin','Y'),(39,'Sumber Dana','fa fa-money text-aqua','sumberdana',33,'Admin','Y'),(40,'Manajemen SPD','fa fa-plane','#',0,'Admin','Y'),(41,'SPPD','fa fa-envelope-o text-aqua','Sppd',40,'Admin','Y'),(42,'Nota SPPD','fa fa-file-text-o text-aqua','NotaSppd',40,'Admin','Y'),(43,'Laporan','fa fa-file-text-o','#',0,'Admin','Y'),(44,'Perjalanan Dinas','fa fa-plane text-aqua','perjalananDinas',43,'Admin','Y'),(45,'Biaya','fa fa-money text-aqua','biaya',43,'Admin','Y'),(46,'Monitoring Anggaran','fa fa-television text-aqua','monitoringAnggaran',43,'Admin','Y');

/*Table structure for table `tb_nominal` */

DROP TABLE IF EXISTS `tb_nominal`;

CREATE TABLE `tb_nominal` (
  `id_nominal` int(30) NOT NULL AUTO_INCREMENT,
  `nominal` varchar(12) DEFAULT NULL,
  `uid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_nominal`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nominal` */

insert  into `tb_nominal`(`id_nominal`,`nominal`,`uid`) values (1,'2 Ribu',1),(2,'5 Ribu',1),(3,'20 Ribu',1),(4,'10 Ribu',1),(5,'10 ribu',7),(6,'10 ribu',9),(7,'6 ribu',9),(8,'5 ribu',9),(9,'10 ribu',10),(10,'5 ribu',10);

/*Table structure for table `tb_pelanggan` */

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telpn` varchar(15) DEFAULT NULL,
  `uid` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pelanggan` */

insert  into `tb_pelanggan`(`id_pelanggan`,`nama_pelanggan`,`alamat`,`no_telpn`,`uid`) values (2,'Leny Yuliani','Pekajangan Buaran','0898989',7),(3,'Arif Rahman','Buaran Pekalongan','08989780989',7),(4,'Danang','Wiradesa','0867676767',1),(5,'Agga','Bligo','089787878',1),(6,'Inva','Bojong','08989786',7),(7,'ely','pekalongan','089898',9),(8,'andre','pekalongan','0898978678',10);

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(50) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` varchar(15) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_nominal` int(30) DEFAULT NULL,
  `id_harga` int(30) DEFAULT NULL,
  `status` enum('LUNAS','HUTANG') DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `tgl_tempo` datetime NOT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `uid` int(30) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tb_transaksi` */

insert  into `tb_transaksi`(`id_transaksi`,`kode_transaksi`,`no_telp`,`id_pelanggan`,`id_nominal`,`id_harga`,`status`,`tgl_transaksi`,`tgl_tempo`,`tgl_bayar`,`uid`) values (1,'71605001','8967677',2,5,1,'LUNAS','2016-05-16 11:46:38','0000-00-00 00:00:00','2016-05-16 11:46:38',7),(2,'71605002','2147483647',6,5,1,'HUTANG','2016-05-23 11:05:00','0000-00-00 00:00:00','0000-00-00 00:00:00',7),(3,'91605001','0',7,6,11,'LUNAS','2016-05-16 11:48:59','0000-00-00 00:00:00','2016-05-16 11:48:59',9),(4,'91605002','8989',7,7,8,'HUTANG','2016-05-16 11:49:12','0000-00-00 00:00:00','0000-00-00 00:00:00',9),(5,'101605001','2147483647',8,9,13,'LUNAS','2016-05-16 11:51:33','0000-00-00 00:00:00','2016-05-16 11:51:33',10),(6,'101605501','2147483647',8,9,13,'HUTANG','2016-05-16 11:51:51','0000-00-00 00:00:00','0000-00-00 00:00:00',10),(7,'101605551','808978678',8,10,12,'LUNAS','2016-05-16 11:53:04','0000-00-00 00:00:00','2016-05-16 11:53:04',10),(8,'11605001','2147483647',4,2,7,'LUNAS','2016-05-16 12:30:28','0000-00-00 00:00:00','2016-05-16 12:30:28',1),(9,'11605002','89786786',5,4,5,'HUTANG','2016-05-16 12:30:47','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(10,'11605003','2147483647',4,2,7,'LUNAS','2016-05-21 08:46:18','0000-00-00 00:00:00','2016-05-21 08:46:18',1),(11,'11605004','2147483647',1,2,7,'LUNAS','2016-05-25 09:01:32','0000-00-00 00:00:00','2016-05-25 09:01:32',1),(12,'11605005','6850898989787',4,4,5,'HUTANG','2016-05-25 09:45:10','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(13,'11605006','6850898989',5,4,5,'LUNAS','2016-05-25 10:01:28','0000-00-00 00:00:00','2016-05-25 10:01:28',1),(14,'11605007','0950898989787',4,2,7,'LUNAS','2016-05-25 10:16:48','0000-00-00 00:00:00','2016-05-25 10:16:48',1),(15,'11605008','+6850898989787',4,3,5,'LUNAS','2016-05-25 10:19:08','0000-00-00 00:00:00','2016-05-25 10:19:08',1);

/*Table structure for table `tb_users` */

DROP TABLE IF EXISTS `tb_users`;

CREATE TABLE `tb_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `tb_users` */

insert  into `tb_users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values (1,'127.0.0.1','administrator','$2y$08$5OZGvY1omkAbPfGLY5sN3eHNA7SyP72hnJhjWWc1Dr0E5Igk33iiO','','admin@admin.com','86ed629d0fc67b65fa78a1f7b776dd9c56032abb',NULL,NULL,'G.WaoqYoZ/Zq6l6VddiHGe','0000-00-00 00:00:00','2018-09-30 08:56:25',1,'Administrator','utama','SPPD','0'),(7,'::1','member2','$2y$08$PR5Bshqw/ICo9/3X/9Sdn.DbdNP9D0efVQhpSxLfEEblKvbUV/DqG',NULL,'mara@gmail.com','073ac72599a6ffe3d2e31af2e804f448605f87ae',NULL,NULL,NULL,'2016-05-13 11:41:01','2016-05-20 11:30:08',0,'mara','andre','maracell','0898989'),(8,'::1','coba saja','$2y$08$rrhYyW215HV/K5WoH1E2CuH.6buDwe4EsQRYGyMqj641f6x15qm5q',NULL,'coba@gmail.com','219de4ce2713319e792fb6011ee6e2a87a88bd08',NULL,NULL,NULL,'2016-07-26 13:49:12',NULL,0,'coba','saja','coba saja',NULL);

/*Table structure for table `tb_users_groups` */

DROP TABLE IF EXISTS `tb_users_groups`;

CREATE TABLE `tb_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `tb_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Data for the table `tb_users_groups` */

insert  into `tb_users_groups`(`id`,`user_id`,`group_id`) values (37,1,1),(38,1,2),(34,7,2),(39,8,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

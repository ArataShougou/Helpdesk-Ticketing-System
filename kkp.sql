# Host: localhost  (Version 5.5.5-10.4.17-MariaDB)
# Date: 2021-08-04 14:11:02
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "akun"
#

DROP TABLE IF EXISTS `akun`;
CREATE TABLE `akun` (
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Password` varchar(255) NOT NULL DEFAULT '',
  `Email` varchar(255) NOT NULL DEFAULT '',
  `Level` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

#
# Data for table "akun"
#

INSERT INTO `akun` VALUES ('Admin','21232f297a57a5a743894a0e4a801fc3','Admin@gmail.com','ADMIN'),('Teknisi1','e21394aaeee10f917f581054d24b031f','Teknisi@mail.com','TEKNISI'),('Teknisi2','e21394aaeee10f917f581054d24b031f','Teknisi2@gmail.com','TEKNISI'),('Tem','89ccfac87d8d06db06bf3211cb2d69ed','temisaputra@gmail.com','ADMIN'),('Temi','41f5daa70b499e2df7ece7bea7832899','temisaputra26@gmail.com','USER'),('User','ee11cbb19052e40b07aac0ca060c23ee','User@mail.com','USER');

#
# Structure for table "kategori"
#

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(35) NOT NULL,
  PRIMARY KEY (`id_kategori`),
  UNIQUE KEY `nama_kategori` (`nama_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "kategori"
#

INSERT INTO `kategori` VALUES (1,'Hardware'),(2,'Software'),(3,'Other');

#
# Structure for table "masalah"
#

DROP TABLE IF EXISTS `masalah`;
CREATE TABLE `masalah` (
  `id_masalah` int(11) NOT NULL AUTO_INCREMENT,
  `Masalah` varchar(100) NOT NULL DEFAULT '',
  `Point` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_masalah`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

#
# Data for table "masalah"
#

INSERT INTO `masalah` VALUES (4,'CPU ',10),(5,'Layar ',4),(7,'Keyboard ',3),(8,'Mouse ',3),(10,'Internet',5),(11,'installasi Software',4),(12,'OS',10);

#
# Structure for table "pesanlog"
#

DROP TABLE IF EXISTS `pesanlog`;
CREATE TABLE `pesanlog` (
  `Id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `Id_tiket` varchar(13) NOT NULL DEFAULT '',
  `Pesan` text DEFAULT NULL,
  `Sender` varchar(100) DEFAULT NULL,
  `Tanggal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_pesan`,`Id_tiket`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4;

#
# Data for table "pesanlog"
#

INSERT INTO `pesanlog` VALUES (1,'T202106170001','F','User','2021-06-20  21:22:44'),(2,'T202106170001','F','Admin','2021-06-20  21:22:44'),(3,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:36:54'),(4,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:36:55'),(5,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:36:57'),(6,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:36:58'),(7,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:36:58'),(8,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:36:58'),(9,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:36:58'),(10,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:37:11'),(11,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:37:12'),(12,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:37:12'),(13,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:37:12'),(14,'T202106170001','skdjfhskdjfh','Admin','2021-06-21  09:37:12'),(15,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:37:20'),(16,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:37:21'),(17,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:37:21'),(18,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:37:21'),(19,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:37:21'),(20,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:37:21'),(21,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:37:21'),(22,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:37:22'),(23,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:37:22'),(24,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:38:04'),(25,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:38:05'),(26,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:38:05'),(27,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:38:05'),(28,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:38:05'),(29,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:38:05'),(30,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:38:05'),(31,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:38:06'),(32,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:38:06'),(33,'T202106200004','skdjfhskdjfh','Admin','2021-06-21  09:38:06'),(34,'T202106170001','sdfsdf','User','2021-06-21  09:38:29'),(35,'T202106170001','sdfsdf','User','2021-06-21  09:38:29'),(36,'T202106170001','sdfsdf','User','2021-06-21  09:38:29'),(37,'T202106170001','sdfsdf','User','2021-06-21  09:38:29'),(38,'T202106170001','sdfsdf','User','2021-06-21  09:38:30'),(39,'T202106170001','sdfsdf','User','2021-06-21  09:38:30'),(40,'T202106170001','sdfsdf','User','2021-06-21  09:38:30'),(41,'T202106170001','sdfsdf','User','2021-06-21  09:38:30'),(42,'T202106200004','Aku','User','2021-06-21  09:39:30'),(43,'T202106200004','dsfsdfsd','Admin','2021-06-21  10:21:37'),(44,'T202106200004','fsdfsdf','Admin','2021-06-21  10:21:59'),(45,'T202106200004','asdasd','Admin','2021-06-21  10:23:32'),(46,'T202106170001','svsdv','User','2021-06-21  11:20:44'),(47,'T202106170001','hjfhjghj','User','2021-06-21  11:20:49'),(48,'T202106170001','sdfsdfsdf','User','2021-06-21  11:49:25'),(49,'T202106170001','ghfghf','User','2021-06-21  11:49:28'),(50,'T202106170001','','User','2021-06-21  11:50:53'),(51,'T202106170001','','User','2021-06-21  11:52:34'),(52,'T202106170001','','User','2021-06-21  11:52:37'),(53,'T202106170001','','User','2021-06-21  11:54:56'),(54,'T202106170001','','User','2021-06-21  11:55:00'),(55,'T202106170001','<p>sdfsdfsdf</p>','User','2021-06-21  11:56:52'),(56,'T202106170001','<p>cvbcvb</p>','User','2021-06-21  11:56:59'),(57,'T202106170001','<p>adasdasd</p>','User','2021-06-21  11:57:52'),(58,'T202106170001','<p>adasdasd</p>','User','2021-06-21  11:57:54'),(59,'T202106170001','<p>dfsdfsdf</p>','User','2021-06-21  11:58:16'),(60,'T202106170001','<p>aku</p>','User','2021-06-21  11:58:20'),(61,'T202106170001','<p>xzczxczxc</p>','User','2021-06-21  12:20:33'),(62,'T202106170001','<p>woy</p>','User','2021-06-21  12:37:59'),(63,'T202106170001','<p>asdasdasd</p>','User','2021-06-21  12:38:50'),(64,'T202106170001','<p>iyoooo</p>','User','2021-06-21  12:43:23'),(65,'T202106210006','fsdfsd','Admin','2021-06-21  13:04:13'),(66,'T202106210006','dsfsdfsdf','Admin','2021-06-21  13:04:17'),(67,'T202106210005','sdfsdf','Admin','2021-06-21  13:08:38'),(68,'T202106210007','','Admin','2021-06-21  13:43:41'),(69,'T202106210007','<p>sdfsdfsd</p>','Admin','2021-06-21  13:45:26'),(70,'T202106210007','uy','Admin','2021-06-21  13:51:25'),(71,'T202106210007','<p>asdasdasd</p>','Admin','2021-06-21  13:54:46'),(72,'T202106210007','<p>woy</p>','Admin','2021-06-21  13:54:50'),(73,'T202106170001','sdfsdfsdf','Teknisi1','2021-06-21  14:00:12'),(74,'T202106170001','<p>Gimana?</p>','Teknisi1','2021-06-21  14:33:59'),(75,'T202106170001','<p>woy</p>','User','2021-06-21  15:03:29'),(76,'T202106170001','<p>Apa ?</p>','Admin','2021-06-22  06:02:51'),(77,'T202106220008','<p>Test</p>','Admin','2021-06-22  10:30:09'),(78,'T202106220008','<p>Okhe bang</p>','Teknisi1','2021-06-22  10:38:08'),(79,'T202106220009','<p>Tolong Cepet Ya</p>','User','2021-06-22  14:54:39'),(80,'T202106220009','<p>Sabar Cuk</p>','Admin','2021-06-22  14:55:02'),(81,'T202106220009','<p>Otw Ke Teknisi</p>','Admin','2021-06-22  14:55:51'),(82,'T202106220008','<p>Gimana ?</p><p>&nbsp;</p>','Teknisi1','2021-06-22  15:08:05'),(83,'T202106170001','<p>test</p>','User','2021-07-26  02:42:04'),(84,'T202107260010','<p>Test</p><p>&nbsp;</p>','Temi','2021-07-26  03:18:46'),(85,'T202107260010','<p>Pen</p>','Admin','2021-07-26  03:30:47'),(86,'T202107260011','<p>Sedang ditangani teknisi</p>','Admin','2021-07-26  08:55:20');

#
# Structure for table "prioritas"
#

DROP TABLE IF EXISTS `prioritas`;
CREATE TABLE `prioritas` (
  `id_prioritas` int(11) NOT NULL AUTO_INCREMENT,
  `prioritas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_prioritas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

#
# Data for table "prioritas"
#

INSERT INTO `prioritas` VALUES (1,'CRITICAL'),(2,'HIGH'),(3,'NORMAL'),(4,'LOW');

#
# Structure for table "profile"
#

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Nama` varchar(100) NOT NULL DEFAULT '',
  `TglLahir` varchar(20) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `JenisKelamin` varchar(100) DEFAULT NULL,
  `NoTelp` varchar(15) DEFAULT NULL,
  `TglBuat` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "profile"
#

INSERT INTO `profile` VALUES ('Admin','Admin','','','Laki-laki','','2021-06-16  09:20:05'),('Ali','Ali',NULL,NULL,NULL,NULL,'2021-06-22  06:01:22'),('Arata','Ratata','18 maret 2000','asd','Laki-laki','111111111111111','2021-06-16  07:30:16'),('Teknisi1','John Sena',NULL,NULL,NULL,NULL,'2021-06-22  06:08:04'),('Teknisi2','Rojo Lele',NULL,NULL,NULL,NULL,'2021-06-22  06:08:04'),('Tem','Tem',NULL,NULL,NULL,NULL,'2021-06-22  06:08:04'),('Temi','Temi',NULL,NULL,NULL,NULL,'2021-07-26  02:54:54'),('User','Temi Duwi','Jakarta, 7 Agustus 1','Kedaung, Pamulang, Tangerang Selatan','Laki-laki','0239493424','');

#
# Structure for table "status"
#

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id_status` int(3) NOT NULL AUTO_INCREMENT,
  `nm_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

#
# Data for table "status"
#

INSERT INTO `status` VALUES (1,'TIKET DIBUAT'),(2,'TIKET TIDAK DISETUJUI'),(3,'TIKET TELAH DISETUJUI'),(4,'PEMILIHAN TEKNISI'),(5,'DIPROSES OLEH TEKNISI'),(6,'ANALISA KERUSAKAN'),(7,'MASALAH DITEMUKAN'),(8,'DALAM PERBAIKAN'),(9,'TESTING'),(10,'MENUNGGU KONFIRMASI USER'),(11,'TIKET SELESAI');

#
# Structure for table "ticket"
#

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id_tiket` varchar(13) NOT NULL DEFAULT '',
  `pelapor` varchar(20) NOT NULL DEFAULT '',
  `id_masalah` int(11) DEFAULT NULL,
  `subjek` varchar(50) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `id_prioritas` int(1) DEFAULT NULL,
  `id_status` varchar(255) DEFAULT NULL,
  `progress` int(3) DEFAULT NULL,
  `tgl_tiket` datetime DEFAULT NULL,
  `teknisi` varchar(20) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `Estimasi` int(2) DEFAULT 0,
  PRIMARY KEY (`id_tiket`,`pelapor`),
  KEY `pelapor` (`pelapor`),
  KEY `id_kategori` (`id_masalah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "ticket"
#

INSERT INTO `ticket` VALUES ('T202107270001','Temi Duwi',4,'Layar bluescreen','sfdsf',1,'5',0,'2021-07-27 14:11:37','Teknisi1',NULL,0),('T202107270002','Temi Duwi',4,'Layar bluescreen','sdfsdf',2,'4',0,'2021-07-27 14:12:19',NULL,NULL,0),('T202107270003','Temi Duwi',7,'keyboard tidak berfiungsi','sdfsdf',2,'1',0,'2021-07-27 14:13:04',NULL,NULL,0),('T202107270004','Temi Duwi',7,'sdfsdf','sfsdfs',4,'5',0,'2021-07-27 14:13:59','Teknisi1',NULL,0),('T202107270005','Temi Duwi',4,'sdfsdf','sdfsdf',2,'6',18,'2021-07-27 14:21:00','Teknisi1',NULL,3);

#
# Structure for table "tracking"
#

DROP TABLE IF EXISTS `tracking`;
CREATE TABLE `tracking` (
  `Id_tracking` int(11) NOT NULL AUTO_INCREMENT,
  `id_tiket` varchar(13) NOT NULL,
  `tgltrack` varchar(255) DEFAULT NULL,
  `id_status` int(3) NOT NULL DEFAULT 0,
  `Oleh` char(50) DEFAULT NULL,
  PRIMARY KEY (`Id_tracking`,`id_tiket`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tracking"
#

INSERT INTO `tracking` VALUES (1,'T202107270001','2021-07-27  14:11:37',1,'User'),(2,'T202107270002','2021-07-27  14:12:19',1,'User'),(3,'T202107270003','2021-07-27  14:13:04',1,'User'),(4,'T202107270004','2021-07-27  14:13:59',1,'User'),(5,'T202107270004','2021-07-27  14:18:33',3,'Admin'),(6,'T202107270004','2021-07-27  14:18:33',4,'Admin'),(7,'T202107270002','2021-07-27  14:18:40',3,'Admin'),(8,'T202107270002','2021-07-27  14:18:40',4,'Admin'),(9,'T202107270001','2021-07-27  14:18:46',3,'Admin'),(10,'T202107270001','2021-07-27  14:18:46',4,'Admin'),(11,'T202107270005','2021-07-27  14:21:00',1,'User'),(12,'T202107270005','2021-07-27  14:21:31',3,'Admin'),(13,'T202107270005','2021-07-27  14:21:31',4,'Admin'),(14,'T202107270005','2021-07-27  14:24:05',5,'Admin'),(15,'T202107270004','2021-07-27  14:24:42',5,'Admin'),(16,'T202107270005','2021-07-30  04:10:00',8,'Teknisi1'),(17,'T202107270005','2021-07-30  04:59:18',0,'Teknisi1'),(18,'T202107270005','2021-07-30  04:59:55',6,'Teknisi1'),(19,'T202107270005','2021-07-30  05:02:15',0,'Teknisi1'),(20,'T202107270005','2021-07-30  05:04:15',0,'Teknisi1'),(21,'T202107270005','2021-07-30  05:05:15',6,'Teknisi1'),(22,'T202107270001','2021-07-30  05:27:44',5,'Admin');

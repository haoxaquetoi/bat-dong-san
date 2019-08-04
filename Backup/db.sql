/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.7.19-log : Database - bds
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `address_city` */

DROP TABLE IF EXISTS `address_city`;

CREATE TABLE `address_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `address_city` */

insert  into `address_city`(`id`,`name`,`code`,`created_at`,`updated_at`) values (1,'Hà Nội','HN','0000-00-00 00:00:00',NULL),(2,'Hải Phòng','HP',NULL,NULL),(3,'Hải Dương','HD',NULL,NULL),(4,'Thành Phố Hồ Chí Minh','HCM',NULL,NULL),(5,'Cần Thơ','CT',NULL,NULL),(6,'Đà Nẵng','DN',NULL,NULL);

/*Table structure for table `address_district` */

DROP TABLE IF EXISTS `address_district`;

CREATE TABLE `address_district` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `address_district` */

insert  into `address_district`(`id`,`city_id`,`name`,`code`,`created_at`,`updated_at`) values (1,1,'Quận Hoàng Mai','HM',NULL,NULL),(2,1,'Quận Đống Đa','DD',NULL,NULL),(3,1,'Quận Hai Bà Trưng','HBR',NULL,NULL);

/*Table structure for table `address_street` */

DROP TABLE IF EXISTS `address_street`;

CREATE TABLE `address_street` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `village_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `address_street` */

insert  into `address_street`(`id`,`village_id`,`name`,`code`,`created_at`,`updated_at`) values (1,1,'Đường Trương Định','TD',NULL,NULL),(2,1,'Đường Giải Phóng','GP',NULL,NULL);

/*Table structure for table `address_village` */

DROP TABLE IF EXISTS `address_village`;

CREATE TABLE `address_village` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `address_village` */

insert  into `address_village`(`id`,`district_id`,`name`,`code`,`created_at`,`updated_at`) values (1,1,'Phường.Tương Mai','TM',NULL,NULL),(2,1,'Phường Hoàng Văn Thụ','HVT',NULL,NULL);

/*Table structure for table `advertising` */

DROP TABLE IF EXISTS `advertising`;

CREATE TABLE `advertising` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `begin_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `file_path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `advertising` */

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Trash',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_sticky` tinyint(4) NOT NULL DEFAULT '0',
  `is_censored` tinyint(4) NOT NULL DEFAULT '0',
  `is_sold` tinyint(4) DEFAULT '0',
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Product',
  `floor_area` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `article` */

insert  into `article`(`id`,`title`,`slug`,`summary`,`content`,`begin_date`,`end_date`,`status`,`deleted`,`created_at`,`updated_at`,`deleted_at`,`is_sticky`,`is_censored`,`is_sold`,`thumbnail`,`type`,`floor_area`) values (21,'1111','1',NULL,'<p>111</p>','2017-07-30 00:00:00','2017-08-25 00:00:00','Publish',0,'2017-08-15 16:52:43','2017-08-16 15:43:04',NULL,0,1,1,NULL,'Product',NULL),(22,'fsdfsdfsdfsdf','1213',NULL,'<p>qưeqwe</p>','2017-07-30 00:00:00','2017-08-25 00:00:00','Publish',0,'2017-08-15 16:53:12','2017-08-15 16:53:22',NULL,1,0,0,NULL,'Product',NULL);

/*Table structure for table `article_base` */

DROP TABLE IF EXISTS `article_base`;

CREATE TABLE `article_base` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `street_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL DEFAULT '0',
  `myself` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `article_base` */

insert  into `article_base`(`id`,`article_id`,`city_id`,`district_id`,`village_id`,`street_id`,`address`,`price`,`myself`) values (51,9,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',10000000,1),(52,0,1,1,1,2,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Giải Phóng',123123,1),(53,11,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',123123,1),(86,13,1,3,1,2,'Hà Nội - Quận Hai Bà Trưng - Phường.Tương Mai - Đường Giải Phóng',123,1),(93,15,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',1212,1),(95,16,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',212,1),(96,17,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',12312312,1),(97,19,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',12312312,1),(99,20,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',12312312,1),(106,23,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',42434534,1),(107,12,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',23123,1),(110,22,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',123123,1),(111,21,1,1,1,1,'Hà Nội - Quận Hoàng Mai - Phường.Tương Mai - Đường Trương Định',121212,1);

/*Table structure for table `article_contact` */

DROP TABLE IF EXISTS `article_contact`;

CREATE TABLE `article_contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `article_contact` */

insert  into `article_contact`(`id`,`article_id`,`name`,`address`,`phone`,`mobile`,`email`) values (46,9,'123213','13123',NULL,'0868605579','a@gmgail.com'),(47,0,'12312','123123',NULL,'12312321','ds@gmail.com'),(48,11,'qư','123123',NULL,'213123123','a@gmail.com'),(79,13,'Pháda','1123123',NULL,'123123213','a@gmail.com'),(86,15,'1232131','23132','232','08683605541','aa@gmail.com'),(88,16,'2112','1212',NULL,'0868605579','phamvanhuong.hd@gmail.com'),(89,17,'123123','123213213123',NULL,'0868605579','a@gmail.com'),(90,19,'123123','123213213123',NULL,'0868605579','a@gmail.com'),(92,20,'123123','123213213123',NULL,'0868605579','a@gmail.com'),(97,23,'eqwe','qưeqw2',NULL,'3123213','a@gmail.com'),(98,12,'12312','312312',NULL,'12312312','aa@gmail.com'),(101,22,'ewrewr','ưerewr',NULL,'123123213','sss@gmail.com'),(102,21,'123','123213',NULL,'3213132','sdfsdfsdf@gmail.com');

/*Table structure for table `article_other` */

DROP TABLE IF EXISTS `article_other`;

CREATE TABLE `article_other` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `facade` int(11) DEFAULT NULL,
  `entry_width` int(11) DEFAULT NULL,
  `house_direction` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balcony_direction` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_storeys` int(11) DEFAULT NULL,
  `number_of_wc` int(11) DEFAULT NULL,
  `number_of_bedrooms` int(11) DEFAULT NULL,
  `furniture` text COLLATE utf8mb4_unicode_ci,
  `floor_area` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `article_other` */

insert  into `article_other`(`id`,`article_id`,`facade`,`entry_width`,`house_direction`,`balcony_direction`,`number_of_storeys`,`number_of_wc`,`number_of_bedrooms`,`furniture`,`floor_area`) values (51,9,123,NULL,NULL,NULL,NULL,0,0,'0',NULL),(52,0,123,NULL,'123',NULL,NULL,0,0,'0',NULL),(53,11,NULL,NULL,NULL,NULL,NULL,0,0,'0',NULL),(84,13,1211,12,'southwest','northeast',NULL,12,12,'<p>5345ce</p>\n<p>e</p>\n<p>cg</p>\n<p>recg</p>',0),(91,15,121,2121,'southeast','northeast',12,21,21,'<p><audio src=\"/bds/file-manager/files/shares/AnhSeManhMeYeuEm-MrSiro-5086639.mp3\" controls=\"controls\">\n<source src=\"/bds/file-manager/files/shares/AnhSeManhMeYeuEm-MrSiro-5086639.mp3\" type=\"audio/mpeg\" /></audio><audio src=\"/bds/file-manager/files/shares/AnhSeManhMeYeuEm-MrSiro-5086639.mp3\" controls=\"controls\"></audio></p>',12),(93,16,NULL,NULL,NULL,NULL,NULL,0,0,'<p>212</p>',0),(94,17,NULL,NULL,'northeast','southeast',NULL,0,0,'<p>123</p>',0),(95,19,NULL,NULL,'northeast','southeast',NULL,0,0,'<p>123</p>',0),(97,20,NULL,NULL,'northeast','southeast',NULL,0,0,'<p>123</p>',0),(103,23,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0),(104,12,21,21,'northeast','southwest',12,0,0,'<p>0</p>',45),(107,22,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0),(108,21,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0);

/*Table structure for table `article_slide` */

DROP TABLE IF EXISTS `article_slide`;

CREATE TABLE `article_slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `article_slide` */

insert  into `article_slide`(`id`,`article_id`,`type`,`path`) values (1,18,'images','http://localhost/bds//file-manager/photos/shares/Chrysanthemum.jpg'),(2,18,'images','http://localhost/bds//file-manager/photos/shares/_MG_2876.jpg'),(3,19,'images','http://localhost/bds//file-manager/photos/shares/Chrysanthemum.jpg'),(4,19,'images','http://localhost/bds//file-manager/photos/shares/_MG_2876.jpg'),(9,20,'images','http://localhost/bds//file-manager/photos/shares/_MG_2876.jpg'),(10,20,'images','http://localhost/bds//file-manager/photos/shares/_MG_2876.jpg'),(11,20,'youtube','https://www.youtube.com/embed/$scope.articleInfo'),(28,12,'images','http://localhost/bds//file-manager/photos/shares/_MG_2876.jpg'),(29,12,'images','http://localhost/bds//file-manager/photos/shares/_MG_2876.jpg'),(30,12,'youtube','https://www.youtube.com/embed/123'),(31,12,'youtube','https://www.youtube.com/embed/123');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `depth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`slug`,`parent_id`,`status`,`type`,`order`,`depth`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (1,'Bán căn hộ chung cư','ban-can-h-chung-c',0,1,'Product',2,'/2',0,NULL,'2017-07-25 14:02:11','2017-08-16 14:35:59'),(2,'Cho thuê nhà trọ','cho-thue-nha-tr',0,1,'News',4,'/4',0,NULL,'2017-07-25 14:02:25','2017-08-16 14:35:59'),(3,'Bán nhà mặt phố','ban-nha-mt-ph',1,1,'Product',1,'/2/1',0,NULL,'2017-07-27 14:23:21','2017-08-16 14:35:59'),(4,'Bán nhà dự án','ban-nha-d-an',0,1,'Product',1,'/1',0,NULL,'2017-07-27 14:23:48','2017-08-16 14:35:59');

/*Table structure for table `category_article` */

DROP TABLE IF EXISTS `category_article`;

CREATE TABLE `category_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_article_category_id_article_id_unique` (`category_id`,`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category_article` */

insert  into `category_article`(`id`,`category_id`,`article_id`) values (189,1,1),(5,1,6),(7,1,7),(52,1,8),(192,1,11),(262,1,12),(233,1,13),(247,1,16),(25,1,18),(266,1,21),(6,2,6),(9,2,7),(53,2,8),(187,2,9),(191,2,10),(234,2,13),(249,2,17),(27,2,18),(251,2,19),(255,2,20),(261,2,23),(51,3,2),(8,3,7),(186,3,9),(190,3,10),(245,3,15),(26,3,18),(188,4,9),(238,4,14),(248,4,16),(250,4,17),(252,4,19),(256,4,20),(265,4,22);

/*Table structure for table `crawler` */

DROP TABLE IF EXISTS `crawler`;

CREATE TABLE `crawler` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `crawler` */

insert  into `crawler`(`id`,`website_name`,`website_url`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (1,'Bất động sản','https://batdongsan.com.vn/',0,NULL,'2017-08-04 17:30:32','2017-08-05 05:01:10');

/*Table structure for table `crawler_config` */

DROP TABLE IF EXISTS `crawler_config`;

CREATE TABLE `crawler_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `crawler_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_xpath` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_post_xpath` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xpath` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `crawler_config` */

/*Table structure for table `crawler_item` */

DROP TABLE IF EXISTS `crawler_item`;

CREATE TABLE `crawler_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uri` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `crawler_item` */

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `feedback` */

insert  into `feedback`(`id`,`name`,`order`,`status`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (1,'Nội dung khác',1,1,0,NULL,'2017-08-12 09:50:05','2017-08-16 16:10:12'),(2,'Trùng với tin rao khác',3,1,0,NULL,'2017-08-12 09:49:39','2017-08-16 16:10:12'),(3,'Tin không có thật',4,1,0,NULL,'2017-08-12 09:49:47','2017-08-16 16:10:12'),(4,'Bất động sản đã bán',5,1,0,NULL,'2017-08-12 09:49:56','2017-08-12 09:49:56'),(5,'Địa chỉ của bất động sản',2,1,0,NULL,'2017-08-12 09:49:31','2017-08-16 16:10:12');

/*Table structure for table `feedback_article` */

DROP TABLE IF EXISTS `feedback_article`;

CREATE TABLE `feedback_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `feedback_id` int(11) NOT NULL,
  `readed` tinyint(4) NOT NULL DEFAULT '0',
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `IPClient` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `feedback_article` */

insert  into `feedback_article`(`id`,`article_id`,`feedback_id`,`readed`,`value`,`IPClient`,`created_at`) values (1,22,3,0,'','','0000-00-00 00:00:00'),(2,22,4,0,'','127.0.0.1','2017-08-12 15:58:10'),(3,22,5,0,'fsd','234','2017-01-07 00:00:00'),(4,21,1,1,'2','21','0000-00-00 00:00:00'),(5,22,3,1,'23','123','0000-00-00 00:00:00'),(6,22,1,0,'23','2432','0000-00-00 00:00:00'),(7,21,2,1,'342342','23423','0000-00-00 00:00:00'),(8,21,1,1,'222','22','0000-00-00 00:00:00'),(9,21,2,1,'4','23423','0000-00-00 00:00:00'),(10,21,4,1,'42345','342342','0000-00-00 00:00:00'),(11,22,1,1,'675','567','0000-00-00 00:00:00'),(12,354,3,0,'45','5','0000-00-00 00:00:00'),(13,22,1,0,'h nào say đắm với những \"Ngôi sao\" phương Đông này không ạ. Hộp đựng thiết kế rất sang trọng, rất thíc hợp làm quà tặng ạ, tặng xong thì...','127.0.0.1','2017-08-16 16:28:09');

/*Table structure for table `group` */

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `group` */

/*Table structure for table `group_permit` */

DROP TABLE IF EXISTS `group_permit`;

CREATE TABLE `group_permit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL DEFAULT '0',
  `permit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `group_permit` */

/*Table structure for table `group_user` */

DROP TABLE IF EXISTS `group_user`;

CREATE TABLE `group_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `group_user` */

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `media` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `depth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`type`,`position_id`,`parent`,`order`,`depth`,`value`) values (16,'Bán nhà đất','link',4,0,1,'/1','{\"url\":\"http%3A%2F%2Flocalhost%2Fbds%2Fadmin%2Fmenu%23%21%2F\",\"categoryID\":\"\",\"articleID\":\"\"}'),(17,'Bán căn hộ trung cư','article',4,18,1,'/1/1/1','{\"url\":\"\",\"categoryID\":\"\",\"articleID\":22}'),(18,'Bán nhà riêng','link',4,16,1,'/1/1','{\"url\":\"%2F\",\"categoryID\":\"\",\"articleID\":\"\"}');

/*Table structure for table `menu_position` */

DROP TABLE IF EXISTS `menu_position`;

CREATE TABLE `menu_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu_position` */

insert  into `menu_position`(`id`,`name`) values (4,'Menu footer'),(5,'Menu Header');

/*Table structure for table `metadata` */

DROP TABLE IF EXISTS `metadata`;

CREATE TABLE `metadata` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `metadata` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (32,'2014_10_12_000000_create_users_table',1),(33,'2014_10_12_100000_create_password_resets_table',1),(34,'2017_06_12_184800_create_group_table',1),(35,'2017_06_12_184834_create_group_user_table',1),(36,'2017_06_12_184908_create_ou_table',1),(37,'2017_06_12_184936_create_user_permit',1),(38,'2017_06_12_185023_create_group_permit_table',1),(39,'2017_06_23_084800_create_crawler_table',1),(40,'2017_06_23_085306_create_crawler_config_table',1),(41,'2017_06_26_031923_create_category_table',1),(42,'2017_06_28_043336_create_media_table',1),(43,'2017_07_07_045927_create_category_article_table',1),(44,'2017_07_07_051100_create_article_table',1),(45,'2017_07_07_064655_create_article_other_table',1),(46,'2017_07_07_065139_create_article_contact_table',1),(47,'2017_07_07_071102_create_article_base_table',1),(48,'2017_07_07_071424_create_article_slide_table',1),(49,'2017_07_07_072402_create_tag_table',1),(50,'2017_07_07_072530_create_tag_article_table',1),(51,'2017_07_07_074607_create_crawler_item_table',1),(52,'2017_07_07_074826_create_feedback_table',1),(53,'2017_07_07_091751_create_feedback_article_table',1),(54,'2017_07_07_092145_create_advertising_table',1),(55,'2017_07_07_092455_create_metadata_table',1),(56,'2017_07_07_092615_create_menu_table',1),(57,'2017_07_07_101153_create_menu_position_table',1),(58,'2017_07_07_101320_create_widget_table',1),(59,'2017_07_21_154218_create_address_city_table',1),(60,'2017_07_21_154424_create_address_district_table',1),(61,'2017_07_21_154731_create_address_village_table',1),(62,'2017_07_21_154934_create_address_street_table',1);

/*Table structure for table `ou` */

DROP TABLE IF EXISTS `ou`;

CREATE TABLE `ou` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `dep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ou` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tag` */

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tag` */

insert  into `tag`(`id`,`code`,`count`,`updated_at`) values (1,'Tag',3,'2017-07-31 16:49:35'),(3,'Tag2',13,'2017-08-12 08:53:18'),(4,'nhà trọ',45,'2017-08-14 14:06:32'),(5,'Nhà cho thuê',33,'2017-08-14 14:06:32');

/*Table structure for table `tag_article` */

DROP TABLE IF EXISTS `tag_article`;

CREATE TABLE `tag_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tag_article` */

insert  into `tag_article`(`id`,`tag_id`,`article_id`) values (22,5,9),(23,4,9),(24,4,1),(25,5,1),(64,4,13),(68,5,14),(69,4,14),(76,3,15),(79,5,16),(80,4,17),(81,4,19),(83,4,20),(92,5,23),(93,3,23),(94,4,12),(95,5,12);

/*Table structure for table `user_permit` */

DROP TABLE IF EXISTS `user_permit`;

CREATE TABLE `user_permit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_permit` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ou_id` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`is_admin`,`active`,`deleted`,`phone`,`job_title`,`ou_id`,`avatar`,`remember_token`,`deleted_at`,`created_at`,`updated_at`) values (1,'admin','admin@newtel.vn','$2y$10$XB2oupSi81h6fF0xsukiKuwjZwTDmHIzCCtn8DDJfTIid7BHtpQWO',1,1,0,NULL,NULL,0,NULL,'FxzdJEv721irYW8oX1yF7UXbi8OUAcg2UZVumFjM5wG1SXvUpcYC1pInGknd',NULL,'2017-07-24 16:21:04',NULL),(2,'Phạm Văn Hưởng','phamvanhuong.hd@gmail.com','$2y$10$4GGCqAw7xxA1U/xCgqhYheER1rrjRp8Q0mgvZC5MuOxlkNt38cPou',0,1,0,'0868605579','GIám đốc',0,NULL,NULL,NULL,'2017-08-15 14:41:57',NULL);

/*Table structure for table `widget` */

DROP TABLE IF EXISTS `widget`;

CREATE TABLE `widget` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `cache` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `widget` */

insert  into `widget`(`id`,`position_code`,`type`,`value`,`order`,`cache`) values (2,'header','menu','{\"menuPositionId\":4}',1,'[{\"id\":16,\"name\":\"B\\u00e1n nh\\u00e0 \\u0111\\u1ea5t\",\"type\":\"link\",\"position_id\":4,\"parent\":0,\"order\":1,\"depth\":\"\\/1\",\"value\":\"{\\\"url\\\":\\\"http%3A%2F%2Flocalhost%2Fbds%2Fadmin%2Fmenu%23%21%2F\\\",\\\"categoryID\\\":\\\"\\\",\\\"articleID\\\":\\\"\\\"}\",\"href\":\"http:\\/\\/localhost\\/bds\\/admin\\/menu#!\\/\"},{\"id\":18,\"name\":\"B\\u00e1n nh\\u00e0 ri\\u00eang\",\"type\":\"link\",\"position_id\":4,\"parent\":16,\"order\":1,\"depth\":\"\\/1\\/1\",\"value\":\"{\\\"url\\\":\\\"%2F\\\",\\\"categoryID\\\":\\\"\\\",\\\"articleID\\\":\\\"\\\"}\",\"href\":\"http:\\/\\/localhost\\/bds\"},{\"id\":17,\"name\":\"B\\u00e1n c\\u0103n h\\u1ed9 trung c\\u01b0\",\"type\":\"article\",\"position_id\":4,\"parent\":18,\"order\":1,\"depth\":\"\\/1\\/1\\/1\",\"value\":\"{\\\"url\\\":\\\"\\\",\\\"categoryID\\\":\\\"\\\",\\\"articleID\\\":22}\",\"href\":\"http:\\/\\/localhost\\/bds\\/ban-nha-d-an\\/4\\/1213\\/22\"}]'),(4,'footer','menu','{\"menuPositionId\":4}',1,'{}');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

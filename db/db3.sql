/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - construction
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`construction` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `construction`;

/*Table structure for table `book_request` */

DROP TABLE IF EXISTS `book_request`;

CREATE TABLE `book_request` (
  `br_id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `u_id` int(10) DEFAULT NULL,
  `l_id` int(10) DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `description` varchar(150) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`br_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `book_request` */

insert  into `book_request`(`br_id`,`date`,`u_id`,`l_id`,`from`,`to`,`status`,`description`,`amount`) values 
(3,'2024-06-11',2,1,'2024-06-12','2024-06-13','Paid','House maintenance',100),
(5,'2024-06-11',2,1,'2024-06-15','2024-06-17','Paid','sdfghjhgf fjftj',114),
(6,NULL,NULL,NULL,NULL,NULL,'Pending',NULL,NULL),
(7,'2024-07-20',2,1,'2024-07-21','2024-07-24','Paid','dsc',1000);

/*Table structure for table `dboy` */

DROP TABLE IF EXISTS `dboy`;

CREATE TABLE `dboy` (
  `did` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dboy` */

insert  into `dboy`(`did`,`name`,`phone`,`address`) values 
(1,'db1','7755220011','Address of db1@gmail.com');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `f_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `feedback` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `feedback` */

insert  into `feedback`(`f_id`,`u_id`,`date`,`feedback`) values 
(4,2,'2024-06-13','Good one'),
(5,2,'2024-06-13','Valuable resource'),
(7,2,'2024-07-20','Good');

/*Table structure for table `labour_reg` */

DROP TABLE IF EXISTS `labour_reg`;

CREATE TABLE `labour_reg` (
  `l_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phonenumber` bigint(15) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `labour_reg` */

insert  into `labour_reg`(`l_id`,`name`,`email`,`phonenumber`,`place`,`password`,`purpose`) values 
(1,'carpenter','carpenter@gmail.com',7736745599,'Tcr','carpenter@gmaiL123','Carpender');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `utype` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Pending',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`lid`,`uid`,`uname`,`password`,`utype`,`status`) values 
(22,2,'abi@gmail.com','abi@gmaiL123','users','Approved'),
(23,1,'carpenter@gmail.com','carpenter@gmaiL123','labours','Approved'),
(24,0,'admin','admin','admin','Approved'),
(25,3,'user@gmail.com','user@gmaiL123','users','Approved'),
(26,1,'db1@gmail.com','db1@gmaiL123','dboy','Approved'),
(27,NULL,NULL,NULL,NULL,'Pending');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `amount` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `br_id` int(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Succesfull',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `payment` */

insert  into `payment`(`p_id`,`amount`,`date`,`br_id`,`status`) values 
(1,114,'2024-06-12',5,'Succesfull'),
(2,100,'2024-06-12',3,'Succesfull'),
(3,1000,'2024-07-20',7,'Succesfull'),
(4,10000,NULL,1,'Succesfull');

/*Table structure for table `paymentprod` */

DROP TABLE IF EXISTS `paymentprod`;

CREATE TABLE `paymentprod` (
  `pp_id` int(10) NOT NULL AUTO_INCREMENT,
  `amount` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `pbr_id` int(10) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Succesfull',
  PRIMARY KEY (`pp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `paymentprod` */

insert  into `paymentprod`(`pp_id`,`amount`,`date`,`pbr_id`,`status`) values 
(1,4000,NULL,2,'Succesfull'),
(2,7000,NULL,3,'Succesfull');

/*Table structure for table `prod_book_rq` */

DROP TABLE IF EXISTS `prod_book_rq`;

CREATE TABLE `prod_book_rq` (
  `pbr_id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT current_timestamp(),
  `u_id` int(10) DEFAULT NULL,
  `p_id` int(10) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  PRIMARY KEY (`pbr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `prod_book_rq` */

insert  into `prod_book_rq`(`pbr_id`,`date`,`u_id`,`p_id`,`status`,`amount`,`qty`) values 
(1,'2024-09-24',2,18,'Delivered',10000,10),
(2,'2024-09-24',2,18,'Delivered',4000,4),
(3,'2024-09-24',3,18,'Delivered',7000,7);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `p_id` int(20) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(50) DEFAULT NULL,
  `p_qty` int(20) DEFAULT NULL,
  `p_desc` varchar(100) DEFAULT NULL,
  `p_img` varchar(200) DEFAULT NULL,
  `p_status` varchar(20) DEFAULT 'approved',
  `p_price` int(20) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`p_id`,`p_name`,`p_qty`,`p_desc`,`p_img`,`p_status`,`p_price`) values 
(18,'second prod',79,'desc of p2','../static/media/pexels-energepiccom-175039.jpg','approved',1000),
(19,'Quaryy',1000,'Material for construction','../static/media/sngist.jpg','approved',5000);

/*Table structure for table `user_reg` */

DROP TABLE IF EXISTS `user_reg`;

CREATE TABLE `user_reg` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL,
  `phonenumber` bigint(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_reg` */

insert  into `user_reg`(`u_id`,`name`,`age`,`email`,`place`,`phonenumber`,`password`,`purpose`) values 
(2,'Abi',21,'abi@gmail.com','TCr',7736745588,'abi@gmaiL123','Shifting'),
(3,'user',21,'user@gmail.com','TCR',7755224411,'user@gmaiL123','New home construction');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.22-MariaDB : Database - food-order
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`food-order` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `food-order`;

/*Table structure for table `contact_us` */

DROP TABLE IF EXISTS `contact_us`;

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `contact_us` */

insert  into `contact_us`(`id`,`user_name`,`user_email`,`address`) values 
(7,'Emon','emon@gmail.com','please give my food'),
(8,'Mahbub','mahbub@gmail.com','please delivery my food fast'),
(9,'sakib','sakib@gmail.com','please give me food');

/*Table structure for table `customer_info` */

DROP TABLE IF EXISTS `customer_info`;

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `cus_email` varchar(255) DEFAULT NULL,
  `cus_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer_info` */

insert  into `customer_info`(`id`,`first_name`,`last_name`,`cus_email`,`cus_password`) values 
(1,'Emran Hossain','Emon','eh.emon3059@gmail.com','eb06b9db06012a7a4179b8f3cb5384d3'),
(2,'Monir','hossain','moni@gmail.com','eb06b9db06012a7a4179b8f3cb5384d3');

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`id`,`full_name`,`username`,`password`) values 
(13,'Emon','eh','eb06b9db06012a7a4179b8f3cb5384d3'),
(15,'nazmul','nz','eb06b9db06012a7a4179b8f3cb5384d3'),
(16,'sohel','sh','25d55ad283aa400af464c76d713c07ad'),
(17,'Ibrahim Hossain','evan','eb06b9db06012a7a4179b8f3cb5384d3'),
(19,'Md sabbir hossen','sabbir','25d55ad283aa400af464c76d713c07ad'),
(20,'Emon','eh2','eb06b9db06012a7a4179b8f3cb5384d3'),
(21,'Emon','eh23','eb06b9db06012a7a4179b8f3cb5384d3');

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`id`,`title`,`image_name`,`featured`,`active`) values 
(4,'Pizza','Food_Category_790.jpg','Yes','Yes'),
(5,'Burger','Food_Category_344.jpg','Yes','Yes'),
(6,'MoMo','Food_Category_77.jpg','Yes','Yes'),
(9,'Vapa pitha','Food_Category_414.jpg','Yes','Yes'),
(10,'chicken roll','Food_Category_971.jpg','Yes','Yes'),
(11,'Dairy product','Food_Category_42.jpg','Yes','Yes');

/*Table structure for table `tbl_food` */

DROP TABLE IF EXISTS `tbl_food`;

CREATE TABLE `tbl_food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_food` */

insert  into `tbl_food`(`id`,`title`,`description`,`price`,`image_name`,`category_id`,`featured`,`active`) values 
(3,'Dumplings Specials','Chicken Dumpling with herbs from Mountains',5.00,'Food-Name-3649.jpg',6,'Yes','Yes'),
(4,'Best Burger','Burger with Ham, Pineapple and lots of Cheese.',4.00,'Food-Name-6340.jpg',5,'Yes','Yes'),
(5,'Smoky BBQ Pizza','Best Firewood Pizza in Town.',6.00,'Food-Name-8298.jpg',4,'No','Yes'),
(6,'Sadeko Momo','Best Spicy Momo for Winter',6.00,'Food-Name-7387.jpg',6,'Yes','Yes'),
(7,'Mixed Pizza','Pizza with chicken, Ham, Buff, Mushroom and Vegetables',10.00,'Food-Name-7833.jpg',4,'Yes','Yes'),
(8,'Sed ipsum cillum in','Sed aut officiis qui',52.00,'',5,'No','No'),
(9,'Vapa','winter pitha',20.00,'Food-Name-1519.jpg',9,'Yes','Yes'),
(10,'Ginger chicken rolls','For these soft and crunchy rolls',260.00,'Food-Name-9169.jpg',10,'Yes','Yes'),
(11,'Flavored Yogurt','Make homemade flavored yogurt with or without a machine with this recipe',100.00,'Food-Name-664.jpg',11,'Yes','Yes'),
(12,'butter','Butter has been a culinary staple around the world for hundreds of years, and with good reason - it makes everything taste better!',120.00,'Food-Name-4.jpg',11,'Yes','Yes');

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_order` */

insert  into `tbl_order`(`id`,`food`,`price`,`qty`,`total`,`order_date`,`status`,`customer_name`,`customer_contact`,`customer_email`,`customer_address`) values 
(1,'Sadeko Momo',6.00,3,18.00,'2020-11-30 03:49:48','Cancelled','Bradley Farrell','+1 (576) 504-4657','zuhafiq@mailinator.com','Duis aliqua Qui lor'),
(2,'Best Burger',4.00,4,16.00,'2020-11-30 03:52:43','Delivered','Kelly Dillard','+1 (908) 914-3106','fexekihor@mailinator.com','Incidunt ipsum ad d'),
(3,'Mixed Pizza',10.00,2,20.00,'2020-11-30 04:07:17','Delivered','Jana Bush','+1 (562) 101-2028','tydujy@mailinator.com','Minima iure ducimus'),
(4,'Sadeko Momo',6.00,3,18.00,'2022-12-03 04:30:05','Delivered','Emon','01721821456','eh.emon@gmail.com','kholamura'),
(5,'Mixed Pizza',10.00,1,10.00,'2022-12-03 06:43:34','Ordered','zayed','01721821456','zayed@gmail.com','chandra'),
(6,'Vapa',20.00,1,20.00,'2022-12-06 07:44:09','Delivered','Emon','01721821456','ehEmon@gmail.com','kholamura , keranijoang , dhaka 1310'),
(7,'Sadeko Momo',6.00,3,18.00,'2022-12-12 04:13:55','On Delivery','shoel','01712084729','monir@gmail.com','sdoiufhsliuflusid'),
(8,'Sadeko Momo',6.00,4,24.00,'2022-12-12 07:29:58','Ordered','evan','0156165156985','tom@cr5.com','adfadfsdvsvcvzxcvzxv'),
(9,'Sadeko Momo',6.00,3,18.00,'2023-05-03 05:05:15','Ordered','Mahbub','01856247747','mahbub@gmail.com','noyapara ,jamalpur '),
(10,'Best Burger',4.00,1,4.00,'2023-05-03 05:08:09','Delivered','emu','01763145829','emu@gmail.com','noyapara,5 rasta, jamalpur .'),
(11,'Dumplings Specials',5.00,2,10.00,'2023-05-03 08:47:37','On Delivery','sakib','01725693241','sakib@gmail.com','dhanmondi , dhaka 1205'),
(12,'Dumplings Specials',5.00,1,5.00,'2023-05-04 11:15:08','Ordered','Emon','01763145829','emon@gmail.com','west pathaliya , jamalpur'),
(13,'Dumplings Specials',5.00,3,15.00,'2023-05-04 11:16:08','Ordered','Emon','01721821456','eh.emon3059@gmail.com','west pathaliya , jamalpur');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

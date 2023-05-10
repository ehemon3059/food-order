/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.24-MariaDB : Database - food-order
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
  `from_customer` varchar(100) DEFAULT NULL,
  `mobile_num` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `contact_us` */

insert  into `contact_us`(`id`,`user_name`,`from_customer`,`mobile_num`,`message`) values 
(2,'Emon','eh.emon3059@gmail.com','456456456','sdggdgdfh'),
(3,'Emon','eh.emon3059@gmail.com','456456456','sdggdgdfh'),
(4,'Mahbub','eh.emon3059@gmail.com','35235235','sdgbxfnfn'),
(5,'zayed','eh.emon3059@gmail.com','335345345','werwerw'),
(6,'partho','eh.emon3059@gmail.com','11313123124','asfasfasf'),
(8,'sakib','eh.emon3059@gmail.com','3123124142','asafadfsd'),
(9,'Emu','no.one3059@gmail.com','01721821456','please give our food as soon as possible'),
(10,'sakib','no.one3059@gmail.com','475869','Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere eos sint autem facilis cupiditate ratione ullam, cum quas assumenda obcaecati praesentium, asperiores ad illum laborum. Veniam quam distinctio, libero cupiditate necessitatibus qui sapiente c'),
(13,'Mahbub','mdsamsulalam971@gmail.com','1343325245','fsdfsdfsdfvcv'),
(14,'sakib','mdsamsulalam971@gmail.com','123123123','qazxsw'),
(15,'partho','mdsamsulalam971@gmail.com','123456','wgdgsx'),
(16,'zayed','mdsamsulalam971@gmail.com','43345364','dsgsdcxb');

/*Table structure for table `customer_info` */

DROP TABLE IF EXISTS `customer_info`;

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `cus_email` varchar(255) DEFAULT NULL,
  `cus_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer_info` */

insert  into `customer_info`(`id`,`first_name`,`last_name`,`cus_email`,`cus_password`) values 
(1,'Emran Hossain','Emon','eh.emon3059@gmail.com','eb06b9db06012a7a4179b8f3cb5384d3'),
(2,'samsul ','alom','mdsamsulalam971@gmail.com','eb06b9db06012a7a4179b8f3cb5384d3'),
(3,'Fatemuz zohora ','Emu','no.one3059@gmail.com','eb06b9db06012a7a4179b8f3cb5384d3'),
(4,'zayed','hasan','most.secure3059@gmail.com','81dc9bdb52d04dc20036dbd8313ed055');

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`id`,`full_name`,`username`,`position`,`password`) values 
(1,'Md Emran Hossain EMon','eh','owner','eb06b9db06012a7a4179b8f3cb5384d3'),
(2,'Md Nazmul Hasan','nz','manager','81dc9bdb52d04dc20036dbd8313ed055'),
(3,'Ibrahim Hossain','evan','manager','81dc9bdb52d04dc20036dbd8313ed055'),
(4,'Arif Uz Zaman Sohel','sohel','manager','81dc9bdb52d04dc20036dbd8313ed055'),
(5,'Monir Mahmud','moni','regular staff','81dc9bdb52d04dc20036dbd8313ed055'),
(6,'shihab khan','shihab','regular staff','81dc9bdb52d04dc20036dbd8313ed055'),
(7,'Rafiq hasan','rafiq','delivery man','81dc9bdb52d04dc20036dbd8313ed055');

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
  `order_from` varchar(255) DEFAULT NULL,
  `who_updated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_order` */

insert  into `tbl_order`(`id`,`food`,`price`,`qty`,`total`,`order_date`,`status`,`customer_name`,`customer_contact`,`customer_email`,`customer_address`,`order_from`,`who_updated`) values 
(14,'Dumplings Specials',5.00,1,5.00,'2023-05-04 02:57:21','Ordered','partho','01712084729','partho@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com',NULL),
(15,'Sadeko Momo',6.00,3,18.00,'2023-05-04 02:58:09','Delivered','zayed','01712084729','most.wanted3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com',NULL),
(16,'Sadeko Momo',6.00,1,6.00,'2023-05-04 03:04:27','Cancelled','evan','01856247747','humayramimi126@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com',NULL),
(17,'Sadeko Momo',6.00,1,6.00,'2023-05-08 06:09:16','Delivered','sakib','0193625874','no.one3054@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com',NULL),
(18,'Smoky BBQ Pizza',6.00,2,12.00,'2023-05-09 09:24:48','Ordered','Samsul','01721821456','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(19,'Smoky BBQ Pizza',6.00,1,6.00,'2023-05-09 09:28:15','Cancelled','Samsul','01763145829','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(20,'Vapa',20.00,3,60.00,'2023-05-09 09:30:49','Ordered','Samsul','01763145829','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(21,'Flavored Yogurt',100.00,4,400.00,'2023-05-09 09:34:40','Ordered','Emon','01721821456','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(22,'Flavored Yogurt',100.00,5,500.00,'2023-05-09 09:36:34','Ordered','Sony','01914072958','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(23,'butter',120.00,3,360.00,'2023-05-09 09:39:03','Ordered','zayed','01725693241','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(24,'butter',120.00,1,120.00,'2023-05-09 09:42:19','Ordered','Mahbub','01725693241','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(25,'butter',120.00,1,120.00,'2023-05-09 09:43:28','Ordered','Mahbub','01725693241','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(26,'butter',120.00,1,120.00,'2023-05-09 09:46:03','Ordered','Mahbub','01725693241','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(27,'Sadeko Momo',6.00,3,18.00,'2023-05-09 09:46:51','Ordered','Emon','01721821456','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(28,'Smoky BBQ Pizza',6.00,1,6.00,'2023-05-09 09:49:34','Ordered','Emon','01725693241','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(29,'Smoky BBQ Pizza',6.00,1,6.00,'2023-05-09 09:50:21','Ordered','Emon','01725693241','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(30,'Sadeko Momo',6.00,3,18.00,'2023-05-09 09:50:50','Ordered','sakib','01763145829','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(31,'Flavored Yogurt',100.00,2,200.00,'2023-05-09 09:52:12','Ordered','zayed','01721821456','no.one3054@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(32,'Sadeko Momo',6.00,1,6.00,'2023-05-09 09:53:39','Ordered','Mahbub','01725693241','no.one3054@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(33,'Vapa',20.00,1,20.00,'2023-05-09 09:56:28','Ordered','Mahbub','01725693241','monir@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(34,'Vapa',20.00,1,20.00,'2023-05-09 09:56:45','On Delivery','Samsul','01856247747','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(35,'Mixed Pizza',10.00,3,30.00,'2023-05-09 10:03:21','Ordered','zayed','01721821456','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(36,'Mixed Pizza',10.00,3,30.00,'2023-05-09 10:04:15','Ordered','zayed','01721821456','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(37,'Mixed Pizza',10.00,3,30.00,'2023-05-09 10:06:38','Ordered','zayed','01721821456','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(38,'Flavored Yogurt',100.00,1,100.00,'2023-05-09 10:07:10','Ordered','Emon','01725693241','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL),
(39,'Vapa',20.00,1,20.00,'2023-05-09 10:08:40','On Delivery','Mahbub','01725693241','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','rafiq'),
(54,'Vapa',20.00,1,20.00,'2023-05-09 10:54:56','Delivered','Emu','01721821456','no.one3059@gmail.com','west pathaliya , jamalpur','no.one3059@gmail.com',NULL),
(55,'Ginger chicken rolls',260.00,3,780.00,'2023-05-09 10:55:18','Delivered','Emon','01721821456','no.one3059@gmail.com','west pathaliya , jamalpur','no.one3059@gmail.com',NULL),
(56,'Flavored Yogurt',100.00,1,100.00,'2023-05-10 09:52:17','Delivered','Emon','01721821456','mdsamsulalam971@gmail.com','Thank you for reaching out to us. Please note that as an AI ','mdsamsulalam971@gmail.com',NULL),
(57,'butter',120.00,3,360.00,'2023-05-10 11:05:56','Delivered','sakib','01763145829','no.one3054@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','rafiq'),
(58,'Best Burger',4.00,2,8.00,'2023-05-10 03:25:51','Delivered','zayed','01721821456','no.one3059@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','eh');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

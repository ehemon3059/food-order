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
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

/*Data for the table `contact_us` */

insert  into `contact_us`(`id`,`user_name`,`from_customer`,`mobile_num`,`message`,`status`) values 
(2,'Emon','eh.emon3059@gmail.com','456456456','sdggdgdfh',NULL),
(3,'Emon','eh.emon3059@gmail.com','456456456','sdggdgdfh',NULL),
(4,'Mahbub','eh.emon3059@gmail.com','35235235','sdgbxfnfn',NULL),
(5,'zayed','eh.emon3059@gmail.com','335345345','werwerw',NULL),
(6,'partho','eh.emon3059@gmail.com','11313123124','asfasfasf',NULL),
(8,'sakib','eh.emon3059@gmail.com','3123124142','asafadfsd',NULL),
(9,'Emu','no.one3059@gmail.com','01721821456','please give our food as soon as possible',NULL),
(10,'sakib','no.one3059@gmail.com','475869','Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere eos sint autem facilis cupiditate ratione ullam, cum quas assumenda obcaecati praesentium, asperiores ad illum laborum. Veniam quam distinctio, libero cupiditate necessitatibus qui sapiente c',NULL),
(13,'Mahbub','mdsamsulalam971@gmail.com','1343325245','fsdfsdfsdfvcv',NULL),
(14,'sakib','mdsamsulalam971@gmail.com','123123123','qazxsw',NULL),
(15,'partho','mdsamsulalam971@gmail.com','123456','wgdgsx',NULL),
(16,'zayed','mdsamsulalam971@gmail.com','43345364','dsgsdcxb',NULL),
(24,'Samsul','mdsamsulalam971@gmail.com','01712084729','Deliver my food quickly','No reply'),
(25,'Emon','eh.emon3059@gmail.com','01721821456','The previous meal was very tasty','No reply');

/*Table structure for table `customer_info` */

DROP TABLE IF EXISTS `customer_info`;

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `cus_email` varchar(255) DEFAULT NULL,
  `cus_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer_info` */

insert  into `customer_info`(`id`,`first_name`,`last_name`,`cus_email`,`cus_password`) values 
(1,'Emran Hossain','Emon','eh.emon3059@gmail.com','eb06b9db06012a7a4179b8f3cb5384d3'),
(2,'samsul ','alom','mdsamsulalam971@gmail.com','eb06b9db06012a7a4179b8f3cb5384d3'),
(3,'Fatemuz zohora ','Emu','no.one3059@gmail.com','eb06b9db06012a7a4179b8f3cb5384d3'),
(4,'zayed','hasan','most.secure3059@gmail.com','81dc9bdb52d04dc20036dbd8313ed055'),
(6,'evan','hasan','ibrahim.bd.tr@gmail.com','81dc9bdb52d04dc20036dbd8313ed055'),
(7,'nazmul','hasan','queerestnazmul84@gmail.com','81dc9bdb52d04dc20036dbd8313ed055');

/*Table structure for table `service_area` */

DROP TABLE IF EXISTS `service_area`;

CREATE TABLE `service_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(100) DEFAULT NULL,
  `area_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `service_area` */

insert  into `service_area`(`id`,`area_name`,`area_image`) values 
(26,'Mohammadpur','Area-Name-6191.jpg'),
(27,'New Market','Area-Name-4573.jpg'),
(28,'Hazaribagh','Area-Name-9229.jpg');

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`id`,`full_name`,`username`,`position`,`password`) values 
(1,'Md Emran Hossain EMon','eh','owner','eb06b9db06012a7a4179b8f3cb5384d3'),
(2,'Md Nazmul Hasan','nz','manager','81dc9bdb52d04dc20036dbd8313ed055'),
(3,'Ibrahim Hossain','evan','manager','81dc9bdb52d04dc20036dbd8313ed055'),
(4,'Arif Uz Zaman Sohel','sohel','manager','81dc9bdb52d04dc20036dbd8313ed055'),
(5,'Monir Mahmud','moni','regular staff','81dc9bdb52d04dc20036dbd8313ed055'),
(6,'shihab khan','shihab','regular staff','81dc9bdb52d04dc20036dbd8313ed055'),
(7,'Rafiq hasan','rafiq','delivery man','81dc9bdb52d04dc20036dbd8313ed055'),
(10,'rayhan','babu','delivery man','81dc9bdb52d04dc20036dbd8313ed055'),
(12,'nasir','nasir','manager','81dc9bdb52d04dc20036dbd8313ed055');

/*Table structure for table `tbl_cart` */

DROP TABLE IF EXISTS `tbl_cart`;

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_order` varchar(100) DEFAULT NULL,
  `food_id` varchar(100) DEFAULT NULL,
  `add_to_cart_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_cart` */

insert  into `tbl_cart`(`id`,`from_order`,`food_id`,`add_to_cart_date`) values 
(2,'mdsamsulalam971@gmail.com','11','2023-05-13 07:18:02'),
(8,'no.one3059@gmail.com','7','2023-05-13 07:37:21'),
(9,'no.one3059@gmail.com','4','2023-05-13 07:37:24'),
(10,'no.one3059@gmail.com','9','2023-05-13 07:37:26'),
(11,'no.one3059@gmail.com','12','2023-05-13 07:37:29'),
(12,'no.one3059@gmail.com','11','2023-05-13 07:37:32'),
(13,'no.one3059@gmail.com','7','2023-05-13 07:42:28'),
(142,'','3','2023-05-17 11:18:04'),
(152,'queerestnazmul84@gmail.com','3','2023-05-17 11:33:21'),
(153,'queerestnazmul84@gmail.com','4','2023-05-17 11:33:24'),
(161,'','5','2023-05-18 05:34:14'),
(162,'','4','2023-05-18 07:11:24'),
(170,'','6','2023-05-20 11:22:07'),
(171,'','6','2023-05-20 11:23:37'),
(176,'','7','2023-05-20 08:24:56'),
(177,'eh.emon3059@gmail.com','5','2023-05-20 08:41:15'),
(178,'eh.emon3059@gmail.com','4','2023-05-20 08:41:18'),
(179,'','5','2023-05-23 02:16:17'),
(180,'mdsamsulalam971@gmail.com','5','2023-05-23 02:16:41'),
(181,'mdsamsulalam971@gmail.com','4','2023-05-23 02:16:43');

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`id`,`title`,`image_name`,`featured`,`active`) values 
(4,'Pizza','Food_Category_547.jpg','Yes','Yes'),
(5,'Burger','Food_Category_873.jpg','Yes','Yes'),
(6,'MoMo','Food_Category_49.jpg','Yes','Yes'),
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_food` */

insert  into `tbl_food`(`id`,`title`,`description`,`price`,`image_name`,`category_id`,`featured`,`active`) values 
(3,'Dumplings Specials','Chicken Dumpling with herbs from Mountains',5.00,'Food-Name-3649.jpg',6,'Yes','Yes'),
(4,'Best Burger','Burger with Ham, Pineapple and lots of Cheese.',4.00,'Food-Name-6340.jpg',5,'Yes','Yes'),
(5,'Smoky BBQ Pizza','Best Firewood Pizza in Town.',6.00,'Food-Name-8427.jpg',4,'Yes','Yes'),
(6,'Sadeko Momo','Best Spicy Momo for Winter',6.00,'Food-Name-7387.jpg',6,'Yes','Yes'),
(7,'Mixed Pizza','Pizza with chicken, Ham, Buff, Mushroom and Vegetables',10.00,'Food-Name-7833.jpg',4,'Yes','Yes'),
(9,'Vapa','winter pitha',20.00,'Food-Name-1519.jpg',9,'Yes','Yes'),
(10,'Ginger chicken rolls','For these soft and crunchy rolls',260.00,'Food-Name-9169.jpg',10,'Yes','Yes'),
(11,'Flavored Yogurt','Make homemade flavored yogurt with or without a machine with this recipe',100.00,'Food-Name-664.jpg',11,'Yes','Yes'),
(12,'butter','Butter has been a culinary staple around the world for hundreds of years, and with good reason - it makes everything taste better!',120.00,'Food-Name-4.jpg',11,'Yes','Yes'),
(17,'Ghee','Khati ghee',150.00,'Food-Name-5265.jpg',11,'Yes','Yes');

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `food` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `order_from` varchar(255) DEFAULT NULL,
  `who_updated` varchar(100) DEFAULT NULL,
  `our_location` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_order` */

insert  into `tbl_order`(`id`,`food`,`price`,`qty`,`total`,`order_date`,`status`,`customer_name`,`customer_contact`,`customer_email`,`customer_address`,`order_from`,`who_updated`,`our_location`) values 
(14,'Dumplings Specials',5,1,5,'2023-05-04 02:57:21','On Delivery','partho','01712084729','partho@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','eh',NULL),
(15,'Sadeko Momo',6,3,18,'2023-05-04 02:58:09','Delivered','zayed','01712084729','most.wanted3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com',NULL,NULL),
(16,'Sadeko Momo',6,1,6,'2023-05-04 03:04:27','Cancelled','evan','01856247747','humayramimi126@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com',NULL,NULL),
(17,'Sadeko Momo',6,1,6,'2023-05-08 06:09:16','Delivered','sakib','0193625874','no.one3054@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com',NULL,NULL),
(18,'Smoky BBQ Pizza',6,2,12,'2023-05-09 09:24:48','On Delivery','Samsul','01721821456','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','eh',NULL),
(19,'Smoky BBQ Pizza',6,1,6,'2023-05-09 09:28:15','Cancelled','Samsul','01763145829','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(20,'Vapa',20,3,60,'2023-05-09 09:30:49','Ordered','Samsul','01763145829','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(21,'Flavored Yogurt',100,4,400,'2023-05-09 09:34:40','On Delivery','Emon','01721821456','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','eh',NULL),
(22,'Flavored Yogurt',100,5,500,'2023-05-09 09:36:34','Ordered','Sony','01914072958','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(23,'butter',120,3,360,'2023-05-09 09:39:03','Cancelled','zayed','01725693241','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','eh',NULL),
(24,'butter',120,1,120,'2023-05-09 09:42:19','On Delivery','Mahbub','01725693241','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','eh',NULL),
(25,'butter',120,1,120,'2023-05-09 09:43:28','Ordered','Mahbub','01725693241','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(26,'butter',120,1,120,'2023-05-09 09:46:03','Ordered','Mahbub','01725693241','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(27,'Sadeko Momo',6,3,18,'2023-05-09 09:46:51','Ordered','Emon','01721821456','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(28,'Smoky BBQ Pizza',6,1,6,'2023-05-09 09:49:34','Delivered','Emon','01725693241','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','eh',NULL),
(29,'Smoky BBQ Pizza',6,1,6,'2023-05-09 09:50:21','Ordered','Emon','01725693241','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(30,'Sadeko Momo',6,3,18,'2023-05-09 09:50:50','Ordered','sakib','01763145829','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(31,'Flavored Yogurt',100,2,200,'2023-05-09 09:52:12','Ordered','zayed','01721821456','no.one3054@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(32,'Sadeko Momo',6,1,6,'2023-05-09 09:53:39','Ordered','Mahbub','01725693241','no.one3054@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(33,'Vapa',20,1,20,'2023-05-09 09:56:28','Ordered','Mahbub','01725693241','monir@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(34,'Vapa',20,1,20,'2023-05-09 09:56:45','Delivered','Samsul','01856247747','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','rafiq',NULL),
(35,'Mixed Pizza',10,3,30,'2023-05-09 10:03:21','Ordered','zayed','01721821456','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(36,'Mixed Pizza',10,3,30,'2023-05-09 10:04:15','Ordered','zayed','01721821456','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(37,'Mixed Pizza',10,3,30,'2023-05-09 10:06:38','Ordered','zayed','01721821456','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(38,'Flavored Yogurt',100,1,100,'2023-05-09 10:07:10','Ordered','Emon','01725693241','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com',NULL,NULL),
(39,'Vapa',20,1,20,'2023-05-09 10:08:40','Delivered','Mahbub','01725693241','zayed@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','rafiq',NULL),
(54,'Vapa',20,1,20,'2023-05-09 10:54:56','Delivered','Emu','01721821456','no.one3059@gmail.com','west pathaliya , jamalpur','no.one3059@gmail.com',NULL,NULL),
(55,'Ginger chicken rolls',260,3,780,'2023-05-09 10:55:18','Delivered','Emon','01721821456','no.one3059@gmail.com','west pathaliya , jamalpur','no.one3059@gmail.com',NULL,NULL),
(56,'Flavored Yogurt',100,1,100,'2023-05-10 09:52:17','Delivered','Emon','01721821456','mdsamsulalam971@gmail.com','Thank you for reaching out to us. Please note that as an AI ','mdsamsulalam971@gmail.com',NULL,NULL),
(57,'butter',120,3,360,'2023-05-10 11:05:56','Delivered','sakib','01763145829','no.one3054@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','rafiq',NULL),
(58,'Best Burger',4,2,8,'2023-05-10 03:25:51','Delivered','zayed','01721821456','no.one3059@gmail.com','west pathaliya , jamalpur','mdsamsulalam971@gmail.com','eh',NULL),
(59,'Pran Premium Ghee',380,1,380,'2023-05-10 07:23:24','Cancelled','zayed','01763145829','no.one3054@gmail.com','west pathaliya , jamalpur','ibrahim.bd.tr@gmail.com','eh',NULL),
(60,'Mixed Pizza',10,1,10,'2023-05-11 12:45:50','Ordered','sakib','01721821456','zayed@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','Yahoo'),
(68,'Dumplings Specials',5,1,5,'2023-05-11 01:17:35','Ordered','Emon','01856247747','monir@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','Mohommadpur'),
(69,'Mixed Pizza',10,1,10,'2023-05-11 05:49:43','Ordered','sakib','01763145829','no.one3054@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','Mohammadpur'),
(70,'Dumplings Specials',5,2,10,'2023-05-11 05:58:54','Delivered','Mahbub','01721821456','no.one3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','moni','Mohammadpur'),
(191,'Flavored Yogurt',100,3,300,'2023-05-17 10:49:31','Ordered','Mahbub','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','New Market'),
(192,'Best Burger',4,3,12,'2023-05-17 10:49:31','Ordered','Mahbub','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','New Market'),
(193,'Ginger chicken rolls',260,3,780,'2023-05-17 10:49:32','Ordered','Mahbub','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','New Market'),
(194,'Dumplings Specials',5,4,20,'2023-05-17 10:50:41','Ordered','Samsul','1856247747','most.secure3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','Hazaribagh'),
(195,'Best Burger',4,4,16,'2023-05-17 10:50:42','Ordered','Samsul','1856247747','most.secure3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','Hazaribagh'),
(196,'Vapa',20,2,40,'2023-05-17 10:52:58','Ordered','partho','1856247747','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','New Market'),
(197,'ghee',123,2,246,'2023-05-17 10:52:58','Ordered','partho','1856247747','mdsamsulalam971@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','New Market'),
(198,'Dumplings Specials',5,5,25,'2023-05-17 11:00:28','Ordered','zayed','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','New Market'),
(199,'Best Burger',4,5,20,'2023-05-17 11:00:28','Ordered','zayed','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','New Market'),
(200,'Sadeko Momo',6,5,30,'2023-05-17 11:00:28','Ordered','zayed','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','New Market'),
(201,'Flavored Yogurt',100,5,500,'2023-05-17 11:00:28','Ordered','zayed','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','New Market'),
(202,'Best Burger',4,3,12,'2023-05-17 02:46:26','Delivered','Emon','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','rafiq','Mohammadpur'),
(203,'Sadeko Momo',6,5,30,'2023-05-17 02:46:26','Delivered','Emon','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','eh','Mohammadpur'),
(204,'Smoky BBQ Pizza',6,2,12,'2023-05-17 11:30:42','Ordered','Nazmul','01756234572','queerestnazmul84@gmail.com','Baridhara 142/2 ,  dhaka 1205','queerestnazmul84@gmail.com','no_one','New Market'),
(205,'Vapa',20,2,40,'2023-05-17 11:30:42','Ordered','Nazmul','01756234572','queerestnazmul84@gmail.com','Baridhara 142/2 ,  dhaka 1205','queerestnazmul84@gmail.com','no_one','New Market'),
(206,'Best Burger',4,2,8,'2023-05-19 07:43:44','Ordered','Emon','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','Mohammadpur'),
(207,'Sadeko Momo',6,2,12,'2023-05-19 07:43:44','Ordered','Emon','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','Mohammadpur'),
(208,'Vapa',20,2,40,'2023-05-19 07:43:44','Ordered','Emon','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','Mohammadpur'),
(209,'Mixed Pizza',10,2,20,'2023-05-20 11:27:19','Ordered','monir','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','Hazaribagh'),
(210,'Smoky BBQ Pizza',6,3,18,'2023-05-20 11:27:20','Ordered','monir','1856247747','eh.emon3059@gmail.com','west pathaliya , jamalpur','eh.emon3059@gmail.com','no_one','Hazaribagh');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

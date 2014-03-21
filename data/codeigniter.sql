/*
SQLyog Ultimate v8.71 
MySQL - 5.5.8-log : Database - codeigniter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`codeigniter` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `codeigniter`;

/*Table structure for table `codeigniter_user` */

DROP TABLE IF EXISTS `codeigniter_user`;

CREATE TABLE `codeigniter_user` (
  `codeigniter_user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codeigniter_username` varchar(255) DEFAULT NULL,
  `codeigniter_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codeigniter_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `codeigniter_user` */

insert  into `codeigniter_user`(`codeigniter_user_id`,`codeigniter_username`,`codeigniter_password`) values (1,'Admin','e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

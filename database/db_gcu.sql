/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.14-MariaDB : Database - db_gcu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_gcu` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_gcu`;

/*Table structure for table `student_user` */

DROP TABLE IF EXISTS `student_user`;

CREATE TABLE `student_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_user_id` int(11) DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `middle_name` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `year_enrolled` year(4) DEFAULT NULL,
  `course` text DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `email` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `student_user` */

insert  into `student_user`(`user_id`,`stud_user_id`,`first_name`,`last_name`,`middle_name`,`gender`,`year_enrolled`,`course`,`birth_date`,`email`,`username`,`password`) values 
(1,2001518,'Jonray','Tacudog','Bernard','Male',NULL,NULL,NULL,'tacudog.jonray@gmail.com','spellarj','12345');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

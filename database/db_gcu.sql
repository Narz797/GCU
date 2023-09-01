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

/*Table structure for table `absence` */

DROP TABLE IF EXISTS `absence`;

CREATE TABLE `absence` (
  `absence_id` int(11) NOT NULL AUTO_INCREMENT,
  `transact_id` int(11) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `start_year` year(4) DEFAULT NULL,
  `end_year` year(4) DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  `leave` longtext DEFAULT NULL,
  PRIMARY KEY (`absence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `absence` */

/*Table structure for table `admin_user` */

DROP TABLE IF EXISTS `admin_user`;

CREATE TABLE `admin_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_id` int(11) NOT NULL,
  `first_ name` text NOT NULL,
  `last_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `gender` text NOT NULL,
  `position` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin_user` */

insert  into `admin_user`(`user_id`,`admin_user_id`,`first_ name`,`last_name`,`middle_name`,`gender`,`position`,`email`,`username`,`password`) values 
(15,2002529,'Narz Josef','Taquio','L.','Male','admin','josefnarz2011@gmail.com','Narz','$2y$10$vrzb0bq0qR6EeXUQrWzOielCpmRrMiY246zbJrJz/H01go267FBCW');

/*Table structure for table `readmission` */

DROP TABLE IF EXISTS `readmission`;

CREATE TABLE `readmission` (
  `readmission_id` int(11) NOT NULL AUTO_INCREMENT,
  `transact_id` int(11) DEFAULT NULL,
  `motivation` longtext DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  PRIMARY KEY (`readmission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `readmission` */

/*Table structure for table `referral` */

DROP TABLE IF EXISTS `referral`;

CREATE TABLE `referral` (
  `referral_id` int(11) NOT NULL AUTO_INCREMENT,
  `transact_id` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `referred` longtext DEFAULT NULL,
  PRIMARY KEY (`referral_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `referral` */

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `student_user` */

insert  into `student_user`(`user_id`,`stud_user_id`,`first_name`,`last_name`,`middle_name`,`gender`,`year_enrolled`,`course`,`birth_date`,`email`,`username`,`password`) values 
(1,2001518,'Jonray','Tacudog','Bernard','Male',NULL,NULL,NULL,'tacudog.jonray@gmail.com','spellarj','12345'),
(4,6543,'test','test','t','Male',2005,'BSIT','2023-08-23','narz@gmail.com','student2','pass2'),
(16,432,'Narz Josef','Taquio','L.','Male',2020,'BSIT','0000-00-00','josefnarz2011@gmail.com','Narz','$2y$10$Qsu.qwvkZ1ProVhvKXzCceopW3769HusjdHNfgzrouJH43BH0jISy'),
(17,111,'John','Doe','D','Male',2020,'BLIS','2023-08-15','user2@gmail.com','user2','$2y$10$SczVZE3o64M8ZhuB1.NtG.AEY38qQFypzZ/FCW2m1sHyIR0eVEeSO'),
(18,112,'Jane','D.','Doe','Female',2019,'BSDC','2023-08-21','user3@gmail.com','user3','$2y$10$jU4Y./C62dj97yonb5Wk7u02Spu3cnzv5sjNJXBj.8U1M77T7ScOy'),
(19,114,'Josh','Kun','S','Male',2020,'BSIT','2023-08-11','user4@gmail.com','user4','$2y$10$4c3P3QQ2hUkIu8hffGl0ZewQB3ZHzfu1uNV76W9fiy/A/IhELhD5q'),
(20,115,'Shinomiya','Kaguya','S','Female',2019,'BSDC','2023-08-11','user5@gmail.com','user4','$2y$10$Bc5xD1fwgVaDhyfodnoRpeWEqq3wys7oO1rEXODkS6bLBFxwxkPH.'),
(21,116,'Miyuki','Shirogane','S.','Male',2019,'BSIT','2023-08-18','user6@gmail.com','user6','$2y$10$ijDxvfz1Nwj/W71jek9d1Oi/E3glb8U/HAqoCq9vqCHPwp3/BraT2'),
(22,117,'Luffy','Monkey','D','Male',2020,'BLIS','2023-08-18','user7@gmail.com','user7','$2y$10$tu1lLwa.V8I728aNkNnpbuwdBckqpv46jpwAPJpVkwDDdPvqIQYmC'),
(23,118,'test8','test','t','Female',2020,'qwer','2023-08-17','user8@gmail.com','user8','$2y$10$RKW1IMlG82XCHHjAevPL0e.YPsPzqFv6ibl70MIvXTheK90sQtf0a');

/*Table structure for table `transact` */

DROP TABLE IF EXISTS `transact`;

CREATE TABLE `transact` (
  `transact_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `transact_type` text DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_completed` datetime DEFAULT NULL,
  `status` text DEFAULT NULL,
  PRIMARY KEY (`transact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transact` */

/*Table structure for table `withdrawal` */

DROP TABLE IF EXISTS `withdrawal`;

CREATE TABLE `withdrawal` (
  `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT,
  `transact_id` int(11) DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  `statement` longtext DEFAULT NULL,
  `explain` longtext DEFAULT NULL,
  PRIMARY KEY (`withdrawal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `withdrawal` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 07:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gcu`
--
CREATE DATABASE IF NOT EXISTS `db_gcu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_gcu`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `admin_user_id`, `first_ name`, `last_name`, `middle_name`, `gender`, `position`, `email`, `username`, `password`) VALUES
(15, 2002529, 'Narz Josef', 'Taquio', 'L.', 'Male', 'admin', 'josefnarz2011@gmail.com', 'Narz', '$2y$10$vrzb0bq0qR6EeXUQrWzOielCpmRrMiY246zbJrJz/H01go267FBCW');

-- --------------------------------------------------------

--
-- Table structure for table `student_transactions`
--

DROP TABLE IF EXISTS `student_transactions`;
CREATE TABLE IF NOT EXISTS `student_transactions` (
  `transaction` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_transactions`
--

INSERT INTO `student_transactions` (`transaction`, `name`, `status`) VALUES
('something', 'someone', 0),
('a thing', 'somebody', 1),
('another one', 'some guy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

DROP TABLE IF EXISTS `student_user`;
CREATE TABLE IF NOT EXISTS `student_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_user_id` int(11) DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `middle_name` text DEFAULT NULL,
  `year_enrolled` year(4) DEFAULT NULL,
  `course` text DEFAULT NULL,
  `gender` text NOT NULL,
  `contact_no` bigint(11) NOT NULL,
  `email` text DEFAULT NULL,
  `service_requested` text NOT NULL,
  `reason` text NOT NULL,
  `status` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`user_id`, `stud_user_id`, `first_name`, `last_name`, `middle_name`, `year_enrolled`, `course`, `gender`, `contact_no`, `email`, `service_requested`, `reason`, `status`, `username`, `password`) VALUES
(1, 2001518, 'Jonray', 'Tacudog', 'Bernard', NULL, NULL, '', 0, 'tacudog.jonray@gmail.com', '', '', 1, 'spellarj', '12345'),
(4, 6543, 'test', 'test', 't', 2005, 'BSIT', 'male', 0, 'narz@gmail.com', 'somethin', 'just because', 1, 'student2', 'pass2'),
(16, 432, 'Narz Josef', 'Taquio', 'L.', 2020, 'BSIT', 'male', 7654, 'josefnarz2011@gmail.com', 'some service', 'coz i want to', 0, 'Narz', '$2y$10$Qsu.qwvkZ1ProVhvKXzCceopW3769HusjdHNfgzrouJH43BH0jISy'),
(17, 111, 'John', 'Doe', 'D', 2020, 'BLIS', '', 9, 'user2@gmail.com', 'something again', 'needed', 1, 'user2', '$2y$10$SczVZE3o64M8ZhuB1.NtG.AEY38qQFypzZ/FCW2m1sHyIR0eVEeSO'),
(18, 112, 'Jane', 'D.', 'Doe', 2019, 'BSDC', 'female', 9995568797, 'user3@gmail.com', 'another thing', 'coz needed', 1, 'user3', '$2y$10$jU4Y./C62dj97yonb5Wk7u02Spu3cnzv5sjNJXBj.8U1M77T7ScOy'),
(19, 114, 'Josh', 'Kun', 'S', 2020, 'BSIT', '', 0, 'user4@gmail.com', '', '', 0, 'user4', '$2y$10$4c3P3QQ2hUkIu8hffGl0ZewQB3ZHzfu1uNV76W9fiy/A/IhELhD5q'),
(20, 115, 'Shinomiya', 'Kaguya', 'S', 2019, 'BSDC', '', 0, 'user5@gmail.com', '', '', 1, 'user4', '$2y$10$Bc5xD1fwgVaDhyfodnoRpeWEqq3wys7oO1rEXODkS6bLBFxwxkPH.'),
(21, 116, 'Miyuki', 'Shirogane', 'S.', 2019, 'BSIT', '', 0, 'user6@gmail.com', '', '', 0, 'user6', '$2y$10$ijDxvfz1Nwj/W71jek9d1Oi/E3glb8U/HAqoCq9vqCHPwp3/BraT2'),
(22, 117, 'Luffy', 'Monkey', 'D', 2020, 'BLIS', '', 0, 'user7@gmail.com', '', '', 0, 'user7', '$2y$10$tu1lLwa.V8I728aNkNnpbuwdBckqpv46jpwAPJpVkwDDdPvqIQYmC'),
(23, 118, 'test8', 'test', 't', 2020, 'qwer', '', 0, 'user8@gmail.com', '', '', 0, 'user8', '$2y$10$RKW1IMlG82XCHHjAevPL0e.YPsPzqFv6ibl70MIvXTheK90sQtf0a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

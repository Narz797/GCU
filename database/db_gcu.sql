-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 05:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id_number` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `first` varchar(255) NOT NULL,
  `second` varchar(255) NOT NULL,
  `third` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `closest_sibling` varchar(255) NOT NULL,
  `because` varchar(255) NOT NULL,
  `about_family` varchar(255) NOT NULL,
  `when_i_was_a_child` varchar(255) NOT NULL,
  `teachers_are` varchar(255) NOT NULL,
  `dont_know_that` varchar(255) NOT NULL,
  `future` varchar(255) NOT NULL,
  `greatest_goal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `absence_id` int(11) NOT NULL,
  `transact_id` int(11) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `start_year` year(4) DEFAULT NULL,
  `end_year` year(4) DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  `leave` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`absence_id`, `transact_id`, `semester`, `start_year`, `end_year`, `reason`, `leave`, `status`) VALUES
(6, 124, '2', '2020', '2022', 'ghdfghdf', 'dfghdfghdf', ''),
(7, 125, '1', '2020', '2022', 'ghdfghdf', 'dfghdfghdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_admin`
--

CREATE TABLE `admin_admin` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_admin`
--

INSERT INTO `admin_admin` (`id`, `admin_id`, `uname`, `pass`) VALUES
(1, 1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `gender` text NOT NULL,
  `position` text NOT NULL,
  `date_joined` date DEFAULT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_user_id`, `first_name`, `last_name`, `middle_name`, `gender`, `position`, `date_joined`, `email`, `username`, `password`) VALUES
(111122, 'Another', 'Me', 'D', 'Male', 'admin', '2013-10-17', 'employee', 'Employee', '$2y$10$vrzb0bq0qR6EeXUQrWzOielCpmRrMiY246zbJrJz/H01go267FBCW'),
(2002529, 'Narz Josef', 'Taquio', 'L.', 'Male', 'admin', '2013-10-17', 'josefnarz2011@gmail.com', 'Narz', '$2y$10$vrzb0bq0qR6EeXUQrWzOielCpmRrMiY246zbJrJz/H01go267FBCW');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `transact_id` int(11) NOT NULL,
  `Reason` varchar(255) DEFAULT NULL,
  `event_title` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `action_taken` varchar(255) DEFAULT NULL,
  `latest_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `student_id`, `employee_id`, `transact_id`, `Reason`, `event_title`, `date`, `start_time`, `end_time`, `status`, `remarks`, `action_taken`, `latest_update`) VALUES
(83, 111, 2002529, 136, NULL, 'sdfg', '2023-11-02', '08:00:00', '09:00:00', 'done', 'remarked', NULL, NULL),
(84, 111, 2002529, 137, NULL, 'xcvb', '2023-11-03', '08:00:00', '09:00:00', 'done', 'done', NULL, NULL),
(85, 111, 2002529, 138, NULL, 'asdf', '2023-11-23', '16:05:00', '09:00:00', 'rescheduled', 'asdfasdf', NULL, '2023-11-02'),
(86, 111, 2002529, 139, NULL, 'ASD', '2023-11-03', '08:00:00', '09:00:00', 'taken', NULL, NULL, NULL),
(87, 432, 2002529, 140, NULL, 'asdfa', '2023-11-02', '08:00:00', '09:00:00', 'taken', NULL, NULL, NULL),
(88, 432, 2002529, 141, '', 'fghjkfghj', '2023-11-02', '10:00:00', '11:00:00', 'taken', NULL, NULL, NULL),
(89, 432, 2002529, 142, '', 'dfgh', '2023-11-02', '08:00:00', '09:00:00', 'taken', NULL, NULL, NULL),
(90, 432, 2002529, 143, '', 'asdf', '2023-11-02', '08:00:00', '09:00:00', 'taken', NULL, NULL, NULL),
(91, 432, 2002529, 144, NULL, 'asdf', '2023-11-02', '10:00:00', '11:00:00', 'taken', NULL, NULL, NULL),
(92, 432, 2002529, 145, 'No reason', 'sghdfgh', '2023-11-02', '12:00:00', '13:00:00', 'taken', NULL, NULL, NULL),
(93, 432, 2002529, 146, 'No reason at all', '', '2023-11-02', '14:00:00', '15:00:00', 'taken', NULL, NULL, NULL),
(94, 432, 2002529, 147, 'asdfadfasd', 'sdfg', '2023-11-03', '05:00:00', '06:00:00', 'taken', NULL, NULL, NULL),
(95, 432, 2002529, 148, 'dsgsdfg', 'ghjkghjk', '2023-11-03', '06:00:00', '07:00:00', 'taken', NULL, NULL, NULL),
(96, 432, 2002529, 149, 'gsdfgs', 'gjfgjhfghjf', '2023-11-03', '08:00:00', '09:00:00', 'taken', NULL, NULL, NULL),
(97, 432, 2002529, 150, 'sdfgsf', 'gjkghkvbn', '2023-11-03', '10:00:00', '11:00:00', 'taken', NULL, NULL, NULL),
(98, 432, 2002529, 151, 'asdfasdf', 'asdf', '2023-11-04', '08:00:00', '09:00:00', 'taken', NULL, NULL, NULL),
(100, 432, 2002529, 153, 'asdfasd', 'asdfa', '2023-11-02', '04:00:00', '05:00:00', 'taken', NULL, NULL, NULL),
(101, 432, 2002529, 154, 'asdfasdf', '.,,,j', '2023-11-02', '05:00:00', '06:00:00', 'taken', NULL, NULL, NULL),
(102, 432, 2002529, 155, 'asdfasdf', 'kkk', '2023-11-02', '06:00:00', '07:00:00', 'taken', NULL, NULL, NULL),
(103, 432, 2002529, 156, 'asdfsadf', '0k,,,', '2023-11-02', '07:00:00', '08:00:00', 'taken', NULL, NULL, NULL),
(104, 432, 2002529, 157, 'fasdfa', ',kll', '2023-11-02', '08:00:00', '09:00:00', 'taken', NULL, NULL, NULL),
(105, 432, 2002529, 158, 'last', 'last', '2023-11-04', '08:00:00', '09:00:00', 'taken', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `Colleges` varchar(255) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Acronym` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `Colleges`, `Course`, `Acronym`) VALUES
(1, 'College of Agriculture', 'Bachelor of Science in Agribusiness', 'BSAB'),
(2, 'College of Agriculture', 'Bachelor of Science in Agriculture', 'BSA'),
(3, 'College of Arts and Humanities', 'Bachelor of Arts in Communication', 'BA Comm'),
(4, 'College of Arts and Humanities', 'Bachelor of Arts in English Language', 'BAEL'),
(5, 'College of Arts and Humanities', 'Bachelor of Arts in Filipino Language', 'BAFL'),
(6, 'College of Engineering', 'Bachelor of Science in Agriculture and Biosystems Engineering', 'BSABE'),
(7, 'College of Engineering', 'Bachelor of Science in Civil Engineering', 'BSCE'),
(8, 'College of Engineering', 'Bachelor of Science in Electrical Engineering', 'BSEE'),
(9, 'College of Engineering', 'Bachelor of Science in Industrial Engineering', 'BSIE'),
(10, 'College of Forestry', 'Bachelor of Science in Forestry', 'BSF'),
(11, 'College of Home Economics and Technology', 'Bachelor of Science in Entrepreneurship', 'BSET'),
(12, 'College of Home Economics and Technology', 'Bachelor of Science in Food Technology', 'BSFT'),
(13, 'College of Home Economics and Technology', 'Bachelor of Science in Hospitality Management', 'BSHM'),
(14, 'College of Home Economics and Technology', 'Bachelor of Science in Nutrition and Dietetics', 'BSND'),
(15, 'College of Home Economics and Technology', 'Bachelor of Science in Tourism Management', 'BSTM'),
(16, 'College of Human Kinetics', 'Bachelor of Physical Education', 'BPeD'),
(17, 'College of Human Kinetics', 'Bachelor of Science in Exercise and Sports Sciences', 'BSESS'),
(18, 'College of Information Sciences', 'Bachelor in Library and Information Sciences', 'BLIS'),
(19, 'College of Information Sciences', 'Bachelor of Science in Development Communication', 'BSDC'),
(20, 'College of Information Sciences', 'Bachelor of Science in Information Technology', 'BSIT'),
(21, 'College of Natural Sciences', 'Bachelor of Science in Biology', 'BS Bio'),
(22, 'College of Natural Sciences', 'Bachelor of Science in Chemistry', 'BS Chem'),
(23, 'College of Natural Sciences', 'Bachelor of Science in Environmental Science', 'BSES'),
(24, 'College of Numeracy and Applied Sciences', 'Bachelor of Science in Mathematics', 'BS Math'),
(25, 'College of Numeracy and Applied Sciences', 'Bachelor of Science in Statistics', 'BSS'),
(26, 'College of Nursing', 'Bachelor of Science in Nursing', 'BSN'),
(27, 'College of Public Administration and Governance', 'Bachelor of Public Administration', 'BPA'),
(28, 'College of Public Administration and Governance', 'Bachelor of Science in Psychology', 'BS Psych'),
(29, 'College of Teacher Education', 'Bachelor of Early Childhood Education', 'BECED'),
(30, 'College of Teacher Education', 'Bachelor of Elementary Education', 'BEED'),
(31, 'College of Teacher Education', 'Bachelor of Secondary Education', 'BSED'),
(32, 'College of Teacher Education', 'Bachelor of Technology and Livelihood Education', 'BTLED'),
(33, 'College of Veterinary Medicine', 'Doctor of Veterinary Medicine', 'DVM'),
(34, 'College of Social Sciences', 'Bachelor of Arts in History', 'BA Hist');

-- --------------------------------------------------------

--
-- Table structure for table `readmission`
--

CREATE TABLE `readmission` (
  `readmission_id` int(11) NOT NULL,
  `transact_id` int(11) DEFAULT NULL,
  `motivation` longtext DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  `attachment` longblob DEFAULT NULL,
  `document` longblob NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `readmission`
--

INSERT INTO `readmission` (`readmission_id`, `transact_id`, `motivation`, `reason`, `attachment`, `document`, `status`) VALUES
(11, 120, 'dsfgsdf', 'sdfgsdfg', NULL, '', ''),
(12, 126, 'asdfsaf', 'vbzxbxcvb', NULL, '', ''),
(13, 127, 'asdfsaf', 'vbzxbxcvb', NULL, '', ''),
(14, 128, 'asdfsaf', 'vbzxbxcvb', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `referral_id` int(11) NOT NULL,
  `transact_id` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `referred` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`referral_id`, `transact_id`, `reason`, `referred`, `status`) VALUES
(18, 132, 'sgdfsgsdfg', 'Myself', ''),
(19, 133, 'Interview', 'Instructor', '');

-- --------------------------------------------------------

--
-- Table structure for table `siblings`
--

CREATE TABLE `siblings` (
  `id_number` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Middle_name` varchar(255) NOT NULL,
  `Age` int(100) NOT NULL,
  `High_edu` varchar(255) NOT NULL,
  `Civil_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siblings`
--

INSERT INTO `siblings` (`id_number`, `Student_id`, `Last_name`, `First_name`, `Middle_name`, `Age`, `High_edu`, `Civil_status`) VALUES
(1, 112, 'this', 'Is', 'D.', 69, 'College', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

CREATE TABLE `student_user` (
  `stud_user_id` int(11) NOT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `middle_name` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `year_enrolled` year(4) DEFAULT NULL,
  `course` text DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `email` text DEFAULT NULL,
  `Year_level` int(11) NOT NULL,
  `Contact_number` bigint(255) NOT NULL,
  `ParentGuardianNumber` bigint(255) NOT NULL,
  `ParentGuardianName` varchar(255) DEFAULT NULL,
  `Relation` varchar(255) NOT NULL,
  `Civil_status` varchar(255) NOT NULL,
  `Birth_place` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Languages_and_dialects` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Whom_do_you_live` varchar(255) NOT NULL,
  `IG` varchar(255) NOT NULL,
  `PWD` varchar(255) NOT NULL,
  `Student_parent` varchar(255) NOT NULL,
  `Financial_support` varchar(255) NOT NULL,
  `Marital_status_of_parents` varchar(255) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`stud_user_id`, `first_name`, `last_name`, `middle_name`, `gender`, `year_enrolled`, `course`, `birth_date`, `status`, `email`, `Year_level`, `Contact_number`, `ParentGuardianNumber`, `ParentGuardianName`, `Relation`, `Civil_status`, `Birth_place`, `Nationality`, `Languages_and_dialects`, `Address`, `Whom_do_you_live`, `IG`, `PWD`, `Student_parent`, `Financial_support`, `Marital_status_of_parents`, `username`, `password`) VALUES
(111, 'John', 'Doe', 'D', 'Male', '2020', 'BLIS', '2023-08-15', 1, 'user2@gmail.com', 2, 9898989898, 9998787678, 'Me', 'mother', 'Single', 'Baguio City', 'Filipino', 'English', 'Baguio', 'asdfasdf', 'asdfasdf', 'asdfasd', 'fdsa', 'fdsa', 'asdf', 'user2', '$2y$10$SczVZE3o64M8ZhuB1.NtG.AEY38qQFypzZ/FCW2m1sHyIR0eVEeSO'),
(112, 'Jane', 'D.', 'Doe', 'Female', '2019', 'BSDC', '2023-08-21', 1, 'user3@gmail.com', 4, 9989789878, 9998987867, 'Me', 'father', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'user3', '$2y$10$jU4Y./C62dj97yonb5Wk7u02Spu3cnzv5sjNJXBj.8U1M77T7ScOy'),
(114, 'Josh', 'Kun', 'S', 'Male', '2020', 'BSIT', '2023-08-11', 0, 'user4@gmail.com', 1, 9898989898, 9999999999, 'Me', 'aunt', 'tyui', 'tyui', 'tyui', 'jhgf', 'jhgf', 'fghj', 'fghj', 'fghj', 'fghj', 'nbvc', 'sdfg', 'user4', '$2y$10$4c3P3QQ2hUkIu8hffGl0ZewQB3ZHzfu1uNV76W9fiy/A/IhELhD5q'),
(115, 'Shinomiya', 'Kaguya', 'S', 'Female', '2019', 'BSDC', '2023-08-11', 0, 'user5@gmail.com', 3, 9899098909, 9889787898, 'Me', '', 'sdfg', 'asdf', 'vcxz', 'xzcv', 'fdsa', 'fdsa', 'asdf', 'asdf', 'rqwe', 'fdsa', 'qwer', 'user4', '$2y$10$Bc5xD1fwgVaDhyfodnoRpeWEqq3wys7oO1rEXODkS6bLBFxwxkPH.'),
(116, 'Miyuki', 'Shirogane', 'S.', 'Male', '2019', 'BSIT', '2023-08-18', 0, 'user6@gmail.com', 3, 9898989898, 9999999999, 'Me', 'uncle', 'fghdfgh', 'hgfsd', 'dfgh', 'dfgh', 'gfds', 'gfds', 'sdfg', 'sdfg', 'sdfg', 'sdfg', 'sdfg', 'user6', '$2y$10$ijDxvfz1Nwj/W71jek9d1Oi/E3glb8U/HAqoCq9vqCHPwp3/BraT2'),
(117, 'Luffy', 'Monkey', 'D', 'Male', '2020', 'BLIS', '2023-08-18', 0, 'user7@gmail.com', 4, 9989098909, 9899098909, 'Me', 'grandfather', 'sdfg', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '', 'vcxz', 'sdfg', 'sdfg', 'fdsa', 'user7', ''),
(432, 'Narz Josef', 'Taquio', 'L.', 'Male', '2020', 'BSIT', '0000-00-00', 0, 'josefnarz2011@gmail.com', 1, 2343234323, 4323432344, 'Me', '', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'fdsa', 'fdsa', 'asdf', 'asdf', 'asdf', 'Narz', '$2y$10$Qsu.qwvkZ1ProVhvKXzCceopW3769HusjdHNfgzrouJH43BH0jISy'),
(6543, 'test', 'test', 't', 'Male', '2005', 'BSIT', '2023-08-23', 0, 'narz@gmail.com', 4, 34323432343, 23432343234, 'Me', '', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'student2', 'pass2'),
(2002529, 'asdfasd', 'asdfasd', 'f', 'Female', '2020', 'BSIT', '2023-09-07', 0, 'jo@gmail.com', 2, 3432343234, 3432343234, 'Me', '', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'fdsa', 'fdsa', 'asdf', 'zzz', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `college` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `civil_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `employee_id`, `college`, `gender`, `last_name`, `first_name`, `middle_name`, `contact_number`, `email`, `password`, `civil_status`) VALUES
(1, '123456', 'College of Teacher Education', 'Male', 'Doe', 'John', 'Michael', '123-456-7890', 'john.doe@email.com', '', 'Married'),
(2, '111', 'College of Information Sciences', 'Male', 'Monkey', 'Dulagan', 'Luffy', '123-456-7890', 'luffy.d@email.com', '', 'Single'),
(3, '31254', 'College of Agriculture', 'Female', 'Nami', 'Robin', 'Franky', '123-456-7890', 'namisan@email.com', '', 'Others'),
(4, '0879', 'College of Nursing', 'Male', 'Trafalgar', 'Water', 'Law', '123-456-7890', 'ilovemywife@email.com', '', 'Married'),
(5, '2555', 'College of Social Sciences', 'Male', 'Kid', 'Killer', 'Machine', '123-456-7890', 'tsundere@email.com', '', 'Others'),
(6, '20010101', 'College of Information Sciences', 'Male', 'lname', 'fname', 'mname', '765476', 'user1@gmail.com', '$2y$10$Ziy0DCb6mv2AODMPned/zO7sZhgjaQHZmIL0J4.6rA48vUGTy/P8K', 'Single'),
(7, '20010102', 'College of Nursing', 'Female', 'lasat', 'first', 'middle', '7654342', 'user2@gmail.com', '$2y$10$R4VlL7REMASrWXvN1.a3juHdZ7EWrnEoUNqWn3tR.9fdjhxgH9CG2', 'Married');

-- --------------------------------------------------------

--
-- Table structure for table `transact`
--

CREATE TABLE `transact` (
  `transact_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `transact_type` text DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_edited` datetime DEFAULT NULL,
  `date_completed` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`transact_id`, `student_id`, `employee_id`, `transact_type`, `date_created`, `date_edited`, `date_completed`, `status`, `remarks`) VALUES
(120, 432, NULL, 'readmission', '2023-11-02 04:15:52', NULL, NULL, 'pending', NULL),
(121, 432, NULL, 'Withdrawing Enrollment', '2023-11-02 04:15:59', NULL, NULL, 'pending', NULL),
(122, 432, NULL, 'Dropping Subjects', '2023-11-02 04:16:04', NULL, NULL, 'pending', NULL),
(123, 432, NULL, 'Shifting', '2023-11-02 04:16:16', NULL, NULL, 'pending', NULL),
(124, 432, NULL, 'leave_of_absence', '2023-11-02 04:19:34', NULL, NULL, 'done', NULL),
(125, 432, NULL, 'leave_of_absence', '2023-11-02 04:19:39', NULL, NULL, 'pending', NULL),
(126, 111, NULL, 'readmission', '2023-11-02 04:20:13', NULL, NULL, 'pending', NULL),
(127, 111, NULL, 'readmission', '2023-11-02 04:20:16', NULL, NULL, 'pending', NULL),
(128, 111, NULL, 'readmission', '2023-11-02 04:20:18', NULL, NULL, 'pending', NULL),
(129, 111, NULL, 'Withdrawing Enrollment', '2023-11-02 04:20:24', NULL, NULL, 'pending', NULL),
(130, 111, NULL, 'Withdrawing Enrollment', '2023-11-02 04:20:26', NULL, NULL, 'pending', NULL),
(131, 111, NULL, 'Shifting', '2023-11-02 04:20:35', NULL, NULL, 'pending', NULL),
(132, 111, NULL, 'referral', '2023-11-02 04:20:44', NULL, NULL, 'pending', NULL),
(133, 111, NULL, 'referral', '2023-11-02 04:20:56', NULL, NULL, 'pending', NULL),
(136, 111, 2002529, 'appointment', '2023-11-02 05:29:52', NULL, NULL, 'done', NULL),
(137, 111, 2002529, 'appointment', '2023-11-02 05:30:02', NULL, NULL, 'done', NULL),
(138, 111, 2002529, 'appointment', '2023-11-02 06:04:44', '2023-11-02 07:03:15', NULL, 'rescheduled', 'asdfasdf'),
(139, 111, 2002529, 'appointment', '2023-11-02 06:16:56', NULL, NULL, 'taken', NULL),
(140, 432, 2002529, 'appointment', '2023-11-02 13:06:53', NULL, NULL, 'taken', NULL),
(141, 432, 2002529, 'appointment', '2023-11-02 13:07:01', NULL, NULL, 'taken', NULL),
(142, 432, 2002529, 'appointment', '2023-11-02 13:31:18', NULL, NULL, 'taken', NULL),
(143, 432, 2002529, 'appointment', '2023-11-02 13:36:39', NULL, NULL, 'taken', NULL),
(144, 432, 2002529, 'appointment', '2023-11-02 13:37:27', NULL, NULL, 'taken', NULL),
(145, 432, 2002529, 'appointment', '2023-11-02 13:37:37', NULL, NULL, 'taken', NULL),
(146, 432, 2002529, 'appointment', '2023-11-02 13:37:44', NULL, NULL, 'taken', NULL),
(147, 432, 2002529, 'appointment', '2023-11-02 14:13:12', NULL, NULL, 'taken', NULL),
(148, 432, 2002529, 'appointment', '2023-11-02 14:13:21', NULL, NULL, 'taken', NULL),
(149, 432, 2002529, 'appointment', '2023-11-02 14:13:27', NULL, NULL, 'taken', NULL),
(150, 432, 2002529, 'appointment', '2023-11-02 14:13:34', NULL, NULL, 'taken', NULL),
(151, 432, 2002529, 'appointment', '2023-11-02 14:24:37', NULL, NULL, 'taken', NULL),
(152, NULL, 2002529, 'appointment', '2023-11-02 14:24:50', NULL, NULL, 'open', NULL),
(153, 432, 2002529, 'appointment', '2023-11-02 14:51:46', NULL, NULL, 'taken', NULL),
(154, 432, 2002529, 'appointment', '2023-11-02 14:51:54', NULL, NULL, 'taken', NULL),
(155, 432, 2002529, 'appointment', '2023-11-02 14:52:01', NULL, NULL, 'taken', NULL),
(156, 432, 2002529, 'appointment', '2023-11-02 14:52:08', NULL, NULL, 'taken', NULL),
(157, 432, 2002529, 'appointment', '2023-11-02 14:52:15', NULL, NULL, 'taken', NULL),
(158, 432, 2002529, 'appointment', '2023-11-02 15:03:26', NULL, NULL, 'taken', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tstable`
--

CREATE TABLE `tstable` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `college` varchar(10) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tstable`
--

INSERT INTO `tstable` (`id`, `student_id`, `full_name`, `college`, `year_level`, `gender`, `reason`, `date`, `status`) VALUES
(1, '111', 'Mina Sharon', 'College of', '1st Year', 'Female', 'Tardy', '03-24-22', 'Excused'),
(2, '222', 'Sam Sam', 'College of', '2nd Year', 'Male', 'Academic Deficiency', '03-24-22', 'Unexcused'),
(3, '333', 'Ann Sana', 'College of', '4th Year', 'Male', 'Absent', '03-24-22', 'Sent'),
(4, '444', 'Tzuyu Chou', 'College of', '3rd Year', 'Female', 'Tardy', '03-24-22', 'Recieved'),
(5, '555', 'Jihyo Momo', 'College of', '1st Year', 'Female', 'Absent', '03-24-22', 'Excused');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `withdrawal_id` int(11) NOT NULL,
  `transact_id` int(11) DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  `statement` longtext DEFAULT NULL,
  `explain` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `shift_from` varchar(255) NOT NULL,
  `shift_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`withdrawal_id`, `transact_id`, `reason`, `statement`, `explain`, `status`, `shift_from`, `shift_to`) VALUES
(32, 121, 'Withdrawing Enrollment', 'sdfgsd', 'gfdsgdsfgs', '', '', ''),
(33, 122, 'Dropping Subjects', 'sdfgsd', 'gfdsgdsfgs', '', '', ''),
(34, 123, 'Shifting', 'sdfgsd', 'gfdsgdsfgs', '', 'BAEL', 'BSEE'),
(35, 129, 'Withdrawing Enrollment', 'asdfsadf', 'cvbxcvbxcvb', '', '', ''),
(36, 130, 'Withdrawing Enrollment', 'asdfsadf', 'cvbxcvbxcvb', '', '', ''),
(37, 131, 'Shifting', 'asdfsadf', 'cvbxcvbxcvb', '', 'BA Comm', 'BTLED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id_number`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`absence_id`);

--
-- Indexes for table `admin_admin`
--
ALTER TABLE `admin_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `readmission`
--
ALTER TABLE `readmission`
  ADD PRIMARY KEY (`readmission_id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`referral_id`);

--
-- Indexes for table `siblings`
--
ALTER TABLE `siblings`
  ADD PRIMARY KEY (`id_number`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `student_user`
--
ALTER TABLE `student_user`
  ADD PRIMARY KEY (`stud_user_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transact`
--
ALTER TABLE `transact`
  ADD PRIMARY KEY (`transact_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tstable`
--
ALTER TABLE `tstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`withdrawal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `absence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_admin`
--
ALTER TABLE `admin_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `readmission`
--
ALTER TABLE `readmission`
  MODIFY `readmission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `referral_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `siblings`
--
ALTER TABLE `siblings`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transact`
--
ALTER TABLE `transact`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tstable`
--
ALTER TABLE `tstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_me`
--
ALTER TABLE `about_me`
  ADD CONSTRAINT `about_me_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student_user` (`stud_user_id`),
  ADD CONSTRAINT `about_me_ibfk_2` FOREIGN KEY (`Student_id`) REFERENCES `student_user` (`stud_user_id`);

--
-- Constraints for table `siblings`
--
ALTER TABLE `siblings`
  ADD CONSTRAINT `siblings_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student_user` (`stud_user_id`);

--
-- Constraints for table `transact`
--
ALTER TABLE `transact`
  ADD CONSTRAINT `transact_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_user` (`stud_user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

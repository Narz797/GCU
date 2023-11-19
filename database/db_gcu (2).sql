-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 06:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
(2002529, 'Narz Josef', 'Taquio', 'L.', 'Male', 'admin', '2013-10-17', 'josefnarz2011@gmail.com', 'Narz', '$2y$10$m0ggXh31tuQS0WkDnk5geuY7q.lt3FrqSexQLT8XopvKKimS.jw0K');

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
  `referred` varchar(255) DEFAULT NULL,
  `action_taken` varchar(255) DEFAULT NULL,
  `latest_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `student_id`, `employee_id`, `transact_id`, `Reason`, `event_title`, `date`, `start_time`, `end_time`, `status`, `remarks`, `referred`, `action_taken`, `latest_update`) VALUES
(118, 432, 2002529, 430, 'Academic Deficiency/ies', NULL, '2023-11-21', '13:00:00', '00:00:00', 'done', 'asdf', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id`, `timestamp`, `user_id`, `action`, `details`) VALUES
(87, '2023-11-19 14:41:05', 2002529, 'logged out', '2002529 Clicked log out'),
(88, '2023-11-19 14:42:13', NULL, 'login_success', 'Successful login for teacher with ID: undefined'),
(89, '2023-11-19 14:42:13', 20010101, 'access_teacher', '20010101 has accessed the teacher home page'),
(90, '2023-11-19 14:42:13', 20010101, 'reffered', '20010101 reffered 111'),
(91, '2023-11-19 14:42:25', 20010101, 'access_teacher', '20010101 has accessed the teacher home page'),
(92, '2023-11-19 14:42:25', 20010101, 'reffered', '20010101 reffered 432'),
(93, '2023-11-19 14:42:34', 20010101, 'edit info', '20010101 edited their personal info'),
(94, '2023-11-19 14:42:42', 20010101, 'access_teacher', '20010101 has accessed the teacher home page'),
(95, '2023-11-19 14:42:42', 20010101, 'access_teacher', '20010101 has accessed the teacher home page'),
(96, '2023-11-19 14:42:42', 20010101, 'done', '20010101 removed 432 from table'),
(97, '2023-11-19 14:42:42', 20010101, 'reffered', '20010101 reffered 432'),
(98, '2023-11-19 14:48:47', 2002529, 'access_employee', '2002529 has accessed the employee home page'),
(99, '2023-11-19 14:48:47', 0, 'login_success', 'Successful login for emplployee with ID: josefnarz2011@gmail.com'),
(100, '2023-11-19 14:48:50', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(101, '2023-11-19 14:49:30', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(102, '2023-11-19 14:50:29', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(103, '2023-11-19 14:51:37', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(104, '2023-11-19 14:52:06', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(105, '2023-11-19 14:53:01', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(106, '2023-11-19 14:53:26', 432, 'login_success', 'Successful login for student with ID: 432'),
(107, '2023-11-19 14:53:26', 432, 'access_transaction', '432 has accessed the transaction page'),
(108, '2023-11-19 14:53:28', 432, 'access_appointment', '432 has accessed the appointment page'),
(109, '2023-11-19 14:54:56', 432, 'access_appointment', '432 has accessed the appointment page'),
(110, '2023-11-19 14:55:27', 432, 'access_appointment', '432 has accessed the appointment page'),
(111, '2023-11-19 14:57:07', 432, 'access_appointment', '432 has accessed the appointment page'),
(112, '2023-11-19 14:58:04', 432, 'access_appointment', '432 has accessed the appointment page'),
(113, '2023-11-19 14:58:14', 432, 'access_appointment', '432 has accessed the appointment page'),
(114, '2023-11-19 14:58:32', 432, 'login_success', 'Successful login for student with ID: 432'),
(115, '2023-11-19 14:58:32', 432, 'access_transaction', '432 has accessed the transaction page'),
(116, '2023-11-19 14:58:33', 432, 'access_appointment', '432 has accessed the appointment page'),
(117, '2023-11-19 14:59:08', 432, 'access_appointment', '432 has accessed the appointment page'),
(118, '2023-11-19 15:00:39', 432, 'access_appointment', '432 has accessed the appointment page'),
(119, '2023-11-19 15:01:04', 432, 'access_appointment', '432 has accessed the appointment page'),
(120, '2023-11-19 15:01:24', 432, 'access_appointment', '432 has accessed the appointment page'),
(121, '2023-11-19 15:02:02', 432, 'access_appointment', '432 has accessed the appointment page'),
(122, '2023-11-19 15:03:28', 432, 'access_appointment', '432 has accessed the appointment page'),
(123, '2023-11-19 15:03:39', 432, 'access_appointment', '432 has accessed the appointment page'),
(124, '2023-11-19 15:04:11', 432, 'access_appointment', '432 has accessed the appointment page'),
(125, '2023-11-19 15:04:46', 432, 'access_appointment', '432 has accessed the appointment page'),
(126, '2023-11-19 15:05:22', 432, 'access_appointment', '432 has accessed the appointment page'),
(127, '2023-11-19 15:06:05', 432, 'access_appointment', '432 has accessed the appointment page'),
(128, '2023-11-19 15:06:30', 432, 'access_appointment', '432 has accessed the appointment page'),
(129, '2023-11-19 15:06:58', 432, 'access_appointment', '432 has accessed the appointment page'),
(130, '2023-11-19 15:08:14', 432, 'access_appointment', '432 has accessed the appointment page'),
(131, '2023-11-19 15:10:45', 432, 'access_appointment', '432 has accessed the appointment page'),
(132, '2023-11-19 15:12:08', 432, 'access_appointment', '432 has accessed the appointment page'),
(133, '2023-11-19 15:12:26', 432, 'access_appointment', '432 has accessed the appointment page'),
(134, '2023-11-19 15:12:59', 432, 'access_appointment', '432 has accessed the appointment page'),
(135, '2023-11-19 15:13:04', 432, 'access_appointment', '432 has accessed the appointment page'),
(136, '2023-11-19 15:15:46', 432, 'access_appointment', '432 has accessed the appointment page'),
(137, '2023-11-19 15:18:50', 432, 'access_appointment', '432 has accessed the appointment page'),
(138, '2023-11-19 15:20:09', 0, 'login_failure', 'Unsuccessful login attempt for employee with ID: josefnarz2011@gmail.com'),
(139, '2023-11-19 15:20:13', 0, 'login_success', 'Successful login for emplployee with ID: josefnarz2011@gmail.com'),
(140, '2023-11-19 15:20:13', 2002529, 'access_employee', '2002529 has accessed the employee home page'),
(141, '2023-11-19 15:20:16', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(142, '2023-11-19 15:21:52', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(143, '2023-11-19 15:23:42', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(144, '2023-11-19 15:25:07', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(145, '2023-11-19 15:25:13', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(146, '2023-11-19 15:25:44', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(147, '2023-11-19 15:26:17', 111, 'login_success', 'Successful login for student with ID: 111'),
(148, '2023-11-19 15:26:17', 111, 'access_transaction', '111 has accessed the transaction page'),
(149, '2023-11-19 15:26:19', 111, 'access_appointment', '111 has accessed the appointment page'),
(150, '2023-11-19 15:26:31', 111, 'access_appointment', '111 has accessed the appointment page'),
(151, '2023-11-19 15:41:05', NULL, 'login_success', 'Successful login for teacher with ID: undefined'),
(152, '2023-11-19 15:41:05', 20010101, 'access_teacher', '20010101 has accessed the teacher home page'),
(153, '2023-11-19 16:46:28', 20010101, 'access_teacher', '20010101 has accessed the teacher home page'),
(154, '2023-11-19 16:46:42', 20010101, 'reffered', '20010101 reffered undefined'),
(155, '2023-11-19 16:46:42', 20010101, 'access_teacher', '20010101 has accessed the teacher home page'),
(156, '2023-11-19 16:46:52', 432, 'login_success', 'Successful login for student with ID: 432'),
(157, '2023-11-19 16:46:52', 432, 'access_transaction', '432 has accessed the transaction page'),
(158, '2023-11-19 16:46:54', 432, 'access_appointment', '432 has accessed the appointment page'),
(159, '2023-11-19 16:46:59', 432, 'access_appointment', '432 has accessed the appointment page'),
(160, '2023-11-19 16:47:13', 0, 'login_failure', 'Unsuccessful login attempt for employee with ID: josefnarz2011@gmail.com'),
(161, '2023-11-19 16:47:17', 2002529, 'access_employee', '2002529 has accessed the employee home page'),
(162, '2023-11-19 16:47:17', 0, 'login_success', 'Successful login for emplployee with ID: josefnarz2011@gmail.com'),
(163, '2023-11-19 16:47:20', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(164, '2023-11-19 16:47:56', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(165, '2023-11-19 16:48:19', 432, 'access_transaction', '432 has accessed the transaction page'),
(166, '2023-11-19 16:48:19', 432, 'login_success', 'Successful login for student with ID: 432'),
(167, '2023-11-19 16:48:21', 432, 'access_appointment', '432 has accessed the appointment page'),
(168, '2023-11-19 16:50:30', 432, 'access_appointment', '432 has accessed the appointment page'),
(169, '2023-11-19 16:50:39', 432, 'access_appointment', '432 has accessed the appointment page'),
(170, '2023-11-19 16:52:38', 432, 'access_appointment', '432 has accessed the appointment page'),
(171, '2023-11-19 16:54:06', 432, 'access_appointment', '432 has accessed the appointment page'),
(172, '2023-11-19 16:54:29', 432, 'get appointment slot', '432 accuired appointment slot'),
(173, '2023-11-19 17:00:29', 432, 'access_appointment', '432 has accessed the appointment page'),
(174, '2023-11-19 17:00:41', 432, 'access_appointment', '432 has accessed the appointment page'),
(175, '2023-11-19 17:07:03', 432, 'access_appointment', '432 has accessed the appointment page'),
(176, '2023-11-19 17:07:37', 432, 'access_appointment', '432 has accessed the appointment page'),
(177, '2023-11-19 17:07:46', 432, 'access_appointment', '432 has accessed the appointment page'),
(178, '2023-11-19 17:08:04', 0, 'login_failure', 'Unsuccessful login attempt for employee with ID: josefnarz2011@gmail.com'),
(179, '2023-11-19 17:08:07', 0, 'login_success', 'Successful login for emplployee with ID: josefnarz2011@gmail.com'),
(180, '2023-11-19 17:08:07', 2002529, 'access_employee', '2002529 has accessed the employee home page'),
(181, '2023-11-19 17:08:11', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(182, '2023-11-19 17:08:15', 2002529, 'access_appointment form', '2002529 has accessed the wds form of432'),
(183, '2023-11-19 17:19:55', 2002529, 'access_appointment form', '2002529 has accessed the wds form of432'),
(184, '2023-11-19 17:19:57', 2002529, 'update appointment status', '2002529 updated appointment status to accepted'),
(185, '2023-11-19 17:19:57', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(186, '2023-11-19 17:20:09', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(187, '2023-11-19 17:20:11', 2002529, 'access_appointment form', '2002529 has accessed the wds form of432'),
(188, '2023-11-19 17:20:38', 2002529, 'access_appointment form', '2002529 has accessed the wds form of432'),
(189, '2023-11-19 17:20:39', 2002529, 'update appointment status', '2002529 updated appointment status to accepted'),
(190, '2023-11-19 17:21:10', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(191, '2023-11-19 17:21:13', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(192, '2023-11-19 17:21:14', 2002529, 'access_appointment form', '2002529 has accessed the wds form of432'),
(193, '2023-11-19 17:28:50', 2002529, 'logged out', '2002529 Clicked log out'),
(194, '2023-11-19 17:28:57', NULL, 'login_success', 'Successful login for teacher with ID: undefined'),
(195, '2023-11-19 17:28:57', 20010101, 'access_teacher', '20010101 has accessed the teacher home page'),
(196, '2023-11-19 17:30:42', 0, 'login_success', 'Successful login for emplployee with ID: josefnarz2011@gmail.com'),
(197, '2023-11-19 17:30:42', 2002529, 'access_employee', '2002529 has accessed the employee home page'),
(198, '2023-11-19 17:30:49', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(199, '2023-11-19 17:30:52', 2002529, 'access_appointment form', '2002529 has accessed the wds form of432'),
(200, '2023-11-19 17:30:53', 2002529, 'update appointment status', '2002529 updated appointment status to accepted'),
(201, '2023-11-19 17:31:16', 2002529, 'access_appointment form', '2002529 has accessed the wds form of432'),
(202, '2023-11-19 17:31:17', 2002529, 'update appointment status', '2002529 updated appointment status to accepted'),
(203, '2023-11-19 17:31:36', 2002529, 'logged out', '2002529 Clicked log out'),
(204, '2023-11-19 17:31:42', 0, 'login_success', 'Successful login for emplployee with ID: employee'),
(205, '2023-11-19 17:31:42', 111122, 'access_employee', '111122 has accessed the employee home page'),
(206, '2023-11-19 17:31:45', 111122, 'access_appointment', '111122 has accessed the appointment page'),
(207, '2023-11-19 17:35:19', 111122, 'access_appointment', '111122 has accessed the appointment page'),
(208, '2023-11-19 17:35:29', 0, 'login_failure', 'Unsuccessful login attempt for employee with ID: josefnarz2011@gmail.com'),
(209, '2023-11-19 17:35:33', 0, 'login_success', 'Successful login for emplployee with ID: josefnarz2011@gmail.com'),
(210, '2023-11-19 17:35:33', 2002529, 'access_employee', '2002529 has accessed the employee home page'),
(211, '2023-11-19 17:35:35', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(212, '2023-11-19 17:47:40', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(213, '2023-11-19 17:47:47', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(214, '2023-11-19 17:47:47', 2002529, 'remarked', '2002529 remarked appointment'),
(215, '2023-11-19 17:49:16', 2002529, 'access_appointment', '2002529 has accessed the appointment page'),
(216, '2023-11-19 17:49:21', 2002529, 'remarked', '2002529 remarked appointment'),
(217, '2023-11-19 17:49:27', 2002529, 'access_appointment', '2002529 has accessed the appointment page');

-- --------------------------------------------------------

--
-- Table structure for table `ca`
--

CREATE TABLE `ca` (
  `ca_id` int(11) NOT NULL,
  `transact_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `attachment1` longblob NOT NULL,
  `file_extension` varchar(255) NOT NULL,
  `COA` varchar(255) DEFAULT NULL,
  `specifics` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date_of_AbsentOrTardy` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `elementary_school`
--

CREATE TABLE `elementary_school` (
  `elem_id` int(11) NOT NULL,
  `stud_user_id` int(11) NOT NULL,
  `school_name` text NOT NULL,
  `year` int(11) NOT NULL,
  `awards` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elementary_school`
--

INSERT INTO `elementary_school` (`elem_id`, `stud_user_id`, `school_name`, `year`, `awards`) VALUES
(1, 11, '0', 0, '0'),
(2, 1, 'RAMOS EDA TACUDOG', 0, '12213'),
(3, 5, 'RAMOS EDA TACUDOG', 2001, '12213'),
(4, 31, 'BENGUET STATE UNIVERSITY', 1221, '123123123123'),
(5, 21, 'RAMOS EDA TACUDOG', 0, 'dsadsasasads'),
(6, 2, 'AILEEN KATE BERNARD DELMAS', 231213, 'dsadsasasads'),
(7, 7, 'BENGUET STATE UNIVERSITY', 21, '123123123123'),
(8, 90, 'HILDA MONTES BERNARD', 12321123, 'asdadsadsasdds'),
(9, 1, 'HILDA MONTES BERNARD', 0, 'dsadsasasads'),
(10, 2, 'Jonray Bernard Tacudog', 231213, 'asdadsadsasdds'),
(11, 6, 'RAMOS EDA TACUDOG', 231213, '6'),
(12, 4, 'BENGUET STATE UNIVERSITY', 231213, '123123123123'),
(13, 77, 'Jonray Bernard Tacudog', 231213, '123123123123'),
(14, 12, 'Hazel Joy B Tacudog', 12321123, 'wqewqeqwe'),
(15, 2001519, 'lkjh', 0, 'lkjh');

-- --------------------------------------------------------

--
-- Table structure for table `father`
--

CREATE TABLE `father` (
  `father_id` int(11) NOT NULL,
  `stud_user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `age` int(11) NOT NULL,
  `occupation` text NOT NULL,
  `educ_background` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `father`
--

INSERT INTO `father` (`father_id`, `stud_user_id`, `fname`, `mname`, `lname`, `age`, `occupation`, `educ_background`, `contact`) VALUES
(1, 2, 'RAMOS', 'EDA', 'TACUDOG', 12, '21', '12', '0'),
(2, 7, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', '0'),
(3, 90, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', '0'),
(4, 1, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', '0'),
(5, 2, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', '0'),
(6, 6, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', '0'),
(7, 4, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', '0'),
(8, 12, 'Hazel Joy', 'B', 'Tacudog', 12, '12', '12', '2147483647'),
(9, 2001519, 'lkjh', 'lkjh', 'lkjh', 0, 'lkjh', 'lkjh', '0');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `guardian_id` int(11) NOT NULL,
  `stud_user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `age` int(11) NOT NULL,
  `occupation` text NOT NULL,
  `educ_background` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`guardian_id`, `stud_user_id`, `fname`, `mname`, `lname`, `age`, `occupation`, `educ_background`, `contact`) VALUES
(1, 77, 'HILDA', 'MONTES', '21', 12, '3', '1', '2147483647');

-- --------------------------------------------------------

--
-- Table structure for table `junior_highschool`
--

CREATE TABLE `junior_highschool` (
  `jun_id` int(11) NOT NULL,
  `stud_user_id` text NOT NULL,
  `school_name` text NOT NULL,
  `year` int(11) NOT NULL,
  `awards` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `junior_highschool`
--

INSERT INTO `junior_highschool` (`jun_id`, `stud_user_id`, `school_name`, `year`, `awards`) VALUES
(1, '7', 'Jonray Bernard Tacudog', 312321, '12123132132'),
(2, '90', 'Tacudog,Jonray', 12312, 'sasadsda'),
(3, '1', 'BENGUET STATE UNIVERSITY', 0, '213213'),
(4, '2', 'HILDA MONTES BERNARD', 12312, 'sasadsda'),
(5, '6', 'Jonray Bernard Tacudog', 6, 'wqewqe'),
(6, '4', 'Jonray Bernard Tacudog', 312321, 'asdsadsas'),
(7, '77', 'BENGUET STATE UNIVERSITY', 12312, '12123132132'),
(8, '12', 'AILEEN KATE BERNARD DELMAS', 1231, 'wqewqe'),
(9, '2001519', 'lkjh', 0, 'hlkjh');

-- --------------------------------------------------------

--
-- Table structure for table `mother`
--

CREATE TABLE `mother` (
  `mother_id` int(11) NOT NULL,
  `stud_user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `age` int(11) NOT NULL,
  `occupation` text NOT NULL,
  `educ_background` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mother`
--

INSERT INTO `mother` (`mother_id`, `stud_user_id`, `fname`, `mname`, `lname`, `age`, `occupation`, `educ_background`, `contact`) VALUES
(1, 2, 'BENGUET', 'STATE', 'UNIVERSITY', 21, '12', '21', '0'),
(2, 7, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', '0'),
(3, 90, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', '0'),
(4, 1, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', '0'),
(5, 2, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', '0'),
(6, 6, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', '0'),
(7, 4, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', '0'),
(8, 12, 'BENGUET', 'STATE', 'UNIVERSITY', 12, '21', '21', '2147483647'),
(9, 2001519, 'lkjh', 'kljh', 'lkjh', 0, 'lkjh', 'kljh', '0');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `stud_id`, `title`, `description`, `date`) VALUES
(1, 0, 'new', 'content', '0000-00-00'),
(11, 111, 'updates', 'sdfgsfg', '2023-11-10'),
(12, 111, 'fixed', 'ewrtwertw', '2023-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `other_info`
--

CREATE TABLE `other_info` (
  `othinfo_id` int(11) NOT NULL,
  `stud_user_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `specific_scholar` text DEFAULT NULL,
  `specific_other` text DEFAULT NULL,
  `first` text NOT NULL,
  `second` text NOT NULL,
  `third` text NOT NULL,
  `Fis` text NOT NULL,
  `Mis` text NOT NULL,
  `kapatid` text NOT NULL,
  `kap_res` text NOT NULL,
  `abtFam` text NOT NULL,
  `whenChild` text NOT NULL,
  `teachAre` text NOT NULL,
  `friendsDuno` text NOT NULL,
  `future` text NOT NULL,
  `goal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other_info`
--

INSERT INTO `other_info` (`othinfo_id`, `stud_user_id`, `source`, `specific_scholar`, `specific_other`, `first`, `second`, `third`, `Fis`, `Mis`, `kapatid`, `kap_res`, `abtFam`, `whenChild`, `teachAre`, `friendsDuno`, `future`, `goal`) VALUES
(1, 6, 'Parents, Self', '', '', 'ewwqwqewqe', 'wqewqeewqweq', 'wqeqweqewqew', 'qweqwewqeqew', 'qwqwewe', '', '', 'qweqwe', 'qweqwe', 'eqwqwe', 'weqqwe', 'qweqwe', 'qweqwe'),
(2, 4, 'Self, Relatives', '', '', 'ewwqwqewqe', 'qweweq', 'qweweq', 'qweweq', 'qweqwe', '', '', 'qweqwe', 'qweqwe', 'qweqwe', 'wqeqwe', 'qweqwe', 'qweqwe'),
(3, 77, 'Parents, Relatives', '', '', 'qwqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', '', '', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe'),
(4, 12, 'Parents, Self', '', '', 'ewwqwqewqe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', '', '', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweewq', 'qweqwe'),
(5, 2001519, 'Parents', '', '', 'lkjh', 'lkjh', 'lkjh', 'kljh', 'lkjh', '', '', 'lkjh', 'lkjh', 'kljh', 'kljh', 'klj', 'hkljh');

-- --------------------------------------------------------

--
-- Table structure for table `other_school`
--

CREATE TABLE `other_school` (
  `othschool_id` int(11) NOT NULL,
  `stud_user_id` int(11) NOT NULL,
  `school_name` text NOT NULL,
  `year` int(11) NOT NULL,
  `awards` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other_school`
--

INSERT INTO `other_school` (`othschool_id`, `stud_user_id`, `school_name`, `year`, `awards`) VALUES
(1, 2, 'RAMOS EDA TACUDOG', 0, 'qweqweqwe'),
(2, 2, 'RAMOS EDA TACUDOG', 0, 'qweqweqwe'),
(3, 7, 'RAMOS EDA TACUDOG', 0, 'qweqweqwe'),
(4, 90, 'RAMOS EDA TACUDOG', 0, 'qweqweqwe'),
(5, 1, 'Jonray Bernard Tacudog', 0, 'qweqweqwe'),
(6, 2, 'BENGUET STATE UNIVERSITY', 0, 'qweqweqwe'),
(7, 6, 'BENGUET STATE UNIVERSITY', 0, 'qweqweqwe'),
(8, 4, 'BENGUET STATE UNIVERSITY', 0, 'qweqweqwe'),
(9, 21, 'BENGUET STATE UNIVERSITY', 0, 'qweqweqwe'),
(10, 21, 'BENGUET STATE UNIVERSITY', 0, 'qweqweqwe'),
(11, 21, 'BENGUET STATE UNIVERSITY', 0, 'qweqweqwe'),
(12, 21, 'BENGUET STATE UNIVERSITY', 0, 'qweqweqwe'),
(13, 43, 'BENGUET STATE UNIVERSITY', 0, 'qweqweqwe'),
(14, 10, '', 0, ''),
(15, 10, '', 0, ''),
(16, 10, '', 0, ''),
(17, 12, '', 0, ''),
(18, 12, '', 0, ''),
(19, 12, '', 0, ''),
(20, 12, '', 0, ''),
(21, 12, '', 0, ''),
(22, 12, '', 0, ''),
(23, 12, '', 0, ''),
(24, 77, '', 0, ''),
(25, 12, '', 0, ''),
(26, 15, '', 0, ''),
(27, 17, '', 0, ''),
(28, 64, '', 0, ''),
(29, 2, '', 0, ''),
(30, 2, '', 0, ''),
(31, 2, '', 0, ''),
(32, 2, '', 0, ''),
(33, 2, '', 0, ''),
(34, 3, '', 0, ''),
(35, 4, '', 0, ''),
(36, 5, '', 0, ''),
(37, 6, '', 0, ''),
(38, 6, '', 0, ''),
(39, 13, '', 0, ''),
(40, 13, '', 0, ''),
(41, 6, '', 0, ''),
(42, 7, '', 0, ''),
(43, 8, '', 0, ''),
(44, 23, '', 0, ''),
(45, 21, '', 0, ''),
(46, 31, '', 0, ''),
(47, 35, '', 0, ''),
(48, 43, '', 0, ''),
(49, 36, '', 0, ''),
(50, 9, '', 0, ''),
(51, 10, '', 0, ''),
(52, 11, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photos_id` int(11) NOT NULL,
  `stud_user_id` int(11) NOT NULL,
  `signature` mediumblob NOT NULL,
  `sign_type` blob NOT NULL,
  `id` mediumblob NOT NULL,
  `image_type` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `referral_id` int(11) NOT NULL,
  `transact_id` int(11) DEFAULT NULL,
  `teacher_id` bigint(255) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `Dates_for_AbsentTardy` varchar(255) DEFAULT NULL,
  `referred` longtext DEFAULT NULL,
  `reg` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`referral_id`, `transact_id`, `teacher_id`, `stud_id`, `reason`, `remarks`, `Dates_for_AbsentTardy`, `referred`, `reg`, `status`) VALUES
(180, 429, 20010101, 432, 'Academic Deficiency/ies', 'qwerty', '', 'Fname Lname', 'Registered', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `senior_highschool`
--

CREATE TABLE `senior_highschool` (
  `sen_id` int(11) NOT NULL,
  `stud_user_id` int(11) NOT NULL,
  `school_name` text NOT NULL,
  `year` int(11) NOT NULL,
  `awards` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `senior_highschool`
--

INSERT INTO `senior_highschool` (`sen_id`, `stud_user_id`, `school_name`, `year`, `awards`) VALUES
(1, 7, 'Jonray Bernard Tacudog', 1212, '12321321'),
(2, 90, 'AILEEN KATE BERNARD DELMAS', 1212, '21312'),
(3, 1, 'AILEEN KATE BERNARD DELMAS', 0, '12321321'),
(4, 2, 'AILEEN KATE BERNARD DELMAS', 1212, 'qwqewqewqe'),
(5, 6, 'Jonray Bernard Tacudog', 6, '21312'),
(6, 4, 'AILEEN KATE BERNARD DELMAS', 0, '21312'),
(7, 77, 'Jonray Bernard Tacudog', 1212, '12321321'),
(8, 12, 'AILEEN KATE BERNARD DELMAS', 213213, '21312'),
(9, 2001519, 'kljh', 0, 'lkjh');

-- --------------------------------------------------------

--
-- Table structure for table `siblings`
--

CREATE TABLE `siblings` (
  `sibling_id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `lastName` text NOT NULL,
  `firstName` text NOT NULL,
  `middleName` text NOT NULL,
  `age` int(11) NOT NULL,
  `highEdu` text NOT NULL,
  `civilStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siblings`
--

INSERT INTO `siblings` (`sibling_id`, `studentId`, `lastName`, `firstName`, `middleName`, `age`, `highEdu`, `civilStatus`) VALUES
(253795, 31, 'BERNARD', 'BENGUET', 'STATE', 0, '1', '1'),
(253796, 31, 'BERNARD', 'BENGUET', 'STATE', 0, '1', '1'),
(253797, 31, 'BERNARD', 'BENGUET', 'STATE', 0, '1', '1'),
(253798, 35, 'UNIVERSITY', 'HILDA', 'MONTES', 0, '1', '1'),
(253799, 35, 'B', 'Tacudog', 'RAMOS', 0, 'TACUDOG', 'BENGUET'),
(253800, 35, 'BERNARD', 'RAMOS', 'EDA', 1, '1', '1'),
(253801, 43, 'B', 'Tacudog', 'RAMOS', 0, 'TACUDOG', '1'),
(253802, 43, 'BERNARD', 'HILDA', 'MONTES', 1, '1', '1'),
(253803, 36, 'BERNARD', 'HILDA', 'MONTES', 1, '1', '1'),
(253804, 9, 'BERNARD', 'RAMOS', 'EDA', 0, '1', '1'),
(253805, 9, 'MONTES', 'BERNARD', 'RAMOS', 0, 'TACUDOG', '1'),
(253806, 9, 'DELMAS', 'BENGUET', 'STATE', 1, '1', '1'),
(253807, 10, 'qwe', 'qwe', 'qwe', 0, 'qwe', 'qwe'),
(253808, 10, 'qwe', 'qwe', 'qwe', 0, 'qwe', 'qwe'),
(253809, 10, 'qwe', 'qwe', 'qwe', 0, 'qwe', 'qwe'),
(253810, 10, 'qwe', 'qwe', 'qwe', 0, 'qwe', 'qwe'),
(253811, 10, 'qwe', 'qwe', 'qwe', 0, 'qwe', 'qwe'),
(253812, 10, 'qwe', 'qwe', 'qwe', 0, 'qwe', 'qwe'),
(253813, 11, 'qwe', 'qwe', 'qwe', 0, 'qwe', 'qwe'),
(253814, 11, 'qwe', 'qwe', 'qwe', 2, 'qwe', 'qwe'),
(253815, 11, 'qwe', 'qwe', 'qwe', 1, 'qwe', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

CREATE TABLE `student_user` (
  `stud_user_id` int(11) NOT NULL,
  `course` text DEFAULT NULL,
  `Year_level` int(11) NOT NULL,
  `last_name` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `middle_name` text DEFAULT NULL,
  `Contact_number` text NOT NULL,
  `ParentGuardianName` varchar(255) NOT NULL,
  `ParentGuardianNumber` text NOT NULL,
  `Relation` varchar(255) NOT NULL,
  `year_enrolled` year(4) DEFAULT NULL,
  `Section` text NOT NULL,
  `Civil_status` varchar(255) NOT NULL,
  `gender` text DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `Birth_place` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Languages_and_dialects` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `email` text DEFAULT NULL,
  `IG` varchar(255) NOT NULL,
  `specificIG` text DEFAULT NULL,
  `PWD` varchar(255) NOT NULL,
  `Student_parent` text NOT NULL,
  `Marital_status_of_parents` text NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`stud_user_id`, `course`, `Year_level`, `last_name`, `first_name`, `middle_name`, `Contact_number`, `ParentGuardianName`, `ParentGuardianNumber`, `Relation`, `year_enrolled`, `Section`, `Civil_status`, `gender`, `birth_date`, `Birth_place`, `Nationality`, `Languages_and_dialects`, `Address`, `email`, `IG`, `specificIG`, `PWD`, `Student_parent`, `Marital_status_of_parents`, `username`, `password`) VALUES
(1, 'BSA', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2003', 'B', 'Others', 'Female', '2023-11-15', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'yes', NULL, 'yes', 'yes', 'married', 'qwerty', '$2y$10$MAZpuotf.jLhmtt2ebzGsODgAf8HOfB4NkQga/BVEVE62ENgioyKS'),
(2, 'BA Comm', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Married', 'Female', '2023-11-01', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'annulled', 'qwerty', '$2y$10$BPec.uhMtAXza4ISWnZWL.V0Wdjvf7miNs/TorlbULXPVauYCqA/2'),
(3, 'BAFL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2003', 'B', 'Others', 'Female', '2023-11-17', '21', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerrty', '$2y$10$4ZdRkhRDZY2BSmao/j6ggeL5tuwq6nRR.Qm2k6951gQVsGFWs9wPW'),
(4, 'BSABE', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Others', 'Male', '2023-10-31', '12', '12', '12', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$eikmJRNet5WHOArpKr1f.ec/Uzsu1AVV763WqOxb6DOxg6fSTNApu'),
(5, 'BAFL', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Others', 'Male', '2023-11-15', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$tduX.X2zIWdtyWnVjEd8fOaL6Lf0oE8d4VtTiKunTOMZT9hbmSiq.'),
(6, 'BAEL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Married', 'Female', '2023-11-21', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$UvcmnP36QrcdF3YxDq5IdOgEb0htFxvSK4v3lqfzudSQyVE8Uhbg6'),
(7, 'BAFL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Others', 'Female', '2023-11-19', '12', '12', '21', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'livingTogether', 'tacudog.jonray@gmail.com', '$2y$10$We.0nCl288lfrx74EEejF.korYfMtuHw5UCDXrl2djvHFz8CnK3BO'),
(8, 'BAFL', 5, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2003', '12', 'Married', 'Male', '2023-11-15', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'annulled', 'tacudog.jonray@gmail.com', '$2y$10$8I66P7Nhq/uV5LVA8ddliuZn0e6c0x.PXBgqfME9tBY5M39i09Zom'),
(9, 'BAFL', 6, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Others', 'Male', '2023-11-20', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'yes', 'qwertt', 'yes', 'yes', 'annulled', 'qwerty', '$2y$10$XTCqSQB2S0811sYADx7RNupxPj73B5x0i/Nj4turnewsTqflD1IpK'),
(10, 'BA Comm', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Single', 'Male', '2023-11-14', '12', '12', '2112', 'IP address', 'tacudog.jonray@gmail.com', 'yes', 'qwertt', 'yes', 'yes', 'married', 'qwerty', '$2y$10$tQRoH1SVsK0PpIexB9B5Seua4K7yZsvAUlggNXp9Ka19esOgq0w4W'),
(11, 'BSET', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Married', 'Female', '2023-11-30', '12', '12', '12', 'IP address', 'tacudog.jonray@gmail.com', 'yes', 'qwertt', 'no', 'yes', 'married', 'qwerty', '$2y$10$I8ePXCMjNfZPastoiETBiOk7TboXndDI7vS0HU/pf6ViSeUx.Oaoy'),
(12, 'BA Comm', 2, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Married', 'Male', '2023-11-18', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerrty', '$2y$10$mJWvpPU7s31Z5mnYimg0LOiA2bwUMRDSE93NY7zYzNYiPrdf6EnEq'),
(13, 'BAFL', 5, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Others', 'Male', '2023-11-14', '12', '12', '2112', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$0W650ug87kFzqq3LuUMS7u/kHOHt0zeCum/eaeHz2vTnnxkms.num'),
(15, 'BAFL', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', '12', 'Others', 'Female', '2023-11-08', '12', '12', 'wqeqwe', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'tacudog.jonray@gmail.com', '$2y$10$F9eVpw4lzbdcZPBl.u6i4uN.HcbWZhpTJdW4f8SWRIBRamVHGSH6y'),
(17, 'BAFL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Others', 'Female', '2023-11-22', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$f3zlUhFJGzTpzan0HUwdCeuLxpl8iAZoAfAEfkQRtlN8veiWfrKuq'),
(21, 'BSCE', 5, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Married', 'Male', '2023-11-22', '12', '12', 'wqeqwe', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$JrdNeWcJqsgFwCg5Nk8TC.EaOELOmwF./.6lua1fYgG17vmCskbIi'),
(23, 'BA Comm', 5, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Married', 'Male', '2023-11-20', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'annulled', 'qwerty', '$2y$10$C4YUHRGm/VyfTZsMdh7wROU.mxUWCodgLTwJEQwBh6OTrmBPcEFvy'),
(31, 'BAEL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Married', 'Male', '2023-11-16', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'annulled', 'qwerty', '$2y$10$u8T7GBbN5B1LdUxfKhjdy.Drt1hokvXM3kaHv5VeUwFgRiNGXYwZm'),
(35, 'BAEL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Married', 'Female', '2023-11-02', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$IGknBRdyEwYtGwxPQVY8J.EFECtyWnls.Wu72TFC3glVGBLleYxN.'),
(36, 'BAEL', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Married', 'Female', '2023-11-22', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'yes', NULL, 'yes', 'yes', 'married', 'qwerty', '$2y$10$ewnhtJbVGz7l1axvOnD6i.oX.yKYmtRtv4AOcI5eS1BXp8lNak4yK'),
(43, 'BAFL', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Married', 'Female', '2023-11-23', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'yes', NULL, 'no', 'no', 'married', '', '$2y$10$nx10UB71ynhH/Ei14Fqv7.GKx.FfoFZQvBfg17eL09HYaOXWvWk66'),
(64, 'BSABE', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', '0', '', '2002', 'B', 'Others', 'Male', '2023-11-20', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$n7GDEneyMS59V5WazwbLsO6TJH2CIVtxlxr1tp1/zjfvD0CGTr3ne'),
(111, 'BLIS', 0, 'Doe', 'John', 'D', '0', '', '0', '', '2020', '', '', 'Male', '2023-08-15', '', '', '', '', 'user2@gmail.com', '', NULL, '', '', '', 'user2', '$2y$10$SczVZE3o64M8ZhuB1.NtG.AEY38qQFypzZ/FCW2m1sHyIR0eVEeSO'),
(112, 'BSDC', 0, 'D.', 'Jane', 'Doe', '0', '', '0', '', '2019', '', '', 'Female', '2023-08-21', '', '', '', '', 'user3@gmail.com', '', NULL, '', '', '', 'user3', '$2y$10$jU4Y./C62dj97yonb5Wk7u02Spu3cnzv5sjNJXBj.8U1M77T7ScOy'),
(114, 'BSIT', 0, 'Kun', 'Josh', 'S', '0', '', '0', '', '2020', '', '', 'Male', '2023-08-11', '', '', '', '', 'user4@gmail.com', '', NULL, '', '', '', 'user4', '$2y$10$4c3P3QQ2hUkIu8hffGl0ZewQB3ZHzfu1uNV76W9fiy/A/IhELhD5q'),
(115, 'BSDC', 0, 'Kaguya', 'Shinomiya', 'S', '0', '', '0', '', '2019', '', '', 'Female', '2023-08-11', '', '', '', '', 'user5@gmail.com', '', NULL, '', '', '', 'user4', '$2y$10$Bc5xD1fwgVaDhyfodnoRpeWEqq3wys7oO1rEXODkS6bLBFxwxkPH.'),
(116, 'BSIT', 0, 'Shirogane', 'Miyuki', 'S.', '0', '', '0', '', '2019', '', '', 'Male', '2023-08-18', '', '', '', '', 'user6@gmail.com', '', NULL, '', '', '', 'user6', '$2y$10$ijDxvfz1Nwj/W71jek9d1Oi/E3glb8U/HAqoCq9vqCHPwp3/BraT2'),
(117, 'BLIS', 0, 'Monkey', 'Luffy', 'D', '0', '', '0', '', '2020', '', '', 'Male', '2023-08-18', '', '', '', '', 'user7@gmail.com', '', NULL, '', '', '', 'user7', '$2y$10$tu1lLwa.V8I728aNkNnpbuwdBckqpv46jpwAPJpVkwDDdPvqIQYmC'),
(118, 'qwer', 0, 'test', 'test8', 't', '0', '', '0', '', '2020', '', '', 'Female', '2023-08-17', '', '', '', '', 'user8@gmail.com', '', NULL, '', '', '', 'user8', '$2y$10$RKW1IMlG82XCHHjAevPL0e.YPsPzqFv6ibl70MIvXTheK90sQtf0a'),
(432, 'BSIT', 0, 'Taquio', 'Narz Josef', 'L.', '0', '', '0', '', '2020', '', '', 'Male', '0000-00-00', '', '', '', '', 'josefnarz2011@gmail.com', '', NULL, '', '', '', 'Narz', '$2y$10$Qsu.qwvkZ1ProVhvKXzCceopW3769HusjdHNfgzrouJH43BH0jISy'),
(6543, 'BSIT', 0, 'test', 'test', 't', '0', '', '0', '', '2005', '', '', 'Male', '2023-08-23', '', '', '', '', 'narz@gmail.com', '', NULL, '', '', '', 'student2', 'pass2'),
(2001518, NULL, 0, 'Tacudog', 'Jonray', 'Bernard', '0', '', '0', '', NULL, '', '', 'Male', NULL, '', '', '', '', 'tacudog.jonray@gmail.com', '', NULL, '', '', '', 'spellarj', '12345'),
(2002529, 'BSIT', 0, 'asdfasd', 'asdfasd', 'f', '0', '', '0', '', '2020', '', '', 'Female', '2023-09-07', '', '', '', '', 'jo@gmail.com', '', NULL, '', '', '', 'zzz', 'pass');

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
  `contact_number` text NOT NULL,
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
(6, '20010101', 'College of Nursing', 'Male', 'Lname', 'Fname', 'mname', '989898', 'user1@gmail.com', '$2y$10$Ziy0DCb6mv2AODMPned/zO7sZhgjaQHZmIL0J4.6rA48vUGTy/P8K', 'Single'),
(7, '20010102', 'College of Nursing', 'Female', 'lasat', 'first', 'middle', '7654342', 'user2@gmail.com', '$2y$10$R4VlL7REMASrWXvN1.a3juHdZ7EWrnEoUNqWn3tR.9fdjhxgH9CG2', 'Married'),
(8, '2001519', 'College of Information Sciences', 'Male', 'Taquio', 'Narz Josef', 'Ligawad', '09995568797', 'narzjoseftaquio797@gmail.com', '$2y$10$0Z9xBfaTCfwJ02OVUImWluzEbByh3QMf3TYD3WFQyGWlO6RK9FZgW', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `transact`
--

CREATE TABLE `transact` (
  `transact_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `teacher_id` int(255) NOT NULL,
  `transact_type` text DEFAULT NULL,
  `date_created` varchar(255) DEFAULT NULL,
  `date_edited` date DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`transact_id`, `student_id`, `employee_id`, `teacher_id`, `transact_type`, `date_created`, `date_edited`, `date_completed`, `status`, `remarks`) VALUES
(429, 432, NULL, 20010101, 'referral', '2023-11-19 17:46:41', NULL, NULL, 'pending', NULL),
(430, 432, 2002529, 0, 'appointment', '2023-11-19 17:48:05', NULL, NULL, 'done', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tstable`
--

CREATE TABLE `tstable` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `teacher_id` bigint(255) NOT NULL,
  `transact_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact_number` text NOT NULL,
  `reason` varchar(50) NOT NULL,
  `date` varchar(255) NOT NULL,
  `refer` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tstable`
--

INSERT INTO `tstable` (`id`, `student_id`, `teacher_id`, `transact_id`, `email`, `first_name`, `middle_name`, `last_name`, `course`, `year_level`, `gender`, `contact_number`, `reason`, `date`, `refer`, `status`) VALUES
(99, '432', 20010101, 429, 'user1@gmail.com', 'Narz Josef', 'L.', 'Taquio', 'BSIT', '3', 'Male', '0', 'Academic Deficiency/ies', '2023-11-19 17:46:41', 'Fname Lname', 'pending');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id_number`);

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
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ca`
--
ALTER TABLE `ca`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elementary_school`
--
ALTER TABLE `elementary_school`
  ADD PRIMARY KEY (`elem_id`);

--
-- Indexes for table `father`
--
ALTER TABLE `father`
  ADD PRIMARY KEY (`father_id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`guardian_id`);

--
-- Indexes for table `junior_highschool`
--
ALTER TABLE `junior_highschool`
  ADD PRIMARY KEY (`jun_id`);

--
-- Indexes for table `mother`
--
ALTER TABLE `mother`
  ADD PRIMARY KEY (`mother_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_info`
--
ALTER TABLE `other_info`
  ADD PRIMARY KEY (`othinfo_id`);

--
-- Indexes for table `other_school`
--
ALTER TABLE `other_school`
  ADD PRIMARY KEY (`othschool_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photos_id`);

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
-- Indexes for table `senior_highschool`
--
ALTER TABLE `senior_highschool`
  ADD PRIMARY KEY (`sen_id`);

--
-- Indexes for table `siblings`
--
ALTER TABLE `siblings`
  ADD PRIMARY KEY (`sibling_id`);

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
  ADD PRIMARY KEY (`transact_id`);

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
  MODIFY `absence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_admin`
--
ALTER TABLE `admin_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `ca`
--
ALTER TABLE `ca`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `elementary_school`
--
ALTER TABLE `elementary_school`
  MODIFY `elem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `father`
--
ALTER TABLE `father`
  MODIFY `father_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `guardian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `junior_highschool`
--
ALTER TABLE `junior_highschool`
  MODIFY `jun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mother`
--
ALTER TABLE `mother`
  MODIFY `mother_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `other_info`
--
ALTER TABLE `other_info`
  MODIFY `othinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `other_school`
--
ALTER TABLE `other_school`
  MODIFY `othschool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `readmission`
--
ALTER TABLE `readmission`
  MODIFY `readmission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `referral_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `senior_highschool`
--
ALTER TABLE `senior_highschool`
  MODIFY `sen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siblings`
--
ALTER TABLE `siblings`
  MODIFY `sibling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253816;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transact`
--
ALTER TABLE `transact`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT for table `tstable`
--
ALTER TABLE `tstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

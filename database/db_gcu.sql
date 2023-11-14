-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 04:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`absence_id`, `transact_id`, `semester`, `start_year`, `end_year`, `reason`, `leave`, `status`) VALUES
(4, 75, '1', 2022, 2055, 'loa', 'loa', ''),
(8, 206, '2', 2023, 2024, 'sdfg', 'gfds', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_admin`
--

CREATE TABLE `admin_admin` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `first_ name` text NOT NULL,
  `last_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `gender` text NOT NULL,
  `position` text NOT NULL,
  `date_joined` date DEFAULT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_user_id`, `first_ name`, `last_name`, `middle_name`, `gender`, `position`, `date_joined`, `email`, `username`, `password`) VALUES
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
  `event_title` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `student_id`, `employee_id`, `transact_id`, `event_title`, `date`, `start_time`, `end_time`, `status`) VALUES
(38, NULL, 432, 77, 'dgfh', '2023-10-20', '08:00:00', '09:00:00', 'open');

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
  `attachment2` longblob NOT NULL,
  `attachment3` longblob NOT NULL,
  `date_of_AbsentOrTardy` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `Colleges` varchar(255) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Acronym` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(15, 2001519, 'lkjh', 0, 'lkjh'),
(0, 1, '321321', 0, 'ewqewq'),
(0, 2, '321321', 21321321, 'ewqewq');

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
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `father`
--

INSERT INTO `father` (`father_id`, `stud_user_id`, `fname`, `mname`, `lname`, `age`, `occupation`, `educ_background`, `contact`) VALUES
(1, 2, 'RAMOS', 'EDA', 'TACUDOG', 12, '21', '12', 0),
(2, 7, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', 0),
(3, 90, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', 0),
(4, 1, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', 0),
(5, 2, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', 0),
(6, 6, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', 0),
(7, 4, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12', 0),
(8, 12, 'Hazel Joy', 'B', 'Tacudog', 12, '12', '12', 2147483647),
(9, 2001519, 'lkjh', 'lkjh', 'lkjh', 0, 'lkjh', 'lkjh', 0),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 1, '321321', '321321', '321321', 321321, 'ewqewq', 'ewqwe', 2132),
(0, 2, '321321', '321321', '2212121', 321321, '2121', '321321', 2132),
(0, 2, '321321', '321321', '2212121', 321321, '2121', '321321', 2132);

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
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`guardian_id`, `stud_user_id`, `fname`, `mname`, `lname`, `age`, `occupation`, `educ_background`, `contact`) VALUES
(1, 77, 'HILDA', 'MONTES', '21', 12, '3', '1', 2147483647),
(0, 32, 'ewqewq', 'ewqewq', 'ewqwq', 0, 'ewqewq', 'ewqewq', 0),
(0, 32, 'ewqewq', 'ewqewq', 'ewqwq', 0, 'ewqewq', 'ewqewq', 0),
(0, 32, 'ewqewq', 'ewqewq', 'ewqwq', 0, 'ewqewq', 'ewqewq', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(9, '2001519', 'lkjh', 0, 'hlkjh'),
(0, '1', 'ewqewq', 321321, 'ewqewq'),
(0, '2', '32321321', 2321321, '321321');

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
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mother`
--

INSERT INTO `mother` (`mother_id`, `stud_user_id`, `fname`, `mname`, `lname`, `age`, `occupation`, `educ_background`, `contact`) VALUES
(1, 2, 'BENGUET', 'STATE', 'UNIVERSITY', 21, '12', '21', 0),
(2, 7, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', 0),
(3, 90, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', 0),
(4, 1, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', 0),
(5, 2, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', 0),
(6, 6, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', 0),
(7, 4, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12', 0),
(8, 12, 'BENGUET', 'STATE', 'UNIVERSITY', 12, '21', '21', 2147483647),
(9, 2001519, 'lkjh', 'kljh', 'lkjh', 0, 'lkjh', 'kljh', 0),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 1, '212', '321321', '2121', 321321, '2121', '321321', 2321321),
(0, 2, '321321', '321321', '2121', 321321, '32132', '321321', 2321321),
(0, 2, '321321', '321321', '2121', 321321, '32132', '321321', 2321321);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `first` text NOT NULL,
  `second` text NOT NULL,
  `third` text NOT NULL,
  `Fis` text NOT NULL,
  `Mis` text NOT NULL,
  `abtFam` text NOT NULL,
  `whenChild` text NOT NULL,
  `teachAre` text NOT NULL,
  `friendsDuno` text NOT NULL,
  `future` text NOT NULL,
  `goal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_info`
--

INSERT INTO `other_info` (`othinfo_id`, `stud_user_id`, `source`, `first`, `second`, `third`, `Fis`, `Mis`, `abtFam`, `whenChild`, `teachAre`, `friendsDuno`, `future`, `goal`) VALUES
(1, 6, 'Parents, Self', 'ewwqwqewqe', 'wqewqeewqweq', 'wqeqweqewqew', 'qweqwewqeqew', 'qwqwewe', 'qweqwe', 'qweqwe', 'eqwqwe', 'weqqwe', 'qweqwe', 'qweqwe'),
(2, 4, 'Self, Relatives', 'ewwqwqewqe', 'qweweq', 'qweweq', 'qweweq', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'wqeqwe', 'qweqwe', 'qweqwe'),
(3, 77, 'Parents, Relatives', 'qwqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe'),
(4, 12, 'Parents, Self', 'ewwqwqewqe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'qweewq', 'qweqwe'),
(5, 2001519, 'Parents', 'lkjh', 'lkjh', 'lkjh', 'kljh', 'lkjh', 'lkjh', 'lkjh', 'kljh', 'kljh', 'klj', 'hkljh'),
(0, 1, 'Parents, Self', '321321', 'ewqewq', 'ewqewq', 'ewqew', 'ewqewq', 'ewqwqe', 'ewqewq', 'ewqewq', 'ewqewqewqewq', 'ewqewq', 'ewqewq'),
(0, 2, 'Parents, Self', 'ewewq', 'ewqewq', 'ewqewq', 'ewqewq', 'ewqewq', 'ewqewq', 'ewqewq', 'ewqewq', 'ewewq', 'ewqewq', 'ewqewq');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(26, 2001519, '', 0, ''),
(0, 1, '', 0, ''),
(0, 1, '', 0, ''),
(0, 1, '', 0, ''),
(0, 1, '', 0, ''),
(0, 1, '', 0, ''),
(0, 1, '', 0, ''),
(0, 1, '', 0, ''),
(0, 1, '', 0, ''),
(0, 2, '', 0, ''),
(0, 32, '', 0, ''),
(0, 32, '', 0, ''),
(0, 32, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photos_id` int(11) NOT NULL,
  `stud_user_id` int(11) NOT NULL,
  `signature` mediumblob NOT NULL,
  `sign_type` blob NOT NULL,
  `id_picture` mediumblob NOT NULL,
  `image_type` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `readmission`
--

CREATE TABLE `readmission` (
  `readmission_id` int(11) NOT NULL,
  `transact_id` int(11) DEFAULT NULL,
  `motivation` longtext DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `readmission`
--

INSERT INTO `readmission` (`readmission_id`, `transact_id`, `motivation`, `reason`, `status`) VALUES
(8, 70, 'read', 'read', ''),
(9, 78, 'qwerty', 'qwerty', ''),
(10, 81, 'qwewqrewqreq', 'ewqwqwqr', ''),
(11, 82, 'qwewqrewqreq', 'ewqwqwqr', ''),
(12, 84, 'qwerty', 'qwerty', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`referral_id`, `transact_id`, `reason`, `referred`, `status`) VALUES
(16, 74, 'Interview,Late', 'College Dean', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(9, 2001519, 'kljh', 0, 'lkjh'),
(0, 1, 'ewqewq', 21321, 'ewqewq'),
(0, 2, '2121231', 32132, 'ewqewq');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Section` text NOT NULL,
  `course` text DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `email` text DEFAULT NULL,
  `Year_level` int(11) NOT NULL,
  `Contact_number` int(11) NOT NULL,
  `ParentGuardianNumber` int(11) NOT NULL,
  `Civil_status` varchar(255) NOT NULL,
  `Birth_place` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Languages_and_dialects` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `IG` varchar(255) NOT NULL,
  `PWD` varchar(255) NOT NULL,
  `Student_parent` varchar(255) NOT NULL,
  `Marital_status_of_parents` varchar(255) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`stud_user_id`, `first_name`, `last_name`, `middle_name`, `gender`, `year_enrolled`, `Section`, `course`, `birth_date`, `status`, `email`, `Year_level`, `Contact_number`, `ParentGuardianNumber`, `Civil_status`, `Birth_place`, `Nationality`, `Languages_and_dialects`, `Address`, `IG`, `PWD`, `Student_parent`, `Marital_status_of_parents`, `username`, `password`) VALUES
(1, 'JONATHAN', 'CAPONPON', '1221', 'Female', 2021, 'B', 'BA Comm', '2023-11-16', 0, 'tacudog.jonray@gmail.com', 3, 321321, 0, 'Others', '2212121', '212121', '2212121', '212121', 'no', 'no', 'no', 'annulled', 'tacudog.jonray@gmail.com', '$2y$10$T86NLSKlXdGMJ.idlXF9u.ihG1AlC9ChjjCRqnKbbqy8KZ2U441n6'),
(2, 'JONATHAN', 'ATITIW', '1221', 'Male', 2021, 'B', 'BAEL', '2023-11-01', 0, 'tacudog.jonray@gmail.com', 3, 321321, 0, 'Single', '2212121', '212121', '2212121', '212121', 'no', 'no', 'no', 'married', 'tacudog.jonray@gmail.com', '$2y$10$JtKerRH0XWkM6vROdU4jCegehpNG3J5ctyPmBuBApraOksAqxZs2S'),
(111, 'John', 'Doe', 'D', 'Male', 2020, '', 'BLIS', '2023-08-15', 1, 'user2@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'user2', '$2y$10$SczVZE3o64M8ZhuB1.NtG.AEY38qQFypzZ/FCW2m1sHyIR0eVEeSO'),
(112, 'Jane', 'D.', 'Doe', 'Female', 2019, '', 'BSDC', '2023-08-21', 1, 'user3@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'user3', '$2y$10$jU4Y./C62dj97yonb5Wk7u02Spu3cnzv5sjNJXBj.8U1M77T7ScOy'),
(114, 'Josh', 'Kun', 'S', 'Male', 2020, '', 'BSIT', '2023-08-11', 0, 'user4@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'user4', '$2y$10$4c3P3QQ2hUkIu8hffGl0ZewQB3ZHzfu1uNV76W9fiy/A/IhELhD5q'),
(115, 'Shinomiya', 'Kaguya', 'S', 'Female', 2019, '', 'BSDC', '2023-08-11', 0, 'user5@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'user4', '$2y$10$Bc5xD1fwgVaDhyfodnoRpeWEqq3wys7oO1rEXODkS6bLBFxwxkPH.'),
(116, 'Miyuki', 'Shirogane', 'S.', 'Male', 2019, '', 'BSIT', '2023-08-18', 0, 'user6@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'user6', '$2y$10$ijDxvfz1Nwj/W71jek9d1Oi/E3glb8U/HAqoCq9vqCHPwp3/BraT2'),
(117, 'Luffy', 'Monkey', 'D', 'Male', 2020, '', 'BLIS', '2023-08-18', 0, 'user7@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'user7', '$2y$10$tu1lLwa.V8I728aNkNnpbuwdBckqpv46jpwAPJpVkwDDdPvqIQYmC'),
(118, 'test8', 'test', 't', 'Female', 2020, '', 'qwer', '2023-08-17', 0, 'user8@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'user8', '$2y$10$RKW1IMlG82XCHHjAevPL0e.YPsPzqFv6ibl70MIvXTheK90sQtf0a'),
(432, 'Narz Josef', 'Taquio', 'L.', 'Male', 2020, '', 'BSIT', '0000-00-00', 0, 'josefnarz2011@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Narz', '$2y$10$Qsu.qwvkZ1ProVhvKXzCceopW3769HusjdHNfgzrouJH43BH0jISy'),
(6543, 'test', 'test', 't', 'Male', 2005, '', 'BSIT', '2023-08-23', 0, 'narz@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'student2', 'pass2'),
(2001518, 'Jonray', 'Tacudog', 'Bernard', 'Male', NULL, '', NULL, NULL, 0, 'tacudog.jonray@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'spellarj', '12345'),
(2002529, 'asdfasd', 'asdfasd', 'f', 'Female', 2020, '', 'BSIT', '2023-09-07', 0, 'jo@gmail.com', 0, 0, 0, '', '', '', '', '', '', '', '', '', 'zzz', 'pass');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `employee_id`, `college`, `gender`, `last_name`, `first_name`, `middle_name`, `contact_number`, `email`, `password`, `civil_status`) VALUES
(1, '123456', 'College of Teacher Education', 'Male', 'Doe', 'John', 'Michael', '123-456-7890', 'john.doe@email.com', '', 'Married'),
(2, '111', 'College of Information Sciences', 'Male', 'Monkey', 'Dulagan', 'Luffy', '123-456-7890', 'luffy.d@email.com', '', 'Single'),
(3, '31254', 'College of Agriculture', 'Female', 'Nami', 'Robin', 'Franky', '123-456-7890', 'namisan@email.com', '', 'Others'),
(4, '0879', 'College of Nursing', 'Male', 'Trafalgar', 'Water', 'Law', '123-456-7890', 'ilovemywife@email.com', '', 'Married'),
(5, '2555', 'College of Social Sciences', 'Male', 'Kid', 'Killer', 'Machine', '123-456-7890', 'tsundere@email.com', '', 'Others'),
(6, '20010101', 'College of Agriculture', 'Male', 'Lname', 'Fname', 'mname', '989898', 'user1@gmail.com', '$2y$10$Ziy0DCb6mv2AODMPned/zO7sZhgjaQHZmIL0J4.6rA48vUGTy/P8K', 'Single'),
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
  `date_completed` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`transact_id`, `student_id`, `employee_id`, `transact_type`, `date_created`, `date_completed`, `status`) VALUES
(70, 432, NULL, 'readmission', '2023-10-20 05:49:33', NULL, 'pending'),
(71, 432, NULL, 'WDS', '2023-10-20 05:49:45', NULL, 'pending'),
(72, 432, NULL, 'WDS', '2023-10-20 05:50:02', NULL, 'pending'),
(73, 432, NULL, 'WDS', '2023-10-20 05:50:17', NULL, 'pending'),
(74, 432, NULL, 'referral', '2023-10-20 05:50:28', NULL, 'pending'),
(75, 432, NULL, 'leave_of_absence', '2023-10-20 05:50:49', NULL, 'pending'),
(76, NULL, 432, 'appointment', '2023-10-20 05:51:23', NULL, 'open'),
(77, NULL, 432, 'appointment', '2023-10-20 05:52:40', NULL, 'open'),
(78, 111, NULL, 'readmission', '2023-11-14 05:47:55', NULL, 'pending'),
(79, 111, NULL, 'Tardy', '2023-11-21 00:00:00', NULL, 'pending'),
(80, 111, NULL, 'Tardy', '2023-11-18 00:00:00', NULL, 'pending'),
(81, 111, NULL, 'readmission', '2023-11-14 05:49:24', NULL, 'pending'),
(82, 111, NULL, 'readmission', '2023-11-14 05:50:38', NULL, 'pending'),
(83, 111, NULL, 'Withdrawing Enrollment', '2023-11-14 05:50:52', NULL, 'pending'),
(84, 432, NULL, 'readmission', '2023-11-14 05:53:27', NULL, 'pending');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`withdrawal_id`, `transact_id`, `reason`, `statement`, `explain`, `status`, `shift_from`, `shift_to`) VALUES
(24, 71, 'Withdrawing Enrollment', 'w', 'w', '', '', ''),
(25, 72, 'Dropping Subjects', 'd', 'd', '', '', ''),
(26, 73, 'Shifting', 's', 's', '', 'BSA', 'BSIE'),
(27, 83, 'Withdrawing Enrollment', NULL, 'wqewwq', '', '', '');

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
-- Indexes for table `transact`
--
ALTER TABLE `transact`
  ADD PRIMARY KEY (`transact_id`),
  ADD KEY `student_id` (`student_id`);

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
  MODIFY `absence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_admin`
--
ALTER TABLE `admin_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `readmission`
--
ALTER TABLE `readmission`
  MODIFY `readmission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `referral_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `siblings`
--
ALTER TABLE `siblings`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transact`
--
ALTER TABLE `transact`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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

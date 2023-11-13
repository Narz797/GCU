-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 04:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
(6, 124, '2', 2020, 2022, 'ghdfghdf', 'dfghdfghdf', ''),
(7, 125, '1', 2020, 2022, 'ghdfghdf', 'dfghdfghdf', '');

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
(12, 4, 'BENGUET STATE UNIVERSITY', 231213, '123123123123');

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
  `educ_background` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `father`
--

INSERT INTO `father` (`father_id`, `stud_user_id`, `fname`, `mname`, `lname`, `age`, `occupation`, `educ_background`) VALUES
(1, 2, 'RAMOS', 'EDA', 'TACUDOG', 12, '21', '12'),
(2, 7, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12'),
(3, 90, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12'),
(4, 1, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12'),
(5, 2, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12'),
(6, 6, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12'),
(7, 4, 'AILEEN KATE', 'BERNARD', 'DELMAS', 21, '12', '12');

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
  `educ_background` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, '4', 'Jonray Bernard Tacudog', 312321, 'asdsadsas');

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
  `educ_background` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mother`
--

INSERT INTO `mother` (`mother_id`, `stud_user_id`, `fname`, `mname`, `lname`, `age`, `occupation`, `educ_background`) VALUES
(1, 2, 'BENGUET', 'STATE', 'UNIVERSITY', 21, '12', '21'),
(2, 7, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12'),
(3, 90, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12'),
(4, 1, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12'),
(5, 2, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12'),
(6, 6, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12'),
(7, 4, 'HILDA', 'MONTES', 'BERNARD', 12, '21', '12');

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
(2, 4, 'Self, Relatives', 'ewwqwqewqe', 'qweweq', 'qweweq', 'qweweq', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'wqeqwe', 'qweqwe', 'qweqwe');

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
(16, 10, '', 0, '');

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
(8, 70, 'read', 'read', '');

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
(16, 74, 'Interview,Late', 'College Dean', ''),
(18, 132, 'sgdfsgsdfg', 'Myself', ''),
(19, 133, 'Interview', 'Instructor', '');

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
(6, 4, 'AILEEN KATE BERNARD DELMAS', 0, '21312');

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
  `course` text DEFAULT NULL,
  `Year_level` int(11) NOT NULL,
  `last_name` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `middle_name` text DEFAULT NULL,
  `Contact_number` int(11) NOT NULL,
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
  `PWD` varchar(255) NOT NULL,
  `studpar` text NOT NULL,
  `maritalStatus` text NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`stud_user_id`, `course`, `Year_level`, `last_name`, `first_name`, `middle_name`, `Contact_number`, `year_enrolled`, `Section`, `Civil_status`, `gender`, `birth_date`, `Birth_place`, `Nationality`, `Languages_and_dialects`, `Address`, `email`, `IG`, `PWD`, `studpar`, `maritalStatus`, `username`, `password`) VALUES
(1, 'BSA', 4, 'Tacudog', 'Jonray', 'Bernard', 2147483647, 2003, 'B', 'Others', 'Female', '2023-11-15', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'yes', 'yes', 'yes', 'married', 'qwerty', '$2y$10$MAZpuotf.jLhmtt2ebzGsODgAf8HOfB4NkQga/BVEVE62ENgioyKS'),
(2, 'BAFL', 3, 'Tacudog', 'Jonray', 'Bernard', 2147483647, 2003, 'B', 'Married', 'Female', '2023-11-29', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', 'no', 'no', 'married', 'qwerty', '$2y$10$d7SbPKFs1tb4HLYP.yuDE.CrhFs540RtBTrjfkjXW68kUZNjn9w8i'),
(4, 'BAEL', 4, 'Tacudog', 'Jonray', 'Bernard', 2147483647, 2002, 'B', 'Married', 'Female', '2023-11-02', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', 'no', 'no', 'married', 'qwerty', '$2y$10$WJOaCr1OopEr1VHe9C.bcu.8c49sHUjOH60EG24h/HejchcMyNyaq'),
(6, 'BA Comm', 3, 'Tacudog', 'Jonray', 'Bernard', 2147483647, 2002, 'B', 'Married', 'Female', '2023-11-24', '12', '21', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', 'no', 'no', 'married', 'qwerty', '$2y$10$CznppTM4MZxSodt.La1gwO.sm1LbIvbualzuJ51x1HyfjqtMmdUnC'),
(111, 'BLIS', 0, 'Doe', 'John', 'D', 0, 2020, '', '', 'Male', '2023-08-15', '', '', '', '', 'user2@gmail.com', '', '', '', '', 'user2', '$2y$10$SczVZE3o64M8ZhuB1.NtG.AEY38qQFypzZ/FCW2m1sHyIR0eVEeSO'),
(112, 'BSDC', 0, 'D.', 'Jane', 'Doe', 0, 2019, '', '', 'Female', '2023-08-21', '', '', '', '', 'user3@gmail.com', '', '', '', '', 'user3', '$2y$10$jU4Y./C62dj97yonb5Wk7u02Spu3cnzv5sjNJXBj.8U1M77T7ScOy'),
(114, 'BSIT', 0, 'Kun', 'Josh', 'S', 0, 2020, '', '', 'Male', '2023-08-11', '', '', '', '', 'user4@gmail.com', '', '', '', '', 'user4', '$2y$10$4c3P3QQ2hUkIu8hffGl0ZewQB3ZHzfu1uNV76W9fiy/A/IhELhD5q'),
(115, 'BSDC', 0, 'Kaguya', 'Shinomiya', 'S', 0, 2019, '', '', 'Female', '2023-08-11', '', '', '', '', 'user5@gmail.com', '', '', '', '', 'user4', '$2y$10$Bc5xD1fwgVaDhyfodnoRpeWEqq3wys7oO1rEXODkS6bLBFxwxkPH.'),
(116, 'BSIT', 0, 'Shirogane', 'Miyuki', 'S.', 0, 2019, '', '', 'Male', '2023-08-18', '', '', '', '', 'user6@gmail.com', '', '', '', '', 'user6', '$2y$10$ijDxvfz1Nwj/W71jek9d1Oi/E3glb8U/HAqoCq9vqCHPwp3/BraT2'),
(117, 'BLIS', 0, 'Monkey', 'Luffy', 'D', 0, 2020, '', '', 'Male', '2023-08-18', '', '', '', '', 'user7@gmail.com', '', '', '', '', 'user7', '$2y$10$tu1lLwa.V8I728aNkNnpbuwdBckqpv46jpwAPJpVkwDDdPvqIQYmC'),
(118, 'qwer', 0, 'test', 'test8', 't', 0, 2020, '', '', 'Female', '2023-08-17', '', '', '', '', 'user8@gmail.com', '', '', '', '', 'user8', '$2y$10$RKW1IMlG82XCHHjAevPL0e.YPsPzqFv6ibl70MIvXTheK90sQtf0a'),
(432, 'BSIT', 0, 'Taquio', 'Narz Josef', 'L.', 0, 2020, '', '', 'Male', '0000-00-00', '', '', '', '', 'josefnarz2011@gmail.com', '', '', '', '', 'Narz', '$2y$10$Qsu.qwvkZ1ProVhvKXzCceopW3769HusjdHNfgzrouJH43BH0jISy'),
(6543, 'BSIT', 0, 'test', 'test', 't', 0, 2005, '', '', 'Male', '2023-08-23', '', '', '', '', 'narz@gmail.com', '', '', '', '', 'student2', 'pass2'),
(2001518, NULL, 0, 'Tacudog', 'Jonray', 'Bernard', 0, NULL, '', '', 'Male', NULL, '', '', '', '', 'tacudog.jonray@gmail.com', '', '', '', '', 'spellarj', '12345'),
(2002529, 'BSIT', 0, 'asdfasd', 'asdfasd', 'f', 0, 2020, '', '', 'Female', '2023-09-07', '', '', '', '', 'jo@gmail.com', '', '', '', '', 'zzz', 'pass');

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
(77, NULL, 432, 'appointment', '2023-10-20 05:52:40', NULL, 'open');

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
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tstable`
--

INSERT INTO `tstable` (`id`, `student_id`, `full_name`, `college`, `year_level`, `gender`, `reason`, `date`) VALUES
(1, '111', 'Mina Sharon', 'College of', '1st Year', 'Female', 'Tardy', '03-24-22'),
(2, '222', 'Sam Sam', 'College of', '2nd Year', 'Male', 'Academic Deficiency', '03-24-22'),
(3, '333', 'Ann Sana', 'College of', '4th Year', 'Male', 'Absent', '03-24-22'),
(4, '444', 'Tzuyu Chou', 'College of', '3rd Year', 'Female', 'Tardy', '03-24-22'),
(5, '555', 'Jihyo Momo', 'College of', '1st Year', 'Female', 'Absent', '03-24-22');

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
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `elementary_school`
--
ALTER TABLE `elementary_school`
  MODIFY `elem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `father`
--
ALTER TABLE `father`
  MODIFY `father_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `guardian_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `junior_highschool`
--
ALTER TABLE `junior_highschool`
  MODIFY `jun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mother`
--
ALTER TABLE `mother`
  MODIFY `mother_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `other_info`
--
ALTER TABLE `other_info`
  MODIFY `othinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `other_school`
--
ALTER TABLE `other_school`
  MODIFY `othschool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `readmission`
--
ALTER TABLE `readmission`
  MODIFY `readmission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `referral_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `senior_highschool`
--
ALTER TABLE `senior_highschool`
  MODIFY `sen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siblings`
--
ALTER TABLE `siblings`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transact`
--
ALTER TABLE `transact`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

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

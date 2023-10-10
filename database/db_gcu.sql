-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 01:16 PM
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
(2, 25, '1', '2019', '2020', 'Too lazy', 'Play Games', 'pending'),
(3, 31, '1', '2002', '2020', 'asdfasd', 'asdfasdfas', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `user_id` int(11) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `first_ name` text NOT NULL,
  `last_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `gender` text NOT NULL,
  `position` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `admin_user_id`, `first_ name`, `last_name`, `middle_name`, `gender`, `position`, `email`, `username`, `password`) VALUES
(15, 2002529, 'Narz Josef', 'Taquio', 'L.', 'Male', 'admin', 'josefnarz2011@gmail.com', 'Narz', '$2y$10$vrzb0bq0qR6EeXUQrWzOielCpmRrMiY246zbJrJz/H01go267FBCW');

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
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `readmission`
--

INSERT INTO `readmission` (`readmission_id`, `transact_id`, `motivation`, `reason`, `status`) VALUES
(3, 17, 'fgsdfgsdfg', 'sdfgsdfgs', 'pending'),
(4, 18, 'jfgjhfgh', 'fghjfghj', 'pending'),
(5, 26, 'no reason', 'none', ''),
(6, 40, 'No reason', 'not motivated at all', '');

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
(12, 22, 'Interview,Counseling,Late,Absent,fghdfghdf', '1', 'pending'),
(13, 23, 'Interview,Counseling,Absent,fghdfghdf', '3', 'pending'),
(14, 24, 'Interview,Counseling,fghdfghdf', '2', 'pending'),
(15, 30, 'Interview,Counseling,Late,Absent,others', 'Instructor', '');

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
  `Contact_number` int(11) NOT NULL,
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

INSERT INTO `student_user` (`stud_user_id`, `first_name`, `last_name`, `middle_name`, `gender`, `year_enrolled`, `course`, `birth_date`, `status`, `email`, `Year_level`, `Contact_number`, `Civil_status`, `Birth_place`, `Nationality`, `Languages_and_dialects`, `Address`, `Whom_do_you_live`, `IG`, `PWD`, `Student_parent`, `Financial_support`, `Marital_status_of_parents`, `username`, `password`) VALUES
(111, 'John', 'Doe', 'D', 'Male', '2020', 'BLIS', '2023-08-15', 1, 'user2@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'user2', '$2y$10$SczVZE3o64M8ZhuB1.NtG.AEY38qQFypzZ/FCW2m1sHyIR0eVEeSO'),
(112, 'Jane', 'D.', 'Doe', 'Female', '2019', 'BSDC', '2023-08-21', 1, 'user3@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'user3', '$2y$10$jU4Y./C62dj97yonb5Wk7u02Spu3cnzv5sjNJXBj.8U1M77T7ScOy'),
(114, 'Josh', 'Kun', 'S', 'Male', '2020', 'BSIT', '2023-08-11', 0, 'user4@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'user4', '$2y$10$4c3P3QQ2hUkIu8hffGl0ZewQB3ZHzfu1uNV76W9fiy/A/IhELhD5q'),
(115, 'Shinomiya', 'Kaguya', 'S', 'Female', '2019', 'BSDC', '2023-08-11', 0, 'user5@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'user4', '$2y$10$Bc5xD1fwgVaDhyfodnoRpeWEqq3wys7oO1rEXODkS6bLBFxwxkPH.'),
(116, 'Miyuki', 'Shirogane', 'S.', 'Male', '2019', 'BSIT', '2023-08-18', 0, 'user6@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'user6', '$2y$10$ijDxvfz1Nwj/W71jek9d1Oi/E3glb8U/HAqoCq9vqCHPwp3/BraT2'),
(117, 'Luffy', 'Monkey', 'D', 'Male', '2020', 'BLIS', '2023-08-18', 0, 'user7@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'user7', '$2y$10$tu1lLwa.V8I728aNkNnpbuwdBckqpv46jpwAPJpVkwDDdPvqIQYmC'),
(118, 'test8', 'test', 't', 'Female', '2020', 'qwer', '2023-08-17', 0, 'user8@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'user8', '$2y$10$RKW1IMlG82XCHHjAevPL0e.YPsPzqFv6ibl70MIvXTheK90sQtf0a'),
(432, 'Narz Josef', 'Taquio', 'L.', 'Male', '2020', 'BSIT', '0000-00-00', 0, 'josefnarz2011@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'Narz', '$2y$10$Qsu.qwvkZ1ProVhvKXzCceopW3769HusjdHNfgzrouJH43BH0jISy'),
(6543, 'test', 'test', 't', 'Male', '2005', 'BSIT', '2023-08-23', 0, 'narz@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'student2', 'pass2'),
(2001518, 'Jonray', 'Tacudog', 'Bernard', 'Male', NULL, NULL, NULL, 0, 'tacudog.jonray@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'spellarj', '12345'),
(2002529, 'asdfasd', 'asdfasd', 'f', 'Female', '2020', 'BSIT', '2023-09-07', 0, 'jo@gmail.com', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 'zzz', 'pass');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`transact_id`, `student_id`, `employee_id`, `transact_type`, `date_created`, `date_completed`, `status`) VALUES
(17, 111, NULL, 'readmission', '2023-09-07 08:51:20', NULL, 'pending'),
(18, 111, NULL, 'readmission', '2023-09-07 08:51:34', NULL, 'pending'),
(19, 111, NULL, 'withdrawal', '2023-09-07 08:51:53', NULL, 'pending'),
(20, 111, NULL, 'withdrawal', '2023-09-07 08:52:18', NULL, 'pending'),
(21, 111, NULL, 'withdrawal', '2023-09-07 08:52:42', NULL, 'pending'),
(22, 111, NULL, 'referral', '2023-09-07 08:57:14', NULL, 'pending'),
(23, 111, NULL, 'referral', '2023-09-07 08:57:21', NULL, 'pending'),
(24, 111, NULL, 'referral', '2023-09-07 08:57:26', NULL, 'pending'),
(25, 111, NULL, 'leave_of_absence', '2023-09-07 08:57:59', NULL, 'pending'),
(26, 432, NULL, 'readmission', '2023-09-13 14:42:10', NULL, 'recieved'),
(27, 432, NULL, 'withdrawal', '2023-09-13 14:42:51', NULL, 'recieved'),
(28, 432, NULL, 'withdrawal', '2023-09-13 14:43:06', NULL, 'recieved'),
(29, 432, NULL, 'withdrawal', '2023-09-13 14:43:18', NULL, 'recieved'),
(30, 432, NULL, 'referral', '2023-09-13 14:44:36', NULL, 'recieved'),
(31, 432, NULL, 'leave_of_absence', '2023-09-13 14:45:05', NULL, 'recieved'),
(32, 432, NULL, 'withdrawal', '2023-09-14 13:58:40', NULL, 'recieved'),
(33, 432, NULL, 'withdrawal', '2023-09-14 13:58:51', NULL, 'recieved'),
(34, 432, NULL, 'withdrawal', '2023-09-14 14:01:56', NULL, 'recieved'),
(35, 2002529, NULL, 'withdrawal', '2023-09-14 14:14:01', NULL, 'recieved'),
(36, 2002529, NULL, 'withdrawal', '2023-09-14 14:19:48', NULL, 'pending'),
(37, 2002529, NULL, 'withdrawal', '2023-09-14 14:21:43', NULL, 'pending'),
(38, 2002529, NULL, 'withdrawal', '2023-09-14 14:26:07', NULL, 'pending'),
(39, 2002529, NULL, 'withdrawal', '2023-09-14 14:26:07', NULL, 'pending'),
(40, 432, NULL, 'readmission', '2023-09-22 09:40:41', NULL, 'pending');

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
  `shift_from` int(11) NOT NULL,
  `shift_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`withdrawal_id`, `transact_id`, `reason`, `statement`, `explain`, `status`, `shift_from`, `shift_to`) VALUES
(3, 19, 'Withdrawing Enrollment', 'Somethin', 'coz I wanna', 'pending', 0, 0),
(4, 20, 'Dropping Subjects', 'I have no reason', 'I just want to', 'pending', 0, 0),
(5, 21, 'Shifting', 'No reason at all', 'Just for the fun of it', 'pending', 0, 0),
(6, 27, 'Withdrawing Enrollment', 'hfdghdfg', 'dfghdfghdf', '', 0, 0),
(7, 28, 'Dropping Subjects', 'xcvbxcvb', 'asdfsadf', '', 0, 0),
(8, 29, 'Shifting', 'xcvbxcvb', 'asdfsadf', '', 0, 0),
(9, 35, 'Shifting', 'fsdfgs', 'sdfgsdfg', '', 4, 4),
(10, 36, 'Shifting', 'ghdfgghd', 'dfghdfghdfgh', '', 18, 18),
(11, 37, 'Shifting', 'fasdfas', 'asdfasdf', '', 6, 6),
(12, 38, 'Shifting', 'sdfgsdfg', 'sgfsdg', '', 4, 1),
(13, 39, 'Shifting', 'sdfgsdfg', 'sgfsdg', '', 4, 1);

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
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `absence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `readmission`
--
ALTER TABLE `readmission`
  MODIFY `readmission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `referral_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `siblings`
--
ALTER TABLE `siblings`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transact`
--
ALTER TABLE `transact`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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

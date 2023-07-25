-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 12:51 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `admin_user_id`, `first_ name`, `last_name`, `middle_name`, `gender`, `position`, `email`, `username`, `password`) VALUES
(1, 2002129, 'Narz Josef', 'Taquio', 'Ligawad', 'Male', 'Admin', 'narz@gmail.com', 'Narz', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

CREATE TABLE `student_user` (
  `user_id` int(11) NOT NULL,
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
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`user_id`, `stud_user_id`, `first_name`, `last_name`, `middle_name`, `gender`, `year_enrolled`, `course`, `birth_date`, `email`, `username`, `password`) VALUES
(1, 2001518, 'Jonray', 'Tacudog', 'Bernard', 'Male', NULL, NULL, NULL, 'tacudog.jonray@gmail.com', 'spellarj', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `student_user`
--
ALTER TABLE `student_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_user`
--
ALTER TABLE `student_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

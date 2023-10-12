-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 05:52 AM
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
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `event_title` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `student_id`, `employee_id`, `event_title`, `date`, `start_time`, `end_time`, `status`) VALUES
(1, NULL, NULL, 'asdf', '2023-10-11', '09:00:00', '10:00:00', NULL),
(2, NULL, NULL, 'Test', '2023-10-28', '09:00:00', '10:00:00', NULL),
(3, NULL, NULL, 'Test 2', '2023-10-29', '08:00:00', '09:00:00', NULL),
(4, NULL, NULL, '', '2023-10-29', '00:00:00', '00:00:00', NULL),
(5, NULL, 2002529, 'dfgh', '2023-10-11', '08:00:00', '09:00:00', NULL),
(6, NULL, 2002529, 'Test 3', '2023-10-31', '13:00:00', '14:00:00', 'pending'),
(7, NULL, 2002529, '', '2023-10-31', '00:00:00', '00:00:00', 'pending'),
(8, NULL, 2002529, 'sdfg', '2023-10-01', '08:00:00', '09:00:00', 'pending'),
(9, NULL, NULL, 'asdf', '2023-10-21', '06:00:00', '08:00:00', 'pending'),
(10, NULL, 2002529, 'sdfgsdfgsdfgsdfg', '2023-10-18', '05:00:00', '16:00:00', 'pending'),
(11, NULL, 2002529, 'sdfg', '2024-01-11', '14:00:00', '16:00:00', 'pending'),
(12, NULL, 2002529, 'Its time', '2023-11-27', '01:00:00', '04:00:00', 'pending'),
(13, NULL, 2002529, 'Test5', '2023-10-31', '10:00:00', '11:00:00', 'pending'),
(14, NULL, 2002529, 'hi', '2023-10-01', '12:00:00', '13:00:00', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `admin_user` (`admin_user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

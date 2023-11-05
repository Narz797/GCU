-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 05:48 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ts_account`
--

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `employee_id` VARCHAR(20) NOT NULL,
  `college` VARCHAR(100) NOT NULL,
  `gender` VARCHAR(10) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `first_name` VARCHAR(50) NOT NULL,
  `middle_name` VARCHAR(50) NOT NULL,
  `contact_number` VARCHAR(20) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `civil_status` VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`employee_id`, `college`, `gender`, `last_name`, `first_name`, `middle_name`, `contact_number`, `email`, `civil_status`) VALUES
('123456', 'College of Teacher Education','Male','Doe','John','Michael','123-456-7890', 'john.doe@email.com','Married'),
('111', 'College of Information Sciences','Male','Monkey','Dulagan','Luffy','123-456-7890', 'luffy.d@email.com','Single'),
('31254', 'College of Agriculture','Female','Nami','Robin','Franky','123-456-7890', 'namisan@email.com','Others'),
('0879', 'College of Nursing','Male','Trafalgar','Water','Law','123-456-7890', 'ilovemywife@email.com','Married'),
('2555', 'College of Social Sciences','Male','Kid','Killer','Machine','123-456-7890', 'tsundere@email.com','Others');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

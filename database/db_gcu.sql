-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 03:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
(9, '2001519', 'College of Information Sciences', 'Male', 'Taquio', 'Narz Josef', 'L.', '09995568797', 'josefnarz2011@gmail.com', '$2y$10$vpNlqag6KkL6dylpZyfliusXTx9iKOrX7/BVghPkf/guxjTrs4Zgi', 'Single');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

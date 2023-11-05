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
-- Database: `ts_tablestudent`
--

-- --------------------------------------------------------

--
-- Table structure for table `tstable`
--

CREATE TABLE `tstable` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `student_id` VARCHAR(20) NOT NULL,
  `full_name` VARCHAR(100) NOT NULL,
  `college` VARCHAR(10) NOT NULL,
  `year_level` VARCHAR(50) NOT NULL,
  `gender` VARCHAR(50) NOT NULL,
  `reason` VARCHAR(50) NOT NULL,
  `date` VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tstable`
--

INSERT INTO `tstable` (`student_id`, `full_name`, `college`, `year_level`, `gender`, `reason`, `date`) VALUES
('111', 'Mina Sharon','College of Teacher Education','1st Year','Female','Tardy', '03-24-22'),
('222', 'Sam Sam','College of Information Sciences','2nd Year','Male','Academic Deficiency', '03-24-22'),
('333', 'Ann Sana','College of Social Sciences','4th Year','Male','Absent', '03-24-22'),
('444', 'Tzuyu Chou','College of Nursing','3rd Year','Female','Tardy', '03-24-22'),
('555', 'Jihyo Momo','College of Agriculture','1st Year','Female','Absent', '03-24-22'),;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tstable`
--
ALTER TABLE `tstable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tstable`
--
ALTER TABLE `tstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

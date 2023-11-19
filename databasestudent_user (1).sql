-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 02:54 PM
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
  `ParentGuardianNumber` bigint(255) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`stud_user_id`, `course`, `Year_level`, `last_name`, `first_name`, `middle_name`, `Contact_number`, `ParentGuardianName`, `ParentGuardianNumber`, `Relation`, `year_enrolled`, `Section`, `Civil_status`, `gender`, `birth_date`, `Birth_place`, `Nationality`, `Languages_and_dialects`, `Address`, `email`, `IG`, `specificIG`, `PWD`, `Student_parent`, `Marital_status_of_parents`, `username`, `password`) VALUES
(1, 'BSA', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2003, 'B', 'Others', 'Female', '2023-11-15', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'yes', NULL, 'yes', 'yes', 'married', 'qwerty', '$2y$10$MAZpuotf.jLhmtt2ebzGsODgAf8HOfB4NkQga/BVEVE62ENgioyKS'),
(2, 'BA Comm', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Female', '2023-11-01', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'annulled', 'qwerty', '$2y$10$BPec.uhMtAXza4ISWnZWL.V0Wdjvf7miNs/TorlbULXPVauYCqA/2'),
(3, 'BAFL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2003, 'B', 'Others', 'Female', '2023-11-17', '21', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerrty', '$2y$10$4ZdRkhRDZY2BSmao/j6ggeL5tuwq6nRR.Qm2k6951gQVsGFWs9wPW'),
(4, 'BSABE', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Others', 'Male', '2023-10-31', '12', '12', '12', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$eikmJRNet5WHOArpKr1f.ec/Uzsu1AVV763WqOxb6DOxg6fSTNApu'),
(5, 'BAFL', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Others', 'Male', '2023-11-15', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$tduX.X2zIWdtyWnVjEd8fOaL6Lf0oE8d4VtTiKunTOMZT9hbmSiq.'),
(6, 'BAEL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Female', '2023-11-21', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$UvcmnP36QrcdF3YxDq5IdOgEb0htFxvSK4v3lqfzudSQyVE8Uhbg6'),
(7, 'BAFL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Others', 'Female', '2023-11-19', '12', '12', '21', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'livingTogether', 'tacudog.jonray@gmail.com', '$2y$10$We.0nCl288lfrx74EEejF.korYfMtuHw5UCDXrl2djvHFz8CnK3BO'),
(8, 'BAFL', 5, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2003, '12', 'Married', 'Male', '2023-11-15', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'annulled', 'tacudog.jonray@gmail.com', '$2y$10$8I66P7Nhq/uV5LVA8ddliuZn0e6c0x.PXBgqfME9tBY5M39i09Zom'),
(9, 'BAFL', 6, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Others', 'Male', '2023-11-20', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'yes', 'qwertt', 'yes', 'yes', 'annulled', 'qwerty', '$2y$10$XTCqSQB2S0811sYADx7RNupxPj73B5x0i/Nj4turnewsTqflD1IpK'),
(10, 'BA Comm', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Single', 'Male', '2023-11-14', '12', '12', '2112', 'IP address', 'tacudog.jonray@gmail.com', 'yes', 'qwertt', 'yes', 'yes', 'married', 'qwerty', '$2y$10$tQRoH1SVsK0PpIexB9B5Seua4K7yZsvAUlggNXp9Ka19esOgq0w4W'),
(11, 'BSET', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Female', '2023-11-30', '12', '12', '12', 'IP address', 'tacudog.jonray@gmail.com', 'yes', 'qwertt', 'no', 'yes', 'married', 'qwerty', '$2y$10$I8ePXCMjNfZPastoiETBiOk7TboXndDI7vS0HU/pf6ViSeUx.Oaoy'),
(12, 'BA Comm', 2, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Male', '2023-11-18', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerrty', '$2y$10$mJWvpPU7s31Z5mnYimg0LOiA2bwUMRDSE93NY7zYzNYiPrdf6EnEq'),
(13, 'BAFL', 5, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Others', 'Male', '2023-11-14', '12', '12', '2112', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$0W650ug87kFzqq3LuUMS7u/kHOHt0zeCum/eaeHz2vTnnxkms.num'),
(15, 'BAFL', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, '12', 'Others', 'Female', '2023-11-08', '12', '12', 'wqeqwe', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'tacudog.jonray@gmail.com', '$2y$10$F9eVpw4lzbdcZPBl.u6i4uN.HcbWZhpTJdW4f8SWRIBRamVHGSH6y'),
(17, 'BAFL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Others', 'Female', '2023-11-22', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$f3zlUhFJGzTpzan0HUwdCeuLxpl8iAZoAfAEfkQRtlN8veiWfrKuq'),
(21, 'BSCE', 5, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Male', '2023-11-22', '12', '12', 'wqeqwe', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$JrdNeWcJqsgFwCg5Nk8TC.EaOELOmwF./.6lua1fYgG17vmCskbIi'),
(23, 'BA Comm', 5, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Male', '2023-11-20', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'annulled', 'qwerty', '$2y$10$C4YUHRGm/VyfTZsMdh7wROU.mxUWCodgLTwJEQwBh6OTrmBPcEFvy'),
(31, 'BAEL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Male', '2023-11-16', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'annulled', 'qwerty', '$2y$10$u8T7GBbN5B1LdUxfKhjdy.Drt1hokvXM3kaHv5VeUwFgRiNGXYwZm'),
(35, 'BAEL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Female', '2023-11-02', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$IGknBRdyEwYtGwxPQVY8J.EFECtyWnls.Wu72TFC3glVGBLleYxN.'),
(36, 'BAEL', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Female', '2023-11-22', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'yes', NULL, 'yes', 'yes', 'married', 'qwerty', '$2y$10$ewnhtJbVGz7l1axvOnD6i.oX.yKYmtRtv4AOcI5eS1BXp8lNak4yK'),
(43, 'BAFL', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Female', '2023-11-23', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'yes', NULL, 'no', 'no', 'married', '', '$2y$10$nx10UB71ynhH/Ei14Fqv7.GKx.FfoFZQvBfg17eL09HYaOXWvWk66'),
(50, 'BAEL', 3, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Female', '2023-11-14', '12', '12', 'qwe', 'IP address', 'tacudog.jonray@gmail.com', 'yes', 'qwe', 'no', 'no', 'married', 'qwerty', '$2y$10$bTWLCv7O7XzM9Bv7CWnS3OiVg1KnkRzi67tKbNJpTrutylwj1QiRu'),
(64, 'BSABE', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Others', 'Male', '2023-11-20', '12', '12', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'no', NULL, 'no', 'no', 'married', 'qwerty', '$2y$10$n7GDEneyMS59V5WazwbLsO6TJH2CIVtxlxr1tp1/zjfvD0CGTr3ne'),
(100, 'BAFL', 4, 'Tacudog', 'Jonray', 'Bernard', '2147483647', '', 0, '', 2002, 'B', 'Married', 'Female', '2023-11-21', '12', '21', 'asdasd', 'IP address', 'tacudog.jonray@gmail.com', 'yes', 'qwe', 'yes', 'yes', 'married', 'qwerty', '$2y$10$wdKS1dzgALKdV0wn3sTfAuO5WGbLJxOww0bfhaTNQ4OpOKU6GqRdG'),
(111, 'BLIS', 0, 'Doe', 'John', 'D', '0', '', 0, '', 2020, '', '', 'Male', '2023-08-15', '', '', '', '', 'user2@gmail.com', '', NULL, '', '', '', 'user2', '$2y$10$SczVZE3o64M8ZhuB1.NtG.AEY38qQFypzZ/FCW2m1sHyIR0eVEeSO'),
(112, 'BSDC', 0, 'D.', 'Jane', 'Doe', '0', '', 0, '', 2019, '', '', 'Female', '2023-08-21', '', '', '', '', 'user3@gmail.com', '', NULL, '', '', '', 'user3', '$2y$10$jU4Y./C62dj97yonb5Wk7u02Spu3cnzv5sjNJXBj.8U1M77T7ScOy'),
(114, 'BSIT', 0, 'Kun', 'Josh', 'S', '0', '', 0, '', 2020, '', '', 'Male', '2023-08-11', '', '', '', '', 'user4@gmail.com', '', NULL, '', '', '', 'user4', '$2y$10$4c3P3QQ2hUkIu8hffGl0ZewQB3ZHzfu1uNV76W9fiy/A/IhELhD5q'),
(115, 'BSDC', 0, 'Kaguya', 'Shinomiya', 'S', '0', '', 0, '', 2019, '', '', 'Female', '2023-08-11', '', '', '', '', 'user5@gmail.com', '', NULL, '', '', '', 'user4', '$2y$10$Bc5xD1fwgVaDhyfodnoRpeWEqq3wys7oO1rEXODkS6bLBFxwxkPH.'),
(116, 'BSIT', 0, 'Shirogane', 'Miyuki', 'S.', '0', '', 0, '', 2019, '', '', 'Male', '2023-08-18', '', '', '', '', 'user6@gmail.com', '', NULL, '', '', '', 'user6', '$2y$10$ijDxvfz1Nwj/W71jek9d1Oi/E3glb8U/HAqoCq9vqCHPwp3/BraT2'),
(117, 'BLIS', 0, 'Monkey', 'Luffy', 'D', '0', '', 0, '', 2020, '', '', 'Male', '2023-08-18', '', '', '', '', 'user7@gmail.com', '', NULL, '', '', '', 'user7', '$2y$10$tu1lLwa.V8I728aNkNnpbuwdBckqpv46jpwAPJpVkwDDdPvqIQYmC'),
(118, 'qwer', 0, 'test', 'test8', 't', '0', '', 0, '', 2020, '', '', 'Female', '2023-08-17', '', '', '', '', 'user8@gmail.com', '', NULL, '', '', '', 'user8', '$2y$10$RKW1IMlG82XCHHjAevPL0e.YPsPzqFv6ibl70MIvXTheK90sQtf0a'),
(432, 'BSIT', 0, 'Taquio', 'Narz Josef', 'L.', '0', '', 0, '', 2020, '', '', 'Male', '0000-00-00', '', '', '', '', 'josefnarz2011@gmail.com', '', NULL, '', '', '', 'Narz', '$2y$10$Qsu.qwvkZ1ProVhvKXzCceopW3769HusjdHNfgzrouJH43BH0jISy'),
(6543, 'BSIT', 0, 'test', 'test', 't', '0', '', 0, '', 2005, '', '', 'Male', '2023-08-23', '', '', '', '', 'narz@gmail.com', '', NULL, '', '', '', 'student2', 'pass2'),
(2001518, NULL, 0, 'Tacudog', 'Jonray', 'Bernard', '0', '', 0, '', NULL, '', '', 'Male', NULL, '', '', '', '', 'tacudog.jonray@gmail.com', '', NULL, '', '', '', 'spellarj', '12345'),
(2002529, 'BSIT', 0, 'asdfasd', 'asdfasd', 'f', '0', '', 0, '', 2020, '', '', 'Female', '2023-09-07', '', '', '', '', 'jo@gmail.com', '', NULL, '', '', '', 'zzz', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_user`
--
ALTER TABLE `student_user`
  ADD PRIMARY KEY (`stud_user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

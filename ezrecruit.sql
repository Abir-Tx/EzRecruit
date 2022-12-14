-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2022 at 07:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezrecruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `uname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `propic` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `uname`, `email`, `password`, `fname`, `lname`, `propic`, `gender`, `dob`) VALUES
(1, 'abir', 'mushfiqurrohomanabir@gmail.com', 'abir12918', 'Mushfiqur Rahma', 'Abir', '', 'male', '2012-02-17'),
(2, 'nibir', 'nibir@gmail.com', 'abir12918', 'Iftikar Islam', 'lname', 'histogram-cheat-sheet.jpg', 'male', '2022-12-06'),
(3, 'kabuto', 'kabuto@gmail.com', '1234', 'Kabuto', 'lname', '20-42738-1.jpg', 'male', '1999-02-17'),
(6, 'malu', 'alumalu@gmail.com', '567', 'Alu', 'lname', 'IMG_1926.JPG', 'other', '1991-01-22'),
(7, 'marina', 'marina@gmail.com', '1234', 'Marina', 'Afoj', 'marina.jpg', 'female', '2022-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int NOT NULL,
  `address` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `propic` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `bio` varchar(60) NOT NULL,
  `skills` varchar(50) NOT NULL,
  `education` varchar(15) NOT NULL,
  `selected` tinyint(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `password`, `resume`, `propic`, `dob`, `bio`, `skills`, `education`, `selected`) VALUES
(1, 'Mushfiqur Rahma', 'Abir', 'mushfiqurrohomanabir@gmail.com', 1784859994, 'Muladuli, Ishurdi, Pabna', 'abir12918', '', '', '2012-02-17', 'Programmer/Photographer', 'Coding, Googling, Linux, Guiter, Photography', 'BSc', 2),
(2, 'Iftikar Islam', 'Nibir', 'nibir@gmail.com', 1621924383, 'Muladuli, Ishwardi, Pabna', 'nibir12918', 'onmicrosoft.txt', 'abir.jpg', '2016-02-17', 'I am Nibir', 'google, Sing', 'HSC', 1),
(3, 'Testing', 'fgefe', 'test@mail.com', 2147483647, 'Muladuli, Ishwardi, Pabna', '1234', 'Screenshot 2022-09-02 162743.png', '306897207_436779181765671_7101877693817487726_n.jp', '2022-11-09', 'effwe', 'fefefef', 'BSc', 1),
(14, 'Handme', 'Shandme', 'mushfiqurrohomanabir@gmail.com', 1621924383, 'Muladuli, Ishwardi, Pabna', '1234', 'WindowsAltCodes.pdf', '20-42738-1.jpg', '2022-12-06', 'jyu', 'ew', 'SSC', 1),
(15, 'Zubayer', 'Emon', 'emon@yahoo.com', 1785476324, 'Dhaka, Bangladesh', '12345', 'resume.pdf', 'emon.jpg', '2022-12-02', 'I am Emon', 'CSS, PHP', 'BSc', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `name` varchar(50) DEFAULT NULL,
  `id` int DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `joining_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`name`, `id`, `salary`, `email`, `phone`, `joining_date`) VALUES
('fef', 2, 3232, 'mushfiqurrohomanabir@gmail.com', 54365447, '2022-12-14'),
('Marina Afroz', NULL, 500000, 'mrina@gmail.com', 1766655443, '2022-12-01'),
('Windows 10', NULL, 100000, 'windows@gmail.com', 98123921, '2022-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `recruiters`
--

CREATE TABLE `recruiters` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `propic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recruiters`
--

INSERT INTO `recruiters` (`id`, `name`, `uname`, `email`, `password`, `propic`) VALUES
(1, 'Sawon Mursalin', 'sawon', 'sawon@gmail.com', 'sawon1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Table for storing the general users info';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Mushfiqur Rahman Abir', 'mushfiqurrohomanabir@gmail.com', 'abir1234'),
(3, 'Iftikar Islam Nibir', 'nibir@gmail.com', 'nibir1234'),
(5, 'Tasnim Shakal', 'shakal@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiters`
--
ALTER TABLE `recruiters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `recruiters`
--
ALTER TABLE `recruiters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

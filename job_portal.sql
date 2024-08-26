-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 11:23 AM
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
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` varchar(50) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1002) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
('1', 'admin', '1234'),
('1', 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `experience` text NOT NULL,
  `resume` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'applied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `student_id`, `job_id`, `name`, `year`, `branch`, `domain`, `address`, `phone`, `email`, `experience`, `resume`, `photo`, `status`) VALUES
(4, 1, 1, 'CHOUGULE SHUBHAM ULHAS', 'sy', 'cse', 'cse', 'Banwadi, Karad, Satara', '09075737702', 'shubhamuchougule@gmail.com', 'kj', 'cv.pdf', NULL, 'accepted'),
(5, 1, 1, 'SHUBHAM ULHAS', 'ty', 'cse', 'cse', 'Banwadi, Karad, Satara', '09075737702', 'shubhamuchougule@gmail.com', 'adf', 'Exp 4- Input output and String methods (1).pdf', NULL, 'accepted'),
(6, 1, 6, 'CHOUGULE SHUBHAM ULHAS', 'ty', 'cse', 'cse', 'Banwadi, Karad, Satara', '09075737702', 'shubhamuchougule@gmail.com', 'dsfsf', 'Exp 4- Input output and String methods (1).pdf', NULL, 'accepted'),
(7, 1, 5, 'CHOUGULE SHUBHAM ULHAS', 'sy', 'cse', 'cse', 'Banwadi, Karad, Satara', '09075737702', 'shubhamuchougule@gmail.com', 'dsaf', '../uploads/photopdf.pdf', '../uploads/WhatsApp Image 2023-01-16 at 23.59.11.jpg', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `id` int(50) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1002) NOT NULL,
  `department` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinators`
--

INSERT INTO `coordinators` (`id`, `username`, `password`, `department`) VALUES
(2, 'stph1994', '5678', 'entc'),
(3, 'parth', '1234', 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `stipend` decimal(10,2) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `supervisor_name` varchar(255) DEFAULT NULL,
  `supervisor_contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`id`, `student_id`, `company_name`, `position`, `start_date`, `end_date`, `stipend`, `responsibilities`, `supervisor_name`, `supervisor_contact`) VALUES
(1, 1, 'NextIn', 'ceo', '2024-08-01', '2024-08-18', 5444444.00, 'adas', 'sfda', 'asdfsadsf');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `comname` mediumtext NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `skills` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `openings` int(11) NOT NULL,
  `eligibility` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `comname`, `title`, `description`, `skills`, `domain`, `position`, `experience`, `salary`, `openings`, `eligibility`, `shift`, `schedule`) VALUES
(5, '', 'dsaf', 'fds', 'ads', 'cse', 'ceo', '1 year', '50000', 1, 'degree', 'fulltime', 'today'),
(6, 'nextin', 'dfscvc', 'dev', 'ads', 'cse', 'ceo', '1 year', '50000', 1, 'degree', 'fulltime', 'today');

-- --------------------------------------------------------

--
-- Table structure for table `performance_tracking`
--

CREATE TABLE `performance_tracking` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `aptitude` enum('pending','completed') DEFAULT 'pending',
  `technical_interview` enum('pending','completed') DEFAULT 'pending',
  `offer_letter` enum('pending','completed') DEFAULT 'pending',
  `placed` enum('pending','completed') DEFAULT 'pending',
  `rejected` enum('yes','no') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance_tracking`
--

INSERT INTO `performance_tracking` (`id`, `application_id`, `aptitude`, `technical_interview`, `offer_letter`, `placed`, `rejected`) VALUES
(2, 4, 'completed', 'completed', 'pending', 'completed', 'yes'),
(3, 5, 'pending', 'pending', 'pending', 'pending', 'no'),
(4, 6, 'completed', 'pending', 'completed', 'pending', 'no'),
(5, 7, 'pending', 'pending', 'pending', 'pending', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `prn` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `prn`, `roll_no`, `name`, `year`, `branch`, `division`, `batch`, `address`, `email`, `phone`, `username`, `password`) VALUES
(1, '23sc114282017', '62', 'CHOUGULE SHUBHAM ULHAS', 'ty', 'cse', 'b', 'b3', 'Banwadi, Karad, Satara', 'prathameshhalale1234@gmail.com', '09075737702', 'halale', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_tracking`
--
ALTER TABLE `performance_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prn` (`prn`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `performance_tracking`
--
ALTER TABLE `performance_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);

--
-- Constraints for table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `performance_tracking`
--
ALTER TABLE `performance_tracking`
  ADD CONSTRAINT `performance_tracking_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

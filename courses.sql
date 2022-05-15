-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 11:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course+`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `endDate` varchar(255) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `description` varchar(1500) NOT NULL,
  `feild` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `instructor`, `startDate`, `endDate`, `startTime`, `endTime`, `description`, `feild`) VALUES
(1, 'C++', ' Dr. Huda Alsuwaidan', '1 April 2022', '10 April 2022', '15:00:00', '17:00:00', 'C++ for Programmers is designed for students who are familiar with a programming language and wish to learn C++. \r\nYou will learn the basics, functions, control flow, and more.', 'Computer Programming'),
(2, 'Python', 'Dr. Renad Alghamdi', '10 April 2022', '16 April 2022', '13:00:00', '15:00:00', 'Anything is possible when learning is easy. Discover where Python can take you with Course+.\r\nIn this course, you’ll learn python syntax, how to build control flows into your code, lists, loops, and more.', 'Computer Programming'),
(3, 'Digital Forensics', 'Dr. Nouf Alghufaily', '20 April 2022', '25 April 2022', '08:00:00', '10:00:00', 'In the Digital Forensics course, you will learn about legal considerations applicable to computer forensics and how to identify,\r\ncollect and preserve digital evidence. You will have a close look at on-scene triaging, keyword lists, grep, file hashing, report writing and the profession of digital forensic examination.', 'Cybersecurity'),
(4, 'Cryptography', 'Dr. Fajer Almulla', '15 May 2022', '18 May 2022', '08:00:00', '10:00:00', 'In this course, you will learn all of the old and modern security systems that have been used and are currently being used.\r\nYou also learn how to crack each one and understand why certain security systems are weak and why others are strong.\r\nWe will even go into RSA, AES and ECC which are the three main modern cryptography systems used today. ', 'Cybersecurity'),
(5, 'Data Science', 'Dr. Ghadi Rayani', '24 May 2022', '10 June 2022', '10:00:00', '12:00:00', 'You’ll master the skills necessary to become a successful Data Scientist. \r\nYou’ll work on projects designed by industry experts, and learn to run data pipelines, design experiments, build recommendation systems, and deploy solutions to the cloud.\r\nMachine learning, Deep Learning and software engineering will be covered.', 'Data Science'),
(6, 'Data Mining', 'Dr. Maha AlMasuod', ' 1 june 2022', '10 June 2022.', '12:00:00', '14:00:00', 'In this course you will experience firsthand all of what a Data Scientist goes through on a daily basis, i.e.\r\ncorrupt data, anomalies, and irregularities. This course will give you a full overview of the Data Science journey.\r\nYou will learn how to clean and prepare your data for analysis, how to model your data, and much more.', 'Data Science'),
(7, 'HTML', 'Dr. Maryam Aldossary', '6 June 2022', '18 June 2022', '10:00:00', '12:00:00', 'HTML is the foundation of all web pages. \r\nWithout HTML, you wouldn’t be able to organize text or add images or videos to your web pages. \r\nIn this course you will learn all the common HTML tags used to structure HTML pages, the skeleton of all websites.', 'Web Development'),
(8, 'JavaScript', 'Dr. Malak Aljabri', '18 june 2022', '25 June 2022', '12:00:00', '14:00:00', 'In this course you will learn how to think like a developer, how to plan application features, \r\nhow to architect your code, how to debug code, and a lot of other real-world skills that you will need on your developer job. ', 'Web Development');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

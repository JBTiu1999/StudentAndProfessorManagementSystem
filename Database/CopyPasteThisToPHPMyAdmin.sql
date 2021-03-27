-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2021 at 04:50 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proglangs`
--

-- --------------------------------------------------------

--
-- Table structure for table `Person`
--

CREATE TABLE `Person` (
  `PersonID` int(9) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `CourseCode` varchar(100) NOT NULL COMMENT 'STRICTLY follow the format: Ex. Course1, Course2, Course3, ...',
  `Occupation` varchar(15) NOT NULL COMMENT 'Professor/Student',
  `Archived` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0(false) or 1 (true)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Person`
--

INSERT INTO `Person` (`PersonID`, `LastName`, `FirstName`, `CourseCode`, `Occupation`, `Archived`) VALUES
(201910013, 'Tiu', 'Jason', 'CS052, CS054', 'Student', 0),
(201910014, 'Dela Cruz', 'Riel', 'CS056, CS058', 'Student', 0),
(201910015, 'Francisco', 'Paula', 'CS046, CS050', 'Student', 0),
(201910016, 'Ang', 'Harris', 'CS056, CS058', 'Student', 0),
(201910017, 'Magsipoc', 'Abraham', 'CS054', 'Professor', 0),
(201910018, 'Someone', 'Something', 'CS050, CS054, CS056', 'Student', 0),
(201910019, 'Someday', 'Somewhere', 'CS050', 'Student', 1),
(201910020, 'Mahazar', 'Manny', 'CS052, CS056', 'Professor', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`PersonID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Person`
--
ALTER TABLE `Person`
  MODIFY `PersonID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201910021;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

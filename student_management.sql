-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2021 at 07:50 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `stu_language`
--

DROP TABLE IF EXISTS `stu_language`;
CREATE TABLE IF NOT EXISTS `stu_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `removed` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_language`
--

INSERT INTO `stu_language` (`id`, `title`, `removed`) VALUES
(1, 'Tamil', 0),
(2, 'English', 0),
(3, 'French', 0),
(4, 'Hindi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stu_student`
--

DROP TABLE IF EXISTS `stu_student`;
CREATE TABLE IF NOT EXISTS `stu_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regno` varchar(150) NOT NULL,
  `studentNo` int(11) NOT NULL DEFAULT 0,
  `name` varchar(150) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '1 - male, 2- female, 3- Transgender',
  `address` text DEFAULT NULL,
  `mobile_no` varchar(25) NOT NULL,
  `removed` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_student`
--

INSERT INTO `stu_student` (`id`, `regno`, `studentNo`, `name`, `dob`, `age`, `gender`, `address`, `mobile_no`, `removed`) VALUES
(1, 'stu0001', 1, 'aravindhan', '21/12/1997', 23, 1, '', '8608896859', 0),
(2, 'stu0002', 2, 'ar', '15/06/1994', 27, 1, 'test address', '9874563210', 1),
(3, 'stu0003', 3, 'priya', '15/12/1995', 25, 2, 'test address', '9876325410', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stu_student_language`
--

DROP TABLE IF EXISTS `stu_student_language`;
CREATE TABLE IF NOT EXISTS `stu_student_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) NOT NULL,
  `languageId` int(11) NOT NULL,
  `removed` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_student_language`
--

INSERT INTO `stu_student_language` (`id`, `studentId`, `languageId`, `removed`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 0),
(3, 3, 1, 1),
(4, 3, 2, 1),
(5, 3, 1, 1),
(6, 3, 2, 1),
(7, 3, 3, 1),
(8, 3, 1, 1),
(9, 3, 2, 1),
(10, 3, 4, 1),
(11, 3, 1, 0),
(12, 3, 2, 0),
(13, 3, 4, 0),
(14, 1, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

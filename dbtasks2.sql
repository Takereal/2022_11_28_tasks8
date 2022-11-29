-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2022 at 11:36 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtasks2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `executor` varchar(255) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `deadline` date NOT NULL,
  `donedate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `executor`, `description`, `deadline`, `donedate`, `status`) VALUES
(2, 'testnew', 'Alex', 'tester31', '2022-12-01', '2022-11-28', 'Done'),
(3, 'text1', 'Sidorov', 'test11', '2022-11-29', NULL, 'In Progress'),
(4, 'test4', 'Ivanov', 'tester4', '2022-11-01', NULL, 'In Progress'),
(6, 'test 6', 'Sidorov', 'tester 6', '2022-11-29', NULL, 'In Progress'),
(7, 'test 8', 'Sidorov', 'tester 8', '2022-11-30', NULL, 'In Progress'),
(8, 'test 8', 'Sidorov', 'tester 8', '2022-11-30', '2022-11-28', 'Done'),
(9, 'test 8', 'Sidorov', 'tester 8', '2022-11-30', NULL, 'In Progress'),
(10, 'test 9', 'Ivanov', 'tester 9', '2022-11-30', NULL, 'In Progress'),
(11, 'new1', 'John', 'new11', '2022-11-27', NULL, 'In Progress'),
(12, 'tester', 'Ivanov', 'new test ', '2022-12-31', NULL, 'In Progress');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

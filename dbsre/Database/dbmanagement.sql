-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 09:48 AM
-- Server version: 5.7.16-log
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_record`
--

CREATE TABLE `create_record` (
  `id` int(11) NOT NULL,
  `schoolname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `contact1` varchar(255) NOT NULL,
  `contact2` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `marks` varchar(255) NOT NULL,
  `collectedby` varchar(255) NOT NULL,
  `feedby` varchar(255) NOT NULL,
  `collectiondate` date NOT NULL,
  `block` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `call_no` varchar(255) NOT NULL DEFAULT '0',
  `saved_by` varchar(255) NOT NULL,
  `creating_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `create_record`
--

INSERT INTO `create_record` (`id`, `schoolname`, `name`, `fname`, `contact1`, `contact2`, `class`, `stream`, `marks`, `collectedby`, `feedby`, `collectiondate`, `block`, `status`, `call_no`, `saved_by`, `creating_time`) VALUES
(16, 'dbgi', 'manu', 'anupam', '888', '954', '10', 'PCM', '12', 'me', 'me', '2018-10-18', 'btech', 'NI', '0', 'user277', '2018-10-22 07:16:59'),
(17, 'dev bhoomi', 'harsh', 'anupam', '888', '99', '10', 'PCM', '12', 'me', 'me', '2018-10-11', 'btech', 'WC', '0', 'krishtyagi277', '2018-10-28 11:32:41'),
(18, 'dbgi', 'hasrha', 'anupam', '888', '99', '10', 'PCM', '12', 'me', 'me', '2018-10-19', 'btech', 'INT', '0', 'krishtyagi277', '2018-10-28 11:33:15'),
(20, 'dbgi', 'garima', 'anuj', '3012257471', '9012254742', '12', 'PCM', '12', 'me', 'me', '2018-10-24', 'btech', 'NONE', '0', 'krishtyagi277', '2018-10-28 13:03:50'),
(23, 'dbgi', 'sunny', 'hjjhj', '888', '99', '10', 'PCB', '12', 'me', 'me', '2018-10-03', 'btech', 'NONE', '0', 'krishtyagi277', '2018-10-28 13:11:50'),
(30, 'dbgi', 'fwf', 'anupam', '888', '99', '10', 'PCM', '88', 'me', 'me', '2018-10-11', 'btech', 'NONE', '0', 'krishtyagi277', '2018-10-29 08:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `row_start` int(11) DEFAULT NULL,
  `row_end` int(11) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `Name`, `Username`, `Password`, `Type`, `row_start`, `row_end`, `Created_at`) VALUES
(2, 'admin', 'admin277', '123456', 'admin', NULL, NULL, '2018-10-28 11:20:28'),
(3, 'user', 'user277', '123456', 'user', 4, 5, '2018-10-28 14:47:34'),
(4, 'new2', 'new277', '123456', 'user', 2, 3, '2018-10-29 02:22:47'),
(5, 'prince', 'prince4k', 'NmpsSe', 'user', NULL, NULL, '2018-10-30 02:21:48'),
(6, 'harsh2777', 'harsh266', 'OO4qzI', 'admin', NULL, NULL, '2018-10-30 02:23:30'),
(7, 'fwf', 'krishtyagi277', '7ytF7v', 'user', NULL, NULL, '2018-11-12 02:26:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_record`
--
ALTER TABLE `create_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`,`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_record`
--
ALTER TABLE `create_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

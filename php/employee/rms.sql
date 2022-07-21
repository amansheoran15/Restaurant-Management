-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 06:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `name` varchar(40) NOT NULL,
  `empid` varchar(10) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `salary` bigint(20) UNSIGNED NOT NULL,
  `phone` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `doj` date NOT NULL,
  `availability` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`name`, `empid`, `designation`, `salary`, `phone`, `email`, `doj`, `availability`) VALUES
('SALONI RAI', 's101', 'manager', 10000000, '8887598911', 'RAILALMANI119@GMAIL.COM', '2022-07-14', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Name` varchar(40) NOT NULL,
  `Mobile` char(10) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Count` int(11) NOT NULL,
  `Date` date NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Name`, `Mobile`, `Email`, `Count`, `Date`, `time`) VALUES
('CHANDR SHEKHAR ', '', 'RAILALMANI119@GMAIL.COM', 3, '2022-07-15', 6),
('SALONI RAI ', '', 'RAILALMANI119@GMAIL.COM', 2, '2022-07-17', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`) USING BTREE;

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Name`,`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

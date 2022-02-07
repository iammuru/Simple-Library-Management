-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 11:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bca-library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `accno` varchar(10) NOT NULL,
  `title` varchar(40) NOT NULL,
  `author` varchar(30) NOT NULL,
  `publication` varchar(30) DEFAULT NULL,
  `edition` varchar(15) DEFAULT NULL,
  `pages` int(5) DEFAULT NULL,
  `price` int(6) NOT NULL,
  `copies` int(3) NOT NULL,
  `available` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`accno`, `title`, `author`, `publication`, `edition`, `pages`, `price`, `copies`, `available`) VALUES
('bca01', 'asp', 'ramesh', 'alvas', '3', 67, 55, 10, 'Yes'),
('bca02', 'php', 'murali', 'alvas', '5', 100, 50, 10, 'Yes'),
('bca03', 'python', 'ramesh', 'alvas', '3', 55, 66, 10, 'Yes'),
('bca04', 'cpp', 'priya', 'alvas', '6', 34, 34, 10, 'Yes'),
('bca05', 'DTP', 'vanita', 'alvas', '3', 90, 50, 10, 'Yes'),
('bca06', 'java', 'priya', 'alvas', '5', 216, 100, 10, 'Yes'),
('bca07', 'Hardware', 'ramesh', 'alvas', '6', 150, 100, 9, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `issued`
--

CREATE TABLE `issued` (
  `accno` varchar(10) NOT NULL,
  `borrower` varchar(7) NOT NULL,
  `issuedate` date NOT NULL,
  `tempreturndate` date NOT NULL,
  `returneddate` date DEFAULT NULL,
  `returned` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issued`
--

INSERT INTO `issued` (`accno`, `borrower`, `issuedate`, `tempreturndate`, `returneddate`, `returned`) VALUES
('bca02', 'ca19206', '2022-02-07', '2022-02-22', '2022-02-07', 'Yes'),
('bca03', 'ca19205', '2022-02-07', '2022-02-22', '2022-02-07', 'Yes'),
('bca04', 'ca19256', '2022-02-07', '2022-02-22', '2022-02-07', 'Yes'),
('bca05', 'ca19255', '2022-02-07', '2022-02-22', '2022-02-07', 'Yes'),
('bca07', 'ca19258', '2022-02-07', '2022-02-22', NULL, 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`accno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

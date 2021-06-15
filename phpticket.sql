-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 05:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` int(12) NOT NULL,
  `address` varchar(80) NOT NULL,
  `pin` int(10) NOT NULL,
  `password` varchar(60) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`fname`, `lname`, `email`, `contact_no`, `address`, `pin`, `password`, `id`) VALUES
('csc', 'css', 'joh@gmail.com', 2147483647, 'cscs', 888888, 'John', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fl` text NOT NULL,
  `ll` text NOT NULL,
  `msg` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('open','closed','resolved') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `fl`, `ll`, `msg`, `email`, `created`, `status`) VALUES
(1, 'Test Ticket', '', '', 'This is your first ticket.', 'support@codeshack.io', '2020-06-10 13:06:17', 'open'),
(2, 'hello', '', '', 'Hi My name is prafulla deori', 'hello123@gmail.com', '2021-05-15 22:38:14', 'open'),
(3, 'Prafulla Deori', '', '', 'My ticket is about from dhemaji to silapathar', 'Pro23@gmail.ocm', '2021-05-15 22:43:07', 'open'),
(4, 'Prafulla Deori', 'Dhemaji', '', 'Hi am new to this travel pls refer me a good seat.', 'Pro122@gmail.com', '2021-05-15 23:24:20', 'closed'),
(5, 'John 25', 'Dhemaji', '', 'hi this is john here', 'hellos123@gmail.com', '2021-05-15 23:28:04', 'open'),
(6, 'Manjil deori 25 yrs', 'Narayanpur', 'Dhemaji', 'hell this is manjil', 'manjildeori@gmail.com', '2021-05-15 23:36:13', 'open'),
(7, 'hello', 'dhemaji ', 'dibrugarh', 'hi this is proro', 'pro123@gmail.com', '2021-05-16 19:10:53', 'open'),
(8, 'gambhir', 'Bormuriya', 'Sripani', 'Hii sadkdlm', 'gambhir@gmail.com', '2021-05-16 21:55:10', 'open'),
(9, 'gambhir', 'Bormuriya', 'Sripani', 'Hii sadkdlm', 'gambhir@gmail.com', '2021-05-16 21:56:55', 'open'),
(10, 'klnl', 'hhj', 'jkbjk', 'asc acascc', 'jkbjk22@gmail.com', '2021-05-16 22:03:20', 'open'),
(11, 'pro de', 'sila', 'dhemaji', 'addsfdsf', 'jorhaat@gmail.com', '2021-05-16 22:16:15', 'open'),
(12, 'hhh', 'Silapathar', 'lknlksdn', 'nnnnnnnn', 'nkn@gmail.com', '2021-05-18 13:43:37', 'open'),
(13, 'John Bejbaruah', 'Dhemaji', 'Guwahati', 'Hi john this is your ticket', 'john@gmail.com', '2021-05-18 13:51:35', 'open'),
(14, 'asfs', 'Dhemaji', 'Silapathar', 'asfsa', 'dfsdf@gmail.com', '2021-05-22 12:30:57', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_comments`
--

CREATE TABLE `tickets_comments` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_comments`
--

INSERT INTO `tickets_comments` (`id`, `ticket_id`, `msg`, `created`) VALUES
(1, 1, 'This is a test comment.', '2020-06-10 16:23:39'),
(2, 1, 'hello sir', '2021-05-15 22:44:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_comments`
--
ALTER TABLE `tickets_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tickets_comments`
--
ALTER TABLE `tickets_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

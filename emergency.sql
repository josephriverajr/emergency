-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 05:21 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emergency`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userID` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `houseNo` varchar(25) NOT NULL,
  `building` varchar(25) NOT NULL,
  `street` varchar(25) NOT NULL,
  `barangay` varchar(25) NOT NULL,
  `addressType` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `emailAdd` varchar(25) NOT NULL,
  `phoneNumber` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL,
  `isBlocked` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userID`, `fname`, `lname`, `bday`, `gender`, `houseNo`, `building`, `street`, `barangay`, `addressType`, `city`, `emailAdd`, `phoneNumber`, `username`, `password`, `isAdmin`, `isBlocked`, `active`, `deleted`) VALUES
(1, 'Fname12', 'Lname', '0001-01-01', 'Male', '12', '2313', '1', 'West_Crame', 'Residential', 'San Juan City', 'sdasd@g.com', '         12345678999', 'admin', 'admin', 1, 0, 1, 0),
(2, 'user', 'users', '2019-05-01', 'Male', '2', '2', '2', 'Batis', 'Office', 'San Juan City', 'user@gmail', ' 09211111111', 'user', 'user', 0, 0, 1, 0),
(3, 'a', 'a', '0001-01-01', 'Male', '1', '2313', '1', 'Balong_Bato', 'Office', '', 'sdasd@g.com', '23132132', '2312', '2123', 0, 0, 1, 1),
(4, 'fname', 'lname', '2001-01-10', 'Male', '1', '2313', '1', 'Addition_Hills', 'Residential', 'San Juan City', 'sdasd@g.com', '  23132132', 'admin', '1', 1, 0, 0, 0),
(5, '', 'testhome', '2019-05-15', 'Female', '1', '2313', '1', 'Batis', '', '', 'sdasd@g.com', '06606060606', 'admin1', '1234567891', 0, 0, 0, 1),
(6, '', 'testhome', '2019-05-15', 'Female', '1', '2313', '1', 'Batis', '', '', 'sdasd@g.com', '06606060606', 'admin1', '1234567891', 0, 0, 0, 1),
(7, '', 'testhome', '2019-05-15', 'Female', '1', '2313', '1', 'Batis', '', '', 'sdasd@g.com', '06606060606', 'admin1', '1234567891', 0, 0, 0, 1),
(8, '', 'testhome', '2019-05-15', 'Female', '1', '2313', '1', 'Batis', '', '', 'sdasd@g.com', '06606060606', 'admin1', '1234567891', 0, 0, 0, 1),
(9, '', 'testhome', '2019-05-15', 'Female', '1', '2313', '1', 'Batis', '', '', 'sdasd@g.com', '06606060606', 'admin1', '1234567891', 0, 0, 0, 1),
(10, '', 'testhome', '2019-05-15', 'Female', '1', '2313', '1', 'Batis', '', '', 'sdasd@g.com', '06606060606', 'admin1', '1234567891', 0, 0, 0, 1),
(11, 'test', 'TEST', '0001-01-01', 'Female', '12', '2313', '1', 'Addition_Hills', 'Residential', 'San Juan City', 'sdasd@g.com', '13131313213', 'admin22', '123456789', 0, 0, 1, 0),
(12, 'JOSEPH', 'test', '0001-01-01', 'Male', '12', '2313', '1', 'Addition_Hills', 'Residential', 'San Juan City', 'sdasd@g.com', '  06606060606', 'joseph', 'joseph', 0, 0, 1, 0),
(13, 'First Name', 'Last Name', '2019-05-17', 'Female', 'add', 'add', 'add', 'Tibagan', 'Residential', 'San Juan City', 'sdasd@g.com', '         09050396269', 'responder', 'responder', 2, 0, 1, 0),
(14, 'test', 'add', '2019-05-17', 'Female', 'add', 'add', 'add', 'Tibagan', 'Residential', 'San Juan City', 'sdasd@g.com', '     13333333333', 'admin', 'add', 0, 0, 1, 0),
(15, 'test', 'http://localhost/emergenc', '2019-05-08', 'Female', '231', '1231', '1231', 'St._Joseph', 'Residential', 'San Juan City', 'sdasd@g.com', ' 13333333333', 'admin', '1231231', 0, 0, 1, 0),
(16, 'test1', 'test1', '0001-01-01', 'Male', 'test1', 'test1', 'test1', 'St._Joseph', 'Residential', 'San Juan City', 'sdasd@g.com', '23132132111', 'test1', 'test1', 0, 0, 1, 0),
(17, 'Joseph', 'add', '2019-05-17', 'Female', 'add', 'add', 'add', 'Tibagan', 'Residential', 'San Juan City', 'sdasd@g.com', '  13333333333', 'admin', 'add', 0, 0, 1, 0),
(18, 'Joseph', 'joseph', '0000-00-00', 'Male', '', '', '', '', '', '', 'sdasd@g.com', '09050396269', 'joseph12', 'joseph', 0, 0, 1, 0),
(19, 'j', 'r', '0000-00-00', '', '', '', '', '', '', '', '', '', 'j', 'r', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `name` text NOT NULL,
  `longtitude` text NOT NULL,
  `latitude` text NOT NULL,
  `Phone` text NOT NULL,
  `Time` datetime NOT NULL,
  `type` text NOT NULL,
  `status` int(11) NOT NULL,
  `responding` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `userID`, `name`, `longtitude`, `latitude`, `Phone`, `Time`, `type`, `status`, `responding`) VALUES
(1, 2, 'user users', '', '', ' 09211111111', '2019-05-19 10:31:32', 'ambulance', 0, ''),
(2, 2, 'user users', '', '', ' 09211111111', '2019-05-19 11:08:11', 'traf', 0, ''),
(3, 12, 'JOSEPH test', '', '', '  06606060606', '2019-05-19 11:21:13', 'fire', 0, ''),
(4, 2, 'user users', '', '', ' 09211111111', '2019-05-19 11:31:17', 'traf', 0, ''),
(5, 2, 'user users', '', '', ' 09211111111', '2019-05-19 11:32:04', 'fire', 0, ''),
(6, 2, 'user users', '121.0485487', '14.605544799999997', ' 09211111111', '2019-05-19 19:46:16', 'traf', 0, ''),
(7, 2, 'user users', '121.02336679999999', '14.608468899999998', ' 09211111111', '2019-05-19 19:47:17', 'fire', 1, ''),
(8, 2, 'user users', '121.02336679999999', '14.608468899999998', ' 09211111111', '2019-05-19 19:47:17', 'fire', 1, ''),
(9, 2, 'user users', '121.0485487', '14.605544799999997', ' 09211111111', '2019-05-19 19:59:29', 'ambulance', 1, ''),
(10, 2, 'user users', '121.0485487', '14.605544799999997', ' 09211111111', '2019-05-19 19:59:29', 'ambulance', 1, ''),
(11, 2, 'user users', '121.02994899999997', '14.6045882', ' 09211111111', '2019-05-22 20:47:52', 'ambulance', 1, ''),
(12, 2, 'user users', '121.02994899999997', '14.6045882', ' 09211111111', '2019-05-22 20:48:20', 'police', 1, ''),
(13, 2, 'user users', '121.02994899999997', '14.6045882', ' 09211111111', '2019-05-22 20:48:23', 'fire', 1, ''),
(14, 2, 'user users', '121.02994899999997', '14.6045882', ' 09211111111', '2019-05-22 20:48:25', 'traf', 1, ''),
(15, 2, 'user users', '121.02994899999997', '14.6045882', ' 09211111111', '2019-05-22 20:48:28', 'ambulance', 1, ''),
(16, 2, 'user users', '121.02994899999997', '14.6045882', ' 09211111111', '2019-05-22 20:48:42', 'fire', 1, ''),
(17, 2, 'user users', '121.02994899999997', '14.6045882', ' 09211111111', '2019-05-22 20:50:23', 'fire', 1, ''),
(18, 18, 'Joseph joseph', '121.02225650000001', '14.609053699999997', '09050396269', '2019-05-22 21:13:22', 'traf', 0, ''),
(19, 18, 'Joseph joseph', '121.02225650000001', '14.609053699999997', '09050396269', '2019-05-22 21:13:58', 'traf', 0, ''),
(20, 18, 'Joseph joseph', '121.02225650000001', '14.609053699999997', '09050396269', '2019-05-22 21:17:57', 'fire', 0, ''),
(21, 18, 'Joseph joseph', '121.02225650000001', '14.609053699999997', '09050396269', '2019-05-22 21:18:57', 'fire', 0, ''),
(22, 18, 'Joseph joseph', '121.02225650000001', '14.609053699999997', '09050396269', '2019-05-22 21:18:58', 'fire', 1, ''),
(23, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 21:24:56', 'traf', 1, ''),
(24, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 21:25:54', 'police', 1, ''),
(25, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 21:26:11', 'fire', 1, ''),
(26, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 21:26:29', 'fire', 1, ''),
(27, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 21:27:51', 'fire', 1, ''),
(28, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 21:32:29', 'fire', 1, ''),
(29, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 21:42:42', 'traf', 1, ''),
(30, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 21:47:06', 'traf', 1, ''),
(31, 13, 'First Name Last Name', '121.02225650000001', '14.609053699999997', '         09050396269', '2019-05-22 21:51:56', 'police', 1, ''),
(32, 13, 'First Name Last Name', '121.02225650000001', '14.609053699999997', '         09050396269', '2019-05-22 21:53:40', 'police', 1, ''),
(33, 13, 'First Name Last Name', '121.02225650000001', '14.609053699999997', '         09050396269', '2019-05-22 21:54:53', 'police', 1, ''),
(34, 13, 'First Name Last Name', '121.02225650000001', '14.609053699999997', '         09050396269', '2019-05-22 21:56:01', 'police', 1, ''),
(35, 13, 'First Name Last Name', '121.02225650000001', '14.609053699999997', '         09050396269', '2019-05-22 22:08:29', 'fire', 1, ''),
(36, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 22:27:56', 'fire', 1, ''),
(37, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 22:29:06', 'fire', 1, ''),
(38, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 22:33:54', 'fire', 1, ''),
(39, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 22:35:59', 'police', 1, ''),
(40, 2, 'user users', '121.02994899999997', '14.6045882', ' 09211111111', '2019-05-22 22:37:21', 'police', 1, ''),
(41, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 22:39:48', 'police', 1, ''),
(42, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 22:40:27', 'police', 1, ''),
(43, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 22:43:12', 'police', 1, ''),
(44, 2, 'user users', '121.02225650000001', '14.609053699999997', ' 09211111111', '2019-05-22 22:51:34', 'police', 1, ''),
(45, 2, 'user users', '121.02334169999999', '14.608480900000002', ' 09211111111', '2019-05-24 21:29:06', 'traf', 0, ''),
(46, 2, 'user users', '121.02334710000001', '14.6082402', ' 09211111111', '2019-05-25 08:45:01', 'traf', 1, ''),
(47, 2, 'user users', '121.0233685', '14.6085057', ' 09211111111', '2019-05-25 08:48:21', 'traf', 1, ''),
(48, 2, 'user users', '121.0220544', '14.594048', ' 09211111111', '2019-07-26 22:57:22', 'ambulance', 0, ''),
(49, 13, 'First Name Last Name', '121.02333390000001', '14.608467099999999', '         09050396269', '2019-07-26 23:04:45', 'police', 1, ''),
(50, 13, 'First Name Last Name', '121.02333390000001', '14.608467099999999', '         09050396269', '2019-07-26 23:05:04', 'police', 1, ''),
(51, 2, 'user users', '121.0220544', '14.594048', ' 09211111111', '2019-07-27 00:21:46', 'ambulance', 0, '1'),
(52, 19, 'j r', '121.0220544', '14.594048', '', '2019-07-27 00:26:37', 'traf', 1, '0'),
(53, 19, 'j r', '121.0220544', '14.594048', '', '2019-07-27 00:28:18', 'traf', 1, '0'),
(54, 19, 'j r', '121.0220544', '14.594048', '', '2019-07-27 00:33:01', 'traf', 1, '0'),
(55, 19, 'j r', '121.0220544', '14.594048', '', '2019-07-27 00:35:43', 'traf', 0, '1'),
(56, 13, 'First Name Last Name', '121.0220544', '14.594048', '         09050396269', '2019-07-27 00:36:25', 'traf', 1, '0'),
(57, 13, 'First Name Last Name', '121.0220544', '14.594048', '         09050396269', '2019-07-27 00:42:24', 'traf', 1, '0'),
(58, 13, 'First Name Last Name', '121.0220544', '14.594048', '         09050396269', '2019-07-27 00:42:51', 'traf', 1, '0'),
(59, 13, 'First Name Last Name', '121.0220544', '14.594048', '         09050396269', '2019-07-27 00:44:16', 'traf', 1, '0'),
(60, 13, 'First Name Last Name', '121.0220544', '14.594048', '         09050396269', '2019-07-27 00:44:46', 'traf', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `seen_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstname`, `lastname`, `seen_status`) VALUES
(1, 'user', ' 092111111', 1),
(2, 'user', ' 092111111', 1),
(3, 'user', ' 092111111', 1),
(4, 'user', ' 092111111', 1),
(5, 'user', ' 092111111', 1),
(6, 'user', ' 092111111', 1),
(7, 'user', ' 092111111', 1),
(8, 'user', ' 092111111', 1),
(9, 'user', ' 092111111', 1),
(10, 'user', ' 092111111', 1),
(11, 'user', ' 092111111', 1),
(12, 'user', ' 092111111', 1),
(13, 'user', ' 092111111', 1),
(14, 'First Name', '         0', 1),
(15, 'First Name', '         0', 1),
(16, 'user', ' 092111111', 1),
(17, 'j', '', 1),
(18, 'j', '', 1),
(19, 'j', '', 1),
(20, 'j', '', 1),
(21, 'First Name', '         0', 1),
(22, 'First Name', '         0', 1),
(23, 'First Name', '         0', 1),
(24, 'First Name', '         0', 1),
(25, 'First Name', '         0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

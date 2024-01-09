-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 02:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekelasmengaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `bookingdate` datetime DEFAULT NULL,
  `bookingstatus` int(11) DEFAULT NULL COMMENT '1="Sudah dibayar", 0="Belum dibayar"',
  `studentid` int(11) DEFAULT NULL,
  `classid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `bookingdate`, `bookingstatus`, `studentid`, `classid`) VALUES
(18, '2024-01-08 12:41:24', 0, 1, 1),
(19, '2024-01-08 12:50:02', 0, 1, 1),
(20, '2024-01-08 12:50:28', 0, 1, 1),
(23, '2024-01-08 12:52:14', 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classid` int(11) NOT NULL,
  `classsubject` varchar(255) DEFAULT NULL,
  `classdescription` varchar(255) DEFAULT NULL,
  `classdate` datetime DEFAULT NULL,
  `classquota` varchar(255) DEFAULT NULL,
  `classfee` decimal(11,2) DEFAULT NULL,
  `classlocation` varchar(255) DEFAULT NULL,
  `teacherid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classid`, `classsubject`, `classdescription`, `classdate`, `classquota`, `classfee`, `classlocation`, `teacherid`) VALUES
(1, 'Tajwid', 'Lorem Ipsum', '2024-01-30 12:29:33', '17', '30.00', 'Masjid Padang Nenas', 3),
(3, 'Fardhu Ain', 'Lorem Ipsum', '2024-01-24 12:49:34', '14', '10.00', 'Masjid Chendering', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `paymentdate` datetime DEFAULT NULL,
  `transactionid` int(11) DEFAULT NULL,
  `paymentmethod` varchar(255) DEFAULT NULL,
  `bookingid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(11) NOT NULL,
  `studentname` varchar(255) DEFAULT NULL,
  `studentusername` varchar(255) DEFAULT NULL,
  `studentpassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentname`, `studentusername`, `studentpassword`) VALUES
(1, 'Wan Marzuqi', 'marzuqi', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherid` int(11) NOT NULL,
  `teachername` varchar(255) DEFAULT NULL,
  `teacherphoneno` int(11) DEFAULT NULL,
  `teacheremail` varchar(255) DEFAULT NULL,
  `teacherbank` varchar(255) DEFAULT NULL,
  `teacheraccountno` varchar(255) DEFAULT NULL,
  `teacherusername` varchar(255) DEFAULT NULL,
  `teacherpassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherid`, `teachername`, `teacherphoneno`, `teacheremail`, `teacherbank`, `teacheraccountno`, `teacherusername`, `teacherpassword`) VALUES
(1, 'Haji Mohammad Kamaruddin', 2147483647, 'kamaruddin@jheat.com', NULL, NULL, 'kamaruddin', '12345678'),
(3, 'Haji Mohammad Ismail', 12334342, 'ismail@jheat.com', NULL, NULL, 'ismail', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `classid` (`classid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classid`),
  ADD KEY `teacherid` (`teacherid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `bookingid` (`bookingid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `classid` FOREIGN KEY (`classid`) REFERENCES `class` (`classid`),
  ADD CONSTRAINT `studentid` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `teacherid` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `bookingid` FOREIGN KEY (`bookingid`) REFERENCES `booking` (`bookingid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

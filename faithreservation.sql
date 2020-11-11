-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2019 at 01:21 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faithreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses_tb`
--

CREATE TABLE `courses_tb` (
  `ID` int(11) NOT NULL,
  `courseDesc` varchar(100) NOT NULL,
  `courseDept` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_tb`
--

INSERT INTO `courses_tb` (`ID`, `courseDesc`, `courseDept`, `status`) VALUES
(2, 'College of Education', 'COED', 1),
(3, 'College of Public Safety', 'COPS', 1),
(4, 'College of Psychology', 'COP', 1),
(5, 'College of International Hospitality Management', 'CIHM', 1),
(6, 'College of Nursing', 'CON', 1),
(7, 'College of Computing and Information Technology', 'CCIT', 1),
(10, 'College of Engineering', 'COE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_tb`
--

CREATE TABLE `equipment_tb` (
  `ID` int(11) NOT NULL,
  `equipmentName` varchar(100) NOT NULL,
  `capacity` int(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_tb`
--

INSERT INTO `equipment_tb` (`ID`, `equipmentName`, `capacity`, `status`) VALUES
(1, 'Sound System', 0, 1),
(2, 'Microphone', 66, 1),
(3, 'Monoblock Chairs', 4050, 1),
(4, 'Podium', -4, 1),
(5, 'FAITH Flag', 130, 0),
(6, 'Philippine Flag', 47, 1),
(7, 'Table', 496, 1),
(8, 'Mesh Wire', -180, 1),
(10, 'Laptop Lenovo', 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `message2_tb`
--

CREATE TABLE `message2_tb` (
  `ID` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(100) NOT NULL,
  `dateMessage` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message2_tb`
--

INSERT INTO `message2_tb` (`ID`, `reservation_id`, `message`, `sender`, `dateMessage`) VALUES
(2, 4, 'conflict change venue', 'Joshua Perez - Secretary of OP', '2019-03-28 10:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `message_tb`
--

CREATE TABLE `message_tb` (
  `ID` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(100) NOT NULL,
  `dateMessage` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_tb`
--

INSERT INTO `message_tb` (`ID`, `reservation_id`, `message`, `sender`, `dateMessage`) VALUES
(2, 4, 'Change the venue', 'Alice Lacorte - Dean', '2019-03-28 10:55:22'),
(3, 4, 'conflict daw sa venue', 'Alice Lacorte - Dean', '2019-03-28 10:58:33'),
(8, 4, 'Kulang po tayo ng chairs', 'Marvin Esternon - Secretary of OP', '2019-04-06 08:46:06'),
(9, 7, 'Paltan mo ang event place', 'Mucky Reano - Dean', '2019-04-22 04:50:54'),
(10, 9, 'Capacity', 'Alice Lacorte - Dean', '2019-04-26 01:44:39'),
(11, 31, 'Ben & Ben', 'Alice Lacorte - Dean', '2019-05-06 03:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `reservedate_tb`
--

CREATE TABLE `reservedate_tb` (
  `ID` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `dateEvent` varchar(100) NOT NULL,
  `startTime` varchar(100) NOT NULL,
  `endTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservedate_tb`
--

INSERT INTO `reservedate_tb` (`ID`, `reservation_id`, `dateEvent`, `startTime`, `endTime`) VALUES
(8, 11, '2019-04-31', '10:30', '11:00'),
(9, 11, '2019-05-06', '10:30', '11:00'),
(10, 2, '2019-03-31', '10:00', '10:00'),
(11, 4, '2019-04-17', '10:30', '12:00'),
(12, 4, '2019-04-18', '10:30', '12:00'),
(13, 5, '2019-04-23', '10:30', '10:30'),
(14, 6, '2019-04-30', '08:01', '17:00'),
(15, 6, '2019-05-01', '08:01', '17:00'),
(16, 7, '2019-05-10', '08:00', '08:00'),
(17, 1, '2019-03-29', '06:00', '12:00'),
(18, 8, '2019-05-07', '08:00', '05:00'),
(598, 16, '2019-04-31', '10:00', '10:30'),
(599, 16, '2019-05-01', '10:00', '10:30'),
(600, 28, '2019-04-31', '10:00', '10:30'),
(602, 29, '2019-04-31', '10:30', '10:30'),
(603, 29, '2019-05-01', '10:30', '10:30'),
(604, 3, '2019-03-20', '08:00', '17:00'),
(605, 31, '2019-05-03', '10:00', '10:30'),
(606, 32, '2019-05-03', '10:00', '10:30'),
(616, 33, '2019-06-08', '10:00', '12:30'),
(617, 43, '2019-05-09', '10:00', '10:30'),
(618, 44, '2019-05-09', '10:00', '10:30'),
(619, 45, '2019-05-09', '10:00', '10:30'),
(620, 45, '2019-05-10', '10:00', '10:30'),
(621, 46, '2019-05-23', '10:00', '10:30'),
(622, 47, '2019-06-08', '16:00', '20:00'),
(623, 48, '2019-05-24', '10:00', '10:30'),
(624, 49, '2019-06-09', '10:00', '10:30'),
(625, 50, '2019-05-24', '10:00', '10:30');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_tb`
--

CREATE TABLE `reserve_tb` (
  `ID` int(11) NOT NULL,
  `reserve_id` int(11) NOT NULL,
  `employeeNo` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `purpose` varchar(999) NOT NULL,
  `department` varchar(50) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `participant` int(99) NOT NULL,
  `item` varchar(100) NOT NULL,
  `itemCapacity` varchar(100) NOT NULL,
  `detailRequest` text NOT NULL,
  `status` int(11) NOT NULL,
  `dateApprove` date DEFAULT NULL,
  `timeApprove` time DEFAULT NULL,
  `dateTimeFile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve_tb`
--

INSERT INTO `reserve_tb` (`ID`, `reserve_id`, `employeeNo`, `firstName`, `lastName`, `purpose`, `department`, `venue`, `participant`, `item`, `itemCapacity`, `detailRequest`, `status`, `dateApprove`, `timeApprove`, `dateTimeFile`) VALUES
(3, 1, 'E2014101111', 'Pauline', 'Gutierrez', 'iSITE', 'CCIT', '3rd Floor Conference Room, Covered Court', 300, 'FAITH Flag, Mesh Wire', '2,10', 'For innovation', 2, '2019-03-28', '06:47:28', '2019-04-30 06:46:16'),
(4, 2, 'E2014101111', 'Pauline', 'Gutierrez', 'iSITE', 'CCIT', '3rd Floor Conference Room', 230, 'FAITH Flag', '1', 'For innovation', 2, '2019-03-30', '03:52:22', '2019-04-30 06:46:19'),
(5, 3, 'E2014101111', 'Pauline', 'Gutierrez', 'Christmas Party', 'CCIT', '2nd Floor Conference Room', 120, 'FAITH Flag', '1', 'Events Listener', 2, '2019-05-02', '09:12:55', '2019-05-02 09:12:55'),
(6, 4, 'E2014102345', 'Marco', 'Manansala', 'Christmas Party', 'COED', '2nd Floor Conference Room, 3rd Floor Conference Room', 350, 'FAITH Flag, Mesh Wire', '20,11', 'For all College of Education', 2, '2019-04-16', '01:26:19', '2019-04-30 01:33:07'),
(7, 5, 'E2014101234', 'Marvin', 'Esternon', 'Graduation', 'COE', 'Covered Court', 3500, 'Mesh Wire, Podium', '50,5', 'Baccaluarate Mass', 2, '2019-04-22', '12:52:02', '2019-04-30 01:33:10'),
(8, 6, 'E2014101234', 'Marvin', 'Esternon', 'Meeting ', 'COE', 'Makiling A', 30, 'FAITH Flag, Microphone, Monoblock Chairs, Philippine Flag, Podium, Sound System, Table', '1,3,30,1,1,1,2', 'please put plants on the side of the room', 2, '2019-04-30', '06:21:15', '2019-04-30 06:21:15'),
(9, 7, 'E2014101111', 'Pauline', 'Gutierrez', 'Film fest', 'CCIT', 'Covered Court', 120, 'Microphone, Monoblock Chairs, Philippine Flag, Podium, Sound System', '2,120,1,1,1', 'Film fest', 2, '2019-04-26', '09:47:49', '2019-05-06 07:05:29'),
(10, 8, 'E2014101111', 'Pauline', 'Gutierrez', 'Camping', 'CCIT', 'Multi-Purpose Hall', 120, 'Monoblock Chairs', '120', 'Camping', 2, '2019-04-30', '05:53:11', '2019-04-30 06:22:12'),
(15, 11, 'E2014101234', 'Marvin', 'Esternon', 'Christmas Party', 'COE', '3rd Floor Conference Room', 120, 'Mesh Wire, Microphone', '2,3', 'Events Listener', 2, '2019-04-30', '06:23:35', '2019-04-30 06:23:35'),
(27, 16, 'E2014101234', 'Marvin', 'Esternon', 'Christmas Party', 'COE', 'Garden House', 150, 'Philippine Flag', '1', 'Events Listener', 0, NULL, NULL, '2019-04-30 05:18:55'),
(28, 28, 'E2014101111', 'Pauline', 'Gutierrez', 'Christmas Party', 'CCIT', 'Garden House, ISAAC, Makiling A', 150, 'Philippine Flag', '50', 'Events Listener', 2, '2019-05-06', '07:09:41', '2019-05-06 07:09:41'),
(30, 29, 'E2014101111', 'Pauline', 'Gutierrez', 'Christmas Party', 'CCIT', 'Garden House', 120, 'Microphone', '10', 'Events Listener', 2, '2019-04-30', '06:32:23', '2019-04-30 06:36:16'),
(31, 31, 'E2014101111', 'Pauline', 'Gutierrez', 'Career Quest', 'CCIT', 'Garden House', 120, 'Microphone', '21', 'Employment', 0, NULL, NULL, '2019-05-03 13:43:52'),
(32, 32, 'E2014101111', 'Pauline', 'Gutierrez', 'Christmas Party', 'CCIT', 'Taal A', 120, 'Podium', '21', 'asd', 0, NULL, NULL, '2019-05-03 13:55:10'),
(42, 33, 'E2014101234', 'Marvin', 'Esternon', 'Graduation', 'COE', 'Covered Court, ISAAC', 3500, 'Mesh Wire, Philippine Flag, Sound System', '2000,1,5', 'Graduation Batch 2018-2019', 2, '2019-05-06', '07:10:29', '2019-05-06 07:10:29'),
(43, 43, 'E2014101111', 'Pauline', 'Gutierrez', 'Camping', 'CCIT', 'Garden House', 107, 'Microphone', '91', 'Camping', 2, '2019-05-08', '11:04:35', '2019-05-08 06:28:48'),
(44, 44, 'E2014101111', 'Pauline', 'Gutierrez', 'Christmas Party', 'CCIT', 'Garden House', 107, 'Microphone', '30', 'For innovation', 0, NULL, NULL, '2019-05-07 17:34:09'),
(45, 45, 'E2014101111', 'Pauline', 'Gutierrez', 'Camping', 'CCIT', 'Taal A, Garden House, Space ship', 107, 'Mesh Wire, Microphone', '100,10', 'When nature meets technology', 2, '2019-05-18', '07:24:13', '2019-05-08 07:32:57'),
(46, 46, 'E2014101234', 'Marvin', 'Esternon', 'Christmas Party', 'COE', 'Garden House', 100, 'Mesh Wire', '20', 'Events Listener', 0, NULL, NULL, '2019-05-20 02:21:05'),
(47, 47, 'E2014101111', 'Pauline', 'Gutierrez', 'TS Graduation ', 'CCIT', 'Covered Court', 350, 'Microphone, Monoblock Chairs, Philippine Flag, Podium, Sound System, Table', '2,350,1,2,1,4', 'The program start at 4pm', 2, '2019-05-20', '02:50:52', '2019-05-20 02:48:24'),
(48, 48, 'E2014101111', 'Pauline', 'Gutierrez', 'Christmas Party', 'CCIT', 'Garden House', 120, 'Monoblock Chairs, Philippine Flag', '150,1', 'For innovation', 2, '2019-05-23', '02:09:32', '2019-05-23 02:08:41'),
(49, 49, 'E2014101111', 'Pauline', 'Gutierrez', 'Graduation', 'CCIT', 'Multi-Purpose Hall', 150, 'Microphone, Monoblock Chairs, Philippine Flag, Sound System', '2,450,1,9', 'Graduation Batch 2018-2019', 2, '2019-05-23', '03:18:40', '2019-05-23 03:17:22'),
(50, 50, 'E2014101111', 'Pauline', 'Gutierrez', 'Christmas Party', 'CCIT', 'Multi-Purpose Hall', 150, 'Podium', '17', 'Events Listener', 2, '2019-05-23', '03:22:54', '2019-05-23 03:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `ID` int(11) NOT NULL,
  `employeeNo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `loginStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`ID`, `employeeNo`, `password`, `role`, `status`, `loginStatus`) VALUES
(1, 'ben10nnyson', '12345', 'Secretary of OP', 1, 1),
(2, 'jjshprz', '12345', 'Secretary of OP', 1, 1),
(24, 'E2014101234', '123456', 'Secretary', 1, 1),
(25, 'E2015101234', 'COED1234', 'Secretary', 1, 0),
(26, 'E2014102345', '123456', 'Dean', 1, 1),
(27, 'E2015105652', '123456', 'Dean', 1, 1),
(28, 'E2014102222', '123456', 'Dean', 1, 1),
(29, 'E2014101111', '123456', 'Secretary', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info_tb`
--

CREATE TABLE `user_info_tb` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `employeeNo` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info_tb`
--

INSERT INTO `user_info_tb` (`ID`, `firstName`, `lastName`, `employeeNo`, `department`, `profilePic`) VALUES
(1, 'Marvin', 'Esternon', 'ben10nnyson', 'Secretary of OP', 'S2014106916.jpg'),
(2, 'Joshua', 'Perez', 'jjshprz', 'Secretary of OP', 'FAITH-at-18.jpg'),
(24, 'Marvin', 'Esternon', 'E2014101234', 'COE', '3.jpg'),
(25, 'Andrea', 'Montes', 'E2015101234', 'COED', '32349920_366909293797533_7956048486271549440_n.jpg'),
(26, 'Marco', 'Manansala', 'E2014102345', 'COED', '46895029_185691765708754_2571749566994972672_n.jpg'),
(27, 'Alfredo', 'Reodica', 'E2015105652', 'COE', 'frozen-etiquetas9.jpg'),
(28, 'Alice', 'Lacorte', 'E2014102222', 'CCIT', 'deanAlice.jpg'),
(29, 'Pauline', 'Gutierrez', 'E2014101111', 'CCIT', 'pau.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `venue_tb`
--

CREATE TABLE `venue_tb` (
  `ID` int(11) NOT NULL,
  `nameVenue` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue_tb`
--

INSERT INTO `venue_tb` (`ID`, `nameVenue`, `capacity`, `status`) VALUES
(1, 'Covered Court', '1500', 1),
(2, 'ISAAC', '1500', 1),
(3, 'Multi-Purpose Hall', '200', 1),
(4, '2nd Floor Conference Room', '40', 0),
(5, '3rd Floor Conference Room', '30', 1),
(6, 'Makiling A', '30', 1),
(7, 'Makiling B', '20', 1),
(8, 'Taal A', '120', 1),
(9, 'Taal B', '120', 0),
(10, 'Garden House', '150', 1),
(11, 'Gallery', '100', 1),
(13, 'Food Court', '100', 1),
(14, 'Space ship', '150', 1),
(15, 'NU SPACE', '4500', 0),
(16, 'NSC Bit Space Room 101 1st floor', '45', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses_tb`
--
ALTER TABLE `courses_tb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `equipment_tb`
--
ALTER TABLE `equipment_tb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message2_tb`
--
ALTER TABLE `message2_tb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message_tb`
--
ALTER TABLE `message_tb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reservedate_tb`
--
ALTER TABLE `reservedate_tb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reserve_tb`
--
ALTER TABLE `reserve_tb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_info_tb`
--
ALTER TABLE `user_info_tb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `venue_tb`
--
ALTER TABLE `venue_tb`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses_tb`
--
ALTER TABLE `courses_tb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `equipment_tb`
--
ALTER TABLE `equipment_tb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `message2_tb`
--
ALTER TABLE `message2_tb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_tb`
--
ALTER TABLE `message_tb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservedate_tb`
--
ALTER TABLE `reservedate_tb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=626;

--
-- AUTO_INCREMENT for table `reserve_tb`
--
ALTER TABLE `reserve_tb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_info_tb`
--
ALTER TABLE `user_info_tb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `venue_tb`
--
ALTER TABLE `venue_tb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

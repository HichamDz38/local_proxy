-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2020 at 08:53 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `network_limiter1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(10) NOT NULL,
  `FName` varchar(35) NOT NULL,
  `LName` varchar(35) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Password` varchar(35) NOT NULL,
  `User_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Id`, `FName`, `LName`, `Email`, `Password`, `User_Name`) VALUES
(1, 'Mohamed', 'Mohsen', 'Mohamed@gmail.com', '63a9f0ea7bb98050796b649e85481845', 'Mohamed');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `MAC_address` varchar(17) NOT NULL,
  `Device_status` tinyint(1) DEFAULT '1',
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_name` varchar(20) NOT NULL,
  `actual_data` int(11) DEFAULT '0',
  `consumed_data` int(11) DEFAULT '0',
  `today_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`MAC_address`, `Device_status`, `id`, `user_id`, `device_name`, `actual_data`, `consumed_data`, `today_date`) VALUES
('fffff', 0, 5, 9, 'ffffff', 0, 0, '2020-05-08'),
('dddd', 1, 6, 9, 'ddddddd', 0, 0, '2020-05-08'),
('c8:d5:fe:86:51:42', 0, 7, 9, 'HP_Elite_book', 75040072, 11771264, '2020-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `Session_Id` int(10) NOT NULL,
  `Start` timestamp NULL DEFAULT NULL,
  `End` timestamp NULL DEFAULT NULL,
  `Consumed_data` double NOT NULL,
  `device_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(10) NOT NULL,
  `User_FName` varchar(35) DEFAULT NULL,
  `User_LName` varchar(35) DEFAULT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(35) NOT NULL,
  `User_Type` int(1) DEFAULT '0',
  `Daily_Limit` int(3) DEFAULT '0',
  `User_Status` tinyint(1) DEFAULT '0',
  `Limit_Type` tinyint(1) DEFAULT '0',
  `Internet_status` tinyint(1) DEFAULT '1',
  `User_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `User_FName`, `User_LName`, `Email`, `Password`, `User_Type`, `Daily_Limit`, `User_Status`, `Limit_Type`, `Internet_status`, `User_Name`) VALUES
(7, 'hicham', NULL, 'hicham@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 1024000, 1, 0, 1, '0'),
(9, 'ddfddddd', 'ggggggggggggggg', 'hicham@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 1024000, 1, 0, 1, 'hicham');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`),
  ADD UNIQUE KEY `FName` (`FName`),
  ADD UNIQUE KEY `FName_2` (`FName`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `MAC_address` (`MAC_address`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`Session_Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `user_name` (`User_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `Session_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`User_Id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

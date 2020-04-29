-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 02:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `Password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Id`, `FName`, `LName`, `Email`, `Password`) VALUES
(1, 'root', 'toor', 'root.network.limiter@outlook.com', 'toor');

-- --------------------------------------------------------

--
-- Table structure for table `devices_and_machines`
--

CREATE TABLE `devices_and_machines` (
  `MAC_address` varchar(35) NOT NULL,
  `Device_status` varchar(15) NOT NULL,
  `User_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration_requests`
--

CREATE TABLE `registration_requests` (
  `Type` varchar(16) NOT NULL,
  `Request_status` varchar(8) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Requester` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `Session_Id` int(10) NOT NULL,
  `Start` datetime NOT NULL,
  `End` datetime NOT NULL,
  `User_Id` int(10) NOT NULL,
  `MAC_address` varchar(35) NOT NULL,
  `Consumed_data` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(10) NOT NULL,
  `User_FName` varchar(35) NOT NULL,
  `User_LName` varchar(35) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(35) NOT NULL,
  `User_Type` varchar(8) NOT NULL,
  `Daily_Limit` int(3) NOT NULL,
  `User_status` varchar(15) NOT NULL,
  `Limit_Type` varchar(10) NOT NULL,
  `Internet_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `User_FName`, `User_LName`, `Email`, `Password`, `User_Type`, `Daily_Limit`, `User_status`, `Limit_Type`, `Internet_status`) VALUES
(1, 'Mohammad', 'Hizam', 'M_Hizam@iau.edu.sa', '112233112233', 'User', 120, 'Active', 'Time', ''),
(2, 'Mohsen', 'Qasim', 'M_Ghazwani@iau.edu.sa', 'Mohsen123', 'User', 720, 'Active', 'Data', ''),
(3, 'Mohammad', 'Salem', 'M_Gumaan@iau.edu.sa', 'MSalem2020', 'User', 500, 'Active', 'Time', ''),
(4, 'Hamad', 'Faris', 'H_Alsagour@iau.edu.sa', 'BuFaris1478', 'User', 400, 'Blocked', 'Time', ''),
(5, 'Mohammad', 'Abdulkarim', 'M_Mahyoub@iau.edu.sa', 'Joker1995', 'User', 350, 'Blocked', 'Data', ''),
(6, 'Mohsen', 'Ghazwani', 'mohsen@iau.edu.sa', '112233', 'User', 60, 'Blocked', 'Time', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `devices_and_machines`
--
ALTER TABLE `devices_and_machines`
  ADD PRIMARY KEY (`MAC_address`),
  ADD KEY `User_Id` (`User_Id`) USING BTREE;

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`Session_Id`),
  ADD KEY `Admin_Id` (`User_Id`),
  ADD KEY `MAC_address` (`MAC_address`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices_and_machines`
--
ALTER TABLE `devices_and_machines`
  MODIFY `User_Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devices_and_machines`
--
ALTER TABLE `devices_and_machines`
  ADD CONSTRAINT `devices_and_machines_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `admin` (`Admin_Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`MAC_address`) REFERENCES `devices_and_machines` (`MAC_address`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

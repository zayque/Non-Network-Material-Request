-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 03:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nnmr`
--

-- --------------------------------------------------------

--
-- Table structure for table `nnmr_login`
--

CREATE TABLE `nnmr_login` (
  `sys_id` int(100) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nnmr_login`
--

INSERT INTO `nnmr_login` (`sys_id`, `staff_id`, `name`, `role`) VALUES
(1, 'Ilyana', 'Ilyana Norzali', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `nnmr_user_ttg`
--

CREATE TABLE `nnmr_user_ttg` (
  `refno` int(100) NOT NULL,
  `date/time` datetime NOT NULL,
  `req_name` varchar(30) NOT NULL,
  `rec_div` varchar(30) NOT NULL,
  `ttg_type` varchar(30) NOT NULL,
  `ttg_item` varchar(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `justification` varchar(100) NOT NULL,
  `att1` varchar(100) NOT NULL,
  `att2` varchar(100) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `fulfill_date` date NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `att3` varchar(100) NOT NULL,
  `aging` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nnmr_user_vehicle`
--

CREATE TABLE `nnmr_user_vehicle` (
  `refno` int(100) NOT NULL,
  `date/time` datetime NOT NULL,
  `req_name` varchar(30) NOT NULL,
  `rec_div` varchar(30) NOT NULL,
  `v_type` varchar(30) NOT NULL,
  `v_model` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `justification` varchar(500) NOT NULL,
  `att1` varchar(500) NOT NULL,
  `att2` varchar(500) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `fulfill_date` date NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `att3` varchar(100) NOT NULL,
  `aging` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nnmr_login`
--
ALTER TABLE `nnmr_login`
  ADD PRIMARY KEY (`sys_id`);

--
-- Indexes for table `nnmr_user_ttg`
--
ALTER TABLE `nnmr_user_ttg`
  ADD PRIMARY KEY (`refno`);

--
-- Indexes for table `nnmr_user_vehicle`
--
ALTER TABLE `nnmr_user_vehicle`
  ADD PRIMARY KEY (`refno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nnmr_login`
--
ALTER TABLE `nnmr_login`
  MODIFY `sys_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nnmr_user_ttg`
--
ALTER TABLE `nnmr_user_ttg`
  MODIFY `refno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `nnmr_user_vehicle`
--
ALTER TABLE `nnmr_user_vehicle`
  MODIFY `refno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

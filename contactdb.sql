-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 11:43 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contactdb`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `qmeet`
-- (See below for the actual view)
--
CREATE TABLE `qmeet` (
);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(50) UNSIGNED NOT NULL,
  `KhmerName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `EnglishName` varchar(100) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Deadline` date NOT NULL,
  `Other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `KhmerName`, `EnglishName`, `Position`, `Phone`, `Email`, `Address`, `Deadline`, `Other`) VALUES
(243, 'John Aaron', 'Gisala', 'Consultant', '09774956493', 'gisalaaron@gmail.com', 'ABC compant', '2018-01-14', 'Hydro power11'),
(244, 'Riejohn', 'Torres', 'Representative', '09882727272', 'testemail@gmail.com', 'BCD company', '2018-01-17', 'Hydro power'),
(245, 'Test', 'tasd', 'dasd', '3112', 'safas', '', '2018-02-04', 'asdas');

-- --------------------------------------------------------

--
-- Structure for view `qmeet`
--
DROP TABLE IF EXISTS `qmeet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qmeet`  AS  select `tblcontact`.`id` AS `id`,`tblcontact`.`KhmerName` AS `KhmerName`,`tblcontact`.`EnglishName` AS `EnglishName`,`tblcontact`.`Position` AS `Position`,`tblcontact`.`Phone` AS `Phone`,`tblcontact`.`Email` AS `Email`,`tblcontact`.`Address` AS `Address`,`tblcontact`.`Deadline` AS `Deadline`,`tblcontact`.`Other` AS `Other`,`tblcontact`.`Action` AS `Action`,(to_days(`tblcontact`.`Deadline`) - to_days(curdate())) AS `datemeet` from `tblcontact` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

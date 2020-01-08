-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 02:43 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `palm7`
--

-- --------------------------------------------------------

--
-- Table structure for table `log-planting`
--

CREATE TABLE `log-planting` (
  `ID` int(11) NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `Modify` int(11) NOT NULL,
  `LOGloginID` int(11) NOT NULL,
  `DIMdateID` int(11) NOT NULL,
  `DIMownerID` int(11) NOT NULL,
  `DIMfarmID` int(11) NOT NULL,
  `DIMsubFID` int(11) NOT NULL,
  `NumGrowth1` int(11) DEFAULT NULL,
  `NumGrowth2` int(11) DEFAULT NULL,
  `NumDead` int(11) DEFAULT NULL,
  `PICs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log-planting`
--

INSERT INTO `log-planting` (`ID`, `isDelete`, `Modify`, `LOGloginID`, `DIMdateID`, `DIMownerID`, `DIMfarmID`, `DIMsubFID`, `NumGrowth1`, `NumGrowth2`, `NumDead`, `PICs`) VALUES
(1, 0, 1576589423, 68, 16, 1, 1, 5, 100, 50, 50, 'pic.jpg'),
(2, 0, 1576589423, 68, 16, 1, 1, 6, 150, 50, 50, 'pic.jpg'),
(3, 0, 1576589423, 68, 16, 1, 1, 7, 100, 30, 50, 'pic.jpg'),
(4, 0, 1576589423, 5, 16, 5, 3, 12, 100, 50, 50, 'pic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log-planting`
--
ALTER TABLE `log-planting`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Modify` (`Modify`,`DIMownerID`,`DIMfarmID`,`DIMsubFID`),
  ADD KEY `NumGrowth1` (`NumGrowth1`),
  ADD KEY `NumGrowth2` (`NumGrowth2`),
  ADD KEY `NumDead` (`NumDead`),
  ADD KEY `LOGloginID` (`LOGloginID`),
  ADD KEY `DIMdateID` (`DIMdateID`),
  ADD KEY `DIMownerID` (`DIMownerID`),
  ADD KEY `DIMfarmID` (`DIMfarmID`),
  ADD KEY `DIMsubFID` (`DIMsubFID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log-planting`
--
ALTER TABLE `log-planting`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

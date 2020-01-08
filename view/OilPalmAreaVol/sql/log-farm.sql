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
-- Table structure for table `log-farm`
--

CREATE TABLE `log-farm` (
  `ID` int(11) NOT NULL,
  `LOGloginID` int(11) NOT NULL,
  `StartT` int(11) NOT NULL,
  `StartID` int(11) NOT NULL,
  `EndT` int(11) DEFAULT NULL,
  `EndID` int(11) DEFAULT NULL,
  `DIMownerID` int(11) NOT NULL,
  `DIMfarmID` int(11) NOT NULL,
  `DIMSubfID` int(11) NOT NULL,
  `DIMaddrID` int(11) NOT NULL,
  `IsCoordinate` tinyint(1) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `NumSubFarm` int(11) NOT NULL,
  `NumTree` int(11) NOT NULL,
  `AreaRai` int(11) NOT NULL,
  `AreaNgan` int(11) NOT NULL,
  `AreaWa` int(11) NOT NULL,
  `AreaTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log-farm`
--

INSERT INTO `log-farm` (`ID`, `LOGloginID`, `StartT`, `StartID`, `EndT`, `EndID`, `DIMownerID`, `DIMfarmID`, `DIMSubfID`, `DIMaddrID`, `IsCoordinate`, `Latitude`, `Longitude`, `NumSubFarm`, `NumTree`, `AreaRai`, `AreaNgan`, `AreaWa`, `AreaTotal`) VALUES
(1, 68, 1576589423, 16, 1576590807, 16, 1, 1, 5, 1, 1, 12.8155, 101.491, 3, 100, 5, 2, 0, 2200),
(2, 68, 1576589423, 16, 1576590807, 16, 1, 1, 6, 1, 1, 12.8155, 101.491, 3, 100, 3, 1, 0, 1300),
(3, 68, 1576589423, 16, 1576589423, 16, 1, 1, 7, 1, 1, 12.8155, 101.491, 3, 150, 4, 2, 0, 1899),
(4, 5, 1576589423, 16, 1576589423, 16, 5, 3, 12, 1, 1, 13.758, 100.348, 1, 50, 5, 2, 0, 4200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log-farm`
--
ALTER TABLE `log-farm`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `StartT` (`StartT`,`EndT`,`DIMownerID`,`DIMfarmID`,`DIMSubfID`,`DIMaddrID`),
  ADD KEY `Latitude` (`Latitude`),
  ADD KEY `Longitude` (`Longitude`),
  ADD KEY `NumSubFarm` (`NumSubFarm`),
  ADD KEY `NumTree` (`NumTree`),
  ADD KEY `AreaRai` (`AreaRai`),
  ADD KEY `AreaNgan` (`AreaNgan`),
  ADD KEY `AreaWa` (`AreaWa`),
  ADD KEY `AreaTotal` (`AreaTotal`),
  ADD KEY `LOGloginID` (`LOGloginID`),
  ADD KEY `StartID` (`StartID`),
  ADD KEY `EndID` (`EndID`),
  ADD KEY `DIMownerID` (`DIMownerID`),
  ADD KEY `DIMfarmID` (`DIMfarmID`),
  ADD KEY `DIMSubfID` (`DIMSubfID`),
  ADD KEY `DIMaddrID` (`DIMaddrID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log-farm`
--
ALTER TABLE `log-farm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log-farm`
--
ALTER TABLE `log-farm`
  ADD CONSTRAINT `log-farm_ibfk_1` FOREIGN KEY (`LOGloginID`) REFERENCES `log-login` (`ID`),
  ADD CONSTRAINT `log-farm_ibfk_2` FOREIGN KEY (`StartID`) REFERENCES `dim-time` (`ID`),
  ADD CONSTRAINT `log-farm_ibfk_3` FOREIGN KEY (`EndID`) REFERENCES `dim-time` (`ID`),
  ADD CONSTRAINT `log-farm_ibfk_4` FOREIGN KEY (`DIMownerID`) REFERENCES `dim-user` (`ID`),
  ADD CONSTRAINT `log-farm_ibfk_5` FOREIGN KEY (`DIMfarmID`) REFERENCES `dim-farm` (`ID`),
  ADD CONSTRAINT `log-farm_ibfk_6` FOREIGN KEY (`DIMSubfID`) REFERENCES `dim-farm` (`ID`),
  ADD CONSTRAINT `log-farm_ibfk_7` FOREIGN KEY (`DIMaddrID`) REFERENCES `dim-address` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

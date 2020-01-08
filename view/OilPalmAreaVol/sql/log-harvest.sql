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
-- Table structure for table `log-harvest`
--

CREATE TABLE `log-harvest` (
  `ID` int(11) NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `GuessFrom` int(11) DEFAULT NULL,
  `Modify` int(12) NOT NULL,
  `LOGloginID` int(11) NOT NULL,
  `DIMdateID` int(11) NOT NULL,
  `DIMownerID` int(11) NOT NULL,
  `DIMfarmID` int(11) NOT NULL,
  `DIMsubFID` int(11) NOT NULL,
  `Weight` float NOT NULL DEFAULT 0,
  `UnitPrice` float NOT NULL DEFAULT 0,
  `TotalPrice` float NOT NULL DEFAULT 0,
  `PICs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log-harvest`
--

INSERT INTO `log-harvest` (`ID`, `isDelete`, `GuessFrom`, `Modify`, `LOGloginID`, `DIMdateID`, `DIMownerID`, `DIMfarmID`, `DIMsubFID`, `Weight`, `UnitPrice`, `TotalPrice`, `PICs`) VALUES
(7, 0, NULL, 1576589423, 68, 16, 1, 1, 5, 50, 10, 500, 'cmaso'),
(9, 0, NULL, 1576589423, 68, 16, 1, 1, 6, 70, 10, 700, 'cmaso'),
(10, 0, NULL, 1576589423, 68, 16, 1, 1, 7, 30, 10, 300, 'cmaso'),
(11, 0, NULL, 975801601, 132, 4, 100, 1, 1, 10, 10, 10, 'cmaso'),
(12, 0, NULL, 887155200, 132, 4, 17, 1, 1, 10, 10, 10, 'cmaso');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log-harvest`
--
ALTER TABLE `log-harvest`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Modify` (`Modify`,`DIMownerID`,`DIMfarmID`,`DIMsubFID`),
  ADD KEY `Weight` (`Weight`),
  ADD KEY `UnitPrice` (`UnitPrice`),
  ADD KEY `TotalPrice` (`TotalPrice`),
  ADD KEY `LOGloginID` (`LOGloginID`),
  ADD KEY `DIMdateID` (`DIMdateID`),
  ADD KEY `DIMownerID` (`DIMownerID`),
  ADD KEY `DIMfarmID` (`DIMfarmID`),
  ADD KEY `DIMsubFID` (`DIMsubFID`),
  ADD KEY `GuessFrom` (`GuessFrom`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log-harvest`
--
ALTER TABLE `log-harvest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

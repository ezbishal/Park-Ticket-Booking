-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 11:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin'),
(2, 'David', 'Ross', 'davidross@admin.com', 'davidross');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `houseNo` int(11) NOT NULL,
  `streetName` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postCode` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `firstName`, `lastName`, `phone`, `houseNo`, `streetName`, `city`, `postCode`, `email`, `password`, `photo`) VALUES
(1, 'David', 'Hume', '07700 900964', 9637, 'Grove Road', 'Oldham', 'OL30 9YV', 'davidhume@gmail.com', 'davidhume', ''),
(2, 'Naomi', 'Watts', '07700 900145', 50, 'George Street', 'Guildford', 'GU1 4SJ', 'naomiwatts@gmail.com', 'naomiwatts', ''),
(3, 'Marcus', 'Rashford', '07700', 42, 'Windsor', 'Torquay', 'TQ62', 'marcusrashford@gmail.com', 'marcusrashford', '');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventId` int(11) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `adultNeeded` enum('Yes','No') NOT NULL,
  `seatsAvailable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventId`, `eventName`, `adultNeeded`, `seatsAvailable`) VALUES
(1, 'Movie Screening', 'No', 50),
(2, 'Treasure Hunt', 'Yes', 50),
(3, 'Santa Meet and Greet', 'No', 50);

-- --------------------------------------------------------

--
-- Table structure for table `eventsale`
--

CREATE TABLE `eventsale` (
  `eventSaleId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `noOfAdults` int(11) NOT NULL,
  `noOfChildren` int(11) NOT NULL,
  `seatWithTable` enum('Yes','No') NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventsale`
--

INSERT INTO `eventsale` (`eventSaleId`, `customerId`, `eventId`, `noOfAdults`, `noOfChildren`, `seatWithTable`, `totalPrice`) VALUES
(1, 1, 1, 2, 3, 'Yes', 75),
(2, 2, 2, 2, 3, 'No', 75),
(3, 3, 3, 1, 1, 'No', 10);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `eventId` int(11) NOT NULL,
  `priceWithTable` int(11) NOT NULL,
  `priceWithoutTable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`eventId`, `priceWithTable`, `priceWithoutTable`) VALUES
(1, 15, 10),
(2, 20, 15),
(3, 10, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `eventsale`
--
ALTER TABLE `eventsale`
  ADD PRIMARY KEY (`eventSaleId`),
  ADD KEY `eventId` (`eventId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD KEY `eventId` (`eventId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eventsale`
--
ALTER TABLE `eventsale`
  MODIFY `eventSaleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventsale`
--
ALTER TABLE `eventsale`
  ADD CONSTRAINT `eventsale_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `event` (`eventId`),
  ADD CONSTRAINT `eventsale_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`);

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `event` (`eventId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

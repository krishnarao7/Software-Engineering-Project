-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 04:51 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE IF NOT EXISTS `bids` (
  `BId` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  `SPId` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`BId`),
  KEY `FK_Bids_Post` (`Pid`),
  KEY `SPId` (`SPId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CId` int(11) NOT NULL AUTO_INCREMENT,
  `CName` varchar(50) NOT NULL,
  `CPhone` varchar(10) NOT NULL,
  `CAddress` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `CPhoto` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`CId`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CId`, `CName`, `CPhone`, `CAddress`, `Email`, `Password`, `CPhoto`, `role_id`) VALUES
(1, 'Vishal Kinjavdekar', '1234567890', 'Marcel Goa', 'vishalkin@gmail.com', 'vishal123', 'base_url()uploads/avtar.jpg', 1),
(2, 'Nitesh Sawant', '929832', 'Valpoi - Goa', 'niteshsawant023@gmail.com', '12345', NULL, 1),
(3, 'Priya Lotlikar', '9890493', 'assonora, bardez,goa.', 'lotlikarpriya@gmail.com', 'priya123', NULL, 1),
(4, 'Vinaya K', '112288', 'Goa', 'vin@g.com', 'vinaya', NULL, 1),
(5, 'ddddddddddd', '34565678', 'ajkhxkjbvnbnvb', 'gggg@gmail.com', '445556', NULL, 1),
(6, 'Pratiksha', '7890654321', 'dkkdkdd', 'shet.pratiksha@gmail.com', 'pratiksha', NULL, 1),
(7, 'Pratiksha', '8789073636', 'cl;k;lckc', 'shet.prati@gmail.com', 'prati123', NULL, 1),
(8, 'sank', '567890', 'm,smv', 'sank@gmail.com', 'sank', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gives`
--

CREATE TABLE IF NOT EXISTS `gives` (
  `GId` int(11) NOT NULL AUTO_INCREMENT,
  `SId` int(11) NOT NULL,
  `SPId` int(11) NOT NULL,
  PRIMARY KEY (`GId`),
  KEY `FK_Gives_Service` (`SId`),
  KEY `FK_Gives_ServiceProvider` (`SPId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gives`
--

INSERT INTO `gives` (`GId`, `SId`, `SPId`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 2, 1),
(4, 2, 2),
(5, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `PId` int(11) NOT NULL AUTO_INCREMENT,
  `SRId` int(11) NOT NULL,
  `CId` int(11) NOT NULL,
  PRIMARY KEY (`PId`),
  KEY `FK_Post_ServiceRequest` (`SRId`),
  KEY `FK_Post_Customer` (`CId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'customer'),
(2, 'service provider');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `SId` int(11) NOT NULL AUTO_INCREMENT,
  `Sname` varchar(50) NOT NULL,
  `SDesc` varchar(250) NOT NULL,
  PRIMARY KEY (`SId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`SId`, `Sname`, `SDesc`) VALUES
(1, 'Car Wash', 'Car/bike dhuvn dita'),
(2, 'Servicing', 'Car/bike servicing karun dita'),
(3, 'Mini Check-up', 'Matsho bhangadi jalya tar paita'),
(4, 'Driving', 'Pilot pana karta');

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE IF NOT EXISTS `serviceprovider` (
  `SPId` int(11) NOT NULL AUTO_INCREMENT,
  `SPName` varchar(50) NOT NULL,
  `SPPhone` int(11) NOT NULL,
  `SPAddress` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `SPPhoto` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`SPId`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`SPId`, `SPName`, `SPPhone`, `SPAddress`, `Email`, `Password`, `SPPhoto`, `role_id`) VALUES
(1, 'Priority Honda', 1122334455, 'Panaji Goa', 'priority@honda.com', 'priority', 'uploads/priority@honda.com.png', 2),
(2, 'AMG Motors', 1231231230, 'Old Goa', 'amg@amg.com', 'agmagm', 'uploads/amg@amg.com.png', 2),
(3, 'Hassan Motors', 90909090, 'Taliegao - Panaji', 'hassan@motors.com', 'hassan', 'uploads/hassan@motors.com.gif', 2),
(4, 'tata3', 0, 'jkahdjhf', 'tata@yahoo.com', 'tata123', 'tata@yahoo.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

CREATE TABLE IF NOT EXISTS `servicerequest` (
  `SRId` int(11) NOT NULL AUTO_INCREMENT,
  `SId` int(11) NOT NULL,
  `SRDesc` text NOT NULL,
  `SRDate` date NOT NULL,
  `LatestBy` date NOT NULL,
  PRIMARY KEY (`SRId`),
  KEY `FK_ServiceRequest_Service` (`SId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(254) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `last_activity` int(10) NOT NULL,
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `FK_Bids_Post` FOREIGN KEY (`Pid`) REFERENCES `post` (`PId`),
  ADD CONSTRAINT `fk_Service_provider` FOREIGN KEY (`SPId`) REFERENCES `serviceprovider` (`SPId`);

--
-- Constraints for table `gives`
--
ALTER TABLE `gives`
  ADD CONSTRAINT `FK_Gives_Service` FOREIGN KEY (`SId`) REFERENCES `service` (`SId`),
  ADD CONSTRAINT `FK_Gives_ServiceProvider` FOREIGN KEY (`SPId`) REFERENCES `serviceprovider` (`SPId`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_Post_Customer` FOREIGN KEY (`CId`) REFERENCES `customer` (`CId`),
  ADD CONSTRAINT `FK_Post_ServiceRequest` FOREIGN KEY (`SRId`) REFERENCES `servicerequest` (`SRId`);

--
-- Constraints for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD CONSTRAINT `FK_ServiceRequest_Service` FOREIGN KEY (`SId`) REFERENCES `service` (`SId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

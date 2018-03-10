-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 10, 2018 at 04:27 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `dist`
--

DROP TABLE IF EXISTS `dist`;
CREATE TABLE IF NOT EXISTS `dist` (
  `sid` int(4) NOT NULL,
  `distance` decimal(20,5) NOT NULL,
  KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `filter_shops`
--

DROP TABLE IF EXISTS `filter_shops`;
CREATE TABLE IF NOT EXISTS `filter_shops` (
  `sid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genmedicine`
--

DROP TABLE IF EXISTS `genmedicine`;
CREATE TABLE IF NOT EXISTS `genmedicine` (
  `gid` int(5) NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) NOT NULL,
  `gcost` float(10,2) NOT NULL,
  `tabperstrip` int(5) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genmedicine`
--

INSERT INTO `genmedicine` (`gid`, `gname`, `gcost`, `tabperstrip`) VALUES
(1, 'acarboz-25', 71.75, 10),
(2, 'glimidib', 60.00, 15),
(3, 'worm-ban', 9.57, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gs_rel`
--

DROP TABLE IF EXISTS `gs_rel`;
CREATE TABLE IF NOT EXISTS `gs_rel` (
  `gid` int(5) NOT NULL,
  `sid` int(4) NOT NULL,
  `stock` int(10) NOT NULL,
  KEY `gid` (`gid`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_rel`
--

INSERT INTO `gs_rel` (`gid`, `sid`, `stock`) VALUES
(2, 101, 100),
(1, 101, 0),
(1, 102, 20);

-- --------------------------------------------------------

--
-- Table structure for table `ma_rel`
--

DROP TABLE IF EXISTS `ma_rel`;
CREATE TABLE IF NOT EXISTS `ma_rel` (
  `mid` int(5) NOT NULL,
  `aid` int(5) NOT NULL,
  KEY `aid` (`aid`),
  KEY `mid` (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ma_rel`
--

INSERT INTO `ma_rel` (`mid`, `aid`) VALUES
(2000, 2003);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `mid` int(5) NOT NULL AUTO_INCREMENT,
  `mname` varchar(50) NOT NULL,
  `cost` float(10,2) NOT NULL,
  `tabperstrip` int(5) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=2004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`mid`, `mname`, `cost`, `tabperstrip`) VALUES
(2000, 'crocin', 15.89, 10),
(2001, 'glycomet gp 1', 88.23, 10),
(2002, 'glucar 25mg', 67.35, 10),
(2003, 'paracetamol', 19.50, 10);

-- --------------------------------------------------------

--
-- Table structure for table `mg_rel`
--

DROP TABLE IF EXISTS `mg_rel`;
CREATE TABLE IF NOT EXISTS `mg_rel` (
  `mid` int(5) NOT NULL,
  `gid` int(5) NOT NULL,
  KEY `gid` (`gid`),
  KEY `mid` (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mg_rel`
--

INSERT INTO `mg_rel` (`mid`, `gid`) VALUES
(2001, 2),
(2002, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ms_rel`
--

DROP TABLE IF EXISTS `ms_rel`;
CREATE TABLE IF NOT EXISTS `ms_rel` (
  `mid` int(5) NOT NULL,
  `sid` int(4) NOT NULL,
  `stock` int(10) NOT NULL,
  KEY `mid` (`mid`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_rel`
--

INSERT INTO `ms_rel` (`mid`, `sid`, `stock`) VALUES
(2000, 100, 15),
(2000, 102, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shopowner`
--

DROP TABLE IF EXISTS `shopowner`;
CREATE TABLE IF NOT EXISTS `shopowner` (
  `sid` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `reg_no` varchar(25) NOT NULL DEFAULT 'unknown',
  `pincode` int(10) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `contact_no` (`contact_no`),
  UNIQUE KEY `emailid` (`emailid`),
  UNIQUE KEY `reg_no` (`reg_no`),
  UNIQUE KEY `pincode` (`pincode`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopowner`
--

INSERT INTO `shopowner` (`sid`, `name`, `address`, `contact_no`, `emailid`, `reg_no`, `pincode`) VALUES
(100, 'lucky medicals', 'marol naka', 9892358768, 'luckymeds@gmail.com', 'unknown', 400059),
(101, 'raja medicals', 'sakinaka', 767890908, 'raja@yahoo.co.in', 'M112', 400072),
(102, 'swagat medicals', 'vile parle west', 8454672312, 'swagat@yahoo.co.in', 'M113', 400056);

-- --------------------------------------------------------

--
-- Table structure for table `shop_location`
--

DROP TABLE IF EXISTS `shop_location`;
CREATE TABLE IF NOT EXISTS `shop_location` (
  `sid` int(4) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  PRIMARY KEY (`latitude`,`longitude`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_location`
--

INSERT INTO `shop_location` (`sid`, `latitude`, `longitude`) VALUES
(100, '19.23647300', '77.35246000'),
(101, '20.28483820', '78.28372830'),
(102, '21.28423820', '77.28372830');

-- --------------------------------------------------------

--
-- Table structure for table `sorted_shops`
--

DROP TABLE IF EXISTS `sorted_shops`;
CREATE TABLE IF NOT EXISTS `sorted_shops` (
  `sid` int(4) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  KEY `sid` (`sid`),
  KEY `latitude` (`latitude`,`longitude`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dist`
--
ALTER TABLE `dist`
  ADD CONSTRAINT `dist_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`);

--
-- Constraints for table `gs_rel`
--
ALTER TABLE `gs_rel`
  ADD CONSTRAINT `gs_rel_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `genmedicine` (`gid`),
  ADD CONSTRAINT `gs_rel_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`);

--
-- Constraints for table `ma_rel`
--
ALTER TABLE `ma_rel`
  ADD CONSTRAINT `ma_rel_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `medicine` (`mid`),
  ADD CONSTRAINT `ma_rel_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `medicine` (`mid`);

--
-- Constraints for table `mg_rel`
--
ALTER TABLE `mg_rel`
  ADD CONSTRAINT `mg_rel_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `genmedicine` (`gid`),
  ADD CONSTRAINT `mg_rel_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `medicine` (`mid`);

--
-- Constraints for table `ms_rel`
--
ALTER TABLE `ms_rel`
  ADD CONSTRAINT `ms_rel_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `medicine` (`mid`),
  ADD CONSTRAINT `ms_rel_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`);

--
-- Constraints for table `shop_location`
--
ALTER TABLE `shop_location`
  ADD CONSTRAINT `shop_location_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`);

--
-- Constraints for table `sorted_shops`
--
ALTER TABLE `sorted_shops`
  ADD CONSTRAINT `sorted_shops_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`),
  ADD CONSTRAINT `sorted_shops_ibfk_2` FOREIGN KEY (`latitude`,`longitude`) REFERENCES `shop_location` (`latitude`, `longitude`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

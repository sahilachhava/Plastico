-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 12, 2019 at 01:49 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plastico`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

DROP TABLE IF EXISTS `admindetails`;
CREATE TABLE IF NOT EXISTS `admindetails` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(100) DEFAULT NULL,
  `adminEmail` varchar(100) DEFAULT NULL,
  `adminPass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`adminId`, `adminName`, `adminEmail`, `adminPass`) VALUES
(1, 'Sahil Achhava', 'sahil@plastico.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `branddetails`
--

DROP TABLE IF EXISTS `branddetails`;
CREATE TABLE IF NOT EXISTS `branddetails` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(200) DEFAULT NULL,
  `productCount` int(11) DEFAULT '0',
  PRIMARY KEY (`brandId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branddetails`
--

INSERT INTO `branddetails` (`brandId`, `brandName`, `productCount`) VALUES
(1, 'Nike', 0),
(2, 'Nike', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categorydetails`
--

DROP TABLE IF EXISTS `categorydetails`;
CREATE TABLE IF NOT EXISTS `categorydetails` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(100) DEFAULT NULL,
  `subCategoryCount` int(11) DEFAULT '0',
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorydetails`
--

INSERT INTO `categorydetails` (`categoryId`, `categoryName`, `subCategoryCount`) VALUES
(1, 'Buckets', 0),
(2, 'Big', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedbackdetails`
--

DROP TABLE IF EXISTS `feedbackdetails`;
CREATE TABLE IF NOT EXISTS `feedbackdetails` (
  `feedbackId` int(11) NOT NULL AUTO_INCREMENT,
  `feedbackDT` varchar(50) DEFAULT NULL,
  `feedbackDesc` varchar(500) DEFAULT NULL,
  `feedbackRating` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  PRIMARY KEY (`feedbackId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offerdetails`
--

DROP TABLE IF EXISTS `offerdetails`;
CREATE TABLE IF NOT EXISTS `offerdetails` (
  `offerId` int(11) NOT NULL AUTO_INCREMENT,
  `offerStartDT` varchar(50) DEFAULT NULL,
  `offerEndDT` varchar(50) DEFAULT NULL,
  `offerCode` varchar(100) DEFAULT NULL,
  `offerDiscount` int(11) DEFAULT NULL,
  PRIMARY KEY (`offerId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offerdetails`
--

INSERT INTO `offerdetails` (`offerId`, `offerStartDT`, `offerEndDT`, `offerCode`, `offerDiscount`) VALUES
(1, '20/12/2019', '21/12/2019', 'ASJH', 10);

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

DROP TABLE IF EXISTS `productdetails`;
CREATE TABLE IF NOT EXISTS `productdetails` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(500) DEFAULT NULL,
  `productDesc` varchar(1500) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productImage` varchar(200) DEFAULT NULL,
  `productQty` int(11) DEFAULT NULL,
  `subCategorySecondId` int(11) DEFAULT NULL,
  `brandId` int(11) DEFAULT NULL,
  `offerId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategoryfirst`
--

DROP TABLE IF EXISTS `subcategoryfirst`;
CREATE TABLE IF NOT EXISTS `subcategoryfirst` (
  `subCategoryFirstId` int(11) NOT NULL AUTO_INCREMENT,
  `subCategoryFirstName` varchar(100) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`subCategoryFirstId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategoryfirst`
--

INSERT INTO `subcategoryfirst` (`subCategoryFirstId`, `subCategoryFirstName`, `categoryId`) VALUES
(2, 'Small', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategorysecond`
--

DROP TABLE IF EXISTS `subcategorysecond`;
CREATE TABLE IF NOT EXISTS `subcategorysecond` (
  `subCategorySecondId` int(11) NOT NULL AUTO_INCREMENT,
  `subCategorySecondName` varchar(100) DEFAULT NULL,
  `subCategoryFirstId` int(11) DEFAULT NULL,
  PRIMARY KEY (`subCategorySecondId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategorysecond`
--

INSERT INTO `subcategorysecond` (`subCategorySecondId`, `subCategorySecondName`, `subCategoryFirstId`) VALUES
(1, 'Black', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tokendetails`
--

DROP TABLE IF EXISTS `tokendetails`;
CREATE TABLE IF NOT EXISTS `tokendetails` (
  `token` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
CREATE TABLE IF NOT EXISTS `userdetails` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `userPass` varchar(100) DEFAULT NULL,
  `userPhone` varchar(20) DEFAULT NULL,
  `userImage` varchar(300) DEFAULT NULL,
  `userFirmAddress` varchar(500) DEFAULT NULL,
  `userFirmPincode` varchar(10) DEFAULT NULL,
  `userFirmName` varchar(100) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  `isManufacturer` int(11) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2016 at 02:21 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotelbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodationtype`
--

CREATE TABLE IF NOT EXISTS `accomodationtype` (
  `AccomodationTypeId` int(10) NOT NULL COMMENT '1',
  `AccomodationTypeName` varchar(20) NOT NULL COMMENT '1bhk/2 bhk',
  PRIMARY KEY (`AccomodationTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomodationtype`
--

INSERT INTO `accomodationtype` (`AccomodationTypeId`, `AccomodationTypeName`) VALUES
(1, '1bhk'),
(2, '2bhk'),
(3, 'villa');

-- --------------------------------------------------------

--
-- Table structure for table `ad_msg_template_table`
--

CREATE TABLE IF NOT EXISTS `ad_msg_template_table` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `template_content` text NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ad_msg_template_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `ad_property_owner_info`
--

CREATE TABLE IF NOT EXISTS `ad_property_owner_info` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `PropertyId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `registred_date` date NOT NULL,
  PRIMARY KEY (`owner_id`),
  KEY `PropertyId` (`PropertyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ad_property_owner_info`
--

INSERT INTO `ad_property_owner_info` (`owner_id`, `PropertyId`, `name`, `phone`, `email`, `address`, `registred_date`) VALUES
(1, 18, 'Rana J Singh', '9878487875', 'ranasingh@gmail.com', 'shimla', '2016-07-01'),
(2, 22, 'Ajit Pawar', '9562305148', 'ajit@gmail.com', 'ratnagiri', '2016-12-01'),
(3, 23, 'Vilas Galave', '9562305148', 'vilas@gmail.com', 'alibag', '1970-01-01'),
(4, 24, 'Umesh', '9878487875', 'umesh@agile.com', 'fg45y54y5y', '1970-01-01'),
(5, 25, 'Shivaji', '9878487875', 'shivaji@agile.com', 'greghig\r\nregre\r\ngre\r\nthgrt\r\n', '1970-01-01'),
(6, 26, 'Balasaheb', '022214556789', 'bala@agile.com', 'fgeryhrt\r\njhty\r\njty\r\nj\r\ntyj\r\nytj\r\nyt\r\njyt\r\njyh\r\ntjfg', '1970-01-01'),
(7, 27, 'Nitish', '022214556789', 'nitish@agile.com', 'fewg\r\nrg\r\nrg\r\nregreg\r\n', '2016-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `audit_rent`
--

CREATE TABLE IF NOT EXISTS `audit_rent` (
  `RoomID` varchar(15) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `special_price` double NOT NULL,
  `description` varchar(1500) NOT NULL,
  KEY `RoomID` (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_rent`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `PostalCode` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `CardHolder` varchar(40) NOT NULL,
  `CardNumber` varchar(16) NOT NULL,
  `Customercol` varchar(5) NOT NULL,
  `ArrivalInfo` varchar(200) DEFAULT NULL,
  `Comments` varchar(200) DEFAULT NULL,
  `EmailMe` int(5) DEFAULT NULL,
  `SmsMe` int(5) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Address`, `City`, `State`, `Country`, `PostalCode`, `Email`, `Phone`, `Fax`, `CardHolder`, `CardNumber`, `Customercol`, `ArrivalInfo`, `Comments`, `EmailMe`, `SmsMe`) VALUES
(1, 'shruti', 'kharge', 'palus', 'pune', 'maharashtra', 'india', '416310', 'shrutikharge@gmail.com', '8793851695', '1212121212', '1212', 'visa', '41173', 'they will come upto 2323', NULL, NULL, NULL),
(2, 'snehal', 'gaikwad', 'palus', 'pune', 'maharashtra', 'india', '416310', 'shrutikharge@gmail.com', '8793851695', '1212121212', '1212', 'visa', '41173', 'they will come upto 2323', NULL, NULL, NULL),
(3, 'Suhas', 'Khamkar', 'pune maharashtra', 'pune', 'maharashtra', 'india', '411028', 'suhas@gmail.com', '9922855214', '021-232645', 'suhas', '1512-2323-10', 'what', 'arriving...', 'gerg  rtbhrt trhrt ghrthjrt ryjhrrrrrrrnfv ', NULL, NULL),
(4, 'Balaji', 'Patil', 'sangli', 'sangli', 'maharashtra', 'india', '400235', 'balaji@ymail.com', '9874451415', NULL, 'balaji', '4562-5646', 'cfhc', 'fhjf', 'hjfjhf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE IF NOT EXISTS `customer_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) NOT NULL,
  `PropertyId` int(11) NOT NULL,
  `review_text` text NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `CustomerID` (`CustomerID`),
  KEY `PropertyId` (`PropertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `customer_reviews`
--


-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE IF NOT EXISTS `paymentdetails` (
  `PaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `ReservationID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `PaymentMethodID` int(11) NOT NULL,
  `Comments` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `CustomerID` (`CustomerID`),
  KEY `ReservationID` (`ReservationID`),
  KEY `PaymentMethodID` (`PaymentMethodID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paymentdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE IF NOT EXISTS `paymentmethod` (
  `PaymentMethodID` int(11) NOT NULL AUTO_INCREMENT,
  `PaymentMethod` varchar(100) NOT NULL,
  PRIMARY KEY (`PaymentMethodID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paymentmethod`
--


-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `PropertyId` int(11) NOT NULL AUTO_INCREMENT,
  `PropertyName` varchar(20) NOT NULL,
  `Street` varchar(40) NOT NULL,
  `City` varchar(30) NOT NULL,
  `PostalCode` int(10) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `StarRate` varchar(10) NOT NULL,
  `State` varchar(30) NOT NULL,
  `ImagePath` varchar(200) NOT NULL,
  `location_map` varchar(1000) NOT NULL,
  `description` varchar(3000) NOT NULL,
  KEY `PropertyId` (`PropertyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`PropertyId`, `PropertyName`, `Street`, `City`, `PostalCode`, `Phone`, `StarRate`, `State`, `ImagePath`, `location_map`, `description`) VALUES
(2, 'Vg Homes', 'g''g''g''g''g''g', 'hjrtjtrj', 415452, '11586383', '', 'Assam', '../Property gallery/Vg Homes/', 'd', 'f'),
(3, '', '', '', 0, '', '', '', '', '', ''),
(4, 'agile', 'g\\''g\\''g\\''g\\''g\\''g', 'ht', 415452, '11586383', '', 'Jammu and Kashmir', '../Property gallery/agile/', 'g', 'g'),
(5, 'Vg Homes', 'g''g''g''g''g''g', 'greg''greg''gerhge', 415452, '11586383', '', 'Karnataka', '../Property gallery/Vg Homes', 'd', 'g'),
(6, 'agile properties', 'g''g''g''g''g''g', 'greg''greg''gerhge', 415452, '11586383', '', 'Tripura', '../Property gallery/agile properties/', 'tg', 'h'),
(7, 'Welcome apt', 'jik67k''rtj''ytjjjj', 'jty', 415452, '11586383', '', 'Sikkim', '../Property gallery/Welcome apt/', 'yh', 'h'),
(9, 'mobile villa', 'hnj''htrjh', 'greg''greg''gerhge', 415452, '11586383', '', 'Uttaranchal', 'Admin/Property gallery/mobile villa/', 'fc', 'rf'),
(10, 'nmbs', 'nghngn', 'hjrtjtrj', 415452, '11586383', '', 'Jharkhand', 'Admin/Property gallery/nmbs/', 'f', 'g'),
(15, 'Ganesh', 'rhrtj', 'jytj', 457891, '9987452552', '', 'Maharashtra', 'Admin/Property gallery/Ganesh/', 'yutru', 'ytity'),
(16, 'Grand Hotel', 'Street', 'City', 415452, '11586383', '', 'Jammu and Kashmir', 'Admin/Property gallery/Grand Hotel/', 'Map Location', 'Description'),
(17, 'parl', 'lii', 'lili', 0, '11586383', '5', 'Jammu and Kashmir', 'Admin/Property gallery/parl/', 'gf', 'rg'),
(18, 'Himalay', 'jytjyuk', 'Shimla', 488457, '9685741425', '5', 'Himachal Pradesh', 'Admin/Property gallery/Himalay/', 'google location string', 'amazing hotel that u cant find in shimla'),
(21, 'Royal Empire', 'Mumbai - Goa Highway', 'Ratnagiri', 412105, '9562305148', '3', 'Maharashtra', 'Admin/Property gallery/Royal Empire/', 'map location string........', 'Situated very near at coastal area ratnagiri...'),
(22, 'Royal Villa', 'Mumbai - Goa Highway', 'Ratnagiri', 412105, '9562305148', '4', 'Maharashtra', 'Admin/Property gallery/Royal Villa/', 'map location string.....', 'touch the coast of sea'),
(23, 'Coastal King', 'alibag', 'alibag', 412201, '9685741425', '5', 'Maharashtra', 'Admin/Property gallery/Coastal King/', 'map location string', 'rfh\r\neth\r\ndfh\r\nh\r\nhrt\r\nhrt\r\nhr\r\nth\r\nrth\r\nrth\r\nrth\r\nrdh\r\ndg\r\ngjgngn'),
(24, 'Dilbahar Restorent', 'pune - satara', 'Pune', 412105, '9562305148', '4', 'Maharashtra', 'Admin/Property gallery/Dilbahar Restorent/', 'trh', 'htrhjrt'),
(25, 'Hotel Garden', 'sangli', 'sangli', 412105, '9562344445', '3', 'Maharashtra', 'Admin/Property gallery/Hotel Garden/', 'hgjtfjhhrtutrjutr', 'hfrththrthy'),
(26, 'Rohini Garden', 'Faltan - lonand', 'Faltan', 415452, '9562302015', '4', 'Maharashtra', 'Admin/Property gallery/Rohini Garden/', 'bghn', 'nbgfngfn'),
(27, 'Hill Point', 'malvan', 'malvan', 457891, '0223745487', '3', 'Maharashtra', 'Admin/Property gallery/Hill Point/', 'malvan.....\r\nhgrt\r\nh\r\nreh', 'awesome..');

-- --------------------------------------------------------

--
-- Table structure for table `property_info`
--

CREATE TABLE IF NOT EXISTS `property_info` (
  `PropertyId` int(11) NOT NULL,
  `Bedrooms` varchar(45) DEFAULT NULL,
  `Bathrooms` varchar(45) DEFAULT NULL,
  `Pool` varchar(45) DEFAULT NULL,
  `Meals` varchar(45) DEFAULT NULL,
  `EntertainMent` varchar(45) DEFAULT NULL,
  `OtherAmenities` varchar(45) DEFAULT NULL,
  `Theme` varchar(45) DEFAULT NULL,
  `Attractions` varchar(45) DEFAULT NULL,
  `LeisureActivities` varchar(45) DEFAULT NULL,
  `General` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PropertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_info`
--

INSERT INTO `property_info` (`PropertyId`, `Bedrooms`, `Bathrooms`, `Pool`, `Meals`, `EntertainMent`, `OtherAmenities`, `Theme`, `Attractions`, `LeisureActivities`, `General`) VALUES
(15, 'ytity', 'ury', 'Yes', 'urturt', 'ureuru', 'rturtu', 'uryirt', 'urturt', 'urdurdu', 'urtu'),
(16, 'Bedrooms', 'Bathrooms', 'No', 'Meals', 'EntertainMent', 'OtherAmenities', 'Theme', 'Attractions', 'Leisure Activitie', 'General'),
(17, 'grfe', 'erg', 'Yes', 'reg', 'reg', 'reg', 'reg', 'reg', 'erg', 'reg'),
(18, 'u', 'jy', 'Yes', 'uuykuyt,j56,j5,j5,j5uj,,uj56,ju', 'u54her,h.erherh,erwrh,erwhew', 'y5yhu45,hre,hre,he,herh', 'hth,4h,4,hh5h', 'h,4,h4h,56,56', 'rewgerwhgreg', 'ghreh'),
(21, '2', '1', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', '----'),
(22, '3', '1', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', '---', '-----'),
(23, '23', '325', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special'),
(24, '2', '1', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special'),
(25, 'juyikyuti', '21', 'No', 'FISH- bangda, kolambi, surmai veg nonveg', 'yuk', '----', 'uyk', 'low rates,', 'no', 'special'),
(26, '21', '2', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special'),
(27, '1', '1', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Folk dance  - koligit', 'yuk', 'uyk', 'uhyjht', 'ytuj', 'uyky');

-- --------------------------------------------------------

--
-- Table structure for table `property_views`
--

CREATE TABLE IF NOT EXISTS `property_views` (
  `PropertyId` int(11) NOT NULL,
  `visit_datetime` datetime NOT NULL,
  `ip` binary(16) NOT NULL,
  KEY `PropertyId` (`PropertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_views`
--


-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `ReservationID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `RoomID` varchar(15) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `CheckIn` datetime NOT NULL,
  `CheckOut` datetime NOT NULL,
  `ArrivalInfo` varchar(200) DEFAULT NULL,
  `Comments` varchar(200) DEFAULT NULL,
  `TotalCost` double NOT NULL,
  PRIMARY KEY (`ReservationID`),
  KEY `CustomerID` (`CustomerID`),
  KEY `RoomID` (`RoomID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationID`, `Date`, `RoomID`, `CustomerID`, `CheckIn`, `CheckOut`, `ArrivalInfo`, `Comments`, `TotalCost`) VALUES
(2, '2015-12-05', '2', 2, '2015-12-04 00:00:00', '2015-12-07 00:00:00', 'wewe', 'ew', 500),
(3, '2015-12-05', '2', 2, '2015-12-04 00:00:00', '2015-12-09 00:00:00', 'wewe', 'ew', 500);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `RoomID` varchar(15) NOT NULL,
  `PropertyId` int(11) NOT NULL,
  `RoomName` varchar(20) NOT NULL,
  `AccomodationTypeId` int(11) NOT NULL,
  `PriceBase` float NOT NULL,
  `PricePerAdult` float NOT NULL,
  `PricePerChild` float NOT NULL,
  `PriceWeekendAddition` float NOT NULL,
  PRIMARY KEY (`RoomID`),
  KEY `HotelID` (`PropertyId`),
  KEY `AccomodationTypeId` (`AccomodationTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `PropertyId`, `RoomName`, `AccomodationTypeId`, `PriceBase`, `PricePerAdult`, `PricePerChild`, `PriceWeekendAddition`) VALUES
('2', 2, 'neptune', 1, 123, 12, 12, 12),
('3', 2, 'galaxy', 1, 121, 12, 12, 12),
('4', 2, 'pluto', 2, 121, 12, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `visitors_info`
--

CREATE TABLE IF NOT EXISTS `visitors_info` (
  `visitor_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_ip` varchar(100) NOT NULL,
  `visit_datetime` datetime NOT NULL,
  `location` varchar(80) NOT NULL,
  `browser` varchar(150) NOT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `visitors_info`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad_property_owner_info`
--
ALTER TABLE `ad_property_owner_info`
  ADD CONSTRAINT `ad_property_owner_info_ibfk_1` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit_rent`
--
ALTER TABLE `audit_rent`
  ADD CONSTRAINT `audit_rent_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD CONSTRAINT `customer_reviews_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_reviews_ibfk_2` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD CONSTRAINT `paymentdetails_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paymentdetails_ibfk_2` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paymentdetails_ibfk_3` FOREIGN KEY (`PaymentMethodID`) REFERENCES `paymentmethod` (`PaymentMethodID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_info`
--
ALTER TABLE `property_info`
  ADD CONSTRAINT `property_info_ibfk_1` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_views`
--
ALTER TABLE `property_views`
  ADD CONSTRAINT `property_views_ibfk_1` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`AccomodationTypeId`) REFERENCES `accomodationtype` (`AccomodationTypeId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `room_ibfk_3` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

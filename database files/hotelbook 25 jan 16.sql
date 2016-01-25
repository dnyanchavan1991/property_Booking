-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2016 at 07:00 PM
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
  `accomodation_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1',
  `accomodation_type_name` varchar(20) NOT NULL COMMENT '1bhk/2 bhk',
  PRIMARY KEY (`accomodation_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accomodationtype`
--

INSERT INTO `accomodationtype` (`accomodation_type_id`, `accomodation_type_name`) VALUES
(1, '1bhk'),
(2, '2bhk'),
(3, 'villa');

-- --------------------------------------------------------

--
-- Table structure for table `audit_rent`
--

CREATE TABLE IF NOT EXISTS `audit_rent` (
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `special_price` double(10,2) NOT NULL,
  `rent_description` varchar(2000) NOT NULL,
  `rent_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rent_id`),
  KEY `foreign_key_ibfk1_idx` (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `audit_rent`
--

INSERT INTO `audit_rent` (`start_date`, `end_date`, `special_price`, `rent_description`, `rent_id`, `room_id`) VALUES
('0000-00-00 00:00:00', '0000-00-00 00:00:00', 500.00, 'u will get an offer on sdhdgsfhgfdhgf', 1, NULL),
('0000-00-00 00:00:00', '0000-00-00 00:00:00', 3333.00, 'u will get an offer on sdhdgsfhgfdhgf', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `card_holder` varchar(40) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `customer_col` varchar(5) NOT NULL,
  `arrival_info` varchar(1000) DEFAULT NULL,
  `comments` varchar(2000) DEFAULT NULL,
  `email_me` int(5) DEFAULT NULL,
  `SmsMe` int(5) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `address`, `city`, `state`, `country`, `postal_code`, `email_id`, `phone`, `fax`, `card_holder`, `card_number`, `customer_col`, `arrival_info`, `comments`, `email_me`, `SmsMe`) VALUES
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
  `property_id` int(11) NOT NULL,
  `review_text` varchar(5000) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `PropertyId` (`property_id`),
  KEY `customer_reviews_ibfk_1_idx` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `customer_reviews`
--


-- --------------------------------------------------------

--
-- Table structure for table `msg_template_table`
--

CREATE TABLE IF NOT EXISTS `msg_template_table` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `template_content` varchar(2000) NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `msg_template_table`
--

INSERT INTO `msg_template_table` (`template_id`, `type`, `template_content`) VALUES
(1, 'Enq', 'Enquiry is done');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE IF NOT EXISTS `paymentdetails` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `CustomerID` (`customer_id`),
  KEY `ReservationID` (`reservation_id`),
  KEY `PaymentMethodID` (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paymentdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE IF NOT EXISTS `paymentmethod` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(500) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paymentmethod`
--


-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(80) NOT NULL,
  `street` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `star_rate` varchar(10) NOT NULL,
  `state` varchar(30) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `location_map` varchar(1000) DEFAULT NULL,
  `description` varchar(5000) NOT NULL,
  `how_to_reach` varchar(2000) DEFAULT NULL,
  `property_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`property_id`),
  KEY `PropertyId` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `street`, `city`, `postal_code`, `star_rate`, `state`, `image_path`, `location_map`, `description`, `how_to_reach`, `property_type`) VALUES
(2, 'Grand Park', 'pune benglore Highway', 'pUNE', 415452, '5', 'Maharashtra', 'Admin/Property gallery/Himalay/', 'd', '\nGenerally Hotel Information sheet is kept on all guest rooms, This helps to give an overview of all services and facilities provided by the hotel to the guests. And this sheet also contains the details and timing of in-house Restaurants, Spa etc. along with the direct extension number for Reception, Housekeeping and Room Service.\n                        Generally Hotel Information sheet is kept on all guest rooms, This helps to give an overview of all services and facilities provided by the hotel to the guests. And this sheet also contains the details and timing of in-house Restaurants, Spa etc. along with the direct extension number for Reception, Housekeeping and Room Service.', 'By bus-get katraj bus from swargate\nBy Railway-no railway available \nBy Auto -u will get auto from anywhere', 'Villa'),
(3, '', '', '', 0, '', '', '', '', '', NULL, NULL),
(4, 'agile', 'g\\''g\\''g\\''g\\''g\\''g', 'ht', 415452, '', 'Jammu and Kashmir', '../Property gallery/agile/', 'g', 'g', NULL, NULL),
(5, 'Vg Homes', 'g''g''g''g''g''g', 'greg''greg''gerhge', 415452, '', 'Karnataka', '../Property gallery/Vg Homes', 'd', 'g', NULL, NULL),
(6, 'agile properties', 'g''g''g''g''g''g', 'greg''greg''gerhge', 415452, '', 'Tripura', '../Property gallery/agile properties/', 'tg', 'h', NULL, NULL),
(7, 'Welcome apt', 'jik67k''rtj''ytjjjj', 'jty', 415452, '', 'Sikkim', '../Property gallery/Welcome apt/', 'yh', 'h', NULL, NULL),
(9, 'mobile villa', 'hnj''htrjh', 'greg''greg''gerhge', 415452, '', 'Uttaranchal', 'Admin/Property gallery/mobile villa/', 'fc', 'rf', NULL, NULL),
(10, 'nmbs', 'nghngn', 'hjrtjtrj', 415452, '', 'Jharkhand', 'Admin/Property gallery/nmbs/', 'f', 'g', NULL, NULL),
(15, 'Ganesh', 'rhrtj', 'jytj', 457891, '', 'Maharashtra', 'Admin/Property gallery/Ganesh/', 'yutru', 'ytity', NULL, NULL),
(16, 'Fesrick House', 'pimple Saudagar Sanghavi Road', 'Pune', 415452, '5', 'Maharashtra', 'Admin/Property gallery/Grand Hotel/', 'Map Location', 'This quiet townhouse is perfectly situated in the heart of Edinburgh''s city centre, offering easy access to the airport and motorway networks, with access to the Edinburgh International Conference Centre easy whether you''re walking or taking a taxi.\nFrederick House boasts 45 bedrooms with en-suite, satellite television, radio, refrigerators, tea and coffee making facilities, trouser press, direct dial phone and modem point.', 'Reach via any way ,or u can ask anyone because every one knows this', 'Row House'),
(17, 'parl', 'lii', 'lili', 0, '5', 'Jammu and Kashmir', 'Admin/Property gallery/parl/', 'gf', 'rg', NULL, NULL),
(18, 'Himalay Apartments', 'Krarve nagar', 'Pune', 411052, '3', 'Maharashtra', 'Admin/Property gallery/Himalay/', 'google location string', 'Carlton Highland Hotel is a handsome Victorian building which stands proud, this 4 star, 5 crown commended Hotel offers 197 bedrooms, each tastefully decorated and providing all the comforts expected in a hotel.\nIn addition, guests will appreciate the leisure and entertainment facilities in the hotel itself, with entry to the exclusive Minus One nightclub. \nEach bedroom has satellite TV, telephone, hairdryer, trouser press, private bathroom/shower, toiletries, mini bar, tea/coffee making facilities.himla', 'By bus->u can get bus from anywhere to reach karvenagar\nBy railway-No bus available\nBy air->u have ti reach first at kalyaninagar,from ther u can catch any bus /auto', 'row House'),
(22, 'Royal Empire', 'Faltan - lonand', 'Faltan', 412105, '5', 'Maharashtra', 'Property gallery/Royal Empire/', 'gooogle map location string', 'located on Faltan - lonand highway near faltan', 'by road', 'Bungalow,Villa,Row House'),
(23, 'Royal Empire', 'Faltan - lonand', 'Faltan', 412105, '3', 'Maharashtra', 'Property gallery/Royal Empire/', 'location....', 'description.....located on Faltan - lonand road', 'by road', 'Bungalow,Villa'),
(24, 'Agile Properties', 'pune - mumbai', 'Lonawala', 415215, '5', 'Maharashtra', 'Property gallery/Agile Properties/', '', 'NATURAL PLACE IN LONAWALA', 'BY TRAIN, BY ROAD', 'Bungalow,Villa');

-- --------------------------------------------------------

--
-- Table structure for table `property_info`
--

CREATE TABLE IF NOT EXISTS `property_info` (
  `property_id` int(11) NOT NULL,
  `bedrooms` varchar(5) DEFAULT NULL,
  `bathrooms` varchar(5) DEFAULT NULL,
  `pool` varchar(5) DEFAULT NULL,
  `meals` varchar(1500) DEFAULT NULL,
  `internet_access` varchar(5) DEFAULT NULL,
  `smoking_allowd` varchar(5) DEFAULT NULL,
  `television_access` varchar(5) DEFAULT NULL,
  `pet_friendly` varchar(5) DEFAULT NULL,
  `air_condition` varchar(5) DEFAULT NULL,
  `in_house_kitchen` varchar(5) DEFAULT NULL,
  `restaurant` varchar(5) DEFAULT NULL,
  `beds` varchar(5) DEFAULT NULL,
  `accommodates` varchar(5) DEFAULT NULL,
  `free_parking` varchar(5) DEFAULT NULL,
  `first_aid_available` varchar(5) DEFAULT NULL,
  `entertainment` varchar(2000) DEFAULT NULL,
  `other_amenities` varchar(2000) DEFAULT NULL,
  `theme` varchar(2000) DEFAULT NULL,
  `attractions` varchar(2000) DEFAULT NULL,
  `leisureActivities` varchar(2000) DEFAULT NULL,
  `general` varchar(2000) DEFAULT NULL,
  `payment_facility` varchar(5) DEFAULT NULL,
  UNIQUE KEY `property_id_UNIQUE` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_info`
--

INSERT INTO `property_info` (`property_id`, `bedrooms`, `bathrooms`, `pool`, `meals`, `internet_access`, `smoking_allowd`, `television_access`, `pet_friendly`, `air_condition`, `in_house_kitchen`, `restaurant`, `beds`, `accommodates`, `free_parking`, `first_aid_available`, `entertainment`, `other_amenities`, `theme`, `attractions`, `leisureActivities`, `general`, `payment_facility`) VALUES
(2, '10', '2', 'Yes', 'vegiterian/nonvarg', 'Yes', 'No', 'YES', 'YES', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, 'katputli dramma', 'dance,plo club', 'rajwada', 'mohol bridge', '', '', 'No'),
(15, '3', '3', 'Yes', 'only non veg', 'No', 'No', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, 'reg', 'reg', 'marwadi', 'reg', 'erg', 'reg', 'No'),
(16, '5', '5', 'No', 'vegiterian', 'No', 'No', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, 'EntertainMent', 'OtherAmenities', 'Theme', 'Attractions', 'Leisure Activitie', 'General', 'No'),
(18, 'u', 'jy', 'Yes', 'uuykuyt,j56,j5,j5,j5uj,,uj56,ju', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'u54her,h.erherh,erwrh,erwhew', 'y5yhu45,hre,hre,he,herh', 'hth,4h,4,hh5h', 'h,4,h4h,56,56', 'rewgerwhgreg', 'ghreh', 'NO'),
(22, '2', '3', NULL, 'FISH- bangda, kolambi, surmai veg nonveg', NULL, 'Yes', 'Yes', NULL, 'Yes', NULL, 'Yes', '3', '15', 'Yes', NULL, 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special', 'Yes'),
(23, '4', '2', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, '4', '3', 'Yes', 'Yes', 'Folk dance  - koligit', 'lots', 'Royal', 'low rates,', 'no', 'special', 'Yes'),
(24, '5', '4', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'Yes', '', '', 'Yes', '', '', '9', '8', '', 'Yes', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `property_owner_info`
--

CREATE TABLE IF NOT EXISTS `property_owner_info` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `alternative_phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `registred_date` date NOT NULL,
  PRIMARY KEY (`owner_id`),
  UNIQUE KEY `property_id_UNIQUE` (`property_id`),
  KEY `PropertyId` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `property_owner_info`
--

INSERT INTO `property_owner_info` (`owner_id`, `property_id`, `owner_name`, `phone`, `alternative_phone`, `email`, `address`, `registred_date`) VALUES
(1, 2, 'Rana J Singh', '9878487875', NULL, 'ranasingh@gmail.com', 'shimla', '2016-07-01'),
(2, 23, 'Ajit ', '9562305148', '', 'ajit@gmail.com', 'faltan maharashtra', '2016-01-22'),
(3, 24, 'vINOD Patil', '9562302015', '', 'vinod@agile.in', 'lonawala', '2016-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `property_views`
--

CREATE TABLE IF NOT EXISTS `property_views` (
  `property_id` int(11) NOT NULL,
  `visit_datetime` datetime NOT NULL,
  `ip` binary(16) NOT NULL,
  `property_view_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`property_view_id`),
  KEY `PropertyId` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `property_views`
--


-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_date` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `arrival_info` varchar(2000) DEFAULT NULL,
  `comments` varchar(5000) DEFAULT NULL,
  `total_cost` double NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `CustomerID` (`customer_id`),
  KEY `reservation_ibfk_1_idx` (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_date`, `room_id`, `customer_id`, `check_in`, `check_out`, `arrival_info`, `comments`, `total_cost`) VALUES
(2, '2015-12-05', 2, 2, '2015-12-04 00:00:00', '2015-12-07 00:00:00', 'wewe', 'ew', 500),
(3, '2015-12-05', 2, 2, '2015-12-04 00:00:00', '2015-12-09 00:00:00', 'wewe', 'ew', 500);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `room_name` varchar(80) NOT NULL,
  `accomodation_type_id` int(11) NOT NULL,
  `base_price` float NOT NULL,
  `price_per_adult` float NOT NULL,
  `price_per_child` float NOT NULL,
  `price_weekend_addition` float NOT NULL,
  `room_capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `HotelID` (`property_id`),
  KEY `AccomodationTypeId` (`accomodation_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `property_id`, `room_name`, `accomodation_type_id`, `base_price`, `price_per_adult`, `price_per_child`, `price_weekend_addition`, `room_capacity`) VALUES
(2, 2, 'neptune', 1, 1500, 400, 300, 200, 4),
(3, 18, 'galaxy', 2, 1200, 200, 222, 200, 5),
(4, 16, 'pluto', 3, 5000, 1200, 500, 200, 5);

-- --------------------------------------------------------

--
-- Table structure for table `visitors_info`
--

CREATE TABLE IF NOT EXISTS `visitors_info` (
  `visitor_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_ip` varchar(100) NOT NULL,
  `city` varchar(80) NOT NULL,
  `region` varchar(80) NOT NULL,
  `country` varchar(80) NOT NULL,
  `browser` varchar(200) DEFAULT NULL,
  `date_visited` date NOT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `visitors_info`
--

INSERT INTO `visitors_info` (`visitor_id`, `visitor_ip`, `city`, `region`, `country`, `browser`, `date_visited`) VALUES
(10, '123.252.241.135', 'Pune', 'Maharashtra', 'IN', '', '2016-01-14'),
(11, '123.252.241.135', 'Pune', 'Maharashtra', 'IN', '', '2016-01-14'),
(12, '123.252.241.135', 'Pune', 'Maharashtra', 'IN', '', '2016-01-14'),
(13, '123.252.241.135', 'Pune', 'Maharashtra', 'IN', '', '2016-01-14'),
(14, '123.252.241.135', 'Pune', 'Maharashtra', 'IN', '', '2016-01-14'),
(15, '123.252.241.135', 'Pune', 'Maharashtra', 'IN', '', '2016-01-14'),
(16, '123.252.241.135', 'Pune', 'Maharashtra', 'IN', '', '2016-01-14'),
(17, '123.252.241.135', 'Pune', 'Maharashtra', 'IN', '', '2016-01-14'),
(18, '123.252.241.135', 'Pune', 'Maharashtra', 'IN', '', '2016-01-14'),
(19, '123.252.241.135', 'Pune', 'Maharashtra', 'IN', '', '2016-01-14'),
(20, '49.248.85.164', '', '', 'IN', NULL, '2016-01-15'),
(21, '49.248.85.164', '', '', 'IN', NULL, '2016-01-15'),
(22, '49.248.85.164', '', '', 'IN', NULL, '2016-01-15'),
(23, '49.248.85.164', '', '', 'IN', NULL, '2016-01-15'),
(24, '49.248.85.164', '', '', 'IN', NULL, '2016-01-15');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_rent`
--
ALTER TABLE `audit_rent`
  ADD CONSTRAINT `audit_rent_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD CONSTRAINT `customer_reviews_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_reviews_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD CONSTRAINT `paymentdetails_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `paymentdetails_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paymentdetails_ibfk_3` FOREIGN KEY (`payment_method_id`) REFERENCES `paymentmethod` (`payment_method_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `property_info`
--
ALTER TABLE `property_info`
  ADD CONSTRAINT `property_info_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `property_owner_info`
--
ALTER TABLE `property_owner_info`
  ADD CONSTRAINT `property_owner_info_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `property_views`
--
ALTER TABLE `property_views`
  ADD CONSTRAINT `property_views_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`accomodation_type_id`) REFERENCES `accomodationtype` (`accomodation_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

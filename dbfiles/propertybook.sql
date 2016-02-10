-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2016 at 04:09 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `propertybook`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `audit_rent`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
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
  `card_holder` varchar(40) DEFAULT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `arrival_info` varchar(1000) DEFAULT NULL,
  `comments` varchar(2000) DEFAULT NULL,
  `email_me` varchar(5) DEFAULT NULL,
  `sms_me` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_name`, `first_name`, `last_name`, `address`, `city`, `state`, `country`, `postal_code`, `email_id`, `phone`, `fax`, `card_holder`, `card_number`, `arrival_info`, `comments`, `email_me`, `sms_me`) VALUES
(1, 'shruti', 'shruti', 'kharge', 'palus', 'pune', 'maharashtra', 'india', '411052', 'shrutikharge@gmail.com', '02346254905', NULL, 'no', '5555', NULL, NULL, NULL, NULL);

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
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `enq_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `sent_date` datetime DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `guest_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`enq_id`),
  KEY `ibfk_enquiry_1_idx` (`user_name`),
  KEY `ibfk_enquiry_2_idx` (`property_id`),
  KEY `ibfk_enquiry_3_idx` (`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `enquiry`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `logged_in_dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_name`, `password`, `logged_in_dateTime`) VALUES
('admin', 'Admin', '2016-02-09 10:42:50'),
('admin', 'admin', '2016-02-09 11:52:35'),
('admin', 'admin', '2016-02-09 11:59:49'),
('admin', 'admin', '2016-02-09 12:27:55'),
('admin', 'admin', '2016-02-09 03:15:10');

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
  `description` varchar(5000) NOT NULL,
  `how_to_reach` varchar(2000) DEFAULT NULL,
  `property_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`property_id`),
  KEY `PropertyId` (`property_id`),
  KEY `property_ibfk_1_idx` (`property_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `street`, `city`, `postal_code`, `star_rate`, `state`, `image_path`, `description`, `how_to_reach`, `property_type_id`) VALUES
(30, 'Orchid Villa', 'Pune-Benglore Highway', 'Pune', 411052, '3', 'Madhya Pradesh', 'Property gallery/Orchid Villa/', 'Extravagantly designed, The O Hotel is a boutique Ecotel in Pune that caters to a more discerning clientele. Located right next to the legendary German Bakery, The O Hotel is situated in the heart of Pune, near Koregaon park, just 3 KMS from the railway station and 6 KMS from Lohegaon Airport. While at The O Hotel, visiting RSI golf club, Osho Meditation center, Royal Connaught boat club, and Bund Garden which are nearby is a great pleasure. The Empress Garden and Katraj Snake Park are other major attractions of the city.\r\n\r\nThe gorgeously decorated interiors of The O Hotel is sure to leave guests mesmerized and the O Spa will leave guests relaxed and ready to take on the world after they''ve been pampered. The sensuous rooms at The O Hotel leave no stone unturned to impress business and leisure guests and leave them sitting in the lap of luxury, and the fine dining facilities and rooftop swimming pool are just some of the touches that will blow guests away.', 'The rooms at the O Hotel are a sensual treat of texture and style. The centrally air-conditioned well-designed spacious rooms divided into O Deluxe, Luxury Grand, O Club and the Presidential Suite have warm timber floors with a combination of silk, tissue and jute for curtains and lampshades woven with silver threads. Every room has a four fixture bathroom with a custom made tub, rain shower, free standing steel counter basin and personalized O Hotel toiletries. In-room amenities include an LCD television with USB port, video on demand, direct STD/ISD calling facility, complimentary internet connection, multi-use electric sockets and an in-room safe. Room service is available 24 hours.\r\n', 1),
(31, 'Hyatt Pune', 'Pune Airport Road', 'Pune', 411052, '5', 'Maharashtra', 'Property gallery/Hyatt Pune/', 'Adjacent to the tranquil Aga Khan Palace, Hyatt Pune is an upscale Business Hotel in Pune with an intimate and serene ambience. With the key themes of light, air and water highlighted with every design element, the hotel interiors are bound to leave a lasting impression on all guests visiting the hotel', '88/4, Pune-Nagar Road (Adj. Aga Khan Palace), Yerwada Pune - 411006\r\nMaharashtra, India', 6),
(32, 'Hotel Rama Executive', 'Address: Near Police Station, Masjid Rd,', 'Mahabaleshwar', 412806, '4', 'Maharashtra', 'Property gallery/Hotel Rama Executive/', 'Mahabaleshwar, a hill station located in the Western Ghats of Maharashtra is one of the very few evergreen forests of the world. It comprises three villages Malcolm Peth, Old "Kshetra" Mahabaleshwar and part of the Shindola village. This historic place served as the summer capital of Bombay province during the British Raj.', 'by airplane u will reach over rhere by pune', 4),
(33, 'Sunny Midtown', 'Address: Near SBI, Opp Hotel Sunny Inter', 'Mahabaleshwar', 412806, '3', 'Maharashtra', 'Property gallery/Sunny Midtown/', 'Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. \r\n\r\nSimple rooms with understated decor provide flat-screen TVs and free Wi-Fi. Room service is offered 24/7.', 'u can reach there by bus,auto,', 3),
(34, 'Resort Rio', 'Near Baga Beach, Tambudki, Arpora, Barde', 'sindhudurg', 404985, '4', 'Madhya Pradesh', 'Property gallery/Resort Rio/', 'Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\nThe elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.', 'Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\nThe elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.', 8),
(35, 'King palace', 'Pune Airport Road', 'Pune', 412105, '4', 'Maharashtra', 'Property gallery/King palace/', 'Adjacent to the tranquil Aga Khan Palace, Hyatt Pu...', 'by road by train', 1),
(36, 'Vrundavan', 'pune - satara', 'Pune', 412105, '5', 'Maharashtra', 'Property gallery/Vrundavan/', 'Adjacent to the tranquil Aga Khan Palace, Hyatt Pu...', 'by road by train', 2),
(37, 'lake view', 'satara karad', 'Satara', 145235, '5', 'Maharashtra', 'Property gallery/lake view/', 'Adjacent to the tranquil Aga Khan Palace, Hyatt Pu...', 'by road by train', 3),
(38, 'Hotel Garden', 'sangli miraj', 'sangli', 412105, '4', 'Maharashtra', 'Property gallery/Hotel Garden/', 'Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\nThe elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.', 'by road by train', 5),
(39, 'Utkarsh Plaza', 'Kolhapur - Sangli', 'Jaysingpur', 415236, '5', 'Maharashtra', 'Property gallery/Utkarsh Plaza/', 'Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n', 'by road by train', 7),
(40, 'Hind Hotel', 'pune - mumbai', 'Lonawala', 415215, '5', 'Maharashtra', 'Property gallery/Hind Hotel/', 'Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\n', 'by road by train', 6),
(41, 'Tejas Hotel', 'Faltan - lonand', 'Faltan', 415452, '4', 'Maharashtra', 'Property gallery/Tejas Hotel/', 'Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\nThe elegant, wood-floored tents come with ', 'by road by train', 5),
(42, 'Wai palace', 'pune - satara', 'Satara', 145235, '4', 'Maharashtra', 'Property gallery/Wai palace/', 'The elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.', 'by road', 8),
(43, 'Nilesh plaza', 'koregaon', 'Satara', 145235, '4', 'Maharashtra', 'Property gallery/Nilesh plaza/', 'The elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.', 'by train, by road', 5),
(44, 'ganga orchid', 'koregaon park', 'Pune', 145235, '5', 'Maharashtra', 'Property gallery/ganga orchid/', 'Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\nThe elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. ', 'by road by train', 4),
(45, 'Sun hotel', 'satara karad', 'Satara', 145235, '3', 'Maharashtra', 'Property gallery/Sun hotel/', 'The elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.', 'by train by road', 2),
(46, 'Agintha', 'aurangabad', 'aurangabad', 415325, '3', 'Maharashtra', 'Property gallery/Agintha/', 'Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ', 'by road by train', 7),
(47, 'Eliphanta', 'verul', 'aurangabad', 415325, '3', 'Maharashtra', 'Property gallery/Eliphanta/', 'Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ', 'by plane by road', 4),
(48, 'vithhal ', 'Pune Airport Road', 'Pune', 412105, '3', 'Maharashtra', 'Property gallery/vithhal /', 'Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ', 'by road by plane', 3),
(49, 'queen house', 'Kolhapur - Sangli', 'Jaysingpur', 415236, '3', 'Maharashtra', 'Property gallery/queen house/', 'Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ', 'by road', 8),
(50, 'ajit villa', 'verul', 'aurangabad', 415325, '3', 'Maharashtra', 'Property gallery/ajit villa/', 'Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ', 'by road', 9),
(51, 'Gokul Villa', 'aurangabad', 'aurangabad', 415325, '3', 'Maharashtra', 'Property gallery/Gokul Villa/', 'Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, \r\n          1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ', 'by plane by road by train', 1);

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
  `accommodates` int(11) DEFAULT NULL,
  `free_parking` varchar(5) DEFAULT NULL,
  `first_aid_available` varchar(5) DEFAULT NULL,
  `entertainment` varchar(2000) DEFAULT NULL,
  `other_amenities` varchar(2000) DEFAULT NULL,
  `theme` varchar(2000) DEFAULT NULL,
  `attractions` varchar(2000) DEFAULT NULL,
  `leisureActivities` varchar(2000) DEFAULT NULL,
  `general` varchar(2000) DEFAULT NULL,
  `payment_facility` varchar(5) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  UNIQUE KEY `property_id_UNIQUE` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_info`
--

INSERT INTO `property_info` (`property_id`, `bedrooms`, `bathrooms`, `pool`, `meals`, `internet_access`, `smoking_allowd`, `television_access`, `pet_friendly`, `air_condition`, `in_house_kitchen`, `restaurant`, `beds`, `accommodates`, `free_parking`, `first_aid_available`, `entertainment`, `other_amenities`, `theme`, `attractions`, `leisureActivities`, `general`, `payment_facility`, `latitude`, `longitude`) VALUES
(30, '10', '10', 'Yes', 'veg,nonveg', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '13', 15, 'Yes', 'Yes', 'tv', '', 'Rajwada&Royal', 'beach', '', '', 'Yes', '18.524762506964965', '73.8292213399659'),
(31, '10', '10', 'Yes', 'all type', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', 'No', '15', 19, 'No', 'No', 'club available', 'dancing pub', 'royal', 'pune airport', '', '', 'Yes', '18.525250807233114', '73.85179481103523'),
(32, '10', '10', 'Yes', '', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', '15', 19, 'Yes', 'Yes', 'no entertainment', '', 'nature', 'sunset point', 'dancing pub', '', 'No', '18.515484536964763', '73.93144568994148'),
(33, '10', '10', 'Yes', 'veg,nonveg', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', '15', 18, 'No', 'No', 'tv is there', '', 'scenary', 'sunset point', '', '', 'No', '18.564310307954532', '73.93487891748055'),
(34, '8', '4', 'Yes', '', 'Yes', 'Yes', 'No', 'Yes', 'No', 'No', 'No', '10', 18, 'No', 'No', 'dancing club,Pub', '', 'nature', 'malvan beach', '', '', 'No', '18.757522862711898', '73.40890845849617'),
(35, '3', '4', 'No', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', '8', 13, 'Yes', 'Yes', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special', 'Yes', '18.76597494331089', '73.39405974938973'),
(36, '6', '3', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', '10', 11, 'No', 'Yes', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special', 'No', '18.031035963195674', '74.00929412438973'),
(37, '3', '5', 'No', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'No', '11', 13, 'Yes', 'Yes', 'Folk dance  - koligit', 'lots of....', 'Royal', 'low rates,big playgraund', 'no', 'special', 'No', '17.59696443925594', '74.04499969079598'),
(38, '3', '3', 'No', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'No', '13', 18, 'No', 'Yes', 'Folk dance  - koligit', 'lots', 'Royal', 'low rates,big playgraund', 'no', 'special', 'No', '16.837405360719327', '74.62883784764676'),
(39, '3', '9', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'No', '9', 10, 'Yes', 'Yes', 'Folk dance  - koligit', '----', 'nation', 'low rates,big playgraund', 'no', 'special', 'No', '16.84206642168757', '74.43158111169441'),
(40, '3', '5', 'No', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', '9', 11, 'No', 'Yes', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special', 'No', '18.760773713062758', '73.38856658532723'),
(41, '2', '5', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', '10', 3, 'Yes', 'No', 'Folk dance  - koligit', 'lots of....', 'Royal', 'low rates,', 'no', 'special', 'No', '18.012753151773225', '74.33064422204598'),
(42, '3', '3', 'No', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'Yes', '13', 15, 'Yes', 'No', 'Folk dance  - koligit', 'lots of....', 'nation', 'low rates,big playground', 'no', 'special', 'Yes', '17.95266770819475', '73.90492400720223'),
(43, '3', '4', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', '11', 13, 'Yes', 'No', 'Folk dance  - koligit', 'lots', 'Royal', 'low rates,', 'no', 'special', 'Yes', '17.72258753710582', '74.04362639978035'),
(44, '5', '5', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', '8', 12, 'Yes', 'Yes', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special', 'No', '18.541201182346207', '73.90595397546394'),
(45, '3', '6', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '7', 10, 'Yes', 'No', 'Folk dance  - koligit', 'lots of....', 'nation', 'low rates,big playgraund', 'no', 'special', 'Yes', '17.633613563719994', '73.14137420251473'),
(46, '3', '5', 'No', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', '13', 14, 'Yes', 'Yes', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special', 'Yes', '18.50408985034481', '73.82218322351082'),
(47, '6', '4', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'No', 'Yes', 'No', 'No', 'No', 'Yes', '4', 4, 'Yes', 'Yes', 'Folk dance  - koligit', 'lots of....', 'Royal', 'low rates,', 'no', 'special', 'Yes', '20.293173826635336', '75.14088592126473'),
(48, '4', '7', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '10', 17, 'Yes', 'Yes', 'Folk dance  - koligit', 'lots of....', 'Royal', 'low rates,big playgraund', 'no', 'special', 'Yes', '18.593599067078962', '73.92140349938973'),
(49, '8', '8', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'No', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', '11', 17, 'Yes', 'Yes', 'Folk dance  - koligit', '----', 'Royal', 'low rates,', 'no', 'special', 'Yes', '18.048011159292706', '73.95573577478035'),
(50, '6', '9', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', '12', 16, 'Yes', 'Yes', 'Folk dance  - koligit', '----', 'Royal', 'tourist', 'no', 'special', 'Yes', '18.398245878412762', '73.6728378255616'),
(51, '3', '8', 'Yes', 'FISH- bangda, kolambi, surmai veg nonveg', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '10', 14, 'Yes', 'Yes', 'Folk dance  - koligit', 'lots of....', 'Royal', 'low rates,', 'no', 'special', 'Yes', '19.973409288864893', '75.26173553063973');

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
  `email_me` varchar(5) NOT NULL,
  `sms_me` varchar(5) NOT NULL,
  PRIMARY KEY (`owner_id`),
  UNIQUE KEY `property_id_UNIQUE` (`property_id`),
  KEY `PropertyId` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `property_owner_info`
--

INSERT INTO `property_owner_info` (`owner_id`, `property_id`, `owner_name`, `phone`, `alternative_phone`, `email`, `address`, `registred_date`, `email_me`, `sms_me`) VALUES
(1, 30, 'shri kharge', '243252454', '213213', 'gshgs@gmail.com', 'palus', '2012-12-12', 'yes', 'yes'),
(4, 31, 'Yogesh patil', '9685741425', NULL, 'yogesh@agile.com', 'pune', '2016-02-09', 'yes', 'yes'),
(5, 32, 'Samruddhi sane', '8574142536', NULL, 'ssane@agile.com', 'ratnagiri, maharashtra', '2016-02-09', 'yes', 'yes'),
(6, 33, 'Rajesh H', '9632514792', NULL, 'rajesh@agile.com', 'hadapsar pune', '2016-02-09', 'yes', 'yes'),
(7, 34, 'Ramesh Mane', '9985741425', NULL, 'rmane@agile.com', 'ratnagiri, maharashtra', '2016-02-09', 'yes', 'yes'),
(8, 35, 'Harsh das', '9562305148', '9562305148', 'hdas@agile.com', 'pune maharashtra', '2016-02-09', '', ''),
(9, 36, 'Ramchandra more', '9562305148', '', 'rmore@agile.com', 'at/p wai satara, maharashtra', '2016-02-09', '', ''),
(10, 37, 'Fatima mulla', '9562344445', '9562344445', 'fm@agile.com', 'satara maharashtra', '2016-02-09', '', ''),
(11, 38, 'Sandesh More', '9562305148', '', 'sandesh@agile.com', 'sangli miraj road sangli', '2016-02-09', '', ''),
(12, 39, 'Utkarsh dabade', '9562305148', '', 'ud@agile.com', 'jaysingpur Maharashtra', '2016-02-09', '', ''),
(13, 40, 'Ramesh Patil', '9562305148', '9562305148', 'rp@agile.com', 'lonawala pune', '2016-02-09', '', ''),
(14, 41, 'Mukesh talele', '9562305148', '', 'mt@agile.com', 'maharashtra', '2016-02-09', '', ''),
(15, 42, 'anand d', '9562305148', '', 'ad@agile.com', 'at/p wai dist - satara , maharashtra', '2016-02-09', '', ''),
(16, 43, 'nilesh pawar', '9685741425', '9652415874', 'nilesh@agile.com', 'satara maharashtra', '2016-02-09', '', ''),
(17, 45, 'Sidhesh Bhosale', '8877445511', '8855623140', 'sb@agile.com', 'at/p - ganapatipule ratnagiri', '2016-02-09', '', ''),
(18, 46, 'Ramesh Patil', '9584741424', '', 'rp@agile.com', 'atp wai satara', '2016-02-09', '', ''),
(19, 47, 'Naresh shintre', '9355447842', '', 'ns@agile.com', 'verul', '2016-02-09', '', ''),
(20, 49, 'ajit dada', '9985741425', '', 'ajit@gmail.com', 'pune maharashtra', '2016-02-09', '', ''),
(21, 50, 'milind agsd', '8854714250', '', 'umesh@agile.com', 'panshet dam', '2016-02-09', '', ''),
(22, 51, 'Narendra kenjale', '9584741425', '9061457847', 'nk@agile.com', 'aurangabad maharashtra', '2016-02-09', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE IF NOT EXISTS `property_type` (
  `property_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_type_name` varchar(45) NOT NULL,
  PRIMARY KEY (`property_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`property_type_id`, `property_type_name`) VALUES
(1, 'Villa'),
(2, 'Dormatory'),
(3, 'Apartment'),
(4, 'Bunglow'),
(5, 'Row House'),
(6, 'Cottage'),
(7, 'Hut'),
(8, 'House Boat'),
(9, 'Tree House');

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
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `address` varchar(400) NOT NULL,
  `account_active` varchar(5) NOT NULL,
  `access_type` enum('user','admin') DEFAULT 'user',
  PRIMARY KEY (`user_name`),
  UNIQUE KEY `user_name_UNIQUE` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_name`, `password`, `first_name`, `last_name`, `mobile_number`, `email_address`, `address`, `account_active`, `access_type`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `arrival_info` varchar(2000) DEFAULT NULL,
  `comments` varchar(5000) DEFAULT NULL,
  `total_cost` double NOT NULL,
  `accomodates` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `CustomerID` (`customer_id`),
  KEY `reservation_ibfk_1_idx` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_date`, `customer_id`, `check_in`, `check_out`, `arrival_info`, `comments`, `total_cost`, `accomodates`, `property_id`) VALUES
(1, '2016-09-02', 1, '2016-09-02 00:00:00', '2016-09-03 00:00:00', 'sdsdsdss', 'sd', 12, 2, 32),
(2, '2016-09-02', 1, '2016-09-02 00:00:00', '2016-09-02 00:00:00', 'sdsdsdss', 'ZZ', 1212, 3, 33);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `room`
--


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
  `location` varchar(200) NOT NULL,
  `Service_Provider` varchar(300) NOT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `visitors_info`
--

INSERT INTO `visitors_info` (`visitor_id`, `visitor_ip`, `city`, `region`, `country`, `browser`, `date_visited`, `location`, `Service_Provider`) VALUES
(37, '114.143.252.243', 'Pune', 'Maharashtra', 'IN', NULL, '2016-02-09', '18.5333,73.8667', 'AS17762 Tata Teleservices Maharashtra Ltd'),
(38, '49.248.86.148', 'Pune', 'Maharashtra', 'IN', NULL, '2016-02-09', '18.5333,73.8667', 'AS17762 Tata Teleservices Maharashtra Ltd');

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
-- Constraints for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD CONSTRAINT `ibfk_enquiry_1` FOREIGN KEY (`user_name`) REFERENCES `registration` (`user_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_enquiry_2` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_enquiry_3` FOREIGN KEY (`template_id`) REFERENCES `msg_template_table` (`template_id`) ON DELETE CASCADE;

--
-- Constraints for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD CONSTRAINT `paymentdetails_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `paymentdetails_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paymentdetails_ibfk_3` FOREIGN KEY (`payment_method_id`) REFERENCES `paymentmethod` (`payment_method_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`property_type_id`) REFERENCES `property_type` (`property_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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

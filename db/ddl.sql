
CREATE TABLE `accomodationtype` (
  `accomodation_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1',
  `accomodation_type_name` varchar(20) NOT NULL COMMENT '1bhk/2 bhk',
  PRIMARY KEY (`accomodation_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE `paymentmethod` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(500) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `msg_template_table` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `template_content` varchar(2000) NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `property_type` (
  `property_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_type_name` varchar(45) NOT NULL,
  PRIMARY KEY (`property_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE `property` (
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
  KEY `property_ibfk_1_idx` (`property_type_id`),
  CONSTRAINT `property_ibfk_1` FOREIGN KEY (`property_type_id`) REFERENCES `property_type` (`property_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE `room` (
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
  KEY `AccomodationTypeId` (`accomodation_type_id`),
  CONSTRAINT `room_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `room_ibfk_2` FOREIGN KEY (`accomodation_type_id`) REFERENCES `accomodationtype` (`accomodation_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `audit_rent` (
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `special_price` double(10,2) NOT NULL,
  `rent_description` varchar(2000) NOT NULL,
  `rent_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rent_id`),
  KEY `foreign_key_ibfk1_idx` (`room_id`),
  CONSTRAINT `audit_rent_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `customer` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `customer_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `star_rating` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `review_text` varchar(1000) NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `PropertyId` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

CREATE TABLE IF NOT EXISTS `registration` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `address` varchar(400) NOT NULL,
  `account_active` varchar(5) NOT NULL,
  `access_type` enum('user','admin') DEFAULT 'user',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name_UNIQUE` (`user_name`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE `enquiry` (
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
  KEY `ibfk_enquiry_3_idx` (`template_id`),
  CONSTRAINT `ibfk_enquiry_1` FOREIGN KEY (`user_name`) REFERENCES `registration` (`user_name`) ON UPDATE CASCADE,
  CONSTRAINT `ibfk_enquiry_2` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON UPDATE CASCADE,
  CONSTRAINT `ibfk_enquiry_3` FOREIGN KEY (`template_id`) REFERENCES `msg_template_table` (`template_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `login` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `logged_in_dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `reservation` (
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
  KEY `reservation_ibfk_1_idx` (`property_id`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE `paymentdetails` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `CustomerID` (`customer_id`),
  KEY `ReservationID` (`reservation_id`),
  KEY `PaymentMethodID` (`payment_method_id`),
  CONSTRAINT `paymentdetails_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `paymentdetails_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON UPDATE CASCADE,
  CONSTRAINT `paymentdetails_ibfk_3` FOREIGN KEY (`payment_method_id`) REFERENCES `paymentmethod` (`payment_method_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `property_info` (
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
  UNIQUE KEY `property_id_UNIQUE` (`property_id`),
  CONSTRAINT `property_info_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `property_owner_info` (
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
  KEY `PropertyId` (`property_id`),
  CONSTRAINT `property_owner_info_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE `property_views` (
  `property_id` int(11) NOT NULL,
  `visit_datetime` datetime NOT NULL,
  `ip` binary(16) NOT NULL,
  `property_view_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`property_view_id`),
  KEY `PropertyId` (`property_id`),
  CONSTRAINT `property_views_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `visitors_info` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

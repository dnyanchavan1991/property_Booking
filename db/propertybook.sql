-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: propertybook
-- ------------------------------------------------------
-- Server version	5.5.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accomodationtype`
--

DROP TABLE IF EXISTS `accomodationtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accomodationtype` (
  `accomodation_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1',
  `accomodation_type_name` varchar(20) NOT NULL COMMENT '1bhk/2 bhk',
  PRIMARY KEY (`accomodation_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accomodationtype`
--

LOCK TABLES `accomodationtype` WRITE;
/*!40000 ALTER TABLE `accomodationtype` DISABLE KEYS */;
INSERT INTO `accomodationtype` VALUES (1,'1bhk'),(2,'2bhk'),(3,'villa');
/*!40000 ALTER TABLE `accomodationtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_rent`
--

DROP TABLE IF EXISTS `audit_rent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_rent`
--

LOCK TABLES `audit_rent` WRITE;
/*!40000 ALTER TABLE `audit_rent` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_rent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'shruti','shruti','kharge','palus','pune','maharashtra','india','411052','shrutikharge@gmail.com','02346254905',NULL,'no','5555',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_reviews`
--

DROP TABLE IF EXISTS `customer_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `star_rating` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `review_text` varchar(1000) NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `PropertyId` (`property_id`),
  CONSTRAINT `customer_reviews_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_reviews`
--

LOCK TABLES `customer_reviews` WRITE;
/*!40000 ALTER TABLE `customer_reviews` DISABLE KEYS */;
INSERT INTO `customer_reviews` VALUES (1,30,'shruti kharge','shrutikharge@gmail.com',4,'0000-00-00','0000-00-00','Suyog constructions is a moderately popular name in Pune real estate buisness who claim to have over 30 years of experience in construction business. Some of the completed and ongoing projects of this builder are: Suyog Lucky Homes(Wagholi), Suyog Ni'),(2,31,'shruti kharge','shrutikharge@gmail.com',3,'0000-00-00','0000-00-00','Suyog constructions is a moderately popular name in Pune real estate buisness who claim to have over 30 years of experience in construction business. Some of the completed and ongoing projects of this builder are: Suyog Lucky Homes(Wagholi), Suyog Ni'),(3,32,'shruti kharge','shrutikharge@gmail.com',5,'0000-00-00','0000-00-00','Suyog constructions is a moderately popular name in Pune real estate buisness who claim to have over 30 years of experience in construction business. Some of the completed and ongoing projects of this builder are: Suyog Lucky Homes(Wagholi), Suyog Ni'),(4,33,'shruti kharge','shrutikharge@gmail.com',5,'0000-00-00','0000-00-00','Marvel Bounty Located at Magarpatta Road and penthouses designed to allow nature to flow from the outdoors into your living space transforming your living experience into calm, quiet and beautiful. Still the project need some time to complete a few p '),(5,34,'shruti kharge','shrutikharge@gmail.com',2,'0000-00-00','0000-00-00','Marvel Bounty Located at Magarpatta Road and penthouses designed to allow nature to flow from the outdoors into your living space transforming your living experience into calm, quiet and beautiful. Still the project need some time to complete a few p '),(6,35,'shruti kharge','shrutikharge@gmail.com',3,'0000-00-00','0000-00-00','I have visited the pinnacle group of constructions building in pune at tilk road,the building is build in very littile space and also the construction is not well planed the lift available at very unlocated location no one can guess where is the lift '),(7,36,'shruti kharge','shrutikharge@gmail.com',3,'0000-00-00','0000-00-00','I have visited the pinnacle group of constructions building in pune at tilk road,the building is build in very littile space and also the construction is not well planed the lift available at very unlocated location no one can guess where is the lift '),(8,37,'shruti kharge','shrutikharge@gmail.com',5,'0000-00-00','0000-00-00','Worst experience ever had in life. invested in kul nation the project hasnt moved a stone, and now after a lot of effort to get the cancellation done, these shameless set of unethical people are delaying the reimbursement of the agreement value which '),(9,38,'shruti kharge','shrutikharge@gmail.com',4,'0000-00-00','0000-00-00','Worst experience ever had in life. invested in kul nation the project hasnt moved a stone, and now after a lot of effort to get the cancellation done, these shameless set of unethical people are delaying the reimbursement of the agreement value which '),(10,39,'shruti kharge','shrutikharge@gmail.com',5,'0000-00-00','0000-00-00','This is the one of the punes builder and that builder makeing the cheap land but when I was know about the offer of this ACE AUGUSTA IN THE HInjewadi offer is the best and good qualitys .i also one of the plot but but the same thing is happen in the '),(11,40,'shruti kharge','shrutikharge@gmail.com',5,'0000-00-00','0000-00-00','This is the one of the punes builder and that builder makeing the cheap land but when I was know about the offer of this ACE AUGUSTA IN THE HInjewadi offer is the best and good qualitys .i also one of the plot but but the same thing is happen in the '),(12,41,'shruti kharge','shrutikharge@gmail.com',5,'0000-00-00','0000-00-00','Recently I was looking for a good construction company for a private school project and I visited Renuka constructions for my project. I found this company very dedicated and experienced in construction line.They are very polite and they know how to '),(13,42,'shruti kharge','shrutikharge@gmail.com',5,'0000-00-00','0000-00-00','Recently I was looking for a good construction company for a private school project and I visited Renuka constructions for my project. I found this company very dedicated and experienced in construction line.They are very polite and they know how to '),(14,33,'shruti kharge','shruti@agile.com',3,'0000-00-00','0000-00-00','trj y54y5e y54y45e '),(15,33,'shruti kharge','shruti@agile.com',3,'0000-00-00','0000-00-00','Sunny Midtown is good property.'),(16,33,'shruti kharge','shruti@agile.com',3,'0000-00-00','0000-00-00','Sunny Midtown is best property'),(17,33,'shruti kharge','shruti@agile.com',3,'0000-00-00','0000-00-00','Sunny Midtown is best property'),(18,30,'Vilas Galave','vilas@agile.com',5,'0000-00-00','0000-00-00','Orchid Villa is a moderately popular name in Pune real estate buisness who claim to have over 30 years of experience in construction business.'),(19,30,'Vishwanath Awate','vishu.awate@gmail.com',5,'0000-00-00','0000-00-00','This is nice property\n\n\n\n\nAtleast visit once..\n\n\n\n\nI had a great experience'),(22,31,'mukech','mukesh@agile.com',3,'0000-00-00','0000-00-00','good'),(23,33,'mukesh','mukesh@agil.com',5,'2016-02-22','2016-02-24','Sunny Midtown is good property...!'),(24,33,'Vishwanath Awate','v@agile.com',3,'2016-02-22','2016-02-24','Sunny Midtown is good property...!'),(25,33,'nareshg','n@agile.com',5,'2016-02-22','2016-02-25','Sunny Midtown is good property...!'),(26,33,'hari','hari@agil.com',5,'2016-02-22','2016-02-24','Sunny Midtown Located at Magarpatta Road and penthouses designed to allow nature to flow from the outdoors into your living space transforming your living experience into calm, quiet and beautiful.'),(27,33,'j p patil','jp@agil.com',2,'2016-02-22','2016-02-24','Sunny Midtown Located at Magarpatta Road and penthouses designed to allow nature to flow from the outdoors into your living space transforming your living experience into calm, quiet and beautiful.'),(28,33,'TY Patil','typ@agile.com',3,'2016-02-21','2016-02-29','Sunny Midtown Located at Magarpatta Road and penthouses designed to allow nature to flow from the outdoors into your living space transforming your living experience into calm, quiet and beautiful.'),(29,33,'Arjun Pandit','bbr@agil.com',3,'2016-02-23','2016-02-24','Sunny Midtown Located at Magarpatta Road and penthouses designed to allow nature to flow from the outdoors into your living space transforming your living experience into calm, quiet and beautiful.'),(30,33,'pragati','pragati@gmail.com',3,'2016-03-03','2016-03-04','Sunny Midtown Located at Magarpatta Road and penthouses designed to allow nature to flow from the outdoors into your living space transforming your living experience into calm, quiet and beautiful.'),(31,33,'Yogesh','yogesh@gmail.cc',3,'2016-03-09','2016-03-10','Marvel Bounty Located at Magarpatta Road and penthouses designed to allow nature to flow from the outdoors into your living space transforming your living experience into calm, quiet and beautiful.'),(32,33,'Vilas Galave','vilas@agile.co',3,'2016-03-01','2016-03-02','Marvel Bounty Located at Magarpatta Road and penthouses designed to allow nature to flow from the outdoors into your living space transforming your living experience into calm, quiet and beautiful.'),(33,35,'ravi','ravi@gmail.com',3,'2016-03-01','2016-03-02','I have visited the pinnacle group of constructions building in pune at tilk road,the building is build in very littile space and also the construction is not well planed the lift available at very unlocated location no one can guess where is the lift'),(34,38,'Mohan','m@gmail.cm',3,'2016-02-02','2016-02-04','Worst experience ever had in life.\n      Invested in kul nation the project hasnt moved a stone, and now after a lot of effort to get the cancellation done.\n      these shameless set of unethical people are delaying the reimbursement of the agreement value which');
/*!40000 ALTER TABLE `customer_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enquiry`
--

LOCK TABLES `enquiry` WRITE;
/*!40000 ALTER TABLE `enquiry` DISABLE KEYS */;
/*!40000 ALTER TABLE `enquiry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `logged_in_dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('admin','Admin','2016-02-09 10:42:50'),('admin','admin','2016-02-09 11:52:35'),('admin','admin','2016-02-09 11:59:49'),('admin','admin','2016-02-09 12:27:55'),('admin','admin','2016-02-09 03:15:10'),('admin','admin','2016-02-09 05:10:57'),('admin','admin','2016-02-09 05:11:43'),('admin','admin','2016-02-09 05:17:57'),('admin','admin','2016-02-09 05:33:17'),('admin','admin','2016-02-10 10:07:26'),('admin','admin','2016-02-10 11:29:25'),('admin','admin','2016-02-10 11:38:18'),('admin','admin','2016-02-10 12:13:27'),('admin','admin','2016-02-10 01:02:24'),('admin','admin','2016-02-10 02:57:19'),('admin','admin','2016-02-11 09:39:49'),('admin','admin','2016-02-11 04:20:01'),('admin','admin','2016-02-15 02:24:30'),('agile','agile','2016-02-16 04:16:29'),('agile','agile','2016-02-16 04:18:12'),('agile','agile','2016-02-16 04:18:52'),('agile','agile','2016-02-16 04:19:38'),('agile','agile','2016-02-16 04:21:22'),('agile','agile','2016-02-16 04:21:54'),('agile','agile','2016-02-16 04:25:00'),('agile','agile','2016-02-16 04:26:50'),('agile','agile','2016-02-16 04:27:45'),('agile','agile','2016-02-16 04:29:12'),('agile','agile','2016-02-16 06:36:29'),('agile','agile','2016-02-17 09:24:53'),('agile','agile','2016-02-17 12:33:13'),('agile','agile','2016-02-17 01:09:48'),('agile','agile','2016-02-17 02:28:46'),('agile','agile','2016-02-17 02:45:17'),('agile','agile','2016-02-17 04:09:21'),('agile','agile','2016-02-18 11:48:31'),('agile','agile','2016-02-18 01:10:18'),('agile','agile','2016-02-22 12:35:10'),('admin','admin','2016-03-15 04:32:26'),('admin','admin','2016-03-17 01:10:57'),('admin','admin','2016-03-18 01:42:47'),('admin','admin','2016-03-18 03:16:33'),('admin','admin','2016-03-18 03:20:10'),('admin','admin','2016-03-18 03:21:35'),('agile','agile','2016-03-19 04:02:01'),('agile','agile','2016-03-19 04:45:27'),('admin','admin','2016-03-20 03:53:59'),('admin','admin','2016-03-20 04:41:45'),('admin','admin','2016-03-20 05:04:06'),('admin','admin','2016-03-20 05:07:09'),('admin','admin','2016-03-21 10:07:13'),('admin','admin','2016-03-21 10:41:45'),('admin','admin','2016-03-22 06:45:58'),('admin','admin','2016-03-22 06:46:57'),('admin','admin','2016-03-22 06:47:46'),('admin','admin','2016-03-22 06:48:25'),('admin','admin','2016-03-22 07:04:48'),('agile','agile','2016-03-23 11:57:05'),('admin','admin','2016-03-23 12:09:12');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `msg_template_table`
--

DROP TABLE IF EXISTS `msg_template_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msg_template_table` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `template_content` varchar(2000) NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msg_template_table`
--

LOCK TABLES `msg_template_table` WRITE;
/*!40000 ALTER TABLE `msg_template_table` DISABLE KEYS */;
INSERT INTO `msg_template_table` VALUES (1,'Enq','Enquiry is done');
/*!40000 ALTER TABLE `msg_template_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentdetails`
--

DROP TABLE IF EXISTS `paymentdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentdetails`
--

LOCK TABLES `paymentdetails` WRITE;
/*!40000 ALTER TABLE `paymentdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `paymentdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentmethod`
--

DROP TABLE IF EXISTS `paymentmethod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentmethod` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(500) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentmethod`
--

LOCK TABLES `paymentmethod` WRITE;
/*!40000 ALTER TABLE `paymentmethod` DISABLE KEYS */;
/*!40000 ALTER TABLE `paymentmethod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `activation_flag` varchar(5) NOT NULL,
  PRIMARY KEY (`property_id`),
  KEY `PropertyId` (`property_id`),
  KEY `property_ibfk_1_idx` (`property_type_id`),
  CONSTRAINT `property_ibfk_1` FOREIGN KEY (`property_type_id`) REFERENCES `property_type` (`property_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property`
--

LOCK TABLES `property` WRITE;
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
INSERT INTO `property` VALUES (30,'Orchid Villa','Pune-Benglore Highway','Pune',411052,'3','Madhya Pradesh','Property gallery/Orchid Villa237619074/','Extravagantly designed, The O Hotel is a boutique Ecotel in Pune that caters to a more discerning clientele. Located right next to the legendary German Bakery, The O Hotel is situated in the heart of Pune, near Koregaon park, just 3 KMS from the railway station and 6 KMS from Lohegaon Airport. While at The O Hotel, visiting RSI golf club, Osho Meditation center, Royal Connaught boat club, and Bund Garden which are nearby is a great pleasure. The Empress Garden and Katraj Snake Park are other major attractions of the city.\r\n\r\nThe gorgeously decorated interiors of The O Hotel is sure to leave guests mesmerized and the O Spa will leave guests relaxed and ready to take on the world after they\'ve been pampered. The sensuous rooms at The O Hotel leave no stone unturned to impress business and leisure guests and leave them sitting in the lap of luxury, and the fine dining facilities and rooftop swimming pool are just some of the touches that will blow guests away.','The rooms at the O Hotel are a sensual treat of texture and style. The centrally air-conditioned well-designed spacious rooms divided into O Deluxe, Luxury Grand, O Club and the Presidential Suite have warm timber floors with a combination of silk, tissue and jute for curtains and lampshades woven with silver threads. Every room has a four fixture bathroom with a custom made tub, rain shower, free standing steel counter basin and personalized O Hotel toiletries. In-room amenities include an LCD television with USB port, video on demand, direct STD/ISD calling facility, complimentary internet connection, multi-use electric sockets and an in-room safe. Room service is available 24 hours.\r\n',1,'NO'),(31,'Hyatt Pune','Pune Airport Road','Pune',411052,'5','Maharashtra','Property gallery/Hyatt Pune/','Adjacent to the tranquil Aga Khan Palace, Hyatt Pune is an upscale Business Hotel in Pune with an intimate and serene ambience. With the key themes of light, air and water highlighted with every design element, the hotel interiors are bound to leave a lasting impression on all guests visiting the hotel','88/4, Pune-Nagar Road (Adj. Aga Khan Palace), Yerwada Pune - 411006\r\nMaharashtra, India',6,'NO'),(32,'Hotel Rama Executive','Address: Near Police Station, Masjid Rd,','Mahabaleshwar',412806,'4','Maharashtra','Property gallery/Hotel Rama Executive1225893487/','Mahabaleshwar, a hill station located in the Western Ghats of Maharashtra is one of the very few evergreen forests of the world. It comprises three villages Malcolm Peth, Old \"Kshetra\" Mahabaleshwar and part of the Shindola village. This historic place served as the summer capital of Bombay province during the British Raj.','by airplane u will reach over rhere by pune',4,'YES'),(33,'Sunny Midtown','Address: Near SBI, Opp Hotel Sunny Inter','Mahabaleshwar',412806,'3','Maharashtra','Property gallery/Sunny Midtown383627910/','Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. \r\n\r\nSimple rooms with understated decor provide flat-screen TVs and free Wi-Fi. Room service is offered 24/7.','u can reach there by bus,auto,',3,'YES'),(34,'Resort Rio','Near Baga Beach, Tambudki, Arpora, Barde','sindhudurg',404985,'4','Madhya Pradesh','Property gallery/Resort Rio/','Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\nThe elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.','Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\nThe elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.',8,'YES'),(35,'King palace','Pune Airport Road','Pune',412105,'4','Maharashtra','Property gallery/King palace/','Adjacent to the tranquil Aga Khan Palace, Hyatt Pu...','by road by train',1,'YES'),(36,'Vrundavan','pune - satara','Pune',412105,'5','Maharashtra','Property gallery/Vrundavan/','Adjacent to the tranquil Aga Khan Palace, Hyatt Pu...','by road by train',2,'YES'),(37,'lake view','satara karad','Satara',145235,'5','Maharashtra','Property gallery/lake view/','Adjacent to the tranquil Aga Khan Palace, Hyatt Pu...','by road by train',3,'YES'),(38,'Hotel Garden','sangli miraj','sangli',412105,'4','Maharashtra','Property gallery/Hotel Garden/','Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\nThe elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.','by road by train',5,'YES'),(39,'Utkarsh Plaza','Kolhapur - Sangli','Jaysingpur',415236,'5','Maharashtra','Property gallery/Utkarsh Plaza/','Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n','by road by train',7,'YES'),(40,'Hind Hotel','pune - mumbai','Lonawala',415215,'5','Maharashtra','Property gallery/Hind Hotel/','Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\n','by road by train',6,'YES'),(41,'Tejas Hotel','Faltan - lonand','Faltan',415452,'4','Maharashtra','Property gallery/Tejas Hotel/','Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\nThe elegant, wood-floored tents come with ','by road by train',5,'YES'),(42,'Wai palace','pune - satara','Satara',145235,'4','Maharashtra','Property gallery/Wai palace/','The elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.','by road',8,'YES'),(43,'Nilesh plaza','koregaon','Satara',145235,'4','Maharashtra','Property gallery/Nilesh plaza/','The elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.','by train, by road',5,'YES'),(44,'ganga orchid','koregaon park','Pune',145235,'5','Maharashtra','Property gallery/ganga orchid/','Set on Ashvem Beach and overlooking the Arabian Sea, this upscale, lively resort comprised of luxury tents and a Spanish-style villa is 14 km from the 18th-century Chapora Fort. \r\n\r\nThe elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. ','by road by train',4,'YES'),(45,'Sun hotel','satara karad','Satara',145235,'3','Maharashtra','Property gallery/Sun hotel/','The elegant, wood-floored tents come with TVs, minibars and en suite bathrooms. Upgraded tents add separate bedrooms, outdoor showers and sea-view balconies. High-speed Internet and 24-hour room service are available. A chic, 6-bedroom villa is also offered.','by train by road',2,'YES'),(46,'Agintha','aurangabad','aurangabad',415325,'3','Maharashtra','Property gallery/Agintha/','Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ','by road by train',7,'YES'),(47,'Eliphanta','verul','aurangabad',415325,'3','Maharashtra','Property gallery/Eliphanta/','Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ','by plane by road',4,'YES'),(48,'vithhal ','Pune Airport Road','Pune',412105,'3','Maharashtra','Property gallery/vithhal /','Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ','by road by plane',3,'YES'),(49,'queen house','Kolhapur - Sangli','Jaysingpur',415236,'3','Maharashtra','Property gallery/queen house/','Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ','by road',8,'YES'),(50,'ajit villa','verul','aurangabad',415325,'3','Maharashtra','Property gallery/ajit villa/','Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, 1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ','by road',9,'YES'),(51,'Gokul Villa','aurangabad','aurangabad',415325,'3','Maharashtra','Property gallery/Gokul Villa/','Within the forests of Mahabaleshwar, this unassuming hotel is a 5-minute walk from the Vimal Gardens, \r\n          1.6 km from mountain views at Wilson Point and 1.8 km from Venna Lake. ','by plane by road by train',1,'YES'),(52,'Sonal Apartments','Ratnagiri - Kolhapur','Malkapur',412313,'3','Maharashtra','Property gallery/Sonal Apartments77148890/','Near to marleshwar,\r\namba ghat,\r\nand \r\npanhala','by road',3,'YES');
/*!40000 ALTER TABLE `property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_info`
--

DROP TABLE IF EXISTS `property_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_info`
--

LOCK TABLES `property_info` WRITE;
/*!40000 ALTER TABLE `property_info` DISABLE KEYS */;
INSERT INTO `property_info` VALUES (30,'10','10','Yes','veg,nonveg','Yes','Yes','Yes','Yes','Yes','Yes','Yes','13',15,'Yes','Yes','tv','','Rajwada&Royal','beach','','','Yes','18.525291498859197','73.82969340875252'),(31,'10','10','Yes','all type','Yes','Yes','No','Yes','Yes','No','No','15',19,'No','No','club available','dancing pub','royal','pune airport','','','Yes','18.525250807233114','73.85179481103523'),(32,'10','10','Yes','','Yes','Yes','No','No','No','No','No','15',19,'Yes','Yes','no entertainment','','nature','sunset point','dancing pub','','No','18.516949513053817','73.93376311853035'),(33,'10','10','Yes','veg,nonveg','Yes','Yes','Yes','Yes','Yes','No','No','15',18,'No','No','tv is there','','scenary','sunset point','','','No','18.500305018759757','73.93927774026497'),(34,'8','4','Yes','','Yes','Yes','No','Yes','No','No','No','10',18,'No','No','dancing club,Pub','','nature','malvan beach','','','No','18.757522862711898','73.40890845849617'),(35,'3','4','No','FISH- bangda, kolambi, surmai veg nonveg','Yes','Yes','Yes','Yes','Yes','No','Yes','8',13,'Yes','Yes','Folk dance  - koligit','----','Royal','low rates,','no','special','Yes','18.76597494331089','73.39405974938973'),(36,'6','3','Yes','FISH- bangda, kolambi, surmai veg nonveg','Yes','Yes','Yes','Yes','Yes','No','No','10',11,'No','Yes','Folk dance  - koligit','----','Royal','low rates,','no','special','No','18.031035963195674','74.00929412438973'),(37,'3','5','No','FISH- bangda, kolambi, surmai veg nonveg','Yes','No','No','Yes','No','Yes','No','11',13,'Yes','Yes','Folk dance  - koligit','lots of....','Royal','low rates,big playgraund','no','special','No','17.59696443925594','74.04499969079598'),(38,'3','3','No','FISH- bangda, kolambi, surmai veg nonveg','Yes','No','Yes','Yes','Yes','Yes','No','13',18,'No','Yes','Folk dance  - koligit','lots','Royal','low rates,big playgraund','no','special','No','16.837405360719327','74.62883784764676'),(39,'3','9','Yes','FISH- bangda, kolambi, surmai veg nonveg','Yes','No','Yes','Yes','Yes','Yes','No','9',10,'Yes','Yes','Folk dance  - koligit','----','nation','low rates,big playgraund','no','special','No','16.84206642168757','74.43158111169441'),(40,'3','5','No','FISH- bangda, kolambi, surmai veg nonveg','Yes','No','No','Yes','Yes','Yes','No','9',11,'No','Yes','Folk dance  - koligit','----','Royal','low rates,','no','special','No','18.760773713062758','73.38856658532723'),(41,'2','5','Yes','FISH- bangda, kolambi, surmai veg nonveg','Yes','No','No','Yes','No','Yes','Yes','10',3,'Yes','No','Folk dance  - koligit','lots of....','Royal','low rates,','no','special','No','18.012753151773225','74.33064422204598'),(42,'3','3','No','FISH- bangda, kolambi, surmai veg nonveg','Yes','No','No','Yes','No','No','Yes','13',15,'Yes','No','Folk dance  - koligit','lots of....','nation','low rates,big playground','no','special','Yes','17.95266770819475','73.90492400720223'),(43,'3','4','Yes','FISH- bangda, kolambi, surmai veg nonveg','Yes','Yes','Yes','Yes','Yes','No','Yes','11',13,'Yes','No','Folk dance  - koligit','lots','Royal','low rates,','no','special','Yes','17.72258753710582','74.04362639978035'),(44,'5','5','Yes','FISH- bangda, kolambi, surmai veg nonveg','Yes','No','Yes','Yes','No','No','Yes','8',12,'Yes','Yes','Folk dance  - koligit','----','Royal','low rates,','no','special','No','18.541201182346207','73.90595397546394'),(45,'3','6','Yes','FISH- bangda, kolambi, surmai veg nonveg','No','Yes','Yes','Yes','Yes','Yes','Yes','7',10,'Yes','No','Folk dance  - koligit','lots of....','nation','low rates,big playgraund','no','special','Yes','17.633613563719994','73.14137420251473'),(46,'3','5','No','FISH- bangda, kolambi, surmai veg nonveg','Yes','No','No','Yes','No','Yes','Yes','13',14,'Yes','Yes','Folk dance  - koligit','----','Royal','low rates,','no','special','Yes','18.50408985034481','73.82218322351082'),(47,'6','4','Yes','FISH- bangda, kolambi, surmai veg nonveg','Yes','No','Yes','No','No','No','Yes','4',4,'Yes','Yes','Folk dance  - koligit','lots of....','Royal','low rates,','no','special','Yes','20.293173826635336','75.14088592126473'),(48,'4','7','Yes','FISH- bangda, kolambi, surmai veg nonveg','Yes','Yes','Yes','Yes','Yes','Yes','Yes','10',17,'Yes','Yes','Folk dance  - koligit','lots of....','Royal','low rates,big playgraund','no','special','Yes','18.593599067078962','73.92140349938973'),(49,'8','8','Yes','FISH- bangda, kolambi, surmai veg nonveg','No','Yes','No','No','Yes','Yes','Yes','11',17,'Yes','Yes','Folk dance  - koligit','----','Royal','low rates,','no','special','Yes','18.048011159292706','73.95573577478035'),(50,'6','9','Yes','FISH- bangda, kolambi, surmai veg nonveg','Yes','No','Yes','Yes','No','Yes','Yes','12',16,'Yes','Yes','Folk dance  - koligit','----','Royal','tourist','no','special','Yes','18.398245878412762','73.6728378255616'),(51,'3','8','Yes','FISH- bangda, kolambi, surmai veg nonveg','Yes','Yes','Yes','Yes','Yes','Yes','Yes','10',14,'Yes','Yes','Folk dance  - koligit','lots of....','Royal','low rates,','no','special','Yes','19.973409288864893','75.26173553063973'),(52,'10','10','Yes','FISH- bangda, kolambi, surmai veg nonveg','Yes','Yes','Yes','Yes','Yes','Yes','Yes','15',19,'Yes','Yes','Folk dance  - koligit','lots of....','Royal','low rates,','no','special','Yes','16.91783382624729','73.92985782220467');
/*!40000 ALTER TABLE `property_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_owner_info`
--

DROP TABLE IF EXISTS `property_owner_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_owner_info`
--

LOCK TABLES `property_owner_info` WRITE;
/*!40000 ALTER TABLE `property_owner_info` DISABLE KEYS */;
INSERT INTO `property_owner_info` VALUES (1,30,'shri kharge','243252454','213213','gshgs@gmail.com','palus','2012-12-12','yes','yes'),(4,31,'Yogesh patil','9685741425',NULL,'yogesh@agile.com','pune','2016-02-09','yes','yes'),(5,32,'Samruddhi sane','8574142536','','ssane@agile.com','ratnagiri, maharashtra','2016-02-09','yes','yes'),(6,33,'Rajesh H','9632514792','','rajesh@agile.com','hadapsar pune','2016-02-09','yes','yes'),(7,34,'Ramesh Mane','9985741425',NULL,'rmane@agile.com','ratnagiri, maharashtra','2016-02-09','yes','yes'),(8,35,'Harsh das','9562305148','9562305148','hdas@agile.com','pune maharashtra','2016-02-09','',''),(9,36,'Ramchandra more','9562305148','','rmore@agile.com','at/p wai satara, maharashtra','2016-02-09','',''),(10,37,'Fatima mulla','9562344445','9562344445','fm@agile.com','satara maharashtra','2016-02-09','',''),(11,38,'Sandesh More','9562305148','','sandesh@agile.com','sangli miraj road sangli','2016-02-09','',''),(12,39,'Utkarsh dabade','9562305148','','ud@agile.com','jaysingpur Maharashtra','2016-02-09','',''),(13,40,'Ramesh Patil','9562305148','9562305148','rp@agile.com','lonawala pune','2016-02-09','',''),(14,41,'Mukesh talele','9562305148','','mt@agile.com','maharashtra','2016-02-09','',''),(15,42,'anand d','9562305148','','ad@agile.com','at/p wai dist - satara , maharashtra','2016-02-09','',''),(16,43,'nilesh pawar','9685741425','9652415874','nilesh@agile.com','satara maharashtra','2016-02-09','',''),(17,45,'Sidhesh Bhosale','8877445511','8855623140','sb@agile.com','at/p - ganapatipule ratnagiri','2016-02-09','',''),(18,46,'Ramesh Patil','9584741424','','rp@agile.com','atp wai satara','2016-02-09','',''),(19,47,'Naresh shintre','9355447842','','ns@agile.com','verul','2016-02-09','',''),(20,49,'ajit dada','9985741425','','ajit@gmail.com','pune maharashtra','2016-02-09','',''),(21,50,'milind agsd','8854714250','','umesh@agile.com','panshet dam','2016-02-09','',''),(22,51,'Narendra kenjale','9584741425','9061457847','nk@agile.com','aurangabad maharashtra','2016-02-09','',''),(23,52,'Vilas Galave','8574142536','9632147896','vilas@gmail.com','pune','2016-02-10','','');
/*!40000 ALTER TABLE `property_owner_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_type`
--

DROP TABLE IF EXISTS `property_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_type` (
  `property_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_type_name` varchar(45) NOT NULL,
  PRIMARY KEY (`property_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_type`
--

LOCK TABLES `property_type` WRITE;
/*!40000 ALTER TABLE `property_type` DISABLE KEYS */;
INSERT INTO `property_type` VALUES (1,'Villa'),(2,'Dormatory'),(3,'Apartment'),(4,'Bunglow'),(5,'Row House'),(6,'Cottage'),(7,'Hut'),(8,'House Boat'),(9,'Tree House');
/*!40000 ALTER TABLE `property_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_views`
--

DROP TABLE IF EXISTS `property_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_views` (
  `property_id` int(11) NOT NULL,
  `visit_datetime` datetime NOT NULL,
  `ip` binary(16) NOT NULL,
  `property_view_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`property_view_id`),
  KEY `PropertyId` (`property_id`),
  CONSTRAINT `property_views_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_views`
--

LOCK TABLES `property_views` WRITE;
/*!40000 ALTER TABLE `property_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `address` varchar(400) DEFAULT NULL,
  `account_active` varchar(5) DEFAULT NULL,
  `access_type` enum('user','admin') DEFAULT 'user',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name_UNIQUE` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (1,'admin','admin','admin','admin','admin','admin','admin','admin','admin'),(2,'agile','agile','shruti','kharge','1234567890','shruti@agile.com','pune','yes','user'),(3,'121','121','121','2121','2121','212',NULL,NULL,'user'),(4,'asas','asas','asas','asas','asas','as',NULL,NULL,'user'),(7,'asasaA','asasaA','asas','asasaA','asas','asas',NULL,NULL,'user'),(8,'wewe','wewewe','wew','ewe','wewe','wewe',NULL,NULL,'user');
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,'2016-03-01',1,'2016-03-02 00:00:00','2016-03-03 00:00:00','sdsdsdss','sd',12,2,32),(2,'2016-03-05',1,'2016-03-06 00:00:00','2016-03-07 00:00:00','sdsdsdss','ZZ',1212,3,33),(3,'2016-03-05',1,'2016-03-06 11:37:02','2016-03-07 11:37:19','none','none',1000,3,33),(4,'2016-03-07',1,'2016-03-08 11:38:45','2016-03-09 11:38:51','none','none',1000,3,33),(5,'2016-03-08',1,'2016-03-09 11:43:38','2016-03-10 11:43:46','none','none',1000,2,33),(6,'2016-03-08',1,'2016-03-08 11:44:24','2016-03-10 11:44:28','none','none',1000,3,33);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitors_info`
--

DROP TABLE IF EXISTS `visitors_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitors_info`
--

LOCK TABLES `visitors_info` WRITE;
/*!40000 ALTER TABLE `visitors_info` DISABLE KEYS */;
INSERT INTO `visitors_info` VALUES (37,'114.143.252.243','Pune','Maharashtra','IN',NULL,'2016-02-09','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(38,'49.248.86.148','Pune','Maharashtra','IN',NULL,'2016-02-09','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(39,'49.248.206.252','Pune','Maharashtra','IN',NULL,'2016-02-09','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(40,'114.143.17.130','','','IN',NULL,'2016-02-10','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(41,'123.252.211.87','Pune','Maharashtra','IN',NULL,'2016-02-10','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(42,'114.143.251.120','','','IN',NULL,'2016-02-10','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(43,'123.252.217.178','','','IN',NULL,'2016-02-11','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(44,'123.252.211.250','Pune','Maharashtra','IN',NULL,'2016-02-11','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(45,'49.248.197.201','','','IN',NULL,'2016-02-11','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(46,'123.252.147.61','','','IN',NULL,'2016-02-11','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(47,'114.143.245.152','','','IN',NULL,'2016-02-15','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(48,'123.252.240.118','Pune','Maharashtra','IN',NULL,'2016-02-15','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(49,'114.143.46.56','Pune','Maharashtra','IN',NULL,'2016-02-15','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(50,'49.248.200.171','Pune','Maharashtra','IN',NULL,'2016-02-15','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(51,'123.252.218.43','Pune','Maharashtra','IN',NULL,'2016-02-15','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(52,'49.248.83.7','','','IN',NULL,'2016-02-16','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(53,'114.143.253.115','Pune','Maharashtra','IN',NULL,'2016-02-16','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(54,'114.143.253.68','Pune','Maharashtra','IN',NULL,'2016-02-16','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(55,'123.252.218.22','Pune','Maharashtra','IN',NULL,'2016-02-16','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(56,'123.252.174.27','','','IN',NULL,'2016-02-17','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(57,'114.143.171.239','','','IN',NULL,'2016-02-17','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(58,'123.252.241.5','Pune','Maharashtra','IN',NULL,'2016-02-17','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(59,'114.143.17.18','','','IN',NULL,'2016-02-17','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(60,'114.143.245.179','','','IN',NULL,'2016-02-18','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(61,'103.8.148.36','Pune','Maharashtra','IN',NULL,'2016-02-18','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(62,'49.248.192.31','Pune','Maharashtra','IN',NULL,'2016-02-18','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(63,'114.143.251.70','','','IN',NULL,'2016-02-18','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(64,'114.143.254.67','','','IN',NULL,'2016-02-18','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(65,'123.252.174.59','','','IN',NULL,'2016-02-19','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(66,'123.252.171.204','','','IN',NULL,'2016-02-19','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(67,'114.143.251.142','','','IN',NULL,'2016-02-22','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(68,'49.248.72.208','Mumbai','Maharashtra','IN',NULL,'2016-02-22','18.9750,72.8258','AS17762 Tata Teleservices Maharashtra Ltd'),(69,'49.248.79.235','','','IN',NULL,'2016-02-22','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(70,'114.143.175.28','Pune','Maharashtra','IN',NULL,'2016-02-23','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(71,'49.248.156.123','Vikhroli','Maharashtra','IN',NULL,'2016-02-23','19.1000,72.9167','AS17762 Tata Teleservices Maharashtra Ltd'),(72,'114.143.169.20','','','IN',NULL,'2016-02-23','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(73,'49.248.207.24','Pune','Maharashtra','IN',NULL,'2016-02-23','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(74,'49.248.194.209','Pune','Maharashtra','IN',NULL,'2016-02-24','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(75,'103.3.43.193','','','IN',NULL,'2016-02-24','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(76,'114.143.255.210','','','IN',NULL,'2016-02-25','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(77,'49.248.73.56','Mumbai','Maharashtra','IN',NULL,'2016-02-25','18.9750,72.8258','AS17762 Tata Teleservices Maharashtra Ltd'),(78,'123.252.171.33','','','IN',NULL,'2016-02-25','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(79,'114.143.170.99','Pune','Maharashtra','IN',NULL,'2016-02-29','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(80,'202.189.235.14','','','IN',NULL,'2016-02-29','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(81,'49.248.92.23','','','IN',NULL,'2016-02-29','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(82,'114.143.247.107','','','IN',NULL,'2016-02-29','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(83,'123.252.213.1','Pune','Maharashtra','IN',NULL,'2016-02-29','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(84,'114.143.44.46','','','IN',NULL,'2016-02-29','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(85,'123.252.218.76','Pune','Maharashtra','IN',NULL,'2016-03-01','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(86,'114.143.47.83','','','IN',NULL,'2016-03-01','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(87,'123.252.197.217','','','IN',NULL,'2016-03-01','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(88,'123.252.148.8','','','IN',NULL,'2016-03-04','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(89,'114.143.255.55','','','IN',NULL,'2016-03-04','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(90,'49.248.156.3','Vikhroli','Maharashtra','IN',NULL,'2016-03-04','19.1000,72.9167','AS17762 Tata Teleservices Maharashtra Ltd'),(91,'103.3.43.177','','','IN',NULL,'2016-03-04','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(92,'114.143.245.53','','','IN',NULL,'2016-03-07','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(93,'123.252.215.75','Pune','Maharashtra','IN',NULL,'2016-03-07','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(94,'49.248.204.25','','','IN',NULL,'2016-03-07','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(95,'123.252.211.104','Pune','Maharashtra','IN',NULL,'2016-03-07','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(96,'114.143.174.3','Pune','Maharashtra','IN',NULL,'2016-03-07','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(97,'114.143.174.173','Pune','Maharashtra','IN',NULL,'2016-03-08','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(98,'123.252.215.166','Pune','Maharashtra','IN',NULL,'2016-03-08','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(99,'114.143.73.117','Pune','Maharashtra','IN',NULL,'2016-03-08','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(100,'123.252.220.209','','','IN',NULL,'2016-03-09','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(101,'114.143.247.188','','','IN',NULL,'2016-03-09','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(102,'123.252.252.246','','','IN',NULL,'2016-03-09','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(103,'49.248.198.55','Pune','Maharashtra','IN',NULL,'2016-03-10','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(104,'123.252.208.234','Pune','Maharashtra','IN',NULL,'2016-03-10','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(105,'123.252.208.77','Pune','Maharashtra','IN',NULL,'2016-03-11','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(106,'49.248.203.72','Pune','Maharashtra','IN',NULL,'2016-03-11','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(107,'123.252.242.117','','','IN',NULL,'2016-03-11','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(108,'49.248.72.106','Mumbai','Maharashtra','IN',NULL,'2016-03-14','18.9750,72.8258','AS17762 Tata Teleservices Maharashtra Ltd'),(109,'49.248.86.209','Pune','Maharashtra','IN',NULL,'2016-03-14','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(110,'103.3.41.101','','','IN',NULL,'2016-03-15','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(111,'103.8.150.185','Pune','Maharashtra','IN',NULL,'2016-03-15','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(112,'114.143.46.61','Pune','Maharashtra','IN',NULL,'2016-03-16','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(113,'103.8.151.132','','','IN',NULL,'2016-03-16','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(114,'114.143.177.157','','','IN',NULL,'2016-03-16','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(115,'114.143.75.109','','','IN',NULL,'2016-03-16','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(116,'114.143.43.31','Pune','Maharashtra','IN',NULL,'2016-03-17','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(117,'114.143.253.94','Pune','Maharashtra','IN',NULL,'2016-03-17','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(118,'49.248.203.67','Pune','Maharashtra','IN',NULL,'2016-03-17','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(119,'49.248.73.151','','','IN',NULL,'2016-03-17','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(120,'49.248.201.173','Vikhroli','Maharashtra','IN',NULL,'2016-03-17','19.1000,72.9167','AS17762 Tata Teleservices Maharashtra Ltd'),(121,'123.252.251.116','','','IN',NULL,'2016-03-18','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(122,'103.8.151.132','','','IN',NULL,'2016-03-18','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(123,'123.252.148.54','','','IN',NULL,'2016-03-18','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(124,'49.248.197.233','','','IN',NULL,'2016-03-18','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(125,'49.248.93.174','Mumbai','Maharashtra','IN',NULL,'2016-03-18','18.9750,72.8258','AS17762 Tata Teleservices Maharashtra Ltd'),(126,'49.248.157.54','Pune','Maharashtra','IN',NULL,'2016-03-19','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(127,'123.252.213.0','Pune','Maharashtra','IN',NULL,'2016-03-19','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(128,'49.248.201.124','Vikhroli','Maharashtra','IN',NULL,'2016-03-19','19.1000,72.9167','AS17762 Tata Teleservices Maharashtra Ltd'),(129,'49.248.73.50','','','IN',NULL,'2016-03-20','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(130,'123.252.253.216','','','IN',NULL,'2016-03-20','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(131,'123.252.253.34','','','IN',NULL,'2016-03-21','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd'),(132,'114.143.46.173','Pune','Maharashtra','IN',NULL,'2016-03-21','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(133,'103.8.149.18','Pune','Maharashtra','IN',NULL,'2016-03-22','18.5333,73.8667','AS17762 Tata Teleservices Maharashtra Ltd'),(134,'49.248.79.254','','','IN',NULL,'2016-03-23','20.0000,77.0000','AS17762 Tata Teleservices Maharashtra Ltd');
/*!40000 ALTER TABLE `visitors_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-23 12:18:00

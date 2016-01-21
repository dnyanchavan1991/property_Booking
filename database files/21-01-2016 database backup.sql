-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: hotelbook
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
  `AccomodationTypeId` int(10) NOT NULL COMMENT '1',
  `AccomodationTypeName` varchar(20) NOT NULL COMMENT '1bhk/2 bhk',
  PRIMARY KEY (`AccomodationTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
-- Table structure for table `ad_msg_template_table`
--

DROP TABLE IF EXISTS `ad_msg_template_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad_msg_template_table` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `template_content` text NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_msg_template_table`
--

LOCK TABLES `ad_msg_template_table` WRITE;
/*!40000 ALTER TABLE `ad_msg_template_table` DISABLE KEYS */;
INSERT INTO `ad_msg_template_table` VALUES (1,'Enq','Enquiry is done');
/*!40000 ALTER TABLE `ad_msg_template_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ad_property_owner_info`
--

DROP TABLE IF EXISTS `ad_property_owner_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad_property_owner_info` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `PropertyId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `registred_date` datetime NOT NULL,
  PRIMARY KEY (`owner_id`),
  KEY `PropertyId` (`PropertyId`),
  CONSTRAINT `ad_property_owner_info_ibfk_1` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_property_owner_info`
--

LOCK TABLES `ad_property_owner_info` WRITE;
/*!40000 ALTER TABLE `ad_property_owner_info` DISABLE KEYS */;
INSERT INTO `ad_property_owner_info` VALUES (1,2,'Rana J Singh','9878487875','ranasingh@gmail.com','shimla','2016-07-01 00:00:00');
/*!40000 ALTER TABLE `ad_property_owner_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_rent`
--

DROP TABLE IF EXISTS `audit_rent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_rent` (
  `PropertyId` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `special_price` double NOT NULL,
  `description` varchar(1500) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `RoomID` (`PropertyId`),
  CONSTRAINT `audit_rent_ibfk_1` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_rent`
--

LOCK TABLES `audit_rent` WRITE;
/*!40000 ALTER TABLE `audit_rent` DISABLE KEYS */;
INSERT INTO `audit_rent` VALUES (2,'0000-00-00 00:00:00','0000-00-00 00:00:00',500,'u will get an offer on sdhdgsfhgfdhgf',1),(18,'0000-00-00 00:00:00','0000-00-00 00:00:00',3333,'u will get an offer on sdhdgsfhgfdhgf',2);
/*!40000 ALTER TABLE `audit_rent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'shruti','kharge','palus','pune','maharashtra','india','416310','shrutikharge@gmail.com','8793851695','1212121212','1212','visa','41173','they will come upto 2323',NULL,NULL,NULL),(2,'snehal','gaikwad','palus','pune','maharashtra','india','416310','shrutikharge@gmail.com','8793851695','1212121212','1212','visa','41173','they will come upto 2323',NULL,NULL,NULL),(3,'Suhas','Khamkar','pune maharashtra','pune','maharashtra','india','411028','suhas@gmail.com','9922855214','021-232645','suhas','1512-2323-10','what','arriving...','gerg  rtbhrt trhrt ghrthjrt ryjhrrrrrrrnfv ',NULL,NULL),(4,'Balaji','Patil','sangli','sangli','maharashtra','india','400235','balaji@ymail.com','9874451415',NULL,'balaji','4562-5646','cfhc','fhjf','hjfjhf',NULL,NULL);
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
  `CustomerID` int(11) NOT NULL,
  `PropertyId` int(11) NOT NULL,
  `review_text` text NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `CustomerID` (`CustomerID`),
  KEY `PropertyId` (`PropertyId`),
  CONSTRAINT `customer_reviews_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_reviews_ibfk_2` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_reviews`
--

LOCK TABLES `customer_reviews` WRITE;
/*!40000 ALTER TABLE `customer_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentdetails`
--

DROP TABLE IF EXISTS `paymentdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentdetails` (
  `PaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `ReservationID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `PaymentMethodID` int(11) NOT NULL,
  `Comments` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `CustomerID` (`CustomerID`),
  KEY `ReservationID` (`ReservationID`),
  KEY `PaymentMethodID` (`PaymentMethodID`),
  CONSTRAINT `paymentdetails_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `paymentdetails_ibfk_2` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `paymentdetails_ibfk_3` FOREIGN KEY (`PaymentMethodID`) REFERENCES `paymentmethod` (`PaymentMethodID`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `PaymentMethodID` int(11) NOT NULL AUTO_INCREMENT,
  `PaymentMethod` varchar(100) NOT NULL,
  PRIMARY KEY (`PaymentMethodID`)
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
  `PropertyId` int(11) NOT NULL AUTO_INCREMENT,
  `PropertyName` varchar(20) NOT NULL,
  `Street` varchar(40) NOT NULL,
  `City` varchar(30) NOT NULL,
  `PostalCode` int(10) NOT NULL,
  `StarRate` varchar(10) NOT NULL,
  `State` varchar(30) NOT NULL,
  `ImagePath` varchar(200) NOT NULL,
  `location_map` varchar(1000) NOT NULL,
  `description` varchar(3000) NOT NULL,
  KEY `PropertyId` (`PropertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property`
--

LOCK TABLES `property` WRITE;
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
INSERT INTO `property` VALUES (2,'Vg Homes','g\'g\'g\'g\'g\'g','hjrtjtrj',415452,'','Assam','Admin/Property gallery/Himalay/','d','fsdfdsfsd\ndjhfgsjdhgfjsdh\nksdhfksdhfkdsjh\nsdlfhldshfglsdh\ndkjfgsdhgksdjh\nkjgfkshgkshkgjhkghkgjhgkh hgkjhkjdshfksjdhfkjh\ndksfhdkhkdjhkdjhkfj\nkjfdhjkjshfkjhskd\ndskkdjhkjhkj\nf\nfs\ndfs\nfdsfsdfds\nfds\nsf dsfds fds dsf fd fds fds fds fds'),(3,'','','',0,'','','','',''),(4,'agile','g\\\'g\\\'g\\\'g\\\'g\\\'g','ht',415452,'','Jammu and Kashmir','../Property gallery/agile/','g','g'),(5,'Vg Homes','g\'g\'g\'g\'g\'g','greg\'greg\'gerhge',415452,'','Karnataka','../Property gallery/Vg Homes','d','g'),(6,'agile properties','g\'g\'g\'g\'g\'g','greg\'greg\'gerhge',415452,'','Tripura','../Property gallery/agile properties/','tg','h'),(7,'Welcome apt','jik67k\'rtj\'ytjjjj','jty',415452,'','Sikkim','../Property gallery/Welcome apt/','yh','h'),(9,'mobile villa','hnj\'htrjh','greg\'greg\'gerhge',415452,'','Uttaranchal','Admin/Property gallery/mobile villa/','fc','rf'),(10,'nmbs','nghngn','hjrtjtrj',415452,'','Jharkhand','Admin/Property gallery/nmbs/','f','g'),(15,'Ganesh','rhrtj','jytj',457891,'','Maharashtra','Admin/Property gallery/Ganesh/','yutru','ytity'),(16,'Grand Hotel','Street','City',415452,'','Jammu and Kashmir','Admin/Property gallery/Grand Hotel/','Map Location','Description'),(17,'parl','lii','lili',0,'5','Jammu and Kashmir','Admin/Property gallery/parl/','gf','rg'),(18,'Himalay','jytjyuk','Shimla',488457,'5','Himachal Pradesh','Admin/Property gallery/Himalay/','google location string','amazing hotel that u cant find in shimla');
/*!40000 ALTER TABLE `property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_info`
--

DROP TABLE IF EXISTS `property_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_info` (
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
  `payment_facility` varchar(20) DEFAULT 'No',
  PRIMARY KEY (`PropertyId`),
  CONSTRAINT `property_info_ibfk_1` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_info`
--

LOCK TABLES `property_info` WRITE;
/*!40000 ALTER TABLE `property_info` DISABLE KEYS */;
INSERT INTO `property_info` VALUES (15,'ytity','ury','Yes','urturt','ureuru','rturtu','uryirt','urturt','urdurdu','urtu','NO'),(16,'Bedrooms','Bathrooms','No','Meals','EntertainMent','OtherAmenities','Theme','Attractions','Leisure Activitie','General','NO'),(17,'grfe','erg','Yes','reg','reg','reg','reg','reg','erg','reg','NO'),(18,'u','jy','Yes','uuykuyt,j56,j5,j5,j5uj,,uj56,ju','u54her,h.erherh,erwrh,erwhew','y5yhu45,hre,hre,he,herh','hth,4h,4,hh5h','h,4,h4h,56,56','rewgerwhgreg','ghreh','NO');
/*!40000 ALTER TABLE `property_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_views`
--

DROP TABLE IF EXISTS `property_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_views` (
  `PropertyId` int(11) NOT NULL,
  `visit_datetime` datetime NOT NULL,
  `ip` binary(16) NOT NULL,
  KEY `PropertyId` (`PropertyId`),
  CONSTRAINT `property_views_ibfk_1` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`) ON DELETE CASCADE ON UPDATE CASCADE
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
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
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
  KEY `RoomID` (`RoomID`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (2,'2015-12-05','2',2,'2015-12-04 00:00:00','2015-12-07 00:00:00','wewe','ew',500),(3,'2015-12-05','2',2,'2015-12-04 00:00:00','2015-12-09 00:00:00','wewe','ew',500);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
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
  KEY `AccomodationTypeId` (`AccomodationTypeId`),
  CONSTRAINT `room_ibfk_2` FOREIGN KEY (`AccomodationTypeId`) REFERENCES `accomodationtype` (`AccomodationTypeId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `room_ibfk_3` FOREIGN KEY (`PropertyId`) REFERENCES `property` (`PropertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES ('2',2,'neptune',1,123,12,12,12),('3',2,'galaxy',2,121,12,12,12),('4',18,'pluto',2,121,12,12,12);
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
  `browser` varchar(150) DEFAULT NULL,
  `date_visited` date NOT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitors_info`
--

LOCK TABLES `visitors_info` WRITE;
/*!40000 ALTER TABLE `visitors_info` DISABLE KEYS */;
INSERT INTO `visitors_info` VALUES (10,'123.252.241.135','Pune','Maharashtra','IN','','2016-01-14'),(11,'123.252.241.135','Pune','Maharashtra','IN','','2016-01-14'),(12,'123.252.241.135','Pune','Maharashtra','IN','','2016-01-14'),(13,'123.252.241.135','Pune','Maharashtra','IN','','2016-01-14'),(14,'123.252.241.135','Pune','Maharashtra','IN','','2016-01-14'),(15,'123.252.241.135','Pune','Maharashtra','IN','','2016-01-14'),(16,'123.252.241.135','Pune','Maharashtra','IN','','2016-01-14'),(17,'123.252.241.135','Pune','Maharashtra','IN','','2016-01-14'),(18,'123.252.241.135','Pune','Maharashtra','IN','','2016-01-14'),(19,'123.252.241.135','Pune','Maharashtra','IN','','2016-01-14'),(20,'49.248.85.164','','','IN',NULL,'2016-01-15'),(21,'49.248.85.164','','','IN',NULL,'2016-01-15'),(22,'49.248.85.164','','','IN',NULL,'2016-01-15'),(23,'49.248.85.164','','','IN',NULL,'2016-01-15'),(24,'49.248.85.164','','','IN',NULL,'2016-01-15');
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

-- Dump completed on 2016-01-19 17:07:34

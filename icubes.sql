-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: icubes
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.10.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activityLogs`
--

DROP TABLE IF EXISTS `activityLogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activityLogs` (
  `logId` int NOT NULL AUTO_INCREMENT,
  `tableName` varchar(50) NOT NULL DEFAULT '',
  `logAgainstId` int NOT NULL DEFAULT '1',
  `logData` text,
  `logTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`logId`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activityLogs`
--

LOCK TABLES `activityLogs` WRITE;
/*!40000 ALTER TABLE `activityLogs` DISABLE KEYS */;
INSERT INTO `activityLogs` VALUES (1,'users',19,'{\"previousData\":{\"userId\":\"19\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\",\"userRole\":\"admin,hod\",\"userPermissions\":\"\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-11 15:41:40\",\"updatedBy\":\"1\"},\"currentData\":{\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"updatedBy\":\"1\"}}','2020-12-11 15:50:41','bhupendruarkm36'),(2,'users',19,'{\"previousData\":{\"userId\":\"19\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-11 15:50:41\",\"updatedBy\":\"1\"},\"currentData\":{\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+911\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"updatedBy\":\"1\"}}','2020-12-11 15:52:41','bhupendruarkm36'),(3,'users',19,'{\"previousData\":{\"userId\":\"19\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-11 15:52:40\",\"updatedBy\":\"1\"},\"currentData\":{\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"updatedBy\":\"1\"}}','2020-12-11 15:53:22','bhupendruarkm36'),(4,'users',19,'{\"previousData\":{\"userId\":\"19\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-11 15:53:22\",\"updatedBy\":\"1\"},\"currentData\":{\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"userPermissions\":\"\",\"updatedBy\":\"1\"}}','2020-12-11 15:59:37','bhupendruarkm36'),(5,'users',19,'{\"previousData\":{\"userId\":\"19\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"userPermissions\":\"\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-11 15:59:36\",\"updatedBy\":\"1\"},\"currentData\":{\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"updatedBy\":\"1\"}}','2020-12-11 16:00:44','bhupendruarkm36'),(6,'users',19,'{\"previousData\":{\"userId\":\"19\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-11 16:00:44\",\"updatedBy\":\"1\"},\"currentData\":{\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"userPermissions\":\"\",\"updatedBy\":\"1\"}}','2020-12-11 16:01:41','bhupendruarkm36'),(7,'users',19,'{\"previousData\":{\"userId\":\"19\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"userPermissions\":\"\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-11 16:09:36\",\"updatedBy\":\"1\"},\"currentData\":{\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"updatedBy\":\"1\"}}','2020-12-11 17:11:29','bhupendruarkm36'),(8,'users',19,'{\"previousData\":{\"userId\":\"19\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-11 17:11:28\",\"updatedBy\":\"1\"},\"currentData\":{\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"userPermissions\":\"\",\"updatedBy\":\"1\"}}','2020-12-11 17:11:39','bhupendruarkm36'),(9,'users',19,'{\"previousData\":{\"userId\":\"19\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"userPermissions\":\"\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-11 17:11:39\",\"updatedBy\":\"1\"},\"currentData\":{\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"updatedBy\":\"1\"}}','2020-12-11 17:11:50','bhupendruarkm36'),(10,'users',19,'{\"previousData\":{\"userId\":\"19\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin\",\"userPermissions\":\"\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-11 17:11:50\",\"updatedBy\":\"1\"},\"currentData\":{\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"userPermissions\":\"\",\"updatedBy\":\"1\"}}','2020-12-11 17:34:23','bhupendruarkm36'),(11,'users',28,'{\"previousData\":{\"userId\":\"28\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userType\":\"company\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\",\"userRole\":\"admin,hod\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-17 14:24:17\",\"updatedBy\":\"1\"},\"currentData\":{\"userType\":\"company\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"updatedBy\":\"1\"}}','2020-12-17 14:25:57','bhupendrkruam140'),(12,'users',28,'{\"previousData\":{\"userId\":\"28\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userType\":\"company\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-17 14:25:57\",\"updatedBy\":\"1\"},\"currentData\":{\"userType\":\"individual\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"updatedBy\":\"1\"}}','2020-12-17 14:57:03','bhupendrkruam140'),(13,'users',28,'{\"previousData\":{\"userId\":\"28\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userType\":\"individual\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test.com\",\"userRole\":\"super admin,admin\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2020-12-23 13:14:34\",\"updatedBy\":\"1\"},\"currentData\":{\"userType\":\"individual\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\",\"userRole\":\"super admin,admin\",\"updatedBy\":\"1\"}}','2020-12-23 13:16:24','bhupendrkruam140'),(14,'users',28,'{\"previousData\":{\"userId\":\"28\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userType\":\"individual\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\",\"userRole\":\"super admin,admin\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2021-01-04 12:05:34\",\"updatedBy\":\"1\"},\"currentData\":{\"userType\":\"individual\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\",\"userRole\":\"super admin,admin,hod\",\"updatedBy\":\"1\"}}','2021-01-04 14:57:12','bhupendrkruam140'),(15,'users',28,'{\"previousData\":{\"userId\":\"28\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userType\":\"individual\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\",\"userRole\":\"super admin,admin,hod\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2021-01-04 14:57:12\",\"updatedBy\":\"1\"},\"currentData\":{\"userType\":\"individual\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\",\"userRole\":\"super admin,admin,hod,affiliate\",\"updatedBy\":\"1\"}}','2021-01-04 15:00:31','bhupendrkruam140'),(16,'users',28,'{\"previousData\":{\"userId\":\"28\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userType\":\"individual\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2021-01-04 15:00:31\",\"updatedBy\":\"1\"},\"currentData\":{\"userType\":\"individual\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com1\",\"updatedBy\":\"1\"}}','2021-01-04 15:11:41','bhupendrkruam140'),(17,'users',28,'{\"previousData\":{\"userId\":\"28\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userType\":\"individual\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com1\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2021-01-04 15:11:41\",\"updatedBy\":\"1\"},\"currentData\":{\"userType\":\"individual\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\",\"updatedBy\":\"1\"}}','2021-01-04 15:13:57','bhupendrkruam140'),(18,'users',28,'{\"previousData\":{\"userId\":\"28\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userType\":\"individual\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2021-01-05 13:20:33\",\"updatedBy\":\"1\"},\"currentData\":{\"updatedBy\":1,\"userType\":\"individual\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com1\"}}','2021-01-05 17:52:09','bhupendrkruam140'),(19,'users',28,'{\"previousData\":{\"userId\":\"28\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userType\":\"individual\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com1\",\"userStatus\":\"active\",\"isUserVerfied\":\"0\",\"updated\":\"2021-01-05 17:52:09\",\"updatedBy\":\"1\"},\"currentData\":{\"updatedBy\":1,\"userType\":\"individual\",\"userFullName\":\"bhupendra kumar dudhwal\",\"userCountryCode\":\"+91\",\"userCountry\":\"india\",\"userState\":\"haryana\",\"userCity\":\"gurugram\",\"userZipCode\":\"122018\",\"userWebsite\":\"test1.com\"}}','2021-01-05 17:52:21','bhupendrkruam140');
/*!40000 ALTER TABLE `activityLogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campAdvs`
--

DROP TABLE IF EXISTS `campAdvs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campAdvs` (
  `campAdvsId` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL DEFAULT '1',
  `campId` int NOT NULL DEFAULT '1',
  `campAdvsName` varchar(100) NOT NULL DEFAULT '',
  `campAdvsVertical` varchar(15) NOT NULL DEFAULT 'cpl',
  `campAdvsBasePrice` float NOT NULL DEFAULT '0',
  `campAdvsMaxPrice` float NOT NULL DEFAULT '0',
  `campAdvsStatus` enum('active','pause','blocked') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`campAdvsId`),
  UNIQUE KEY `users` (`userId`,`campId`),
  KEY `campId` (`campId`),
  CONSTRAINT `campAdvs_ibfk_1` FOREIGN KEY (`campId`) REFERENCES `campaigns` (`campId`),
  CONSTRAINT `campAdvs_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campAdvs`
--

LOCK TABLES `campAdvs` WRITE;
/*!40000 ALTER TABLE `campAdvs` DISABLE KEYS */;
INSERT INTO `campAdvs` VALUES (1,29,8,'bhupendra kumar dudhwal','cpl',0,0,'active'),(5,29,7,'bhupendra kumar dudhwal','cps',0,0,'active'),(8,29,15,'bhupendra kumar dudhwal','cpl',0,0,'active');
/*!40000 ALTER TABLE `campAdvs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campAffs`
--

DROP TABLE IF EXISTS `campAffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campAffs` (
  `campAffsId` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL DEFAULT '1',
  `campId` int NOT NULL DEFAULT '1',
  `campAffsName` varchar(100) NOT NULL DEFAULT '',
  `campAffsVertical` varchar(15) NOT NULL DEFAULT 'cpl',
  `campAffsBasePrice` float NOT NULL DEFAULT '0',
  `campAffsMaxPrice` float NOT NULL DEFAULT '0',
  `campAffsStatus` enum('active','pause','blocked') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`campAffsId`),
  UNIQUE KEY `affs` (`userId`,`campId`),
  KEY `campId` (`campId`),
  CONSTRAINT `campAffs_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  CONSTRAINT `campAffs_ibfk_2` FOREIGN KEY (`campId`) REFERENCES `campaigns` (`campId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campAffs`
--

LOCK TABLES `campAffs` WRITE;
/*!40000 ALTER TABLE `campAffs` DISABLE KEYS */;
INSERT INTO `campAffs` VALUES (1,1,7,'test1','cpl',0,0,'active'),(14,38,7,'test','cps',0,0,'active');
/*!40000 ALTER TABLE `campAffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campGeos`
--

DROP TABLE IF EXISTS `campGeos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campGeos` (
  `campGeoId` int NOT NULL AUTO_INCREMENT,
  `campId` int NOT NULL DEFAULT '1',
  `userId` int NOT NULL DEFAULT '0',
  `campGeo` text,
  PRIMARY KEY (`campGeoId`),
  UNIQUE KEY `camp_geos` (`campId`,`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campGeos`
--

LOCK TABLES `campGeos` WRITE;
/*!40000 ALTER TABLE `campGeos` DISABLE KEYS */;
INSERT INTO `campGeos` VALUES (1,7,12,'{\"india\":\"qw,ty,op,op\",\"usa\":\"ioio,po\"}'),(3,7,0,'{\"india\":\"qw,ty,op,op\",\"usa\":\"ioio,po\"}'),(10,7,13,'{\"india\":\"qw,ty,op,op\",\"usa\":\"ioio,po\"}'),(11,7,14,'{\"india\":\"qw,ty,op,op\",\"usa\":\"ioio,po\"}'),(12,7,15,'{\"india\":\"qw,ty,op,op\",\"usa\":\"ioio,po\"}');
/*!40000 ALTER TABLE `campGeos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campGoles`
--

DROP TABLE IF EXISTS `campGoles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campGoles` (
  `goalId` int NOT NULL AUTO_INCREMENT,
  `campId` int NOT NULL DEFAULT '1',
  `goalName` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`goalId`),
  UNIQUE KEY `goals` (`campId`,`goalName`)
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campGoles`
--

LOCK TABLES `campGoles` WRITE;
/*!40000 ALTER TABLE `campGoles` DISABLE KEYS */;
/*!40000 ALTER TABLE `campGoles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campaigns` (
  `campId` int NOT NULL AUTO_INCREMENT,
  `campScope` enum('international','domestic') NOT NULL DEFAULT 'domestic',
  `campCappingOn` enum('overall','affiliate','both') NOT NULL DEFAULT 'overall',
  `campCappingBase` enum('impression','click','conversion','goal') NOT NULL DEFAULT 'click',
  `campCappingFrq` enum('daily','weekly','monthly','yearly') NOT NULL DEFAULT 'daily',
  `campCapping` int NOT NULL DEFAULT '0',
  `isCapped` tinyint(1) NOT NULL DEFAULT '0',
  `campName` varchar(250) NOT NULL DEFAULT '',
  `campLogo` varchar(250) NOT NULL DEFAULT '',
  `campCur` varchar(5) NOT NULL DEFAULT '',
  `campBasePrice` float NOT NULL DEFAULT '0',
  `campMaxPrice` float NOT NULL DEFAULT '0',
  `campStartDate` varchar(10) NOT NULL DEFAULT '',
  `campEndDate` varchar(10) NOT NULL DEFAULT '',
  `campStatus` enum('active','pause','blocked','pending') NOT NULL DEFAULT 'pending',
  `campVisibility` enum('public','public approved','private') NOT NULL DEFAULT 'public',
  `landingUrl` varchar(255) NOT NULL DEFAULT '',
  `previewUrl` varchar(255) NOT NULL DEFAULT '',
  `isRedirected` tinyint(1) NOT NULL DEFAULT '0',
  `redirectOnCamp` int NOT NULL DEFAULT '0',
  `isGeoTargeted` tinyint(1) NOT NULL DEFAULT '0',
  `campCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `campCreatedBy` int NOT NULL DEFAULT '1',
  `campUpdated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `campUpdatedBy` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`campId`),
  KEY `campCreatedBy` (`campCreatedBy`),
  KEY `campUpdatedBy` (`campUpdatedBy`),
  CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`campCreatedBy`) REFERENCES `users` (`userId`),
  CONSTRAINT `campaigns_ibfk_2` FOREIGN KEY (`campUpdatedBy`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaigns`
--

LOCK TABLES `campaigns` WRITE;
/*!40000 ALTER TABLE `campaigns` DISABLE KEYS */;
INSERT INTO `campaigns` VALUES (1,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','2020-09-18','pending','private','string','string',0,0,1,'2020-12-23 12:46:24',28,'2020-12-23 12:46:24',28),(2,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','2020-02-14','pending','private','string','string',0,0,1,'2020-12-23 13:06:13',28,'2020-12-23 13:06:13',28),(3,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','2020-02-14','pending','private','string','string',0,0,1,'2020-12-23 13:08:40',28,'2020-12-23 13:08:40',28),(4,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-23 13:27:37',28,'2020-12-23 13:27:37',28),(5,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-23 13:30:28',28,'2020-12-23 13:30:28',28),(6,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-24 10:54:29',28,'2020-12-24 10:54:29',28),(7,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-24 11:09:52',28,'2020-12-24 11:09:52',28),(8,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-24 11:10:35',28,'2020-12-24 11:10:35',28),(9,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-24 14:52:30',28,'2020-12-24 14:52:30',28),(10,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-26 18:52:08',28,'2020-12-26 18:52:08',28),(11,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-26 18:52:42',28,'2020-12-26 18:52:42',28),(12,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-26 18:53:03',28,'2020-12-26 18:53:03',28),(13,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-28 17:03:04',28,'2020-12-28 17:03:04',28),(14,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-28 17:32:50',28,'2020-12-28 17:32:50',28),(15,'domestic','overall','click','daily',1000,1,'string','string','inr',1,2,'2020-02-14','','pending','private','string','string',0,0,1,'2020-12-28 17:34:42',28,'2020-12-28 17:34:42',28);
/*!40000 ALTER TABLE `campaigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `catId` int NOT NULL,
  `catName` varchar(50) NOT NULL DEFAULT '',
  `subCatName` varchar(50) NOT NULL DEFAULT '',
  `campId` int NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int NOT NULL DEFAULT '1',
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`catId`),
  UNIQUE KEY `cats` (`catName`,`subCatName`,`campId`),
  KEY `createdBy` (`createdBy`),
  KEY `updatedBy` (`updatedBy`),
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`createdBy`) REFERENCES `users` (`userId`),
  CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`updatedBy`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'entertainment','movies',1,'2020-12-02 16:46:32',1,'2020-12-02 16:48:23',1),(2,'entertainment','songs',1,'2020-12-22 11:03:39',1,'2020-12-22 11:03:39',1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companyInfo`
--

DROP TABLE IF EXISTS `companyInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companyInfo` (
  `companyId` int NOT NULL AUTO_INCREMENT,
  `companyName` varchar(200) NOT NULL DEFAULT '',
  `companyGstn` varchar(200) NOT NULL DEFAULT '',
  `companyCin` varchar(200) NOT NULL DEFAULT '',
  `companyPan` varchar(25) NOT NULL DEFAULT '',
  `companyMobile` varchar(15) NOT NULL DEFAULT '',
  `companyCountryCode` varchar(5) NOT NULL DEFAULT '',
  `companyAddress` varchar(255) NOT NULL DEFAULT '',
  `companyWebSite` varchar(200) NOT NULL DEFAULT '',
  `companyStatus` enum('active','inactive','blocked') NOT NULL DEFAULT 'active',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int NOT NULL DEFAULT '1',
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`companyId`),
  UNIQUE KEY `companyName` (`companyName`),
  UNIQUE KEY `companyGstn` (`companyGstn`),
  UNIQUE KEY `companyCin` (`companyCin`),
  UNIQUE KEY `companyPan` (`companyPan`),
  UNIQUE KEY `companyMobile` (`companyMobile`),
  KEY `createdBy` (`createdBy`),
  KEY `updatedBy` (`updatedBy`),
  CONSTRAINT `companyInfo_ibfk_1` FOREIGN KEY (`createdBy`) REFERENCES `users` (`userId`),
  CONSTRAINT `companyInfo_ibfk_2` FOREIGN KEY (`updatedBy`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companyInfo`
--

LOCK TABLES `companyInfo` WRITE;
/*!40000 ALTER TABLE `companyInfo` DISABLE KEYS */;
INSERT INTO `companyInfo` VALUES (1,'icubes','','','buvpd6675g','','+91','test pur','abc.com','active','2020-12-02 13:21:44',1,'2021-01-07 13:27:17',28),(4,'test pvt ltd','avcbghtyb2345tf','uigfghjgyuhuytrfghyg1','buvpd6676g','1234567890','+91','test pur','abc.com','active','2021-01-06 13:25:45',1,'2021-01-07 13:27:03',28),(5,'test pvt ltd1','avcbghtyb2345tp','uigfghjgyuhuytrfghyg9','buvpd6676k','1234567899','+91','test pur','abc.com','active','2021-01-07 13:39:25',28,'2021-01-07 13:40:51',28);
/*!40000 ALTER TABLE `companyInfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userAccessToken`
--

DROP TABLE IF EXISTS `userAccessToken`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userAccessToken` (
  `userId` int NOT NULL,
  `userAccessToken` varchar(50) NOT NULL DEFAULT '',
  `ipAddress` varchar(40) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vaildTill` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`),
  KEY `idx_userAccessToken` (`userAccessToken`),
  KEY `idx_ipAddress` (`ipAddress`),
  CONSTRAINT `userAccessToken_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userAccessToken`
--

LOCK TABLES `userAccessToken` WRITE;
/*!40000 ALTER TABLE `userAccessToken` DISABLE KEYS */;
INSERT INTO `userAccessToken` VALUES (1,'e1cdfb1077c6294b3c13dbd39bf319ec','127.0.0.1','2021-01-07 12:39:03','2021-01-08 12:39:03'),(26,'9c0508d79a31706b7657c54eb408156c','127.0.0.1','2020-12-17 11:32:03','2020-12-18 11:32:03'),(28,'b2c309dc54643ce6312dc4f54f5ec638','127.0.0.1','2021-01-07 13:17:55','2021-01-08 13:17:55');
/*!40000 ALTER TABLE `userAccessToken` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userBillingInfo`
--

DROP TABLE IF EXISTS `userBillingInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userBillingInfo` (
  `userId` int NOT NULL DEFAULT '1',
  `userName` varchar(100) NOT NULL DEFAULT '',
  `userPanNumber` varchar(20) NOT NULL DEFAULT '',
  `userAadharNumber` varchar(20) NOT NULL DEFAULT '',
  `userGstn` varchar(30) NOT NULL DEFAULT '',
  `userBankName` varchar(100) NOT NULL DEFAULT '',
  `userBankAddress` varchar(255) NOT NULL DEFAULT '',
  `userBankAccount` varchar(20) NOT NULL DEFAULT '',
  `userBankIfsc` varchar(15) NOT NULL DEFAULT '',
  `userSwiftNumber` varchar(15) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userPanNumber` (`userPanNumber`),
  UNIQUE KEY `userAadharNumber` (`userAadharNumber`),
  KEY `userBillingInfo_ibfk_1` (`createdBy`),
  KEY `userBillingInfo_ibfk_2` (`updatedBy`),
  CONSTRAINT `userBillingInfo_ibfk_1` FOREIGN KEY (`createdBy`) REFERENCES `users` (`userId`),
  CONSTRAINT `userBillingInfo_ibfk_2` FOREIGN KEY (`updatedBy`) REFERENCES `users` (`userId`),
  CONSTRAINT `userBillingInfo_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userBillingInfo`
--

LOCK TABLES `userBillingInfo` WRITE;
/*!40000 ALTER TABLE `userBillingInfo` DISABLE KEYS */;
INSERT INTO `userBillingInfo` VALUES (31,'bhupendra kumar dudhwal','buvpd6675g','2147483647','','kotak mahindra bank','noida','122','pytm0123456','','2021-01-06 21:46:38',1,'2021-01-06 21:47:48',1),(36,'bhupendra kumar dudhwal','buvpd6676g','334824601479','','kotak mahindra bank','noida','122','pytm0123456','','2021-01-06 22:13:14',1,'2021-01-06 22:13:14',NULL),(37,'bhupendra kumar','buvpd6677g','334824601470','','kotak mahindra bank','noida','122','pytm0123456','','2021-01-06 22:14:16',1,'2021-01-06 22:24:44',1),(42,'bhupendra kumar dudhwal','','0','','kotak mahindra bank','noida','122','pytm0123456','','2021-01-06 21:54:26',NULL,'2021-01-06 21:54:26',1);
/*!40000 ALTER TABLE `userBillingInfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userMappingIds`
--

DROP TABLE IF EXISTS `userMappingIds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userMappingIds` (
  `userMappingId` varchar(15) NOT NULL DEFAULT '',
  `userId` int NOT NULL DEFAULT '1',
  `status` enum('active','blocked') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`userMappingId`),
  KEY `userId` (`userId`),
  CONSTRAINT `userMappingIds_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userMappingIds`
--

LOCK TABLES `userMappingIds` WRITE;
/*!40000 ALTER TABLE `userMappingIds` DISABLE KEYS */;
INSERT INTO `userMappingIds` VALUES ('aff13',1,'active'),('aff14',1,'active'),('aff15',1,'active'),('aff16',1,'active'),('aff17',1,'active'),('aff18',1,'active'),('aff19',1,'active'),('aff20',1,'active'),('aff21',1,'active'),('aff22',1,'active'),('aff23',1,'active'),('aff24',44,'active'),('aff25',44,'active'),('aff26',44,'active'),('aff27',44,'active'),('aff28',44,'active');
/*!40000 ALTER TABLE `userMappingIds` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`admin`@`localhost`*/ /*!50003 TRIGGER `tg_userMappingIds_insert` BEFORE INSERT ON `userMappingIds` FOR EACH ROW BEGIN
  INSERT INTO userMappingIdsTemp () VALUES (NULL);
  SET NEW.userMappingId = CONCAT('aff', LAST_INSERT_ID());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `userMappingIdsTemp`
--

DROP TABLE IF EXISTS `userMappingIdsTemp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userMappingIdsTemp` (
  `userMappingId` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`userMappingId`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userMappingIdsTemp`
--

LOCK TABLES `userMappingIdsTemp` WRITE;
/*!40000 ALTER TABLE `userMappingIdsTemp` DISABLE KEYS */;
INSERT INTO `userMappingIdsTemp` VALUES (1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12),(13),(14),(15),(16),(17),(18),(19),(20),(21),(22),(23),(24),(25),(26),(27),(28);
/*!40000 ALTER TABLE `userMappingIdsTemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userPermissions`
--

DROP TABLE IF EXISTS `userPermissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userPermissions` (
  `permissionId` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `userRole` enum('super admin','admin','hod','manager','advertiser','affiliate') NOT NULL DEFAULT 'admin',
  `userPermission` varchar(255) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int NOT NULL DEFAULT '1',
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`permissionId`),
  UNIQUE KEY `userId` (`userId`,`userRole`),
  KEY `createdBy` (`createdBy`),
  KEY `updatedBy` (`updatedBy`),
  CONSTRAINT `userPermissions_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  CONSTRAINT `userPermissions_ibfk_2` FOREIGN KEY (`createdBy`) REFERENCES `users` (`userId`),
  CONSTRAINT `userPermissions_ibfk_3` FOREIGN KEY (`updatedBy`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userPermissions`
--

LOCK TABLES `userPermissions` WRITE;
/*!40000 ALTER TABLE `userPermissions` DISABLE KEYS */;
INSERT INTO `userPermissions` VALUES (1,1,'admin','{\"user\":\"create,view,edit\",\"campaign\":\"view,edit\",\"report\":\"create,view\",\"company\":\"view,create,edit\",\"permissions\":\"view,create,edit\",\"billing\":\"view,create,edit\"}','2020-12-14 16:56:33',1,'2021-01-07 10:51:10',1),(3,1,'hod','{\"user\":\"create,view,edit\",\"campaign\":\"view,edit\",\"report\":\"create,view\",\"company\":\"view,create,edit\",\"permissions\":\"view,create,edit\",\"billing\":\"view,create,edit\"}','2020-12-14 16:56:59',1,'2021-01-07 10:51:10',1),(6,26,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-16 14:43:00',1,'2020-12-16 14:43:00',1),(7,26,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-16 14:43:00',1,'2020-12-16 14:43:00',1),(8,27,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-16 15:31:28',1,'2020-12-16 15:31:28',1),(9,27,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-16 15:31:28',1,'2020-12-16 15:31:28',1),(12,29,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-17 14:58:15',1,'2020-12-17 14:58:15',1),(13,29,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-17 14:58:15',1,'2020-12-17 14:58:15',1),(14,30,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 10:26:31',1,'2020-12-28 10:26:31',1),(15,30,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:26:32',1,'2020-12-28 10:26:32',1),(16,31,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 10:29:29',1,'2020-12-28 10:29:29',1),(17,31,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:29:29',1,'2020-12-28 10:29:29',1),(18,32,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 10:30:16',1,'2020-12-28 10:30:16',1),(19,32,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:30:16',1,'2020-12-28 10:30:16',1),(20,33,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 10:31:32',1,'2020-12-28 10:31:32',1),(21,33,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:31:32',1,'2020-12-28 10:31:32',1),(22,34,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 10:33:13',1,'2020-12-28 10:33:13',1),(23,34,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:33:13',1,'2020-12-28 10:33:13',1),(24,34,'affiliate','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:33:13',1,'2020-12-28 10:33:13',1),(25,35,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 10:35:48',1,'2020-12-28 10:35:48',1),(26,35,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:35:48',1,'2020-12-28 10:35:48',1),(27,35,'affiliate','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:35:48',1,'2020-12-28 10:35:48',1),(28,36,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 10:46:33',1,'2020-12-28 10:46:33',1),(29,36,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:46:33',1,'2020-12-28 10:46:33',1),(30,36,'affiliate','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:46:33',1,'2020-12-28 10:46:33',1),(31,37,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 10:49:48',1,'2020-12-28 10:49:48',1),(32,37,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:49:48',1,'2020-12-28 10:49:48',1),(33,37,'affiliate','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:49:48',1,'2020-12-28 10:49:48',1),(34,38,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 10:56:34',1,'2020-12-28 10:56:34',1),(35,38,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:56:34',1,'2020-12-28 10:56:34',1),(36,38,'affiliate','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 10:56:34',1,'2020-12-28 10:56:34',1),(37,39,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 11:36:06',1,'2020-12-28 11:36:06',1),(38,39,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 11:36:06',1,'2020-12-28 11:36:06',1),(39,40,'admin','{\"user\":\"create,view\",\"campaign\":\"view,edit\",\"report\":\"create,view\"}','2020-12-28 12:25:13',1,'2020-12-28 12:25:13',1),(40,40,'hod','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2020-12-28 12:25:13',1,'2020-12-28 12:25:13',1),(56,41,'affiliate','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2021-01-05 12:59:16',1,'2021-01-05 12:59:16',1),(57,42,'affiliate','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2021-01-05 14:03:39',1,'2021-01-05 14:03:39',1),(58,43,'affiliate','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2021-01-05 14:05:35',1,'2021-01-05 14:05:35',1),(59,1,'super admin','{\"user\":\"create,view,edit\",\"campaign\":\"view,edit\",\"report\":\"create,view\",\"company\":\"view,create,edit\",\"permissions\":\"view,create,edit\",\"billing\":\"view,create,edit\"}','2021-01-05 15:19:30',1,'2021-01-07 10:51:10',1),(60,44,'affiliate','{\"user\":\"all\",\"campaign\":\"all\",\"report\":\"all\"}','2021-01-05 15:35:43',1,'2021-01-05 15:35:43',1),(88,28,'admin','{\"user\":\"view,edit,create\",\"company\":\"all\"}','2021-01-07 10:28:54',1,'2021-01-07 13:26:32',1),(89,28,'super admin','{\"user\":\"all\",\"campaign\":\"all\"}','2021-01-07 10:28:54',1,'2021-01-07 10:28:54',1),(90,28,'hod','{\"user\":\"all\"}','2021-01-07 10:28:54',1,'2021-01-07 10:28:54',1);
/*!40000 ALTER TABLE `userPermissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL DEFAULT '',
  `userFullName` varchar(100) NOT NULL DEFAULT '',
  `userEmail` varchar(200) NOT NULL DEFAULT '',
  `userMobile` varchar(15) NOT NULL DEFAULT '',
  `userType` enum('individual','company') NOT NULL DEFAULT 'individual',
  `userCountryCode` varchar(5) NOT NULL DEFAULT '',
  `userPassword` varchar(40) NOT NULL DEFAULT '',
  `isUserLoggedIn` tinyint(1) NOT NULL DEFAULT '0',
  `userLoginAttempts` tinyint(1) NOT NULL DEFAULT '0',
  `userLoginIp` varchar(50) NOT NULL DEFAULT '0',
  `userSignUpIp` varchar(50) NOT NULL DEFAULT '',
  `userSignUpAgent` varchar(255) NOT NULL DEFAULT '',
  `userLastLoginTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userAgent` varchar(255) NOT NULL DEFAULT '',
  `userCompanyId` int NOT NULL DEFAULT '1',
  `userCountry` varchar(50) NOT NULL DEFAULT '',
  `userState` varchar(50) NOT NULL DEFAULT '',
  `userCity` varchar(50) NOT NULL DEFAULT '',
  `userZipCode` varchar(10) NOT NULL DEFAULT '',
  `userWebsite` varchar(100) NOT NULL DEFAULT '',
  `userRole` varchar(100) NOT NULL DEFAULT 'admin',
  `userStatus` enum('active','inactive','blocked') NOT NULL DEFAULT 'active',
  `isUserVerfied` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int NOT NULL DEFAULT '0',
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName` (`userName`),
  UNIQUE KEY `userEmail` (`userEmail`),
  UNIQUE KEY `userMobile` (`userMobile`),
  KEY `userCompanyId` (`userCompanyId`),
  KEY `updatedBy` (`updatedBy`),
  KEY `createdBy` (`createdBy`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userCompanyId`) REFERENCES `companyInfo` (`companyId`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`updatedBy`) REFERENCES `users` (`userId`),
  CONSTRAINT `users_ibfk_3` FOREIGN KEY (`createdBy`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'bhupendrakumardudhwal','bhupendra kumar dudhwal','bhupendra.d@icubeswire.com','7827949354','individual','+91','25d55ad283aa400af464c76d713c07ad',1,0,'127.0.0.1','','','2021-01-07 12:39:03','PostmanRuntime/7.26.8',4,'','','','','','admin,hod','active',0,'2020-12-02 13:29:45',1,'2021-01-07 12:39:03',1),(26,'bhupendrkaurm92','bhupendra kumar dudhwal','bhupendra.d13@icubeswire.com','7827949366','individual','+91','25d55ad283aa400af464c76d713c07ad',1,0,'127.0.0.1','127.0.0.1','PostmanRuntime/7.26.8','2020-12-17 11:32:03','PostmanRuntime/7.26.8',1,'india','haryana','gurugram','122018','test1.com','admin,hod','active',0,'2020-12-16 14:43:00',1,'2020-12-17 11:32:03',1),(27,'bhupendraumkr19','bhupendra kumar dudhwal','bhupendra.d1@icubeswire.com','7827949360','individual','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-16 15:31:28','',1,'india','haryana','gurugram','122018','test1.com','admin,hod','active',0,'2020-12-16 15:31:28',1,'2020-12-16 15:31:28',1),(28,'bhupendrkruam140','bhupendra kumar dudhwal','bhupendra.d2@icubeswire.com','7827949361','individual','+91','25d55ad283aa400af464c76d713c07ad',1,0,'127.0.0.1','127.0.0.1','PostmanRuntime/7.26.8','2021-01-07 13:17:55','PostmanRuntime/7.26.8',5,'india','haryana','gurugram','122018','test1.com','admin,super admin,hod','active',0,'2020-12-17 13:31:39',1,'2021-01-07 13:40:51',1),(29,'bhupendrrmaku24','bhupendra kumar dudhwal','bhupendra.d3@icubeswire.com','7827949362','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-17 14:58:14','',1,'india','haryana','gurugram','122018','test1.com','admin,hod','active',0,'2020-12-17 14:58:14',1,'2020-12-17 14:58:14',1),(30,'bhupendruramk47','bhupendra kumar dudhwal','bhupendra.d4@icubeswire.com','7827949363','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 10:26:30','',1,'india','haryana','gurugram','122018','test1.com','admin,hod,affiliate','active',0,'2020-12-28 10:26:30',1,'2020-12-28 10:26:30',1),(31,'bhupendramkur67','bhupendra kumar dudhwal','bhupendra.d5@icubeswire.com','7827949364','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 10:29:29','',1,'india','haryana','gurugram','122018','test1.com','admin,hod,affiliate','active',0,'2020-12-28 10:29:29',1,'2020-12-28 10:29:29',1),(32,'bhupendrruakm0','bhupendra kumar dudhwal','bhupendra.d6@icubeswire.com','7827949365','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 10:30:16','',1,'india','haryana','gurugram','122018','test1.com','admin,hod,affiliate','active',0,'2020-12-28 10:30:16',1,'2020-12-28 10:30:16',1),(33,'bhupendrkaumr160','bhupendra kumar dudhwal','bhupendra.d7@icubeswire.com','7827949367','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 10:31:32','',1,'india','haryana','gurugram','122018','test1.com','admin,hod,affiliate','active',0,'2020-12-28 10:31:32',1,'2020-12-28 10:31:32',1),(34,'bhupendrkaurm145','bhupendra kumar dudhwal','bhupendra.d8@icubeswire.com','7827949368','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 10:33:13','',1,'india','haryana','gurugram','122018','test1.com','admin,hod,affiliate','active',0,'2020-12-28 10:33:13',1,'2020-12-28 10:33:13',1),(35,'bhupendrkrmau49','bhupendra kumar dudhwal','bhupendra.d9@icubeswire.com','7827949369','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 10:35:48','',1,'india','haryana','gurugram','122018','test1.com','admin,hod,affiliate','active',0,'2020-12-28 10:35:48',1,'2020-12-28 10:35:48',1),(36,'bhupendrrmkua24','bhupendra kumar dudhwal','bhupendra.d91@icubeswire.com','7827949371','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 10:46:33','',1,'india','haryana','gurugram','122018','test1.com','admin,hod,affiliate','active',0,'2020-12-28 10:46:33',1,'2020-12-28 10:46:33',1),(37,'bhupendrrakmu160','bhupendra kumar dudhwal','bhupendra.d22@icubeswire.com','7827949372','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 10:49:48','',1,'india','haryana','gurugram','122018','test1.com','admin,hod,affiliate','active',0,'2020-12-28 10:49:48',1,'2020-12-28 10:49:48',1),(38,'bhupendrkuamr190','bhupendra kumar dudhwal','bhupendra.d21@icubeswire.com','7827949373','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 10:56:34','',1,'india','haryana','gurugram','122018','test1.com','admin,hod,affiliate','active',0,'2020-12-28 10:56:34',1,'2020-12-28 10:56:34',1),(39,'bhupendrmurka117','bhupendra kumar dudhwal','bhupendra.d24@icubeswire.com','7827949374','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 11:36:06','',1,'india','haryana','gurugram','122018','test1.com','admin,hod','active',0,'2020-12-28 11:36:06',1,'2020-12-28 11:36:06',1),(40,'[removed]alert&#40;\'ko\'&#41;[removed]','[removed]alert&#40;\'ko\'&#41;[removed]','bhupendra.d29@icubeswire.com','7827949379','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2020-12-28 12:25:13','',1,'india','haryana','gurugram','122018','test1.com','admin,hod','active',0,'2020-12-28 12:25:13',1,'2020-12-28 12:25:13',1),(41,'bhupendrumakr174','bhupendra kumar dudhwal','bhupendra.d39@icubeswire.com','7827949381','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2021-01-05 12:59:16','',1,'india','haryana','gurugram','122018','test1.com','affiliate','active',0,'2021-01-05 12:59:16',1,'2021-01-05 12:59:16',1),(42,'bhupendrkmuar41','bhupendra kumar dudhwal','bhupendra.d49@icubeswire.com','7827949387','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2021-01-05 14:03:39','',1,'india','haryana','gurugram','122018','test1.com','affiliate','active',0,'2021-01-05 14:03:39',1,'2021-01-05 14:03:39',1),(43,'bhupendrakrmu132','bhupendra kumar dudhwal','bhupendra.d79@icubeswire.com','7827949388','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2021-01-05 14:05:34','',1,'india','haryana','gurugram','122018','test1.com','affiliate','active',0,'2021-01-05 14:05:34',1,'2021-01-05 14:05:34',1),(44,'bhupendraurkm59','bhupendra kumar dudhwal','bhupendra.d99@icubeswire.com','7827949398','company','+91','25d55ad283aa400af464c76d713c07ad',0,0,'0','127.0.0.1','PostmanRuntime/7.26.8','2021-01-05 15:35:42','',1,'india','haryana','gurugram','122018','test1.com','affiliate','active',0,'2021-01-05 15:35:42',1,'2021-01-05 15:35:42',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verticals`
--

DROP TABLE IF EXISTS `verticals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `verticals` (
  `verticalId` int NOT NULL AUTO_INCREMENT,
  `verticalName` varchar(10) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBY` int NOT NULL DEFAULT '1',
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBY` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`verticalId`),
  UNIQUE KEY `verticalName` (`verticalName`),
  KEY `createdBY` (`createdBY`),
  KEY `updatedBY` (`updatedBY`),
  CONSTRAINT `verticals_ibfk_1` FOREIGN KEY (`createdBY`) REFERENCES `users` (`userId`),
  CONSTRAINT `verticals_ibfk_2` FOREIGN KEY (`updatedBY`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verticals`
--

LOCK TABLES `verticals` WRITE;
/*!40000 ALTER TABLE `verticals` DISABLE KEYS */;
INSERT INTO `verticals` VALUES (1,'cpl','2020-12-28 11:44:13',1,'2020-12-28 11:44:13',1),(2,'cpc','2020-12-28 11:44:13',1,'2020-12-28 11:44:13',1),(3,'cpa','2020-12-28 11:44:13',1,'2020-12-28 11:44:13',1),(4,'cps','2020-12-28 11:44:13',1,'2020-12-28 11:44:13',1);
/*!40000 ALTER TABLE `verticals` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-07 14:55:36

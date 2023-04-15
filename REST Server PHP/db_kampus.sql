/*
SQLyog Enterprise v12.4.3 (64 bit)
MySQL - 10.1.25-MariaDB : Database - db_kampus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kampus` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_kampus`;

/*Table structure for table `tstudent` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  
  `nim` char(8) PRIMARY KEY,
  `name` varchar(200) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



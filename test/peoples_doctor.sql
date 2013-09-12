-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2013 at 05:14 PM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `peoples_doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(10) NOT NULL,
  `lat` int(10) NOT NULL,
  `long` int(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int(7) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(200) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `current_hospital` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `qualification_id` int(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(3) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`doctor_id`),
  KEY `qualification_id` (`qualification_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) NOT NULL,
  `lat` int(10) NOT NULL,
  `long` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `age` int(3) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `parent_guardian` varchar(100) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_request`
--

CREATE TABLE IF NOT EXISTS `patient_request` (
  `request_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `schedule_id` int(10) NOT NULL,
  `problem_history` varchar(500) NOT NULL,
  `actual_date_of_consultation` date NOT NULL,
  `time_of_consultation` time NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `schedule_id` (`schedule_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `qualification_id` int(10) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `university` varchar(20) NOT NULL,
  PRIMARY KEY (`qualification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request_status_change`
--

CREATE TABLE IF NOT EXISTS `request_status_change` (
  `Status_Change_id` int(10) NOT NULL,
  `Status_from` varchar(20) NOT NULL,
  `Status_to` varchar(20) NOT NULL,
  `Actor` varchar(20) NOT NULL,
  PRIMARY KEY (`Status_Change_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `location_id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`schedule_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE IF NOT EXISTS `speciality` (
  `speciality_id` int(10) NOT NULL,
  `speciality` varchar(200) NOT NULL,
  PRIMARY KEY (`speciality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `speciality_sub_speciality_link`
--

CREATE TABLE IF NOT EXISTS `speciality_sub_speciality_link` (
  `speciality_sub_speciality_link_id` int(10) NOT NULL,
  `sub_speciality_id` int(10) NOT NULL,
  `speciality_id` int(10) NOT NULL,
  PRIMARY KEY (`speciality_sub_speciality_link_id`),
  KEY `speciality_id` (`speciality_id`),
  KEY `sub_speciality_id` (`sub_speciality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_speciality`
--

CREATE TABLE IF NOT EXISTS `sub_speciality` (
  `sub_speciality_id` int(10) NOT NULL,
  `speciality` varchar(200) NOT NULL,
  PRIMARY KEY (`sub_speciality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`qualification_id`) REFERENCES `qualification` (`qualification_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_request`
--
ALTER TABLE `patient_request`
  ADD CONSTRAINT `patient_request_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_request_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`) ON DELETE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE;

--
-- Constraints for table `speciality_sub_speciality_link`
--
ALTER TABLE `speciality_sub_speciality_link`
  ADD CONSTRAINT `speciality_sub_speciality_link_ibfk_1` FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`speciality_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `speciality_sub_speciality_link_ibfk_2` FOREIGN KEY (`sub_speciality_id`) REFERENCES `sub_speciality` (`sub_speciality_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

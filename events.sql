-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2023 at 01:40 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `participation_id` char(40) DEFAULT NULL,
  `employee_name` char(20) DEFAULT NULL,
  `employee_mail` char(30) DEFAULT NULL,
  `event_id` char(10) DEFAULT NULL,
  `event_name` char(20) DEFAULT NULL,
  `participation_fee` decimal(10,2) DEFAULT NULL,
  `event_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `version` char(10) DEFAULT NULL,
  KEY `employee_name` (`employee_name`),
  KEY `event_name` (`event_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`participation_id`, `employee_name`, `employee_mail`, `event_id`, `event_name`, `participation_fee`, `event_date`, `version`) VALUES
('1', 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-syst', '1', 'PHP 7 crash course', '0.00', '2019-09-03 18:00:00', NULL),
('2', 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-syst', '2', 'International PHP Co', '1485.99', '2019-10-20 18:00:00', NULL),
('3', 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx', '2', 'International PHP Co', '657.50', '2019-10-20 18:00:00', NULL),
('4', 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-sy', '1', 'PHP 7 crash course', '0.00', '2019-09-03 18:00:00', NULL),
('5', 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems', '1', 'PHP 7 crash course', '0.00', '2019-09-03 18:00:00', NULL),
('6', 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems', '2', 'International PHP Co', '657.50', '2019-10-21 02:00:00', '1.1.3'),
('7', 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-syst', '3', 'code.talks', '474.81', '2019-10-23 18:00:00', NULL),
('8', 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-sy', '3', 'code.talks', '534.31', '2019-10-23 18:00:00', '1.1.3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

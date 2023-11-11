-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 11, 2023 at 10:52 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_avance2`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `booking_start` date NOT NULL,
  `booking_end` date NOT NULL,
  `hotel_id` int NOT NULL,
  `room_id` int NOT NULL,
  `booking_date` timestamp NOT NULL,
  `client_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `client_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_start`, `booking_end`, `hotel_id`, `room_id`, `booking_date`, `client_name`, `client_email`) VALUES
(71, '2023-11-03', '2023-11-05', 3, 2, '2023-11-11 22:21:45', 'cri', 'free@g.com'),
(72, '2023-11-03', '2023-11-05', 1, 2, '2023-11-11 22:22:45', 'cri', 'free@g.com'),
(73, '2023-11-03', '2023-11-05', 2, 2, '2023-11-11 22:24:16', 'cri', 'free@g.com'),
(74, '2023-11-03', '2023-11-05', 2, 1, '2023-11-11 22:28:19', 'cri', 'free@g.com'),
(75, '2023-11-03', '2023-11-05', 3, 1, '2023-11-11 22:28:51', 'cri', 'free@g.com'),
(76, '2023-11-03', '2023-11-05', 1, 2, '2023-11-11 22:29:12', 'cri', 'free@g.com'),
(77, '2023-11-03', '2023-11-05', 1, 2, '2023-11-11 22:29:30', 'cri', 'free@g.com');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hotel_adress` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_adress`) VALUES
(1, 'Hotel ABC', '123 Main Street, City A'),
(2, 'Hotel XYZ', '456 Elm Street, City B'),
(3, 'Hotel 123', '789 Oak Street, City C');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int NOT NULL AUTO_INCREMENT,
  `room_number` int NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_number`) VALUES
(1, 0),
(2, 0),
(3, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

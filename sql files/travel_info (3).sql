-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2018 at 05:03 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fairway`
--

-- --------------------------------------------------------

--
-- Table structure for table `travel_info`
--

DROP TABLE IF EXISTS `travel_info`;
CREATE TABLE IF NOT EXISTS `travel_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_travel` varchar(255) NOT NULL,
  `from_` varchar(255) DEFAULT NULL,
  `to_` varchar(255) DEFAULT NULL,
  `travel_status` varchar(255) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `fare_km` double DEFAULT NULL,
  `da` double DEFAULT NULL,
  `remarks` text,
  `user_id` int(11) DEFAULT NULL,
  `entry_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_info`
--

INSERT INTO `travel_info` (`id`, `date_of_travel`, `from_`, `to_`, `travel_status`, `distance`, `fare_km`, `da`, `remarks`, `user_id`, `entry_time`) VALUES
(1, '29-08-2018', 'US', 'UK', 'Ex-Headquarter', 222, 22, 22, '23', 15, '2018-09-02 19:36:29'),
(2, '29-08-2018', 'uk', 'UK', 'Ex-Headquarter', 22, 22, 2222, 'no', 15, '2018-09-01 19:37:26'),
(3, '29-08-2018', 'US', 'UK', 'Ex-Headquarter', 23, 33, 23, '', 18, '2018-09-03 19:40:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

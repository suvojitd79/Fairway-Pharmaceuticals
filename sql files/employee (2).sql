-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2018 at 05:02 AM
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
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `mb_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `aadhar` varchar(255) DEFAULT NULL,
  `id_file` varchar(255) DEFAULT NULL,
  `remarks` text,
  `entry_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `designation`, `mb_number`, `email`, `password`, `address`, `district`, `aadhar`, `id_file`, `remarks`, `entry_time`, `status`) VALUES
(1, 'admin', 'admin', NULL, 'admin@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, '2018-08-14 21:24:03', 'Active'),
(19, 'Raghav', 'Medical Representative', '', 'raghav@gmail.com', '111', ' ', ' ', '', 'upload_image/5b756942d3e17.', ' ', '2018-08-16 17:38:34', 'Active'),
(18, 'Saurabh', 'Medical Representative', '', 'saurabh@gmail.com', '123456789', ' ', ' ', '', 'upload_image/5b7568172f296.', ' ', '2018-08-16 17:33:35', 'Active'),
(17, 'samio', 'Offer Visitor', '07980179837', 'ov@gmail.com', '123', 'Block- 6, 2 Anandapally west, purbaputiary kolkata-93', ' ssss', '23', 'upload_image/5b74525b78f6e.jpg', ' 632', '2018-08-15 21:48:35', 'Active'),
(16, 'Steve Jobs ', 'Regional Manager', '07980179837', 'rm@gmail.com', '123', 'Block- 6, 2 Anandapally west, purbaputiary kolkata-93', '', '', '', '', '2018-08-15 18:22:37', 'Active'),
(15, 'Suvojit Das', 'Medical Representative', '07980179837', 'mr@gmail.com', '123', 'Block- 6, 2 Anandapally west, purbaputiary kolkata-93', '', '', '', '', '2018-08-15 18:21:55', 'Active'),
(20, 'Suvojit', 'Medical Representative', '', 'ov1@gmail.com', '123', ' ', ' ', '', '', ' ', '2018-08-25 22:48:13', 'Active'),
(21, 'Suvojit Kumar', 'Medical Representative', '56985', 'ov2@gmail.com', '123', 'sss', ' ', '', '', ' ', '2018-08-29 21:08:47', 'Active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `free` int(11) DEFAULT NULL,
  `description` text,
  `validity` varchar(255) DEFAULT NULL,
  `entry_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `title`, `product`, `image`, `quantity`, `free`, `description`, `validity`, `entry_time`) VALUES
(14, 'rrr', '10', 'upload_image/5b9c0130a28b9.jpg', 100, 37, '', '2019-10-19', '2018-09-15 00:12:56'),
(13, 'sss', '3', 'upload_image/5b9bc0eecb565.jpg', 100, 10, '22', '2018-09-15', '2018-09-14 19:38:46'),
(12, 'Suvojit', '8', 'upload_image/5b9ba3b500bfb.jpg', 500, 200, '', '2018-09-15', '2018-09-14 17:34:05'),
(11, 'test1', '4', 'upload_image/5b9b9ee5bccb1.jpg', 100, 10, 'hheelel', '2018-09-15', '2018-09-14 17:13:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

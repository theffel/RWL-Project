-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2015 at 02:19 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rwl`
--

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE IF NOT EXISTS `farm` (
  `farm_id` int(5) NOT NULL,
  `farm_name` text NOT NULL,
  `farm_civic_num` text NOT NULL,
  `farm_address` text NOT NULL,
  `farm_phone` text NOT NULL,
  `farm_contact` text NOT NULL,
  `farm_email` text NOT NULL,
  PRIMARY KEY (`farm_id`),
  UNIQUE KEY `farm_id` (`farm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`farm_id`, `farm_name`, `farm_civic_num`, `farm_address`, `farm_phone`, `farm_contact`, `farm_email`) VALUES
(1, 'fwaefa', 'wrvawrg', 'ehstrhb', 'sethr', 'sdtae', 'serg'),
(2, 'abfea', 'eabeth', 'rshbrh', 'rseth', 'awrgesth', 'srthbrst');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

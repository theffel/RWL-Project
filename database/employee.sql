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
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_type` int(2) unsigned NOT NULL,
  `emp_sin` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_first_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `emp_last_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `emp_middle_initial` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `emp_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_postal_code` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `emp_gender` tinyint(1) unsigned NOT NULL COMMENT '0 - male, 1 - female',
  `emp_dob` date NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

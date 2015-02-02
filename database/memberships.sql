-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2015 at 02:51 PM
-- Server version: 5.5.27
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `r2r_beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE IF NOT EXISTS `memberships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postal` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alternate_no` varchar(15) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `user_id`, `parent_id`, `first_name`, `last_name`, `address_1`, `address_2`, `city`, `state`, `country`, `postal`, `phone`, `alternate_no`, `email`, `modified`, `created`) VALUES
(10, 34, NULL, 'mlningdgd', 'qrv', '113, st city', '', 'Kembvala', 'state_prov', 'Australia', '2423434', '8739274637', '2910384627', '', '2014-10-25 06:42:39', '2014-10-12 14:13:54'),
(11, 35, 10, 'Test', 'User', '113, st city', '', 'Kembvala', 'state_prov', 'Australia', '2423434', '7348219474', '2910384627', 'testuser@yopmail.com', '2014-10-12 14:13:54', '2014-10-12 14:13:54'),
(13, 7, NULL, 'dgdf', 'dfgfd', 'dfgf', 'dfgfdg', 'dfg', 'Burgenland', 'Austria', '345435', '45654', '456', '', '2014-10-25 10:04:52', '2014-10-25 10:04:52'),
(49, 74, NULL, 'test', 'testing', '123, addresss1', '', 'city', 'Acklins and Crooked Islands', 'The Bahamas', '23456', '23455', '345422', '', '2014-10-28 12:54:49', '2014-10-28 12:54:49'),
(50, 75, NULL, 'test', 'testing', '123, addresss1', '', 'city', 'Acklins and Crooked Islands', 'The Bahamas', '23456', '23455', '345422', '', '2014-10-28 12:55:32', '2014-10-28 12:55:32'),
(51, 76, NULL, 'test', 'testing', '123, addresss1', '', 'city', 'Acklins and Crooked Islands', 'The Bahamas', '23456', '23455', '345422', '', '2014-10-28 12:56:19', '2014-10-28 12:56:19'),
(52, 77, NULL, 'test', 'nik', 'sdgdfh', 'qgdhfg', 'erjhg', 'Rock Sound', 'The Bahamas', '23546', '3645', '3546', '', '2014-10-28 13:25:56', '2014-10-28 13:25:56'),
(53, 78, NULL, 'dello', 'singh', 'dtysfd', 'erdtyugsafd', 'dtgjhef', 'Daskasan', 'Azerbaijan', '35465346', '234536', '353464', '', '2014-10-28 13:28:26', '2014-10-28 13:28:26'),
(54, 79, NULL, 'dello', 'singh', 'dtysfd', 'erdtyugsafd', 'dtgjhef', 'Daskasan', 'Azerbaijan', '35465346', '234536', '353464', '', '2014-10-28 13:50:27', '2014-10-28 13:50:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

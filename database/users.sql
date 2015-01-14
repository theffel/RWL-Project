-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2015 at 02:57 PM
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rank` tinyint(2) unsigned NOT NULL,
  `first_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) unsigned NOT NULL COMMENT '0 - male, 1 - female',
  `dob` date NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `rank`, `first_name`, `last_name`, `gender`, `dob`, `last_login`, `active`, `deleted`, `modified`, `created`) VALUES
(4, 'channel360e@gmail.com', 'dmccullough', 'be0d40d730a8cc14d68d09be099c2ea23873fe25', 0, 'Dan', 'McCullough', 0, '0000-00-00', '0000-00-00 00:00:00', 1, 0, '2014-10-01 02:42:11', '2014-10-01 02:42:11'),
(7, 'anikgoel19@gmail.com', 'dmccullough42', 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'Dan', 'McCullough', 0, '0000-00-00', '0000-00-00 00:00:00', 1, 0, '2014-10-28 01:25:45', '2014-10-01 11:45:49'),
(8, 'scotthsears@gmail.com', 'scott', 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'Scott', 'Sears', 0, '0000-00-00', '0000-00-00 00:00:00', 1, 0, '2014-10-03 10:43:57', '2014-10-03 10:43:57'),
(9, 'dan.mccullough@gmail.com', 'dmccullough72', '3c7002249fd997b4581919083e97db9996f1d595', 0, 'Daniel', 'McCullough', 0, '0000-00-00', '0000-00-00 00:00:00', 1, 0, '2014-10-15 09:51:37', '2014-10-03 10:47:49'),
(10, 'miguel@ready2race.ca', 'mrarsena', 'db853a4c06386d0dadb411e6e50f72584f1dba00', 0, 'Miguel', 'Arsenault', 0, '0000-00-00', '0000-00-00 00:00:00', 1, 0, '2014-10-03 13:45:34', '2014-10-03 13:45:34'),
(15, 'Organic@organic.com', 'oraganic_chm', 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'Organic', 'Chemistry', 1, '0000-00-00', '0000-00-00 00:00:00', 0, 0, '2014-10-10 08:49:40', '2014-10-10 08:49:40'),
(17, 'info@ready2race.ca', 'ScottINfo', '963ceba7375b8946cca81d5cfdc016fc877057fe', 0, 'Scott', 'Sears', 0, '0000-00-00', '0000-00-00 00:00:00', 0, 0, '2014-10-10 18:56:20', '2014-10-10 18:56:20'),
(18, 'scott@ready2race.ca', 'ready2racescott', '963ceba7375b8946cca81d5cfdc016fc877057fe', 0, 'sctt', 'srs', 0, '0000-00-00', '0000-00-00 00:00:00', 0, 0, '2014-10-10 20:08:14', '2014-10-10 20:08:14'),
(19, 'scott2@ready2race.ca', 'ssssss', '963ceba7375b8946cca81d5cfdc016fc877057fe', 0, 'dsfsdf', 'dfdfd', 0, '0000-00-00', '0000-00-00 00:00:00', 0, 0, '2014-10-10 20:10:17', '2014-10-10 20:10:17'),
(34, 'abc@yopmail.com', 'abcmln', 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'abcmln', 'xyzqwe', 0, '0000-00-00', '0000-00-00 00:00:00', 1, 0, '2014-10-12 14:13:54', '2014-10-12 14:13:54'),
(35, 'testuser@yopmail.com', 'testuser', 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'Test', 'User', 0, '0000-00-00', '0000-00-00 00:00:00', 1, 0, '2014-10-28 01:26:08', '2014-10-12 14:13:54'),
(36, 'member1@member.com', 'member123', 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'meme', 'star', 1, '0000-00-00', '0000-00-00 00:00:00', 1, 0, '2014-10-14 02:25:39', '2014-10-14 02:25:39'),
(37, 'organiser@organ.xon', 'organiser123', 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'organiser', 'sin', 1, '0000-00-00', '0000-00-00 00:00:00', 1, 0, '2014-10-14 04:25:50', '2014-10-14 04:25:50'),
(74, 'test@testing.com', NULL, 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'test', 'testing', 0, '2014-10-14', '0000-00-00 00:00:00', 1, 0, '2014-10-28 12:54:49', '2014-10-28 12:54:49'),
(75, 'test@testing.com', NULL, 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'test', 'testing', 0, '2014-10-14', '0000-00-00 00:00:00', 1, 0, '2014-10-28 12:55:32', '2014-10-28 12:55:32'),
(76, 'test@testing.com', NULL, 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'test', 'testing', 0, '2014-10-14', '0000-00-00 00:00:00', 1, 0, '2014-10-28 12:56:19', '2014-10-28 12:56:19'),
(77, 'nik@niker.com', NULL, 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'test', 'nik', 1, '1998-10-07', '0000-00-00 00:00:00', 1, 0, '2014-10-28 13:25:56', '2014-10-28 13:25:56'),
(78, 'dell@dello.com', NULL, 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'dello', 'singh', 1, '2000-10-04', '0000-00-00 00:00:00', 1, 0, '2014-10-28 13:28:26', '2014-10-28 13:28:26'),
(79, 'dell@dello.com', NULL, 'deb8fe370d2e274336e5d448cc44eba0f5c58d18', 0, 'dello', 'singh', 1, '2000-10-04', '0000-00-00 00:00:00', 1, 0, '2014-10-28 13:50:27', '2014-10-28 13:50:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

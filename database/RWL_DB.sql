-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2015 at 12:44 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------
DROP DATABASE IF EXISTS RWLHoldings_Potato_Solutions;
DROP DATABASE IF EXISTS RWLHoldings_Snow_Removal;
CREATE DATABASE IF NOT EXISTS RWLHoldings_Potato_Solutions;
CREATE DATABASE IF NOT EXISTS RWLHoldings_Snow_Removal;
use RWLHoldings_Potato_Solutions;

--
-- Database: `rwlholdings_potato_solutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attend_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `on_time` tinyint(1) unsigned NOT NULL COMMENT '0 - ontime, 1 - late',
  `wage_id` int(2) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`attend_id`),
  KEY `emp_id` (`emp_id`),
  KEY `wage_id` (`wage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bin_marker`
--

CREATE TABLE IF NOT EXISTS `bin_marker` (
  `marker_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `bin_id` int(4) unsigned NOT NULL,
  PRIMARY KEY (`marker_id`),
  KEY `bin_id` (`bin_id`),
  KEY `marker_id` (`marker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `byproduct_disposal`
--

CREATE TABLE IF NOT EXISTS `byproduct_disposal` (
  `by_pro_disposal_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `dispose_date` datetime NOT NULL,
  `product_descript` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dispose_where` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dispose_how` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dispose_transport` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`by_pro_disposal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `break`
--

CREATE TABLE IF NOT EXISTS `break` (
  `break_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `start_break` datetime NOT NULL,
  `end_break` datetime NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`break_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `daily_mileage`
--

CREATE TABLE IF NOT EXISTS `daily_mileage` (
  `mileage_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(3) unsigned NOT NULL,
  `truck_id` int(3) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  `starting_km` int(6) unsigned NOT NULL,
  `pei_km` int(6) unsigned NOT NULL,
  `nb_km` int(6) unsigned NOT NULL,
  `ns_km` int(6) unsigned NOT NULL,
  `litres_fuel` int(6) unsigned NOT NULL,
  `finish_km` int(6) unsigned NOT NULL,
  PRIMARY KEY (`mileage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE IF NOT EXISTS `destination` (
  `dest_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `dest_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dest_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dest_prov` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `dest_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dest_contact_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;



--
-- Table structure for table `delivery_record`
--

CREATE TABLE IF NOT EXISTS `delivery_record` (
  `record_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `arrive_date` datetime NOT NULL,
  `weight_in` int(6) unsigned NOT NULL,
  `unload_time` time NOT NULL,
  `tare_weight` int(6) unsigned NOT NULL,
  `ticket_num` int(25) unsigned NOT NULL,
  `trailer_id` int(3) unsigned NOT NULL,
  `truck_id` int(3) unsigned NOT NULL,
  `dest_id` int(4) unsigned NOT NULL,
  `farm_id` int(4) unsigned NOT NULL,
  `potato_id` int(2) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  `rejected` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `driver_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `lic_id` int(3) unsigned NOT NULL,
  `medical_id` int(3) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`driver_id`),
  KEY `lic_id` (`lic_id`,`medical_id`,`emp_id`),
  KEY `fk_emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `down_time`
--

CREATE TABLE IF NOT EXISTS `down_time` (
  `down_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `down_start` datetime NOT NULL,
  `down_end` datetime NOT NULL, 
  `reason` tinyint(1) unsigned NOT NULL COMMENT '0 = incoming truck, 1 = outgoing truck, 2 = rwl breakdown',  
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`down_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(2) unsigned NOT NULL,
  `emp_sin` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `emp_first_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `emp_last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `emp_middle_initial` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `emp_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emp_city` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_postal_code` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `emp_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `emp_email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `emp_gender` tinyint(1) unsigned NOT NULL COMMENT '0 - male, 1 - female',
  `emp_dob` date NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;



--
-- Table structure for table `employee_emergency_contact`
--

CREATE TABLE IF NOT EXISTS `employee_emergency_contact` (
  `emerg_contact_id` int(3) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  `emerg_first_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `emerg_last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `emerg_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`emerg_contact_id`,`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;



--
-- Table structure for table `employee_position`
--

CREATE TABLE IF NOT EXISTS `employee_position` (
  `position_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `position_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`position_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_training_certificate`
--

CREATE TABLE IF NOT EXISTS `employee_training_certificate` (
  `certificate_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(3) unsigned NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `completed` tinyint(1) unsigned NOT NULL COMMENT '0 - not complete, 1 - complete',
  `training_type_id` int(2) unsigned NOT NULL,
  PRIMARY KEY (`certificate_id`),
  KEY `training_type_id` (`training_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE IF NOT EXISTS `employee_type` (
  `emp_type_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `type_description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type_alt_description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;



--
-- Table structure for table `employee_type_change`
--

CREATE TABLE IF NOT EXISTS `employee_type_change` (
  `type_change_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `emp_type_id` int(2) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  `type_change_time` datetime NOT NULL,
  PRIMARY KEY (`type_change_id`),
  KEY `emp_type_id` (`emp_type_id`,`emp_id`),
  KEY `FK_type_change_map1` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_work_history`
--

CREATE TABLE IF NOT EXISTS `employee_work_history` (
  `history_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `emp_type_id` int(2) unsigned NOT NULL,
  `wage_id` int(2) unsigned NOT NULL,
  `hours` double unsigned DEFAULT NULL,
  PRIMARY KEY (`history_id`),
  KEY `emp_type_id` (`emp_type_id`,`wage_id`),
  KEY `FK_hist_map2` (`wage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equiptment_list`
--

CREATE TABLE IF NOT EXISTS `equiptment_list` (
  `equip_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `equip_name` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`equip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE IF NOT EXISTS `farm` (
  `farm_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `farm_contact_id` int(3) unsigned NOT NULL,
  `farm_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `farm_civic_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `farm_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `farm_email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`farm_id`),
  KEY `farm_contact_id` (`farm_contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farm_contact`
--

CREATE TABLE IF NOT EXISTS `farm_contact` (
  `farm_contact_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `farm_id` int(4) unsigned NOT NULL,
  `contact_first_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `contact_last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`farm_contact_id`,`farm_id`),
  KEY `farm_id` (`farm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE IF NOT EXISTS `field` (
  `field_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `field_location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bin_id` int(4) unsigned NOT NULL,
  PRIMARY KEY (`field_id`),
  KEY `bin_id` (`bin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE IF NOT EXISTS `fuel` (
  `fuel_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `truck_id` int(3) unsigned NOT NULL,
  `purchase_date` datetime NOT NULL,
  `mileage` int(6) unsigned NOT NULL,
  `litres` int(4) unsigned NOT NULL,
  `cost` double unsigned NOT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img_id` int(4) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`fuel_id`),
  KEY `truck_id` (`truck_id`,`img_id`,`emp_id`),
  KEY `FK_fuel_map1` (`emp_id`),
  KEY `FK_fuel_map` (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `img_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `img_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `img` longblob NOT NULL,
  `img_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`img_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inspection`
--

CREATE TABLE IF NOT EXISTS `inspection` (
  `inspect_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `inspect_expiry_date` date NOT NULL,
  `truck_id` int(3) unsigned NOT NULL,
  `trailer_id` int(3) unsigned NOT NULL,
  `img_id` int(4) unsigned NOT NULL,
  PRIMARY KEY (`inspect_id`),
  KEY `truck_id` (`truck_id`,`trailer_id`,`img_id`),
  KEY `FK_inspect_map2` (`trailer_id`),
  KEY `FK_inspect_map3` (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE IF NOT EXISTS `insurance` (
  `ins_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `ins_expiry_date` date NOT NULL,
  `truck_id` int(3) unsigned NOT NULL,
  `trailer_id` int(3) unsigned NOT NULL,
  `img_id` int(4) unsigned NOT NULL,
  PRIMARY KEY (`ins_id`),
  KEY `truck_id` (`truck_id`,`trailer_id`,`img_id`),
  KEY `truck_id_2` (`truck_id`,`trailer_id`,`img_id`),
  KEY `FK_ins_map2` (`trailer_id`),
  KEY `FK_ins_map3` (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE IF NOT EXISTS `job_type` (
  `emp_type_id` int(2) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL
 /* PRIMARY KEY (`emp_type_id`,`emp_id`)*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

-- --------------------------------------------------------

--
-- Table structure for table `licence`
--

CREATE TABLE IF NOT EXISTS `licence` (
  `lic_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `lic_num` int(10) unsigned NOT NULL,
  `lic_expiry_date` date NOT NULL,
  `lic_type_id` int(2) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`lic_id`),
  KEY `FK_lic_map1` (`emp_id`),
  KEY `lic_type_id` (`lic_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `licence_type`
--

CREATE TABLE IF NOT EXISTS `licence_type` (
  `lic_type_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `lic_type_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`lic_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE IF NOT EXISTS `maintenance` (
  `maintain_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `change_date` datetime NOT NULL,
  `engine_oil_litres` double(5,2) unsigned DEFAULT NULL,
  `hyd_oil_litres` double(5,2) unsigned DEFAULT NULL,
  `trans_fluid_litres` double(5,2) unsigned DEFAULT NULL,
  `coolant_litres` double(5,2) unsigned DEFAULT NULL,
  `oil_change_kms` int(6) unsigned NOT NULL,
  `tranny_fluid_change_kms` int(6) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  `truck_id` int(3) unsigned DEFAULT NULL,
  `trailer_id` int(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`maintain_id`),
  KEY `trailer_id` (`trailer_id`),
  KEY `truck_id` (`truck_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE IF NOT EXISTS `medical` (
  `medical_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `cleared_no` tinyint(1) unsigned NOT NULL COMMENT '0 - has medical, 1 - no medical',
  `medical_expiry_date` date NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`medical_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pick_up`
--

CREATE TABLE IF NOT EXISTS `pick_up` (
  `pickup_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `pd_date` datetime NOT NULL COMMENT 'pd_date pd=pickup/delivery',
  `loads_left` int(3) unsigned NOT NULL,
  `total_loads` int(3) unsigned NOT NULL,
  `driver_id` int(2) unsigned NOT NULL,
  `dispatcher_id` int(2) unsigned NOT NULL,
  `trailer_id` int(3) unsigned NOT NULL,
  `truck_id` int(3) unsigned NOT NULL,
  `farm_id` int(4) unsigned NOT NULL,
  `warehouse_id` int(4) unsigned NOT NULL,
  `bin_id` int(4) unsigned NOT NULL,
  `bin_marker` int(4) unsigned NOT NULL,
  `field_id` int(4) unsigned NOT NULL,
  `arrive_time_farm` datetime NOT NULL,
  `load_time` datetime NOT NULL,
  `depart_time_farm` datetime NOT NULL,
  `arrive_time_rwl` datetime NOT NULL,
  `unload_time` datetime NOT NULL,
  `depart_time_rwl` datetime NOT NULL,
  `ticket_num` int(5) unsigned NOT NULL,
  `gross_weight` double unsigned NOT NULL,
  `tare_weight` double unsigned NOT NULL,
  `potato_id` int(2) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`pickup_id`),
  KEY `driver_id` (`driver_id`,`dispatcher_id`,`trailer_id`,`truck_id`,`farm_id`,`warehouse_id`,`bin_id`,`field_id`,`potato_id`),
  KEY `FK_pickup_map2` (`trailer_id`),
  KEY `FK_pickup_map3` (`truck_id`),
  KEY `FK_pickup_map4` (`farm_id`),
  KEY `FK_pickup_map5` (`warehouse_id`),
  KEY `FK_pickup_map6` (`bin_id`),
  KEY `FK_pickup_map7` (`field_id`),
  KEY `FK_pickup_map8` (`bin_marker`),
  KEY `FK_pickup_map9` (`potato_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plant_cleaning`
--

CREATE TABLE IF NOT EXISTS `plant_cleaning` (
  `plant_clean_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `plant_clean_date` datetime NOT NULL,
  `equip_id` int(3) unsigned NOT NULL,
  `clean_descript` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cleaner1` int(3) unsigned NOT NULL,
  `cleaner2` int(3) unsigned DEFAULT NULL,
  `cleaner3` int(3) unsigned DEFAULT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`plant_clean_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `potato`
--

CREATE TABLE IF NOT EXISTS `potato` (
  `potato_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `potato_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`potato_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pretrip_inspection`
--

CREATE TABLE IF NOT EXISTS `pretrip_inspection` (
  `pretrip_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(3) unsigned NOT NULL,
  `inspect_date` datetime NOT NULL,
  `truck_id` int(3) unsigned NOT NULL,
  `trailer_id` int(3) unsigned NOT NULL,
  `park_break` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `cleanliness` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `oil_pressure` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `air_pressure` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `low_air_warn` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `inst_pannel` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `horn` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `wiper_washer` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `heat_defrost` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `mirrors` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `steering_wheel` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `emerg_trailer_breaks` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `fire_extinguisher_warning_device` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `headlights` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `clearence_lights` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `identfy_lights` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `turn_signals_4way_flashers` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `wheel_lug_front` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `fuel_tank_cap_left` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `sidemarker_lights_left` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `reflectors_left` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `wheel_lug_left` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `cargo_tiedowns_doors_left` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `tail_lights` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `stop_lights` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `turn_signals_4way_flashers_rear` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `clearence_lights_rear` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `identfy_lights_rear` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `reflectors_rear` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `wheel_lug_rear` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `bumper` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `cargo_tiedowns_doors_rear` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `fuel_tank_cap_right` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `sidemarker_lights_right` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `reflectors_right` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `wheel_lug_right` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `cargo_tiedowns_doors_right` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `hoses_couplers` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `electrical_connector` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `couplings` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `marking_placecards` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `proper_ship_papers` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `release_trailer_emerg_breaks` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `apply_service_breaks` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  PRIMARY KEY (`pretrip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE IF NOT EXISTS `processor` (
  `processor_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `processor_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `processor_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `processor_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `processor_contact_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`processor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `product_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `potato_id` int(2) unsigned NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `potato_id` (`potato_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `production_reception`
--

CREATE TABLE IF NOT EXISTS `production_reception` (
  `reception_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `reception_date` datetime NOT NULL,
  `potato_id` int(2) unsigned NOT NULL,
  `farm_id` int(4) unsigned NOT NULL,
  `load_id_info` int(6) unsigned NOT NULL COMMENT 'RWL ticket number',
  `quantity_recieved` double unsigned NOT NULL COMMENT 'incoming weight',
  `trailer_tandom` tinyint(1) unsigned NOT NULL COMMENT '0 = trailer, 1 = tandom',
  `washed` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `CFIA_notified` tinyint(1) unsigned NOT NULL,
  `notified_by` varchar(25) COLLATE utf8_unicode_ci NOT NULL  COMMENT 'CFIA notified by',
  `cleanliness` int(2) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  `movement_certificate` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `accepted` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  PRIMARY KEY (`reception_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `reg_expiry_date` date NOT NULL,
  `truck_id` int(3) unsigned NOT NULL,
  `trailer_id` int(3) unsigned NOT NULL,
  `img_id` int(4) unsigned NOT NULL,
  PRIMARY KEY (`reg_id`),
  KEY `truck_id` (`truck_id`,`trailer_id`,`img_id`),
  KEY `FK_reg_map2` (`trailer_id`),
  KEY `FK_reg_map3` (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rejection`
--

CREATE TABLE IF NOT EXISTS `rejection` (
  `reject_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `reject_date` datetime NOT NULL,
  `potato_id` int(2) unsigned NOT NULL,
  `farm_id` int(4) unsigned NOT NULL,
  `load_id_info` int(6) unsigned NOT NULL COMMENT 'Processor ticket number',
  `quanity_returned` double unsigned NOT NULL COMMENT 'rejection weight',
  `re_washed` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `re_graded` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `emp_id` int(3) unsigned NOT NULL,
  `returned_to` tinyint(1) unsigned NOT NULL COMMENT '0 = processor, 1 = producer',
  PRIMARY KEY (`reject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rwl`
--

CREATE TABLE IF NOT EXISTS `rwl` (
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `rwl_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rwl_fax` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rwl_cell` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rwl_email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `rwl_address` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `rwl_city` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `rwl_prov` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `rwl_postal_code` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- --------------------------------------------------------

--
-- Table structure for table `rwl_bin`
--

CREATE TABLE IF NOT EXISTS `rwl_bin` (
  `rwl_bin_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `weight` double unsigned NOT NULL,
  `bin_marker` int(3) unsigned NOT NULL,
  PRIMARY KEY (`rwl_bin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rwl_process`
--

CREATE TABLE IF NOT EXISTS `rwl_process` (
  `process_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `farm_id` int(4) unsigned NOT NULL,
  `warehouse_id` int(4) unsigned NOT NULL,
  `potato_id` int(2) unsigned NOT NULL,
  `rwl_bin_id` int(2) unsigned NOT NULL,
  `arrive_date` date NOT NULL,
  `arrive_time` time NOT NULL,
  `unload_time` time NOT NULL,
  `weight_in` double unsigned DEFAULT NULL,
  `load_time` time NOT NULL,
  `weight_out` double unsigned DEFAULT NULL,
  `depart_time` time NOT NULL,
  `trailer_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`process_id`),
  KEY `farm_id` (`farm_id`,`warehouse_id`,`potato_id`,`rwl_bin_id`,`trailer_id`),
  KEY `FK_rwl_pro_map1` (`trailer_id`),
  KEY `FK_rwl_pro_map3` (`warehouse_id`),
  KEY `FK_rwl_pro_map4` (`rwl_bin_id`),
  KEY `FK_rwl_pro_map5` (`potato_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE IF NOT EXISTS `sample` (
  `sample_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `num_sample_per_load` int(1) unsigned NOT NULL,
  `sample_date` datetime NOT NULL,
  `unuseable_weight` double unsigned DEFAULT NULL,
  `rot_weight` double unsigned DEFAULT NULL,
  `internal_weight` double unsigned DEFAULT NULL,
  `pit_rot_weight` double unsigned DEFAULT NULL,
  `wireworm_weight` double unsigned DEFAULT NULL,
  `jelly_end_weight` double unsigned DEFAULT NULL,
  `scab_weight` double unsigned DEFAULT NULL,
  `hollow_heart_weight` double unsigned DEFAULT NULL,
  `sunburn_weight` double unsigned DEFAULT NULL,
  `mech_bruise_weight` double unsigned DEFAULT NULL,
  `smalls_weight` double unsigned DEFAULT NULL,
  `ten_oz_weight` double unsigned DEFAULT NULL,
  `air_weight` double unsigned DEFAULT NULL,
  `water_weight` double unsigned DEFAULT NULL,
  `rock_foreign_weight` double unsigned DEFAULT NULL,
  `total_sample_weight` double unsigned DEFAULT NULL,
  `other_weight` double unsigned DEFAULT NULL,
  `trailer_id` int(3) unsigned NOT NULL,
  `potato_id` int(2) unsigned NOT NULL,
  `in_out` tinyint(1) unsigned NOT NULL COMMENT '0 - incoming sample, 1 - outgoing sample',
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`sample_id`),
  KEY `trailer_id` (`trailer_id`,`potato_id`,`emp_id`),
  KEY `FK_sample_map2` (`emp_id`),
  KEY `FK_sample_map3` (`potato_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `ship_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `ship_date` datetime NOT NULL,
  `potato_id` int(2) unsigned NOT NULL,
  `farm_id` int(4) unsigned NOT NULL,
  `rwl_ticket_num` int(6) unsigned NOT NULL COMMENT 'RWL ticket number',
  `weight_shipped` double unsigned NOT NULL,
  `washed` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `dest_id` int(4) unsigned NOT NULL,
  `truck_cleaned` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `accepted` tinyint(1) unsigned NOT NULL COMMENT '0 = yes, 1 = no',
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`ship_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temparature_check`
--

CREATE TABLE IF NOT EXISTS `temparature_check` (
  `temp_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(3) unsigned NOT NULL,
  `temp_check` datetime NOT NULL,
  `tank1_temp` double unsigned NOT NULL,
  `tank2_temp` double unsigned NOT NULL,
  `tank3_temp` double unsigned NOT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE IF NOT EXISTS `trailer` (
  `trailer_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `trailer_num` int(5) unsigned NOT NULL,
  `reg_id` int(5) unsigned NOT NULL,
  `inspect_id` int(5) unsigned NOT NULL,
  `plate_num` int(8) unsigned NOT NULL,
  `ins_id` int(5) unsigned NOT NULL,
  /*`maintain_id` int(5) unsigned NOT NULL,*/
  PRIMARY KEY (`trailer_id`),
  KEY `reg_id` (`reg_id`),
  KEY `inspect_id` (`inspect_id`),
  KEY `plate_num` (`plate_num`),
 /* KEY `maintain_id` (`maintain_id`),*/
  KEY `FK_trailer_map2` (`ins_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `training_type`
--

CREATE TABLE IF NOT EXISTS `training_type` (
  `training_type_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `training_type_discription` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`training_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE IF NOT EXISTS `truck` (
  `truck_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `truck_num` int(5) unsigned NOT NULL,
  `reg_id` int(5) unsigned NOT NULL,
  `inspect_id` int(5) unsigned NOT NULL,
  `plate_num` int(8) unsigned NOT NULL,
  `ins_id` int(5) unsigned NOT NULL,
  /*`maintain_id` int(5) unsigned NOT NULL,*/
  PRIMARY KEY (`truck_id`),
  KEY `reg_id` (`reg_id`),
  KEY `inspect_id` (`inspect_id`),
  KEY `ins_id` (`ins_id`)
 /* KEY `maintain_id` (`maintain_id`)*/
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `truck_usage`
--

CREATE TABLE IF NOT EXISTS `truck_usage` (
  `usage_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `usage_date` datetime NOT NULL,
  `truck_id` int(3) unsigned NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`usage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  `emp_id` int(3) unsigned DEFAULT NULL,
  `farm_id` int(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `emp_id` (`emp_id`,`farm_id`),
  KEY `FK_user_map2` (`farm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wages`
--

CREATE TABLE IF NOT EXISTS `wages` (
  `wage_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `wage` decimal(3,2) unsigned NOT NULL,
  PRIMARY KEY (`wage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
  `warehouse_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `farm_id` int(4) unsigned NOT NULL,
  `warehouse_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_civic_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_prov` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`warehouse_id`),
  KEY `farm_id` (`farm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_bin`
--

CREATE TABLE IF NOT EXISTS `warehouse_bin` (
  `bin_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `bin_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_id` int(4) unsigned NOT NULL,
  `bin_marker` int(4) unsigned NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`bin_id`),
  KEY `warehouse_id` (`warehouse_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wash_line_cleaning`
--

CREATE TABLE IF NOT EXISTS `wash_line_cleaning` (
  `line_clean_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `line_clean_date` datetime NOT NULL,
  `equip_id` int(3) unsigned NOT NULL,
  `clean_descript` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cleaner1` int(3) unsigned NOT NULL,
  `cleaner2` int(3) unsigned DEFAULT NULL,
  `cleaner3` int(3) unsigned DEFAULT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`line_clean_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- Table structure for table `waste_disposal`
--

CREATE TABLE IF NOT EXISTS `waste_disposal` (
  `waste_disposal_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `dispose_date` datetime NOT NULL,
  `product_descript` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dispose_where` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dispose_how` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dispose_transport` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`waste_disposal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
/*ALTER TABLE `attendance`
  ADD CONSTRAINT `FK_attend_map1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_attend_map2` FOREIGN KEY (`wage_id`) REFERENCES `wages` (`wage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bin_marker`
--
ALTER TABLE `bin_marker`
  ADD CONSTRAINT `FK_marker_map` FOREIGN KEY (`bin_id`) REFERENCES `warehouse_bin` (`bin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `break`
--
ALTER TABLE `break`
  ADD CONSTRAINT `FK_break_map` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `destination_record`
--
ALTER TABLE `destination_record`
  ADD CONSTRAINT `FK_dest_rec_map1` FOREIGN KEY (`trailer_id`) REFERENCES `trailer` (`trailer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_dest_rec_map2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_dest_rec_map3` FOREIGN KEY (`dest_id`) REFERENCES `destination` (`dest_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_dest_rec_map4` FOREIGN KEY (`potato_id`) REFERENCES `potato` (`potato_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `fk_emp_id` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `employee_training_certificate`
--
ALTER TABLE `employee_training_certificate`
  ADD CONSTRAINT `employee_training_certificate_ibfk_1` FOREIGN KEY (`training_type_id`) REFERENCES `training_type` (`training_type_id`);

--
-- Constraints for table `employee_type_change`
--
ALTER TABLE `employee_type_change`
  ADD CONSTRAINT `FK_type_change_map1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_work_history`
--
ALTER TABLE `employee_work_history`
  ADD CONSTRAINT `FK_hist_map1` FOREIGN KEY (`emp_type_id`) REFERENCES `employee_type` (`emp_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_hist_map2` FOREIGN KEY (`wage_id`) REFERENCES `wages` (`wage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farm`
--
ALTER TABLE `farm_contact`
  ADD CONSTRAINT `FK_farm_contact_map` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `FK_field_map` FOREIGN KEY (`bin_id`) REFERENCES `warehouse_bin` (`bin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fuel`
--
ALTER TABLE `fuel`
  ADD CONSTRAINT `FK_fuel_map3` FOREIGN KEY (`truck_id`) REFERENCES `truck` (`truck_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_fuel_map` FOREIGN KEY (`img_id`) REFERENCES `images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_fuel_map1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_img_map2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inspection`
--
ALTER TABLE `inspection`
  ADD CONSTRAINT `FK_inspect_map1` FOREIGN KEY (`truck_id`) REFERENCES `truck` (`truck_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_inspect_map2` FOREIGN KEY (`trailer_id`) REFERENCES `trailer` (`trailer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_inspect_map3` FOREIGN KEY (`img_id`) REFERENCES `images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `FK_ins_map1` FOREIGN KEY (`truck_id`) REFERENCES `truck` (`truck_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ins_map2` FOREIGN KEY (`trailer_id`) REFERENCES `trailer` (`trailer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ins_map3` FOREIGN KEY (`img_id`) REFERENCES `images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `licence`
--
ALTER TABLE `licence`
  ADD CONSTRAINT `FK_lic_map2` FOREIGN KEY (`lic_type_id`) REFERENCES `licence_type` (`lic_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_lic_map1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `FK_main_map1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_main_map2` FOREIGN KEY (`truck_id`) REFERENCES `truck` (`truck_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_main_map3` FOREIGN KEY (`trailer_id`) REFERENCES `trailer` (`trailer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medical`
--
ALTER TABLE `medical`
  ADD CONSTRAINT `FK_med_map` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pick_up`
--
ALTER TABLE `pick_up`
  ADD CONSTRAINT `FK_pickup_map1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pickup_map2` FOREIGN KEY (`trailer_id`) REFERENCES `trailer` (`trailer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pickup_map3` FOREIGN KEY (`truck_id`) REFERENCES `truck` (`truck_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pickup_map4` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pickup_map5` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`warehouse_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pickup_map6` FOREIGN KEY (`bin_id`) REFERENCES `warehouse_bin` (`bin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pickup_map7` FOREIGN KEY (`field_id`) REFERENCES `field` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pickup_map8` FOREIGN KEY (`marker_id`) REFERENCES `bin_marker` (`marker_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pickup_map9` FOREIGN KEY (`potato_id`) REFERENCES `potato` (`potato_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_patato_map` FOREIGN KEY (`potato_id`) REFERENCES `potato` (`potato_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `FK_reg_map1` FOREIGN KEY (`truck_id`) REFERENCES `truck` (`truck_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reg_map2` FOREIGN KEY (`trailer_id`) REFERENCES `trailer` (`trailer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reg_map3` FOREIGN KEY (`img_id`) REFERENCES `images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rwl_process`
--
ALTER TABLE `rwl_process`
  ADD CONSTRAINT `FK_rwl_pro_map1` FOREIGN KEY (`trailer_id`) REFERENCES `trailer` (`trailer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_rwl_pro_map2` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_rwl_pro_map3` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`warehouse_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_rwl_pro_map4` FOREIGN KEY (`rwl_bin_id`) REFERENCES `rwl_bin` (`rwl_bin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_rwl_pro_map5` FOREIGN KEY (`potato_id`) REFERENCES `potato` (`potato_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sample`
--
ALTER TABLE `sample`
  ADD CONSTRAINT `FK_sample_map1` FOREIGN KEY (`trailer_id`) REFERENCES `trailer` (`trailer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sample_map2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sample_map3` FOREIGN KEY (`potato_id`) REFERENCES `potato` (`potato_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trailer`
--
ALTER TABLE `trailer`
  ADD CONSTRAINT `FK_trailer_map1` FOREIGN KEY (`reg_id`) REFERENCES `registration` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_trailer_map2` FOREIGN KEY (`ins_id`) REFERENCES `insurance` (`ins_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_trailer_map3` FOREIGN KEY (`inspect_id`) REFERENCES `inspection` (`inspect_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `truck`
--
ALTER TABLE `truck`
  ADD CONSTRAINT `FK_truck_map1` FOREIGN KEY (`reg_id`) REFERENCES `registration` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_truck_map2` FOREIGN KEY (`ins_id`) REFERENCES `insurance` (`ins_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_truck_map3` FOREIGN KEY (`maintain_id`) REFERENCES `maintenance` (`maintain_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_truck_map4` FOREIGN KEY (`inspect_id`) REFERENCES `inspection` (`inspect_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user_map1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_map2` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `FK_warehouse_map` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse_bin`
--
ALTER TABLE `warehouse_bin`
  ADD CONSTRAINT `FK_warehouse_bin_map` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`warehouse_id`) ON DELETE CASCADE ON UPDATE CASCADE;*/



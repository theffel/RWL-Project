



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS RWLHoldings_Potato_Solutions;
CREATE DATABASE IF NOT EXISTS RWLHoldings_Snow_Removal;
use RWLHoldings_Potato_Solutions;


-- 
-- Table structure for table `RWL`
--
CREATE TABLE IF NOT EXISTS `RWL` (
`name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
`rwl_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
`rwl_fax` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
`rwl_cell` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
`rwl_email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
`rwl_address` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
`rwl_city` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
`rwl_prov` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
`rwl_postal_code` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Dumping data for table `RWL`
--
INSERT INTO `rwl`(`name`, `rwl_phone`, `rwl_cell`, `rwl_fax`, `rwl_email`, `rwl_address`, `rwl_city`, `rwl_prov`, `rwl_postal_code`) VALUES
('PEI Potato Solutions', '9024366721', '9022180212', '555-555-5555', 'rwl@pei.ca', '1325 Wilmot Valley Road', 'Travelers Rest', 'PEI', 'C0B1M0');


/*======================================================================================*/
/*                                    EMPLOYEE                                          */
/*======================================================================================*/

-- 
-- Table structure for table `Employee`
-- 
CREATE TABLE IF NOT EXISTS `Employee` (
`emp_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
`emp_type_id` int(2) unsigned NOT NULL,
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
`primary_contact_id` int(3) unsigned NOT NULL,  /* not sure if I need to reserve 3 for the contact id fields  couldn't remember if each employee would have a 1 and a 2 which means I could change it to 1 */
`secondary_contact_id` int(3) unsigned NOT NULL,
`active` tinyint(1) unsigned NOT NULL DEFAULT '1',
`deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
`modified` datetime NOT NULL,
`created` datetime NOT NULL,
PRIMARY KEY (`emp_id`)
/*FOREIGN KEY (`emp_type_id`) REFERENCES Employee_Type(`emp_type_id`) ON DELETE CASCADE ON UPDATE CASCADE*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


-- 
-- Table structure for table `Employee_Type`
-- 
CREATE TABLE IF NOT EXISTS `Employee_Type` (
`emp_type_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
`type_description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
`type_alt_description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`emp_type_id`)      
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Dumping data for table `Employee_Type`
--
INSERT INTO `Employee_Type`(`emp_type_id`, `type_description`, `type_alt_description`) VALUES
(1, 'Truck driver', 'truckdriver'),
(2, 'Dispatcher', 'dispatcher'),
(3, 'Production', 'production'),                     
(4, 'Sampler', 'sampler'),
(5, 'Line Worker', 'lineworker'),
(6, 'Waterboy', 'waterboy'),
(7, 'Maintenance', 'maintenance'),
(8, 'Accounting', 'accounting'),
(9, 'Fleet Management', 'fleetmanagement');


-- 
-- Table structure for table `Job_Type`
-- 
CREATE TABLE IF NOT EXISTS `Job_Type` (
`emp_type_id` int(2) unsigned NOT NULL,
`emp_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`emp_type_id`, `emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Employee_Position`
-- 
CREATE TABLE IF NOT EXISTS `Employee_Position` (
`position_id` int(2) unsigned NOT NULL AUTO_INCREMENT,                   
`position_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
`emp_id` int(3) unsigned DEFAULT NULL,
PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Employee_Emergency_Contact`
--
CREATE TABLE IF NOT EXISTS `Employee_Emergency_Contact` (
`emerg_contact_id` int(3) unsigned NOT NULL /*AUTO_INCREMENT*/,
`emp_id` int(3) unsigned NOT NULL,
`emerg_first_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,     /* add composite key for a primary key for this table */ 
`emerg_last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
`emerg_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`emerg_contact_id`, `emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Employee_Training_Certificate`
-- 
CREATE TABLE IF NOT EXISTS `Employee_Training_Certificate` (
`certificate_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
`emp_id` int(3) unsigned NOT NULL,
`start_date` datetime DEFAULT NULL,
`end_date` datetime DEFAULT NULL,                                                         /* Need to find out types of certificates */
`completed` tinyint(1) unsigned NOT NULL COMMENT '0 - not complete, 1 - complete',
`training_type_id` int(2) unsigned NOT NULL,
PRIMARY KEY (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Training_Type`
-- 
CREATE TABLE IF NOT EXISTS `Training_Type` (
`training_type_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
`training_type_discription` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`training_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Driver`
--
CREATE TABLE IF NOT EXISTS `Driver` (
`driver_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
`lic_id` int(3) unsigned NOT NULL,
`medical_id` int(3) unsigned NOT NULL, 
`emp_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


/*======================================================================================*/
/*                                   END EMPLOYEE                                       */
/*======================================================================================*/




/*======================================================================================*/
/*                                    ATTENDENCE                                        */
/*======================================================================================*/
 
-- 
-- Table structure for table `Attendance`
--
CREATE TABLE IF NOT EXISTS `Attendance` (
`attend_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
`time_in` datetime NOT NULL,
`time_out` datetime NOT NULL,
`wage_id` int(2) unsigned NOT NULL,
`break_id` int(6) unsigned NOT NULL,
`emp_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`attend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
 
-- 
-- Table structure for table `Break`
--
CREATE TABLE IF NOT EXISTS `Break` (
`break_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
`start_break` datetime NOT NULL,
`end_break` datetime NOT NULL,
`emp_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`break_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


/*======================================================================================*/
/*                                  END ATTENDENCE                                      */
/*======================================================================================*/



/*======================================================================================*/
/*                                  LICENSES/MEDICAL                                    */
/*======================================================================================*/

-- 
-- Table structure for table `Licence`
--
CREATE TABLE IF NOT EXISTS `Licence` (
`lic_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
`lic_num` int(10) unsigned NOT NULL,
`lic_expiry_date` date NOT NULL,   
`lic_type_id` varchar(2) NOT NULL,
`emp_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`lic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Licence_Type`
--
CREATE TABLE IF NOT EXISTS `Licence_Type` (
`lic_type_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
`lic_type_desc` varchar(100) NOT NULL,
PRIMARY KEY (`lic_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Images`
--
CREATE TABLE IF NOT EXISTS `Images` (
`img_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
`img_type` varchar(15) NOT NULL,
`img` longblob NOT NULL,               /*ADD DATE STAMP TRUCK, TRAILER, DRIVER, FUEL ID'S*/
`img_name` varchar(15) NOT NULL,
`emp_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Medical`
--
CREATE TABLE IF NOT EXISTS `Medical` (
`medical_id` int(3) unsigned NOT NULL AUTO_INCREMENT,        
`cleared_no` tinyint(1) unsigned NOT NULL COMMENT '0 - has medical, 1 - no medical',
`medical_expiry_date` date NOT NULL,
`emp_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`medical_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 



/*======================================================================================*/
/*                               END LICENSES/MEDICAL                                   */
/*======================================================================================*/


/*======================================================================================*/
/*                                    SALARY                                            */
/*======================================================================================*/

-- 
-- Table structure for table `Employee_Work_History`
--
CREATE TABLE IF NOT EXISTS `Employee_Work_History` (
`history_id` int(3) unsigned NOT NULL AUTO_INCREMENT, 
`emp_id` int(3) unsigned NOT NULL,
`emp_type_id` int(2) unsigned NOT NULL,           
`wage_id` int(2) unsigned NOT NULL,
`hours` double unsigned DEFAULT NULL,
PRIMARY KEY (`history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Wages`
--
CREATE TABLE IF NOT EXISTS `Wages` (
`wage_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
`wage` DECIMAL (3,2) unsigned NOT NULL,
PRIMARY KEY (`wage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


/*======================================================================================*/
/*                                  END SALARY                                          */
/*======================================================================================*/



/*======================================================================================*/
/*                                    USERS                                              */
/*======================================================================================*/

-- 
-- Table structure for table `Users`
-- 
CREATE TABLE IF NOT EXISTS `Users` (
`user_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
`username` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
`password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,           /* leave 255 for hashing purposes?*/
`user_last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
`active` tinyint(1) unsigned NOT NULL DEFAULT '1',
`deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
`modified` datetime NOT NULL,
`created` datetime NOT NULL,
`emp_id` int(3) unsigned default NULL,
`farm_id` int(4) unsigned default NULL,
PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


/*======================================================================================*/
/*                                    END USER                                          */
/*======================================================================================*/




/*======================================================================================*/
/*                           RECIEVING/PROCESSING/SHIPPING                              */
/*======================================================================================*/

-- 
-- Table structure for table `Farm`
-- 
CREATE TABLE IF NOT EXISTS `Farm` (
`farm_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
`farm_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`farm_civic_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`farm_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,              
`farm_email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
`farm_contact_id` int(3) unsigned NOT NULL,
`active` tinyint(1) unsigned NOT NULL DEFAULT '1',
`deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
`modified` datetime NOT NULL,
`created` datetime NOT NULL,
PRIMARY KEY (`farm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


-- 
-- Table structure for table `Farm_Contact`
--
CREATE TABLE IF NOT EXISTS `Farm_Contact` (
`farm_contact_id` int(3) unsigned NOT NULL /*AUTO_INCREMENT*/,
`farm_id` int(4) unsigned NOT NULL,
`contact_first_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,     /* add composite key for a primary key for this table */ 
`contact_last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
`contact_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`farm_contact_id`, `farm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Warehouse`
-- 
CREATE TABLE IF NOT EXISTS `Warehouse` (
`warehouse_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
`farm_id` int(4) unsigned NOT NULL,
`warehouse_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
`warehouse_civic_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`warehouse_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
`active` tinyint(1) unsigned NOT NULL DEFAULT '1',
`deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
`modified` datetime NOT NULL,
`created` datetime NOT NULL,
PRIMARY KEY (`warehouse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


-- 
-- Table structure for table `Warehouse_Bin`
-- 
CREATE TABLE IF NOT EXISTS `Warehouse_Bin` (
`bin_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
`bin_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
`warehouse_id` int(4) unsigned NOT NULL,
`bin_marker` int(4) unsigned NOT NULL,
`active` tinyint(1) unsigned NOT NULL DEFAULT '1',
`deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
`modified` datetime NOT NULL,
`created` datetime NOT NULL,
PRIMARY KEY (`bin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


-- 
-- Table structure for table `Field`
-- 
CREATE TABLE IF NOT EXISTS `Field` (
`field_id` int(4) unsigned NOT NULL AUTO_INCREMENT, 
`field_location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,                 
`bin_id` int(4) unsigned NOT NULL,
PRIMARY KEY (`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


-- 
-- Table structure for table `Pick_Up`
-- 
CREATE TABLE IF NOT EXISTS `Pick_Up` (
`pickup_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
`farm_id` int(4) unsigned NOT NULL,
`warehouse_id` int(4) unsigned NOT NULL,
`bin_id` int(4) unsigned NOT NULL,
`bin_marker` int(4) unsigned NOT NULL,
`field_id` int(4) unsigned NOT NULL,
`arrive_date` date NOT NULL,
`arrive_time` time NOT NULL,
`weight_in` int(5) unsigned DEFAULT NULL,
`load_time` time NOT NULL,
`depart_time` time NOT NULL,
`trailer_id` int(3) unsigned NOT NULL,
`patato_id` int(2) unsigned NOT NULL,
PRIMARY KEY (`pickup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Table structure for table `RWL_Process`
--
CREATE TABLE IF NOT EXISTS `RWL_Process` (
`process_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
`farm_id` int(4) unsigned NOT NULL,
`warehouse_id` int(4) unsigned NOT NULL,
`rwl_bin_id` int(2) unsigned NOT NULL,
`arrive_date` date NOT NULL,
`arrive_time` time NOT NULL,
`unload_time` time NOT NULL,
`weight_in` int(5) unsigned DEFAULT NULL,
`load_time` time NOT NULL,
`weight_out` int(5) unsigned DEFAULT NULL,
`depart_time` time NOT NULL,
`trailer_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`process_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 

-- 
-- Table structure for table `RWL_Bin`
--
CREATE TABLE IF NOT EXISTS `RWL_Bin` (
`rwl_bin_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
`weight` int(5) unsigned NOT NULL,
`bin_marker` int(2) unsigned NOT NULL,
PRIMARY KEY (`rwl_bin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 

-- 
-- Table structure for table `Destination`
-- 
CREATE TABLE IF NOT EXISTS `Destination` (
`dest_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
`dest_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
`dest_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`dest_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
`dest_contact_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`dest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Table structure for table `Destination_Record`
--
CREATE TABLE IF NOT EXISTS `Destination_Record` (
`record_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
`arrive_date` date NOT NULL,
`arrive_time` time NOT NULL,
`weight_in` int(5) unsigned NOT NULL,
`unload_time` time NOT NULL,
`weight_out` int(5) unsigned NOT NULL,
`ticket_num` int(25) unsigned NOT NULL,
`trailer_id` int(3) unsigned NOT NULL,
`dest_id` int(4) unsigned NOT NULL,
`potato_id` int(10) unsigned NOT NULL,
`emp_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 

-- 
-- Table structure for table `Processor`
-- 
CREATE TABLE IF NOT EXISTS `Processor` (
`processor_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
`processor_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
`processor_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,                             /* List of Processor info be good for some data to test with and populate some tables */
`processor_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
`processor_contact_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`processor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


-- 
-- Table structure for table `Sample`
--
CREATE TABLE IF NOT EXISTS `Sample` (
`sample_id` int(6) unsigned NOT NULL AUTO_INCREMENT,    /* 6 is roughly one million samples...good mile stone for them to hit! we come fix db when ya hit a million!*/
`num_sample_per_load` int(1) unsigned NOT NULL,
`sample_date` date NOT NULL,
`sample_time` time NOT NULL,
`unuseable_weight` double unsigned DEFAULT NULL,
`unuseable_percent` double unsigned DEFAULT NULL,
`rot_weight` double unsigned DEFAULT NULL,
`rot_percent` double unsigned DEFAULT NULL,
`internal_weight` double unsigned DEFAULT NULL,
`internal_percent` double unsigned DEFAULT NULL,
`pit_rot_weight` double unsigned DEFAULT NULL,
`pit_rot_percent` double unsigned DEFAULT NULL,
`wireworm_percent` double unsigned DEFAULT NULL,
`wireworm_weight` double unsigned DEFAULT NULL,
`jelly_end_weight` double unsigned DEFAULT NULL,
`jelly_end_percent` double unsigned DEFAULT NULL,
`scab_weight` double unsigned DEFAULT NULL,
`scab_percent` double unsigned DEFAULT NULL,
`hollow_heart_weight` double unsigned DEFAULT NULL,
`hollow_heart_percent` double unsigned DEFAULT NULL,
`sunburn_weight` double unsigned DEFAULT NULL,
`sunburn_percent` double unsigned DEFAULT NULL,
`mech_bruise_weight` double unsigned DEFAULT NULL,
`mech_bruise_percent` double unsigned DEFAULT NULL,
`smalls_weight` double unsigned DEFAULT NULL,
`smalls_percent` double unsigned DEFAULT NULL,
`ten_oz_weight` double unsigned DEFAULT NULL,
`ten_oz_percent` double unsigned DEFAULT NULL,
`air_weight` double unsigned DEFAULT NULL,
`water_weight` double unsigned DEFAULT NULL,
`rock_foreign_weight` double unsigned DEFAULT NULL,
`total_sample_weight` double unsigned DEFAULT NULL,
`other_weight` double unsigned DEFAULT NULL,
`other_percent` double unsigned DEFAULT NULL,
`trailer_id` int(3) unsigned NOT NULL,
`potato_id` int(2) unsigned NOT NULL,
`in_out` tinyint(1) unsigned NOT NULL COMMENT '0 - incoming sample, 1 - outgoing sample',
`emp_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`sample_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Product`
--
CREATE TABLE IF NOT EXISTS `Product` (                              /* what are the different product types*/
`product_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
`product_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Potato`
--
CREATE TABLE IF NOT EXISTS `Potato` (
`potato_id` int(2) unsigned NOT NULL AUTO_INCREMENT,                              
`potato_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,                        
PRIMARY KEY (`potato_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 

-- 
-- Dumping data for table `Potato`
--
INSERT INTO `Potato`(`potato_id`, `potato_name`) VALUES
(1, 'Russet Burbank'),
(2, 'Russet Goldrush'),
(3, 'Ranger Russet'),
(4, 'Russet Norkotah'),
(5, 'Superior(White)'),
(6, 'Kennebec(White)'),
(7, 'Atlantic(White)'),
(8, 'Dakota Pearl(White)'),
(9, 'Shepody(White)'),
(10, 'Red Norland(Red)'),
(11, 'Chieftain(Red)'),
(12, 'Yukon Gold(Yellow)'),
(13, 'Innovator(Yellow)'),
(14, 'Prospect');



/*======================================================================================*/
/*                           END RECIEVING/PROCESSING/SHIPPING                          */
/*======================================================================================*/




/*======================================================================================*/
/*                                   FLEET MANAGEMENT                                   */
/*======================================================================================*/

-- 
-- Table structure for table `Trailer`
--
CREATE TABLE IF NOT EXISTS `Trailer` (
`trailer_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
`trailer_num` int(5) unsigned NOT NULL,
`reg_id` int(5) unsigned NOT NULL,
`inspect_id` int(5) unsigned NOT NULL,
`plate_num` int(8) unsigned NOT NULL,
`ins_id` int(5) unsigned NOT NULL,
PRIMARY KEY (`trailer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Truck`
--
CREATE TABLE IF NOT EXISTS `Truck` (
`truck_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
`truck_num` int(5) unsigned NOT NULL,
`reg_id` int(5) unsigned NOT NULL,                                   
`inspect_id` int(5) unsigned NOT NULL,
`plate_num` int(8) unsigned NOT NULL,
`ins_id` int(5) unsigned NOT NULL,
`oil_change_kms` int(6) unsigned NOT NULL,
`tranny_fluid_change_kms` int(6) unsigned NOT NULL,
PRIMARY KEY (`truck_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Registration`
--
CREATE TABLE IF NOT EXISTS `Registration` (
`reg_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
`reg_expiry_date` date NOT NULL, 
`truck_id` int(3) unsigned NOT NULL, 
`trailer_id` int(3) unsigned NOT NULL, 
`img_id` int(4) unsigned NOT NULL,                                       
PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 

-- 
-- Table structure for table `Inspection`
--
CREATE TABLE IF NOT EXISTS `Inspection` (
`inspect_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
`inspect_expiry_date` date NOT NULL,                     
`truck_id` int(3) unsigned NOT NULL, 
`trailer_id` int(3) unsigned NOT NULL, 
`img_id` int(4) unsigned NOT NULL,                  
PRIMARY KEY (`inspect_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Insurance`
--
CREATE TABLE IF NOT EXISTS `Insurance` (
`ins_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
`ins_expiry_date` date NOT NULL,                     
`truck_id` int(3) unsigned NOT NULL, 
`trailer_id` int(3) unsigned NOT NULL, 
`img_id` int(4) unsigned NOT NULL,                  
PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Fuel`
--
CREATE TABLE IF NOT EXISTS `Fuel` (
`fuel_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
`truck_id` int(3) unsigned NOT NULL,
`purchace_date` datetime NOT NULL, 
`mileage` int(6) unsigned NOT NULL,
`location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,      /* not sure if this is supposed to be gas station location */
`img_id` int(4) unsigned NOT NULL,
`emp_id` int(3) unsigned NOT NULL,
PRIMARY KEY (`fuel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


-- 
-- Table structure for table `Fluids`
--
CREATE TABLE IF NOT EXISTS `Fluids` (
`fluid_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
`amount_liters` double unsigned DEFAULT NULL,
`fluid_type` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
`truck_id` int(3) unsigned DEFAULT NULL, 
`trailer_id` int(3) unsigned DEFAULT NULL,                    
PRIMARY KEY (`fluid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


/*======================================================================================*/
/*                               END FLEET MANAGEMENT                                   */
/*======================================================================================*/



/*======================================================================================*/
/*                                 TEMPERATURE CHECK                                    */
/*======================================================================================*/

-- 
-- Table structure for table `Temparature_Check`
--
CREATE TABLE IF NOT EXISTS `Temparature_Check` (
`temp_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
`check_date` date NOT NULL,
`check_time` time NOT NULL,
`tank1_temp` double unsigned NOT NULL,
`tank2_temp` double unsigned NOT NULL,
`tank3_temp` double unsigned NOT NULL,                   
PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ; 


/*======================================================================================*/
/*                               END TEMPERATURE CHECK                                  */
/*======================================================================================*/


GRANT SELECT, INSERT, UPDATE, DELETE ON rwlholdings_potato_solutions.*
	TO 'rwl_user'@'localhost'
	IDENTIFIED BY 'rwl_pass';

FLUSH PRIVILEGES;









<?php
/**
 * This file provides the business functionality for the pickup index.php page.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @author      Trevor Heffel
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-25
 */

// Include php files
include('../database.php');

// Insert pickup
if (isset($_POST['submit'])) {	
	$date = $db->real_escape_string($_POST['date']);
	$driver = $db->real_escape_string($_POST['driver']);
	$dispatcher = $db->real_escape_string($_POST['dispatcher']);
	$truck = $db->real_escape_string($_POST['truck']);
	$trailer = $db->real_escape_string($_POST['trailer']);
	$farm = $db->real_escape_string($_POST['farm']);
	$warehouse = $db->real_escape_string($_POST['warehouse']);
	$bin = $db->real_escape_string($_POST['bin']);
	$binMarker = $db->real_escape_string($_POST['binMarker']);
	$field = $db->real_escape_string($_POST['field']);
	$potato = $db->real_escape_string($_POST['potato']);
	$farmArrivalTime = $db->real_escape_string($_POST['farmArrivalTime']);
	$loadTime = $db->real_escape_string($_POST['loadTime']);
	$farmDepartureTime = $db->real_escape_string($_POST['farmDepartureTime']);
	$rwlArrivalTime = $db->real_escape_string($_POST['rwlArrivalTime']);
	$rwlUnloadTime = $db->real_escape_string($_POST['rwlUnloadTime']);
	$rwlDepartureTime = $db->real_escape_string($_POST['rwlDepartureTime']);
	$ticketNumber = $db->real_escape_string($_POST['ticketNumber']);
	$grossWeight = $db->real_escape_string($_POST['grossWeight']);
	$tareWeight = $db->real_escape_string($_POST['tareWeight']);
	
	$query = "INSERT INTO pick_up (pd_date, driver_id, dispatcher_id, trailer_id, truck_id, farm_id, warehouse_id, bin_id, bin_marker, field_id, arrive_time_farm, load_time, depart_time_farm, arrive_time_rwl, unload_time, depart_time_rwl, ticket_num, gross_weight, tare_weight, potato_id, emp_id) VALUES (" . $date . "," . $driver . "," . $dispatcher . "," . $trailer . "," . $truck . "," . $farm . "," . $warehouse . "," . $bin . "," . $binMarker . "," . $field . "," . $warehouse . "," . $bin . "," . $binMarker . "," . $field . ",'" . $farmArrivalTime . ",'" . $loadTime . ",'" . $farmDepartureTime . ",'" . $rwlArrivalTime . ",'" . $rwlUnloadTime . ",'" . $rwlDepartureTime . "," . $ticketNumber . "," . $grossWeight . "," . $tareWeight . "," . $potato . "," . $empId . ")";
	$result = $db->query($query);
}
?>
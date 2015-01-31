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
	
	$query = "INSERT INTO pick_up (pd_date, driver_id, dispatcher_id, trailer_id, truck_id, farm_id, warehouse_id, bin_id, bin_marker, field_id, arrive_time_farm, load_time, depart_time_farm, arrive_time_rwl, unload_time, depart_time_rwl, ticket_num, gross_weight, tare_weight, potato_id, emp_id) 
				VALUES ('" . $date . "'," . $driver . "," . $dispatcher . "," . $trailer . "," . $truck . "," . $farm . "," . $warehouse . "," . $bin . "," . $binMarker . "," . $field . ",'" . $farmArrivalTime . "','" . $loadTime . "','" . $farmDepartureTime . "','" . $rwlArrivalTime . "','" . $rwlUnloadTime . "','" . $rwlDepartureTime . "'," . $ticketNumber . "," . $grossWeight . "," . $tareWeight . "," . $potato . "," . $empId . ")";
	$result = $db->query($query);
}

// Load array with incoming deliveries for day by employee
$query = "SELECT pickup_id, pd_date, truck_num, trailer_num, farm_name, warehouse_name 
			FROM pick_up INNER JOIN truck ON pick_up.truck_id = truck.truck_id 
						INNER JOIN trailer ON pick_up.trailer_id = trailer.trailer_id
						INNER JOIN farm ON pick_up.farm_id = farm.farm_id
						INNER JOIN warehouse ON pick_up.warehouse_id = warehouse.warehouse_id
			WHERE pd_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY pd_date DESC";
$result = $db->query($query);

while ($row = $result->fetch_assoc()){
	$pickupId = $row['pickup_id'];
    $date = $row['pd_date'];
    $truck = $row['truck_num']; 
    $trailer = $row['trailer_num'];
    $farm = $row['farm_name'];   
    $warehouse = $row['warehouse_name']; 
    $incomingDeliveries[] = array($pickupId, $date, $truck, $trailer, $farm, $warehouse);
    $_SESSION['incomingDeliveries'] = $incomingDeliveries;
}

// Select incoming deliveries 
for ($x = 0; $x < count($_SESSION['incomingDeliveries']); $x++){	
    if (isset($_POST[$incomingDeliveries[$x][0]])) {
  		$_SESSION['deliveryNum'] = $incomingDeliveries[$x][0];
  		$query = "SELECT arrive_time_farm, load_time, depart_time_farm, arrive_time_rwl, unload_time, depart_time_rwl, ticket_num, gross_weight, tare_weight 
  			FROM pick_up WHERE pickup_id = " . $_SESSION['deliveryNum'];
						var_dump($query);
    	$result = $db->query($query);
    	$row = $result->fetch_assoc();
		$arriveTimeFarm = $row['arrive_time_farm'];
	    $loadTime = $row['load_time'];
	    $departTimeFarm = $row['depart_time_farm']; 
	    $arriveTimeRwl = $row['arrive_time_rwl'];
	    $unloadTime = $row['unload_time'];   
	    $departTimeRwl = $row['depart_time_rwl']; 
	    $ticketNum = $row['ticket_num'];   
	    $grossWeight = $row['gross_weight']; 
	    $tareWeight = $row['tare_weight'];   
    	$editIncomingDeliveries[] = array($arriveTimeFarm, $loadTime, $departTimeFarm, $arriveTimeRwl, $unloadTime, $departTimeRwl, $ticketNum,
    		$grossWeight, $tareWeight); 
    	$_SESSION['editIncomingDeliveries'] = $editIncomingDeliveries;
        header ("location:edit_pickup.php?id=" . $_SESSION['deliveryNum'] );
	}
}

if (isset($_POST['update'])) {	
	$farmArrivalTime = $db->real_escape_string($_POST['farmArrivalTime']);
	$loadTime = $db->real_escape_string($_POST['loadTime']);
	$farmDepartureTime = $db->real_escape_string($_POST['farmDepartureTime']);
	$rwlArrivalTime = $db->real_escape_string($_POST['rwlArrivalTime']);
	$rwlUnloadTime = $db->real_escape_string($_POST['rwlUnloadTime']);
	$rwlDepartureTime = $db->real_escape_string($_POST['rwlDepartureTime']);
	$ticketNumber = $db->real_escape_string($_POST['ticketNumber']);
	$grossWeight = $db->real_escape_string($_POST['grossWeight']);
	$tareWeight = $db->real_escape_string($_POST['tareWeight']);
	
	$query = "UPDATE pick_up SET arrive_time_farm = '" . $farmArrivalTime . "', load_time = '" . $loadTime . "',
				depart_time_farm = '" . $farmDepartureTime . "', arrive_time_rwl = '" . $rwlArrivalTime . "',
				unload_time = '" . $rwlUnloadTime . "', depart_time_rwl = '" . $rwlDepartureTime . "',
				ticket_num = " . $ticketNumber . ", gross_weight = " . $grossWeight . ", tare_weight = " . $tareWeight . "
				WHERE pickup_id = " . $_SESSION['deliveryNum'];
	$result = $db->query($query);
	
	// kill session var 'editIncomingDeliveries'
	unset($_SESSION['editIncomingDeliveries']);
	header ("location:index.php");
} 
?>
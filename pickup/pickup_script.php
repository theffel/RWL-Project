<?php
/**
 * This file provides the business functionality for the attendance index.php page.
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
 * @since       2015-01-22
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
	
	$query = "INSERT INTO fuel (truck_id, purchase_date, mileage, litres, cost, location, emp_id) VALUES (" . $truck . ",'" . $dateTime . "',
		" . $mileage . ", " . $litres . "," . $cost . ",'" . $location . "'," . $empId . ")";
	$result = $db->query($query);
}
/*
	// load array with fuel receipts for day by employee
    $query = "SELECT fuel_id, truck_num, purchase_date, mileage, litres, cost, location FROM fuel INNER JOIN truck ON fuel.truck_id = truck.truck_id 
    	WHERE purchase_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY purchase_date DESC";
	
	// need to be able to handle more then one login for the day
	$result = $db->query($query);
	while ($row = $result->fetch_assoc()){
	$fuelId = $row['fuel_id'];
    $date = $row['purchase_date'];
    $truck = $row['truck_num']; 
    $litres = $row['litres'];
    $cost = $row['cost'];   
    $mileage = $row['mileage'];
    $location = $row['location'];   
    $fuelReceipts[] = array($fuelId, $date, $truck, $mileage, $litres, $cost, $location);
    $_SESSION['fuelReceipts'] = $fuelReceipts;
	}

// insert attendance - end punch clock for employee
	for ($x = 0; $x < count($_SESSION['fuelReceipts']); $x++){	

    	if (isset($_POST[$fuelReceipts[$x][0]])) {
  		$_SESSION['receiptNum'] = $fuelReceipts[$x][0];
  		$query = "SELECT truck_num, purchase_date, mileage, litres, cost, location FROM fuel INNER JOIN truck ON fuel.truck_id = truck.truck_id 
    	WHERE fuel_id = " . $_SESSION['receiptNum'];
    	$result = $db->query($query);
    	$row = $result->fetch_assoc();
		$date = $row['purchase_date'];
		$truck = $row['truck_num']; 
    	$litres = $row['litres'];
    	$cost = $row['cost'];   
   		$mileage = $row['mileage'];
    	$location = $row['location'];  
    	$editReceipt[] = array($purchase_date, $date, $truck, $mileage, $litres, $cost, $location); 
    	$_SESSION['editReceipt'] = $editReceipt;
        header ("location:edit_fuel.php?id=" . $_SESSION['receiptNum'] );
	
}
}

if (isset($_POST['update'])) {	
	$date = $db->real_escape_string($_POST['date']);	
	$truck = $db->real_escape_string($_POST['truck']);
	$mileage = $db->real_escape_string($_POST['mileage']);
	$litres = $db->real_escape_string($_POST['litres']);
	$cost = $db->real_escape_string($_POST['cost']);
	$location = $db->real_escape_string($_POST['location']);
	
	$query = "SELECT truck_id FROM truck WHERE truck_num = '" . $truck . "'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$truckId = $row['truck_id'];
	
	$query = "UPDATE fuel SET truck_id = " . $truckId . ", purchase_date = '" . $dateTime . "', mileage =" . $mileage . ", litres = " . $litres . ",
		cost = " . $cost . ", location = '" . $location . "'";
	$result = $db->query($query);
	// kill session var 'fuelReceipts'
	unset($_SESSION['fuelReceipts']);
	header ("location:index.php");
}
*/
?>

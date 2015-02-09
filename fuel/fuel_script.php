<?php
/**
 * This file provides the business functionality for the fuel index.php page.
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
include('../session_load.php');

// Insert fuel
if (isset($_POST['submit'])) {	
	$date = $db->real_escape_string($_POST['date']);	
	$truck = $db->real_escape_string($_POST['truck']);
	$mileage = $db->real_escape_string($_POST['mileage']);
	$litres = $db->real_escape_string($_POST['litres']);
	$cost = $db->real_escape_string($_POST['cost']);
	$location = $db->real_escape_string($_POST['location']);
	// $takePicture = $db->real_escape_string($_POST['take-picture']);

	$query = "INSERT INTO fuel (truck_id, purchase_date, mileage, litres, cost, location, emp_id) VALUES (" . $truck . ",'" . $dateTime . "', " . $mileage . ", " . $litres . "," . $cost . ",'" . $location . "'," . $empId . ")";
	$result = $db->query($query);
}

// Load array with fuel receipts for day by employee
$query = "SELECT fuel_id, truck_num, purchase_date, mileage, litres, cost, location FROM fuel INNER JOIN truck ON fuel.truck_id = truck.truck_id WHERE purchase_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY purchase_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()) {
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

	// Select fuel receipts
	for ($x = 0; $x < count($_SESSION['fuelReceipts']); $x++) {
		if (isset($_POST[$fuelReceipts[$x][0]])) {
			$_SESSION['receiptNum'] = $fuelReceipts[$x][0];
			$query = "SELECT truck_num, purchase_date, mileage, litres, cost, location 
			FROM fuel INNER JOIN truck ON fuel.truck_id = truck.truck_id WHERE fuel_id = " . $_SESSION['receiptNum'];
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$date = $row['purchase_date'];
			$truck = $row['truck_num'];
			$litres = $row['litres'];
			$cost = $row['cost'];
			$mileage = $row['mileage'];
			$location = $row['location'];
			$editReceipt[] = array($date, $truck, $mileage, $litres, $cost, $location); 
			$_SESSION['editReceipt'] = $editReceipt;
			header("location:edit_fuel.php?id=" . $_SESSION['receiptNum'] );
		}
	}
}

// Update fuel
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
	
	$query = "UPDATE fuel SET truck_id = " . $truckId . ", purchase_date = '" . $date . "', mileage =" . $mileage . ", litres = " . $litres . ", cost = " . $cost . ", location = '" . $location . "' WHERE fuel_id = " . $_SESSION['receiptNum'];
	$result = $db->query($query);
	
	// kill session var 'fuelReceipts'
	unset($_SESSION['fuelReceipts']);
	header("location:index.php");
} 
?>
<?php
/**
 * This file provides the business functionality for the product reception index.php page.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-02-09
 */

// Include php files
include('../database.php');
include('../session_load.php');

// Insert product reception
if (isset($_POST['submit'])) {	
	$date = $db->real_escape_string($_POST['date']);	
	$farm = $db->real_escape_string($_POST['farm']);
	$potato = $db->real_escape_string($_POST['potato']);
	$loadIDInfo = $db->real_escape_string($_POST['loadIDInfo']);
	$quantity = $db->real_escape_string($_POST['quanRecieved']);
	$bulkOther = $db->real_escape_string($_POST['bulkOther']);
	$washed = $db->real_escape_string($_POST['washed']);
	$cleanliness = $db->real_escape_string($_POST['cleanliness']);
	$CFIANotified = $db->real_escape_string($_POST['CFIANotified']);
	$CFIANotifiedBy = $db->real_escape_string($_POST['CFIANotifiedBy']);
	$movementCert = $db->real_escape_string($_POST['movementCert']);
	$accepted = $db->real_escape_string($_POST['accepted']);

	$query = "INSERT INTO production_reception (reception_date, potato_id, farm_id, load_info_id, quantity_recieved, washed, trailer_tandom, CFIA_notified, movement_certificate, accepted, emp_id) VALUES ('" . $dateTime . "', " . $potato . ", " . $farm . ", " . $loadIDInfo . ", " . $quantity . ", " . $washed . ", " . $bulkOther . ", " . $CFIANotified . ", " . $CFIANotifiedBy . ", " . $movementCert . ", " . $accepted . ", " . $empId . ")";
	$result = $db->query($query);
}

// Load array with product receptions for day by employee
$query = "SELECT reception_id, reception_date, potato_name, farm_name, load_info_id, quantity_recieved FROM production_reception INNER JOIN potato ON production_reception.potato_id = potato.potato_id INNER JOIN farm ON production_reception.farm_id = farm.farm_id WHERE reception_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY reception_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()) {
		$receptionId = $row['reception_id'];
    	$date = $row['reception_date'];
    	$potato = $row['potato_name']; 
    	$farm = $row['farm_name'];
    	$loadIDInfo = $row['load_info_id'];   
    	$quantity = $row['quantity_recieved'];  
    	$productionReception[] = array($receptionId, $date, $potato, $farm, $loadIDInfo, $quantity);
    	$_SESSION['productionReception'] = $productionReception;
	}

	// Select fuel receipts
	// for ($x = 0; $x < count($_SESSION['productionReception']); $x++) {
	// 	if (isset($_POST[$productionReception[$x][0]])) {
	// 		$_SESSION['receptionNum'] = $productionReception[$x][0];
	// 		$query = "SELECT reception_date, potato_name, farm_name, load_info_id, quantity_recieved, washed, trailer_tandom, CFIA_notified, movement_certificate, accepted FROM production_reception INNER JOIN potato ON production_reception.potato_id = potato.potato_id INNER JOIN farm ON production_reception.farm_id = farm.farm_id WHERE reception_id = " . $_SESSION['receptionNum'];
	// 		$result = $db->query($query);
	// 		$row = $result->fetch_assoc();
	// 		$date = $row['reception_date'];
 //    		$farm = $row['farm_name'];
 //    		$potato = $row['potato_name'];
 //    		$loadIDInfo = $row['load_info_id'];
 //    		$quantity = $row['quantity_recieved'];
	// 		$editProductionReception[] = array($date, $truck, $mileage, $litres, $cost, $location); 
	// 		$_SESSION['editProductionReception'] = $editReceipt;
	// 		header("location:edit_production.php?id=" . $_SESSION['receptionNum'] );
	// 	}
	// }
}

// // Update fuel
// if (isset($_POST['update'])) {	
// 	$date = $db->real_escape_string($_POST['date']);	
// 	$truck = $db->real_escape_string($_POST['truck']);
// 	$mileage = $db->real_escape_string($_POST['mileage']);
// 	$litres = $db->real_escape_string($_POST['litres']);
// 	$cost = $db->real_escape_string($_POST['cost']);
// 	$location = $db->real_escape_string($_POST['location']);
	
// 	$query = "SELECT truck_id FROM truck WHERE truck_num = '" . $truck . "'";
// 	$result = $db->query($query);
// 	$row = $result->fetch_assoc();
// 	$truckId = $row['truck_id'];
	
// 	$query = "UPDATE fuel SET truck_id = " . $truckId . ", purchase_date = '" . $date . "', mileage =" . $mileage . ", litres = " . $litres . ", cost = " . $cost . ", location = '" . $location . "' WHERE fuel_id = " . $_SESSION['receiptNum'];
// 	$result = $db->query($query);
	
// 	// kill session var 'fuelReceipts'
// 	unset($_SESSION['fuelReceipts']);
// 	header("location:index.php");
// }
?>
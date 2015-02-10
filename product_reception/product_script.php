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

	$query = "INSERT INTO production_reception (reception_date, potato_id, farm_id, load_info_id, quantity_recieved, washed, trailer_tandom, CFIA_notified, notified_by, movement_certificate, accepted, cleanliness, emp_id) VALUES ('" . $dateTime . "', " . $potato . ", " . $farm . ", " . $loadIDInfo . ", " . $quantity . ", " . $washed . ", " . $bulkOther . ", " . $CFIANotified . ", " . $CFIANotifiedBy . ", " . $movementCert . ", " . $accepted . ", " . $cleanliness . ", " . $empId . ")";
	$result = $db->query($query);
}

// Load array with product reception for day by employee
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

	// Select product reception
	for ($x = 0; $x < count($_SESSION['productionReception']); $x++) {
		if (isset($_POST[$productionReception[$x][0]])) {
			$_SESSION['receptionNum'] = $productionReception[$x][0];
			$query = "SELECT reception_date, potato_name, farm_name, load_info_id, quantity_recieved, washed, trailer_tandom, CFIA_notified, notified_by, movement_certificate, accepted, cleanliness FROM production_reception INNER JOIN potato ON production_reception.potato_id = potato.potato_id INNER JOIN farm ON production_reception.farm_id = farm.farm_id WHERE reception_id = " . $_SESSION['receptionNum'];
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$date = $row['reception_date'];
    		$farm = $row['farm_name'];
    		$potato = $row['potato_name'];
    		$loadIDInfo = $row['load_info_id'];
    		$quantity = $row['quantity_recieved'];
    		$bulkOther = $row['trailer_tandom'];
    		$washed = $row['washed'];
    		$cleanliness = $row['cleanliness'];
    		$CFIANotified = $row['CFIA_notified'];
    		$CFIANotifiedBy = $row['notified_by'];
    		$movementCert = $row['movement_certificate'];
    		$accepted = $row['accepted'];
			$editProductionReception[] = array($date, $farm, $potato, $loadIDInfo, $quantity, $bulkOther, $washed, $cleanliness, $CFIANotified, $CFIANotifiedBy, $movementCert, $accepted); 
			$_SESSION['editProductionReception'] = $editReceipt;
			header("location:edit_product.php?id=" . $_SESSION['receptionNum'] );
		}
	}
}

// Update product reception
if (isset($_POST['update'])) {	
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
	
	$query = "SELECT farm_id FROM farm WHERE farm_name = '" . $farm . "'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$farmId = $row['farm_id'];

	$query = "SELECT potato_id FROM potato WHERE potato_name = '" . $potato . "'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$potatoId = $row['potato_id'];
	
	$query = "UPDATE production_reception SET reception_date = '" . $date . "', potato_id = " . $potatoId . ", farm_id =" . $farmId . ", load_info_id = " . $loadIDInfo . ", quantity_recieved = " . $quanRecieved . ", washed = " . $washed . ", trailer_tandom = " . $bulkOther . ", CFIA_notified = " . $CFIANotified . ", notified_by = " . $CFIANotifiedBy . ", movement_certificate = " . $movementCert . ", accepted = " . $accepted . ", cleanliness = " . $cleanliness . " WHERE reception_id = " . $_SESSION['receptionNum'];
	$result = $db->query($query);
	
	// kill session var 'productionReception'
	unset($_SESSION['productionReception']);
	header("location:index.php");
}
?>
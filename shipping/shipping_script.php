<?php
/**
 * This file provides the business functionality for the shipping index.php page.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Stirling Giddings
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

// Insert shipping
if (isset($_POST['submit'])) {	
	$date = $db->real_escape_string($_POST['date']);	
	$potato = $db->real_escape_string($_POST['potato']);
	$farm = $db->real_escape_string($_POST['farm']);
	$trailer = $db->real_escape_string($_POST['trailer']);
	$loadIDInfo = $db->real_escape_string($_POST['loadIDInfo']);
	$weight = $db->real_escape_string($_POST['weight']);
	$washed = $db->real_escape_string($_POST['washed']);
	$destination = $db->real_escape_string($_POST['destination']);

	$query = "INSERT INTO shipping (ship_date, potato_id, farm_id, trailer_id, load_id_info, weight_shipped, washed, dest_id, emp_id) VALUES ('" . $dateTime . "', " . $potato . ", " . $farm . "," . $trailer . "," . $loadIDInfo . "," . $weight . "," . $washed . "," . $destination . "," . $empId . ")";
	$result = $db->query($query);

}

// Load array with shipping info for day by employee
$query = "SELECT ship_id, ship_date, potato_name, farm_name, trailer_num, weight_shipped, dest_name 
			FROM shipping INNER JOIN potato ON shipping.potato_id = potato.potato_id 
						INNER JOIN trailer ON shipping.trailer_id = trailer.trailer_id
						INNER JOIN farm ON shipping.farm_id = farm.farm_id
						INNER JOIN destination ON shipping.dest_id = destination.dest_id
			WHERE ship_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY ship_date DESC";

$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()) {
		$shipId = $row['ship_id'];
    	$date = $row['ship_date'];
    	$potato = $row['potato_name']; 
    	$farm = $row['farm_name'];
    	$trailer = $row['trailer_num'];   
    	$weight = $row['weight_shipped'];
    	$destination = $row['dest_name'];   
    	$shipDetails[] = array($shipId, $date, $potato, $farm, $trailer, $weight, $destination);
    	$_SESSION['shipDetails'] = $shipDetails;
	}


	// Select fuel receipts
	for ($x = 0; $x < count($_SESSION['shipDetails']); $x++) {
		if (isset($_POST[$shipDetails[$x][0]])) {
			$_SESSION['shipNum'] = $shipDetails[$x][0];
			$query = "SELECT ship_date, potato_name, farm_name, trailer_num, load_id_info, weight_shipped, washed, dest_name 
			FROM shipping INNER JOIN potato ON shipping.potato_id = potato.potato_id 
						INNER JOIN trailer ON shipping.trailer_id = trailer.trailer_id
						INNER JOIN farm ON shipping.farm_id = farm.farm_id
						INNER JOIN destination ON shipping.dest_id = destination.dest_id
			WHERE ship_id = " . $_SESSION['shipNum'];

			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$date = $row['ship_date'];
	    	$potato = $row['potato_name']; 
	    	$farm = $row['farm_name'];
	    	$trailer = $row['trailer_num']; 
	    	$loadIdInfo = $row['load_id_info'];   
	    	$weight = $row['weight_shipped'];
	    	$washed = $row['washed'];
	    	$destination = $row['dest_name'];   
	    	$editShipping[] = array($date, $potato, $farm, $trailer, $loadIdInfo, $weight, $washed, 
	    		$destination); 
			$_SESSION['editShipping'] = $editShipping;
			header("location:edit_shipping.php?id=" . $_SESSION['shipNum'] );
		}
	}
}

// Update fuel
if (isset($_POST['update'])) {	
	$date = $db->real_escape_string($_POST['date']);	
	$potato = $db->real_escape_string($_POST['potato']);
	$farm = $db->real_escape_string($_POST['farm']);
	$trailer = $db->real_escape_string($_POST['trailer']);
	$loadIDInfo = $db->real_escape_string($_POST['loadIDInfo']);
	$weight = $db->real_escape_string($_POST['weight']);
	$washed = $db->real_escape_string($_POST['washed']);
	$destination = $db->real_escape_string($_POST['destination']);
	
	$query = "SELECT trailer_id FROM trailer WHERE trailer_num = '" . $trailer . "'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$trailerId = $row['trailer_id'];

	$query = "SELECT farm_id FROM farm WHERE farm_name = '" . $farm . "'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$farmId = $row['farm_id'];

	$query = "SELECT potato_id FROM potato WHERE potato_name = '" . $potato . "'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$potatoId = $row['potato_id'];

	$query = "SELECT dest_id FROM destination WHERE dest_name = '" . $destination . "'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$destId = $row['dest_id'];

	
	$query = "UPDATE shipping SET ship_date = '" . $date . "', potato_id = " . $potatoId . ", farm_id =" . $farmId . ", trailer_id = " . $trailerId . ", load_id_info = " . $loadIDInfo . ", weight_shipped = " . $weight . ", washed = " . $washed . ", dest_id = " . $destId . " WHERE ship_id = " . $_SESSION['shipNum'];

	$result = $db->query($query);
	
	// kill session var 'fuelReceipts'
	unset($_SESSION['shipDetails']);
	header("location:index.php");
} 
?>
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

//to display the shipping details of all employees
$query = "SELECT ship_id, load_begin, potato_name, farm_name, truck_num, trailer_num, weight_shipped, dest_name 
			FROM shipping INNER JOIN potato ON shipping.potato_id = potato.potato_id 
						INNER JOIN trailer ON shipping.trailer_id = trailer.trailer_id
						INNER JOIN farm ON shipping.farm_id = farm.farm_id
						INNER JOIN destination ON shipping.dest_id = destination.dest_id
						INNER JOIN truck ON shipping.truck_id = truck.truck_id
			WHERE delivery_accepted = 1 AND load_begin LIKE '" . $currentDate . "%' ORDER BY load_begin DESC";			

$result = $db->query($query);


if (!empty($result)) {
	while ($row = $result->fetch_assoc()) {
		$shipId = $row['ship_id'];
    	$rwlLoadBegin = $row['load_begin'];
    	$potato = $row['potato_name']; 
    	$farm = $row['farm_name'];
    	$truck = $row['truck_num']; 
    	$trailer = $row['trailer_num'];   
    	$weight = $row['weight_shipped'];
    	$destination = $row['dest_name'];   
    	$shipDisplayedDetails[] = array($shipId, $rwlLoadBegin, $potato, $farm, $truck, $trailer, $weight, $destination);
    	$_SESSION['shipDisplayedDetails'] = $shipDisplayedDetails;
	}

}
for ($x = 0; $x < count($_SESSION['shipDisplayedDetails']); $x++) {
		if (isset($_POST[$shipDisplayedDetails[$x][0]])) {
			$_SESSION['shipNum'] = $shipDisplayedDetails[$x][0];
			
$query = "UPDATE shipping SET delivery_accepted = 0 WHERE ship_id = " . $_SESSION['shipNum'];		 
		
	$result = $db->query($query);

			header("location:delivery.php?id=" . $_SESSION['shipNum'] );
		}
	}


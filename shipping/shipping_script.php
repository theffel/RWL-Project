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
	$rwlLoadBegin = $db->real_escape_string($_POST['rwlLoadBegin']);
	$rwlLoadEnd = $db->real_escape_string($_POST['rwlLoadEnd']);
	$rwlDepartureTime = $db->real_escape_string($_POST['rwlDepartureTime']);	
	$potato = $db->real_escape_string($_POST['potato']);
	$farm = $db->real_escape_string($_POST['farm']);
	$truck = $db->real_escape_string($_POST['truck']);
	$trailer = $db->real_escape_string($_POST['trailer']);
	$dispatcher = $db->real_escape_string($_POST['dispatcher']);
	$driver = $db->real_escape_string($_POST['driver']);
	$rwlTicNum = $db->real_escape_string($_POST['rwlTicNum']);
	$weight = $db->real_escape_string($_POST['weight']);
	$washed = $db->real_escape_string($_POST['washed']);
	$destination = $db->real_escape_string($_POST['destination']);
	$procArrivalTime = $db->real_escape_string($_POST['procArrivalTime']);
	$procUnloadBegin = $db->real_escape_string($_POST['procUnloadBegin']);
	$procUnloadEnd = $db->real_escape_string($_POST['procUnloadEnd']);
	$procDepartureTime = $db->real_escape_string($_POST['procDepartureTime']);
	$procTicNum = $db->real_escape_string($_POST['procTicNum']);
	$grossWeight = $db->real_escape_string($_POST['grossWeight']);
	$tareWeight = $db->real_escape_string($_POST['tareWeight']);
	$rejected = $db->real_escape_string($_POST['rejected']);

	$query = "INSERT INTO shipping (load_begin, load_end, depart_rwl, potato_id, farm_id, trailer_id, rwl_ticket_num, weight_shipped, washed, dest_id, emp_id,
								arrival, unload_begin, unload_end, depart_processor, proc_ticket_num, gross_weight, tare_weight, rejected) 
		VALUES ('" . $rwlLoadBegin . "','" . $rwlLoadEnd . "','" . $rwlDepartureTime . "', " . $potato . ", " . $farm . "," . $trailer . "," . $rwlTicNum . "," . $weight . "," . $washed . "," . $destination . "," . $empId . ",
					'" . $procArrivalTime . "','" . $procUnloadBegin . "','" . $procUnloadEnd . "','" . $procDepartureTime . "', " . $procTicNum . ", " . $grossWeight . "," . $tareWeight . "," . $rejected . ")";
	$result = $db->query($query);

}

// Load array with shipping info for day by employee
$query = "SELECT ship_id, load_begin, potato_name, farm_name, trailer_num, weight_shipped, dest_name 
			FROM shipping INNER JOIN potato ON shipping.potato_id = potato.potato_id 
						INNER JOIN trailer ON shipping.trailer_id = trailer.trailer_id
						INNER JOIN farm ON shipping.farm_id = farm.farm_id
						INNER JOIN destination ON shipping.dest_id = destination.dest_id
			WHERE load_begin LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY load_begin DESC";

$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()) {
		$shipId = $row['ship_id'];
    	$rwlLoadBegin = $row['load_begin'];
    	$potato = $row['potato_name']; 
    	$farm = $row['farm_name'];
    	$trailer = $row['trailer_num'];   
    	$weight = $row['weight_shipped'];
    	$destination = $row['dest_name'];   
    	$shipDetails[] = array($shipId, $rwlLoadBegin, $potato, $farm, $trailer, $weight, $destination);
    	$_SESSION['shipDetails'] = $shipDetails;
	}


	// Select shipping details
	for ($x = 0; $x < count($_SESSION['shipDetails']); $x++) {
		if (isset($_POST[$shipDetails[$x][0]])) {
			$_SESSION['shipNum'] = $shipDetails[$x][0];
			$query = "SELECT load_begin, load_end, depart_rwl, rwl_ticket_num, weight_shipped, washed,
			 			arrival, unload_begin, unload_end, depart_processor, proc_ticket_num, gross_weight, tare_weight, rejected
			FROM shipping INNER JOIN potato ON shipping.potato_id = potato.potato_id 
						INNER JOIN trailer ON shipping.trailer_id = trailer.trailer_id
						INNER JOIN farm ON shipping.farm_id = farm.farm_id
						INNER JOIN destination ON shipping.dest_id = destination.dest_id
			WHERE ship_id = " . $_SESSION['shipNum'];

			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$rwlLoadBegin = $row['load_begin'];
			$rwlLoadEnd = $row['load_end'];
			$rwlDepartureTime = $row['depart_rwl'];
	    	//$potato = $row['potato_name']; 
	    	//$farm = $row['farm_name'];
	    	$rwlTicNum = $row['rwl_ticket_num'];   
	    	$weight = $row['weight_shipped'];
	    	$washed = $row['washed'];
	    	//$destination = $row['dest_name'];
	    	$procArrivalTime = $row['arrival'];
	    	$procUnloadBegin = $row['unload_begin'];
	    	$procUnloadEnd = $row['unload_end'];
	    	$procDepartureTime = $row['depart_processor'];
	    	$procTicNum = $row['proc_ticket_num'];
	    	$grossWeight = $row['gross_weight'];
	    	$tareWeight = $row['tare_weight'];
	    	$rejected = $row['rejected'];   
	    	$editShipping[] = array($rwlLoadBegin, $rwlLoadEnd, $rwlDepartureTime, $rwlTicNum, $weight, $washed, 
	    		 $procArrivalTime, $procUnloadBegin, $procUnloadEnd, $procDepartureTime, $procTicNum, 
	    		 $grossWeight, $tareWeight, $rejected); 
			$_SESSION['editShipping'] = $editShipping;
			header("location:edit_shipping.php?id=" . $_SESSION['shipNum'] );
		}
	}
}

// Update shipping
if (isset($_POST['update'])) {	
	$rwlLoadBegin = $db->real_escape_string($_POST['rwlLoadBegin']);
	$rwlLoadEnd = $db->real_escape_string($_POST['rwlLoadEnd']);
	$rwlDepartureTime = $db->real_escape_string($_POST['rwlDepartureTime']);	
	//$potato = $db->real_escape_string($_POST['potato']);
	//$farm = $db->real_escape_string($_POST['farm']);
	//$truck = $db->real_escape_string($_POST['truck']);
	//$trailer = $db->real_escape_string($_POST['trailer']);
	//$dispatcher = $db->real_escape_string($_POST['dispatcher']);
	//$driver = $db->real_escape_string($_POST['driver']);
	$rwlTicNum = $db->real_escape_string($_POST['rwlTicNum']);
	$weight = $db->real_escape_string($_POST['weight']);
	$washed = $db->real_escape_string($_POST['washed']);
	//$destination = $db->real_escape_string($_POST['destination']);
	$procArrivalTime = $db->real_escape_string($_POST['procArrivalTime']);
	$procUnloadBegin = $db->real_escape_string($_POST['procUnloadBegin']);
	$procUnloadEnd = $db->real_escape_string($_POST['procUnloadEnd']);
	$procDepartureTime = $db->real_escape_string($_POST['procDepartureTime']);
	$procTicNum = $db->real_escape_string($_POST['procTicNum']);
	$grossWeight = $db->real_escape_string($_POST['grossWeight']);
	$tareWeight = $db->real_escape_string($_POST['tareWeight']);
	$rejected = $db->real_escape_string($_POST['rejected']);
	
	/*$query = "SELECT trailer_id FROM trailer WHERE trailer_num = '" . $trailer . "'";
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
	$destId = $row['dest_id'];*/

	
	$query = "UPDATE shipping SET load_begin = '" . $rwlLoadBegin . "', load_end = '" . $rwlLoadEnd . "', depart_rwl = '" . $rwlDepartureTime . "', rwl_ticket_num = " . $rwlTicNum . ", weight_shipped = " . $weight . ", 
	washed = " . $washed . ", arrival = '" . $procArrivalTime . "', unload_begin = '" . $procUnloadBegin . "', unload_end = '" . $procUnloadEnd . "', depart_processor = '" . $procDepartureTime . "', 
	proc_ticket_num = " . $procTicNum . ", gross_weight = " . $grossWeight . ", tare_weight = " . $tareWeight . ", rejected = " . $rejected . " 
	 WHERE ship_id = " . $_SESSION['shipNum'];

	$result = $db->query($query);
	
	// kill session var 'shipDetails'
	unset($_SESSION['shipDetails']);
	header("location:index.php");
} 
?>
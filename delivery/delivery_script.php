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


// Insert delivery
if (isset($_POST['submitBtn'])) {	
	$procArrivalTime = $db->real_escape_string($_POST['procArrivalTime']);
	$procUnloadBegin = $db->real_escape_string($_POST['procUnloadBegin']);
	$procUnloadEnd = $db->real_escape_string($_POST['procUnloadEnd']);
	$procDepartureTime = $db->real_escape_string($_POST['procDepartureTime']);
	$procTicNum = $db->real_escape_string($_POST['procTicNum']);
	$grossWeight = $db->real_escape_string($_POST['grossWeight']);
	$tareWeight = $db->real_escape_string($_POST['tareWeight']);
	$rejected = $db->real_escape_string($_POST['rejected']);

	$query = "INSERT INTO delivery_record (arrival, unload_begin, unload_end, depart_processor, proc_ticket_num, gross_weight, tare_weight, rejected, emp_id) 
		VALUES ('" . $procArrivalTime . "','" . $procUnloadBegin . "','" . $procUnloadEnd . "','" . $procDepartureTime . "', " . $procTicNum . ", " . $grossWeight . "," . $tareWeight . "," . $rejected . ", " . $empId . " )";
		
	$result = $db->query($query);


}

// Load array with delivery info for day by employee
$query = "SELECT record_id, arrival, unload_begin, unload_end, depart_processor, proc_ticket_num, gross_weight, tare_weight, rejected  
			FROM delivery_record 
			WHERE arrival LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY arrival DESC";

$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()) {
		$recordId = $row['record_id'];
    	$procArrivalTime = $row['arrival'];
    	$procUnloadBegin = $row['unload_begin']; 
    	$procUnloadEnd = $row['unload_end'];
    	$procDepartureTime = $row['depart_processor'];   
    	$procTicNum = $row['proc_ticket_num'];
    	$grossWeight = $row['gross_weight'];
    	$tareWeight = $row['tare_weight'];
    	$rejected = $row['rejected'];  
    	$deliveryDetails[] = array($recordId, $procArrivalTime, $procUnloadBegin, $procUnloadEnd, $procDepartureTime, $procTicNum, $grossWeight, $tareWeight, $rejected);
    	$_SESSION['deliveryDetails'] = $deliveryDetails;
	}


	// Select delivery details
	for ($x = 0; $x < count($_SESSION['deliveryDetails']); $x++) {
		if (isset($_POST[$deliveryDetails[$x][0]])) {
			$_SESSION['recordNum'] = $deliveryDetails[$x][0];
			$query = "SELECT arrival, unload_begin, unload_end, depart_processor, proc_ticket_num, gross_weight, tare_weight, rejected
			FROM delivery_record
			WHERE record_id = " . $_SESSION['recordNum'];

			$result = $db->query($query);
			$row = $result->fetch_assoc();
	    	//$potato = $row['potato_name']; 
	    	//$farm = $row['farm_name'];
	    	//$destination = $row['dest_name'];
	    	$procArrivalTime = $row['arrival'];
	    	$procUnloadBegin = $row['unload_begin'];
	    	$procUnloadEnd = $row['unload_end'];
	    	$procDepartureTime = $row['depart_processor'];
	    	$procTicNum = $row['proc_ticket_num'];
	    	$grossWeight = $row['gross_weight'];
	    	$tareWeight = $row['tare_weight'];
	    	$rejected = $row['rejected'];   
	    	$editDelivery[] = array( $procArrivalTime, $procUnloadBegin, $procUnloadEnd, $procDepartureTime, $procTicNum, 
	    		 $grossWeight, $tareWeight, $rejected); 
			$_SESSION['editDelivery'] = $editDelivery;
			header("location:edit_delivery.php?id=" . $_SESSION['recordNum'] );
		}
	}
}

// Update delivery
if (isset($_POST['updateBtn'])) {		
	//$potato = $db->real_escape_string($_POST['potato']);
	//$farm = $db->real_escape_string($_POST['farm']);
	//$truck = $db->real_escape_string($_POST['truck']);
	//$trailer = $db->real_escape_string($_POST['trailer']);
	//$dispatcher = $db->real_escape_string($_POST['dispatcher']);
	//$driver = $db->real_escape_string($_POST['driver']);
	//$destination = $db->real_escape_string($_POST['destination']);
	$procArrivalTime = $db->real_escape_string($_POST['procArrivalTime']);
	$procUnloadBegin = $db->real_escape_string($_POST['procUnloadBegin']);
	$procUnloadEnd = $db->real_escape_string($_POST['procUnloadEnd']);
	$procDepartureTime = $db->real_escape_string($_POST['procDepartureTime']);
	$procTicNum = $db->real_escape_string($_POST['procTicNum']);
	$grossWeight = $db->real_escape_string($_POST['grossWeight']);
	$tareWeight = $db->real_escape_string($_POST['tareWeight']);
	$rejected = $db->real_escape_string($_POST['rejected']);
	

	
	$query = "UPDATE delivery_record SET  arrival = '" . $procArrivalTime . "', unload_begin = '" . $procUnloadBegin . "', unload_end = '" . $procUnloadEnd . "', depart_processor = '" . $procDepartureTime . "', 
	proc_ticket_num = " . $procTicNum . ", gross_weight = " . $grossWeight . ", tare_weight = " . $tareWeight . ", rejected = " . $rejected . " 
	 WHERE record_id = " . $_SESSION['recordNum'];

	$result = $db->query($query);
	
	// kill session var 'deliveryDetails'
	unset($_SESSION['deliveryDetails']);
	header("location:delivery.php");
} 

?>
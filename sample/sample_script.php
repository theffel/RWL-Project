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
include('../session_load.php');

// get last Sample#



// Insert pickup
if (isset($_POST['submit'])) {
	$trailer = $db->real_escape_string($_POST['trailer']);
	$incomingOutgoing = $db->real_escape_string($_POST['incomingOutgoing']);
	$numOfSample = $db->real_escape_string($_POST['numOfSample']);
	$potato = $db->real_escape_string($_POST['potato']);
	$date = $db->real_escape_string($_POST['date']);
	$totalWeight = $db->real_escape_string($_POST['totalWeight']);
	$useableWeight = $db->real_escape_string($_POST['useableWeight']);	
	$rotWeight = $db->real_escape_string($_POST['rotWeight']);
	$pitrotWeight = $db->real_escape_string($_POST['pitrotWeight']);	
	$internalWeight = $db->real_escape_string($_POST['internalWeight']);	
	$wirewormWeight = $db->real_escape_string($_POST['wirewormWeight']);	
	$jellyEndWeight = $db->real_escape_string($_POST['jellyendWeight']);
	$otherWeight = $db->real_escape_string($_POST['otherWeight']);	
	$hollowHeartWeight = $db->real_escape_string($_POST['hollowheartWeight']);	
	$scabWeight = $db->real_escape_string($_POST['scabWeight']);	
	$sunburnWeight = $db->real_escape_string($_POST['sunburnWeight']);	
	$mechBruiseWeight = $db->real_escape_string($_POST['mechbruiseWeight']);	
	$smallsWeight = $db->real_escape_string($_POST['smallsWeight']);
	$tenozsWeight = $db->real_escape_string($_POST['tenozsWeight']);	
	$airWeight = $db->real_escape_string($_POST['airWeight']);	
	$waterWeight = $db->real_escape_string($_POST['waterWeight']);	
	$rockMaterial = $db->real_escape_string($_POST['rockWeight']);
	
	$query = "INSERT INTO sample (num_sample_per_load, sample_date, unuseable_weight, rot_weight, internal_weight, pit_rot_weight,
			wireworm_weight, jelly_end_weight, scab_weight, hollow_heart_weight, sunburn_weight, mech_bruise_weight, smalls_weight,
			ten_oz_weight, air_weight, water_weight, rock_foreign_weight, total_sample_weight, other_weight, trailer_id, potato_id,
			in_out, emp_id) 
				VALUES (" . $numOfSample . ",'" . $date . "',"  . $useableWeight . "," . $rotWeight . "," . $internalWeight . ","
					. $pitrotWeight . "," . $wirewormWeight . "," . $jellyEndWeight . "," . $scabWeight . ","  . $hollowHeartWeight . ","
					. $sunburnWeight . "," . $mechBruiseWeight . "," . $smallsWeight . "," . $tenozsWeight . "," . $airWeight . ","
					. $waterWeight . "," . $rockMaterial . "," . $totalWeight . "," . $otherWeight . "," . $trailer . ","  . $potato . ","
					. $incomingOutgoing . "," . $empId . ")";
	$result = $db->query($query);
	var_dump($query);
}


// Load array with incoming deliveries for day by employee
$query = "SELECT sample_id, sample_date, trailer_num, num_sample_per_load, potato_name FROM sample 
						INNER JOIN trailer ON sample.trailer_id = trailer.trailer_id
						INNER JOIN potato ON sample.potato_id = potato.potato_id						
			WHERE sample_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY sample_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()){
		$sampleId = $row['sample_id'];
		$date = $row['sample_date'];
		$trailer = $row['trailer_num'];
		$potato = $row['potato_name'];   
		$numSample = $row['num_sample_per_load']; 
		$samples[] = array($sampleId, $date, $trailer, $numSample, $potato);
		$_SESSION['samples'] = $samples;
	}

	// Select incoming deliveries 
	for ($x = 0; $x < count($_SESSION['samples']); $x++){	
		if (isset($_POST[$samples[$x][0]])) {
			$_SESSION['sampleNum'] = $samples[$x][0];
			$query = "SELECT num_sample_per_load, sample_date, unuseable_weight, rot_weight, internal_weight, pit_rot_weight,
						wireworm_weight, jelly_end_weight, scab_weight, hollow_heart_weight, sunburn_weight, mech_bruise_weight, smalls_weight,
						ten_oz_weight, air_weight, water_weight, rock_foreign_weight, total_sample_weight, other_weight, trailer_num, potato_name,
						in_out FROM sample 
						INNER JOIN trailer ON sample.trailer_id = trailer.trailer_id
						INNER JOIN potato ON sample.potato_id = potato.potato_id
						WHERE sample_id = " . $_SESSION['sampleNum'];
				
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$trailer = $row['trailer_num'];
			$incomingOutgoing = $row['in_out'] ;
			$numOfSample = $row['num_sample_per_load'];
			$potato = $row['potato_name'];
			$date = $row['sample_date'];
			$totalWeight = $row['total_sample_weight'];
			$useableWeight = $row['unuseable_weight'];	
			$rotWeight = $row['rot_weight'];
			$pitrotWeight = $row['pit_rot_weight'];	
			$internalWeight = $row['internal_weight'];	
			$wirewormWeight = $row['wireworm_weight'];	
			$jellyEndWeight = $row['jelly_end_weight'];
			$otherWeight = $row['other_weight'];	
			$hollowHeartWeight = $row['hollow_heart_weight'];	
			$scabWeight = $row['scab_weight'];	
			$sunburnWeight = $row['sunburn_weight'];	
			$mechBruiseWeight = $row['mech_bruise_weight'];	
			$smallsWeight = $row['smalls_weight'];
			$tenozsWeight = $row['ten_oz_weight'];	
			$airWeight = $row['air_weight'];	
			$waterWeight = $row['water_weight'];	
			$rockMaterial = $row['rock_foreign_weight'];   
			$editSamples[] = array($trailer, $numSample, $incomingOutgoing, $potato); 
			$_SESSION['editSamples'] = $editSamples;
			header ("location:edit_sample.php?id=" . $_SESSION['sampleNum'] );
		}
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
	header("location:index.php");
} 
?>
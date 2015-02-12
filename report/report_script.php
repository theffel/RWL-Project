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
 * @since       2015-01-23
 */

// Start the session
session_start();

// Include php files
include('../database.php');
include('../session_load.php');

if (isset($_POST['Attendance'])) {
	//query for attendance data
	$query = "SELECT a.emp_id, e.emp_first_name, e.emp_last_name, a.time_in, a.time_out
			  FROM attendance as a INNER JOIN employee as e ON a.emp_id = e.emp_id
    		  WHERE a.time_in LIKE '" . $currentDate . "%'
    		  ORDER BY e.emp_first_name DESC ";
	$result = $db->query($query);
	
	
	
	if ($result != null) {
		while ($row = $result->fetch_assoc()) {
		
			$empFName = $row['emp_first_name'];
			$empLName = $row['emp_last_name'];
			$timeIn = $row['time_in'];
			$timeOut = $row['time_out'];
			$empID = $row['emp_id'];
	
			//create associative array to hold attendance details - key by empID ex. 1 or 2 or 3
			// add all details
			$attendance[$empID] = array("name" => $empFName ." ". $empLName,
									"id" => $empID,
									"timeIn" => $timeIn,
									"timeOut" => $timeOut,
									"breakTimes" => array()
									);		

			//query for break data of emp_id from above
			$query1 = "SELECT start_break, end_break
					  FROM break
    				  WHERE emp_id = ".$empID." AND start_break LIKE '".$currentDate."%' ORDER BY start_break";
			
			$result1 = $db->query($query1);

			while ($row1 = $result1->fetch_assoc()) {
				
				$startTime = "SB: ".$row1['start_break'];
				$endTime = "EB: ".$row1['end_break'];
			
			// this pushes all breaks times for each user into the appropriate array spot (array created above)
				array_push($attendance[$empID]["breakTimes"], $startTime,$endTime);
				
			}
		}		
	}

} else {
	// Work result part
	//For total potato incoming

	$query = "SELECT  (SUM(gross_weight) - SUM(tare_weight)) AS incoming FROM pick_up WHERE arrive_time_rwl LIKE '".$currentDate."%'";
	$result = $db->query($query)	;

	while($row = $result->fetch_assoc()) {
		$totalIncoming = $row['incoming'];
	}

	$IncomingPotato[] = $totalIncoming;
	$_SESSION['incoming'] = $IncomingPotato;

	//For total potato outgoing
	$query = "SELECT  SUM(tare_weight) AS outgoing FROM delivery_record WHERE arrive_date = '".$currentDate."'";
	$result = $db->query($query)	;

	while($row = $result->fetch_assoc()) {
		$outgoingPotato = $row['outgoing'];

		$outgoing[] = $outgoingPotato;
		$_SESSION['outgoing'] = $outgoing;
	}

	//For Sample Amount
	$query = "SELECT SUM(total_sample_weight) as total FROM sample WHERE sample_date LIKE '".$currentDate."%'";
	$result = $db->query($query);

	while($row = $result->fetch_assoc()) {
		$totalSampleWeight = $row['total'];
	}

	$query = "SELECT (SUM(total_sample_weight) - (SUM(unuseable_weight) + SUM(rot_weight) + SUM(internal_weight) + SUM(pit_rot_weight) + SUM(wireworm_weight) + SUM(jelly_end_weight) + SUM(scab_weight) +
					 SUM(hollow_heart_weight) + SUM(sunburn_weight) + SUM(mech_bruise_weight) + SUM(smalls_weight) + SUM(ten_oz_weight) + SUM(air_weight) + SUM(water_weight) + SUM(rock_foreign_weight) +
					 SUM(other_weight))) AS goodsum
			  FROM sample WHERE sample_date LIKE '".$currentDate."%'";
	$result = $db->query($query);

	while($row = $result->fetch_assoc()) {
		$totalGoodWeight = $row['goodsum'];
	}

	if (empty($totalSampleWeight)) {
		$totalGoodPercent = 0;
	} else {
		$totalGoodPercent = (floatval($totalGoodWeight) / floatval($totalSampleWeight)) * 100;
	}
	$sample[] = array($totalSampleWeight, $totalGoodPercent);
	$_SESSION['sample'] = $sample;
}
?>
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
    		  WHERE a.time_in > '" . $currentDate . " 00:00:00' AND a.time_out < '" . $currentDate . " 23:59:59'";

	$result = $db->query($query);
	if ($result != null) {
		while ($row = $result->fetch_assoc()) {
			$empFName = $row['emp_first_name'];
			$empLName = $row['emp_last_name'];
			$timeIn = $row['time_in'];
			$timeOut = $row['time_out'];
			$empID = $row['emp_id'];


			$attendance[] = array($empFName, $empLName, $timeIn, $timeOut);
			$_SESSION['attendance'] = $attendance;
			
			//query for break data of emp_id from above
			$query = "SELECT start_break, end_break
					  FROM break 
    				  WHERE emp_id = ".$empID." AND start_break >= '" . $currentDate . " 00:00:00' AND end_break <= '" . $currentDate . " 23:59:59'";

			$result = $db->query($query);

			while ($row = $result->fetch_assoc()) {
				$startTime = $row['start_break'];
				$endTime = $row['end_break'];

				$break[] = array($startTime, $endTime);
				$_SESSION['break'] = $break;
			}
		}
	}

//	//query for break data
//	$query = "SELECT b.start_break, b.end_break
//			  FROM break as b INNER JOIN attendance as a ON b.emp_id = a.emp_id
//    		  WHERE b.start_break > '" . $currentDate . " 00:00:00' AND b.end_break < '" . $currentDate . " 11:59:59'";
//
//	$result = $db->query($query);
//
//	while ($row = $result->fetch_assoc()) {
//		$startTime = $row['start_break'];
//		$endTime = $row['end_break'];
//		$empIDbreak = $row['emp_id'];
//
//		$break[] = array($startTime, $endTime);
//		$_SESSION['break'] = $break;
//	}

} else {
	// Work result part
	//For total potato incoming
	$query = "SELECT  tare_weight FROM pick_up WHERE arrive_time_rwl > '".$currentDate." 00:00' AND arrive_time_rwl < '".$currentDate." 23:59'";
	$result = $db->query($query)	;

	while($row = $result->fetch_assoc()) {
		$IncomingPotato += $row['tare_weigh'];

		//$incoming[] = $IncomingPotato;
		$_SESSION['incoming'] = $IncomingPotato;
	}

	//For total potato outgoing
	$query = "SELECT  weight_out FROM destination_record WHERE arrive_date = '".$currentDate."'";
	$result = $db->query($query)	;

	while($row = $result->fetch_assoc()) {
		$outgoingPotato += $row['weight_out'];

//		$outgoing[] = $outgoingPotato;
		$_SESSION['outgoing'] = $outgoingPotato;
	}

	//For Sample Amount
	$query = "SELECT * FROM sample WHERE sample_date =  '".$currentDate."'";
	$result = $db->query($query)	;

	while($row = $result->fetch_assoc()) {
		$totalSampleWeight += $row['total_smaple_weight'];
		$unuseableWeight += $row['unuseable_weight'];
		$rotWeight += $row['rot_weight'];
		$internalWeight += $row['internal_weight'];
		$pitRot += $row['pit_rot_weight'];
		$wireworm += $row['wireworm_weight'];
		$jellyEnd += $row['jelly_end_weight'];
		$scab += $row['scab_weight'];
		$hollowHeart += $row['hollow_heart_weight'];
		$sunburn += $row['sunburn_weight'];
		$mechBruise += $row['mech_bruise_weight'];
		$smalls += $row['smalls_weight'];
		$tenOz += $row['ten_oz_weight'];
		$air += $row['air_weight'];
		$water += $row['water_weight'];
		$rockForeign += $row['rock_foreign_weight'];
		$other += $row['other_weight'];

		$totalBadAmount = $unuseableWeight + $rotWeight + $internalWeight + $pitRot + $wireworm + $ $jellyEnd + $scab + $hollowHeart + $sunburn + $mechBruise + $smalls + $tenOz + $air + $water + $rockForeign + $other;
		$totalGoodAmount = $totalSampleWeight - $totalBadAmount;
		$totalGoodPercent = ( $totalSampleWeight / $totalGoodAmount ) * 100;
		$sample[] = array($totalSampleWeight, $totalGoodPercent);
		$_SESSION['sample'] = $sample;
	}
}
?> {
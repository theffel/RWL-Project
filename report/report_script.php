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
	$query = "SELECT e.emp_first_name, e.emp_last_name, a.time_in, a.time_out
			  FROM attendance as a INNER JOIN employee as e ON a.emp_id = e.emp_id
    		  WHERE a.time_in > '" . $currentDate . " 00:00:00' AND a.time_out < '" . $currentDate . " 11:59:59'";

	$result = $db->query($query);
	if ($result != null) {
		while ($row = $result->fetch_assoc()) {
			$empFName = $row['emp_first_name'];
			$empLName = $row['emp_last_name'];
			$timeIn = $row['time_in'];
			$timeOut = $row['time_out'];

			$attendance[] = array($empFName, $empLName, $timeIn, $timeOut);
			$_SESSION['attendance'] = $attendance;
		}
	}

	$query = "SELECT b.start_break, b.end_break
			  FROM break as b INNER JOIN attendance as a ON b.emp_id = a.emp_id
    		  WHERE b.start_break > '" . $currentDate . " 00:00:00' AND b.end_break < '" . $currentDate . " 11:59:59'";

	$result = $db->query($query);
	//if ($result != null) {
		while ($row = $result->fetch_assoc()) {
		$startTime = $row['start_break'];
		$endTime = $row['end_break'];

		$break[] = array($startTime, $endTime);
		$_SESSION['break'] = $break;
		}
//	}
} else {
	// Work result part
	$query = "SELECT  WHERE time_in > '".$currentDate." 00:00' AND time_out < '".$currentDate." 23:59'";
	$result = $db->query($query)	;
//
//	while($row = $result->fetch_assoc()) {
//		$totalAmount = $row['total_amount'];
//		$sampleAmount = $row['sample_Amount'];
//		$good = $row['good'];
//		$totalIncoming = $row['total_incoming'];
//		$totalOutgoing = $row['total_outgoing'];
//	}
}
?> {
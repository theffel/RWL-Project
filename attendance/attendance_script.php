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
 * @since       2015-01-21
 */

// Start the session
session_start();

// Include php files
include('break_script.php');
include('job_selection_script.php');
include('../database.php');
include('../session_load.php');

// insert attendance - start punch clock for employee
if (isset($_POST['punchIn'])) {		
	$query = "INSERT INTO attendance (time_in, emp_id) 	VALUES ('" . $dateTime . "'," . $empId . ")";
	$result = $db->query($query);
		
	// load session with attendance id
    $query = "SELECT attend_id, time_out FROM attendance WHERE time_in LIKE '". $currentDate . "%' AND emp_id = " . $empId . 
    " ORDER BY time_out ASC";

	// need to be able to handle more then one login for the day
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$attendanceId = $row['attend_id'];    
	$_SESSION['attendanceId'] = $attendanceId;
}

// insert attendance - end punch clock for employee
if (isset($_POST['punchOut'])) {
	$query = "UPDATE attendance SET time_out = '" .$dateTime . "' WHERE attend_id=" . $_SESSION['attendanceId'];
	$result = $db->query($query); 
    $_SESSION['attendanceId'] = 0;
}
?>
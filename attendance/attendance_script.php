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
//include('break_script.php');
//include('job_selection_script.php');
include('../database.php');
include('../session_load.php');

$empId = (!empty($_SESSION['empId'])) ? $_SESSION['empId'] : "";

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

// Start Break
if (isset($_POST['startBreak'])) {
	$query = "INSERT INTO break (start_break_time, emp_id, break_date) VALUES ('" . $currentTime . "'," . $empId . ",'" . $currentDate ."')";
	$result = $db->query($query);

	// load session with break id
	$query = "SELECT break_id FROM break WHERE break_date='". $currentDate . "' AND emp_id = " . $empId;
		
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$breakId = $row['break_id'];    
	$_SESSION['breakId'] = $breakId;
}

// End Break
if (isset($_POST['endBreak'])) {
	$query = "UPDATE break SET end_break_time = '" .$currentTime . "' WHERE break_id=" . $_SESSION['breakId'];
	$result = $db->query($query);
}

$query = "SELECT job_type.emp_type_id, type_description, type_alt_description
		FROM job_type INNER JOIN employee_type ON job_type.emp_type_id = employee_type.emp_type_id
		WHERE emp_id =" .$empId;
$result = $db->query($query);

while ($row = $result->fetch_assoc()){
    $empTypeId = $row['emp_type_id'];   
    $typeDesc = $row['type_description'];
	$typeAltDesc = $row['type_alt_description'];   
	$jobTypes[] = array($empTypeId, $typeDesc, $typeAltDesc);
}

$_SESSION['jobTypes'] = $jobTypes;


 /* loop over array to set employee type. Done this way if another employee type is
 added to database will not effect employee type selection in time and attendence */   

for ($x = 0; $x < count($_SESSION['jobTypes']); $x++){
    if (isset($_POST[$jobTypes[$x][2]])) {
        $_SESSION['employeeType'] = $jobTypes[$x][0];

    $query = "INSERT INTO employee_type_change (type_change_time, emp_type_id, emp_id)  VALUES ('" . $dateTime . "'," 
        .$_SESSION['employeeType'] . "," . $empId . ")";
    $result = $db->query($query);
    }
}
?>
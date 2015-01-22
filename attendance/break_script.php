<?php
/**
 * This file provides the business functionality for the login job_selection.php page.
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
 * @since       2015-01-20
 */


// Include the database.php file
include('../database.php');
include('../session_load.php');

// Get empId from session  
$empId = $_SESSION['empId'];

// Start Break
if (isset($_POST['startBreak'])) {
		$query = "INSERT INTO break (start_break_time, emp_id, break_date) 
		VALUES ('" . $currentTime . "'," . $empId . ",'" . $currentDate ."')";
		$result = $db->query($query);

		// load session with break id
		$query = "SELECT break_id FROM break WHERE break_date='". $currentDate . "' AND emp_id = " . $empId;
		
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		$breakId = $row['break_id'];    
		$_SESSION['breakId'] = $breakId;

	// End Break
} 
if (isset($_POST['endBreak'])) {
		$query = "UPDATE break SET end_break_time = '" .$currentTime . "' WHERE break_id=" . $_SESSION['breakId'];
        $result = $db->query($query);
   
}

?>
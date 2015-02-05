<?php
/**
 * This file provides the business functionality for the temperature checks index.php page.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-02-03
 */

// Include php files
include('../database.php');
include('../session_load.php');

// Insert temperature check
if (isset($_POST['submit'])) {	
	$date = $db->real_escape_string($_POST['date']);	
	$tank1 = $db->real_escape_string($_POST['tank1']);
	$tank2 = $db->real_escape_string($_POST['tank2']);
	$tank3 = $db->real_escape_string($_POST['tank3']);

	$query = "INSERT INTO temparature_check (temp_check, tank1_temp, tank2_temp, tank3_temp, emp_id) VALUES ('" . $dateTime . "', " . $tank1 . ", " . $tank2 . ", " . $tank3 . " ," . $empId . ")";
	$result = $db->query($query);
	var_dump($query);
}

// Load array with temperature checks for day by employee
$query = "SELECT temp_id, temp_check, tank1_temp, tank2_temp, tank3_temp FROM temparature_check WHERE temp_check LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY temp_check DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()){
		$tempId = $row['temp_id'];
    	$date = $row['temp_check'];
    	$tank1 = $row['tank1_temp']; 
    	$tank2 = $row['tank2_temp'];
    	$tank3 = $row['tank3_temp']; 
    	$temperatureChecks[] = array($tempId, $date, $tank1, $tank2, $tank3);
    	$_SESSION['temperatureChecks'] = $temperatureChecks;
	}

	// Select temperature checks
	for ($x = 0; $x < count($_SESSION['temperatureChecks']); $x++){
		if (isset($_POST[$temperatureChecks[$x][0]])) {
			$_SESSION['checkNum'] = $temperatureChecks[$x][0];
			$query = "SELECT temp_check, tank1_temp, tank2_temp, tank3_temp FROM temparature_check WHERE temp_id = " . $_SESSION['checkNum'];
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$date = $row['temp_check'];
    		$tank1 = $row['tank1_temp'];
    		$tank2 = $row['tank2_temp'];
    		$tank3 = $row['tank3_temp'];
			$editReceipt[] = array($date, $tank1, $tank2, $tank3); 
			$_SESSION['editTemperatureCheck'] = $editTemperatureCheck;
			header("location:edit_temperature_check.php?id=" . $_SESSION['checkNum'] );
		}
	}
}

// Update temperature check
if (isset($_POST['update'])) {	
	$date = $db->real_escape_string($_POST['date']);	
	$tank1 = $db->real_escape_string($_POST['tank1']);
	$tank2 = $db->real_escape_string($_POST['tank2']);
	$tank3 = $db->real_escape_string($_POST['tank3']);
	
	$query = "UPDATE temparature_check SET temp_check = '" . $dateTime . "', tank1_temp =" . $tank1 . ", tank2_temp = " . $tank2 . ", tank3_temp = " . $tank3 . " WHERE temp_id = " . $_SESSION['checkNum'];
	$result = $db->query($query);
	
	// kill session var 'temperatureChecks'
	unset($_SESSION['temperatureChecks']);
	header("location:index.php");
} 
?>
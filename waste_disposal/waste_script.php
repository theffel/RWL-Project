<?php
/**
 * This file provides the business functionality for the fuel index.php page.
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
 * @since       2015-02-09
 */

// Include php files
include('../database.php');
include('../session_load.php');

// Insert waste
if (isset($_POST['submit'])) {
	$date = $db->real_escape_string($_POST['date']);
	$desc = $db->real_escape_string($_POST['desc']);
	$sent = $db->real_escape_string($_POST['sent']);
	$disposed = $db->real_escape_string($_POST['disposed']);
	$transported = $db->real_escape_string($_POST['transported']);

	$query = "INSERT INTO waste_disposal (dispose_date, product_descript, dispose_where, dispose_how, dispose_transport, emp_id) VALUES ('" . $dateTime . "', '" . $desc . "', '" . $sent . "', '" . $disposed . "', '" . $transported . "', " . $empId . ")";
	$result = $db->query($query);
}

// Load array with waste disposals for day by employee
$query = "SELECT waste_disposal_id, dispose_date, product_descript, dispose_where, dispose_how, dispose_transport FROM waste_disposal WHERE dispose_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY dispose_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()){
		$wasteId = $row['waste_disposal_id'];
    	$date = $row['dispose_date'];
    	$desc = $row['product_descript'];
    	$sent = $row['dispose_where'];
    	$disposed = $row['dispose_how'];
    	$transported = $row['dispose_transport'];
    	$wastes[] = array($wasteId, $date, $desc, $sent, $disposed, $transported);
    	$_SESSION['wastes'] = $wastes;
	}

	// Select waste
	for ($x = 0; $x < count($_SESSION['wastes']); $x++) {
		if (isset($_POST[$wastes[$x][0]])) {
			$_SESSION['wasteNum'] = $wastes[$x][0];
			$query = "SELECT dispose_date, product_descript, dispose_where, dispose_how, dispose_transport FROM waste_disposal WHERE waste_disposal_id = " . $_SESSION['wasteNum'];
			$result = $db->query($query);
			$row = $result->fetch_assoc();
    		$date = $row['dispose_date'];
    		$desc = $row['product_descript'];
    		$sent = $row['dispose_where'];
    		$disposed = $row['dispose_how'];
    		$transported = $row['dispose_transport'];
			$editWastes[] = array($date, $desc, $sent, $disposed, $transported);
			$_SESSION['editWastes'] = $editWastes;
			header("location:edit_waste.php?id=" . $_SESSION['wasteNum']);
		}
	}
}

// Update waste
if (isset($_POST['update'])) {
	$date = $db->real_escape_string($_POST['date']);
	$desc = $db->real_escape_string($_POST['desc']);
	$sent = $db->real_escape_string($_POST['sent']);
	$disposed = $db->real_escape_string($_POST['disposed']);
	$transported = $db->real_escape_string($_POST['transported']);

	$query = "UPDATE waste_disposal SET dispose_date = '" . $date . "', product_descript = '" . $desc . "', dispose_where = '" . $sent . "', dispose_how = '" . $disposed . "', dispose_transport = '" . $transported . "' WHERE waste_disposal_id = " . $_SESSION['wasteNum'];
	$result = $db->query($query);

	// kill session var 'wastes'
	unset($_SESSION['wastes']);
	header("location:index.php");
}
?>
<?php
/**
 * This file provides the business functionality for the rejection index.php page.
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
 * @since       2015-02-11
 */

// Include php files
include('../database.php');
include('../session_load.php');

// Insert rejection
if (isset($_POST['submit'])) {
	$date = $db->real_escape_string($_POST['date']);
	$potato = $db->real_escape_string($_POST['potato']);
	$farm = $db->real_escape_string($_POST['farm']);
	$ticketNumber = $db->real_escape_string($_POST['ticketNumber']);
	$quantReturned = $db->real_escape_string($_POST['quantReturned']);
	$rewashed = $db->real_escape_string($_POST['rewashed']);
	$regraded = $db->real_escape_string($_POST['regraded']);
	$prodReturned = $db->real_escape_string($_POST['prodReturned']);

	$query = "INSERT INTO rejection (reject_date, potato_id, farm_id, proc_ticket_num, quanity_returned, re_washed, re_graded, returned_to, emp_id) VALUES ('" . $date . "', " . $potato . ", " . $farm . ", " . $ticketNumber . "," . $quantReturned . ", " . $rewashed . ", " . $regraded . ", " . $prodReturned . ", " . $empId . ")";
	$result = $db->query($query);
}

// Load array with rejections for day by employee
$query = "SELECT reject_id, reject_date, potato_name, farm_name, quanity_returned, returned_to FROM rejection INNER JOIN potato ON rejection.potato_id = potato.potato_id INNER JOIN farm ON rejection.farm_id = farm.farm_id WHERE reject_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY reject_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()) {
		$rejectId = $row['reject_id'];
    	$date = $row['reject_date'];
    	$potato = $row['potato_name'];
    	$farm = $row['farm_name'];
    	$quantReturned = $row['quanity_returned'];
    	$prodReturned = $row['returned_to'];
    	if ($prodReturned == 0) {
			$returnedName = "Processor";
		} else {
			$returnedName = "Producer";
		}
    	$rejections[] = array($rejectId, $date, $potato, $farm, $quantReturned, $returnedName);
    	$_SESSION['rejections'] = $rejections;
	}

	// Select rejections
	for ($x = 0; $x < count($_SESSION['rejections']); $x++) {
		if (isset($_POST[$rejections[$x][0]])) {
			$_SESSION['rejectNum'] = $rejections[$x][0];
			$query = "SELECT reject_date, potato_name, farm_name, proc_ticket_num, quanity_returned, re_washed, re_graded, returned_to FROM rejection INNER JOIN potato ON rejection.potato_id = potato.potato_id INNER JOIN farm ON rejection.farm_id = farm.farm_id WHERE reject_id = " . $_SESSION['rejectNum'];
			$result = $db->query($query);
			$row = $result->fetch_assoc();
    		$date = $row['reject_date'];
    		$potato = $row['potato_name'];
    		$farm = $row['farm_name'];
    		$ticketNumber = $row['proc_ticket_num'];
    		$quantReturned = $row['quanity_returned'];
    		$rewashed = $row['re_washed'];
    		$regraded = $row['re_graded'];
    		$prodReturned = $row['returned_to'];
			$editRejection[] = array($date, $potato, $farm, $ticketNumber, $quantReturned, $rewashed, $regraded, $prodReturned);
			$_SESSION['editRejection'] = $editRejection;
			header("location:edit_rejection.php?id=" . $_SESSION['rejectNum']);
		}
	}
}

// Update rejection
if (isset($_POST['update'])) {
	$date = $db->real_escape_string($_POST['date']);
	$potato = $db->real_escape_string($_POST['potato']);
	$farm = $db->real_escape_string($_POST['farm']);
	$ticketNumber = $db->real_escape_string($_POST['ticketNumber']);
	$quantReturned = $db->real_escape_string($_POST['quantReturned']);
	$rewashed = $db->real_escape_string($_POST['rewashed']);
	$regraded = $db->real_escape_string($_POST['regraded']);
	$prodReturned = $db->real_escape_string($_POST['prodReturned']);

	$query = "UPDATE rejection SET reject_date = '" . $date . "' , potato_id = " . $potato . ", farm_id = " . $farm . ", proc_ticket_num = " . $ticketNumber . ", quanity_returned = " . $quantReturned . ", re_washed = '" . $rewashed . ", re_graded = '" . $regraded . ", returned_to = " . $prodReturned . " WHERE reject_id = " . $_SESSION['rejectNum'];
	$result = $db->query($query);

	// kill session var 'rejections'
	unset($_SESSION['rejections']);
	header("location:index.php");
}
?>
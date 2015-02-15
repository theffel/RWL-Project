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
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-02-10
 */

// Include php files
include('../database.php');
include('../session_load.php');

// Insert downtime
if (isset($_POST['submitBtn'])) {
	$startDowntime = $db->real_escape_string($_POST['startDowntime']);
	$endDowntime = $db->real_escape_string($_POST['endDowntime']);
	$reason = $db->real_escape_string($_POST['reason']);

	$query = "INSERT INTO down_time (down_start, down_end, reason, emp_id) VALUES ('" . $startDowntime . "', '" . $endDowntime . "', " . $reason . ", " . $empId . ")";
	$result = $db->query($query);
}

// Load array with downtime
$query = "SELECT down_id, down_start, down_end, reason FROM down_time WHERE emp_id = " . $empId .  " ORDER BY down_start DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()){
		$downId = $row['down_id'];
		$start = $row['down_start'];
		$end = $row['down_end'];
		$reason = $row['reason'];
		if ($reason == 0) {
			$reasonName = "Incoming Truck";
		} else if ($reason == 1) {
			$reasonName = "Outgoing Truck";
		} else {
			$reasonName = "RWL Breakdown";
		}
		$downtime[] = array($downId, $start, $end, $reasonName);
		$_SESSION['downtime'] = $downtime;
	}

	// Select downtime
	for ($x = 0; $x < count($_SESSION['downtime']); $x++){
		if (isset($_POST[$downtime[$x][0]])) {
			$_SESSION['downNUm'] = $downtime[$x][0];
			$query = "SELECT down_start, down_end, reason FROM down_time WHERE down_id = " . $_SESSION['downNUm'];
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$start = $row['down_start'];
			$end = $row['down_end'];
			$reason = $row['reason'];
			$editDowntime[] = array($start, $end, $reason);
			$_SESSION['editDowntime'] = $editDowntime;
			header ("location:edit_downtime.php?id=" . $_SESSION['downNUm']);
		}
	}
}

if (isset($_POST['updateBtn'])) {
	$startDowntime = $db->real_escape_string($_POST['startDowntime']);
	$endDowntime = $db->real_escape_string($_POST['endDowntime']);
	$reason = $db->real_escape_string($_POST['reason']);

	$query = "UPDATE down_time SET down_start = '" . $startDowntime . "', down_end = '" . $endDowntime . "', reason = " . $reason . " WHERE down_id = " . $_SESSION['downNUm'];
	$result = $db->query($query);

	// kill session var 'downtime'
	unset($_SESSION['downtime']);
	header("location:index.php");
}
?>
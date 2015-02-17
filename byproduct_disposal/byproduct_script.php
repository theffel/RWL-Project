<?php
/**
 * This file provides the business functionality for the byproduct disposal pages.
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

// Insert byproduct
if (isset($_POST['submitBtn'])) {
	$date = $db->real_escape_string($_POST['date']);
	$desc = $db->real_escape_string($_POST['desc']);
	$sent = $db->real_escape_string($_POST['sent']);
	$disposed = $db->real_escape_string($_POST['disposed']);
	$transported = $db->real_escape_string($_POST['transported']);

	$query = "INSERT INTO byproduct_disposal (dispose_date, product_descript, dispose_where, dispose_how, dispose_transport, emp_id) VALUES ('" . $dateTime . "', '" . $desc . "', '" . $sent . "', '" . $disposed . "', '" . $transported . "', " . $empId . ")";
	$result = $db->query($query);
}

// Load array with byproduct disposals for day by employee
$query = "SELECT by_pro_disposal_id, dispose_date, product_descript, dispose_where, dispose_how, dispose_transport FROM byproduct_disposal WHERE dispose_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY dispose_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()){
		$byprodId = $row['by_pro_disposal_id'];
    	$date = $row['dispose_date'];
    	$desc = $row['product_descript'];
    	$sent = $row['dispose_where'];
    	$disposed = $row['dispose_how'];
    	$transported = $row['dispose_transport'];
    	$byproducts[] = array($byprodId, $date, $desc, $sent, $disposed, $transported);
    	$_SESSION['byproducts'] = $byproducts;
	}

	// Select byproducts
	for ($x = 0; $x < count($_SESSION['byproducts']); $x++) {
		if (isset($_POST[$byproducts[$x][0]])) {
			$_SESSION['byprodNum'] = $byproducts[$x][0];
			$query = "SELECT dispose_date, product_descript, dispose_where, dispose_how, dispose_transport FROM byproduct_disposal WHERE by_pro_disposal_id = " . $_SESSION['byprodNum'];
			$result = $db->query($query);
			$row = $result->fetch_assoc();
    		$date = $row['dispose_date'];
    		$desc = $row['product_descript'];
    		$sent = $row['dispose_where'];
    		$disposed = $row['dispose_how'];
    		$transported = $row['dispose_transport'];
			$editByproducts[] = array($date, $desc, $sent, $disposed, $transported);
			$_SESSION['editByproducts'] = $editByproducts;
			header("location:edit_byproduct.php?id=" . $_SESSION['byprodNum']);
		}
	}
}

// Update byproduct
if (isset($_POST['updateBtn'])) {
	$date = $db->real_escape_string($_POST['date']);
	$desc = $db->real_escape_string($_POST['desc']);
	$sent = $db->real_escape_string($_POST['sent']);
	$disposed = $db->real_escape_string($_POST['disposed']);
	$transported = $db->real_escape_string($_POST['transported']);

	$query = "UPDATE byproduct_disposal SET dispose_date = '" . $date . "', product_descript = '" . $desc . "', dispose_where = '" . $sent . "', dispose_how = '" . $disposed . "', dispose_transport = '" . $transported . "' WHERE by_pro_disposal_id = " . $_SESSION['byprodNum'];
	$result = $db->query($query);

	// kill session var 'byproducts'
	unset($_SESSION['byproducts']);
	header("location:index.php");
}
?>
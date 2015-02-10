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
 * @author      Trevor Heffel
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-25
 */

// Include php files
include('../database.php');
include('../session_load.php');

// Insert Plant cleaning
if (isset($_POST['submit'])) {
	$date = $db->real_escape_string($_POST['date']);
	$cleaned = $db->real_escape_string($_POST['equipment']);
	$description = $db->real_escape_string($_POST['descClean']);
	$empID = $db->real_escape_string($_POST['employees']);

	$query = "INSERT INTO wash_line_cleaning (line_clean_date, equip_id, clean_descript, cleaner1, emp_id)
			  VALUES ('" . $date . "', " . $cleaned . ", '" . $description . "', " . $empID . ", " . $empID ." )";

	$result = $db->query($query);
}

//select plant cleaning data for view
$query = "SELECT w.line_clean_id, w.line_clean_date, w.equip_id, el.equip_name, w.clean_descript, e.emp_first_name, e.emp_last_name, w.emp_id FROM wash_line_cleaning AS w
		  INNER JOIN equiptment_list AS el ON w.equip_id = el.equip_id
		  INNER JOIN employee AS e ON w.emp_id = e.emp_id";
$result = $db->query($query);

while ($row = $result->fetch_assoc()){
	$cleanID = $row['line_clean_id'];
	$cleanDate = $row['line_clean_date'];
	$equipId = $row['equip_id'];
	$descript = $row['clean_descript'];
	$empID = $row['emp_id'];
	$equipName = $row['equip_name'];
	$firstName = $row['emp_first_name'];
	$lastName = $row['emp_last_name'];
	$name = $firstName . " " . $lastName;

	$lineCleaning[] = array($cleanID, $cleanDate, $equipName, $descript, $name);
	$_SESSION['lineCleaning'] = $lineCleaning;
}

// Select plant cleaning for edit
if (empty($_SESSION['plantCleaning'])) {
	echo "";
} else {
for ($x = 0; $x < count($_SESSION['lineCleaning']); $x++){
	if (isset($_POST[$lineCleaning[$x][0]])) {
		$_SESSION['wCleanNum'] = $lineCleaning[$x][0];
		$query = "SELECT w.line_clean_id, w.line_clean_date, w.equip_id, el.equip_name, w.clean_descript, e.emp_first_name, e.emp_last_name, w.emp_id FROM wash_line_cleaning AS w
				  INNER JOIN equiptment_list AS el ON w.equip_id = el.equip_id
				  INNER JOIN employee AS e ON w.emp_id = e.emp_id
 				  WHERE line_clean_id = " . $_SESSION['wCleanNum'];

		var_dump($query);
		$result = $db->query($query);
		$row = $result->fetch_assoc();

		$cleanDate = $row['line_clean_date'];
		$equipId = $row['equip_id'];
		$descript = $row['clean_descript'];
		$empID = $row['emp_id'];
		$equipName = $row['equip_name'];
		$firstName = $row['emp_first_name'];
		$lastName = $row['emp_last_name'];
		$name = $firstName . " " . $lastName;

		$editLineCleaning[] = array($cleanDate, $equipName, $descript, $name, $empID);
		$_SESSION['editLineCleaning'] = $editLineCleaning;
		header ("location:edit_wash_line.php?id=" . $_SESSION['wCleanNum'] );
	}
}
}
if (isset($_POST['update'])) {
	$date = $db->real_escape_string($_POST['date']);
	$cleaned = $db->real_escape_string($_POST['equipment']);
	$description = $db->real_escape_string($_POST['descClean']);
	$empID = $db->real_escape_string($_POST['employees']);

	$query = "UPDATE wash_line_cleaning SET line_clean_date = '".$date."', equip_id = ".$cleaned.", clean_descript = '".$description."', cleaner1 = ".$empID.", emp_id = ".$empID."
			  WHERE line_clean_id = " . $_SESSION['cleanNum'];
	$result = $db->query($query);

	// kill session var 'editIncomingDeliveries'
	unset($_SESSION['editIncomingDeliveries']);
	header("location:index.php");
}
?>
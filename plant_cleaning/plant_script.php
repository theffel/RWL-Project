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

	$query = "INSERT INTO plant_cleaning (plant_clean_date, equip_id, clean_descript, cleaner1, emp_id)
			  VALUES ('" . $date . "', " . $cleaned . ", '" . $description . "', " . $empID . ", " . $empID ." )";

	$result = $db->query($query);
}

//select plant cleaning data for view
$query = "SELECT p.plant_clean_id, p.plant_clean_date, p.equip_id, el.equip_name, p.clean_descript, e.emp_first_name, e.emp_last_name, p.emp_id FROM plant_cleaning AS p
		  INNER JOIN equiptment_list AS el ON p.equip_id = el.equip_id
		  INNER JOIN employee AS e ON p.emp_id = e.emp_id";
$result = $db->query($query);

while ($row = $result->fetch_assoc()){
	$cleanID = $row['plant_clean_id'];
	$cleanDate = $row['plant_clean_date'];
	$equipId = $row['equip_id'];
	$descript = $row['clean_descript'];
	$empID = $row['emp_id'];
	$equipName = $row['equip_name'];
	$firstName = $row['emp_first_name'];
	$lastName = $row['emp_last_name'];
	$name = $firstName . " " . $lastName;

	$plantCleaning[] = array($cleanID, $cleanDate, $equipName, $descript, $name);
	$_SESSION['plantCleaning'] = $plantCleaning;
}

// Select plant cleaning for edit
if (empty($_SESSION['plantCleaning'])) {
	echo "";
} else {
for ($x = 0; $x < count($_SESSION['plantCleaning']); $x++){
	if (isset($_POST[$plantCleaning[$x][0]])) {
		$_SESSION['cleanNum'] = $plantCleaning[$x][0];
		$query = "SELECT p.plant_clean_id, p.plant_clean_date, p.equip_id, el.equip_name, p.clean_descript, e.emp_first_name, e.emp_last_name, p.emp_id FROM plant_cleaning AS p
		  		  INNER JOIN equiptment_list AS el ON p.equip_id = el.equip_id
				  INNER JOIN employee AS e ON p.emp_id = e.emp_id
 				  WHERE plant_clean_id = " . $_SESSION['cleanNum'];

		var_dump($query);
		$result = $db->query($query);
		$row = $result->fetch_assoc();

		$cleanDate = $row['plant_clean_date'];
		$equipId = $row['equip_id'];
		$descript = $row['clean_descript'];
		$empID = $row['emp_id'];
		$equipName = $row['equip_name'];
		$firstName = $row['emp_first_name'];
		$lastName = $row['emp_last_name'];
		$name = $firstName . " " . $lastName;

		$editPlantCleaning[] = array($cleanDate, $equipName, $descript, $name, $empID);
		$_SESSION['editPlantCleaning'] = $editPlantCleaning;
		header ("location:edit_plant.php?id=" . $_SESSION['cleanNum'] );
	}
}
}
if (isset($_POST['update'])) {
	$date = $db->real_escape_string($_POST['date']);
	$cleaned = $db->real_escape_string($_POST['equipment']);
	$description = $db->real_escape_string($_POST['descClean']);
	$empID = $db->real_escape_string($_POST['employees']);

	$query = "UPDATE plant_cleaning SET plant_clean_date = '".$date."', equip_id = ".$cleaned.", clean_descript = '".$description."', cleaner1 = ".$empID.", emp_id = ".$empID."
			  WHERE plant_clean_id = " . $_SESSION['cleanNum'];
	$result = $db->query($query);

	// kill session var 'editIncomingDeliveries'
	unset($_SESSION['editIncomingDeliveries']);
	header("location:index.php");
}
?>
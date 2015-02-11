<?php
/**
 * This file provides the business functionality for the change farm index.php page.
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

// Insert temperature check
if (isset($_POST['submit'])) {
	$date = $db->real_escape_string($_POST['date']);
	$farm = $db->real_escape_string($_POST['farm']);
	$weight = $db->real_escape_string($_POST['weight']);
	$byproduct = $db->real_escape_string($_POST['byproduct']);
	$binMarker = $db->real_escape_string($_POST['binMarker']);

	$query = "INSERT INTO rwl_bin (change_date, farm_id, weight, by_product, bin_marker, emp_id) VALUES ('" .$dateTime . "', ". $farm . ", " . $weight . ", " . $byproduct . ", " . $binMarker . " ," . $empId . ")";
	$result = $db->query($query);
}

// Load array with farm changes for day by employee
$query = "SELECT rwl_bin_id, change_date, farm_name, weight, by_product, bin_marker FROM rwl_bin INNER JOIN farm ON rwl_bin.farm_id = farm.farm_id WHERE change_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY change_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()){
		$binId = $row['rwl_bin_id'];
    	$date = $row['change_date'];
    	$farm = $row['farm_name'];
    	$weight = $row['weight'];
    	$byproduct = $row['by_product'];
    	$binMarker = $row['bin_marker'];
    	$changeFarms[] = array($binId, $date, $farm, $weight, $byproduct, $binMarker);
    	$_SESSION['changeFarms'] = $changeFarms;
	}

	// Select change farms
	for ($x = 0; $x < count($_SESSION['changeFarms']); $x++){
		if (isset($_POST[$changeFarms[$x][0]])) {
			$_SESSION['changeNum'] = $changeFarms[$x][0];
			$query = "SELECT change_date, farm_name, weight, by_product, bin_marker FROM rwl_bin INNER JOIN farm ON rwl_bin.farm_id = farm.farm_id FROM change_date WHERE rwl_bin_id = " . $_SESSION['changeNum'];
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$date = $row['change_date'];
    		$farm = $row['farm_name'];
    		$weight = $row['weight'];
    		$byproduct = $row['by_product'];
    		$binMarker = $row['bin_marker'];
			$editFarms[] = array($date, $farm, $weight, $byproduct, $binMarker);
			$_SESSION['editFarms'] = $editFarms;
			header("location:edit_farm.php?id=" . $_SESSION['changeNum'] );
		}
	}
}

// Update farm
if (isset($_POST['update'])) {
	$date = $db->real_escape_string($_POST['date']);
	$farm = $db->real_escape_string($_POST['farm']);
	$weight = $db->real_escape_string($_POST['weight']);
	$byproduct = $db->real_escape_string($_POST['byproduct']);
	$binMarker = $db->real_escape_string($_POST['binMarker']);

	$query = "UPDATE rwl_bin SET change_date = '" . $dateTime . "', farm_id =" . $farm . ", weight = " . $weight . ", by_product = " . $byproduct . ", bin_marker = " . $binMarker . " WHERE rwl_bin_id = " . $_SESSION['changeNum'];
	$result = $db->query($query);

	// kill session var 'changeFarms'
	unset($_SESSION['changeFarms']);
	header("location:index.php");
}
?>
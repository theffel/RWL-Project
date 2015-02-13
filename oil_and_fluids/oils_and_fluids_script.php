<?php
/**
 * This file provides the business functionality for the oils and fluids index.php page.
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
 * @since       2015-02-02
 */

// Include php files
include('../database.php');
include('../session_load.php');

// Insert oils and fluids
if (isset($_POST['submitBtn'])) {
	$date = $db->real_escape_string($_POST['date']);
	$truck = $db->real_escape_string($_POST['truck']);
	$engineOilLiters = $db->real_escape_string($_POST['engineOilLiters']);
	$hydraulicOilLiters = $db->real_escape_string($_POST['hydraulicOilLiters']);
	$transFluidLiters = $db->real_escape_string($_POST['transFluidLiters']);
	$coolantLitres = $db->real_escape_string($_POST['coolantLitres']);

	$query = "INSERT INTO maintenance (truck_id, change_date, engine_oil_litres, hyd_oil_litres, trans_fluid_litres, coolant_litres, emp_id) VALUES (" . $truck . ",'" . $dateTime . "', " . $engineOilLiters . ", " . $hydraulicOilLiters . "," . $transFluidLiters . ",'" . $coolantLitres . "'," . $empId . ")";
	$result = $db->query($query);
}

// Load array with oil and fluids for day by employee
$query = "SELECT maintenance.maintain_id, change_date, truck_num, engine_oil_litres, hyd_oil_litres, trans_fluid_litres, coolant_litres FROM maintenance INNER JOIN truck ON maintenance.truck_id = truck.truck_id WHERE change_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY change_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()) {
		$maintainId = $row['maintain_id'];
    	$date = $row['change_date'];
    	$truck = $row['truck_num'];
    	$engineOilLiters = $row['engine_oil_litres'];
    	$hydraulicOilLiters = $row['hyd_oil_litres'];
    	$transFluidLiters = $row['trans_fluid_litres'];
    	$coolantLitres = $row['coolant_litres'];
    	$oilsAndFluids[] = array($maintainId, $date, $truck, $engineOilLiters, $hydraulicOilLiters, $transFluidLiters, $coolantLitres);
    	$_SESSION['oilsAndFluids'] = $oilsAndFluids;
	}
}

// Select oils and fluids
for ($x = 0; $x < count($_SESSION['oilsAndFluids']); $x++){
    if (isset($_POST[$oilsAndFluids[$x][0]])) {
    	$_SESSION['maintainNum'] = $oilsAndFluids[$x][0];
  		$query = "SELECT truck_num, change_date, truck_num, engine_oil_litres, hyd_oil_litres, trans_fluid_litres, coolant_litres FROM maintenance INNER JOIN truck ON maintenance.truck_id = truck.truck_id WHERE maintenance.maintain_id = " . $_SESSION['maintainNum'];
    	$result = $db->query($query);
    	$row = $result->fetch_assoc();
		$date = $row['change_date'];
    	$truck = $row['truck_num'];
    	$engineOilLiters = $row['engine_oil_litres'];
    	$hydraulicOilLiters = $row['hyd_oil_litres'];
    	$transFluidLiters = $row['trans_fluid_litres'];
    	$coolantLitres = $row['coolant_litres'];
    	$editOilsAndFluids[] = array($date, $truck, $engineOilLiters, $hydraulicOilLiters, $transFluidLiters, $coolantLitres);
    	$_SESSION['editOilsAndFluids'] = $editOilsAndFluids;
        header("location:edit_oils_and_fluids.php?id=" . $_SESSION['maintainNum']);
	}
}

// Update oils and fluids
if (isset($_POST['updateBtn'])) {
	$date = $db->real_escape_string($_POST['date']);
	$truck = $db->real_escape_string($_POST['truck']);
	$engineOilLiters = $db->real_escape_string($_POST['engineOilLiters']);
	$hydraulicOilLiters = $db->real_escape_string($_POST['hydraulicOilLiters']);
	$transFluidLiters = $db->real_escape_string($_POST['transFluidLiters']);
	$coolantLitres = $db->real_escape_string($_POST['coolantLitres']);

	$query = "UPDATE maintenance SET truck_id = " . $truck . ", change_date = '" . $date . "', engine_oil_litres =" . $engineOilLiters . ", hyd_oil_litres = " . $hydraulicOilLiters . ", trans_fluid_litres = " . $transFluidLiters . ", coolant_litres = " . $coolantLitres . " WHERE maintain_id = " . $_SESSION['maintainNum'];
	$result = $db->query($query);

	// kill session var 'oilsAndFluids'
	unset($_SESSION['oilsAndFluids']);
	header("location:index.php");
}
?>
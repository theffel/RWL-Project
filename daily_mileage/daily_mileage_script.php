<?php
/**
 * This file provides the business functionality for the daily mileage pages.
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

// Insert daily mileage
if (isset($_POST['submitBtn'])) {
	$date = $db->real_escape_string($_POST['date']);
	$truck = $db->real_escape_string($_POST['truck']);
	$startKmTruck = $db->real_escape_string($_POST['startKmTruck']);
	$peiKm = $db->real_escape_string($_POST['peiKm']);
	$nbKm = $db->real_escape_string($_POST['nbKM']);
	$nsKm = $db->real_escape_string($_POST['nsKm']);
	$litresFuelTank = $db->real_escape_string($_POST['litresFuelTank']);
	$finishKm = $db->real_escape_string($_POST['finishKm']);

	$query = "INSERT INTO daily_mileage (truck_id, start_date, starting_km, pei_km, nb_km, ns_km, litres_fuel, finish_km, emp_id) VALUES (" . $truck . ",'" . $dateTime . "', " . $startKmTruck . ", " . $peiKm . "," . $nbKm . "," . $nsKm . "," . $litresFuelTank . "," . $finishKm . "," . $empId . ")";
	$result = $db->query($query);
}

// Load array with daily mileage for the day for the employee
$query = "SELECT mileage_id, truck.truck_num, start_date, starting_km, pei_km, nb_km, ns_km, litres_fuel, finish_km FROM daily_mileage INNER JOIN truck ON daily_mileage.truck_id = truck.truck_id WHERE start_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY start_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()){
		$mileageId = $row['mileage_id'];
    	$date = $row['start_date'];
    	$truck = $row['truck_num'];
    	$startKmTruck = $row['starting_km'];
    	$peiKm = $row['pei_km'];
    	$nbKm = $row['nb_km'];
    	$nsKm = $row['ns_km'];
    	$litresFuelTank = $row['litres_fuel'];
    	$finishKm = $row['finish_km'];
    	$dailyMileage[] = array($mileageId, $truck, $date, $startKmTruck, $peiKm, $nbKm, $nsKm, $litresFuelTank, $finishKm);
    	$_SESSION['dailyMileage'] = $dailyMileage;
	}

	// Select daily mileage
	for ($x = 0; $x < count($_SESSION['dailyMileage']); $x++){
		if (isset($_POST[$dailyMileage[$x][0]])) {
			$_SESSION['mileageNum'] = $dailyMileage[$x][0];
			$query = "SELECT truck_num, start_date, starting_km, pei_km, nb_km, ns_km, litres_fuel, finish_km FROM daily_mileage INNER JOIN truck ON daily_mileage.truck_id = truck.truck_id WHERE mileage_id = " . $_SESSION['mileageNum'];
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$date = $row['start_date'];
    		$truck = $row['truck_num'];
    		$startKmTruck = $row['starting_km'];
    		$peiKm = $row['pei_km'];
    		$nbKm = $row['nb_km'];
    		$nsKm = $row['ns_km'];
    		$litresFuelTank = $row['litres_fuel'];
    		$finishKm = $row['finish_km'];
			$editDailyMileage[] = array($date, $truck, $startKmTruck, $peiKm, $nbKm, $nsKm, $litresFuelTank, $finishKm);
			$_SESSION['editDailyMileage'] = $editDailyMileage;
			header ("location:edit_daily_mileage.php?id=" . $_SESSION['mileageNum'] );
		}
	}
}

// Update daily mileage
if (isset($_POST['updateBtn'])) {
	$date = $db->real_escape_string($_POST['date']);
	$truck = $db->real_escape_string($_POST['truck']);
	$startKmTruck = $db->real_escape_string($_POST['startKmTruck']);
	$peiKm = $db->real_escape_string($_POST['peiKm']);
	$nbKm = $db->real_escape_string($_POST['nbKM']);
	$nsKm = $db->real_escape_string($_POST['nsKm']);
	$litresFuelTank = $db->real_escape_string($_POST['litresFuelTank']);
	$finishKm = $db->real_escape_string($_POST['finishKm']);

	$query = "UPDATE daily_mileage SET truck_id = " . $truck . ", start_date = '" . $date . "', starting_km = " . $startKmTruck . ", pei_km = " . $peiKm . ", nb_km = " . $nbKm . ", ns_km = " . $nsKm . ", litres_fuel = " . $litresFuelTank . ", finish_km = " . $finishKm . " WHERE mileage_id = " . $_SESSION['mileageNum'];
	$result = $db->query($query);

	// kill session var 'dailyMileage'
	unset($_SESSION['dailyMileage']);
	header ("location:index.php");
}
?>
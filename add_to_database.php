<?php
/**
 * This page runs the database additions for the pages.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Taylor Hardy
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     x.xx
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-20
 */

	// Start the session
	session_start();

	// Include the database.php file
	include('database.php');

	// Include the header.php file
	include('header.php');
		// If the user is logged in, display the form
		if ($loggedIn == true) {	
			if (isset($_POST['warehouseName']) && isset($_POST['warehouseCivAddress']) && isset($_POST['warehousePhoneNum'])) {
			$farmId = $_GET["id"];
			$warehouseName = ($_POST['warehouseName']);
			$warehouseCivAddress = ($_POST['warehouseCivAddress']);
			$warehousePhoneNum = ($_POST['warehousePhoneNum']);


			// Create query
			$query = "INSERT INTO `warehouse` (farm_id, warehouse_name, warehouse_civic_address, warehouse_phone) VALUES ('{$farmId}', '{$warehouseName}', '{$warehouseCivAddress}',  '{$warehousePhoneNum}')";
			
			if ($db->query($query) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $query . "<br>" . $db->error;
			}
			
			$db->close();
			echo '<script type="text/javascript">
					location.replace("../admin_add_warehouse.php?id=' . $farmId . '");
					</script>';				
		}
		// get submit from add farm page
		else 	if (isset($_POST['farmName']) && isset($_POST['farmCivAddress']) && isset($_POST['farmPhoneNum']) && isset($_POST['farmContact']) && isset($_POST['farmEmail'])) {
			$farmName = ($_POST['farmName']);
			$farmCivAddress = ($_POST['farmCivAddress']);
			$farmPhoneNum = ($_POST['farmPhoneNum']);
			$farmContact = ($_POST['farmContact']);
			$farmEmail = ($_POST['farmEmail']);

			// Create query
			$query = "INSERT INTO `farm` (farm_name, farm_civic_address, farm_phone, farm_email, farm_contact_id) VALUES ('{$farmName}', '{$farmCivAddress}',  '{$farmPhoneNum}', '{$farmEmail}', '{$farmContact}')";
				
			if ($db->query($query) === TRUE) {
				$result = $db->query("select farm_id from farm where created = now()");
				$queryId = $result->fetch_assoc();
				$farmId = $queryId['farm_id'];
			} 

			$db->close();
			echo '<script type="text/javascript">
					location.replace("admin_add_warehouse.php?id=' . $farmId . '");
					</script>';			
		}
						// get warehouse bin submit
		else if (isset($_POST['binName'])) {
					// Get Farm Id
					$warehouseId = $_GET["id"];
					$binName = ($_POST['binName']);

					// Create query
					$query = "INSERT INTO `warehouse_bin` (warehouse_id, bin_name) VALUES ('{$warehouseId}', '{$binName}')";
					
					if ($db->query($query) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $query . "<br>" . $db->error;
					}

					$db->close();
			echo '<script type="text/javascript">
					location.replace("../admin_add_bin.php?id=' . $warehouseId . '");
					</script>';	
				}
				else if (isset($_POST['employeeTypeId']) && isset($_POST['employeePosId']) && isset($_POST['employeeSIN']) && isset($_POST['employeeFN']) && isset($_POST['employeeLN']) && isset($_POST['employeeMN']) && isset($_POST['employeeAddress']) && isset($_POST['employeeCity']) && isset($_POST['employeePC']) && isset($_POST['employeePhoneNum']) && isset($_POST['employeeEmail']) && isset($_POST['employeeGender']) && isset($_POST['employeeDOB']) && isset($_POST['employeePCI']) && isset($_POST['employeeSCI'])){
					$employeeTypeId = $_POST['employeeTypeId'];
					$employeePosId = $_POST['employeePosId'];
					$employeeSIN = $_POST['employeeSIN'];
					$employeeFN = $_POST['employeeFN'];
					$employeeLN = $_POST['employeeLN'];
					$employeeMN = $_POST['employeeMN'];
					$employeeAddress = $_POST['employeeAddress'];
					$employeeCity = $_POST['employeeCity'];
					$employeePC = $_POST['employeePC'];
					$employeePhoneNum = $_POST['employeePhoneNum'];
					$employeeEmail = $_POST['employeeEmail'];
					$employeeGender = $_POST['employeeGender'];
					$employeeDOB = $_POST['employeeDOB'];
					$employeePCI = $_POST['employeePCI'];
					$employeeSCI = $_POST['employeeSCI'];
					

					// Create query
					$query = "INSERT INTO `employee` (emp_type_id, position_id, emp_sin, emp_first_name, emp_last_name, emp_middle_initial, emp_address, emp_city, emp_postal_code, emp_phone, emp_email, emp_gender, emp_dob, primary_contact_id, secondary_contact_id) VALUES ('{$employeeTypeId}', '{$employeePosId}', '{$employeeSIN}', '{$employeeFN}', '{$employeeLN}', '{$employeeMN}', '{$employeeAddress}', '{$employeeCity}', '{$employeePC}', '{$employeePhoneNum}', '{$employeeEmail}', '{$employeeGender}', '{$employeeDOB}', '{$employeePCI}', '{$employeeSCI}')";

					if ($db->query($query) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $query . "<br>" . $mysqli->error;
					}

					$db->close();
					echo '<script type="text/javascript">
					location.replace("admin_add_employee.php");
					</script>';	
				}
		else{
			echo '<script type="text/javascript">
					location.replace("admin_farm_list.php");
					</script>';	
		}
	}

	// If the user is not logged in, redirect them to login.php if they try to access this page
	else {
		echo '<script type="text/javascript">
					location.replace("login/index.php");
					</script>';
	}
?>
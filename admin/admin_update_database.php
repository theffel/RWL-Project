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
 * @since       2015-01-29
 */

	// Start the session
	session_start();

	// Include the database.php file
	include('database.php');

	// Include the header.php file
	include('header.php');
		// If the user is logged in, run the script
		if ($loggedIn == true) {	
			//get warehouse update
			if (isset($_POST['warehouseId']) && isset($_POST['farmId']) && isset($_POST['warehouseName']) && isset($_POST['warehouseCivAddress']) && isset($_POST['warehousePhoneNum'])) {
			$warehouseId = ($_POST['warehouseId']);
			$farmId = ($_POST['farmId']);
			$warehouseName = ($_POST['warehouseName']);
			$warehouseCivAddress = ($_POST['warehouseCivAddress']);
			$warehousePhoneNum = ($_POST['warehousePhoneNum']);


			// Create query
			$query = "UPDATE `warehouse` SET farm_id = '{$farmId}', warehouse_name = '{$warehouseName}', warehouse_civic_address = '{$warehouseCivAddress}', warehouse_phone = '{$warehousePhoneNum}' WHERE warehouse_id = '{$warehouseId}'";			
			if ($db->query($query) === TRUE) {
				$db->close();
				echo '<script type="text/javascript">
					location.replace("'.ROOT.'/warehouse/admin_warehouse_list.php?id=' . $farmId . '");
					</script>';	
			} 
			else {
				echo "Error: " . $query . "<br>" . $db->error;
			}			
		}
		// get submit from update farm page
		else 	if (isset($_POST['farmId']) && isset($_POST['farmName']) && isset($_POST['farmCivAddress']) && isset($_POST['farmPhoneNum']) && isset($_POST['farmContact']) && isset($_POST['farmEmail'])) {
			$farmId = ($_POST['farmId']);
			$farmName = ($_POST['farmName']);
			$farmCivAddress = ($_POST['farmCivAddress']);
			$farmPhoneNum = ($_POST['farmPhoneNum']);
			$farmContact = ($_POST['farmContact']);
			$farmEmail = ($_POST['farmEmail']);

			// Create query
			$query = "UPDATE `farm` SET farm_name = '{$farmName}', farm_civic_address = '{$farmCivAddress}', farm_phone = '{$farmPhoneNum}', farm_email = '{$farmEmail}', farm_contact_id = '{$farmContact}' WHERE farm_id = '{$farmId}'";
			if ($db->query($query) === TRUE) {
			$db->close();
			echo '<script type="text/javascript">
					location.replace("farm/admin_farm_list.php");
					</script>';			
			}
			else{
				$db->close();
				echo "failed farm update";
			}
		}
				// get employee update
				else if (isset($_POST['empId']) && isset($_POST['employeePosId']) && isset($_POST['employeeSIN']) && isset($_POST['employeeFN']) && isset($_POST['employeeLN']) && isset($_POST['employeeMN']) && isset($_POST['employeeAddress']) && isset($_POST['employeeCity']) && isset($_POST['employeePC']) && isset($_POST['employeePhoneNum']) && isset($_POST['employeeEmail']) && isset($_POST['employeeGender']) && isset($_POST['employeeDOB']) && isset($_POST['employeePCI']) && isset($_POST['employeeSCI'])){
					$empId = $_POST['empId'];
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
					$query = "Update `employee` SET position_id = '{$employeePosId}', emp_sin = '{$employeeSIN}', emp_first_name = '{$employeeFN}', emp_last_name = '{$employeeLN}', emp_middle_initial = '{$employeeMN}', emp_address = '{$employeeAddress}', emp_city = '{$employeeCity}', emp_postal_code = '{$employeePC}', emp_phone = '{$employeePhoneNum}', emp_email = '{$employeeEmail}', emp_gender = '{$employeeGender}', emp_dob = '{$employeeDOB}', primary_contact_id = '{$employeePCI}', secondary_contact_id = '{$employeeSCI}'  where emp_id = '{$empId}'";

					if ($db->query($query) === TRUE) {
						$db->close();
						echo '<script type="text/javascript">
						location.replace("employee/admin_emp_list.php");
						</script>';			
						}
					else {
						echo "Error: " . $query . "<br>" . $db->error;
						$db->close();
					}


				}
		//failed query
		else{
			echo '<script type="text/javascript">
					location.replace("farm/admin_farm_list.php");
					</script>';	
		}
	}

	// If the user is not logged in, redirect them to login.php if they try to access this page
	else {
				echo '<script type="text/javascript">
							location.replace("'.ROOT.'/login/index.php");
							</script>';
	}
?>
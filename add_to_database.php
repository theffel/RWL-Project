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

	// If the user is logged in, run the script
	if ($loggedIn == true) {
							
		// get submit from add farm page
		if (isset($_POST['farmName']) && isset($_POST['farmCivAddress']) && isset($_POST['farmPhoneNum']) && isset($_POST['farmEmail']) && isset($_POST['farmContactFN']) && isset($_POST['farmContactLN']) && isset($_POST['farmContactPN'])) {
			$farmName = ($_POST['farmName']);
			$farmCivAddress = ($_POST['farmCivAddress']);
			$farmPhoneNum = ($_POST['farmPhoneNum']);
			$farmEmail = ($_POST['farmEmail']);
			$farmContactFN = ($_POST['farmContactFN']);
			$farmContactLN = ($_POST['farmContactLN']);
			$farmContactPN = ($_POST['farmContactPN']);

			// Create query
			$query = "INSERT INTO `farm` (farm_name, farm_civic_address, farm_phone, farm_email, created) VALUES ('{$farmName}', '{$farmCivAddress}',  '{$farmPhoneNum}', '{$farmEmail}', CURRENT_TIMESTAMP)";
						
			if ($db->query($query) === TRUE) {
				$result = $db->query("select farm_id from farm where created = now()");
				$queryId = $result->fetch_assoc();
				$farmId = $queryId['farm_id'];
				$query2 = "INSERT INTO `farm_contact` (farm_id, contact_first_name, contact_last_name, contact_phone) VALUES ('{$farmId}', '{$farmContactFN}',  '{$farmContactLN}', '{$farmContactPN}')";
				if ($db->query($query2) === TRUE) {
					$result2 = $db->query("select farm_contact_id from farm_contact WHERE farm_id = '{$farmId}'");
					$queryId2 = $result2->fetch_assoc();
					$farmContactId = $queryId2['farm_contact_id'];
				 	$query3 = "UPDATE `farm` SET farm_contact_id = '{$farmContactId}' WHERE farm_id = '{$farmId}'";
					if ($db->query($query3) === TRUE) {
						$db->close();
						echo '<script type="text/javascript">
								location.replace("'.ROOT.'/admin_add_warehouse.php?id=' . $farmId . '");
								</script>';	
					}
					else{			
						echo "Error: " . $query . "<br>" . $db->error;
						$db->close();
						exit;
					}
				}
				else{			
					echo "Error: " . $query . "<br>" . $db->error;
					$db->close();
					exit;
				}
				
			}
			else{			
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}
				
		}
		
		// get submit from add warehouse
		else if (isset($_POST['warehouseName']) && isset($_POST['warehouseCivAddress']) && isset($_POST['warehouseProvince']) && isset($_POST['warehousePhoneNum'])) {
			$farmId = $_GET["id"];
			$warehouseName = ($_POST['warehouseName']);
			$warehouseCivAddress = ($_POST['warehouseCivAddress']);
			$warehouseProvince = ($_POST['warehouseProvince']);
			$warehousePhoneNum = ($_POST['warehousePhoneNum']);
			

			// Create query
			$query = "INSERT INTO `warehouse` (farm_id, warehouse_name, warehouse_civic_address, warehouse_prov, warehouse_phone, created) VALUES ('{$farmId}', '{$warehouseName}', '{$warehouseCivAddress}', '{$warehouseProvince}',  '{$warehousePhoneNum}', CURRENT_TIMESTAMP)";
				
			if ($db->query($query) === TRUE) {
				$db->close();
				echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin_add_warehouse.php?id=' . $farmId . '");
						</script>';			
			} else {
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}			
		}
				
		// get warehouse bin submit
		else if (isset($_POST['binName'])) {
			// Get Warehouse Id
			$warehouseId = $_GET["id"];
			$binName = ($_POST['binName']);

			// Create query
			$query = "INSERT INTO `warehouse_bin` (warehouse_id, bin_name, created) VALUES ('{$warehouseId}', '{$binName}', CURRENT_TIMESTAMP)";
						
			if ($db->query($query) === TRUE) {
			$db->close();
			echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin_add_bin.php?id=' . $warehouseId . '");
					</script>';	
			}
			else{
			echo "Error: " . $query . "<br>" . $db->error;
			$db->close();
			exit;
			}
		}
							
		// get submit from add Field page
		else if (isset($_POST['fieldLocation'])) {
			// Get bin Id
			$binId = $_GET["id"];
			$fieldLocation = ($_POST['fieldLocation']);

			// Create query
			$query = "INSERT INTO `field` (bin_id, field_location) VALUES ('{$binId}', '{$fieldLocation}')";
						
			if ($db->query($query) === TRUE) {
			$db->close();
			echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin_add_field.php?id=' . $binId . '");
					</script>';	
			}
			else{
			echo "Error: " . $query . "<br>" . $db->error;
			$db->close();
			exit;
			}
		}			
									
		//add employee
		else if (isset($_POST['employeePosId']) && isset($_POST['employeeSIN']) && isset($_POST['employeeFN']) && isset($_POST['employeeLN']) && isset($_POST['employeeMN']) && isset($_POST['employeeAddress']) && isset($_POST['employeeCity']) && isset($_POST['employeePC']) && isset($_POST['employeePhoneNum']) && isset($_POST['employeeEmail']) && isset($_POST['employeeGender']) && isset($_POST['employeeDOB']) && isset($_POST['employeePrimaryECFN']) && isset($_POST['employeePrimaryECLN']) && isset($_POST['employeePrimaryECPhoneNum']) && isset($_POST['employeeSecondaryECFN']) && isset($_POST['employeeSecondaryECLN']) && isset($_POST['employeeSecondaryECPhoneNum'])){
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
			$employeePrimaryECFN = $_POST['employeePrimaryECFN'];
			$employeePrimaryECLN = $_POST['employeePrimaryECLN'];
			$employeePrimaryECPhoneNum = $_POST['employeePrimaryECPhoneNum'];
			$employeeSecondaryECFN = $_POST['employeeSecondaryECFN'];
			$employeeSecondaryECLN = $_POST['employeeSecondaryECLN'];
			$employeeSecondaryECPhoneNum = $_POST['employeeSecondaryECPhoneNum'];
						

			// Create query
			$query = "INSERT INTO `employee` (position_id, emp_sin, emp_first_name, emp_last_name, emp_middle_initial, emp_address, emp_city, emp_postal_code, emp_phone, emp_email, emp_gender, emp_dob, created) VALUES ('{$employeePosId}', '{$employeeSIN}', '{$employeeFN}', '{$employeeLN}', '{$employeeMN}', '{$employeeAddress}', '{$employeeCity}', '{$employeePC}', '{$employeePhoneNum}', '{$employeeEmail}', '{$employeeGender}', '{$employeeDOB}', CURRENT_TIMESTAMP)";

			if ($db->query($query) === TRUE) {
				//find employee id
				$queryEmp = "select emp_id from employee where created = CURRENT_TIMESTAMP limit 1";
				$emp = $db->query($queryEmp)->fetch_assoc();
				$empId = $emp['emp_id'];
				if($empId > 0){
					//add primary emergency contact
					$queryPEC = "INSERT INTO `employee_emergency_contact` (emerg_contact_id, emp_id, emerg_first_name, emerg_last_name, emerg_phone) VALUES ('1','{$empId}', '{$employeePrimaryECFN}', '{$employeePrimaryECLN}', '{$employeePrimaryECPhoneNum}')";
					if ($db->query($queryPEC) === TRUE) {
					
						//add secondary emergency contact
						$querySEC = "INSERT INTO `employee_emergency_contact` (emerg_contact_id, emp_id, emerg_first_name, emerg_last_name, emerg_phone) VALUES ('2', '{$empId}', '{$employeeSecondaryECFN}', '{$employeeSecondaryECLN}', '{$employeeSecondaryECPhoneNum}')";
						if ($db->query($querySEC) === false) {
							echo "Error: " . $querySEC . "<br>" . $db->error;
							$db->close();
							exit;
						}
						
						
					}
					else {
						echo "Error: " . $queryPEC . "<br>" . $db->error;
						$db->close();
						exit;
					}
				}
				else {
					echo "Error: " . $queryEmp . "<br>" . $db->error;
					$db->close();
					exit;
				}
				echo "New record created successfully";
				$db->close();
				echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin_add_employee.php");
					</script>';	
			} 
			else {
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}
		}
						
		//add employee training certificate
		else if (isset($_POST['employeeId']) && isset($_POST['TrainingStart']) && isset($_POST['TrainingEnd']) && isset($_POST['CompletionStat']) && isset($_POST['TrainingTypeId'])){
			$employeeID = $_POST['employeeId'];
			$TrainingStart = $_POST['TrainingStart'];
			$TrainingEnd = $_POST['TrainingEnd'];
			$CompletionStat = $_POST['CompletionStat'];
			$TrainingTypeId = $_POST['TrainingTypeId'];					

			// Create query
			$query = "INSERT INTO `employee_training_certificate` (emp_id, start_date, end_date, completed, training_type_id) VALUES ('{$employeeId}', '{$TrainingStart}', '{$TrainingEnd}', '{$CompletionStat}', '{$TrainingTypeId}')";

			if ($db->query($query) === TRUE) {
				echo "New record created successfully";
				$db->close();
				echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin_add_employee_training_certificate.php");
					</script>';	
			}
			else {
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}
		}
		
		// get submit from add driver page
		else if (isset($_POST['empId']) && isset($_POST['driverLicNum']) && isset($_POST['driverLicED']) && isset($_POST['driverLicTId']) && isset($_POST['medicalClear']) && isset($_POST['medicalED'])) {
			$empId = ($_POST['empId']);
			$driverLicNum = ($_POST['driverLicNum']);
			$driverLicED = ($_POST['driverLicED']);
			$driverLicTId = ($_POST['driverLicTId']);
			$medicalClear = ($_POST['medicalClear']);
			$medicalED = ($_POST['medicalED']);

			// Create query
			$queryL = "INSERT INTO `licence` (emp_id, lic_num, lic_expiry_date, lic_type_id) VALUES ('{$empId}', '{$driverLicNum}',  '{$driverLicED}', '{$driverLicTId}')";
					
			if ($db->query($queryL) === TRUE) {
				$queryM = "INSERT INTO `medical` (emp_id, cleared_no, medical_expiry_date) VALUES ('{$empId}', '{$medicalClear}',  '{$medicalED}')";
				if ($db->query($queryM) === TRUE) {
					//fetch licence Id
					$queryLId = "select lic_id from `licence` where emp_id = '{$empId}' Limit 1";
					$lic = $db->query($queryLId)->fetch_assoc();
					$licId = $lic['lic_id'];
					
					//fetch medical Id
					$queryMId = "select medical_id from `medical` where emp_id = '{$empId}' Limit 1";
					$med = $db->query($queryMId)->fetch_assoc();
					$medicalId = $med['medical_id'];
					
					$queryD = "INSERT INTO `driver` (emp_id, lic_id, medical_id) VALUES ('{$empId}', '{$licId}',  '{$medicalId}')";
					if ($db->query($queryD) === TRUE) {
						$db->close();
						echo '<script type="text/javascript">
							location.replace("'.ROOT.'/admin_emp_list.php");
							</script>';
					}
					else{
					echo "Error: " . $query . "<br>" . $db->error;
					$db->close();
					exit;
					}	
				}
				else{
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
				}			
			}
			else{
			echo "Error: " . $query . "<br>" . $db->error;
			$db->close();
			exit;
			}	
		}
		
		// get submit from add Destination page
		else if (isset($_POST['destinationName']) && isset($_POST['destinationAddress']) && isset($_POST['destinationPhoneNum']) && isset($_POST['destinationContactName'])) {
			$destinationName = ($_POST['destinationName']);
			$destinationAddress = ($_POST['destinationAddress']);
			$destinationPhoneNum = ($_POST['destinationPhoneNum']);
			$destinationContactName = ($_POST['destinationContactName']);

			// Create query
			$query = "INSERT INTO `destination` (dest_name, dest_address, dest_phone, dest_contact_name) VALUES ('{$destinationName}', '{$destinationAddress}',  '{$destinationPhoneNum}', '{$destinationContactName}')";
					
			if ($db->query($query) === TRUE) {
			$db->close();
			echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin_add_destination.php");
					</script>';	
			}
			else{
			echo "Error: " . $query . "<br>" . $db->error;
			$db->close();
			exit;
			}					
		}
			
		// get submit from add Processor page
		else if (isset($_POST['processorName']) && isset($_POST['processorAddress']) && isset($_POST['processorPhoneNum']) && isset($_POST['processorContactName'])) {
			$processorName = ($_POST['processorName']);
			$processorAddress = ($_POST['processorAddress']);
			$processorPhoneNum = ($_POST['processorPhoneNum']);
			$processorContactName = ($_POST['processorContactName']);

			// Create query
			$query = "INSERT INTO `processor` (processor_name, processor_address, processor_phone, processor_contact_name) VALUES ('{$processorName}', '{$processorAddress}',  '{$processorPhoneNum}', '{$processorContactName}')";
					
			if ($db->query($query) === TRUE) {
			$db->close();
			echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin_add_processor.php");
					</script>';	
			}
			else{
			echo "Error: " . $query . "<br>" . $db->error;
			$db->close();
			exit;
			}					
		}
			
		// get submit from add truck page
		else if (isset($_POST['truckNum']) && isset($_POST['regId']) && isset($_POST['inspectId']) && isset($_POST['plateNum']) && isset($_POST['insId'])) {
			$truckNum = ($_POST['truckNum']);
			$regId = ($_POST['regId']);
			$inspectId = ($_POST['inspectId']);
			$plateNum = ($_POST['plateNum']);
			$insId = ($_POST['insId']);

			// Create query
			$query = "INSERT INTO `truck` (truck_num, reg_id, inspect_id, plate_num, ins_id) VALUES ('{$truckNum}', '{$regId}',  '{$inspectId}', '{$plateNum}', '{$insId}')";
				
			if ($db->query($query) === TRUE) {
			$db->close();
			echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin_add_processor.php");
					</script>';	
			}
			else{
			echo "Error: " . $query . "<br>" . $db->error;
			$db->close();
			exit;
			}	
		}

		// get submit from add trailer page
		else if (isset($_POST['trailerNum']) && isset($_POST['regId']) && isset($_POST['inspectId']) && isset($_POST['plateNum']) && isset($_POST['insId'])) {
			$trailerNum = ($_POST['trailerNum']);
			$regId = ($_POST['regId']);
			$inspectId = ($_POST['inspectId']);
			$plateNum = ($_POST['plateNum']);
			$insId = ($_POST['insId']);

			// Create query
			$query = "INSERT INTO `trailer` (trailer_num, reg_id, inspect_id, plate_num, ins_id) VALUES ('{$trailerNum}', '{$regId}',  '{$inspectId}', '{$plateNum}', '{$insId}')";
					
			if ($db->query($query) === TRUE) {
			$db->close();
			echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin_add_trailer.php");
					</script>';	
			}
			else{
			echo "Error: " . $query . "<br>" . $db->error;
			$db->close();
			exit;
			}	
		}
			
		//improper sending variable
		else{
			echo '<script type="text/javascript">
					location.replace("'.ROOT.'/index.php");
					</script>';	
		}
	}

	// If the user is not logged in, redirect them to the login page if they try to access this script
	else {
		echo '<script type="text/javascript">
					location.replace("'.ROOT.'/login/index.php");
					</script>';
	}
?>
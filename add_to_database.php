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
						echo "New record created successfully";
						$db->close();
						echo '<script type="text/javascript">
							location.replace("'.ROOT.'/admin_add_employee.php");
							</script>';	
						
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
							location.replace("'.ROOT.'/admin_driver_list.php");
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
		else if (isset($_POST['destinationName']) && isset($_POST['destinationAddress']) && isset($_POST['destinationProvince']) && isset($_POST['destinationPhoneNum']) && isset($_POST['destinationContactName'])) {
			$destinationName = ($_POST['destinationName']);
			$destinationAddress = ($_POST['destinationAddress']);
			$destinationProvince = ($_POST['destinationProvince']);
			$destinationPhoneNum = ($_POST['destinationPhoneNum']);
			$destinationContactName = ($_POST['destinationContactName']);

			// Create query
			$query = "INSERT INTO `destination` (dest_name, dest_address, dest_prov, dest_phone, dest_contact_name) VALUES ('{$destinationName}', '{$destinationAddress}', '{$destinationProvince}',  '{$destinationPhoneNum}', '{$destinationContactName}')";
					
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
		else if (isset($_POST['truckNum']) && isset($_POST['plateNum']) && isset($_POST['regExpiry']) && isset($_POST['regImg']) && isset($_POST['inspectExpiry']) && isset($_POST['inspectImg']) && isset($_POST['insureExpiry']) && isset($_POST['insureImg'])) {
			$truckNum = ($_POST['truckNum']);
			$plateNum = ($_POST['plateNum']);
			$regExpiry = ($_POST['regExpiry']);
			$regImg = ($_POST['regImg']);
			$inspectExpiry = ($_POST['inspectExpiry']);
			$inspectImg = ($_POST['inspectImg']);
			$insureExpiry = ($_POST['insureExpiry']);
			$insureImg = ($_POST['insureImg']);

			// Create query
			$query = "INSERT INTO `truck` (truck_num, plate_num) VALUES ('{$truckNum}', '{$plateNum}')";
			if ($db->query($query) === TRUE) {
				$queryTId = "select truck_id from `truck` where truck_num = {$truckNum} AND plate_num = {$plateNum}";
				$truck = $db->query($queryTId)->fetch_assoc();
				$truckId = $truck['truck_id'];
				if($truckId > 0){
					$queryRegImg = "INSERT INTO `images` (img) VALUES ('{$regImg}')";
					if ($db->query($queryRegImg) === TRUE) {
						$queryRegImgId = "select img_id from `images` where img = '{$regImg}'";
						$regImgIdFetch = $db->query($queryRegImgId)->fetch_assoc();
						$regImgId = $regImgIdFetch['img_id'];
						
						$queryInspectImg = "INSERT INTO `images` (img) VALUES ('{$inspectImg}')";
						if ($db->query($queryInspectImg) === TRUE) {
							$queryInspectImgId = "select img_id from `images` where img = '{$inspectImg}'";
							$inspectImgIdFetch = $db->query($queryInspectImgId)->fetch_assoc();
							$inspectImgId = $inspectImgIdFetch['img_id'];
						
							$queryInsureImg = "INSERT INTO `images` (img) VALUES ('{$insureImg}')";
							if ($db->query($queryInsureImg) === TRUE) {
								$queryInsureImgId = "select img_id from `images` where img = '{$insureImg}'";
								$insureImgIdFetch = $db->query($queryInsureImgId)->fetch_assoc();
								$insureImgId = $insureImgIdFetch['img_id'];	
						
								$queryReg = "INSERT INTO `registration` (reg_expiry_date, truck_id, img_id) VALUES ('{$regExpiry}', '{$truckId}', '{$regImgId}')";
								
								if ($db->query($queryReg) === TRUE) {
									$queryRId = "select reg_id from `registration` where truck_id = '{$truckId}'";
									$reg = $db->query($queryRId)->fetch_assoc();
									$regId = $reg['reg_id'];
									
									$queryinspect = "INSERT INTO `inspection` (inspect_expiry_date, truck_id, img_id) VALUES ('{$inspectExpiry}', '{$truckId}', '{$inspectImgId}')";
									
									if ($db->query($queryinspect) === TRUE) {
										$queryInspId = "select inspect_id from `inspection` where truck_id = {$truckId}";
										$inspect = $db->query($queryInspId)->fetch_assoc();
										$inspectId = $inspect['inspect_id'];
										
										$queryinsure = "INSERT INTO `insurance` (ins_expiry_date, truck_id, img_id) VALUES ('{$insureExpiry}', '{$truckId}', '{$insureImgId}')";
										
										if ($db->query($queryinsure) === TRUE) {
											$queryInsuId = "select ins_id from `insurance` where truck_id = {$truckId}";
											$insure = $db->query($queryInsuId)->fetch_assoc();
											$insureId = $insure['ins_id'];
											
											$queryTruckFin = "UPDATE `truck` SET reg_id = '{$regId}', inspect_id = '{$inspectId}', ins_id = '{$insureId}' WHERE truck_id = '{$truckId}'";
											if ($db->query($queryTruckFin) === TRUE) {
												$db->close();
												echo '<script type="text/javascript">
														location.replace("'.ROOT.'/admin_truck_list.php");
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

		// get submit from add trailer page
		else if (isset($_POST['trailerNum']) && isset($_POST['plateNum']) && isset($_POST['regExpiry']) && isset($_POST['regImg']) && isset($_POST['inspectExpiry']) && isset($_POST['inspectImg']) && isset($_POST['insureExpiry']) && isset($_POST['insureImg'])) {
			$trailerNum = ($_POST['trailerNum']);
			$plateNum = ($_POST['plateNum']);
			$regExpiry = ($_POST['regExpiry']);
			$regImg = ($_POST['regImg']);
			$inspectExpiry = ($_POST['inspectExpiry']);
			$inspectImg = ($_POST['inspectImg']);
			$insureExpiry = ($_POST['insureExpiry']);
			$insureImg = ($_POST['insureImg']);

			// Create query
			$query = "INSERT INTO `trailer` (trailer_num, plate_num) VALUES ('{$trailerNum}', '{$plateNum}')";
			if ($db->query($query) === TRUE) {
				$queryTId = "select trailer_id from `trailer` where trailer_num = {$trailerNum} AND plate_num = {$plateNum}";
				$trailer = $db->query($queryTId)->fetch_assoc();
				$trailerId = $trailer['trailer_id'];
				if($trailerId > 0){
					$queryRegImg = "INSERT INTO `images` (img) VALUES ('{$regImg}')";
					if ($db->query($queryRegImg) === TRUE) {
						$queryRegImgId = "select img_id from `images` where img = '{$regImg}'";
						$regImgIdFetch = $db->query($queryRegImgId)->fetch_assoc();
						$regImgId = $regImgIdFetch['img_id'];
						
						$queryInspectImg = "INSERT INTO `images` (img) VALUES ('{$inspectImg}')";
						if ($db->query($queryInspectImg) === TRUE) {
							$queryInspectImgId = "select img_id from `images` where img = '{$inspectImg}'";
							$inspectImgIdFetch = $db->query($queryInspectImgId)->fetch_assoc();
							$inspectImgId = $inspectImgIdFetch['img_id'];
						
							$queryInsureImg = "INSERT INTO `images` (img) VALUES ('{$insureImg}')";
							if ($db->query($queryInsureImg) === TRUE) {
								$queryInsureImgId = "select img_id from `images` where img = '{$insureImg}'";
								$insureImgIdFetch = $db->query($queryInsureImgId)->fetch_assoc();
								$insureImgId = $insureImgIdFetch['img_id'];	
								
								$queryReg = "INSERT INTO `registration` (reg_expiry_date, trailer_id, img_id) VALUES ('{$regExpiry}', '{$trailerId}', '{$regImgId}')";
								
								if ($db->query($queryReg) === TRUE) {
									$queryRId = "select reg_id from `registration` where trailer_id = {$trailerId}";
									$reg = $db->query($queryRId)->fetch_assoc();
									$regId = $reg['reg_id'];
									
									$queryinspect = "INSERT INTO `inspection` (inspect_expiry_date, trailer_id, img_id) VALUES ('{$inspectExpiry}', '{$trailerId}', '{$inspectImgId}')";
									
									if ($db->query($queryinspect) === TRUE) {
										$queryInspId = "select inspect_id from `inspection` where trailer_id = {$trailerId}";
										$inspect = $db->query($queryInspId)->fetch_assoc();
										$inspectId = $inspect['inspect_id'];
										
										$queryinsure = "INSERT INTO `insurance` (ins_expiry_date, trailer_id, img_id) VALUES ('{$insureExpiry}', '{$trailerId}', '{$insureImgId}')";
										
										if ($db->query($queryinsure) === TRUE) {
											$queryInsuId = "select ins_id from `insurance` where trailer_id = {$trailerId}";
											$insure = $db->query($queryInsuId)->fetch_assoc();
											$insureId = $insure['ins_id'];
											
											$querytrailerFin = "UPDATE `trailer` SET reg_id = '{$regId}', inspect_id = '{$inspectId}', ins_id = '{$insureId}' WHERE trailer_id = '{$trailerId}'";
											if ($db->query($querytrailerFin) === TRUE) {
												$db->close();
												echo '<script type="text/javascript">
														location.replace("'.ROOT.'/admin_trailer_list.php");
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
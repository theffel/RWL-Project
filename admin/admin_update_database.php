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

//set path to include files
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/RWL-Project";
// Include the database.php file
include($path.'/database.php');

// Include the header.php file
include($path.'/header.php');

	// If the user is logged in, run the script
	if ($loggedIn == true) {	
	
		//destination update
		if (isset($_POST['destId']) && isset($_POST['destinationName']) && isset($_POST['destinationAddress']) && isset($_POST['destinationProvince']) && isset($_POST['destinationPhoneNum']) && isset($_POST['destinationContactName'])) {
			$destId = $_POST['destId'];
			$destinationName = $_POST['destinationName'];
			$destinationAddress = $_POST['destinationAddress'];
			$destinationProvince = $_POST['destinationProvince'];
			$destinationPhoneNum = $_POST['destinationPhoneNum'];
			$destinationContactName = $_POST['destinationContactName'];
			
			// Create query
			$query = "Update `employee` SET dest_name = '{$destinationName}', dest_address = '{$destinationAddress}', dest_prov = '{$destinationProvince}', dest_phone = '{$destinationPhoneNum}', dest_contact_name = '{$destinationContactName}' where dest_id = '{$destId}'";

			if ($db->query($query) === TRUE) {
				$db->close();
				echo '<script type="text/javascript">
				location.replace("'.ROOT.'/admin/destination/admin_destination_list.php");
				</script>';			
			}
			else {
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}

		}
		
		//employee update
		else if (isset($_POST['empId']) && isset($_POST['employeePosId']) && isset($_POST['employeeSIN']) && isset($_POST['employeeFN']) && isset($_POST['employeeLN']) && isset($_POST['employeeMN']) && isset($_POST['employeeAddress']) && isset($_POST['employeeCity']) && isset($_POST['employeePC']) && isset($_POST['employeePhoneNum']) && isset($_POST['employeeEmail']) && isset($_POST['employeeGender']) && isset($_POST['employeeDOB'])){
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
					

			// Create query
			$query = "Update `employee` SET position_id = '{$employeePosId}', emp_sin = '{$employeeSIN}', emp_first_name = '{$employeeFN}', emp_last_name = '{$employeeLN}', emp_middle_initial = '{$employeeMN}', emp_address = '{$employeeAddress}', emp_city = '{$employeeCity}', emp_postal_code = '{$employeePC}', emp_phone = '{$employeePhoneNum}', emp_email = '{$employeeEmail}', emp_gender = '{$employeeGender}', emp_dob = '{$employeeDOB}', modified = CURRENT_TIMESTAMP  where emp_id = '{$empId}'";

			if ($db->query($query) === TRUE) {
				$db->close();
				echo '<script type="text/javascript">
				location.replace("'.ROOT.'/admin/employee/admin_emp_list.php");
				</script>';			
			}
			else {
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}


		}
		
		//employee emergency contact update
		else if (isset($_POST['empId']) && isset($_POST['employeePrimaryECFN']) && isset($_POST['employeePrimaryECLN']) && isset($_POST['employeePrimaryECPhoneNum']) && isset($_POST['employeeSecondaryECFN']) && isset($_POST['employeeSecondaryECLN']) && isset($_POST['employeeSecondaryECPhoneNum'])) {
			$empId = $_POST['empId'];
			$employeePrimaryECFN = $_POST['employeePrimaryECFN'];
			$employeePrimaryECLN = $_POST['employeePrimaryECLN'];
			$employeePrimaryECPhoneNum = $_POST['employeePrimaryECPhoneNum'];
			$employeeSecondaryECFN = $_POST['employeeSecondaryECFN'];
			$employeeSecondaryECLN = $_POST['employeeSecondaryECLN'];
			$employeeSecondaryECPhoneNum = $_POST['employeeSecondaryECPhoneNum'];
			

			// Create query
			$queryP = "Update `employee_emergency_contact` SET emerg_first_name = '{$employeePrimaryECFN}', emerg_last_name = '{$employeePrimaryECLN}', emerg_phone = '{$employeePrimaryECPhoneNum}' where emp_id = '{$empId}' AND emerg_contact_id = '1'";
			if ($db->query($queryP) === TRUE) {
				$queryP = "Update `employee_emergency_contact` SET emerg_first_name = '{$employeeSecondaryECFN}', emerg_last_name = '{$employeeSecondaryECLN}', emerg_phone = '{$employeeSecondaryECPhoneNum}' where emp_id = '{$empId}' AND emerg_contact_id = '2'";
				if ($db->query($queryS) === TRUE) {
					$db->close();
					echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin/employee/admin_emp_list.php");
					</script>';			
				}
				else {
					echo "Error: " . $query . "<br>" . $db->error;
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
		
		//farm update
		else if (isset($_POST['farmId']) && isset($_POST['farmName']) && isset($_POST['farmCivAddress']) && isset($_POST['farmPhoneNum']) && isset($_POST['farmEmail'])) {
			$farmId = ($_POST['farmId']);
			$farmName = ($_POST['farmName']);
			$farmCivAddress = ($_POST['farmCivAddress']);
			$farmPhoneNum = ($_POST['farmPhoneNum']);
			$farmEmail = ($_POST['farmEmail']);

			// Create query
			$query = "UPDATE `farm` SET farm_name = '{$farmName}', farm_civic_address = '{$farmCivAddress}', farm_phone = '{$farmPhoneNum}', farm_email = '{$farmEmail}' WHERE farm_id = '{$farmId}'";
			if ($db->query($query) === TRUE) {
				$db->close();
				echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin/farm/admin_farm_list.php");
						</script>';			
			}
			else{
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}
		}
		
		//farm contact update
		else if (isset($_POST['contactId']) && isset($_POST['farmId']) && isset($_POST['farmContactFN']) && isset($_POST['farmContactLN']) && isset($_POST['farmContactPN'])) {
			$contactId = ($_POST['contactId']);
			$farmId = ($_POST['farmId']);
			$farmContactFN = ($_POST['farmContactFN']);
			$farmContactLN = ($_POST['farmContactLN']);
			$farmContactPN = ($_POST['farmContactPN']);

			// Create query
			$query = "UPDATE `farm_contact` SET contact_first_name = '{$farmContactFN}', contact_last_name = '{$farmContactLN}', contact_phone = '{$farmContactPN}' WHERE farm_contact_id = '{$contactId}'";
			if ($db->query($query) === TRUE) {
				$db->close();
				echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin/farm/admin_farm_contact_list.php?id=' .$farmId. '");
						</script>';			
			}
			else{
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}
		}
		
		//get warehouse update
		else if (isset($_POST['warehouseId']) && isset($_POST['farmId']) && isset($_POST['warehouseName']) && isset($_POST['warehouseCivAddress']) && isset($_POST['warehouseProvince']) && isset($_POST['warehousePhoneNum'])) {
			$warehouseId = ($_POST['warehouseId']);
			$farmId = ($_POST['farmId']);
			$warehouseName = ($_POST['warehouseName']);
			$warehouseCivAddress = ($_POST['warehouseCivAddress']);
			$warehouseProvince = ($_POST['warehouseProvince']);
			$warehousePhoneNum = ($_POST['warehousePhoneNum']);

			// Create query
			$query = "UPDATE `warehouse` SET warehouse_name = '{$warehouseName}', warehouse_civic_address = '{$warehouseCivAddress}', warehouse_prov = '{$warehouseProvince}', warehouse_phone = '{$warehousePhoneNum}' WHERE warehouse_id = '{$warehouseId}'";			
			if ($db->query($query) === TRUE) {
				$db->close();
				echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin/warehouse/admin_warehouse_list.php?id=' . $farmId . '");
					</script>';	
			} 
			else {
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}			
		}
		
		//warehouse bin update
		else if (isset($_POST['binId']) && isset($_POST['warehouseId']) && isset($_POST['binName'])) {
			$binId = ($_POST['binId']);
			$warehouseId = ($_POST['warehouseId']);
			$binName = ($_POST['binName']);;

			// Create query
			$query = "UPDATE `warehouse_bin` SET bin_name = '{$binName}' WHERE bin_id = '{$binId}'";			
			if ($db->query($query) === TRUE) {
				$db->close();
				echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin/warehouse_bin/admin_bin_list.php?id=' . $warehouseId . '");
					</script>';	
			} 
			else {
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}			
		}
		
		//field update
		else if (isset($_POST['fieldLocation']) && isset($_POST['fieldId']) && isset($_POST['binId'])) {
			$fieldLocation = ($_POST['fieldLocation']);
			$fieldId = ($_POST['fieldId']);
			$binId = ($_POST['binId']);

			// Create query
			$query = "UPDATE `field` SET field_location = '{$fieldLocation}' WHERE field_id = '{$fieldId}'";			
			if ($db->query($query) === TRUE) {
				$db->close();
				echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin/field/admin_field_list.php?id=' . $binId . '");
					</script>';	
			} 
			else {
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}
		}
		
		//processor update
		else if (isset($_POST['processorId']) && isset($_POST['processorName']) && isset($_POST['processorAddress']) && isset($_POST['processorPhoneNum'])) {
			$processorId = ($_POST['processorId']);
			$processorName = ($_POST['processorName']);
			$processorAddress = ($_POST['processorAddress']);
			$processorContactName = ($_POST['processorContactName']);
			$processorPhoneNum = ($_POST['processorPhoneNum']);

			// Create query
			$query = "UPDATE `processor` SET processor_name = '{$processorName}', processor_address = '{$processorAddress}', processor_contact_name = '{$processorContactName}', processor_phone = '{$processorPhoneNum}' WHERE processor_Id = '{$processorId}'";			
			if ($db->query($query) === TRUE) {
				$db->close();
				echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin/processor/admin_processor_list.php");
					</script>';	
			} 
			else {
				echo "Error: " . $query . "<br>" . $db->error;
				$db->close();
				exit;
			}
		}
		
		//trailer
		else if (isset($_POST['trailerId'])) {
			$trailerId = ($_POST['trailerId']);
			
			//trailer update
			if (isset($_POST['trailerNum']) && isset($_POST['plateNum'])) {
				$trailerNum = ($_POST['trailerNum']);
				$plateNum = ($_POST['plateNum']);

				// Create query
				$query = "UPDATE `trailer` SET trailer_num = '{$trailerNum}', plate_num = '{$plateNum}' WHERE trailer_Id = '{$trailerId}'";			
				if ($db->query($query) === TRUE) {
					$db->close();
					echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin/trailer/admin_trailer_list.php");
						</script>';	
				} 
				else {
					echo "Error: " . $query . "<br>" . $db->error;
					$db->close();
					exit;
				}
			}
			
			//Inspection update
			else if (isset($_POST['inspectExpiry']) && isset($_POST['img_id']) && isset($_POST['inspectImg'])) {
				$inspectExpiry = ($_POST['inspectExpiry']);
				$img_id = ($_POST['img_id']);
				$inspectImg = ($_POST['inspectImg']);

				// Create query
				$query = "UPDATE `inspection` SET inspect_expiry_date = '{$inspectExpiry}' WHERE trailer_id = '{$trailerId}'";			
				if ($db->query($query) === TRUE) {
					$imgQuery = "UPDATE `images` SET img = '{$inspectImg}' WHERE img_id = '{$imgid}'";		
					if ($db->query($imgQuery) === TRUE) {
					$db->close();
					echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin/trailer/admin_trailer_list.php");
						</script>';	
					} 
					else {
						echo "Error: " . $query . "<br>" . $db->error;
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
			
			//Insurance update
			else if (isset($_POST['insExpiry']) && isset($_POST['img_id']) && isset($_POST['insImg'])) {
				$insExpiry = ($_POST['insExpiry']);
				$img_id = ($_POST['img_id']);
				$insImg = ($_POST['insImg']);

				// Create query
				$query = "UPDATE `insurance` SET ins_expiry_date = '{$insExpiry}' WHERE trailer_id = '{$trailerId}'";			
				if ($db->query($query) === TRUE) {
					$imgQuery = "UPDATE `images` SET img = '{$insImg}' WHERE img_id = '{$imgid}'";		
					if ($db->query($imgQuery) === TRUE) {
					$db->close();
					echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin/trailer/admin_trailer_list.php");
						</script>';	
					} 
					else {
						echo "Error: " . $query . "<br>" . $db->error;
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
			
			//Report update
			else if (isset($_POST['regExpiry']) && isset($_POST['img_id']) && isset($_POST['regImg'])) {
				$regExpiry = ($_POST['regExpiry']);
				$img_id = ($_POST['img_id']);
				$regImg = ($_POST['regImg']);

				// Create query
				$query = "UPDATE `registration` SET reg_expiry_date = '{$regExpiry}' WHERE trailer_id = '{$trailerId}'";			
				if ($db->query($query) === TRUE) {
					$imgQuery = "UPDATE `images` SET img = '{$regImg}' WHERE img_id = '{$imgid}'";		
					if ($db->query($imgQuery) === TRUE) {
					$db->close();
					echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin/trailer/admin_trailer_list.php");
						</script>';	
					} 
					else {
						echo "Error: " . $query . "<br>" . $db->error;
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
		}
		
		//truck
		else if (isset($_POST['truckId'])) {
			$truckId = ($_POST['truckId']);
			
			//truck update
			if (isset($_POST['truckNum']) && isset($_POST['plateNum'])) {
				$truckNum = ($_POST['truckNum']);
				$plateNum = ($_POST['plateNum']);

				// Create query
				$query = "UPDATE `truck` SET truck_num = '{$truckNum}', plate_num = '{$plateNum}' WHERE truck_Id = '{$truckId}'";			
				if ($db->query($query) === TRUE) {
					$db->close();
					echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin/truck/admin_truck_list.php");
						</script>';	
				} 
				else {
					echo "Error: " . $query . "<br>" . $db->error;
					$db->close();
					exit;
				}
			}
			
			//Inspection update
			else if (isset($_POST['inspectExpiry']) && isset($_POST['img_id']) && isset($_POST['inspectImg'])) {
				$inspectExpiry = ($_POST['inspectExpiry']);
				$img_id = ($_POST['img_id']);
				$inspectImg = ($_POST['inspectImg']);

				// Create query
				$query = "UPDATE `inspection` SET inspect_expiry_date = '{$inspectExpiry}' WHERE truck_id = '{$truckId}'";			
				if ($db->query($query) === TRUE) {
					$imgQuery = "UPDATE `images` SET img = '{$inspectImg}' WHERE img_id = '{$imgid}'";		
					if ($db->query($imgQuery) === TRUE) {
					$db->close();
					echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin/truck/admin_truck_list.php");
						</script>';	
					} 
					else {
						echo "Error: " . $query . "<br>" . $db->error;
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
			
			//Insurance update
			else if (isset($_POST['insExpiry']) && isset($_POST['img_id']) && isset($_POST['insImg'])) {
				$insExpiry = ($_POST['insExpiry']);
				$img_id = ($_POST['img_id']);
				$insImg = ($_POST['insImg']);

				// Create query
				$query = "UPDATE `insurance` SET ins_expiry_date = '{$insExpiry}' WHERE truck_id = '{$truckId}'";			
				if ($db->query($query) === TRUE) {
					$imgQuery = "UPDATE `images` SET img = '{$insImg}' WHERE img_id = '{$imgid}'";		
					if ($db->query($imgQuery) === TRUE) {
					$db->close();
					echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin/truck/admin_truck_list.php");
						</script>';	
					} 
					else {
						echo "Error: " . $query . "<br>" . $db->error;
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
			
			//Report update
			else if (isset($_POST['regExpiry']) && isset($_POST['img_id']) && isset($_POST['regImg'])) {
				$regExpiry = ($_POST['regExpiry']);
				$img_id = ($_POST['img_id']);
				$regImg = ($_POST['regImg']);

				// Create query
				$query = "UPDATE `registration` SET reg_expiry_date = '{$regExpiry}' WHERE truck_id = '{$truckId}'";			
				if ($db->query($query) === TRUE) {
					$imgQuery = "UPDATE `images` SET img = '{$regImg}' WHERE img_id = '{$imgid}'";		
					if ($db->query($imgQuery) === TRUE) {
					$db->close();
					echo '<script type="text/javascript">
						location.replace("'.ROOT.'/admin/truck/admin_truck_list.php");
						</script>';	
					} 
					else {
						echo "Error: " . $query . "<br>" . $db->error;
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
		}
				
		//improper sending variable
		else{
			echo '<script type="text/javascript">
					location.replace("'.ROOT.'/admin/admin_page_list.php");
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
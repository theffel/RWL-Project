<?php

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
	}

	// If the user is not logged in, redirect them to login.php if they try to access this page
	else {
		echo '<script type="text/javascript">
					location.replace("login/index.php");
					</script>';
	}
?>
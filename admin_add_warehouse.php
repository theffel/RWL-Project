<?php

// Start the session
session_start();

// Include the database.php file
include('database.php');

// Include the header.php file
include('header.php');
?>

<html>
	<body>
		    <!-- Page Content -->
		<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Farm Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a>
                    </li>
					<li><a href="../admin_farm_list.php">Farms</a>
                    </li>
                    <li class="active">Add Warehouse</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add farm form
///////////////////////////////////////////////////////////////////////////////////////////////////
//REMEMBER TO CHANGE THIS WHEN LOGIN FUNCTIONALITY IS UP////////////////
//			if ($loggedIn == false) {
			if ($loggedIn == true) {	
////////////////////////////////////////////////////////////////////
				// Get Farm Id
				$farmId = $_GET["id"];
				// get warehouse submit
				if (isset($_POST['warehouseName']) && isset($_POST['warehouseCivAddress']) && isset($_POST['warehousePhoneNum'])) {
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
				}


			
			

				echo "<form class='form-horizontal' name='addwarehouseForm' id='addwarehouseForm' method='post' action='../admin_add_warehouse.php/?id=". $farmId ."'>";
			?>		
					<!--warehouse Name-->
					<div class="form-group">
						<label for="inputwarehouseName" class="control-label col-xs-2">warehouse Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="warehouseName" id="warehouseName" placeholder="warehouse Name" required data-validation-required-message="Please enter the name of the new warehouse.">
						</div>
					</div>
					
					<!--warehouse Civic Address-->
					<div class="form-group">
						<label for="inputwarehouseCivAddress" class="control-label col-xs-2">warehouse Civic Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="warehouseCivAddress" id="warehouseCivAddress" placeholder="warehouse Civic Address" required data-validation-required-message="Please enter the civic address of the new warehouse.">
						</div>
					</div>
					
					<!--warehouse Phone Number-->
					<div class="form-group">
						<label for="inputwarehousePhoneNum" class="control-label col-xs-2">warehouse Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="warehousePhoneNum" id="warehousePhoneNum" placeholder="warehouse Phone #" required data-validation-required-message="Please enter the Phone number of the new warehouse.">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addFarm" value="Add Warehouse"/>
						</div>
					</div>
					
				</form>

			<?php
			}

			// If the user is not logged in, redirect them to login.php if they try to access this page
			else {
				echo '<script type="text/javascript">
							location.replace("login/index.php");
							</script>';
			}
        ?>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; RWL Holdings 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
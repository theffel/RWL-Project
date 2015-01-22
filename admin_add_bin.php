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
                <h1 class="page-header">New Warehouse Bin Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a>
                    </li>
					<li><a href="admin_farm_list.php">Farms</a>
					</li>
<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {	
				// Get Farm Id
				$warehouseId = $_GET["id"];
				//warehouse breadcrumb
//				echo "<li><a href='admin_warehouse_list.php?id=" . $warehouseId . "'>warehouse</a></li>";
?>				                 
					
                    <li class="active">Add Bin</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php

				// get warehouse submit
				if (isset($_POST['binMarker'])) {
					$binMarker = ($_POST['binMarker']);

					// Create query
					$query = "INSERT INTO `warehouse_bin` (warehouse_id, bin_marker) VALUES ('{$warehouseId}', '{$binMarker}')";
					
					if ($db->query($query) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $query . "<br>" . $db->error;
					}

					$db->close();
				}


			
			

				echo "<form class='form-horizontal' name='addwarehouseForm' id='addwarehouseForm' method='post' action='../admin_add_bin.php/?id=". $warehouseId ."'>";
			?>		
					<!--Bin Marker-->
					<div class="form-group">
						<label for="inputbinMarker" class="control-label col-xs-2">Bin Marker</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="binMarker" id="binMarker" placeholder="Bin Marker" required data-validation-required-message="Please enter the marker of the new bin.">
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
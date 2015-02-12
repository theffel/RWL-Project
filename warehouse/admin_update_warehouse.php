<?php
/**
 * This page holds the form for updateing a new warehouse.
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
?>

<html>
	<body>
		    <!-- Page Content -->
		<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Warehouse updateition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/farm/admin_farm_list.php">Farms</a>
                    </li>
<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {	
				// Get warehouse Id
				$warehouseId = $_GET["id"];
				// Get Farm Id
				$query = "select * from `warehouse` where warehouse_id = '{$warehouseId}'";
				$result = $db->query($query);
				$queryValues = $result->fetch_assoc();
				$farmId = $queryValues['farm_id'];
				//warehouse breadcrumb
				echo "<li><a href='".ROOT."/warehouse/admin_warehouse_list.php?id=" . $farmId . "'>Warehouses</a></li>";
?>
                    <li class="active">Update Warehouse</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the update farm form
			if ($loggedIn == true) {			
				if ($result->num_rows > 0) {
					$queryValues = $result->fetch_assoc();
					$farmId = $queryValues['farm_id'];
					$warehouseName = $queryValues['warehouse_name'];
					$warehouseCivAddress = $queryValues['warehouse_civic_address'];
					$warehouseProvince = $queryValues['warehouse_prov'];
					$warehousePhoneNum = $queryValues['warehouse_phone'];
				?>	
					<form class="form-horizontal" name="updateWarehouseForm" id="updateWarehouseForm" method="post" action="<?php echo ROOT; ?>/admin_update_database.php">
					
						<!--warehouse Id-->
						<input hidden type = "radio" name = "warehouseId" id = "warehouseId" value = "<?php echo $warehouseId; ?>" checked>		
						
						<!--warehouse Name-->
						<div class="form-group">
							<label for="inputwarehouseName" class="control-label col-xs-2">warehouse Name</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" name="warehouseName" id="warehouseName" value = "<?php echo $warehouseName; ?>" required data-validation-required-message="Please enter the name of the new warehouse.">
							</div>
						</div>
						
						<!--warehouse Civic address-->
						<div class="form-group">
							<label for="inputwarehouseCivaddress" class="control-label col-xs-2">warehouse Civic address</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" name="warehouseCivAddress" id="warehouseCivAddress" value = "<?php echo $warehouseCivAddress; ?>" required data-validation-required-message="Please enter the civic address of the new warehouse.">
							</div>
						</div>
			
						<!--warehouse Province-->
						<div class="form-group">
							<label for="inputwarehouseProvince" class="control-label col-xs-2">Province</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" name="warehouseProvince" id="warehouseProvince" value = "<?php echo $warehouseProvince; ?>" required data-validation-required-message="Please enter the Province of the new warehouse.">
							</div>
						</div>
						
						<!--warehouse Phone Number-->
						<div class="form-group">
							<label for="inputwarehousePhoneNum" class="control-label col-xs-2">warehouse Phone Number</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" name="warehousePhoneNum" id="warehousePhoneNum" value = "<?php echo $warehousePhoneNum; ?>" placeholder="902#######" required data-validation-required-message="Please enter the Phone number of the new warehouse.">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-offset-2 col-xs-10">
								<input type="submit" class="btn btn-primary" name="updateFarm" value="update Warehouse"/>
							</div>
						</div>
						
					</form>					

				<?php
				}
			}

			// If the user is not logged in, redirect them to login.php if they try to access this page
			else {
				echo '<script type="text/javascript">
							location.replace("'.ROOT.'/login/index.php");
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
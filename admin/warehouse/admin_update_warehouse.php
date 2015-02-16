<?php
/**
 * This page holds the form for updating a new warehouse.
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
?>

<html>
	<body>
		    <!-- Page Content -->
		<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Warehouse Update</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/farm/admin_farm_list.php">Farms</a>
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
				echo "<li><a href='".ROOT."/admin/warehouse/admin_warehouse_list.php?id=" . $farmId . "'>Warehouses</a></li>";
?>
                    <li class="active">Update Warehouse</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the update warehouse form
				if ($result->num_rows > 0) {
					$warehouseName = $queryValues['warehouse_name'];
					$warehouseCivAddress = $queryValues['warehouse_civic_address'];
					$warehouseProvince = $queryValues['warehouse_prov'];
					$warehousePhoneNum = $queryValues['warehouse_phone'];
				?>	
					<form class="form-horizontal" name="updateWarehouseForm" id="updateWarehouseForm" method="post" action="<?php echo ROOT; ?>/admin/admin_update_database.php">
					
						<!--warehouse Id-->
						<input hidden type = "radio" name = "warehouseId" id = "warehouseId" value = "<?php echo $warehouseId; ?>" checked>		
						
						<!--Farm Id-->
						<input hidden type = "radio" name = "farmId" id = "farmId" value = "<?php echo $farmId; ?>" checked>		
						
						<!--warehouse Name-->
						<div class="form-group">
							<label for="inputwarehouseName" class="control-label col-xs-2">Name</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" name="warehouseName" id="warehouseName" value = "<?php echo $warehouseName; ?>" required data-validation-required-message="Please enter the name of the new warehouse.">
							</div>
						</div>
						
						<!--warehouse Civic address-->
						<div class="form-group">
							<label for="inputwarehouseCivaddress" class="control-label col-xs-2">Civic address</label>
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
							<label for="inputwarehousePhoneNum" class="control-label col-xs-2">Phone Number</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" name="warehousePhoneNum" id="warehousePhoneNum" value = "<?php echo $warehousePhoneNum; ?>" placeholder="902#######" required data-validation-required-message="Please enter the Phone number of the new warehouse.">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-offset-2 col-xs-10">
								<input type="submit" class="btn btn-primary" name="updateWarehouse" value="update Warehouse"/>
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
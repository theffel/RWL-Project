<?php
/**
 * This page holds the form for updateing a new bin field.
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
 * @since       2015-02-03
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
                <h1 class="page-header">Field Update</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/farm/admin_farm_list.php">Farms</a>
					</li>
<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {	
				// Get field Id
				$fieldId = $_GET["id"];
				// Get Bin Id
				$binQuery = "select * from `field` where field_id = '{$fieldId}'";
				$binResult = $db->query($binQuery)->fetch_assoc();
				$binId = $binResult['warehouse_id'];
				// Get warehouse Id
				$warehouseQuery = "select * FROM warehouse_bin WHERE bin_id = '{$binId}'";
				$warehouseResult = $db->query($warehouseQuery)->fetch_assoc();
				$warehouseId = $warehouseResult['warehouse_id'];
				// Get Farm Id
				$farmQuery = "select * FROM warehouse WHERE warehouse_id = '{$warehouseId}'";
				$farmResult = $db->query($farmQuery)->fetch_assoc();
				$farmId = $farmResult['farm_id'];
				
				echo "<li><a href='".ROOT."/admin/warehouse/admin_warehouse_list.php?id=" . $farmId . "'>Warehouses</a></li>";
				echo "<li><a href='".ROOT."/admin/warehouse_bin/admin_bin_list.php?id=" . $warehouseId . "'>Bins</a></li>";
				echo "<li><a href='".ROOT."/admin/field/admin_field_list.php?id=" . $binId . "'>Fields</a></li>";
?>				                 
					
                    <li class="active">Update field</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// Create query	
			if ($binResult->num_rows > 0) {
				$queryValues = $binResult->fetch_assoc();
				$fieldLocation = $queryValues['field_location'];
			}


			
			

				echo "<form class='form-horizontal' name='updateBinFieldForm' id='updateBinFieldForm' method='post' action=".ROOT."/admin/admin_update_database.php/?id=". $binId ."'>";
			?>		
					<!--field Location-->
					<div class="form-group">
						<label for="inputfieldName" class="control-label col-xs-2">Field Location</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="fieldLocation" id="fieldLocation" value="<?php echo $fieldLocation; ?>" required data-validation-required-message="Please enter the Location of the field." autofocus>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="updateField" value="update field"/>
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
<?php
/**
 * This page holds the form for adding a new warehouse.
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
 * @since       2015-01-15
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
                <h1 class="page-header">New Warehouse Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/farm/admin_farm_list.php">Farms</a>
                    </li>
                    <li class="active">Add Warehouse</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add farm form
			if ($loggedIn == true) {	
			// Get Farm Id
			$farmId = $_GET["id"];
				
				echo "<form class='form-horizontal' name='addwarehouseForm' id='addwarehouseForm' method='post' action='".ROOT."/add_to_database.php/?id=". $farmId ."'>";
			?>		
					<!--warehouse Name-->
					<div class="form-group">
						<label for="inputwarehouseName" class="control-label col-xs-2">Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="warehouseName" id="warehouseName" required data-validation-required-message="Please enter the name of the new warehouse.">
						</div>
					</div>
					
					<!--warehouse Civic Address-->
					<div class="form-group">
						<label for="inputwarehouseCivAddress" class="control-label col-xs-2">Civic Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="warehouseCivAddress" id="warehouseCivAddress" required data-validation-required-message="Please enter the civic address of the new warehouse.">
						</div>
					</div>
					
					<!--warehouse Province-->
					<div class="form-group">
						<label for="inputwarehouseProvince" class="control-label col-xs-2">Province</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="warehouseProvince" id="warehouseProvince" required data-validation-required-message="Please enter the Province of the new warehouse.">
						</div>
					</div>
					
					<!--warehouse Phone Number-->
					<div class="form-group">
						<label for="inputwarehousePhoneNum" class="control-label col-xs-2">Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="warehousePhoneNum" id="warehousePhoneNum" placeholder="902#######" required data-validation-required-message="Please enter the Phone number of the new warehouse.">
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
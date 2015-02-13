<?php
/**
 * This page holds the form for adding a new warehouse bin.
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
                <h1 class="page-header">New Warehouse Bin Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/farm/admin_farm_list.php">Farms</a>
					</li>
<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {	
				// Get warehouse Id
				$warehouseId = $_GET["id"];
				// Get Farm Id
				$farmQuery = "select * FROM warehouse WHERE warehouse_id = '{$warehouseId}'";
				$farmResult = $db->query($farmQuery)->fetch_assoc();
				$farmId = $farmResult['farm_id'];
				//warehouse breadcrumb
				echo "<li><a href='".ROOT."/admin/warehouse/admin_warehouse_list.php?id=" . $farmId . "'>Warehouses</a></li>";
				echo "<li><a href='".ROOT."/admin/warehouse_bin/admin_bin_list.php?id=" . $warehouseId . "'>Bins</a></li>";
?>				                 
					
                    <li class="active">Add Bin</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php




			
			

				echo "<form class='form-horizontal' name='addWarehouseBinForm' id='addWarehouseBinForm' method='post' action='".ROOT."/admin/add_to_database.php/?id=". $warehouseId ."'>";
			?>		
					<!--Bin Name-->
					<div class="form-group">
						<label for="inputbinName" class="control-label col-xs-2">Bin Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="binName" id="binName" required data-validation-required-message="Please enter the Name of the new bin." autofocus>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addFarm" value="Add Bin"/>
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
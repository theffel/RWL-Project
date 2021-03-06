<?php
/**
 * This page holds the form for displaying warehouse fields.
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

<?php
	// If the user is logged in, display the add farm form
	if ($loggedIn == true) {	
		// Get Bin Id
		$binId = $_GET["id"];
		// Get warehouse Id
		$warehouseQuery = "select * FROM warehouse_bin WHERE bin_id = '{$binId}'";
		$warehouseResult = $db->query($warehouseQuery)->fetch_assoc();
		$warehouseId = $warehouseResult['warehouse_id'];
		// Get Farm Id
		$farmQuery = "select * FROM warehouse WHERE warehouse_id = '{$warehouseId}'";
		$farmResult = $db->query($farmQuery)->fetch_assoc();
		$farmId = $farmResult['farm_id'];
?>
<html>
	<body>
		    <!-- Page Content -->
		<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List of Fields</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/farm/admin_farm_list.php">Farms</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/warehouse/admin_warehouse_list.php?id=<?php echo $farmId; ?>">Warehouses</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/warehouse_bin/admin_bin_list.php?id=<?php echo $warehouseId; ?>">Bins</a>
                    </li>
                    <li class="active">Field</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php

				// Create query
				$query = "select * FROM field WHERE bin_id = '{$binId}'";
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					echo "<table style='width:100%'>";
					echo "<tr><td>Field Name/id</td> <td>Field Location</td> <td></td> </tr>";
					while($row = $result->fetch_assoc()){
						echo "<tr><td>".$row['field_id']."</td>";
						echo "<td>" . $row['field_location'] . "</td>";
						echo "<td><form action = '".ROOT."/admin/field/admin_update_field.php' method = 'get'><input hidden type = radio name = id value = '" . $row['field_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Update'></form></td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				else {
					echo "0 results";
				}
				$db->close();
			}

			// If the user is not logged in, redirect them to login.php if they try to access this page
			else {
				echo '<script type="text/javascript">
							location.replace("'.ROOT.'/login/index.php");
							</script>';
			}

		echo "<hr><form action = '".ROOT."/admin/field/admin_add_field.php' method = 'get'> <input hidden type = radio name = id value = '" . $binId . "' checked><input type = submit class='btn btn-primary' value = 'Add field'></form><br />";
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
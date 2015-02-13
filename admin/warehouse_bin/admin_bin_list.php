<?php
/**
 * This page holds the form for displaying warehouse bins.
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
	// Get warehouse Id
	$warehouseId = $_GET["id"];
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
                <h1 class="page-header">List of Bins</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/farm/admin_farm_list.php">Farms</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/warehouse/admin_warehouse_list.php?id=<?php echo $farmId; ?>">Warehouses</a>
                    </li>
                    <li class="active">Bins</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php

				// Create query
				$query = "select * FROM warehouse_bin WHERE warehouse_id = '{$warehouseId}'";
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					echo "<table style='width:100%'>";
					echo "<tr><td>Bin Name/Number</td><td></td><td>Number of Fields</td><td></td></tr>";
					while($row = $result->fetch_assoc()){
						$fieldQuery = "select * from field where bin_id = '{$row['bin_id']}'";
						$fieldCount = $db->query($fieldQuery)->num_rows;
						echo "<tr><td>".$row['bin_name']."</td>";
						echo "<td><form action = '".ROOT."/admin/warehouse_bin/admin_update_bin.php' method = 'get'><input hidden type = radio name = id value = '" . $row['bin_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Edit'></form></td>";
						echo "<td>" . $fieldCount . "</td>";
						echo "<td><form action = '".ROOT."/admin/field/admin_field_list.php' method = 'get'><input hidden type = radio name = id value = '" . $row['bin_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Field List'></form></td>";
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

		echo "<hr><form action = '".ROOT."/admin/warehouse_bin/admin_add_bin.php' method = 'get'> <input hidden type = radio name = id value = '" . $warehouseId . "' checked><input type = submit class='btn btn-primary' value = 'Add Bin'></form><br />";
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
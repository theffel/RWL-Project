<?php
/**
 * This page holds the form for displaying warehouses.
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
                <h1 class="page-header">List of Warehouses</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/farm/admin_farm_list.php">Farms</a>
                    </li>
                    <li class="active">Warehouses</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {	
				// Get Farm Id
				$id = $_GET["id"];
				// Create query
				$query = "select * FROM warehouse WHERE farm_id = '{$id}'";
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					echo "<table style='width:100%'>";
					echo "<tr><td>Name</td> <td>Address</td> <td></td> <td>Number of Bins</td> <td></td> </tr>";
					while($row = $result->fetch_assoc()){
						$binQuery = "select * from warehouse_bin where warehouse_id = '{$row['warehouse_id']}'";
						$binCount = $db->query($binQuery)->num_rows;
						
						//fill table
						echo "<tr><td>".$row['warehouse_name']."</td>";
						echo "<td>".$row['warehouse_civic_address']."</td>";
						echo "<td><form action = '".ROOT."/admin/warehouse/admin_update_warehouse.php' method = 'get'> <input hidden type = radio name = id value = '" . $row['warehouse_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Edit Warehouse'></form></td>";
						echo "<td>".$binCount."</td>";
						echo "<td><form action = '".ROOT."/admin/warehouse_bin/admin_bin_list.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '" . $row['warehouse_id'] . "' checked><input type = 'submit' class='btn btn-primary' value = 'Bin List'></form></td></tr>";
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
		echo "<hr><form action = '".ROOT."/admin/warehouse/admin_add_warehouse.php' method = 'get'> <input hidden type = radio name = id value = '" . $id . "' checked><input type = submit class='btn btn-primary' value = 'Add Warehouse'></form><br />";
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
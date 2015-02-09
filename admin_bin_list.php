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
                <h1 class="page-header">List of Farms</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin_farm_list.php">Farms</a>
                    </li>
                    <li class="active">Bins</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add farm form
			if ($loggedIn == true) {	
				// Get Farm Id
				$id = $_GET["id"];
				// Create query
				$query = "select * FROM warehouse_bin WHERE warehouse_id = '{$id}'";
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
						$binQuery = "select * from warehouse_bin where warehouse_id = '{$row['warehouse_id']}'";
						$binCount = $db->query($binQuery)->num_rows;
						echo "<form action = 'admin_add_field.php' method = 'get'><input hidden type = radio name = id value = '" . $row['bin_id'] . "' checked><input type = submit class='btn btn-primary' value = '" . $row['bin_name'] . "'></form><br />";
					}
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

		echo "<hr><form action = '".ROOT."/admin_add_bin.php' method = 'get'> <input hidden type = radio name = id value = '" . $id . "' checked><input type = submit class='btn btn-primary' value = 'Add Bin'></form><br />";
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
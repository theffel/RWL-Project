<?php
/**
 * This page holds the form for displaying farms.
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
                <h1 class="page-header">List of Farms</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
                    <li class="active">Farms</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {			
						
				// Create query
				$query = "select * FROM FARM";
				$farms = $db->query($query);
				
				if ($farms->num_rows > 0) {
					//make table
					echo "<table style='width:100%' border='1'>";
					echo "<tr><td>Name</td> <td>Address</td> <td>Contact person(s)</td> <td>Phone # </td> <td></td> <td>Number of Warehouses</td> <td></td> </tr>";				
					while($row = $farms->fetch_assoc()){
						$warehouseQuery = "select * from warehouse where farm_id = '{$row['farm_id']}'";
						$warehouseCount = $db->query($warehouseQuery)->num_rows;
						$contactQuery = "select * from farm_contact where farm_id = '{$row['farm_id']}'";
						$contact = $db->query($contactQuery);
						
						//fill table
						echo "<tr><td>".$row['farm_name']."</td>";
						echo "<td>".$row['farm_civic_address']."</td>";
						//structure to deal with multiple contacts
						if ($contact->num_rows > 0) {
							echo "<td>";
							while($contactRow = $contact->fetch_assoc()){
								echo $contactRow['contact_first_name']." ".$contactRow['contact_last_name']."<br />";
							}
							echo "</td><td>";
							$contact = $db->query($contactQuery);
							while($contactRow = $contact->fetch_assoc()){
								echo $contactRow['contact_phone']."<br />";
							}
							echo "</td>";
						}
						else {
							echo "<td></td><td></td>";
						}
						echo "<td><form action = '".ROOT."/admin/farm/admin_update_farm.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '" . $row['farm_id'] . "' checked><input type = 'submit' class='btn btn-primary' value = 'Update Farm'></form></td>";
						echo "<td>".$warehouseCount."</td>";
						echo "<td><form action = '".ROOT."/admin/warehouse/admin_warehouse_list.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '" . $row['farm_id'] . "' checked><input type = 'submit' class='btn btn-primary' value = 'Warehouse List'></form></td></tr>";
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
 		echo "<hr><form action = '".ROOT."/admin/farm/admin_add_farm.php'><input type = submit class='btn btn-primary' value = 'Add Farm'></form><br />";
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
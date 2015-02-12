<?php
/**
 * This page holds the form for displaying dests.
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
 * @since       2015-02-01
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
                <h1 class="page-header">List of destinations</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
                    <li class="active">destinations</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {			
						
				// Create query
				$query = "select * FROM destination";
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					echo "<table style='width:100%' border='1'>";
					echo "<tr><td>Destination Name</td> <td>Address</td> <td>Province</td> <td>Phone Number</td> <td>Contact Name</td> <td></td></tr>";
					while($row = $result->fetch_assoc()){
						echo "<tr><td>". $row['dest_name'] . "</td>";
						echo "<td>" . $row['dest_address'] . "</td>";
						echo "<td>" . $row['dest_prov'] . "</td>";
						echo "<td>" . $row['dest_phone'] . "</td>";
						echo "<td>" . $row['dest_contact_name'] . "</td>";
						echo "<td><form action = 'admin_update_destination.php' method = 'get'><input hidden type = radio name = id value = '" . $row['dest_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Edit'></form></td>";
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
							location.replace("'.ROOT.'/login.php");
							</script>';
			}
  		echo "<hr><form action = '".ROOT."/admin_add_destination.php' method = 'get'><input type = submit class='btn btn-primary' value = 'Add Destination'></form><br />";
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
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
                <h1 class="page-header">List of Farm Contacts</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/farm/admin_farm_list.php">Farms</a>
                    </li>
                    <li class="active">Farm Contacts</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {
				// Get Farm Id
				$farmId = $_GET["id"];
						
				// Create query
				$query = "select * FROM farm_contact where farm_id = '{$farmId}'";
				$results = $db->query($query);
				
				if ($results->num_rows > 0) {
					//make table
					echo "<table style='width:100%' border='1'>";
					echo "<tr><td>Name</td> <td>Phone # </td> <td></td> </tr>";				
					while($row = $results->fetch_assoc()){
						
						echo "<tr><td>".$row['contact_first_name'] . " " . $row['contact_last_name']."</td>";
						echo "<td>".$row['contact_phone']."</td>";
						
						echo "<td><form action = '".ROOT."/admin/farm/admin_update_farm_contacts.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '" . $row['farm_contact_id'] . "' checked><input type = 'submit' class='btn btn-primary' value = 'update contact'></form></td></tr>";
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
 		echo "<hr><form action = '".ROOT."/admin/farm/admin_add_farm_contact.php' method = 'get'><input hidden type = 'radio' name = 'id' value = '" . $farmId . "' checked><input type = submit class='btn btn-primary' value = 'Add Contact'></form><br />";
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
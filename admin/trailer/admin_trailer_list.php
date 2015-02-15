<?php
/**
 * This page holds the form for displaying trailers.
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
 * @since       2015-02-04
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
                <h1 class="page-header">List of trailers</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
                    <li class="active">trailers</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {			
						
				// Create query
				$query = "select * FROM trailer";
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					echo "<table style='width:100%' border='1'>";
					echo "<tr><td>Trailer Number</td> <td>Plate Number</td> <td></td> <td>Registration Expiry Date</td> <td></td> <td>Inspection Expiry Date</td> <td></td> <td>InsuranceExpiry Date</td> <td></td></tr>";
					while($row = $result->fetch_assoc()){
						echo "<tr><td>". $row['trailer_num'] . "</td>";
						echo "<td>" . $row['plate_num'] . "</td>";
						echo "<td><form action = '".ROOT."/admin/trailer/admin_update_trailer.php' method = 'get'><input hidden type = radio name = id value = '" . $row['trailer_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Edit'></form></td>";
						//registration
						$registrationQuery = "select `reg_expiry_date` from `registration` where trailer_Id = '{$row['trailer_id']}'";
						$registrationResult = $db->query($registrationQuery)->fetch_assoc();
						echo "<td>". $registrationResult['reg_expiry_date']."</td>";
						echo "<td><form action = '".ROOT."/admin/trailer/admin_update_trailer_reg.php' method = 'get'><input hidden type = radio name = id value = '" . $row['trailer_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Edit'></form></td>";
						//inspection
						$inspectionQuery = "select `inspect_expiry_date` from `inspection` where trailer_Id = '{$row['trailer_id']}'";
						$inspectionResult = $db->query($inspectionQuery)->fetch_assoc();
						echo "<td>". $inspectionResult['inspect_expiry_date']."</td>";
						echo "<td><form action = '".ROOT."/admin/trailer/admin_update_trailer_inspect.php' method = 'get'><input hidden type = radio name = id value = '" . $row['trailer_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Edit'></form></td>";
						//insurance
						$insuranceQuery = "select `ins_expiry_date` from `insurance` where trailer_Id = '{$row['trailer_id']}'";
						$insuranceResult = $db->query($insuranceQuery)->fetch_assoc();
						echo "<td>". $insuranceResult['ins_expiry_date']."</td>";
						echo "<td><form action = '".ROOT."/admin/trailer/admin_update_trailer_insurance.php' method = 'get'><input hidden type = radio name = id value = '" . $row['trailer_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Edit'></form></td>";
						
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
 		echo "<hr><form action = '".ROOT."/admin/trailer/admin_add_trailer.php' method = 'get'><input type = submit class='btn btn-primary' value = 'Add Trailer'></form><br />";

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
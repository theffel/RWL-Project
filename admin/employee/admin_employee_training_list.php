<?php
/**
 * This page holds the form for displaying employees.
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
                <h1 class="page-header">List of Training Certificates registered to employee</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/employee/admin_emp_list.php">employees</a>
                    </li>
                    <li class="active">Training</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {	
				// Get employee Id
				$empId = $_GET["id"];
						
				// Create query
				$query = "select * FROM employee_training_certificate where emp_id = '{$empId}'";
				$results = $db->query($query);
				
				if ($results->num_rows > 0) {
					
					echo "<table style='width:100%' border='1'>";
					echo "<tr><td>Starting Date</td> <td>End Date</td> <td>Completion Status</td> <td>Training Type</td> <td></td> </tr>";

					while($row = $results->fetch_assoc()){
						echo "<tr><td>" . $row['start_date'] . "</td>";
						echo "<td>" . $row['end_date'] . "</td>";
						if ($row['completed'] = 1){
							echo "<td> completed </td>";
						}
						else{
							echo "<td> incomplete </td>";
						}
						
//*******CHANGE IN CASE OF TRAINING TYPE RESTRUCTURE********	
						//hard-coded type by id
						switch ($row['training_type_id']) {
						case 1:
							echo "<td> Truck Driver </td>";
							break;
						case 2:
							echo "<td> Dispatcher </td>";
							break;
						case 3:
							echo "<td> Production </td>";
							break;
						case 4:
							echo "<td> Sampler </td>";
							break;
						case 5:
							echo "<td> Line Worker </td>";
							break;
						case 6:
							echo "<td> Waterboy </td>";
							break;
						case 7:
							echo "<td> Maintenance </td>";
							break;
						case 8:
							echo "<td> Accounting </td>";
							break;
						case 9:
							echo "<td> Admin </td>";
							break;
						case 10:
							echo "<td> Fleet Management </td>";
							break;
						}
//*******CHANGE IN CASE OF TRAINING TYPE RESTRUCTURE********	
						
						echo "<td><form action = '".ROOT."/admin/employee/admin_update_employee_training_certificate.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '" . $row['certificate_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Modify'></form></td></tr>";
												
					}
					echo "</table>";
				}
				else {
					echo "0 results";
				}
				echo "<form action = '".ROOT."/admin/employee/admin_add_employee_training_certificate.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '" . $empId . "' checked><input type = submit class='btn btn-primary' value = 'Add New Certificate'></form>";
				$db->close();
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
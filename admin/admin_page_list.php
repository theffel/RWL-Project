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
                <h1 class="page-header">List of Admin Pages</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
                    <li class="active">Admin List</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {			

				echo "<form action = '".ROOT."/admin/destination/admin_destination_list.php'>
						<input type = 'submit' class='btn btn-primary' value = 'Destination List'></form><br />";
				echo "<form action = '".ROOT."/admin/employee/admin_emp_list.php'>
						<input type = 'submit' class='btn btn-primary' value = 'Employee List'></form><br />";
				echo "<form action = '".ROOT."/admin/farm/admin_farm_list.php'>
						<input type = 'submit' class='btn btn-primary' value = 'Farm List'></form><br />";
				echo "<form action = '".ROOT."/admin/processor/admin_processor_list.php'>
						<input type = 'submit' class='btn btn-primary' value = 'Processor List'></form><br />";
				echo "<form action = '".ROOT."/admin/trailer/admin_trailer_list.php'>
						<input type = 'submit' class='btn btn-primary' value = 'Trailer List'></form><br />";
				echo "<form action = '".ROOT."/admin/truck/admin_truck_list.php'>
						<input type = 'submit' class='btn btn-primary' value = 'Truck List'></form><br />";
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
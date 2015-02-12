<?php
/**
 * This page allows the user to enter their username and password to login to the system.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @author      Trevor Heffel
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.0
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-21
 */

// Include the header.php file
include('../header.php');
?>

<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Report</h1>
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>                        
                <li class="active">Report</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
        <?php
        $empId = (!empty($_SESSION['empId'])) ? $_SESSION['empId'] : "";
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";

        // If the user is not logged in, display a login form
        //if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 9) {
		//if ($loggedIn == true) {
			?>
			<h2 class="page-header">Select a Report</h2>
			<form class="form-horizontal" name="pickForm" id="pickForm" method="post" action="report_view.php">
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<input type="submit" class="btn btn-primary" name="Attendance" value="Attendance"/>
                        <input type="submit" class="btn btn-primary" name="Work Result" value="Work Result"/>
					</div>
				</div>
			</form>
		<?php
		//} else {
		//	echo "<h2>You do not have permission to view this page.</h2>";
		//}
		// Include the footer.php file
		include('../footer.php');
		?>
	</div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
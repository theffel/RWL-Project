<?php
/**
 * This page allows the user to select report type.
 *
 * PHP version 5
 *
 *
 * @category    Report
 * @package     index.php
 * @author      KangHyeok Lee
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.0
 * @link        http://theffel.hccis.info/report/index.php
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

			?>
			<h2 class="page-header">Select a Report</h2>
			<form class="form-horizontal" name="pickForm" id="pickForm" method="post" action="report_view.php">
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<input type="submit" class="btn btn-primary" name="Attendance" value="Attendance"/> <!-- Button for Attendance report-->
                        <input type="submit" class="btn btn-primary" name="Work Result" value="Work Result"/> <!-- Button for Work Result report-->
					</div>
				</div>
			</form>
		<?php
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
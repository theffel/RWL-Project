<?php
/**
 * Description for file goes here.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-15
 */

// Start the session
session_start();

// Include the database.php file
include('../database.php');

// Include the header.php file
include('../header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Oil and Fluids</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Oil and Fluids</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1 || $employeeType == 7) {
        ?>
        <h2 class="page-header">Add Oil and Fluids</h2>

        <form class="form-horizontal">

            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck #</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="truck">
                </div>
            </div>

            <div class="form-group">
                <label for="driver" class="control-label col-md-2">Driver</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="driver">
                </div>
            </div>

            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="date" placeholder="MM-DD-YYYY">
                        </div>
                        <label for="time" class="control-label col-md-2">Time</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="engineOilLiters" class="control-label col-md-2">Engine Oil Liters</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="engineOilLiters">
                </div>
            </div>

            <div class="form-group">
                <label for="hydraulicOilLiters" class="control-label col-md-2">Hydraulic Oil Liters</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="hydraulicOilLiters">
                </div>
            </div>

            <div class="form-group">
                <label for="transFluidLiters" class="control-label col-md-2">Transmission Fluid Liters</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="transFluidLiters">
                </div>
            </div>

            <div class="form-group">
                <label for="other" class="control-label col-md-2">Other</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="other">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Oil and Fluids</h2>
        <p>There are currently no oil and fluids to view.</p>

        <?php
        }
        else {
            echo "<h2>You do not have permission to view this page.</h2>";
        }

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
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
                <h1 class="page-header">Daily Mileage</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Daily Mileage</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $trucks = (!empty($_SESSION['trucks'])) ? $_SESSION['trucks'] : "";

        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1) {
        ?>
        <h2 class="page-header">Add a Daily Mileage</h2>
        <form class="form-horizontal">
            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck #</label>
                <div class="col-md-10">
                    <select class="form-control" name="truck">
                        <?php
                        for ($x = 0; $x < count($trucks); $x++){
                        echo '<option value="' . $trucks[$x][0] .'">' . $trucks[$x][1] .'</option>';
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="startDate" class="control-label col-md-2">Start Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="startDate" placeholder="MM-DD-YYYY">
                </div>
            </div>
            <div class="form-group">
                <label for="startKmTruck" class="control-label col-md-2">Start KM on Truck</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="startKmTruck">
                </div>
            </div>
            <div class="form-group">
                <label for="peiKm" class="control-label col-md-2">PEI KM</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="peiKm">
                </div>
            </div>
            <div class="form-group">
                <label for="nbKM" class="control-label col-md-2">NB KM</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="nbKM">
                </div>
            </div>
            <div class="form-group">
                <label for="nsKm" class="control-label col-md-2">NS KM</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="nsKm">
                </div>
            </div>
            <div class="form-group">
                <label for="litresFuelTank" class="control-label col-md-2">Litres of Fuel in the Tank</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="litresFuelTank">
                </div>
            </div>
            <div class="form-group">
                <label for="finishKm" class="control-label col-md-2">Finish KM</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="finishKm">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <hr>
        <h2 class="page-header">View Daily Mileages</h2>
        <p>There are currently no daily mileages to view.</p>
        <?php
        } else {
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
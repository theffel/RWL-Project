<?php
/**
 * This page allows the user to add a daily mileage.
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

// Include php files
include('../database.php');
include('../header.php');
include('daily_mileage_script.php');
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
        $dailyMileage = (!empty($_SESSION['dailyMileage'])) ? $_SESSION['dailyMileage'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1) {
        ?>
        <h2 class="page-header">Add a Daily Mileage</h2>
        <form class="form-horizontal" name="mileageForm" id="mileageForm" method="post" action="index.php">
            <div class="form-group">
                <label for="startDate" class="control-label col-md-2">Start Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $dateTime; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck</label>
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
            <!-- #messages is where the messages are placed inside -->
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <div id="messages"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submitBtn" value="Submit"/>
                </div>
            </div>
        <hr>
        </form>
        <form class="form-horizontal" name="mileageForm" id="mileageForm" method="post" action="index.php">
        <h2 class="page-header">Edit Daily Mileage</h2>
        <?php
            if (!empty($dailyMileage)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Truck</th>
                                <th>Start KM on Truck</th>
                                <th>Litres of Fuel in the Tank</th>
                                <th>Finish KM</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($dailyMileage); $x++) {
                    echo '<tr>
                        <td>'. $dailyMileage[$x][2].'</td>
                        <td>'. $dailyMileage[$x][1].'</td>
                        <td>'. $dailyMileage[$x][3].'</td>
                        <td>'. $dailyMileage[$x][7].'</td>
                        <td>'. $dailyMileage[$x][8].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $dailyMileage[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table></form>';
            } else{
                echo "<p>There are currently no daily mileages to view.</p>";
            }
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
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script>
    <script type="text/javascript" src="daily_mileage_validation.js"></script>
</body>
</html>
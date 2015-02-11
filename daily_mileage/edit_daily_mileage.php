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
 * @since       2015-02-02
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
                    <li><a href="index.php">Daily Mileage</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $trucks = (!empty($_SESSION['trucks'])) ? $_SESSION['trucks'] : "";
        $editDailyMileage = (!empty($_SESSION['editDailyMileage'])) ? $_SESSION['editDailyMileage'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1) {
        ?>
        <h2 class="page-header">Edit Daily Mileage</h2>
        <form class="form-horizontal" name="mileageForm" id="mileageForm" method="post" action="edit_daily_mileage.php">
            <div class="form-group">
                <label for="startDate" class="control-label col-md-2">Start Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $_SESSION['editDailyMileage'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck</label>
                <div class="col-md-10">
                    <select class="form-control" name="truck">
                        <?php
                        for ($x = 0; $x < count($trucks); $x++){
                            if ($trucks[$x][0] == $_SESSION['editDailyMileage'][0][1]) {
                                echo '<option selected value="' . $trucks[$x][0] . '">' . $trucks[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $trucks[$x][0] . '">' . $trucks[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="startKmTruck" class="control-label col-md-2">Start KM on Truck</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="startKmTruck" value="<?php echo $_SESSION['editDailyMileage'][0][2]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="peiKm" class="control-label col-md-2">PEI KM</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="peiKm" value="<?php echo $_SESSION['editDailyMileage'][0][3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="nbKM" class="control-label col-md-2">NB KM</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="nbKM" value="<?php echo $_SESSION['editDailyMileage'][0][4]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="nsKm" class="control-label col-md-2">NS KM</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="nsKm" value="<?php echo $_SESSION['editDailyMileage'][0][5]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="litresFuelTank" class="control-label col-md-2">Litres of Fuel in the Tank</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="litresFuelTank" value="<?php echo $_SESSION['editDailyMileage'][0][6]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="finishKm" class="control-label col-md-2">Finish KM</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="finishKm" value="<?php echo $_SESSION['editDailyMileage'][0][7]; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="update" value="Update"/>
                </div>
            </div>
        </form>
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
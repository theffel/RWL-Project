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
 * @author      Trevor Heffel
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-23
 */

// Start the session
session_start();

// Include the database.php file
include('../database.php');
include('fuel_script.php');

// Include the header.php file
include('../header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Fuel</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="index.php">Fuel</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $trucks = (!empty($_SESSION['trucks'])) ? $_SESSION['trucks'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1) {
        ?>
        <h2 class="page-header">Edit Receipt</h2>
        <form class="form-horizontal" name="fuelForm" id="fuelForm" method="post" action="edit_fuel.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name= "date" value= "<?php echo $_SESSION['editReceipt'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck</label>
                <div class="col-md-10">
                    <select class="form-control" name="truck">
                        <?php
                        for ($x = 0; $x < count($trucks); $x++){
                            if ($trucks[$x][0] == $_SESSION['editReceipt'][0][1]) {
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
                <label for="mileage" class="control-label col-md-2">Mileage</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="mileage" value= "<?php echo $_SESSION['editReceipt'][0][2]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="litres" class="control-label col-md-2">Litres</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="litres" value= "<?php echo $_SESSION['editReceipt'][0][3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="cost" class="control-label col-md-2">Cost</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="cost" value= "<?php echo $_SESSION['editReceipt'][0][4]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="location" class="control-label col-md-2">Location</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="location" value= "<?php echo $_SESSION['editReceipt'][0][5]; ?>">
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
    <script src="../js/device_javascripts/camera_control.js"></script>
</body>
</html>
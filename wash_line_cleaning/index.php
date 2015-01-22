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
 * @since       2015-01-13
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
                <h1 class="page-header">Wash Line Cleaning</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Wash Line Cleaning</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3 || $employeeType == 2 || $employeeType == 5 || $employeeType == 1) {
        ?>
        <h2 class="page-header">Add Wash Line Cleaning</h2>
        <form class="form-horizontal" name="washForm" id="washForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="date" placeholder="YYYY-MM-DD">
                        </div>
                        <label for="time" class="control-label col-md-2">Time</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="time">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="equipClean" class="control-label col-md-2">Equipment Cleaned</label>
                <div class="col-md-10">
                    <select class="form-control" id="equipClean">
                        <option value="truck1">Truck #</option>
                        <option value="trailer1">Trailer #</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="descClean" class="control-label col-md-2">Description of Cleaning</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="descClean">
                </div>
            </div>
            <div class="form-group">
                <label for="nameClean" class="control-label col-md-2">Name of Cleaner(s)</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="nameClean">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>
        </form>
        <hr>
        <h2 class="page-header">View Wash Line Cleanings</h2>
        <p>There are currently no wash line cleanings to view.</p>
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
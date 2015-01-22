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
                <h1 class="page-header">Rejection</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Rejection</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3 || $employeeType == 2) {
        ?>

        <h2 class="page-header">Add a Rejected Load</h2>

        <form class="form-horizontal" name="rejectForm" id="rejectForm" method="post" action="index.php">

            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="date" placeholder="MM-DD-YYYY">
                        </div>
                        <label for="time" class="control-label col-md-2">Time</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="time">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Drop down populated by the database -->
            <div class="form-group">
                <label for="producer" class="control-label col-md-2">Producer</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="producer">
                </div>
            </div>

            <div class="form-group">
                <label for="loadIDInfo" class="control-label col-md-2">Load ID Info</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="loadIDInfo">
                </div>
            </div>

            <div class="form-group">
                <label for="rewashedRegraded" class="control-label col-md-2">Was Product Re-Washed, Re-Graded</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="rewashedRegraded" value="Yes"> Yes</li>
                        <li><input type="radio" name="rewashedRegraded" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="prodReturned" class="control-label col-md-2">Product Returned</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="checkbox" name="prodReturned" value="Processor"> Processor</input></li>
                        <li><input type="checkbox" name="prodReturned" value="Producer"> Producer</input></li>
                </div>
            </div>

            <div class="form-group">
                <label for="returnDate" class="control-label col-md-2">Date of Return</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="returnDate" placeholder="MM-DD-YYYY">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Rejected Loads</h2>
        <p>There are currently no rejected loads to view.</p>

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
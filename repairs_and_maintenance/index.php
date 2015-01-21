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
                <h1 class="page-header">Repairs and Maintenance</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Repairs and Maintenance</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $employeeType == 7) {
        ?>

        <h2 class="page-header">Add a Repair or Maintenance</h2>

        <form class="form-horizontal" name="repairForm" id="repairForm" method="post" action="index.php">

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

            <div class="form-group">
                <label for="equipWorked" class="control-label col-md-2">Equipment Worked On</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="equipWorked">
                </div>
            </div>

            <div class="form-group">
                <label for="workDesc" class="control-label col-md-2">Description of Work Done</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="workDesc" rows="5"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="technicianName" class="control-label col-md-2">Name of Technician</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="technicianName">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Repairs and Maintenance</h2>
        <p>There are currently no repairs or maintenance to view.</p>

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
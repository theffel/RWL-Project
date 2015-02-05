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
                <h1 class="page-header">Waste Disposal</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Waste Disposal</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3) {
        ?>
        <h2 class="page-header">Add a Waste Disposal</h2>
        <form class="form-horizontal" name="wasteForm" id="wasteForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $currentDate; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="desc" class="control-label col-md-2">Description of Product</label>
                <div class="col-md-10">
                    <select class="form-control" id="desc">
                        <option value="potato">Potato</option>
                        <option value="rock">Rock</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="sent" class="control-label col-md-2">Where Product Was Sent</label>
                <div class="col-md-10">
                    <select class="form-control" id="sent">
                        <option value="location1">Location 1</option>
                        <option value="location2">Location 2</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="disposed" class="control-label col-md-2">How Product Was Disposed Of</label>
                <div class="col-md-10">
                    <select class="form-control" id="disposed">
                        <option value="deepBurial">Deep Burial</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="transported" class="control-label col-md-2">How Product Was Transported</label>
                <div class="col-md-10">
                    <select class="form-control" id="transported">
                        <option value="trailer">Trailer</option>
                        <option value="dumptruck">Dumptruck</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>
        </form>
        <hr>
        <h2 class="page-header">View Waste Disposals</h2>
        <p>There are currently no waste disposals to view.</p>
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
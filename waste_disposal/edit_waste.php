<?php
/**
 * This page allows the user to edit a waste disposal.
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
 * @since       2015-02-09
 */

// Start the session
session_start();

// Include the php files
include('../database.php');
include('../header.php');
include('waste_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Waste Disposal</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="index.php">Waste Disposal</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $editWastes = (!empty($_SESSION['editWastes'])) ? $_SESSION['editWastes'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3) {
        ?>
        <h2 class="page-header">Edit Waste Disposal</h2>
        <form class="form-horizontal" name="wasteForm" id="wasteForm" method="post" action="edit_waste.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $_SESSION['editWastes'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="desc" class="control-label col-md-2">Description of Product</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="desc" value="<?php echo $_SESSION['editWastes'][0][1]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="sent" class="control-label col-md-2">Where Product Was Sent</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="sent" value="<?php echo $_SESSION['editWastes'][0][2]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="disposed" class="control-label col-md-2">How Product Was Disposed Of</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="disposed" value="<?php echo $_SESSION['editWastes'][0][3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="transported" class="control-label col-md-2">How Product Was Transported</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="transported" value="<?php echo $_SESSION['editWastes'][0][4]; ?>">
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
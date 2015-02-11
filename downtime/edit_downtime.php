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
 * @since       2015-02-10
 */

// Start the session
session_start();

// Include php files
include('../database.php');
include('downtime_script.php');
include('../header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Downtime</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="index.php">Downtime</a></li>
                    <li class="active">Edit</li>
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
        <h2 class="page-header">Edit Downtime</h2>
        <form class="form-horizontal" name="downForm" id="downForm" method="post" action="edit_downtime.php">
            <div class="form-group">
                <label for="startDowntime" class="control-label col-md-2">Start Time</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="startDowntime" name="startDowntime" value="<?php echo $_SESSION['editDowntime'][0][0]; ?>">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary" value="startDowntime" name="startDowntimeBtn" onclick="getTime(this.value)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Start Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="endDowntime" class="control-label col-md-2">End Time</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="endDowntime" name="endDowntime" value="<?php echo $_SESSION['editDowntime'][0][1]; ?>">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary" value="endDowntime" name="endDowntimeBtn" onclick="getTime(this.value)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;End Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="reason" class="control-label col-md-2">Reason</label>
                <div class="col-md-10">
                    <select class="form-control" name="reason" id="reason">
                        <?php
                        if ($_SESSION['editDowntime'][0][2] == 0) {
                            echo '<option selected value="0">Incoming Truck</option>';
                            echo '<option value="1">Outgoing Truck</option>';
                            echo '<option value="2">RWL Breakdown</option>';
                        } else if ($_SESSION['editDowntime'][0][2] == 1) {
                            echo '<option value="0">Incoming Truck</option>';
                            echo '<option selected value="1">Outgoing Truck</option>';
                            echo '<option value="2">RWL Breakdown</option>';
                        } else {
                            echo '<option value="0">Incoming Truck</option>';
                            echo '<option value="1">Outgoing Truck</option>';
                            echo '<option selected value="2">RWL Breakdown</option>';
                        }
                        ?>
                    </select>
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
    <!-- Custom JavaScript -->
    <script src="../js/custom_js.js"></script>
</body>
</html>
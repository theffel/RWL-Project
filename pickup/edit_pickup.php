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

// Include php files
include('../database.php');
include('pickup_script.php');
include('../header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pick Up</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Pick Up</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";

        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1) {
        ?>
        <h2 class="page-header">Edit an Incoming Delivery</h2>
        <form class="form-horizontal" name="pickForm" id="pickForm" method="post" action="edit_pickup.php">
            <h3 class="page-header">Farm</h3>
            <div class="form-group">
                <label for="farmArrivalTime" class="control-label col-md-2">Arrival Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="farmArrivalTime" name="farmArrivalTime" value= "<?php echo $_SESSION['editIncomingDeliveries'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="loadTime" class="control-label col-md-2">Load Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="loadTime" name="loadTime" value= "<?php echo $_SESSION['editIncomingDeliveries'][0][1]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="farmDepartureTime" class="control-label col-md-2">Departure Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="farmDepartureTime" name="farmDepartureTime" value= "<?php echo $_SESSION['editIncomingDeliveries'][0][2]; ?>">
                </div>
            </div>
            <h3 class="page-header">Potato Solutions</h3>
            <div class="form-group">
                <label for="rwlArrivalTime" class="control-label col-md-2">Arrival Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="rwlArrivalTime" name="rwlArrivalTime" value= "<?php echo $_SESSION['editIncomingDeliveries'][0][3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="rwlunloadTime" class="control-label col-md-2">Unload Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="rwlUnloadTime" name="rwlUnloadTime" value= "<?php echo $_SESSION['editIncomingDeliveries'][0][4]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="rwlDepartureTime" class="control-label col-md-2">Departure Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="rwlDepartureTime" name="rwlDepartureTime" value= "<?php echo $_SESSION['editIncomingDeliveries'][0][5]; ?>">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="ticketNumber" class="control-label col-md-2">Ticket Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="ticketNumber" value= "<?php echo $_SESSION['editIncomingDeliveries'][0][6]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="grossWeight" class="control-label col-md-2">Gross Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="grossWeight" value= "<?php echo $_SESSION['editIncomingDeliveries'][0][7]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="tareWeight" class="control-label col-md-2">Tare Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tareWeight" value= "<?php echo $_SESSION['editIncomingDeliveries'][0][8]; ?>">
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
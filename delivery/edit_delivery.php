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
 * @author      Stirling Giddings
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     x.xx
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-13
 */

// Start the session
session_start();

// Include php files
include('../database.php');
include('../header.php');
include('delivery_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Delivery</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Delivery</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $editDelivery = (!empty($_SESSION['editDelivery'])) ? $_SESSION['editDelivery'] : "";

        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1) {
        ?>
        <h2 class="page-header">Edit a Delivery</h2>
        <form class="form-horizontal" name="deliveryForm" id="deliveryForm" method="post" action="edit_delivery.php">
            
            <div class="form-group">
                <label for="procArrivalTime" class="control-label col-md-2">Arrival Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="procArrivalTime" value="<?php echo $_SESSION['editDelivery'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="procUnloadBegin" class="control-label col-md-2">Unload Time Begin</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="procUnloadBegin" value="<?php echo $_SESSION['editDelivery'][0][1]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="procUnloadEnd" class="control-label col-md-2">Unload Time End</label>
                <div class="col-md-10">
                <input type="text" class="form-control" name="procUnloadEnd" value="<?php echo $_SESSION['editDelivery'][0][2]; ?>">
                </div>             
            </div>
            <div class="form-group">
                <label for="procDepartureTime" class="control-label col-md-2">Departure Time</label>
                <div class="col-md-10">
                <input type="text" class="form-control" name="procDepartureTime" value="<?php echo $_SESSION['editDelivery'][0][3]; ?>">
                </div>             
            </div>
            <div class="form-group">
                <label for="procTicNum" class="control-label col-md-2">Processor Ticket Number</label>
                <div class="col-md-10">
                <input type="text" class="form-control" name="procTicNum" value="<?php echo $_SESSION['editDelivery'][0][4]; ?>">
                </div>             
            </div>
            <div class="form-group">
                <label for="grossWeight" class="control-label col-md-2">Gross Weight</label>
                <div class="col-md-10">
                <input type="text" class="form-control" name="grossWeight" value="<?php echo $_SESSION['editDelivery'][0][5]; ?>">
                </div>             
            </div>
            <div class="form-group">
                <label for="tareWeight" class="control-label col-md-2">Tare Weight</label>
                <div class="col-md-10">
                <input type="text" class="form-control" name="tareWeight" value="<?php echo $_SESSION['editDelivery'][0][6]; ?>">
                </div>             
            </div>
            <div class="form-group">
                <label for="rejected" class="control-label col-md-2">Rejected</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
                            if ($_SESSION['editShipping'][0][7] == 0) {
                            echo '<li><input type="radio" name="rejected" value="0" checked> Yes</li>';
                            echo '<li><input type="radio" name="rejected" value="1"> No</li>';
                            } else {
                            echo '<li><input type="radio" name="rejected" value="0"> Yes</li>';
                            echo '<li><input type="radio" name="rejected" value="1" checked> No</li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            
<!--            <div class="form-group">
                <label for="truckCleaned" class="control-label col-md-2">Truck Cleaned Upon Return</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="truckCleaned" value="Yes"> Yes</li>
                        <li><input type="radio" name="truckCleaned" value="No"> No</li>
                    </ul>
                </div>
            </div> -->
            <!-- #messages is where the messages are placed inside -->            
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <div id="messages"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="updateBtn" value="Update"/>
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
    <!-- Validation JavaScript -->
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script>
    <script type="text/javascript" src="delivery_validation.js"></script>
</body>
</html>

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
 * @version     x.xx
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-13
 */

// Start the session
session_start();

// Include php files
include('../database.php');
include('../header.php');
include('shipping_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Shipping</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Shipping</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $editShipping = (!empty($_SESSION['editShipping'])) ? $_SESSION['editShipping'] : "";

        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 2) {
        ?>
        <h2 class="page-header">Edit a Shipment</h2>
        <form class="form-horizontal" name="shipForm" id="shipForm" method="post" action="edit_shipping.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Load Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $_SESSION['editShipping'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="potato" class="control-label col-md-2">Potato</label>
                <div class="col-md-10">
                	<input type="text" class="form-control" name="potato" value="<?php echo $_SESSION['editShipping'][0][1]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="potProd" class="control-label col-md-2">Potato Producer</label>
                <div class="col-md-10">
                	<input type="text" class="form-control" name="farm" value="<?php echo $_SESSION['editShipping'][0][2]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="trailer" class="control-label col-md-2">Trailer</label>
                <div class="col-md-10">
                <input type="text" class="form-control" name="trailer" value="<?php echo $_SESSION['editShipping'][0][3]; ?>">
                </div>             
            </div>            
            <div class="form-group">
                <label for="loadIDInfo" class="control-label col-md-2">RWL Ticket Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="loadIDInfo" value="<?php echo $_SESSION['editShipping'][0][4]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="weight" class="control-label col-md-2">Weight Shipped</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="weight" value="<?php echo $_SESSION['editShipping'][0][5]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="washed" class="control-label col-md-2">Washed</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
							if ($_SESSION['editShipping'][0][6] == 0) {
							echo '<li><input type="radio" name="washed" value="0" checked> Yes</li>';
							echo '<li><input type="radio" name="washed" value="1"> No</li>';
							} else {
							echo '<li><input type="radio" name="washed" value="0"> Yes</li>';
							echo '<li><input type="radio" name="washed" value="1" checked> No</li>';
							}
						?>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="destination" class="control-label col-md-2">Destination</label>
                <div class="col-md-10">
                	<input type="text" class="form-control" name="destination" value="<?php echo $_SESSION['editShipping'][0][7]; ?>">
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

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
               <label for="rwlLoadBegin" class="control-label col-md-2">Load Time Begin</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="rwlLoadBegin" name="rwlLoadBegin" value="<?php echo $_SESSION['editShipping'][0][0]; ?>">
                    </div>  
            </div> 
            <div class="form-group">
                <label for="rwlLoadEnd" class="control-label col-md-2">Load Time End</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="rwlLoadEnd" name="rwlLoadEnd" value="<?php echo $_SESSION['editShipping'][0][1]; ?>">
                    </div>
            </div> 
            <div class="form-group">
                <label for="rwlDepartureTime" class="control-label col-md-2">Departure Time</label>
                     <div class="col-md-10">
                        <input type="text" class="form-control" id="rwlDepartureTime" name="rwlDepartureTime" value="<?php echo $_SESSION['editShipping'][0][2]; ?>">
                    </div>
            </div> 
            <div class="form-group">
                <label for="potato" class="control-label col-md-2">Potato</label>
                <div class="col-md-10">
                    <select class="form-control" name="potato">
                        <?php
                        for ($x = 0; $x < count($potatoes); $x++){
                            if ($potatoes[$x][1] == $_SESSION['editshipping'][0][3]) {
                                echo '<option selected value="' . $potatoes[$x][0] . '">' . $potatoes[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $potatoes[$x][0] . '">' . $potatoes[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="potProd" class="control-label col-md-2">Potato Producer</label>
                <div class="col-md-10">
                    <select class="form-control" name="farm">
                        <?php
                        for ($x = 0; $x < count($farms); $x++){
                            if ($farms[$x][1] == $_SESSION['editshipping'][0][4]) {
                                echo '<option selected value="' . $farms[$x][0] . '">' . $farms[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $farms[$x][0] . '">' . $farms[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck #</label>
                <div class="col-md-10">
                   <select class="form-control" name="truck">
                        <?php
                        for ($x = 0; $x < count($trucks); $x++){
                            if ($trucks[$x][1] == $_SESSION['editshipping'][0][5]) {
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
                <label for="trailer" class="control-label col-md-2">Trailer #</label>
                <div class="col-md-10">
                   <select class="form-control" name="trailer">
                        <?php
                        for ($x = 0; $x < count($trailers); $x++){
                            if ($trailers[$x][1] == $_SESSION['editshipping'][0][6]) {
                                echo '<option selected value="' . $trailers[$x][0] . '">' . $trailers[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $trailers[$x][0] . '">' . $trailers[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>                    
                </div>             
            </div> 
                       
            <div class="form-group">
                <label for="rwlTicNum" class="control-label col-md-2">RWL Ticket Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="rwlTicNum" value="<?php echo $_SESSION['editShipping'][0][7]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="weight" class="control-label col-md-2">Weight Shipped</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="weight" value="<?php echo $_SESSION['editShipping'][0][8]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="washed" class="control-label col-md-2">Washed</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
                            if ($_SESSION['editShipping'][0][9] == 0) {
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
                    <select class="form-control" name="destination">
                        <?php
                        for ($x = 0; $x < count($destinations); $x++){
                            if ($destinations[$x][1] == $_SESSION['editshipping'][0][10]) {
                                echo '<option selected value="' . $destinations[$x][0] . '">' . $destinations[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $destinations[$x][0] . '">' . $destinations[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div> 
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
    <script type="text/javascript" src="shipping_validation.js"></script>
</body>
</html>

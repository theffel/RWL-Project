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

// Include the php files
include('../database.php');
include('../header.php');
include('product_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Reception</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="index.php">Product Reception</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $potatoes = (!empty($_SESSION['potatoes'])) ? $_SESSION['potatoes'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1 || $employeeType == 3) {

        ?>
        <h2 class="page-header">Edit Product</h2>
        <form class="form-horizontal" name="receptionForm" id="receptionForm" method="post" action="edit_product.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $_SESSION['editProductionReception'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="farm" class="control-label col-md-2">Farm</label>
                <div class="col-md-10">
                    <select class="form-control" name="farm">
                        <?php
                        for ($x = 0; $x < count($trucks); $x++){
                            if ($farms[$x][1] == $_SESSION['editProductionReception'][0][1]) {
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
                <label for="potato" class="control-label col-md-2">Potato</label>
                <div class="col-md-10">
                    <select class="form-control" name="potato">
                        <?php
                        for ($x = 0; $x < count($potatos); $x++){
                            if ($potatos[$x][1] == $_SESSION['editProductionReception'][0][2]) {
                                echo '<option selected value="' . $potatos[$x][0] . '">' . $potatos[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $potatos[$x][0] . '">' . $potatos[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="loadIDInfo" class="control-label col-md-2">Load ID Info</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="loadIDInfo" value="<?php echo $_SESSION['editProductionReception'][0][3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="quanRecieved" class="control-label col-md-2">Quantity Recieved</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="quanRecieved" value="<?php echo $_SESSION['editProductionReception'][0][4]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bulkOther" class="control-label col-md-2">Bulk or Other</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
                        if ($_SESSION['editProductionReception'][0][5] == 0) {
                            echo '<li><input type="radio" name="bulkOther" value="0" checked> Trailer</li>';
                            echo '<li><input type="radio" name="bulkOther" value="1"> Tandom</li>';
                            echo '<li><input type="radio" name="bulkOther" value="2"> Other</li>';
                        } else if ($_SESSION['editProductionReception'][0][5] == 1) {
                            echo '<li><input type="radio" name="bulkOther" value="0"> Trailer</li>';
                            echo '<li><input type="radio" name="bulkOther" value="1" checked> Tandom</li>';
                            echo '<li><input type="radio" name="bulkOther" value="2"> Other</li>';
                        } else {
                            echo '<li><input type="radio" name="bulkOther" value="0"> Trailer</li>';
                            echo '<li><input type="radio" name="bulkOther" value="1"> Tandom</li>';
                            echo '<li><input type="radio" name="bulkOther" value="2" checked> Other</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="washed" class="control-label col-md-2">Washed</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
                        if ($_SESSION['editProductionReception'][0][4] == 0) {
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
                <label for="cleanliness" class="control-label col-md-2">Cleanliness of Trailer After Unloading</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="quanRecieved" value="<?php echo $_SESSION['editProductionReception'][0][7]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="CFIANotified" class="control-label col-md-2">CFIA Notified</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
                        if ($_SESSION['editProductionReception'][0][8] == 0) {
                            echo '<li><input type="radio" name="CFIANotified" value="0" checked> Yes</li>';
                            echo '<li><input type="radio" name="CFIANotified" value="1"> No</li>';
                        } else {
                            echo '<li><input type="radio" name="CFIANotified" value="0"> Yes</li>';
                            echo '<li><input type="radio" name="CFIANotified" value="1" checked> No</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="CFIANotifiedBy" class="control-label col-md-2">CFIA Notified By</label>
                <div class="col-md-10">
                    <select class="form-control" name="CFIANotifiedBy">
                        <?php
                        for ($x = 0; $x < count($productionManagers); $x++){
                            if ($productionManagers[$x][0] == $_SESSION['editProductionReception'][0][9]) {
                                echo '<option selected value="' . $productionManagers[$x][0] . '">' . $productionManagers[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $productionManagers[$x][0] . '">' . $productionManagers[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="movementCert" class="control-label col-md-2">Movement Certifcate</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
                        if ($_SESSION['editProductionReception'][0][10] == 0) {
                            echo '<li><input type="radio" name="movementCert" value="0" checked> Yes</li>';
                            echo '<li><input type="radio" name="movementCert" value="1"> No</li>';
                        } else {
                            echo '<li><input type="radio" name="movementCert" value="0"> Yes</li>';
                            echo '<li><input type="radio" name="movementCert" value="1" checked> No</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="accepted" class="control-label col-md-2">Accepted</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
                        if ($_SESSION['editProductionReception'][0][11] == 0) {
                            echo '<li><input type="radio" name="accepted" value="0" checked> Yes</li>';
                            echo '<li><input type="radio" name="accepted" value="1"> No</li>';
                        } else {
                            echo '<li><input type="radio" name="accepted" value="0"> Yes</li>';
                            echo '<li><input type="radio" name="accepted" value="1" checked> No</li>';
                        }
                        ?>
                    </ul>
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
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script>
    <script type="text/javascript" src="product_validation.js"></script>    
</body>
</html>
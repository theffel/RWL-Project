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
 * @since       2015-01-13
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
                    <li class="active">Product Reception</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1 || $employeeType == 3) {
        ?>
        <h2 class="page-header">Add a Product</h2>
        <form class="form-horizontal" name="receptionForm" id="receptionForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $dateTime; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="farm" class="control-label col-md-2">Farm</label>
                <div class="col-md-10">
                    <select class="form-control" name="farm" id="farm">
                        <?php
                        for ($x = 0; $x < count($farms); $x++){
                            echo '<option value="' . $farms[$x][0] .'">' . $farms[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="potato" class="control-label col-md-2">Potato</label>
                <div class="col-md-10">
                    <select class="form-control" name="potato" id="potato">
                        <?php
                        for ($x = 0; $x < count($potatoes); $x++){
                            echo '<option value="' . $potatoes[$x][0] .'">' . $potatoes[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- Drop down populated by the database -->
            <div class="form-group">
                <label for="potProd" class="control-label col-md-2">Potato Producer</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="potProd">
                </div>
            </div>
            <div class="form-group">
                <label for="loadIDInfo" class="control-label col-md-2">Load ID Info</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="loadIDInfo">
                </div>
            </div>
            <div class="form-group">
                <label for="quanRecieved" class="control-label col-md-2">Quantity Recieved</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="quanRecieved">
                </div>
            </div>
            <div class="form-group">
                <label for="bulkOther" class="control-label col-md-2">Bulk or Other</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="bulkOther" value="Bulk"> Bulk</li>
                        <li><input type="radio" name="bulkOther" value="Other"> Other</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="washed" class="control-label col-md-2">Washed</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="washed" value="Yes"> Yes</li>
                        <li><input type="radio" name="washed" value="No"> No</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="cleanliness" class="control-label col-md-2">Cleanliness of Trailer After Unloading</label>
                <div class="col-md-10">
                    <select class="form-control" name="cleanliness">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="CFIANotified" class="control-label col-md-2">CFIA Notified</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="CFIANotified" value="Yes"> Yes</li>
                        <li><input type="radio" name="CFIANotified" value="No"> No</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="CFIANotifiedBy" class="control-label col-md-2">CFIA Notified By</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="CFIANotifiedBy">
                </div>
            </div>
            <div class="form-group">
                <label for="movementCert" class="control-label col-md-2">Movement Certifcate</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="movementCert" value="Yes"> Yes</li>
                        <li><input type="radio" name="movementCert" value="No"> No</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="accepted" class="control-label col-md-2">Accepted</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="accepted" value="Yes"> Yes</li>
                        <li><input type="radio" name="accepted" value="No"> No</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>
        <hr>
        <h2 class="page-header">Edit Product</h2>
        <?php
            if (!empty($products)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Truck</th>
                                <th>Trailer</th>
                                <th>Farm</th>
                                <th>Warehouse</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($products); $x++) {
                    echo '<tr>
                        <td>'. $products[$x][1].'</td>
                        <td>'. $products[$x][2].'</td>
                        <td>'. $products[$x][3].'</td>
                        <td>'. $products[$x][4].'</td>
                        <td>'. $products[$x][5].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $products[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table></form>';
            } else {
                echo "<p>There are currently no products to view.</p>";
            }
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
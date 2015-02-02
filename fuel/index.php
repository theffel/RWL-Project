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
 * @since       2015-01-18
 */

// Start the session
session_start();

// Include the database.php file
include('../database.php');
include('fuel_script.php');

// Include the header.php file
include('../header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Fuel</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Fuel</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $fuelReceipts = (!empty($_SESSION['fuelReceipts'])) ? $_SESSION['fuelReceipts'] : "";
        $trucks = (!empty($_SESSION['trucks'])) ? $_SESSION['trucks'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1) {
        ?>
        <h2 class="page-header">Add Receipt</h2>
        <form class="form-horizontal" name="fuelForm" id="fuelForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name= "date" value= "<?php echo $dateTime; ?>">                  
                </div>
            </div>
            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck</label>
                <div class="col-md-10">
                    <select class="form-control" name="truck">
                        <?php
                        for ($x = 0; $x < count($trucks); $x++){
                            echo '<option value="' . $trucks[$x][0] .'">' . $trucks[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="mileage" class="control-label col-md-2">Mileage</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="mileage">
                </div>
            </div>
            <div class="form-group">
                <label for="litres" class="control-label col-md-2">Litres</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="litres">
                </div>
            </div>
            <div class="form-group">
                <label for="cost" class="control-label col-md-2">Cost</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="cost">
                </div>
            </div>
            <div class="form-group">
                <label for="location" class="control-label col-md-2">Location</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="location" value="New Annan Irving">
                </div>
            </div>
            <div class="form-group">
                <label for="receipt" class="control-label col-md-2">Receipt Picture</label>
                <div class="col-md-10">
                    <input type="file" id="take-picture" name="take-picture" accept="image/*">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>
      
        <hr>
        <h2 class="page-header">Edit Receipts</h2>
        <?php
            if (!empty($fuelReceipts)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Truck</th>
                                <th>Mileage</th>
                                <th>Litres</th>
                                <th>Cost</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($fuelReceipts); $x++) {
                    echo '<tr>
                        <td>'. $fuelReceipts[$x][1].'</td>
                        <td>'. $fuelReceipts[$x][2].'</td>
                        <td>'. $fuelReceipts[$x][3].'</td>
                        <td>'. $fuelReceipts[$x][4].'</td>
                        <td>'. $fuelReceipts[$x][5].'</td>
                        <td>'. $fuelReceipts[$x][6].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $fuelReceipts[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table>  </form>';
            } else{
                echo "<p>There are currently no fuels to view.</p>";
            }
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
    <script src="../js/device_javascripts/camera_control.js"></script>    
</body>
</html>
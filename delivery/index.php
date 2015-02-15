<?php
/**
 * Delivery index page.
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
include('details_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Delivery</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Shipping Details</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $potatoes = (!empty($_SESSION['potatoes'])) ? $_SESSION['potatoes'] : "";
        $farms = (!empty($_SESSION['farms'])) ? $_SESSION['farms'] : "";
        $destination = (!empty($_SESSION['destinations'])) ? $_SESSION['destinations'] : "";
        $deliveryDetails = (!empty($_SESSION['deliveryDetails'])) ? $_SESSION['deliveryDetails'] : "";
        $shipDisplayedDetails = (!empty($_SESSION['shipDisplayedDetails'])) ? $_SESSION['shipDisplayedDetails'] : "";

        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId != 0 && $employeeType == 1) {
        ?>
        <h2 class="page-header">Shipping Details</h2>
        <form class="form-horizontal" name="deliveryForm" id="deliveryForm" method="post" action="index.php">
        <?php
            if (!empty($shipDisplayedDetails)) {
                echo '<table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Potato</th>
                                <th>Farm</th>
                                <th>Truck</th>
                                <th>Trailer</th>
                                <th>Weight</th>
                                <th>Destination</th> 
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($shipDisplayedDetails); $x++) {
                    echo '<tr>
                        <td>'. $shipDisplayedDetails[$x][1].'</td>
                        <td>'. $shipDisplayedDetails[$x][2].'</td>
                        <td>'. $shipDisplayedDetails[$x][3].'</td>
                        <td>'. $shipDisplayedDetails[$x][4].'</td>
                        <td>'. $shipDisplayedDetails[$x][5].'</td>
                        <td>'. $shipDisplayedDetails[$x][6].'</td>
                        <td>'. $shipDisplayedDetails[$x][7].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $shipDisplayedDetails[$x][0].'" value="Accept"/></td>
                    </tr>';
                }
                echo '</tbody></table>  </form>';
            } else {
                echo "<p>There are currently no shipping details to view.</p>";
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
    <!-- Custom JavaScript -->
    <script src="../js/custom_js.js"></script>
</body>
</html>
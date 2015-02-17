<?php
/**
 * This page allows the user to add oils and fluids.
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
 * @since       2015-01-15
 */

// Start the session
session_start();

// Include php files
include('../database.php');
include('../header.php');
include('oils_and_fluids_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Oil and Fluids</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Oil and Fluids</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $trucks = (!empty($_SESSION['trucks'])) ? $_SESSION['trucks'] : "";
        $oilsAndFluids = (!empty($_SESSION['oilsAndFluids'])) ? $_SESSION['oilsAndFluids'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1 || $employeeType == 7) {
        ?>
        <h2 class="page-header">Add Oil and Fluids</h2>
        <form class="form-horizontal" name="fluidsForm" id="fluidsForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $dateTime; ?>">
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
                <label for="engineOilLiters" class="control-label col-md-2">Engine Oil Liters</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="engineOilLiters">
                </div>
            </div>
            <div class="form-group">
                <label for="hydraulicOilLiters" class="control-label col-md-2">Hydraulic Oil Liters</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="hydraulicOilLiters">
                </div>
            </div>
            <div class="form-group">
                <label for="transFluidLiters" class="control-label col-md-2">Transmission Fluid Liters</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="transFluidLiters">
                </div>
            </div>
            <div class="form-group">
                <label for="coolantLitres" class="control-label col-md-2">Coolant Litres</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="coolantLitres">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <div id="messages"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                   <input type="submit" class="btn btn-primary" name="submitBtn" value="Submit"/>
                </div>
            </div>
        </form>
        <hr>
        <form class="form-horizontal" name="fluidsForm" id="fluidsForm" method="post" action="index.php">
        <h2 class="page-header">Edit Oils and Fluids</h2>
        <?php
            if (!empty($oilsAndFluids)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Truck</th>
                                <th>Engine Oil Liters</th>
                                <th>Hydraulic Oil Liters</th>
                                <th>Transmission Fluid Liters</th>
                                <th>Coolant Litres</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($oilsAndFluids); $x++) {
                    echo '<tr>
                        <td>'. $oilsAndFluids[$x][1].'</td>
                        <td>'. $oilsAndFluids[$x][2].'</td>
                        <td>'. $oilsAndFluids[$x][3].'</td>
                        <td>'. $oilsAndFluids[$x][4].'</td>
                        <td>'. $oilsAndFluids[$x][5].'</td>
                        <td>'. $oilsAndFluids[$x][6].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $oilsAndFluids[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table></form>';
            } else{
                echo "<p>There are currently no oils and fluids to view.</p>";
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
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script>
    <script type="text/javascript" src="oils_and_fluids_validation.js"></script>
</body>
</html>
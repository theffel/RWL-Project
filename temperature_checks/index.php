<?php
/**
 * This page allows the user to add a temperature check.
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
include('temperature_checks_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Temperature Checks</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Temperature Checks</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $temperatureChecks = (!empty($_SESSION['temperatureChecks'])) ? $_SESSION['temperatureChecks'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3 || $employeeType == 5) {
        ?>
        <h2 class="page-header">Add a Temperature Check</h2>
        <form class="form-horizontal" name="tempForm" id="tempForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name= "date" value="<?php echo $dateTime; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="tank1" class="control-label col-xs-2">Tank #1</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="tank1">
                </div>
            </div>
            <div class="form-group">
                <label for="tank2" class="control-label col-xs-2">Tank #2</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="tank2">
                </div>
            </div>
            <div class="form-group">
                <label for="tank3" class="control-label col-xs-2">Tank #3</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="tank3">
                </div>
            </div>
            <!-- #messages is where the messages are placed inside -->
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <div id="messages"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submitBtn" value="Submit"/>
                </div>
            </div>
        <hr>
        </form>
        <form class="form-horizontal" name="editTempForm" id="editTempForm" method="post" action="index.php">
        <h2 class="page-header">Edit Temperature Checks</h2>
        <?php
            if (!empty($temperatureChecks)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Tank 1</th>
                                <th>Tank 2</th>
                                <th>Tank 3</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($temperatureChecks); $x++) {
                    echo '<tr>
                        <td>'. $temperatureChecks[$x][1].'</td>
                        <td>'. $temperatureChecks[$x][2].'</td>
                        <td>'. $temperatureChecks[$x][3].'</td>
                        <td>'. $temperatureChecks[$x][4].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $temperatureChecks[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table></form>';
            } else{
                echo "<p>There are currently no temperature checks to view.</p>";
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
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script>
    <script type="text/javascript" src="temperature_checks_validation.js"></script>
</body>
</html>
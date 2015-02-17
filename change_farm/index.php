<?php
/**
 * This page allows the user to change the farm.
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

// Include php files
include('../database.php');
include('../header.php');
include('change_farm_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Change Farm</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Change Farm</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3) {
        ?>
        <h2 class="page-header">Change a Farm</h2>
        <form class="form-horizontal" name="changeForm" id="changeForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name= "date" value= "<?php echo $dateTime; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="farm" class="control-label col-md-2">Farm</label>
                <div class="col-md-10">
                   <select class="form-control" name="farm">
                        <?php
                        for ($x = 0; $x < count($farms); $x++){
                            echo '<option value="' . $farms[$x][0] .'">' . $farms[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="weight" class="control-label col-md-2">Weight</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name="weight">
                </div>
            </div>
            <div class="form-group">
                <label for="byproduct" class="control-label col-md-2">Byproduct</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name="byproduct">
                </div>
            </div>
            <div class="form-group">
                <label for="binMarker" class="control-label col-md-2">Bin Marker</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name="binMarker">
                </div>
            </div>
            <!-- #messages is where the messages are placed inside -->
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <div id="messages"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <input type="submit" class="btn btn-primary" name="submitBtn" value="Submit"/>
                </div>
            </div>
        <hr>
        </form>
        <form class="form-horizontal" name="changeForm" id="changeForm" method="post" action="index.php">
        <h2 class="page-header">Edit Farm</h2>
        <?php
            if (!empty($changeFarms)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Farm</th>
                                <th>Weight</th>
                                <th>Byproduct</th>
                                <th>Bin Marker</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($changeFarms); $x++) {
                    echo '<tr>
                        <td>'. $changeFarms[$x][1].'</td>
                        <td>'. $changeFarms[$x][2].'</td>
                        <td>'. $changeFarms[$x][3].'</td>
                        <td>'. $changeFarms[$x][4].'</td>
                        <td>'. $changeFarms[$x][5].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $changeFarms[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table></form>';
            } else{
                echo "<p>There are currently no farms to view.</p>";
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
    <script type="text/javascript" src="change_farm_validation.js"></script>
</body>
</html>
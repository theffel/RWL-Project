<?php
/**
 * This page allow user to input plant cleaning data
 *
 * PHP version 5
 *
 *
 * @category    Plant Cleaning
 * @package     index.php
 * @author      KangHyeok Lee
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.0
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-21
 */

// Start the session
session_start();

// Include php files
include('../database.php');
include('plant_script.php');
include('../header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Plant Cleaning</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Plant Cleaning</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3 || $employeeType == 2 || $employeeType == 5) {
        ?>
        <h2 class="page-header">Add a Plant Cleaning</h2>
        <form class="form-horizontal" name="plantForm" id="plantForm" method="POST" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $dateTime; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="equipClean" class="control-label col-md-2">Equipment List</label>
                <div class="col-md-10">
                    <select class="form-control" name="equipment">
                        <?php
						//show all equipment list from db
                        for ($x = 0; $x < count($equipment); $x++){
                            echo '<option value="' . $equipment[$x][0] .'">' . $equipment[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="descClean" class="control-label col-md-2">Description of Cleaning</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="descClean">
                </div>
            </div>

            <div class="form-group">
                <label for="nameClean" class="control-label col-md-2">Name of Cleaner(s)</label>
                <div class="col-md-10">
                    <select class="form-control" name="employees">
                        <?php
						//show all employees name from db
                        for ($x = 0; $x < count($employee); $x++){
                            echo '<option value="' . $employee[$x][0] .'">' . $employee[$x][1] .'</option>';
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
                    <input type="submit" class="btn btn-primary" name="submitBtn" value="Submit"/>
                </div>
            </div>
        <hr>
        </form>
		<!-- For list view part -->
        <form class="form-horizontal" name="plantForm" id="plantForm" method="POST" action="index.php">
        <h2 class="page-header">Edit Plant Cleanings</h2>
            <?php
            if (!empty($plantCleaning)) {
			//if something data in DB show them
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Equipment Cleaned</th>
                                <th>Description</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($plantCleaning); $x++) {
                    echo '<tr>
                        <td>'. $plantCleaning[$x][1].'</td>
                        <td>'. $plantCleaning[$x][2].'</td>
                        <td>'. $plantCleaning[$x][3].'</td>
                        <td>'. $plantCleaning[$x][4].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $plantCleaning[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table>  </form>';
            } else{
                echo "<p>There are currently no plant cleaning data to view.</p>";
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
    <script type="text/javascript" src="plant_validation.js"></script>
</body>
</html>
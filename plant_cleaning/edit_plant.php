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
 * @since       2015-01-23
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
                <li><a href="index.php">Plant Cleaning</a></li>
                <li class="active">Edit</li>
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
        <h2 class="page-header">Edit Plant Cleaning</h2>
        <form class="form-horizontal" name="plantForm" id="plantForm" method="POST" action="edit_plant.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $_SESSION['editPlantCleaning'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="equipClean" class="control-label col-md-2">Equipment List</label>
                <div class="col-md-10">
                        <select class="form-control" name="equipment">
                            <?php
                            for ($x = 0; $x < count($equipment); $x++){
                                if (strcmp($equipment[$x][1], $_SESSION['editPlantCleaning'][0][1]) == 0) {
                                    echo '<option selected value="' . $equipment[$x][0] .'">' . $equipment[$x][1] .'</option>';
                                } else {
                                    echo '<option value="' . $equipment[$x][0] .'">' . $equipment[$x][1] .'</option>';
                                }
                            }
                            ?>
                        </select>
                </div>
            </div>
            <div class="form-group">
                <label for="descClean" class="control-label col-md-2">Description of Cleaning</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="descClean" value="<?php echo $_SESSION['editPlantCleaning'][0][2];?>">
                </div>
            </div>
            <div class="form-group">
                <label for="nameClean" class="control-label col-md-2">Name of Cleaner(s)</label>
                <div class="col-md-10">
                    <select class="form-control" name="employees">
                        <?php
                        for ($x = 0; $x < count($employee); $x++){
                            if ($employee[$x][1] == $_SESSION['editPlantCleaning'][0][4]) {
                                echo '<option selected value="' . $employee[$x][0] . '">' . $employee[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $employee[$x][0] . '">' . $employee[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
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
<script src="../js/device_javascripts/camera_control.js"></script>
</body>
</html>
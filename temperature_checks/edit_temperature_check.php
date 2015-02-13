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
 * @version     x.xx
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-02-03
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
                    <li><a href="index.php">Temperature Checks</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $editTemperatureCheck = (!empty($_SESSION['editTemperatureCheck'])) ? $_SESSION['editTemperatureCheck'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3 || $employeeType == 5) {
        ?>
        <h2 class="page-header">Edit Temperature Check</h2>
        <form class="form-horizontal" name="tempForm" id="tempForm" method="post" action="edit_temperature_check.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name= "date" value="<?php echo $_SESSION['editTemperatureCheck'][0][0]; ?>">  
                </div>
            </div>
            <div class="form-group">
                <label for="tank1" class="control-label col-xs-2">Tank #1</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="tank1" value="<?php echo $_SESSION['editTemperatureCheck'][0][1]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="tank2" class="control-label col-xs-2">Tank #2</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="tank2" value="<?php echo $_SESSION['editTemperatureCheck'][0][2]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="tank3" class="control-label col-xs-2">Tank #3</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="tank3" value="<?php echo $_SESSION['editTemperatureCheck'][0][3]; ?>">
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
    <script type="text/javascript" src="temperature_checks_validation.js"></script>
</body>
</html>
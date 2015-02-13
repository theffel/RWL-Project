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
                    <li><a href="index.php">Oil and Fluids</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $trucks = (!empty($_SESSION['trucks'])) ? $_SESSION['trucks'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1 || $employeeType == 7) {
        ?>
        <h2 class="page-header">Edit Oil and Fluids</h2>
        <form class="form-horizontal" name="fluidsForm" id="fluidsForm" method="post" action="edit_oils_and_fluids.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name="date" value="<?php echo $_SESSION['editOilsAndFluids'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck</label>
                <div class="col-md-10">
                    <select class="form-control" name="truck">
                        <?php
                        for ($x = 0; $x < count($trucks); $x++){
                            if ($trucks[$x][1] == $_SESSION['editReceipt'][0][1]) {
                                echo '<option selected value="' . $trucks[$x][0] . '">' . $trucks[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $trucks[$x][0] . '">' . $trucks[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="engineOilLiters" class="control-label col-md-2">Engine Oil Liters</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="engineOilLiters" value="<?php echo $_SESSION['editOilsAndFluids'][0][2]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="hydraulicOilLiters" class="control-label col-md-2">Hydraulic Oil Liters</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="hydraulicOilLiters" value="<?php echo $_SESSION['editOilsAndFluids'][0][3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="transFluidLiters" class="control-label col-md-2">Transmission Fluid Liters</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="transFluidLiters" value="<?php echo $_SESSION['editOilsAndFluids'][0][4]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="coolantLitres" class="control-label col-md-2">Coolant Litres</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="coolantLitres" value="<?php echo $_SESSION['editOilsAndFluids'][0][5]; ?>">
                </div>
            </div>
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
    <script type="text/javascript" src="oils_and_fluids_validation.js"></script>
</body>
</html>
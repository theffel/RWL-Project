<?php
/**
 * This file allow user to edit previous data from db
 *
 * PHP version 5
 *
 *
 * @category    Wash Line Cleaning
 * @package     edit_wash_line.php
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
include('wash_line_script.php');
include('../header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Wash Line Cleaning</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="index.php">Wash Line Cleaning</a></li>
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
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3 || $employeeType == 2 || $employeeType == 5 || $employeeType == 1) {
            ?>
            <h2 class="page-header">Edit Plant Cleaning</h2>
            <form class="form-horizontal"  name="washForm" id="washForm" method="POST" action="edit_wash_line.php">
                <div class="form-group">
                    <label for="date" class="control-label col-md-2">Date</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="date" value="<?php echo $_SESSION['editLineCleaning'][0][0]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="equipClean" class="control-label col-md-2">Equipment List</label>
                    <div class="col-md-10">
                        <select class="form-control" name="equipment">
                            <?php
							//show all equipment list from DB
                            for ($x = 0; $x < count($equipment); $x++){
								echo $equipment[$x][1]." ".$_SESSION['editLineCleaning'][0][1];
                                if (strcmp($equipment[$x][1], $_SESSION['editLineCleaning'][0][1]) == 0) {
									//display user selected equipment on page
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
                        <input type="text" class="form-control" name="descClean" value="<?php echo $_SESSION['editLineCleaning'][0][2];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nameClean" class="control-label col-md-2">Name of Cleaner(s)</label>
                    <div class="col-md-10">
                        <select class="form-control" name="employees">
                            <?php
							//show all employee list from DB
                            for ($x = 0; $x < count($employee); $x++){								
                                if (strcmp($employee[$x][1], $_SESSION['editLineCleaning'][0][3]) == 0) {
									//show user selected data on page
                                    echo '<option selected value="' . $employee[$x][0] . '">' . $employee[$x][1] . '</option>';
                                } else {
                                    echo '<option value="' . $employee[$x][0] . '">' . $employee[$x][1] . '</option>';
                                }
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
<script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script> <!-- For input validation-->
<script type="text/javascript" src="wash_line_validation.js"></script>
</body>
</html>
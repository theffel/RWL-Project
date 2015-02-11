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
 * @since       2015-02-11
 */

// Start the session
session_start();

// Include php files
include('../database.php');
include('../header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Rejection</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="index.php">Rejection</a></li>
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
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3 || $employeeType == 2) {
        ?>
        <h2 class="page-header">Edit Rejected Load</h2>
        <form class="form-horizontal" name="rejectForm" id="rejectForm" method="post" action="edit_rejection.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $_SESSION['editRejection'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="potato" class="control-label col-md-2">Potato</label>
                <div class="col-md-10">
                    <select class="form-control" name="potato">
                        <?php
                        for ($x = 0; $x < count($potatoes); $x++){
                            if ($potatoes[$x][1] == $_SESSION['editRejection'][0][1]) {
                                echo '<option selected value="' . $potatoes[$x][0] . '">' . $potatoes[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $potatoes[$x][0] . '">' . $potatoes[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="farm" class="control-label col-md-2">Farm</label>
                <div class="col-md-10">
                    <select class="form-control" name="farm">
                        <?php
                        for ($x = 0; $x < count($farms); $x++){
                            if ($farms[$x][1] == $_SESSION['editRejection'][0][2]) {
                                echo '<option selected value="' . $farms[$x][0] . '">' . $farms[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $farms[$x][0] . '">' . $farms[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ticketNumber" class="control-label col-md-2">Ticket Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="ticketNumber" value="<?php echo $_SESSION['editRejection'][0][3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="quantReturned" class="control-label col-md-2">Quantity Returned</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="quantReturned" value="<?php echo $_SESSION['editRejection'][0][4]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="rewashed" class="control-label col-md-2">Was Product Re-Washed</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
                        if ($_SESSION['editRejection'][0][5] == 0 ) {
                            echo '<li><input type="radio" name="rewashed" value="0" checked> Yes</li>';
                            echo '<li><input type="radio" name="rewashed" value="1"> No</li>';
                        } else {
                            echo '<li><input type="radio" name="rewashed" value="0" > Yes</li>';
                            echo '<li><input type="radio" name="rewashed" value="1" checked> No</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="regraded" class="control-label col-md-2">Was Product Re-Graded</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
                        if ($_SESSION['editRejection'][0][6] == 0 ) {
                            echo '<li><input type="radio" name="regraded" value="0" checked> Yes</li>';
                            echo '<li><input type="radio" name="regraded" value="1"> No</li>';
                        } else {
                            echo '<li><input type="radio" name="regraded" value="0" > Yes</li>';
                            echo '<li><input type="radio" name="regraded" value="1" checked> No</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="prodReturned" class="control-label col-md-2">Product Returned</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <?php
                        if($_SESSION['editRejection'][0][7] == 0){
                            echo '<input type="checkbox" name="prodReturned" value="1" checked> Processor</input>';
                        } else {
                            echo '<input type="checkbox" name="prodReturned" value="0"> Processor</input>';
                        }
                        if($_SESSION['editRejection'][0][7] == 1){
                            echo '<input type="checkbox" name="prodReturned" value="1" checked> Producer</input>';
                        } else {
                            echo '<input type="checkbox" name="prodReturned" value="0"> Producer</input>';
                        }
                        ?>
                    </ul>
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
</body>
</html>
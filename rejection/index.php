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
include('rejection_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Rejection</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Rejection</li>
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
        <h2 class="page-header">Add a Rejected Load</h2>
        <form class="form-horizontal" name="rejectForm" id="rejectForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $dateTime; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="potato" class="control-label col-md-2">Potato</label>
                <div class="col-md-10">
                    <select class="form-control" name="potato">
                        <?php
                        for ($x = 0; $x < count($potatoes); $x++){
                            echo '<option value="' . $potatoes[$x][0] .'">' . $potatoes[$x][1] .'</option>';
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
                            echo '<option value="' . $farms[$x][0] .'">' . $farms[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ticketNumber" class="control-label col-md-2">Ticket Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="ticketNumber">
                </div>
            </div>
            <div class="form-group">
                <label for="quantReturned" class="control-label col-md-2">Quantity Returned</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="quantReturned">
                </div>
            </div>
            <div class="form-group">
                <label for="rewashed" class="control-label col-md-2">Was Product Re-Washed</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="rewashed" value="0"> Yes</li>
                        <li><input type="radio" name="rewashed" value="1"> No</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="regraded" class="control-label col-md-2">Was Product Re-Graded</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="regraded" value="0"> Yes</li>
                        <li><input type="radio" name="regraded" value="1"> No</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="prodReturned" class="control-label col-md-2">Product Returned</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="checkbox" name="prodReturned" value="0"> Processor</input></li>
                        <li><input type="checkbox" name="prodReturned" value="1"> Producer</input></li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>
        <hr>
        <h2 class="page-header">Edit Rejection</h2>
        <?php
            if (!empty($rejections)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Potato</th>
                                <th>Farm</th>
                                <th>Quantity Returned</th>
                                <th>Returned To</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($rejections); $x++) {
                    echo '<tr>
                        <td>'. $rejections[$x][1].'</td>
                        <td>'. $rejections[$x][2].'</td>
                        <td>'. $rejections[$x][3].'</td>
                        <td>'. $rejections[$x][4].'</td>
                        <td>'. $rejections[$x][5].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $rejections[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table></form>';
            } else {
                echo "<p>There are currently no rejections to view.</p>";
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
</body>
</html>
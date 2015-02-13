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

// Include the php files
include('../database.php');
include('../header.php');
include('byproduct_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">By-Product Disposal</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">By-Product Disposal</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $byproducts = (!empty($_SESSION['byproducts'])) ? $_SESSION['byproducts'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3 || $employeeType == 2) {
        ?>
        <h2 class="page-header">Add a By-Product Disposal</h2>
        <form class="form-horizontal" name="byproductForm" id="byproductForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $dateTime; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="desc" class="control-label col-md-2">Description of Product</label>
                <div class="col-md-10">
                    <select class="form-control" name="desc" id="desc">
                        <option value="Desc1">Desc1</option>
                        <option value="Desc2">Desc2</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="sent" class="control-label col-md-2">Where Product Was Sent</label>
                <div class="col-md-10">
                    <select class="form-control" name="sent" id="sent">
                        <option value="Location1">Location1</option>
                        <option value="Location2">Location2</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="disposed" class="control-label col-md-2">How Product Was Disposed Of</label>
                <div class="col-md-10">
                    <select class="form-control" name="disposed" id="disposed">
                        <option value="Deep Burial">Deep Burial</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="transported" class="control-label col-md-2">How Product Was Transported</label>
                <div class="col-md-10">
                    <select class="form-control" name="transported" id="transported">
                        <option value="Trailer">Trailer</option>
                        <option value="Dumptruck">Dumptruck</option>
                    </select>
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
        <h2 class="page-header">Edit By-Product</h2>
        <?php
            if (!empty($byproducts)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Sent</th>
                                <th>Disposal</th>
                                <th>Transported</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($byproducts); $x++) {
                    echo '<tr>
                        <td>'. $byproducts[$x][1].'</td>
                        <td>'. $byproducts[$x][2].'</td>
                        <td>'. $byproducts[$x][3].'</td>
                        <td>'. $byproducts[$x][4].'</td>
                        <td>'. $byproducts[$x][5].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $byproducts[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table></form>';
            } else{
                echo "<p>There are currently no byproduct disposals to view.</p>";
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
    <script type="text/javascript" src="byproduct_validation.js"></script>
</body>
</html>
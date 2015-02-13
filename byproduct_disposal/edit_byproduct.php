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
 * @since       2015-02-09
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
                    <li><a href="index.php">Product Disposal</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $editByproducts = (!empty($_SESSION['editByproducts'])) ? $_SESSION['editByproducts'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3 || $employeeType == 2) {
        ?>
        <h2 class="page-header">Edit By-Product Disposal</h2>
        <form class="form-horizontal" name="byproductForm" id="byproductForm" method="post" action="edit_byproduct.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $_SESSION['editByproducts'][0][0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="desc" class="control-label col-md-2">Description of Product</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="desc" value="<?php echo $_SESSION['editByproducts'][0][1]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="sent" class="control-label col-md-2">Where Product Was Sent</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="sent" value="<?php echo $_SESSION['editByproducts'][0][2]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="disposed" class="control-label col-md-2">How Product Was Disposed Of</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="disposed" value="<?php echo $_SESSION['editByproducts'][0][3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="transported" class="control-label col-md-2">How Product Was Transported</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="transported" value="<?php echo $_SESSION['editByproducts'][0][4]; ?>">
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
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script>
    <script type="text/javascript" src="byproduct_validation.js"></script>
</body>
</html>
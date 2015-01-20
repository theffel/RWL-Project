<?php
// Start the session
session_start();

// Include the database.php file
include('../database.php');

// Include the header.php file
include('../header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Fuel</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Fuel</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>
        <h2 class="page-header">Add Fuel</h2>

        <form class="form-horizontal">

            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="date" placeholder="MM-DD-YYYY">
                        </div>
                        <label for="time" class="control-label col-md-2">Time</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="time">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck #</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="truck">
                </div>
            </div>

            <div class="form-group">
                <label for="mileage" class="control-label col-md-2">Mileage</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="mileage">
                </div>
            </div>

            <div class="form-group">
                <label for="location" class="control-label col-md-2">Location</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="location">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
                <p>
                    <input type="file" id="take-picture" accept="image/*">
                </p>
                <p>
                    <img src="about:blank" alt="" id="show-picture">
                </p>
                <p id="error"></p>

        </form>

        <hr>

        <h2 class="page-header">View Fuels</h2>
        <p>There are currently no fuels to view.</p>

        <?php
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
    <script src="../js/device_javascripts/camera_control.js"></script>    
</body>
</html>
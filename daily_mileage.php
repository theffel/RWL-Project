<?php
// Start the session
session_start();

// Include the database.php file
include('database.php');

// Include the header.php file
include('header.php');
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Daily Mileage</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Daily Mileage</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>

        <h2 class="page-header">Add a Daily Mileage</h2>

        <form class="form-horizontal">

            <div class="form-group">
                <label for="truck" class="control-label col-xs-2">Truck #</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="truck" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="startDate" class="control-label col-xs-2">Start Date</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="startDate" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="startKmTruck" class="control-label col-xs-2">Start KM on Truck</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="startKmTruck" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="peiKm" class="control-label col-xs-2">P.E.I. KM</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="peiKm" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="nbKM" class="control-label col-xs-2">N.B. KM</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="nbKM" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="nsKm" class="control-label col-xs-2">N.S. KM</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="nsKm" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="litresFuelTank" class="control-label col-xs-2">Litres of Fuel in the Tank</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="litresFuelTank" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="finishKm" class="control-label col-xs-2">Finish KM</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="finishKm" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Daily Mileages</h2>
        <p>There are currently no daily mileages to view.</p>

        <?php
        }
        else {
            echo "<h2>You do not have permission to view this page.</h2>";
        }
        ?>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; RWL Holdings 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
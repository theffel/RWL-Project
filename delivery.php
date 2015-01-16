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
                <h1 class="page-header">Delivery</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Delivery</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>

        <h2 class="page-header">Add a Delivery</h2>

        <form class="form-horizontal">

            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck #</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="truck" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="trailer" class="control-label col-md-2">Trailer #</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="trailer" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="date" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="dispatcher" class="control-label col-md-2">Dispatcher</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="dispatcher" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="driver" class="control-label col-md-2">Driver</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="driver" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="farm" class="control-label col-md-2">Farm</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="farm" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="arrivalTime" class="control-label col-md-2">Arrival Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="arrivalTime" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="loadTime" class="control-label col-md-2">Load Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="loadTime" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="departureTime" class="control-label col-md-2">Departure Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="departureTime" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="unloadTime" class="control-label col-md-2">Unload Time</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="unloadTime" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="ticketNumber" class="control-label col-md-2">Ticket Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="ticketNumber" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="grossWeight" class="control-label col-md-2">Gross Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="grossWeight" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="tareWeight" class="control-label col-md-2">Tare Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tareWeight" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Deliverys</h2>
        <p>There are currently no deliverys to view.</p>

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
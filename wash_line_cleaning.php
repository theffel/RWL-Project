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
                <h1 class="page-header">Wash Line Cleaning</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Wash Line Cleaning</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>

        <h2 class="page-header">Add a Wash Line Cleaning</h2>

        <form class="form-horizontal">

            <!-- Pre-populated by the system date -->
            <div class="form-group">
                <label for="date" class="control-label col-xs-2">Date</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="date" placeholder="">
                </div>
            </div>

            <!-- Pre-populated by the system time -->
            <div class="form-group">
                <label for="time" class="control-label col-xs-2">Time</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="time" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="equipClean" class="control-label col-xs-2">Equipment Cleaned</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="equipClean" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="descClean" class="control-label col-xs-2">Description of Cleaning</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="descClean" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="nameClean" class="control-label col-xs-2">Name of Cleaner(s)</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="nameClean" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Wash Line Cleanings</h2>
        <p>There are currently no wash line cleanings to view.</p>

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
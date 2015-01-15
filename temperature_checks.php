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
                <h1 class="page-header">Temperature Checks</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Temperature Checks</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>

        <h2 class="page-header">Add a Temperature Check</h2>

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
                <label for="tank1" class="control-label col-xs-2">Tank #1</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="tank1" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="tank2" class="control-label col-xs-2">Tank #2</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="tank2" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="tank3" class="control-label col-xs-2">Tank #3</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="tank3" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Temperature Checks</h2>
        <p>There are currently no temperature checks to view.</p>

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
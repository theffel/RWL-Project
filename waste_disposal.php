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
                <h1 class="page-header">Waste Disposal</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Waste Disposal</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>

        <h2 class="page-header">Add a Waste Disposal</h2>

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
                <label for="desc" class="control-label col-xs-2">Description of Product</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="desc" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="sent" class="control-label col-xs-2">Where Product Was Sent</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="sent" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="disposed" class="control-label col-xs-2">How Product Was Disposed Of</label>
                <div class="col-xs-10">
                    <select class="form-control" id="disposed">
                        <option value="deepBurial">Deep Burial</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="transported" class="control-label col-xs-2">How Product Was Transported</label>
                <div class="col-xs-10">
                    <select class="form-control" id="transported">
                        <option value="trailer">Trailer</option>
                        <option value="dumptruck">Dumptruck</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Waste Disposals</h2>
        <p>There are currently no waste disposals to view.</p>

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
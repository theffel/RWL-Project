<?php
// Start the session
session_start();

// Include the header.php file
include('header.php');
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pre-Trip Inspection</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Pre-Trip Inspection</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        // If the user is logged in and the user is the author of the message
        if ($_SESSION["loggedIn"] == true) {
        ?>

        <h2 class="page-header">View Inspections</h2>
        <p>There are currently no inspection to view.</p>
        
        <hr>

        <h2 class="page-header">Add an Inspection</h2>

        <form class="form-horizontal">

            <div class="form-group">
                <label for="inside" class="control-label col-xs-2">Inside</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="inside" value="Parking Brake"> Parking Brake (Apply)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="startEngine" class="control-label col-xs-2">Start Engine</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="startEngine" value="Oil Pressure"> Oil Pressure (Light or Gauge)</input><br />
                    <input type="checkbox" name="startEngine" value="Air Pressure or Vacuum"> Air Pressure or Vacuum (Gauge)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="driverName" class="control-label col-xs-2">Driver's Name</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="driverName" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="date" class="control-label col-xs-2">Date</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="date" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
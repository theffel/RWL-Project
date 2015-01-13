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
                <h1 class="page-header">Shipping</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Shipping</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        if ($_SESSION["loggedIn"]) {
            $loggedIn = $_SESSION["loggedIn"];
        }

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>

        <h2 class="page-header">View Shipments</h2>
        <p>There are currently no shipments to view.</p>
        
        <hr>

        <h2 class="page-header">Add a Shipment</h2>

        <form class="form-horizontal">

            <div class="form-group">
                <label for="date" class="control-label col-xs-2">Date</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="date" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="potType" class="control-label col-xs-2">Type of Potato</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="potType" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="potProd" class="control-label col-xs-2">Potato Producer</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="potProd" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="loadIDInfo" class="control-label col-xs-2">Load ID Info</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="loadIDInfo" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="quanShipped" class="control-label col-xs-2">Quantity Shipped</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="quanShipped" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="washed" class="control-label col-xs-2">Washed</label>
                <div class="col-xs-10">
                    <input type="radio" name="washed" value="Yes"> Yes &nbsp; <input type="radio" name="washed" value="No"> No
                </div>
            </div>

            <div class="form-group">
                <label for="destination" class="control-label col-xs-2">Destination</label>
                <div class="col-xs-10">
                    <select class="form-control" id="destination">
                        <option value="cavendish1">Cavendish (Plant 1)</option>
                        <option value="cavendish2">Cavendish (Plant 2)</option>
                        <option value="processor">Processor</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="truckCleaned" class="control-label col-xs-2">Truck Cleaned Upon Return</label>
                <div class="col-xs-10">
                    <input type="radio" name="truckCleaned" value="Yes"> Yes &nbsp; <input type="radio" name="truckCleaned" value="No"> No
                </div>
            </div>

            <div class="form-group">
                <label for="accepted" class="control-label col-xs-2">Accepted</label>
                <div class="col-xs-10">
                    <input type="radio" name="accepted" value="Yes"> Yes &nbsp; <input type="radio" name="accepted" value="No"> No
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
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
                <h1 class="page-header">Product Reception</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Product Reception</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>

        <h2 class="page-header">Add a Product</h2>

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

            <!-- Drop down populated by the database -->
            <div class="form-group">
                <label for="potType" class="control-label col-xs-2">Type of Potato</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="potType" placeholder="">
                </div>
            </div>

            <!-- Drop down populated by the database -->
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
                <label for="quanRecieved" class="control-label col-xs-2">Quantity Recieved</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="quanRecieved" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="bulkOther" class="control-label col-xs-2">Bulk or Other</label>
                <div class="col-xs-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="bulkOther" value="Bulk"> Bulk</li>
                        <li><input type="radio" name="bulkOther" value="Other"> Other</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="washed" class="control-label col-xs-2">Washed</label>
                <div class="col-xs-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="washed" value="Yes"> Yes</li>
                        <li><input type="radio" name="washed" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="cleanliness" class="control-label col-xs-2">Cleanliness of Trailer After Unloading</label>
                <div class="col-xs-10">
                    <select class="form-control" id="cleanliness">
                        <option value="cleanliness1">1</option>
                        <option value="cleanliness2">2</option>
                        <option value="cleanliness3">3</option>
                        <option value="cleanliness4">4</option>
                        <option value="cleanliness5">5</option>
                        <option value="cleanliness6">6</option>
                        <option value="cleanliness7">7</option>
                        <option value="cleanliness8">8</option>
                        <option value="cleanliness9">9</option>
                        <option value="cleanliness10">10</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="CFIANotified" class="control-label col-xs-2">CFIA Notified</label>
                <div class="col-xs-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="CFIANotified" value="Yes"> Yes</li>
                        <li><input type="radio" name="CFIANotified" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="CFIANotifiedBy" class="control-label col-xs-2">CFIA Notified By</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="CFIANotifiedBy" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="movementCert" class="control-label col-xs-2">Movement Certifcate</label>
                <div class="col-xs-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="movementCert" value="Yes"> Yes</li>
                        <li><input type="radio" name="movementCert" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="accepted" class="control-label col-xs-2">Accepted</label>
                <div class="col-xs-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="accepted" value="Yes"> Yes</li>
                        <li><input type="radio" name="accepted" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Products</h2>
        <p>There are currently no products to view.</p>

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
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
                <h1 class="page-header">Sample</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Sample</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>

        <h2 class="page-header">Add a Sample</h2>

        <form class="form-horizontal">

            <div class="form-group">
                <label for="trailer" class="control-label col-xs-2">Trailer #</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="trailer" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="incomingOutgoing" class="control-label col-xs-2">Incoming/Outgoing</label>
                <div class="col-xs-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="incomingOutgoing" value="Incoming"> Incoming</li>
                        <li><input type="radio" name="incomingOutgoing" value="Outgoing"> Outgoing</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="grader" class="control-label col-xs-2">Grader #</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="grader" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="toteSample" class="control-label col-xs-2">Tote/Sample #</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="toteSample" placeholder="">
                </div>
            </div>

            <!-- Pre-populated by the system date -->
            <div class="form-group">
                <label for="date" class="control-label col-xs-2">Date</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="date" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="time" class="control-label col-xs-2">Time</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="time" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="unusable" class="control-label col-xs-2">Unusable</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="unusable" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="rot" class="control-label col-xs-2">Rot</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="rot" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="internal" class="control-label col-xs-2">Internal</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="internal" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="pitRot" class="control-label col-xs-2">Pit Rot</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="pitRot" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="wireworm" class="control-label col-xs-2">Wireworm</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="wireworm" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="jellyEnd" class="control-label col-xs-2">Jelly End</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="jellyEnd" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="other" class="control-label col-xs-2">Other</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="other" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="hollowHeart" class="control-label col-xs-2">Hollow Heart</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="hollowHeart" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="scab" class="control-label col-xs-2">Scab</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="scab" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="sunburn" class="control-label col-xs-2">Sunburn</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="sunburn" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="mechBruise" class="control-label col-xs-2">Mech Bruise</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="sunburn" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="smalls" class="control-label col-xs-2">Smalls</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="smalls" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="10oz" class="control-label col-xs-2">10oz</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="10oz" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="airWeight" class="control-label col-xs-2">Air Weight</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="airWeight" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="waterWeight" class="control-label col-xs-2">Water Weight</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="waterWeight" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="rockMaterial" class="control-label col-xs-2">Rock & Foreign Material</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="rockMaterial" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="totalWeight" class="control-label col-xs-2">Total Sample Weight</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="totalWeight" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Samples</h2>
        <p>There are currently no samples to view.</p>

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
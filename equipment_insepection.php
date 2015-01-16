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
                <h1 class="page-header">Equipment Insepection</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Equipment Insepection</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>

        <h2 class="page-header">Add an Equipment Insepection</h2>

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
                <label for="equipMake" class="control-label col-md-2">Equipment Make</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="equipMake" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="equipModel" class="control-label col-md-2">Equipment Model</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="equipModel" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="equipYear" class="control-label col-md-2">Equipment Year</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="equipYear" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="vin" class="control-label col-md-2">V.I.N (serial #)</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="vin" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="engineHours" class="control-label col-md-2">Engine Hours</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="engineHours" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="drainOil" class="control-label col-md-2">Drain Engine Oil</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="drainOil" value="Yes"> Yes</li>
                        <li><input type="radio" name="drainOil" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="litersReplaced" class="control-label col-md-2">Liters Replaced</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="litersReplaced">
                </div>
            </div>

            <div class="form-group">
                <label for="insepectOilDrain" class="control-label col-md-2">Insepect Oil Drain Plug & Gasket</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="insepectOilDrain" value="Yes"> Yes</li>
                        <li><input type="radio" name="insepectOilDrain" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <!-- Drop down menu with amount -->
            <div class="form-group">
                <label for="replaceOilFilter" class="control-label col-md-2">Replace Oil Filter(s)</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="replaceOilFilter">
                </div>
            </div>

            <div class="form-group">
                <label for="oilFilterNumber" class="control-label col-md-2">Oil Filter Number(s)</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="oilFilterNumber">
                </div>
            </div>

            <div class="form-group">
                <label for="replaceCoolantFilter" class="control-label col-md-2">Replace Coolant Filter</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="replaceCoolantFilter" value="Yes"> Yes</li>
                        <li><input type="radio" name="replaceCoolantFilter" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="coolantFilterNumber" class="control-label col-md-2">Coolant Filter Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="coolantFilterNumber">
                </div>
            </div>

            <!-- Drop down menu with amount -->
            <div class="form-group">
                <label for="replaceFuelFilter" class="control-label col-md-2">Replace Fuel Filter(s)</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="replaceFuelFilter">
                </div>
            </div>

            <div class="form-group">
                <label for="fuelFilterNumber" class="control-label col-md-2">Fuel Filter Number(s)</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="fuelFilterNumber">
                </div>
            </div>

            <!-- Drop down menu with amount -->
            <div class="form-group">
                <label for="checkAirFilter" class="control-label col-md-2">Check Engine Air Filter</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="checkAirFilter">
                </div>
            </div>

            <div class="form-group">
                <label for="checkFilterNumber" class="control-label col-md-2">Check Engine Air Filter Number(s)</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="checkFilterNumber">
                </div>
            </div>

            <!-- Drop down menu with amount -->
            <div class="form-group">
                <label for="replaceFuelFilter" class="control-label col-md-2">Replace Hydraulic Filter(s)</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="replaceFuelFilter">
                </div>
            </div>

            <div class="form-group">
                <label for="fuelFilterNumber" class="control-label col-md-2">Fuel Filter Number(s)</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="fuelFilterNumber">
                </div>
            </div>

            <div class="form-group">
                <label for="checkHydraulicLevel" class="control-label col-md-2">Check Hydraulic Oil Level</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkHydraulicLevel" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkHydraulicLevel" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="hydraulicAdded" class="control-label col-md-2">Hydraulic Oil Amount Added</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="hydraulicAdded">
                </div>
            </div>

            <div class="form-group">
                <label for="coolantLevelCondition" class="control-label col-md-2">Check Coolant Level & Condition</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="coolantLevelCondition" value="Yes"> Yes</li>
                        <li><input type="radio" name="coolantLevelCondition" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="visualInsepectionRadiatorHoses" class="control-label col-md-2">Visual Insepection of Radiator Hoses</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="visualInsepectionRadiatorHoses" value="Yes"> Yes</li>
                        <li><input type="radio" name="visualInsepectionRadiatorHoses" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="visualInsepectionRadiator" class="control-label col-md-2">Visual Insepection of Radiator</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="visualInsepectionRadiator" value="Yes"> Yes</li>
                        <li><input type="radio" name="visualInsepectionRadiator" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="visualInsepectionBelts" class="control-label col-md-2">Visual Insepection of Belts</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="visualInsepectionBelts" value="Yes"> Yes</li>
                        <li><input type="radio" name="visualInsepectionBelts" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="checkBatteryTerminals" class="control-label col-md-2">Check Battery Terminals</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkBatteryTerminals" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkBatteryTerminals" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="testBatteryCondition" class="control-label col-md-2">Test Battery Condition</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="testBatteryCondition" value="Yes"> Yes</li>
                        <li><input type="radio" name="testBatteryCondition" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="lubeGreaseFittings" class="control-label col-md-2">Lubricate Grease Fittings</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="lubeGreaseFittings" value="Yes"> Yes</li>
                        <li><input type="radio" name="lubeGreaseFittings" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="checkExhaustSystem" class="control-label col-md-2">Check Exhaust System</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkExhaustSystem" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkExhaustSystem" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="checkBrakingSystem" class="control-label col-md-2">Check Braking System</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkBrakingSystem" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkBrakingSystem" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="adjustBrakes" class="control-label col-md-2">Adjust Brakes</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="adjustBrakes" value="Yes"> Yes</li>
                        <li><input type="radio" name="adjustBrakes" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="checkLinesLeaks" class="control-label col-md-2">Check Hydraulic Lines / System leaks</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkLinesLeaks" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkLinesLeaks" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="checkHubFinalDrive" class="control-label col-md-2">Check Hub / Final Drive Fluid Levels</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkHubFinalDrive" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkHubFinalDrive" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="checkElectricalLighting" class="control-label col-md-2">Check over Electrical System / Lighting</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkElectricalLighting" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkElectricalLighting" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="lightsReplaced" class="control-label col-md-2">Lights replaced</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="lightsReplaced" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="checkStructuralCracks" class="control-label col-md-2">Check for structural cracks (required welding)</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkStructuralCracks" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkStructuralCracks" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="torqueTrackBolts" class="control-label col-md-2">Torque Wheel Nuts / Track Bolts</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="torqueTrackBolts" value="Yes"> Yes</li>
                        <li><input type="radio" name="torqueTrackBolts" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="checkTireTrackTight" class="control-label col-md-2">Check Tire Pressure / Track Tightness</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkTireTrackTight" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkTireTrackTight" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="checkTireDeptTrackCondition" class="control-label col-md-2">Check Tire Tread Dept / Track Condition</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkTireDeptTrackCondition" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkTireDeptTrackCondition" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="tiresReplaced" class="control-label col-md-2">Tires replaced</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tiresReplaced" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="testRun" class="control-label col-md-2">Test Run</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="testRun" value="Yes"> Yes</li>
                        <li><input type="radio" name="testRun" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="checkWarningsOnBoard" class="control-label col-md-2">Check for Warnings / On-Board indicators</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkWarningsOnBoard" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkWarningsOnBoard" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="checkFiltersLeaks" class="control-label col-md-2">Check for Filters & Drain Plug Leaks</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="checkFiltersLeaks" value="Yes"> Yes</li>
                        <li><input type="radio" name="checkFiltersLeaks" value="No"> No</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="mechanicRemarks" class="control-label col-md-2">Mechanic's Remarks</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="mechanicRemarks" rows="5"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Equipment Insepections</h2>
        <p>There are currently no equipment insepections to view.</p>

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
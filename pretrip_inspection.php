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
                <h1 class="page-header">Pre-Trip Inspection</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Pre-Trip Inspection</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";

        // If the user is logged in and the user is the author of the message
        if ($loggedIn == true) {
        ?>

        <h2 class="page-header">Add an Inspection</h2>

        <form class="form-horizontal">

            <!-- Pre-populate driver's name from who is logged in -->
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
                <label for="unitNo" class="control-label col-xs-2">Tractor / Trailer Unit no.s</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="unitNo" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="inside" class="control-label col-xs-2">Inside</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="inside" value="Parking Brake (Apply)"> Parking Brake (Apply)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="startEngine" class="control-label col-xs-2">Start Engine</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="startEngine" value="Oil Pressure (Light or Gauge)"> Oil Pressure (Light or Gauge)</input><br />
                    <input type="checkbox" name="startEngine" value="Air Pressure or Vacuum (Gauge)"> Air Pressure or Vacuum (Gauge)</input><br />
                    <input type="checkbox" name="startEngine" value="Low Air or Vacuum Warning Device (Air pressure below 40 psi check on pressure build-up. Air pressure above 60 psi deplete air until warning device works.) (Vacuum below 8 inches Hg. check on build-up. Above 8 inchdes Hg. deplete vacuum until device works."> Low Air or Vacuum Warning Device (Air pressure below 40 psi check on pressure build-up. Air pressure above 60 psi deplete air until warning device works.) (Vacuum below 8 inches Hg. check on build-up. Above 8 inchdes Hg. deplete vacuum until device works.</input><br />
                    <input type="checkbox" name="startEngine" value="Instrument Panel (Telltale lights or buzzers)"> Instrument Panel (Telltale lights or buzzers)</input><br />
                    <input type="checkbox" name="startEngine" value="Horn"> Horn</input><br />
                    <input type="checkbox" name="startEngine" value="Windshield Wiper and Washer"> Windshield Wiper and Washer</input><br />
                    <input type="checkbox" name="startEngine" value="Heater - Defroster"> Heater - Defroster</input><br />
                    <input type="checkbox" name="startEngine" value="Mirrors"> Mirrors</input><br />
                    <input type="checkbox" name="startEngine" value="Steering Wheel (Excess play)"> Steering Wheel (Excess play)</input><br />
                    <input type="checkbox" name="startEngine" value="Apply Trailer Brakes in Emergency"> Apply Trailer Brakes in Emergency</input><br />
                    <input type="checkbox" name="startEngine" value="Turn on all lights including 4-way flasher"> Turn on all lights including 4-way flasher</input><br />
                    <input type="checkbox" name="startEngine" value="Fire Extinguisher and Warning Devices"> Fire Extinguisher and Warning Devices</input>
                </div>
            </div>

            <div class="form-group">
                <label for="front" class="control-label col-xs-2">Front</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="front" value="Headlights"> Headlights</input><br />
                    <input type="checkbox" name="front" value="Clearance Lights"> Clearance Lights</input><br />
                    <input type="checkbox" name="front" value="Identification Lights"> Identification Lights</input><br />
                    <input type="checkbox" name="front" value="Turn Signals and 4-way flasher"> Turn Signals and 4-way flasher</input><br />
                    <input type="checkbox" name="front" value="Tires and Wheels (Lugs)"> Tires and Wheels (Lugs)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="leftSide" class="control-label col-xs-2">Left Side</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="leftSide" value="Fuel Tank and Cap"> Fuel Tank and Cap</input><br />
                    <input type="checkbox" name="leftSide" value="Sidemarker Lights"> Sidemarker Lights</input><br />
                    <input type="checkbox" name="leftSide" value="Reflectors"> Reflectors</input><br />
                    <input type="checkbox" name="leftSide" value="Tires and Wheels (Lugs)"> Tires and Wheels (Lugs)</input><br />
                    <input type="checkbox" name="leftSide" value="Cargo Tie-downs/or Doors"> Cargo Tie-downs/or Doors</input>
                </div>
            </div>

            <div class="form-group">
                <label for="rear" class="control-label col-xs-2">Rear</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="rear" value="Tail Lights"> Tail Lights</input><br />
                    <input type="checkbox" name="rear" value="Stop Lights"> Stop Lights</input><br />
                    <input type="checkbox" name="rear" value="Turn Signals and 4-way flasher"> Turn Signals and 4-way flasher</input><br />
                    <input type="checkbox" name="rear" value="Clearance Lights"> Clearance Lights</input><br />
                    <input type="checkbox" name="rear" value="Identification Lights"> Identification Lights</input><br />
                    <input type="checkbox" name="rear" value="Reflectors"> Reflectors</input><br />
                    <input type="checkbox" name="rear" value="Tires and Wheels (Lugs)"> Tires and Wheels (Lugs)</input><br />
                    <input type="checkbox" name="rear" value="Rear End Protection (Bumper)"> Rear End Protection (Bumper)</input><br />
                    <input type="checkbox" name="rear" value="Cargo Tie-downs/or Doors"> Cargo Tie-downs/or Doors</input>
                </div>
            </div>

            <div class="form-group">
                <label for="rightSide" class="control-label col-xs-2">Right Side</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="rightSide" value="Fuel Tank and Cap"> Fuel Tank and Cap</input><br />
                    <input type="checkbox" name="rightSide" value="Sidemarker Lights"> Sidemarker Lights</input><br />
                    <input type="checkbox" name="rightSide" value="Reflectors"> Reflectors</input><br />
                    <input type="checkbox" name="rightSide" value="Tires and Wheels (Lugs)"> Tires and Wheels (Lugs)</input><br />
                    <input type="checkbox" name="rightSide" value="Cargo Tie-downs/or Doors"> Cargo Tie-downs/or Doors</input>
                </div>
            </div>

            <div class="form-group">
                <label for="onCombinations" class="control-label col-xs-2">On Combinations</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="onCombinations" value="Hoses and Couplers"> Hoses and Couplers</input><br />
                    <input type="checkbox" name="onCombinations" value="Electrical Connector"> Electrical Connector</input><br />
                    <input type="checkbox" name="onCombinations" value="Couplings (Fifth wheel, tow bar, safety chains, locking devices)"> Couplings (Fifth wheel, tow bar, safety chains, locking devices)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="onHazMaterials" class="control-label col-xs-2">On Vehicles Transporting Hazardous Materials</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="onHazMaterials" value="Marking or Placards"> Marking or Placards</input><br />
                    <input type="checkbox" name="onHazMaterials" value="Proper Shipping Papers"> Proper Shipping Papers</input>
                </div>
            </div>

            <div class="form-group">
                <label for="stopEngine" class="control-label col-xs-2">Stop Engine</label>
                <div class="col-xs-10">
                    <input type="checkbox" name="stopEngine" value="Release Trailer Emergency Brakes"> Release Trailer Emergency Brakes</input><br />
                    <input type="checkbox" name="stopEngine" value="Apply service Brakes-Air loss should not exceed"> Apply service Brakes-Air loss should not exceed:<ul>
                        <li>3 psi per minute on single vehicles</li>
                        <li>4 psi per minute on combinations</li>
                    </ul></input>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Inspections</h2>
        <p>There are currently no inspection to view.</p>

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
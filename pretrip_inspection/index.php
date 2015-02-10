<?php
/**
 * Description for file goes here.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Trevor Heffel
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-13
 */

// Start the session
session_start();

// Include the database.php file
include('../database.php');

// Include the header.php file
include('../header.php');

include('pretrip_script.php')
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pre-Trip Inspection</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Pre-Trip Inspection</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 1) {
        ?>
        <h2 class="page-header">Add an Inspection</h2>

        <form class="form-horizontal" name="insepectionForm" id="insepectionForm" method="post" action="index.php">
          
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name= "date" value= "<?php echo $dateTime; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="tractor" class="control-label col-md-2">Truck</label>
                <div class="col-md-10">    
                    <select class="form-control" name="truck">
                        <option value="" disabled selected style="display:none;"></option>
                        <?php
                        for ($x = 0; $x < count($trucks); $x++){
                            echo '<option value="' . $trucks[$x][0] .'">' . $trucks[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="trailer" class="control-label col-md-2">Trailer</label>
                <div class="col-md-10">
                    <select class="form-control" name="trailer">
                        <option value="" disabled selected style="display:none;"></option>
                        <?php
                        for ($x = 0; $x < count($trailers); $x++){
                            echo '<option value="' . $trailers[$x][0] .'">' . $trailers[$x][1] .'</option>';
                        }
                        ?>
                    </select>  
                </div>
            </div>

            <div class="form-group">
                <label for="inside" class="control-label col-md-2">Inside</label>
                <div class="col-md-10">
                    <input type="checkbox" name="parkingBrake" value="1"> Parking Brake (Apply)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="cleanliness" class="control-label col-md-2">Cleanliness</label>
                <div class="col-md-10">
                    <input type="checkbox" name="cleanliness" value="1"> Cleanliness</input>
                </div>
            </div>

            <div class="form-group">
                <label for="startEngine" class="control-label col-md-2">Start Engine</label>
                <div class="col-md-10">
                    <input type="checkbox" name="engineOilPressure" value="1"> Oil Pressure (Light or Gauge)</input><br />
                    <input type="checkbox" name="engineAirPressure" value="1"> Air Pressure or Vacuum (Gauge)</input><br />
                    <input type="checkbox" name="engineLowAir" value="1"> Low Air or Vacuum Warning Device (Air pressure below 40 psi check on pressure build-up. Air pressure above 60 psi deplete air until warning device works.) (Vacuum below 8 inches Hg. check on build-up. Above 8 inchdes Hg. deplete vacuum until device works.</input><br />
                    <input type="checkbox" name="engineInstrumentPanel" value="1"> Instrument Panel (Telltale lights or buzzers)</input><br />
                    <input type="checkbox" name="engineHorn" value="1"> Horn</input><br />
                    <input type="checkbox" name="engineWindshieldWiper" value="1"> Windshield Wiper and Washer</input><br />
                    <input type="checkbox" name="engineHeaterDefroster" value="1"> Heater - Defroster</input><br />
                    <input type="checkbox" name="engineMirrors" value="1"> Mirrors</input><br />
                    <input type="checkbox" name="engineSteeringWheel" value="1"> Steering Wheel (Excess play)</input><br />
                    <input type="checkbox" name="engineTrailerBrakesEmergency" value="1"> Apply Trailer Brakes in Emergency</input><br />
                    <input type="checkbox" name="engineAllLights" value="1"> Turn on all lights including 4-way flasher</input><br />
                    <input type="checkbox" name="engineFireExtinguisher" value="1"> Fire Extinguisher and Warning Devices</input>
                </div>
            </div>

            <div class="form-group">
                <label for="front" class="control-label col-md-2">Front</label>
                <div class="col-md-10">
                    <input type="checkbox" name="frontHeadlights" value="1"> Headlights</input><br />
                    <input type="checkbox" name="frontClearanceLights" value="1"> Clearance Lights</input><br />
                    <input type="checkbox" name="frontIdentificationLights" value="1"> Identification Lights</input><br />
                    <input type="checkbox" name="frontTurnSignals" value="1"> Turn Signals and 4-way flasher</input><br />
                    <input type="checkbox" name="frontTiresWheels" value="1"> Tires and Wheels (Lugs)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="leftSide" class="control-label col-md-2">Left Side</label>
                <div class="col-md-10">
                    <input type="checkbox" name="leftFuelTankCap" value="1"> Fuel Tank and Cap</input><br />
                    <input type="checkbox" name="leftSidemarkerLights" value="1"> Sidemarker Lights</input><br />
                    <input type="checkbox" name="leftReflectors" value="1"> Reflectors</input><br />
                    <input type="checkbox" name="leftTiresWheels" value="1"> Tires and Wheels (Lugs)</input><br />
                    <input type="checkbox" name="leftCargoTiedowns" value="1"> Cargo Tie-downs/or Doors</input>
                </div>
            </div>

            <div class="form-group">
                <label for="rear" class="control-label col-md-2">Rear</label>
                <div class="col-md-10">
                    <input type="checkbox" name="rearTailLights" value="1"> Tail Lights</input><br />
                    <input type="checkbox" name="rearStopLights" value="1"> Stop Lights</input><br />
                    <input type="checkbox" name="rearTurnSignals" value="1"> Turn Signals and 4-way flasher</input><br />
                    <input type="checkbox" name="rearClearanceLights" value="1"> Clearance Lights</input><br />
                    <input type="checkbox" name="rearIdentificationLights" value="1"> Identification Lights</input><br />
                    <input type="checkbox" name="rearReflectors" value="1"> Reflectors</input><br />
                    <input type="checkbox" name="rearTiresWheels" value="1"> Tires and Wheels (Lugs)</input><br />
                    <input type="checkbox" name="rearRearProtection" value="1"> Rear End Protection (Bumper)</input><br />
                    <input type="checkbox" name="rearCargoTiedowns" value="1"> Cargo Tie-downs/or Doors</input>
                </div>
            </div>

            <div class="form-group">
                <label for="rightSide" class="control-label col-md-2">Right Side</label>
                <div class="col-md-10">
                    <input type="checkbox" name="rightFuelTankCap" value="1"> Fuel Tank and Cap</input><br />
                    <input type="checkbox" name="rightSidemarkerLights" value="1"> Sidemarker Lights</input><br />
                    <input type="checkbox" name="rightReflectors" value="1"> Reflectors</input><br />
                    <input type="checkbox" name="rightTiresWheels" value="1"> Tires and Wheels (Lugs)</input><br />
                    <input type="checkbox" name="rightCargoTiedowns" value="1"> Cargo Tie-downs/or Doors</input>
                </div>
            </div>

            <div class="form-group">
                <label for="onCombinations" class="control-label col-md-2">On Combinations</label>
                <div class="col-md-10">
                    <input type="checkbox" name="onCombinationsHosesCouplers" value="1"> Hoses and Couplers</input><br />
                    <input type="checkbox" name="onCombinationsElectricalConnector" value="1"> Electrical Connector</input><br />
                    <input type="checkbox" name="onCombinationsCouplings" value="1"> Couplings (Fifth wheel, tow bar, safety chains, locking devices)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="onHazMaterials" class="control-label col-md-2">On Vehicles Transporting Hazardous Materials</label>
                <div class="col-md-10">
                    <input type="checkbox" name="onHazMaterialsMarkingPlacards" value="1"> Marking or Placards</input><br />
                    <input type="checkbox" name="onHazMaterialsShippingPapers" value="1"> Proper Shipping Papers</input>
                </div>
            </div>

            <div class="form-group">
                <label for="stopEngine" class="control-label col-md-2">Stop Engine</label>
                <div class="col-md-10">
                    <input type="checkbox" name="stopEngineReleaseTrailerBrakes" value="1"> Release Trailer Emergency Brakes</input><br />
                    <input type="checkbox" name="stopEngineApplyBrakesAir" value="1"> Apply service Brakes-Air loss should not exceed:<ul>
                        <li>3 psi per minute on single vehicles</li>
                        <li>4 psi per minute on combinations</li>
                    </ul></input>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
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
        // Include the footer.php file
        include('../footer.php');
        ?>
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
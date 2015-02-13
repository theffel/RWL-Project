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

// Include php files
include('../database.php');
include('../header.php');
include('pretrip_script.php');
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
        $pretrips = (!empty($_SESSION['pretrips'])) ? $_SESSION['pretrips'] : "";
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
                    <input type="checkbox" name="parkingBrake" value="0"> Parking Brake (Apply)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="cleanliness" class="control-label col-md-2">Cleanliness</label>
                <div class="col-md-10">
                    <input type="checkbox" name="cleanliness" value="0"> Cleanliness</input>
                </div>
            </div>

            <div class="form-group">
                <label for="startEngine" class="control-label col-md-2">Start Engine</label>
                <div class="col-md-10">
                    <input type="checkbox" name="engineOilPressure" value="0"> Oil Pressure (Light or Gauge)</input><br />
                    <input type="checkbox" name="engineAirPressure" value="0"> Air Pressure or Vacuum (Gauge)</input><br />
                    <input type="checkbox" name="engineLowAir" value="0"> Low Air or Vacuum Warning Device (Air pressure below 40 psi check on pressure build-up. Air pressure above 60 psi deplete air until warning device works.) (Vacuum below 8 inches Hg. check on build-up. Above 8 inchdes Hg. deplete vacuum until device works.</input><br />
                    <input type="checkbox" name="engineInstrumentPanel" value="0"> Instrument Panel (Telltale lights or buzzers)</input><br />
                    <input type="checkbox" name="engineHorn" value="0"> Horn</input><br />
                    <input type="checkbox" name="engineWindshieldWiper" value="0"> Windshield Wiper and Washer</input><br />
                    <input type="checkbox" name="engineHeaterDefroster" value="0"> Heater - Defroster</input><br />
                    <input type="checkbox" name="engineMirrors" value="0"> Mirrors</input><br />
                    <input type="checkbox" name="engineSteeringWheel" value="0"> Steering Wheel (Excess play)</input><br />
                    <input type="checkbox" name="engineTrailerBrakesEmergency" value="0"> Apply Trailer Brakes in Emergency</input><br />
                    <input type="checkbox" name="engineAllLights" value="0"> Turn on all lights including 4-way flasher</input><br />
                    <input type="checkbox" name="engineFireExtinguisher" value="0"> Fire Extinguisher and Warning Devices</input>
                </div>
            </div>

            <div class="form-group">
                <label for="front" class="control-label col-md-2">Front</label>
                <div class="col-md-10">
                    <input type="checkbox" name="frontHeadlights" value="0"> Headlights</input><br />
                    <input type="checkbox" name="frontClearanceLights" value="0"> Clearance Lights</input><br />
                    <input type="checkbox" name="frontIdentificationLights" value="0"> Identification Lights</input><br />
                    <input type="checkbox" name="frontTurnSignals" value="0"> Turn Signals and 4-way flasher</input><br />
                    <input type="checkbox" name="frontTiresWheels" value="0"> Tires and Wheels (Lugs)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="leftSide" class="control-label col-md-2">Left Side</label>
                <div class="col-md-10">
                    <input type="checkbox" name="leftFuelTankCap" value="0"> Fuel Tank and Cap</input><br />
                    <input type="checkbox" name="leftSidemarkerLights" value="0"> Sidemarker Lights</input><br />
                    <input type="checkbox" name="leftReflectors" value="0"> Reflectors</input><br />
                    <input type="checkbox" name="leftTiresWheels" value="0"> Tires and Wheels (Lugs)</input><br />
                    <input type="checkbox" name="leftCargoTiedowns" value="0"> Cargo Tie-downs/or Doors</input>
                </div>
            </div>

            <div class="form-group">
                <label for="rear" class="control-label col-md-2">Rear</label>
                <div class="col-md-10">
                    <input type="checkbox" name="rearTailLights" value="0"> Tail Lights</input><br />
                    <input type="checkbox" name="rearStopLights" value="0"> Stop Lights</input><br />
                    <input type="checkbox" name="rearTurnSignals" value="0"> Turn Signals and 4-way flasher</input><br />
                    <input type="checkbox" name="rearClearanceLights" value="0"> Clearance Lights</input><br />
                    <input type="checkbox" name="rearIdentificationLights" value="0"> Identification Lights</input><br />
                    <input type="checkbox" name="rearReflectors" value="0"> Reflectors</input><br />
                    <input type="checkbox" name="rearTiresWheels" value="0"> Tires and Wheels (Lugs)</input><br />
                    <input type="checkbox" name="rearRearProtection" value="0"> Rear End Protection (Bumper)</input><br />
                    <input type="checkbox" name="rearCargoTiedowns" value="0"> Cargo Tie-downs/or Doors</input>
                </div>
            </div>

            <div class="form-group">
                <label for="rightSide" class="control-label col-md-2">Right Side</label>
                <div class="col-md-10">
                    <input type="checkbox" name="rightFuelTankCap" value="0"> Fuel Tank and Cap</input><br />
                    <input type="checkbox" name="rightSidemarkerLights" value="0"> Sidemarker Lights</input><br />
                    <input type="checkbox" name="rightReflectors" value="0"> Reflectors</input><br />
                    <input type="checkbox" name="rightTiresWheels" value="0"> Tires and Wheels (Lugs)</input><br />
                    <input type="checkbox" name="rightCargoTiedowns" value="0"> Cargo Tie-downs/or Doors</input>
                </div>
            </div>

            <div class="form-group">
                <label for="onCombinations" class="control-label col-md-2">On Combinations</label>
                <div class="col-md-10">
                    <input type="checkbox" name="onCombinationsHosesCouplers" value="0"> Hoses and Couplers</input><br />
                    <input type="checkbox" name="onCombinationsElectricalConnector" value="0"> Electrical Connector</input><br />
                    <input type="checkbox" name="onCombinationsCouplings" value="0"> Couplings (Fifth wheel, tow bar, safety chains, locking devices)</input>
                </div>
            </div>

            <div class="form-group">
                <label for="onHazMaterials" class="control-label col-md-2">On Vehicles Transporting Hazardous Materials</label>
                <div class="col-md-10">
                    <input type="checkbox" name="onHazMaterialsMarkingPlacards" value="0"> Marking or Placards</input><br />
                    <input type="checkbox" name="onHazMaterialsShippingPapers" value="0"> Proper Shipping Papers</input>
                </div>
            </div>

            <div class="form-group">
                <label for="stopEngine" class="control-label col-md-2">Stop Engine</label>
                <div class="col-md-10">
                    <input type="checkbox" name="stopEngineReleaseTrailerBrakes" value="0"> Release Trailer Emergency Brakes</input><br />
                    <input type="checkbox" name="stopEngineApplyBrakesAir" value="0"> Apply service Brakes-Air loss should not exceed:<ul>
                        <li>3 psi per minute on single vehicles</li>
                        <li>4 psi per minute on combinations</li>
                    </ul></input>
                </div>
            </div>
            <!-- #messages is where the messages are placed inside -->
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <div id="messages"></div>
                </div>
            </div>            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submitBtn" value="Submit"/>
                </div>
            </div>
        <hr>
        </form>
        <form class="form-horizontal" name="insepectionForm" id="insepectionForm" method="post" action="index.php">
        <h2 class="page-header">Edit Inspection</h2>
        <?php
            if (!empty($pretrips)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Truck</th>
                                <th>Trailer</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($pretrips); $x++) {
                    echo '<tr>
                        <td>'. $pretrips[$x][1].'</td>
                        <td>'. $pretrips[$x][2].'</td>
                        <td>'. $pretrips[$x][3].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $pretrips[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table></form>';
            } else {
                echo "<p>There are currently no pre-trip inspections to view.</p>";
            }
        } else {
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
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script>
    <script type="text/javascript" src="pretrip_validation.js"></script>
</body>
</html>
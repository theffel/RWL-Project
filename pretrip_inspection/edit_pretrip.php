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
                         <?php
                        for ($x = 0; $x < count($trucks); $x++){
                            if ($trucks[$x][1] == $_SESSION['editPretrips'][0][1]) {
                                echo '<option selected value="' . $trucks[$x][0] . '">' . $trucks[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $trucks[$x][0] . '">' . $trucks[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="trailer" class="control-label col-md-2">Trailer</label>
                <div class="col-md-10">
                    <select class="form-control" name="trailer">
                        <?php
                        for ($x = 0; $x < count($trailers); $x++){
                            if ($trailers[$x][1] == $_SESSION['editPretrips'][0][1]) {
                                echo '<option selected value="' . $trailers[$x][0] . '">' . $trailers[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $trailers[$x][0] . '">' . $trailers[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>  
                </div>
            </div>

            <div class="form-group">
                <label for="inside" class="control-label col-md-2">Inside</label>
                <div class="col-md-10">
                <?php
                if($_SESSION['editPretrips'][0][3] == 0){
                    echo '<input type="checkbox" name="parkingBrake" value="1" checked> Parking Brake (Apply)</input>';
                } else {
                    echo '<input type="checkbox" name="parkingBrake" value="0"> Parking Brake (Apply)</input>';
                }
                ?>
                </div>
            </div>

            <div class="form-group">
                <label for="cleanliness" class="control-label col-md-2">Cleanliness</label>
                <div class="col-md-10">
                <?php
                if($_SESSION['editPretrips'][0][4] == 0){
                    echo '<input type="checkbox" name="cleanliness" value="1" cehcked> Cleanliness</input>';
                } else {
                    echo '<input type="checkbox" name="cleanliness" value="0"> Cleanliness</input>';
                }
                ?>                    
                </div>
            </div>

            <div class="form-group">
                <label for="startEngine" class="control-label col-md-2">Start Engine</label>
                <div class="col-md-10">
                    <?php
                    if($_SESSION['editPretrips'][0][5] == 0){
                        echo '<input type="checkbox" name="engineOilPressure" value="1" checked> Oil Pressure (Light or Gauge)</input><br />';
                    }else{
                        echo '<input type="checkbox" name="engineOilPressure" value="0"> Oil Pressure (Light or Gauge)</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][6] == 0){
                        echo '<input type="checkbox" name="engineAirPressure" value="1" checked> Air Pressure or Vacuum (Gauge)</input><br />';
                    }else{
                        echo '<input type="checkbox" name="engineAirPressure" value="0"> Air Pressure or Vacuum (Gauge)</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][7] == 0){
                        echo '<input type="checkbox" name="engineLowAir" value="1" checked> Low Air or Vacuum Warning Device (Air pressure below 40 psi check on pressure build-up. Air pressure above 60 psi deplete air until warning device works.) (Vacuum below 8 inches Hg. check on build-up. Above 8 inchdes Hg. deplete vacuum until device works.</input><br />';
                    }else{
                        echo '<input type="checkbox" name="engineLowAir" value="0"> Low Air or Vacuum Warning Device (Air pressure below 40 psi check on pressure build-up. Air pressure above 60 psi deplete air until warning device works.) (Vacuum below 8 inches Hg. check on build-up. Above 8 inchdes Hg. deplete vacuum until device works.</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][8] == 0){
                        echo '<input type="checkbox" name="engineInstrumentPanel" value="1" checked> Instrument Panel (Telltale lights or buzzers)</input><br />';
                    } else {
                        echo '<input type="checkbox" name="engineInstrumentPanel" value="0"> Instrument Panel (Telltale lights or buzzers)</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][9] == 0){
                        echo '<input type="checkbox" name="engineHorn" value="1" checked> Horn</input><br />';
                    } else {
                        echo '<input type="checkbox" name="engineHorn" value="0"> Horn</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][10] == 0){
                        echo '<input type="checkbox" name="engineWindshieldWiper" value="1" checked> Windshield Wiper and Washer</input><br />';
                    } else {
                        echo '<input type="checkbox" name="engineWindshieldWiper" value="0"> Windshield Wiper and Washer</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][11] == 0){
                        echo '<input type="checkbox" name="engineHeaterDefroster" value="1" checked> Heater - Defroster</input><br />';
                    } else {
                        echo '<input type="checkbox" name="engineHeaterDefroster" value="0"> Heater - Defroster</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][12] == 0){
                        echo '<input type="checkbox" name="engineMirrors" value="1" checked> Mirrors</input><br />';
                    } else {
                        echo '<input type="checkbox" name="engineMirrors" value="0"> Mirrors</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][13] == 0){
                        echo '<input type="checkbox" name="engineSteeringWheel" value="1" checked> Steering Wheel (Excess play)</input><br />';
                    } else {
                        echo '<input type="checkbox" name="engineSteeringWheel" value="0"> Steering Wheel (Excess play)</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][14] == 0){
                        echo '<input type="checkbox" name="engineTrailerBrakesEmergency" value="1" checked> Apply Trailer Brakes in Emergency</input><br />';
                    } else {
                        echo '<input type="checkbox" name="engineTrailerBrakesEmergency" value="0"> Apply Trailer Brakes in Emergency</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][15] == 0){
                        echo '<input type="checkbox" name="engineAllLights" value="1" checked> Turn on all lights including 4-way flasher</input><br />';
                    } else {
                        echo '<input type="checkbox" name="engineAllLights" value="0"> Turn on all lights including 4-way flasher</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][16] == 0){
                        echo '<input type="checkbox" name="engineFireExtinguisher" value="1" checked> Fire Extinguisher and Warning Devices</input>';
                    } else{
                        echo '<input type="checkbox" name="engineFireExtinguisher" value="0"> Fire Extinguisher and Warning Devices</input>';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="front" class="control-label col-md-2">Front</label>
                <div class="col-md-10">
                    <?php
                    if($_SESSION['editPretrips'][0][17] == 0){                    
                        echo '<input type="checkbox" name="frontHeadlights" value="1" checked> Headlights</input><br />';
                    } else {
                       echo '<input type="checkbox" name="frontHeadlights" value="0"> Headlights</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][18] == 0){
                        echo '<input type="checkbox" name="frontClearanceLights" value="1"> Clearance Lights</input><br />';
                    } else {
                        echo '<input type="checkbox" name="frontClearanceLights" value="1"> Clearance Lights</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][19] == 0){
                        echo '<input type="checkbox" name="frontIdentificationLights" value="1" checked> Identification Lights</input><br />';
                    } else {
                        echo '<input type="checkbox" name="frontIdentificationLights" value="0"> Identification Lights</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][20] == 0){
                       echo '<input type="checkbox" name="frontTurnSignals" value="1" checked> Turn Signals and 4-way flasher</input><br />';
                    } else {
                       echo '<input type="checkbox" name="frontTurnSignals" value="0"> Turn Signals and 4-way flasher</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][21] == 0){
                        echo '<input type="checkbox" name="frontTiresWheels" value="1" checked> Tires and Wheels (Lugs)</input>';
                    } else {
                        echo '<input type="checkbox" name="frontTiresWheels" value="0"> Tires and Wheels (Lugs)</input>';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="leftSide" class="control-label col-md-2">Left Side</label>
                <div class="col-md-10">
                    <?php
                    if($_SESSION['editPretrips'][0][22] == 0){                    
                        echo '<input type="checkbox" name="leftFuelTankCap" value="1" checked> Fuel Tank and Cap</input><br />';
                    } else {
                        echo '<input type="checkbox" name="leftFuelTankCap" value="0"> Fuel Tank and Cap</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][23] == 0){
                        echo '<input type="checkbox" name="leftSidemarkerLights" value="1" checked> Sidemarker Lights</input><br />';
                    } else {
                        echo '<input type="checkbox" name="leftSidemarkerLights" value="0"> Sidemarker Lights</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][24] == 0){
                        echo '<input type="checkbox" name="leftReflectors" value="1" checked> Reflectors</input><br />';
                    } else {
                        echo '<input type="checkbox" name="leftReflectors" value="0"> Reflectors</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][25] == 0){
                        echo '<input type="checkbox" name="leftTiresWheels" value="1" checked> Tires and Wheels (Lugs)</input><br />';
                    } else {
                        echo '<input type="checkbox" name="leftTiresWheels" value="0"> Tires and Wheels (Lugs)</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][26] == 0){
                        echo '<input type="checkbox" name="leftCargoTiedowns" value="1" checked> Cargo Tie-downs/or Doors</input>';
                    } else {
                        echo '<input type="checkbox" name="leftCargoTiedowns" value="0"> Cargo Tie-downs/or Doors</input>';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="rear" class="control-label col-md-2">Rear</label>
                <div class="col-md-10">
                    <?php
                    if($_SESSION['editPretrips'][0][27] == 0){
                        echo '<input type="checkbox" name="rearTailLights" value="1" checked> Tail Lights</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rearTailLights" value="0"> Tail Lights</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][28] == 0){
                        echo '<input type="checkbox" name="rearStopLights" value="1" checked> Stop Lights</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rearStopLights" value="0"> Stop Lights</input><br />';                        
                    }
                    if($_SESSION['editPretrips'][0][29] == 0){
                        echo '<input type="checkbox" name="rearTurnSignals" value="1" checked> Turn Signals and 4-way flasher</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rearTurnSignals" value="0"> Turn Signals and 4-way flasher</input><br />';                        
                    }
                    if($_SESSION['editPretrips'][0][30] == 0){
                        echo '<input type="checkbox" name="rearClearanceLights" value="1" checked> Clearance Lights</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rearClearanceLights" value="0"> Clearance Lights</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][31] == 0){
                        echo '<input type="checkbox" name="rearIdentificationLights" value="1" checked> Identification Lights</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rearIdentificationLights" value="0"> Identification Lights</input><br />';                        
                    }
                    if($_SESSION['editPretrips'][0][32] == 0){
                        echo '<input type="checkbox" name="rearReflectors" value="1" checked> Reflectors</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rearReflectors" value="0"> Reflectors</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][33] == 0){
                        echo '<input type="checkbox" name="rearTiresWheels" value="1" checked> Tires and Wheels (Lugs)</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rearReflectors" value="0"> Reflectors</input><br />';                        
                    }
                    if($_SESSION['editPretrips'][0][34] == 0){
                        echo '<input type="checkbox" name="rearRearProtection" value="1" checked> Rear End Protection (Bumper)</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rearReflectors" value="0"> Reflectors</input><br />';                        
                    }
                    if($_SESSION['editPretrips'][0][35] == 0){
                        echo '<input type="checkbox" name="rearCargoTiedowns" value="1" checked> Cargo Tie-downs/or Doors</input>';
                    } else {
                        echo '<input type="checkbox" name="rearReflectors" value="0"> Reflectors</input><br />';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="rightSide" class="control-label col-md-2">Right Side</label>
                <div class="col-md-10">
                    <?php
                    if($_SESSION['editPretrips'][0][36] == 0){
                        echo '<input type="checkbox" name="rightFuelTankCap" value="1" checked> Fuel Tank and Cap</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rightFuelTankCap" value="0"> Fuel Tank and Cap</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][37] == 0){
                        echo '<input type="checkbox" name="rightSidemarkerLights" value="1" checked> Sidemarker Lights</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rightSidemarkerLights" value="0"> Sidemarker Lights</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][38] == 0){
                        echo '<input type="checkbox" name="rightReflectors" value="1" checked> Reflectors</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rightReflectors" value="0"> Reflectors</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][39] == 0){
                        echo '<input type="checkbox" name="rightTiresWheels" value="1" checked> Tires and Wheels (Lugs)</input><br />';
                    } else {
                        echo '<input type="checkbox" name="rightTiresWheels" value="0"> Tires and Wheels (Lugs)</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][40] == 0){
                        echo '<input type="checkbox" name="rightCargoTiedowns" value="1" checked> Cargo Tie-downs/or Doors</input>';
                    } else {
                        echo '<input type="checkbox" name="rightTiresWheels" value="0"> Tires and Wheels (Lugs)</input><br />';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="onCombinations" class="control-label col-md-2">On Combinations</label>
                <div class="col-md-10">
                    <?php
                    if($_SESSION['editPretrips'][0][41] == 0){
                        echo '<input type="checkbox" name="onCombinationsHosesCouplers" value="1" checked> Hoses and Couplers</input><br />';
                    } else {
                        echo '<input type="checkbox" name="onCombinationsHosesCouplers" value="0"> Hoses and Couplers</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][42] == 0){
                        echo '<input type="checkbox" name="onCombinationsElectricalConnector" value="1" checked> Electrical Connector</input><br />';
                    } else {
                        echo '<input type="checkbox" name="onCombinationsElectricalConnector" value="0"> Electrical Connector</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][43] == 0){
                        echo '<input type="checkbox" name="onCombinationsCouplings" value="1" checked> Couplings (Fifth wheel, tow bar, safety chains, locking devices)</input>';
                    } else {
                        echo '<input type="checkbox" name="onCombinationsCouplings" value="0"> Couplings (Fifth wheel, tow bar, safety chains, locking devices)</input>';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="onHazMaterials" class="control-label col-md-2">On Vehicles Transporting Hazardous Materials</label>
                <div class="col-md-10">
                    <?php
                    if($_SESSION['editPretrips'][0][44] == 0){
                        echo '<input type="checkbox" name="onHazMaterialsMarkingPlacards" value="1" checked> Marking or Placards</input><br />';
                    } else {
                        echo '<input type="checkbox" name="onHazMaterialsMarkingPlacards" value="0"> Marking or Placards</input><br />';
                    }
                    if($_SESSION['editPretrips'][0][45] == 0){
                        echo '<input type="checkbox" name="onHazMaterialsShippingPapers" value="1" checked> Proper Shipping Papers</input>';
                    } else {
                        echo '<input type="checkbox" name="onHazMaterialsShippingPapers" value="0"> Proper Shipping Papers</input>';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="stopEngine" class="control-label col-md-2">Stop Engine</label>
                <div class="col-md-10">
                    <?php
                    if($_SESSION['editPretrips'][0][46] == 0){
                        echo '<input type="checkbox" name="stopEngineReleaseTrailerBrakes" value="1" checked> Release Trailer Emergency Brakes</input><br />';
                    } else {
                        echo '<input type="checkbox" name="stopEngineReleaseTrailerBrakes" value="0"> Release Trailer Emergency Brakes</input><br />';

                    }
                    if($_SESSION['editPretrips'][0][47] == 0){
                        echo '<input type="checkbox" name="stopEngineApplyBrakesAir" value="1" checked> Apply service Brakes-Air loss should not exceed:<ul>
                        <li>3 psi per minute on single vehicles</li>
                        <li>4 psi per minute on combinations</li>';
                    } else {
                        echo '<input type="checkbox" name="stopEngineApplyBrakesAir" value="0"> Apply service Brakes-Air loss should not exceed:<ul>
                        <li>3 psi per minute on single vehicles</li>
                        <li>4 psi per minute on combinations</li>';                        
                    }
                        ?>
                    </ul></input>
                </div>
            </div>
            <!-- #messages is where the messages are placed inside -->
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <div id="messages"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="updateBtn" value="Update"/>
                </div>
            </div>
        </form>
        <?php
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
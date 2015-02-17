<?php
/**
 * This page allows the user to add a pickup.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @author      Trevor Heffel
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-23
 */

// Start the session
session_start();

// Include php files
include('../database.php');
include('pickup_script.php');
include('../header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pick Up</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Pick Up</li>
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
        <h2 class="page-header">Add an Incoming Delivery</h2>
        <form class="form-horizontal" name="pickForm" id="pickForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="date" value="<?php echo $dateTime; ?>">
                        </div>
                        <label for="loadsLeft" class="control-label col-md-2">Loads Left</label>
                        <div class="col-md-1">
                            <input type="text" class="form-control" name="loadsLeft">
                        </div>
                        <label for="totalLoads" class="control-label col-md-2">Total Loads</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="totalLoads">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="driver" class="control-label col-md-2">Driver</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <select class="form-control" name="driver">
                                <?php
                                for ($x = 0; $x < count($drivers); $x++){
                                    echo '<option value="' . $drivers[$x][0] .'">' . $drivers[$x][1] .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <label for="dispatcher" class="control-label col-md-2">Dispatcher</label>
                        <div class="col-md-5">
                            <select class="form-control" name="dispatcher">
                                <?php
                                for ($x = 0; $x < count($dispatchers); $x++){
                                    echo '<option value="' . $dispatchers[$x][0] .'">' . $dispatchers[$x][1] .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <select class="form-control" name="truck">
                                <?php
                                for ($x = 0; $x < count($trucks); $x++){
                                    echo '<option value="' . $trucks[$x][0] .'">' . $trucks[$x][1] .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <label for="trailer" class="control-label col-md-2">Trailer</label>
                        <div class="col-md-5">
                            <select class="form-control" name="trailer">
                                <?php
                                for ($x = 0; $x < count($trailers); $x++){
                                    echo '<option value="' . $trailers[$x][0] .'">' . $trailers[$x][1] .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="page-header">Farm</h3>
            <div class="form-group">
                <label for="farm" class="control-label col-md-2">Farm</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <select class="form-control" id="farm" name="farm" onchange="warehouseFunction(this.value)">
                                <option value="" disabled selected style="display:none;"></option>
                                <?php
                                for ($x = 0; $x < count($farms); $x++){
                                    echo '<option value="' . $farms[$x][0] .'">' . $farms[$x][1] .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <label for="warehouse" class="control-label col-md-2">Warehouse</label>
                        <div class="col-md-5">
                            <select class="form-control" name="warehouse" id="warehouse" onchange="binFunction(this.value)">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="bin" class="control-label col-md-2">Bin</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <select class="form-control" name="bin" id="bin" onchange="fieldFunction(this.value)">
                            </select>
                        </div>
                        <label for="binMarker" class="control-label col-md-2">Bin Marker</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="binMarker">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="field" class="control-label col-md-2">Field</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <select class="form-control" name="field" id="field">
                            </select>
                        </div>
                        <label for="potato" class="control-label col-md-2">Potato</label>
                        <div class="col-md-5">
                            <select class="form-control" name="potato" id="potato">
                                <option value="" disabled selected style="display:none;"></option>
                                <?php
                                for ($x = 0; $x < count($potatoes); $x++){
                                    echo '<option value="' . $potatoes[$x][0] .'">' . $potatoes[$x][1] .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="farmArrivalTime" class="control-label col-md-2">Arrival Time</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="farmArrivalTime" name="farmArrivalTime" value="">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary" value="farmArrivalTime" name="farmArrivalTimeBtn" onclick="getTime(this.value)" >&nbsp;&nbsp;&nbsp;&nbsp;Arrival Time&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="loadTime" class="control-label col-md-2">Load Time</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="loadTime" name="loadTime" value="">
                        </div>
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="loadTimeBtn" value="loadTime" onclick="getTime(this.value)">&nbsp;&nbsp;&nbsp;&nbsp;Load Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="farmDepartureTime" class="control-label col-md-2">Departure Time</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="farmDepartureTime" name="farmDepartureTime" value="">
                        </div>
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="farmDepartureTimeBtn" value="farmDepartureTime" onclick="getTime(this.value)">Departure Time&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="page-header">Potato Solutions</h3>
            <div class="form-group">
                <label for="rwlArrivalTime" class="control-label col-md-2">Arrival Time</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="rwlArrivalTime" name="rwlArrivalTime" value="">
                        </div>
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="rwlArrivalTimeBtn" value="rwlArrivalTime" onclick="getTime(this.value)">&nbsp;&nbsp;&nbsp;&nbsp;Arrival Time&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="rwlUnloadTime" class="control-label col-md-2">Unload Time</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="rwlUnloadTime" name="rwlUnloadTime" value="">
                        </div>
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="rwlUnloadTimeBtn" value="rwlUnloadTime" onclick="getTime(this.value)">&nbsp;&nbsp;&nbsp;Unload Time&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="rwlDepartureTime" class="control-label col-md-2">Departure Time</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="rwlDepartureTime" name="rwlDepartureTime" value="">
                        </div>
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="rwlDepartureTimeBtn" value="rwlDepartureTime" onclick="getTime(this.value)">Departure Time&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="ticketNumber" class="control-label col-md-2">Ticket Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="ticketNumber" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="grossWeight" class="control-label col-md-2">Gross Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="grossWeight" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="tareWeight" class="control-label col-md-2">Tare Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tareWeight" placeholder="">
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
                     <input type="submit" class="btn btn-primary" name="submitBtn" value="Submit"/>
                </div>
            </div>
        <hr>
        </form>
        <form class="form-horizontal" name="pickorm" id="pickForm" method="post" action="index.php">
        <h2 class="page-header">Edit Incoming Delivery</h2>
        <?php
            if (!empty($incomingDeliveries)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Truck</th>
                                <th>Trailer</th>
                                <th>Farm</th>
                                <th>Warehouse</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($incomingDeliveries); $x++) {
                    echo '<tr>
                        <td>'. $incomingDeliveries[$x][1].'</td>
                        <td>'. $incomingDeliveries[$x][2].'</td>
                        <td>'. $incomingDeliveries[$x][3].'</td>
                        <td>'. $incomingDeliveries[$x][4].'</td>
                        <td>'. $incomingDeliveries[$x][5].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $incomingDeliveries[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table></form>';
            } else {
                echo "<p>There are currently no incoming deliveries to view.</p>";
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
    <!-- Custom JavaScript -->
    <script src="../js/custom_js.js"></script>
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script>
    <script type="text/javascript" src="pickup_validation.js"></script>
</body>
</html>
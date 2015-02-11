<?php
/**
 * Description for file goes here.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     x.xx
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-13
 */

// Start the session
session_start();

// Include php files
include('../database.php');
include('../header.php');
include('shipping_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Shipping</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Shipping</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $potatoes = (!empty($_SESSION['potatoes'])) ? $_SESSION['potatoes'] : "";
        $farms = (!empty($_SESSION['farms'])) ? $_SESSION['farms'] : "";
        $destination = (!empty($_SESSION['destinations'])) ? $_SESSION['destinations'] : "";
        $shipDetails = (!empty($_SESSION['shipDetails'])) ? $_SESSION['shipDetails'] : "";

        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 2) {
        ?>
        <h2 class="page-header">Add a Shipment</h2>
        <form class="form-horizontal" name="shipForm" id="shipForm" method="post" action="index.php">
           <h2 class="page-header">RWL</h2>
            <div class="form-group">

                <label for="rwlLoadBegin" class="control-label col-md-2">Load Time Begin</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="rwlLoadBegin" name="rwlLoadBegin" value="">
                        </div>  
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="rwlLoadBeginBtn" value="rwlLoadBegin" onclick="getTime(this.value)">&nbsp;&nbsp;&nbsp;&nbsp;Begin&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <label for="rwlLoadEnd" class="control-label col-md-2">Load Time End</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="rwlLoadEnd" name="rwlLoadEnd" value="">
                        </div>  
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="rwlLoadEndBtn" value="rwlLoadEnd" onclick="getTime(this.value)">&nbsp;&nbsp;&nbsp;End&nbsp;&nbsp;&nbsp;</button>
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
                        <button type="button" class="btn btn-primary" name="rwlDepartureTimeBtn" value="rwlDepartureTime" onclick="getTime(this.value)">Depart&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <label for="potato" class="control-label col-md-2">Potato</label>
                <div class="col-md-10">
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
            <div class="form-group">
                <label for="potProd" class="control-label col-md-2">Potato Producer</label>
                <div class="col-md-10">
                    <select class="form-control" id="farm" name="farm" onchange="warehouseFunction(this.value)">
                        <option value="" disabled selected style="display:none;"></option>
                        <?php
                        for ($x = 0; $x < count($farms); $x++){
                            echo '<option value="' . $farms[$x][0] .'">' . $farms[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="truck" class="control-label col-md-2">Truck #</label>
                <div class="col-md-10">
                    <select class="form-control" name="truck">
                        <?php
                        for ($x = 0; $x < count($trucks); $x++){
                            echo '<option value="' . $trucks[$x][0] .'">' . $trucks[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="trailer" class="control-label col-md-2">Trailer #</label>
                <div class="col-md-10">
                    <select class="form-control" name="trailer">
                        <?php
                        for ($x = 0; $x < count($trailers); $x++){
                            echo '<option value="' . $trailers[$x][0] .'">' . $trailers[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>             
            </div> 
            <div class="form-group">
                <label for="dispatcher" class="control-label col-md-2">Dispatcher</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <select class="form-control" name="dispatcher">
                                <?php
                                for ($x = 0; $x < count($dispatchers); $x++){
                                    echo '<option value="' . $dispatchers[$x][0] .'">' . $dispatchers[$x][1] .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <label for="driver" class="control-label col-md-2">Driver</label>
                        <div class="col-md-5">
                            <select class="form-control" name="driver">
                                <?php
                                for ($x = 0; $x < count($drivers); $x++){
                                    echo '<option value="' . $drivers[$x][0] .'">' . $drivers[$x][1] .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>           
            <div class="form-group">
                <label for="rwlTicNum" class="control-label col-md-2">RWL Ticket Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="rwlTicNum">
                </div>
            </div>
            <div class="form-group">
                <label for="weight" class="control-label col-md-2">Weight Shipped</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="weight">
                </div>
            </div>
            <div class="form-group">
                <label for="washed" class="control-label col-md-2">Washed</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="washed" value="0"> Yes</li>
                        <li><input type="radio" name="washed" value="1"> No</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="destination" class="control-label col-md-2">Destination</label>
                <div class="col-md-10">
                    <select class="form-control" id="destination" name="destination">
                        <?php
                        for ($x = 0; $x < count($destination); $x++){
                            echo '<option value="' . $destination[$x][0] .'">' . $destination[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <h2 class="page-header">Processor</h2>
            <div class="form-group">
                <label for="procArrivalTime" class="control-label col-md-2">Arrival Time</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="procArrivalTime" name="procArrivalTime" value="">
                        </div>  
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="procArrivalTimeBtn" value="procArrivalTime" onclick="getTime(this.value)">&nbsp;&nbsp;&nbsp;&nbsp;Arrival&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <label for="procUnloadBegin" class="control-label col-md-2">Unload Time Begin</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="procUnloadBegin" name="procUnloadBegin" value="">
                        </div>  
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="procUnloadBeginBtn" value="procUnloadBegin" onclick="getTime(this.value)">&nbsp;&nbsp;&nbsp;Begin&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <label for="procUnloadEnd" class="control-label col-md-2">Unload Time End</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="procUnloadEnd" name="procUnloadEnd" value="">
                        </div>  
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="procUnloadEndBtn" value="procUnloadEnd" onclick="getTime(this.value)">End&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="procDepartureTime" class="control-label col-md-2">Departure Time</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="procDepartureTime" name="procDepartureTime" value="">
                        </div>  
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" name="procDepartureTimeBtn" value="procDepartureTime" onclick="getTime(this.value)">Depart&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="procTicNum" class="control-label col-md-2">Processor Ticket Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="procTicNum" placeholder="">
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
            <div class="form-group">
                <label for="rejected" class="control-label col-md-2">Rejected</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="rejected" value="0"> Yes</li>
                        <li><input type="radio" name="rejected" value="1"> No</li>
                    </ul>
                </div>
            </div>            
<!--            <div class="form-group">
                <label for="truckCleaned" class="control-label col-md-2">Truck Cleaned Upon Return</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="truckCleaned" value="Yes"> Yes</li>
                        <li><input type="radio" name="truckCleaned" value="No"> No</li>
                    </ul>
                </div>
            </div> -->
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>
<hr>
        <h2 class="page-header">Edit Shipping</h2>
        <?php
            if (!empty($shipDetails)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Potato</th>
                                <th>Farm</th>
                                <th>Trailer</th>
                                <th>Weight</th>
                                <th>Destination</th> 
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($shipDetails); $x++) {
                    echo '<tr>
                        <td>'. $shipDetails[$x][1].'</td>
                        <td>'. $shipDetails[$x][2].'</td>
                        <td>'. $shipDetails[$x][3].'</td>
                        <td>'. $shipDetails[$x][4].'</td>
                        <td>'. $shipDetails[$x][5].'</td>
                        <td>'. $shipDetails[$x][6].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $shipDetails[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table>  </form>';
            } else {
                echo "<p>There are currently no shipping details to view.</p>";
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
</body>
</html>
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
        if ($loggedIn == true && $attendanceId != 0 && $employeeType == 2) {
        ?>
        <h2 class="page-header">Add a Shipment</h2>
        <form class="form-horizontal" name="shipForm" id="shipForm" method="post" action="index.php">
          
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
                    <select class="form-control" id="farm" name="farm" onchange="warehouseFunction(this.value)">                        <?php
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
        <h2 class="page-header">Edit Shipping</h2>
        <?php
            if (!empty($shipDetails)) {
                echo '<table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Potato</th>
                                <th>Farm</th>
                                <th>Truck</th>
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
                        <td>'. $shipDetails[$x][7].'</td>
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
    <!-- Validation JavaScript -->
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script>
    <script type="text/javascript" src="shipping_validation.js"></script>
</body>
</html>
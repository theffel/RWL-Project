<?php
/**
 * Delivery index page.
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
include('delivery_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Delivery</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Delivery</li>
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
        if ($loggedIn == true && $attendanceId != 0 && $employeeType == 1) {
        ?>
        <h2 class="page-header">Add a Delivery</h2>
        <form class="form-horizontal" name="deliveryForm" id="deliveryForm" method="post" action="delivery.php">   
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
                    <!--<input type="checkbox" class="form-control" name="rejected" onclick="return rejected();" placeholder="">-->
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
        <h2 class="page-header">Edit Delivery</h2>
        <?php
            if (!empty($deliveryDetails)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Arrival Time</th>
                                <th>Unload Time Begin</th>
                                <th>Unload Time End</th>
                                <th>Departure Time</th>
                                <th>Processor Ticket Number</th>
                                <th>Gross Weight</th> 
                                <th>Tare Weight</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($deliveryDetails); $x++) {
                    echo '<tr>
                        <td>'. $deliveryDetails[$x][1].'</td>
                        <td>'. $deliveryDetails[$x][2].'</td>
                        <td>'. $deliveryDetails[$x][3].'</td>
                        <td>'. $deliveryDetails[$x][4].'</td>
                        <td>'. $deliveryDetails[$x][5].'</td>
                        <td>'. $deliveryDetails[$x][6].'</td>
                        <td>'. $deliveryDetails[$x][7].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $deliveryDetails[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table>  </form>';
            } else {
                echo "<p>There are currently no delivery details to view.</p>";
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
    <script type="text/javascript" src="delivery_validation.js"></script>
</body>
</html>
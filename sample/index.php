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
 * @since       2015-01-16
 */

// Start the session
session_start();

// Include the database.php file
include('../database.php');

// Include the header.php file
include('../header.php');

// Include the sample_script.php file
include('sample_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sample</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Sample</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $trailers = (!empty($_SESSION['trailers'])) ? $_SESSION['trailers'] : "";
        $potatoes = (!empty($_SESSION['potatoes'])) ? $_SESSION['potatoes'] : "";

        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 4) {
        ?>
        <h2 class="page-header">Add a Sample</h2>

        <form class="form-horizontal" name="sampleForm" id="sampleForm" method="post" action="index.php">

            <div class="form-group row">
                <label for="trailer" class="control-label col-md-2">Trailer #</label>
                <div class="col-md-4">
                    <select class="form-control" name="trailer">
                        <?php
                        for ($x = 0; $x < count($trailers); $x++){
                            echo '<option value="' . $trailers[$x][0] .'">' . $trailers[$x][1] .'</option>';
                        }
                        ?>
                    </select>                    
                </div>
                <label for="numSample" class="control-label col-md-2">Number of Sample(s)</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="numOfSample" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="incomingOutgoing" class="control-label col-md-2">Incoming / Outgoing</label>
                <div class="col-md-4">
                    <ul class="list-inline">
                        <li><input type="radio" name="incomingOutgoing" value="0"> Incoming</li>
                        <li><input type="radio" name="incomingOutgoing" value="1"> Outgoing</li>
                    </ul>
                </div>
                <label for="potato" class="control-label col-md-2">Potato</label>
                <div class="col-md-4">
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
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name= "date" value= "<?php echo $dateTime; ?>">                  
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label for="total" class="control-label col-md-2">Total</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="totalWeight" class="col-md-1 control-label">Sample Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="totalWeight" value="" onchange="setSampleWeight(this.value)">
                        </div>
                        <label for="useablePercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="totalPercent" name="totalPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label for="unusable" class="control-label col-md-2">Unusable</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="useableWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="unuseableWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="useablePercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="unuseablePercent" name="unuseablePercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="rot" class="control-label col-md-2">Rot</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="rotWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="rotWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="rotPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="rotPercent" name="rotPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="internal" class="control-label col-md-2">Internal</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="internalWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="internalWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="internalPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="internalPercent" name="internalPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pit Rot naming conventions changed for reusable code in custom.js to pitrot instead of pitRot-->

            <div class="form-group">
                <label for="pitRot" class="control-label col-md-2">Pit Rot</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="pitRotWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="pitrotWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="pitRotPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="pitrotPercent" name="pitrotPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="wireworm" class="control-label col-md-2">Wireworm</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="wirewormWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="wirewormWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="wirewormPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="wirewormPercent" name="wirewormPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jelly End naming conventions changed for reusable code in custom.js to jellyend instead of jellyEnd   -->

            <div class="form-group">
                <label for="jellyEnd" class="control-label col-md-2">Jelly End</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="jellyEndWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="jellyendWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="jellyEndPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="jellyendPercent" name="jellyendPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="other" class="control-label col-md-2">Other</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="otherWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="otherWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="otherPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="otherPercent" name="otherPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hollow Heart naming conventions changed for reusable code in custom.js to hollowheart instead of hollowHeart-->

            <div class="form-group">
                <label for="hollowHeart" class="control-label col-md-2">Hollow Heart</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="hollowHeartWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="hollowheartWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="hollowHeartPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="hollowheartPercent" name="hollowheartPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="scab" class="control-label col-md-2">Scab</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="scabWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="scabWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="scabPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="scabPercent" name="scabPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="sunburn" class="control-label col-md-2">Sunburn</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="sunburnWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="sunburnWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="sunburnPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="sunburnPercent" name="sunburnPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mech Bruise naming conventions changed for reusable code in custom.js to mechbruise instead of mechBruise-->

            <div class="form-group">
                <label for="mechBruise" class="control-label col-md-2">Mech Bruise</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="mechBruiseWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="mechbruiseWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="mechBruisePercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="mechbruisePercent" name="mechbruisePercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="smalls" class="control-label col-md-2">Smalls</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="smallsWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="smallsWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="smallsPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="smallsPercent" name="smallsPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="10oz" class="control-label col-md-2">10oz</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="10ozWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="tenozsWeight" value="" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="10ozPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="tenozsPercent" name="tenozsPercent" value="" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="airWeight" class="control-label col-md-2">Air Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="airWeight">
                </div>
            </div>

            <div class="form-group">
                <label for="waterWeight" class="control-label col-md-2">Water Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="waterWeight">
                </div>
            </div>

            <div class="form-group">
                <label for="rockMaterial" class="control-label col-md-2">Rock & Foreign Material</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="rockWeight">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>
        <hr>

        <h2 class="page-header">Edit Samples</h2>
        <?php
            if (!empty($samples)) {
                echo '<table class="table">
                        <thead>
                           <tr>
                                <th>Date</th>
                                <th>Trailer</th>
                                <th>Number</th>
                                <th>Potato</th>
                            </tr>
                        </thead>
                        <tbody>';
                for ($x = 0; $x < count($samples); $x++) {
                    echo '<tr>
                        <td>'. $samples[$x][1].'</td>
                        <td>'. $samples[$x][2].'</td>
                        <td>'. $samples[$x][3].'</td>
                        <td>'. $samples[$x][4].'</td>
                        <td><input type="submit" class="btn btn-primary" name="'. $samples[$x][0].'" value="Edit"/></td>
                    </tr>';
                }
                echo '</tbody></table></form>';
            } else {
                echo "<p>There are currently no samples to view.</p>";
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
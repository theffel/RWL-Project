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

// Include php files
include('../database.php');
include('../header.php');
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
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 3 || $employeeType == 4) {
        ?>
        <h2 class="page-header">Add a Sample</h2>

        <form class="form-horizontal" name="sampleForm" id="sampleForm" method="post" action="index.php">

            <div class="form-group row">
                <label for="trailer" class="control-label col-md-2">Trailer #</label>
                <div class="col-md-4">
                    <select class="form-control" name="trailer">
                        <?php
                        for ($x = 0; $x < count($trailers); $x++){
                            if ($trailers[$x][0] == $_SESSION['editSamples'][0][0]) {
                                echo '<option selected value="' . $trailers[$x][0] . '">' . $trailers[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $trailers[$x][0] . '">' . $trailers[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <label for="numSample" class="control-label col-md-2">Number of Sample(s)</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="numOfSample" value="<?php echo $_SESSION['editSamples'][0][1]; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="incomingOutgoing" class="control-label col-md-2">Incoming / Outgoing</label>
                <div class="col-md-4">
                    <ul class="list-inline">
                        <?php
                        if ($_SESSION['editSamples'][0][2] == 0 ) {
                            echo '<li><input type="radio" name="incomingOutgoing" value="0" checked> Incoming</li>';
                            echo '<li><input type="radio" name="incomingOutgoing" value="1"> Outgoing</li>';
                        } else {
                            echo '<li><input type="radio" name="incomingOutgoing" value="0" > Incoming</li>';
                            echo '<li><input type="radio" name="incomingOutgoing" value="1" checked> Outgoing</li>';
                        }
                        ?>
                    </ul>
                </div>
                <label for="potato" class="control-label col-md-2">Potato</label>
                <div class="col-md-4">
                    <select class="form-control" name="potato">
                        <?php
                        for ($x = 0; $x < count($potatoes); $x++){
                            if ($potatoes[$x][0] == $_SESSION['editSamples'][0][3]) {
                                echo '<option selected value="' . $potatoes[$x][0] . '">' . $potatoes[$x][1] . '</option>';
                            } else {
                                echo '<option value="' . $potatoes[$x][0] . '">' . $potatoes[$x][1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                   <input type="text" class="form-control" name= "date" value= "<?php echo $_SESSION['editSamples'][0][4]; ?>">
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label for="total" class="control-label col-md-2">Total</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="totalWeight" class="col-md-1 control-label">Sample Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="totalWeight" value="<?php echo $_SESSION['editSamples'][0][5]; ?>" onchange="setSampleWeight(this.value)">
                        </div>
                        <label for="useablePercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="totalPercent" name="totalPercent"  disabled>
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
                            <input type="text" class="form-control" name="unuseableWeight" value="<?php echo $_SESSION['editSamples'][0][6]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="useablePercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="unuseablePercent" name="unuseablePercent"  disabled>
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
                            <input type="text" class="form-control" name="rotWeight" value="<?php echo $_SESSION['editSamples'][0][7]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="rotPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="rotPercent" name="rotPercent"  disabled>
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
                            <input type="text" class="form-control" name="internalWeight" value="<?php echo $_SESSION['editSamples'][0][8]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="internalPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="internalPercent" name="internalPercent"  disabled>
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
                            <input type="text" class="form-control" name="pitrotWeight" value="<?php echo $_SESSION['editSamples'][0][9]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="pitRotPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="pitrotPercent" name="pitrotPercent"  disabled>
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
                            <input type="text" class="form-control" name="wirewormWeight" value="<?php echo $_SESSION['editSamples'][0][10]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="wirewormPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="wirewormPercent" name="wirewormPercent"  disabled>
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
                            <input type="text" class="form-control" name="jellyendWeight" value="<?php echo $_SESSION['editSamples'][0][11]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="jellyEndPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="jellyendPercent" name="jellyendPercent"  disabled>
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
                            <input type="text" class="form-control" name="otherWeight" value="<?php echo $_SESSION['editSamples'][0][12]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="otherPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="otherPercent" name="otherPercent"  disabled>
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
                            <input type="text" class="form-control" name="hollowheartWeight" value="<?php echo $_SESSION['editSamples'][0][13]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="hollowHeartPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="hollowheartPercent" name="hollowheartPercent"  disabled>
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
                            <input type="text" class="form-control" name="scabWeight" value="<?php echo $_SESSION['editSamples'][0][14]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="scabPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="scabPercent" name="scabPercent"  disabled>
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
                            <input type="text" class="form-control" name="sunburnWeight" value="<?php echo $_SESSION['editSamples'][0][15]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="sunburnPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="sunburnPercent" name="sunburnPercent"  disabled>
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
                            <input type="text" class="form-control" name="mechbruiseWeight" value="<?php echo $_SESSION['editSamples'][0][16]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="mechBruisePercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="mechbruisePercent" name="mechbruisePercent"  disabled>
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
                            <input type="text" class="form-control" name="smallsWeight" value="<?php echo $_SESSION['editSamples'][0][17]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="smallsPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="smallsPercent" name="smallsPercent"  disabled>
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
                            <input type="text" class="form-control" name="tenozsWeight" value="<?php echo $_SESSION['editSamples'][0][18]; ?>" onchange="calculatePercent(this.value, this.name)">
                        </div>
                        <label for="10ozPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="tenozsPercent" name="tenozsPercent"  disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="airWeight" class="control-label col-md-2">Air Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="airWeight" value="<?php echo $_SESSION['editSamples'][0][19]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="waterWeight" class="control-label col-md-2">Water Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="waterWeight" value="<?php echo $_SESSION['editSamples'][0][20]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="rockMaterial" class="control-label col-md-2">Rock & Foreign Material</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="rockWeight" value="<?php echo $_SESSION['editSamples'][0][21]; ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="update" value="Update"/>
                </div>
            </div>
        <hr>
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
        <!-- Custom JavaScript -->
    <script src="../js/custom_js.js"></script>
</body>
</html>
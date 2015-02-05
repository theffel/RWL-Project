<?php
/**
 * This page allows the user to show report from DB
 *
 * PHP version 5
 *
 *
 * @category    Report
 * @package     report_view.php
 * @author      KangHyeok Lee
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.0
 * @link        http://theffel.hccis.info/report/report_view.php
 * @since       2015-01-21
 */

// Include the report_script.php file
include('report_script.php');

// Include the header.php file
include('../database.php');
include('../header.php');
?>

<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Report</h1>
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li class="active">Report</li>
            </ol>
        </div>
    </div>

    <!-- /.row -->
    <?php

    // If the user click the Attendance button, display Attendance report.
    if (isset($_POST['Attendance'])) {
        ?>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <h3 class="page-header">Daily Employee Attendance List for RWL Holdings</h3>
                <hr><br>
                Date : <?php echo $currentDate ?>
                <hr><br>
            </div>
        </div>
        <div class="CSSTableGenerator">
            <div class="col-md-offset-2 col-md-10">
                <table>
                    <tr>
                        <th>
                            NAME
                        </th>
                        <th>
                            PUNCH IN
                        </th>
                        <th>
                            PUNCH OUT
                        </th>
                        <th>
                            Start Break 1
                        </th>
                        <th>
                            End Break 1
                        </th>
                        <th>
                            Lunch Break
                        </th>
                        <th>
                            Lunch Break
                        </th>
                        <th>
                            Start Break 2
                        </th>
                        <th>
                            End Break 2
                        </th>
                    </tr>
                    <tr>
                        <?php
                            $attendanceData = $_SESSION['attendance'];
                            $breakData = $_SESSION['break'];

//                            For error checking script
//                            print_r($attendanceData);
//                            echo "<br>";
//                            print_r($breakData); echo "<br>";
                            //Get data from multi dimension Seesion variable
                            for($x = 0; $x < count($_SESSION['attendance']); $x++) {
                                for($i = 0 ; $i <count($_SESSION['attendance'][$x]); $i++) {
                                    echo "<td>";
                                        echo $attendanceData[$x][$i][0] . " " . $attendanceData[$x][$i][1]; //show first and last name
                                    echo "</td>";
                                    echo "<td>";
                                        echo $attendanceData[$x][$i][2]; //show Punch in time
                                    echo "</td>";
                                    echo "<td>";
                                        echo $attendanceData[$x][$i][3]; //show Punch out time
                                    echo "</td>";
                                }
							}

                            //Display all break time
                            for($x=0; $x < count($_SESSION['break']); $x++) {
                                for($i = 0 ; $i <count($_SESSION['break'][$x]); $i++) {
                                    echo "<td>";
                                    echo $break[$x][$i][0];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $break[$x][$i][1];
                                    echo "</td>";
                                }
                            }
                        ?>
                    </tr>

                </table>
            </div>
        </div>
        </br>
    <?php

    } else { // If the user click the Work Result button, display Work Result report.
    ?>

    <div class="CSSTableGenerator">
        <div class="col-md-offset-2 col-md-10">
            <h3 class="page-header">Daily Work Result for RWL Holdings</h3>
            <hr><br>
            Date : <?php echo $currentDate ?>
            <hr><br>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
        <?php
//         Below is for data checking
//            echo "incoming : "; print_r($_SESSION['incoming']);
//            echo "outgoing : "; print_r($_SESSION['outgoing']);
//            echo "sample : "; print_r($_SESSION['sample']);
        ?>
            <table>
                 <tr>
                    <td>
                        Total Incoming Amount:
                    </td>
                    <td>
                        <?php echo $_SESSION['incoming'][0]; ?> <!-- display total incoming amount -->
                    </td>
                </tr>
                 <tr>
                    <td>
                        Total Sample Amount:
                    </td>
                    <td>
                        <?php echo $_SESSION['sample'][0][0]; ?>  <!-- display total sample amount -->
                    </td>
                </tr>
                 <tr>
                    <td>
                        Total Good Percent:
                    </td>
                    <td>
                       <?php echo $_SESSION['sample'][0][1]; ?> %  <!-- display percentage of total good sample -->
                    </td>
                </tr>
                 <tr>
                    <td>
                        Total Outgoing Amount:
                    </td>
                    <td>
                       <?php echo $_SESSION['outgoing'][0]; ?>  <!-- display total outgoing amount -->
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </br>

    <?php
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
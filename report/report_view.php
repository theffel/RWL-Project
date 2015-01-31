<?php
/**
 * This page allows the user to enter their username and password to login to the system.
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
 * @version     1.0
 * @link        http://pear.php.net/package/PackageName
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

    // If the user is not logged in, display a login form
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
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <table>
                    <tr>
                        <td>
                            NAME
                        </td>
                        <td>
                            PUNCH IN
                        </td>
                        <td>
                            Start Break
                        </td>
                        <td>
                            End Break
                        </td>
                        <td>
                            Start Break
                        </td>
                        <td>
                            End Break
                        </td>
                        <td>
                            PUNCH OUT
                        </td>
                        <td>
                            LATE
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $_SESSION['attendance'][0][0]." ".$_SESSION['attendance'][0][1]; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['attendance'][0][2]; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['break'][0][0]; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['break'][0][1]; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['break'][1][0]; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['break'][1][1]; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['attendance'][0][3]; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        </br>
    <?php

    } else {
    ?>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <h3 class="page-header">Daily Work Result for RWL Holdings</h3>
            <hr><br>
            Date : <?php echo $currentDate ?>
            <hr><br>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <table>
                <tr>
                    <td>
                        Total Amount of Potato
                    </td>
                    <td>
                        something value
                    </td>
                </tr>
                 <tr>
                    <td>
                        Total Sample Amount
                    </td>
                    <td>
                        something value
                    </td>
                </tr>
                 <tr>
                    <td>
                        Total Good Percent
                    </td>
                    <td>
                        something value %
                    </td>
                </tr>
                 <tr>
                    <td>
                        Total Incoming Amount
                    </td>
                    <td>
                        something value
                    </td>
                </tr>
                 <tr>
                    <td>
                        Total Outgoing Amount
                    </td>
                    <td>
                        something value
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
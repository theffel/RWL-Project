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
                    
                       <?php
						// if there are people to deal with 
                        if (count($attendance)>0) {
							// for each person in the attendance array
							foreach($attendance as $emp) {
								//echo out their details
								echo "<tr><td>".$emp["name"]."</td><td>".$emp["timeIn"]."</td><td>".$emp["timeOut"]."</td>";
								
								// for each breaktime they have, make a new column and fill it up
								// NOTE: If they  have more than 3 breaks (in and out), it will just continue to make
								// columns across the page - Perhaps you are ok with this? It is more of a business rule
								// thing...
								if (count($emp["breakTimes"]) > 0) {
									foreach ($emp["breakTimes"] as $indBreak) {
										echo "<td>".$indBreak."</td>";
									}
									// now that all breaks columns are written, close the row
									echo "</tr>";
								} else {
									// if they don't have any breaktimes, close the row
									echo "</tr>";
								}
								
							}     
							
						}// end if ppl							
					?>
						
                </table>
				 
            </div>
        </div>
        </br>
    <?php

    } else {
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
                        <?php echo $_SESSION['incoming'][0]; ?>
                    </td>
                </tr>
                 <tr>
                    <td>
                        Total Sample Amount:
                    </td>
                    <td>
                        <?php echo $_SESSION['sample'][0][0]; ?>
                    </td>
                </tr>
                 <tr>
                    <td>
                        Total Good Percent:
                    </td>
                    <td>
                       <?php echo $_SESSION['sample'][0][1]; ?> %
                    </td>
                </tr>
                 <tr>
                    <td>
                        Total Outgoing Amount:
                    </td>
                    <td>
                       <?php echo $_SESSION['outgoing'][0]; ?>
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
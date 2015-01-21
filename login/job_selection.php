<?php
/**
 * This page allows the user to enter their username and password to login to the system.
 *
 * PHP version 5
 *
 *
 * @category    Login pages
 * @package     PackageName
 * @author      Zachary Theriault - Trevor Heffel
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-20
 */

// Include the database.php file
include('job_selection_script.php');

// Include the header.php file
include('../header.php');
?>
<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Job Selection</h1>
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li><a href="index.php">Login</a></li>
                <li class="active">Job Selection</li>

            </ol>
        </div>
    </div>
    <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $jobTypes = (!empty($_SESSION['jobTypes'])) ? $_SESSION['jobTypes'] : "";

        // If the user is not logged in, display a job seletion form
        if ($loggedIn == true) {
       
        echo '<form class="form-horizontal" name="loginForm" id="loginForm" method="post" action="job_selection.php">';
         //   $jobTitle;

        for ($x = 0; $x < count($jobTypes); $x++){       
          
         echo'   <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="' .$jobTypes[$x][0] .'" value="' .$jobTypes[$x][0] .'"/>
                </div>
            </div>';
       }
        echo '</form>';
        
        } // If the user is logged in, redirect them to index.php if they try to access this page
        else {
            echo '<script type="text/javascript">location.replace("../index.php");</script>';
        }
        // Include the footer.php file
        include('../footer.php');
        ?>
    </div>
    <!-- /.container -->
</body>
</html>
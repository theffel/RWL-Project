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
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-12
 */

// Start the session
session_start();

// Include php files
include('login_script.php');
include('../header.php');
?>
<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Login</h1>
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li class="active">Login</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        // If the user is not logged in, display a login form
        if ($loggedIn == false) {
        ?>
        <form class="form-horizontal" name="loginForm" id="loginForm" method="post" action="index.php">
            <div class="form-group">
                <label for="inputEmail" class="control-label col-md-2">Username</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="control-label col-md-2">Password</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>
            <!-- #messages is where the messages are placed inside -->
            <div class="form-group">
                <div class="col-md-offset-2 col-xs-10">
                    <div id="messages"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submitBtn" value="Login"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <?php
                    if (isset($_SESSION['login_error']) && !empty($_SESSION['login_error'])) {
                        echo '<p class="text-danger">'.$_SESSION['login_error'].'</p>';
                        echo '<meta http-equiv="refresh" content="1; url=index.php"/>';
                        unset($_SESSION['login_error']);
                    }
                    ?>
                </div>
            </div>
        </form>
        <?php
        } // If the user is logged in, redirect them to index.php if they try to access this page
        else {
            echo '<script type="text/javascript">location.replace("../index.php");</script>';
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
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"> </script>
    <script type="text/javascript" src="login_validation.js"></script>
</body>
</html>
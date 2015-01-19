<?php
// Include the database.php file
include('login_script.php');
// Include the header.php file
include('header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Employee Login</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
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
        <form class="form-horizontal" name="loginForm" id="loginForm" method="post" action="">
            <div class="form-group">
                <label for="inputEmail" class="control-label col-xs-2">Username</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required data-validation-required-message="Please enter your username.">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="control-label col-xs-2">Password</label>
                <div class="col-xs-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required data-validation-required-message="Please enter your password.">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Login"/>
                </div>
            </div>  
        </form>
        <?php
        } // If the user is logged in, redirect them to index.php if they try to access this page
        else {
            echo '<script type="text/javascript">
                        location.replace("index.php");
                        </script>';
        }
        // Include the footer.php file
        include('footer.php');
        ?>
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
/**
 * This page holds the form for adding a new driver.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Taylor Hardy
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     x.xx
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-02-02
 */
 
// Start the session
session_start();

// Include the database.php file
include('database.php');

// Include the header.php file
include('header.php');
?>

<html>
	<body>
		    <!-- Page Content -->
		<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Driver Addition - Insurance</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
                    <li class="active">Add driver</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add driver form
			if ($loggedIn == true) {	
				// Get Driver Id
				$id = $_GET["id"];
			?>
				<form class='form-horizontal' name='addDriverForm' id='addDriverForm' method='post' action="<?php echo ROOT; ?>/add_to_database.php">
			
					<!--driver insurance expirey date-->
					<div class="form-group">
						<label for="inputdriverExp" class="control-label col-xs-2">driver Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="driverExp" id="driverExp" required data-validation-required-message="Please enter the expirey date of the new drivers insurance.">
						</div>
					</div>
					
					<!--driver truck-->
					<div class="form-group">
						<label for="inputdriverAddress" class="control-label col-xs-2">driver Truck Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="driverTruck" id="driverTruck" required data-validation-required-message="Please enter the Truck of the new driver.">
						</div>
					</div>
					
					<!--driver trailer-->
					<div class="form-group">
						<label for="inputdriverPhoneNum" class="control-label col-xs-2">driver Trailer Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="driverTrailer" id="driverTrailer" placeholder="902#######" required data-validation-required-message="Please enter the Trailer of the new driver.">
						</div>
					</div>
					
					<!--driver image-->
					<div class="form-group">
						<label for="inputdriverContactName" class="control-label col-xs-2">driver Image Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="driverImage" id="driverImage" required data-validation-required-message="Please enter the Id of the Image for the new driver.">
						</div>
					</div>					

					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addDriver" value="Add driver"/>
						</div>
					</div>
					
				</form>

			<?php
			}

			// If the user is not logged in, redirect them to login.php if they try to access this page
			else {
				echo '<script type="text/javascript">
							location.replace("'.ROOT.'/login/index.php");
							</script>';
			}
        ?>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; RWL Holdings 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
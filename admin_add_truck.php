<?php
/**
 * This page holds the form for adding a new Truck.
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
 * @since       2015-02-04
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
                <h1 class="page-header">New Truck Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
                    <li class="active">Add Truck</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add Truck form
			if ($loggedIn == true) {



			
			?>

				<form class="form-horizontal" name="addTruckForm" id="addTruckForm" method="post" action="add_to_database.php">

					<!--Truck number-->
					<div class="form-group">
						<label for="inputTruckNumber" class="control-label col-xs-2">Truck Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="truckNum" id="truckNum" placeholder="##" required data-validation-required-message="Please enter the designated Truck number.">
						</div>
					</div>	

					<!--Registration Id-->
					<div class="form-group">
						<label for="inputRegistrationId" class="control-label col-xs-2">Registration Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="regId" id="regId" placeholder="##" required data-validation-required-message="Please enter the designated Registration Id.">
						</div>
					</div>

					<!--Inspection Id-->
					<div class="form-group">
						<label for="inputInspectionId" class="control-label col-xs-2">Inspection Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="inspectId" id="inspectId" placeholder="##" required data-validation-required-message="Please enter the designated Inspection Id.">
						</div>
					</div>

					<!--License Plate number-->
					<div class="form-group">
						<label for="inputPlateNumber" class="control-label col-xs-2">License Plate Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="plateNum" id="plateNum" placeholder="##" required data-validation-required-message="Please enter the designated License Plate number.">
						</div>
					</div>

					<!--Insurance Id-->
					<div class="form-group">
						<label for="inputInsuranceId" class="control-label col-xs-2">Insurance Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="insId" id="insId" placeholder="##" required data-validation-required-message="Please enter the designated Insurance Id.">
						</div>
					</div>					
					
			
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addTruck" value="Add Truck"/>
						</div>
					</div>
					
				</form>

			<?php
			}

			// If the user is not logged in, redirect them to login.php if they try to access this page
			else {
				echo '<script type="text/javascript">
							location.replace("'.ROOT.'/login.php");
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
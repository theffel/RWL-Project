<?php
/**
 * This page holds the form for adding a new Destination.
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
 * @since       2015-01-30
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
                <h1 class="page-header">New Destination Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
                    <li class="active">Add Destination</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add Destination form
			if ($loggedIn == true) {	
			?>
				<form class='form-horizontal' name='adddestinationForm' id='adddestinationForm' method='post' action="<?php echo ROOT; ?>/add_to_database.php">
			
					<!--Destination Name-->
					<div class="form-group">
						<label for="inputDestinationName" class="control-label col-xs-2">Destination Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="destinationName" id="destinationName" required data-validation-required-message="Please enter the name of the new destination.">
						</div>
					</div>
					
					<!--Destination Address-->
					<div class="form-group">
						<label for="inputDestinationAddress" class="control-label col-xs-2">Destination Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="destinationAddress" id="destinationAddress" required data-validation-required-message="Please enter the address of the new destination.">
						</div>
					</div>
					
					<!--Destination Phone Number-->
					<div class="form-group">
						<label for="inputDestinationPhoneNum" class="control-label col-xs-2">Destination Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="destinationPhoneNum" id="destinationPhoneNum" placeholder="902#######" required data-validation-required-message="Please enter the Phone number of the new destination.">
						</div>
					</div>
					
					<!--Destination Contact Name-->
					<div class="form-group">
						<label for="inputDestinationContactName" class="control-label col-xs-2">Destination Contact Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="destinationContactName" id="destinationContactName" required data-validation-required-message="Please enter the name of the contact for the new destination.">
						</div>
					</div>					

					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addDest" value="Add Destination"/>
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
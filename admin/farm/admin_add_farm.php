<?php
/**
 * This page holds the form for adding a new farm.
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
 * @since       2015-01-13
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
                <h1 class="page-header">New Farm Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/farm/admin_farm_list.php">Farms</a>
                    </li>
                    <li class="active">Add Farm</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add farm form
			if ($loggedIn == true) {	
			
			?>

				<form class="form-horizontal" name="addFarmForm" id="addFarmForm" method="post" action="<?php echo ROOT; ?>/add_to_database.php"> <!--connect straight to add warehouse-->
					
					<!--Farm Name-->
					<div class="form-group">
						<label for="inputFarmName" class="control-label col-xs-2">Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmName" id="farmName"  required data-validation-required-message="Please enter the name of the new farm.">
						</div>
					</div>
					
					<!--Farm Civic Address-->
					<div class="form-group">
						<label for="inputFarmCivAddress" class="control-label col-xs-2">Civic Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmCivAddress" id="farmCivAddress"  required data-validation-required-message="Please enter the civic address of the new farm.">
						</div>
					</div>
					
					<!--Farm Phone Number-->
					<div class="form-group">
						<label for="inputFarmPhoneNum" class="control-label col-xs-2">Farm Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmPhoneNum" id="farmPhoneNum" placeholder="902#######" required data-validation-required-message="Please enter the Phone number of the new farm.">
						</div>
					</div>
					
					<!--Farm email address-->
					<div class="form-group">
						<label for="inputFarmemail" class="control-label col-xs-2">Email Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmEmail" id="farmEmail" required data-validation-required-message="Please enter the email Address of the new farm.">
						</div>
					</div>
					
					<!--Farm Contact First Name-->
					<div class="form-group">
						<label for="inputFarmContact" class="control-label col-xs-2">Business Contact First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmContactFN" id="farmContactFN" required data-validation-required-message="Please enter the given name of the business contact at the new farm.">
						</div>
					</div>
					
					<!--Farm Contact Last Name-->
					<div class="form-group">
						<label for="inputFarmContact" class="control-label col-xs-2">Business Contact Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmContactLN" id="farmContactLN" required data-validation-required-message="Please enter the surname of the business contact at the new farm.">
						</div>
					</div>
					
					<!--Farm Contact Phone #-->
					<div class="form-group">
						<label for="inputFarmContact" class="control-label col-xs-2">Business Contact Phone #</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmContactPN" id="farmContactPN" placeholder="902#######" required data-validation-required-message="Please enter the phone number of the business contact at the new farm.">
						</div>
					</div>
			
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addFarm" value="Add Farm"/>
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
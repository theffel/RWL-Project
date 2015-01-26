<?php
/**
 * This page holds the form for adding a new employees emergency contacts.
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
 * @since       2015-01-21
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
                <h1 class="page-header">New employee emergency contact Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
                    <li class="active">Add employee emergency contact</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add employee emergency contact form
			if ($loggedIn == true) {

				echo '<form class="form-horizontal" name="addEmployeeECForm" id="addEmployeeECForm" method="post" action="'.ROOT.'/add_to_database.php">';
			
			?>


					<!--employee emergency contact FN-->
					<div class="form-group">
						<label for="inputemployeeECFN" class="control-label col-xs-2">employee emergency contact First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeECFN" id="employeeECFN" required data-validation-required-message="Please enter the designated employees emergency contacts first name.">
						</div>
					</div>
					
					<!--employee emergency contact LN-->
					<div class="form-group">
						<label for="inputemployeeECLN" class="control-label col-xs-2">employee emergency contact Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeECLN" id="employeeECLN" required data-validation-required-message="Please enter the designated employees emergency contacts last name.">
						</div>
					</div>

					<!--employee emergency contact PhoneNum-->
					<div class="form-group">
						<label for="inputemployeeECPN" class="control-label col-xs-2">employee emergency contact Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeECPhoneNum" id="employeeECPhoneNum" placeholder="902#######" required data-validation-required-message="Please enter the designated employees emergency contacts phone#.">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addemployeeEC" value="Add employee emergency contact s"/>
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
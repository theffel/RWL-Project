<?php
/**
 * This page holds the form for adding a new employee.
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
 * @since       2015-01-15
 */

// Start the session
session_start();

//set path to include files
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/RWL-Project";
// Include the database.php file
include($path.'/database.php');

// Include the header.php file
include($path.'/header.php');
?>

<html>
	<body>
		    <!-- Page Content -->
		<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Employee Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/employee/admin_emp_list.php">Employee List</a>
                    </li>
                    <li class="active">Add employee</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add employee form
			if ($loggedIn == true) {



			
			?>

				<form class="form-horizontal" name="addemployeeForm" id="addemployeeForm" method="post" action="<?php echo ROOT; ?>/admin/add_to_database.php">

					<!--employee position ID-->
					<div class="form-group">
						<label for="inputEmployeePositionId" class="control-label col-xs-2">Position Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePosId" id="employeePosId" placeholder="##" required data-validation-required-message="Please enter the designated employee position ID.">
						</div>
					</div>				
					
					<!--employee SIN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Social Insurance Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSIN" id="employeeSIN" placeholder="#########" required data-validation-required-message="Please enter the designated employees SIN.">
						</div>
					</div>
					
					<!--employee FN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeFN" id="employeeFN" required data-validation-required-message="Please enter the designated employees first name.">
						</div>
					</div>
					
					<!--employee LN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeLN" id="employeeLN" required data-validation-required-message="Please enter the designated employees last name.">
						</div>
					</div>
					
					<!--employee MN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Middle Initial</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeMN" id="employeeMN" placeholder="M." required data-validation-required-message="Please enter the designated employees middle initial.">
						</div>
					</div>
					
					<!--employee Address-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeAddress" id="employeeAddress" required data-validation-required-message="Please enter the designated employees address.">
						</div>
					</div>
					
					<!--employee City-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">City</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeCity" id="employeeCity" required data-validation-required-message="Please enter the designated employee City.">
						</div>
					</div>
					
					<!--employee PC-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Postal Code</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePC" id="employeePC" placeholder="A#A#A#" required data-validation-required-message="Please enter the designated employee postal code.">
						</div>
					</div>
					
					<!--employee PhoneNum-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePhoneNum" id="employeePhoneNum" placeholder="902#######" required data-validation-required-message="Please enter the designated employee phone#.">
						</div>
					</div>
					
					<!--employee Email-->
					<div class="form-group">
						<label for="inputEmployeeEmail" class="control-label col-xs-2">Email</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeEmail" id="employeeEmail" required data-validation-required-message="Please enter the designated employee Email.">
						</div>
					</div>
					
					<!--employee Gender-->
					<div class="form-group">
						<label for="inputEmployeeGender" class="control-label col-xs-2">Gender</label>
						<div class="col-xs-10">
							<select name="employeeGender" id="employeeGender" form="addemployeeForm">
								<option value="0" selected>Male</option>
								<option value="1">Female</option>
							</select>
						</div>
					</div>
					
					<!--employee DOB-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Date of Birth</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeDOB" id="employeeDOB" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the designated employee date of birth.">
						</div>
					</div>
					
					<hr />
					
					<!--Primary employee emergency contact FN-->
					<div class="form-group">
						<label for="inputemployeePrimaryECFN" class="control-label col-xs-2">Primary Emergency contact First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePrimaryECFN" id="employeePrimaryECFN" required data-validation-required-message="Please enter the designated employees emergency contacts first name.">
						</div>
					</div>
					
					<!--Primary employee emergency contact LN-->
					<div class="form-group">
						<label for="inputemployeePrimaryECLN" class="control-label col-xs-2">Primary Emergency contact Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePrimaryECLN" id="employeePrimaryECLN" required data-validation-required-message="Please enter the designated employees emergency contacts last name.">
						</div>
					</div>

					<!--Primary employee emergency contact PhoneNum-->
					<div class="form-group">
						<label for="inputemployeePrimaryECPN" class="control-label col-xs-2">Primary Emergency contact Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePrimaryECPhoneNum" id="employeePrimaryECPhoneNum" placeholder="902#######" required data-validation-required-message="Please enter the designated employees emergency contacts phone#.">
						</div>
					</div>
					
					<hr />
					
					<!--Secondary employee emergency contact FN-->
					<div class="form-group">
						<label for="inputemployeeSecondaryECFN" class="control-label col-xs-2">Secondary Emergency contact First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSecondaryECFN" id="employeeSecondaryECFN">
						</div>
					</div>
					
					<!--Secondary employee emergency contact LN-->
					<div class="form-group">
						<label for="inputemployeeSecondaryECLN" class="control-label col-xs-2">Secondary Emergency contact Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSecondaryECLN" id="employeeSecondaryECLN">
						</div>
					</div>

					<!--Secondary employee emergency contact PhoneNum-->
					<div class="form-group">
						<label for="inputemployeeSecondaryECPN" class="control-label col-xs-2">Secondary Emergency contact Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSecondaryECPhoneNum" id="employeeSecondaryECPhoneNum" placeholder="902#######">
						</div>
					</div>
			
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addemployee" value="Add employee"/>
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
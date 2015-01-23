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
                <h1 class="page-header">New Employee Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
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

				<form class="form-horizontal" name="addemployeeForm" id="addemployeeForm" method="post" action="add_to_database.php">

					<!--employee type ID-->
					<div class="form-group">
						<label for="inputEmployeeTypeId" class="control-label col-xs-2">Employee type Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeTypeId" id="employeeTypeId" placeholder="##" required data-validation-required-message="Please enter the designated employee type ID.">
						</div>
					</div>

					<!--employee position ID-->
					<div class="form-group">
						<label for="inputEmployeePositionId" class="control-label col-xs-2">Employee position Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePosId" id="employeePosId" placeholder="##" required data-validation-required-message="Please enter the designated employee position ID.">
						</div>
					</div>				
					
					<!--employee SIN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Social Insurance Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSIN" id="employeeSIN" placeholder="#########" required data-validation-required-message="Please enter the designated employees SIN.">
						</div>
					</div>
					
					<!--employee FN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeFN" id="employeeFN" required data-validation-required-message="Please enter the designated employees first name.">
						</div>
					</div>
					
					<!--employee LN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeLN" id="employeeLN" required data-validation-required-message="Please enter the designated employees last name.">
						</div>
					</div>
					
					<!--employee MN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Middle Initial</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeMN" id="employeeMN" placeholder="M." required data-validation-required-message="Please enter the designated employees middle initial.">
						</div>
					</div>
					
					<!--employee Address-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeAddress" id="employeeAddress" required data-validation-required-message="Please enter the designated employees address.">
						</div>
					</div>
					
					<!--employee City-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee City</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeCity" id="employeeCity" required data-validation-required-message="Please enter the designated employee City.">
						</div>
					</div>
					
					<!--employee PC-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Postal Code</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePC" id="employeePC" placeholder="A#A#A#" required data-validation-required-message="Please enter the designated employee postal code.">
						</div>
					</div>
					
					<!--employee PhoneNum-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePhoneNum" id="employeePhoneNum" placeholder="902#######" required data-validation-required-message="Please enter the designated employee phone#.">
						</div>
					</div>
					
					<!--employee Email-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Email</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeEmail" id="employeeEmail" required data-validation-required-message="Please enter the designated employee Email.">
						</div>
					</div>
					
					<!--employee Gender-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Gender</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeGender" id="employeeGender" placeholder="0-male 1-female"  required data-validation-required-message="Please enter the designated employee Gender.">
						</div>
					</div>
					
					<!--employee DOB-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Date of Birth</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeDOB" id="employeeDOB" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the designated employee date of birth.">
						</div>
					</div>
					
					<!--employee primary contact-->
					<div class="form-group">
						<label for="inputEmployeePrimaryContactId" class="control-label col-xs-2">Employee Primary Emergency Contact Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePCI" id="employeePCI" placeholder="###" required data-validation-required-message="Please enter the designated employees primary emergency contact Id.">
						</div>
					</div>
					
					<!--employee secondary contact-->
					<div class="form-group">
						<label for="inputEmployeeSecondaryContactId" class="control-label col-xs-2">Employee Secondary Emergency Contact Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSCI" id="employeeSCI" placeholder="###" required data-validation-required-message="Please enter the designated employees secondary emergency contact Id.">
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
							location.replace("login.php");
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
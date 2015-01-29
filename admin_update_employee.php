<?php
/**
 * This page holds the form for updateing a new employee.
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
                <h1 class="page-header">Employee Information Update</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
                    <li class="active">Update Employee</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the update employee form
			if ($loggedIn == true) {
				// Get employee Id
				$empId = $_GET["id"];	
				// Create query				
				$query = "select position_id, emp_sin, emp_first_name, emp_last_name, emp_middle_initial, emp_address, emp_city, emp_postal_code, emp_phone, emp_email, emp_gender, emp_dob, primary_contact_id, secondary_contact_id from `employee` where emp_id = '{$empId}'";
				$result = $db->query($query);
				if ($result->num_rows > 0) {
					$queryValues = $result->fetch_assoc();
					$employeePosId = $queryValues['position_id'];
					$employeeSIN = $queryValues['emp_sin'];
					$employeeFN = $queryValues['emp_first_name'];
					$employeeLN = $queryValues['emp_last_name'];
					$employeeMN = $queryValues['emp_middle_initial'];
					$employeeAddress = $queryValues['emp_address'];
					$employeeCity = $queryValues['emp_city'];
					$employeePC = $queryValues['emp_postal_code'];
					$employeePhoneNum = $queryValues['emp_phone'];
					$employeeEmail = $queryValues['emp_email'];
					$employeeGender = $queryValues['emp_gender'];
					$employeeDOB = $queryValues['emp_dob'];
					$employeePCI = $queryValues['primary_contact_id'];
					$employeeSCI = $queryValues['secondary_contact_id'];
			
			?>

				<form class="form-horizontal" name="updateEmployeeForm" id="updateEmployeeForm" method="post" action="update_database.php">
				
					<!--Employee Id-->
					<input hidden type = "radio" name = "empId" id = "empId" value = "<?php echo $empId; ?>" checked>
					
					<!--employee position ID-->
					<div class="form-group">
						<label for="inputEmployeePositionId" class="control-label col-xs-2">Employee position Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePosId" id="employeePosId" value="<?php echo $employeePosId; ?>" placeholder="##" required data-validation-required-message="Please enter the designated employee position ID.">
						</div>
					</div>				
					
					<!--employee SIN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Social Insurance Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSIN" id="employeeSIN" value="<?php echo $employeeSIN; ?>" placeholder="#########" required data-validation-required-message="Please enter the designated employees SIN.">
						</div>
					</div>
					
					<!--employee FN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeFN" id="employeeFN" value="<?php echo $employeeFN; ?>" required data-validation-required-message="Please enter the designated employees first name.">
						</div>
					</div>
					
					<!--employee LN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeLN" id="employeeLN" value="<?php echo $employeeLN; ?>" required data-validation-required-message="Please enter the designated employees last name.">
						</div>
					</div>
					
					<!--employee MN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Middle Initial</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeMN" id="employeeMN" value="<?php echo $employeeMN; ?>" placeholder="M." required data-validation-required-message="Please enter the designated employees middle initial.">
						</div>
					</div>
					
					<!--employee address-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeaddress" id="employeeaddress" value="<?php echo $employeeAddress; ?>" required data-validation-required-message="Please enter the designated employees address.">
						</div>
					</div>
					
					<!--employee City-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee City</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeCity" id="employeeCity" value="<?php echo $employeeCity; ?>" required data-validation-required-message="Please enter the designated employee City.">
						</div>
					</div>
					
					<!--employee PC-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Postal Code</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePC" id="employeePC" value="<?php echo $employeePC; ?>" placeholder="A#A#A#" required data-validation-required-message="Please enter the designated employee postal code.">
						</div>
					</div>
					
					<!--employee PhoneNum-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePhoneNum" id="employeePhoneNum" value="<?php echo $employeePhoneNum; ?>" placeholder="902#######" required data-validation-required-message="Please enter the designated employee phone#.">
						</div>
					</div>
					
					<!--employee Email-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Email</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeEmail" id="employeeEmail" value="<?php echo $employeeEmail; ?>" required data-validation-required-message="Please enter the designated employee Email.">
						</div>
					</div>
					
					<!--employee Gender-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Gender</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeGender" id="employeeGender" value="<?php echo $employeeGender; ?>" placeholder="0-male 1-female"  required data-validation-required-message="Please enter the designated employee Gender.">
						</div>
					</div>
					
					<!--employee DOB-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Date of Birth</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeDOB" id="employeeDOB" value="<?php echo $employeeDOB; ?>" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the designated employee date of birth.">
						</div>
					</div>
					
					<!--employee primary contact-->
					<div class="form-group">
						<label for="inputEmployeePrimaryContactId" class="control-label col-xs-2">Employee Primary Emergency Contact Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePCI" id="employeePCI" value="<?php echo $employeePCI; ?>" placeholder="###" required data-validation-required-message="Please enter the designated employees primary emergency contact Id.">
						</div>
					</div>
					
					<!--employee secondary contact-->
					<div class="form-group">
						<label for="inputEmployeeSecondaryContactId" class="control-label col-xs-2">Employee Secondary Emergency Contact Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSCI" id="employeeSCI" value="<?php echo $employeeSCI; ?>" placeholder="###" required data-validation-required-message="Please enter the designated employees secondary emergency contact Id.">
						</div>
					</div>
			
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="updateEmployee" value="Update Employee"/>
						</div>
					</div>
					
				</form>
				<form action = 'admin_update_EC.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '<?php echo $empId; ?>' checked><input type = 'submit' class='btn btn-primary' value = 'Update Employee Emergency Contacts'></form><br />
				<form action = 'admin_update_train.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '<?php echo $empId; ?>' checked><input type = 'submit' class='btn btn-primary' value = 'Update Training Credentials'></form><br />


			<?php
			}
			else{
				echo "failed query";
			}
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
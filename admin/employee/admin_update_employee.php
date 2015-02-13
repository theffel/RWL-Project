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
					<li><a href="<?php echo ROOT; ?>/employee/admin_emp_list.php">Employee List</a>
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
				$query = "select * from `employee` where emp_id = '{$empId}'";
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
			
			?>

				<form class="form-horizontal" name="updateEmployeeForm" id="updateEmployeeForm" method="post" action="<?php echo ROOT; ?>/admin_update_database.php">
					
					<!--employee Id-->
					<input hidden type = "radio" name = "empId" id = "empId" value = "<?php echo $empId; ?>" checked>
					
					<!--employee position ID-->
					<div class="form-group">
						<label for="inputEmployeePositionId" class="control-label col-xs-2">Position Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePosId" id="employeePosId" placeholder="##" value="<?php echo $employeePosId; ?>" required data-validation-required-message="Please enter the designated employee position ID.">
						</div>
					</div>				
					
					<!--employee SIN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Social Insurance Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSIN" id="employeeSIN" placeholder="#########" value="<?php echo $employeeSIN; ?>" required data-validation-required-message="Please enter the designated employees SIN.">
						</div>
					</div>
					
					<!--employee FN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeFN" id="employeeFN" value="<?php echo $employeeFN; ?>" required data-validation-required-message="Please enter the designated employees first name.">
						</div>
					</div>
					
					<!--employee LN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeLN" id="employeeLN" value="<?php echo $employeeLN; ?>" required data-validation-required-message="Please enter the designated employees last name.">
						</div>
					</div>
					
					<!--employee MN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Middle Initial</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeMN" id="employeeMN" placeholder="M." value="<?php echo $employeeMN; ?>" required data-validation-required-message="Please enter the designated employees middle initial.">
						</div>
					</div>
					
					<!--employee Address-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeAddress" id="employeeAddress" value="<?php echo $employeeAddress; ?>" required data-validation-required-message="Please enter the designated employees address.">
						</div>
					</div>
					
					<!--employee City-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">City</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeCity" id="employeeCity" value="<?php echo $employeeCity; ?>" required data-validation-required-message="Please enter the designated employee City.">
						</div>
					</div>
					
					<!--employee PC-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Postal Code</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePC" id="employeePC" placeholder="A#A#A#" value="<?php echo $employeePC; ?>" required data-validation-required-message="Please enter the designated employee postal code.">
						</div>
					</div>
					
					<!--employee PhoneNum-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePhoneNum" id="employeePhoneNum" placeholder="902#######" value="<?php echo $employeePhoneNum; ?>" required data-validation-required-message="Please enter the designated employee phone#.">
						</div>
					</div>
					
					<!--employee Email-->
					<div class="form-group">
						<label for="inputEmployeeEmail" class="control-label col-xs-2">Email</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeEmail" id="employeeEmail" value="<?php echo $employeeEmail; ?>" required data-validation-required-message="Please enter the designated employee Email.">
						</div>
					</div>
					
					<!--employee Gender-->
					<div class="form-group">
						<label for="inputEmployeeGender" class="control-label col-xs-2">Gender</label>
						<div class="col-xs-10">
							<select name="employeeGender" id="employeeGender" form="addemployeeForm">
								<?php
								if($employeeGender == 0){
									echo'<option value="0" selected>Male</option><option value="1">Female</option>';
								}
								else{
									echo'<option value="0">Male</option><option value="1" selected>Female</option>';
								}
								?>
							</select>
						</div>
					</div>
					
					<!--employee DOB-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Date of Birth</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeDOB" id="employeeDOB" placeholder="YYYY-MM-DD" value="<?php echo $employeeDOB; ?>" required data-validation-required-message="Please enter the designated employee date of birth.">
						</div>
					</div>
			
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="updateEmployee" value="Update Employee"/>
						</div>
					</div>
					
				</form>
				<hr />
				<form action = ".ROOT."/admin_update_train.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '<?php echo $empId; ?>' checked><input type = 'submit' class='btn btn-primary' value = 'Update Training Credentials'></form><br />

			<?php
				$query2 = "select * from driver where emp_id = '{$empId}'";
				$result = $db->query($query2);
				if ($result->num_rows < 1) {
					echo "<form action = ".ROOT."/employee/admin_add_driver.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '" . $empId . "' checked><input type = 'submit' class='btn btn-primary' value = 'Add as Driver'></form><br />";
				}
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
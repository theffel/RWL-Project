<?php
//created by: Taylor Hardy
//created on: 2015/01/15
//version 0.3

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
                <h1 class="page-header">New employee Addition</h1>
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
///////////////////////////////////////////////////////////////////////////////////////////////////
//REMEMBER TO CHANGE THIS WHEN LOGIN FUNCTIONALITY IS UP////////////////
			if ($loggedIn == false) {
////////////////////////////////////////////////////////////////////
				if (isset($_POST['employeeId']) && isset($_POST['employeeType']) && isset($_POST['employeeCivNum']) && isset($_POST['employeeAddress']) && isset($_POST['employeePhoneNum']) && isset($_POST['employeeContact']) && isset($_POST['employeeEmail'])) {
					$employeeId = $mysqli->real_escape_string($_POST['employeeId']);
					$employeeType = $mysqli->real_escape_string($_POST['employeeType']);
					$employeeSIN = $mysqli->real_escape_string($_POST['employeeSIN']);
					$employeeFN = $mysqli->real_escape_string($_POST['employeeFN']);
					$employeeLN = $mysqli->real_escape_string($_POST['employeeLN']);
					$employeeMN = $mysqli->real_escape_string($_POST['employeeMN']);
					$employeeAddress = $mysqli->real_escape_string($_POST['employeeAddress']);
					$employeeCity = $mysqli->real_escape_string($_POST['employeeCity']);
					$employeePC = $mysqli->real_escape_string($_POST['employeePC']);
					$employeePhoneNum = $mysqli->real_escape_string($_POST['employeePhoneNum']);
					$employeeEmail = $mysqli->real_escape_string($_POST['employeeEmail']);
					$employeeGender = $mysqli->real_escape_string($_POST['employeeGender']);
					$employeeDOB = $mysqli->real_escape_string($_POST['employeeDOB']);
					//$employeeUser = $mysqli->real_escape_string($_POST['employeeUser']);
					//$employeePass = $mysqli->real_escape_string($_POST['employeePass']);
					//$employeeContact = $mysqli->real_escape_string($_POST['employeeContact']);
					

					// Create query
					$query = "INSERT INTO employee (emp_id, emp_type, emp_sin, emp_first_name, emp_last_name, emp_middle_initial, emp_address, emp_city, emp_postal_code, emp_phone, emp_email, emp_gender, emp_dob) VALUES ('$employeeId', '$employeeType', '$employeeSIN', '$employeeFN', '$employeeLN', '$employeeMN', '$employeeAddress', '$employeeCity', '$employeePC', '$employeePhoneNum', '$employeeEmail', '$employeeGender', '$employeeDOB')";

					if ($mysqli->query($query) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $query . "<br>" . $mysqli->error;
					}

					$mysqli->close();
				}


			
			?>

				<form class="form-horizontal" name="addemployeeForm" id="addemployeeForm" method="post" action="admin_add_employee.php">
					
					<!--employee ID-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeId" id="employeeId" placeholder="employee ID" required data-validation-required-message="Please enter the designated employee ID.">
						</div>
					</div>
					
					<!--employee Type-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Type</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeType" id="employeeType" placeholder="Employee Type" required data-validation-required-message="Please enter the designated employee type.">
						</div>
					</div>
					
					<!--employee SIN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Social Insurance Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSIN" id="employeeSIN" placeholder="employee SIN" required data-validation-required-message="Please enter the designated employees SIN.">
						</div>
					</div>
					
					<!--employee FN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeFN" id="employeeFN" placeholder="employee First Name" required data-validation-required-message="Please enter the designated employees first name.">
						</div>
					</div>
					
					<!--employee LN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeLN" id="employeeLN" placeholder="employee Last Name" required data-validation-required-message="Please enter the designated employees last name.">
						</div>
					</div>
					
					<!--employee MN-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Middle Initial</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeMN" id="employeeMN" placeholder="employee middle initial" required data-validation-required-message="Please enter the designated employees middle initial.">
						</div>
					</div>
					
					<!--employee Address-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeAddress" id="employeeAddress" placeholder="employee Address" required data-validation-required-message="Please enter the designated employees address.">
						</div>
					</div>
					
					<!--employee City-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee City</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeCity" id="employeeCity" placeholder="employee City" required data-validation-required-message="Please enter the designated employee City.">
						</div>
					</div>
					
					<!--employee PC-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Postal Code</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePC" id="employeePC" placeholder="employee postal code" required data-validation-required-message="Please enter the designated employee postal code.">
						</div>
					</div>
					
					<!--employee PhoneNum-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePhoneNum" id="employeePhoneNum" placeholder="employee phone#" required data-validation-required-message="Please enter the designated employee phone#.">
						</div>
					</div>
					
					<!--employee Email-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Email</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeEmail" id="employeeEmail" placeholder="employee Email" required data-validation-required-message="Please enter the designated employee Email.">
						</div>
					</div>
					
					<!--employee Gender-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Gender</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeGender" id="employeeGender" placeholder="employee Gender" required data-validation-required-message="Please enter the designated employee Gender.">
						</div>
					</div>
					
					<!--employee DOB-->
					<div class="form-group">
						<label for="inputemployeeId" class="control-label col-xs-2">Employee Date of Birth</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeDOB" id="employeeDOB" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the designated employee date of birth.">
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
		</div>

			<!-- Footer -->
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<p>Copyright &copy; RWL Holdings 2015</p>
					</div>
				</div>
			</footer>

		
		<!-- /.container -->

		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>
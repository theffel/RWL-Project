<?php
//created by: Taylor Hardy
//created on: 2015/01/15
//version 0.9

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
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Add Farm</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add farm form
///////////////////////////////////////////////////////////////////////////////////////////////////
//REMEMBER TO CHANGE THIS WHEN LOGIN FUNCTIONALITY IS UP////////////////
			if ($loggedIn == TRUE) {
////////////////////////////////////////////////////////////////////
				if (isset($_POST['farmId']) && isset($_POST['farmName']) && isset($_POST['farmCivNum']) && isset($_POST['farmAddress']) && isset($_POST['farmPhoneNum']) && isset($_POST['farmContact']) && isset($_POST['farmEmail'])) {
					$farmId = $mysqli->real_escape_string($_POST['farmId']);
					$farmName = $mysqli->real_escape_string($_POST['farmName']);
					$farmCivNum = $mysqli->real_escape_string($_POST['farmCivNum']);
					$farmAddress = $mysqli->real_escape_string($_POST['farmAddress']);
					$farmPhoneNum = $mysqli->real_escape_string($_POST['farmPhoneNum']);
					$farmContact = $mysqli->real_escape_string($_POST['farmContact']);
					$farmEmail = $mysqli->real_escape_string($_POST['farmEmail']);

					// Create query
					$query = "INSERT INTO FARM (farm_id, farm_name, farm_civic_num, farm_address, farm_phone, farm_contact, farm_email) VALUES ('$farmId', '$farmName', '$farmCivNum', '$farmAddress', '$farmPhoneNum', '$farmContact', '$farmEmail')";

					if ($mysqli->query($query) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $query . "<br>" . $mysqli->error;
					}

					$mysqli->close();
				}


			
			?>

				<form class="form-horizontal" name="addFarmForm" id="addFarmForm" method="post" action="admin_add_farm.php">
					
					<!--farm ID-->
					<div class="form-group">
						<label for="inputFarmId" class="control-label col-xs-2">Farm Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmId" id="farmId" placeholder="Farm ID" required data-validation-required-message="Please enter the designated farm ID.">
						</div>
					</div>
					
					<!--Farm Name-->
					<div class="form-group">
						<label for="inputFarmName" class="control-label col-xs-2">Farm Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmName" id="farmName" placeholder="Farm Name" required data-validation-required-message="Please enter the name of the new farm.">
						</div>
					</div>
					
					<!--Farm Civic Number-->
					<div class="form-group">
						<label for="inputFarmCivNum" class="control-label col-xs-2">Farm Civic Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmCivNum" id="farmCivNum" placeholder="Farm Civic #" required data-validation-required-message="Please enter the civic number of the new farm.">
						</div>
					</div>
					
					<!--Farm Address-->
					<div class="form-group">
						<label for="inputFarmAddress" class="control-label col-xs-2">Farm Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmAddress" id="farmAddress" placeholder="Farm Address" required data-validation-required-message="Please enter the Address of the new farm.">
						</div>
					</div>
					
					<!--Farm Phone Number-->
					<div class="form-group">
						<label for="inputFarmPhoneNum" class="control-label col-xs-2">Farm Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmPhoneNum" id="farmPhoneNum" placeholder="Farm Phone #" required data-validation-required-message="Please enter the Phone number of the new farm.">
						</div>
					</div>
					
					<!--Farm Contact-->
					<div class="form-group">
						<label for="inputFarmContact" class="control-label col-xs-2">Farm Business Contact</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmContact" id="farmContact" placeholder="Farm Contact Name" required data-validation-required-message="Please enter the name of the business contact at the new farm.">
						</div>
					</div>
					
					<!--Farm email address-->
					<div class="form-group">
						<label for="inputFarmemail" class="control-label col-xs-2">Farm email Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmEmail" id="farmEmail" placeholder="Farm email" required data-validation-required-message="Please enter the email Address of the new farm.">
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
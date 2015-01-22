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
			if ($loggedIn == FALSE) {
////////////////////////////////////////////////////////////////////
				if (isset($_POST['farmName']) && isset($_POST['farmCivAddress']) && isset($_POST['farmPhoneNum']) && isset($_POST['farmContact']) && isset($_POST['farmEmail'])) {
					$farmName = $db->escape($_POST['farmName']);
					$farmCivAddress = $db->escape($_POST['farmCivAddress']);
					$farmPhoneNum = $db->escape($_POST['farmPhoneNum']);
					$farmContact = $db->escape($_POST['farmContact']);
					$farmEmail = $db->escape($_POST['farmEmail']);

					$insertData = Array(
					'farm_name' => [$farmName], 
					'farm_civic_address' => [$farmCivAddress], 
					'farm_phone' => [$farmPhoneNum], 
					'farm_contact_id' => [$farmContact],
					'farm_email' => [$farmEmail]
					);
					// Create query
				$query = "INSERT INTO `farm` (farm_name, farm_civic_address, farm_phone, farm_email, farm_contact_id) VALUES ({$farmName}, {$farmCivAddress},  {$farmPhoneNum}, {$farmEmail}, {$farmContact})";
					
					if ($db->query($query) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $query . "<br>" . $db->error;
					}

					$db->close();
				}


			
			?>

				<form class="form-horizontal" name="addFarmForm" id="addFarmForm" method="post" action="admin_add_farm.php">
					
					<!--Farm Name-->
					<div class="form-group">
						<label for="inputFarmName" class="control-label col-xs-2">Farm Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmName" id="farmName" placeholder="Farm Name" required data-validation-required-message="Please enter the name of the new farm.">
						</div>
					</div>
					
					<!--Farm Civic Address-->
					<div class="form-group">
						<label for="inputFarmCivAddress" class="control-label col-xs-2">Farm Civic Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmCivAddress" id="farmCivAddress" placeholder="Farm Civic Address" required data-validation-required-message="Please enter the civic address of the new farm.">
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
							<input type="text" class="form-control" name="farmContact" id="farmContact" placeholder="Farm Contact Id" required data-validation-required-message="Please enter the name of the business contact at the new farm.">
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
							location.replace("login/index.php");
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
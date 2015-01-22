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
					<li><a href="admin_farm_list.php">Farms</a>
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

				<form class="form-horizontal" name="addFarmForm" id="addFarmForm" method="post" action="add_to_database.php"> <!--connect straight to add warehouse-->
					
					<!--Farm Name-->
					<div class="form-group">
						<label for="inputFarmName" class="control-label col-xs-2">Farm Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmName" id="farmName"  required data-validation-required-message="Please enter the name of the new farm.">
						</div>
					</div>
					
					<!--Farm Civic Address-->
					<div class="form-group">
						<label for="inputFarmCivAddress" class="control-label col-xs-2">Farm Civic Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmCivAddress" id="farmCivAddress"  required data-validation-required-message="Please enter the civic address of the new farm.">
						</div>
					</div>
					
					<!--Farm Phone Number-->
					<div class="form-group">
						<label for="inputFarmPhoneNum" class="control-label col-xs-2">Farm Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmPhoneNum" id="farmPhoneNum" required data-validation-required-message="Please enter the Phone number of the new farm.">
						</div>
					</div>
					
					<!--Farm Contact-->
					<div class="form-group">
						<label for="inputFarmContact" class="control-label col-xs-2">Farm Business Contact</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmContact" id="farmContact" required data-validation-required-message="Please enter the name of the business contact at the new farm.">
						</div>
					</div>
					
					<!--Farm email address-->
					<div class="form-group">
						<label for="inputFarmemail" class="control-label col-xs-2">Farm email Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmEmail" id="farmEmail" required data-validation-required-message="Please enter the email Address of the new farm.">
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
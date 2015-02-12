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
 * @since       2015-01-29
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
				// Get Farm Id
				$farmId = $_GET["id"];	
						// Create query
				$query = "select `farm_name`, `farm_civic_address`, `farm_phone`, `farm_email`, `farm_contact_id` from `farm` where farm_id = {$farmId}";
					
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					$queryValues = $result->fetch_assoc();
					$farmName = $queryValues['farm_name'];
					$farmCivAdd = $queryValues['farm_civic_address'];
					$farmPhone = $queryValues['farm_phone'];
					$farmEmail = $queryValues['farm_email'];
					$farmContactId = $queryValues['farm_contact_id'];
				
			?>

				<form class="form-horizontal" name="updateFarmForm" id="updateFarmForm" method="post" action="update_database.php">
					
					<!--Farm Id-->
					<input hidden type = "radio" name = "farmId" id = "farmId" value = "<?php echo $farmId; ?>" checked>
					<!--Farm Name-->
					<div class="form-group">
						<label for="inputFarmName" class="control-label col-xs-2">Farm Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmName" id="farmName" value="<?php echo $farmName; ?>"  required data-validation-required-message="Please enter the new name of the farm.">
						</div>
					</div>
					
					<!--Farm Civic Address-->
					<div class="form-group">
						<label for="inputFarmCivAddress" class="control-label col-xs-2">Farm Civic Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmCivAddress" id="farmCivAddress" value="<?php echo $farmCivAdd; ?>"  required data-validation-required-message="Please enter the new civic address of the farm.">
						</div>
					</div>
					
					<!--Farm Phone Number-->
					<div class="form-group">
						<label for="inputFarmPhoneNum" class="control-label col-xs-2">Farm Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmPhoneNum" id="farmPhoneNum" placeholder="902#######" value="<?php echo $farmPhone; ?>" required data-validation-required-message="Please enter the new Phone number of the farm.">
						</div>
					</div>
					
					<!--Farm Contact-->
					<div class="form-group">
						<label for="inputFarmContact" class="control-label col-xs-2">Farm Business Contact</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmContact" id="farmContact" placeholder="###" value="<?php echo $farmContactId; ?>" required data-validation-required-message="Please enter the new Id of the business contact at the farm.">
						</div>
					</div>
					
					<!--Farm email address-->
					<div class="form-group">
						<label for="inputFarmemail" class="control-label col-xs-2">Farm email Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmEmail" id="farmEmail" value="<?php echo $farmEmail; ?>" required data-validation-required-message="Please enter the new email Address of the farm.">
						</div>
					</div>
			
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="updateFarm" value="Update Farm"/>
						</div>
					</div>
					
				</form>

			<?php
				}
				else{
					echo "failed query";
				}
			}

			// If the user is not logged in, redirect them to login.php if they try to access this page
			else {
				echo '<script type="text/javascript">
							location.replace("'.ROOT.'login/index.php");
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
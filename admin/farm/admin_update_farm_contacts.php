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
                <h1 class="page-header">New Farm Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/farm/admin_farm_list.php">Farms</a>
                    </li>
                    <li class="active">Update Farm Contacts</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add farm form
			if ($loggedIn == true) {
				// Get Farm contact Id
				$contactId = $_GET["id"];	
						// Create query
				$query = "select * from `farm_contact` where farm_contact_id = {$contactId}";
					
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					$queryValues = $result->fetch_assoc();
					$farmId = $queryValues['farm_id'];
					$farmContactFN = $queryValues['contact_first_name'];
					$farmContactLN = $queryValues['contact_last_name'];
					$farmContactPN = $queryValues['contact_phone'];
				
			?>

				<form class="form-horizontal" name="updateFarmForm" id="updateFarmForm" method="post" action="<?php echo ROOT; ?>/admin/admin_update_database.php">
					
					<!--Farm contact Id-->
					<input hidden type = "radio" name = "contactId" id = "contactId" value = "<?php echo $contactId; ?>" checked>
					
					<!--Farm Id-->
					<input hidden type = "radio" name = "farmId" id = "farmId" value = "<?php echo $farmId; ?>" checked>
					
					<!--Farm Contact First Name-->
					<div class="form-group">
						<label for="inputFarmContact" class="control-label col-xs-2">First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmContactFN" id="farmContactFN" value = "<?php echo $farmContactFN; ?>" required data-validation-required-message="Please enter the given name of the business contact at the new farm.">
						</div>
					</div>
					
					<!--Farm Contact Last Name-->
					<div class="form-group">
						<label for="inputFarmContact" class="control-label col-xs-2">Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmContactLN" id="farmContactLN" value = "<?php echo $farmContactLN; ?>" required data-validation-required-message="Please enter the surname of the business contact at the new farm.">
						</div>
					</div>
					
					<!--Farm Contact Phone #-->
					<div class="form-group">
						<label for="inputFarmContact" class="control-label col-xs-2">Phone #</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="farmContactPN" id="farmContactPN" placeholder="902#######" value = "<?php echo $farmContactPN; ?>" required data-validation-required-message="Please enter the phone number of the business contact at the new farm.">
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
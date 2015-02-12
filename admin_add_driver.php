<?php
/**
 * This page holds the form for adding a new driver.
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
 * @since       2015-02-02
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
                <h1 class="page-header">New Driver Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
                    <li class="active">Add driver</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add driver form
			if ($loggedIn == true) {	
				// Get Employee Id
				$empId = $_GET["id"];
			?>
				<form class='form-horizontal' name='addDriverForm' id='addDriverForm' method='post' action="<?php echo ROOT; ?>/add_to_database.php">
					<!--employee Id-->
					<input hidden type = "radio" name = "empId" id = "empId" value = "<?php echo $empId; ?>" checked>
					
			
			<!--license-->
			
					<!--driver licence number-->
					<div class="form-group">
						<label for="inputdriverExp" class="control-label col-xs-2">driver licence number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="driverLicNum" id="driverLicNum" required data-validation-required-message="Please enter the number of the new drivers licence.">
						</div>
					</div>
					
					<!--driver licence expirey date-->
					<div class="form-group">
						<label for="inputdriverExp" class="control-label col-xs-2">driver licence expirey date</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="driverLicED" id="driverLicED" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the expirey date of the new drivers licence.">
						</div>
					</div>
					
					<!--driver licence type id-->
					<div class="form-group">
						<label for="inputdriverExp" class="control-label col-xs-2">driver licence type Id</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="driverLicTId" id="driverLicTId" placeholder="##" required data-validation-required-message="Please enter the Id of the type of drivers licence.">
						</div>
					</div>
					
					<hr />
			<!--medical-->
			
				<!--medical cleared-->	
					<div class="form-group">
						<label for="inputmedicalClear" class="control-label col-xs-2">Medical Clear Status</label>
						<div class="col-xs-10">
							<select name="medicalClear" id="medicalClear" form="addDriverForm">
								<option value="0" selected>not cleared</option>
								<option value="1">cleared</option>								
							</select>
						</div>
					</div>
				<!--medical coverage expirey date-->
					<div class="form-group">
						<label for="inputdriverExp" class="control-label col-xs-2">medical coverage expirey date</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="medicalED" id="medicalED" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the expirey date of the new drivers medical coverage.">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addDriver" value="Add driver"/>
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
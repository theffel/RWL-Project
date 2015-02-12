<?php
/**
 * This page holds the form for adding a new Processor.
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
 * @since       2015-01-30
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
                <h1 class="page-header">New Processor Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin_processor_list.php">Processors</a>
                    </li>
                    <li class="active">Add Processor</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add Processor form
			if ($loggedIn == true) {	
			?>
				<form class='form-horizontal' name='addProcessorForm' id='addProcessorForm' method='post' action="<?php echo ROOT; ?>/add_to_database.php">
			
					<!--Processor Name-->
					<div class="form-group">
						<label for="inputProcessorName" class="control-label col-xs-2">Processor Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="processorName" id="processorName" required data-validation-required-message="Please enter the name of the new Processor.">
						</div>
					</div>
					
					<!--Processor Address-->
					<div class="form-group">
						<label for="inputProcessorAddress" class="control-label col-xs-2">Processor Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="processorAddress" id="processorAddress" required data-validation-required-message="Please enter the address of the new Processor.">
						</div>
					</div>
					
					<!--Processor Phone Number-->
					<div class="form-group">
						<label for="inputProcessorPhoneNum" class="control-label col-xs-2">Processor Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="processorPhoneNum" id="processorPhoneNum" placeholder="902#######" required data-validation-required-message="Please enter the Phone number of the new Processor.">
						</div>
					</div>
					
					<!--Processor Contact Name-->
					<div class="form-group">
						<label for="inputProcessorContactName" class="control-label col-xs-2">Processor Contact Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="processorContactName" id="processorContactName" required data-validation-required-message="Please enter the name of the contact for the new Processor.">
						</div>
					</div>					

					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addDest" value="Add Processor"/>
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
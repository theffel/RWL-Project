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
                <h1 class="page-header">Processor Update</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/processor/admin_processor_list.php">Processors</a>
                    </li>
                    <li class="active">Add Processor</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add Processor form
			if ($loggedIn == true) {
				// Get Farm Id
				$processorId = $_GET["id"];	
						// Create query
				$query = "select `processor_name`, `processor_address`, `processor_phone`, `processor_contact_name` from `processor` where processor_id = {$processorId}";
					
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					$queryValues = $result->fetch_assoc();
					$processorName = $queryValues['processor_name'];
					$processorAddress = $queryValues['processor_address'];
					$processorPhoneNum = $queryValues['processor_phone'];
					$processorContactName = $queryValues['processor_contact_name'];
			?>
				<form class='form-horizontal' name='updateProcessorForm' id='updateProcessorForm' method='post' action="<?php echo ROOT; ?>/admin/admin_update_database.php">
			
					<!--Farm Id-->
					<input hidden type = "radio" name = "processorId" id = "processorId" value = "<?php echo $processorId; ?>" checked>
					
					<!--Processor Name-->
					<div class="form-group">
						<label for="inputProcessorName" class="control-label col-xs-2">Processor Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="processorName" id="processorName" value = "<?php echo $processorName; ?>" required data-validation-required-message="Please enter the name of the new Processor.">
						</div>
					</div>
					
					<!--Processor Address-->
					<div class="form-group">
						<label for="inputProcessorAddress" class="control-label col-xs-2">Processor Address</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="processorAddress" id="processorAddress" value = "<?php echo $processorAddress; ?>" required data-validation-required-message="Please enter the address of the new Processor.">
						</div>
					</div>
					
					<!--Processor Phone Number-->
					<div class="form-group">
						<label for="inputProcessorPhoneNum" class="control-label col-xs-2">Processor Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="processorPhoneNum" id="processorPhoneNum" placeholder="902#######" value = "<?php echo $processorPhoneNum; ?>" required data-validation-required-message="Please enter the Phone number of the new Processor.">
						</div>
					</div>
					
					<!--Processor Contact Name-->
					<div class="form-group">
						<label for="inputProcessorContactName" class="control-label col-xs-2">Processor Contact Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="processorContactName" id="processorContactName" value = "<?php echo $processorContactName; ?>" required data-validation-required-message="Please enter the name of the contact for the new Processor.">
						</div>
					</div>					

					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="updateProcessor" value="Update Processor"/>
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
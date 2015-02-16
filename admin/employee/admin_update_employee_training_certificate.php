<?php
/**
 * This page holds the form for adding a new employee.
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
                <h1 class="page-header">New Employee Training Certificate Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/employee/admin_emp_list.php">Employee List</a>
                    </li>
                    <li class="active">Add training certificate</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add employee form
			if ($loggedIn == true) {
				// Get employee Id
				$trainingId = $_GET["id"];

				// Create query				
				$query = "select * FROM employee_training_certificate where certificate_id = '{$trainingId}'";
				$result = $db->query($query);
				if ($result->num_rows > 0) {
					$queryValues = $result->fetch_assoc();
					$empId = $queryValues['emp_Id'];
					$TrainingStart = $queryValues['start_date'];
					$TrainingEnd = $queryValues['end_date'];
					$completionStat = $queryValues['completed'];
					$TrainingTypeId = $queryValues['training_type_id'];			
			?>

				<form class="form-horizontal" name="addemployeeTCForm" id="addemployeeTCForm" method="post" action="<?php echo ROOT; ?>/admin/add_to_database.php">

					<!--Training Certificate Id-->
					<input hidden type = "radio" name = "empId" id = "empId" value = "<?php echo $empId; ?>" checked>
									
					<!--Training Certificate Id-->
					<input hidden type = "radio" name = "trainingId" id = "trainingId" value = "<?php echo $trainingId; ?>" checked>
					
					<!--training certificate start date-->
					<div class="form-group">
						<label for="inputTrainingStart" class="control-label col-xs-2">Employee Training Start Date</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="TrainingStart" id="TrainingStart" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the designated employee training start date.">
						</div>
					</div>
					
					<!--training certificate end date-->
					<div class="form-group">
						<label for="inputTrainingEnd" class="control-label col-xs-2">Employee Training End Date</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="TrainingEnd" id="TrainingEnd" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the designated employee training end date.">
						</div>
					</div>
					
					<!--certificate completion status-->
					<div class="form-group">
						<label for="inputCompletionStat" class="control-label col-xs-2">Training Certificate Completion Status</label>
						<div class="col-xs-10">
							<select name="completionStat" id="completionStat" form="addemployeeTCForm">
								<?php
								if($completionStat == 0){
									echo'<option value="0" selected>imcomplete</option><option value="1">complete</option>';
								}
								else{
									echo'<option value="0">incomplete</option><option value="1" selected>complete</option>';
								}
								?>
							</select>
						</div>
					</div>
					
					<!--training certificate type id-->
					<div class="form-group">
						<label for="inputTrainingTypeId" class="control-label col-xs-2">Training Type ID</label>
						<div class="col-xs-10">
							<select name="TrainingTypeId" id="TrainingTypeId" form="addemployeeTCForm">
								<?php
									switch ($TrainingTypeId) {
									case 1:
										echo '<option value="1" selected>Truck Driver</option>';
										echo '<option value="2">Dispatcher</option>';
										echo '<option value="3">Production</option>';
										echo '<option value="4">Sampler</option>';
										echo '<option value="5">Line Worker</option>';
										echo '<option value="6">Waterboy</option>';
										echo '<option value="7">Maintenance</option>';
										echo '<option value="8">Accounting</option>';
										echo '<option value="9">Admin</option>';
										echo '<option value="10">Fleet Management</option>';
										break;
									case 2:
										echo '<option value="1">Truck Driver</option>';
										echo '<option value="2" selected>Dispatcher</option>';
										echo '<option value="3">Production</option>';
										echo '<option value="4">Sampler</option>';
										echo '<option value="5">Line Worker</option>';
										echo '<option value="6">Waterboy</option>';
										echo '<option value="7">Maintenance</option>';
										echo '<option value="8">Accounting</option>';
										echo '<option value="9">Admin</option>';
										echo '<option value="10">Fleet Management</option>';
										break;
									case 3:
										echo '<option value="1">Truck Driver</option>';
										echo '<option value="2">Dispatcher</option>';
										echo '<option value="3" selected>Production</option>';
										echo '<option value="4">Sampler</option>';
										echo '<option value="5">Line Worker</option>';
										echo '<option value="6">Waterboy</option>';
										echo '<option value="7">Maintenance</option>';
										echo '<option value="8">Accounting</option>';
										echo '<option value="9">Admin</option>';
										echo '<option value="10">Fleet Management</option>';
										break;
									case 4:
										echo '<option value="1">Truck Driver</option>';
										echo '<option value="2">Dispatcher</option>';
										echo '<option value="3">Production</option>';
										echo '<option value="4" selected>Sampler</option>';
										echo '<option value="5">Line Worker</option>';
										echo '<option value="6">Waterboy</option>';
										echo '<option value="7">Maintenance</option>';
										echo '<option value="8">Accounting</option>';
										echo '<option value="9">Admin</option>';
										echo '<option value="10">Fleet Management</option>';
										break;
									case 5:
										echo '<option value="1">Truck Driver</option>';
										echo '<option value="2">Dispatcher</option>';
										echo '<option value="3">Production</option>';
										echo '<option value="4">Sampler</option>';
										echo '<option value="5" selected>Line Worker</option>';
										echo '<option value="6">Waterboy</option>';
										echo '<option value="7">Maintenance</option>';
										echo '<option value="8">Accounting</option>';
										echo '<option value="9">Admin</option>';
										echo '<option value="10">Fleet Management</option>';
										break;
									case 6:
										echo '<option value="1">Truck Driver</option>';
										echo '<option value="2">Dispatcher</option>';
										echo '<option value="3">Production</option>';
										echo '<option value="4">Sampler</option>';
										echo '<option value="5">Line Worker</option>';
										echo '<option value="6" selected>Waterboy</option>';
										echo '<option value="7">Maintenance</option>';
										echo '<option value="8">Accounting</option>';
										echo '<option value="9">Admin</option>';
										echo '<option value="10">Fleet Management</option>';
										break;
									case 7:
										echo '<option value="1">Truck Driver</option>';
										echo '<option value="2">Dispatcher</option>';
										echo '<option value="3">Production</option>';
										echo '<option value="4">Sampler</option>';
										echo '<option value="5">Line Worker</option>';
										echo '<option value="6">Waterboy</option>';
										echo '<option value="7" selected>Maintenance</option>';
										echo '<option value="8">Accounting</option>';
										echo '<option value="9">Admin</option>';
										echo '<option value="10">Fleet Management</option>';
										break;
									case 8:
										echo '<option value="1">Truck Driver</option>';
										echo '<option value="2">Dispatcher</option>';
										echo '<option value="3">Production</option>';
										echo '<option value="4">Sampler</option>';
										echo '<option value="5">Line Worker</option>';
										echo '<option value="6">Waterboy</option>';
										echo '<option value="7">Maintenance</option>';
										echo '<option value="8" selected>Accounting</option>';
										echo '<option value="9">Admin</option>';
										echo '<option value="10">Fleet Management</option>';
										break;
									case 9:
										echo '<option value="1">Truck Driver</option>';
										echo '<option value="2">Dispatcher</option>';
										echo '<option value="3">Production</option>';
										echo '<option value="4">Sampler</option>';
										echo '<option value="5">Line Worker</option>';
										echo '<option value="6">Waterboy</option>';
										echo '<option value="7">Maintenance</option>';
										echo '<option value="8">Accounting</option>';
										echo '<option value="9" selected>Admin</option>';
										echo '<option value="10">Fleet Management</option>';
										break;
									case 10:
										echo '<option value="1">Truck Driver</option>';
										echo '<option value="2">Dispatcher</option>';
										echo '<option value="3">Production</option>';
										echo '<option value="4">Sampler</option>';
										echo '<option value="5">Line Worker</option>';
										echo '<option value="6">Waterboy</option>';
										echo '<option value="7">Maintenance</option>';
										echo '<option value="8">Accounting</option>';
										echo '<option value="9">Admin</option>';
										echo '<option value="10" selected>Fleet Management</option>';
										break;
									}										
								?>
							</select>
						</div>
					</div>
			
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addemployeeTC" value="Add employee training certificate"/>
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
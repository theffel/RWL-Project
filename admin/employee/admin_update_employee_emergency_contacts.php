<?php
/**
 * This page holds the form for adding a new employees emergency contacts.
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
 * @since       2015-01-21
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
                <h1 class="page-header">Employee Emergency Contact Modification</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/employee/admin_emp_list.php">Employee List</a>
                    </li>
                    <li class="active">Emergency Contact</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add employee emergency contact form
			if ($loggedIn == true) {
				// Get employee Id
				$empId = $_GET["id"];	
				// Create query	for primary contact			
				$queryP = "select * from `employee_emergency_contact` where emp_id = '{$empId}' AND emerg_contact_id = '1'";
				$resultP = $db->query($queryP);
				if ($resultP->num_rows > 0) {
					$queryValuesP = $resultP->fetch_assoc();
					$employeePrimaryECFN = $queryValuesP['emerg_first_name'];
					$employeePrimaryECLN = $queryValuesP['emerg_last_name'];
					$employeePrimaryECPhoneNum = $queryValuesP['emerg_phone'];
				}
				else{
					$query = "INSERT INTO `employee_emergency_contact` (emp_id, emerg_contact_id) VALUES ('{$empId}', '1')";
					$db->query($query);
					$resultP = $db->query($queryP);
					$queryValuesP = $resultP->fetch_assoc();
					$employeePrimaryECFN = $queryValuesP['emerg_first_name'];
					$employeePrimaryECLN = $queryValuesP['emerg_last_name'];
					$employeePrimaryECPhoneNum = $queryValuesP['emerg_phone'];
				}
				// Create query	for Secondary contact			
				$queryS = "select * from `employee_emergency_contact` where emp_id = '{$empId}' AND emerg_contact_id = '2'";
				$resultS = $db->query($queryS);
				if ($resultS->num_rows > 0) {
					$queryValuesS = $resultS->fetch_assoc();
					$employeeSecondaryECFN = $queryValuesS['emerg_first_name'];
					$employeeSecondaryECLN = $queryValuesS['emerg_last_name'];
					$employeeSecondaryECPhoneNum = $queryValuesS['emerg_phone'];
				}
				else{
					$query = "INSERT INTO `employee_emergency_contact` (emp_id, emerg_contact_id) VALUES ('{$empId}', '2')";
					$db->query($query);
					$resultS = $db->query($queryS);
					$queryValuesS = $resultS->fetch_assoc();
					$employeeSecondaryECFN = $queryValuesS['emerg_first_name'];
					$employeeSecondaryECLN = $queryValuesS['emerg_last_name'];
					$employeeSecondaryECPhoneNum = $queryValuesS['emerg_phone'];
				}	
				echo '<form class="form-horizontal" name="updateEmployeeECForm" id="updateEmployeeECForm" method="post" action="'.ROOT.'/admin/admin_update_database.php">';
			
			?>

					<!--employee Id-->
					<input hidden type = "radio" name = "empId" id = "empId" value = "<?php echo $empId; ?>" checked>
					
					<!--Primary employee emergency contact FN-->
					<div class="form-group">
						<label for="inputemployeePrimaryECFN" class="control-label col-xs-2">Primary Emergency contact First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePrimaryECFN" id="employeePrimaryECFN" value="<?php echo $employeePrimaryECFN; ?>" required data-validation-required-message="Please enter the designated employees emergency contacts first name.">
						</div>
					</div>
					
					<!--Primary employee emergency contact LN-->
					<div class="form-group">
						<label for="inputemployeePrimaryECLN" class="control-label col-xs-2">Primary Emergency contact Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePrimaryECLN" id="employeePrimaryECLN" value="<?php echo $employeePrimaryECLN; ?>" required data-validation-required-message="Please enter the designated employees emergency contacts last name.">
						</div>
					</div>

					<!--Primary employee emergency contact PhoneNum-->
					<div class="form-group">
						<label for="inputemployeePrimaryECPN" class="control-label col-xs-2">Primary Emergency contact Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeePrimaryECPhoneNum" id="employeePrimaryECPhoneNum" placeholder="902#######" value="<?php echo $employeePrimaryECPhoneNum; ?>" required data-validation-required-message="Please enter the designated employees emergency contacts phone#.">
						</div>
					</div>
					
					<hr />
					
					<!--Secondary employee emergency contact FN-->
					<div class="form-group">
						<label for="inputemployeeSecondaryECFN" class="control-label col-xs-2">Secondary Emergency contact First Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSecondaryECFN" id="employeeSecondaryECFN" value="<?php echo $employeeSecondaryECFN; ?>">
						</div>
					</div>
					
					<!--Secondary employee emergency contact LN-->
					<div class="form-group">
						<label for="inputemployeeSecondaryECLN" class="control-label col-xs-2">Secondary Emergency contact Last Name</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSecondaryECLN" id="employeeSecondaryECLN" value="<?php echo $employeeSecondaryECLN; ?>">
						</div>
					</div>

					<!--Secondary employee emergency contact PhoneNum-->
					<div class="form-group">
						<label for="inputemployeeSecondaryECPN" class="control-label col-xs-2">Secondary Emergency contact Phone Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="employeeSecondaryECPhoneNum" id="employeeSecondaryECPhoneNum" placeholder="902#######" value="<?php echo $employeeSecondaryECPhoneNum; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="updateEmployeeEC" value="Modify Emergency Contacts"/>
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
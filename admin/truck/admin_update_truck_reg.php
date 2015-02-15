<?php
/**
 * This page holds the form for adding a new truck.
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
 * @since       2015-02-04
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
                <h1 class="page-header">truck Update</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/truck/admin_truck_list.php">trucks</a>
                    </li>
                    <li class="active">Update</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add truck form
			if ($loggedIn == true) {
				// Get Farm Id
				$truckId = $_GET["id"];	
						// Create query
				$query = "select `reg_expiry_date`, `img_id` from `registration` where truck_Id = {$truckId}";
					
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					$queryValues = $result->fetch_assoc();
					$regExpiry = $queryValues['reg_expiry_date'];
					$regImg = $queryValues['img_id'];
			?>

				<form class="form-horizontal" name="updatetruckForm" id="updatetruckForm" method="post" action="<?php echo ROOT; ?>/admin/add_to_database.php">

					<!--truck Id-->
					<input hidden type = "radio" name = "truckId" id = "truckId" value = "<?php echo $truckId; ?>" checked>

				<!--Registration-->
					<!--Registration expirey-->
					<div class="form-group">
						<label for="inputRegistrationExpiry" class="control-label col-xs-2">Registration Expirey</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="regExpiry" id="regExpiry" placeholder="YYYY-MM-DD" value = "<?php echo $regExpiry; ?>" required data-validation-required-message="Please enter the designated registration expirey date.">
						</div>
					</div>
					
					<!--Registration image-->
					<div class="form-group">
						<label for="inputRegistrationImg" class="control-label col-md-2">Registration Picture</label>
						<div class="col-md-10">
							<input type="file" id="regImg" name="regImg" accept="image/*" value = "<?php echo $regImg; ?>" required data-validation-required-message="Please enter the designated registration expirey date.">
						</div>
					</div>
			
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="updatetruck" value="Update truck"/>
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
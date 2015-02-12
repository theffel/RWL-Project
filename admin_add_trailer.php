<?php
/**
 * This page holds the form for adding a new trailer.
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
                <h1 class="page-header">New trailer Addition</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin_trailer_list.php">Trailers</a>
                    </li>
                    <li class="active">Add trailer</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add trailer form
			if ($loggedIn == true) {



			
			?>

				<form class="form-horizontal" name="addtrailerForm" id="addtrailerForm" method="post" action="add_to_database.php">

					<!--trailer number-->
					<div class="form-group">
						<label for="inputTrailerNumber" class="control-label col-xs-2">Trailer Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="trailerNum" id="trailerNum" placeholder="#####" required data-validation-required-message="Please enter the designated trailer number.">
						</div>
					</div>
					
					<!--License Plate number-->
					<div class="form-group">
						<label for="inputPlateNumber" class="control-label col-xs-2">License Plate Number</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="plateNum" id="plateNum" placeholder="########" required data-validation-required-message="Please enter the designated License Plate number.">
						</div>
					</div>
					
					<hr />
					
				<!--Registration-->
					<!--Registration expirey-->
					<div class="form-group">
						<label for="inputRegistrationExpiry" class="control-label col-xs-2">Registration Expirey</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="regExpiry" id="regExpiry" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the designated registration expirey date.">
						</div>
					</div>
					
					<!--Registration image-->
					<div class="form-group">
						<label for="inputRegistrationImg" class="control-label col-md-2">Registration Picture</label>
						<div class="col-md-10">
							<input type="file" id="regImg" name="regImg" accept="image/*">
						</div>
					</div>
					
					<hr />					

				<!--Inspection-->
					<!--Inspection expirey-->
					<div class="form-group">
						<label for="inputInspectionExpiry" class="control-label col-xs-2">Inspection Expirey</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="inspectExpiry" id="inspectExpiry" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the designated inspection expirey date.">
						</div>
					</div>
					
					<!--Inspection image-->
					<div class="form-group">
						<label for="inputInspectionImg" class="control-label col-md-2">Inspection Picture</label>
						<div class="col-md-10">
							<input type="file" id="inspectImg" name="inspectImg" accept="image/*">
						</div>
					</div>
					
					<hr />

				<!--Insurance-->
					<!--Insurance expirey-->
					<div class="form-group">
						<label for="inputInsuranceExpiry" class="control-label col-xs-2">Insurance Expirey</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="insureExpiry" id="insureExpiry" placeholder="YYYY-MM-DD" required data-validation-required-message="Please enter the designated insurance expirey date.">
						</div>
					</div>	

					<!--Insurance image-->
					<div class="form-group">
						<label for="inputInsuranceImg" class="control-label col-md-2">Insurance Picture</label>
						<div class="col-md-10">
							<input type="file" id="insureImg" name="insureImg" accept="image/*">
						</div>
					</div>
					
			
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="addtrailer" value="Add trailer"/>
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
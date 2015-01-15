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
                    <li class="active">Add Farm</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add farm form
///////////////////////////////////////////////////////////////////////////////////////////////////
//REMEMBER TO CHANGE THIS WHEN LOGIN FUNCTIONALITY IS UP////////////////
			if ($loggedIn == false) {
////////////////////////////////////////////////////////////////////
						
				// Create query
				$count = mysql_query("SELECT COUNT(farm_name) FROM FARM");
				$i = 0;
				while($count > $i){ 
				$query = "select farm_name FROM FARM";
				$farms = mysql_query($query);
				
				$farm = mysql_fetch_array($farms, MYSQL_NUM);
					foreach ($farm as $name){
						$id = "select farm_id FROM FARM WHERE '$name' == farm_name";
						echo "fine to here <br>";
						//echo "<input type='submit' name="'$name'" value="'$id'"/><br>";
					}

				}
				
				$mysqli->close();
			}

			// If the user is not logged in, redirect them to login.php if they try to access this page
			else {
				echo '<script type="text/javascript">
							location.replace("login.php");
							</script>';
			}
        ?>
			<hr>
		</div>

			<!-- Footer -->
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<p>Copyright &copy; RWL Holdings 2015</p>
					</div>
				</div>
			</footer>

		
		<!-- /.container -->

		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>
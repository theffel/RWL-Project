<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PEI Potato Solutions</title>
    <!-- Bootstrap Core CSS -->
    <?php define('ROOT', 'http://localhost/RWL-Project'); ?>
    <link href="<?php echo ROOT; ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo ROOT; ?>/css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo ROOT; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo ROOT; ?>/index.php">PEI Potato Solutions</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo ROOT; ?>/about">About</a></li>
                    <li><a href="<?php echo ROOT; ?>/services">Services</a></li>
                    <li><a href="<?php echo ROOT; ?>/contact">Contact</a></li>
                    <?php
                        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
                        $username = (!empty($_SESSION['username'])) ? $_SESSION['username'] : "";
                        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
                        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
                        if ($loggedIn == false) {
                            echo '<li><a href="'. ROOT . '/login">Login</a></li>';
                        } else {
                            if ($attendanceId != 0 && $employeeType != 0) {
                            echo '<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $username . ' <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>';
                                            if ($employeeType == 1) { // Driver
                                                echo '<a href="'. ROOT . '/daily_mileage">Daily Mileage</a>';
                                                echo '<a href="'. ROOT . '/pretrip_inspection">Pre-Trip Inspection</a>';
                                                echo '<a href="'. ROOT . '/fuel">Fuel</a>';
                                                echo '<a href="'. ROOT . '/pickup">Pick Up</a>';
                                                echo '<a href="'. ROOT . '/delivery">Delivery</a>';

                                            } if ($employeeType == 1 || $employeeType == 3) { // Driver or production manager
                                                echo '<a href="'. ROOT . '/product_reception">Production Reception</a>';
                                            } if ($employeeType == 1 || $employeeType == 7) { // Driver or maintenance
                                                echo '<a href="'. ROOT . '/oil_and_fluids">Oil and Fluids</a>';
                                                echo '<a href="'. ROOT . '/equipment_inspection">Equipment Inspection</a>';
                                            } if ($employeeType == 3 || $employeeType == 2) { // Production manager or dispatcher
                                                echo '<a href="'. ROOT . '/rejection">Rejection</a>';
                                                echo '<a href="'. ROOT . '/byproduct_disposal">By-Product Disposal</a>';
                                                echo '<a href="'. ROOT . '/delivery">Delivery</a>';
                                            } if ($employeeType == 3) { // Production manager
                                                echo '<a href="'. ROOT . '/downtime">Downtime</a>';
                                                echo '<a href="'. ROOT . '/waste_disposal">Waste Disposal</a>';
                                            } if ($employeeType == 3 || $employeeType == 2 || $employeeType == 5) { // Production manager, dispatcher or line worker
                                                echo '<a href="'. ROOT . '/wash_line_cleaning">Wash Line Cleaning</a>';
                                                echo '<a href="'. ROOT . '/plant_cleaning">Plant Cleaning</a>';
                                            } if ($employeeType == 3 || $employeeType == 5) { // Production manager or line worker
                                                echo '<a href="'. ROOT . '/temperature_checks">Temperature Checks</a>';
                                            } if ($employeeType == 3 || $employeeType == 4) { // Production manager or sampler
                                                echo '<a href="'. ROOT . '/sample">Sample</a>';
                                            } if ($employeeType == 2) { // Dispatcher
                                                echo '<a href="'. ROOT . '/shipping">Shipping</a>';
                                            } if ($employeeType == 7) { // Maintenance
                                                echo '<a href="'. ROOT . '/repairs_and_maintenance">Repairs and Maintenance</a>';
                                            } if ($employeeType == 9) { // Admin
                                                echo '<a href="'. ROOT . '/admin_add_farm.php">Add Farm</a>';
                                            	echo '<a href="'. ROOT . '/admin_add_employee.php">Add Employee</a>';
                                            	echo '<a href="'. ROOT . '/admin_farm_list.php">View Farm</a>';
                                                echo '<a href="'. ROOT . '/report/index.php">Report</a>';
                                            }
                            echo '      </li>
                                    </ul>
                                </li>';
                            }
                            echo '<li><a href="'. ROOT . '/attendance/">Attendance</a></li>';
                            echo '<li><a href="'. ROOT . '/login/index.php?action=logout">Logout</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
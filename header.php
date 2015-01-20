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
                    <li>
                        <a href="<?php echo ROOT; ?>/about">About</a>
                    </li>
                    <li>
                        <a href="<?php echo ROOT; ?>/services">Services</a>
                    </li>
                    <li>
                        <a href="<?php echo ROOT; ?>/contact">Contact</a>
                    </li>
                    <?php
                        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
                        $username = (!empty($_SESSION['username'])) ? $_SESSION['username'] : "";
                        if ($loggedIn == false) {
                            echo '<li><a href="'. ROOT . '/login">Login</a></li>';
                        }
                        else {
                            echo '<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $username . ' <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="'. ROOT . '/product_reception">Production Reception</a>
                                            <a href="'. ROOT . '/rejection.php">Rejection</a>
                                            <a href="'. ROOT . '/byproduct_disposal">By-Product Disposal</a>
                                            <a href="'. ROOT . '/waste_disposal">Waste Disposal</a>
                                            <a href="'. ROOT . '/daily_mileage">Daily Mileage</a>
                                            <a href="'. ROOT . '/pretrip_inspection">Pre-Trip Inspection</a>
                                            <a href="'. ROOT . '/fuel">Fuel</a>
                                            <a href="'. ROOT . '/oil_and_fluids">Oil and Fluids</a>
                                            <a href="'. ROOT . '/delivery">Delivery</a>
                                            <a href="'. ROOT . '/shipping">Shipping</a>
                                            <a href="'. ROOT . '/wash_line_cleaning">Wash Line Cleaning</a>
                                            <a href="'. ROOT . '/plant_cleaning">Plant Cleaning</a>
                                            <a href="'. ROOT . '/equipment_insepection">Equipment Insepection</a>
                                            <a href="'. ROOT . '/repairs_and_maintenance">Repairs and Maintenance</a>
                                            <a href="'. ROOT . '/sample">Sample</a>
                                            <a href="'. ROOT . '/temperature_checks">Temperature Checks</a>
                                        </li>
                                    </ul>
                                </li>';
                            echo '<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Pages <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="'. ROOT . '/admin_add_farm.php">Add Farm</a>
                                            <a href="'. ROOT . '/admin_add_employee.php">Add Employee</a>
                                            <a href="'. ROOT . '/admin_farm_list.php">View Farm</a>
                                        </li>
                                    </ul>
                                </li>';
                            echo '<li><a href="'. ROOT . '/login/index.php?action=logout">Logout</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
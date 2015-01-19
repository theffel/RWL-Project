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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand" href="index.php">PEI Potato Solutions</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="services.php">Services</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <?php
                        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
                        $username = (!empty($_SESSION['username'])) ? $_SESSION['username'] : "";

                        if ($loggedIn == false) {
                            echo '<li><a href="login.php">Login</a></li>';
                        }
                        else {
                            echo '<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $username . ' <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <!-- Dispatcher -->
                                            <a href="product_reception.php">Production Reception</a>
                                            <a href="rejection.php">Rejection</a>
                                            <a href="byproduct_disposal.php">By-Product Disposal</a>
                                            <a href="waste_disposal.php">Waste Disposal</a>
                                            <a href="daily_mileage.php">Daily Mileage</a>

                                            <!-- Driver -->
                                            <a href="pretrip_inspection.php">Pre-Trip Inspection</a>
                                            <a href="fuel.php">Fuel</a>
                                            <a href="oil_fluids.php">Oil and Fluids</a>
                                            <a href="delivery.php">Delivery</a>

                                            <!-- Dispatcher and driver -->
                                            <a href="shipping.php">Shipping</a>

                                            <!-- Line worker -->
                                            <a href="wash_line_cleaning.php">Wash Line Cleaning</a>
                                            <a href="plant_cleaning.php">Plant Cleaning</a>

                                            <!-- Maintainance -->
                                            <a href="equipment_insepection.php">Equipment Insepection</a>
                                            <a href="repairs_maintenance.php">Repairs and Maintenance</a>

                                            <!-- Sampler -->
                                            <a href="sample.php">Sample</a>

                                            <!-- Waterboy -->
                                            <a href="temperature_checks.php">Temperature Checks</a>
                                        </li>
                                    </ul>
                                </li>';


                            echo '<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Pages <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <!-- Add Farm -->
                                            <a href="admin_add_farm.php">Add Farm</a>
                                            
                                            <!-- Add Employee -->
                                            <a href="admin_add_employee.php">Add Employee</a>

                                            <!--  View Pages -->
                                            <a href="admin_farm_list.php">View Farm</a>
             
                                        </li>
                                    </ul>
                                </li>';
                            echo '<li><a href="login.php?action=logout">Logout</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
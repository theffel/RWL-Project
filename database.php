<?php
// Login information variables
$host = "localhost";
$name = "rwl_user";
$pass = "rwl_pass";
$db = "rwlholdings_potato_solutions";

// Create connection to the database
@$db = new mysqli($host, $name, $pass, $db);

// Setting timezone
date_default_timezone_set("America/Halifax");
$currentTime = date("H:i:s");
$currentDate = date("Y-m-d");

$dateTime = date('Y-m-d H:i:s');

$db->query("SET GLOBAL time_zone = '-4:00'");

// Display message if there is an error connecting to the database
if (mysqli_connect_errno()) {
	echo '<h1>Error: Could not connect to database. Please try again later.</h1>';
	exit;
}
?>
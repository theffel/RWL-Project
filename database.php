<?php
// Require the MysqliDb.php file
require_once('MysqliDb.php');

// Login information variables
$host = "localhost";
$name = "rwl_user";
$pass = "rwl_pass";
$db = "rwlholdings_potato_solutions";

// Create connection to the database
@$db = new MysqliDb($host, $name, $pass, $db);

// Display message if there is an error connecting to the database
if (mysqli_connect_errno()) {
	echo '<h1>Error: Could not connect to database. Please try again later.</h1>';
	exit;
}
?>
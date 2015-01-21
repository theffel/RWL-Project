<?php
// Require the database.php file
require_once('database.php');

// Store information in the session

// Store emp_id

	$username = (!empty($_SESSION['username'])) ? $_SESSION['username'] : "";
	
    $query = "SELECT emp_id FROM users WHERE username='" .$username ."'";

    $result = $db->query($query);
   
    $row = $result->fetch_assoc();
        
    $empId = $row['emp_id'];   
    
    $_SESSION['empId'] = $empId;

?>